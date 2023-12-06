# ABMS : MySQL database backup
#
# Generated: Wednesday 9. August 2023
# Hostname: localhost
# Database: brgydb
# --------------------------------------------------------


#
# Delete any existing table `brgy_information`
#

DROP TABLE IF EXISTS `brgy_information`;


#
# Table structure of table `brgy_information`
#



CREATE TABLE `brgy_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(255) NOT NULL,
  `brgy_name` varchar(255) NOT NULL,
  `municipality_logo` text NOT NULL,
  `town_name` varchar(255) NOT NULL,
  `tel_no` varchar(255) NOT NULL,
  `brgy_logo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO brgy_information VALUES("1","ggg","hhhh","07082023151307img2.png","lll","ooo","07082023151307img1.png");



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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
INSERT INTO processed VALUES("9","jia","barangay clearance");



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
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO requests VALUES("26","renz","barangay clearance
","");
INSERT INTO requests VALUES("27","yul","isang okinawa","");
INSERT INTO requests VALUES("28","wick","ascascascl","");



#
# Delete any existing table `tbl_brgyclearance`
#

DROP TABLE IF EXISTS `tbl_brgyclearance`;


#
# Table structure of table `tbl_brgyclearance`
#



CREATE TABLE `tbl_brgyclearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date-of-birth` date NOT NULL,
  `place-of-birth` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `date-issue` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_brgyclearance VALUES("1","sdvsdv","sdvsdv","2023-08-11","ascasc","sascas","2023-08-11");
INSERT INTO tbl_brgyclearance VALUES("2","ascasc","ascasc","2023-08-08","ascasc","ascasc","2023-08-24");
INSERT INTO tbl_brgyclearance VALUES("3","acasc","ascasc","2023-08-22","ascasc","casasc","2023-08-30");
INSERT INTO tbl_brgyclearance VALUES("4","ascasc","saca","2023-08-15","ascasc","sacas","2023-08-23");



#
# Delete any existing table `tbl_businessclearance`
#

DROP TABLE IF EXISTS `tbl_businessclearance`;


#
# Table structure of table `tbl_businessclearance`
#



CREATE TABLE `tbl_businessclearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business-name` varchar(255) NOT NULL,
  `business-owner-name` varchar(255) NOT NULL,
  `business-address` varchar(255) NOT NULL,
  `date-applied` date NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_businessclearance VALUES("1","gvvbv","kjbjnblj","jkbkjb","2023-08-17",".kk;n;ksa");
INSERT INTO tbl_businessclearance VALUES("2","sdvsdv","sdvsdv","dsvsdv","2023-08-29","sdvsd");
INSERT INTO tbl_businessclearance VALUES("4","ascac","sacasc","csaca","2023-08-22","ascasc");
INSERT INTO tbl_businessclearance VALUES("5","asasc","cascasc","sacasc","2023-08-30","aas");
INSERT INTO tbl_businessclearance VALUES("6","ascasc","ascasc","ascasc","2023-08-31","ascasc");



#
# Delete any existing table `tbl_certofindigency`
#

DROP TABLE IF EXISTS `tbl_certofindigency`;


#
# Table structure of table `tbl_certofindigency`
#



CREATE TABLE `tbl_certofindigency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name-of-applicant` varchar(255) NOT NULL,
  `name-of-requestor` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `date-requested` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_certofindigency VALUES("2","ascasc","","ascasc","Self","ascac","0000-00-00");
INSERT INTO tbl_certofindigency VALUES("3","ascasc","ascasc","acasc","Someone","ascasc","0000-00-00");
INSERT INTO tbl_certofindigency VALUES("4","ascasc","","sacasc","Self","sacasc","0000-00-00");
INSERT INTO tbl_certofindigency VALUES("5","sacasc","acasc","ascasc","Someone","ascasc","0000-00-00");



#
# Delete any existing table `tbl_certoflbr`
#

DROP TABLE IF EXISTS `tbl_certoflbr`;


#
# Table structure of table `tbl_certoflbr`
#



CREATE TABLE `tbl_certoflbr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name-of-applicant` varchar(255) NOT NULL,
  `name-of-requestor` varchar(255) NOT NULL,
  `name-of-parent` varchar(255) NOT NULL,
  `name-of-father` varchar(255) NOT NULL,
  `name-of-mother` varchar(255) NOT NULL,
  `mother-or-father` varchar(255) NOT NULL,
  `date-of-birth` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `date-requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documentFor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_certoflbr VALUES("2","sacasc","","","ascasc","scacasc","","2023-08-24","casc","0000-00-00 00:00:00","self");
INSERT INTO tbl_certoflbr VALUES("5","","mhvbkhbk","","",""," j lj ","2023-08-23","kvhkhb","0000-00-00 00:00:00","single parent");
INSERT INTO tbl_certoflbr VALUES("7","ascasc","","","sacasc","sacasc","","2023-08-23","ascasc","0000-00-00 00:00:00","self");
INSERT INTO tbl_certoflbr VALUES("8","","ascasc","","","","sacasc","2023-08-23","ascasc","0000-00-00 00:00:00","single parent");
INSERT INTO tbl_certoflbr VALUES("10","","sacasc","","sacasc","ascasc","","2023-08-30","ascasc","0000-00-00 00:00:00","children");
INSERT INTO tbl_certoflbr VALUES("11","ascac","","","scacasc","sacasc","","2023-08-24","ascasc","0000-00-00 00:00:00","self");
INSERT INTO tbl_certoflbr VALUES("12","ascac","","","ascasc","ascac","","2023-08-31","ascasc","2023-08-07 22:03:43","self");



#
# Delete any existing table `tbl_ecertificate`
#

DROP TABLE IF EXISTS `tbl_ecertificate`;


#
# Table structure of table `tbl_ecertificate`
#



CREATE TABLE `tbl_ecertificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name-of-applicant` varchar(255) NOT NULL,
  `name-of-requestor` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `date-requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_ecertificate VALUES("4","ascasc","","ascasc","Self","ascasc","2023-08-03 23:08:12");
INSERT INTO tbl_ecertificate VALUES("5","ascasc","ascasc","scacac","Someone","ascasc","2023-08-03 23:08:20");
INSERT INTO tbl_ecertificate VALUES("6","zxczxcas","","wewr","Self","sacasc","2023-08-03 23:13:30");
INSERT INTO tbl_ecertificate VALUES("7","scasc","sacasc","sacasc","Someone","sdvasv","2023-08-03 23:13:38");
INSERT INTO tbl_ecertificate VALUES("8","asasc","","ascasc","Self","ascasc","2023-08-03 23:35:55");
INSERT INTO tbl_ecertificate VALUES("9","acasc","asasc","ascasc","Someone","ascac","2023-08-03 23:36:02");



#
# Delete any existing table `tbl_idform`
#

DROP TABLE IF EXISTS `tbl_idform`;


#
# Table structure of table `tbl_idform`
#



CREATE TABLE `tbl_idform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `date-requested` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_idform VALUES("1","boooo","self","ascascasc","2023-08-10");
INSERT INTO tbl_idform VALUES("2","sdvsdvasc","forselft","ascasc","2023-08-16");
INSERT INTO tbl_idform VALUES("3","ascsac","forsomeone","ascasc","2023-08-23");
INSERT INTO tbl_idform VALUES("4","ascasc","forselft","ascasc","2023-08-17");



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
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users VALUES("2","ziel","e379d2db261f2e3ceb1b768649056fae62a416d0","admin","2023-07-14 23:54:31");
INSERT INTO tbl_users VALUES("4","renz","79b969d8e91901ea6763ce55d60c2f5b987daa65","staff","2023-07-14 23:54:31");
INSERT INTO tbl_users VALUES("6","perf","f47039fbb1f7f212938b642944291fc3b2e603c6","staff","2023-07-15 00:05:30");
INSERT INTO tbl_users VALUES("8","wick","eef9fbaa5d8f54bb7a8a57be0e112f866b79dcd2","user","2023-07-22 17:12:54");
INSERT INTO tbl_users VALUES("9","rodd","915ac2e8b700fb6b69ce77d21afcb96a4689e5ab","staff","2023-07-22 18:53:44");
INSERT INTO tbl_users VALUES("13","bro","36dc3e31538a18b606f20f185133da3db31c8aa1","user","2023-07-29 01:09:06");
INSERT INTO tbl_users VALUES("14","pal","e888f350fa7bc553d2485760cd0f1a1eb66006da","user","2023-07-29 01:16:12");
INSERT INTO tbl_users VALUES("16","qul","9c11819c2a0c1607d1be80eec784c68c6647bb57","admin","2023-08-09 22:18:18");



#
# Delete any existing table `tblawareness`
#

DROP TABLE IF EXISTS `tblawareness`;


#
# Table structure of table `tblawareness`
#



CREATE TABLE `tblawareness` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblawareness VALUES("1","perf","2023-07-28","00:31:00","dfcbdf","rawr","active");
INSERT INTO tblawareness VALUES("2","yul","2023-07-17","14:43:21","manila","light","schedule");
INSERT INTO tblawareness VALUES("6","boo","2023-07-24","02:23:42","etivac","rawr","schedule");
INSERT INTO tblawareness VALUES("7","keshi","2023-07-26","00:32:04","unknown","skeleton","schedule");



#
# Delete any existing table `tblblotter`
#

DROP TABLE IF EXISTS `tblblotter`;


#
# Table structure of table `tblblotter`
#



CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant` varchar(100) DEFAULT NULL,
  `respondent` varchar(100) DEFAULT NULL,
  `victim` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tblblotter VALUES("16","tito boy","Maria Advitos","Tiboy","amicable","Brgy1","2020-11-06","23:35:00","  Di alam ano pinag awayan  ","active");
INSERT INTO tblblotter VALUES("28","ascasc","asca","sacasc","amicable","acascasc","2023-07-04","02:02:00","di nag bayad ng...","settled");
INSERT INTO tblblotter VALUES("29","zeil","perf","beef","incident","etivac","2022-02-04","03:44:05","rawr","settled");
INSERT INTO tblblotter VALUES("30","perf","arff","boo","incident","pitx","2023-07-28","00:33:42","food","settled");
INSERT INTO tblblotter VALUES("32","ascasc","sdcasc","asasc","amicable","ascasca","2023-07-04","21:31:00","ascascasc","scheduled");
INSERT INTO tblblotter VALUES("34","zzzzz","ascasc","ascasc","amicable","ascasc","2023-08-16","00:32:00","ascasc","active");



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
# Delete any existing table `tblcomplain`
#

DROP TABLE IF EXISTS `tblcomplain`;


#
# Table structure of table `tblcomplain`
#



CREATE TABLE `tblcomplain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblcomplain VALUES("1","sauce","2023-07-24","sacscas","00:01:00","asdasd","schedule");
INSERT INTO tblcomplain VALUES("2","perf","2023-07-18","manila","14:04:01","piattos","done");
INSERT INTO tblcomplain VALUES("3","yul","2023-07-17","ascasvasvSDV","12:31:00","AVASVAV","done");
INSERT INTO tblcomplain VALUES("5","arff","2023-07-19","ewan","00:32:34","aw aw aww","schedule");
INSERT INTO tblcomplain VALUES("6","boo","2023-07-25","","21:32:00","aca","active");
INSERT INTO tblcomplain VALUES("7","scooby","2023-12-28","laguna","00:42:34","awww","schedule");
INSERT INTO tblcomplain VALUES("9","asdasd","2023-07-18","ascasc","12:32:00","ascasc","active");
INSERT INTO tblcomplain VALUES("10","ascac","2023-07-18","ascasca","12:31:00","sacasc","active");



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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblofficials VALUES("1","Kivier","2","4","2021-04-29","2021-05-01","Inactive");
INSERT INTO tblofficials VALUES("5","okie","5","9","2021-04-22","2021-04-28","Inactive");
INSERT INTO tblofficials VALUES("7","MELANIE M. ELBOR	","6","10","2021-04-03","2021-04-03","Inactive");
INSERT INTO tblofficials VALUES("8","ERLINDA V. VITUS	","7","11","2021-04-03","2021-04-03","Inactive");
INSERT INTO tblofficials VALUES("9","JOEDAVINCEsad","8","12","2021-04-03","2021-04-03","Active");
INSERT INTO tblofficials VALUES("10","ALEJANDRO A. CAGAMPANG	","9","13","2021-04-03","2021-04-03","Inactive");
INSERT INTO tblofficials VALUES("11","JOSEPH P. PARDOS	","10","14","2021-04-03","2021-04-03","Inactive");
INSERT INTO tblofficials VALUES("12","RUTH A. BACAG	","11","15","2021-04-03","2021-04-03","Inactive");
INSERT INTO tblofficials VALUES("17","ziel","9","13","2023-07-04","2023-07-27","Inactive");
INSERT INTO tblofficials VALUES("19","ascasc","6","14","2023-07-20","2023-08-03","Inactive");
INSERT INTO tblofficials VALUES("20","ascasc","4","11","2023-07-26","2023-07-28","Inactive");
INSERT INTO tblofficials VALUES("21","asdsa. sa.","11","16","2023-07-31","2023-08-04","Inactive");
INSERT INTO tblofficials VALUES("22","asdasd","10","16","2023-07-17","2023-08-04","Inactive");
INSERT INTO tblofficials VALUES("23","khasvjhcvajsvcasd","9","15","2023-07-12","2023-07-28","Inactive");
INSERT INTO tblofficials VALUES("24","lllll","6","16","2023-07-10","2023-07-14","Active");
INSERT INTO tblofficials VALUES("25","boooo","9","16","2023-07-10","2023-07-27","Inactive");
INSERT INTO tblofficials VALUES("26","acasc","7","16","2023-07-12","2023-07-14","Active");



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
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `house-no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date-of-birth` date NOT NULL,
  `place-of-birth` varchar(255) NOT NULL,
  `civil-status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact-no` varchar(255) NOT NULL,
  `voter-status` varchar(255) NOT NULL,
  `identified` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `household-no` varchar(255) NOT NULL,
  `osy` varchar(255) NOT NULL DEFAULT 'N/A',
  `pwd` varchar(255) NOT NULL,
  `mother-firstname` varchar(255) NOT NULL,
  `mother-middlename` varchar(255) NOT NULL,
  `mother-lastname` varchar(255) NOT NULL,
  `mother-age` int(255) NOT NULL,
  `mother-house-no` varchar(255) NOT NULL,
  `mother-street` varchar(255) NOT NULL,
  `mother-subdivision` varchar(255) NOT NULL,
  `mother-household-head` varchar(255) NOT NULL,
  `father-firstname` varchar(255) NOT NULL,
  `father-lastname` varchar(255) NOT NULL,
  `father-middlename` varchar(255) NOT NULL,
  `father-age` int(255) NOT NULL,
  `father-house-no` varchar(255) NOT NULL,
  `father-street` varchar(255) NOT NULL,
  `father-subdivision` varchar(255) NOT NULL,
  `father-household-head` varchar(255) NOT NULL DEFAULT 'N/A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblresidents VALUES("127","aboo","boo","boo","12","Male","12","sacasc","sacas","2023-07-11","aascasc","Single","ascasc","doraemon@gmail.com","2341","voter","Positive","Student","sacasc","23","","PWD","hchcgj","aasc","sac","21","23","ascasc","sacas","household-head","sacac","wer","sdvsdv","245345","123","asca","scas","");
INSERT INTO tblresidents VALUES("128","jia","shie","park","22","Female","453","tirona","mendez","2023-07-27","cavite","Single","gamer","jia@gmail.com","567568","non-voter","Positive","Senior Citizen","filipino","7897807","OSY","","sd s","sdf","sdv","55","123","sdvsdv","svsd","","sdvsdv","bedbv","gwwe","54","435","sdsvs","fbs","household-head");
INSERT INTO tblresidents VALUES("130","sacsczxc","sdvxcv","vxzv","34","Male","3423","sacasc","saas","2023-08-14","ascasc","Single","ascasc","ascasc@gmail.com","234234","voter","Positive","Student","ascac","123123","OSY","","ascasc","ascascsd","ascasc","23","234","scac","sdcdsa","","saacsa","sdcsdc","sdcsdc","234","234","asca","sdc","");

