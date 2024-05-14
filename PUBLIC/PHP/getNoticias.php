<?php

// Conectarse a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cabfuentes95";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener las noticias con sus autores
$sql = "SELECT n.titular, n.contenido, n.fechaPublicacion, a.nombre, a.apellido
        FROM noticias n
        INNER JOIN autor a ON n.idAutor = a.idAutor";

$result = $conn->query($sql);

// Preparar los datos para enviarlos como JSON
$noticias = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
}

// Devolver los resultados como JSON
echo json_encode($noticias);

$conn->close();
