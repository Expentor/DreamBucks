-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2022 a las 05:16:35
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dreambucks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_A` int(100) NOT NULL,
  `name_A` varchar(50) NOT NULL,
  `password_A` varchar(200) NOT NULL,
  `email_A` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_A`, `name_A`, `password_A`, `email_A`) VALUES
(20202003, 'Matias Morquecho', 'antifurros', 'mtirado0@ucol.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE `loans` (
  `date` date NOT NULL,
  `id_U1` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `interest` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `id_L` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`date`, `id_U1`, `quantity`, `interest`, `total`, `id_L`) VALUES
('2022-09-28', '3', 40000, 0, 2899, 7),
('2022-09-28', '3', 10200, 0, 8666, 2),
('2022-09-21', '3', 15000, 0, 14889, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_U` int(100) NOT NULL,
  `name_U` varchar(60) NOT NULL,
  `password_U` varchar(200) NOT NULL,
  `email_U` varchar(100) NOT NULL,
  `debited` int(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `id_A1` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_U`, `name_U`, `password_U`, `email_U`, `debited`, `address`, `phone`, `id_A1`) VALUES
(2, '2', '2', 'pepe@gmail.com', 0, '2', 2, 0),
(3, 'mork', '123', '123@gAIL.COM', 26454, '1', 1, 0),
(4, 'jose', 'q', 's@gmail.com', 0, 'campos', 314104789, 0),
(5, 'josefa', 'q', 'sa@gmail.com', 209, 'campos', 314104789, 20202003);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_A`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_U`),
  ADD KEY `id_A1` (`id_A1`),
  ADD KEY `id_A1_2` (`id_A1`),
  ADD KEY `id_A1_3` (`id_A1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_A` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20202004;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_U` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`id_A`) REFERENCES `users` (`id_A1`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
