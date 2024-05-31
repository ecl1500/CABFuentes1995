-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 15:42:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cabfuentes95`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'Juan', 'Pérez', 'Calle Mayor, 123', '123456789'),
(2, 'María', 'López', 'Avenida del Sol, 456', '987654321'),
(3, 'Pedro', 'García', 'Calle Luna, 789', '012345678'),
(4, 'Ana', 'Martínez', 'Paseo de las Flores, 321', '654321789'),
(5, 'Roberto', 'Sánchez', 'Plaza del Castillo, 456', '321654987'),
(6, 'Laura', 'Fernández', 'Calle de la Alegría, 123', '789456123'),
(7, 'David', 'Romero', 'Avenida de la Libertad, 456', '567891234'),
(8, 'Cristina', 'Gómez', 'Calle de la Paz, 789', '345678912'),
(9, 'Javier', 'Muñoz', 'Plaza de la Constitución, 123', '987456321'),
(10, 'Sandra', 'Blanco', 'Calle de la Esperanza, 456', '213456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desplazamientos`
--

CREATE TABLE `desplazamientos` (
  `idDesplazamiento` int(11) NOT NULL,
  `ciudadSalida` varchar(100) DEFAULT NULL,
  `ciudadDestino` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horaSalida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desplazamientos`
--

INSERT INTO `desplazamientos` (`idDesplazamiento`, `ciudadSalida`, `ciudadDestino`, `fecha`, `horaSalida`) VALUES
(1, 'Fuentes de Andalucia', 'Dos Hermanas', '2024-06-01', '08:00:00'),
(2, 'Fuentes de Andalucia', 'Alcalá de Guadaíra', '2024-06-02', '09:30:00'),
(3, 'Fuentes de Andalucia', 'Utrera', '2024-06-03', '10:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `ID` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `titular` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fechaPublicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`ID`, `idAutor`, `titular`, `contenido`, `fechaPublicacion`) VALUES
(1, 1, 'Un gran avance en la ciencia', 'Se ha descubierto una nueva cura para la enfermedad X', '2024-05-08'),
(2, 2, 'Noticia importante sobre política', 'Se han firmado nuevos acuerdos internacionales', '2024-05-07'),
(3, 3, 'Evento cultural de la ciudad', 'Habrá un concierto gratuito este fin de semana', '2024-05-10'),
(4, 1, 'Descubrimiento arqueológico', 'Se han encontrado ruinas de una antigua civilización', '2024-05-05'),
(5, 2, 'Innovación tecnológica', 'Se lanza un nuevo dispositivo revolucionario', '2024-05-12'),
(6, 3, 'Concurso de fotografía', 'Participa en nuestro concurso y gana un premio', '2024-05-03'),
(7, 1, 'Alerta meteorológica', 'Se esperan fuertes lluvias en las próximas horas', '2024-05-14'),
(8, 2, 'Elecciones generales', 'Conoce los resultados de las últimas elecciones', '2024-05-01'),
(9, 3, 'Festival de música', 'No te pierdas este gran evento musical', '2024-05-16'),
(10, 1, 'Premio literario', 'Anunciado el ganador del premio de novela', '2024-04-29'),
(11, 2, 'Avance médico', 'Se desarrolla un nuevo tratamiento para una enfermedad rara', '2024-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personadesplazamientos`
--

CREATE TABLE `personadesplazamientos` (
  `idPersonaDesplazamiento` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idDesplazamiento` int(11) DEFAULT NULL,
  `DNI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personadesplazamientos`
--

INSERT INTO `personadesplazamientos` (`idPersonaDesplazamiento`, `idUsuario`, `idDesplazamiento`, `DNI`) VALUES
(4, 1, 1, '111111G'),
(5, 2, 2, '22222D'),
(6, 1, 3, '33333F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pin` int(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `pin`, `nombre`, `apellidos`, `direccion`, `telefono`) VALUES
(1, 'emilio@campo.es', 1234, 'Emilio', 'Campo', 'Calle Falsa, 123', '111222333'),
(2, 'ale@fuentes.es', 5678, 'Alejandro', 'Fuentes', 'Calle Verdadera, 456', '3333444555');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `desplazamientos`
--
ALTER TABLE `desplazamientos`
  ADD PRIMARY KEY (`idDesplazamiento`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `personadesplazamientos`
--
ALTER TABLE `personadesplazamientos`
  ADD PRIMARY KEY (`idPersonaDesplazamiento`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idDesplazamiento` (`idDesplazamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `desplazamientos`
--
ALTER TABLE `desplazamientos`
  MODIFY `idDesplazamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personadesplazamientos`
--
ALTER TABLE `personadesplazamientos`
  MODIFY `idPersonaDesplazamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`);

--
-- Filtros para la tabla `personadesplazamientos`
--
ALTER TABLE `personadesplazamientos`
  ADD CONSTRAINT `personadesplazamientos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `personadesplazamientos_ibfk_2` FOREIGN KEY (`idDesplazamiento`) REFERENCES `desplazamientos` (`idDesplazamiento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
