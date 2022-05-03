-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.24-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forumhuggi
CREATE DATABASE IF NOT EXISTS `forumhuggi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `forumhuggi`;

-- Listage de la structure de table forumhuggi. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_util` int(11) DEFAULT NULL,
  `id_sujet` int(11) NOT NULL,
  `dateMessage` date NOT NULL,
  `heureMessage` time(5) NOT NULL,
  `message_contenu` varchar(500) NOT NULL,
  PRIMARY KEY (`id_message`),
  UNIQUE KEY `id_message` (`id_message`),
  KEY `id_util` (`id_util`),
  KEY `id_sujet` (`id_sujet`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `utilisateurs` (`id_util`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_sujet`) REFERENCES `sujet` (`id_sujet`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table forumhuggi. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `id_util` int(11) DEFAULT NULL,
  `titre_sujet` varchar(50) NOT NULL,
  `sujet_contenu` varchar(500) NOT NULL,
  `date_sujet` date NOT NULL,
  `heure_sujet` time(6) NOT NULL,
  PRIMARY KEY (`id_sujet`),
  KEY `id_util` (`id_util`),
  CONSTRAINT `sujet_ibfk_1` FOREIGN KEY (`id_util`) REFERENCES `utilisateurs` (`id_util`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table forumhuggi. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_util` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `login_util` varchar(25) NOT NULL,
  `mdp` varchar(25) NOT NULL,
  PRIMARY KEY (`id_util`),
  UNIQUE KEY `id_util` (`id_util`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Les données exportées n'étaient pas sélectionnées.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
