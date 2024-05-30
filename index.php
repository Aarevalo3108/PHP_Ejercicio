<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INICIO</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111827]  grid lg:grid-cols-2">
  <div class="flex justify-center items-center lg:h-screen">
    <img src="./src/banner_img.png" class="h-1/2 lg:h-2/3 max-h-96" draggable="false" alt="login.png">
  </div>
  <main class="text-white flex flex-col lg:flex-row justify-center items-center bg-[#1f2937] gap-4 p-8">
    <div class="text-center flex flex-col gap-4 bg-[#111827] p-8 rounded-xl">
      <h1 class="text-2xl font-bold mb-4">Bienvenido!</h1>
      <a class="text-xl font-bold bg-[#1f2937] p-2 mx-2 rounded-full hover:bg-[#111827]" href="./php_features/login.php">Ingresar</a>
      <a class="text-xl font-bold bg-[#1f2937] p-2 mx-2 rounded-full hover:bg-[#111827]" href="./php_features/register.php">Registrar</a>
    </div>
  </main>
</body>
</html>