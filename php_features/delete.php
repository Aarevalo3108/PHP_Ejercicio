<?php
  session_start();
  if(!isset($_SESSION['id'])) {
    header("Location: ../php_main/login.php");
  }
  if($_SESSION['role'] != "admin") {
    header("Location: ../php_main/home.php");
  }
  require_once '../php_assets/config.php';
  $id = $_GET['id'];
  $query = "DELETE FROM users WHERE id = '$id'";
  $result = $conexion->query($query);
  $conexion->close();
  header("Location: ../php_main/users.php");
?>