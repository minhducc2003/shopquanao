<?php
include("../conection.php");
session_start();

if (!isset($_SESSION['maKhachHang'])) {
    header("location: ../user/login.php");
}

//san pham ban chay
$trangThaiSanPhamBanChay = '5';
$sql_productInfoBestSeller = "SELECT * FROM sanpham  WHERE trangThaiSanPham=$trangThaiSanPhamBanChay ORDER BY maSanPham DESC  LIMIT 4";
$query_productInfoBestSeller = mysqli_query($mysqli, $sql_productInfoBestSeller);

// san pham moi
$trangThaiSanPhamSanPhamMoi = '4';
$sql_productInfoSanPhamMoi = "SELECT * FROM sanpham  WHERE trangThaiSanPham=$trangThaiSanPhamSanPhamMoi ORDER BY maSanPham DESC LIMIT 4";
$query_productInfoSanPhamMoi = mysqli_query($mysqli, $sql_productInfoSanPhamMoi);


// san pham sale 50%
$trangThaiSanPhamSale50 = '3';
$sql_productInfoSale50 = "SELECT * FROM sanpham  WHERE trangThaiSanPham=$trangThaiSanPhamSale50 ORDER BY maSanPham DESC LIMIT 4";
$query_productInfoSale50 = mysqli_query($mysqli, $sql_productInfoSale50);


//Liet ke danh muc
$sql_getCategory = "SELECT * FROM danhmuc ORDER BY maDanhMuc DESC ";
$query_getCategory = mysqli_query($mysqli, $sql_getCategory);

$sql_getCategoryMobile = "SELECT * FROM danhmuc ORDER BY maDanhMuc DESC ";
$query_getCategoryMobile = mysqli_query($mysqli, $sql_getCategoryMobile);
//currrency  format vnd
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from preview.hasthemes.com/james-preview/james/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:04 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Single Shop || James </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="../image/x-icon" href="../img/favicon.ico">

    <!-- Google Fonts
        ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.css">
    <link rel="stylesheet" href="../css/owl.transitions.css">
    <!-- jquery-ui CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/meanmenu.min.css">
    <!-- nivoslider CSS
        ============================================ -->
    <link rel="stylesheet" href="../lib/css/nivo-slider.css">
    <link rel="stylesheet" href="../lib/css/preview.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/animate.css">
    <!-- magic CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/magic.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/normalize.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="../style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header area start -->
    <header style="background-image:url(../image/slider/slider1.png);">

        <div class="top-link">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">

                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="dashboard" style="background: #e1d2b9">
                            <div class="account-menu">
                                <ul>
                                    <li class="search">
                                        <a href="#">
                                            <i class="fa fa-search" style="color: black;"></i>
                                        </a>
                                        <ul class="search">
                                            <form action="../product/search.php" method="POST">
                                                <li style="background-color:white;border:none">
                                                    <select name="search_by" style="border:none">
                                                        <option value="name">Tìm theo tên sản phẩm</option>
                                                        <option value="category">Tìm theo danh mục sản phẩm</option>
                                                    </select>
                                                </li>
                                                <li>
                                                    <input type="text" name="search">
                                                    <button type="submit"> <i class="fa fa-search"></i> </button>
                                                </li>
                                            </form>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bars" style="color: black;"></i>
                                        </a>
                                        <ul>
                                            <li><a href="../user/infoCustomer.php"name="info-user">Thông tin tài khoản</a></li>
                                            <li><a href="#">Giỏ hàng</a></li>
                                            <?php
                                            if (isset($_SESSION['maKhachHang'])) {
                                                ?>
                                                        <li>
                                                            <form action="function.php" method="post"><button name="logout-user"
                                                                    style="background-color: unset; border: none; color: white;">Đăng
                                                                    Xuất</button></form>
                                                        </li>
                                                        <?php
                                            } else {
                                                ?>
                                                        <li><a href="../user/login.php">Đăng nhập</a></li>
                                                        <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-menu" style="text-color: white;">
                                <ul>
                                    <li><a href="#"></a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mainmenu-area home2 bg-color-tr product-items">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="../index.php" style="margin-top: 5px;">
                                <img src="../image/logo1.png" alt="logo" style="height:130px; width: 130px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="mainmenu" style="color: black;">
                            <nav>
                                <ul>
                                    <li><a href="../index.php" style="color: black;">Trang Chủ</a>

                                    </li>

                                    <li class="mega-women"><a href="#" style="color: black;">Sản Phẩm</a>
                                        <div class="mega-menu women">
                                            <div class="part-1" style="display:flex;">
                                                <?php
                                                while ($row_getCategory = mysqli_fetch_array($query_getCategory)) {

                                                    ?>
                                                            <span>
                                                                <a
                                                                    href="../product/allCategory.php?id=<?php echo $row_getCategory['maDanhMuc']; ?>">
                                                                    <?php echo $row_getCategory['tenDanhMuc']; ?></a>
                                                                <?php
                                                                $sql_getProductCategory = "SELECT * FROM sanpham WHERE maDanhMuc='" . $row_getCategory['maDanhMuc'] . "'";
                                                                $query_getProductCategory = mysqli_query($mysqli, $sql_getProductCategory);
                                                                while ($row_getProductCategory = mysqli_fetch_array($query_getProductCategory)) {
                                                                    ?>
                                                                            <a
                                                                                href="../product/productDetail.php?id=<?php echo $row_getProductCategory['maSanPham']; ?>"><?php echo $row_getProductCategory['tenSanPham']; ?></a>
                                                                <?php } ?>
                                                            </span>
                                                            <?php
                                                } ?>

                                            </div>
                                        </div>
                                    </li>
                                    <li class="mega-women"><a href="../product/categoryList.php"
                                            style="color: black;">Danh mục</a>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mobile-menu">
                            <nav>
                                <ul>
                                    <li><a href="../index.html">Trang Chủ</a>
                                    </li>
                                    <li><a href="#">Sản phẩm</a>
                                        <ul>
                                            <?php
                                            while ($row_getCategoryMobile = mysqli_fetch_array($query_getCategoryMobile)) {

                                                ?>
                                                        <li><a
                                                                href="../product/allCategory.php?id=<?php echo $row_getCategoryMobile['maDanhMuc']; ?>"><?php echo $row_getCategoryMobile['tenDanhMuc']; ?></a>
                                                        </li>
                                            <?php } ?>
                                        </ul>

                                    </li>
                                    <li class="mega-women"><a style="color: black;">Sản Phẩm</a>



                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- cart begin-->
    <div class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="index.html" title="go to homepage">Trang chủ<span>/</span></a> </li>
                            <li><strong> Giỏ hàng của bạn</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table-bordered table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th class="cart-item-img">Ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="edit">Size</th>

                                    <th class="unit-price">Giá sản phẩm</th>
                                    <th class="quantity">Số lượng</th>
                                    <th class="subtotal">Tổng giá sản phẩm</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $i = 0;
                                $allMoney = 0;
                                $allAmount = 0;
                                ?>
                                        <tbody class="text-center">
                                            <?php

                                            foreach ($_SESSION['cart'] as $value) {

                                                foreach ($value as $data) {
                                                    $i++;
                                                    $moneyOneProduct = $data['qty'] * $data['giaBan'];

                                                    ?>

                                                                    <tr>
                                                                        <td>
                                                                            <?= $i ?>
                                                                        </td>
                                                                        <td class="cart-item-img">
                                                                            <a href="single-product.html">
                                                                                <img src="../image/product/<?= $data['hinhAnh'] ?>" alt=""
                                                                                    style="width:50px;height:50px">
                                                                            </a>
                                                                        </td>
                                                                        <td class="cart-product-name">
                                                                            <a>
                                                                                <?= $data['tenSanPham'] ?>
                                                                            </a>
                                                                        </td>
                                                                        <td class="edit">
                                                                            <a>
                                                                                <?= $data['size'] ?>
                                                                            </a>
                                                                        </td>
                                                                        <td class="move-wishlist">
                                                                            <a>
                                                                                <?= currency_format($data['giaBan']) ?>
                                                                            </a>
                                                                        </td>
                                                                        <td class="unit-price">
                                                                            <span>
                                                                                <?= $data['qty'] ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="quantity">
                                                                            <span>
                                                                                <?= currency_format($moneyOneProduct) ?>
                                                                            </span>
                                                                        </td>
                                                                        <td class="remove-icon">
                                                                            <a href="#" data-toggle="modal" data-target="#myModal" name="product-<?php echo$data['id']?>">
                                                                              Xóa
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <!-- Modal-->
                                                                <!-- Modal Delete Product-->
                                                                <div id="myModal" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <div class="modal-content" style="text-align:center;width:600px">
                                                                            </br>
                                                                            </br>
                                                                            <div class="modal-body">
                                                                                <h5>Bạn có chắc muốn xóa sản phẩm này chứ ?</5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" style="background:#d3f3f5 "><a
                                                                                        href="actionProduct.php?id_product=<?= $data['id'] ?>&size=<?php echo $data['size'] ?>">Xóa</a></button>
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                                                                    style="background:#f3b6b6">Không</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- END Modal Delete Product-->

                                                                <?php
                                                }
                                            }
                            } else {
                                ?>
                                        <h4>Không có gì trong giỏ hàng</h4>
                                        <?php
                            }
                            ?>
                        </table>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $allAmount = 0;
                            foreach ($_SESSION['cart'] as $value) {
                                foreach ($value as $data) {
                                    $moneyOneProduct = $data['qty'] * $data['giaBan'];
                                    $allAmount += $moneyOneProduct;
                                }
                            }
                        }
                        ?>


                        <div class="shopping-button">
                            <div class="continue-shopping">
                                <button type="submit" style="border: solid 1px;" name="btn-continue-add"><a href="../index.php"
                                        style="font-weight:bold">Tiếp tục mua hàng</a></button>
                            </div>
                            <div class="shopping-cart-left">
                                <?php
                                if (isset($_SESSION['cart'])) { ?>
                                            <button type="submit" style="border: solid 1px;font-weight:bold;color: #6a6a6a"
                                                data-toggle="modal" data-target="#clearCart">Xóa giỏ hàng</button>
                                <?php } ?>

                                <button type="submit" style="border: solid 1px;"><a href="index.php"
                                        style="font-weight:bold">Tải lại giỏ hàng</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_SESSION['cart'])) { ?>
                        <div class="row">
                            <div class="col-sm-4" style="float:right">
                                <div class="totals">
                                    <p>Tổng giá<span>
                                            <?= currency_format($allAmount) ?>
                                        </span> </p>
                                    <h3>Thành tiền<span>
                                            <?= currency_format($allAmount) ?>
                                        </span></h3>
                                    <div class="shopping-button">
                                        <button type="submit"
                                            style="height:60px;border: solid 1px;font-weight:bold;color: #6a6a6a"><a
                                                href="../paymentOrder" style="font-weight:bold">Thanh toán đơn hàng</a></button>
                                    </div>
                                </div>
                            </div>
                <?php } ?>

            </div>

        </div>
    </div>
    <!--  cart end-->
    <!-- single product details start -->
    <div class="single-product-details">
        <div class="container">
            <div class="row">

            </div>
        </div>
        <!-- single product details end -->
        <!--Sản phẩm mới -->

        <!-- Hết Sản phẩm mới -->

        <!--Sản phẩm mới -->
        <div class="new-product home2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title">
                            <h2>Sản Phẩm mới</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=""  style="display: inline-flex;">
                        <?php while ($row_productInfoSanPhamMoi = mysqli_fetch_array($query_productInfoSanPhamMoi)) {
                            ?>
                                    <div class="col-md-12">
                                        <div class="single-product">
                                            <div class="level-pro-new">
                                                <span>Mới</span>
                                            </div>
                                            <div class="">
                                                <a
                                                    href="../product/productDetail.php?id=<?php echo $row_productInfoSanPhamMoi['maSanPham'] ?>">
                                                    <img src="../image/product/<?php echo $row_productInfoSanPhamMoi['hinhAnh'] ?>"
                                                        alt="" class="primary-img" style="width:262px;height:262px">
                                             
                                                </a>
                                            </div>
                                            <div class="actions">
                                                <button type="submit" class="cart-btn" title="Add to cart">Thêm vào giỏ</button>
                                                <ul class="add-to-link">
                                                    <li><a
                                                            href="../product/productDetail.php?id=<?php echo $row_productInfoSanPhamMoi['maSanPham'] ?>">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-price">
                                                <div class="product-name">
                                                    <a href="../product/productDetail.php?id=<?php echo $row_productInfoSanPhamMoi['maSanPham'] ?>"
                                                        title="Fusce aliquam"><?php echo $row_productInfoSanPhamMoi['tenSanPham'] ?></a>
                                                </div>
                                                <div class="price-rating">
                                                    <span>
                                                        <?php echo currency_format($row_productInfoSanPhamMoi['giaBan']) ?>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hết Sản phẩm mới -->
        <!--Sản phẩm bán chạy -->
        <div class="new-product home2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title">
                            <h2>Sản phẩm bán chạy</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=""  style="display: inline-flex;">
                        <?php while ($row_productInfoBestSeller = mysqli_fetch_array($query_productInfoBestSeller)) {
                            ?>
                                    <div class="col-md-12">
                                        <div class="single-product">
                                            <div class="level-pro-new">
                                                <span>Mới</span>
                                            </div>
                                            <div class="">
                                                <a
                                                    href="../product/productDetail.php?id=<?php echo $row_productInfoBestSeller['maSanPham'] ?>">
                                                    <img src="../image/product/<?php echo $row_productInfoBestSeller['hinhAnh'] ?>"
                                                        alt="" class="primary-img" style="width:262px;height:262px">
                                              
                                                </a>
                                            </div>
                                            <div class="actions">
                                                <button type="submit" class="cart-btn" title="Add to cart">Thêm vào giỏ</button>
                                                <ul class="add-to-link">
                                                    <li><a
                                                            href="../product/productDetail.php?id=<?php echo $row_productInfoBestSeller['maSanPham'] ?>">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product-price">
                                                <div class="product-name">
                                                    <a href="../productDetail.php?id=<?php echo $row_productInfoBestSeller['maSanPham'] ?>"
                                                        title="Fusce aliquam"><?php echo $row_productInfoBestSeller['tenSanPham'] ?></a>
                                                </div>
                                                <div class="price-rating">
                                                    <span>
                                                        <?php echo currency_format($row_productInfoBestSeller['giaBan']) ?>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hết Sản phẩm bán chạy -->
        <!-- Modal Delete All Product-->
        <div id="clearCart" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="text-align:center;width:600px">
                    </br>
                    </br>
                    <div class="modal-body">
                        <h5>Bạn có chắc muốn xóa hết đồ trong giỏ chứ ?</5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" style="background:#d3f3f5 "><a
                                href="actionProduct.php?deleteAllCart=1"name="detele-all-cart">Xóa</a></button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                            style="background:#f3b6b6">Không</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Delete All Product-->
        <!--END  Modal-->
        <!-- footer top area start -->
        <footer>
            <div class="footer-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="footer-contact">
                                <img src="../#" alt="">
                                <p>Trang web được xây dựng bởi Quốc Bảo Shop, dưới đây là thông tin liên lạc: </p>
                                <ul class="address">

                                    <li>
                                        <span class="fa fa-phone"></span>
                                        038 246 0421
                                    </li>
                                    <li>
                                        <span class="fa fa-github"></span>
                                        github.com
                                    </li>
                                    <li>
                                        <span class="fa fa-envelope-o"></span>
                                        038 246 0421
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 hidden-sm">
                            <div class="footer-tweets">
                                <div class="footer-title">
                                    <h3>Mô tả</h3>
                                </div>
                                <div class="twitter-text" style="float:left;">
                                    <p>Đây là trang web bán quần áo thời trang dựa trên trang web https://dirtycoins.vn/
                                        được tạo ra nhằm phục vụ cho môn học Phát triển phần mềm mã nguồn mở, Dưới đây
                                        là link source code</p>
                                    <a
                                        href="https://github.com/Dung-Vu/-sell-men-s-clothes">https://github.com/Dung-Vu/-sell-men-s-clothes</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="footer-support">
                                <div class="footer-title">
                                    <h3>Họ và tên thành viên nhóm</h3>
                                </div>
                                <div class="footer-menu">
                                    <ul>
                                        <li><a href="#">Nguyễn Hà Quốc Bảo</a></li>
                                        <li><a href="#">Phan Thanh Du</a></li>
                                        <li><a href="#">Vũ Đình Dũng</a></li>
                                        <li><a href="#">Phạm Minh Đảo</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="footer-info" style="width: 170px;">
                                <div class="footer-title">
                                    <h3>Mã số sinh viên</h3>
                                </div>
                                <div class="footer-menu">
                                    <ul>

                                        <li><a href="#">311 941 0032</a></li>
                                        <li><a href="#">311 941 0061</a></li>
                                        <li><a href="#">311 941 0067</a></li>
                                        <li><a href="#">311 941 0080</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer area end -->

        <!-- jquery
        ============================================ -->
        <script src="../js/vendor/jquery-1.12.1.min.js"></script>
        <!-- bootstrap JS
        ============================================ -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- wow JS
        ============================================ -->
        <script src="../js/wow.min.js"></script>
        <!-- price-slider JS
        ============================================ -->
        <script src="../js/jquery-price-slider.js"></script>
        <!-- nivoslider JS
        ============================================ -->
        <script src="../lib/js/jquery.nivo.slider.js"></script>
        <script src="../lib/home.js"></script>
        <!-- meanmenu JS
        ============================================ -->
        <script src="../js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
        ============================================ -->
        <script src="../js/owl.carousel.min.js"></script>
        <!-- elevatezoom JS
        ============================================ -->
        <script src="../js/jquery.elevatezoom.js"></script>
        <!-- scrollUp JS
        ============================================ -->
        <script src="../js/jquery.scrollUp.min.js"></script>
        <!-- plugins JS
        ============================================ -->
        <script src="../js/plugins.js"></script>
        <!-- main JS
        ============================================ -->
        <script src="../js/main.js"></script>
</body>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->

</html>