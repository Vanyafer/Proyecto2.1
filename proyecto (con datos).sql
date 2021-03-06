-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2018 a las 18:49:15
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_amigos` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `id_usuario1` int(11) DEFAULT NULL,
  `id_usuario2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoyo_visual`
--

CREATE TABLE `apoyo_visual` (
  `id_apoyo` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `id_reto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `imagen_perfil` varchar(200) DEFAULT NULL,
  `informacion_contacto` varchar(200) DEFAULT NULL,
  `tecnica_interes` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_diseno` int(11) DEFAULT NULL,
  `id_portafolio` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `imagen_perfil`, `informacion_contacto`, `tecnica_interes`, `id_usuario`, `id_diseno`, `id_portafolio`, `id_perfil`) VALUES
(3, '', 'Insta: vanyafer', 'Dibujo, pintura con acrílicos bla', 5, 7, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloqueados`
--

CREATE TABLE `bloqueados` (
  `id_bloqueado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `expirado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bloqueados`
--

INSERT INTO `bloqueados` (`id_bloqueado`, `id_usuario`, `inicio`, `fin`, `expirado`) VALUES
(10, 2, '2018-06-14 13:24:14', '2018-06-15 13:24:14', 1),
(11, 3, '2018-06-18 09:40:57', '2018-06-19 09:40:57', 1),
(20, 6, '2018-06-20 12:47:24', '2118-06-20 12:47:24', 0);

--
-- Disparadores `bloqueados`
--
DELIMITER $$
CREATE TRIGGER `desbloquear` AFTER UPDATE ON `bloqueados` FOR EACH ROW begin
update usuario set bloqueado = 0 where usuario.id_usuario = old.id_usuario and (old.expirado = 1);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion`
--

CREATE TABLE `coleccion` (
  `id_coleccion` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `id_portafolio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `ocultar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `fecha`, `contenido`, `id_usuario`, `id_publicacion`, `ocultar`) VALUES
(2, '2018-06-19', 'Holi', 6, 4, 0),
(3, '2018-06-20', 'hola', 5, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversacion`
--

CREATE TABLE `conversacion` (
  `id_conversacion` int(11) NOT NULL,
  `id_usuario1` int(11) DEFAULT NULL,
  `id_usuario2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diseno`
--

CREATE TABLE `diseno` (
  `id_diseno` int(11) NOT NULL,
  `imagen_fondo` varchar(200) DEFAULT NULL,
  `color_bordes` char(7) DEFAULT NULL,
  `color_titulos` char(7) DEFAULT NULL,
  `color_botones` char(7) DEFAULT NULL,
  `color_fondo` char(7) DEFAULT NULL,
  `tipo_perfil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diseno`
--

INSERT INTO `diseno` (`id_diseno`, `imagen_fondo`, `color_bordes`, `color_titulos`, `color_botones`, `color_fondo`, `tipo_perfil`) VALUES
(2, NULL, '1C83A8', '1C83A8', '1C83A8', '1C83A8', 3),
(3, NULL, '1C83A8', '1C83A8', '1C83A8', '1C83A8', 1),
(4, NULL, '1C83A8', '1C83A8', '1C83A8', '1C83A8', 1),
(5, NULL, '1C83A8', '1C83A8', '1C83A8', '1C83A8', 3),
(6, NULL, '1C83A8', '1C83A8', '1C83A8', '1C83A8', 1),
(7, NULL, '598392', '01161E', '124559', 'AEC3B0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fan`
--

CREATE TABLE `fan` (
  `id_fan` int(11) NOT NULL,
  `imagen_perfil` varchar(200) DEFAULT NULL,
  `informacion_contacto` varchar(200) DEFAULT NULL,
  `perfil` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_favs`
--

CREATE TABLE `foro_favs` (
  `id_favs` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_forohilo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_hilo`
--

CREATE TABLE `foro_hilo` (
  `id_forohilo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `id_forotipo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ocultar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_respuesta`
--

CREATE TABLE `foro_respuesta` (
  `id_fororespuesta` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `id_forohilo` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ocultar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_tipo`
--

CREATE TABLE `foro_tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_tipo`
--

INSERT INTO `foro_tipo` (`id_tipo`, `tipo`) VALUES
(1, 'Ideas'),
(2, 'Objetos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_coleccion`
--

CREATE TABLE `imagen_coleccion` (
  `id_imagencoleccion` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `id_coleccion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_reto`
--

CREATE TABLE `imagen_reto` (
  `id_imagenreto` int(11) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `id_aceptado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `texto` varchar(200) DEFAULT NULL,
  `id_conversacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `me_gusta`
--

CREATE TABLE `me_gusta` (
  `id_megusta` int(11) NOT NULL,
  `tipo_me_gusta` int(11) DEFAULT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moderador`
--

CREATE TABLE `moderador` (
  `id_moderador` int(11) NOT NULL,
  `contra` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `visto` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `id_usuario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id_notificacion`, `tipo`, `contenido`, `id_usuario`, `visto`, `fecha`, `id_evento`, `id_usuario1`) VALUES
(19, 7, 'Uno de tus comentarios ha sido reportado.', 2, 0, '2018-06-17 23:53:15', 12, 0),
(20, 7, 'Uno de tus comentarios ha sido reportado.', 2, 0, '2018-06-17 23:53:17', 13, 0),
(21, 7, 'Uno de tus comentarios ha sido reportado.', 2, 0, '2018-06-17 23:53:18', 14, 0),
(22, 7, 'Uno de tus comentarios ha sido reportado.', 2, 0, '2018-06-17 23:53:19', 15, 0),
(23, 7, 'Uno de tus comentarios ha sido reportado.', 2, 0, '2018-06-17 23:53:20', 16, 0),
(24, 7, 'Uno de tus comentarios ha sido reportado.', 4, 0, '2018-06-18 09:38:54', 17, 0),
(25, 7, 'Uno de tus comentarios ha sido reportado.', 4, 0, '2018-06-18 09:38:55', 18, 0),
(26, 7, 'Uno de tus comentarios ha sido reportado.', 4, 0, '2018-06-18 09:38:55', 19, 0),
(27, 7, 'Uno de tus comentarios ha sido reportado.', 4, 0, '2018-06-18 09:38:55', 20, 0),
(28, 7, 'Uno de tus comentarios ha sido reportado.', 4, 0, '2018-06-18 09:38:59', 21, 0),
(29, 2, 'ha comentado tu publicacion', 5, 0, '2018-06-20 13:58:43', 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'Mexico'),
(2, 'Costa Rica'),
(3, 'El Salvador'),
(4, 'Guatemala'),
(5, 'Honduras'),
(6, 'Nicaragua'),
(7, 'Panamá'),
(8, 'Cuba'),
(9, 'Puerto Rico'),
(10, 'República Dominicana'),
(11, 'Argentina'),
(12, 'Bolivia'),
(13, 'Chile'),
(14, 'Colombia'),
(15, 'Ecuador'),
(16, 'Paraguay'),
(17, 'Perú'),
(18, 'Uruguay'),
(19, 'Venezuela'),
(20, 'España'),
(21, 'Estados Unidos de America');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `metas` varchar(200) DEFAULT NULL,
  `exper` varchar(200) DEFAULT NULL,
  `otro` varchar(200) DEFAULT NULL,
  `estudios` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `metas`, `exper`, `otro`, `estudios`) VALUES
(2, 'Graduarme', '14 años', 'nop asdsad', '98% de prepa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id_portafolio` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id_portafolio`, `descripcion`) VALUES
(2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `contenido_explicito` int(11) DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `etiquetas` varchar(200) DEFAULT NULL,
  `privacidad` int(11) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `ocultar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_publicacion`, `fecha`, `contenido_explicito`, `contenido`, `etiquetas`, `privacidad`, `imagen`, `id_artista`, `ocultar`) VALUES
(3, '2018-06-19', 0, 'Crayolas :3', NULL, 0, './Imagenes/imgPublicacion/crayola.jpg', 3, 0),
(4, '2018-06-19', 0, '', NULL, 0, './Imagenes/imgPublicacion/colorful-2458510__340.jpg', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_comentarios`
--

CREATE TABLE `reportes_comentarios` (
  `id_reporte` int(11) NOT NULL,
  `id_comentario` int(11) DEFAULT NULL,
  `id_reportado` int(11) DEFAULT NULL,
  `id_reportero` int(11) DEFAULT NULL,
  `razon` varchar(50) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes_comentarios`
--

INSERT INTO `reportes_comentarios` (`id_reporte`, `id_comentario`, `id_reportado`, `id_reportero`, `razon`, `estatus`, `fecha`) VALUES
(22, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(23, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(24, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(25, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(26, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(27, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(28, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(29, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(30, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(31, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(32, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(33, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(34, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(35, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(36, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(37, 2, 6, 5, 'Spam', 1, '2018-06-19'),
(38, 2, 6, 5, 'Spam', 1, '2018-06-20'),
(39, 2, 6, 5, 'Spam', 1, '2018-06-20'),
(40, 2, 6, 5, 'Spam', 1, '2018-06-20'),
(41, 2, 6, 5, 'Spam', 1, '2018-06-20'),
(42, 2, 6, 5, 'Spam', 1, '2018-06-20'),
(43, 2, 6, 5, 'Spam', 1, '2018-06-20'),
(44, 2, 6, 5, 'Spam', 0, '2018-06-20'),
(45, 2, 6, 5, 'Spam', 0, '2018-06-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_publicaciones`
--

CREATE TABLE `reportes_publicaciones` (
  `id_reporte` int(11) NOT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `id_reportado` int(11) DEFAULT NULL,
  `id_reportero` int(11) DEFAULT NULL,
  `razon` varchar(50) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes_publicaciones`
--

INSERT INTO `reportes_publicaciones` (`id_reporte`, `id_publicacion`, `id_reportado`, `id_reportero`, `razon`, `estatus`, `fecha`) VALUES
(1, 4, 3, 6, 'Spam', 0, '2018-06-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_usuarios`
--

CREATE TABLE `reportes_usuarios` (
  `id_reporte` int(11) NOT NULL,
  `id_reportado` int(11) DEFAULT NULL,
  `id_reportero` int(11) DEFAULT NULL,
  `razon` varchar(50) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retos`
--

CREATE TABLE `retos` (
  `id_reto` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retos_aceptados`
--

CREATE TABLE `retos_aceptados` (
  `id_aceptado` int(11) NOT NULL,
  `id_artista` int(11) DEFAULT NULL,
  `id_reto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguidores`
--

CREATE TABLE `seguidores` (
  `id_seguidores` int(11) NOT NULL,
  `id_usuario1` int(11) DEFAULT NULL,
  `id_usuario2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguidores`
--

INSERT INTO `seguidores` (`id_seguidores`, `id_usuario1`, `id_usuario2`) VALUES
(1, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_perfil`
--

CREATE TABLE `tipo_perfil` (
  `id_tipoperfil` int(11) NOT NULL,
  `tipo_perfil` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_perfil`
--

INSERT INTO `tipo_perfil` (`id_tipoperfil`, `tipo_perfil`) VALUES
(1, 'Una columna'),
(2, 'Dos columnas'),
(3, 'Tres columnas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipousuario` int(11) NOT NULL,
  `nombre_tipousuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipousuario`, `nombre_tipousuario`) VALUES
(1, 'Artista'),
(2, 'Fan'),
(3, 'Moderador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `fn` date DEFAULT NULL,
  `pais` int(11) DEFAULT NULL,
  `bloqueado` int(11) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `permitir_18` int(11) DEFAULT NULL,
  `reset` varchar(50) DEFAULT NULL,
  `auto5` int(11) DEFAULT NULL,
  `auto10` int(11) DEFAULT NULL,
  `auto15` int(11) DEFAULT NULL,
  `auto20` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `contrasena`, `correo`, `nombre_usuario`, `fn`, `pais`, `bloqueado`, `tipo_usuario`, `permitir_18`, `reset`, `auto5`, `auto10`, `auto15`, `auto20`) VALUES
(1, '101f92a478836be2abe83c0c88f3bee7dc7927c2', 'moderador@gmail.com', 'Moderador', '1999-03-16', 1, 0, 3, 1, '0', 0, 0, 0, 0),
(5, 'b1745b452cc0e774fe38e8d2b159d01e02543527', 'vanyafer9814@gmail.com', 'Vanya aaaa', '1998-12-02', 1, 0, 1, 1, '0', 0, 0, 0, 0),
(6, 'e99e80de4004c48f3d118759fac6f379232ddae3', 'kevinvr@hotmail.es', 'kevin', '2004-06-20', 1, 1, 2, 0, '0', 2, 2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_amigos`),
  ADD KEY `id_usuario2` (`id_usuario2`),
  ADD KEY `id_usuario1` (`id_usuario1`);

--
-- Indices de la tabla `apoyo_visual`
--
ALTER TABLE `apoyo_visual`
  ADD PRIMARY KEY (`id_apoyo`),
  ADD KEY `id_reto` (`id_reto`);

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_diseno` (`id_diseno`),
  ADD KEY `id_portafolio` (`id_portafolio`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `bloqueados`
--
ALTER TABLE `bloqueados`
  ADD PRIMARY KEY (`id_bloqueado`);

--
-- Indices de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD PRIMARY KEY (`id_coleccion`),
  ADD KEY `id_portafolio` (`id_portafolio`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_publicacion` (`id_publicacion`);

--
-- Indices de la tabla `conversacion`
--
ALTER TABLE `conversacion`
  ADD PRIMARY KEY (`id_conversacion`),
  ADD KEY `id_usuario1` (`id_usuario1`),
  ADD KEY `id_usuario2` (`id_usuario2`);

--
-- Indices de la tabla `diseno`
--
ALTER TABLE `diseno`
  ADD PRIMARY KEY (`id_diseno`),
  ADD KEY `tipo_perfil` (`tipo_perfil`);

--
-- Indices de la tabla `fan`
--
ALTER TABLE `fan`
  ADD PRIMARY KEY (`id_fan`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `foro_favs`
--
ALTER TABLE `foro_favs`
  ADD PRIMARY KEY (`id_favs`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_forohilo` (`id_forohilo`);

--
-- Indices de la tabla `foro_hilo`
--
ALTER TABLE `foro_hilo`
  ADD PRIMARY KEY (`id_forohilo`),
  ADD KEY `id_forotipo` (`id_forotipo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `foro_respuesta`
--
ALTER TABLE `foro_respuesta`
  ADD PRIMARY KEY (`id_fororespuesta`),
  ADD KEY `id_forohilo` (`id_forohilo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `foro_tipo`
--
ALTER TABLE `foro_tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `imagen_coleccion`
--
ALTER TABLE `imagen_coleccion`
  ADD PRIMARY KEY (`id_imagencoleccion`),
  ADD KEY `id_coleccion` (`id_coleccion`);

--
-- Indices de la tabla `imagen_reto`
--
ALTER TABLE `imagen_reto`
  ADD PRIMARY KEY (`id_imagenreto`),
  ADD KEY `id_aceptado` (`id_aceptado`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_conversacion` (`id_conversacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `me_gusta`
--
ALTER TABLE `me_gusta`
  ADD PRIMARY KEY (`id_megusta`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `moderador`
--
ALTER TABLE `moderador`
  ADD PRIMARY KEY (`id_moderador`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id_portafolio`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `reportes_comentarios`
--
ALTER TABLE `reportes_comentarios`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_comentario` (`id_comentario`),
  ADD KEY `id_usuario` (`id_reportado`),
  ADD KEY `id_reportero` (`id_reportero`);

--
-- Indices de la tabla `reportes_publicaciones`
--
ALTER TABLE `reportes_publicaciones`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_usuario` (`id_reportado`),
  ADD KEY `id_reportero` (`id_reportero`);

--
-- Indices de la tabla `reportes_usuarios`
--
ALTER TABLE `reportes_usuarios`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `id_reportado` (`id_reportado`),
  ADD KEY `id_reportero` (`id_reportero`);

--
-- Indices de la tabla `retos`
--
ALTER TABLE `retos`
  ADD PRIMARY KEY (`id_reto`);

--
-- Indices de la tabla `retos_aceptados`
--
ALTER TABLE `retos_aceptados`
  ADD PRIMARY KEY (`id_aceptado`),
  ADD KEY `id_artista` (`id_artista`),
  ADD KEY `id_reto` (`id_reto`);

--
-- Indices de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id_seguidores`),
  ADD KEY `id_usuario1` (`id_usuario1`),
  ADD KEY `id_usuario2` (`id_usuario2`);

--
-- Indices de la tabla `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  ADD PRIMARY KEY (`id_tipoperfil`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usuario` (`tipo_usuario`),
  ADD KEY `pais` (`pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_amigos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `apoyo_visual`
--
ALTER TABLE `apoyo_visual`
  MODIFY `id_apoyo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `bloqueados`
--
ALTER TABLE `bloqueados`
  MODIFY `id_bloqueado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `coleccion`
--
ALTER TABLE `coleccion`
  MODIFY `id_coleccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `conversacion`
--
ALTER TABLE `conversacion`
  MODIFY `id_conversacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diseno`
--
ALTER TABLE `diseno`
  MODIFY `id_diseno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `fan`
--
ALTER TABLE `fan`
  MODIFY `id_fan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foro_favs`
--
ALTER TABLE `foro_favs`
  MODIFY `id_favs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foro_hilo`
--
ALTER TABLE `foro_hilo`
  MODIFY `id_forohilo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foro_respuesta`
--
ALTER TABLE `foro_respuesta`
  MODIFY `id_fororespuesta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foro_tipo`
--
ALTER TABLE `foro_tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `imagen_coleccion`
--
ALTER TABLE `imagen_coleccion`
  MODIFY `id_imagencoleccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen_reto`
--
ALTER TABLE `imagen_reto`
  MODIFY `id_imagenreto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `me_gusta`
--
ALTER TABLE `me_gusta`
  MODIFY `id_megusta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `moderador`
--
ALTER TABLE `moderador`
  MODIFY `id_moderador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id_portafolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reportes_comentarios`
--
ALTER TABLE `reportes_comentarios`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `reportes_publicaciones`
--
ALTER TABLE `reportes_publicaciones`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reportes_usuarios`
--
ALTER TABLE `reportes_usuarios`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `retos`
--
ALTER TABLE `retos`
  MODIFY `id_reto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `retos_aceptados`
--
ALTER TABLE `retos_aceptados`
  MODIFY `id_aceptado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id_seguidores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_perfil`
--
ALTER TABLE `tipo_perfil`
  MODIFY `id_tipoperfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`id_usuario2`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `amigos_ibfk_3` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `apoyo_visual`
--
ALTER TABLE `apoyo_visual`
  ADD CONSTRAINT `apoyo_visual_ibfk_1` FOREIGN KEY (`id_reto`) REFERENCES `retos` (`id_reto`);

--
-- Filtros para la tabla `artista`
--
ALTER TABLE `artista`
  ADD CONSTRAINT `artista_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `artista_ibfk_3` FOREIGN KEY (`id_diseno`) REFERENCES `diseno` (`id_diseno`),
  ADD CONSTRAINT `artista_ibfk_4` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`),
  ADD CONSTRAINT `artista_ibfk_5` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `coleccion`
--
ALTER TABLE `coleccion`
  ADD CONSTRAINT `coleccion_ibfk_1` FOREIGN KEY (`id_portafolio`) REFERENCES `portafolio` (`id_portafolio`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `publicacion` (`id_publicacion`);

--
-- Filtros para la tabla `conversacion`
--
ALTER TABLE `conversacion`
  ADD CONSTRAINT `conversacion_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `conversacion_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `diseno`
--
ALTER TABLE `diseno`
  ADD CONSTRAINT `diseno_ibfk_1` FOREIGN KEY (`tipo_perfil`) REFERENCES `tipo_perfil` (`id_tipoperfil`);

--
-- Filtros para la tabla `fan`
--
ALTER TABLE `fan`
  ADD CONSTRAINT `fan_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `foro_favs`
--
ALTER TABLE `foro_favs`
  ADD CONSTRAINT `foro_favs_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `foro_favs_ibfk_2` FOREIGN KEY (`id_forohilo`) REFERENCES `foro_hilo` (`id_forohilo`);

--
-- Filtros para la tabla `foro_hilo`
--
ALTER TABLE `foro_hilo`
  ADD CONSTRAINT `foro_hilo_ibfk_1` FOREIGN KEY (`id_forotipo`) REFERENCES `foro_tipo` (`id_tipo`),
  ADD CONSTRAINT `foro_hilo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `foro_respuesta`
--
ALTER TABLE `foro_respuesta`
  ADD CONSTRAINT `foro_respuesta_ibfk_1` FOREIGN KEY (`id_forohilo`) REFERENCES `foro_hilo` (`id_forohilo`),
  ADD CONSTRAINT `foro_respuesta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `imagen_coleccion`
--
ALTER TABLE `imagen_coleccion`
  ADD CONSTRAINT `imagen_coleccion_ibfk_1` FOREIGN KEY (`id_coleccion`) REFERENCES `coleccion` (`id_coleccion`);

--
-- Filtros para la tabla `imagen_reto`
--
ALTER TABLE `imagen_reto`
  ADD CONSTRAINT `imagen_reto_ibfk_1` FOREIGN KEY (`id_aceptado`) REFERENCES `retos_aceptados` (`id_aceptado`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_conversacion`) REFERENCES `conversacion` (`id_conversacion`),
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `me_gusta`
--
ALTER TABLE `me_gusta`
  ADD CONSTRAINT `me_gusta_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicacion` (`id_publicacion`),
  ADD CONSTRAINT `me_gusta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`);

--
-- Filtros para la tabla `retos_aceptados`
--
ALTER TABLE `retos_aceptados`
  ADD CONSTRAINT `retos_aceptados_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`),
  ADD CONSTRAINT `retos_aceptados_ibfk_2` FOREIGN KEY (`id_reto`) REFERENCES `retos` (`id_reto`);

--
-- Filtros para la tabla `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipousuario`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`pais`) REFERENCES `pais` (`id_pais`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `borrar_noti` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-07 13:50:54' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM notificaciones WHERE fecha < DATE_ADD(fecha, INTERVAL 7 DAY) AND visto=1$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq_20reportes` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 12:56:45' ON COMPLETION NOT PRESERVE ENABLE DO begin
update usuario join (select id_reportado, estatus from reportes_comentarios where estatus = 1 group by id_reportado having count(*) = 20 ) reportes_comentarios ON usuario.id_usuario = reportes_comentarios.id_reportado AND auto20 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto20 = 1;
update usuario join (select id_reportado, estatus from reportes_publicaciones where estatus = 1 group by id_reportado having count(*) = 20 ) reportes_publicaciones ON usuario.id_usuario = reportes_publicaciones.id_reportado AND auto20 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto20 = 1;
update usuario join (select id_reportado, estatus from reportes_usuarios where estatus = 1 group by id_reportado having count(*) = 20 ) reportes_usuarios ON usuario.id_usuario = reportes_usuarios.id_reportado AND auto20 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto20 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq_15reportes` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 12:56:43' ON COMPLETION NOT PRESERVE ENABLE DO begin
update usuario join (select id_reportado, estatus from reportes_comentarios where estatus = 1 group by id_reportado having count(*) = 15 ) reportes_comentarios ON usuario.id_usuario = reportes_comentarios.id_reportado AND auto15 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto15 = 1;
update usuario join (select id_reportado, estatus from reportes_publicaciones where estatus = 1 group by id_reportado having count(*) = 15 ) reportes_publicaciones ON usuario.id_usuario = reportes_publicaciones.id_reportado AND auto15 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto15 = 1;
update usuario join (select id_reportado, estatus from reportes_usuarios where estatus = 1 group by id_reportado having count(*) = 15 ) reportes_usuarios ON usuario.id_usuario = reportes_usuarios.id_reportado AND auto15 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto15 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq_10reportes` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 12:56:41' ON COMPLETION NOT PRESERVE ENABLE DO begin
update usuario join (select id_reportado, estatus from reportes_comentarios where estatus = 1 group by id_reportado having count(*) = 10 ) reportes_comentarios ON usuario.id_usuario = reportes_comentarios.id_reportado AND auto10 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto10 = 1;
update usuario join (select id_reportado, estatus from reportes_publicaciones where estatus = 1 group by id_reportado having count(*) = 10 ) reportes_publicaciones ON usuario.id_usuario = reportes_publicaciones.id_reportado AND auto10 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto10 = 1;
update usuario join (select id_reportado, estatus from reportes_usuarios where estatus = 1 group by id_reportado having count(*) = 10 ) reportes_usuarios ON usuario.id_usuario = reportes_usuarios.id_reportado AND auto10 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto10 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq10_insert` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 13:47:54' ON COMPLETION PRESERVE ENABLE DO begin
insert into bloqueados values (null, (select id_usuario from usuario where auto10=1), NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY), 0); 
update usuario set auto10 = 2 where auto10 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq15_insert` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 13:47:54' ON COMPLETION PRESERVE ENABLE DO begin
insert into bloqueados values (null, (select id_usuario from usuario where auto15=1), NOW(), DATE_ADD(NOW(), INTERVAL 30 DAY), 0); 
update usuario set auto15 = 2 where auto15 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq_5reportes` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 12:56:39' ON COMPLETION NOT PRESERVE ENABLE DO begin
update usuario join (select id_reportado, estatus from reportes_comentarios where estatus = 1 group by id_reportado having count(*) = 5 ) reportes_comentarios ON usuario.id_usuario = reportes_comentarios.id_reportado AND auto5 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto5 = 1;
update usuario join (select id_reportado, estatus from reportes_publicaciones where estatus = 1 group by id_reportado having count(*) = 5 ) reportes_publicaciones ON usuario.id_usuario = reportes_publicaciones.id_reportado AND auto5 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto5 = 1;
update usuario join (select id_reportado, estatus from reportes_usuarios where estatus = 1 group by id_reportado having count(*) = 5 ) reportes_usuarios ON usuario.id_usuario = reportes_usuarios.id_reportado AND auto5 = 0 AND bloqueado = 0 SET usuario.bloqueado=1, auto5 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `expirar_bloqueado` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-07 13:50:54' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE bloqueados SET expirado = 1 WHERE fin < NOW()$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq5_insert` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 13:47:54' ON COMPLETION PRESERVE ENABLE DO begin
insert into bloqueados values (null, (select id_usuario from usuario where auto5=1), NOW(), DATE_ADD(NOW(), INTERVAL 1 DAY), 0); 
update usuario set auto5 = 2 where auto5 = 1;
end$$

CREATE DEFINER=`root`@`localhost` EVENT `autobloq20_insert` ON SCHEDULE EVERY 1 SECOND STARTS '2018-06-11 13:47:54' ON COMPLETION PRESERVE ENABLE DO begin
insert into bloqueados values (null, (select id_usuario from usuario where auto20=1), NOW(), DATE_ADD(NOW(), INTERVAL 100 YEAR), 0); 
update usuario set auto20 = 2 where auto20 = 1;
end$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
