<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php"); // Redirigir al usuario a la página de inicio de sesión
    exit;
}
