<?php
  include("../conection.php"); 
  session_start();
  echo $_GET['id_product'];
  echo $_GET['size'];
  if(isset($_GET['id_product'])&& $_GET['size']){
    $id=$_GET['id_product'];
    $size= $_GET['size'];
    unset($_SESSION['cart'][$id][$size]);
    header('location:index.php');
  }
   if(isset($_GET['deleteAllCart'])){
    unset($_SESSION['cart']);
    header('location:index.php');
  }
?>
