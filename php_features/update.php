<?php
  session_start();
  if(!isset($_SESSION['id'])) {
    header("Location: ../php_main/login.php");
  }
  if($_SESSION['role'] != "Admin") {
    header("Location: ../php_main/home.php");
  }
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $birthdate = $_POST['birthdate'];
  $phone = $_POST['phone'];
  $role = $_POST['role'];
  $id = $_SESSION['editID'];
  require_once '../php_assets/config.php';
  if(isset($_POST['password']) && $_POST['password'] != "") {
    $password = md5($_POST['password']);
    $query = "UPDATE users SET name = '$name', lastname = '$lastname', email = '$email', birthdate = '$birthdate', phone = '$phone', role = '$role', password = '$password' WHERE id = '$id'";
  }
  else {
    $query = "UPDATE users SET name = '$name', lastname = '$lastname', email = '$email', birthdate = '$birthdate', phone = '$phone', role = '$role' WHERE id = '$id';";
  }
  $result = $conexion->query($query);
  $conexion->close();
  header("Location: ../php_main/users.php");
