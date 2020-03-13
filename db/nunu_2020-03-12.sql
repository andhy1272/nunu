# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: nunu
# Generation Time: 2020-03-13 02:08:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table nunu_agenda
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_agenda`;

CREATE TABLE `nunu_agenda` (
  `agenda_id` int(11) NOT NULL AUTO_INCREMENT,
  `agenda_date` date NOT NULL,
  `agenda_time` time NOT NULL,
  `agenda_patient_id` int(11) NOT NULL,
  `agenda_service` varchar(255) NOT NULL,
  `agenda_status` varchar(50) NOT NULL,
  `agenda_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agenda_notes` varchar(1024) NOT NULL,
  `agenda_store` int(11) NOT NULL,
  PRIMARY KEY (`agenda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_agenda` WRITE;
/*!40000 ALTER TABLE `nunu_agenda` DISABLE KEYS */;

INSERT INTO `nunu_agenda` (`agenda_id`, `agenda_date`, `agenda_time`, `agenda_patient_id`, `agenda_service`, `agenda_status`, `agenda_created_at`, `agenda_notes`, `agenda_store`)
VALUES
	(1,'2019-08-31','09:20:00',1,'Consulta Medicina General','ontime','2019-07-13 21:23:35','Van a venir los abuelos tambien.',1),
	(2,'2019-08-21','14:50:00',1,'Consulta Pediatria','ontime','2019-07-13 21:39:33','',1),
	(3,'2019-08-21','10:00:00',1,'Consulta Pediatria','ontime','2019-07-13 21:40:19','a new note here',1),
	(4,'2020-02-16','09:00:00',1,'Medicina General','ontime','2020-02-16 11:04:59','algunas notas aqui',1),
	(5,'2020-02-16','17:00:00',1,'Medicina Pediatrica','ontime','2020-02-16 11:26:05','otras notas mas',1),
	(6,'2020-02-20','00:00:00',3,'Procedimiento','ontime','2020-02-19 21:51:36','Cura de Herida',1),
	(7,'2020-02-22','00:00:00',9,'Consulta Medicina General','ontime','2020-02-22 12:24:32','test 01',1),
	(8,'2020-02-22','00:00:00',20,'Procedimiento','ontime','2020-02-22 12:27:37','reparacion de cuerdas vocales :P',1),
	(9,'2020-02-22','07:20:00',1,'Consulta Pediatria','ontime','2020-02-22 12:29:30','test 02',1),
	(10,'2020-02-22','07:05:00',5,'Consulta Medicina General','ontime','2020-02-22 12:35:08','',1),
	(11,'2020-02-22','18:45:00',22,'Consulta Pediatria','ontime','2020-02-22 13:16:01','test 03',1);

/*!40000 ALTER TABLE `nunu_agenda` ENABLE KEYS */;
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
	(8,'default/country','Ecuador'),
	(9,'agenda/appointment-frequency','1');

/*!40000 ALTER TABLE `nunu_config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_exam_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_exam_categories`;

CREATE TABLE `nunu_exam_categories` (
  `examcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `examcat_name` varchar(255) NOT NULL,
  `examcat_enable` int(11) NOT NULL,
  `examcat_editable` int(11) NOT NULL,
  PRIMARY KEY (`examcat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_exam_categories` WRITE;
/*!40000 ALTER TABLE `nunu_exam_categories` DISABLE KEYS */;

INSERT INTO `nunu_exam_categories` (`examcat_id`, `examcat_name`, `examcat_enable`, `examcat_editable`)
VALUES
	(1,'HEMATOLOGIA',1,0),
	(2,'COAGULACION',1,0),
	(3,'QUIMICA SANGUINEA',1,0),
	(4,'ELECTROLITOS',1,0),
	(5,'DROGAS',1,0),
	(6,'BIOLOGIA MOLECULAR',1,0),
	(7,'UROANALISIS',1,0),
	(8,'PARASITOLOGIA',1,0),
	(9,'MICROBIOLOGIA',1,0),
	(10,'MICROBIOLOGIA MOLECULAR',1,0),
	(11,'CITOLOGIA',1,0),
	(12,'ENDOCRINOLOGIA Y MARCADORES TUMORALES',1,0),
	(13,'INMUNOLOGIA Y SEROLOGIA',1,0),
	(14,'AUTOINMUNIDAD',1,0),
	(15,'ANTIGENOS Y ANTICUERPOS DE INYECCIONES',1,0),
	(16,'CITOMETRIA DE FLUJO',1,0);

/*!40000 ALTER TABLE `nunu_exam_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_exams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_exams`;

CREATE TABLE `nunu_exams` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_category` int(11) NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `exam_enable` int(11) NOT NULL,
  `exam_editable` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_exams` WRITE;
/*!40000 ALTER TABLE `nunu_exams` DISABLE KEYS */;

INSERT INTO `nunu_exams` (`exam_id`, `exam_category`, `exam_name`, `exam_enable`, `exam_editable`)
VALUES
	(21,1,'Acido Folico',1,0),
	(22,1,'Biometria Hematica',1,0),
	(23,1,'Capacidad de Fijacion del Hierro',1,0),
	(24,1,'Coombs Directo',1,0),
	(25,1,'Coombs Indirecto',1,0),
	(26,1,'Drepanocitos',1,0),
	(27,1,'Ferritina',1,0),
	(28,1,'G. Sanguineo y RH',1,0),
	(29,1,'Hemaglobina',1,0),
	(30,1,'Hematocrito',1,0),
	(31,1,'Hematozoario',1,0),
	(32,1,'Hierro',1,0),
	(33,1,'Plaquetas',1,0),
	(34,1,'Reticulocitos',1,0),
	(35,1,'Sat. Transferrina',1,0),
	(36,1,'Sed. Westergreen',1,0),
	(37,1,'Sed. Wintrobe',1,0),
	(38,1,'Transferrina',1,0),
	(39,1,'Vitamina B12',1,0),
	(40,1,'Otros ___________',1,0),
	(41,2,'Ant. Coagulante Lupido - Confirmatorio',1,0),
	(42,2,'Antitromnina III',1,0),
	(43,2,'Dimero D',1,0),
	(44,2,'Fibrinogeno',1,0),
	(45,2,'Homocisteina',1,0),
	(46,2,'Plaquetas',1,0),
	(47,2,'Producto de Degradacion del Fibronogeno',1,0),
	(48,2,'Proteina C',1,0),
	(49,2,'Proteina S',1,0),
	(50,2,'Retrac. Coagulo',1,0),
	(51,2,'T. Coagulacion',1,0),
	(52,2,'T. Cemorragia',1,0),
	(53,2,'T. Crombina',1,0),
	(54,2,'Tiempo de Trombina',1,0),
	(55,2,'TP / INR',1,0),
	(56,2,'TTP',1,0),
	(57,2,'Otros ___________',1,0),
	(78,3,'Trigliceridos',1,0),
	(79,3,'Acido Lactico',1,0),
	(80,3,'Acido Urico',1,0),
	(81,3,'Albumina',1,0),
	(82,3,'Aldolasa',1,0),
	(83,3,'ALTL. TGP',1,0),
	(84,3,'Amilasa',1,0),
	(85,3,'Amonio',1,0),
	(86,3,'APO A',1,0),
	(87,3,'APO B',1,0),
	(88,3,'ASTL-TGO',1,0),
	(89,3,'Bilirrubinas Totales y Parciales',1,0),
	(90,3,'BUM_____ Horas',1,0),
	(91,3,'Catecolaminas',1,0),
	(92,3,'CK - MB',1,0),
	(93,3,'Colesterol Total',1,0),
	(94,3,'Colinesterasa',1,0),
	(95,3,'CPK',1,0),
	(96,3,'Creatinina',1,0),
	(97,3,'Curva Tolerancia Glucosa',1,0),
	(98,3,'Fosfatasa Acida Protatica',1,0),
	(99,3,'Fosfatasa Acida Total',1,0),
	(100,3,'Fosfatasa Alcalina',1,0),
	(101,3,'Fructosamina',1,0),
	(102,3,'GAMMGT',1,0),
	(103,3,'Globulina',1,0),
	(104,3,'Glucosa',1,0),
	(105,3,'Glucosa Porst Prandial',1,0),
	(106,3,'HDL Colesterol',1,0),
	(107,3,'Hemaglobina Glucosilada A 1C',1,0),
	(108,3,'LDL Colesterol',1,0),
	(109,3,'Lipasa',1,0),
	(110,3,'Lipidos Totales',1,0),
	(111,3,'Liproteina a',1,0),
	(112,3,'Mioglobina',1,0),
	(113,3,'Peptido C',1,0),
	(114,3,'Proteinas',1,0),
	(115,3,'Serotonina (SHT)',1,0),
	(116,3,'Test de O\'Sullivan 50 GR 1hora',1,0),
	(117,3,'Troponina T',1,0),
	(118,3,'Urea',1,0),
	(119,3,'VLDL Colesterol',1,0),
	(120,3,'Otros ___________',1,0),
	(121,4,'Bicarbonato',1,0),
	(122,4,'Calcio',1,0),
	(123,4,'Calcio Ionico',1,0),
	(124,4,'Cloro',1,0),
	(125,4,'Fosforo',1,0),
	(126,4,'Hierro',1,0),
	(127,4,'Litio',1,0),
	(128,4,'Magnesio',1,0),
	(129,4,'Potasio',1,0),
	(130,4,'Sodio',1,0),
	(131,4,'Otros ___________',1,0),
	(132,5,'Acido Valproico',1,0),
	(133,5,'Carbamacepina',1,0),
	(134,5,'Difenilhidantoina',1,0),
	(135,5,'Digoxina',1,0),
	(136,5,'Drogas en Abuso en Orina',1,0),
	(137,5,'Fenobarbital',1,0),
	(138,5,'Litio',1,0),
	(139,5,'Otros ___________',1,0),
	(140,6,'Carga Viral HIV',1,0),
	(141,6,'Farctor V Leiden',1,0),
	(142,6,'H LA B27',1,0),
	(143,6,'HLA Clase I / Clase II',1,0),
	(144,6,'HPV(28 serotipos: Alto/Mediano/Bajo Riesgo)',1,0),
	(145,6,'MP PCR (Enfermedades de transmision Sexual)',1,0),
	(146,6,'Mutacion de la Protombina',1,0),
	(147,6,'PCR - Chlamydia Trachomatis',1,0),
	(148,6,'PCR - CMV',1,0),
	(149,6,'PCR - Hepatitis B',1,0),
	(150,6,'PCR - Hepatitis C',1,0),
	(151,6,'PCR - Herpes I y II',1,0),
	(152,6,'PCR - Toxoplasma',1,0),
	(153,6,'PCR - Tuberculosis (Mycobacterium Tuberculosis)',1,0),
	(154,6,'Otros ___________',1,0),
	(155,7,'5H IAA',1,0),
	(156,7,'Albuminuria 24 Horas OCA',1,0),
	(157,7,'BAAR En Orina N°',1,0),
	(158,7,'Catecolominas',1,0),
	(159,7,'Clearence de Creatinina',1,0),
	(160,7,'Cloro',1,0),
	(161,7,'Cortisol Libre',1,0),
	(162,7,'Creatinuria 24 Horas OCA',1,0),
	(163,7,'EMO',1,0),
	(164,7,'Gota Fresca',1,0),
	(165,7,'GRAM',1,0),
	(166,7,'Muestras',1,0),
	(167,7,'Potasio',1,0),
	(168,7,'Proteinura 24 Horas OCA',1,0),
	(169,7,'Sodio',1,0),
	(170,7,'Urocultivo - Antibiograma',1,0),
	(171,7,'Otros ___________',1,0),
	(172,8,'Adenovirus',1,0),
	(173,8,'Antigeno de Criptosporidium',1,0),
	(174,8,'Antigeno de Giardia Lamblia',1,0),
	(175,8,'Azucares Reductores',1,0),
	(176,8,'Coproparasitario N°_______ Muestras',1,0),
	(177,8,'Coproparasitario por Concentracion',1,0),
	(178,8,'Grasas Fecales',1,0),
	(179,8,'Oxiuros (TEC. Graham)',1,0),
	(180,8,'PH en Heces',1,0),
	(181,8,'Polimorfonucleares',1,0),
	(182,8,'Rotavirus',1,0),
	(183,8,'Sangre Oculta',1,0),
	(184,8,'Sudan III',1,0),
	(185,9,'Aminas',1,0),
	(186,9,'Ascitico',1,0),
	(187,9,'Citoquimico - Bacteriologico de Liquidos o Efusion',1,0),
	(188,9,'Cultivo de Anaerobios',1,0),
	(189,9,'Cultivo de Hongos',1,0),
	(190,9,'Cultivo de Lowestein',1,0),
	(191,9,'Cultivo de ____________',1,0),
	(192,9,'Cultivo para Microbacterias',1,0),
	(193,9,'Fresco',1,0),
	(194,9,'GRAM',1,0),
	(195,9,'Hemocultivo',1,0),
	(196,9,'Identificacion de Aislamiento Bacteriano',1,0),
	(197,9,'Identificacion de Hongo',1,0),
	(198,9,'KOH Muestra ________',1,0),
	(199,9,'LCR',1,0),
	(200,9,'Mielocultivo',1,0),
	(201,9,'Peritonial',1,0),
	(202,9,'Pleural',1,0),
	(203,9,'Prueba de Suceptibilidad para Levaduras',1,0),
	(204,9,'Secrecion Vaginal',1,0),
	(205,9,'Sinocial',1,0),
	(206,9,'ZIEHL - NEELSEN (BAAR)',1,0),
	(207,9,'Otros ___________',1,0),
	(208,10,'Identificacion de Carbapenemasas',1,0),
	(209,10,'Mycobacterium Tuberculosis',1,0),
	(210,10,'Pneumocystis Jeroveci',1,0),
	(211,10,'PRA para Mycobacterias',1,0),
	(212,10,'Toxina PVL',1,0),
	(213,11,'Espermatograma',1,0),
	(214,11,'Papanicolaou',1,0),
	(215,11,'Otros ___________',1,0),
	(216,12,'17 Beta Estradiol',1,0),
	(217,12,'17 OH Progesterona',1,0),
	(218,12,'ACTH',1,0),
	(219,12,'AFP',1,0),
	(220,12,'Beta HCG Cualitativa',1,0),
	(221,12,'Beta HCG Cuantitativa',1,0),
	(222,12,'CA 125',1,0),
	(223,12,'CA 15 - 3',1,0),
	(224,12,'CA 19 - 9',1,0),
	(225,12,'CA 72 - 4',1,0),
	(226,12,'CEA',1,0),
	(227,12,'CON Glucosa',1,0),
	(228,12,'Cortisol',1,0),
	(229,12,'Cortisol Libre',1,0),
	(230,12,'Cromogranina A',1,0),
	(231,12,'Curva de Insulina _____ Horas',1,0),
	(232,12,'Curva Hormona de Crecimiento _____ Horas',1,0),
	(233,12,'DHEAS',1,0),
	(234,12,'Ferritina',1,0),
	(235,12,'FSH',1,0),
	(236,12,'GF - (Factor de crecimiento Insulinico 1)',1,0),
	(237,12,'Hormona Crecimiento',1,0),
	(238,12,'Insulina',1,0),
	(239,12,'LH',1,0),
	(240,12,'Paratohormona',1,0),
	(241,12,'PM',1,0),
	(242,12,'Post-Ejercicio',1,0),
	(243,12,'Progesterona',1,0),
	(244,12,'Prolactina',1,0),
	(245,12,'PSA Libre',1,0),
	(246,12,'PSA Total',1,0),
	(247,12,'T3 Libre',1,0),
	(248,12,'T3 Total',1,0),
	(249,12,'T4 Libre',1,0),
	(250,12,'T4 Total',1,0),
	(251,12,'Testosterona',1,0),
	(252,12,'Testosterona Libre',1,0),
	(253,12,'Tiroglobulina',1,0),
	(254,12,'TSH',1,0),
	(255,13,'Actividad del Complemento (CH50)',1,0),
	(256,13,'Aglutinaciones Febriles',1,0),
	(257,13,'Alergenos Respiratorios',1,0),
	(258,13,'Alergenosdigestivos',1,0),
	(259,13,'Alfa 1 Antitripsina',1,0),
	(260,13,'AST',1,0),
	(261,13,'Bandas Oligoclonales(Electroisoenfoques)',1,0),
	(262,13,'Bence Jones Inmunofijacion',1,0),
	(263,13,'C3',1,0),
	(264,13,'C4',1,0),
	(265,13,'Cadena Kappa Libre',1,0),
	(266,13,'Cadena Lambda Libre',1,0),
	(267,13,'Crioaglutininas',1,0),
	(268,13,'Crioblubulinas',1,0),
	(269,13,'Electroforesis de Proteinas',1,0),
	(270,13,'Eonsinofilos en Secrecion Nasal',1,0),
	(271,13,'Haptoglobina',1,0),
	(272,13,'Ig A',1,0),
	(273,13,'Ig D',1,0),
	(274,13,'Ig E',1,0),
	(275,13,'Ig G',1,0),
	(276,13,'Ig M',1,0),
	(277,13,'IL - 6',1,0),
	(278,13,'Inmunoelectrooresis',1,0),
	(279,13,'Latex',1,0),
	(280,13,'PCR Ultra Sensible',1,0),
	(281,13,'Procalcitonina',1,0),
	(282,13,'Quantiferon',1,0),
	(283,13,'TNF - Alfa',1,0),
	(284,13,'TPHA',1,0),
	(285,13,'VDRL',1,0),
	(286,13,'Otros ___________',1,0),
	(287,14,'ANA BLOT',1,0),
	(288,14,'ANCA',1,0),
	(289,14,'ANTI - Endomiso',1,0),
	(290,14,'ANTI - Insulina',1,0),
	(291,14,'ANTI - Protrombina IgG_____ IgM_____',1,0),
	(292,14,'ANTI - AMA - M2',1,0),
	(293,14,'ANTI - Aparato de Golgi',1,0),
	(294,14,'ANTI - ASCA',1,0),
	(295,14,'ANTI - Beta 2 Glicoproteina IgG_____ IgM_____',1,0),
	(296,14,'ANTI - Cardiolipina IgG_____ IgM_____',1,0),
	(297,14,'ANTI - Celulas Parieteles',1,0),
	(298,14,'ANTI - Centrometro',1,0),
	(299,14,'ANTI - CIq',1,0),
	(300,14,'ANTI - Coagulante Lupico',1,0),
	(301,14,'ANTI - DNAcd',1,0),
	(302,14,'ANTI - DNAcs',1,0),
	(303,14,'ANTI - Factor Intrinseco',1,0),
	(304,14,'ANTI - Fosfolipidos IgG_____ IgM_____',1,0),
	(305,14,'ANTI - GAD',1,0),
	(306,14,'ANTI - Gliadina',1,0),
	(307,14,'ANTI - gp 210',1,0),
	(308,14,'ANTI - Histonas',1,0),
	(309,14,'ANTI - IIA2',1,0),
	(310,14,'ANTI - Islotes de Pancreas',1,0),
	(311,14,'ANTI - Jo - 1',1,0),
	(312,14,'ANTI - Ku',1,0),
	(313,14,'ANTI - LC -1',1,0),
	(314,14,'ANTI - LKM',1,0),
	(315,14,'ANTI - LKM -1',1,0),
	(316,14,'ANTI - M2 -3E(BPO)',1,0),
	(317,14,'ANTI - Mi2',1,0),
	(318,14,'ANTI - Mitocondriales',1,0),
	(319,14,'ANTI - Musculo Liso',1,0),
	(320,14,'ANTI - Nucleosoma',1,0),
	(321,14,'ANTI - P. Ribosomal',1,0),
	(322,14,'ANTI - PCNA',1,0),
	(323,14,'ANTI - PM- ScI',1,0),
	(324,14,'ANTI - PML',1,0),
	(325,14,'ANTI - Ra33',1,0),
	(326,14,'ANTI - Receptor de Acetilcolina',1,0),
	(327,14,'ANTI - Receptor TSH',1,0),
	(328,14,'ANTI - RNP - /Sm',1,0),
	(329,14,'ANTI - ScI - 70',1,0),
	(330,14,'ANTI - SLA / LP',1,0),
	(331,14,'ANTI - Sm',1,0),
	(332,14,'ANTI - Sp 100',1,0),
	(333,14,'ANTI - SSA',1,0),
	(334,14,'ANTI - SSA 52 KDa',1,0),
	(335,14,'ANTI - SSA 60 KDa',1,0),
	(336,14,'ANTI - SSB',1,0),
	(337,14,'ANTI - Toriglobulina',1,0),
	(338,14,'ANTI - TPO',1,0),
	(339,14,'ANTI - U1sn - RNP',1,0),
	(340,14,'ANTI - Vimentina',1,0),
	(341,14,'ANTI - Anexina V IgG_____ IgM_____',1,0),
	(342,14,'ANTI Neuronales',1,0),
	(343,14,'Anticuerpos Antinucleares (ANA)',1,0),
	(344,14,'Antigenos Extraibles del Nucleo (ENA)',1,0),
	(345,14,'Crithidia Lucilae',1,0),
	(346,14,'Factor Reumatoide IgM',1,0),
	(347,14,'Panel Miosits ',1,0),
	(348,14,'Otros ___________',1,0),
	(349,15,'AMT - CMV IgG_____ IgM_____',1,0),
	(350,15,'ANTI - HAV (TOTALES)',1,0),
	(351,15,'ANTI - ACHINOCOCCUS IgG',1,0),
	(352,15,'ANTI - Ameba Histolyca IgG(Seroameba)',1,0),
	(353,15,'ANTI - Chlamydia Trachomatis IgG_____ IgM_____ IgA_____',1,0),
	(354,15,'ANTI - Dengue Tipo I, II, III, IV IgG_____ IgM_____',1,0),
	(355,15,'ANTI - Epstein Barr VCA IgG_____ VCA IgM_____',1,0),
	(356,15,'ANTI - H.Pylori IgG_____ IgA_____ Ig',1,0),
	(357,15,'ANTI - HAV IgM_____ IgG_____',1,0),
	(358,15,'ANTI - HBc Ag (Totales)',1,0),
	(359,15,'ANTI - HBc Ag IgM_____',1,0),
	(360,15,'ANTI - HBeAG',1,0),
	(361,15,'ANTI - HBsAg',1,0),
	(362,15,'ANTI - Herpes I IgG_____ IgM_____',1,0),
	(363,15,'ANTI - Herpes II IgG_____ IgM_____',1,0),
	(364,15,'ANTI - HVC (Totales)',1,0),
	(365,15,'ANTI - Leptospira IgG_____ IgM_____',1,0),
	(366,15,'ANTI - Mycobacterium Tuberculosis',1,0),
	(367,15,'ANTI - Mycoplasma Pneumonia IgG_____ IgM_____',1,0),
	(368,15,'ANTI - Parvovirus B19 IgG_____ IgM_____',1,0),
	(369,15,'ANTI - Plasmodium Falciparum y Vivax(Totales)',1,0),
	(370,15,'ANTI - Rubeola IgG_____ IgM_____',1,0),
	(371,15,'ANTI - Sarampion IgM_____',1,0),
	(372,15,'ANTI - Taenia Solium IgG (Cisticerco)',1,0),
	(373,15,'ANTI - Toxocara Canis',1,0),
	(374,15,'ANTI - Toxoplasma Gond II IgG_____ IgM_____ IgA_____',1,0),
	(375,15,'ANTI - Trypanosoma Cruzi IgG',1,0),
	(376,15,'ANTI - Varicelazoster IgG_____ IgM_____',1,0),
	(377,15,'Antigeno de Chlamydia Trachomatis',1,0),
	(378,15,'Antigeno de Plasmodium - Falciparum y Vivax',1,0),
	(379,15,'Antigenos en Heces de H. Pylori',1,0),
	(380,15,'Brocelosis',1,0),
	(381,15,'EBN A IgG_____ EA- R IgG_____ EA- D IgG_____',1,0),
	(382,15,'HBeAg',1,0),
	(383,15,'HBsAg',1,0),
	(384,15,'HIV 1 y 2',1,0),
	(385,15,'Monospot',1,0),
	(386,15,'Muestra _______',1,0),
	(387,15,'Toxoplasma IgG_____ de Avidez',1,0),
	(388,15,'Otros ___________',1,0),
	(389,16,'Celulas Madre CD 34 (Blastos) Contaje',1,0),
	(390,16,'Celulas Plasmaticas CD38 - CD138 - CD19',1,0),
	(391,16,'Estallido Respiratorio (Granulomatosis Cronica)',1,0),
	(392,16,'Inmunofenotipo Leucemia / Linfoma',1,0),
	(393,16,'Linfocitos Activados HLA - DR',1,0),
	(394,16,'Linfocitos B CD19 - CD20',1,0),
	(395,16,'Linfocitos T CD4 / CD8',1,0),
	(396,16,'Otros ___________',1,0);

/*!40000 ALTER TABLE `nunu_exams` ENABLE KEYS */;
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
	(4,1,'Abuelo: Asmatico\ntio: cardiopata',NULL,NULL,NULL,NULL),
	(5,19,'','','','',''),
	(6,20,'Tio tiene asma','','','',''),
	(7,21,NULL,NULL,NULL,NULL,NULL),
	(8,22,NULL,NULL,NULL,NULL,NULL);

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
  `patient_country` varchar(50) NOT NULL,
  `patient_province` varchar(50) NOT NULL,
  `patient_city` varchar(100) DEFAULT NULL,
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

INSERT INTO `nunu_patients` (`patient_id`, `patient_id_number`, `patient_id_type`, `patient_name`, `patient_last_name`, `patient_birthdate`, `patient_blood_type`, `patient_sex`, `patient_marital_status`, `patient_education`, `patient_profesion`, `patient_email`, `patient_phone1`, `patient_phone2`, `patient_country`, `patient_province`, `patient_city`, `patient_address`, `patient_last_weight`, `patient_last_height`, `patient_created_at`)
VALUES
	(1,'113390963','Cedula','Andrey Asdrubal','Picado Fernandez','1988-01-12','B+','Femenino','','','','andhy1272@gmail.com','8949-7211','+506 7211-8949','','','','Cruce a sabanilla, Casa esquinera color caoba. Guadalupe, San Jose, Costa Rica, y un poquito mas arriba jeje: :P pichudokjhkdf ht\\\noijsdfoije',NULL,NULL,'2019-05-05 10:58:50'),
	(2,'1759199852','Cedula','Nataly','Barreto','1988-01-12','O+','Femenino','','','','natalybarretoc@gmail.com','0986383930','+(506) 8949-7211','','','','Quito, Quitumbe, Conj Guayanay 2, casa DC002',NULL,NULL,'2019-08-02 22:04:09'),
	(3,'F509834','passport','Anastasia','Guevara','1997-09-20','A+','Femenino','','','','anastasiaGue@gmail.com','677-99999-aaaaa','(+506) 6780-4566 / (+506) 6780-4566 / (+506) 6780-','','','','En su casa. pero fuera',NULL,NULL,'2019-08-02 22:15:03'),
	(4,'G568900','Pasaporte','Tereza ','Carrazco Guevara','1988-01-12','B+','Femenino','','','','terechacague@gmail.com','765 0987','0969675432','','','','6703 Nw 7th St\r\nCasa Esquinera color verde',NULL,NULL,'2019-09-06 22:14:31'),
	(5,'1756760987','Cedula','Dante','Alegieri','1988-01-12','B+','Masculino','','','','dante@gmail.com','45667787','','','','','Devil my cry',NULL,NULL,'2019-09-06 23:21:35'),
	(6,'890998655','Cedula','Pedro','Vazquez Aguilar','1988-01-12','A-','Masculino','','','','pedritovazagui@gmail.com','7656786512','89765345','','','','600m Norte abastecedor la esquina vieja.\r\nGoicoechea.',NULL,NULL,'2019-09-06 23:24:14'),
	(7,'T9009872','Pasaporte','Tiffany','Jhones','1988-01-13','O-','Femenino','','','','tiffanyjhones@hotmail.com','78787878','001 788 0987','','','','en los yunaites',NULL,NULL,'2019-09-06 23:46:34'),
	(8,'23445532','Cedula','Roger','Pereira','1988-01-12','O+','Masculino','','','','roger@gmail.com','78785656','','','','','300m sur iglesia bautista, san mateo',NULL,NULL,'2019-09-06 23:52:07'),
	(9,'VG45332','Pasaporte','Merlina','Adams','1988-01-12','Otro','Femenino','','','','merlina@adams.com','432223445','','','','','la casa negra',NULL,NULL,'2019-09-07 01:05:57'),
	(10,'78654567','Pasaporte','Roberto','Gomez Bolaños','1988-01-12','O+','Masculino','','','','chespirito@gmail.com','+53 788 9009','6778 0094','','','','La vecindad del chavo, casa #8, Mexico DF',NULL,NULL,'2019-09-07 14:32:29'),
	(11,'45786654','Cedula','Armando','Fuentes','1988-01-12','B-','Masculino','','','','armandof@yahoo.com','8909 5674','(+506) 7870 5643','','','','2Km Oeste del palo de Mango, santiago de chile',NULL,NULL,'2019-09-08 16:02:05'),
	(12,'fg-0933122','Pasaporte','Natalia','Bonilla Perez','1988-01-12','O+','Femenino','','','','natabop@gmail.com','0987677845','','','','','Quitumbe, frente a la plataforma S017 e09 - 23',NULL,NULL,'2019-09-08 16:10:25'),
	(13,'1-2338-9002','Cedula','Asdrubal Isaac','Picado Arias','1988-01-12','A-','Masculino','','','','asdrubalpicado@gmail.com','7889 2343','','','','','800m Oeste Centro Acopio, Guadalupe, Pejibaye, Perez Zeledón',NULL,NULL,'2019-09-08 16:19:44'),
	(14,'298710933','Pasaporte','Marta Maria','Morales Mena','1988-01-12','A-','Femenino','','','','mamome@hotmail.com','67452280','8799332','','','','El aguila de Pejibaye, perez zeledon',NULL,NULL,'2019-09-08 16:29:16'),
	(15,'77886677','Cedula','Cesar','Valverde Castro','1988-01-12',NULL,NULL,'','','','cesarv@gmail.com','7878 6776',NULL,'','','',':)',NULL,NULL,'2019-09-12 01:10:13'),
	(16,'TV8986556','Pasaporte','Casimiro','Ortega Alban','1988-01-12',NULL,NULL,'','','','casi_miro@gmail.com','766777889',NULL,'','','',':)',NULL,NULL,'2019-09-12 01:15:30'),
	(17,'XL 909009','Pasaporte','Paola Vanesa','Vargas Vega','1988-01-12','A+','Masculino','','','','pvvv@gmail.com','8988 7888','0986383930','','','','En tiquicia',NULL,NULL,'2019-09-26 23:14:28'),
	(18,'133098989','Cedula','Geronimo Antonio','Heredia Villegas','1988-01-23',NULL,NULL,'','','','geronimo454@yahoo.com','7878 9312',NULL,'','','',':)',NULL,NULL,'2019-09-27 00:01:31'),
	(19,'T787783','Pasaporte','Clodomiro Matias','Arguello Mata','2012-03-05','A+','Masculino','Divorciad@','Universitaria','Quimico','clodomam@gmail.com','343233-33','553 9003 32','Costa Rica','Cañar',NULL,'la direccion completa va a qui',NULL,NULL,'2020-01-21 21:44:08'),
	(20,'788877998-1','Cedula','Edit','Piaf','2019-12-29','AB+','Femenino','Divorciad@','Universitaria','Cantante singer 2','editpiaf@hotmail.com','90888380','+77 887 9903','Venezuela','Los Ríos','Murcia','Cerca del estadio del Real..',NULL,NULL,'2020-01-21 21:48:52'),
	(21,'1111122222','Cedula','Petronilo','vargas acuña','0000-00-00',NULL,NULL,'','','','petronilova@hotmail.com','78787878',NULL,'','',NULL,':)',NULL,NULL,'2020-02-05 22:10:19'),
	(22,'1-1545-0987','Cedula','Veronica Maria','Davalos Muñoz','2002-11-21',NULL,NULL,'','','','verodavaloz@hotmail.com','6767-0988',NULL,'','',NULL,':)',NULL,NULL,'2020-02-22 13:15:15');

/*!40000 ALTER TABLE `nunu_patients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_staff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_staff`;

CREATE TABLE `nunu_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(255) NOT NULL,
  `staff_job` varchar(100) NOT NULL,
  `staff_speciality` varchar(100) DEFAULT NULL,
  `staff_active` tinyint(4) NOT NULL,
  `staff_active_until` datetime DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_staff` WRITE;
/*!40000 ALTER TABLE `nunu_staff` DISABLE KEYS */;

INSERT INTO `nunu_staff` (`staff_id`, `staff_name`, `staff_job`, `staff_speciality`, `staff_active`, `staff_active_until`)
VALUES
	(1,'Andrey Picado','Medico','General',1,NULL),
	(2,'Nataly Barreto Cardenas','Medico','Pediatra',1,NULL);

/*!40000 ALTER TABLE `nunu_staff` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nunu_stores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nunu_stores`;

CREATE TABLE `nunu_stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(100) NOT NULL,
  `store_phones` varchar(255) DEFAULT NULL,
  `store_emails` varchar(255) DEFAULT NULL,
  `store_address` varchar(255) NOT NULL,
  `store_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`store_id`),
  UNIQUE KEY `store_name` (`store_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nunu_stores` WRITE;
/*!40000 ALTER TABLE `nunu_stores` DISABLE KEYS */;

INSERT INTO `nunu_stores` (`store_id`, `store_name`, `store_phones`, `store_emails`, `store_address`, `store_active`)
VALUES
	(1,'Clinica Dra. Nataly Barreto','0989383930 / 0987785645','dra_natalyb@gmail.com','Av. Llira Ñan y Pachamama, Quitumbe, Ecuador',1);

/*!40000 ALTER TABLE `nunu_stores` ENABLE KEYS */;
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
	(5,'Agenda','agenda','group-label','agenda-group'),
	(6,'Ver','agenda-view','option','agenda-group'),
	(7,'Crear','agenda-create','option','agenda-group'),
	(8,'Editar','agenda-edit','option','agenda-group'),
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
	(1,'Administrator','admin','c93ccd78b2076528346216b3b2f701e6','admin@admin.com',NULL,NULL,'admin',1,'2019-09-16 23:36:44','2019-09-16 23:36:44'),
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
