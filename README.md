Para probar el ejercicio se debe crear una base de datos previamente llamada "login-register" y un usuario "admin" de esta manera:

```
-- Crear la base de datos "login-register"
CREATE DATABASE `login-register`;

-- Crear el usuario "admin" con contraseña "db123."
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'db123.';

-- Otorgar todos los privilegios al usuario "admin" en la base de datos "login-register"
GRANT ALL PRIVILEGES ON `login-register`.* TO 'admin'@'localhost';

-- Actualizar los cambios de permisos
FLUSH PRIVILEGES;

```
