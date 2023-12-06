# ABMS : MySQL database backup
#
# Generated: Thursday 16. November 2023
# Hostname: localhost
# Database: brgydb
# --------------------------------------------------------


#
# Delete any existing table `awareness_archive`
#

DROP TABLE IF EXISTS `awareness_archive`;


#
# Table structure of table `awareness_archive`
#



CREATE TABLE `awareness_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO awareness_archive VALUES("1","keshi","2023-07-26","00:32:04","unknown","skeleton","settled");
INSERT INTO awareness_archive VALUES("2","boo","2023-07-24","02:23:42","etivac","rawr","settled");



#
# Delete any existing table `blotter_archive`
#

DROP TABLE IF EXISTS `blotter_archive`;


#
# Table structure of table `blotter_archive`
#



CREATE TABLE `blotter_archive` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO blotter_archive VALUES("1","perf","arff","boo","incident","pitx","2023-07-28","00:33:42","food","settled");
INSERT INTO blotter_archive VALUES("2","zeil","perf","beef","incident","etivac","2022-02-04","03:44:05","rawr","settled");
INSERT INTO blotter_archive VALUES("3","ascasc","asca","sacasc","amicable","acascasc","2023-07-04","02:02:00","di nag bayad ng...","settled");



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
  `header_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address_no` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_subdi` varchar(255) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `historical_background` text NOT NULL,
  `historicalBackground_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO brgy_information VALUES("1","Cavite","Barangay Zone IV","☆.jpeg","Dasmarinas","","eunchae-_le-sserafim.jpeg","perci.jpg","barangayhall.zone4@gmail.com","(046) 471 1247 ","001","bunji","jelly","08:00:00","17:00:00","“To establish a vibrant community, dedicated towards a Harmonious, Peace-Loving, Economically stable citizenry, with spiritual guidance of the Almighty God”. ","“A Community that maintains Peace and Order, pursue the ideals of a free and democratic society, implement basic health services, protect the children, develop and educate the youth, respect the rights of men and women, take good care of the elders, from the grass-roots to the highest level of our society”. """"""""""""""""""""""""""""""""","Zone IV, formerly Poblacion, is a barangay in the city of Dasmariñas, in the province of Cavite. Its population as determined by the 2020 Census was 3,770. This represented 0.54% of the total population of Dasmariñas. The household population of Zone IV in the 2015 Census was 3,224 broken down into 901 households or an average of 3.58 members per household.According to the 2015 Census, the age group with the highest population in Zone IV is 20 to 24, with 375 individuals. Conversely, the age group with the lowest population is 80 and over, with 21 individuals.Combining age groups together, those aged 14 and below, consisting of the young dependent population which include infants/babies, children and young adolescents/teenagers, make up an aggregate of 23.02% (753). Those aged 15 up to 64, roughly, the economically active population and actual or potential members of the work force, constitute a total of 72.82% (2,382). Finally, old dependent population consisting of the senior citizens, those aged 65 and over, total 4.16% (136) in all. The computed Age Dependency Ratios mean that among the population of Zone IV, there are 32 youth dependents to every 100 of the working age population; there are 6 aged/senior citizens to every 100 of the working population; and overall, there are 37 dependents (young and old-age) to every 100 of the working population. The median age of 28 indicates that half of the entire population of Zone IV are aged less than 28 and the other half are over the age of 28. ","wallpaperflare.com_wallpaper (6).jpg");



#
# Delete any existing table `complain_archive`
#

DROP TABLE IF EXISTS `complain_archive`;


#
# Table structure of table `complain_archive`
#



CREATE TABLE `complain_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO complain_archive VALUES("1","ascac","2023-07-18","ascasca","12:31:00","sacasc","settled");
INSERT INTO complain_archive VALUES("2","perf","2023-07-18","manila","14:04:01","piattos","settled");
INSERT INTO complain_archive VALUES("3","yul","2023-07-17","ascasvasvSDV","12:31:00","AVASVAV","settled");
INSERT INTO complain_archive VALUES("4","asdasd","2023-07-18","ascasc","12:32:00","ascasc","settled");
INSERT INTO complain_archive VALUES("5","asdasd","2023-07-18","ascasc","12:32:00","ascasc","settled");
INSERT INTO complain_archive VALUES("6","scooby","2023-12-28","laguna","00:42:34","awww","settled");



#
# Delete any existing table `del_awareness_archive`
#

DROP TABLE IF EXISTS `del_awareness_archive`;


#
# Table structure of table `del_awareness_archive`
#



CREATE TABLE `del_awareness_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_awareness_archive VALUES("1","keshi","2023-07-26","00:32:04","unknown","skeleton","schedule");
INSERT INTO del_awareness_archive VALUES("2","perf","2023-07-28","00:31:00","dfcbdf","rawr","active");



#
# Delete any existing table `del_blotter_archive`
#

DROP TABLE IF EXISTS `del_blotter_archive`;


#
# Table structure of table `del_blotter_archive`
#



CREATE TABLE `del_blotter_archive` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO del_blotter_archive VALUES("1","ascasc","sdcasc","asasc","amicable","ascasca","2023-07-04","21:31:00","ascascasc","scheduled");
INSERT INTO del_blotter_archive VALUES("2","tito boy","Maria Advitos","Tiboy","amicable","Brgy1","2020-11-06","23:35:00","  Di alam ano pinag awayan  ","active");



#
# Delete any existing table `del_brgyclearance_archive`
#

DROP TABLE IF EXISTS `del_brgyclearance_archive`;


#
# Table structure of table `del_brgyclearance_archive`
#



CREATE TABLE `del_brgyclearance_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date-of-birth` date NOT NULL,
  `place-of-birth` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_brgyclearance_archive VALUES("1","GIN","FREAK","KITE","","","","","SAINT","MEAN","2012-10-18","CAVITE","","","2023-11-09 07:28:03");
INSERT INTO del_brgyclearance_archive VALUES("2","GIN","FREAK","KITE","","","","","SAINT","MEAN","2012-10-18","CAVITE","","delete","2023-11-09 07:31:27");
INSERT INTO del_brgyclearance_archive VALUES("3","GIN","FREAK","KITE","","","","","SAINT","MEAN","2012-10-18","CAVITE","","deleted","2023-11-09 23:15:07");
INSERT INTO del_brgyclearance_archive VALUES("4","GIN","FREAK","KITE","","","","","SAINT","MEAN","2012-10-18","CAVITE","","Cancel","2023-11-10 10:28:19");
INSERT INTO del_brgyclearance_archive VALUES("5","GIN","FREAK","KITE","","","","","SAINT","MEAN","2012-10-18","CAVITE","","Cancel","2023-11-13 00:05:13");



#
# Delete any existing table `del_businessclearance_archive`
#

DROP TABLE IF EXISTS `del_businessclearance_archive`;


#
# Table structure of table `del_businessclearance_archive`
#



CREATE TABLE `del_businessclearance_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business-name` varchar(255) NOT NULL,
  `business-owner-fname` varchar(255) NOT NULL,
  `business-owner-mname` varchar(255) NOT NULL,
  `business-owner-lname` varchar(255) NOT NULL,
  `business-address` varchar(255) NOT NULL,
  `date-applied` date NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_businessclearance_archive VALUES("1","gvvbv","kjbjnblj","","","jkbkjb","2023-08-17",".kk;n;ksa");
INSERT INTO del_businessclearance_archive VALUES("2","ascasc","ascasc","","","ascasc","2023-08-31","ascasc");
INSERT INTO del_businessclearance_archive VALUES("3","asasc","cascasc","","","sacasc","2023-08-30","aas");
INSERT INTO del_businessclearance_archive VALUES("4","","","","","","0000-00-00","sdvsd");
INSERT INTO del_businessclearance_archive VALUES("5","","","","","","0000-00-00","ascasc");



#
# Delete any existing table `del_certofindigency_archive`
#

DROP TABLE IF EXISTS `del_certofindigency_archive`;


#
# Table structure of table `del_certofindigency_archive`
#



CREATE TABLE `del_certofindigency_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_certofindigency_archive VALUES("1","GIN","FREAK","KITE","","","","003","SAINT","MEAN","Self","","pending","0000-00-00 00:00:00");
INSERT INTO del_certofindigency_archive VALUES("2","ascasc","","","","","","ascasc","","","Self","ascac","Cancel","0000-00-00 00:00:00");
INSERT INTO del_certofindigency_archive VALUES("3","ascasc","","","ascasc","","","acasc","","","Someone","ascasc","Cancel","0000-00-00 00:00:00");



#
# Delete any existing table `del_certoflbr_archive`
#

DROP TABLE IF EXISTS `del_certoflbr_archive`;


#
# Table structure of table `del_certoflbr_archive`
#



CREATE TABLE `del_certoflbr_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `parent_fname` varchar(255) NOT NULL,
  `parent_mname` varchar(255) NOT NULL,
  `parent_lname` varchar(255) NOT NULL,
  `father_fname` varchar(255) NOT NULL,
  `father_mname` varchar(255) NOT NULL,
  `father_lname` varchar(255) NOT NULL,
  `mother_fname` varchar(255) NOT NULL,
  `mother_mname` varchar(255) NOT NULL,
  `mother_lname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documentFor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_certoflbr_archive VALUES("1","","","","sacasc","","","","","","sacasc","","","ascasc","","","2023-08-30","ascasc","","","","0000-00-00 00:00:00","children");
INSERT INTO del_certoflbr_archive VALUES("2","","","","mhvbkhbk","","","","","","","","","","","","2023-08-23","kvhkhb","","","Cancel","0000-00-00 00:00:00","single parent");
INSERT INTO del_certoflbr_archive VALUES("3","ascasc","","","","","","","","","sacasc","","","sacasc","","","2023-08-23","ascasc","","","Cancel","0000-00-00 00:00:00","self");
INSERT INTO del_certoflbr_archive VALUES("4","zyra","kjbb","lnkln","","","","","","","zod","kjbjkb","jnjk","aisha","kjbb","lnl","2023-11-15","987987","kjkjb","kbkb","Cancel","2023-11-14 00:04:46","self");



#
# Delete any existing table `del_complain_archive`
#

DROP TABLE IF EXISTS `del_complain_archive`;


#
# Table structure of table `del_complain_archive`
#



CREATE TABLE `del_complain_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_complain_archive VALUES("1","ascac","2023-07-18","ascasca","12:31:00","sacasc","active");
INSERT INTO del_complain_archive VALUES("2","boo","2023-07-25","","21:32:00","aca","active");
INSERT INTO del_complain_archive VALUES("3","arff","2023-07-19","ewan","00:32:34","aw aw aww","schedule");



#
# Delete any existing table `del_ecertificate_archive`
#

DROP TABLE IF EXISTS `del_ecertificate_archive`;


#
# Table structure of table `del_ecertificate_archive`
#



CREATE TABLE `del_ecertificate_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_ecertificate_archive VALUES("1","JOHN","SINS","WICK","zeif","nuor","bun","009","SAINT","HOUR","Someone","","","2023-11-09 07:58:56");
INSERT INTO del_ecertificate_archive VALUES("2","GIN","FREAK","KITE","","","","003","SAINT","MEAN","Self","","","2023-11-08 18:38:10");
INSERT INTO del_ecertificate_archive VALUES("3","ascasc","","","","","","","","","Self","ascasc","Cancel","2023-08-03 08:08:12");
INSERT INTO del_ecertificate_archive VALUES("4","LASS","HARPE","SWUN","","","","009","PLAIN","PRAIER","Self","wala lang","Cancel","2023-10-23 01:17:31");
INSERT INTO del_ecertificate_archive VALUES("5","ascasc","","","ascasc","","","","","","Someone","ascasc","Cancel","2023-08-03 08:08:20");
INSERT INTO del_ecertificate_archive VALUES("6","zxczxcas","","","","","","","","","Self","sacasc","Cancel","2023-08-03 08:13:30");
INSERT INTO del_ecertificate_archive VALUES("7","aboo","boo","boo","","","","","","","Self","sdfasf","Cancel","2023-09-08 13:57:40");



#
# Delete any existing table `del_idform_archive`
#

DROP TABLE IF EXISTS `del_idform_archive`;


#
# Table structure of table `del_idform_archive`
#



CREATE TABLE `del_idform_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_idform_archive VALUES("1","boooo","","","","","","","","","","","","","self","ascascasc","","2023-11-09 07:38:54");
INSERT INTO del_idform_archive VALUES("2","JOHN","SINS","WICK","kier","pwee","numb","009","SAINT","HOUR","","","","8923784672","Someone","","","2023-11-09 07:41:12");
INSERT INTO del_idform_archive VALUES("3","GIN","FREAK","KITE","poo","whine","sky","003","SAINT","MEAN","CAVITE","2012-10-18","Single","098765432111","Someone","","","2023-11-09 07:41:32");
INSERT INTO del_idform_archive VALUES("4","JOHN","SINS","WICK","","","","009","SAINT","HOUR","","","","0912341","","","For_Pick_up","2023-11-10 10:25:48");
INSERT INTO del_idform_archive VALUES("5","ascsac","","","","","","","","","","","","","forsomeone","ascasc","Cancel","2023-11-10 10:26:47");
INSERT INTO del_idform_archive VALUES("6","GIN","FREAK","KITE","","","","003","SAINT","MEAN","CAVITE","2012-10-18","Single","09123456789","self","","Cancel","2023-11-10 10:58:22");
INSERT INTO del_idform_archive VALUES("7","","","","","","","","","","","","","","","","Cancel","2023-11-10 11:00:56");
INSERT INTO del_idform_archive VALUES("8","","","","","","","","","","","","","","","","Cancel","2023-11-10 11:02:07");
INSERT INTO del_idform_archive VALUES("9","JOHN","SINS","WICK","","","","009","SAINT","HOUR","","","","09214235","self","","Cancel","2023-11-10 11:42:16");



#
# Delete any existing table `del_residents_archive`
#

DROP TABLE IF EXISTS `del_residents_archive`;


#
# Table structure of table `del_residents_archive`
#



CREATE TABLE `del_residents_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `voter_status` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `household_no` varchar(255) NOT NULL,
  `osy` varchar(255) NOT NULL DEFAULT 'N/A',
  `pwd` varchar(255) NOT NULL,
  `household_head` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO del_residents_archive VALUES("5","klsdvln","","lsdnvl","female","234","kjdvb","lsdnvln","2023-10-13","sbvkjba","divorced","lsndlvn","jjaals@gmail.com","","","lsndvln","","","","");
INSERT INTO del_residents_archive VALUES("6","askjbv","","sdbvk","female","123","kasjcb","kjsackb","2013-10-18","sjdbvjk","divorced","kasbckja","sakjbcbkas@gmail.com","","","kasbckb","","","","");
INSERT INTO del_residents_archive VALUES("7","ksjdbvkjb","","lknsdlvn","male","213","ajasdvb","savcbaslc","2023-10-10","jsabvkb","single","sdvsln","ksacba","","","lsdnvln","","","","");
INSERT INTO del_residents_archive VALUES("8","sdv","sdvdsv","sva","female","123","askjbckasb","kjbsabc","1996-10-12","ascjbakb","single","kjsbdv","aksjckas@gmail.com","","","kjsabdvkb","","","","");
INSERT INTO del_residents_archive VALUES("9","lasnlfn","lknasln","lnasc","female","213","klsndvan","lnaslvn","2023-10-19"," sadvakln","married","lksdnav","ajnsca@gmail.com","","","nsddvn","","","","Head");
INSERT INTO del_residents_archive VALUES("11","KBSDV","KBSDV","SDBV","Male","23","SKDVB","SKDVBJ","2023-10-17","SDVBJ","Divorced","JBSAV","","","","SJDVB","","N/A","","yes");
INSERT INTO del_residents_archive VALUES("12","SDKBVB","KSBDV","JIA","Female","213","JVB","SDV","2023-10-02","ASASC","Single","ASC","","","","ASC","","N/A","","yes");
INSERT INTO del_residents_archive VALUES("13","ASDAS","SADSAD","ASDASD","Male","2","AASD","ASDASD","2023-10-31","ASDASD","Divorced","ASDASD","","","","ASDASD","","N/A","","yes");
INSERT INTO del_residents_archive VALUES("14","KJHKH","LHKH","KJLJ","Female","2","AASD","ASDASD","2023-10-09","ILK","Married","KJB","","","","KJBKB","","N/A","","no");
INSERT INTO del_residents_archive VALUES("15","KJSDBV","KBV","SDJKBV","Female","23","SDJKBV","KDV","2023-09-26","SDBV","Single","KDSVB","renzvanni999@gmail.com","","","SJDKBV","123","N/A","","yes");
INSERT INTO del_residents_archive VALUES("16","SKDV","KJSDBV","SDV","Male","213","KJDVB","KSDV","2023-10-10","SA","Married","KJDBV","renzvanni999@gmail.com","","","S,DBV","213","N/A","","yes");
INSERT INTO del_residents_archive VALUES("17","KDBV","LDV","SDNV","Male","213","KAJBV","KADVB","2023-10-10","KSDJBV","Single","KJDV","renzvanni999@gmail.com","","","KDSBV","213","N/A","","");
INSERT INTO del_residents_archive VALUES("18","KSBDV","KJSDV","SDJKBV","Male","","KJBAV","KSJBVA","2023-09-26","SKJDBV","Married","SDBV","renzvanni999@gmail.com","","","S,DJV","213","N/A","","");
INSERT INTO del_residents_archive VALUES("19","KSJDBV","KJSDB21","SMDV","Female","213","KASBV","KSDV","2023-10-04","SKJDVB","Married","KSDBV","","","","SKJDBV","21","N/A","","");
INSERT INTO del_residents_archive VALUES("20","KSDV","SDV","SJDKV","Male","213","SDKVB","KDJVB","2023-10-03","SDV ","Single","KJBDV","","","","SJDKV","13","N/A","","");
INSERT INTO del_residents_archive VALUES("21","KJDBV","KDV","SDKJVB","Female","12","KADAVB","KASJ","2023-10-03","SAC","Single","V","","","","ASJVB","AVA","N/A","","");
INSERT INTO del_residents_archive VALUES("22","LI ","BU","MAL","Male","238","SDJV","KSDBV","2023-09-26","CAVITE","Married","SECRET","","","","FILIPINO","123","N/A","","");
INSERT INTO del_residents_archive VALUES("23","KJHKH","LHKH","KJLJ","Female","2","AASD","ASDASD","2023-10-09","ILK","Married","KJB","","","","KJBKB","","N/A","","no");
INSERT INTO del_residents_archive VALUES("24","ASDAS","SADSAD","ASDASD","Male","2","AASD","ASDASD","2023-10-31","ASDASD","Divorced","ASDASD","","","","ASDASD","","N/A","","yes");
INSERT INTO del_residents_archive VALUES("25","KWU","POO","PART","Female","009","STT","MOON","2023-10-02","DJKB","Single","COOK","","","","INDIAN","099","N/A","","");
INSERT INTO del_residents_archive VALUES("26","SDNV","SKNDV","LKSDV","Male","213","SDKJVB","KAJB","2023-10-03","SDLNV","Divorced","KJSDBDV","","","","SDV","1230000","N/A","","");
INSERT INTO del_residents_archive VALUES("27","pppppp","lllll","uuuuu","Male","","dfkjbv","ssdkjbv","0000-00-00","dfb","Single","sdvv","","","","234","234","","","");
INSERT INTO del_residents_archive VALUES("28","N","LKN","KJB","Female","213","KJB","KJB","2023-11-13","KJB","Divorced","SDV","","",""," LJN","","N/A","","no");



#
# Delete any existing table `officials_archive`
#

DROP TABLE IF EXISTS `officials_archive`;


#
# Table structure of table `officials_archive`
#



CREATE TABLE `officials_archive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `chairmanship` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `termstart` date NOT NULL,
  `termend` date NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO officials_archive VALUES("1","okay","","","","5","9","2021-04-22","2021-04-28","Inactive");
INSERT INTO officials_archive VALUES("2","ziel","","","","9","13","2023-07-04","2023-07-27","Inactive");
INSERT INTO officials_archive VALUES("3","lllll","","","","6","16","2023-07-10","2023-07-14","Inactive");
INSERT INTO officials_archive VALUES("4","lala","","","","3","7","2023-08-29","2023-09-08","Inactive");
INSERT INTO officials_archive VALUES("5","acasc","","","","7","16","2023-07-12","2023-07-14","Inactive");
INSERT INTO officials_archive VALUES("6","acasc","","","","7","16","2023-07-12","2023-07-14","Inactive");
INSERT INTO officials_archive VALUES("7","JOEDAVINCEsad","","","","8","12","2021-04-03","2021-04-03","Inactive");
INSERT INTO officials_archive VALUES("8","lllll","","","","6","16","2023-07-10","2023-07-14","Inactive");
INSERT INTO officials_archive VALUES("9","scsdv","","","","5","12","2023-08-16","2023-08-11","Inactive");
INSERT INTO officials_archive VALUES("10","FRANCES JANKEE T LACSADO","","","","11","16","2023-09-20","2023-10-06","Inactive");
INSERT INTO officials_archive VALUES("11","JERIKA V LARA","","","","11","15","2023-09-06","2023-09-21","Inactive");
INSERT INTO officials_archive VALUES("12","JERALD","Y","CORPUZ","","11","","2023-09-12","2023-09-27","Inactive");
INSERT INTO officials_archive VALUES("13","LEO","L","FERRER","","10","","2023-09-06","2023-10-06","Inactive");
INSERT INTO officials_archive VALUES("14","jkbkjb","jkbk","jb","kj","4","","2023-11-14","2023-11-14","Inactive");



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
# Delete any existing table `residents_archive`
#

DROP TABLE IF EXISTS `residents_archive`;


#
# Table structure of table `residents_archive`
#



CREATE TABLE `residents_archive` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO residents_archive VALUES("1","jia","shie","park","22","Female","453","tirona","mendez","2023-07-27","cavite","Single","gamer","jia@gmail.com","567568","non-voter","Positive","Senior Citizen","filipino","7897807","OSY","","sd s","sdf","sdv","55","123","sdvsdv","svsd","","sdvsdv","bedbv","gwwe","54","435","sdsvs","fbs","household-head");
INSERT INTO residents_archive VALUES("2","aboo","boo","boo","12","Male","12","sacasc","sacas","2023-07-11","aascasc","Single","ascasc","doraemon@gmail.com","2341","voter","Positive","Student","sacasc","23","","PWD","hchcgj","aasc","sac","21","23","ascasc","sacas","household-head","sacac","wer","sdvsdv","245345","123","asca","scas","");
INSERT INTO residents_archive VALUES("3","sacsczxc","sdvxcv","vxzv","34","Male","3423","sacasc","saas","2023-08-14","ascasc","Single","ascasc","ascasc@gmail.com","234234","voter","Positive","Student","ascac","123123","OSY","","ascasc","ascascsd","ascasc","23","234","scac","sdcdsa","","saacsa","sdcsdc","sdcsdc","234","234","asca","sdc","");



#
# Delete any existing table `tbl_announcement`
#

DROP TABLE IF EXISTS `tbl_announcement`;


#
# Table structure of table `tbl_announcement`
#



CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `what_announcement` varchar(255) NOT NULL,
  `why_announcement` varchar(255) NOT NULL,
  `where_announcement` varchar(255) NOT NULL,
  `when_announcement` varchar(255) NOT NULL,
  `who_announcement` varchar(255) NOT NULL,
  `date_announcement` date NOT NULL,
  `image_announcement` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_announcement VALUES("3","lnkln","nlkn","klnkl","kln","nl","2023-11-13","HD wallpaper_ One Piece, Monkey D_ Luffy.jpg");
INSERT INTO tbl_announcement VALUES("4","kjl","nl","klnkl","nk","lknl","2023-11-07","「??????? ?????」CONCLUÍDO.jpg");
INSERT INTO tbl_announcement VALUES("5","jbnlkn","klnkln","lknlkn","lkn","kln","2023-11-20","Boys dps.jfif");
INSERT INTO tbl_announcement VALUES("6","jbkjb","kjbkjb","kjbkjb","jkb","jkb","2023-11-20","wallpaperflare.com_wallpaper (4).jpg");
INSERT INTO tbl_announcement VALUES("7","knkln","kn;","k","n;n","kn","2023-11-06","HD wallpaper_ untitled, Dragon Ball, Son Goku, Dragon Ball Z, dark, copy space.jpg");



#
# Delete any existing table `tbl_brgyclearance`
#

DROP TABLE IF EXISTS `tbl_brgyclearance`;


#
# Table structure of table `tbl_brgyclearance`
#



CREATE TABLE `tbl_brgyclearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `applicant_suffix` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `requestor_suffix` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date-of-birth` date NOT NULL,
  `place-of-birth` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_brgyclearance VALUES("12","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","2012-10-18","CAVITE","","For Pick-up","2023-11-10 10:00:07");
INSERT INTO tbl_brgyclearance VALUES("13","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","2012-10-18","CAVITE","","For Pick-up","2023-11-10 09:59:36");
INSERT INTO tbl_brgyclearance VALUES("14","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","2012-10-18","CAVITE","","For Pick-up","2023-11-10 10:52:27");
INSERT INTO tbl_brgyclearance VALUES("15","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","2012-10-18","CAVITE","","Pending","2023-11-10 11:44:28");
INSERT INTO tbl_brgyclearance VALUES("16","kayn","duo","dark","px","","","","","8768","hbkj","kjb","2023-11-23","pasay","update","Pending","2023-11-13 23:18:53");
INSERT INTO tbl_brgyclearance VALUES("17","lass","jkb","jb","008","","","","","234","jbl","kln","2023-11-20","lknkln","lknkn","Pending","2023-11-13 23:25:29");
INSERT INTO tbl_brgyclearance VALUES("18","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","2012-10-18","CAVITE","","Pending","2023-11-15 22:22:59");
INSERT INTO tbl_brgyclearance VALUES("19","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","2012-10-18","CAVITE","","Pending","2023-11-15 22:23:49");



#
# Delete any existing table `tbl_business`
#

DROP TABLE IF EXISTS `tbl_business`;


#
# Table structure of table `tbl_business`
#



CREATE TABLE `tbl_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxpayer_name` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_business VALUES("1","john sem","coffhi","001 coffi","");
INSERT INTO tbl_business VALUES("2","SKY","COHEE","HAVEN STREET","");
INSERT INTO tbl_business VALUES("3","BAE","CUBE","CUBE STREET","");
INSERT INTO tbl_business VALUES("4","BHKB","JKLN","JKBLJB","");
INSERT INTO tbl_business VALUES("5","IHLNLK","NKLN","LKNL","");



#
# Delete any existing table `tbl_businessclearance`
#

DROP TABLE IF EXISTS `tbl_businessclearance`;


#
# Table structure of table `tbl_businessclearance`
#



CREATE TABLE `tbl_businessclearance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(255) NOT NULL,
  `business_owner_fname` varchar(255) NOT NULL,
  `business_owner_mname` varchar(255) NOT NULL,
  `business_owner_lname` varchar(255) NOT NULL,
  `business_owner_suffix` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date_applied` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documentFor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_businessclearance VALUES("7","bumgie","spy","quie","part","","003 frost zone 4","","","0000-00-00 00:00:00","","");
INSERT INTO tbl_businessclearance VALUES("8","kjbkbk","bkjb","kjbjk","bkjb","kb","kjbkj","kbk","bkj","2023-11-14 00:27:40","Clearance","Pending");



#
# Delete any existing table `tbl_certofindigency`
#

DROP TABLE IF EXISTS `tbl_certofindigency`;


#
# Table structure of table `tbl_certofindigency`
#



CREATE TABLE `tbl_certofindigency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `applicant_suffix` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `requestor_suffix` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_certofindigency VALUES("8","JOHN","SINS","WICK","","","","","","009","SAINT","HOUR","Self","","Completed","2023-11-13 00:19:03");
INSERT INTO tbl_certofindigency VALUES("9","shadow","kirito","dark","sr","wet","dry","what","op","001","harld","borld","Someone","ping pong","For Pick-up","2023-11-13 00:29:44");
INSERT INTO tbl_certofindigency VALUES("10","JOHN","SINS","WICK","","claire","dime","rose","","009","SAINT","HOUR","Someone","","Completed","2023-11-13 00:32:02");
INSERT INTO tbl_certofindigency VALUES("11","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","Self","","For Pick-up","2023-11-10 10:06:26");
INSERT INTO tbl_certofindigency VALUES("13","urgot","kjklnb","lknkl","005","","","","","987","jkbjkb","kbjjk","Self","bk","Pending","2023-11-13 23:39:08");
INSERT INTO tbl_certofindigency VALUES("14","vayne","kjbb","lnk","002","fate","kjbjkb","blkb","007","213","kjbkjb","jbjk","Someone","kb","Pending","2023-11-13 23:39:37");
INSERT INTO tbl_certofindigency VALUES("15","aaa","bbb","ccc","dd","","","","","111","eee","fff","Self","alpha","Pending","2023-11-14 14:25:19");
INSERT INTO tbl_certofindigency VALUES("16","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","Self","","Pending","2023-11-15 22:24:31");



#
# Delete any existing table `tbl_certoflbr`
#

DROP TABLE IF EXISTS `tbl_certoflbr`;


#
# Table structure of table `tbl_certoflbr`
#



CREATE TABLE `tbl_certoflbr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `applicant_suffix` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `requestor_suffix` varchar(255) NOT NULL,
  `parent_fname` varchar(255) NOT NULL,
  `parent_mname` varchar(255) NOT NULL,
  `parent_lname` varchar(255) NOT NULL,
  `parent_suffix` varchar(255) NOT NULL,
  `father_fname` varchar(255) NOT NULL,
  `father_mname` varchar(255) NOT NULL,
  `father_lname` varchar(255) NOT NULL,
  `father_suffix` varchar(255) NOT NULL,
  `mother_fname` varchar(255) NOT NULL,
  `mother_mname` varchar(255) NOT NULL,
  `mother_lname` varchar(255) NOT NULL,
  `mother_suffix` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `documentFor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_certoflbr VALUES("8","","","","","ascasc","","","","","","","","","","","","","","","","2023-08-23","ascasc","","","","0000-00-00 00:00:00","single parent");
INSERT INTO tbl_certoflbr VALUES("15","jhvjhv","hjvjhv","jhvjhv","oi","","","","","","","","","jvjvh","ihklb","iuy","tee","chchg","kbkj","bjn","t8","2023-11-27","005","ghhv","hjv","Completed","0000-00-00 00:00:00","Self");
INSERT INTO tbl_certoflbr VALUES("18","GIN","FREAK","KITE","x","","","","","","","","","john","smith","sieghart","y","eli","fire","flaire","z","2023-11-16","003","SAINT","MEAN","Completed","0000-00-00 00:00:00","Self");
INSERT INTO tbl_certoflbr VALUES("20","","","","","corki","jkbkjb","bkjbk","009","hawk","jkbkjb","bkjbk","009","","","","","","","","","2023-11-22","002","bkjkjb","kjbkjb","Pending","0000-00-00 00:00:00","Single Parent");
INSERT INTO tbl_certoflbr VALUES("21","","","","","lux","kbb","llkn","001","kbbj","kbb","llkn","001","","","","","","","","","2023-11-28","2131","kjbjkb","kjbkj","Pending","0000-00-00 00:00:00","Single Parent");
INSERT INTO tbl_certoflbr VALUES("22","","","","","kln","kln","kln","123","kjb","jkb","jb","23","","","","","","","","","2023-10-04","003","ggg","hhh","Pending","0000-00-00 00:00:00","Single Parent");
INSERT INTO tbl_certoflbr VALUES("23","rsreser","esrstdr","rtdtd","tyf","","","","","","","","","bnvbnv","nbnbvhj","nmmn",",mn,mn","gff","jhgg","jhkh","jkh","2023-11-22","001","nvn","jhb","Pending","0000-00-00 00:00:00","Self");
INSERT INTO tbl_certoflbr VALUES("24","","","","","ttt","yyy","uuu","iii","","","","","fff","hhh","kkk","kkk","ccc","bbb","mmm","ddd","2023-11-20","009","iii","ggg","Pending","0000-00-00 00:00:00","Children");
INSERT INTO tbl_certoflbr VALUES("25","","","","","lknlkn","lknlkn","lknln","lknlkn","lkn","lknkl","nlkn","lnn","","","","","","","","","2023-11-22","9698","nnkl","nlkn","Pending","2023-11-14 00:12:14","Single Parent");
INSERT INTO tbl_certoflbr VALUES("26","","","","","uihuh","hoi","hio","kln","vchc","nbvn","vnm","bmnb","","","","","","","","","2023-11-07","002","mvm","mnbmn","Pending","0000-00-00 00:00:00","Single Parent");
INSERT INTO tbl_certoflbr VALUES("27","","","","","kjnkn","nklnkl","n","nk","","","","","lknln","kn","l","nkln","kln","lknl","nl","nlk","2023-11-08","978","jbb","kjb","Pending","2023-11-14 14:27:41","Children");
INSERT INTO tbl_certoflbr VALUES("28","","","","","kjnk","knl","nlk","nkln","lkn","lk","lkn","klnl","","","","","","","","","2023-11-15","8768","jbjkb","jkb","Pending","2023-11-14 14:28:19","Single Parent");
INSERT INTO tbl_certoflbr VALUES("29","","","","","kjnk","knl","nlk","nkln","lkn","lk","lkn","klnl","","","","","","","","","2023-11-15","8768","jbjkb","jkb","Pending","2023-11-14 14:29:27","Single Parent");
INSERT INTO tbl_certoflbr VALUES("30","","","","","kjnk","knl","nlk","nkln","lkn","lk","lkn","klnl","","","","","","","","","2023-11-15","8768","jbjkb","jkb","Pending","2023-11-14 14:29:37","Single Parent");
INSERT INTO tbl_certoflbr VALUES("31","","","","","kjnk","knl","nlk","nkln","lkn","lk","lkn","klnl","","","","","","","","","2023-11-15","8768","jbjkb","jkb","Pending","2023-11-14 14:30:21","Single Parent");
INSERT INTO tbl_certoflbr VALUES("32","","","","","kjnk","knl","nlk","nkln","lkn","lk","lkn","klnl","","","","","","","","","2023-11-15","8768","jbjkb","jkb","Pending","2023-11-14 14:30:47","Single Parent");
INSERT INTO tbl_certoflbr VALUES("33","","","","","jjkbjkb","jkbk","jb","kj","kjbkb","kjbjk","b","jk","","","","","","","","","2023-11-15","34","jkbkjb","kjb","Pending","2023-11-14 14:31:06","Single Parent");
INSERT INTO tbl_certoflbr VALUES("34","","","","","john","smith","shadow","kj","knkl","kn","kn","lk","","","","","","","","","2023-11-28","987","jb","jkb","Pending","2023-11-14 14:31:30","Single Parent");
INSERT INTO tbl_certoflbr VALUES("35","nlkn","nklnkl","nkl","knk","","","","","","","","","klnln","klnl","n","nl","klnhoi","ihoi","hkj","h","2023-11-28","896","kjbkj","jkb","Pending","2023-11-14 14:32:34","Self");
INSERT INTO tbl_certoflbr VALUES("36","","","","","jkbjkbk","jkbkj","bkj","kjb","","","","","jkbbkj","nkjnl","nkln","kl","klkn","kjn","klnkln","l","2023-11-15","8689","jkbkjb","kjb","Pending","2023-11-14 14:32:55","Children");
INSERT INTO tbl_certoflbr VALUES("37","","","","","jjlnblkn","klnkl","nlkn","nl","nlknl","nln","klnlk","nlkn","","","","","","","","","2023-11-22","96","jkbkjb","jb","Pending","2023-11-15 00:16:28","Single Parent");
INSERT INTO tbl_certoflbr VALUES("38","","","","","jkbljb","nlknl","knkln","lknl","","","","","nnlk","nkln","lknn","lkn","lknl","nln","lknl","kn","2023-11-28","876","kjbkjb","kjb","Pending","2023-11-15 00:17:17","Children");
INSERT INTO tbl_certoflbr VALUES("39","stain","dd","ff","lll","","","","","","","","","heks","jhbk","jkb","hhh","friey","jb","kjb","bbb","2023-11-21","213","hjvhk","kbn","Pending","2023-11-15 16:16:01","Self");
INSERT INTO tbl_certoflbr VALUES("40","GIN","FREAK","KITE","","","","","","","","","","lnkln","nkn",";n;lm","","l;m;","lm;l","m;","","0000-00-00","003","SAINT","MEAN","Pending","2023-11-15 22:25:47","Self");



#
# Delete any existing table `tbl_ecertificate`
#

DROP TABLE IF EXISTS `tbl_ecertificate`;


#
# Table structure of table `tbl_ecertificate`
#



CREATE TABLE `tbl_ecertificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `applicant_suffix` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `requestor_suffix` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_ecertificate VALUES("91","LASS","HARPE","SWUN","","","","","","012","desert","dawn","Self","poke","For Pick-up","2023-10-23 17:26:46");
INSERT INTO tbl_ecertificate VALUES("92","LASS","HARPE","SWUN","","","","","","009","PLAIN","PRAIER","Self","tinola","For Pick-up","2023-10-23 17:29:26");
INSERT INTO tbl_ecertificate VALUES("93","JOHN","SINS","WICK","","","","","","009","SAINT","HOUR","Self","","Completed","2023-11-10 10:01:52");
INSERT INTO tbl_ecertificate VALUES("96","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","Self","","For Pick-up","2023-11-10 10:01:43");
INSERT INTO tbl_ecertificate VALUES("97","gon","frick","hax","jr","","","","","003","SAINT","MEAN","Self","hunter","Preparing","2023-11-10 10:01:32");
INSERT INTO tbl_ecertificate VALUES("98","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","Self","","For Pick-up","2023-11-08 22:44:41");
INSERT INTO tbl_ecertificate VALUES("99","kai","klnk","kln","007","","","","","3423","kjbkjb","jb","Self","ljbl","Pending","2023-11-13 23:31:47");
INSERT INTO tbl_ecertificate VALUES("100","zoe","knbkln","kln","000","lux","lknk","lknl","004","213","kjb","jl","Someone","","Pending","2023-11-13 23:32:17");
INSERT INTO tbl_ecertificate VALUES("101","jax","jknln","knlk","jass","rex","kjl","nkln","reeee","89987","jkbj","kb","Someone","lknkln","Pending","2023-11-13 23:33:07");
INSERT INTO tbl_ecertificate VALUES("102","qqq","www","eee","rrr","ttt","yyy","uuu","iii","000","ooo","ppp","Someone","aaa","Pending","2023-11-14 23:33:56");
INSERT INTO tbl_ecertificate VALUES("103","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","Self","","Pending","2023-11-15 22:23:14");



#
# Delete any existing table `tbl_households`
#

DROP TABLE IF EXISTS `tbl_households`;


#
# Table structure of table `tbl_households`
#



CREATE TABLE `tbl_households` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `voter_status` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `household_no` varchar(255) NOT NULL,
  `osy` varchar(255) NOT NULL DEFAULT 'N/A',
  `pwd` varchar(255) NOT NULL,
  `household_head` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_households VALUES("13","YUU","UYUY","YYU","Male","2","AASD","ASDASD","2023-10-04","JGF","Widowed","URY","","","","YTYR","","N/A","","no","123","");
INSERT INTO tbl_households VALUES("26","TYSON","MANNY","MKE","Male","009","TIRONA","MENDEZ","2023-10-03","MANILA","Single","BOXER","","","","FILIPINO","001","N/A","","","002","");
INSERT INTO tbl_households VALUES("38","POWEN","POO","PWEE","Female","09","FREE","JOSON","2010-10-14","CAVITE","Single","STUDENT","renzvanni999@gmail.com","","","FILIPINO","08","N/A","","yes","","");
INSERT INTO tbl_households VALUES("39","ELESES","FLARE","SIEGHART","Female","001","SAINT","HAVEN","2001-10-11","EVE","Single","WARRIOR","renzvanni999@gmail.com","","","ELF","005","N/A","","yes","","");
INSERT INTO tbl_households VALUES("40","DESIR","NOURBUR","ARMAN","Male","09","HALLOW","PLAIN","2009-09-03","SAINT","Single","ANIT-MAGE","renzvanni999@gmail.com","","","FLIER","099","N/A","","yes","","");
INSERT INTO tbl_households VALUES("41","SDHV","KSDV","KSDHVB","Female","213","KAJB","K","2023-10-03","DSV","Married","KJSDBV","renzvanni999@gmail.com","","","DJSV","64","N/A","","yes","","");
INSERT INTO tbl_households VALUES("46","LASS","HARPE","SWUN","Male","009","PLAIN","PRAIER","2023-10-17","SKID","Single","ASSASSIN","renzvanni999@gmail.com","","","SHADOW","004","N/A","","yes","","");
INSERT INTO tbl_households VALUES("47","IVAN","GONZALO","JAVIE","Male","003","TIORONA","MENDEZ","2023-10-09","CAVITE","Single","DEVELOPER","","","","FILIPINO","","N/A","","yes","099","");
INSERT INTO tbl_households VALUES("48","PWEE","PERF","KIVY","Female","003","TIORONA","MENDEZ","2023-10-03","CAVITE","Married","NURSE","","","","JAPAN","","N/A","","no","008  ","");
INSERT INTO tbl_households VALUES("49","JOHN","WEW","ITULID","Female","003","TIRONA","MENDEZ","2023-10-25","CAVITE","Married","NURSE","renzvanni999@gmail.com","","","FILIPINO","08","N/A","","yes","","");
INSERT INTO tbl_households VALUES("50","ELESIS","FLARE","SIEGHART","Male","009","PLAIN","SIEG","2023-10-10","CAVITE","Single","WARRIOR","renzvanni999@gmail.com","","","FILIPINO","007","N/A","","yes","","");
INSERT INTO tbl_households VALUES("51","LEO","HART","FLARE","Male","008","TIRONA","MENDEZ","2023-10-04","CAVITE","Single","ASSASSIN","renzvanni999@gmail.com","","","FILIPINO","001","N/A","","yes","","");
INSERT INTO tbl_households VALUES("52","JOHN","SINS","WICK","Male","009","SAINT","HOUR","2023-10-09","CAVITE","Single","HITMAN","renzvanni999@gmail.com","","","AMERICA","001","N/A","","yes","","");
INSERT INTO tbl_households VALUES("53","rod","casaclang","homeres","Male","3","sdca","sdcad","0000-00-00","sacas","Single","sacsac","ascas@gmail.com","123123","voter","ascasc","21312","OSY","","","","");
INSERT INTO tbl_households VALUES("56","jia","shie","park","Female","3","tirona","mendez","0000-00-00","cavite","Single","developer","jia@gmail.com","8923984523","voter","filipino","2134","OSY","","","","");
INSERT INTO tbl_households VALUES("60","yul","shie","park","male","3","tirona","mendez","0000-00-00","dasmarinas","","developer","renzvanni999@gmail.com","","","filipino","","","","","","");
INSERT INTO tbl_households VALUES("70","GIN","FREAK","KITE","Male","003","SAINT","MEAN","2012-10-18","CAVITE","Single","HUNTER","renzvanni999@gmail.com","","","FILIPINO","007","N/A","","yes","","");
INSERT INTO tbl_households VALUES("72","renz","manalo","bato","Male","12","sacasc","sacas","1994-07-11","aascasc","Single","ascasc","doraemon@gmail.com","2341","voter","sacasc","23","","PWD","","","");
INSERT INTO tbl_households VALUES("74","jia","shie","park","male","234","ksjdnvn","kjsdvkn","2023-10-26","sdvnklsnv","single","sdnvn","slndvns@gmail.com","","","jsndvjn","","","","","","");
INSERT INTO tbl_households VALUES("76","JIN","SNOW","SIEGHART","Male","009","GATE","HAVEN","2008-10-02","FLARE","Single","WARRIOR","flare@gmail.com","09123456781","","ELF","","N/A","","yes","","09");
INSERT INTO tbl_households VALUES("78","PYO","WOL","MOON","","pyo@gmail.com","ASSASSIN","Male","2023-10-05","CAVITE","","Single","","","","FILIPINO","","N/A","","no","","");
INSERT INTO tbl_households VALUES("94","JADE ","SKY","BLOOM","Male","001","TIRONA","PLARE","2023-11-07","CIVITE","Single","POLICE","","","","FILIPINO","","N/A","","yes","LLA","");
INSERT INTO tbl_households VALUES("174","LLNB","KLN","ZED","Male","213","KJB","KJB","2023-11-07","LN","Single","KB","","","","LKN","","N/A","","no","LKN","");
INSERT INTO tbl_households VALUES("175","KJB","KB","ZOE","Female","213","KJB","KJB","2023-11-14","JB","Married","KJB","","","","KJB","","N/A","","no","LS","");
INSERT INTO tbl_households VALUES("176","KJB","KJB","LEBLANC","Female","123","KJB","KJB","2023-11-07","JB","Divorced","SDV","","","","KJB","","N/A","","no","KJB","");
INSERT INTO tbl_households VALUES("177","KJBJKB","KJB","ORIANA","Male","123","KJB","KJB","2023-11-21","KJB","Single","SDVS","","","","KJB","","N/A","","yes","KB","");
INSERT INTO tbl_households VALUES("178","KB","JKB","TWIST","Male","123","KJB","KJB","2023-11-07","JKB","Divorced","KHV","","","","KJB","","N/A","","no","JB","");
INSERT INTO tbl_households VALUES("179","SHIN","MOON","WOON","Male","008","RIZE","SWORN","2007-11-08","PASAY","Single","DEVELOPER","renzvanni999@gmail.com","09123456789","","FILIPINO","","N/A","","yes","","");
INSERT INTO tbl_households VALUES("180","SEAM","ADAS","RFTRFT","Male","ASDA","ASDASD","WASDASD","2001-12-31","ASDASD","Married","ASDAS","","","","ASDAS","","N/A","","no","ASD","");
INSERT INTO tbl_households VALUES("181","JKLN","NL","KJHL","Male","23","KJB","KJB","2023-11-07","JKBKJ","Divorced","KJB","","","","KJB","","N/A","","no","KLN","");
INSERT INTO tbl_households VALUES("182","FLAY","SWORD","RONAN","Male","123","KJB","JB","2023-11-22","JBL","Single","LJB","","","","LBL","","N/A","","no","KJB","");
INSERT INTO tbl_households VALUES("183","TIME","FROUN","AMY","Male","123","KJB","JB","2023-11-14","JB","Married","ASCASC","","","","J MN ","","N/A","","  ","JB","");
INSERT INTO tbl_households VALUES("184","KLN","KLN","SHIE","Male","213","KJB","JKB","2023-11-01","KN","Married","KBVK","","","","KLN","","N/A","","KJB JLKB HART","LKN","");
INSERT INTO tbl_households VALUES("185","KJB","JLKB","HART","Female","213","KJB","JKB","2023-11-01",",BJ","Married","MN N","","","","JB","","N/A","","yes","LK","");
INSERT INTO tbl_households VALUES("186","KLNLK","NLK","JKNJKN","Male","21","B","JKB","2023-11-22","KJNKN","Divorced","JKB","","","","NKN","","N/A","","yes","L","");
INSERT INTO tbl_households VALUES("187","JBK","JKB","BAW","Female","123","KBJ","KJB","2023-11-15","KJKJ","Single","JKB","","","","J","","N/A","","KJB JKB HAK","KJB","");
INSERT INTO tbl_households VALUES("188","KJB","JKB","HAK","Male","123","KBJ","KJB","2023-11-01","KJBKJB","Divorced","BJK","","","","JKB","","N/A","","yes","JK","");
INSERT INTO tbl_households VALUES("189","KJBJK","KJB","KKKL","Male","213","HJB","B","2023-11-29","KNK","Married","JKB","hjbk@gmail.com","09123456789","","NKL","","N/A","","yes","","JKB");



#
# Delete any existing table `tbl_idform`
#

DROP TABLE IF EXISTS `tbl_idform`;


#
# Table structure of table `tbl_idform`
#



CREATE TABLE `tbl_idform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_fname` varchar(255) NOT NULL,
  `applicant_mname` varchar(255) NOT NULL,
  `applicant_lname` varchar(255) NOT NULL,
  `applicant_suffix` varchar(255) NOT NULL,
  `requestor_fname` varchar(255) NOT NULL,
  `requestor_mname` varchar(255) NOT NULL,
  `requestor_lname` varchar(255) NOT NULL,
  `requestor_suffix` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `documentFor` varchar(255) NOT NULL,
  `purpose` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_idform VALUES("8","JOHN","SINS","WICK","01","","","","","009","SAINT","HOUR","","","","12334","Someone","","For Pick-up","2023-11-12 23:38:23");
INSERT INTO tbl_idform VALUES("9","JOHN","SINS","WICK","","low","key","bun","","009","SAINT","HOUR","","","","0912758234","Someone","","Pending","2023-10-25 00:39:34");
INSERT INTO tbl_idform VALUES("10","JOHN","SINS","WICK","","","","","","009","SAINT","HOUR","","","","09789789897","self","","Pending","2023-10-26 10:16:09");
INSERT INTO tbl_idform VALUES("12","JOHN","SINS","WICK","","","","","","009","SAINT","HOUR","CAVITE","2023-10-09","Single","389747328974","self","","Pending","2023-10-26 11:14:05");
INSERT INTO tbl_idform VALUES("18","GIN","FREAK","KITE","","fria","light","grimm","","003","SAINT","MEAN","CAVITE","2012-10-18","Single","09123456789","Someone","","Pending","2023-11-10 09:08:10");
INSERT INTO tbl_idform VALUES("21","SHIN","MOON","WOON","","","","","","008","RIZE","SWORN","PASAY","2007-11-08","Single","09123456789","self","","For Pick-up","2023-11-10 11:04:39");
INSERT INTO tbl_idform VALUES("26","ashe","ljn","kln","ln","zed","jn","kln","oin","8976","","jkb","kjb","2023-11-09","kjbj","09123456789","Someone","hkvkv","Pending","2023-11-13 22:55:20");
INSERT INTO tbl_idform VALUES("27","jaycex","dimex","hassx","px","writex","skyx","rosex","sx","0020","prierex","swampx","cavitex","2023-11-14","singlex","091234567891","Someone","gamingx","Pending","2023-11-14 21:20:06");
INSERT INTO tbl_idform VALUES("28","lux","lknklnlk","kln","kl","elesis","lknkln","lkn","lkn","2341","jbl","lnl","lknl","2023-11-07","kjbkj","lblk","Someone","ljlnb","For Pick-up","2023-11-14 21:42:59");
INSERT INTO tbl_idform VALUES("29","GIN","FREAK","KITE","","","","","","003","SAINT","MEAN","CAVITE","2012-10-18","Single","09123456789","self","","Pending","2023-11-15 22:21:27");
INSERT INTO tbl_idform VALUES("30","GIN","FREAK","KITE","","hik","fren","kwun","","003","SAINT","MEAN","CAVITE","2012-10-18","Single","09876543211","Someone","","Pending","2023-11-15 22:22:03");



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
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_users VALUES("16","admin","$2y$10$.hEPnJf0jQFt3VaoQzAkIebBXEsSNk0gE1x7I2CuUvnaADgwgFJWC","admin","2023-09-17 23:02:51","","","","0","","","","","","","","");
INSERT INTO tbl_users VALUES("17","staff","$2y$10$hGRzTBnP8sABKWG0k1BSAeOUSlzt3e6s6DV5ZdjvE7tZiZGgyatJO","staff","2023-08-13 02:13:13","","","","0","","","","","","","","");
INSERT INTO tbl_users VALUES("18","user","0","user","2023-08-13 23:41:12","","","","0","","","","","","","","");
INSERT INTO tbl_users VALUES("19","boo","$2y$10$kHZplcrnPryJOTw0GhvWPehFPBDqCe0JzoAWOilbatQ2Dg0.jaTue","staff","2023-08-13 23:38:30","","","","0","","","","","","","","");
INSERT INTO tbl_users VALUES("21","jia","$2y$10$0XIkGbU/hLuZImKPYM1rN.xFeeMuB320j/aO5k8uN/FXXa30Y8mdu","user","2023-08-13 23:43:42","","","","0","","","","","","","","");
INSERT INTO tbl_users VALUES("22","part","$2y$10$SsVahhulxuGlknGYqgBeSOzAoddpe0rUOWannbEizbSYOFFR2i0he","user","2023-08-14 00:05:57","sacsczxc sdvxcv vxzv","","","34","Male","Single","sacasc","","","2023-08-14","","ascasc@gmail.com");
INSERT INTO tbl_users VALUES("24","wick","$2y$10$97kJvXjK01fs1PEIPaBq8OX9G1HGSD.9l3K8D4/UKtUbtIjt8ynB.","user","2023-08-15 00:32:40","aboo","boo","boo","12","Male","Single","sacasc","","","2023-07-11","","doraemon@gmail.com");
INSERT INTO tbl_users VALUES("99","user1695848534","$2y$10$D/6tU4amUk/ddbtzaPUro.tFW.wyN9k7KuWXT7Pkpnqk5nQ0Nm72W","user","2023-09-27 14:02:14","rod","casaclang","homeres","21","Male","Single","sdca","","","2023-09-05","","ascas@gmail.com");
INSERT INTO tbl_users VALUES("119","user1697265363","$2y$10$jKbDnRQF6Hk4loledO5Hp.9Pn.Yb2cR3f8Zj1OBl/am.gllv7uIcq","user","2023-10-13 23:36:03","slnvlnqksdn","nsdln","sdjbn","0","Male","Married","sdv","","","2023-09-12","","sdvsd@gmail.com");
INSERT INTO tbl_users VALUES("136","qier","$2y$10$kzKUEkoDcQsEbcCgkuCtMOMkQz9y7Bmp3MixtZRhMuwS7UwV4nWoi","user","2023-10-22 22:26:39","SJDBV","KSDDB","YUL","0","","Widowed","JVB","","","2023-10-11","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("137","root","$2y$10$vsAfjmWc00usyb8L0la7duyW3kmXiT1RGNnx9qAYiVho8QxRMtoHy","user","2023-10-22 22:40:11","KSDBV","SDJBV","NAKSU","0","","Married","DKVBJ","","","2023-10-10","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("141","vee","$2y$10$2EvAKZsrVrPQ/1p1WAlIMOwZmdibRwFAJYRI3xovrsvjoX0PFwh32","user","2023-10-22 23:12:20","SDV","SDKBV","BAY","0","","Married","AAV","34","SDVA","2023-10-09","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("142","lay","$2y$10$LC5Qlhnz54.b7JxnNKJCFOhGAL5bqjaxd6hDSQPAYa8QyK7V7Mvey","user","2023-10-22 23:14:28","SDV","KSDJBV","KSJBV","0","","Single","SKDVB","23","SKDVBJ","2023-10-10","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("152","pree","$2y$10$P0WNYehDzjOTbd3N2r48LuGkGDQNW8IuMdz.F6CdNB17zRYLa1cRu","user","2023-10-23 00:38:09","YUU","UYUY","YYU","0","","Widowed","AASD","2","ASDASD","2023-10-04","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("153","tyu","$2y$10$XNr1OLFoAeWV88XaxVN9j.kYs5R1Hn1TkoCTCkCjwRKUCECEjBnNO","user","2023-10-23 00:39:06","SV","SDVB","POW","0","","Widowed","DKVBJ","21","SSDV","2023-10-03","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("154","traa","$2y$10$nOyJfHV1ofeNU9Iel8P7bOkdpoElJsHzuVw5.QSxMVfLyMSMmYVe6","user","2023-10-23 00:39:54","SKJDBV","SDJBV",",SDV,","0","","Single","CVB","321","SLDV","2023-10-10","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("155","user1698046960","$2y$10$1Y2JAzgg7iAvIINk4awcuO7hJoxw19eGsx5NRLRX1ZkaCZKo5k4Qa","user","2023-10-23 00:42:46","ELESES","FLARE","SIEGHART","0","Female","Single","SAINT","","","2001-10-11","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("156","user1698048484","$2y$10$pWlUKCmnUoABhq4IaFBXbeHtj5MBfHtCpN2UMjvaj5.PbboiwIVe2","user","2023-10-23 01:08:10","OEWYRI","NM,N","KJBSDV","0","Male","Single","SDBV","85","ASV","2023-09-27","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("157","user1698048558","$2y$10$XweuQIHNL1gvq4hHtFVvhuSRcaH0aUV/p6Fu7EQdQ6.Iu/vbm6UWe","user","2023-10-23 01:09:23","LASS","HARPE","SWUN","0","Male","Single","PLAIN","009","PRAIER","2023-10-17","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("158","user1698107941","$2y$10$d7v.KHEs.S/HnNqgw7weC.iRos.NYyBRQ5Ouo.AImzy.X7g8w/QJC","user","2023-10-23 17:39:46","JOHN","WEW","ITULID","0","Female","Married","TIRONA","003","MENDEZ","2023-10-25","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("159","user1698188913","$2y$10$WqOZPsYnAiHEUZXufmXYrOvoZqIw5xwwuL8eSCIK20UBtzBDvALr.","user","2023-10-24 16:08:39","ELESIS","FLARE","SIEGHART","0","Male","Single","PLAIN","009","SIEG","2023-10-10","","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("160","user1698189323","$2y$10$w38u0fMmcWDDDne2V7/i4O3l.6.yz1tQ38W4v5ZSyuBwBRgt5H/Na","user","2023-10-24 16:15:31","JOHN","SINS","WICK","0","Male","Single","SAINT","009","HOUR","2023-10-09","CAVITE","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("161","user1698440048","$2y$10$De4umo8DhlMrk5yuhW00KOpXmYx2u2ykM0.qgh6YBglRQ6DkvNM4.","user","2023-10-27 13:54:17","GIN","FREAK","KITE","0","Male","Single","SAINT","003","MEAN","2012-10-18","CAVITE","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("162","user1698813131","$2y$10$kHyjbGbUmjabFyj36brH6OAOKC9pT9qXty2.hsDfVsU/eJTxkN4E2","user","2023-10-31 21:32:16","KSJDBV","SDKDJBV","SJDV","0","Female","Single","SDKVBS","213","SKDVB","1994-10-13","SJDVB","kjasvd@gmail.com");
INSERT INTO tbl_users VALUES("163","user1698813326","$2y$10$BYkqviuiSh2vByTK2GXIQ.GiHerJ5Fdu9TCWWDULb9Lwc/0/w0hIG","user","2023-10-31 21:35:31","JIN","SNOW","SIEGHART","0","Male","Single","GATE","009","HAVEN","2008-10-02","FLARE","flare@gmail.com");
INSERT INTO tbl_users VALUES("164","user1699431901","$2y$10$xljLruqUyUylDhHQLSqhl.D.MPmnvVXX2YX4Ikg5gqPiSxXQU0dqS","user","2023-11-08 00:25:06","SHIN","MOON","WOON","0","Male","Single","RIZE","008","SWORN","2007-11-08","PASAY","renzvanni999@gmail.com");
INSERT INTO tbl_users VALUES("165","user1700001384","$2y$10$z/syaHLSzRe1L9AWLcqa0.Q9EyCEd9aOfJX6MmkxptP5rQeY9rQwS","user","2023-11-14 14:36:25","KJBJK","KJB","KKKL","0","Male","Married","HJB","213","B","2023-11-29","KNK","hjbk@gmail.com");



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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblawareness VALUES("2","yul","2023-07-17","14:43:21","manila","light","schedule");
INSERT INTO tblawareness VALUES("9","sdvs","2023-09-11","12:32:00","ascas","dsvasv","active");



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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tblblotter VALUES("35","svsv","svsva","sdsdv","amicable","sdvsdv","2023-09-12","12:32:00","asacvasa","scheduled");



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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblchairmanship VALUES("2","Punong Barangay");
INSERT INTO tblchairmanship VALUES("3","Committee on Peace & Order/Human Rights");
INSERT INTO tblchairmanship VALUES("4","Committee on Rules & Privileges");
INSERT INTO tblchairmanship VALUES("5","Committee on Budget & Appropration");
INSERT INTO tblchairmanship VALUES("6","Committee on Health & Sanitation");
INSERT INTO tblchairmanship VALUES("7","Committee on Cooperatives/Livelihood");
INSERT INTO tblchairmanship VALUES("8","Committee on Women & Family/Sports Development");
INSERT INTO tblchairmanship VALUES("9","Committee on Infrastructure");
INSERT INTO tblchairmanship VALUES("10","Barangay Treasurer");
INSERT INTO tblchairmanship VALUES("11","Barangay Secretary");
INSERT INTO tblchairmanship VALUES("12","SK Chairperson");



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblcomplain VALUES("1","sauce","2023-07-24","sacscas","00:01:00","asdasd","schedule");
INSERT INTO tblcomplain VALUES("2","perf","2023-07-18","manila","14:04:01","piattos","done");
INSERT INTO tblcomplain VALUES("3","yul","2023-07-17","ascasvasvSDV","12:31:00","AVASVAV","done");
INSERT INTO tblcomplain VALUES("11","sdv","2023-09-20","sdvasv","12:33:00","sdvasv","active");



#
# Delete any existing table `tblofficials`
#

DROP TABLE IF EXISTS `tblofficials`;


#
# Table structure of table `tblofficials`
#



CREATE TABLE `tblofficials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `chairmanship` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `termstart` date DEFAULT NULL,
  `termend` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblofficials VALUES("27","EFREN F LARA","","","","3","9","2023-08-29","2023-09-08","Active");
INSERT INTO tblofficials VALUES("28","IAN MARK S MENDOZA","","","","5","10","2023-08-30","2023-08-18","Active");
INSERT INTO tblofficials VALUES("30","MERCADO","P","HAYAG","","2","4","2023-09-05","2023-09-28","Active");
INSERT INTO tblofficials VALUES("31","JORGE","P","CANTIMBUHAN","","3","7","2023-09-15","2023-09-29","Active");
INSERT INTO tblofficials VALUES("32","ALEXANDER P GENEVEO","","","","7","8","2023-09-14","2023-09-28","Active");
INSERT INTO tblofficials VALUES("33","HONESTO P GUYAMIN","","","","8","11","2023-09-13","2023-10-06","Active");
INSERT INTO tblofficials VALUES("35","RELLY Q KALUGDAN","","","","8","13","2023-09-21","2023-09-29","Active");
INSERT INTO tblofficials VALUES("40","cid","shadow","thread","px","4","","2023-11-06","2023-12-07","Active");



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
  `sex` varchar(255) NOT NULL,
  `house_no` varchar(250) NOT NULL,
  `street` varchar(255) NOT NULL,
  `subdivision` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `voter_status` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `household_no` varchar(255) NOT NULL,
  `osy` varchar(255) NOT NULL DEFAULT 'N/A',
  `pwd` varchar(255) NOT NULL,
  `household_head` varchar(255) NOT NULL,
  `ext` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tblresidents VALUES("219","rod","casaclang","homeres","Male","03","sdca","sdcad","1948-09-05","sacas","Single","sacsac","ascas@gmail.com","123123","voter","ascasc","21312","OSY","","","","");
INSERT INTO tblresidents VALUES("234","slnvlnqksdn","nsdln","sdjbn","Male","","sdv","sdvsdv","2023-09-12","saasc","Married","sdva","sdvsd@gmail.com","234124","voter","sdvsv","234124","OSY","","","","");
INSERT INTO tblresidents VALUES("235","bob","bee","buu","Male","02","sdvsv","sdvsdv","2008-09-05","sdvsdv","Married","sdvsv","renzvanni999@gmail.com","32423","voter","sdvsv","234","OSY","","","","");
INSERT INTO tblresidents VALUES("236","jia","shie","park","Female","03","tirona","mendez","2005-10-07","cavite","Single","developer","jia@gmail.com","8923984523","voter","filipino","2134","OSY","","","","");
INSERT INTO tblresidents VALUES("237","asa","asc","asc","Female","213","sdv","sscac","2008-10-05","ascas","Single","asc","ioashc@gmail.com","231412","voter","asc","123","","PWD","","","");
INSERT INTO tblresidents VALUES("238","askcb","ajsb","sdva","Female","123","asc","ascasc","2002-10-31","ascas","Single","ln","asnc@gmail.com","124124","voter","jskacn","123","","PWD","","","");
INSERT INTO tblresidents VALUES("239","lsknvn","nksdv","asdv","Male","123","asc","sdvASC","1997-10-23","ascasc","Divorced","askjbc","askvcba@gmail.com","1234124","non-voter","aslnclnas","","","PWD","","","");
INSERT INTO tblresidents VALUES("240","yul","shie","park","male","03","tirona","mendez","2005-12-28","dasmarinas","","developer","renzvanni999@gmail.com","","","filipino","","","","","","");
INSERT INTO tblresidents VALUES("247","lay","way","part","male","23","234","dsvsv","2001-10-17","cavite","widowed","jsdf","","","","filipino","","","","","","");
INSERT INTO tblresidents VALUES("248","sdlv","sndvl","sldnv","male","123","213","dksjvb","2023-10-11","smdv","single","kjsbdv","dkshv@gmail.com","","","kjsbdv","","","","Head","","");
INSERT INTO tblresidents VALUES("249","ASDAS","SADSAD","ASDASD","Male","2","AASD","ASDASD","2023-10-31","ASDASD","Divorced","ASDASD","","","","ASDASD","","N/A","","","","");
INSERT INTO tblresidents VALUES("250","KJHKH","LHKH","KJLJ","Female","2","AASD","ASDASD","2023-10-09","ILK","Married","KJB","","","","KJBKB","","N/A","","","","");
INSERT INTO tblresidents VALUES("251","YUU","UYUY","YYU","Male","2","AASD","ASDASD","2023-10-04","JGF","Widowed","URY","","","","YTYR","","N/A","","","","");
INSERT INTO tblresidents VALUES("252","SJDBV","KSDDB","YUL","Male","213","JVB","SDV","2023-10-11","SDV","Widowed","KJABS","","","","KSJBDVK","","N/A","","","","");
INSERT INTO tblresidents VALUES("253","KSDBV","SDJBV","NAKSU","Male","21","DKVBJ","SSDV","2023-10-10","JDBV","Married","JDSBAV","","","","S,DBV","","N/A","","","","");
INSERT INTO tblresidents VALUES("254","SV","SDVB","POW","Female","21","DKVBJ","SSDV","2023-10-03","S,MV","Widowed","KN","","","","SDV","","N/A","","","","");
INSERT INTO tblresidents VALUES("255","SKJDBV","SDJBV",",SDV,","Male","321","CVB","SLDV","2023-10-10","JSKDBV","Single","LKDV","","","","SDNV","","N/A","","","","");
INSERT INTO tblresidents VALUES("256","SKDVB","SDV","KLAY","Male","34","AAV","SDVA","2023-10-17","S,DV","Single","KSDJBV","","","","S,DBV","","N/A","","","","");
INSERT INTO tblresidents VALUES("257","SDV","SDKBV","BAY","Female","34","AAV","SDVA","2023-10-09","SA,BCVAS","Married","KJV","","","","KJSABK","","N/A","","","","");
INSERT INTO tblresidents VALUES("258","SDV","KSDJBV","KSJBV","Female","23","SKDVB","SKDVBJ","2023-10-10","SAB","Single","AKSJBC","","","","SA","","N/A","","","","");
INSERT INTO tblresidents VALUES("259","SDNV","SKNDV","LKSDV","Male","213","SDKJVB","KAJB","2023-10-03","SDLNV","Divorced","KJSDBDV","","","","SDV","1230000","N/A","","","","");
INSERT INTO tblresidents VALUES("260","TYSON","MANNY","MKE","Male","009","TIRONA","MENDEZ","2023-10-03","MANILA","Single","BOXER","","","","FILIPINO","001","N/A","","","","");
INSERT INTO tblresidents VALUES("261","KWU","POO","PART","Female","009","STT","MOON","2023-10-02","DJKB","Single","COOK","","","","INDIAN","099","N/A","","","","");

