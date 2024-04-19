<?php
include("conection.php");
function loginEmpty($a, $b)
{
	if (!empty($a) && !empty($b))
		return true;
	else {
		header("Location:user/login.php?errCode=1");
		return false;
	}
}
function loginEmptyAdmin($a, $b)
{
	if (!empty($a) && !empty($b))
		return true;
	else {
		header("Location:admin/login.php?errCode=1");
		return false;
	}
}
function emailValid($email)
{
	return (bool) preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email);
}
function phoneNumberValid($phoneNumber)
{
	return preg_match('/^[0-9]{10}+$/', $phoneNumber);

}
function checkRegister($allName, $userName, $userPassword, $passwordRepeat, $address, $email, $phoneNumber, $NgayDangKi)
{
	if (!empty($allName) && !empty($userName) && !empty($userPassword) && !empty($passwordRepeat) && !empty($address) && !empty($email) && !empty($phoneNumber)) {
		if ($userPassword != $passwordRepeat) {
			header("Location:user/register.php?errCode=2");
			return false;
		}
		if (!emailValid($email)) {
			header("Location:user/register.php?errCode=3");
			return false;
		} elseif (!phoneNumberValid($phoneNumber)) {
			header("Location:user/register.php?errCode=4");
			return false;
		}
		return true;
	} else {
		header("Location:user/register.php?errCode=1");
		return false;
	}
}

if (isset($_POST['fixCus'])) {
	$tenKhachHang = $_POST['tenKhachHang'];
	$diaChi = $_POST['diaChi'];
	$soDienThoai = $_POST['soDienThoai'];
	$maKhachHang = $_POST['maKhachHang'];
	if ($tenKhachHang != "" && $diaChi != "" && $soDienThoai != "" && $maKhachHang != "") {
		$sql_fixCus = "UPDATE  khachhang SET tenKhachHang='" . $tenKhachHang . "',diaChi='" . $diaChi . "',soDienThoai='" . $soDienThoai . "' WHERE maKhachHang='" . $maKhachHang . "'";
		mysqli_query($mysqli, $sql_fixCus);
		header("Location:user/infoCustomer.php?errCode=0");
	} else {
		header("Location:user/infoCustomer.php?errCode=1");
	}


}

if (isset($_GET['idOrderSuccess'])) {
	$sql_loadSuccessOrder = "UPDATE donhang SET trangThaiDonHang='1' WHERE maDonHang='" . $_GET['idOrderSuccess'] . "' ";
	mysqli_query($mysqli, $sql_loadSuccessOrder);
	header("Location:admin/index.php?errCode=0");
}
if (isset($_POST['fixProduct'])) {
	$maSanPham = $_GET['id'];
	$maDanhMuc = $_POST['maDanhMuc'];
	$tenSanPham = $_POST['nameProduct'];
	$moTa = $_POST['moTa'];
	$trangThaiSanPham = $_POST['maTrangThai'];
	$hinhAnh = $_POST['image'];
	$giaBan = $_POST['giaBan'];
	if (!isset($_GET['id']) && !isset($_POST['maDanhMuc']) && !isset($_POST['tenSanPham']) && !isset($_POST['moTa']) && !isset($_POST['maTrangThai']) && !isset($_POST['image']) && !isset($_POST['giaBan'])) {
		header("location: admin/index.php");
	} else {
		$sql_fixProduct = "UPDATE sanpham SET maDanhMuc='" . $maDanhMuc . "', tenSanPham='" . $tenSanPham . "', moTa='" . $moTa . "', trangThaiSanPham= '" . $trangThaiSanPham . "', hinhAnh='" . $hinhAnh . "', giaBan='" . $giaBan . "' WHERE maSanPham='" . $_GET['id'] . "' LIMIT 1";
		mysqli_query($mysqli, $sql_fixProduct);
		header("location: admin/pages/product.php");
	}

}

if (isset($_POST['fixCategory'])) {
	$maDanhMuc = $_GET['id'];
	$tenDanhMuc = $_POST['tenDanhMuc'];
	$moTa = $_POST['moTa'];
	$trangThaiSanPham = $_POST['maTrangThai'];
	if (!isset($_GET['id']) && !isset($_POST['tenDanhMuc']) && !isset($_POST['moTa']) && !isset($_POST['maTrangThai'])) {
		header("location: admin/index.php");
	} else {
		$sql_fixCategory = "UPDATE danhmuc SET tenDanhMuc='" . $tenDanhMuc . "',  moTa='" . $moTa . "', trangThaiSanPham= '" . $trangThaiSanPham . "' WHERE maDanhMuc='" . $_GET['id'] . "' LIMIT 1";
		mysqli_query($mysqli, $sql_fixCategory);
		header("location: admin/pages/category.php");
	}

}
if (isset($_POST['addCategory'])) {
	$tenDanhMuc = $_POST['tenDanhMuc'];
	$moTa = $_POST['moTa'];
	$trangThaiSanPham = $_POST['maTrangThai'];
	$sql_addCategory = "INSERT INTO danhmuc(tenDanhMuc,moTa,trangThaiSanPham) VALUES('" . $tenDanhMuc . "','" . $moTa . "','" . $trangThaiSanPham . "')";
	mysqli_query($mysqli, $sql_addCategory);
	header("location: admin/pages/category.php");

}

if (isset($_POST['button-login-admin'])) {
	session_start();
	$name = $_POST['admin-name'];
	$password = $_POST['admin-password'];
	$sql_getName = "SELECT * FROM quanly WHERE tenDangNhap = '$name' LIMIT 1";
	$query_getName = mysqli_query($mysqli, $sql_getName);
	$row_getName = mysqli_fetch_array($query_getName);
	if (loginEmptyAdmin($name, $password)) {
		$sql_login = mysqli_query($mysqli, "SELECT * FROM quanly WHERE 
		tenDangNhap = '$name' AND matKhau = '$password' LIMIT 1");
		$count = mysqli_num_rows($sql_login);
		$sql_name = mysqli_query($mysqli, "SELECT tenQuanLy FROM quanly WHERE 
		tenDangNhap= '$name'LIMIT 1");
		$countname = mysqli_num_rows($sql_name);
		if ($count > 0) {
			$_SESSION['TenDangNhap'] = $name;
			$_SESSION['tenQuanLy'] = $row_getName['tenQuanLy'];
			$_SESSION['email'] = $row_getName['email'];
			$_SESSION['maQuanLy'] = $row_getName['maQuanLy'];
			header("location:admin/index.php");
		} else {
			header("location: admin/login.php?errCode=2");
		}
	}

}
if (isset($_POST['logout-admin'])) {
	session_start();
	session_destroy();
	header("location:admin/index.php");
}
if (isset($_POST['register-button'])) {
	include("conection.php");
	$allName = $_POST['allname'];
	$userName = $_POST['username'];
	$userPassword = $_POST['userpassword'];
	$passwordRepeat = $_POST['userpasswordrepeat'];
	$address = $_POST['address'];
	$email = $_POST['useremail'];
	$phoneNumber = $_POST['phonenumber'];
	$NgayDangKi = date("Y-m-d H:i:s");
	if (checkRegister($allName, $userName, $userPassword, $passwordRepeat, $address, $email, $phoneNumber, $NgayDangKi)) {
		$sql_addRegister = "INSERT INTO khachhang(tenDangNhap,matKhau,tenKhachHang,diaChi,email,soDienThoai,ngayDangKi) VALUES('" . $userName . "','" . $userPassword . "','" . $allName . "','" . $address . "','" . $email . "','" . $phoneNumber . "','" . $NgayDangKi . "')";
		if (mysqli_query($mysqli, $sql_addRegister)) {
			header("Location:user/login.php?message=1");
		} else {
			echo "Error: " . $sql_addRegister . "<br>" . mysqli_error($mysqli);
		}

		//header("Location:user/login.php?message=1");
		mysqli_close($mysqli);
	} else {
		echo "sai cai gi roi";
	}
}

if (isset($_POST['user-button-login'])) {
	session_start();
	$userName = $_POST['user-name'];
	$userPassword = $_POST['user-password'];
	if (loginEmpty($userName, $userPassword)) {

		$sql_checkUser = "SELECT * FROM khachhang WHERE tenDangNhap='$userName' LIMIT 1";
		$query_checkUser = mysqli_query($mysqli, $sql_checkUser);
		$row_checkUser = mysqli_fetch_array($query_checkUser);
		$sql_login = mysqli_query($mysqli, "SELECT * FROM khachhang WHERE 
			tenDangNhap = '$userName' AND matKhau = '$userPassword' LIMIT 1");
		$count = mysqli_num_rows($sql_login);

		if ($count > 0) {
			$_SESSION['TenDangNhapKhachHang'] = $userName;
			$_SESSION['tenKhachHang'] = $row_checkUser['tenKhachHang'];
			$_SESSION['emailKhachHang'] = $row_checkUser['email'];
			$_SESSION['maKhachHang'] = $row_checkUser['maKhachHang'];
			header("location:index.php?message=1");
			$abc = 1;
		} else {
			header("location:user/login.php?errCode=2");
		}
	}
}

if (isset($_GET['logout-user'])) {
	if ($_GET['logout-user'] == 1) {
		session_start();
		unset($_SESSION['maKhachHang']);
		header("location:user/login.php");
	}

}
if (isset($_POST['addProduct'])) {
    // Lấy thông tin sản phẩm từ form
    $maDanhMuc = $_POST['maDanhMuc'];
    $tenSanPham = $_POST['tenSanPham'];
    $moTa = $_POST['moTa'];
    $soLuong = $_POST['soLuong'];
    $trangThaiSanPham = $_POST['maTrangThai'];
    $giaBan = $_POST['giaBan'];
	$image = $_POST['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']; // Lấy thông tin về file hình ảnh
        $imageTmpName = $image['tmp_name']; // Lấy đường dẫn tạm thời của hình ảnh

        // Thư mục để lưu trữ hình ảnh
        $targetDirectory = "image/product/";

        // Tạo tên tệp tin mới để tránh trùng lặp tên
        $imageExtension = pathinfo($image['name'], PATHINFO_EXTENSION); // Lấy phần mở rộng của hình ảnh
        $newImageName = uniqid('image_') . '.' . $imageExtension; // Tạo tên tệp tin mới

		$uploadPath = __DIR__ . '/' . $targetDirectory . $newImageName;
		move_uploaded_file($imageTmpName, $uploadPath);

        // Thêm thông tin sản phẩm vào cơ sở dữ liệu, sử dụng $uploadPath là đường dẫn tới hình ảnh đã lưu
        $sql_addProduct = "INSERT INTO sanpham(maDanhMuc,tenSanPham,moTa,soLuong,trangThaiSanPham,hinhAnh,giaBan) VALUES('$maDanhMuc','$tenSanPham','$moTa','$soLuong','$trangThaiSanPham','$newImageName','$giaBan')";
        mysqli_query($mysqli, $sql_addProduct);
        header("location: admin/pages/product.php");
    } else {
        // Xử lý khi không có tệp được tải lên
        // Hiển thị thông báo lỗi hoặc xử lý tùy theo yêu cầu của bạn
        echo "Vui lòng chọn một hình ảnh để tải lên.";
    }
}

if (isset($_GET['idDelete'])) {
	$maSanPham = $_GET['idDelete'];
	$sql_deleteProduct = "DELETE FROM sanpham WHERE maSanPham=$maSanPham";
	mysqli_query($mysqli, $sql_deleteProduct);
	header("location: admin/pages/product.php");
}
if (isset($_GET['deleteCategory'])) {
	$maDanhMuc = $_GET['deleteCategory'];
	$sql_deleteCategory = "DELETE FROM danhmuc WHERE maDanhMuc=$maDanhMuc";
	mysqli_query($mysqli, $sql_deleteCategory);
	header("location: admin/pages/category.php");
}