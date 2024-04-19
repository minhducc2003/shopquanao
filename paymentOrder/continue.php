<?php
include '../conection.php';
session_start();
if (isset($_POST['Continue'])) {
       if (!empty($_POST['tenKhachHang']) && !empty($_POST['diaChi']) && !empty($_POST['soDienThoai'])) {
              $maKhachHang = $_SESSION['maKhachHang'];
              $tenKhachHang = $_POST['tenKhachHang'];
              $diaChi = $_POST['diaChi'];
              $soDienThoai = $_POST['soDienThoai'];
              $phuongThucThanhToan = $_POST['payment'];
              $ThoiGianLap = date("Y-m-d H:i:s");
              $trangThaiDonHang = 0;
              $maNhanVien = 1;
              $ghiChu = "Khong co";
              if ($phuongThucThanhToan == 1) {
                     header("Location:cartPay.php?maKhachHang=$maKhachHang&tenKhachHang=$tenKhachHang&diaChi=$diaChi&soDienThoai=$soDienThoai");
              } else {
                     if (isset($_SESSION['cart'])) {
                            $allMoney = 0;
                            $allAmount = 0;
                            foreach ($_SESSION['cart'] as $value) {
                                   foreach ($value as $data) {
                                          $moneyOneProduct = $data['qty'] * $data['giaBan'];
                                          $tenSanPham = $data['tenSanPham'];
                                          $size = $data['size'];
                                          $giaBan = $data['giaBan'];
                                          $qty = $data['qty'];
                                          $moneyOneProduct = $data['qty'] * $data['giaBan'];
                                          $allAmount += $moneyOneProduct;

                                   }
                            }
                     }
                     $sql_saveOrder = "INSERT INTO donhang(maKhachHang,maNhanVien,ghiChu,tongGia,thoiGian,trangThaiDonHang) VALUES('" . $maKhachHang . "','" . $maNhanVien . "','" . $ghiChu . "','" . $allAmount . "','" . $ThoiGianLap . "','" . $trangThaiDonHang . "')";
                     mysqli_query($mysqli, $sql_saveOrder);
                     $sql_getOrder = "SELECT * FROM donhang WHERE thoiGian='" . $ThoiGianLap . "' LIMIT 1";
                     $query_getOrder = mysqli_query($mysqli, $sql_getOrder);
                     $row_getOrder = mysqli_fetch_array($query_getOrder);
                     $maDonHang = $row_getOrder['maDonHang'];
                     foreach ($_SESSION['cart'] as $value) {
                            foreach ($value as $data) {
                                   $moneyOneProduct = $data['qty'] * $data['giaBan'];
                                   $id = $data['id'];
                                   $tenSanPham = $data['tenSanPham'];
                                   $size = $data['size'];
                                   $giaBan = $data['giaBan'];
                                   $qty = $data['qty'];
                                   $sql_saveOrderDetail = "INSERT INTO chitietdonhang(maDonhang,maSanPham,tenSanPham,soLuong,giaSanPham) VALUES('" . $maDonHang . "','" . $id . "','" . $tenSanPham . "','" . $qty . "','" . $giaBan . "')";
                                   mysqli_query($mysqli, $sql_saveOrderDetail);
                            }
                     }
                     unset($_SESSION['cart']);
                     header("Location:payDone.php?id=$maDonHang");
              }
       } else {
              header("Location:index.php?errCode=1");
       }
} else if (isset($_POST['ContinueCartPay'])) {

       $maKhachHang = $_SESSION['maKhachHang'];
       $tenKhachHang = $_POST['tenKhachHang'];
       $diaChi = $_POST['diaChi'];
       $soDienThoai = $_POST['soDienThoai'];
       $phuongThucThanhToan = $_POST['payment'];
       $ThoiGianLap = date("Y-m-d H:i:s");
       $trangThaiDonHang = 0;
       $maNhanVien = 1;
       $ghiChu = "Khong co";
       if (isset($_SESSION['cart'])) {
              $allMoney = 0;
              $allAmount = 0;
              foreach ($_SESSION['cart'] as $value) {
                     foreach ($value as $data) {
                            $moneyOneProduct = $data['qty'] * $data['giaBan'];
                            $tenSanPham = $data['tenSanPham'];
                            $size = $data['size'];
                            $giaBan = $data['giaBan'];
                            $qty = $data['qty'];
                            $moneyOneProduct = $data['qty'] * $data['giaBan'];
                            $allAmount += $moneyOneProduct;

                     }
              }
       }
       $sql_saveOrder = "INSERT INTO donhang(maKhachHang,maNhanVien,ghiChu,tongGia,thoiGian,trangThaiDonHang) VALUES('" . $maKhachHang . "','" . $maNhanVien . "','" . $ghiChu . "','" . $allAmount . "','" . $ThoiGianLap . "','" . $trangThaiDonHang . "')";
       mysqli_query($mysqli, $sql_saveOrder);
       $sql_getOrder = "SELECT * FROM donhang WHERE thoiGian='" . $ThoiGianLap . "' LIMIT 1";
       $query_getOrder = mysqli_query($mysqli, $sql_getOrder);
       $row_getOrder = mysqli_fetch_array($query_getOrder);
       $maDonHang = $row_getOrder['maDonHang'];
       foreach ($_SESSION['cart'] as $value) {
              foreach ($value as $data) {
                     $moneyOneProduct = $data['qty'] * $data['giaBan'];
                     $id = $data['id'];
                     $tenSanPham = $data['tenSanPham'];
                     $size = $data['size'];
                     $giaBan = $data['giaBan'];
                     $qty = $data['qty'];
                     $sql_saveOrderDetail = "INSERT INTO chitietdonhang(maDonhang,maSanPham,tenSanPham,soLuong,giaSanPham) VALUES('" . $maDonHang . "','" . $id . "','" . $tenSanPham . "','" . $qty . "','" . $giaBan . "')";
                     mysqli_query($mysqli, $sql_saveOrderDetail);
              }
       }
       unset($_SESSION['cart']);
       header("Location:payDone.php?id=$maDonHang");

} else {
       echo "sai cai gif r";
}
?>