<?php
include("../conection.php");
session_start();

if (isset($_POST['btn-cmt'])) {
       $id = $_GET["id"];
       $idCus = $_SESSION['maKhachHang'];
       $ThoiGianLap = date("Y-m-d H:i:s");
       $comment = $_POST['comment'];
       if ($_POST['comment'] != "") {
              $sql_InsertComment = " INSERT INTO binhluan(maSanPham,maKhachHang,noiDung,thoiGianBinhLuan) VALUES ('" . $id . "','" . $idCus . "','" . $comment . "','" . $ThoiGianLap . "') LIMIT 1 ";
              mysqli_query($mysqli, $sql_InsertComment);

              header("Location:productDetail.php?id=$id&errCode=0");
       } else {
              header("Location:productDetail.php?id=$id&errCode=1");
       }
}
?>