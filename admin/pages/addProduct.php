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

//get category
$sql_getCategory = "SELECT * FROM danhmuc ORDER BY maDanhMuc DESC";
$query_getCategory = mysqli_query($mysqli, $sql_getCategory);

//get levelproduct
$sql_getLevelProduct = "SELECT * FROM trangthaisanpham ORDER BY maTrangThai DESC";
$query_getLevelProduct = mysqli_query($mysqli, $sql_getLevelProduct);

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
            <a href="category.php" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản Lý Danh Mục
              </p>
            </a>
            <a href="bills.php" class="nav-link">
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
              <h1>Thêm sản phẩm</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="product.php">Quản lý sản phẩm</a></li>
              </ol>
            </div>
          </div>


        </div>

      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <form action="../../function.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group" style="width:70%">
                      <label>Tên sản phẩm</label>
                      <input type="text" class="form-control" value="" name="tenSanPham" required>
                    </div>
                    <div class="form-group" style="width:70%">
                      <label>Danh Mục</label>
                      <select id="inputStatus" class="form-control custom-select" name="maDanhMuc" required>
                        <?php while ($row_getCategory = mysqli_fetch_array($query_getCategory)) {
                          ?>
                          <option value="<?php echo $row_getCategory['maDanhMuc'] ?>"><?php echo $row_getCategory['tenDanhMuc'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group" style="width:70%">
                      <label>Giá sản phẩm</label>
                      <input type="text" class="form-control" value="" name="giaBan" required>
                    </div>
                    <div class="form-group" style="width:70%">
                      <label>Mô tả</label>
                      <textarea name="moTa" class="form-control" id="intro" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-group" style="width:70%">
                      <label>Số lượng</label>
                      <input type="text" class="form-control" value="" name="soLuong" required>
                    </div>
                    <div class="form-group" style="width:70%">
                      <label>Trạng thái sản phẩm</label>
                      <select id="inputStatus" class="form-control custom-select" name="maTrangThai" required>
                        <?php while ($row_getLevelProduct = mysqli_fetch_array($query_getLevelProduct)) {
                          ?>
                          <option value="<?php echo $row_getLevelProduct['maTrangThai'] ?>"><?php echo $row_getLevelProduct['tenTrangThai'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group" style="width:70%">
                      <label for="exampleInputFile">Hình ảnh</label>
                      <input class="form-control" type="file" name="image" style="margin-top:5px;" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="addProduct" value="Thêm sản phẩm"
                      style="margin-left: 30%;">
                  </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  <script src="../../js/vendor/jquery-1.12.1.min.js"></script>
  <!-- bootstrap JS
        ============================================ -->
  <script src="../../js/bootstrap.min.js"></script>
  <!-- wow JS
        ============================================ -->
  <script src="../../js/wow.min.js"></script>
  <!-- price-slider JS
        ============================================ -->
  <script src="../../js/jquery-price-slider.js"></script>
  <!-- nivoslider JS
        ============================================ -->
  <script src="../../lib/js/jquery.nivo.slider.js"></script>
  <script src="../../lib/home.js"></script>
  <!-- meanmenu JS
        ============================================ -->
  <script src="../../js/jquery.meanmenu.js"></script>
  <!-- owl.carousel JS
        ============================================ -->
  <script src="../../js/owl.carousel.min.js"></script>
  <!-- elevatezoom JS
        ============================================ -->
  <script src="../../js/jquery.elevatezoom.js"></script>
  <!-- scrollUp JS
        ============================================ -->
  <script src="../../js/jquery.scrollUp.min.js"></script>
  <!-- plugins JS
        ============================================ -->
  <script src="../../js/plugins.js"></script>
  <!-- main JS
        ============================================ -->
  <script src="../../js/main.js"></script>
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