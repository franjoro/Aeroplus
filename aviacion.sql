-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2019 a las 07:53:14
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aviacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `Texto` varchar(100) NOT NULL,
  `From_` int(11) NOT NULL,
  `To_` int(11) NOT NULL,
  `Link` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alert`
--

INSERT INTO `alert` (`id`, `Texto`, `From_`, `To_`, `Link`, `Role`) VALUES
(182, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 56, 'calendario/descripcion_evento.php?id=3', 1),
(183, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 57, 'calendario/descripcion_evento.php?id=3', 1),
(184, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 58, 'calendario/descripcion_evento.php?id=3', 1),
(185, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 59, 'calendario/descripcion_evento.php?id=3', 1),
(186, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 61, 'calendario/descripcion_evento.php?id=3', 1),
(187, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 62, 'calendario/descripcion_evento.php?id=3', 1),
(188, 'Nuevo evento : \"ReuniÃ³n de padres de familia\"', 0, 63, 'calendario/descripcion_evento.php?id=3', 1),
(189, 'Nuevo evento : \"Visita a la torre de control\"', 0, 56, 'calendario/descripcion_evento.php?id=4', 1),
(190, 'Nuevo evento : \"Visita a la torre de control\"', 0, 57, 'calendario/descripcion_evento.php?id=4', 1),
(191, 'Nuevo evento : \"Visita a la torre de control\"', 0, 58, 'calendario/descripcion_evento.php?id=4', 1),
(192, 'Nuevo evento : \"Visita a la torre de control\"', 0, 59, 'calendario/descripcion_evento.php?id=4', 1),
(193, 'Nuevo evento : \"Visita a la torre de control\"', 0, 61, 'calendario/descripcion_evento.php?id=4', 1),
(194, 'Nuevo evento : \"Visita a la torre de control\"', 0, 62, 'calendario/descripcion_evento.php?id=4', 1),
(195, 'Nuevo evento : \"Visita a la torre de control\"', 0, 63, 'calendario/descripcion_evento.php?id=4', 1),
(196, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 56, 'calendario/descripcion_evento.php?id=5', 1),
(197, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 57, 'calendario/descripcion_evento.php?id=5', 1),
(198, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 58, 'calendario/descripcion_evento.php?id=5', 1),
(199, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 59, 'calendario/descripcion_evento.php?id=5', 1),
(200, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 61, 'calendario/descripcion_evento.php?id=5', 1),
(201, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 62, 'calendario/descripcion_evento.php?id=5', 1),
(202, 'Nuevo evento : \"Inicio de curso de introducciÃ³n\"', 0, 63, 'calendario/descripcion_evento.php?id=5', 1),
(203, '\"Nueva nota de unidad ingresada.\" Estado: APROBADO', 0, 58, 'alumno/aula.php', 1),
(204, '\"Nueva nota de unidad ingresada.\" Estado: APROBADO', 0, 58, 'alumno/aula.php', 1),
(205, '\"Nueva nota de unidad ingresada.\" Estado: REPROBADO', 0, 58, 'alumno/aula.php', 1),
(206, '\"Nueva nota de reposiciÃ³n ingresada\"', 0, 58, '', 1),
(207, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(208, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(209, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(210, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(211, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(212, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(213, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(214, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(215, 'Hora de vuelo confirmada, Fecha del vuelo: 16-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(216, 'Hora de vuelo confirmada, Fecha del vuelo: 16-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(217, 'Hora de vuelo confirmada, Fecha del vuelo: 17-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(218, 'Hora de vuelo confirmada, Fecha del vuelo: 17-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(219, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(220, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(221, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(222, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(223, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(224, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(225, 'Hora de vuelo confirmada, Fecha del vuelo: 19-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(226, 'Hora de vuelo confirmada, Fecha del vuelo: 19-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(227, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(228, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(229, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(230, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(231, 'Hora de vuelo confirmada, Fecha del vuelo: 16-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(232, 'Hora de vuelo confirmada, Fecha del vuelo: 16-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(233, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 58, 'pvuelo/pvuelo.php', 1),
(234, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 56, 'pvuelo/pvuelo.php', 1),
(235, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(236, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(237, 'Hora de vuelo confirmada, Fecha del vuelo: 16-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(238, 'Hora de vuelo confirmada, Fecha del vuelo: 16-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(239, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 59, 'pvuelo/pvuelo.php', 1),
(240, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(241, 'Hora de vuelo confirmada, Fecha del vuelo: 17-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(242, 'Hora de vuelo confirmada, Fecha del vuelo: 17-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(243, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(244, 'Hora de vuelo confirmada, Fecha del vuelo: 20-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(245, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(246, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(247, 'Hora de vuelo confirmada, Fecha del vuelo: 19-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(248, 'Hora de vuelo confirmada, Fecha del vuelo: 19-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(249, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 59, 'pvuelo/pvuelo.php', 1),
(250, 'Hora de vuelo confirmada, Fecha del vuelo: 18-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(251, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(252, 'Hora de vuelo confirmada, Fecha del vuelo: 15-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1),
(253, 'Hora de vuelo confirmada, Fecha del vuelo: 17-07-2019', 0, 63, 'pvuelo/pvuelo.php', 1),
(254, 'Hora de vuelo confirmada, Fecha del vuelo: 17-07-2019', 0, 62, 'pvuelo/pvuelo.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Role` int(11) NOT NULL,
  `Saldo` varchar(30) NOT NULL DEFAULT '0',
  `cobro` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `id_user`, `Nombre`, `Email`, `Tel`, `Role`, `Saldo`, `cobro`) VALUES
(18, 58, 'A. ALFONSO', '-', '-', 1, '8399', 100),
(19, 59, 'F.LOPEZ', '-', '-', 1, '9799', 100),
(20, 63, 'K.LOPEZ', '-', '-', 1, '8999', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

CREATE TABLE `cobros` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `actual` float NOT NULL,
  `num` varchar(10) NOT NULL,
  `new` float NOT NULL,
  `date_` varchar(30) NOT NULL,
  `razon` varchar(300) NOT NULL,
  `banc_r` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cobros`
--

INSERT INTO `cobros` (`id`, `id_user`, `actual`, `num`, `new`, `date_`, `razon`, `banc_r`) VALUES
(247, 58, 0, '9999', 9999, '12-07-2019', 'Deposito', '-'),
(248, 59, 0, '9999', 9999, '12-07-2019', 'Deposito', '-'),
(249, 63, 0, '9999', 9999, '12-07-2019', 'Deposito', '-'),
(250, 58, 9999, '100', 9899, '12-07-2019', 'Reserva hora de vuelo', '-'),
(251, 58, 9899, '100', 9799, '12-07-2019', 'Reserva hora de vuelo', '-'),
(252, 58, 9799, '100', 9699, '12-07-2019', 'Reserva hora de vuelo', '-'),
(253, 58, 9699, '100', 9599, '12-07-2019', 'Reserva hora de vuelo', '-'),
(254, 58, 9599, '100', 9499, '12-07-2019', 'Reserva hora de vuelo', '-'),
(255, 58, 9499, '100', 9399, '12-07-2019', 'Reserva hora de vuelo', '-'),
(256, 58, 9399, '100', 9299, '12-07-2019', 'Reserva hora de vuelo', '-'),
(257, 58, 9299, '100', 9199, '12-07-2019', 'Reserva hora de vuelo', '-'),
(258, 58, 9199, '100', 9099, '12-07-2019', 'Reserva hora de vuelo', '-'),
(259, 58, 9099, '100', 8999, '12-07-2019', 'Reserva hora de vuelo', '-'),
(260, 58, 8999, '100', 8899, '12-07-2019', 'Reserva hora de vuelo', '-'),
(261, 58, 8899, '100', 8799, '12-07-2019', 'Reserva hora de vuelo', '-'),
(262, 58, 8799, '100', 8699, '12-07-2019', 'Reserva hora de vuelo', '-'),
(263, 58, 8699, '100', 8599, '12-07-2019', 'Reserva hora de vuelo', '-'),
(264, 63, 9999, '100', 9899, '12-07-2019', 'Reserva hora de vuelo', '-'),
(265, 63, 9899, '100', 9799, '12-07-2019', 'Reserva hora de vuelo', '-'),
(266, 63, 9799, '100', 9699, '12-07-2019', 'Reserva hora de vuelo', '-'),
(267, 63, 9699, '100', 9599, '12-07-2019', 'Reserva hora de vuelo', '-'),
(268, 63, 9599, '100', 9499, '12-07-2019', 'Reserva hora de vuelo', '-'),
(269, 63, 9499, '100', 9399, '12-07-2019', 'Reserva hora de vuelo', '-'),
(270, 59, 9999, '100', 9899, '12-07-2019', 'Reserva hora de vuelo', '-'),
(271, 59, 9899, '100', 9799, '12-07-2019', 'Reserva hora de vuelo', '-'),
(272, 63, 9399, '100', 9299, '12-07-2019', 'Reserva hora de vuelo', '-'),
(273, 63, 9299, '100', 9199, '12-07-2019', 'Reserva hora de vuelo', '-'),
(274, 63, 9199, '100', 9099, '12-07-2019', 'Reserva hora de vuelo', '-'),
(275, 63, 9099, '100', 9199, '12-07-2019', 'Retorno de cancelaciÃ³n de vuelo', '-'),
(276, 63, 9199, '100', 9099, '12-07-2019', 'Reserva hora de vuelo', '-'),
(277, 58, 8599, '100', 8499, '17-07-2019', 'Reserva hora de vuelo', '-'),
(278, 58, 8499, '100', 8399, '17-07-2019', 'Reserva hora de vuelo', '-'),
(279, 63, 9099, '100', 8999, '17-07-2019', 'Reserva hora de vuelo', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comb1`
--

CREATE TABLE `comb1` (
  `id` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `actual` float NOT NULL,
  `new` float NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disc`
--

CREATE TABLE `disc` (
  `id` int(11) NOT NULL,
  `idplane` int(11) NOT NULL,
  `textt` varchar(1000) NOT NULL,
  `sol` varchar(1000) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evah`
--

CREATE TABLE `evah` (
  `id` int(11) NOT NULL,
  `hsalida` varchar(30) NOT NULL,
  `hllegada` varchar(30) NOT NULL,
  `taco_salida` varchar(30) NOT NULL,
  `taco_llegada` varchar(30) NOT NULL,
  `hub_salida` varchar(30) NOT NULL,
  `hub_llegada` varchar(30) NOT NULL,
  `id_ins` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `nota` varchar(1000) NOT NULL,
  `archivo` varchar(1000) NOT NULL,
  `idplane` int(11) NOT NULL,
  `date_` varchar(30) NOT NULL,
  `id_hora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evah`
--

INSERT INTO `evah` (`id`, `hsalida`, `hllegada`, `taco_salida`, `taco_llegada`, `hub_salida`, `hub_llegada`, `id_ins`, `id_alumno`, `nota`, `archivo`, `idplane`, `date_`, `id_hora`) VALUES
(1, '20:35', '20:35', '1234', '1234', '1234', '1234', 9, 18, '', 'archivo/', 33, '17-07-2019', 103),
(2, '20:53', '20:53', '371695', '371780â€¬', '1221', '212', 9, 18, '', 'archivo/', 33, '17-07-2019', 104),
(3, '21:02', '21:02', '371695', '371780â€¬', '1221', '212', 11, 20, '', 'archivo/', 33, '17-07-2019', 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `id` int(11) NOT NULL,
  `idPlane` int(11) NOT NULL,
  `Semana` int(11) NOT NULL,
  `Day` int(11) NOT NULL,
  `Hora` int(11) NOT NULL,
  `id_alumno` int(30) NOT NULL,
  `Id_ins` int(30) NOT NULL,
  `Role` int(11) NOT NULL,
  `date_` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id`, `idPlane`, `Semana`, `Day`, `Hora`, `id_alumno`, `Id_ins`, `Role`, `date_`) VALUES
(103, 33, 29, 1, 1, 18, 9, 3, '17-07-2019'),
(104, 33, 29, 2, 2, 18, 9, 3, '17-07-2019'),
(105, 33, 29, 2, 3, 20, 11, 3, '17-07-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_ins` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Ins_te` int(11) NOT NULL,
  `Ins_vu` int(11) NOT NULL,
  `Ins_pro` int(11) NOT NULL,
  `Ins_En` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_ins`, `id_user`, `Nombre`, `Email`, `Tel`, `Ins_te`, `Ins_vu`, `Ins_pro`, `Ins_En`) VALUES
(9, 56, 'I. RODRIGUEZ', '-', '-', 1, 1, 0, 0),
(10, 57, 'I. LOPEZ', '-', '-', 0, 1, 1, 0),
(11, 62, 'L.MANCIA', '-', '-', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `text_` varchar(1000) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `id_user`, `text_`, `role`) VALUES
(2, 63, 'Mensaje directo de prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nota` float NOT NULL,
  `uni` int(11) NOT NULL,
  `repo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_user`, `nota`, `uni`, `repo`) VALUES
(1, 58, 10, 2, NULL),
(2, 58, 9.5, 4, NULL),
(3, 58, 7.8, 6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plane`
--

CREATE TABLE `plane` (
  `id` int(11) NOT NULL,
  `Matricula` varchar(10) NOT NULL,
  `price` varchar(30) NOT NULL,
  `Color` varchar(10) NOT NULL,
  `t_actual` varchar(100) NOT NULL,
  `t_25` varchar(100) NOT NULL,
  `t_50` varchar(100) NOT NULL,
  `t_100` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plane`
--

INSERT INTO `plane` (`id`, `Matricula`, `price`, `Color`, `t_actual`, `t_25`, `t_50`, `t_100`) VALUES
(33, 'N7381G', '10', '#000000', '371780â€¬', '371695', '371695', '371695'),
(34, 'YS-04-P', '10', '#000000', '371670', '371695', '371695', '371695'),
(35, 'YS-334-PE', '10', '#000000', '371670', '371695', '371695', '371695'),
(36, 'BATD II', '10', '#000000', '371670', '371695', '371695', '371695'),
(37, 'YS-270-PE', '10', '#000000', '371670', '371695', '371695', '371695'),
(38, 'YS-127-P', '10', '#000000', '371670', '371695', '371695', '371695'),
(39, 'xd', '0', '#000000', '', '', '', ''),
(40, 'N123', '0', '#000000', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planilla`
--

CREATE TABLE `planilla` (
  `id` int(11) NOT NULL,
  `id_ins` int(11) NOT NULL,
  `razon` varchar(1000) NOT NULL,
  `money_` float NOT NULL,
  `mes` varchar(10) NOT NULL,
  `id_hora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planilla`
--

INSERT INTO `planilla` (`id`, `id_ins`, `razon`, `money_`, `mes`, `id_hora`) VALUES
(12, 9, 'Pago por hora de vuelo', 10, '07', 103),
(13, 9, 'Pago por hora de vuelo', 10, '07', 104),
(14, 11, 'Pago por hora de vuelo', 10, '07', 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semana`
--

CREATE TABLE `semana` (
  `id` int(11) NOT NULL,
  `Semana` int(11) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semana`
--

INSERT INTO `semana` (`id`, `Semana`, `Role`) VALUES
(1, 29, 1),
(2, 30, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomb`
--

CREATE TABLE `tcomb` (
  `id` int(11) NOT NULL,
  `total_combustible` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tcomb`
--

INSERT INTO `tcomb` (`id`, `total_combustible`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uni`
--

CREATE TABLE `uni` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Des` varchar(500) NOT NULL,
  `Lic` varchar(5) NOT NULL,
  `archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `uni`
--

INSERT INTO `uni` (`id`, `Name`, `Des`, `Lic`, `archivo`) VALUES
(2, 'Unidad 1: Airplane and Aerodynamics', '-Unidad 1: Airplane and Aerodynamics', '1', '-'),
(4, 'Unidad 2  Instrumentos bÃ¡sicos de vuelo', '-', '1', '-'),
(6, 'Unidad 3  Airports, Air Traffic Control and Airspace.', '-', '1', '-'),
(10, 'Unidad 4  Regulaciones.', 'Unidad 4\n\nRegulaciones.\n', '1', '-'),
(11, 'Unidad 5  Aircraft Performance.', 'Unidad 5\n\nAircraft Performance.', '1', '-'),
(12, 'Unidad 6  Aeromedical Factors and Aeronautical Decision Making (ADM).', 'Unidad 6\n\nAeromedical Factors and Aeronautical Decision Making (ADM).', '1', '-'),
(13, 'Unidad 7  Aviation Weather', 'Unidad 7\n\nAviation Weather', '1', '-'),
(14, 'Unidad 8  Interpreting Weather Data.', 'Unidad 8\n\nInterpreting Weather Data.', '1', '-'),
(15, 'Unidad 9  Navigation: Charts, Publications and Flight Computers.  ', 'Unidad 9\n\nNavigation: Charts, Publications and Flight Computers.  ', '1', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `union_`
--

CREATE TABLE `union_` (
  `id` int(11) NOT NULL,
  `With_` varchar(30) NOT NULL,
  `Who_` varchar(30) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `union_`
--

INSERT INTO `union_` (`id`, `With_`, `Who_`, `Role`) VALUES
(191, '58', '56', 1),
(192, '59', '56', 1),
(193, '63', '56', 1),
(194, '58', '56', 2),
(196, '63', '62', 2),
(197, 'N7381G', '62', 3),
(198, 'YS-334-PE', '62', 3),
(199, '59', '62', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` int(11) NOT NULL,
  `Entry` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `Username`, `Password`, `Role`, `Entry`) VALUES
(41, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(56, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(57, '2121', '02b1be0d48924c327124732726097157', 1, 1),
(58, '0909', 'a5a7158118e59ee590424b55bb9aed17', 2, 1),
(59, '4545', '1f6419b1cbe79c71410cb320fc094775', 2, 1),
(61, 'despacho', '80925a7444119980e1e1675c01ae65d5', 3, 1),
(62, '4321', 'd93591bdf7860e1e4ee2fca799911215', 1, 1),
(63, 'a1', '8a8bb7cd343aa2ad99b7d762030857a2', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `cobros`
--
ALTER TABLE `cobros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comb1`
--
ALTER TABLE `comb1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `disc`
--
ALTER TABLE `disc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evah`
--
ALTER TABLE `evah`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPlane` (`idPlane`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `Id_ins` (`Id_ins`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_ins`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ins` (`id_ins`),
  ADD KEY `id_hora` (`id_hora`);

--
-- Indices de la tabla `semana`
--
ALTER TABLE `semana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tcomb`
--
ALTER TABLE `tcomb`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `uni`
--
ALTER TABLE `uni`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `union_`
--
ALTER TABLE `union_`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cobros`
--
ALTER TABLE `cobros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT de la tabla `comb1`
--
ALTER TABLE `comb1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `disc`
--
ALTER TABLE `disc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evah`
--
ALTER TABLE `evah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `plane`
--
ALTER TABLE `plane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `planilla`
--
ALTER TABLE `planilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `semana`
--
ALTER TABLE `semana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `uni`
--
ALTER TABLE `uni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `union_`
--
ALTER TABLE `union_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horas`
--
ALTER TABLE `horas`
  ADD CONSTRAINT `horas_ibfk_1` FOREIGN KEY (`idPlane`) REFERENCES `plane` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horas_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horas_ibfk_3` FOREIGN KEY (`Id_ins`) REFERENCES `instructor` (`id_ins`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planilla`
--
ALTER TABLE `planilla`
  ADD CONSTRAINT `planilla_ibfk_1` FOREIGN KEY (`id_ins`) REFERENCES `instructor` (`id_ins`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
