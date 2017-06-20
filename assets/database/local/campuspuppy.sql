-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2017 at 05:00 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campuspuppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achievementID` int(5) NOT NULL,
  `achievementTitle` text NOT NULL,
  `achievementDescription` text NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adminAuth`
--

CREATE TABLE `adminAuth` (
  `adminID` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminAuth`
--

INSERT INTO `adminAuth` (`adminID`, `username`, `password`) VALUES
(1, 'admin', '92eb5ffee6ae2fec3ad71c777531578f');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(5) NOT NULL,
  `college` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `connections` (
  `active` int(5) NOT NULL,
  `passive` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`active`, `passive`, `status`) VALUES
(1, 6, 1),
(1, 2, 1),
(17, 1, 0),
(1, 4, 1),
(1, 3, 1),
(1, 10, 0),
(11, 1, 0),
(12, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactMessages`
--

CREATE TABLE `contactMessages` (
  `contactID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `message` text NOT NULL,
  `messageRead` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactMessages`
--

INSERT INTO `contactMessages` (`contactID`, `name`, `email`, `mobile`, `message`, `messageRead`, `created_at`) VALUES
(1, 'Nikhil Verma', 'vrmanikhil@gmail.com', 7503705892, 'Good Morning', 0, '2017-06-18 10:47:34'),
(2, 'Hello', 'hello@abc.com', 9953017515, 'abc', 0, '2017-06-18 10:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(5) NOT NULL,
  `aboutUs` text NOT NULL,
  `termsAndConditions` text NOT NULL,
  `privacyPolicy` text NOT NULL,
  `coat` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `aboutUs`, `termsAndConditions`, `privacyPolicy`, `coat`, `facebook`, `twitter`) VALUES
(1, '<p>1This is the Test About Us</p>\r\n', '<p>1This is the Test Terms and Conditions</p>\r\n', '<p>1This is the Test Privacy Policy Page</p>\r\n', '<p>This is the Test Privacy Policy Page3f</p>', 'https://www.facebook.com/campuspuppy', 'https://www.twitter.com/campuspuppy');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(5) NOT NULL,
  `course` varchar(255) NOT NULL,
  `duration` int(3) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `employerUsers` (
  `userID` int(5) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `companyDescription` text NOT NULL,
  `companyWebsite` varchar(255) NOT NULL,
  `companyLogo` varchar(1000) NOT NULL DEFAULT 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employerUsers`
--

INSERT INTO `employerUsers` (`userID`, `companyName`, `position`, `companyDescription`, `companyWebsite`, `companyLogo`) VALUES
(18, 'Fitpass', 'HR', '<p><strong>FITPASS</strong> is your all access pass to 1250+ gyms and fitness studios in Delhi NCR. Available on iOS &amp; android, FITPASS users can freely workout anywhere, anytime however they want - gym workouts, Yoga, Zumba, Pilates, Cross Fit, Kickboxing, MMA, spinning and many many more. Priced at Rs.999 a month only, FITPASS makes fitness super affordable and accessible.</p>\r\n\r\n<p>Bolstered by a team with the strongest pedigree &ndash; Oxford, Columbia, IIT, St.Stephen&#39;s and Delhi University, with its teeth cut in UBS Investment Bank, McKinsey, the World Bank, Zomato, KPMG, etc. &ndash; we are bringing in the age of fit-tech in India!</p>\r\n\r\n<p>FITPASS is defined by our insistence on providing an unparalleled customer experience.</p>\r\n\r\n<p>Our team members are charged with bringing creativity, honesty, and intellectual rigor to their responsibilities in a never-ending quest to delight our customers. We have high expectations of each other and work as a team to build things we are all proud of.</p>\r\n\r\n<ul>\r\n</ul>', 'https://fitpass.co.in/', 'http://backoffice.campuspuppy.com/assets/companyLogo/fitpass.jpg'),
(19, 'Wisethink Information Solutions Pvt Ltd', 'HR', '', 'http://wisethinksolutions.com/', 'http://backoffice.campuspuppy.com/assets/companyLogo/wisethink.jpg'),
(20, 'Silver Touch Technologies Limited', '', '', 'https://www.silvertouch.com/in/', 'http://backoffice.campuspuppy.com/assets/companyLogo/silvertouch.jpg'),
(21, 'SISL Infotech Private Limited', '', '', 'http://www.sislinfotech.com/', 'http://backoffice.campuspuppy.com/assets/companyLogo/sisl-infotech.jpg'),
(22, 'Velocis Systems Private Limited', '', '', 'http://www.velocis.in/', 'http://backoffice.campuspuppy.com/assets/companyLogo/velocis.jpg'),
(23, 'NetCreativeMind Solutions Private Limited', '', '', 'http://www.netcreativemind.com/', 'http://backoffice.campuspuppy.com/assets/companyLogo/netcreativemind.jpg'),
(24, 'StartupActivator.com', '', '', 'http://startupactivator.com/', 'http://backoffice.campuspuppy.com/assets/companyLogo/startupactivator.jpg'),
(25, 'PES University', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(26, 'Campus Puppy Private Limited', 'CEO', '', 'http://www.campuspuppy.com/', 'http://backoffice.campuspuppy.com/assets/companyLogo/campuspuppy.jpg'),
(27, '1Solutions', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(28, 'Explore Civil', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(29, 'Alternative Global India', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(30, 'RMgX', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(31, 'META', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(32, 'Daily Suvichar', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(33, 'Fox My Box', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(34, 'KLUX Private Limited', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(35, 'SEPS Monitoring Private Limited', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(36, 'Trouble Clear Consumer Solutions Private Limited', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(37, 'AKAL Information Systems Limited', '', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `generalUsers`
--

CREATE TABLE `generalUsers` (
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

CREATE TABLE `indianCities` (
  `cityID` int(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `internshipApplicants` (
  `internshipID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipLocations`
--

CREATE TABLE `internshipLocations` (
  `internshipID` int(5) NOT NULL,
  `cityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipOffers`
--

CREATE TABLE `internshipOffers` (
  `internshipID` int(5) NOT NULL,
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipSkills`
--

CREATE TABLE `internshipSkills` (
  `internshipID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobApplicants`
--

CREATE TABLE `jobApplicants` (
  `jobID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobLocations`
--

CREATE TABLE `jobLocations` (
  `jobID` int(5) NOT NULL,
  `cityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobLocations`
--

INSERT INTO `jobLocations` (`jobID`, `cityID`) VALUES
(1, 183),
(1, 135),
(2, 200),
(4, 200);

-- --------------------------------------------------------

--
-- Table structure for table `jobOffers`
--

CREATE TABLE `jobOffers` (
  `jobID` int(5) NOT NULL,
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobOffers`
--

INSERT INTO `jobOffers` (`jobID`, `jobTitle`, `jobType`, `jobDescription`, `startDate`, `applicationDeadline`, `offerType`, `minimumOffer`, `maximumOffer`, `offer`, `partTime`, `openings`, `applicants`, `status`, `active`, `addedBy`, `timestamp`) VALUES
(1, 'Test Job Offer Title-1', '2', '<p>This is a Test Job Offer Title</p>', '2017-08-01', '2017-07-15', '1', 4.8, 5.4, 0, '2', 2, '1', '1', 0, 18, '2017-06-18 11:22:28'),
(2, 'This is a Test Job Offer-2', '2', '<p>Job Offer Description</p>', '2017-08-01', '2017-07-08', '1', 3.6, 4.2, 0, '1', 1, '2', '1', 0, 20, '2017-06-18 11:29:39'),
(3, 'Test Job Offer Title-3', '1', '<p>Job Offer Description</p>', '2017-07-17', '2017-07-10', '2', 0, 0, 1.2, '1', 1, '3', '1', 0, 19, '2017-06-18 11:29:19'),
(4, 'Test Job Offer Title-4', '2', '<p>Job Offer Description</p>', '2017-08-02', '2017-07-15', '2', 0, 0, 2.8, '1', 1, '3', '1', 0, 18, '2017-06-18 11:27:24'),
(5, 'Test Job Offer Title-5', '1', '<p>Job Offer Description</p>', '2017-08-16', '2017-08-01', '2', 0, 0, 3.2, '1', 1, '1', '1', 0, 33, '2017-06-18 11:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobSkills`
--

CREATE TABLE `jobSkills` (
  `jobID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobSkills`
--

INSERT INTO `jobSkills` (`jobID`, `skillID`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 17),
(2, 1),
(2, 2),
(5, 15),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(5) NOT NULL,
  `sender` int(5) NOT NULL,
  `receiver` int(5) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `sender`, `receiver`, `message`, `timestamp`, `read`) VALUES
(1, 1, 6, 'Hello', '2017-06-18 10:15:54', 1),
(2, 6, 1, 'Hello, How are You?', '2017-06-18 10:16:17', 1),
(3, 1, 6, 'I am Good', '2017-06-18 10:16:47', 1),
(4, 1, 6, 'How are you?', '2017-06-18 10:17:26', 1),
(5, 6, 1, 'I am also fine', '2017-06-18 10:17:26', 1),
(6, 1, 6, 'So, what\'s going on these days?', '2017-06-18 10:18:44', 1),
(7, 2, 1, 'Hello', '2017-06-18 10:26:11', 1),
(8, 1, 8, 'Hello, how are you?', '2017-06-18 10:19:01', 1),
(9, 12, 1, 'Test Message', '2017-06-18 10:20:27', 1),
(10, 13, 1, 'Another Test Message', '2017-06-18 10:20:27', 1),
(11, 1, 4, 'Hello Brother', '2017-06-18 10:20:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passwordToken`
--

CREATE TABLE `passwordToken` (
  `tokenID` int(5) NOT NULL,
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tokenType` enum('1','2') NOT NULL,
  `generatedAt` bigint(12) NOT NULL,
  `expiry` bigint(12) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(5) NOT NULL,
  `projectTitle` text NOT NULL,
  `projectLink` text NOT NULL,
  `projectDescription` text NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(5) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` enum('1','2','3','4') NOT NULL,
  `skillID` int(5) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(32, '<p>The salaries A, B, C are in the ratio 2 : 3 : 5. If the increments of 15%, 10% and 20% are allowed respectively in their salaries, then what will be new ratio of their salaries?</p>', '<p>3 : 3 : 10</p>', '<p>10 : 11 : 20</p>', '<p>23 : 33 : 60</p>', '<p>Cannot be Determined</p>', '3', 25, 1),
(33, '<p>The old name of Java was ?</p><p>&nbsp;</p>', '<p>J language</p>', '<p>oak</p>', '<p>oct</p>', '<p>None of the above</p>', '2', 17, 1),
(34, '<p>Which of the following feature is not supported by java ?</p><p>&nbsp;</p>', '<p>Multithreading</p>', '<p>Reflection</p>', '<p>Operator Overloading</p>', '<p>Garbage Collection</p>', '3', 17, 1),
(35, '<p>Which of the following is not keyword in java ?</p><p>&nbsp;</p>', '<p>null</p>', '<p>import</p>', '<p>volatile</p>', '<p>package</p>', '1', 17, 1),
(36, '<p>What is the full form of JDK ?</p><p>&nbsp;</p>', '<p>Java Data Kit</p>', '<p>Java Defination Kit</p>', '<p>Java Development Kit</p>', '<p>Java Design Kit</p>', '3', 17, 1),
(37, '<p>Which command is used to compile a java program ?</p><p>&nbsp;</p>', '<p>javac</p>', '<p>&nbsp;java</p>', '<p>javad</p>', '<p>javadoc</p>', '1', 17, 1),
(38, '<p>What is the full form of JVM</p><p>&nbsp;</p>', '<p>Java Virtual Machine</p>', '<p>Java Variable Machine</p>', '<p>Java Virtual Mechanism</p>', '<p>Java Variable Mechanism</p>', '1', 17, 1),
(39, '<p>What is the full form of ADT ?</p><p>&nbsp;</p>', '<p>Abstract Data Type</p>', '<p>Abstract Development tool</p>', '<p>Abstract Design Tool</p>', '<p>Abstract Development&nbsp;Tool</p>', '1', 17, 1),
(40, '<p>Which of the following is generated when the source code is successfully compiled ?</p><p>&nbsp;</p>', '<p>Output</p>', '<p>Bytecode</p>', '<p>Error</p>', '<p>None of the above</p>', '2', 17, 1),
(41, '<p>In JAVA, if you do not give a value to a variable before using it, ______</p><p>&nbsp;</p>', '<p>It will contain a garbage value</p>', '<p>It will initialized with zero</p>', '<p>Compiler will give an error</p>', '<p>None of the above</p>', '3', 17, 0),
(42, '<p>Which among the following is the compulsory section of java program ?</p><p>&nbsp;</p>', '<p>package Statement</p>', '<p>&nbsp;import Statement</p>', '<p>documentation section</p>', '<p>class declaration section</p>', '4', 17, 1),
(43, '<p>Sharing of common information is achieved by the concept of ?</p><p>&nbsp;</p>', '<p>polymorphism</p>', '<p>encapsulation</p>', '<p>inheritance</p>', '<p>none of the above</p>', '3', 17, 1),
(44, '<p>The extension name of a Java source code file is ?</p><p>&nbsp;</p>', '<p>.java</p>', '<p>&nbsp;.obj</p>', '<p>.class</p>', '<p>.exe</p>', '1', 17, 1),
(45, '<p>_________ is a software that interprets Java bytecode.</p><p>&nbsp;</p>', '<p>Java virtual machine</p>', '<p>Java compiler</p>', '<p>Java debugger</p>', '<p>Java API</p>', '1', 17, 1),
(46, '<p>Which JDK command is correct to run a Java application in ByteCode.class?</p><p>&nbsp;</p>', '<p>&nbsp;java ByteCode</p>', '<p>java ByteCode.class</p>', '<p>javac ByteCode.java</p>', '<p>javac ByteCode</p>', '1', 17, 1),
(47, '<p>Java is also known as ...... stage language</p><p>&nbsp;</p>', '<p>One</p>', '<p>Two</p>', '<p>Three</p>', '<p>Four</p>', '2', 17, 1),
(48, '<p>For interpretation of java program, _________ command is used.</p>', '<p>java</p>', '<p>javac</p>', '<p>javap</p>', '<p>none of these</p>', '1', 17, 1),
(49, '<p>&nbsp;What do you mean by javap?</p>', '<p>java compiler</p>', '<p>java Interpreter</p>', '<p>java Disassemble</p>', '<p>java Debugger</p>', '3', 17, 1),
(50, '<p>What is HotJava ?</p>', '<p>system software</p>', '<p>web browser</p>', '<p>java environment</p>', '<p>IDE</p>', '2', 17, 1),
(51, '<p>Which is a reserved word in the Java programming language?</p><p>&nbsp;</p>', '<p>method</p>', '<p>native</p>', '<p>&nbsp;subclasse</p>', '<p>array</p>', '2', 17, 1),
(52, '<p>Runnable is</p><p>&nbsp;</p>', '<p>class</p>', '<p>method</p>', '<p>Interface</p>', '<p>none of these</p>', '3', 17, 1),
(53, '<p>Which method executes only once</p><p>&nbsp;</p>', '<p>start()</p>', '<p>init()</p>', '<p>destroy()</p>', '<p>none of these</p>', '2', 17, 1),
(54, '<p>Minimum threads in a program are</p><p>&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '1', 17, 1),
(55, '<p>After compilation of JAVA class the file created is</p><p>&nbsp;</p>', '<p>.class</p>', '<p>.doc</p>', '<p>.java</p>', '<p>none of these</p>', '1', 17, 0),
(56, '<p>Super is the predefined</p><p>&nbsp;</p>', '<p>keyword</p>', '<p>method</p>', '<p>&nbsp;keyword and method</p>', '<p>none of these</p>', '3', 17, 1),
(57, '<p>What is the base class of all classes</p><p>&nbsp;</p>', '<p>object class</p>', '<p>string class</p>', '<p>util class</p>', '<p>none of these</p>', '1', 17, 1),
(58, '<p>How many JDBC driver types does Sun define?</p><p>&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '4', 17, 1),
(59, '<p>To run a compiled Java program, the machine must have what loaded and running?</p><p>&nbsp;</p>', '<p>JVM</p>', '<p>byte code</p>', '<p>web browser</p>', '<p>java compiler</p>', '1', 17, 1),
(60, '<p>A JSP is transformed into a:</p><p>&nbsp;</p>', '<p>servlet</p>', '<p>method</p>', '<p>java class</p>', '<p>applet</p>', '1', 17, 1),
(61, '<p>What servlet processor was developed by Apache Foundation and Sun?</p><p>&nbsp;</p>', '<p>Apache Tomcat</p>', '<p>Apache webserver</p>', '<p>Glass fish</p>', '<p>Browser</p>', '1', 17, 1),
(62, '<p>Type 4 is completely written in java hence</p><p>&nbsp;</p>', '<p>Computer</p>', '<p>Cross Platform</p>', '<p>Linux</p>', '<p>Office</p>', '2', 17, 0),
(63, '<p>Statement use to execute Store Procedure</p><p>&nbsp;</p>', '<p>Prepared statement</p>', '<p>Stored procedure</p>', '<p>Callable statement</p>', '<p>Statement</p>', '3', 17, 0),
(64, '<p>How many interface in JDBC API</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '3', 17, 0),
(65, '<p>C constants can be divided into _ categories?</p><p>&nbsp;</p>', '<p>3</p>', '<p>6</p>', '<p>2</p>', '<p>4</p>', '3', 4, 1),
(66, '<p>Who invented the C - Programming?</p><p>&nbsp;</p>', '<p>James Gosling</p>', '<p>Dennis Ritche</p>', '<p>Bjarne Stroustrup&#39;s</p>', '<p>Tim Berners-Lee</p>', '2', 4, 1),
(67, '<p>C is _______ language.</p><p>&nbsp;</p>', '<p>Low level</p>', '<p>Middle Level</p>', '<p>High Level</p>', '<p>Alll the above&nbsp;</p>', '2', 4, 1),
(68, '<p>Where does C language get invented?</p><p>&nbsp;</p>', '<p>Ritche&#39;s Lab</p>', '<p>AT &amp; T Bell Labs</p>', '<p>Under Oak Tree</p>', '<p>Fringe Labs</p>', '2', 4, 1),
(69, '<p>Which symbol terminates a C statement?</p><p>&nbsp;</p>', '<p>.</p>', '<p>,</p>', '<p>;</p>', '<p>}</p>', '3', 4, 1),
(70, '<p>Which is not a character of C?</p><p>&nbsp;</p>', '<p>$</p>', '<p>!</p>', '<p>^</p>', '<p>~</p>', '1', 4, 1),
(71, '<p>Identify the scalar data type in C.</p><p>&nbsp;</p>', '<p>union</p>', '<p>function</p>', '<p>double</p>', '<p>array</p>', '3', 4, 1),
(72, '<p>How many tokens are in the following:</p><p>if(age==21)</p><p>&nbsp;</p>', '<p>4</p>', '<p>5</p>', '<p>6</p>', '<p>7</p>', '3', 4, 1),
(73, '<p>Which is an invalid variable name?</p><p>&nbsp;</p>', '<p>&nbsp;integer</p>', '<p>Xx</p>', '<p>&nbsp;net-total</p>', '<p>sum</p>', '3', 4, 1),
(74, '<p>Identify the type(s) if data type.</p><p>&nbsp;</p>', '<p>Scalar</p>', '<p>Drived</p>', '<p>Ponter</p>', '<p>All the above</p>', '4', 4, 1),
(75, '<p>The value of automatic variable that is declared but not initialized will be?</p>', '<p>0</p>', '<p>1</p>', '<p>unpredictable</p>', '<p>none of the above&nbsp;&nbsp;</p>', '3', 4, 1),
(76, '<p>Choose the correct statement</p><p>&nbsp;</p>', '<p>An identifier may start with an underscore</p>', '<p>An identifier may end with an underscore</p>', '<p>IF is a valid identifier</p>', '<p>All of the above</p>', '4', 4, 1),
(77, '<p>The const feature can be applied to?</p><p>&nbsp;</p>', '<p>An identifier</p>', '<p>An array</p>', '<p>An array argument</p>', '<p>All the above</p>', '4', 4, 1),
(78, '<p>Smallest element of Array Index is called</p><p>&nbsp;</p>', '<p>Lower Bond</p>', '<p>Upper Bond</p>', '<p>Extraction</p>', '<p>Rang</p>', '1', 4, 1),
(79, '<p>Cons feature can be applied on</p><p>&nbsp;</p>', '<p>identifier</p>', '<p>array</p>', '<p>array argument</p>', '<p>function</p>', '3', 4, 1),
(80, '<p>What are the types of linkages?</p><p>&nbsp;</p>', '<p>Internal and External</p>', '<p>External and None</p>', '<p>External, Internal and None</p>', '<p>Internal</p>', '2', 4, 1),
(81, '<p>How would you round off a value from 1.66 to 2.0?</p><p>&nbsp;</p>', '<p>ceil(1.66)</p>', '<p>floor(1.66)</p>', '<p>roundup(1.66)</p>', '<p>roundto(1.66)</p>', '1', 4, 1),
(82, '<p>By default a real number is treated as a</p><p>[</p>', '<p>float</p>', '<p>double</p>', '<p>long&nbsp;double</p>', '<p>far double</p>', '2', 4, 1),
(83, '<p>When do we mention the prototype of a function?</p><p>&nbsp;</p>', '<p>Defining</p>', '<p>Declaring</p>', '<p>Prototyping</p>', '<p>Calling</p>', '2', 4, 1),
(84, '<p>Which of the following is a collection of different data types?</p><p>&nbsp;</p>', '<p>String</p>', '<p>Array</p>', '<p>Structure</p>', '<p>File</p>', '3', 4, 1),
(85, '<p>For accessing a structure element using a pointer,you must use?</p><p>&nbsp;</p>', '<p>Pointer operator (&amp;)</p>', '<p>Dot operators(.)</p>', '<p>Pointer operator(*)</p>', '<p>&nbsp;Arrow operator(-&gt;)</p>', '4', 4, 1),
(86, '<p>Which operator is used to connect structure name to its member name?</p><p>&nbsp;</p>', '<p>dot operator(.)</p>', '<p>logical operator(&amp;&amp;)</p>', '<p>&nbsp;pointer operator(&amp;)</p>', '<p>Arrow operator(-&gt;)</p>', '1', 4, 1),
(87, '<p>The default parameter passing mechanism is ?</p><p>&nbsp;</p>', '<p>Call by value</p>', '<p>Call by reference</p>', '<p>Call by value result</p>', '<p>None of the above</p>', '1', 4, 1),
(88, '<p>The order in which actual arguments are evaluated in function call</p><p>&nbsp;</p>', '<p>is from the left</p>', '<p>&nbsp;is from the right</p>', '<p>is compiler dependent</p>', '<p>None of the above</p>', '3', 4, 1),
(89, '<p>Use of functions ?</p><p>&nbsp;</p>', '<p>Helps to avoid repeating a set of statements many times</p>', '<p>Enhance the logical clarity of the program</p>', '<p>Helps to avoid repeated programming across program</p>', '<p>All the above</p>', '4', 4, 1),
(90, '<p>Any C program</p><p>&nbsp;</p>', '<p>Must contain at least one function</p>', '<p>Need not contain any function</p>', '<p>Needs input data&nbsp;</p>', '<p>None of the above</p>', '1', 4, 1),
(91, '<p>Call by reference is also known as ?</p><p>&nbsp;</p>', '<p>Call by address or Call by location</p>', '<p>Call by address or Call by value</p>', '<p>Call by value or Call by name</p>', '<p>None of the above</p>', '1', 4, 1),
(92, '<p>In a for loop, if the condition is missing,then?</p><p>&nbsp;</p>', '<p>it is assumed to be present and taken to be false</p>', '<p>it is assumed to be present and taken to be true</p>', '<p>it result in the syntax error</p>', '<p>execution will be terminated abruptly</p>', '2', 4, 1),
(93, '<p>n a for loop, if the condition is missing, then infinite looping can not be avoided by a</p><p>&nbsp;</p>', '<p>Continue statement</p>', '<p>goto statement</p>', '<p>return statement</p>', '<p>break statement</p>', '1', 4, 1),
(94, '<p>Break statement can be simulated by using ?</p><p>&nbsp;</p>', '<p>goto</p>', '<p>return</p>', '<p>exit</p>', '<p>any of the above</p>', '1', 4, 1),
(95, '<p>Which of the following operator takes only integer operands?</p><p>&nbsp;</p>', '<p>+</p>', '<p>*</p>', '<p>?</p>', '<p>%</p>', '4', 4, 1),
(96, '<p>how many types of expression in c++.</p><p>&nbsp;</p>', '<p>5</p>', '<p>6</p>', '<p>7</p>', '<p>8</p>', '3', 6, 1),
(97, '<p>Do-while is an ...... loop.</p><p>&nbsp;</p>', '<p>&nbsp;Entry control</p>', '<p>Exit control</p>', '<p>Entry enrolled</p>', '<p>None of these</p>', '2', 6, 1),
(98, '<p>Dragons have wings like a bird and scales like a lizard. In object oriented verabage, we would say this is an example of ?</p><p>&nbsp;</p>', '<p>Multilevel Inheritance</p>', '<p>Polymorphism</p>', '<p>Multiple inheritance</p>', '<p>Aggregation</p>', '3', 6, 1),
(99, '<p>C++ was originally developed by ?</p><p>&nbsp;</p>', '<p>Colcksin and Mellish</p>', '<p>Donald E.Knuth</p>', '<p>Sir Richard Handlee</p>', '<p>Bajarne Stoustrup</p>', '4', 6, 1),
(100, '<p>cfront ?</p><p>&nbsp;</p>', '<p>is the front end of C compiler</p>', '<p>is the pre-processor of C compiler</p>', '<p>&nbsp;is a tool that translate a C++ code to its equivalent C code</p>', '<p>none of the above</p>', '3', 6, 1),
(101, '<p>Which of the following is false about object oriented ?</p><p>&nbsp;</p>', '<p>is block structured language</p>', '<p>is not a block structured language</p>', '<p>aids in object oriented programming</p>', '<p>is an extension of C</p>', '1', 6, 1),
(102, '<p>Polymorphism is implemented through which mechanism in C++ ?</p><p>&nbsp;</p>', '<p>Late Interpretation</p>', '<p>&nbsp;Late Binding</p>', '<p>&nbsp;Early Binding</p>', '<p>Overloading</p>', '3', 6, 1),
(103, '<p>Re-usability is a desirable feature of a language as it is ?&nbsp;</p><p>&nbsp;</p>', '<p>&nbsp;Decreases the testing time</p>', '<p>Lowers the maintenance cost</p>', '<p>Reduce the compilation time</p>', '<p>Reduces the exectution time</p>', '2', 6, 1),
(104, '<p>Which of the following is not an extension associated during the creation of a C++ program?</p><p>&nbsp;</p>', '<p>&nbsp;.cpp</p>', '<p>&nbsp;.exe</p>', '<p>.jpg</p>', '<p>.bak</p>', '3', 6, 1),
(105, '<p>Which of the following is not a C++ Compiler ?</p><p>&nbsp;</p>', '<p>C front</p>', '<p>Turbo C++</p>', '<p>&nbsp;Borland C++</p>', '<p>C++ Compiler</p>', '4', 6, 1),
(106, '<p>Why every program begins with main () in C++ ?</p><p>&nbsp;</p>', '<p>As this is from the compiler knows that program execution actually starts.</p>', '<p>Because its name is main</p>', '<p>Both A and B</p>', '<p>None of above</p>', '1', 6, 1),
(107, '<p>The wrapping up of data and functions into a single unit is called ?</p><p>&nbsp;</p>', '<p>Inheritance</p>', '<p>Polymorphism</p>', '<p>Encapsulation</p>', '<p>Overloading</p>', '3', 6, 1),
(108, '<p>The process by which objects of one class acquire the attributes of another class is known as............?</p><p>&nbsp;</p>', '<p>Inheritance</p>', '<p>Polymorphism</p>', '<p>Data Abstraction</p>', '<p>Binding</p>', '1', 6, 1),
(109, '<p>......... means the ability that one thing can take several distinct forms ?</p><p>&nbsp;</p>', '<p>Dynamic Binding</p>', '<p>Early Binding</p>', '<p>Polymorphism</p>', '<p>None of the above</p>', '3', 6, 1),
(110, '<p>The technique by which objects communicate with each other is called ?</p><p>&nbsp;</p>', '<p>information passing</p>', '<p>function passing</p>', '<p>message passing</p>', '<p>none of the above</p>', '2', 6, 1),
(111, '<p>For a method to be an interface between the outside world and a class,it has to be declared ?</p><p>&nbsp;</p>', '<p>private</p>', '<p>&nbsp;protected</p>', '<p>public&nbsp;</p>', '<p>external</p>', '3', 6, 1),
(112, '<p>In C++, a function contained within the class is called ?</p><p>&nbsp;</p>', '<p>member function</p>', '<p>a class function</p>', '<p>a method</p>', '<p>none of the above</p>', '1', 6, 1),
(113, '<p>In C++, a function contained within the class is called ?</p><p>&nbsp;</p>', '<p>member function</p>', '<p>a class function</p>', '<p>a method</p>', '<p>none of the above</p>', '1', 6, 1),
(114, '<p>classes are useful because they</p><p>&nbsp;</p>', '<p>are removed from memory when not in use</p>', '<p>permit data to be hidden from other classes</p>', '<p>bring together all aspects of an entity in one place</p>', '<p>can closely model objects in the real world</p>', '2', 6, 1),
(115, '<p>The public files in a class library usually contain ?</p><p>&nbsp;</p>', '<p>Constant definitions</p>', '<p>&nbsp;member function definitions</p>', '<p>class declarations</p>', '<p>variable definition</p>', '3', 6, 1),
(116, '<p>A class cannot be ?</p><p>&nbsp;</p>', '<p>Virtual</p>', '<p>Generic</p>', '<p>Inline</p>', '<p>Friend</p>', '3', 6, 1),
(117, '<p>Objects of the same class share the values of ...... while they maintain separate values for ........ .</p><p>&nbsp;</p>', '<p>&nbsp;Static variables, non static variables</p>', '<p>Non static variables, static variables</p>', '<p>Global variables, static variables</p>', '<p>Static variables, register variables</p>', '1', 6, 1),
(118, '<p>Which of the following keywords cannot appear inside a class definition ?</p><p>&nbsp;</p>', '<p>friend</p>', '<p>static</p>', '<p>template</p>', '<p>virtual</p>', '3', 6, 1),
(119, '<p>Shallow copy is</p><p>&nbsp;</p>', '<p>Member wise copying of objects</p>', '<p>A substitute for the operator</p>', '<p>Same kind like deep copy</p>', '<p>&nbsp;Used in constructor</p>', '1', 6, 1),
(120, '<p>Which member function of class cannot modify its objects attributes ?</p><p>&nbsp;</p>', '<p>friend functions</p>', '<p>Private member functions</p>', '<p>Constant member functions</p>', '<p>Static member functions</p>', '3', 6, 1),
(121, '<p>The signature of a function is its ..... ?</p><p>&nbsp;</p>', '<p>Function code</p>', '<p>Prototype</p>', '<p>Call</p>', '<p>Parameter list</p>', '2', 6, 1),
(122, '<p>What is true about inline functions ?</p><p>&nbsp;</p>', '<p>It&#39;s a compulsion on the compiler to make function inline</p>', '<p>It&#39;s a request to the compiler to make te function inline</p>', '<p>It&#39;s the indication to the compiler that the function is recursive</p>', '<p>It&#39;s the indication to the compiler that the function is member function</p>', '2', 6, 1),
(123, '<p>Which member function of class cannot modify its objects attributes ?</p><p>&nbsp;</p>', '<p>Friend functions</p>', '<p>Private member functions</p>', '<p>Constant member functions</p>', '<p>Static member functions</p>', '3', 6, 1),
(124, '<p>Which of the following parameter passing mechanism is/are supported by C++ but not in C?</p><p>&nbsp;</p>', '<p>Pass by value</p>', '<p>Pass by reference</p>', '<p>Pass by value result</p>', '<p>All the above</p>', '2', 6, 1),
(125, '<p>The library function exit() causes an exit from ?</p><p>&nbsp;</p>', '<p>The loop in which it occurs</p>', '<p>The block in which it occurs</p>', '<p>The function in which it occurs</p>', '<p>The program&nbsp;in which it occurs</p>', '4', 6, 1),
(126, '<p>The getche() library function</p><p>&nbsp;</p>', '<p>&nbsp;returns a character when any key is pressed</p>', '<p>returns a character when ENTER is pressed</p>', '<p>displays a character on the screen when any key is pressed</p>', '<p>does not display a character on the screen</p>', '1', 6, 1),
(127, '<p>When an argument is passed by reference</p><p>&nbsp;</p>', '<p>a variable is created in function to hold the argument value</p>', '<p>&nbsp;the function cannot access the argument value</p>', '<p>a temporary variable is created in the calling program to hold arguments value</p>', '<p>none of these</p>', '1', 6, 1),
(128, '<p>Overloaded function</p><p>&nbsp;</p>', '<p>are a group of functions,with the same value</p>', '<p>all have the same number and types of arguments</p>', '<p>&nbsp;make life simpler for programmers</p>', '<p>&nbsp;may fail unexpectedly due to stress</p>', '3', 6, 1),
(129, '<p>In C#&nbsp;variables are categorized into ..........<br /><br />i) Value types &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ii) Reference types &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; iii) initial types &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; iv) pointer types<br /><br />&nbsp;</p>', '<p>i, ii and iii only</p>', '<p>ii, iii and iv only</p>', '<p>i, ii and iv only</p>', '<p>All i, ii, iii and iv</p>', '3', 5, 1),
(130, '<p>Value type variables can be assigned a value directly which are derived from the class&nbsp;<br /><br />&nbsp;</p>', '<p>System.value<br />&nbsp;</p>', '<p>System.ValueType</p>', '<p>General.ValueType</p>', '<p>Variable.ValueType</p>', '2', 5, 1),
(131, '<p>The various data types&nbsp;used in C# are&nbsp;<br /><br />i) Integral type&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ii) Floating point types &nbsp; &nbsp; &nbsp;&nbsp; iii) Boolean types &nbsp; &nbsp; &nbsp; iv) Nullable type<br /><br />&nbsp;</p>', '<p>i, ii and iii only</p>', '<p>ii, iii and iv only</p>', '<p>i, iii and iv only</p>', '<p>All i, ii, iii and iv</p>', '4', 5, 1),
(132, '<p>The built-in operators that are provided by C# programming language&nbsp;are...<br /><br />i) Arithmetic operators&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ii) Logical operators &nbsp; &nbsp; &nbsp; iii) Bitwise operators &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; iv) Assignment operators<br /><br />&nbsp;</p>', '<p>i, ii and iii only</p>', '<p>ii, iii and iv only</p>', '<p>i, iii and iv only</p>', '<p>All i, ii, iii and iv</p>', '4', 5, 1),
(133, '<p>Match the different Bitwise operators supported by C# with their descriptions.<br /><br />i) &amp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a) Binary Left Shift Operator<br /><br />ii) ^ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) Binary Right Shift Operator<br /><br />iii) &lt;&lt; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; c) Binary XOR operator<br /><br />iv) &gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; d) Binary AND operator<br /><br />&nbsp;</p>', '<p>i-d, ii-c, iii-a, iv-b</p>', '<p>i-b, ii-c, iii-a, iv-d</p>', '<p>i-c, ii-a, iii-b, iv-d</p>', '<p>i-a, ii-c, iii-d, iv-b</p>', '1', 5, 1),
(134, '<p>What will be the value of the following expression if x=10?<br /><br />&nbsp;</p>', '<p>25</p>', '<p>-5</p>', '<p>10</p>', '<p>15</p>', '1', 5, 1),
(135, '<p>While passing parameter to a method ................ copies the actual value of an argument into the formal parameter of the function.<br /><br />&nbsp;</p>', '<p>Output Parameter<br />&nbsp;</p>', '<p>Value Parameter</p>', '<p>Reference Parameter</p>', '<p>Initial Parameter</p>', '2', 5, 1),
(136, '<p>In C# methods can be defined by using which of the following syntex?<br /><br />&nbsp;</p>', '<p>&lt;<a target="_blank" href="http://en.wikipedia.org/wiki/Method_%28computer_programming%29">Method</a>&nbsp;Name&gt; (parameter list) { Method body }</p>', '<p>&lt;Method Name&gt; &lt;Return Type&gt; &lt;Access Specifier&gt; (parameter list) { Method body }<br />&nbsp;</p>', '<p>&lt;Return Type&gt; &lt;Method Name&gt; &lt;Access Specifier&gt; (parameter list) { Method body }</p>', '<p>None of the above</p>', '1', 5, 1),
(137, '<p>Which of the following are the methods to assign values to an array?<br /><br />i) double [ ] score = {234.0, 214.5, 572.0};<br /><br />ii) int [ ] marks = new int [3] {33, 45, 67};<br /><br />iii) int [ ] marks = new int [ ] {33, 45, 67};<br /><br />&nbsp;</p>', '<p>i and ii only</p>', '<p>ii and iii only</p>', '<p>i and iii only<br />&nbsp;</p>', '<p>All i, ii, iii</p>', '4', 5, 1),
(138, '<p>State whether the following statements are True or False.<br /><br />i) Unlike classes, structures cannot inherit other structures or classes.<br /><br />ii) A structure can implement one or more interfaces.<br /><br />iii) Structure members can be specified as abstract, virtual or protected.<br /><br />&nbsp;</p>', '<p>i- True, ii- False, iii-True</p>', '<p>i- False, ii- True, iii-True</p>', '<p>i-True, ii-True, iii-False</p>', '<p>i- False, ii- False, iii-True</p>', '3', 5, 1),
(139, '<p>Features of readonly variables</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>It is allocated at compile time</p>', '<p>Declaration and initialization can be separated</p>', '<p>It is initialized at run time</p>', '<p>all of these</p>', '4', 5, 1),
(140, '<p>_______________ represents a drawing surface and provides methods for rendering to that drawing surface.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Graphic object</p>', '<p>Pens object</p>', '<p>Brushes object</p>', '<p>Colors object</p>', '1', 5, 1),
(141, '<p>What is the output of the code&nbsp;<br /><br />public class B : A { }</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Errors</p>', '<p>It defines a class that inherits the public methods of A only.</p>', '<p>It defines a class that inherits all the methods of A but the private members cannot be accessed.</p>', '<p>b and c</p>', '3', 5, 1),
(142, '<p>A variable which is declared inside a method is called a________variable</p><p><br />&nbsp;</p>', '<p>Serial</p>', '<p>Local</p>', '<p>Private</p>', '<p>Static</p>', '2', 5, 1),
(143, '<p>___________________ allow to encapsulate discrete units of functionality and provide a graphical representation of that functionality to the user</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>controls</p>', '<p>object</p>', '<p>class</p>', '<p>graphics</p>', '1', 5, 1),
(144, '<p>What is the .NET collection class that allows an element to be accessed using a unique key?</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>HashTable</p>', '<p>ArrayList</p>', '<p>SortedList</p>', '<p>None of these</p>', '1', 5, 1),
(145, '<p>What does the keyword virtual mean in the method definition?</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>The method is public</p>', '<p>The method can be derived</p>', '<p>The method is static</p>', '<p>The method can be over-ridden</p>', '4', 5, 1),
(146, '<p>Is there any error in the following code? If yes, identify the error.&nbsp;<br /><br />EmployeeMgmt constructor: public int EmployeeMgmt() { emp_id = 100; }</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Return type</p>', '<p>No errors</p>', '<p>Formal parameters</p>', '<p>Name</p>', '1', 5, 1),
(147, '<p>What is accessibility modifier &ldquo;protected internal&rdquo;?</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>It is available to classes that are within the same assembly or derived from the specified base class.</p>', '<p>It is available within the class definition</p>', '<p>It is the most permissive access level</p>', '<p>It is the least permissive access level</p>', '1', 5, 1),
(148, '<p>Which of the following is incorrect about System.Text.StringBuilder and System.String?</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>StringBuilder is more efficient when there is a large amount of string manipulation</p>', '<p>Strings are immutable, so each time a string is changed, a new instance in memory is created.</p>', '<p>StringBuilder is mutable; when you modify an instance of the StringBuilder class, you modify the actual string, not a copy</p>', '<p>Strings are mutable in .Net</p>', '4', 5, 1),
(149, '<p>Difference between Convert.ToString() and ToString()</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Convert.ToString() handles null values but ToString() doesn&#39;t</p>', '<p>ToString() output as per format supplied</p>', '<p>Convert.ToString() only handles null values</p>', '<p>ToString() handles null values but Convert.ToString() doesn&#39;t</p>', '1', 5, 1),
(150, '<p>CLR is the .NET equivalent of _________.<br />&nbsp;</p>', '<p>Java Virtual Machine</p>', '<p>Common Language Runtime</p>', '<p>Common Type System</p>', '<p>Common Language Specification</p>', '1', 5, 1),
(151, '<p>The CLR is physically represented by an assembly named _______<br />&nbsp;</p>', '<p>mscoree.dll</p>', '<p>mcoree.dll</p>', '<p>msoree.dll</p>', '<p>mscor.dll</p>', '1', 5, 1),
(152, '<p>SOAP stands for __________.<br />&nbsp;</p>', '<p>Simple Object Access Program</p>', '<p>Simple Object Access Protocol</p>', '<p>Simple Object Application Protocol</p>', '<p>Simple Object Account Protocol</p>', '2', 5, 1),
(153, '<p>The ____ language allows more than one method in a single class<br />&nbsp;</p>', '<p>C#</p>', '<p>J#</p>', '<p>C++</p>', '<p>C</p>', '1', 5, 1),
(154, '<p>In C#, a subroutine is called a ________.<br />&nbsp;</p>', '<p>Function</p>', '<p>Metadata</p>', '<p>Method</p>', '<p>Managed code</p>', '3', 5, 1),
(155, '<p>All C# applications begin execution by calling the _____ method.<br />&nbsp;</p>', '<p>Class()</p>', '<p>Main()</p>', '<p>Submain()</p>', '<p>Namespace</p>', '2', 5, 1),
(156, '<p>A _______ is an identifier that denotes a storage location<br />&nbsp;</p>', '<p>Constant</p>', '<p>Reference type</p>', '<p>Variable</p>', '<p>Object</p>', '3', 5, 1),
(157, '<p>_________ are reserved, and cannot be used as identifiers.<br />&nbsp;</p>', '<p>Keywords</p>', '<p>literal</p>', '<p>variables</p>', '<p>Identifiers</p>', '1', 5, 1),
(158, '<p>Boxing converts a value type on the stack to an ______ on the heap.<br />&nbsp;</p>', '<p>Bool type</p>', '<p>Instance type</p>', '<p>Class type</p>', '<p>Object type</p>', '4', 5, 1),
(159, '<p>The character pair ?: is a________________available in C#.<br />&nbsp;</p>', '<p>Unary operator</p>', '<p>Ternary operator</p>', '<p>Decision operator</p>', '<p>Functional operator</p>', '2', 5, 1),
(160, '<p>In C#, all binary operators are ______.<br />&nbsp;</p>', '<p>Center-associative</p>', '<p>Right-associative</p>', '<p>Left-associative</p>', '<p>Top-associative</p>', '3', 5, 1),
(161, '<p>An _______ is a symbol that tells the computer to perform certain mathematical or logical manipulations.<br />&nbsp;</p>', '<p>Operator</p>', '<p>Expression</p>', '<p>Condition&nbsp;</p>', '<p>Logic</p>', '1', 5, 1),
(162, '<p>A _____ is any valid C# variable ending with a colon.<br />&nbsp;</p>', '<p>goto</p>', '<p>Label</p>', '<p>Logical</p>', '<p>Bitwise</p>', '2', 5, 1),
(163, '<p>C# has _______ operator, useful for making two way decisions.<br />&nbsp;</p>', '<p>Looping</p>', '<p>Functional</p>', '<p>Exponential</p>', '<p>Conditional</p>', '4', 5, 1),
(164, '<p>________causes the loop to continue with the next iteration after skipping any statements in between.<br />&nbsp;</p>', '<p>Loop</p>', '<p>Exit</p>', '<p>Break</p>', '<p>Continue</p>', '4', 5, 1),
(165, '<p>Arrays in C# are ______ objects<br />&nbsp;</p>', '<p>Reference</p>', '<p>Logical</p>', '<p>Value</p>', '<p>Arithmetic</p>', '1', 5, 1),
(166, '<p>C# does not support _____ constructors.<br />&nbsp;</p>', '<p>parameterized</p>', '<p>parameter-less</p>', '<p>class</p>', '<p>method</p>', '2', 5, 1),
(167, '<p>A structure in C# provides a unique way of packing together data of ______ types.<br />&nbsp;</p>', '<p>Different</p>', '<p>Same</p>', '<p>Invoking</p>', '<p>Calling</p>', '1', 5, 1),
(168, '<p>Computer Network is&nbsp;</p>', '<p>Collection of hardware components and computers</p>', '<p>Interconnected by communication channels</p>', '<p>Sharing of resources and information</p>', '<p>All of the above</p>', '4', 7, 1),
(169, '<p>What is a Firewall in Computer Network?</p>', '<p>The physical boundary of Network</p>', '<p>An operating System of Computer Network</p>', '<p>A system designed to prevent unauthorized access</p>', '<p>A web browsing Software</p>', '3', 7, 1),
(170, '<p>How many layers does OSI Reference Model has?</p>', '<p>4</p>', '<p>5</p>', '<p>6</p>', '<p>7</p>', '4', 7, 1),
(171, '<p>DHCP is the abbreviation of&nbsp;</p>', '<p>Dynamic Host Control Protocol</p>', '<p>Dynamic Host Configuration Protocol</p>', '<p>Dynamic Hyper Control Protocol</p>', '<p>Dynamic Hyper Configuration Protocol</p>', '2', 7, 1),
(172, '<p>IPV4 Address is&nbsp;</p>', '<p>8 bit</p>', '<p>16&nbsp;bit</p>', '<p>32 bit</p>', '<p>64 bit</p>', '3', 7, 1),
(173, '<p>DNS is the abbreviation of&nbsp;</p>', '<p>Dynamic Name System</p>', '<p>Dynamic Network System</p>', '<p>Domain Name System</p>', '<p>Domain Network Service</p>', '3', 7, 1),
(174, '<p>What is the meaning of Bandwidth in Network?&nbsp;</p>', '<p>Transmission capacity of a communication channels</p>', '<p>Connected Computers in the Network</p>', '<p>Class of IP used in Network</p>', '<p>None of these</p>', '1', 7, 1),
(175, '<p>ADSL is the abbreviation of&nbsp;</p>', '<p>Asymmetric Dual Subscriber Line</p>', '<p>Asymmetric Digital System Line</p>', '<p>Asymmetric Dual System Line</p>', '<p>Asymmetric Digital Subscriber Line</p>', '4', 7, 1),
(176, '<p>What is the use of Bridge in Network?&nbsp;</p>', '<p>to connect LANs</p>', '<p>to separate LANs</p>', '<p>to control Network Speed</p>', '<p>all of the above</p>', '1', 7, 1),
(177, '<p>Router operates in which layer of OSI Reference Model?&nbsp;</p>', '<p>Layer 1 (Physical Layer)</p>', '<p>Layer 3 (Network Layer)</p>', '<p>Layer 4 (Transport Layer)</p>', '<p>Layer 7 (Application Layer)</p>', '2', 7, 1),
(178, '<p>Each IP packet must contain&nbsp;</p>', '<p>Only Source address</p>', '<p>Only Destination address</p>', '<p>Source and Destination address</p>', '<p>Source or Destination address</p>', '3', 7, 1),
(179, '<p>Bridge works in which layer of the OSI model?</p>', '<p>Appliation layer</p>', '<p>Transport layer</p>', '<p>Network layer</p>', '<p>Datalink layer</p>', '4', 7, 1),
(180, '<p>_______ provides a connection-oriented reliable service for sending messages&nbsp;</p>', '<p>TCP</p>', '<p>IP</p>', '<p>UDP</p>', '<p>All the above</p>', '1', 7, 1),
(181, '<p>Which layers of the OSI model are host-to-host layers?&nbsp;</p>', '<p>Transport, Session, Persentation, Application</p>', '<p>Network, Transport, Session, Presentation</p>', '<p>Datalink, Network, Transport, Session</p>', '<p>Physical, Datalink, Network, Transport</p>', '1', 7, 1),
(182, '<p>Which of the following IP address class is Multicast</p>', '<p>Class A</p>', '<p>Class B</p>', '<p>ClassC</p>', '<p>Class D</p>', '4', 7, 1),
(183, '<p>Which of the following is correct regarding Class B Address of IP address&nbsp;</p>', '<p>Network bit &ndash; 14, Host bit &ndash; 16</p>', '<p>Network bit &ndash; 16, Host bit &ndash; 14</p>', '<p>Network bit &ndash; 18, Host bit &ndash; 16</p>', '<p>Network bit &ndash; 12, Host bit &ndash; 14</p>', '1', 7, 1),
(184, '<p>The last address of IP address represents</p>', '<p>Unicast address</p>', '<p>Network address</p>', '<p>Broadcast address</p>', '<p>None of the above</p>', '3', 7, 1),
(185, '<p>How many bits are there in the Ethernet address?&nbsp;</p>', '<p>64 bits</p>', '<p>48&nbsp;bits</p>', '<p>32 bits</p>', '<p>16&nbsp;bits</p>', '2', 7, 1),
(186, '<p>How many layers are in the TCP/IP model?&nbsp;</p>', '<p>4 Layers</p>', '<p>5 Layers&nbsp;</p>', '<p>6 Layers&nbsp;</p>', '<p>7 Layers</p>', '1', 7, 1),
(187, '<p>Which of the following layer of OSI model also called end-to-end layer?&nbsp;</p>', '<p>Presentation layer</p>', '<p>Network layer</p>', '<p>Session layer</p>', '<p>Transport layer</p>', '4', 7, 1),
(188, '<p>Why IP Protocol is considered as unreliable?</p>', '<p>A packet may be lost</p>', '<p>Packets may arrive out of order</p>', '<p>Duplicate packets may be generated</p>', '<p>All the above</p>', '4', 7, 1),
(189, '<p>What is the minimum header size of an IP packet?</p>', '<p>16 bytes</p>', '<p>10 bytes</p>', '<p>20 bytes</p>', '<p>32 bytes</p>', '3', 7, 1),
(190, '<p>Which of following provides reliable communication?</p>', '<p>TCP</p>', '<p>IP</p>', '<p>UDP</p>', '<p>All the above</p>', '1', 7, 1),
(191, '<p>What is the address size of IPv6 ?</p>', '<p>32 bit</p>', '<p>64 bits</p>', '<p>128 bits</p>', '<p>256 bits</p>', '3', 7, 1),
(192, '<p>What is the size of Network bits &amp; Host bits of Class A of IP address?&nbsp;</p>', '<p>Network bits 7, Host bits 24</p>', '<p>Network bits 8, Host bits 24</p>', '<p>Network bits 7, Host bits 23</p>', '<p>Network bits 8, Host bits 23</p>', '1', 7, 1),
(193, '<p>What does Router do in a network?&nbsp;</p>', '<p>Forwards a packet to all outgoing links</p>', '<p>Forwards a packet to the next free outgoing link</p>', '<p>Determines on which outing link a packet is to be forwarded</p>', '<p>Forwards a packet to all outgoing links except the originated link</p>', '3', 7, 1),
(194, '<p>The Internet is an example of</p>', '<p>Cell switched network</p>', '<p>Circuit switched network</p>', '<p>Packet switched network</p>', '<p>All the above</p>', '3', 7, 1),
(195, '<p>What does protocol defines?</p>', '<p>Protocol defines what data is communicated</p>', '<p>Protocol defines how data is communicated.</p>', '<p>Protocol defines when data is communicated</p>', '<p>All the above</p>', '4', 7, 1),
(196, '<p>What is the uses of subnetting?&nbsp;</p>', '<p>It divides one large network into several smaller ones</p>', '<p>It divides network into network classes</p>', '<p>It speeds up the speed of network</p>', '<p>None of the above</p>', '1', 7, 1),
(197, '<p>Repeater operates in which layer of the OSI model?&nbsp;</p>', '<p>Physical Layer</p>', '<p>Data link layer</p>', '<p>Network layer</p>', '<p>Transport layer</p>', '1', 7, 1),
(198, '<p>What is the benefit of the Networking?&nbsp;</p>', '<p>File Sharing</p>', '<p>Easier access to Resources</p>', '<p>Easier Backups</p>', '<p>All of the Above</p>', '4', 7, 1),
(199, '<p>. Which of the following is not the Networking Devices?</p>', '<p>Gateways</p>', '<p>Linux</p>', '<p>Routers</p>', '<p>Firewalls</p>', '2', 7, 1),
(200, '<p>What is the size of MAC Address?&nbsp;</p>', '<p>16&nbsp;bits</p>', '<p>32&nbsp;bits</p>', '<p>48&nbsp;bits</p>', '<p>64&nbsp;bits</p>', '3', 7, 1),
(201, '<p>Which of the following can be Software?&nbsp;</p>', '<p>Routers</p>', '<p>Firewalls</p>', '<p>Gateway</p>', '<p>Modems</p>', '2', 7, 1),
(202, '<p>What is the use of Ping command?&nbsp;</p>', '<p>To test a device on the network is reachable</p>', '<p>To test a hard disk fault</p>', '<p>To test a bug in a Application</p>', '<p>To test a Pinter Quality</p>', '1', 7, 1),
(203, '<p>MAC Address is the example of&nbsp;</p>', '<p>Transport Layer</p>', '<p>Data Link Layer</p>', '<p>Application Layer</p>', '<p>Physical Layer</p>', '2', 7, 1),
(204, '<p>In the relational modes, cardinality is termed as:&nbsp;</p>', '<p>Number of tuples</p>', '<p>Number of attributes</p>', '<p>Number of tables</p>', '<p>Number of constraints</p>', '2', 12, 1),
(205, '<p>DBMS is a collection of &hellip;&hellip;&hellip;&hellip;.. that enables user to create and maintain a database.<br />&nbsp;</p>', '<p>Keys</p>', '<p>Translators</p>', '<p>Program</p>', '<p>Language Activity</p>', '3', 12, 1),
(206, '<p>&nbsp;In a relational schema, each tuple is divided into fields called&nbsp;<br />&nbsp;</p>', '<p>Relations<br />&nbsp;</p>', '<p>Domains</p>', '<p>Queries</p>', '<p>All the above</p>', '2', 12, 1),
(207, '<p>In an ER model, &hellip;&hellip;&hellip;&hellip;&hellip;. is described in the database by storing its data.<br />&nbsp;</p>', '<p>Entity</p>', '<p>Attribute</p>', '<p>Relationship</p>', '<p>Notation</p>', '1', 12, 1),
(208, '<p>DFD stands for<br />&nbsp;</p>', '<p>Data Flow Document</p>', '<p>Data File Diagram</p>', '<p>Data Flow Diagram</p>', '<p>None of the above</p>', '3', 12, 1),
(209, '<p>A top-to-bottom relationship among the items in a database is established by a&nbsp;<br />&nbsp;</p>', '<p>Hierarchical schema</p>', '<p>Network schema</p>', '<p>Relational Schema</p>', '<p>All the above</p>', '3', 12, 0),
(210, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; table store information about database or about the system.<br />&nbsp;</p>', '<p>SQL</p>', '<p>Nested</p>', '<p>System</p>', '<p>None of these</p>', '1', 12, 1),
(211, '<p>&hellip;&hellip;&hellip;&hellip;..defines the structure of a relation which consists of a fixed set of attribute-domain pairs.<br />&nbsp;</p>', '<p>Instance&nbsp;</p>', '<p>Schema</p>', '<p>Program</p>', '<p>Super key</p>', '2', 12, 1),
(212, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; clause is an additional filter that is applied to the result.<br />&nbsp;</p>', '<p>Select</p>', '<p>Group-by</p>', '<p>Having</p>', '<p>Order-by</p>', '3', 12, 1),
(213, '<p>&nbsp;A logical schema&nbsp;<br />&nbsp;</p>', '<p>is the entire database</p>', '<p>is a standard way of organizing information into accessible parts</p>', '<p>is a standard way of organizing information into accessible parts</p>', '<p>All the above</p>', '2', 12, 1),
(214, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; is a full form of SQL.<br />&nbsp;</p>', '<p>Standard query language</p>', '<p>Sequential query language<br />&nbsp;</p>', '<p>Structured query language</p>', '<p>Server side query language</p>', '3', 12, 1),
(215, '<p>A relational database developer refers to a record as&nbsp;<br />&nbsp;</p>', '<p>a criteria</p>', '<p>a relation</p>', '<p>a tuple</p>', '<p>an attribute</p>', '3', 12, 1),
(216, '<p>.......... keyword is used to find the number of values in a column.<br />&nbsp;</p>', '<p>TOTAL</p>', '<p>COUNT</p>', '<p>ADD</p>', '<p>SUM</p>', '2', 12, 1),
(217, '<p>An advantage of the database management approach is&nbsp;<br />&nbsp;</p>', '<p>data is dependent on programs</p>', '<p>data redundancy increases</p>', '<p>data is integrated and can be accessed by multiple programs</p>', '<p>None of the above</p>', '3', 12, 1),
(218, '<p>The collection of information stored in a database at a particular moment is called as ......<br />&nbsp;</p>', '<p>schema</p>', '<p>instance of the database</p>', '<p>data domain</p>', '<p>independence</p>', '2', 12, 1),
(219, '<p>&nbsp;Data independence means<br />&nbsp;</p>', '<p>data is defined separately and not included in programs</p>', '<p>programs are not dependent on the physical attributes of data&nbsp;</p>', '<p>programs are not dependent on the logical attributes of data&nbsp;</p>', '<p>both B and C&nbsp;</p>', '4', 12, 1),
(220, '<p>A ......... is used to define overall design of the database<br />&nbsp;</p>', '<p>schema</p>', '<p>application program</p>', '<p>data definition language</p>', '<p>code</p>', '1', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillID` int(5) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `testSettings` (
  `skillID` int(5) NOT NULL,
  `numberQuestions` int(5) NOT NULL,
  `timeAllowed` int(5) NOT NULL,
  `passingCriteria` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testSettings`
--

INSERT INTO `testSettings` (`skillID`, `numberQuestions`, `timeAllowed`, `passingCriteria`) VALUES
(1, 10, 120, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileImage` varchar(1000) NOT NULL DEFAULT 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg',
  `gender` enum('M','F') NOT NULL,
  `relationshipStatus` enum('1','2','3','4') NOT NULL DEFAULT '4',
  `accountType` enum('1','2') NOT NULL,
  `cityID` int(5) NOT NULL,
  `emailVerified` tinyint(1) NOT NULL,
  `mobileVerified` tinyint(1) NOT NULL,
  `displayEMail` tinyint(1) NOT NULL,
  `displayMobile` tinyint(1) NOT NULL,
  `registrationLevel` enum('1','2','3','4','5') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `name`, `email`, `mobile`, `password`, `profileImage`, `gender`, `relationshipStatus`, `accountType`, `cityID`, `emailVerified`, `mobileVerified`, `displayEMail`, `displayMobile`, `registrationLevel`, `active`, `created_at`) VALUES
(1, '', 'Nikhil Verma', 'vrmanikhil@gmail.com', 9953017515, 'a581a9ff40d2a401f4046761dff80a4c', 'http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma.jpg', 'M', '4', '1', 135, 1, 1, 1, 1, '5', 1, '2017-06-14 06:48:35'),
(2, '', 'Itishri Singh', 'itishri.singh12@gmail.com', 9871983065, '279759155c3878e305e032b7b5845eda', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 135, 1, 1, 1, 0, '5', 1, '2017-06-14 06:48:31'),
(3, '', 'Vini Maheshwari', 'vinimaheshwari02@gmail.com', 8527856687, '712e4b7a3aecab4bf2658ca3e76432a0', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '4', 1, '2017-06-14 06:49:13'),
(4, '', 'Gautam Lal', 'gautam.lal7@gmail.com', 8527312008, '17ab69fa42fa9e6812a860f3c5d1a8aa', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 135, 1, 1, 1, 0, '5', 1, '2017-06-14 06:48:22'),
(5, '', 'Aishwarya Gupta', 'aishwaryagpt94@gmail.com', 9810047205, 'c571f50ffd6df41b879442dc9425f003', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 135, 1, 0, 1, 0, '3', 0, '2017-06-08 09:38:14'),
(6, '', 'Prashant Chaudhary', 'prashantp099@gmail.com', 9899310579, '3075d701de5770f0016cc1f93adb05bf', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 135, 1, 1, 1, 0, '5', 1, '2017-06-14 06:48:58'),
(7, '', 'Sakshi Jaiswal', 'jswal.sakshi@gmail.com', 9971974077, '11a98374ebec8e0c7a54751d2161804d', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(8, '', 'Abhay Rawat', 'abhayrawat2695@gmail.com', 8468915550, '0cc175b9c0f1b6a831c399e269772661', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(9, '', 'Yash Vardhan', 'yashapril30@gmail.com', 9999393132, 'a9c91bac2c315f83a55ae9fcb88c61f0', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(10, '', 'Shivam Goyal', 'shivam.sinew@gmail.com', 8587882383, '456b370011f154a7ce7af17ee49a76ad', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 181, 1, 0, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(11, '', 'Deergha Jain', 'deerghajain11@gmail.com', 9716150496, '0bb3b7a7855d8532e55577a502ae236e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(12, '', 'Deepti Jain', 'deeptijain9676@gmail.com', 9718669382, '3036514cbad26225659717408c8d2c67', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(13, '', 'Suyash Tilhari', 'suyash.tilhari12@gmail.com', 8375867124, '1bbfd0943ed91f99438eead55020f85a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 181, 1, 0, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(14, '', 'Siddharth Jain', 'sidjain2901@gmail.com', 9560839425, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(15, '', 'Anukriti Keshari', 'anukriti.kaushki@gmail.com', 8860309313, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(16, '', 'Salokya Srivastava', 'sriv.salokya@gmail.com', 9453847603, '62c1dc840b80b395403ad0fed7debcf6', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(17, '', 'Krishnapriya Agarwal', 'kp.agarwal95@gmail.com', 8882521283, 'f1c78b8f774fa7804a081a20df35874a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(18, '', 'Jubika Khanna', 'jubika.khanna@fitpass.co.in', 8130995418, 'dbf3d937d4808b94e0e39b804e0bbea0', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '2', 135, 1, 1, 0, 0, '5', 1, '2017-06-14 06:49:41'),
(19, '', 'Nisha Bharti', 'hr@wisethink.in', 8745024797, '0cc175b9c0f1b6a831c399e269772661', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(20, '', 'Setu Simant', 'setu.simant@silvertouch.com', 9871482198, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(21, '', 'Kunal Kumar', 'kunal_kumar@sislinfotech.com', 7838666639, '508df4cb2f4d8f80519256258cfb975f', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(22, '', 'Ashok Gupta', 'ashok.gupta@velocis.in', 9818826020, '5bd2026f128662763c532f2f4b6f2476', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(23, '', 'Manoj Kumar Garg', 'manoj@netcreativemind.com', 9810978433, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(24, '', 'S R Mustafa', 'srmustafa73@gmail.com', 7838204509, '5baced99d0bb5e574737dc535576bc9c', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(25, '', 'Madhu S Shivakumar', 'madhu.ss96@gmail.com', 9108642164, 'd7aad483f66d38e875ff283dc220b58e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 61, 1, 0, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(26, '', 'Nikhil Verma', 'nikhilverma@campuspuppy.com', 7503705892, 'b24331b1a138cde62aa1f679164fc62f', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 1, '3', 1, '2017-06-08 09:38:14'),
(27, '', 'Rinku Kumar', 'rinku@1solutions.biz', 7428961976, '04b993c532201cefcdbb7b994f105355', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 06:57:48'),
(28, '', 'Adid Khan', 'adid@explorecivil.net', 9973882422, 'c30761beaa3c43a3e9624603bc2e76f7', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:00:30'),
(29, '', 'Rohit Dutt', 'rohit@thealternativeglobal.com', 8800331664, '8a9ef653eb0a66d4f031a2110b6224be', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-13 07:02:39'),
(30, '', 'Nishant Varshney', 'nishantvarshney@gmail.com', 9810832351, 'd569bd79600a6d5b717d5d719c75fa8a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:02:39'),
(31, '', 'Praveen Anasurya', 'anasuryapraveen@gmail.com', 8686173848, '2023f6e09edaca15267e2f5521da5476', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:05:04'),
(32, '', 'Aayush Poddar', 'aayush.257@gmail.com', 8527044088, '833e5ef3c613f09112c35870a7c4624a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:05:04'),
(33, '', 'Ankush Khera', 'hello@foxmybox.com', 9873130686, '610768d03941e226f3824d5152711673', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:07:44'),
(34, '', 'Priyanka Mehta', 'mehta.priyanka97@gmail.com', 9999922663, 'd642b239f86929216a991af383151008', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:14:27'),
(35, '', 'Bhanu Prakash Agarwal', 'bhanu.bcet27@gmail.com', 7903461334, '25f9e794323b453885f5181f1b624d0b', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:14:34'),
(36, '', 'Parul Singh', 'withparulsingh@gmail.com', 9873855357, '9a517c9d23fa78e7117c63de3c494d72', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:10:07'),
(37, '', 'Sukhneet Kaur', 'sukhneet@akalinfosys.com', 9871092725, '989ce6020295e0438ca30ad02cbc6ea3', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'F', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-13 07:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `userSkills`
--

CREATE TABLE `userSkills` (
  `userID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL,
  `score` float NOT NULL,
  `testDate` bigint(12) NOT NULL,
  `skillType` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userSkills`
--

INSERT INTO `userSkills` (`userID`, `skillID`, `score`, `testDate`, `skillType`) VALUES
(1, 1, 60, 1497782274, '1'),
(1, 2, 35, 1497782274, '2'),
(1, 3, 57, 1497782274, '3'),
(1, 4, 71, 1497782274, '4'),
(1, 17, 60, 1497782274, '1');

-- --------------------------------------------------------

--
-- Table structure for table `workExperience`
--

CREATE TABLE `workExperience` (
  `weID` int(5) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startMonth` varchar(255) NOT NULL,
  `startYear` int(4) NOT NULL,
  `endMonth` varchar(255) NOT NULL,
  `endYear` int(4) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievementID`);

--
-- Indexes for table `adminAuth`
--
ALTER TABLE `adminAuth`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `contactMessages`
--
ALTER TABLE `contactMessages`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `employerUsers`
--
ALTER TABLE `employerUsers`
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `indianCities`
--
ALTER TABLE `indianCities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `internshipOffers`
--
ALTER TABLE `internshipOffers`
  ADD PRIMARY KEY (`internshipID`);

--
-- Indexes for table `jobOffers`
--
ALTER TABLE `jobOffers`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `passwordToken`
--
ALTER TABLE `passwordToken`
  ADD PRIMARY KEY (`tokenID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillID`);

--
-- Indexes for table `testSettings`
--
ALTER TABLE `testSettings`
  ADD PRIMARY KEY (`skillID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `workExperience`
--
ALTER TABLE `workExperience`
  ADD PRIMARY KEY (`weID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievementID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adminAuth`
--
ALTER TABLE `adminAuth`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contactMessages`
--
ALTER TABLE `contactMessages`
  MODIFY `contactID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `indianCities`
--
ALTER TABLE `indianCities`
  MODIFY `cityID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;
--
-- AUTO_INCREMENT for table `internshipOffers`
--
ALTER TABLE `internshipOffers`
  MODIFY `internshipID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobOffers`
--
ALTER TABLE `jobOffers`
  MODIFY `jobID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `passwordToken`
--
ALTER TABLE `passwordToken`
  MODIFY `tokenID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `testSettings`
--
ALTER TABLE `testSettings`
  MODIFY `skillID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `workExperience`
--
ALTER TABLE `workExperience`
  MODIFY `weID` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;