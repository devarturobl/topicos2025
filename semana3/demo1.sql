-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para demo1
CREATE DATABASE IF NOT EXISTS `demo1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `demo1`;

-- Volcando estructura para tabla demo1.datos
CREATE TABLE IF NOT EXISTS `datos` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla demo1.datos: ~100 rows (aproximadamente)
REPLACE INTO `datos` (`id`, `nombre`, `edad`, `telefono`) VALUES
	(1, 'Mario', 18, '2326311236'),
	(2, 'Ramon', 38, '2379992576'),
	(3, 'Laura', 54, '2366584600'),
	(4, 'Martina', 22, '2397199972'),
	(5, 'María', 38, '2338347655'),
	(6, 'Martina', 56, '2351878059'),
	(7, 'María', 49, '2392590696'),
	(8, 'Pedro', 53, '2374505207'),
	(9, 'uis', 43, '2345388743'),
	(10, 'Luis', 35, '2399393900'),
	(11, 'Pedro', 19, '2398293048'),
	(12, 'Ramon', 34, '2369146992'),
	(13, 'María', 57, '2317548103'),
	(14, 'Javier', 31, '2332566342'),
	(15, 'Javier', 57, '2377344496'),
	(16, 'Carlos', 19, '2340249295'),
	(17, 'Pedro', 19, '2312715326'),
	(18, 'Pedro', 22, '2398241857'),
	(19, 'Carlos', 44, '2366553153'),
	(20, 'Ramon', 24, '2394976997'),
	(21, 'Pedro', 28, '2333755574'),
	(22, 'Pedro', 41, '2398531946'),
	(23, 'Sofía', 28, '2330796950'),
	(24, 'Carlos', 46, '2331371956'),
	(25, 'Ramon', 40, '2369391013'),
	(26, 'Javier', 34, '2353663997'),
	(27, 'Luis', 36, '2313295903'),
	(28, 'Laura', 46, '2310812157'),
	(29, 'Martina', 48, '2321511430'),
	(30, 'Ana', 42, '2367241426'),
	(31, 'Laura', 40, '2359227245'),
	(32, 'Pedro', 53, '2316362602'),
	(33, 'Sofía', 35, '2316976347'),
	(34, 'Sofía', 18, '2374217128'),
	(35, 'Carlos', 18, '2368728158'),
	(36, 'Laura', 34, '2394638837'),
	(37, 'Pedro', 20, '2373895637'),
	(38, 'Martina', 49, '2369904723'),
	(39, 'María', 31, '2340714352'),
	(40, 'María', 44, '2374979741'),
	(41, 'Laura', 58, '2346562646'),
	(42, 'Javier', 46, '2320450079'),
	(43, 'María', 20, '2317362789'),
	(44, 'Ana', 39, '2313696205'),
	(45, 'Ana', 34, '2352731516'),
	(46, 'Pedro', 41, '2349328709'),
	(47, 'María', 26, '2327427438'),
	(48, 'Martina', 35, '2357856632'),
	(49, 'Sofía', 24, '2345508259'),
	(50, 'Sofía', 18, '2378953181'),
	(51, 'Ramon', 50, '2380258208'),
	(52, 'Martina', 45, '2317210354'),
	(53, 'Luis', 38, '2328783192'),
	(54, 'Pedro', 50, '2341506973'),
	(55, 'Ana', 52, '2334290271'),
	(56, 'Martina', 42, '2330523769'),
	(57, 'Pedro', 33, '2387372268'),
	(58, 'María', 55, '2390033302'),
	(59, 'Laura', 59, '2385749727'),
	(60, 'María', 19, '2384531654'),
	(61, 'Pedro', 39, '2342019419'),
	(62, 'Martina', 50, '2343105458'),
	(63, 'Ramon', 54, '2368350000'),
	(64, 'Carlos', 40, '2315634599'),
	(65, 'Laura', 26, '2384622851'),
	(66, 'Sofía', 45, '2350369856'),
	(67, 'Pedro', 56, '2349818480'),
	(68, 'Luis', 40, '2350456109'),
	(69, 'Carlos', 32, '2311591750'),
	(70, 'Carlos', 23, '2377604663'),
	(71, 'Pedro', 21, '2393060944'),
	(72, 'María', 35, '2367896170'),
	(73, 'Sofía', 47, '2357733312'),
	(74, 'Carlos', 21, '2326857363'),
	(75, 'Carlos', 37, '2367826475'),
	(76, 'Martina', 18, '2368858570'),
	(77, 'Luis', 28, '2343021822'),
	(78, 'Ana', 31, '2351740077'),
	(79, 'Pedro', 56, '2399829888'),
	(80, 'Javier', 34, '2322915021'),
	(81, 'Sofía', 36, '2332873902'),
	(82, 'María', 40, '2392119776'),
	(83, 'Ana', 20, '2398938168'),
	(84, 'Sofía', 30, '2346313164'),
	(85, 'Ramon', 41, '2340485128'),
	(86, 'Carlos', 38, '2313905846'),
	(87, 'Sofía', 44, '2376356865'),
	(88, 'Martina', 60, '2393530378'),
	(89, 'Ramon', 36, '2353914339'),
	(90, 'Luis', 44, '2343986378'),
	(91, 'Carlos', 43, '2337693315'),
	(92, 'Sofía', 36, '2321680418'),
	(93, 'Ana', 36, '2318278038'),
	(94, 'Luis', 49, '2380167854'),
	(95, 'Luis', 31, '2370170808'),
	(96, 'Ramon', 45, '2344067937'),
	(97, 'María', 40, '2312251438'),
	(98, 'Pedro', 42, '2316672487'),
	(99, 'Pedro', 23, '2343482842'),
	(100, 'Carlos', 38, '2398590714');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
