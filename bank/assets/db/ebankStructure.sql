-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.26 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for banking
DROP DATABASE IF EXISTS `banking`;
CREATE DATABASE IF NOT EXISTS `banking` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `banking`;

-- Dumping structure for table banking.branchoffices
DROP TABLE IF EXISTS `branchoffices`;
CREATE TABLE IF NOT EXISTS `branchoffices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banking.clients
DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isResident` tinyint(4) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fatherName` varchar(255) DEFAULT NULL,
  `socialNumber` int(11) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `idAddress` varchar(255) DEFAULT NULL,
  `idNumber` varchar(255) DEFAULT NULL,
  `idExpiryDate` date DEFAULT NULL,
  `employed` tinyint(4) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `promotions` tinyint(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`nationality_id`,`branch_id`),
  KEY `fk_Clients_Users_idx` (`user_id`),
  KEY `fk_Clients_Nationality1_idx` (`nationality_id`),
  KEY `fk_Clients_BranchOffices1_idx` (`branch_id`),
  CONSTRAINT `fk_Clients_BranchOffices1` FOREIGN KEY (`branch_id`) REFERENCES `branchoffices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clients_Nationality1` FOREIGN KEY (`nationality_id`) REFERENCES `nationality` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clients_Users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banking.companies
DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `yearFounded` int(11) DEFAULT NULL,
  `taxNumber` int(11) DEFAULT NULL,
  `personalCompanyId` int(11) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`branch_id`,`manager_id`),
  KEY `fk_Companies_Users1_idx` (`user_id`),
  KEY `fk_Companies_BranchOffices1_idx` (`branch_id`),
  KEY `fk_Companies_Manager1_idx` (`manager_id`),
  CONSTRAINT `fk_Companies_BranchOffices1` FOREIGN KEY (`branch_id`) REFERENCES `branchoffices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Companies_Manager1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Companies_Users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banking.manager
DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `socialNumber` int(11) DEFAULT NULL,
  `idNumber` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banking.nationality
DROP TABLE IF EXISTS `nationality`;
CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table banking.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `accountNum` bigint(20) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
