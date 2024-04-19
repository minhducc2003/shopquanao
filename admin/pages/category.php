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


$sql_getAllCategory = "SELECT * FROM danhmuc ORDER By maDanhMuc DESC";
$query_getAllCategory = mysqli_query($mysqli, $sql_getAllCategory);

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
            <a href="bills.php" class="nav-link ">
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
              <h1>Quản lý danh mục</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="#">Quản lý danh mục</a></li>
              </ol>
            </div>
          </div>
          <a type="button" class="btn btn-block btn-success" style="float:right;width: 150px; text-align: center;"
            href="addCategory.php">Thêm danh mục</a>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Mã Danh Mục</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Trạng thái danh mục</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      while ($row_getAllCategory = mysqli_fetch_array($query_getAllCategory)) {
                        $i++;
                        $sql_getNameLevel = "SELECT tenTrangThai,maTrangThai FROM trangthaisanpham WHERE maTrangThai='" . $row_getAllCategory['trangThaiSanPham'] . "' LIMIT 1";
                        $query_getNameLevel = mysqli_query($mysqli, $sql_getNameLevel);
                        $row_getNameLevel = mysqli_fetch_array($query_getNameLevel);
                        ?>
                        <tr>
                          <td>
                            <?php echo $i ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCategory['maDanhMuc'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCategory['tenDanhMuc'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCategory['moTa'] ?>
                          </td>
                          <td>
                            <?php echo $row_getNameLevel['tenTrangThai'] ?>
                          </td>
                          <td style="width: 110px; display: flex;">
                            <a style="float:left;"
                              href="actionCategory.php?id=<?php echo $row_getAllCategory['maDanhMuc'] ?>"><button
                                class="btn btn-primary">Sửa</button> </a>
                            <a style="float: right;" href="../../function.php?deleteCategory"><button
                                style="background-color:red;border-color: red;" class="btn btn-primary">Xóa</button></a>
                            </a>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
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
                    <tfoot>
                    </tfoot>
                  </table>
                  </table>
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