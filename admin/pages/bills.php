<?php
include("../../conection.php");
session_start();
if (!isset($_SESSION['maQuanLy'])) {
  header('location:login.php');
}
$id = $_SESSION['maQuanLy'];
$sql_quanly = "SELECT * FROM quanly WHERE maQuanLy = $id LIMIT 1";
$query_quanly = mysqli_query($mysqli, $sql_quanly);
$row_quanly = mysqli_fetch_array($query_quanly);

$sql_getAllOrders = "SELECT * FROM donhang ORDER By maDonHang DESC";
$query_getAllOrders = mysqli_query($mysqli, $sql_getAllOrders);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size:17px;">
          <?php echo $row_quanly['tenQuanLy'] ?>
        </span>

      </a>
      <!-- Sidebar -->
      <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Thống Kê
              </p>
            </a>
            <a href="product.php" class="nav-link ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản Lý Sản Phẩm
              </p>
            </a>
            <a href="category.php" class="nav-link ">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản Lý Danh Mục
              </p>
            </a>
            <a href="bills.php" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Quản Lý Hóa Đơn
              </p>
            </a>

            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản Lý Khách Hàng
              </p>
            </a>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                  Launch Extra Large Modal
                </button>
                <div class="modal fade" id="modal-xl">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Extra Large Modal</h4>

              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Mã nhân viên</th>
                        <th>Ghi chú</th>
                        <th>Tổng giá</th>
                        <th>Thời gian</th>
                        <th>Trạng thái đơn hàng</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      while ($row_getAllOrders = mysqli_fetch_array($query_getAllOrders)) {
                        $i++;
                        ?>
                        <tr>
                          <td>
                            <?php echo $i ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['maDonHang'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['maKhachHang'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['maNhanVien'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['ghiChu'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['tongGia'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['thoiGian'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllOrders['trangThaiDonHang'] ?>
                          </td>


                        </tr>

                        <?php
                      }
                      ?>

                  </table>
                  <div class="modal" id="modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" style="text-align:center">Chi tiết đơn hàng:
                          </h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" style="padding-top:30px">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Mã Sản Phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>

                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sql_getOrderDetail = "SELECT * FROM chitietdonhang where maDonHang='" . $row_getAllOrders['maDonHang'] . "'";
                              $query_getOrderDetail = mysqli_query($mysqli, $sql_getOrderDetail);
                              ?>
                              <?php
                              while ($row_getOrderDetail = mysqli_fetch_array($query_getOrderDetail)) {
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $row_getOrderDetail['maSanPham'] ?>
                                  </td>
                                  <td>
                                    <?php echo $row_getOrderDetail['tenSanPham'] ?>
                                  </td>
                                  <td>
                                    <?php echo $row_getOrderDetail['soLuong'] ?>
                                  </td>
                                  <td>
                                    <?php echo $row_getOrderDetail['giaSanPham'] ?>
                                  </td>
                                </tr>
                                <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
                <!-- /.card-body -->
              </div>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <<?php include("../footer.php") ?>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Bootstrap CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/font-awesome.min.css">
  <!-- owl.carousel CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/owl.carousel.css">
  <link rel="stylesheet" href="../../css/owl.theme.css">
  <link rel="stylesheet" href="../../css/owl.transitions.css">
  <!-- jquery-ui CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/jquery-ui.css">
  <!-- meanmenu CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/meanmenu.min.css">
  <!-- nivoslider CSS
        ============================================ -->
  <link rel="stylesheet" href="../../lib/css/nivo-slider.css">
  <link rel="stylesheet" href="../../lib/css/preview.css">
  <!-- animate CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/animate.css">
  <!-- magic CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/magic.css">
  <!-- normalize CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/normalize.css">
  <!-- main CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/main.css">
  <!-- style CSS
        ============================================ -->
  <link rel="stylesheet" href="../../style.css">
  <!-- responsive CSS
        ============================================ -->
  <link rel="stylesheet" href="../../css/responsive.css">
  <!-- modernizr JS
        ============================================ -->
  <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
</body>

</html>