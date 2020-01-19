# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: nunu
# Generation Time: 2020-01-19 18:11:29 +0000
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
  `appointment_service` varchar(255) NOT NULL,
  `appointment_status` varchar(50) NOT NULL,
  `appointment_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `appointment_notes` varchar(1024) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_appointments` WRITE;
/*!40000 ALTER TABLE `nunu_appointments` DISABLE KEYS */;

INSERT INTO `nunu_appointments` (`appointment_id`, `appointment_date`, `appointment_time`, `appointment_patient_id`, `appointment_service`, `appointment_status`, `appointment_created_at`, `appointment_notes`)
VALUES
	(1,'2019-08-31','09:20:00',1,'Consulta Medicina General','ontime','2019-07-13 21:23:35','Van a venir los abuelos tambien.'),
	(2,'2019-08-21','14:50:00',1,'Consulta Pediatria','ontime','2019-07-13 21:39:33',''),
	(3,'2019-08-21','10:00:00',1,'Procedimiento','ontime','2019-07-13 21:40:19','');

/*!40000 ALTER TABLE `nunu_appointments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_config`;

CREATE TABLE `nunu_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `config_key` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='App Configurations';

LOCK TABLES `nunu_config` WRITE;
/*!40000 ALTER TABLE `nunu_config` DISABLE KEYS */;

INSERT INTO `nunu_config` (`config_id`, `config_key`, `config_value`)
VALUES
	(1,'business/name','Clinica Dr. Nataly Barreto C'),
	(2,'business/address','calle 23, Avenida 2da'),
	(3,'business/email','natalybc@clinica.com'),
	(4,'business/phones','(+676) 6788 9876'),
	(5,'business/logo','/logo.png'),
	(6,'business/moto',''),
	(7,'theme/styles','/pediatric.css'),
	(8,'default/country','Ecuador');

/*!40000 ALTER TABLE `nunu_config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_lang_translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_lang_translations`;

CREATE TABLE `nunu_lang_translations` (
  `translation_id` int(11) NOT NULL AUTO_INCREMENT,
  `translation_default` varchar(255) NOT NULL,
  `translation_es_cr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`translation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nunu_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_options`;

CREATE TABLE `nunu_options` (
  `option_id` int(11) NOT NULL AUTO_INCREMENT,
  `option_key` varchar(255) NOT NULL DEFAULT '',
  `option_value` text NOT NULL,
  `option_editable` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='App Configurations';

LOCK TABLES `nunu_options` WRITE;
/*!40000 ALTER TABLE `nunu_options` DISABLE KEYS */;

INSERT INTO `nunu_options` (`option_id`, `option_key`, `option_value`, `option_editable`)
VALUES
	(1,'options/sex','Femenino',0),
	(2,'options/sex','Masculino',0),
	(3,'options/sex','Otro',0),
	(4,'options/blood-type','O+',0),
	(5,'options/blood-type','O-',0),
	(6,'options/blood-type','A+',0),
	(7,'options/blood-type','A-',0),
	(8,'options/blood-type','B+',0),
	(9,'options/blood-type','B-',0),
	(10,'options/blood-type','AB+',0),
	(11,'options/blood-type','AB-',0),
	(12,'options/blood-type','Otro',0),
	(13,'options/id-type','Cedula',0),
	(14,'options/id-type','Pasaporte',0),
	(15,'options/service','Consulta Medicina General',0),
	(16,'options/service','Consulta Pediatria',0),
	(17,'options/service','Procedimiento',0),
	(18,'options/appointment-state','Programada',1),
	(19,'options/appointment-state','Cancelada',1),
	(20,'options/country','Argentina',0),
	(21,'options/country','Chile',0),
	(22,'options/country','Costa Rica',0),
	(23,'options/country','Ecuador',0),
	(24,'options/country','Venezuela',0),
	(25,'options/country','España',0),
	(26,'options/appointment-state','Ejecutada',0),
	(27,'options/province','No especifica',0),
	(28,'options/province','Azuay',1),
	(29,'options/province','Bolivar',1),
	(30,'options/province','Cañar',1),
	(31,'options/province','Carchi',1),
	(32,'options/province','Chimborazo',1),
	(33,'options/province','Cotopaxi',1),
	(34,'options/province','El Oro',1),
	(35,'options/province','Esmeraldas',1),
	(36,'options/province','Galápagos',1),
	(37,'options/province','Guayas',1),
	(38,'options/province','Imbabura',1),
	(39,'options/province','Loja',1),
	(40,'options/province','Los Ríos',1),
	(41,'options/province','Manabí',1),
	(42,'options/province','Morona Santiago',1),
	(43,'options/province','Napo',1),
	(44,'options/province','Orellana',1),
	(45,'options/province','Pastaza',1),
	(46,'options/province','Pichincha',1),
	(47,'options/province','Santa Elena',1),
	(48,'options/province','Sto. Domingo de los Tsáchilas',1),
	(49,'options/province','Sucumbíos',1),
	(50,'options/province','Tungurahua',1),
	(51,'options/province','Zamora Chinchipe',1),
	(52,'options/marital-status','No especifica',0),
	(53,'options/marital-status','Solter@',0),
	(54,'options/marital-status','Casad@',0),
	(55,'options/marital-status','Divorciad@',0),
	(56,'options/marital-status','Viud@',0),
	(57,'options/marital-status','Union libre',0),
	(58,'options/education','No especifica',0),
	(59,'options/education','Primaria',0),
	(60,'options/education','Secundaria',0),
	(61,'options/education','Técnica',0),
	(62,'options/education','Universitaria',0),
	(63,'options/education','Especialización',0);

/*!40000 ALTER TABLE `nunu_options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_patient_background
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_patient_background`;

CREATE TABLE `nunu_patient_background` (
  `background_id` int(11) NOT NULL AUTO_INCREMENT,
  `background_patient_id` int(11) NOT NULL,
  `background_family` text,
  `background_pathalogic` text,
  `background_non_pathalogic` text,
  `background_neonatal` text,
  `background_gyneco_obstetric` text,
  PRIMARY KEY (`background_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_patient_background` WRITE;
/*!40000 ALTER TABLE `nunu_patient_background` DISABLE KEYS */;

INSERT INTO `nunu_patient_background` (`background_id`, `background_patient_id`, `background_family`, `background_pathalogic`, `background_non_pathalogic`, `background_neonatal`, `background_gyneco_obstetric`)
VALUES
	(1,17,'Asma: Abuela Materna\n\nEnf. Mentales: Hermano Menor\n\nCardiopatias algunas\n\n\n','Digestivos: Colon irritable\n\nt','Drogas: Cocaina y Marihuana\n\nFuma: 20 al dia\n\nAlimentacion: 2 veces al dia','Cesarea\n\nSemanas Gestacion: 30 1/2\n\nInfecciones Urinarias: SI pero no se trato\n\n\n\n','Menarquia: 9 a;os\n\nNum parejas: 6\n'),
	(2,18,NULL,NULL,NULL,NULL,NULL),
	(3,11,'- Hermana tiene asma\n\n- Abuela diabetica\n\n- Papa ha sufrido ataques al corazon\n\n- Tio con Cancer esofago\n\n- Tia con Cancer de Mama\n\n- Primos sindrome down\n',NULL,'Consume Marihuana',NULL,'4 partos vivos'),
	(4,1,'Abuelo: Asmatico\ntio: cardiopata',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `nunu_patient_background` ENABLE KEYS */;
UNLOCK TABLES;


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
  `patient_marital_status` varchar(100) NOT NULL,
  `patient_education` varchar(100) NOT NULL,
  `patient_profesion` varchar(255) NOT NULL,
  `patient_email` varchar(255) NOT NULL,
  `patient_phone1` varchar(50) NOT NULL,
  `patient_phone2` varchar(50) DEFAULT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_last_weight` float(6,2) DEFAULT NULL,
  `patient_last_height` float(6,2) DEFAULT NULL,
  `patient_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patient_id`),
  UNIQUE KEY `patient_id_number` (`patient_id_number`),
  KEY `patient_id_number_2` (`patient_id_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Patient Information';

LOCK TABLES `nunu_patients` WRITE;
/*!40000 ALTER TABLE `nunu_patients` DISABLE KEYS */;

INSERT INTO `nunu_patients` (`patient_id`, `patient_id_number`, `patient_id_type`, `patient_name`, `patient_last_name`, `patient_birthdate`, `patient_blood_type`, `patient_sex`, `patient_marital_status`, `patient_education`, `patient_profesion`, `patient_email`, `patient_phone1`, `patient_phone2`, `patient_address`, `patient_last_weight`, `patient_last_height`, `patient_created_at`)
VALUES
	(1,'113390963','Cedula','Andrey Asdrubal','Picado Fernandez','1988-01-12','B+','Femenino','','','','andhy1272@gmail.com','8949-7211','+506 7211-8949','Cruce a sabanilla, Casa esquinera color caoba. Guadalupe, San Jose, Costa Rica, y un poquito mas arriba jeje: :P pichudokjhkdf ht\\\noijsdfoije',NULL,NULL,'2019-05-05 10:58:50'),
	(2,'1759199852','Cedula','Nataly','Barreto','1988-01-12','O+','Femenino','','','','natalybarretoc@gmail.com','0986383930','+(506) 8949-7211','Quito, Quitumbe, Conj Guayanay 2, casa DC002',NULL,NULL,'2019-08-02 22:04:09'),
	(3,'F509834','passport','Anastasia','Guevara','1997-09-20','A+','Femenino','','','','anastasiaGue@gmail.com','677-99999-aaaaa','(+506) 6780-4566 / (+506) 6780-4566 / (+506) 6780-','En su casa. pero fuera',NULL,NULL,'2019-08-02 22:15:03'),
	(4,'G568900','Pasaporte','Tereza ','Carrazco Guevara','1988-01-12','B+','Femenino','','','','terechacague@gmail.com','765 0987','0969675432','6703 Nw 7th St\r\nCasa Esquinera color verde',NULL,NULL,'2019-09-06 22:14:31'),
	(5,'1756760987','Cedula','Dante','Alegieri','1988-01-12','B+','Masculino','','','','dante@gmail.com','45667787','','Devil my cry',NULL,NULL,'2019-09-06 23:21:35'),
	(6,'890998655','Cedula','Pedro','Vazquez Aguilar','1988-01-12','A-','Masculino','','','','pedritovazagui@gmail.com','7656786512','89765345','600m Norte abastecedor la esquina vieja.\r\nGoicoechea.',NULL,NULL,'2019-09-06 23:24:14'),
	(7,'T9009872','Pasaporte','Tiffany','Jhones','1988-01-12','O-','Femenino','','','','tiffanyjhones@hotmail.com','78787878','001 788 0987','en los yunaites',NULL,NULL,'2019-09-06 23:46:34'),
	(8,'23445532','Cedula','Roger','Pereira','1988-01-12','O+','Masculino','','','','roger@gmail.com','78785656','','300m sur iglesia bautista, san mateo',NULL,NULL,'2019-09-06 23:52:07'),
	(9,'VG45332','Pasaporte','Merlina','Adams','1988-01-12','Otro','Femenino','','','','merlina@adams.com','432223445','','la casa negra',NULL,NULL,'2019-09-07 01:05:57'),
	(10,'78654567','Pasaporte','Roberto','Gomez Bolaños','1988-01-12','O+','Masculino','','','','chespirito@gmail.com','+53 788 9009','6778 0094','La vecindad del chavo, casa #8, Mexico DF',NULL,NULL,'2019-09-07 14:32:29'),
	(11,'45786654','Cedula','Armando','Fuentes','1988-01-12','B-','Masculino','','','','armandof@yahoo.com','8909 5674','(+506) 7870 5643','2Km Oeste del palo de Mango, santiago de chile',NULL,NULL,'2019-09-08 16:02:05'),
	(12,'fg-0933122','Pasaporte','Natalia','Bonilla Perez','1988-01-12','O+','Femenino','','','','natabop@gmail.com','0987677845','','Quitumbe, frente a la plataforma S017 e09 - 23',NULL,NULL,'2019-09-08 16:10:25'),
	(13,'1-2338-9002','Cedula','Asdrubal Isaac','Picado Arias','1988-01-12','A-','Masculino','','','','asdrubalpicado@gmail.com','7889 2343','','800m Oeste Centro Acopio, Guadalupe, Pejibaye, Perez Zeledón',NULL,NULL,'2019-09-08 16:19:44'),
	(14,'298710933','Pasaporte','Marta Maria','Morales Mena','1988-01-12','A-','Femenino','','','','mamome@hotmail.com','67452280','8799332','El aguila de Pejibaye, perez zeledon',NULL,NULL,'2019-09-08 16:29:16'),
	(15,'77886677','Cedula','Cesar','Valverde Castro','1988-01-12',NULL,NULL,'','','','cesarv@gmail.com','7878 6776',NULL,':)',NULL,NULL,'2019-09-12 01:10:13'),
	(16,'TV8986556','Pasaporte','Casimiro','Ortega Alban','1988-01-12',NULL,NULL,'','','','casi_miro@gmail.com','766777889',NULL,':)',NULL,NULL,'2019-09-12 01:15:30'),
	(17,'XL 909009','Pasaporte','Paola Vanesa','Vargas Vega','1988-01-12','A+','Masculino','','','','pvvv@gmail.com','8988 7888','0986383930','En tiquicia',NULL,NULL,'2019-09-26 23:14:28'),
	(18,'133098989','Cedula','Geronimo Antonio','Heredia Villegas','1988-01-23',NULL,NULL,'','','','geronimo454@yahoo.com','7878 9312',NULL,':)',NULL,NULL,'2019-09-27 00:01:31');

/*!40000 ALTER TABLE `nunu_patients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_treatment_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_treatment_categories`;

CREATE TABLE `nunu_treatment_categories` (
  `tcategories_id` int(11) NOT NULL AUTO_INCREMENT,
  `tcategories_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tcategories_id`),
  UNIQUE KEY `tcategories_name` (`tcategories_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_treatment_categories` WRITE;
/*!40000 ALTER TABLE `nunu_treatment_categories` DISABLE KEYS */;

INSERT INTO `nunu_treatment_categories` (`tcategories_id`, `tcategories_name`)
VALUES
	(1,'Medicina General'),
	(3,'Oftalmologia'),
	(2,'Pediatria');

/*!40000 ALTER TABLE `nunu_treatment_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_treatments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_treatments`;

CREATE TABLE `nunu_treatments` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `treatment_category_id` int(11) NOT NULL,
  `treatment_name` varchar(255) NOT NULL,
  `treatment_active` varchar(1) NOT NULL,
  PRIMARY KEY (`treatment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_treatments` WRITE;
/*!40000 ALTER TABLE `nunu_treatments` DISABLE KEYS */;

INSERT INTO `nunu_treatments` (`treatment_id`, `treatment_category_id`, `treatment_name`, `treatment_active`)
VALUES
	(1,1,'Consulta Medicina General','1'),
	(2,2,'Consulta Pediatria','1'),
	(3,3,'Consulta Oftalmologia','1');

/*!40000 ALTER TABLE `nunu_treatments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_user_permisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_user_permisions`;

CREATE TABLE `nunu_user_permisions` (
  `upermision_id` int(11) NOT NULL AUTO_INCREMENT,
  `upermision_label` varchar(255) NOT NULL,
  `upermision_value` varchar(255) NOT NULL,
  `upermision_type` varchar(255) NOT NULL,
  `upermision_group` varchar(255) NOT NULL,
  PRIMARY KEY (`upermision_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_user_permisions` WRITE;
/*!40000 ALTER TABLE `nunu_user_permisions` DISABLE KEYS */;

INSERT INTO `nunu_user_permisions` (`upermision_id`, `upermision_label`, `upermision_value`, `upermision_type`, `upermision_group`)
VALUES
	(1,'Pacientes','patients','group-label','patient-group'),
	(2,'Ver','patient-view','option','patient-group'),
	(3,'Crear','patient-create','option','patient-group'),
	(4,'Editar','patient-edit','option','patient-group'),
	(5,'Citas','appointment','group-label','appointment-group'),
	(6,'Ver','appointment-view','option','appointment-group'),
	(7,'Crear','appointment-create','option','appointment-group'),
	(8,'Editar','appointment-edit','option','appointment-group'),
	(9,'Administrador','admin','group-label','admin-group'),
	(10,'Editar','admin-edit','option','admin-group');

/*!40000 ALTER TABLE `nunu_user_permisions` ENABLE KEYS */;
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
  `user_address` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_role` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_last_access` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_alias` (`user_alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='App Users';

LOCK TABLES `nunu_users` WRITE;
/*!40000 ALTER TABLE `nunu_users` DISABLE KEYS */;

INSERT INTO `nunu_users` (`user_id`, `user_name`, `user_alias`, `user_password`, `user_email`, `user_address`, `user_phone`, `user_role`, `user_status`, `user_created_at`, `user_last_access`)
VALUES
	(1,'Administrator','admin','admin1234','admin@admin.com',NULL,NULL,'admin',1,'2019-09-16 23:36:44','2019-09-16 23:36:44'),
	(2,'Andrey picado ','apicado','c93ccd78b2076528346216b3b2f701e6','andreypicado@gmail.com',NULL,NULL,'admin',1,'2019-09-17 00:10:40','2019-09-17 00:10:40'),
	(3,'Nataly Barreto Cardenas','natalybc','751cb3f4aa17c36186f4856c8982bf27','natalybc@gmail.com',NULL,NULL,'admin',1,'2019-09-17 00:52:36','2019-09-17 00:52:36');

/*!40000 ALTER TABLE `nunu_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_xml
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_xml`;

CREATE TABLE `nunu_xml` (
  `xml_id` int(11) NOT NULL AUTO_INCREMENT,
  `xml_text` text NOT NULL,
  PRIMARY KEY (`xml_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_xml` WRITE;
/*!40000 ALTER TABLE `nunu_xml` DISABLE KEYS */;

INSERT INTO `nunu_xml` (`xml_id`, `xml_text`)
VALUES
	(1,'<?xml version=\'1.0\' encoding=\'UTF-8\'?>\r\n<content>\r\n<note>\r\n  <to>Tove</to>\r\n  <from>Jani</from>\r\n  <heading>Reminder</heading>\r\n  <body>Don\'t forget me this weekend!</body>\r\n</note>\r\n<note>\r\n  <to>Jesse</to>\r\n  <from>James</from>\r\n  <heading>Reminder2</heading>\r\n  <body>Don\'t forget me this weekend 2!</body>\r\n</note>\r\n<note>\r\n  <to>Manolo</to>\r\n  <from>Stacy</from>\r\n  <heading>Reminder 3</heading>\r\n  <body>Don\'t forget me this weekend 3!</body>\r\n</note>\r\n</content>');

/*!40000 ALTER TABLE `nunu_xml` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
