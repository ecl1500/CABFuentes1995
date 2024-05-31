<?php
include "PUBLIC/PHP/verificarSesion.php"; // Verificación de sesión
include "PUBLIC/PHP/conexion.php"; // Incluir el archivo de conexión a la base de datos

// Consulta para obtener los desplazamientos
$query = "SELECT * FROM desplazamientos";
$result = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="PUBLIC/CSS/general.css">
    <link rel="stylesheet" type="text/css" href="PUBLIC/CSS/logueado.css">
    <link rel="icon" href="PUBLIC/IMAGES/EscudoCABFuentes95.ico">
    <title>Desplazamientos - CAB FUENTES 1995</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
    <header>
        <img src="PUBLIC/IMAGES/EscudoCABFuentes95.png" alt="CAB FUENTES 1995" />
        <nav>
            <button class="cerrarSesion" onclick="location.href='PUBLIC/PHP/cerrarSesion.php'">Cerrar Sesión</button>
        </nav>
    </header>
    <hr class="linea">
    <main>
        <h1>Desplazamientos Disponibles</h1>
        <div class="desplazamientos">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="desplazamiento">
                    <h2><?php echo htmlspecialchars($row['ciudadDestino'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p>Salida: <?php echo htmlspecialchars($row['ciudadSalida'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Fecha: <?php echo htmlspecialchars($row['fecha'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p>Hora de salida: <?php echo htmlspecialchars($row['horaSalida'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <a href="inscripcionDesplazamiento.php?idDesplazamiento=<?php echo $row['idDesplazamiento']; ?>">Inscribirse</a>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <footer>
        <div class="escudo">
            <img src="PUBLIC/IMAGES/EscudoCABFuentes95.png" alt="Escudo CAB FUENTES 1995">
            <div class="mapa">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.9778636586348!2d-5.345902424259879!3d37.46124457206599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd12bef040be0259%3A0xf8c666742ee542f3!2sPabell%C3%B3n%20la%20Estaci%C3%B3n!5e0!3m2!1ses!2ses!4v1715184516999!5m2!1ses!2ses" width="400" height="300" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="redesSociales">
                <h3>Redes Sociales</h3>
                <a href="https://www.facebook.com/profile.php?id=100065865433768" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="mailto:martin.alvarezgarcia.fuentes@gmail.com" target="_blank"><i class="fa-solid fa-envelope"></i></a>
                <a href="https://www.instagram.com/cabfuentes1995/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
        <div class="copy">
            <p>© 2024 - CAB FUENTES 1995. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>