<?php
include '../conection.php';
session_start();
$id= isset($_GET['id']) ? $_GET['id']: '';
$size=$_POST['size'];
$qty=$_POST['qtybutton'];
$addToCart="SELECT * FROM sanpham WHERE maSanPham='".$id."' LIMIT 1";
$queryAddToCart=mysqli_query($mysqli,$addToCart);
$rowAddToCart=mysqli_fetch_assoc($queryAddToCart);
if($rowAddToCart){
	if (isset($_SESSION['cart'])) {		
				if(isset($_SESSION['cart'][$id][$size])){
					$_SESSION['cart'][$id][$size]['qty']+=$qty;
				}else{
					$_SESSION['cart'][$id][$size]['qty']=$qty;
				}			
		$_SESSION['cart'][$id][$size]['id']=$id;
		$_SESSION['cart'][$id][$size]['tenSanPham']=$rowAddToCart['tenSanPham'];
		$_SESSION['cart'][$id][$size]['hinhAnh']=$rowAddToCart['hinhAnh'];
		$_SESSION['cart'][$id][$size]['giaBan']=$rowAddToCart['giaBan'];
		$_SESSION['cart'][$id][$size]['size']=$size;
		header('location:index.php');exit();

	}else{
		$_SESSION['cart'][$id][$size]['id']=$id;	
		$_SESSION['cart'][$id][$size]['qty']=$qty;
		$_SESSION['cart'][$id][$size]['size']=$size;
		$_SESSION['cart'][$id][$size]['tenSanPham']=$rowAddToCart['tenSanPham'];
		$_SESSION['cart'][$id][$size]['hinhAnh']=$rowAddToCart['hinhAnh'];
		$_SESSION['cart'][$id][$size]['giaBan']=$rowAddToCart['giaBan'];
		header('location:index.php');exit();
	}
}else{
    echo '<script type="text/javascript">
            window.onload = function () { alert("Có lỗi khi thêm vào giỏ hàng !!"); }
            </script>';
}
?>