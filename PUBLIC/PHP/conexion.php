<?php
// Datos de conexión a la base de datos
$host = "localhost";
$user = "root"; // Reemplazar con el nombre de usuario de la base de datos
$password = ""; // Reemplazar con la contraseña de la base de datos
$database = "cabfuentes95";

// Conexión a la base de datos
$conexion = mysqli_connect($host, $user, $password, $database);

// Verificar la conexión
if (empty($conexion)) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
