<?php
if (isset($_GET['errCode'])) {
    if ($_GET['errCode'] == 1) {
        $result = "Vui Lòng nhập đủ thông tin !";
    } else if ($_GET['errCode'] == 2) {
        $result = "Tài khoản hoặc mật khẩu sai !";
    }
}
?>
<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from preview.hasthemes.com/james-preview/james/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Đăng nhập quản trị </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="../image/x-icon" href="../img/favicon.ico">

    <!-- Google Fonts
        ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet'
        type='../text/css'>

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
    <header>
        <div class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Quản trị viên<span>/</span></a> </li>
                                <li><strong>Đăng nhập</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-text">
                                    <h2>Đăng nhập</h2>
                                    <h3 style="text-align:center;color:red">
                                        <?php if (isset($result))
                                            echo $result ?>
                                        </h3>
                                        <span>Hãy nhập tài khoản và mật khẩu quản trị của bạn</span>
                                    </div>
                                    <div class="login-form">
                                        <form action="../function.php" method="post">
                                            <input type="text" name="admin-name" placeholder="Tài khoản">
                                            <input type="password" name="admin-password" placeholder="Mật khẩu">
                                            <div class="button-box">
                                                <button type="submit" class="default-btn" name="button-login-admin">
                                                    Đăng nhập</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer top area start -->
        <?php include("footer.php") ?>
        <!-- footer top area end -->
        <!-- footer area start -->


        <!-- footer area end -->

</body>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->

</html>