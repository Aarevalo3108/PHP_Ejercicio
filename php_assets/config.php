<?php
  //Conexión a la base de datos
  $host = 'localhost';
  $user = 'admin';
  $password = 'db123.';
  $database = 'login-register';
  $port = '3306';
  $conexion = new mysqli($host, $user, $password, $database, $port);
  if($conexion->connect_error) {
    die('Error de Conexión: ' . $conexion->connect_error);
  }
  $query = "CREATE TABLE IF NOT EXISTS users (
    id BIGINT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    birthdate DATE NOT NULL,
    phone VARCHAR(11) NOT NULL,
    role VARCHAR(5) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  $result = $conexion->query($query);
  if (!$result) {
    die('Error de Conexión: ' . $conexion->connect_error);
  }