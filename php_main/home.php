<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111827] p-8 flex flex-col items-center gap-10">
  <?php
    session_start();
    if(!isset($_SESSION['id'])) {
      header("Location: ../php_features/login.php");
    }
    $_SESSION['img'] = "../src/thumb-up.png";
  ?>
  <?php
   require '../php_assets/basic.php';
  ?>
</body>
</html>