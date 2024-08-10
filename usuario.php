
<?php

// Importar conexion a la BD...
require 'includes/config/database.php';
$db = conectarDB();

// Crear un email y password...
$email = "correo1@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear al usuario...
$query = " INSERT INTO usuarios (email, password) VALUES ( '${email}', '${passwordHash}' )";

//echo $query;

// Agregarloa la base de datos...
mysqli_query($db, $query);