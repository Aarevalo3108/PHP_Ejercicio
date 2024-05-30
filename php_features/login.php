<?php
  $errors = array("","","");
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $allright = true;
    if (empty($_POST['email'])) {
      $errors[0] = "Este campo es requerido";
      $allright = false;
    }
    if (empty($_POST['password'])) {
      $errors[1] = "Este campo es requerido";
      $allright = false;
    }
    if($allright) {
      session_start();
      require_once '../php_assets/config.php';
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
      $result = $conexion->query($query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['birthdate'] = $row['birthdate'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['role'] = $row['role'];
        header("Location: ../php_main/home.php");
      }
      else {
        $errors[2] = "Credenciales incorrectas";
      }
      $conexion->close();
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111827] flex flex-col justify-center items-center h-screen">
  <a href="../index.php" class="text-white mb-4">< Volver</a>
  <form class="flex flex-col justify-center items-center bg-[#1f2937] p-8 rounded-xl gap-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="flex flex-col justify-center items-center p-8 rounded-xl gap-4">
      <h1 class="text-2xl font-bold mb-4 text-white">Iniciar Sesión</h1>
      <input type="email" class="bg-[#111827] text-white p-2 rounded" name="email" placeholder="Email">
      <span class="text-red-500"><?php echo $errors[0] ?></span>
      <input type="password" class="bg-[#111827] text-white p-2 rounded" name="password" placeholder="Contraseña">
      <span class="text-red-500"><?php echo $errors[1] ?></span>
      <input type="submit" class="flex justify-center items-center text-xl font-bold bg-[#111827] text-white p-4 mx-2 rounded-full hover:bg-[#1f4937] cursor-pointer w-32" value="Ingresar">
      <a class="flex justify-center items-center text-xl font-bold bg-[#111827] text-white p-4 mx-2 rounded-full hover:bg-[#1f4937] cursor-pointer w-32" href="register.php">Registrarse</a>
      <span class="text-red-500"><?php echo $errors[2] ?></span>
    </div>
  </form>
</body>
</html>