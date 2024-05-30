<?php
  
  echo '<nav class="text-center flex flex-col sm:flex-row justify-between items-center bg-[#1f2937] p-8 rounded-xl w-full gap-4">
    <h1 class="text-2xl font-bold mb-4 text-white text-xl">ULTRA NETWORK 😎</h1>
    <p class="text-white text-lg sm:text-2xl">Bienvenido, ' . $_SESSION['name'] . " " . $_SESSION['lastname'] . '</p>
    <a class="text-xl font-bold bg-[#111827] p-2 mx-2 rounded-full hover:bg-[#1f4937] text-white w-32 text-center" href="../php_features/logout.php">Salir</a>
    </nav>
    <img src="' . $_SESSION['img'] . '" alt="thumb-up.png">
    <div class="text-center flex flex-col sm:flex-row justify-center items-center bg-[#1f2937] p-8 rounded-xl gap-4 w-fit">
    <a class="text-md font-bold bg-[#111827] p-2 mx-2 rounded-full hover:bg-[#1f4937] text-white w-32 h-10 text-center" href="users.php">Ver usuarios</a>
    <a class="text-md font-bold bg-[#111827] p-2 mx-2 rounded-full hover:bg-[#1f4937] text-white w-32 h-10 text-center" href="perfil.php">Perfil</a>
    <a class="text-md font-bold bg-[#111827] p-2 mx-2 rounded-full hover:bg-[#1f4937] text-white w-32 h-10 text-center" href="home.php">Inicio</a>
    </div>';
?>