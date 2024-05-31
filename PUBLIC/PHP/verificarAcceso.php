<?php
// Verificar si el archivo de conexión a la base de datos existe y luego incluirlo
if (file_exists(__DIR__ . '/../PHP/conexion.php')) {
    include __DIR__ . '/../PHP/conexion.php';
} else {
    die("Error: El archivo de conexión a la base de datos no existe.");
}

// Obtener las credenciales del usuario
$email = $_POST['email'];
$pin = $_POST['pin'];

// Verificar que los datos estén siendo enviados correctamente
var_dump($_POST);

// Verificar las credenciales del usuario
$query = $conexion->prepare("SELECT id, email, pin, pin_hash FROM usuarios WHERE email =?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$usuario = $result->fetch_assoc();

// Verificar que la consulta SQL esté funcionando correctamente
var_dump($usuario);

// Verificar si las credenciales son correctas
if ($usuario && password_verify($pin, $usuario['pin_hash'])) {
    // Redirigir al usuario a logueado.php
    header("Location: /CABFuentes1995/logueado.php");
    exit();
} else {
    // Mostrar una alerta y redirigir al usuario a login.html
    echo "<script>alert('Las credenciales no son válidas'); window.location.href = 'login.html';</script>";
    exit();
}

// Cerrar la consulta y la conexión
$query->close();
$conexion->close();