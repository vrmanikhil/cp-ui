-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2017 at 10:44 AM
-- Server version: 5.6.35-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `campuspuppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE IF NOT EXISTS `achievements` (
  `achievementID` int(5) NOT NULL AUTO_INCREMENT,
  `achievementTitle` text NOT NULL,
  `achievementDescription` text NOT NULL,
  `userID` int(5) NOT NULL,
  PRIMARY KEY (`achievementID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adminAuth`
--

CREATE TABLE IF NOT EXISTS `adminAuth` (
  `adminID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminAuth`
--

INSERT INTO `adminAuth` (`adminID`, `username`, `password`) VALUES
(1, 'admin', '92eb5ffee6ae2fec3ad71c777531578f');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `college_id` int(5) NOT NULL AUTO_INCREMENT,
  `college` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college`, `logo`, `active`) VALUES
(1, 'JSS Academy of Technical Education, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/jss.png', 1),
(2, 'Greater Noida Institute of Technology, Greater Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/gniot.png', 1),
(3, 'Jaypee Institute of Information Technology, Sector 62, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/jaypee62.png', 1),
(4, 'ABES Engineering College, Ghaziabad', 'http://backoffice.campuspuppy.com/assets/collegeLogo/abesec.png', 1),
(5, 'IIMT College of Engineering, Greater Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/iimt.png', 1),
(6, 'Amity University, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(7, 'ABES Institute of Technology, Ghaziabad', 'http://backoffice.campuspuppy.com/assets/collegeLogo/abesit.jpg', 1),
(8, 'Indian Institute of Technology, Kanpur', 'http://backoffice.campuspuppy.com/assets/collegeLogo/iitk.jpg', 1),
(9, 'Institute of Engineering and Technology, Lucknow', 'http://backoffice.campuspuppy.com/assets/collegeLogo/iet.jpg', 1),
(10, 'Galgotias College of Engineering and Technology, Greater Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/galgotias.jpg', 1),
(11, 'Raj Kumar Goel Institute of Technology, Ghaziabad', 'http://backoffice.campuspuppy.com/assets/collegeLogo/rkgit.jpg', 1),
(12, 'G L Bajaj Institute of Technology and Management, Greater Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/glbajaj.jpg', 1),
(13, 'Amity University, Lucknow', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(14, 'Amity Institute of Biotechnology, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(15, 'Amity Institute of Food Technology, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(16, 'Amity School of Architecture and Planning, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(17, 'Amity School of Distance Learning, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(18, 'Amity School of Engineering and Technology, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(19, 'Amity School of Engineering, Noida', 'http://backoffice.campuspuppy.com/assets/collegeLogo/amity.png', 1),
(20, 'Ambalika Institute of Management And Technology, Lucknow', 'http://backoffice.campuspuppy.com/assets/collegeLogo/ambalika.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE IF NOT EXISTS `connections` (
  `active` int(5) NOT NULL,
  `passive` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactMessages`
--

CREATE TABLE IF NOT EXISTS `contactMessages` (
  `contactID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `message` text NOT NULL,
  `messageRead` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(5) NOT NULL AUTO_INCREMENT,
  `aboutUs` text NOT NULL,
  `termsAndConditions` text NOT NULL,
  `privacyPolicy` text NOT NULL,
  `coat` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `aboutUs`, `termsAndConditions`, `privacyPolicy`, `coat`, `facebook`, `twitter`) VALUES
(1, '<p>1This is the Test About Us</p>\r\n', '<p>1This is the Test Terms and Conditions</p>\r\n', '<p>1This is the Test Privacy Policy Page</p>\r\n', '<p>This is the Test Privacy Policy Page3f</p>', 'https://www.facebook.com/campuspuppy', 'https://www.twitter.com/campuspuppy');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(5) NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `duration` int(3) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course`, `duration`, `active`) VALUES
(1, 'Bachelor of Technology- Computer Science and Engineering', 4, 1),
(2, 'Bachelor of Technology- Information Technology', 4, 1),
(3, 'Bachelor of Computer Application', 3, 1),
(4, 'Master of Computer Application', 3, 1),
(5, 'Bachelor of Technology- Electronics and Communication Engineering', 4, 1),
(6, 'Bachelor of Technology- Mechanical Engineering	', 4, 1),
(7, 'Bachelor of Technology- Electrical Engineering', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employerUsers`
--

CREATE TABLE IF NOT EXISTS `employerUsers` (
  `userID` int(5) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `companyDescription` text NOT NULL,
  `companyWebsite` varchar(255) NOT NULL,
  `companyLogo` text NOT NULL,
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employerUsers`
--

INSERT INTO `employerUsers` (`userID`, `companyName`, `position`, `companyDescription`, `companyWebsite`, `companyLogo`) VALUES
(18, 'Fitpass', '', '<p><strong>FITPASS</strong> is your all access pass to 1250+ gyms and fitness studios in Delhi NCR. Available on iOS &amp; android, FITPASS users can freely workout anywhere, anytime however they want - gym workouts, Yoga, Zumba, Pilates, Cross Fit, Kickboxing, MMA, spinning and many many more. Priced at Rs.999 a month only, FITPASS makes fitness super affordable and accessible.</p>\r\n\r\n<p>Bolstered by a team with the strongest pedigree &ndash; Oxford, Columbia, IIT, St.Stephen&#39;s and Delhi University, with its teeth cut in UBS Investment Bank, McKinsey, the World Bank, Zomato, KPMG, etc. &ndash; we are bringing in the age of fit-tech in India!</p>\r\n\r\n<p>FITPASS is defined by our insistence on providing an unparalleled customer experience.</p>\r\n\r\n<p>Our team members are charged with bringing creativity, honesty, and intellectual rigor to their responsibilities in a never-ending quest to delight our customers. We have high expectations of each other and work as a team to build things we are all proud of.</p>\r\n\r\n<ul>\r\n</ul>', 'https://fitpass.co.in/', '');

-- --------------------------------------------------------

--
-- Table structure for table `generalUsers`
--

CREATE TABLE IF NOT EXISTS `generalUsers` (
  `userID` int(5) NOT NULL,
  `collegeID` int(5) NOT NULL,
  `courseID` int(5) NOT NULL,
  `batch` int(5) NOT NULL,
  `identityDocument` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalUsers`
--

INSERT INTO `generalUsers` (`userID`, `collegeID`, `courseID`, `batch`, `identityDocument`) VALUES
(1, 1, 1, 2016, ''),
(2, 1, 2, 2016, ''),
(3, 1, 1, 2017, ''),
(4, 1, 1, 2016, ''),
(5, 2, 1, 2017, ''),
(6, 1, 1, 2016, ''),
(7, 1, 2, 2018, ''),
(8, 1, 1, 2017, ''),
(9, 1, 5, 2019, 'http://www.campuspuppy.com/collegeID/10042017000001.jpg'),
(10, 3, 2, 2017, ''),
(11, 3, 2, 2017, 'http://www.campuspuppy.com/collegeID/10042017000002.jpg'),
(12, 1, 2, 2018, 'http://www.campuspuppy.com/collegeID/10042017000003.jpg'),
(13, 1, 2, 2018, ''),
(14, 1, 1, 2017, ''),
(15, 1, 2, 2018, ''),
(16, 1, 1, 2018, ''),
(17, 1, 6, 2017, '');

-- --------------------------------------------------------

--
-- Table structure for table `indianCities`
--

CREATE TABLE IF NOT EXISTS `indianCities` (
  `cityID` int(5) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=568 ;

--
-- Dumping data for table `indianCities`
--

INSERT INTO `indianCities` (`cityID`, `city`, `state`) VALUES
(1, 'Adilabad', 'Telangana'),
(2, 'Agra', 'Uttar Pradesh'),
(3, 'Ahmed Nagar', 'Maharashtra'),
(4, 'Ahmedabad City', 'Gujarat'),
(5, 'Aizawl', 'Mizoram'),
(6, 'Ajmer', 'Rajasthan'),
(7, 'Akola', 'Maharashtra'),
(8, 'Aligarh', 'Uttar Pradesh'),
(9, 'Allahabad', 'Uttar Pradesh'),
(10, 'Alleppey', 'Kerala'),
(11, 'Almora', 'Uttarakhand'),
(12, 'Alwar', 'Rajasthan'),
(13, 'Alwaye', 'Kerala'),
(14, 'Amalapuram', 'Andhra Pradesh'),
(15, 'Ambala', 'Haryana'),
(16, 'Ambedkar Nagar', 'Uttar Pradesh'),
(17, 'Amravati', 'Maharashtra'),
(18, 'Amreli', 'Gujarat'),
(19, 'Amritsar', 'Punjab'),
(20, 'Anakapalle', 'Andhra Pradesh'),
(21, 'Anand', 'Gujarat'),
(22, 'Anantapur', 'Andhra Pradesh'),
(23, 'Ananthnag', 'Jammu & Kashmir'),
(24, 'Anna Road H.O', 'Tamil Nadu'),
(25, 'Arakkonam', 'Tamil Nadu'),
(26, 'Asansol', 'West Bengal'),
(27, 'Aska', 'Odisha'),
(28, 'Auraiya', 'Uttar Pradesh'),
(29, 'Aurangabad', 'Maharashtra'),
(30, 'Aurangabad(Bihar)', 'Bihar'),
(31, 'Azamgarh', 'Uttar Pradesh'),
(32, 'Bagalkot', 'Karnataka'),
(33, 'Bageshwar', 'Uttarakhand'),
(34, 'Bagpat', 'Uttar Pradesh'),
(35, 'Bahraich', 'Uttar Pradesh'),
(36, 'Balaghat', 'Madhya Pradesh'),
(37, 'Balangir', 'Odisha'),
(38, 'Balasore', 'Odisha'),
(39, 'Ballia', 'Uttar Pradesh'),
(40, 'Balrampur', 'Uttar Pradesh'),
(41, 'Banasanktha', 'Gujarat'),
(42, 'Banda', 'Uttar Pradesh'),
(43, 'Bandipur', 'Jammu & Kashmir'),
(44, 'Bankura', 'West Bengal'),
(45, 'Banswara', 'Rajasthan'),
(46, 'Barabanki', 'Uttar Pradesh'),
(47, 'Baramulla', 'Jammu & Kashmir'),
(48, 'Baran', 'Rajasthan'),
(49, 'Bardoli', 'Gujarat'),
(50, 'Bareilly', 'Uttar Pradesh'),
(51, 'Barmer', 'Rajasthan'),
(52, 'Barnala', 'Punjab'),
(53, 'Barpeta', 'Assam'),
(54, 'Bastar', 'Chattisgarh'),
(55, 'Basti', 'Uttar Pradesh'),
(56, 'Bathinda', 'Punjab'),
(57, 'Beed', 'Maharashtra'),
(58, 'Begusarai', 'Bihar'),
(59, 'Belgaum', 'Karnataka'),
(60, 'Bellary', 'Karnataka'),
(61, 'Bengaluru East', 'Karnataka'),
(62, 'Bengaluru South', 'Karnataka'),
(63, 'Bengaluru West', 'Karnataka'),
(64, 'Berhampur', 'Odisha'),
(65, 'Bhadrak', 'Odisha'),
(66, 'Bhagalpur', 'Bihar'),
(67, 'Bhandara', 'Maharashtra'),
(68, 'Bharatpur', 'Rajasthan'),
(69, 'Bharuch', 'Gujarat'),
(70, 'Bhavnagar', 'Gujarat'),
(71, 'Bhilwara', 'Rajasthan'),
(72, 'Bhimavaram', 'Andhra Pradesh'),
(73, 'Bhiwani', 'Haryana'),
(74, 'Bhojpur', 'Bihar'),
(75, 'Bhopal', 'Madhya Pradesh'),
(76, 'Bhubaneswar', 'Odisha'),
(77, 'Bidar', 'Karnataka'),
(78, 'Bijapur', 'Karnataka'),
(79, 'Bijnor', 'Uttar Pradesh'),
(80, 'Bikaner', 'Rajasthan'),
(81, 'Bilaspur', 'Chattisgarh'),
(82, 'Birbhum', 'West Bengal'),
(83, 'Bishnupur', 'Manipur'),
(84, 'Bongaigaon', 'Assam'),
(85, 'Budaun', 'Uttar Pradesh'),
(86, 'Budgam', 'Jammu & Kashmir'),
(87, 'Bulandshahr', 'Uttar Pradesh'),
(88, 'Buldhana', 'Maharashtra'),
(89, 'Bundi', 'Rajasthan'),
(90, 'Burdwan', 'West Bengal'),
(91, 'Cachar', 'Assam'),
(92, 'Calicut', 'Kerala'),
(93, 'Carnicobar', 'Andaman & Nicobar Islands'),
(94, 'Chamba', 'Himachal Pradesh'),
(95, 'Chamoli', 'Uttarakhand'),
(96, 'Champawat', 'Uttarakhand'),
(97, 'Champhai', 'Mizoram'),
(98, 'Chandauli', 'Uttar Pradesh'),
(99, 'Chandel', 'Manipur'),
(100, 'Chandigarh', 'Chandigarh'),
(101, 'Chandrapur', 'Maharashtra'),
(102, 'Changanacherry', 'Kerala'),
(103, 'Changlang', 'Arunachal Pradesh'),
(104, 'Channapatna', 'Karnataka'),
(105, 'Chengalpattu', 'Tamil Nadu'),
(106, 'Chennai City Central', 'Tamil Nadu'),
(107, 'Chennai City North', 'Tamil Nadu'),
(108, 'Chennai City South', 'Tamil Nadu'),
(109, 'Chhatarpur', 'Madhya Pradesh'),
(110, 'Chhindwara', 'Madhya Pradesh'),
(111, 'Chikmagalur', 'Karnataka'),
(112, 'Chikodi', 'Karnataka'),
(113, 'Chitradurga', 'Karnataka'),
(114, 'Chitrakoot', 'Uttar Pradesh'),
(115, 'Chittoor', 'Andhra Pradesh'),
(116, 'Chittorgarh', 'Rajasthan'),
(117, 'Churachandpur', 'Manipur'),
(118, 'Churu', 'Rajasthan'),
(119, 'Coimbatore', 'Tamil Nadu'),
(120, 'Contai', 'West Bengal'),
(121, 'Cooch Behar', 'West Bengal'),
(122, 'Cuddalore', 'Tamil Nadu'),
(123, 'Cuddapah', 'Andhra Pradesh'),
(124, 'Cuttack City', 'Odisha'),
(125, 'Cuttack North', 'Odisha'),
(126, 'Cuttack South', 'Odisha'),
(127, 'Dadra & Nagar Haveli', 'Dadra & Nagar Haveli'),
(128, 'Daman', 'Daman & Diu'),
(129, 'Darbhanga', 'Bihar'),
(130, 'Darjiling', 'West Bengal'),
(131, 'Darrang', 'Assam'),
(132, 'Dausa', 'Rajasthan'),
(133, 'Dehra Gopipur', 'Himachal Pradesh'),
(134, 'Dehradun', 'Uttarakhand'),
(135, 'New Delhi', 'Delhi'),
(136, 'Deoria', 'Uttar Pradesh'),
(137, 'Dhalai', 'Tripura'),
(138, 'Dhanbad', 'Jharkhand'),
(139, 'Dharamsala', 'Himachal Pradesh'),
(140, 'Dharmapuri', 'Tamil Nadu'),
(141, 'Dharwad', 'Karnataka'),
(142, 'Dhemaji', 'Assam'),
(143, 'Dhenkanal', 'Odisha'),
(144, 'Dholpur', 'Rajasthan'),
(145, 'Dhubri', 'Assam'),
(146, 'Dhule', 'Maharashtra'),
(147, 'Dibang Valley', 'Arunachal Pradesh'),
(148, 'Dibrugarh', 'Assam'),
(149, 'Diglipur', 'Andaman & Nicobar Islands'),
(150, 'Dimapur', 'Nagaland'),
(151, 'Dindigul', 'Tamil Nadu'),
(152, 'Diu', 'Daman & Diu'),
(153, 'Doda', 'Jammu & Kashmir'),
(154, 'Dungarpur', 'Rajasthan'),
(155, 'Durg', 'Chattisgarh'),
(156, 'East Champaran', 'Bihar'),
(157, 'East Garo Hills', 'Meghalaya'),
(158, 'East Kameng', 'Arunachal Pradesh'),
(159, 'East Khasi Hills', 'Meghalaya'),
(160, 'East Siang', 'Arunachal Pradesh'),
(161, 'East Sikkim', 'Sikkim'),
(162, 'Eluru', 'Andhra Pradesh'),
(163, 'Ernakulam', 'Kerala'),
(164, 'Erode', 'Tamil Nadu'),
(165, 'Etah', 'Uttar Pradesh'),
(166, 'Etawah', 'Uttar Pradesh'),
(167, 'Faizabad', 'Uttar Pradesh'),
(168, 'Faridabad', 'Haryana'),
(169, 'Faridkot', 'Punjab'),
(170, 'Farrukhabad', 'Uttar Pradesh'),
(171, 'Fatehgarh Sahib', 'Punjab'),
(172, 'Fatehpur', 'Uttar Pradesh'),
(173, 'Fazilka', 'Punjab'),
(174, 'Ferrargunj', 'Andaman & Nicobar Islands'),
(175, 'Firozabad', 'Uttar Pradesh'),
(176, 'Firozpur', 'Punjab'),
(177, 'Gadag', 'Karnataka'),
(178, 'Gadchiroli', 'Maharashtra'),
(179, 'Gandhinagar', 'Gujarat'),
(180, 'Ganganagar', 'Rajasthan'),
(181, 'Gautam Buddha Nagar', 'Uttar Pradesh'),
(182, 'Gaya', 'Bihar'),
(183, 'Ghaziabad', 'Uttar Pradesh'),
(184, 'Ghazipur', 'Uttar Pradesh'),
(185, 'Giridih', 'Jharkhand'),
(186, 'Goa', 'Goa'),
(187, 'Goalpara', 'Assam'),
(188, 'Gokak', 'Karnataka'),
(189, 'Golaghat', 'Assam'),
(190, 'Gonda', 'Uttar Pradesh'),
(191, 'Gondal', 'Gujarat'),
(192, 'Gondia', 'Maharashtra'),
(193, 'Gorakhpur', 'Uttar Pradesh'),
(194, 'Gudivada', 'Andhra Pradesh'),
(195, 'Gudur', 'Andhra Pradesh'),
(196, 'Gulbarga', 'Karnataka'),
(197, 'Guna', 'Madhya Pradesh'),
(198, 'Guntur', 'Andhra Pradesh'),
(199, 'Gurdaspur', 'Punjab'),
(200, 'Gurugram', 'Haryana'),
(201, 'Gwalior', 'Madhya Pradesh'),
(202, 'Hailakandi', 'Assam'),
(203, 'Hamirpur', 'Himachal Pradesh'),
(204, 'Hamirpur', 'Uttar Pradesh'),
(205, 'Hanamkonda', 'Telangana'),
(206, 'Hanumangarh', 'Rajasthan'),
(207, 'Hardoi', 'Uttar Pradesh'),
(208, 'Haridwar', 'Uttarakhand'),
(209, 'Hassan', 'Karnataka'),
(210, 'Hathras', 'Uttar Pradesh'),
(211, 'Haveri', 'Karnataka'),
(212, 'Hazaribagh', 'Jharkhand'),
(213, 'Hindupur', 'Andhra Pradesh'),
(214, 'Hingoli', 'Maharashtra'),
(215, 'Hissar', 'Haryana'),
(216, 'Hooghly', 'West Bengal'),
(217, 'Hoshangabad', 'Madhya Pradesh'),
(218, 'Hoshiarpur', 'Punjab'),
(219, 'Howrah', 'West Bengal'),
(220, 'Hut Bay', 'Andaman & Nicobar Islands'),
(221, 'Hyderabad City', 'Telangana'),
(222, 'Hyderabad South East', 'Telangana'),
(223, 'Idukki', 'Kerala'),
(224, 'Imphal East', 'Manipur'),
(225, 'Imphal West', 'Manipur'),
(226, 'Indore City', 'Madhya Pradesh'),
(227, 'Indore Moffusil', 'Madhya Pradesh'),
(228, 'Irinjalakuda', 'Kerala'),
(229, 'Jabalpur', 'Madhya Pradesh'),
(230, 'Jaintia Hills', 'Meghalaya'),
(231, 'Jaipur', 'Rajasthan'),
(232, 'Jaisalmer', 'Rajasthan'),
(233, 'Jalandhar', 'Punjab'),
(234, 'Jalaun', 'Uttar Pradesh'),
(235, 'Jalgaon', 'Maharashtra'),
(236, 'Jalna', 'Maharashtra'),
(237, 'Jalor', 'Rajasthan'),
(238, 'Jalpaiguri', 'West Bengal'),
(239, 'Jammu', 'Jammu & Kashmir'),
(240, 'Jamnagar', 'Gujarat'),
(241, 'Jaunpur', 'Uttar Pradesh'),
(242, 'Jhalawar', 'Rajasthan'),
(243, 'Jhansi', 'Uttar Pradesh'),
(244, 'Jhujhunu', 'Rajasthan'),
(245, 'Jodhpur', 'Rajasthan'),
(246, 'Jorhat', 'Assam'),
(247, 'Junagadh', 'Gujarat'),
(248, 'Jyotiba Phule Nagar', 'Uttar Pradesh'),
(249, 'Kakinada', 'Andhra Pradesh'),
(250, 'Kalahandi', 'Odisha'),
(251, 'Kamrup', 'Assam'),
(252, 'Kanchipuram', 'Tamil Nadu'),
(253, 'Kannauj', 'Uttar Pradesh'),
(254, 'Kanniyakumari', 'Tamil Nadu'),
(255, 'Kannur', 'Kerala'),
(256, 'Kanpur Dehat', 'Uttar Pradesh'),
(257, 'Kanpur Nagar', 'Uttar Pradesh'),
(258, 'Kapurthala', 'Punjab'),
(259, 'Karaikal', 'Poducherry'),
(260, 'Karaikudi', 'Tamil Nadu'),
(261, 'Karauli', 'Rajasthan'),
(262, 'Karbi Anglong', 'Assam'),
(263, 'Kargil', 'Jammu & Kashmir'),
(264, 'Karimganj', 'Assam'),
(265, 'Karimnagar', 'Telangana'),
(266, 'Karnal', 'Haryana'),
(267, 'Karur', 'Tamil Nadu'),
(268, 'Karwar', 'Karnataka'),
(269, 'Kasaragod', 'Kerala'),
(270, 'Kathua', 'Jammu & Kashmir'),
(271, 'Kaushambi', 'Uttar Pradesh'),
(272, 'Keonjhar', 'Odisha'),
(273, 'Khammam', 'Andhra Pradesh'),
(274, 'Khammam', 'Telangana'),
(275, 'Khandwa', 'Madhya Pradesh'),
(276, 'Kheda', 'Gujarat'),
(277, 'Kheri', 'Uttar Pradesh'),
(278, 'Kiphire', 'Nagaland'),
(279, 'Kodagu', 'Karnataka'),
(280, 'Kohima', 'Nagaland'),
(281, 'Kokrajhar', 'Assam'),
(282, 'Kolar', 'Karnataka'),
(283, 'Kolasib', 'Mizoram'),
(284, 'Kolhapur', 'Maharashtra'),
(285, 'Kolkata', 'West Bengal'),
(286, 'Koraput', 'Odisha'),
(287, 'Kota', 'Rajasthan'),
(288, 'Kottayam', 'Kerala'),
(289, 'Kovilpatti', 'Tamil Nadu'),
(290, 'Krishnagiri', 'Tamil Nadu'),
(291, 'Kulgam', 'Jammu & Kashmir'),
(292, 'Kumbakonam', 'Tamil Nadu'),
(293, 'Kupwara', 'Jammu & Kashmir'),
(294, 'Kurnool', 'Andhra Pradesh'),
(295, 'Kurukshetra', 'Haryana'),
(296, 'Kurung Kumey', 'Arunachal Pradesh'),
(297, 'Kushinagar', 'Uttar Pradesh'),
(298, 'Kutch', 'Gujarat'),
(299, 'Lakhimpur', 'Assam'),
(300, 'Lakshadweep', 'Lakshadweep'),
(301, 'Lalitpur', 'Uttar Pradesh'),
(302, 'Latur', 'Maharashtra'),
(303, 'Lawngtlai', 'Mizoram'),
(304, 'Leh', 'Jammu & Kashmir'),
(305, 'Lohit', 'Arunachal Pradesh'),
(306, 'Longleng', 'Nagaland'),
(307, 'Lower Subansiri', 'Arunachal Pradesh'),
(308, 'Lucknow', 'Uttar Pradesh'),
(309, 'Ludhiana', 'Punjab'),
(310, 'Lunglei', 'Mizoram'),
(311, 'Machilipatnam', 'Andhra Pradesh'),
(312, 'Madhubani', 'Bihar'),
(313, 'Madurai', 'Tamil Nadu'),
(314, 'Mahabubnagar', 'Telangana'),
(315, 'Maharajganj', 'Uttar Pradesh'),
(316, 'Mahesana', 'Gujarat'),
(317, 'Mahoba', 'Uttar Pradesh'),
(318, 'Mainpuri', 'Uttar Pradesh'),
(319, 'Malda', 'West Bengal'),
(320, 'Mammit', 'Mizoram'),
(321, 'Mandi', 'Himachal Pradesh'),
(322, 'Mandsaur', 'Madhya Pradesh'),
(323, 'Mandya', 'Karnataka'),
(324, 'Mangalore', 'Karnataka'),
(325, 'Manjeri', 'Kerala'),
(326, 'Mansa', 'Punjab'),
(327, 'Marigaon', 'Assam'),
(328, 'Mathura', 'Uttar Pradesh'),
(329, 'Mau', 'Uttar Pradesh'),
(330, 'Mavelikara', 'Kerala'),
(331, 'Mayabander', 'Andaman & Nicobar Islands'),
(332, 'Mayiladuthurai', 'Tamil Nadu'),
(333, 'Mayurbhanj', 'Odisha'),
(334, 'Medak', 'Telangana'),
(335, 'Meerut', 'Uttar Pradesh'),
(336, 'Meghalaya', 'Meghalaya'),
(337, 'Midnapore', 'West Bengal'),
(338, 'Mirzapur', 'Uttar Pradesh'),
(339, 'Moga', 'Punjab'),
(340, 'Mohali', 'Punjab'),
(341, 'Mokokchung', 'Nagaland'),
(342, 'Mon', 'Nagaland'),
(343, 'Monghyr', 'Bihar'),
(344, 'Moradabad', 'Uttar Pradesh'),
(345, 'Morena', 'Madhya Pradesh'),
(346, 'Muktsar', 'Punjab'),
(347, 'Mumbai', 'Maharashtra'),
(348, 'Murshidabad', 'West Bengal'),
(349, 'Muzaffarnagar', 'Uttar Pradesh'),
(350, 'Muzaffarpur', 'Bihar'),
(351, 'Mysore', 'Karnataka'),
(352, 'Nadia', 'West Bengal'),
(353, 'Nagaon', 'Assam'),
(354, 'Nagapattinam', 'Tamil Nadu'),
(355, 'Nagaur', 'Rajasthan'),
(356, 'Nagpur', 'Maharashtra'),
(357, 'Nainital', 'Uttarakhand'),
(358, 'Nalanda', 'Bihar'),
(359, 'Nalbari', 'Assam'),
(360, 'Nalgonda', 'Telangana'),
(361, 'Namakkal', 'Tamil Nadu'),
(362, 'Nancorie', 'Andaman & Nicobar Islands'),
(363, 'Nancowrie', 'Andaman & Nicobar Islands'),
(364, 'Nanded', 'Maharashtra'),
(365, 'Nandurbar', 'Maharashtra'),
(366, 'Nandyal', 'Andhra Pradesh'),
(367, 'Nanjangud', 'Karnataka'),
(368, 'Narasaraopet', 'Andhra Pradesh'),
(369, 'Nashik', 'Maharashtra'),
(370, 'Navsari', 'Gujarat'),
(371, 'Nawadha', 'Bihar'),
(372, 'Nawanshahr', 'Punjab'),
(373, 'Nellore', 'Andhra Pradesh'),
(374, 'Nilgiris', 'Tamil Nadu'),
(375, 'Nizamabad', 'Telangana'),
(376, 'North 24 Parganas', 'West Bengal'),
(377, 'North Cachar Hills', 'Assam'),
(378, 'North Dinajpur', 'West Bengal'),
(379, 'North Sikkim', 'Sikkim'),
(380, 'North Tripura', 'Tripura'),
(381, 'Osmanabad', 'Maharashtra'),
(382, 'Ottapalam', 'Kerala'),
(383, 'Palamau', 'Jharkhand'),
(384, 'Palghat', 'Kerala'),
(385, 'Pali', 'Rajasthan'),
(386, 'Panchmahals', 'Gujarat'),
(387, 'Papum Pare', 'Arunachal Pradesh'),
(388, 'Parbhani', 'Maharashtra'),
(389, 'Parvathipuram', 'Andhra Pradesh'),
(390, 'Patan', 'Gujarat'),
(391, 'Pathanamthitta', 'Kerala'),
(392, 'Patiala', 'Punjab'),
(393, 'Patna', 'Bihar'),
(394, 'Pattukottai', 'Tamil Nadu'),
(395, 'Pauri Garhwal', 'Uttarakhand'),
(396, 'Peddapalli', 'Telangana'),
(397, 'Peren', 'Nagaland'),
(398, 'Phek', 'Nagaland'),
(399, 'Phulbani', 'Odisha'),
(400, 'Pilibhit', 'Uttar Pradesh'),
(401, 'Pithoragarh', 'Uttarakhand'),
(402, 'Poducherry', 'Poducherry'),
(403, 'Poducherry', 'Tamil Nadu'),
(404, 'Pollachi', 'Tamil Nadu'),
(405, 'Poonch', 'Jammu & Kashmir'),
(406, 'Porbandar', 'Gujarat'),
(407, 'Port  Blair', 'Andaman & Nicobar Islands'),
(408, 'Port Blair', 'Andaman & Nicobar Islands'),
(409, 'Portblair', 'Andaman & Nicobar Islands'),
(410, 'Prakasam', 'Andhra Pradesh'),
(411, 'Pratapgarh', 'Uttar Pradesh'),
(412, 'Proddatur', 'Andhra Pradesh'),
(413, 'Pudukkottai', 'Tamil Nadu'),
(414, 'Pulwama', 'Jammu & Kashmir'),
(415, 'Pune', 'Maharashtra'),
(416, 'Puri', 'Odisha'),
(417, 'Purnea', 'Bihar'),
(418, 'Purulia', 'West Bengal'),
(419, 'Puttur', 'Karnataka'),
(420, 'Quilon', 'Kerala'),
(421, 'Raebareli', 'Uttar Pradesh'),
(422, 'Raichur', 'Karnataka'),
(423, 'Raigarh', 'Chattisgarh'),
(424, 'Raigarh(MH)', 'Maharashtra'),
(425, 'Raipur', 'Chattisgarh'),
(426, 'Rajahmundry', 'Andhra Pradesh'),
(427, 'Rajauri', 'Jammu & Kashmir'),
(428, 'Rajkot', 'Gujarat'),
(429, 'Rajsamand', 'Rajasthan'),
(430, 'Ramanathapuram', 'Tamil Nadu'),
(431, 'Rampur', 'Uttar Pradesh'),
(432, 'Rampur Bushahr', 'Himachal Pradesh'),
(433, 'Ranchi', 'Jharkhand'),
(434, 'Rangat', 'Andaman & Nicobar Islands'),
(435, 'Ratlam', 'Madhya Pradesh'),
(436, 'Ratnagiri', 'Maharashtra'),
(437, 'Reasi', 'Jammu & Kashmir'),
(438, 'Rewa', 'Madhya Pradesh'),
(439, 'Ri Bhoi', 'Meghalaya'),
(440, 'Rohtak', 'Haryana'),
(441, 'Rohtas', 'Bihar'),
(442, 'Ropar', 'Punjab'),
(443, 'Rudraprayag', 'Uttarakhand'),
(444, 'Rupnagar', 'Punjab'),
(445, 'Sabarkantha', 'Gujarat'),
(446, 'Sagar', 'Madhya Pradesh'),
(447, 'Saharanpur', 'Uttar Pradesh'),
(448, 'Saharsa', 'Bihar'),
(449, 'Salem East', 'Tamil Nadu'),
(450, 'Salem West', 'Tamil Nadu'),
(451, 'Samastipur', 'Bihar'),
(452, 'Sambalpur', 'Odisha'),
(453, 'Sangareddy', 'Telangana'),
(454, 'Sangli', 'Maharashtra'),
(455, 'Sangrur', 'Punjab'),
(456, 'Sant Kabir Nagar', 'Uttar Pradesh'),
(457, 'Sant Ravidas Nagar', 'Uttar Pradesh'),
(458, 'Santhal Parganas', 'Jharkhand'),
(459, 'Saran', 'Bihar'),
(460, 'Satara', 'Maharashtra'),
(461, 'Sawai Madhopur', 'Rajasthan'),
(462, 'Secunderabad', 'Telangana'),
(463, 'Sehore', 'Madhya Pradesh'),
(464, 'Senapati', 'Manipur'),
(465, 'Serchhip', 'Mizoram'),
(466, 'Shahdol', 'Madhya Pradesh'),
(467, 'Shahjahanpur', 'Uttar Pradesh'),
(468, 'Shimla', 'Himachal Pradesh'),
(469, 'Shimoga', 'Karnataka'),
(470, 'Shrawasti', 'Uttar Pradesh'),
(471, 'Sibsagar', 'Assam'),
(472, 'Siddharthnagar', 'Uttar Pradesh'),
(473, 'Sikar', 'Rajasthan'),
(474, 'Sindhudurg', 'Maharashtra'),
(475, 'Singhbhum', 'Jharkhand'),
(476, 'Sirohi', 'Rajasthan'),
(477, 'Sirsi', 'Karnataka'),
(478, 'Sitamarhi', 'Bihar'),
(479, 'Sitapur', 'Uttar Pradesh'),
(480, 'Sivaganga', 'Tamil Nadu'),
(481, 'Siwan', 'Bihar'),
(482, 'Solan', 'Himachal Pradesh'),
(483, 'Solapur', 'Maharashtra'),
(484, 'Sonbhadra', 'Uttar Pradesh'),
(485, 'Sonepat', 'Haryana'),
(486, 'Sonitpur', 'Assam'),
(487, 'South 24 Parganas', 'West Bengal'),
(488, 'South Dinajpur', 'West Bengal'),
(489, 'South Garo Hills', 'Meghalaya'),
(490, 'South Sikkim', 'Sikkim'),
(491, 'South Tripura', 'Tripura'),
(492, 'Srikakulam', 'Andhra Pradesh'),
(493, 'Srinagar', 'Jammu & Kashmir'),
(494, 'Srirangam', 'Tamil Nadu'),
(495, 'Sultanpur', 'Uttar Pradesh'),
(496, 'Sundargarh', 'Odisha'),
(497, 'Surat', 'Gujarat'),
(498, 'Surendranagar', 'Gujarat'),
(499, 'Suryapet', 'Telangana'),
(500, 'Tadepalligudem', 'Andhra Pradesh'),
(501, 'Tambaram', 'Tamil Nadu'),
(502, 'Tamenglong', 'Manipur'),
(503, 'Tamluk', 'West Bengal'),
(504, 'Tarn Taran', 'Punjab'),
(505, 'Tawang', 'Arunachal Pradesh'),
(506, 'Tehri Garhwal', 'Uttarakhand'),
(507, 'Tenali', 'Andhra Pradesh'),
(508, 'Thalassery', 'Kerala'),
(509, 'Thane', 'Maharashtra'),
(510, 'Thanjavur', 'Tamil Nadu'),
(511, 'Theni', 'Tamil Nadu'),
(512, 'Thoubal', 'Manipur'),
(513, 'Tinsukia', 'Assam'),
(514, 'Tirap', 'Arunachal Pradesh'),
(515, 'Tiruchirapalli', 'Tamil Nadu'),
(516, 'Tirunelveli', 'Tamil Nadu'),
(517, 'Tirupati', 'Andhra Pradesh'),
(518, 'Tirupattur', 'Tamil Nadu'),
(519, 'Tirupur', 'Tamil Nadu'),
(520, 'Tirur', 'Kerala'),
(521, 'Tiruvalla', 'Kerala'),
(522, 'Tiruvannamalai', 'Tamil Nadu'),
(523, 'Tonk', 'Rajasthan'),
(524, 'Trichur', 'Kerala'),
(525, 'Trivandrum North', 'Kerala'),
(526, 'Trivandrum South', 'Kerala'),
(527, 'Tuensang', 'Nagaland'),
(528, 'Tumkur', 'Karnataka'),
(529, 'Tuticorin', 'Tamil Nadu'),
(530, 'Udaipur', 'Rajasthan'),
(531, 'Udham Singh Nagar', 'Uttarakhand'),
(532, 'Udhampur', 'Jammu & Kashmir'),
(533, 'Udupi', 'Karnataka'),
(534, 'Ujjain', 'Madhya Pradesh'),
(535, 'Ukhrul', 'Manipur'),
(536, 'Una', 'Himachal Pradesh'),
(537, 'Unnao', 'Uttar Pradesh'),
(538, 'Upper Siang', 'Arunachal Pradesh'),
(539, 'Upper Subansiri', 'Arunachal Pradesh'),
(540, 'Uttarkashi', 'Uttarakhand'),
(541, 'Vadakara', 'Kerala'),
(542, 'Vadodara East', 'Gujarat'),
(543, 'Vadodara West', 'Gujarat'),
(544, 'Vaishali', 'Bihar'),
(545, 'Valsad', 'Gujarat'),
(546, 'Varanasi', 'Uttar Pradesh'),
(547, 'Vellore', 'Tamil Nadu'),
(548, 'Vidisha', 'Madhya Pradesh'),
(549, 'Vijayawada', 'Andhra Pradesh'),
(550, 'Virudhunagar', 'Tamil Nadu'),
(551, 'Visakhapatnam', 'Andhra Pradesh'),
(552, 'Vizianagaram', 'Andhra Pradesh'),
(553, 'Vriddhachalam', 'Tamil Nadu'),
(554, 'Wanaparthy', 'Telangana'),
(555, 'Warangal', 'Telangana'),
(556, 'Wardha', 'Maharashtra'),
(557, 'Washim', 'Maharashtra'),
(558, 'West Champaran', 'Bihar'),
(559, 'West Garo Hills', 'Meghalaya'),
(560, 'West Kameng', 'Arunachal Pradesh'),
(561, 'West Khasi Hills', 'Meghalaya'),
(562, 'West Siang', 'Arunachal Pradesh'),
(563, 'West Sikkim', 'Sikkim'),
(564, 'West Tripura', 'Tripura'),
(565, 'Wokha', 'Nagaland'),
(566, 'Yavatmal', 'Maharashtra'),
(567, 'Zunhebotto', 'Nagaland');

-- --------------------------------------------------------

--
-- Table structure for table `internshipApplicants`
--

CREATE TABLE IF NOT EXISTS `internshipApplicants` (
  `internshipID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipLocations`
--

CREATE TABLE IF NOT EXISTS `internshipLocations` (
  `internshipID` int(5) NOT NULL,
  `cityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipOffers`
--

CREATE TABLE IF NOT EXISTS `internshipOffers` (
  `internshipID` int(5) NOT NULL AUTO_INCREMENT,
  `internshipTitle` varchar(255) NOT NULL,
  `internshipType` enum('1','2') NOT NULL,
  `internshipDescription` text NOT NULL,
  `startDate` date NOT NULL,
  `applicationDeadline` date NOT NULL,
  `stipendType` enum('1','2','3','4') NOT NULL,
  `minimumStipend` int(11) NOT NULL DEFAULT '0',
  `maximumStipend` int(11) NOT NULL DEFAULT '0',
  `stipend` int(11) NOT NULL DEFAULT '0',
  `durationType` enum('1','2') NOT NULL,
  `duration` int(3) NOT NULL,
  `partTime` enum('1','2') NOT NULL,
  `openings` int(3) NOT NULL,
  `applicants` enum('1','2','3') NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `addedBy` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`internshipID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `internshipSkills`
--

CREATE TABLE IF NOT EXISTS `internshipSkills` (
  `internshipID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobApplicants`
--

CREATE TABLE IF NOT EXISTS `jobApplicants` (
  `jobID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobLocations`
--

CREATE TABLE IF NOT EXISTS `jobLocations` (
  `jobID` int(5) NOT NULL,
  `cityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobOffers`
--

CREATE TABLE IF NOT EXISTS `jobOffers` (
  `jobID` int(5) NOT NULL AUTO_INCREMENT,
  `jobTitle` varchar(255) NOT NULL,
  `jobType` enum('1','2') NOT NULL,
  `jobDescription` text NOT NULL,
  `startDate` date NOT NULL,
  `applicationDeadline` date NOT NULL,
  `offerType` enum('1','2') NOT NULL,
  `minimumOffer` float NOT NULL DEFAULT '0',
  `maximumOffer` float NOT NULL DEFAULT '0',
  `offer` float NOT NULL DEFAULT '0',
  `partTime` enum('1','2') NOT NULL,
  `openings` int(3) NOT NULL,
  `applicants` enum('1','2','3') NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `addedBy` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`jobID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobSkills`
--

CREATE TABLE IF NOT EXISTS `jobSkills` (
  `jobID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passwordToken`
--

CREATE TABLE IF NOT EXISTS `passwordToken` (
  `tokenID` int(5) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tokenType` enum('1','2') NOT NULL,
  `generatedAt` bigint(12) NOT NULL,
  `expiry` bigint(12) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tokenID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `projectID` int(5) NOT NULL AUTO_INCREMENT,
  `projectTitle` text NOT NULL,
  `projectLink` text NOT NULL,
  `projectDescription` text NOT NULL,
  `userID` int(5) NOT NULL,
  PRIMARY KEY (`projectID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(5) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` enum('1','2','3','4') NOT NULL,
  `skillID` int(5) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `skillID`, `active`) VALUES
(1, '<p>What is broadcast receiver in android?</p>', '<p>It will react on broadcast announcements.</p>', '<p>It will do background functionalities as services.</p>', '<p>It will pass the data between activities.</p>', '<p>None of the above.</p>', '1', 1, 1),
(2, '<p>What is the use of content provider in Android?</p>', '<p>To send the data from an application to another application</p>', '<p>To store the data in a database</p>', '<p>&nbsp;To share the data between applications</p>', '<p>None of the above</p>', '1', 1, 1),
(3, '<p>How much time will it take for an amount of Rs. 450 to yield Rs. 81 as interest at 4.5% per annum of simple interest?</p>', '<p>3.5 years</p>', '<p>4 years</p>', '<p>4.5 years</p>', '<p>5 years</p>', '2', 25, 1),
(4, '<p>The sum of ages of 5 children born at the intervals of 3 years each is 50 years. What is the age of the youngest child?</p>', '<p>4 years</p>', '<p>8 years</p>', '<p>10 years</p>', '<p>None of the Above</p>', '1', 25, 1),
(5, '<p>A father said to his son, &quot;I was as old as you are at the present at the time of your birth&quot;. If the father&#39;s age is 38 years now, the son&#39;s age five years back was:</p>', '<p>14 years</p>', '<p>19 years</p>', '<p>33 years</p>', '<p>38 years</p>', '1', 25, 1),
(6, '<p>A is two years older than B who is twice as old as C. If the total of the ages of A, B and C be 27, the how old is B?</p>', '<p>7</p>', '<p>8</p>', '<p>9</p>', '<p>10</p>', '4', 25, 1),
(7, '<p>Which one of the following is not a prime number?</p>', '<p>31</p>', '<p>61</p>', '<p>71</p>', '<p>91</p>', '4', 25, 1),
(8, '<p>In the first 10 overs of a cricket game, the run rate was only 3.2. What should be the run rate in the remaining 40 overs to reach the target of 282 runs?</p>', '<p>6.25</p>', '<p>6.5</p>', '<p>6.75</p>', '<p>7</p>', '1', 25, 1),
(9, '<p>The average weight of A, B and C is 45 kg. If the average weight of A and B be 40 kg and that of B and C be 43 kg, then the weight of B is:</p>', '<p>17 kg</p>', '<p>20 kg</p>', '<p>26 kg</p>', '<p>31 kg</p>', '4', 25, 1),
(10, '<p>If 20% of&nbsp;<em>a</em>&nbsp;=&nbsp;<em>b</em>, then&nbsp;<em>b</em>% of 20 is the same as</p>', '<p>4% of&nbsp;<em>a</em></p>', '<p>5% of&nbsp;<em>a</em></p>', '<p>20% of&nbsp;<em>a</em></p>', '<p>None of the Above</p>', '1', 25, 1),
(11, '<p>Two numbers A and B are such that the sum of 5% of A and 4% of B is two-third of the sum of 6% of A and 8% of B. Find the ratio of A : B.</p>', '<p>2 : 3</p>', '<p>1 : 1</p>', '<p>4 : 3</p>', '<p>3 : 4</p>', '3', 25, 1),
(12, '<p>A person crosses a 600 m long street in 5 minutes. What is his speed in km per hour?</p>', '<p>3.6</p>', '<p>7.2</p>', '<p>8.4</p>', '<p>10</p>', '2', 25, 1),
(13, '<p>If a person walks at 14 km/hr instead of 10 km/hr, he would have walked 20 km more. The actual distance travelled by him is:</p>', '<p>50</p>', '<p>56</p>', '<p>70</p>', '<p>80</p>', '1', 25, 1),
(14, '<p>Today is Monday. After 61 days, it will be:</p>', '<p>Wednesday</p>', '<p>Saturday</p>', '<p>Tuesday</p>', '<p>Thursday</p>', '2', 25, 1),
(15, '<p>Find the odd one out:&nbsp;6, 9, 15, 21, 24, 28, 30</p>', '<p>28</p>', '<p>21</p>', '<p>24</p>', '<p>30</p>', '1', 25, 1),
(16, '<p>An error 2% in excess is made while measuring the side of a square. The percentage of error in the calculated area of the square is:</p>', '<p>2%</p>', '<p>2.02%</p>', '<p>4%</p>', '<p>4.04%</p>', '4', 25, 1),
(17, '<p>The percentage increase in the area of a rectangle, if each of its sides is increased by 20% is:</p>', '<p>40%</p>', '<p>42%</p>', '<p>44%</p>', '<p>46%</p>', '3', 25, 1),
(18, '<p>A rectangular park 60 m long and 40 m wide has two concrete crossroads running in the middle of the park and rest of the park has been used as a lawn. If the area of the lawn is 2109 sq. m, then what is the width of the road?</p>', '<p>2.91 m</p>', '<p>3 m</p>', '<p>5.82 m</p>', '<p>None of the Above</p>', '2', 25, 1),
(19, '<p>In the&nbsp;series, you are&nbsp;looking at the letter pattern. Fill the blank in the middle of the series or end of the series.</p><p>SCD, TEF, UGH, ____, WKL</p>', '<p>CMN</p>', '<p>UJI</p>', '<p>VIJ</p>', '<p>IJT</p>', '3', 25, 1),
(20, '<p>Choose the word which is the exact OPPOSITE of the given word:&nbsp;ENORMOUS</p>', '<p>Soft</p>', '<p>Average</p>', '<p>Tiny</p>', '<p>Weak</p>', '3', 25, 1),
(21, '<p>Choose the word which is the exact OPPOSITE of the given word:&nbsp;EXODUS</p>', '<p>Influx</p>', '<p>Home-Coming</p>', '<p>Return</p>', '<p>Restoration</p>', '1', 25, 1),
(22, '<p>Choose the word which gives the meaning of the given word:&nbsp;CORPULENT</p>', '<p>Lean</p>', '<p>Gaunt</p>', '<p>Emaciated</p>', '<p>Obese</p>', '4', 25, 1),
(23, '<p>Choose the word which gives the meaning of the given word:&nbsp;BRIEF</p>', '<p>Limited</p>', '<p>Small</p>', '<p>Little</p>', '<p>Short</p>', '4', 25, 1),
(24, '<p>Choose the one which can be substituted for the given sentence: <em><strong>Extreme old age when a man behaves like a fool</strong></em></p>', '<p>Imbecility</p>', '<p>Senility</p>', '<p>Dotage</p>', '<p>Superannuation</p>', '3', 25, 1),
(25, '<p>Choose the one which can be substituted for the given sentence:&nbsp;<em><strong>That which cannot be corrected</strong></em></p>', '<p>Unintelligible</p>', '<p>Indelible</p>', '<p>Illegible</p>', '<p>Incorrigible</p>', '4', 25, 1),
(26, '<p>From a group of 7 men and 6 women, five persons are to be selected to form a committee so that at least 3 men are there on the committee. In how many ways can it be done?</p>', '<p>564</p>', '<p>645</p>', '<p>735</p>', '<p>756</p>', '4', 25, 1),
(27, '<p>In how many different ways can the letters of the word &#39;LEADING&#39; be arranged in such a way that the vowels always come together?</p>', '<p>360</p>', '<p>480</p>', '<p>720</p>', '<p>5040</p>', '3', 25, 1),
(28, '<p>A sum of money amounts to Rs. 9800 after 5 years and Rs. 12005 after 8 years at the same rate of simple interest. The rate of interest per annum is:</p>', '<p>5%</p>', '<p>8%</p>', '<p>12%</p>', '<p>15%</p>', '3', 25, 1),
(29, '<p>What will be the ratio of simple interest earned by certain amount at the same rate of interest for 6 years and that for 9 years?</p>', '<p>1 : 3</p>', '<p>1 : 4</p>', '<p>2 : 3</p>', '<p>Data Inadequate</p>', '3', 25, 1),
(30, '<p>In a certain store, the profit is 320% of the cost. If the cost increases by 25% but the selling price remains constant, approximately what percentage of the selling price is the profit?</p>', '<p>30%</p>', '<p>70%</p>', '<p>100%</p>', '<p>250%</p>', '2', 25, 1),
(31, '<p>In a mixture 60 litres, the ratio of milk and water 2 : 1. If this ratio is to be 1 : 2, then the quanity of water to be further added is:</p>', '<p>20 litres</p>', '<p>30 litres</p>', '<p>40 litres</p>', '<p>60 litres</p>', '4', 25, 1),
(32, '<p>The salaries A, B, C are in the ratio 2 : 3 : 5. If the increments of 15%, 10% and 20% are allowed respectively in their salaries, then what will be new ratio of their salaries?</p>', '<p>3 : 3 : 10</p>', '<p>10 : 11 : 20</p>', '<p>23 : 33 : 60</p>', '<p>Cannot be Determined</p>', '3', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skillID` int(5) NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`skillID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skillID`, `skill_name`, `active`) VALUES
(1, 'Android', 1),
(2, 'Artificial Intelligence', 1),
(3, 'Automata (Theory of Computation)', 1),
(4, 'C', 1),
(5, 'C#', 1),
(6, 'C++', 1),
(7, 'Computer Networks', 1),
(8, 'Computer Organization and Architecture', 1),
(9, 'CSS', 1),
(10, 'Cryptography', 1),
(11, 'Data Structure', 1),
(12, 'Database Management', 1),
(13, 'Design and Analysis of Algorithm', 1),
(14, 'Graphic Designing', 1),
(15, 'HTML', 1),
(16, 'Internet of Things', 1),
(17, 'JAVA', 1),
(18, 'JavaScript', 1),
(19, 'Operating Systems', 1),
(20, 'PHP', 1),
(21, 'Python', 1),
(22, '.NET', 1),
(23, 'Pattern Recognition', 1),
(24, 'Parallel Computing', 1),
(25, 'General Aptitude', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testSettings`
--

CREATE TABLE IF NOT EXISTS `testSettings` (
  `skillID` int(5) NOT NULL AUTO_INCREMENT,
  `numberQuestions` int(5) NOT NULL,
  `timeAllowed` int(5) NOT NULL,
  `passingCriteria` int(5) NOT NULL,
  PRIMARY KEY (`skillID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `testSettings`
--

INSERT INTO `testSettings` (`skillID`, `numberQuestions`, `timeAllowed`, `passingCriteria`) VALUES
(1, 10, 120, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileImage` text NOT NULL,
  `coverImage` text NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `relationshipStatus` enum('1','2','3','4') NOT NULL DEFAULT '4',
  `accountType` enum('1','2') NOT NULL,
  `cityID` int(5) NOT NULL,
  `emailVerified` tinyint(1) NOT NULL,
  `mobileVerified` tinyint(1) NOT NULL,
  `displayEMail` tinyint(1) NOT NULL,
  `displayMobile` tinyint(1) NOT NULL,
  `accountApproved` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `name`, `email`, `mobile`, `password`, `profileImage`, `coverImage`, `gender`, `relationshipStatus`, `accountType`, `cityID`, `emailVerified`, `mobileVerified`, `displayEMail`, `displayMobile`, `accountApproved`, `active`, `created_at`) VALUES
(1, '', 'Nikhil Verma', 'vrmanikhil@gmail.com', 9953017515, 'a581a9ff40d2a401f4046761dff80a4c', '', '', 'M', '4', '1', 135, 1, 1, 1, 1, 1, 1, '2017-04-09 20:09:10'),
(2, '', 'Itishri Singh', 'itishri.singh12@gmail.com', 9871983065, '279759155c3878e305e032b7b5845eda', '', '', 'M', '4', '1', 135, 1, 1, 1, 0, 1, 1, '2017-04-09 20:11:19'),
(3, '', 'Vini Maheshwari', 'vinimaheshwari02@gmail.com', 8527856687, '712e4b7a3aecab4bf2658ca3e76432a0', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 0, 1, '2017-04-09 20:16:36'),
(4, '', 'Gautam Lal', 'gautam.lal7@gmail.com', 8527312008, '17ab69fa42fa9e6812a860f3c5d1a8aa', '', '', 'M', '4', '1', 135, 1, 1, 1, 0, 0, 1, '2017-04-09 20:18:25'),
(5, '', 'Aishwarya Gupta', 'aishwaryagpt94@gmail.com', 9810047205, 'c571f50ffd6df41b879442dc9425f003', '', '', 'M', '4', '1', 135, 1, 0, 1, 0, 0, 0, '2017-04-09 20:49:51'),
(6, '', 'Prashant Chaudhary', 'prashantp099@gmail.com', 9899310579, '3075d701de5770f0016cc1f93adb05bf', '', '', 'M', '4', '1', 135, 1, 1, 1, 0, 1, 1, '2017-04-09 20:53:02'),
(7, '', 'Sakshi Jaiswal', 'jswal.sakshi@gmail.com', 9971974077, '11a98374ebec8e0c7a54751d2161804d', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 0, 1, '2017-04-09 21:02:09'),
(8, '', 'Abhay Rawat', 'abhayrawat2695@gmail.com', 8468915550, '0cc175b9c0f1b6a831c399e269772661', '', '', 'M', '4', '1', 181, 1, 1, 1, 0, 1, 1, '2017-04-09 20:57:05'),
(9, '', 'Yash Vardhan', 'yashapril30@gmail.com', 9999393132, 'a9c91bac2c315f83a55ae9fcb88c61f0', '', '', 'M', '4', '1', 181, 1, 1, 1, 0, 1, 1, '2017-04-10 10:36:44'),
(10, '', 'Shivam Goyal', 'shivam.sinew@gmail.com', 8587882383, '456b370011f154a7ce7af17ee49a76ad', '', '', 'M', '4', '1', 181, 1, 0, 1, 0, 0, 1, '2017-04-10 10:41:11'),
(11, '', 'Deergha Jain', 'deerghajain11@gmail.com', 9716150496, '0bb3b7a7855d8532e55577a502ae236e', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 1, 1, '2017-04-10 10:43:45'),
(12, '', 'Deepti Jain', 'deeptijain9676@gmail.com', 9718669382, '3036514cbad26225659717408c8d2c67', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 1, 1, '2017-04-10 10:48:37'),
(13, '', 'Suyash Tilhari', 'suyash.tilhari12@gmail.com', 8375867124, '1bbfd0943ed91f99438eead55020f85a', '', '', 'M', '4', '1', 181, 1, 0, 1, 0, 0, 1, '2017-04-10 10:50:38'),
(14, '', 'Siddharth Jain', 'sidjain2901@gmail.com', 9560839425, 'e10adc3949ba59abbe56e057f20f883e', '', '', 'M', '4', '1', 181, 1, 1, 1, 0, 1, 1, '2017-04-10 10:53:34'),
(15, '', 'Anukriti Keshari', 'anukriti.kaushki@gmail.com', 8860309313, 'e10adc3949ba59abbe56e057f20f883e', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 1, 1, '2017-04-10 10:57:26'),
(16, '', 'Salokya Srivastava', 'sriv.salokya@gmail.com', 9453847603, '62c1dc840b80b395403ad0fed7debcf6', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 0, 1, '2017-04-10 11:04:28'),
(17, '', 'Krishnapriya Agarwal', 'kp.agarwal95@gmail.com', 8882521283, 'f1c78b8f774fa7804a081a20df35874a', '', '', 'F', '4', '1', 181, 1, 1, 1, 0, 0, 1, '2017-04-10 11:07:09'),
(18, '', 'Jubika Khanna', 'jubika.khanna@fitpass.co.in', 8130995418, 'dbf3d937d4808b94e0e39b804e0bbea0', '', '', 'F', '4', '2', 135, 1, 1, 0, 0, 1, 1, '2017-05-31 18:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `userSkills`
--

CREATE TABLE IF NOT EXISTS `userSkills` (
  `userID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL,
  `score` int(5) NOT NULL,
  `testDate` bigint(12) NOT NULL,
  `skillType` enum('0','1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workExperience`
--

CREATE TABLE IF NOT EXISTS `workExperience` (
  `weID` int(5) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startMonth` varchar(255) NOT NULL,
  `startYear` int(4) NOT NULL,
  `endMonth` varchar(255) NOT NULL,
  `endYear` int(4) NOT NULL,
  `userID` int(5) NOT NULL,
  PRIMARY KEY (`weID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
