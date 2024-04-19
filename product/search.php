<?php
include("../conection.php");
session_start();

if(isset($_POST['search_by'])){
     
       if($_POST['search']!=""){
       if ($_POST['search_by'] == "name") {
             $queryProduct = "SELECT * FROM sanpham WHERE tenSanPham LIKE '%{$_POST['search']}%'"; 
        $resultProduct= mysqli_query($mysqli, $queryProduct);
       }
      else if ($_POST['search_by']== "category") {
        // Sử dụng câu truy vấn WHERE để lọc các sản phẩm thuộc danh mục tìm kiếm
        $queryCategory = "SELECT * FROM danhmuc WHERE tenDanhMuc LIKE '%{$_POST['search']}%'"; 
        $resultCategory = mysqli_query($mysqli, $queryCategory);
       }
      }else{
            header("location:../index.php?errCode=1");
      }
}
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
?>

<!doctype html>
<html class="no-js" lang="">

<head>
       <meta charset="utf-8">
       <meta http-equiv="x-ua-compatible" content="ie=edge">
       <title> DirtyCoins Clone </title>
       <meta name="description" content="">
       <meta name="viewport" content="width=device-width, initial-scale=1">


       <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">

       <!-- Google Fonts
        ============================================ -->
       <link href='https://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet'
              type='text/css'>

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

       <script src="../js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

       <header>
              <div class="top-link">
                     <div class="container">
                            <div class="row">
                                   <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">

                                   </div>
                                   <div class="col-md-2 col-sm-3">
                                          <div class="dashboard">

                                                 <div class="account-menu">
                                                        <ul>
                                                               <li class="search">
                                                                      <a href="#">

                                                                             <i class="fa fa-search"></i>

                                                                      </a>
                                                                      <ul class="search">
                                                                          <form action="#" method="POST">
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
                                                                             <i class="fa fa-bars"></i>
                                                                      </a>
                                                                      <ul>
                                                                             <li><a href="my-account.html">Thông tin tài
                                                                                           khoản</a></li>
                                                                             <li><a href="cart.html">Giỏ hàng</a></li>
                                                                             <?php
                                                                             if (isset($_SESSION['maKhachHang'])) {
                                                                                    ?>
                                                                                    <li>
                                                                                           <form action="function.php"
                                                                                                  method="post"><button
                                                                                                         name="logout-user"
                                                                                                         style="background-color: unset; border: none; color: white;">Đăng
                                                                                                         Xuất</button></form>
                                                                                    </li>
                                                                                    <?php
                                                                             } else {
                                                                                    ?>
                                                                                    <li><a href="user/login.php">Đăng nhập</a>
                                                                                    </li>
                                                                                    <?php
                                                                             }
                                                                             ?>

                                                                      </ul>
                                                               </li>
                                                        </ul>

                                                 </div>
                                                 <div class="cart-menu">
                                                        <ul>


                                                               <li><a href="../cart/index.php"> 
                                                                      </a>

                                                               </li>

                                                        </ul>
                                                 </div>
                                                 <div class="cart-menu"><i class="fa fa-sign-in"
                                                               style="width:30px;height:30px"></i></div>
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
                                                 <a href="../index.php" style="margin-top: 5px;border-radius:50%">
                                                        <img src="../image/logo.png" alt="" style="border-radius:50%">
                                                 </a>
                                          </div>
                                   </div>
                                   <div class="col-md-9">
                                          <div class="mainmenu" style="color: black;">
                                                 <nav>
                                                        <ul style="padding-left:40px">
                                                               <li><a href="../">Trang Chủ</a>

                                                               </li>

                                                               <li class="mega-women"><a href="allProduct.php">Sản
                                                                             Phẩm</a>
                                                                      <div class="mega-menu women">
                                                                             <div class="part-1" style="display:flex;">
                                                                                    <?php
                                                                                    while ($row_getCategory = mysqli_fetch_array($query_getCategory)) {

                                                                                           ?>
                                                                                           <span>
                                                                                                  <a
                                                                                                         href="allCategory.php?id=<?php echo $row_getCategory['maDanhMuc']; ?>">
                                                                                                         <?php echo $row_getCategory['tenDanhMuc']; ?></a>
                                                                                                  <?php
                                                                                                  $sql_getProductCategory = "SELECT * FROM sanpham WHERE maDanhMuc='" . $row_getCategory['maDanhMuc'] . "'";
                                                                                                  $query_getProductCategory = mysqli_query($mysqli, $sql_getProductCategory);
                                                                                                  while ($row_getProductCategory = mysqli_fetch_array($query_getProductCategory)) {
                                                                                                         ?>
                                                                                                         <a
                                                                                                                href="productDetail.php?id=<?php echo $row_getProductCategory['maSanPham']; ?>"><?php echo $row_getProductCategory['tenSanPham']; ?></a>
                                                                                                  <?php } ?>
                                                                                           </span>
                                                                                           <?php
                                                                                    } ?>

                                                                             </div>
                                                                      </div>
                                                               </li>
                                                               <li class="mega-women"><a href="#">Danh mục</a>

                                                               </li>
                                                               <li class="mega-men"><a href="#">Liên Hệ</a>
                                                               </li>
                                                        </ul>
                                                 </nav>
                                          </div>
                                   </div>
                                   <div class="col-sm-12">
                                          <div class="mobile-menu">
                                                 <nav>
                                                        <ul>
                                                               <li><a href="../index.php">Trang Chủ</a>
                                                               </li>
                                                               <li><a href="#">Danh mục</a></li>
                                                               <li><a href="allProduct.php">Sản phẩm</a>
                                                                      <ul>
                                                                             <?php
                                                                             while ($row_getCategoryMobile = mysqli_fetch_array($query_getCategoryMobile)) {
                                                                                    ?>
                                                                                    <li><a href="allCategory.php?id=<?php echo $row_getCategoryMobile['maDanhMuc']; ?>"><?php echo $row_getCategoryMobile['tenDanhMuc']; ?></a>
                                                                                    </li>
                                                                             <?php } ?>
                                                                      </ul>

                                                               </li>
                                                               <li><a href="../shop.html">Liên Hệ</a>
                                                               </li>
                                                        </ul>
                                                 </nav>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
       </header>
       <!-- header area end -->
       <!-- slider area start -->
       <div class="slider-area home2">
              <div class="bend niceties preview-2">
                     <div id="nivoslider" class="slides">
                            <img src="../image/slider/slider8.jpg" alt="" title="#slider-direction-1" />
                            <img src="../image/slider/slider8.jpg" alt="" title="#slider-direction-2" />
                     </div>
                     <!-- direction 1 -->
                     <div id="slider-direction-1" class="t-cn slider-direction">
                            <div class="slider-progress"></div>
                            <div class="slider-content t-lfl s-tb slider-1">
                                   <div class="title-container s-tb-c title-compress">
                                          

                                   </div>
                            </div>
                     </div>
                     <!-- direction 2 -->
                     <div id="slider-direction-2" class="slider-direction">
                            <div class="slider-progress"></div>
                            <div class="slider-content t-lfl s-tb slider-2">
                                   <div class="title-container s-tb-c">
              

                                   </div>
                            </div>
                     </div>
              </div>
       </div>
       <!-- slider area end -->
       <!--Sản phẩm mới -->
       
              <div class="new-product home2">
                     <div class="container">
                            <div class="row">
                                   <div class="col-md-12">
                                          <div class="product-title">
                                                 <h2>
                                                        Kết quả
                                                 </h2>
                                          </div>
                                   </div>
                            </div>
                            <div class="row">
                                   <div class="features-home2-slider">
                                          <?php
                                          if(isset($resultProduct)){
                                      
                                          while ($row_resultProduct = mysqli_fetch_array($resultProduct)) {
                                                 ?>
                                                 <div class="col-md-12">
                                                        <div class="single-product">
                                                               <div class="level-pro-new">
                                                                      <span>Mới</span>
                                                               </div>
                                                               <div class="product-img">
                                                                      <a
                                                                             href="productDetail.php?id=<?php echo $row_resultProduct['maSanPham'] ?>">
                                                                             <img src="../image/product/<?php echo $row_resultProduct['hinhAnh'] ?>"
                                                                                    alt="" class="primary-img"
                                                                                    style="width:262px;height:262px">
                                                                             <img src="../image/product/<?php echo $row_resultProduct['hinhAnh'] ?>"
                                                                                    alt="" class="secondary-img"
                                                                                    style="width:262px;height:262px">
                                                                      </a>
                                                               </div>
                                                               <div class="actions" style="width:100%">
                                                                      <button type="submit" class="cart-btn" title="Add to cart"><a
                                                                                    style="color:white"
                                                                                    href="productDetail.php?id=<?php echo $row_resultProduct['maSanPham'] ?>">Xem
                                                                                    chi tiết</a></button>
                                                               </div>
                                                               <div class="product-price">
                                                                      <div class="product-name">
                                                                             <a href="productDetail.php?id=<?php echo $row_resultProduct['maSanPham'] ?>"
                                                                                    title="Fusce aliquam"><?php echo $row_resultProduct['tenSanPham'] ?></a>
                                                                      </div>
                                                                      <div class="price-rating">
                                                                             <span>
                                                                                    <?php echo $row_resultProduct['giaBan'] ?>
                                                                             </span>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                 </div>
                                          <?php 
                                   }
                                   }else  if(isset($resultCategory)){
              
                                          while ($row_resultCategory = mysqli_fetch_array($resultCategory)) {
                                               $sql_product = "SELECT * FROM sanpham  WHERE maDanhMuc='".$row_resultCategory['maDanhMuc']."' ";
                                                 $query_product= mysqli_query($mysqli, $sql_product);
                                                  while ($row_query_product = mysqli_fetch_array($query_product)) {
                                   ?>
                                          <div class="col-md-12">
                                                        <div class="single-product">
                                                               <div class="level-pro-new">
                                                                      <span>Mới</span>
                                                               </div>
                                                               <div class="product-img">
                                                                      <a
                                                                             href="productDetail.php?id=<?php echo $row_query_product['maSanPham'] ?>">
                                                                             <img src="../image/product/<?php echo $row_query_product['hinhAnh'] ?>"
                                                                                    alt="" class="primary-img"
                                                                                    style="width:262px;height:262px">
                                                                             <img src="../image/product/<?php echo $row_query_product['hinhAnh'] ?>"
                                                                                    alt="" class="secondary-img"
                                                                                    style="width:262px;height:262px">
                                                                      </a>
                                                               </div>
                                                               <div class="actions" style="width:100%">
                                                                      <button type="submit" class="cart-btn" title="Add to cart"><a
                                                                                    style="color:white"
                                                                                    href="productDetail.php?id=<?php echo $row_query_product['maSanPham'] ?>">Xem
                                                                                    chi tiết</a></button>
                                                               </div>
                                                               <div class="product-price">
                                                                      <div class="product-name">
                                                                             <a href="productDetail.php?id=<?php echo $row_query_product['maSanPham'] ?>"
                                                                                    title="Fusce aliquam"><?php echo $row_query_product['tenSanPham'] ?></a>
                                                                      </div>
                                                                      <div class="price-rating">
                                                                             <span>
                                                                                    <?php echo $row_query_product['giaBan'] ?>
                                                                             </span>
                                                                      </div>
                                                               </div>
                                                        </div>
                                                 </div>
                                   <?php
                                                  }
                                          }
                                   }else{
                                          ?>
                                                 <h2>
                                                        Khong tim thay gi
                                                 </h2>
                                   <?php
                                   }
                                   ?>
                                   </div>
                            </div>

                     </div>
              </div>
       
       <!-- Hết Sản phẩm mới -->




       <footer>
              <div class="footer-top-area">
                     <div class="container">
                            <div class="row">
                                   <div class="col-md-3 col-sm-4">
                                          <div class="footer-contact">
                                                 <img src="#" alt="">
                                                 <p>Trang web được xây dựng bởi Quốc Bảo Shop, dưới đây là thông tin
                                                        liên lạc: </p>
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
                                                        <p>Đây là trang web bán quần áo thời trang dựa trên trang web
                                                               https://dirtycoins.vn/ được tạo ra nhằm phục vụ cho môn
                                                               học Phát triển phần mềm mã nguồn mở, Dưới đây là link
                                                               source code</p>
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
       <!-- quickview product start -->
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

</html>
-->