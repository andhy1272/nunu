# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: nunu
# Generation Time: 2019-07-20 22:22:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table nunu_appointments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_appointments`;

CREATE TABLE `nunu_appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_patient_id` int(11) NOT NULL,
  `appointment_status` varchar(50) NOT NULL,
  `appointment_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appointment_notes` varchar(1024) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_appointments` WRITE;
/*!40000 ALTER TABLE `nunu_appointments` DISABLE KEYS */;

INSERT INTO `nunu_appointments` (`appointment_id`, `appointment_date`, `appointment_time`, `appointment_patient_id`, `appointment_status`, `appointment_created_at`, `appointment_notes`)
VALUES
	(1,'2019-08-31','09:20:00',1,'ontime','2019-07-13 21:23:35','Van a venir los abuelos tambien.'),
	(2,'2019-08-21','14:50:00',1,'ontime','2019-07-13 21:39:33',''),
	(3,'2019-08-21','10:00:00',1,'ontime','2019-07-13 21:40:19','');

/*!40000 ALTER TABLE `nunu_appointments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_config`;

CREATE TABLE `nunu_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  PRIMARY KEY (`config_id`),
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='App Configurations';



# Dump of table nunu_patient_records
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_patient_records`;

CREATE TABLE `nunu_patient_records` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `record_patient_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nunu_patient_relatives
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_patient_relatives`;

CREATE TABLE `nunu_patient_relatives` (
  `relative_id` int(11) NOT NULL AUTO_INCREMENT,
  `relative_id_number` varchar(100) NOT NULL,
  `relative_id_type` varchar(50) NOT NULL,
  `relative_name` varchar(255) NOT NULL,
  `relative_last_name` varchar(255) NOT NULL,
  `relative_phone` varchar(100) NOT NULL,
  `relative_email` varchar(255) NOT NULL,
  `relative_address` varchar(255) NOT NULL,
  `relative_patient_id` int(11) NOT NULL,
  `relative_relation` varchar(100) NOT NULL,
  `relative_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`relative_id`),
  UNIQUE KEY `relative_id_number` (`relative_id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Patient Familiars';



# Dump of table nunu_patients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_patients`;

CREATE TABLE `nunu_patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id_number` varchar(100) NOT NULL,
  `patient_id_type` varchar(50) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_last_name` varchar(255) NOT NULL,
  `patient_birthdate` date NOT NULL,
  `patient_blood_type` varchar(10) DEFAULT NULL,
  `patient_sex` varchar(10) DEFAULT NULL,
  `patient_email` varchar(255) NOT NULL,
  `patient_phone1` varchar(50) NOT NULL,
  `patient_phone2` varchar(50) DEFAULT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_observations` text,
  `patient_last_weight` float(6,2) DEFAULT NULL,
  `patient_last_height` float(6,2) DEFAULT NULL,
  `patient_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patient_id`),
  UNIQUE KEY `patient_id_number` (`patient_id_number`),
  KEY `patient_id_number_2` (`patient_id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Patient Information';

LOCK TABLES `nunu_patients` WRITE;
/*!40000 ALTER TABLE `nunu_patients` DISABLE KEYS */;

INSERT INTO `nunu_patients` (`patient_id`, `patient_id_number`, `patient_id_type`, `patient_name`, `patient_last_name`, `patient_birthdate`, `patient_blood_type`, `patient_sex`, `patient_email`, `patient_phone1`, `patient_phone2`, `patient_address`, `patient_observations`, `patient_last_weight`, `patient_last_height`, `patient_created_at`)
VALUES
	(1,'113390963','cedula','Andrey Asdrubal','Picado Fernandez','1988-01-12','O+','M','andhy1272@gmail.com','8949-7211','7211-8949','Cruce a sabanilla, Casa esquinera color caoba. Guadalupe, San Jose, Costa Rica','este paciente es muy guapo ;).\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed porta tellus. Donec condimentum sed tortor id aliquam. Vestibulum malesuada arcu non suscipit maximus. Pellentesque eu ante a ante tincidunt fermentum eu eget lectus. Cras eget ornare turpis. Nam ut augue massa. Integer sit amet aliquam massa, sit amet fringilla tellus. Cras sit amet tortor tempus, auctor enim eu, malesuada risus. Nunc et nibh sed ligula congue tempor. Pellentesque sagittis lorem at libero ultricies posuere',NULL,NULL,'2019-05-05 10:58:50');

/*!40000 ALTER TABLE `nunu_patients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_user_roles`;

CREATE TABLE `nunu_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_title` varchar(100) NOT NULL,
  `role_permissions` text NOT NULL,
  `role_view` text NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_title` (`role_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='App User Roles';



# Dump of table nunu_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_users`;

CREATE TABLE `nunu_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_alias` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_last_access` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_alias` (`user_alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='App Users';




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
