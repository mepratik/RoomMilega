-- MySQL dump 10.13  Distrib 5.5.33, for Linux (x86_64)
--
-- Host: localhost    Database: geusocie_rooms
-- ------------------------------------------------------
-- Server version	5.5.33-31.1

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
-- Table structure for table `room_details`
--

DROP TABLE IF EXISTS `room_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_details` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `accomodation_type` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `rent` bigint(6) NOT NULL,
  `num_rooms` int(3) NOT NULL,
  `max_beds_per_room` int(3) DEFAULT NULL,
  `beds_provided` varchar(1) NOT NULL,
  `bathroom_type` varchar(20) NOT NULL,
  `toilet_type` varchar(15) NOT NULL,
  `kitchen_available` varchar(1) DEFAULT NULL,
  `jet_pump` varchar(1) NOT NULL,
  `available_for` varchar(10) DEFAULT NULL,
  `garage` tinyint(1) NOT NULL,
  `hot_water` tinyint(1) NOT NULL,
  `electricity_charge` varchar(30) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `gym` varchar(1) DEFAULT NULL,
  `laundary` char(1) DEFAULT NULL,
  `food_provided` char(1) DEFAULT NULL,
  `news_paper` char(1) DEFAULT NULL,
  `tv` char(1) DEFAULT NULL,
  `guest_room` char(1) DEFAULT NULL,
  `ac_rooms` char(1) DEFAULT NULL,
  `security_avail` tinyint(1) NOT NULL,
  `swimming_pool` char(1) DEFAULT NULL,
  `electricity24` tinyint(1) NOT NULL,
  `wi_fi` char(1) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`rid`),
  KEY `uid` (`uid`),
  CONSTRAINT `room_details_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_details`
--

LOCK TABLES `room_details` WRITE;
/*!40000 ALTER TABLE `room_details` DISABLE KEYS */;
INSERT INTO `room_details` (`rid`, `uid`, `accomodation_type`, `location`, `rent`, `num_rooms`, `max_beds_per_room`, `beds_provided`, `bathroom_type`, `toilet_type`, `kitchen_available`, `jet_pump`, `available_for`, `garage`, `hot_water`, `electricity_charge`, `state`, `city`, `gym`, `laundary`, `food_provided`, `news_paper`, `tv`, `guest_room`, `ac_rooms`, `security_avail`, `swimming_pool`, `electricity24`, `wi_fi`, `notes`, `is_available`) VALUES (6,1,'PG','Society Area, Clement Town',10000,3,2,'1','Attached','Western','1','1','Boys',1,0,'1','Uttarakhand','Dehradun',NULL,NULL,'',NULL,NULL,NULL,NULL,0,NULL,0,NULL,'',1),(7,1,'Flat','Rajendra nagar',4000,4,2,'0','Common','Indian','1','1','Family',1,0,'0','Bihar','Motihari,east champaran',NULL,NULL,'',NULL,NULL,NULL,NULL,0,NULL,0,NULL,'well spacious rooms and a beautiful garden.',1);
/*!40000 ALTER TABLE `room_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` char(25) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `age` int(2) NOT NULL,
  `email` varchar(25) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `gender` char(8) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`uid`, `f_name`, `l_name`, `c_address`, `mobile_no`, `occupation`, `uname`, `password`, `age`, `email`, `p_address`, `gender`) VALUES (1,'Nishkarsh','Sharma','geu, doon','7409359161','student','nishkarsh4','something',20,'nishkarsh4@gmail.com','33, street 1','m'),(2,'Raushan','Kumar','GEU, dehradun','9001060901','student','raushan','raushan',20,'raushankr28@gmail.com','Motihari, bihar','m'),(3,'Anubhav','Srivastava','asasa','9410124603','developer','anubhav.v.sri','anubhav12345',0,'anubhav.v.sri@gmail.com','nmbmb','m'),(4,'anubhav','sri','jjj','9158383694','Dev','anubhav.v.sri','1234',24,'anubhav.v.sri@gmail.com','jjjj','m');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'geusocie_rooms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-01 16:31:52
