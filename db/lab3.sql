-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-10-2019 a las 03:25:00
-- Versión del servidor: 5.7.27-0ubuntu0.19.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lab3`
--
CREATE DATABASE IF NOT EXISTS `lab3` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `lab3`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `cambiar_clave`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiar_clave` (IN `clave_nueva` VARCHAR(80), IN `p_nickname` VARCHAR(12))  NO SQL
BEGIN

UPDATE usuario
set usuario.clave = clave_nueva
WHERE usuario.nickname = p_nickname;

END$$

DROP PROCEDURE IF EXISTS `crear_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_usuario` (IN `p_nombre` VARCHAR(30), IN `p_apellido1` VARCHAR(30), IN `p_apellido2` VARCHAR(30), IN `p_nickname` VARCHAR(12), IN `p_clave` VARCHAR(80), IN `p_correo` VARCHAR(20), IN `p_telefono` VARCHAR(20), IN `p_rol` BOOLEAN)  NO SQL
BEGIN

INSERT INTO usuario(nombre,apellido1,apellido2,nickname,clave,correo,telefono,rol)
VALUES(p_nombre,p_apellido1,p_apellido2,p_nickname,p_clave,p_correo,p_telefono,p_rol);

END$$

DROP PROCEDURE IF EXISTS `obtener_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_usuario` (IN `p_nickname` VARCHAR(12))  NO SQL
BEGIN

SELECT CONCAT(u.nombre,' ',u.apellido1,' ', u.apellido2) as name, u.nickname, u.correo,u.telefono from usuario u
WHERE u.nickname = p_nickname;

END$$

DROP PROCEDURE IF EXISTS `validar_correo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validar_correo` (IN `p_correo` VARCHAR(20), OUT `resultado` INT(2))  NO SQL
BEGIN
SELECT IF( EXISTS( SELECT * FROM usuario WHERE usuario.correo = p_correo), 1, 0) into resultado;

END$$

DROP PROCEDURE IF EXISTS `validar_login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validar_login` (IN `p_nickname` VARCHAR(12), IN `p_clave` VARCHAR(80), OUT `resultado` INT(2))  NO SQL
BEGIN

SELECT IF( EXISTS( SELECT * FROM usuario WHERE usuario.nickname = p_nickname AND usuario.clave = p_clave), 1, 0) INTO resultado;

END$$

DROP PROCEDURE IF EXISTS `validar_nickname`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `validar_nickname` (IN `p_nickname` VARCHAR(12), OUT `resultado` INT(2))  NO SQL
BEGIN

SELECT IF( EXISTS( SELECT * FROM usuario WHERE usuario.nickname = p_nickname), 1, 0) INTO resultado;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nickname` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
