<?php
    require_once '../php_assets/constants.php';
    $allright = true;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      for($i = 0; $i < 7; $i++) {
        if (empty($_POST[$names[$i]])) {
          $dataErr[$i] = "Este campo es requerido";
          $allright = false;
        }
        else {
          $data[$i] = test_input($_POST[$names[$i]]);
          if (!preg_match($regex[$i], $data[$i])) {
            $allright = false;
            if($names[$i] == "email") {
              if(!filter_var($data[$i], FILTER_VALIDATE_EMAIL)) {
                $dataErr[$i] = "El formato no es válido";
              }
            }
            if($names[$i] == "password2" && $names[$i-1] == "password") {
              if($data[$i] != $data[$i-1]) {
                $dataErr[$i] = "Las contraseñas no coinciden";
              }
            }
            else{
              $dataErr[$i] = "El formato no es válido";
            }
          }
          if($names[$i] == "email") {
            require_once '../php_assets/config.php';
            $query = "SELECT id FROM users WHERE email = '$data[$i]'";
            $result = $conexion->query($query);
            if (mysqli_num_rows($result) > 0) {
              $dataErr[$i] = "El correo electrónico ya existe";
            }
          }
        }
      }
    }
    function test_input($info) {
      $info = trim($info);
      $info = stripslashes($info);
      $info = htmlspecialchars($info);
      return $info;
    }
    if($allright && $_SERVER["REQUEST_METHOD"] == "POST") {
      require_once '../php_assets/config.php';
      $name = $data[0];
      $lastname = $data[1];
      $email = $data[2];
      $password = md5($data[3]);
      $birthdate = $data[5];
      $phone = $data[6];
      $role = $_POST['Role'];
      $query = "INSERT INTO users (name, lastname, email, password, birthdate, phone, role) VALUES ('$name', '$lastname', '$email', '$password', '$birthdate', '$phone', '$role')";
      $result = $conexion->query($query);
      $conexion->close();
      header("Location: ../index.php");
    }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#111827] flex flex-col justify-center items-center">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="flex flex-col justify-center items-center bg-[#1f2937] rounded-xl p-8">
    <h1 class="text-2xl font-bold mb-4 text-white">Registrarse</h1>
    <div class="text-center grid grid-cols-2 gap-4 bg-[#111827] p-8 rounded-xl">
      <?php
        for($i = 0; $i < 7; $i++) {
          echo '<div>
                <h2 class="text-bold text-white text-lg">'. $titles[$i] . '</h2>
                <p class="text-white text-sm">'. $descriptions[$i] . '</p>
                <span class="text-red-500">' . $dataErr[$i] . '</span>
              </div>';
          echo '<div class="flex flex-col">
                  <input type="'. $types[$i] .'" class="bg-[#1f2937] text-white p-2 rounded" name="' . $names[$i] . '" value="' . $data[$i] . '" placeholder="' . $placeholders[$i] . '">
                </div>';
        }
      ?>
      <fieldset>
        <legend class="text-bold text-white">Rol:</legend>
        <input type="radio" id="User" class="bg-[#1f2937] p-2 rounded" name="Role" value="User" checked>
        <label for="User" class="text-bold text-white">User</label>
        <input type="radio" id="Admin" class="bg-[#1f2937] p-2 rounded" name="Role" value="Admin">
        <label for="Admin" class="text-bold text-white">Admin</label>
      </fieldset>
      <div class="flex justify-center items-center gap-4">
        <a class="flex justify-center items-center text-xl font-bold bg-[#1f2937] text-white p-4 mx-2 rounded-full hover:bg-[#1f4937] w-32" href="register.php">Reset</a>
        <input type="submit" class="flex justify-center items-center text-xl font-bold bg-[#1f2937] text-white p-4 mx-2 rounded-full hover:bg-[#1f4937] cursor-pointer w-32" value="Registrar">
      </div>
    </div>
  </form>
</body>
</html>

