<?php
header('Content-Type: application/json');

require 'config.php';

$conexion = new mysqli($servidor, $usuario, $contraseña, $basededatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM noticias";
$resultados = $conexion->query($sql);

$noticias = array();

if ($resultados->num_rows > 0) {
    while ($fila = $resultados->fetch_assoc()) {
        $noticias[] = $fila;
    }
}

echo json_encode($noticias);

$conexion->close();
