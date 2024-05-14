<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php"); // Redirigir al usuario al formulario de inicio de sesión si no está autenticado
    exit;
}

// Página de inicio del usuario autenticado
header("location: ../../logueado.php"); // Redir