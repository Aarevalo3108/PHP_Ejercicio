<?php
  $data = $dataErr = array();
  $checked = array("🟢","❌");
  $names = array("name", "lastname", "email", "password","password2", "birthdate", "phone");
  $descriptions = array("Coloca tu nombre!. No te llamaras pepito, o si?", "Coloca tu apellido!. Tienes cara de Hernandez o.o", "Coloca tu correo!. thegoat@go.com 😎", "Coloca tu contraseña!. Debe contener una letra mayuscula, un numero y un simbolo, nada de 'contraseña' 👀", "Confirma tu contraseña!. igualita eh!", "Coloca tu fecha de nacimiento!. Adivinare, naciste en 1900 junto a mi tatarabuelo? 🙈.", "Coloca tu teléfono!. el que usas siempre, vamos.");
  $titles = array("Nombre", "Apellido", "Email", "Contraseña","Confirmar contraseña", "Fecha de nacimiento", "Teléfono");
  $types = array("text", "text", "email", "password","password", "date", "tel",);
  $placeholders = array("Ejem: Angel", "Ejem: Arevalo", "Ejem: 0w5iA@example.com", "Ejem: **********", "Ejem: **********", "Ejem: 1999-01-01", "Ejem: 1234567890");
  $regex = array("/^[a-zA-Z\s]*$/", "/^[a-zA-Z\s]*$/", "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", "/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+{}|:;<>,.?~]).{8,}$/", "/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+{}|:;<>,.?~]).{8,}$/", "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", "/^\d{11}$/");
  for($i = 0; $i < 7; $i++) {
    $data[] = "";
    $dataErr[] = "";
  }