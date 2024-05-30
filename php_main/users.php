<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111827] p-16 flex flex-col items-center gap-10">
  <?php
    session_start();
    if(!isset($_SESSION['id'])) {
      header("Location: ../php_features/login.php");
    }
    if($_SESSION['role'] == 'Admin') {
      $_SESSION['img'] = "../src/2066-nerd-doggo.png";
    }
    else {
      $_SESSION['img'] = "../src/4x.gif";
    }
  ?>
  <?php
    require '../php_assets/basic.php';
    //  show a table of users if user is admin
    if($_SESSION['role'] == 'Admin') {
      echo '<div class="flex max-w-xl md:max-w-3xl lg:max-w-full overflow-x-scroll bg-[#1f2937] p-8 rounded-xl gap-4">
      <table class="text-white overflow-x-scroll">
      <thead>
        <tr>
          <th class="border border-white p-2">ID</th>
          <th class="border border-white p-2">Name</th>
          <th class="border border-white p-2">Lastname</th>
          <th class="border border-white p-2">Email</th>
          <th class="border border-white p-2">Password</th>
          <th class="border border-white p-2">Birthdate</th>
          <th class="border border-white p-2">Phone</th>
          <th class="border border-white p-2">Rol</th>
          <th class="border border-white p-2">Acciones</th>
        </tr>
      </thead>
      <tbody>';
      require_once '../php_assets/config.php';
      $query = "SELECT * FROM users";
      $result = $conexion->query($query);
      while($row = $result->fetch_assoc()) {
        echo '<tr>
          <td class="border border-white p-4">' . $row['id'] . '</td>
          <td class="border border-white p-4">' . $row['name'] . '</td>
          <td class="border border-white p-4">' . $row['lastname'] . '</td>
          <td class="border border-white p-4">' . $row['email'] . '</td>
          <td class="border border-white p-4">' . $row['password'] . '</td>
          <td class="border border-white p-4">' . $row['birthdate'] . '</td>
          <td class="border border-white p-4">' . $row['phone'] . '</td>
          <td class="border border-white p-4">' . $row['role'] . '</td>
          <td class="border border-white p-4">
            <a class="flex justify-center items-center m-2 text-sm md:text-md font-bold bg-[#1f4937] p-2 mx-2 rounded-full hover:bg-[#111827] text-white w-16 md:w-24 lg:w-32 h-10 text-center" href="../php_features/edit.php?id=' . $row['id'] . '">Editar</a>
            <a class="flex justify-center items-center m-2 text-sm md:text-md font-bold bg-red-900 p-2 mx-2 rounded-full hover:bg-[#111827] text-white w-16 md:w-24 lg:w-32 h-10 text-center" href="../php_features/delete.php?id=' . $row['id'] . '">Eliminar</a>
          </td>
        </tr>';
      }
      echo '</tbody>
      </table>
      </div>';
    }
    else {
      echo '<div class="text-white">
      <h1 class="text-2xl font-bold mb-4">No tienes permisos para ver esta página. Pero puedes ver a este perrito 🐕</h1>
      </div>';
    }
  ?>
</body>
</html>