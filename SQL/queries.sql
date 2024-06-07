SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sport_teams`
--
CREATE DATABASE IF NOT EXISTS `sport_teams` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sport_teams`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
                           `id` int(20) NOT NULL,
                           `first_name` varchar(255) NOT NULL,
                           `last_name` varchar(255) NOT NULL,
                           `team_id` int(11) NOT NULL,
                           `number` tinyint(3) UNSIGNED NOT NULL,
                           `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sports`
--

CREATE TABLE `sports` (
                          `id` int(11) NOT NULL,
                          `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sports`
--

INSERT INTO `sports` (`id`, `name`) VALUES
                                        (1, 'fútbol'),
                                        (2, 'baloncesto'),
                                        (3, 'natación'),
                                        (4, 'tenis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
                         `id` bigint(20) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `sport_id` int(11) NOT NULL,
                         `captain_id` int(11) DEFAULT NULL,
                         `city` varchar(255) DEFAULT NULL,
                         `foundation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `players`
--
ALTER TABLE `players`
    ADD PRIMARY KEY (`id`),
  ADD KEY `idx_team` (`team_id`);

--
-- Indices de la tabla `sports`
--
ALTER TABLE `sports`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
    ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TeamsSports` (`sport_id`),
  ADD KEY `FK_CaptainPlayer` (`captain_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `players`
--
ALTER TABLE `players`
    MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sports`
--
ALTER TABLE `sports`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `teams`
--
ALTER TABLE `teams`
    ADD CONSTRAINT `FK_CaptainPlayer` FOREIGN KEY (`captain_id`) REFERENCES `players` (`id`),
  ADD CONSTRAINT `FK_TeamsSports` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`),
  ADD CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
