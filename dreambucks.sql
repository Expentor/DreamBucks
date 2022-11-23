-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-10-2022 a las 09:48:36
-- Versión del servidor: 10.6.10-MariaDB-1
-- Versión de PHP: 8.1.7

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
drop database if exists dreambucks;

create database dreambucks;

use dreambucks;

CREATE TABLE `admins` (
  `id_A` int(100) NOT NULL PRIMARY KEY,
  `num-trab` int(100) NOT NULL,
  `name_A` varchar(50) NOT NULL,
  `password_A` varchar(200) NOT NULL,
  `email_A` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_A`, `num-trab`, `name_A`, `password_A`, `email_A`) VALUES
(20202003, 0, 'Matias Morquecho', 'antifurros', 'mtirado0@ucol.mx');

INSERT INTO `admins` (`id_A`, `num-trab`, `name_A`, `password_A`, `email_A`) VALUES
(20202004, 1, 'Adair Fernandez', 'furros', 'afernandez0@ucol.mx');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loans`
--

CREATE TABLE `loans` (
  `id_L` int(100) NOT NULL,
  `id_U1` int(100) NOT NULL,
  `date` date NOT NULL,
  `quantify` int(100) NOT NULL,
  `interest` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `lapses` int(50) NOT NULL,
  `quota` bigint(200) NOT NULL,
  `due` int(100) NOT NULL,
  `months` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`id_L`, `id_U1`, `date`, `quantify`, `interest`, `total`, `lapses`, `quota`, `due`, `months`) VALUES
(1, 2, '2022-10-26', 10000, 3, 8506, 3, 3535, 1435, 1),
(7, 3, '2022-10-26', 10000, 3, 11076, 6, 1846, 1846, 0),
(8, 2, '2022-10-26', 3000000, 3, 17495, 4, 729, 729, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE `movements` (
  `date` date NOT NULL,
  `id_U2` int(100) NOT NULL,
  `id_M` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `movements`
--

INSERT INTO `movements` (`date`, `id_U2`, `id_M`, `total`, `type`) VALUES
('2022-10-19', 7, 1, 1000, 'recharge'),
('2022-10-21', 7, 2, 9000, 'recharge'),
('2022-10-22', 8, 3, 10000, 'recharge');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_U` int(100) NOT NULL,
  `name_U` varchar(60) NOT NULL,
  `lastname1_U` varchar(60) NOT NULL,
  `lastname2_U` varchar(60) NOT NULL,
  `password_U` varchar(200) NOT NULL,
  `email_U` varchar(100) NOT NULL,
  `debited` int(50) NOT NULL,
  `address_U` varchar(200) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `id_A1` int(100) NOT NULL,
  `balance` int(100) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_U`, `name_U`, `lastname1_U`, `lastname2_U`, `password_U`, `email_U`, `debited`, `address_U`, `phone`, `id_A1`, `balance`) VALUES
(2, 'geremi', '1', '1', '1', 'geremi@gamil.com', 26001, '1', 1, 20202003, 97900),
(3, 'jose', '1', '1', '1', '1@gmail.com', 11076, '1', 1, 20202003, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id_L`);

--
-- Indices de la tabla `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id_M`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_U`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id_L` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id_M` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_U` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

ALTER TABLE `users`
ADD FOREIGN KEY (id_A1) REFERENCES admins(id_A)

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
