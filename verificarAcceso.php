<?php
// Agregar encabezados de seguridad
header("Content-Security-Policy: default-src 'self';");
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");

// Verificar si el archivo de conexión a la base de datos existe y luego incluirlo
if (file_exists(__DIR__ . '/PUBLIC/PHP/conexion.php')) {
    include __DIR__ . '/PUBLIC/PHP/conexion.php';
} else {
    die("Error: El archivo de conexión a la base de datos no existe.");
}

// Verificar que los datos estén siendo enviados correctamente
if (!isset($_POST['email']) || !isset($_POST['pin'])) {
    die("Error: Datos incompletos.");
}

// Obtener las credenciales del usuario y validarlas
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$pin = $_POST['pin'];

if ($email === false) {
    die("Error: Email no válido.");
}

// Verificar las credenciales del usuario
$query = $conexion->prepare("SELECT id, email, pin_hash FROM usuarios WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$usuario = $result->fetch_assoc();

// Verificar si las credenciales son correctas
if ($usuario && password_verify($pin, $usuario['pin_hash'])) {
    // Iniciar una sesión y almacenar información del usuario
    session_start();
    $_SESSION['user_id'] = $usuario['id'];
    $_SESSION['email'] = $usuario['email'];
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
