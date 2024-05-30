<?php
  session_start();
  if(!isset($_SESSION['id'])) {
    header("Location: ../php_features/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111827] p-8 flex flex-col items-center gap-10">
  <?php
    $_SESSION['img'] = "../src/7tv-hi.gif";
    require '../php_assets/basic.php';
    echo "<form class='flex flex-col lg:flex-row justify-center items-center bg-[#1f2937] p-8 rounded-xl gap-4' action='../php_features/update.php' method='post'>";
    echo "<div class='grid lg:grid-cols-3 p-8 rounded-xl gap-4'>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='name'>Name</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='text' name='name' value='$_SESSION[name]'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='lastname'>Lastname</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='text' name='lastname' value='$_SESSION[lastname]'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='email'>Email</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='email' name='email' value='$_SESSION[email]'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='password'>Password</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='text' name='password' value='' placeholder='(modifica este campo para cambiar la contraseña)'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='birthdate'>Birthdate</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='date' name='birthdate' value='$_SESSION[birthdate]''>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='phone'>Phone</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='text' name='phone' value='$_SESSION[phone]'>";
    echo "</div>";
    echo "<div class='flex flex-col'>";
    echo "<label class='text-white' for='role'>Role</label>";
    echo "<input class='w-64 p-2 rounded-lg' type='text' name='role' value='$_SESSION[role]'>";
    echo "</div>";
    echo "</div>";
    echo "<input type='submit' class='flex justify-center items-center text-xl font-bold bg-[#111827] text-white p-4 mx-2 rounded-full hover:bg-[#1f4937] cursor-pointer w-64' value='Update'>";
    echo "</form>";
  ?>
</body>
</html>