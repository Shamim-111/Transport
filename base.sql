

-- MySQL dump 10.13  Distrib 5.7.26, for Linux (i686)
--
-- Host: localhost    Database: aubnilbus
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `busid`
--

DROP TABLE IF EXISTS `busid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `busid` (
  `busid` varchar(255) NOT NULL,
  `busname` varchar(255) NOT NULL,
  PRIMARY KEY (`busid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `busid`
--

LOCK TABLES `busid` WRITE;
/*!40000 ALTER TABLE `busid` DISABLE KEYS */;
INSERT INTO `busid` VALUES ('BUS-A','Anando'),('BUS-B','Baishakhi'),('BUS-C','Chaitali'),('BUS-D','Falguni'),('BUS-E','Hemonto'),('BUS-F','Isha Kha'),('BUS-G','Khonika'),('BUS-H','Kinchit'),('BUS-I','Moitree'),('BUS-J','Shrabon'),('BUS-K','Taranga'),('BUS-L','Ullash'),('BUS-M','Boshonto');
/*!40000 ALTER TABLE `busid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businfo`
--

DROP TABLE IF EXISTS `businfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businfo` (
  `busid` varchar(255) NOT NULL,
  `stopage` varchar(255) NOT NULL,
  `serial` int(11) NOT NULL,
  `latitude` decimal(8,4) NOT NULL,
  `longitude` decimal(8,4) NOT NULL,
  PRIMARY KEY (`busid`,`stopage`),
  CONSTRAINT `businfo_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `busid` (`busid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businfo`
--

LOCK TABLES `businfo` WRITE;
/*!40000 ALTER TABLE `businfo` DISABLE KEYS */;
INSERT INTO `businfo` VALUES ('BUS-A','Chashara Bus Stand',4,23.6264,90.4992),('BUS-A','Jalkuri BRTC AC Bus Stop',2,23.6638,90.4869),('BUS-A','Sibu Market Bus Stop',3,23.6442,90.4935),('BUS-A','Sign Board Bus Stop',1,23.6937,90.4808),('BUS-B','Al-Helal Bus Stop',12,23.8027,90.3707),('BUS-B','Kachukhet Bazar, Kachukhet Road, Dhaka',1,23.7929,90.3880),('BUS-B','Kazipara Overpass',8,23.7972,90.3730),('BUS-B','Mirpur 14 Bus Stand',2,23.7983,90.3876),('BUS-B','Mirpur-10 Bus Stop',7,23.8067,90.3686),('BUS-B','Mirpur-10 Water Tank',6,23.8068,90.3736),('BUS-B','Mirpur-13',5,23.8074,90.3785),('BUS-B','Police Stuff College',4,23.8027,90.3803),('BUS-B','Shaheed Police Smrity College, Police Complex, Mirpur-14',3,23.8000,90.3849),('BUS-B','Sher-e-Bangla Agricultural University',11,23.7712,90.3752),('BUS-B','Shewrapara Bus Stand',9,23.7904,90.3756),('BUS-B','Taltola',10,23.7835,90.3785),('BUS-C','Ansar Camp Road, Mirpur',9,23.7912,90.3547),('BUS-C','Bangla College',10,23.7848,90.3528),('BUS-C','Digilab Diagnostic Center, Mirpur',4,23.8212,90.3650),('BUS-C','Janata Housing, Mirpur-1',8,23.7989,90.3587),('BUS-C','Kallyanpur',11,23.7822,90.3595),('BUS-C','Mirpur-1',1,23.7956,90.3537),('BUS-C','Mirpur-2',2,23.7977,90.3845),('BUS-C','Original 10',6,23.8104,90.3675),('BUS-C','Proshika Bus Stop',7,23.8095,90.3610),('BUS-C','Rabbani Hotel and Restaurant',5,23.8157,90.3663),('BUS-C','Setara Convention Hall',3,23.8225,90.3642),('BUS-C','Shyamoli',12,23.7718,90.3631),('BUS-D','Amtali, Shahid Tajuddin Ahmed Avenue',5,23.7755,90.3992),('BUS-D','Awlad Hossain Market, Kazi Nazrul Islam Avenue',1,23.7630,90.3894),('BUS-D','Bashtola Bus Stand',14,23.7945,90.4241),('BUS-D','Bijoy Sarani',2,23.7648,90.3855),('BUS-D','Gudaraghat',9,23.7797,90.4188),('BUS-D','Gulshan-1',8,23.7821,90.4161),('BUS-D','Gulshan-Badda Link Road',10,23.7457,90.3936),('BUS-D','Mohakhali Bus Stop',4,23.7782,90.3977),('BUS-D','Nabisco',3,23.7689,90.4014),('BUS-D','Natun Bazar Bus Stand',15,23.7974,90.4237),('BUS-D','Shahjadpur',13,23.7917,90.4249),('BUS-D','Suvastu Nazar Valley',12,23.7898,90.4252),('BUS-D','TB Gate Bus Stop',7,23.7802,90.4094),('BUS-D','Uttar Badda',11,23.7820,90.4231),('BUS-D','Wireless Mor Bus Stop, Bir Uttam AK Khandakar Road',6,23.7807,90.4055),('BUS-E','Bish Mail, Savar Union',6,23.8961,90.2708),('BUS-E','Gabtoli, Dhaka',1,23.7837,90.3442),('BUS-E','Hemayetpur Bus Stand',2,23.7933,90.2711),('BUS-E','Nabinagar Bazar Bus Stop',7,23.9136,90.2581),('BUS-E','Prantic Bus Stop, JU',5,23.8897,90.2722),('BUS-E','Radio Colony Bus Stop',4,23.8587,90.2624),('BUS-E','Savar Bazar',3,23.8501,90.2591),('BUS-F','Chittagang Road Bus Stop',9,23.6979,90.5097),('BUS-F','Kanchpur Bus Stop',10,23.7061,90.5220),('BUS-F','Kazla Bus Stop',1,23.7057,90.4441),('BUS-F','Matuail Medi Care Hospital and Diagnostic Center',4,23.7131,90.4697),('BUS-F','Meghna Ghat Bus Stop',13,23.6184,90.6094),('BUS-F','Modonpur Bus Stop',11,23.6906,90.5465),('BUS-F','Mouchak Road',8,23.6888,90.4969),('BUS-F','Rayerbag Bus Stop',3,23.6994,90.4571),('BUS-F','Saddam Market Bus Stop, Tushar Dhara Avenue Road',5,23.6930,90.4730),('BUS-F','Sanarpar Bus Stop',7,23.6948,90.4902),('BUS-F','Shonir Akhra Bus Stop',2,23.7029,90.4504),('BUS-F','Signboard Bus Stop',6,23.6937,90.4808),('BUS-F','Sonargaon',12,23.6366,90.5947),('BUS-G','Abdullahpur',15,23.8798,90.4011),('BUS-G','Ajampur',13,23.8684,90.4004),('BUS-G','Banani',5,23.7940,90.4043),('BUS-G','Bijoy Sarani',2,23.7648,90.3855),('BUS-G','Bishwaroad',8,23.8214,90.4185),('BUS-G','Board Bazar, Tongi',18,23.9453,90.3827),('BUS-G','Borobari Bus Stop',21,23.9347,90.3868),('BUS-G','College Gate, Uttara',17,23.9088,90.3981),('BUS-G','Farmgate',1,23.7573,90.3900),('BUS-G','Gazipur Chowrasta',20,23.9990,90.4198),('BUS-G','House Building',14,23.8737,90.4007),('BUS-G','Jahangir Gate',3,23.7754,90.3899),('BUS-G','Jasimuddin',11,23.8609,90.4002),('BUS-G','Khilkhet',9,23.8311,90.4243),('BUS-G','Malek Bari',22,23.9662,90.3801),('BUS-G','MES',6,23.8161,90.4053),('BUS-G','Mohakhali',4,23.7782,90.3977),('BUS-G','Rajlakkhi',12,23.8638,90.4002),('BUS-G','Shahjalal International Airport',10,23.8466,90.4026),('BUS-G','Sheora',7,23.8191,90.4150),('BUS-G','Shibbari',19,23.9968,90.4170),('BUS-G','Station Road Bus Stop, Tongi',16,23.8926,90.4019),('BUS-G','Tongi Bazar',23,23.8842,90.4005),('BUS-H','Arambagh',6,23.7315,90.4209),('BUS-H','Kamlapur Railway Station',5,23.7321,90.4254),('BUS-H','Malibagh Rail Gate Bus Stop',3,23.7501,90.4130),('BUS-H','Mouchak, Malibagh',2,23.7456,90.4120),('BUS-H','Pirjongi Mazar',7,23.7364,90.4234),('BUS-H','Rajarbagh',4,23.7412,90.4155),('BUS-H','Wirless Railgate Bara Moghbazar',1,23.7499,90.4082),('BUS-I','Chittagong Road Bus Stop',1,23.6979,90.5097),('BUS-I','IET School Bus Stop',2,23.6349,90.5117),('BUS-J','Bashabo, Dhaka',2,23.7426,90.4308),('BUS-J','Khilgaon Rail Gate Staff Quarter Jame Masjid',3,23.7438,90.4269),('BUS-J','Maniknagar, Dhaka',4,23.7247,90.4343),('BUS-J','Mugdapara Bus Stop',1,23.7312,90.4286),('BUS-K','City Hospital Road, Lalmatia',9,23.7541,90.3655),('BUS-K','Dhaka Residential School and College',2,23.7658,90.3699),('BUS-K','Dhanmondi-15',5,23.7475,90.3703),('BUS-K','Lalmatia',3,23.7554,90.3690),('BUS-K','Mohammadpur Town Hall',12,23.7596,90.3658),('BUS-K','Moitree Counter',1,23.7581,90.3631),('BUS-K','Nurjahan Road',10,23.7604,90.3618),('BUS-K','Salimullah Road',11,23.7605,90.3635),('BUS-K','Shankar Bus Stop',8,23.7507,90.3684),('BUS-K','Star Kabab, 9/A Dhanmondi Lake Road',7,23.7475,90.3703),('BUS-K','State University of Bangladesh',4,23.7514,90.3674),('BUS-K','Zigatola Bus stand',6,23.7385,90.3761),('BUS-L','Dayaganj Mor',3,23.7069,90.4237),('BUS-L','Dholaipar Mor',5,23.7027,90.4352),('BUS-L','Jurain, Dhaka',7,23.6883,90.4432),('BUS-L','Mir Hazir Bagh Bus Stop',4,23.7059,90.4312),('BUS-L','Muradpur CNG Station',6,23.6927,90.4443),('BUS-L','Postagola Cantonment',8,23.6894,90.4288),('BUS-L','Salauddin Bhaban, House No. 44/A',1,23.7170,90.4201),('BUS-L','Tikatuli Flyover Connection Lane',2,23.7203,90.4225),('BUS-M','Hazipara Petrol Pump',3,23.7571,90.4172),('BUS-M','Khilgaon Policefari',1,23.7463,90.4261),('BUS-M','Malibagh Community Center',2,23.7496,90.4163),('BUS-M','Rampura Bazar',4,23.7604,90.4186),('BUS-M','Rampura TV Center',5,23.7652,90.4190);
/*!40000 ALTER TABLE `businfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downtrip`
--

DROP TABLE IF EXISTS `downtrip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downtrip` (
  `busid` varchar(255) NOT NULL,
  `schedule` time NOT NULL,
  PRIMARY KEY (`busid`,`schedule`),
  CONSTRAINT `downtrip_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `busid` (`busid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downtrip`
--

LOCK TABLES `downtrip` WRITE;
/*!40000 ALTER TABLE `downtrip` DISABLE KEYS */;
INSERT INTO `downtrip` VALUES ('BUS-A','13:05:00'),('BUS-A','14:30:00'),('BUS-A','16:05:00'),('BUS-A','17:10:00'),('BUS-B','12:20:00'),('BUS-B','13:10:00'),('BUS-B','14:20:00'),('BUS-B','15:30:00'),('BUS-B','16:30:00'),('BUS-B','17:30:00'),('BUS-C','12:30:00'),('BUS-C','13:15:00'),('BUS-C','14:10:00'),('BUS-C','15:20:00'),('BUS-C','16:30:00'),('BUS-C','17:00:00'),('BUS-C','17:30:00'),('BUS-D','13:10:00'),('BUS-D','16:10:00'),('BUS-D','17:05:00'),('BUS-E','13:10:00'),('BUS-E','15:10:00'),('BUS-E','17:10:00'),('BUS-F','13:15:00'),('BUS-F','14:30:00'),('BUS-F','16:10:00'),('BUS-F','17:05:00'),('BUS-F','17:10:00'),('BUS-G','12:10:00'),('BUS-G','13:00:00'),('BUS-G','13:10:00'),('BUS-G','13:50:00'),('BUS-G','14:20:00'),('BUS-G','15:30:00'),('BUS-G','16:15:00'),('BUS-G','17:00:00'),('BUS-G','17:30:00'),('BUS-H','12:30:00'),('BUS-H','13:45:00'),('BUS-H','15:10:00'),('BUS-H','16:10:00'),('BUS-H','17:10:00'),('BUS-I','13:10:00'),('BUS-I','15:10:00'),('BUS-I','17:05:00'),('BUS-I','17:15:00'),('BUS-J','12:05:00'),('BUS-J','13:30:00'),('BUS-J','14:20:00'),('BUS-J','15:40:00'),('BUS-J','16:30:00'),('BUS-J','17:20:00'),('BUS-K','12:15:00'),('BUS-K','13:30:00'),('BUS-K','14:30:00'),('BUS-K','15:30:00'),('BUS-K','16:30:00'),('BUS-K','17:00:00'),('BUS-K','17:30:00'),('BUS-L','12:10:00'),('BUS-L','13:10:00'),('BUS-L','14:10:00'),('BUS-L','15:10:00'),('BUS-L','16:10:00'),('BUS-L','17:10:00'),('BUS-M','12:15:00'),('BUS-M','13:30:00'),('BUS-M','14:35:00'),('BUS-M','15:45:00'),('BUS-M','17:10:00');
/*!40000 ALTER TABLE `downtrip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `busid` varchar(255) NOT NULL,
  `tarikh` date NOT NULL,
  `start_time` time NOT NULL,
  `updated_time` time NOT NULL,
  `latitude` decimal(8,4) NOT NULL,
  `longitude` decimal(8,4) NOT NULL,
  PRIMARY KEY (`busid`,`tarikh`,`start_time`,`updated_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagepath`
--

DROP TABLE IF EXISTS `imagepath`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagepath` (
  `busid` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`busid`),
  UNIQUE KEY `path` (`path`),
  CONSTRAINT `imagepath_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `busid` (`busid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagepath`
--

LOCK TABLES `imagepath` WRITE;
/*!40000 ALTER TABLE `imagepath` DISABLE KEYS */;
INSERT INTO `imagepath` VALUES ('BUS-A','images/download/1.jpg'),('BUS-J','images/download/10.jpg'),('BUS-K','images/download/11.jpg'),('BUS-L','images/download/12.jpg'),('BUS-M','images/download/13.jpg'),('BUS-B','images/download/2.jpg'),('BUS-C','images/download/3.jpg'),('BUS-D','images/download/4.jpg'),('BUS-E','images/download/5.jpg'),('BUS-F','images/download/6.jpg'),('BUS-G','images/download/7.jpg'),('BUS-H','images/download/8.jpg'),('BUS-I','images/download/9.jpg');
/*!40000 ALTER TABLE `imagepath` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uptrip`
--

DROP TABLE IF EXISTS `uptrip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uptrip` (
  `busid` varchar(255) NOT NULL,
  `schedule` time NOT NULL,
  PRIMARY KEY (`busid`,`schedule`),
  CONSTRAINT `uptrip_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `busid` (`busid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uptrip`
--

LOCK TABLES `uptrip` WRITE;
/*!40000 ALTER TABLE `uptrip` DISABLE KEYS */;
INSERT INTO `uptrip` VALUES ('BUS-A','06:50:00'),('BUS-A','07:50:00'),('BUS-A','08:50:00'),('BUS-B','06:35:00'),('BUS-B','06:50:00'),('BUS-B','07:30:00'),('BUS-B','08:00:00'),('BUS-B','09:00:00'),('BUS-B','09:45:00'),('BUS-C','06:50:00'),('BUS-C','07:30:00'),('BUS-C','08:30:00'),('BUS-C','09:50:00'),('BUS-D','06:45:00'),('BUS-D','07:45:00'),('BUS-D','08:40:00'),('BUS-E','06:20:00'),('BUS-E','07:00:00'),('BUS-E','08:00:00'),('BUS-F','06:40:00'),('BUS-F','07:10:00'),('BUS-F','07:40:00'),('BUS-F','08:00:00'),('BUS-F','09:00:00'),('BUS-F','10:00:00'),('BUS-G','05:55:00'),('BUS-G','06:20:00'),('BUS-G','06:30:00'),('BUS-G','07:00:00'),('BUS-G','07:30:00'),('BUS-G','08:30:00'),('BUS-G','09:30:00'),('BUS-G','09:35:00'),('BUS-G','10:00:00'),('BUS-H','07:00:00'),('BUS-H','08:00:00'),('BUS-H','08:50:00'),('BUS-H','09:50:00'),('BUS-I','06:35:00'),('BUS-I','07:15:00'),('BUS-I','08:00:00'),('BUS-I','08:35:00'),('BUS-J','07:20:00'),('BUS-J','08:15:00'),('BUS-J','09:00:00'),('BUS-J','10:00:00'),('BUS-K','07:00:00'),('BUS-K','07:30:00'),('BUS-K','08:00:00'),('BUS-K','08:30:00'),('BUS-K','09:00:00'),('BUS-K','10:00:00'),('BUS-L','07:00:00'),('BUS-L','08:00:00'),('BUS-L','09:00:00'),('BUS-M','07:00:00'),('BUS-M','07:50:00'),('BUS-M','08:40:00'),('BUS-M','10:00:00');
/*!40000 ALTER TABLE `uptrip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userinfo`
--

DROP TABLE IF EXISTS `userinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userinfo` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `busid` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userinfo`
--

/*LOCK TABLES `userinfo` WRITE;*/
/*!40000 ALTER TABLE `userinfo` DISABLE KEYS */;
/*INSERT INTO `userinfo` VALUES ('hashib','hashibmahmud92@gmail.com','asdf12','student','2018-19','BUS-A');*/
/*!40000 ALTER TABLE `userinfo` ENABLE KEYS */;
/*UNLOCK TABLES;*/
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-17 21:36:03
