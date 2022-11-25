-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2022 a las 04:48:39
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
  `id_L` int(100) NOT NULL,
  `lapses` int(50) NOT NULL,
  `quota` bigint(200) NOT NULL,
  `due` int(100) NOT NULL,
  `months` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `loans`
--

INSERT INTO `loans` (`date`, `id_U1`, `quantity`, `interest`, `total`, `id_L`, `lapses`, `quota`, `due`, `months`) VALUES
('2022-10-19', '7', 1000, 3, 923, 28, 6, 185, 0, 0),
('2022-10-19', '7', 1000, 3, 707, 29, 3, 354, 0, 0),
('2022-10-19', '7', 1000, 3, 1108, 30, 6, 185, 185, 0),
('2022-10-22', '8', 12000, 3, 12727, 31, 3, 4242, 4242, 1);

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
  `password_U` varchar(200) NOT NULL,
  `email_U` varchar(100) NOT NULL,
  `debited` int(50) DEFAULT NULL,
  `address_U` varchar(200) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `id_A1` int(100) NOT NULL,
  `balance` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_U`, `name_U`, `password_U`, `email_U`, `debited`, `address_U`, `phone`, `id_A1`, `balance`) VALUES
(3, 'mork', '123', '123@gAIL.COM', 0, '1', 1, 0, 0),
(7, 'NEGRO', '123', 'negro@gmail.com', 2738, '1', 1, 20202003, 8461),
(8, 'adair', '1', 'mtirado0@ucol.mx', 12727, '1724 hamburg road', 523141010990, 20202003, 10000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_A`);

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
-- AUTO_INCREMENT de la tabla `loans`
--
ALTER TABLE `loans`
  MODIFY `id_L` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `movements`
--
ALTER TABLE `movements`
  MODIFY `id_M` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_U` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
