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

$sql_getAllCus = "SELECT * FROM khachhang ORDER By maKhachHang DESC";
$query_getAllCus = mysqli_query($mysqli, $sql_getAllCus);
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
            <a href="bills.php" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Quản Lý Hóa Đơn
              </p>
            </a>

            <a href="users.php" class="nav-link active">
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
              <h1>Quản lý khách hàng</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
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

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Mã khách hàng</th>
                        <th>Tên Đăng nhập</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Ngày đăng kí</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($row_getAllCus = mysqli_fetch_array($query_getAllCus)) {


                        ?>
                        <tr>
                          <td>
                            <?php echo $row_getAllCus['maKhachHang'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCus['tenDangNhap'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCus['tenKhachHang'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCus['diaChi'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCus['email'] ?>
                          </td>
                          <td>
                            <?php echo $row_getAllCus['ngayDangKi'] ?>
                          </td>
                          <td>
                            <a style="float:left;" href="#" data-toggle="modal" data-target="#myModal"><button
                                class="btn btn-primary">Sửa</button> </a>
                            <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal"><button
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
                    <div id="myModal" class="modal" role="dialog">
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
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


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


</body>

</html>