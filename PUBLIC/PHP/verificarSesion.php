<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.html"); // Redirigir al usuario a la página de inicio de sesión
    exit;
}
