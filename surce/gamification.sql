# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.27)
# Database: gamification
# Generation Time: 2013-10-04 18:32:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table achievements
# ------------------------------------------------------------

CREATE TABLE `achievements` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `achievements` WRITE;
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;

INSERT INTO `achievements` (`ID`, `description`)
VALUES
	(1,'Won 1 Game'),
	(2,'Won 10 Games'),
	(3,'Won 25 Games'),
	(4,'Won 50 Games'),
	(5,'Won 100 Games'),
	(6,'Won 250 Games'),
	(7,'Beat the game in under 8 minutes'),
	(8,'Beat the game in under 6 minutes'),
	(9,'Beat the game in under 4 minutes'),
	(10,'Beat the game in under 2 minutes'),
	(11,'Beat the game in under 1 minute');

/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table messages
# ------------------------------------------------------------

CREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;

INSERT INTO `messages` (`id`, `message`)
VALUES
	(0,'hey'),
	(1,'win win'),
	(2,'don\'t talk to me');

/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table usermessages
# ------------------------------------------------------------

CREATE TABLE `usermessages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usersender` varchar(40) NOT NULL DEFAULT '',
  `userrceives` varchar(40) NOT NULL DEFAULT '',
  `nummessagge` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `usermessages` WRITE;
/*!40000 ALTER TABLE `usermessages` DISABLE KEYS */;

INSERT INTO `usermessages` (`id`, `usersender`, `userrceives`, `nummessagge`)
VALUES
	(1,'cool%20yoni','Cool',0),
	(2,'cool%20yoni','smilk',0),
	(3,'cool%20yoni','smilk',0);

/*!40000 ALTER TABLE `usermessages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(8) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `besttime` int(11) DEFAULT '0',
  `wongame` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '1',
  `token` int(11) DEFAULT '0',
  `badges` varchar(100) DEFAULT '0',
  PRIMARY KEY (`uname`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`ID`, `password`, `uname`, `fname`, `lname`, `besttime`, `wongame`, `level`, `token`, `badges`)
VALUES
	(1,'123456','Cool-Yoni','Yoni','Zilberman',0,83,1,290416,'0,1,2,3,4,7,11'),
	(2,'1234','smilk','shmuel','melamed',2,22,1,168368,'0,1,2,3,4,5,6,7,8,9,10,11'),
	(3,'1234','test1','tes1','test1',200,11,1,9952,'0,1,2,7'),
	(4,'1234','test2','test2','test2',201,4,1,19920,'0,1,7,8'),
	(5,'1234','test3','test3','test3',3,8,1,69296,'0,1,7,8,11'),
	(6,'12345','yoo','rii','fdf',400,2,1,0,'0'),
	(7,'123456','VIP','Eyal','Nous',2,13,1,113984,'0,1,2,3,10,11'),
	(8,'123456','nufar','nofar','shaked',0,15,1,148256,'0,1,2,11');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
