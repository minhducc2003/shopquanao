<?php
include("../conection.php");
session_start();
if (!isset($_SESSION['maQuanLy'])) {
  header('location:login.php');
}
$id = $_SESSION['maQuanLy'];
$sql_quanly = "SELECT * FROM quanly WHERE maQuanLy = $id LIMIT 1";
$query_quanly = mysqli_query($mysqli, $sql_quanly);
$row_quanly = mysqli_fetch_array($query_quanly);
//get count of Orders
$trangThaiDonHang = '0';
$sql_getNewOrder = "SELECT  * FROM donhang ";
$query_getNewOrder = mysqli_query($mysqli, $sql_getNewOrder);
// get count of Customer
$sql_getCus = "SELECT  * FROM khachhang ";
$query_getCus = mysqli_query($mysqli, $sql_getCus);
//get Order not success
$sql_getOrdersNotSuccess = "SELECT * FROM donhang WHERE trangThaiDonHang=$trangThaiDonHang";
$query_getOrdersNotSuccess = mysqli_query($mysqli, $sql_getOrdersNotSuccess);


if (isset($_GET['errCode'])) {
  if ($_GET['errCode'] == 0) {
    $result = "Xác nhận đơn hàng thành công !";
  } elseif ($_GET['errCode'] == 1) {
    $result = "Xác nhận đơn hàng Thất bại !";
  }
}
if (!function_exists('currency_format')) {
  function currency_format($number, $suffix = 'đ')
  {
    if (!empty($number)) {
      return number_format($number, 0, ',', '.') . "{$suffix}";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->


    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("menu.php"); ?>
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Thống Kê</h1>

            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $newOrder = 0;
                  $successOrder = 0;
                  $sum = 0;
                  $Money = 0;
                  while ($row = mysqli_fetch_array($query_getNewOrder)) {

                    if ($row['trangThaiDonHang'] == 0) {
                      $newOrder++;
                    } else {
                      $Money += $row['tongGia'];
                      $successOrder++;
                    }
                  }
                  ?>
                  <h3>
                    <?php echo $newOrder ?>
                  </h3>
                  <p>Đơn hàng đang chờ xác nhận
                  </p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php echo $successOrder ?><sup style="font-size: 20px"></sup>
                  </h3>

                  <p>Đơn hàng thành công</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <?php
                  $getCus = 0;
                  while ($row_getCus = mysqli_fetch_array($query_getCus)) {
                    $getCus++;
                  }
                  ?>
                  <h3>
                    <?php echo $getCus ?>
                  </h3>

                  <p>Khách hàng đã đăng kí</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                    <?php echo currency_format($Money) ?>
                  </h3>
                  <p>Doanh thu đạt được</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>

              </div>
            </div>
            <!-- ./col -->

            <div class="card-body">
              <h3 class="m-0">Đơn hàng chưa xác nhận</h3>
              <h4 style="text-align: center; color:red">
                <?php if (isset($result))
                  echo $result ?>
                </h4>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã đơn hàng</th>
                      <th>Mã khách hàng</th>
                      <th>Ghi chú</th>
                      <th>Tổng giá</th>
                      <th>Giời gian tạo</th>
                      <th>Tùy chỉnh</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                $std = 0;
                while ($row_getOrdersNotSuccess = mysqli_fetch_array($query_getOrdersNotSuccess)) {
                  $std++;
                  ?>
                    <tr>
                      <td>
                        <?php echo $std ?>
                      </td>
                      <td>
                        <?php echo $row_getOrdersNotSuccess['maDonHang'] ?>
                      </td>
                      <td>
                        <?php echo $row_getOrdersNotSuccess['maKhachHang'] ?>
                      </td>
                      <td>
                        <?php echo $row_getOrdersNotSuccess['ghiChu'] ?>
                      </td>
                      <td>
                        <?php echo $row_getOrdersNotSuccess['tongGia'] ?>
                      </td>
                      <td>
                        <?php echo $row_getOrdersNotSuccess['thoiGian'] ?>
                      </td>

                      <td>
                        <a type="button" class="btn btn-primary" style="margin-bottom: 10px;"
                          href="../function.php?idOrderSuccess=<?php echo $row_getOrdersNotSuccess['maDonHang'] ?>">
                          Xác nhận
                        </a>
                        <a type="button" class="btn btn-primary"
                          style="margin-bottom: 10px;background-color: #DB0D0D; border-color: #DB0D0D;" href="">
                          Hủy
                        </a>

                      </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>

                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.row -->
          <!-- Main row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <?php include("footer.php") ?>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


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


</body>

</html>