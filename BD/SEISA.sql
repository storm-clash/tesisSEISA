-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 07:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practica`
--

-- --------------------------------------------------------

--
-- Table structure for table `altura`
--

CREATE TABLE `altura` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `altura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `altura`
--

INSERT INTO `altura` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `altura`) VALUES
(1, 'Altura', 'Hasta 2 metros', 0.12, 1, NULL),
(2, 'Altura', 'De 2m a 3.5m', 0.12, 4, NULL),
(3, 'Altura', 'De 3.5m a 5m', 0.12, 7, NULL),
(4, 'Altura', 'Más de 5m', 0.12, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alturamontaje`
--

CREATE TABLE `alturamontaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `altura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alturamontaje`
--

INSERT INTO `alturamontaje` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `altura`) VALUES
(1, 'Altura del Montaje', 'Hasta 2m', 0.16, 1, NULL),
(2, 'Altura del Montaje', 'De 2m a 3.5m', 0.16, 4, NULL),
(3, 'Altura del Montaje', 'De 3.5m a 5m', 0.16, 7, NULL),
(4, 'Altura del Montaje', 'Más de 5m', 0.16, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auditlog`
--

CREATE TABLE `auditlog` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `old` text DEFAULT NULL,
  `new` text DEFAULT NULL,
  `at` datetime DEFAULT NULL,
  `by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auditlog`
--

INSERT INTO `auditlog` (`id`, `model`, `action`, `old`, `new`, `at`, `by`) VALUES
(1, 'Cliente', 'update', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNoche\",\"telefono\":52430465,\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":1234567890123456,\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":2147483647783333,\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":2}', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNo\",\"telefono\":\"52430465\",\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234567890123456\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"2147483647783333\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"2\"}', '0000-00-00 00:00:00', 17),
(2, 'Cliente', 'update', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNo\",\"telefono\":52430465,\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":1234567890123456,\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":2147483647783333,\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":2}', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNoche\",\"telefono\":\"52430465\",\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234567890123456\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"2147483647783333\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"2\"}', '2020-12-05 00:00:00', 17),
(3, 'Cliente', 'update', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNoche\",\"telefono\":52430465,\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":1234567890123456,\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":2147483647783333,\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":2}', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesN\",\"telefono\":\"52430465\",\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234567890123456\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"2147483647783333\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"2\"}', '2020-12-05 05:00:11', 17),
(4, 'Cliente', 'update', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesN\",\"telefono\":52430465,\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":1234567890123456,\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":2147483647783333,\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":2}', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNoche\",\"telefono\":\"52430465\",\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234567890123456\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"2147483647783333\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"2\"}', '2020-12-05 05:01:45', 17),
(5, 'Cliente', 'update', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNoche\",\"telefono\":52430465,\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":1234567890123456,\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":2147483647783333,\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":2}', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNo\",\"telefono\":\"52430465\",\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234567890123456\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"2147483647783333\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"2\"}', '2020-12-05 05:04:22', 17),
(6, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:03:40', 17),
(7, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:03:40', 17),
(8, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:03:40', 17),
(9, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:04:31', 17),
(10, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:04:31', 17),
(11, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:04:31', 17),
(12, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:05:58', 17),
(13, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:05:58', 17),
(14, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:05:58', 17),
(15, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:12:36', 17),
(16, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:12:36', 17),
(17, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:12:36', 17),
(18, 'Registromantenimientos', 'insert', NULL, '{\"fecha\":\"20-12-05\",\"incidencias\":\"wdf\",\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"ordenServicio_id\":\"4\"}', '2020-12-05 08:13:49', 17),
(19, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:13:49', 17),
(20, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:18:51', 17),
(21, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:18:51', 17),
(22, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:18:51', 17),
(23, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:19:05', 17),
(24, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:20:44', 17),
(25, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:20:44', 17),
(26, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:20:44', 17),
(27, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:21:00', 17),
(28, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:21:00', 17),
(29, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:21:00', 17),
(30, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:25:21', 17),
(31, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:25:21', 17),
(32, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:25:21', 17),
(33, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:25:31', 17),
(34, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:26:11', 17),
(35, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:26:11', 17),
(36, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:26:11', 17),
(37, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:27:25', 17),
(38, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:28:09', 17),
(39, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:28:09', 17),
(40, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:28:09', 17),
(41, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:28:24', 17),
(42, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:29:19', 17),
(43, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:29:19', 17),
(44, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:29:19', 17),
(45, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:29:31', 17),
(46, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:33:10', 17),
(47, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '2020-12-05 08:33:10', 17),
(48, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 08:33:10', 17),
(49, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":0}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-19\",\"estado\":1}', '2020-12-05 08:33:20', 17),
(50, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 08:33:20', 17),
(51, 'Sistemasintalados', 'delete', '{\"idsistemasIntalados\":9,\"cliente_idcliente\":1,\"tipoSistemaSeguridad_id\":3,\"local\":\"Empresa\",\"clasificacion\":7.01,\"clasificarentidad_id\":16}', NULL, '2020-12-05 09:27:00', 17),
(52, 'Sistemasintalados', 'update', '{\"cliente_idcliente\":5,\"tipoSistemaSeguridad_id\":3,\"local\":\"Oficina 2do Piso\",\"clasificacion\":5.08,\"clasificarentidad_id\":15}', '{\"cliente_idcliente\":\"2\",\"tipoSistemaSeguridad_id\":\"3\",\"local\":\"Oficina 2do Piso\",\"clasificacion\":5.08,\"clasificarentidad_id\":15}', '2020-12-05 09:27:42', 17),
(53, 'Sistemasintalados', 'update', '{\"cliente_idcliente\":2,\"tipoSistemaSeguridad_id\":3,\"local\":\"Oficina 2do Piso\",\"clasificacion\":5.08,\"clasificarentidad_id\":15}', '{\"cliente_idcliente\":\"3\",\"tipoSistemaSeguridad_id\":\"3\",\"local\":\"Oficina 2do Piso\",\"clasificacion\":5.08,\"clasificarentidad_id\":15}', '2020-12-05 09:28:01', 17),
(54, 'Ofertacomercial', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"ueb_id\":\"2\",\"numeroDoc\":\"56\",\"fecha\":\"20-12-05 09:12:19\",\"fechaVencimiento\":\"20-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-05 09:37:19', 17),
(55, 'Ofertacomercial', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"ueb_id\":\"2\",\"numeroDoc\":\"23\",\"fecha\":\"20-12-05 09:12:50\",\"fechaVencimiento\":\"20-12-12\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-05 09:38:50', 17),
(56, 'Ofertacomercial', 'update', '{\"ueb_id\":\"2\",\"numeroDoc\":\"23\",\"fechaVencimiento\":\"20-12-12\",\"fecha\":\"20-12-05 09:12:50\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"cliente_idcliente\":\"12\",\"estados_idestados\":1}', '{\"cliente_idcliente\":\"12\",\"ueb_id\":\"2\",\"numeroDoc\":\"23\",\"fecha\":\"20-12-05 09:12:50\",\"fechaVencimiento\":\"20-12-12\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-05 09:38:50', 17),
(57, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"tipoSistemaSeguridad_id\":6,\"local\":\"Empresa\",\"clasificacion\":4.01,\"clasificarentidad_id\":23}', '2020-12-05 09:38:50', 17),
(58, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"tipoSistemaSeguridad_id\":2,\"local\":\"Empresa\",\"clasificacion\":7.01,\"clasificarentidad_id\":8}', '2020-12-05 09:38:50', 17),
(59, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":12,\"ueb_id\":2,\"numeroDoc\":23,\"fecha\":\"2020-12-05\",\"fechaVencimiento\":\"2020-12-12\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '{\"cliente_idcliente\":12,\"ueb_id\":\"2\",\"numeroDoc\":\"23\",\"fecha\":\"2020-12-05\",\"fechaVencimiento\":\"20-12-12\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-05 09:39:20', 17),
(60, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":5,\"ueb_id\":2,\"numeroDoc\":654,\"fecha\":\"2020-12-01\",\"fechaVencimiento\":\"2020-11-19\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '{\"cliente_idcliente\":5,\"ueb_id\":\"2\",\"numeroDoc\":\"654\",\"fecha\":\"2020-12-01\",\"fechaVencimiento\":\"20-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '2020-12-05 09:56:27', 17),
(61, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":1,\"ueb_id\":2,\"numeroDoc\":456,\"fecha\":\"2020-12-02\",\"fechaVencimiento\":\"2020-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '{\"cliente_idcliente\":1,\"ueb_id\":2,\"numeroDoc\":456,\"fecha\":\"2020-12-02\",\"fechaVencimiento\":\"2020-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '2020-12-05 10:00:19', 17),
(62, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":8,\"ueb_id\":2,\"numeroDoc\":987,\"fecha\":\"2020-12-01\",\"fechaVencimiento\":\"2020-12-24\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '{\"cliente_idcliente\":8,\"ueb_id\":\"2\",\"numeroDoc\":\"987\",\"fecha\":\"2020-12-01\",\"fechaVencimiento\":\"20-12-24\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '2020-12-05 10:04:22', 17),
(63, 'Cliente', 'insert', NULL, '{\"fechaAct\":\"20-12-05\",\"codigoREEUP\":\"Seisa893\",\"nombreCliente\":\"Sabado\",\"telefono\":\"52430465\",\"correo\":\"sabado@seisa.cu\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234123456780987\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"1234567854326786\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calzada del cerro # 203\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"1\"}', '2020-12-05 19:26:44', 17),
(64, 'Planificacion', 'update', '{\"fecha\":\"2020-12-19\",\"sistemasIntalados_idsistemasIntalados\":6,\"estado\":1}', '{\"fecha\":\"20-12-24\",\"sistemasIntalados_idsistemasIntalados\":6,\"estado\":1}', '2020-12-05 21:17:50', 17),
(65, 'Planificacion', 'update', '{\"fecha\":\"2020-12-24\",\"sistemasIntalados_idsistemasIntalados\":6,\"estado\":1}', '{\"fecha\":\"20-12-19\",\"sistemasIntalados_idsistemasIntalados\":6,\"estado\":1}', '2020-12-05 21:18:11', 17),
(66, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"1\",\"estado\":1,\"motivo\":null}', '2020-12-05 22:04:02', 17),
(67, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 22:04:03', 17),
(68, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":7,\"estado\":1}', '2020-12-05 22:04:03', 17),
(69, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":1,\"brigada_idbrigada\":5,\"fecha\":\"20-12-20\",\"estado\":0,\"planificacion_idplanificacion\":5}', '2020-12-05 22:04:03', 17),
(70, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":36,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 22:04:03', 17),
(71, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":8,\"estado\":1}', '2020-12-05 22:04:03', 17),
(72, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":1,\"brigada_idbrigada\":5,\"fecha\":\"20-12-20\",\"estado\":0,\"planificacion_idplanificacion\":6}', '2020-12-05 22:04:03', 17),
(73, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"8\",\"monto\":34944,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":\"2\",\"estado\":1,\"motivo\":null}', '2020-12-05 22:08:18', 17),
(74, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":0,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":36,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 22:08:19', 17),
(75, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":5,\"estado\":1}', '2020-12-05 22:08:19', 17),
(76, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"20-12-20\",\"estado\":0,\"planificacion_idplanificacion\":7}', '2020-12-05 22:08:19', 17),
(77, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":36,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 22:08:19', 17),
(78, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":6,\"estado\":1}', '2020-12-05 22:08:19', 17),
(79, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"20-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '2020-12-05 22:08:19', 17),
(80, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":7}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":7}', '2020-12-05 22:12:04', 17),
(81, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '2020-12-05 22:12:04', 17),
(82, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":1,\"motivo\":null}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 22:12:04', 17),
(83, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":7}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":7}', '2020-12-05 22:13:50', 17),
(84, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":8}', '2020-12-05 22:13:50', 17),
(85, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 22:13:50', 17),
(86, 'Registromantenimientos', 'insert', NULL, '{\"fecha\":\"20-12-05\",\"incidencias\":\"wdf\",\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"ordenServicio_id\":\"8\"}', '2020-12-05 22:18:00', 16),
(87, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":8}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '2020-12-05 22:18:00', 16),
(88, 'Registromantenimientos', 'insert', NULL, '{\"fecha\":\"20-12-05\",\"incidencias\":\"wdf\",\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"ordenServicio_id\":\"8\"}', '2020-12-05 22:27:18', 16),
(89, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":16,\"horasPlanificadas\":0,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 22:27:18', 16),
(90, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":8}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '2020-12-05 22:27:18', 16),
(91, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":7}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":7}', '2020-12-05 22:29:23', 17),
(92, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":8}', '2020-12-05 22:29:23', 17),
(93, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 22:29:23', 17),
(94, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":7}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":7}', '2020-12-05 22:30:03', 17),
(95, 'Contrato', 'update', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":8,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/Martes.jpg\",\"contrato\":\"contratosSubidos\\/Martes.jpg\",\"formasPago_id\":2,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 22:30:03', 17),
(96, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"1\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:32:00', 17),
(97, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"10\",\"monto\":74016,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/hayMama.jpg\",\"contrato\":\"contratosSubidos\\/hayMama.jpg\",\"formasPago_id\":\"1\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:34:04', 17),
(98, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"10\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"2\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:35:24', 17),
(99, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"10\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"2\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:37:23', 17),
(100, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":0,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 23:37:24', 17),
(101, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":7,\"estado\":1}', '2020-12-05 23:37:24', 17),
(102, 'Brigada', 'update', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"Brigada\\u00danica\",\"cantHombres\":3,\"horasTrabajadas\":0,\"horasPlanificadas\":52,\"idJefeBrigada\":12,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 23:37:24', 17),
(103, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":8,\"estado\":1}', '2020-12-05 23:37:24', 17),
(104, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"2\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:40:35', 17),
(105, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"10\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"1\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:42:03', 17),
(106, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":0,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":16,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 23:42:03', 17),
(107, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":7,\"estado\":1}', '2020-12-05 23:42:03', 17),
(108, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":16,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":52,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 23:42:03', 17),
(109, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":8,\"estado\":1}', '2020-12-05 23:42:03', 17),
(110, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"1\",\"monto\":34944,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":\"1\",\"estado\":1,\"motivo\":null}', '2020-12-05 23:44:32', 17),
(111, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":0,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":16,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 23:44:32', 17),
(112, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":7,\"estado\":1}', '2020-12-05 23:44:32', 17),
(113, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"20-12-20\",\"estado\":0,\"planificacion_idplanificacion\":13}', '2020-12-05 23:44:32', 17),
(114, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":16,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":52,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-05 23:44:32', 17),
(115, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-20\",\"sistemasIntalados_idsistemasIntalados\":8,\"estado\":1}', '2020-12-05 23:44:32', 17),
(116, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"20-12-20\",\"estado\":0,\"planificacion_idplanificacion\":14}', '2020-12-05 23:44:32', 17),
(117, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":13}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":13}', '2020-12-05 23:51:23', 17),
(118, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":14}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":14}', '2020-12-05 23:51:23', 17),
(119, 'Contrato', 'update', '{\"cliente_idcliente\":1,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":null}', '{\"cliente_idcliente\":1,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-05 23:51:23', 17),
(120, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":13}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":13}', '2020-12-05 23:52:11', 17),
(121, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":14}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":14}', '2020-12-05 23:52:11', 17),
(122, 'Contrato', 'update', '{\"cliente_idcliente\":1,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '{\"cliente_idcliente\":1,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '2020-12-05 23:52:11', 17),
(123, 'Brigada', 'update', '{\"nombre\":\"Jos\\u00e9Mart\\u00ed\",\"cantHombres\":10,\"horasTrabajadas\":0,\"horasPlanificadas\":0,\"idJefeBrigada\":16,\"categoria_id\":1,\"ueb_id\":3,\"estado\":1}', '{\"nombre\":\"Jos\\u00e9Mart\\u00ed\",\"cantHombres\":10,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":16,\"categoria_id\":1,\"ueb_id\":3,\"estado\":1}', '2021-01-05 23:54:56', 17),
(124, 'Planificacion', 'insert', NULL, '{\"fecha\":\"21-01-20\",\"sistemasIntalados_idsistemasIntalados\":7,\"estado\":1}', '2021-01-05 23:54:56', 17),
(125, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":1,\"brigada_idbrigada\":8,\"fecha\":\"21-01-20\",\"estado\":0,\"planificacion_idplanificacion\":15}', '2021-01-05 23:54:56', 17),
(126, 'Planificacion', 'insert', NULL, '{\"fecha\":\"21-07-20\",\"sistemasIntalados_idsistemasIntalados\":7,\"estado\":1}', '2021-01-05 23:54:56', 17),
(127, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":8,\"fecha\":\"21-01-20\",\"planificacion_idplanificacion\":15,\"estado\":0}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":8,\"fecha\":\"21-07-20\",\"estado\":0,\"planificacion_idplanificacion\":16}', '2021-01-05 23:54:56', 17),
(128, 'Brigada', 'update', '{\"nombre\":\"Jos\\u00e9Mart\\u00ed\",\"cantHombres\":10,\"horasTrabajadas\":0,\"horasPlanificadas\":16,\"idJefeBrigada\":16,\"categoria_id\":1,\"ueb_id\":3,\"estado\":1}', '{\"nombre\":\"Jos\\u00e9Mart\\u00ed\",\"cantHombres\":10,\"horasTrabajadas\":0,\"horasPlanificadas\":36,\"idJefeBrigada\":16,\"categoria_id\":1,\"ueb_id\":3,\"estado\":1}', '2021-01-05 23:54:56', 17),
(129, 'Planificacion', 'insert', NULL, '{\"fecha\":\"21-01-20\",\"sistemasIntalados_idsistemasIntalados\":8,\"estado\":1}', '2021-01-05 23:54:56', 17),
(130, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":1,\"brigada_idbrigada\":8,\"fecha\":\"21-01-20\",\"estado\":0,\"planificacion_idplanificacion\":17}', '2021-01-05 23:54:56', 17),
(131, 'Planificacion', 'insert', NULL, '{\"fecha\":\"21-07-20\",\"sistemasIntalados_idsistemasIntalados\":8,\"estado\":1}', '2021-01-05 23:54:56', 17),
(132, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":8,\"fecha\":\"21-01-20\",\"planificacion_idplanificacion\":17,\"estado\":0}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":8,\"fecha\":\"21-07-20\",\"estado\":0,\"planificacion_idplanificacion\":18}', '2021-01-05 23:54:56', 17),
(133, 'Cliente', 'insert', NULL, '{\"fechaAct\":\"20-12-06\",\"codigoREEUP\":\"SEisa745\",\"nombreCliente\":\"Ultima\",\"telefono\":\"52430465\",\"correo\":\"ultima@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":\"1234567890123457\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"1234567890987654\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calzada del cerro # 203\",\"estado\":1,\"provincia_id\":\"5\",\"organismo_idorganismo\":\"6\"}', '2020-12-06 00:02:07', 17),
(134, 'Ofertacomercial', 'insert', NULL, '{\"cliente_idcliente\":\"14\",\"ueb_id\":\"2\",\"numeroDoc\":\"432\",\"fecha\":\"20-12-06 12:12:47\",\"fechaVencimiento\":\"20-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-06 00:02:47', 17),
(135, 'Ofertacomercial', 'update', '{\"ueb_id\":\"2\",\"numeroDoc\":\"432\",\"fechaVencimiento\":\"20-12-17\",\"fecha\":\"20-12-06 12:12:47\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"cliente_idcliente\":\"14\",\"estados_idestados\":1}', '{\"cliente_idcliente\":\"14\",\"ueb_id\":\"2\",\"numeroDoc\":\"432\",\"fecha\":\"20-12-06 12:12:47\",\"fechaVencimiento\":\"20-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-06 00:02:47', 17),
(136, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"14\",\"tipoSistemaSeguridad_id\":6,\"local\":\"Empresa\",\"clasificacion\":2.01,\"clasificarentidad_id\":22}', '2020-12-06 00:02:47', 17),
(137, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"14\",\"tipoSistemaSeguridad_id\":3,\"local\":\"Empresa\",\"clasificacion\":4.01,\"clasificarentidad_id\":15}', '2020-12-06 00:02:47', 17),
(138, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"14\",\"tipoSistemaSeguridad_id\":2,\"local\":\"Empresa\",\"clasificacion\":7.01,\"clasificarentidad_id\":8}', '2020-12-06 00:02:47', 17),
(139, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '2020-12-06 00:03:04', 17),
(140, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '2020-12-06 00:03:04', 17),
(141, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '2020-12-06 00:03:44', 17),
(142, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '2020-12-06 00:03:45', 17);
INSERT INTO `auditlog` (`id`, `model`, `action`, `old`, `new`, `at`, `by`) VALUES
(143, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":10,\"ueb_id\":2,\"numeroDoc\":5209,\"fecha\":\"2020-12-02\",\"fechaVencimiento\":\"2020-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '{\"cliente_idcliente\":10,\"ueb_id\":2,\"numeroDoc\":5209,\"fecha\":\"2020-12-02\",\"fechaVencimiento\":\"2020-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '2020-12-06 00:03:53', 17),
(144, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":10,\"ueb_id\":2,\"numeroDoc\":5209,\"fecha\":\"2020-12-02\",\"fechaVencimiento\":\"2020-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '{\"cliente_idcliente\":10,\"ueb_id\":2,\"numeroDoc\":5209,\"fecha\":\"2020-12-02\",\"fechaVencimiento\":\"2020-12-18\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '2020-12-06 00:04:17', 17),
(145, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '{\"cliente_idcliente\":14,\"ueb_id\":2,\"numeroDoc\":432,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '2020-12-06 00:04:26', 17),
(146, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"14\",\"monto\":81876,\"dias\":\"40\",\"firma\":\"contratosSubidosFirmas\\/Ultima.jpg\",\"contrato\":\"contratosSubidos\\/Ultima.jpg\",\"formasPago_id\":\"2\",\"estado\":1,\"motivo\":null}', '2020-12-06 00:04:58', 17),
(147, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":52,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":68,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-06 00:04:58', 17),
(148, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-21\",\"sistemasIntalados_idsistemasIntalados\":12,\"estado\":1}', '2020-12-06 00:04:58', 17),
(149, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":14,\"brigada_idbrigada\":4,\"fecha\":\"20-12-21\",\"estado\":1,\"planificacion_idplanificacion\":19}', '2020-12-06 00:04:58', 17),
(150, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":68,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":88,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-06 00:04:58', 17),
(151, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-21\",\"sistemasIntalados_idsistemasIntalados\":13,\"estado\":1}', '2020-12-06 00:04:58', 17),
(152, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":14,\"brigada_idbrigada\":4,\"fecha\":\"20-12-21\",\"estado\":1,\"planificacion_idplanificacion\":20}', '2020-12-06 00:04:58', 17),
(153, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":88,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":160,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-06 00:04:58', 17),
(154, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-21\",\"sistemasIntalados_idsistemasIntalados\":14,\"estado\":1}', '2020-12-06 00:04:58', 17),
(155, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":14,\"brigada_idbrigada\":4,\"fecha\":\"20-12-21\",\"estado\":1,\"planificacion_idplanificacion\":21}', '2020-12-06 00:04:58', 17),
(156, 'Planificacion', 'update', '{\"fecha\":\"2020-12-20\",\"sistemasIntalados_idsistemasIntalados\":5,\"estado\":1}', '{\"fecha\":\"20-12-25\",\"sistemasIntalados_idsistemasIntalados\":5,\"estado\":1}', '2020-12-06 00:51:28', 17),
(157, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":7}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"20-12-25\",\"estado\":1,\"planificacion_idplanificacion\":7}', '2020-12-06 00:51:28', 17),
(158, 'Planificacion', 'update', '{\"fecha\":\"2020-12-25\",\"sistemasIntalados_idsistemasIntalados\":5,\"estado\":1}', '{\"fecha\":\"20-12-22\",\"sistemasIntalados_idsistemasIntalados\":5,\"estado\":1}', '2020-12-06 00:59:18', 17),
(159, 'Ordenservicio', 'update', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"2020-12-25\",\"estado\":1,\"planificacion_idplanificacion\":7}', '{\"cliente_idcliente\":8,\"brigada_idbrigada\":5,\"fecha\":\"20-12-22\",\"estado\":1,\"planificacion_idplanificacion\":7}', '2020-12-06 00:59:18', 17),
(160, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":5,\"ueb_id\":2,\"numeroDoc\":654,\"fecha\":\"2020-12-01\",\"fechaVencimiento\":\"2020-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":3}', '{\"cliente_idcliente\":5,\"ueb_id\":\"2\",\"numeroDoc\":\"654\",\"fecha\":\"2020-12-01\",\"fechaVencimiento\":\"20-12-17\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-06 01:25:30', 17),
(161, 'Cliente', 'update', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNo\",\"telefono\":52430465,\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430\",\"cuentaBancariaCUP\":1234567890123456,\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":2147483647783333,\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":2}', '{\"fechaAct\":\"2020-12-04 00:00:00\",\"codigoREEUP\":\"SEISA1234d\",\"nombreCliente\":\"ViernesNoche\",\"telefono\":\"52430467\",\"correo\":\"gracias@gmail.com\",\"direccion\":\"calle buenafortuna #430df\",\"cuentaBancariaCUP\":\"1234567890123465\",\"agenciaBanCup\":\"Metropolitano\",\"direcAgenciaCup\":\"calzada del cerro # 203\",\"cuentaBanCUC\":\"2147483647783333\",\"agenciaBanCUC\":\"Metropolitano\",\"direccionAgentBanCuc\":\"calle Compostel\",\"estado\":1,\"provincia_id\":5,\"organismo_idorganismo\":\"2\"}', '2020-12-06 02:59:35', 17),
(162, 'Ofertacomercial', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"ueb_id\":\"2\",\"numeroDoc\":\"34\",\"fecha\":\"20-12-06 03:12:28\",\"fechaVencimiento\":\"20-12-13\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-06 03:00:28', 17),
(163, 'Ofertacomercial', 'update', '{\"ueb_id\":\"2\",\"numeroDoc\":\"34\",\"fechaVencimiento\":\"20-12-13\",\"fecha\":\"20-12-06 03:12:28\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"cliente_idcliente\":\"12\",\"estados_idestados\":1}', '{\"cliente_idcliente\":\"12\",\"ueb_id\":\"2\",\"numeroDoc\":\"34\",\"fecha\":\"20-12-06 03:12:28\",\"fechaVencimiento\":\"20-12-13\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '2020-12-06 03:00:29', 17),
(164, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"tipoSistemaSeguridad_id\":6,\"local\":\"Empresa\",\"clasificacion\":2.01,\"clasificarentidad_id\":22}', '2020-12-06 03:00:29', 17),
(165, 'Sistemasintalados', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"tipoSistemaSeguridad_id\":3,\"local\":\"Empresa\",\"clasificacion\":7.01,\"clasificarentidad_id\":16}', '2020-12-06 03:00:29', 17),
(166, 'Ofertacomercial', 'update', '{\"cliente_idcliente\":12,\"ueb_id\":2,\"numeroDoc\":34,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-13\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":1}', '{\"cliente_idcliente\":12,\"ueb_id\":2,\"numeroDoc\":34,\"fecha\":\"2020-12-06\",\"fechaVencimiento\":\"2020-12-13\",\"elaborado\":17,\"cargo\":\"Especialista Comercial\",\"estados_idestados\":2}', '2020-12-06 03:15:33', 17),
(167, 'Contrato', 'insert', NULL, '{\"cliente_idcliente\":\"12\",\"monto\":47136,\"dias\":\"20\",\"firma\":\"contratosSubidosFirmas\\/ViernesNoche.jpg\",\"contrato\":\"contratosSubidos\\/ViernesNoche.jpg\",\"formasPago_id\":\"1\",\"estado\":1,\"motivo\":null}', '2020-12-06 03:16:07', 17),
(168, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":160,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":176,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-06 03:16:07', 17),
(169, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-21\",\"sistemasIntalados_idsistemasIntalados\":15,\"estado\":1}', '2020-12-06 03:16:07', 17),
(170, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":12,\"brigada_idbrigada\":4,\"fecha\":\"20-12-21\",\"estado\":1,\"planificacion_idplanificacion\":22}', '2020-12-06 03:16:07', 17),
(171, 'Brigada', 'update', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":176,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '{\"nombre\":\"HeroesdelTrabajo\",\"cantHombres\":10,\"horasTrabajadas\":2,\"horasPlanificadas\":208,\"idJefeBrigada\":7,\"categoria_id\":1,\"ueb_id\":2,\"estado\":1}', '2020-12-06 03:16:07', 17),
(172, 'Planificacion', 'insert', NULL, '{\"fecha\":\"20-12-21\",\"sistemasIntalados_idsistemasIntalados\":16,\"estado\":1}', '2020-12-06 03:16:07', 17),
(173, 'Ordenservicio', 'insert', NULL, '{\"cliente_idcliente\":12,\"brigada_idbrigada\":4,\"fecha\":\"20-12-21\",\"estado\":1,\"planificacion_idplanificacion\":23}', '2020-12-06 03:16:07', 17),
(174, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":13}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":13}', '2020-12-06 03:29:08', 17),
(175, 'Ordenservicio', 'update', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":1,\"planificacion_idplanificacion\":14}', '{\"cliente_idcliente\":1,\"brigada_idbrigada\":4,\"fecha\":\"2020-12-20\",\"estado\":0,\"planificacion_idplanificacion\":14}', '2020-12-06 03:29:08', 17),
(176, 'Contrato', 'update', '{\"cliente_idcliente\":1,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":1,\"estado\":1,\"motivo\":\"Pago Realizado\"}', '{\"cliente_idcliente\":1,\"monto\":34944,\"dias\":20,\"firma\":\"contratosSubidosFirmas\\/JesusManuel.jpg\",\"contrato\":\"contratosSubidos\\/JesusManuel.jpg\",\"formasPago_id\":1,\"estado\":0,\"motivo\":\"Incumplimiento en los T\\u00e9rminos de pago\"}', '2020-12-06 03:29:08', 17);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '1', 1581962812),
('administrador', '4', 1605857809),
('Comercial', '17', 1605765109),
('Comercial', '19', 1605843284),
('Comercial', '2', 1581963046),
('Comercial', '20', 1605844268),
('Comercial', '21', 1606539251),
('Comercial', '22', 1606539526),
('Comercial', '4', 1605857809),
('Comercial', '5', 1605857886),
('JefeBrigada', '11', 1584591339),
('JefeBrigada', '12', 1584591987),
('JefeBrigada', '13', 1584592063),
('JefeBrigada', '14', 1584595271),
('JefeBrigada', '15', 1584595347),
('JefeBrigada', '16', 1584596634),
('JefeBrigada', '3', 1581963075),
('JefeBrigada', '4', 1605857809),
('JefeBrigada', '7', 1584584375),
('Recursos_Humanos', '4', 1605857809),
('Recursos_Humanos', '6', 1583132430);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, 'Permite crear usuarios y sus respectivas competencias dentro del sistema', NULL, NULL, 1581962812, 1581962901),
('Comercial', 1, 'Permite crear contratos, gestionar ordenes de compra, clasificar instalaciones, planificar y crear ordenes diarias', NULL, NULL, 1581962917, 1606709666),
('JefeBrigada', 1, 'Permite realizar mantenimientos, reporte de mantenimiento y consultar reportes', NULL, NULL, 1581962988, 1606709599),
('Recursos_Humanos', 1, 'Encargado de gestionar las brigadas', NULL, NULL, 1583132052, 1583132052);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brigada`
--

CREATE TABLE `brigada` (
  `idbrigada` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cantHombres` int(11) NOT NULL,
  `horasTrabajadas` int(11) NOT NULL,
  `horasPlanificadas` int(11) NOT NULL,
  `idJefeBrigada` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `ueb_id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brigada`
--

INSERT INTO `brigada` (`idbrigada`, `nombre`, `cantHombres`, `horasTrabajadas`, `horasPlanificadas`, `idJefeBrigada`, `categoria_id`, `ueb_id`, `estado`) VALUES
(2, 'camiloCienFuegos', 10, 0, 0, 1, 1, 1, 1),
(4, 'HeroesdelTrabajo', 10, 2, 208, 7, 1, 2, 1),
(5, 'BrigadaÚnica', 3, 1, 0, 12, 1, 2, 1),
(6, 'HéroeFidel', 8, 45, 0, 7, 1, 2, 1),
(7, 'Granma', 9, 75, 88, 15, 1, 2, 1),
(8, 'JoséMartí', 10, 0, 36, 16, 1, 3, 1),
(9, 'Comandante', 10, 0, 0, 15, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cantdispositivos`
--

CREATE TABLE `cantdispositivos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cantdispositivos`
--

INSERT INTO `cantdispositivos` (`id`, `nombre`, `niveles`, `ponderacion`, `puntacion`) VALUES
(1, 'Cantidad de Dispositivos', 'Menos de 10(SADI y SACI)', 0.18, 1),
(2, 'Cantidad de Dispositivos', 'Menos de 4 (CCTV y SCA)', 0.18, 1),
(3, 'Cantidad de Dispositivos', 'Entre 11 y 49 (SADI y SACI)', 0.18, 4),
(4, 'Cantidad de Dispositivos', 'Entre 4 y 7 (CCTV y SCA)', 0.18, 4),
(5, 'Cantidad de Dispositivos', 'Entre 50 y 100 (SADI y SACI)', 0.18, 7),
(6, 'Cantidad de Dispositivos', 'Entre 8 y 10 (CCTV y SCA)', 0.18, 7),
(7, 'Cantidad de Dispositivos', 'Más de 100 (SADI y SACI)', 0.18, 10),
(8, 'Cantidad de Dispositivos', 'Más de 10 (CCTV y SCA)', 0.18, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cantidadaccesorios`
--

CREATE TABLE `cantidadaccesorios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `accesorios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cantidadaccesorios`
--

INSERT INTO `cantidadaccesorios` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `accesorios`) VALUES
(1, 'Cantidad de Accesorios', 'Más de 30', 0.19, 1, NULL),
(2, 'Cantidad de Accesorios', 'Entre 31 y 60', 0.19, 4, NULL),
(3, 'Cantidad de Accesorios', 'Entre 61 y 100', 0.19, 7, NULL),
(4, 'Cantidad de Accesorios', 'Más de 100 accesorios', 0.19, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cantidadsistemasfijos`
--

CREATE TABLE `cantidadsistemasfijos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cantidadsistemasfijos`
--

INSERT INTO `cantidadsistemasfijos` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `cant`) VALUES
(1, 'Cantidad de Sistemas', '1 Sistema', 0.12, 1, NULL),
(2, 'Cantidad de Sistemas', '2 Sistemas', 0.12, 4, NULL),
(3, 'Cantidad de Sistemas', '3 Sistemas', 0.12, 7, NULL),
(4, 'Cantidad de Sistemas', 'Más de 3 Sistemas', 0.12, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cantmediciones`
--

CREATE TABLE `cantmediciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cantmediciones`
--

INSERT INTO `cantmediciones` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `cant`) VALUES
(1, 'Cantidad de Mediciones', 'Hasta 2 mediciones', 0.14, 1, NULL),
(2, 'Cantidad de Mediciones', 'Entre 3 y 5 mediciones', 0.14, 4, NULL),
(3, 'Cantidad de Mediciones', 'Entre 5 y 8 mediciones', 0.14, 7, NULL),
(4, 'Cantidad de Mediciones', 'Más de 9 mediciones', 0.14, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cantsistemas`
--

CREATE TABLE `cantsistemas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cantsistemas`
--

INSERT INTO `cantsistemas` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `cant`) VALUES
(1, 'Cantidad de Sistemas', '1 Sistema', 0.16, 1, NULL),
(2, 'Cantidad de Sistemas', '2 Sistemas', 0.16, 4, NULL),
(3, 'Cantidad de Sistemas', '3 Sistemas', 0.16, 7, NULL),
(4, 'Cantidad de Sistemas', '4 Sistemas', 0.16, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'Director'),
(2, 'Jefe Comercial'),
(3, 'Jefe Económico'),
(4, 'Autorizado a Realizar Compras');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Mantenimiento'),
(2, 'Mantenimiento Correctivo');

-- --------------------------------------------------------

--
-- Table structure for table `clasificarentidad`
--

CREATE TABLE `clasificarentidad` (
  `id` int(11) NOT NULL,
  `rangoInicial` float NOT NULL,
  `rangoFinal` float NOT NULL,
  `precioMN` float NOT NULL,
  `precioCUC` float NOT NULL,
  `cantHombre` int(11) NOT NULL,
  `cantHoras` int(11) NOT NULL,
  `tipoParametro_id` int(11) NOT NULL,
  `tipoSistemaSeguridad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clasificarentidad`
--

INSERT INTO `clasificarentidad` (`id`, `rangoInicial`, `rangoFinal`, `precioMN`, `precioCUC`, `cantHombre`, `cantHoras`, `tipoParametro_id`, `tipoSistemaSeguridad_id`) VALUES
(1, 1, 2, 5376, 215.04, 2, 8, 1, 1),
(2, 2.01, 4, 16128, 645.12, 2, 24, 2, 1),
(3, 4.01, 7, 37632, 1505.28, 2, 56, 3, 1),
(4, 7.01, 10, 53760, 2150.4, 2, 80, 4, 1),
(5, 1, 2, 2688, 107.52, 2, 4, 1, 2),
(6, 2.01, 4, 10752, 430.08, 2, 16, 2, 2),
(7, 4.01, 7, 24192, 967.68, 2, 36, 3, 2),
(8, 7.01, 10, 48384, 1935.36, 2, 72, 4, 2),
(9, 1, 2, 8796, 351.84, 4, 6, 1, 4),
(10, 2.01, 4, 23456, 938.24, 4, 16, 2, 4),
(11, 4.01, 7, 41048, 1641.92, 4, 28, 3, 4),
(12, 7.01, 10, 58640, 2345.6, 4, 40, 4, 4),
(13, 1, 2, 6822, 272.88, 4, 6, 1, 3),
(14, 2.01, 4, 13644, 545.76, 4, 12, 2, 3),
(15, 4.01, 7, 22740, 909.6, 4, 20, 3, 3),
(16, 7.01, 10, 36384, 1455.36, 4, 32, 4, 3),
(17, 1, 2, 8796, 351.84, 4, 6, 1, 5),
(18, 2.01, 4, 23456, 938.24, 4, 16, 2, 5),
(19, 4.01, 7, 41048, 1641.92, 4, 28, 3, 5),
(20, 7.01, 10, 58640, 2345.6, 4, 40, 4, 5),
(21, 1, 2, 2688, 107.52, 2, 4, 1, 6),
(22, 2.01, 4, 10752, 430.08, 2, 16, 2, 6),
(23, 4.01, 7, 24192, 976.68, 2, 36, 3, 6),
(24, 7.01, 10, 48384, 1935.36, 2, 72, 4, 6),
(25, 1, 2, 2688, 107.52, 2, 4, 1, 7),
(26, 2.01, 4, 10752, 430.08, 2, 16, 2, 7),
(27, 4.01, 7, 24192, 967.68, 2, 36, 3, 7),
(28, 7.01, 10, 48384, 1935.36, 2, 72, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `fechaAct` datetime NOT NULL,
  `codigoREEUP` varchar(45) NOT NULL,
  `nombreCliente` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cuentaBancariaCUP` bigint(16) NOT NULL,
  `agenciaBanCup` varchar(100) NOT NULL,
  `direcAgenciaCup` varchar(100) NOT NULL,
  `cuentaBanCUC` bigint(16) NOT NULL,
  `agenciaBanCUC` varchar(100) NOT NULL,
  `direccionAgentBanCuc` varchar(100) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `organismo_idorganismo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idcliente`, `fechaAct`, `codigoREEUP`, `nombreCliente`, `telefono`, `correo`, `direccion`, `cuentaBancariaCUP`, `agenciaBanCup`, `direcAgenciaCup`, `cuentaBanCUC`, `agenciaBanCUC`, `direccionAgentBanCuc`, `estado`, `provincia_id`, `organismo_idorganismo`) VALUES
(1, '2020-11-23 00:00:00', 'SEISA1234', 'JesusManuel', 52430465, 'ifarocks@gmail.com', 'calle 1ra #5403', 2147483647, 'Metropolitano', 'calle 270', 2147483647, 'Metropolitano', 'calle Compostel', 1, 5, 2),
(2, '2020-11-23 00:00:00', 'SEISA1235', 'Pepe', 56776787, 'seisa@gmail.com', 'calle 5ta', 2147483647, 'Metropolitano', 'Avenida Girasoles y asusenas', 2147483647, 'Metropolitano', 'calzada del cerro # 203', 1, 6, 1),
(3, '2020-11-23 00:00:00', 'SEISA1236', 'Matota', 56237819, 'matota@gmail.com', 'calle k #18316', 2147483647, 'Metropolitano', 'Monterrey,San Miguel del Padron', 2147483647, 'Metropolitano', 'Calzad del cerro,Cerro', 1, 2, 2),
(4, '2020-11-23 00:00:00', 'SEISA1237', 'ETECSA', 52430465, 'etecsa@gmail.com', 'vento #5406', 214748364756, 'Metropolitano', 'calzada del cerro # 203', 214748364767, 'Metropolitano', 'calle Compostel', 1, 3, 2),
(5, '2020-11-28 00:00:00', 'SEISA3214', 'Prueba', 52430465, 'prueba@gmail.com', 'calle buenafortuna #430', 123456789012, 'Metropolitano', 'calzada del cerro # 203', 123456789123, 'Metropolitano', 'calzada del cerro # 203', 1, 5, 1),
(6, '2020-12-01 00:00:00', 'SEISA980', 'Flash', 52430465, 'flash@gmail.com', 'calle 5ta', 123456789012, 'Metropolitano', 'calzada del cerro # 203', 812345555555, 'Metropolitano', 'calle Compostel', 1, 2, 1),
(7, '2020-12-01 00:00:00', 'SEISA9802', 'OfertaquePaso', 52430465, 'que@paso.com', 'calle buenafortuna #430', 123456789012, 'Metropolitano', 'calzada del cerro # 203', 122343456789, 'Metropolitano', 'calle Compostel', 1, 4, 1),
(8, '2020-12-01 00:00:00', 'Seisa90', 'Martes', 52430465, 'martes@gmail.com', 'calle 1ra #5403', 123456789012, 'Metropolitano', 'calzada del cerro # 203', 214748364734, 'Metropolitano', 'calle Compostel', 1, 5, 1),
(9, '2020-12-02 00:00:00', 'SEISA5478', 'Contratara', 54645777, 'contratara@gmail.com', 'calle 1ra #5403', 111111111111, 'Metropolitano', 'calzada del cerro # 203', 111111111111, 'Metropolitano', 'calle Compostel', 1, 2, 1),
(10, '2020-12-02 00:00:00', 'SEISA9808', 'hayMama', 52430465, 'contratara2@gmail.com', 'calle buenafortuna #430', 123456789012, 'Metropolitano', 'calle 270', 214748364712, 'Metropolitano', 'calzada del cerro # 203', 1, 5, 1),
(11, '2020-12-04 00:00:00', 'SEISA1234K', 'Viernes', 52430465, 'viernes@gmail.com', 'calle k #18316', 1234567890123456, 'Metropolitano', 'calle 270', 2346789765433322, 'Metropolitano', 'calle Compostel', 1, 6, 1),
(12, '2020-12-04 00:00:00', 'SEISA1234d', 'ViernesNoche', 52430467, 'gracias@gmail.com', 'calle buenafortuna #430df', 1234567890123465, 'Metropolitano', 'calzada del cerro # 203', 2147483647783333, 'Metropolitano', 'calle Compostel', 1, 5, 2),
(13, '2020-12-05 00:00:00', 'Seisa893', 'Sabado', 52430465, 'sabado@seisa.cu', 'calle buenafortuna #430', 1234123456780987, 'Metropolitano', 'calzada del cerro # 203', 1234567854326786, 'Metropolitano', 'calzada del cerro # 203', 1, 5, 1),
(14, '2020-12-06 00:00:00', 'SEisa745', 'Ultima', 52430465, 'ultima@gmail.com', 'calle buenafortuna #430', 1234567890123457, 'Metropolitano', 'calzada del cerro # 203', 1234567890987654, 'Metropolitano', 'calzada del cerro # 203', 1, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `compequiposelec`
--

CREATE TABLE `compequiposelec` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compequiposelec`
--

INSERT INTO `compequiposelec` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`) VALUES
(1, 'Complejidad del Equipamiento', 'Simple', 0.25, 1),
(2, 'Complejidad del Equipamiento', 'Medianamente Complejos', 0.25, 4),
(3, 'Complejidad del Equipamiento', 'Complejos', 0.25, 7),
(4, 'Complejidad del Equipamiento', 'Muy Complejos', 0.25, 10);

-- --------------------------------------------------------

--
-- Table structure for table `complejidadsistfijos`
--

CREATE TABLE `complejidadsistfijos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complejidadsistfijos`
--

INSERT INTO `complejidadsistfijos` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`) VALUES
(1, 'Complejidad del Equipamiento', 'Simples', 0.22, 1),
(2, 'Complejidad del Equipamiento', 'Medianamente Complejos', 0.22, 4),
(3, 'Complejidad del Equipamiento', 'Complejos', 0.22, 7),
(4, 'Complejidad del Equipamiento', 'Muy Complejos', 0.22, 10);

-- --------------------------------------------------------

--
-- Table structure for table `condambsegelect`
--

CREATE TABLE `condambsegelect` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `valores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `condambsegelect`
--

INSERT INTO `condambsegelect` (`id`, `nombre`, `niveles`, `ponderacion`, `valores`) VALUES
(1, 'Condiciones Ambientales', 'Excelente', 0.14, 1),
(2, 'Condiciones Ambientales', 'Buenas', 0.14, 4),
(3, 'Condiciones Ambientales', 'Regulares', 0.14, 7),
(4, 'Condiciones Ambientales', 'Malas', 0.14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `condambsistfijos`
--

CREATE TABLE `condambsistfijos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `condambsistfijos`
--

INSERT INTO `condambsistfijos` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`) VALUES
(1, 'Condiciones Ambientales', 'Excelentes', 0.16, 1),
(2, 'Condiciones Ambientales', 'Buenas', 0.16, 4),
(3, 'Condiciones Ambientales', 'Regulares', 0.16, 7),
(4, 'Condiciones Ambientales', 'Malas', 0.16, 10);

-- --------------------------------------------------------

--
-- Table structure for table `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `monto` double NOT NULL,
  `dias` int(11) NOT NULL,
  `firma` varchar(250) NOT NULL,
  `contrato` varchar(250) NOT NULL,
  `formasPago_id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `motivo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contrato`
--

INSERT INTO `contrato` (`id`, `cliente_idcliente`, `monto`, `dias`, `firma`, `contrato`, `formasPago_id`, `estado`, `motivo`) VALUES
(4, 8, 34944, 20, 'contratosSubidosFirmas/Martes.jpg', 'contratosSubidos/Martes.jpg', 2, 1, 'Pago Realizado'),
(11, 1, 34944, 20, 'contratosSubidosFirmas/JesusManuel.jpg', 'contratosSubidos/JesusManuel.jpg', 1, 0, 'Incumplimiento en los Términos de pago'),
(12, 14, 81876, 40, 'contratosSubidosFirmas/Ultima.jpg', 'contratosSubidos/Ultima.jpg', 2, 1, NULL),
(13, 12, 47136, 20, 'contratosSubidosFirmas/ViernesNoche.jpg', 'contratosSubidos/ViernesNoche.jpg', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id_email` int(11) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id_email`, `receiver_email`, `subject`, `content`, `attachment`, `id`) VALUES
(1, 'seisa@gmail.com', 'jesus', 'jesus', 'attachments/1585005769.jpg', 2),
(2, 'pokemon@gmail.com', 'pppppp', 'pppppp', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `idequipos` int(11) NOT NULL,
  `nombreEquipo` varchar(50) NOT NULL,
  `precioCosto` float NOT NULL,
  `precioIntalacion` float NOT NULL,
  `precioMantenimiento` float NOT NULL,
  `sistemasIntalados_idsistemasIntalados` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`idequipos`, `nombreEquipo`, `precioCosto`, `precioIntalacion`, `precioMantenimiento`, `sistemasIntalados_idsistemasIntalados`, `estado_id`, `cantidad`) VALUES
(5, 'Voltimetro', 120, 10, 5, 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipos_has_ordencompra`
--

CREATE TABLE `equipos_has_ordencompra` (
  `equipos_idequipos` int(11) NOT NULL,
  `ordenCompra_idordenCompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipos_has_ordencompra`
--

INSERT INTO `equipos_has_ordencompra` (`equipos_idequipos`, `ordenCompra_idordenCompra`) VALUES
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipos_has_proveedor`
--

CREATE TABLE `equipos_has_proveedor` (
  `equipos_idequipos` int(11) NOT NULL,
  `proveedor_idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'Excelente'),
(2, 'Bueno'),
(3, 'Regular'),
(4, 'Malo');

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `idestados` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`idestados`, `nombre`) VALUES
(1, 'Elaborada'),
(2, 'Aprobada'),
(3, 'Rechazada');

-- --------------------------------------------------------

--
-- Table structure for table `formaspago`
--

CREATE TABLE `formaspago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formaspago`
--

INSERT INTO `formaspago` (`id`, `nombre`) VALUES
(1, 'Cheque'),
(2, 'Letra de Cambio');

-- --------------------------------------------------------

--
-- Table structure for table `mastilpararayo`
--

CREATE TABLE `mastilpararayo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `tamaño` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mastilpararayo`
--

INSERT INTO `mastilpararayo` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `tamaño`) VALUES
(1, 'Mástil del Pararrayo', 'Menos de 3m', 0.3, 1, NULL),
(2, 'Mástil del Pararrayos', 'Entre 3m y 6m', 0.3, 4, NULL),
(3, 'Mástil del Pararrayos', 'Entre 6m y 10m', 0.3, 7, NULL),
(4, 'Mástil del Pararrayos', 'Más de 10m', 0.3, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('Da\\User\\Migration\\m000000_000001_create_user_table', 1581916671),
('Da\\User\\Migration\\m000000_000002_create_profile_table', 1581916672),
('Da\\User\\Migration\\m000000_000003_create_social_account_table', 1581916672),
('Da\\User\\Migration\\m000000_000004_create_token_table', 1581916673),
('Da\\User\\Migration\\m000000_000005_add_last_login_at', 1581916673),
('Da\\User\\Migration\\m000000_000006_add_two_factor_fields', 1581916673),
('Da\\User\\Migration\\m000000_000007_enable_password_expiration', 1581916673),
('Da\\User\\Migration\\m000000_000008_add_last_login_ip', 1581916674),
('Da\\User\\Migration\\m000000_000009_add_gdpr_consent_fields', 1581916674),
('m000000_000000_base', 1581707329),
('m140506_102106_rbac_init', 1581916674),
('m150813_090217_create_auditlog_table', 1607130387),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1581916675),
('m180523_151638_rbac_updates_indexes_without_prefix', 1581916675);

-- --------------------------------------------------------

--
-- Table structure for table `nivelessepresores`
--

CREATE TABLE `nivelessepresores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nivelessepresores`
--

INSERT INTO `nivelessepresores` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`) VALUES
(1, 'Niveles de Supresores', 'Un solo nivel de supresor', 0.1, 1),
(2, 'Niveles de Supresores', 'Dos niveles de supresores', 0.1, 4),
(3, 'Niveles de Supresores', 'Tres niveles de supresores', 0.1, 7),
(4, 'Niveles de Supresores', 'Protección a telefonía y datos', 0.1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `obstruccionequipo`
--

CREATE TABLE `obstruccionequipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obstruccionequipo`
--

INSERT INTO `obstruccionequipo` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`) VALUES
(1, 'Obstrucción del Equipamiento', 'Poco Probable', 0.15, 1),
(2, 'Obstrucción del Equipamiento', 'Medianamente Probable', 0.15, 4),
(3, 'Obstrucción del Equipamiento', 'Probable', 0.15, 7),
(4, 'Obstrucción del Equipamiento', 'Muy Probable', 0.15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ofertacomercial`
--

CREATE TABLE `ofertacomercial` (
  `id` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `ueb_id` int(11) NOT NULL,
  `numeroDoc` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `elaborado` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `estados_idestados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ofertacomercial`
--

INSERT INTO `ofertacomercial` (`id`, `cliente_idcliente`, `ueb_id`, `numeroDoc`, `fecha`, `fechaVencimiento`, `elaborado`, `cargo`, `estados_idestados`) VALUES
(24, 8, 2, 987, '2020-12-01', '2020-12-24', 17, 'Especialista Comercial', 2),
(25, 1, 2, 456, '2020-12-02', '2020-12-18', 17, 'Especialista Comercial', 2),
(26, 10, 2, 5209, '2020-12-02', '2020-12-18', 17, 'Especialista Comercial', 2),
(27, 14, 2, 432, '2020-12-06', '2020-12-17', 17, 'Especialista Comercial', 2),
(28, 12, 2, 34, '2020-12-06', '2020-12-13', 17, 'Especialista Comercial', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ofertaitems`
--

CREATE TABLE `ofertaitems` (
  `id` int(11) NOT NULL,
  `descripcion` int(25) NOT NULL,
  `clasificacion` int(45) NOT NULL,
  `cantXano` int(11) NOT NULL,
  `precioMN` float NOT NULL,
  `precioCUC` float NOT NULL,
  `ofertaComercial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ofertaitems`
--

INSERT INTO `ofertaitems` (`id`, `descripcion`, `clasificacion`, `cantXano`, `precioMN`, `precioCUC`, `ofertaComercial_id`) VALUES
(1, 7, 2, 1, 10752, 430.08, 25),
(2, 2, 4, 1, 24192, 967.68, 25),
(3, 3, 7, 1, 36384, 1455.36, 25),
(4, 1, 4, 1, 37632, 1505.28, 26),
(5, 3, 7, 1, 36384, 1455.36, 26),
(6, 6, 2, 1, 10752, 430.08, 27),
(7, 3, 4, 1, 22740, 909.6, 27),
(8, 2, 7, 1, 48384, 1935.36, 27),
(9, 6, 2, 1, 10752, 430.08, 28),
(10, 3, 7, 1, 36384, 1455.36, 28);

-- --------------------------------------------------------

--
-- Table structure for table `ordencompra`
--

CREATE TABLE `ordencompra` (
  `idordenCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordencompra`
--

INSERT INTO `ordencompra` (`idordenCompra`, `fecha`, `cliente_idcliente`) VALUES
(1, '2020-11-30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ordenservicio`
--

CREATE TABLE `ordenservicio` (
  `id` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `brigada_idbrigada` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `planificacion_idplanificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordenservicio`
--

INSERT INTO `ordenservicio` (`id`, `cliente_idcliente`, `brigada_idbrigada`, `fecha`, `estado`, `planificacion_idplanificacion`) VALUES
(7, 8, 5, '2020-12-22', 1, 7),
(8, 8, 5, '2020-12-20', 0, 8),
(9, 1, 4, '2020-12-20', 0, 13),
(10, 1, 4, '2020-12-20', 0, 14),
(16, 12, 4, '2020-12-21', 1, 22),
(17, 12, 4, '2020-12-21', 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `organismo`
--

CREATE TABLE `organismo` (
  `idorganismo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organismo`
--

INSERT INTO `organismo` (`idorganismo`, `nombre`) VALUES
(1, 'CTC'),
(2, 'PCC'),
(3, 'MINCIN'),
(4, 'MINTUR'),
(5, 'MICONS'),
(6, 'MITRANS');

-- --------------------------------------------------------

--
-- Table structure for table `pararrayos`
--

CREATE TABLE `pararrayos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pararrayos`
--

INSERT INTO `pararrayos` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `cant`) VALUES
(1, 'Cantidad de Pararrayos', '1 Pararrayo', 0.22, 1, NULL),
(2, 'Cantidad de Pararrayos', '2 Pararrayos', 0.22, 4, NULL),
(3, 'Cantidad de Pararrayos', '3 Pararrayos', 0.22, 7, NULL),
(4, 'Cantidad de Pararrayos', 'Más de 3 Pararrayos', 0.22, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perimetralmalla`
--

CREATE TABLE `perimetralmalla` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `tamaño` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perimetralmalla`
--

INSERT INTO `perimetralmalla` (`id`, `nombre`, `niveles`, `ponderacion`, `puntuacion`, `tamaño`) VALUES
(1, 'Perimetral de la Malla de Tierra', 'Menos de 20m', 0.13, 1, NULL),
(2, 'Perimetral de la Malla de Tierra', 'Entre 21m y 30 m', 0.13, 4, NULL),
(3, 'Perimetral de la Malla de Tierra', 'Entre 30m y 40 m', 0.13, 7, NULL),
(4, 'Perimetral de la Malla de Tierra', 'Más de 40 m', 0.13, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `planificacion`
--

CREATE TABLE `planificacion` (
  `idplanificacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `sistemasIntalados_idsistemasIntalados` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planificacion`
--

INSERT INTO `planificacion` (`idplanificacion`, `fecha`, `sistemasIntalados_idsistemasIntalados`, `estado`) VALUES
(7, '2020-12-22', 5, 1),
(8, '2020-12-20', 6, 1),
(13, '2020-12-20', 7, 1),
(14, '2020-12-20', 8, 1),
(22, '2020-12-21', 15, 1),
(23, '2020-12-21', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `timezone`, `bio`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Diana Delfino Llerena', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2', '', NULL, 'Directora Comercial de la oficina central SEISA Habana'),
(3, 'Cristian Delfino Llerena', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, 'Jefe Brigada No1 Matanzas'),
(7, 'Jesus Manuel', 'jefe@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', '2', '', NULL, ''),
(12, 'Lapiz', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2', '', NULL, ''),
(13, 'Jose', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, ''),
(14, 'kill', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, ''),
(15, 'julieta', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, ''),
(16, 'Justo', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, ''),
(17, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, ''),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'La Habana', '', NULL, ''),
(20, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Cienfuegos', '', NULL, ''),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '5', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(100) NOT NULL,
  `nombreRepresentante` varchar(100) DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `cuentaBancaria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `provincia`
--

INSERT INTO `provincia` (`id`, `nombre`) VALUES
(1, 'Pinar del Rio'),
(2, 'La Habana'),
(3, 'Mayabeque'),
(4, 'Isla de la Juventud'),
(5, 'Matanzas'),
(6, 'Cienfuegos'),
(7, 'Villa Clara');

-- --------------------------------------------------------

--
-- Table structure for table `registromantenimientos`
--

CREATE TABLE `registromantenimientos` (
  `idregistroMantenimientos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `incidencias` varchar(500) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `brigada_idbrigada` int(11) NOT NULL,
  `ordenServicio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registromantenimientos`
--

INSERT INTO `registromantenimientos` (`idregistroMantenimientos`, `fecha`, `incidencias`, `cliente_idcliente`, `brigada_idbrigada`, `ordenServicio_id`) VALUES
(6, '2020-12-05', 'wdf', 8, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `registrosadiosaci`
--

CREATE TABLE `registrosadiosaci` (
  `id` int(11) NOT NULL,
  `voltajedeAC` varchar(100) DEFAULT NULL,
  `voltajedeBateria` varchar(100) DEFAULT NULL,
  `voltajedeFuente` varchar(100) DEFAULT NULL,
  `voltajedeSirenas` varchar(100) DEFAULT NULL,
  `voltajes_id` int(11) NOT NULL,
  `registroMantenimientos_idregistroMantenimientos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `responsables`
--

CREATE TABLE `responsables` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `primerApe` varchar(45) NOT NULL,
  `segApellido` varchar(45) NOT NULL,
  `carnet` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `cargos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombreRol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`idrol`, `nombreRol`) VALUES
(1, 'Administrador'),
(2, 'Jefe de Brigada'),
(3, 'Comercial');

-- --------------------------------------------------------

--
-- Table structure for table `sistemaseguridadelectronica`
--

CREATE TABLE `sistemaseguridadelectronica` (
  `idsistemaSeguridadElectronica` int(11) NOT NULL,
  `sistemasIntalados_idsistemasIntalados` int(11) NOT NULL,
  `cantSistemas_id` int(11) NOT NULL,
  `cantDispositivos_id` int(11) NOT NULL,
  `compEquiposElec_id` int(11) NOT NULL,
  `altura_id` int(11) NOT NULL,
  `condambSegElect_id` int(11) NOT NULL,
  `obstruccionEquipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sistemaseguridadelectronica`
--

INSERT INTO `sistemaseguridadelectronica` (`idsistemaSeguridadElectronica`, `sistemasIntalados_idsistemasIntalados`, `cantSistemas_id`, `cantDispositivos_id`, `compEquiposElec_id`, `altura_id`, `condambSegElect_id`, `obstruccionEquipo_id`) VALUES
(2, 5, 2, 3, 2, 2, 2, 3),
(3, 6, 1, 3, 2, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sistemasfijosextincion`
--

CREATE TABLE `sistemasfijosextincion` (
  `idsistemasFijosExtincion` int(11) NOT NULL,
  `sistemasIntalados_idsistemasIntalados` int(11) NOT NULL,
  `obstruccionEquipo_id` int(11) NOT NULL,
  `cantidadAccesorios_id` int(11) NOT NULL,
  `cantidadSistemasFijos_id` int(11) NOT NULL,
  `alturaMontaje_id` int(11) NOT NULL,
  `complejidadSistFijos_id` int(11) NOT NULL,
  `condAmbSistFijos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sistemasintalados`
--

CREATE TABLE `sistemasintalados` (
  `idsistemasIntalados` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `tipoSistemaSeguridad_id` int(11) NOT NULL,
  `local` varchar(100) NOT NULL,
  `clasificacion` float NOT NULL,
  `clasificarentidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sistemasintalados`
--

INSERT INTO `sistemasintalados` (`idsistemasIntalados`, `cliente_idcliente`, `tipoSistemaSeguridad_id`, `local`, `clasificacion`, `clasificarentidad_id`) VALUES
(2, 2, 7, 'Empresa', 2.01, 2),
(4, 3, 3, 'Oficina 2do Piso', 5.08, 15),
(5, 8, 6, 'martes', 4.45, 23),
(6, 8, 2, 'martes13', 3.61, 6),
(7, 1, 7, 'Empresa', 2.01, 26),
(8, 1, 2, 'Empresa', 4.01, 7),
(10, 10, 1, 'Empresa', 4.01, 3),
(11, 10, 3, 'Empresa', 7.01, 16),
(12, 14, 6, 'Empresa', 2.01, 22),
(13, 14, 3, 'Empresa', 4.01, 15),
(14, 14, 2, 'Empresa', 7.01, 8),
(15, 12, 6, 'Empresa', 2.01, 22),
(16, 12, 3, 'Empresa', 7.01, 16);

-- --------------------------------------------------------

--
-- Table structure for table `sistemasproteccionrayos`
--

CREATE TABLE `sistemasproteccionrayos` (
  `idsistemasProteccionRayos` int(11) NOT NULL,
  `sistemasIntalados_idsistemasIntalados` int(11) NOT NULL,
  `nivelesSepresores_id` int(11) NOT NULL,
  `mastilPararayo_id` int(11) NOT NULL,
  `pararrayos_id` int(11) NOT NULL,
  `cantMediciones_id` int(11) NOT NULL,
  `perimetralMalla_id` int(11) NOT NULL,
  `tamanoBajante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sistemasproteccionrayos`
--

INSERT INTO `sistemasproteccionrayos` (`idsistemasProteccionRayos`, `sistemasIntalados_idsistemasIntalados`, `nivelesSepresores_id`, `mastilPararayo_id`, `pararrayos_id`, `cantMediciones_id`, `perimetralMalla_id`, `tamanoBajante_id`) VALUES
(7, 4, 2, 2, 3, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tamanobajante`
--

CREATE TABLE `tamanobajante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `niveles` varchar(45) NOT NULL,
  `ponderacion` float NOT NULL,
  `puntacion` int(11) NOT NULL,
  `tamano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tamanobajante`
--

INSERT INTO `tamanobajante` (`id`, `nombre`, `niveles`, `ponderacion`, `puntacion`, `tamano`) VALUES
(1, 'Tamaño del Bajante', 'Menos de 5m', 0.11, 1, NULL),
(2, 'Tamaño del Bajante', 'Entre 6m y 10m', 0.11, 4, NULL),
(3, 'Tamaño del Bajante', 'Entre 11m y 15m', 0.11, 7, NULL),
(4, 'Tamaño del Bajante', 'Más de 15m', 0.11, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipoparametro`
--

CREATE TABLE `tipoparametro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipoparametro`
--

INSERT INTO `tipoparametro` (`id`, `nombre`) VALUES
(1, 'Simple'),
(2, 'Medianamente Complejo'),
(3, 'Complejo'),
(4, 'Muy Complejo');

-- --------------------------------------------------------

--
-- Table structure for table `tiposistemaseguridad`
--

CREATE TABLE `tiposistemaseguridad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiposistemaseguridad`
--

INSERT INTO `tiposistemaseguridad` (`id`, `nombre`) VALUES
(1, 'Sistema Automático de Detección de Incendios'),
(2, 'Sistemas de Alarma Contra Intrusos'),
(3, 'Sistema de Protección Contra Rayos'),
(4, 'Sistema de Suministro de Agua Contra Incendio'),
(5, 'Sistemas Portátiles de Extinción'),
(6, 'Sistema Control de Acceso'),
(7, 'Circuito Cerrado de Televisión');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ueb`
--

CREATE TABLE `ueb` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `provincia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ueb`
--

INSERT INTO `ueb` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `provincia_id`) VALUES
(1, 'UEB La Habana', 'calle 26', 76912301, 'ueblahabana@gmail.com', 2),
(2, 'Heroes de Matanzas', 'wefwef', 45345, 'rwerwe@dwe.com', 5),
(3, 'Guantanamo', 'wwdwdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 2147483647, 'wdwd@hgdd.com', 6),
(4, 'HeroesMayabeque', 'calle mayabeque #5403 E/Narciza y 62', 52430465, 'mayabeque@seisa.cu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `confirmed_at` int(11) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `last_login_at` int(11) DEFAULT NULL,
  `last_login_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_tf_key` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_tf_enabled` tinyint(1) DEFAULT 0,
  `password_changed_at` int(11) DEFAULT NULL,
  `gdpr_consent` tinyint(1) DEFAULT 0,
  `gdpr_consent_date` int(11) DEFAULT NULL,
  `gdpr_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `unconfirmed_email`, `registration_ip`, `flags`, `confirmed_at`, `blocked_at`, `updated_at`, `created_at`, `last_login_at`, `last_login_ip`, `auth_tf_key`, `auth_tf_enabled`, `password_changed_at`, `gdpr_consent`, `gdpr_consent_date`, `gdpr_deleted`) VALUES
(1, 'storm', 'ifarocks26@gmail.com', '$2y$10$BmkwNEcuFD5Z.H/BMpOoe.7DuSOJsp06K4SASbmqX8lZ3OCvtZ4T2', '8wanXwzdEGiYQK-Xk2v9MGs1ZGaRPoBP', NULL, NULL, 0, 1581962830, NULL, 1581962810, 1581962810, 1607148128, '127.0.0.1', '', 0, 1581962810, 0, NULL, 0),
(2, 'diana', 'diana.delfinoll@gmail.com', '$2y$10$TlwLwgQW/mxYjtyXq.HUCuRco90e6jBbkwQE1DrwQ5CTmaZLiMbbm', 'P8yXoWyoRPicRQ_fnkvOB92rSI_x_XWp', NULL, '127.0.0.1', 0, 1581963008, NULL, 1581963008, 1581963008, 1607147923, '127.0.0.1', '', 0, 1581963008, 0, NULL, 0),
(3, 'cafe', 'cafe@gmail.com', '$2y$10$uIwgJ6tvn8urJc4/aI9xGO6dtsMpa2VyJDVzi3n.axLLpFuND0qjK', 'WU2qDmxrw5mv_da6v7WtlukaUsffsV8d', NULL, '127.0.0.1', 0, 1581963065, NULL, 1581963065, 1581963065, 1606009238, '127.0.0.1', '', 0, 1581963065, 0, NULL, 0),
(4, 'samsung', 'samsung@gmail.com', '$2y$10$/2hYAeGW32wOXLYLJAo6mevd7p9CNP5VXs92J1MXjhtz4d5rFjDwu', '4VVMMZjV9vsZLsSwKZissKQWOr4zcNoT', NULL, '127.0.0.1', 0, 1582690496, NULL, 1582690496, 1582690496, NULL, NULL, '', 0, 1582690496, 0, NULL, 0),
(5, 'pepe', 'pepe@gmail.com', '$2y$10$Oen56WZuIfI6ynCYfqhrSeiyhdA/I/xL4GfYDF1Br/KAUNUL7JuBe', 'DvhaZt0wgMFVsBaD5piEH9uOJaw6B_Oy', NULL, '127.0.0.1', 0, 1583125492, NULL, 1583125492, 1583125492, NULL, NULL, NULL, 0, 1583125492, 0, NULL, 0),
(6, 'recurso', 'rh@gmail.com', '$2y$10$cG1AYXMwcH3M7cm7B8n29OV38JGuZ8xcMIQkDjsH5aSh7WNrPUdUK', 'bAXKYVHT8MX2HtCgYe_sHhBG4DABTGzI', NULL, '127.0.0.1', 0, 1583132090, NULL, 1583132090, 1583132090, 1583450671, '127.0.0.1', '', 0, 1583132090, 0, NULL, 0),
(7, 'jefe', 'jefe@gmail.com', '$2y$10$G2NTSWiWJ2drV5wKzeUQ2OV.oGr8/WNEdzqcwOLS6Rb5AbEtUH14S', 'itYhIjad79Q4IXT1bULUHmfnFTfgV5as', NULL, '127.0.0.1', 0, 1584584268, NULL, 1584584268, 1584584268, NULL, NULL, '', 0, 1584584268, 0, NULL, 0),
(8, 'pepito', 'hkk@kg.com', '$2y$10$OiqTO2UBx8/aS6S39DHXg.TspR1PgqCZ.qKMT7x.rb/7ZvmnDG8rG', 'P4RFoTnBEUDWJkOcuvzzDrrtyNu9hrp2', NULL, '127.0.0.1', 0, 1584586421, NULL, 1584586644, 1584586421, NULL, NULL, '', 0, 1584586644, 0, NULL, 0),
(9, 'tonton', 'kjkhj@hgh.com', '$2y$10$pFx40of3StJEgAgi/p.2JuiBW01Yd3plaqWRUHimcheM.zbfhYo0u', 'QppLBqQ4cgcSPma5aiQk9WNEa-6kTY1G', NULL, '127.0.0.1', 0, 1584586714, NULL, 1584586885, 1584586714, NULL, NULL, '', 0, 1584586885, 0, NULL, 0),
(12, 'pepepe', 'lapiz@lapiz.com', '$2y$10$.EVtZcZbMqk4sk.4yw8ONe/f0vYNb.j6gUGHyMgHxLtxKy5mCeRlq', 'zj5vzhGQUdRHdgyVGMzj2NwO-tmH8QGA', NULL, '127.0.0.1', 0, 1584591971, NULL, 1584591971, 1584591971, NULL, NULL, '', 0, 1584591971, 0, NULL, 0),
(13, 'qdqwdqw', 'ooo@ff.com', '$2y$10$Ffe0EyWJBEOIdrWrrCQp.unCrzSFS8wbPCdohY/pKFuVnqBbt45M2', 'Mm9X-ZQlsp-y5aiy0g-NAl83GG3X4Jiy', NULL, '127.0.0.1', 0, 1584592042, NULL, 1584592042, 1584592042, NULL, NULL, '', 0, 1584592042, 0, NULL, 0),
(14, 'kill', 'kilo@l.com', '$2y$10$z1MyXq3Mk3HpQ6pJJ8wsaOXqCYjRwhuKR9TIWi1/Qxlb.pJBRonUu', 't1gUgEqO1LW_8nM62JqMaKlgI4bQ5ThW', NULL, '127.0.0.1', 0, 1584595245, NULL, 1584595245, 1584595245, NULL, NULL, '', 0, 1584595245, 0, NULL, 0),
(15, 'julieta', 'jil@v.com', '$2y$10$UZOWat/4NMEiqkMZ8lWxYurhCq6WgccAjKDGVLH0VXvs0NvLIXvzW', 'tSfJIht7dvgO1Vn6ZjpzEF2SHbAfHzLN', NULL, '127.0.0.1', 0, 1584595328, NULL, 1584595328, 1584595328, NULL, NULL, '', 0, 1584595328, 0, NULL, 0),
(16, 'justo', 'kljksd@he.com', '$2y$10$.EOlbuc6oihXYzqaxtMoCeV81e90UNj5B7owXw2ivGQg64EQVKU.m', 'iJFhY_LrkQIdqxLKMrQ7WWOUqWSk0C8a', NULL, '127.0.0.1', 0, 1584596570, NULL, 1607122804, 1584596570, 1607221122, '127.0.0.1', '', 0, 1607122804, 0, NULL, 0),
(17, 'kane', 'kanechomp@gmail.com', '$2y$10$z5/MN.E5lYqAZ5O1Xk2EGuNUQC4Brjn8jDenHyUWbgGEBvASaP1eW', '7YE694TcggSEeVHxotUB5lhgYOGLI6Rg', NULL, '127.0.0.1', 0, 1605764637, NULL, 1605764638, 1605764638, 1607475887, '127.0.0.1', '', 0, 1605764638, 0, NULL, 0),
(18, 'matota', 'diana@gmail.com', '$2y$10$2cclDhpoyw7GZLupqwbwV.vEYdqBsVR0xPhzKqCAKt8j8Dt2M2/sC', 'HiCiIx_9NLGVCyXpEahHzho4WjKTXeuW', NULL, '127.0.0.1', 0, 1605815398, 1605815439, 1605815398, 1605815398, NULL, NULL, '', 0, 1605815398, 0, NULL, 0),
(19, 'mateo', 'matthew@gmail.com', '$2y$10$GKzBfUqNb95LugEJ0lcaKOJgerKnljPZfkloQtMeb3bCUQOn9OgnO', 'tpJMDAON5PcL3_tOjiYktD_UZiAE1hSu', NULL, '127.0.0.1', 0, 1605843267, NULL, 1605843268, 1605843268, 1605924144, '127.0.0.1', '', 0, 1605843268, 0, NULL, 0),
(20, 'cienfuegos', 'ddd@gmail.com', '$2y$10$vqZdsV6hOuQaMe.QOHWUWuytyBpfUb18Ua/yXAPvzQjmNgr7hxvdW', 'PhcehNJ6SIOi6cKcSRrdDeA6oPuhNc-4', NULL, '127.0.0.1', 0, 1605844259, NULL, 1605844259, 1605844259, 1605924234, '127.0.0.1', '', 0, 1605844259, 0, NULL, 0),
(21, 'prueba', 'prueba@gmail.com', '$2y$10$QZisG.mslFyeZeKJ0mYwcuC5qRalHWjp9jyVVr1h5nG1oSC.AQMfy', 'KXehP7d7F2b4WkPPhDP1rUgix8HA96H_', NULL, '127.0.0.1', 0, 1606538858, NULL, 1606538859, 1606538859, NULL, NULL, '', 0, 1606538859, 0, NULL, 0),
(22, 'ifarocks26prueba', 'ifarocks26prueba@gmail.com', '$2y$10$albhivjbqVWIJjpEaV5T..wxEWqK7YiaK/vA7UBd3lkx.1lIFjKSi', 'RaO2428fzgSyDoDK756KJWoRAZxQQ3QT', NULL, '127.0.0.1', 0, 1606539500, NULL, 1606539500, 1606539500, 1606540576, '127.0.0.1', '', 0, 1606539500, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voltajes`
--

CREATE TABLE `voltajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `altura`
--
ALTER TABLE `altura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alturamontaje`
--
ALTER TABLE `alturamontaje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditlog`
--
ALTER TABLE `auditlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `brigada`
--
ALTER TABLE `brigada`
  ADD PRIMARY KEY (`idbrigada`),
  ADD KEY `fk_brigada_categoria1_idx` (`categoria_id`),
  ADD KEY `fk_brigada_ueb1_idx` (`ueb_id`);

--
-- Indexes for table `cantdispositivos`
--
ALTER TABLE `cantdispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cantidadaccesorios`
--
ALTER TABLE `cantidadaccesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cantidadsistemasfijos`
--
ALTER TABLE `cantidadsistemasfijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cantmediciones`
--
ALTER TABLE `cantmediciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cantsistemas`
--
ALTER TABLE `cantsistemas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clasificarentidad`
--
ALTER TABLE `clasificarentidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parametrosSistemaClasificados_tipoParametro1_idx` (`tipoParametro_id`),
  ADD KEY `fk_clasificarentidad_tipoSistemaSeguridad1_idx` (`tipoSistemaSeguridad_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_cliente_provincia1_idx` (`provincia_id`),
  ADD KEY `fk_cliente_organismo1_idx` (`organismo_idorganismo`);

--
-- Indexes for table `compequiposelec`
--
ALTER TABLE `compequiposelec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complejidadsistfijos`
--
ALTER TABLE `complejidadsistfijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condambsegelect`
--
ALTER TABLE `condambsegelect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condambsistfijos`
--
ALTER TABLE `condambsistfijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contrato_formasPago1_idx` (`formasPago_id`),
  ADD KEY `fk_contrato_cliente1_idx` (`cliente_idcliente`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id_email`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`idequipos`),
  ADD KEY `fk_equipos_sistemasIntalados1_idx` (`sistemasIntalados_idsistemasIntalados`),
  ADD KEY `fk_equipos_estado1_idx` (`estado_id`);

--
-- Indexes for table `equipos_has_ordencompra`
--
ALTER TABLE `equipos_has_ordencompra`
  ADD PRIMARY KEY (`equipos_idequipos`,`ordenCompra_idordenCompra`),
  ADD KEY `fk_equipos_has_ordenCompra_ordenCompra1_idx` (`ordenCompra_idordenCompra`),
  ADD KEY `fk_equipos_has_ordenCompra_equipos1_idx` (`equipos_idequipos`);

--
-- Indexes for table `equipos_has_proveedor`
--
ALTER TABLE `equipos_has_proveedor`
  ADD PRIMARY KEY (`equipos_idequipos`,`proveedor_idproveedor`),
  ADD KEY `fk_equipos_has_proveedor_proveedor1_idx` (`proveedor_idproveedor`),
  ADD KEY `fk_equipos_has_proveedor_equipos1_idx` (`equipos_idequipos`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idestados`);

--
-- Indexes for table `formaspago`
--
ALTER TABLE `formaspago`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mastilpararayo`
--
ALTER TABLE `mastilpararayo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nivelessepresores`
--
ALTER TABLE `nivelessepresores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obstruccionequipo`
--
ALTER TABLE `obstruccionequipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ofertacomercial`
--
ALTER TABLE `ofertacomercial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ofertaComercial_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_ofertaComercial_ueb1_idx` (`ueb_id`),
  ADD KEY `fk_ofertaComercial_estados1_idx` (`estados_idestados`);

--
-- Indexes for table `ofertaitems`
--
ALTER TABLE `ofertaitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ofertaItems_ofertaComercial1_idx` (`ofertaComercial_id`);

--
-- Indexes for table `ordencompra`
--
ALTER TABLE `ordencompra`
  ADD PRIMARY KEY (`idordenCompra`),
  ADD KEY `fk_ordenCompra_cliente_idx` (`cliente_idcliente`);

--
-- Indexes for table `ordenservicio`
--
ALTER TABLE `ordenservicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ordenServicio_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_ordenServicio_brigada1_idx` (`brigada_idbrigada`),
  ADD KEY `fk_ordenServicio_planificacion1_idx` (`planificacion_idplanificacion`);

--
-- Indexes for table `organismo`
--
ALTER TABLE `organismo`
  ADD PRIMARY KEY (`idorganismo`);

--
-- Indexes for table `pararrayos`
--
ALTER TABLE `pararrayos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perimetralmalla`
--
ALTER TABLE `perimetralmalla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`idplanificacion`),
  ADD KEY `fk_planificacion_sistemasIntalados1_idx` (`sistemasIntalados_idsistemasIntalados`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indexes for table `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registromantenimientos`
--
ALTER TABLE `registromantenimientos`
  ADD PRIMARY KEY (`idregistroMantenimientos`),
  ADD KEY `fk_registroMantenimientos_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_registroMantenimientos_brigada1_idx` (`brigada_idbrigada`),
  ADD KEY `fk_registroMantenimientos_ordenServicio1_idx` (`ordenServicio_id`);

--
-- Indexes for table `registrosadiosaci`
--
ALTER TABLE `registrosadiosaci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registroSADI_voltajes1_idx` (`voltajes_id`),
  ADD KEY `fk_registroSADI_registroMantenimientos1_idx` (`registroMantenimientos_idregistroMantenimientos`);

--
-- Indexes for table `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_responsables_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_responsables_cargos1_idx` (`cargos_id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `sistemaseguridadelectronica`
--
ALTER TABLE `sistemaseguridadelectronica`
  ADD PRIMARY KEY (`idsistemaSeguridadElectronica`),
  ADD KEY `fk_sistemaSeguridadElectronica_sistemasIntalados1_idx` (`sistemasIntalados_idsistemasIntalados`),
  ADD KEY `fk_sistemaSeguridadElectronica_cantSistemas1_idx` (`cantSistemas_id`),
  ADD KEY `fk_sistemaSeguridadElectronica_cantDispositivos1_idx` (`cantDispositivos_id`),
  ADD KEY `fk_sistemaSeguridadElectronica_compEquiposElec1_idx` (`compEquiposElec_id`),
  ADD KEY `fk_sistemaSeguridadElectronica_altura1_idx` (`altura_id`),
  ADD KEY `fk_sistemaSeguridadElectronica_condambSegElect1_idx` (`condambSegElect_id`),
  ADD KEY `fk_sistemaSeguridadElectronica_obstruccionEquipo1_idx` (`obstruccionEquipo_id`);

--
-- Indexes for table `sistemasfijosextincion`
--
ALTER TABLE `sistemasfijosextincion`
  ADD PRIMARY KEY (`idsistemasFijosExtincion`),
  ADD KEY `fk_sistemasFijosExtincion_sistemasIntalados1_idx` (`sistemasIntalados_idsistemasIntalados`),
  ADD KEY `fk_sistemasFijosExtincion_obstruccionEquipo1_idx` (`obstruccionEquipo_id`),
  ADD KEY `fk_sistemasFijosExtincion_cantidadAccesorios1_idx` (`cantidadAccesorios_id`),
  ADD KEY `fk_sistemasFijosExtincion_cantidadSistemasFijos1_idx` (`cantidadSistemasFijos_id`),
  ADD KEY `fk_sistemasFijosExtincion_alturaMontaje1_idx` (`alturaMontaje_id`),
  ADD KEY `fk_sistemasFijosExtincion_complejidadSistFijos1_idx` (`complejidadSistFijos_id`),
  ADD KEY `fk_sistemasFijosExtincion_condAmbSistFijos1_idx` (`condAmbSistFijos_id`);

--
-- Indexes for table `sistemasintalados`
--
ALTER TABLE `sistemasintalados`
  ADD PRIMARY KEY (`idsistemasIntalados`),
  ADD KEY `fk_sistemasIntalados_cliente1_idx` (`cliente_idcliente`),
  ADD KEY `fk_sistemasIntalados_tipoSistemaSeguridad1_idx` (`tipoSistemaSeguridad_id`),
  ADD KEY `fk_sistemasIntalados_clasificarentidad1_idx` (`clasificarentidad_id`);

--
-- Indexes for table `sistemasproteccionrayos`
--
ALTER TABLE `sistemasproteccionrayos`
  ADD PRIMARY KEY (`idsistemasProteccionRayos`),
  ADD KEY `fk_sistemasProteccionRayos_sistemasIntalados1_idx` (`sistemasIntalados_idsistemasIntalados`),
  ADD KEY `fk_sistemasProteccionRayos_nivelesSepresores1_idx` (`nivelesSepresores_id`),
  ADD KEY `fk_sistemasProteccionRayos_mastilPararayo1_idx` (`mastilPararayo_id`),
  ADD KEY `fk_sistemasProteccionRayos_pararrayos1_idx` (`pararrayos_id`),
  ADD KEY `fk_sistemasProteccionRayos_cantMediciones1_idx` (`cantMediciones_id`),
  ADD KEY `fk_sistemasProteccionRayos_perimetralMalla1_idx` (`perimetralMalla_id`),
  ADD KEY `fk_sistemasProteccionRayos_tamanoBajante1_idx` (`tamanoBajante_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_social_account_provider_client_id` (`provider`,`client_id`),
  ADD UNIQUE KEY `idx_social_account_code` (`code`),
  ADD KEY `fk_social_account_user` (`user_id`);

--
-- Indexes for table `tamanobajante`
--
ALTER TABLE `tamanobajante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoparametro`
--
ALTER TABLE `tipoparametro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiposistemaseguridad`
--
ALTER TABLE `tiposistemaseguridad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `idx_token_user_id_code_type` (`user_id`,`code`,`type`);

--
-- Indexes for table `ueb`
--
ALTER TABLE `ueb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ueb_provincia1_idx` (`provincia_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_user_username` (`username`),
  ADD UNIQUE KEY `idx_user_email` (`email`);

--
-- Indexes for table `voltajes`
--
ALTER TABLE `voltajes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `altura`
--
ALTER TABLE `altura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alturamontaje`
--
ALTER TABLE `alturamontaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auditlog`
--
ALTER TABLE `auditlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `brigada`
--
ALTER TABLE `brigada`
  MODIFY `idbrigada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cantdispositivos`
--
ALTER TABLE `cantdispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cantidadaccesorios`
--
ALTER TABLE `cantidadaccesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cantidadsistemasfijos`
--
ALTER TABLE `cantidadsistemasfijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cantmediciones`
--
ALTER TABLE `cantmediciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cantsistemas`
--
ALTER TABLE `cantsistemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clasificarentidad`
--
ALTER TABLE `clasificarentidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `compequiposelec`
--
ALTER TABLE `compequiposelec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complejidadsistfijos`
--
ALTER TABLE `complejidadsistfijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `condambsegelect`
--
ALTER TABLE `condambsegelect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `condambsistfijos`
--
ALTER TABLE `condambsistfijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `idequipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `idestados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `formaspago`
--
ALTER TABLE `formaspago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mastilpararayo`
--
ALTER TABLE `mastilpararayo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nivelessepresores`
--
ALTER TABLE `nivelessepresores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obstruccionequipo`
--
ALTER TABLE `obstruccionequipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ofertacomercial`
--
ALTER TABLE `ofertacomercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ofertaitems`
--
ALTER TABLE `ofertaitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ordencompra`
--
ALTER TABLE `ordencompra`
  MODIFY `idordenCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordenservicio`
--
ALTER TABLE `ordenservicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `organismo`
--
ALTER TABLE `organismo`
  MODIFY `idorganismo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pararrayos`
--
ALTER TABLE `pararrayos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perimetralmalla`
--
ALTER TABLE `perimetralmalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `planificacion`
--
ALTER TABLE `planificacion`
  MODIFY `idplanificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registromantenimientos`
--
ALTER TABLE `registromantenimientos`
  MODIFY `idregistroMantenimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registrosadiosaci`
--
ALTER TABLE `registrosadiosaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sistemaseguridadelectronica`
--
ALTER TABLE `sistemaseguridadelectronica`
  MODIFY `idsistemaSeguridadElectronica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sistemasfijosextincion`
--
ALTER TABLE `sistemasfijosextincion`
  MODIFY `idsistemasFijosExtincion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sistemasintalados`
--
ALTER TABLE `sistemasintalados`
  MODIFY `idsistemasIntalados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sistemasproteccionrayos`
--
ALTER TABLE `sistemasproteccionrayos`
  MODIFY `idsistemasProteccionRayos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamanobajante`
--
ALTER TABLE `tamanobajante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipoparametro`
--
ALTER TABLE `tipoparametro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiposistemaseguridad`
--
ALTER TABLE `tiposistemaseguridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ueb`
--
ALTER TABLE `ueb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `voltajes`
--
ALTER TABLE `voltajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brigada`
--
ALTER TABLE `brigada`
  ADD CONSTRAINT `fk_brigada_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_brigada_ueb1` FOREIGN KEY (`ueb_id`) REFERENCES `ueb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clasificarentidad`
--
ALTER TABLE `clasificarentidad`
  ADD CONSTRAINT `fk_clasificarentidad_tipoSistemaSeguridad1` FOREIGN KEY (`tipoSistemaSeguridad_id`) REFERENCES `tiposistemaseguridad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parametrosSistemaClasificados_tipoParametro1` FOREIGN KEY (`tipoParametro_id`) REFERENCES `tipoparametro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_organismo1` FOREIGN KEY (`organismo_idorganismo`) REFERENCES `organismo` (`idorganismo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_contrato_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contrato_formasPago1` FOREIGN KEY (`formasPago_id`) REFERENCES `formaspago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_equipos_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipos_sistemasIntalados1` FOREIGN KEY (`sistemasIntalados_idsistemasIntalados`) REFERENCES `sistemasintalados` (`idsistemasIntalados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipos_has_ordencompra`
--
ALTER TABLE `equipos_has_ordencompra`
  ADD CONSTRAINT `fk_equipos_has_ordenCompra_equipos1` FOREIGN KEY (`equipos_idequipos`) REFERENCES `equipos` (`idequipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipos_has_ordenCompra_ordenCompra1` FOREIGN KEY (`ordenCompra_idordenCompra`) REFERENCES `ordencompra` (`idordenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipos_has_proveedor`
--
ALTER TABLE `equipos_has_proveedor`
  ADD CONSTRAINT `fk_equipos_has_proveedor_equipos1` FOREIGN KEY (`equipos_idequipos`) REFERENCES `equipos` (`idequipos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipos_has_proveedor_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ofertacomercial`
--
ALTER TABLE `ofertacomercial`
  ADD CONSTRAINT `fk_ofertaComercial_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ofertaComercial_estados1` FOREIGN KEY (`estados_idestados`) REFERENCES `estados` (`idestados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ofertaComercial_ueb1` FOREIGN KEY (`ueb_id`) REFERENCES `ueb` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ofertaitems`
--
ALTER TABLE `ofertaitems`
  ADD CONSTRAINT `fk_ofertaItems_ofertaComercial1` FOREIGN KEY (`ofertaComercial_id`) REFERENCES `ofertacomercial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ordencompra`
--
ALTER TABLE `ordencompra`
  ADD CONSTRAINT `fk_ordenCompra_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ordenservicio`
--
ALTER TABLE `ordenservicio`
  ADD CONSTRAINT `fk_ordenServicio_brigada1` FOREIGN KEY (`brigada_idbrigada`) REFERENCES `brigada` (`idbrigada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordenServicio_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordenServicio_planificacion1` FOREIGN KEY (`planificacion_idplanificacion`) REFERENCES `planificacion` (`idplanificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `fk_planificacion_sistemasIntalados1` FOREIGN KEY (`sistemasIntalados_idsistemasIntalados`) REFERENCES `sistemasintalados` (`idsistemasIntalados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `registromantenimientos`
--
ALTER TABLE `registromantenimientos`
  ADD CONSTRAINT `fk_registroMantenimientos_brigada1` FOREIGN KEY (`brigada_idbrigada`) REFERENCES `brigada` (`idbrigada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroMantenimientos_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroMantenimientos_ordenServicio1` FOREIGN KEY (`ordenServicio_id`) REFERENCES `ordenservicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registrosadiosaci`
--
ALTER TABLE `registrosadiosaci`
  ADD CONSTRAINT `fk_registroSADI_registroMantenimientos1` FOREIGN KEY (`registroMantenimientos_idregistroMantenimientos`) REFERENCES `registromantenimientos` (`idregistroMantenimientos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroSADI_voltajes1` FOREIGN KEY (`voltajes_id`) REFERENCES `voltajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `fk_responsables_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_responsables_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sistemaseguridadelectronica`
--
ALTER TABLE `sistemaseguridadelectronica`
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_altura1` FOREIGN KEY (`altura_id`) REFERENCES `altura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_cantDispositivos1` FOREIGN KEY (`cantDispositivos_id`) REFERENCES `cantdispositivos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_cantSistemas1` FOREIGN KEY (`cantSistemas_id`) REFERENCES `cantsistemas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_compEquiposElec1` FOREIGN KEY (`compEquiposElec_id`) REFERENCES `compequiposelec` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_condambSegElect1` FOREIGN KEY (`condambSegElect_id`) REFERENCES `condambsegelect` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_obstruccionEquipo1` FOREIGN KEY (`obstruccionEquipo_id`) REFERENCES `obstruccionequipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemaSeguridadElectronica_sistemasIntalados1` FOREIGN KEY (`sistemasIntalados_idsistemasIntalados`) REFERENCES `sistemasintalados` (`idsistemasIntalados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sistemasfijosextincion`
--
ALTER TABLE `sistemasfijosextincion`
  ADD CONSTRAINT `fk_sistemasFijosExtincion_alturaMontaje1` FOREIGN KEY (`alturaMontaje_id`) REFERENCES `alturamontaje` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasFijosExtincion_cantidadAccesorios1` FOREIGN KEY (`cantidadAccesorios_id`) REFERENCES `cantidadaccesorios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasFijosExtincion_cantidadSistemasFijos1` FOREIGN KEY (`cantidadSistemasFijos_id`) REFERENCES `cantidadsistemasfijos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasFijosExtincion_complejidadSistFijos1` FOREIGN KEY (`complejidadSistFijos_id`) REFERENCES `complejidadsistfijos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasFijosExtincion_condAmbSistFijos1` FOREIGN KEY (`condAmbSistFijos_id`) REFERENCES `condambsistfijos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasFijosExtincion_obstruccionEquipo1` FOREIGN KEY (`obstruccionEquipo_id`) REFERENCES `obstruccionequipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasFijosExtincion_sistemasIntalados1` FOREIGN KEY (`sistemasIntalados_idsistemasIntalados`) REFERENCES `sistemasintalados` (`idsistemasIntalados`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sistemasintalados`
--
ALTER TABLE `sistemasintalados`
  ADD CONSTRAINT `fk_sistemasIntalados_clasificarentidad1` FOREIGN KEY (`clasificarentidad_id`) REFERENCES `clasificarentidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasIntalados_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasIntalados_tipoSistemaSeguridad1` FOREIGN KEY (`tipoSistemaSeguridad_id`) REFERENCES `tiposistemaseguridad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sistemasproteccionrayos`
--
ALTER TABLE `sistemasproteccionrayos`
  ADD CONSTRAINT `fk_sistemasProteccionRayos_cantMediciones1` FOREIGN KEY (`cantMediciones_id`) REFERENCES `cantmediciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasProteccionRayos_mastilPararayo1` FOREIGN KEY (`mastilPararayo_id`) REFERENCES `mastilpararayo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasProteccionRayos_nivelesSepresores1` FOREIGN KEY (`nivelesSepresores_id`) REFERENCES `nivelessepresores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasProteccionRayos_pararrayos1` FOREIGN KEY (`pararrayos_id`) REFERENCES `pararrayos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasProteccionRayos_perimetralMalla1` FOREIGN KEY (`perimetralMalla_id`) REFERENCES `perimetralmalla` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasProteccionRayos_sistemasIntalados1` FOREIGN KEY (`sistemasIntalados_idsistemasIntalados`) REFERENCES `sistemasintalados` (`idsistemasIntalados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemasProteccionRayos_tamanoBajante1` FOREIGN KEY (`tamanoBajante_id`) REFERENCES `tamanobajante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_social_account_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_token_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ueb`
--
ALTER TABLE `ueb`
  ADD CONSTRAINT `fk_ueb_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
