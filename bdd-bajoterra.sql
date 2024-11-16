-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2024 a las 00:10:26
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
-- Base de datos: `bdd-bajoterra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulos`
--

CREATE TABLE `capitulos` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `video` varchar(400) NOT NULL,
  `temporada` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `capitulos`
--

INSERT INTO `capitulos` (`id`, `titulo`, `descripcion`, `video`, `temporada`) VALUES
(1, 'El Mundo Bajo Nuestros Pies: Primera Parte', 'En los últimos momentos de una batalla épica con el Dr. Blakk, el legendario protector de Bajoterra Will Shane consigue enviar un último mensaje a su hijo, Eli, a la superficie. Eli, nombrado sucesor de su padre, desciende a Bajoterra dispuesto a preservar la paz, pero pronto comprende que no podrá hacerlo solo. Con la ayuda de sus nuevos amigos, Pronto, Trixie y Kord, Eli se hace un nombre poco a poco en el prestigioso torneo de disparo de Babosas de Bajoterra, pero demuestra su verdadera fuerza al enfrentarse al antiguo enemigo de su padre, el Dr. Blakk.', 'https://www.youtube.com/embed/tBFAyf3ES14?si=CQtsyE7TJEG49FYs', 1),
(2, 'El Mundo Bajo Nuestros Pies: Segunda Parte', 'Eli y Pronto aparecen escalando un acantilado con lava. Cuando ya esta en la cima se encuentra con Trixie y Kord. Eli y otro concursante van peleando Eli lanza a Burpy y Eli gana y consigue a Dirigible. Mientras Pronto esta viendo la pelea de Jhon Bull, Trixie pelea con el Rey de las Lanzadoras y Trixie gana, mientras tanto Mourice (asistente del doctor Blakk) dice que Eli le preocupa y pregunta que si el informante lo siga espiando y el doctor Blakk lo echa. ', 'https://www.youtube.com/embed/T4qXWjcV_Es?si=tLCEJvVHTcU0aOqS', 1),
(3, 'El Chico Nuevo: Segunda Parte', 'En este episodio de Bajoterra, la banda de Shane y Twist tienen planeado robar el tren y llevarse el contenedor de agua oscura para luego seguir la travesía, luego por poco colisiona y de ahí no solo era agua oscura, sino era una trampa, junto con Diablos Nachos y sus secuaces intenta detener la banda de Shane y Twist, pero Eli y Twist escapan, mientras tanto Eli encuentra el retrato del padre Will Shane y cuando Kord se quedó pensando no sólo era la babosa, sino era para engañar, porque la babosa versátil no puede tocar a la babosa sanadora, porque no puede estar así con conexión de las babosas y de ahí Trixie llama a Eli para advertirles y Twist revela que trabaja para el Dr.Blakk, pero Twist que desde pequeño era huérfano, cuando Will Shane lo capturó, pero la banda de Shane lo derrotan y luego Dr. Blakk envía a Diablos Nachos a las Cavernas Profundas, pero Twist le da otra oportunidad y regresa en el episodio: La Maestra Invencible.', 'https://www.youtube.com/embed/PRPoqcvfCRM?si=IP9VjddEhKlT7ZVE', 2),
(4, 'Lo Qué Hay Debajo', 'Al comenzar, la Banda de Shane son atacados por los hombres del Dr. Blakk y los obligan a saltar una grieta, en la cual la banda de Shane se encuentra un portal y a las babosas guardianas y el Clan Sombra les dice que sirve para evitar que El Flagelo venga y luego entran a las Cavernas Profundas y de repente los capturan y pero luego se escapan y de ahí se encuentran un lago de agua oscura y como en esa dimensión no se podían usar babosas normales, Burpy le pide a Eli que la convierta en malvada. Luego son curados por Doc y se vuelve en una babosa guardiana.', 'https://www.youtube.com/embed/7J8RdYS1jw0?si=l4yOA5u0gRQ5jE_b', 5),
(6, 'Viaje a las Cavernas del Este', 'En lo que parece ser una operación minera de algún tipo, Welder Walter, sus \"compañeros de trabajo\" y el Rey de Sling caminan hacia una cueva escondida que acababa de ser descubierta, mientras que Walter le dice a King sobre los problemas que han encontrado, incluyendo Un misterioso artefacto antiguo de origen desconocido. Pero una vez que entran en la cueva, el Clan de la Sombra comienza a aparecer y de inmediato una batalla estalla pero finalmente Rey convence a sus hombres para detenerse y esperar a la Gang Shane.', 'https://www.youtube.com/embed/sS-KbYCWrRM?si=VkDrQQE3tAXgrqxq', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Pronto', 'Pronto Germitopo es un topoide con características humanas. Es parte de la Banda de Shane. Según él mismo, es el mejor rastreador de Bajoterra.Tiene rivalidad con otro topoide llamado Sedo.', 'https://pm1.aminoapps.com/6511/198c8d466f99f24d551d01fa4f400466f421c71c_hq.jpg'),
(2, 'Eli Shane', 'Eli Shane es un adolescente de dieciséis años, quien es el actual protector de las cavernas y líder de la “Banda de Shane”. Él sucede a su padre, Will Shane, como el nuevo Shane, el único que mantiene la barrera entre Bajoterra y La Superficie en secreto. Eli y su banda, para mantener la paz, pelean contra el Dr. Blakk.', 'https://styles.redditmedia.com/t5_2u44ux/styles/communityIcon_l9fjgjorbf951.png'),
(3, 'Burpy', 'Es una babosa Infierno de Las 99 Cavernas y la babosa principal del protagonista de las series, Eli Shane.', 'https://play-lh.googleusercontent.com/9POhbEhJsvUtcgGxnf7OFrQrRC-_ZSdzk-s28SNe78sJ4vbaqgM-RF1fRXSIrhlQPA=s256-rw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `id_temporada` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`id_temporada`, `nombre`) VALUES
(1, 'Temporada 1'),
(2, 'Temporada 2'),
(5, 'Temporada 3'),
(7, 'Temporada 4'),
(8, 'Temporada 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `password`) VALUES
(1, 'webadmin', '$2y$10$jWQVRTbh1CVWv/ocIhTW8eYWAdiFrMFbVF4BG.YJSiYJlTClNCUl.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temporada_id` (`temporada`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id_temporada`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id_temporada` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `capitulos_ibfk_1` FOREIGN KEY (`temporada`) REFERENCES `temporada` (`id_temporada`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
