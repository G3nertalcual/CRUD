<?php
// Configuración de conexión a la base de datos
$dbname = "crud";         // Nombre de la base de datos
$dbuser = "root";         // Usuario de la base de datos
$dbhost = "localhost";    // Host del servidor de la base de datos
$dbpass = "";             // Contraseña del usuario de la base de datos

// Establecer la conexión a la base de datos usando mysqli
$conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
