<?php
  session_start();
  if(!isset($_SESSION['id'])) {
    header("Location: ../php_main/login.php");
  }
  if($_SESSION['role'] != 'Admin') {
    header("Location: ../php_main/home.php");
  }
  if(isset($_GET['id'])) {
    require '../php_assets/config.php';
    $_SESSION['editID'] = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = " . $_SESSION['editID'];
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $lastname = $row['lastname'];
      $email = $row['email'];
      $password = $row['password'];
      $birthdate = $row['birthdate'];
      $phone = $row['phone'];
      $role = $row['role'];
    }
    $conexion->close();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111827] p-8 flex flex-col items-center gap-10">
  <?php
    require_once '../php_assets/basic.php';
    $_SESSION['img'] = "../src/2066-nerd-doggo.png";
    echo "<form class='flex justify-center items-center bg-[#1f2937] p-8 rounded-xl gap-4' action='update.php' method='post'>";
    echo "<h2 class='text-3xl font-bold text-white'>Usuario de ID " . $_SESSION['editID'] . "</h2>";
    echo "<div class='flex flex-col lg:grid lg:grid-cols-3 p-8 rounded-xl gap-4'>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='name'>Nombre</label>";
    echo "<input class=' p-2 rounded-lg' type='text' name='name' value='$name'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='lastname'>Apellido</label>";
    echo "<input class=' p-2 rounded-lg' type='text' name='lastname' value='$lastname'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='email'>Email</label>";
    echo "<input class=' p-2 rounded-lg' type='email' name='email' value='$email'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='birthdate'>Nacimiento</label>";
    echo "<input class=' p-2 rounded-lg' type='date' name='birthdate' value='$birthdate'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='phone'>TLF</label>";
    echo "<input class=' p-2 rounded-lg' type='text' name='phone' value='$phone'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='role'>Role</label>";
    echo "<input class=' p-2 rounded-lg' type='text' name='role' value='$role'>";
    echo "</div>";
    echo "</div>";
    echo "<input type='submit' class='flex justify-center items-center text-xl font-bold bg-[#111827] text-white p-4 mx-2 rounded-full hover:bg-[#1f4937] cursor-pointer w-32' value='Actualizar'>";
    echo "</form>";
  ?>

</body>
</html>