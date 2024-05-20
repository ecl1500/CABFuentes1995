<?php
include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pin = $_POST['pin'];

    // Consulta SQL para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND pin = '$pin'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        // Iniciar sesión y redirigir al usuario a la página de inicio
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: inicio.php");
    } else {
        echo '<script>alert("Email o PIN incorrecto");</script>';
        echo '<script>setTimeout(function() { window.location.href = "../../login.html"; }, 100);</script>';

    }
}
