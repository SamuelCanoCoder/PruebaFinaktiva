-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2025 a las 21:26:06
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
-- Base de datos: `registration`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventlogs`
--

CREATE TABLE `eventlogs` (
  `id` int(11) NOT NULL,
  `event_date` datetime DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `event_type` enum('API','Formulario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventlogs`
--

INSERT INTO `eventlogs` (`id`, `event_date`, `description`, `event_type`) VALUES
(1, '2025-03-26 21:45:36', 'Prueva', 'Formulario'),
(2, '2025-03-26 22:10:37', 'Prueba evento manual', 'Formulario'),
(3, '2025-03-27 08:56:16', 'Prueba evento manual', 'Formulario'),
(4, '2025-03-27 08:56:36', 'Prueba evento manuala 2', 'Formulario'),
(5, '2025-03-27 08:57:52', 'Prueba registros3', 'Formulario'),
(6, '2025-03-27 09:00:05', 'Sistema reiniciado correctamente', 'API'),
(7, '2025-03-27 09:00:45', 'Evento registrado desde API prueba POSTMAN', 'API'),
(8, '2025-03-27 09:42:58', 'Prueba descripcion', 'Formulario'),
(9, '2025-03-27 09:54:15', 'Evento registrado desde API prueba POSTMAN', 'API'),
(10, '2025-03-27 09:54:16', 'Evento registrado desde API prueba POSTMAN', 'API'),
(11, '2025-03-27 09:54:16', 'Evento registrado desde API prueba POSTMAN', 'API'),
(12, '2025-03-27 09:54:17', 'Evento registrado desde API prueba POSTMAN', 'API'),
(13, '2025-03-27 10:34:47', 'Prueba registro formulario 21223', 'Formulario'),
(14, '2025-03-27 10:45:06', 'Prueba descrpciones finales', 'Formulario'),
(15, '2025-03-27 10:46:19', 'Evento registrado desde API prueba POSTMAN 2', 'API'),
(16, '2025-03-27 11:03:19', 'Evento registrado desde API prueba POSTMAN 2', 'API');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
