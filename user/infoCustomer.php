<?php
include("../conection.php");
session_start();

if (!isset($_SESSION['maKhachHang'])) {
    header("location: ../user/login.php");
}

//Thong tin khach hang
$sql_InfoCustomer = "SELECT * FROM khachhang WHERE maKhachHang='" . $_SESSION['maKhachHang'] . "' LIMIT 1";
$query_InfoCustomer = mysqli_query($mysqli, $sql_InfoCustomer);
$row_InfoCustomer = mysqli_fetch_array($query_InfoCustomer);

//san pham ban chay
$trangThaiSanPhamBanChay = '5';
$sql_productInfoBestSeller = "SELECT * FROM sanpham  WHERE trangThaiSanPham=$trangThaiSanPhamBanChay ORDER BY maSanPham DESC";
$query_productInfoBestSeller = mysqli_query($mysqli, $sql_productInfoBestSeller);

// san pham moi
$trangThaiSanPhamSanPhamMoi = '4';
$sql_productInfoSanPhamMoi = "SELECT * FROM sanpham  WHERE trangThaiSanPham=$trangThaiSanPhamSanPhamMoi ORDER BY maSanPham DESC";
$query_productInfoSanPhamMoi = mysqli_query($mysqli, $sql_productInfoSanPhamMoi);


// san pham sale 50%
$trangThaiSanPhamSale50 = '3';
$sql_productInfoSale50 = "SELECT * FROM sanpham  WHERE trangThaiSanPham=$trangThaiSanPhamSale50 ORDER BY maSanPham DESC";
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
$sql_getAllOrder = "SELECT  * FROM donhang WHERE maKhachHang='" . $_SESSION['maKhachHang'] . "'";
$query_getAllOrder = mysqli_query($mysqli, $sql_getAllOrder);

if (isset($_GET['errCode'])) {
    if ($_GET['errCode'] == 0) {
        ?>
                        <div id="dnbtdevModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>

                                    </div>
                                    <div class="modal-body">
                                        <h4 style="text-align:center">Sửa thành công</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
    } else if ($_GET['errCode'] == 1) {
        ?>
                                <div id="dnbtdevModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>

                                            </div>
                                            <div class="modal-body">
                                                <h4 style="text-align:center"> Vui lòng nhập đủ thông tin</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
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
     <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script>
        $(window).load(function () {
            $('#dnbtdevModal').modal('show');
        });
    </script>
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="../image/x-icon" href="../img/favicon.ico">

    <!-- Google Fonts
        ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                                            <li><a href="#"name="info-user">Thông tin tài khoản</a></li>
                                            <li><a href="../cart/">Giỏ hàng</a></li>
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
                                    <li><a href="../cart/"></a>
                                        
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

                                    <li class="mega-women"><a  style="color: black;">Sản Phẩm</a>
                                        <div class="mega-menu women">
                                            <div class="part-1" style="display:flex;">
                                                <?php
                                                while ($row_getCategory = mysqli_fetch_array($query_getCategory)) { ?>                                                                                                                                                                                                                          <span>
                                                                                                                                    <a
                                                                                                                                    href="../product/allCategory.php?id=<?php echo $row_getCategory['maDanhMuc']; ?>">
                                                                                                                                    <?php echo $row_getCategory['tenDanhMuc']; ?></a>
                                                                                                                                    <?php
                                                                                                                                    $sql_getProductCategory = "SELECT * FROM sanpham WHERE maDanhMuc='" . $row_getCategory['maDanhMuc'] . "'";
                                                                                                                                    $query_getProductCategory = mysqli_query($mysqli, $sql_getProductCategory);
                                                                                                                                    while ($row_getProductCategory = mysqli_fetch_array($query_getProductCategory)) {
                                                                                                                                        ?><a
                                                                                                                                                                                                                                                          href="../product/productDetail.php?id=<?php echo $row_getProductCategory['maSanPham']; ?>"><?php echo $row_getProductCategory['tenSanPham']; ?></a>
                                                                                                                                    <?php } ?>
                                                                                                                                    </span>
                                                                                                                                    <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mega-women"><a href="../product/categoryList.php" style="color: black;">Danh mục</a>
                                   
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
                                    <li class="mega-women"><a href="../shop.html" style="color: black;">Sản Phẩm</a>
                                    <li><a href="shop.html">Liên Hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="row" style="padding-left:60px;width:50%;float:left">
        
            <h3 style="text-align: center; padding-top: 20px;padding-bottom:10px">Thông tin của bạn</h3>
            <div class="col-md-15" >
                <div class="delivery-details" style="">
                    <div class="form-name">
                          <label>Ten dang nhap<em>*</em> </label>
                             <p><?php echo $row_InfoCustomer['tenDangNhap'] ?></p>
                      </div>
                    <div class="list-style">
                        <div class="form-name">
                            <label >Họ và tên<em>*</em> </label>
                            <input type="text" value="<?php echo $row_InfoCustomer['tenKhachHang'] ?>"
                             readonly>
                        </div>
                        <div class="form-name">
                            <label>Địa chỉ<em>*</em> </label>
                            <input type="text" value="<?php echo $row_InfoCustomer['diaChi'] ?>"  readonly>
                        </div>
                        <div class="form-name">
                            <label >Số điện thoại </label>
                            <input type="text" value="<?php echo $row_InfoCustomer['soDienThoai'] ?> "
                               readonly>
                        </div>
                     <div class="form-name" style="text-align:center">     
                            <a type="submit" class="btn btn-info" 
                     style=" width:15% ;height:40px;padding-top:12px" href="../index.php">Trở về </a>
                                  <a type="submit" class="btn btn-info" 
                                style=" width: 20%;height:40px;background-color:green;font-size:14px" data-toggle="modal" data-target="#myModal">
                                            Sửa thông tin</a>
                            </div>
                      
                    </div>
                </div>
                
            </div>
        </form>
    </div>
                                                    <!-- Modal-->
                                                    <!-- Modal Delete Product-->
                                                    <div id="myModal" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <!-- Modal content-->
                                                            <div class="modal-content" style="padding-left:40px;width:600px">
                                                                </br>
                                                                </br>
                                                                <h4 style="text-align:center">Chỉnh sửa thông tin</h4>
                                                                <form action="../function.php" method="POST">
                                                                <div class="modal-body">
                                                                        <div class="list-style">
                                                                                <div class="form-name">
                                                                                    <label >Họ và tên<em>*</em> </label>
                                                                                    <input type="text" value="<?php echo $row_InfoCustomer['tenKhachHang'] ?>"
                                                                                        name="tenKhachHang" >
                                                                                </div>
                                                                                <div class="form-name">
                                                                                    <label>Địa chỉ<em>*</em> </label>
                                                                                    <input type="text" value="<?php echo $row_InfoCustomer['diaChi'] ?>" name="diaChi" >
                                                                                </div>
                                                                                <div class="form-name">
                                                                                    <label >Số điện thoại </label>
                                                                                    <input type="text" value="<?php echo $row_InfoCustomer['soDienThoai'] ?> "
                                                                                        name="soDienThoai" >
                                                                                </div>
                                                                                     <input type="hidden" value="<?php echo $row_InfoCustomer['maKhachHang'] ?> "
                                                                                        name="maKhachHang" >
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                     <button type="submit" class="btn btn-default" name="fixCus" >
                                                                        Sửa</button>
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal"
                                                                        style="background:#f3b6b6">Không</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>    
    <!--  cart end-->
       <div class="row" style="width:50%;float:right;padding-right:60px">
            <h3 style="text-align: center; padding-top: 20px;padding-bottom:10px">Lịch sử đơn hàng</h3>
                      <div class="panel-body">
                        <div class="confirm-order">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>    
                                            <th>STT</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ghi Chú</th>
                                            <th>Tổng giá</th>
                                            <th>Thời gian đặt</th>
                                            <th>Trạng thái</th>

                                        </tr>
                                    </thead>
                                            <tbody>
                                                 <?php
                                                 $i = 0;
                                                 while ($row_getAllOrder = mysqli_fetch_array($query_getAllOrder)) {
                                                     $i++;
                                                     ?>
                                                                                                                                                                        <tr>
                                                                                                                                                                            <td>
                                                                                                                                                                               <?php echo $i ?>
                                                                                                                                                                            </td>
                                                                                                                                                                            <td>
                                                                                                                                                                                <?php echo $row_getAllOrder['maDonHang'] ?>
                                                                                                                                                                            </td>
                                                                                                                                                                            <td>
                                                                                                                                                                                <?php echo $row_getAllOrder['ghiChu'] ?>
                                                                                                                                                                            </td>
                                                                                                                                                                            <td>
                                                                                                                                                                                <?php echo $row_getAllOrder['tongGia'] ?>
                                                                                                                                                                            </td>
                                                                                                                                                                            <td>
                                                                                                                                                                                <?php echo $row_getAllOrder['thoiGian'] ?>
                                                                                                                                                                            </td>
                                                                                                                                                                               <td>
                                                                                                                                                                                <?php
                                                                                                                                                                                if ($row_getAllOrder['trangThaiDonHang'] == 1) {
                                                                                                                                                                                    echo "Thành công";
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo "Đang chờ duyệt";
                                                                                                                                                                                }
                                                                                                                                                                                ?>
                                                                                                                                                                            </td>
                                                                         
                                                                                                                                                                                <?php
                                                 }
                                                 ?>
                                                                 </tbody>     
                                                            
                                        
                                </table>
                                      
                            </div>
                        </div>
                    </div>
    </div> 
                                           
    <!--Sản phẩm mới -->
    <div class="new-product home2" >
        <div class="container">
            <div class="row">
                <div class="col-md-12"style="padding-top: 150px">
                    <div class="product-title">
                        <h2>Sản Phẩm mới</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="features-home2-slider">
                    <?php while ($row_productInfoSanPhamMoi = mysqli_fetch_array($query_productInfoSanPhamMoi)) {
                        ?>
                                                                                                                                                                               <div class="col-md-12">
                                                                                                                                                                                   <div class="single-product">
                                                                                                                                                                                       <div class="level-pro-new">
                                                                                                                                                                                           <span>Mới</span>
                                                                                                                                                                                       </div>
                                                                                                                                                                                       <div class="product-img">
                                                                                                                                                                                           <a
                                                                                                                                                                                               href="../product/productDetail.php?id=<?php echo $row_productInfoSanPhamMoi['maSanPham'] ?>">
                                                                                                                                                                                               <img src="../image/product/<?php echo $row_productInfoSanPhamMoi['hinhAnh'] ?>"
                                                                                                                                                                                                   alt="" class="primary-img" style="width:262px;height:262px">
                                                                                                                                                                                               <img src="../image/product/<?php echo $row_productInfoSanPhamMoi['hinhAnh'] ?>"
                                                                                                                                                                                                   alt="" class="secondary-img" style="width:262px;height:262px">
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
                <div class="features-home2-slider">
                    <?php while ($row_productInfoBestSeller = mysqli_fetch_array($query_productInfoBestSeller)) {
                        ?>
                                                                                                                                                                               <div class="col-md-12">
                                                                                                                                                                                   <div class="single-product">
                                                                                                                                                                                       <div class="level-pro-new">
                                                                                                                                                                                           <span>Mới</span>
                                                                                                                                                                                       </div>
                                                                                                                                                                                       <div class="product-img">
                                                                                                                                                                                           <a
                                                                                                                                                                                               href="../product/productDetail.php?id=<?php echo $row_productInfoBestSeller['maSanPham'] ?>">
                                                                                                                                                                                               <img src="../image/product/<?php echo $row_productInfoBestSeller['hinhAnh'] ?>"
                                                                                                                                                                                                   alt="" class="primary-img" style="width:262px;height:262px">
                                                                                                                                                                                               <img src="../image/product/<?php echo $row_productInfoBestSeller['hinhAnh'] ?>"
                                                                                                                                                                                                   alt="" class="secondary-img" style="width:262px;height:262px">
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
                            href="actionProduct.php?deleteAllCart=1">Xóa</a></button>
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
                            <p>Trang web được xây dựng bởi Nhóm 9, dưới đây là thông tin liên lạc: </p>
                            <ul class="address">

                            <li>
                                <span class="fa fa-phone"></span>
                                123 456 789
                            </li>
                            <li>
                                <span class="fa fa-github"></span>
                                github.com
                            </li>
                            <li>
                                <span class="fa fa-envelope-o"></span>
                                123 456 789
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
                                    được tạo ra nhằm phục vụ cho môn học Phát triển phần mềm mã nguồn mở, Dưới đây là
                                    link source code</p>
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
                                <li><a href="#">Trịnh Minh Đức</a></li>
                                <li><a href="#">Nguyễn Trung Hiếu</a></li>
                                <li><a href="#">Đường Đình Hiếu</a></li>
                                <li><a href="#">Tạ Văn Thành</a></li>
                                <li><a href="#">Vũ Lê Thái Hà</a></li>
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