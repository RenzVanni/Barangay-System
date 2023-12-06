# ABMS : MySQL database backup
#
# Generated: Wednesday 5. July 2023
# Hostname: localhost
# Database: brgyDb
# --------------------------------------------------------


#
# Delete any existing table `processed`
#

DROP TABLE IF EXISTS `processed`;


#
# Table structure of table `processed`
#



CREATE TABLE `processed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO processed VALUES("1","ascasc","ascascasc
asc");
INSERT INTO processed VALUES("2","ascasc","ascascasc
asc");
INSERT INTO processed VALUES("3","renz","barangay clearance");
INSERT INTO processed VALUES("4","yul","barangay certificate");
INSERT INTO processed VALUES("5","ziel","business permit");
INSERT INTO processed VALUES("6","jia","business permit");
INSERT INTO processed VALUES("7","renz","barangay clearance
");
INSERT INTO processed VALUES("8","renz","business clearance");



#
# Delete any existing table `requests`
#

DROP TABLE IF EXISTS `requests`;


#
# Table structure of table `requests`
#



CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO requests VALUES("25","jia","barangay clearance");
INSERT INTO requests VALUES("26","renz","barangay clearance
");



#
# Delete any existing table `tbl_users`
#

DROP TABLE IF EXISTS `tbl_users`;


#
# Table structure of table `tbl_users`
#



CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users VALUES("2","ziel","e379d2db261f2e3ceb1b768649056fae62a416d0","admin");
INSERT INTO tbl_users VALUES("3","jia","971587cf205954c87aa4343111264b303b15c442","admin");
INSERT INTO tbl_users VALUES("4","renz","79b969d8e91901ea6763ce55d60c2f5b987daa65","staff");
INSERT INTO tbl_users VALUES("5","yul","8b636e590355f16b2bf7347b7ea8d8d7c5126e15","user");



#
# Delete any existing table `tblbrgy_info`
#

DROP TABLE IF EXISTS `tblbrgy_info`;


#
# Table structure of table `tblbrgy_info`
#



CREATE TABLE `tblbrgy_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(100) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `brgy_name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `city_logo` varchar(100) DEFAULT NULL,
  `brgy_logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblbrgy_info VALUES("1","Samar1","POBLACION KALIBO","BRGY KALIBO AKLAN","0919-1234567","Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit.","09052021075440182970012_615550183178722_2776607156578360582_n.jpg","03052021033434brgy-logo.png","0905202107542630042021035316lgu-logo.png");



#
# Delete any existing table `tblchairmanship`
#

DROP TABLE IF EXISTS `tblchairmanship`;


#
# Table structure of table `tblchairmanship`
#



CREATE TABLE `tblchairmanship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblchairmanship VALUES("2","Presiding Officer");
INSERT INTO tblchairmanship VALUES("3","Committee on Appropriation");
INSERT INTO tblchairmanship VALUES("4","Committee on Peace & Order");
INSERT INTO tblchairmanship VALUES("5","Committee on Health");
INSERT INTO tblchairmanship VALUES("6","Committee on Education");
INSERT INTO tblchairmanship VALUES("7","Committee on Rules");
INSERT INTO tblchairmanship VALUES("8","Committee on Infra");
INSERT INTO tblchairmanship VALUES("9","Committee on Solid Waste");
INSERT INTO tblchairmanship VALUES("10","Committee on Sports");
INSERT INTO tblchairmanship VALUES("11","No Chairmanship");



#
# Delete any existing table `tblofficials`
#

DROP TABLE IF EXISTS `tblofficials`;


#
# Table structure of table `tblofficials`
#



CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblofficials VALUES("1","Peter Guevarra	","2","4","2021-04-29","2021-05-01","Active");
INSERT INTO tblofficials VALUES("4","Marlon A. Lorio","3","7","2021-04-03","2021-04-24","Active");
INSERT INTO tblofficials VALUES("5","GARRY A. RAFEL","4","8","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("6","TRILLION LOWRY	","5","9","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("7","MELANIE M. ELBOR	","6","10","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("8","ERLINDA V. VITUS	","7","11","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("9","JOEDAVINCE","8","12","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("10","ALEJANDRO A. CAGAMPANG	","9","13","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("11","JOSEPH P. PARDOS	","10","14","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("12","RUTH A. BACAG	","11","15","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("13","DIANNE A. CURRY	","11","16","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("14","renz","5","12","2023-05-31","2023-06-16","Inactive");
INSERT INTO tblofficials VALUES("15","jia shie","6","13","2023-07-04","2023-07-28","Inactive");
INSERT INTO tblofficials VALUES("16","kivy","7","7","2023-07-20","2023-07-28","Active");
INSERT INTO tblofficials VALUES("17","ziel","9","13","2023-07-04","2023-07-27","Inactive");



#
# Delete any existing table `tblposition`
#

DROP TABLE IF EXISTS `tblposition`;


#
# Table structure of table `tblposition`
#



CREATE TABLE `tblposition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblposition VALUES("4","Captain","1");
INSERT INTO tblposition VALUES("7","Councilor 1","2");
INSERT INTO tblposition VALUES("8","Councilor 2","3");
INSERT INTO tblposition VALUES("9","Councilor 3","4");
INSERT INTO tblposition VALUES("10","Councilor 4","5");
INSERT INTO tblposition VALUES("11","Councilor 5","6");
INSERT INTO tblposition VALUES("12","Councilor 6","7");
INSERT INTO tblposition VALUES("13","Councilor 7","8");
INSERT INTO tblposition VALUES("14","SK Chairman","9");
INSERT INTO tblposition VALUES("15","Secretary","10");
INSERT INTO tblposition VALUES("16","Treasurer","11");



#
# Delete any existing table `tblresidents`
#

DROP TABLE IF EXISTS `tblresidents`;


#
# Table structure of table `tblresidents`
#



CREATE TABLE `tblresidents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `national_id` int(100) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `voter_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblresidents VALUES("1","renz vanni ","234238734","renzyy","2023-07-06","22","Single","Male","tirona","No");
INSERT INTO tblresidents VALUES("2","jia shie","2147483647","jia","2021-07-21","22","Single","Female","tirona","Yes");
INSERT INTO tblresidents VALUES("4","kivier","214748364","casdas","2023-07-14","324","Single","Male","qadvs","No");
INSERT INTO tblresidents VALUES("6","yul","1298734561","yully","2020-07-21","22","Single","Male","tirona","Yes");
INSERT INTO tblresidents VALUES("15","kivy","24234235","kiv","2020-07-27","22","Married","Female","tirona","No");
INSERT INTO tblresidents VALUES("16","sdcsd","0","ascasc","2019-07-16","23","Single","Male","tirona","No");

