-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-02-2026 a las 06:53:19
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `primaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `id` int NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `subtitulo` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `imagen` varchar(50) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id`, `titulo`, `subtitulo`, `imagen`) VALUES
(5, 'Esc. Prim. Fed.', 'Lic. Benito Juárez', 'vistas/img/carrusel/462.jpg'),
(6, 'Esc. Prim. Fed.', 'Lic. Benito Juárez', 'vistas/img/carrusel/672.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `nombre_noticia` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `nota_corta` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `p1` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `p2` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `p3` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `p4` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `p5` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `p6` mediumtext COLLATE utf8mb3_bin NOT NULL,
  `autor` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `fecha` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `imagen_portada` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `imagen_horizontal` varchar(50) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `nombre_noticia`, `nota_corta`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `autor`, `fecha`, `imagen_portada`, `imagen_horizontal`) VALUES
(1, 'Noticia Social', 'Sitio web', 'Estamos emocionados de presentarles el nuevo sitio', 'Calendario y Eventos: Manténgase al tanto de todos los eventos escolares, excursiones y actividades especiales a través de nuestro calendario en línea. Ya no se perderá ninguna fecha importante.', 'Plataforma Interactiva para Padres: Nuestra plataforma en línea para padres proporciona acceso a calificaciones, informes de progreso y le permite programar reuniones y acceder a recursos educativos para apoyar el aprendizaje en el hogar.', 'Espacio de Comunicación Directa: Nuestro sistema de mensajería facilita la comunicación entre padres, estudiantes y profesores. Envíe y reciba mensajes en tiempo real, resuelva dudas rápidamente y fortalezca la colaboración entre la escuela y las familias. Una conexión directa y efectiva, justo cuando más se necesita.', 'Portal de Noticias y Anuncios: Manténgase informado con las últimas actualizaciones y noticias de nuestra comunidad escolar. Desde anuncios importantes hasta logros destacados, nuestro portal de noticias garantiza que esté siempre al día con lo que ocurre en nuestra escuela. ¡No se pierda nada!', 'Sala de Reconocimientos: Celebrando el Éxito Escolar Un espacio especial dedicado a destacar los logros de nuestros estudiantes y docentes. Desde premios académicos hasta proyectos innovadores y actividades extracurriculares sobresalientes, esta sección celebra el esfuerzo y la dedicación de nuestra comunidad escolar.', 'Estamos encantados de invitarlos a explorar nuestro nuevo sitio web escolar y unirse a nosotros en esta emocionante aventura educativa en línea. Juntos, estamos creando un espacio donde la información fluye, las conexiones se fortalecen y el aprendizaje cobra vida de nuevas maneras. !Bienvenidos al futuro de la educación en nuestra escuela!', 'Manuel León', '2024-12-10', 'vistas/img/noticias/409.jpg', 'vistas/img/noticias/961.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `logo` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb3_bin NOT NULL,
  `estado` tinyint NOT NULL,
  `rol` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `logo`, `usuario`, `nombre`, `password`, `estado`, `rol`) VALUES
(1, 'vistas/img/logo/970.jpg', 'Manu', 'Manuel León', '$2y$10$TMWcirXZym5StMbAeSvXme.hiaz5BWvkEddqz.AutF38E6SEkN8Qu', 1, 0),
(2, 'vistas/img/logo/511.jpg', 'Joss', 'Jennyfer Jocelyn', '$2y$10$XIbGEnX2Jk6nIc0b6q/gCuL9bEaXng.ximMFshFOBgvY41xIkiZ.C', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
