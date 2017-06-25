-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2017 at 07:40 PM
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

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`achievementID`, `achievementTitle`, `achievementDescription`, `userID`) VALUES
(1, 'Won Social Innovation Hackathon-2016', '<p>Won Social Innovation Hackathon-2016, organized by Code for India and hosted at Rashtrapati Bhawan, and was awarded by the President of India, Mr. Pranab Mukherjee</p>', 1);

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
(18, 1, 0),
(8, 1, 0),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 12, 1);

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
-- Table structure for table `educationalDetails`
--

CREATE TABLE `educationalDetails` (
  `educationID` int(5) NOT NULL,
  `educationType` enum('1','2','3','4') NOT NULL,
  `description` text NOT NULL,
  `year` int(4) NOT NULL,
  `scoreType` enum('1','2') NOT NULL,
  `score` int(5) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educationalDetails`
--

INSERT INTO `educationalDetails` (`educationID`, `educationType`, `description`, `year`, `scoreType`, `score`, `userID`) VALUES
(1, '3', '<p>JSS Academy of Technical Education, Noida<br />\r\nBachelor of Technology- Computer Science and Engineering</p>', 2016, '2', 70, 1);

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
(37, 'AKAL Information Systems Limited', 'HR', '<p>15 years in Business.<br />\nCMMi Level 3 &amp; ISO 9001:2008 Certified, ISO 2000 certified. 350+ Tech Experts.&nbsp;<br />\n<br />\nPresent in 6 Locations across India. 24/7 International Delivery Centre in Delhi. AKAL is a leading provider of technology solutions for global organizations looking to transform, grow and lead.&nbsp;AKAL brings IT and engineering services expertise under one roof to solve complex business problems for its clients. Working with some of the most cutting-edge technologies in the industry, AKAL is focused on creating innovative solutions and delivering exceptional service to its customers.&nbsp;What sets us apart is our commitment to methodologies &amp; best practices. We think like our customers and believe in long term partnerships with them while continually improving service quality and reducing costs.</p>\n', 'http://www.akalinfosys.com/', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(38, 'Petzo India Private Limited', 'Co-Founder', '<p><strong><em>Petzo India (P) Ltd.</em></strong>is a fast-growing company serving Pets and the humans who love them. We&rsquo;re a company dedicated to the creation of products and services that make Pets Healthy.</p>\r\n\r\n<p>Today, Petzo India (P) Ltd. consists of several major properties:</p>\r\n\r\n<p><strong><em>Petzo Nourish Box:&nbsp;</em></strong>A monthly subscription Personalized food box for Pets.</p>\r\n\r\n<p><strong><em>Pet Herb:&nbsp;</em></strong>Essential Herbal supplements for Pets.</p>\r\n\r\n<p><strong><em>Petzo Research:&nbsp;</em></strong>Research based management consultation, providing market research and advisory solutions in the field of Animal Husbandry.</p>', 'http://www.petzo.in/', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg'),
(40, 'Campus Puppy Private Limited', 'Co-Founder', '', '', 'http://backoffice.campuspuppy.com/assets/companyLogo/default-company.jpg');

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
(17, 1, 6, 2017, ''),
(39, 1, 1, 2018, '');

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
  `status` enum('1','2','3','4') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internshipLocations`
--

CREATE TABLE `internshipLocations` (
  `internshipID` int(5) NOT NULL,
  `cityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internshipLocations`
--

INSERT INTO `internshipLocations` (`internshipID`, `cityID`) VALUES
(1, 135),
(2, 135),
(4, 135),
(5, 135),
(3, 135);

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

--
-- Dumping data for table `internshipOffers`
--

INSERT INTO `internshipOffers` (`internshipID`, `internshipTitle`, `internshipType`, `internshipDescription`, `startDate`, `applicationDeadline`, `stipendType`, `minimumStipend`, `maximumStipend`, `stipend`, `durationType`, `duration`, `partTime`, `openings`, `applicants`, `status`, `active`, `addedBy`, `timestamp`) VALUES
(1, 'Sales and Marketing Intern Required', '2', '<p><strong>Why should you join FITPASS?</strong></p><p>&bull;&nbsp;<strong>Team:</strong>&nbsp;Work with smart and passionate people</p><p>&bull;&nbsp;<strong>Growth:</strong>&nbsp;We have, in a short span of time, put together a very impressive client list with some of the best names in the industry as our clients</p><p>&bull;&nbsp;<strong>Start-up Culture:</strong>&nbsp;Working in a start-up environment will give you exposure to multiple fields and you will learn how a business is built from the ground up</p><p>&bull;&nbsp;<strong>Impact:</strong>&nbsp;FITPASS does not function on a defined hierarchy &amp; everyone&#39;s given equal creative freedom to come up with and execute new ideas to further the business. This setup allows employees to take ownership of their ideas.</p><p><strong>Here&rsquo;s what you&rsquo;ll do Day-to-Day:</strong></p><p>&bull; Engaging with customers to understand their lifestyle and fitness requirements, suggesting fitness options based on their needs and ensuring closure of leads towards conversion</p><p>&bull; Identifying zones/localities with maximum demand for fitness studios and working closely with the Business Development Team to maximise customer satisfaction</p><p>&bull; Providing quality service to customers by giving fitness options based on their requirements, assisting in final purchase and addressing their concerns</p><p>&bull; Provide feedback to our Technology team to improve the website and application basis feedback received from customers</p><p>&bull; Provide world class user support through emails, phone calls and social media to&nbsp;<em>FITPASS Customers</em></p><p>&bull; Hustle with one of the most hard-working teams in the country</p><p>&bull; Contribute to building the team and the organisation for long term success</p><p><strong>Who we&rsquo;re looking for:</strong></p><p>&bull; Someone with a prior work experience is a bonus, though it is not a necessity</p><p>&bull; Excellent written and verbal communication skills in English, and a functional knowledge of Hindi</p><p>&bull; Great understanding of the product</p><p>&bull; Excellent organisational and time management skills with the drive to achieve targets</p><p>&bull; Comfortable travelling within the city</p><p>&bull; Ability to thrive in a highly-charged environment</p><p>&bull; Good knowledge of MS Office</p>', '2017-08-01', '2017-07-15', '2', 0, 0, 0, '1', 6, '2', 100, '3', '1', 0, 18, '2017-06-23 09:44:19'),
(2, 'Business Development Intern Required', '2', '<p><strong>Why should you join FITPASS?</strong></p><p>&bull;&nbsp;<strong>Team:</strong>&nbsp;Work with smart and passionate people</p><p>&bull;&nbsp;<strong>Growth:</strong>&nbsp;We have, in a short span of time, put together a very impressive client list with some of the best names in the industry as our clients</p><p>&bull;&nbsp;<strong>Start-up Culture:</strong>&nbsp;Working in a start-up environment will give you exposure to multiple fields and you will learn how a business is built from the ground up</p><p>&bull;&nbsp;<strong>Impact:</strong>&nbsp;FITPASS does not function on a defined hierarchy &amp; everyone&#39;s given equal creative freedom to come up with and execute new ideas to further the business. This setup allows employees to take ownership of their ideas.</p><p><strong>Here&rsquo;s what you&rsquo;ll do day-to-day:</strong></p><p>&bull; A field intensive role where you need to identifying key players in the industry through extensive market research and convert them into FITPASS partners</p><p>&bull; Imparting necessary training to partnered fitness studios to help them use the CRM system to their maximum advantage</p><p>&bull; Connecting with partnered fitness studios and conducting meetings regularly to maintain long-term relationships and address their concerns</p><p>&bull; Work closely with the Product and Technology team to improve services basis feedback received</p><p>&bull; Working closely with the Branding and Marketing team to increase customer engagement with the brand and with the product</p><p>&bull; Developing strategies for the expansion of FITPASS pan India</p><p><strong>Who we&rsquo;re looking for:</strong></p><p>&bull; Someone with a prior work experience is a bonus, though it is not a necessity</p><p>&bull; Excellent written and verbal communication skills in English, and a functional knowledge of Hindi</p><p>&bull; Great understanding of the product</p><p>&bull; Excellent organizational and time management skills with the drive to achieve targets</p><p>&bull; Comfortable travelling within the city</p><p>&bull; Ability to thrive in a highly-charged environment</p><p>&bull; Good knowledge of MS Office</p><p>&bull; Hustler</p>', '2017-08-01', '2017-07-31', '2', 0, 0, 0, '1', 6, '1', 5, '3', '1', 0, 18, '2017-06-23 09:45:24'),
(3, 'Web Development Intern Required', '1', '<p>We are looking for an outstanding Web Developer intern to be responsible for the coding innovative design and layout of our website. He/she will build our website from concept all the way to completion from the bottom up fashioning everything from the home page to site layout and function.Familiarity with PHP, Java script, My SQL language and related frameworks.</p><p><strong>Core Responsibilities include:</strong></p><ul><li>Design website from scratch</li><li>Database management</li><li>API integration</li></ul>', '2017-08-01', '2017-07-31', '4', 0, 0, 5000, '1', 8, '2', 1, '2', '1', 0, 38, '2017-06-23 10:27:58'),
(4, 'Content Writer Intern Required', '2', '<p>The ideal candidate is someone majoring in Journalism, Communications, or Marketing, with an interest in writing lifestyle content, a goal of learning 1 more about content generation and distribution, and a love of dogs. This internship will give him/her the opportunity to write a ton, work with other writers with experience writing for various publications and businesses, and a chance be in a fast-past startup environment where creativity is encouraged.</p><p><strong>Responsibilities:</strong></p><ul><li>Develop content ideas</li><li>Assist with writing blog articles</li><li>Assist with content calendar</li><li>Assist with sharing blog content</li><li>Assist with various marketing needs (anything from creating videos, to photography, to social media, to helping at events-- this can vary depending on his/her interests and/or skillset!)</li></ul><p><strong>What they&#39;ll get out of it:</strong></p><ul><li>How to write engaging blog posts</li><li>How to write content for a variety of audiences</li><li>How to use Wordpress</li><li>Best practices for sharing content on social channels</li><li>SEO best practices</li><li>They&#39;ll leave with a great portfolio of writing they would do to use for applying to full-time jobs in the future!</li><li>Plus, they&#39;ll get to work with a close and dynamic team with expertise in a range of areas</li></ul>', '2017-08-01', '2017-07-15', '4', 0, 0, 5000, '1', 6, '1', 1, '3', '1', 0, 38, '2017-06-23 10:28:01'),
(5, 'Graphic Designer Intern', '2', '<p>A super star designer with a sharp eye to help create memorable visual elements for our marketing team, who will also be part of the User Experience Design and Prototyping team, a very talented and innovative UX strategist and developer who follows a lean UX approach to creating and building experiences for the Indian and international markets, someone with a great sensibility and who can turn around work on a tight schedule.</p><p>Responsibilities include:</p><ul><li>Assisting in designing supporting material</li><li>Providing design for digital efforts.</li><li>Creating Infographics and short videos.</li><li>UX/UI design</li></ul>', '2017-08-01', '2017-07-15', '4', 0, 0, 5000, '1', 6, '1', 1, '2', '1', 0, 38, '2017-06-23 10:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `internshipSkills`
--

CREATE TABLE `internshipSkills` (
  `internshipID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internshipSkills`
--

INSERT INTO `internshipSkills` (`internshipID`, `skillID`) VALUES
(3, 15),
(3, 9),
(3, 20),
(3, 18),
(3, 12),
(5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `jobApplicants`
--

CREATE TABLE `jobApplicants` (
  `jobID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(1, 135),
(1, 231),
(2, 135),
(2, 231);

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
(1, 'JAVA Developer Required', '1', '<p><strong>Job Responsibilities:</strong></p><ul><li>Candidate should have very strong technical background in Core Java, Spring (MVC, IOC), struts Hibernate/JPA, Agile (scrum), Web services and Design Patterns</li><li>Expertise in J2EE technologies: Spring, Java, JSP, JSF, JDBC, Struts.</li><li>Experience in designing database schemas and writing fine-tuned queries.</li><li>Sound knowledge of Messaging tools like MQ/JMS/TIBCO/Mule ESB.&nbsp;</li><li>Exception handling, Collections API, Multithreading with latest concurrency package, Best practices&nbsp;(such as avoiding code duplication, avoiding hard coded values etc.), Design patterns</li><li>Good knowledge of OOPS concepts, Hibernate and Spring version 3.x 1, Spring Dependency Injection (IOC, MVC, JDBC, JMS, etc)</li><li>Good knowledge of Application Servers like Tomcat and Weblogic.&nbsp;</li><li>Good knowledge of Restful services and JDBC</li><li>Good knowledge of XML Parsers, XML Schema, JAXB</li><li>Experience in implementing JMS messaging services</li></ul><p><strong>Desired Candidate Profile:</strong></p><ul><li>A B.E./ B.Tech (Comp./ EEE)/ MCA (regular) with around &nbsp;(0 &ndash; 1) yrs. of exp. as a Java Developer with exp. in Core Java, Spring (MVC, IOC), struts Hibernate/JPA, Agile (scrum), Web services and Design Patterns with an I.T./ Software Service Company.&nbsp;</li><li>Good knowledge of OOPS concepts, Hibernate and Spring version 3.x 1, Spring Dependency Injection (IOC, MVC, JDBC, JMS, etc)</li><li>Good knowledge of Application Servers like Tomcat and Weblogic.&nbsp;</li><li>Good knowledge of Restful services and JDBC</li><li>Good knowledge of XML Parsers, XML Schema, JAXB,</li><li>Expertise in J2EE technologies: Spring, Java, JSP, JSF, JDBC, Struts, Hibernate.</li><li>Experience in designing database schemas and writing fine-tuned queries.</li><li>Sound knowledge of Messaging tools like MQ/JMS/TIBCO/Mule ESB.&nbsp;</li><li>Built MVC based Web Application Using JSP/Spring framework.</li></ul>', '2017-08-01', '2017-07-15', '1', 1.2, 1.8, 0, '2', 10, '2', '1', 0, 37, '2017-06-23 10:27:45'),
(2, '.NET Developer Required', '1', '<p><strong>Job Responsibilities:</strong></p><ul><li><p>Full Life Cycle application development.</p></li><li><p>Designing, coding and debugging applications.</p></li><li><p>Software analysis, code analysis, requirements analysis, software review, identification of code metrics, system risk analysis, software reliability analysis.</p></li><li><p>Software modelling and simulation</p></li><li><p>Software testing and quality assurance</p></li><li><p>Performance tuning, improvement, balancing, usability, automation.</p></li><li><p>Support, maintain and document software functionality.</p></li><li><p>Integrate software with existing systems.</p></li><li><p>Should have strong knowledge in Oracle/ MS SQL and MySQL Database.</p></li><li><p>Strong in handling Oracle 10g/ SQL Database of large distributed production environment.</p></li><li><p>Database administration of databases such as Oracle/ MS SQL Server.</p></li><li><p>Should have knowledge of configuration, stored procedure, Joining / Unions, Indexing &amp; shrinking DB, QC of DB.</p></li></ul><p><strong>Desired Candidate Profile:</strong></p><ul><li>A B.E./ B.Tech. (Comp./ EEE)/ MCA (regular) with around one &nbsp;(0 - 1) yrs. of exp. as dot NET developer with an I.T./ Software Development Company.</li><li>Candidates must have 60 % marks (from 10th to Higher degree).</li><li>Must have strong basic concepts in ASP.Net 4.0, C#, VB.Net, C#, Framework (2.0, 3.5,4.0, 4.5) HTML &amp; Java Script, &nbsp; ADO.Net, Windows/ Web Application, Web/Web service, WCF, MVC, &amp; JS/ JQuery.</li><li>MSP (Microsoft Software Professional) Certified developer is preferred.</li><li>Should have strong basic concepts of Database (Oracle and/ or SQL Server) and Database Query is must for end developer.</li><li>Strong in basic OOPs with Ajax &amp; Controls, XML and HTML</li><li>Programming Analytical Skills</li><li>Good knowledge of Design Patterns</li><li>Experience of working in n-Tier architecture.</li><li>Should be a Team Player</li><li>Highly logical and analytical in approach</li></ul>', '2017-08-01', '2017-07-15', '1', 1.2, 1.8, 0, '2', 5, '2', '1', 0, 37, '2017-06-23 10:27:47');

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
(1, 17),
(1, 25),
(2, 22),
(2, 25);

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
(1, 1, 2, 'Hello', '2017-06-25 13:53:01', 1),
(2, 2, 1, 'Hey', '2017-06-25 13:56:46', 1),
(3, 1, 2, 'How are you?', '2017-06-25 13:53:41', 0),
(4, 2, 1, 'I am Good, you tell?', '2017-06-25 13:56:46', 1),
(5, 1, 2, 'M fine, thank you', '2017-06-25 13:54:04', 0),
(6, 1, 3, 'Hey', '2017-06-25 13:54:28', 0),
(7, 1, 12, 'Hello? Howz the Cheese?', '2017-06-25 13:54:44', 0),
(8, 1, 4, 'Gautam Bhai, Miss your GJs', '2017-06-25 13:55:10', 0),
(9, 1, 5, 'Heyy', '2017-06-25 13:55:25', 0),
(10, 1, 6, 'Hello Bhai', '2017-06-25 13:55:58', 0),
(11, 1, 2, 'Send me the link for COAT', '2017-06-25 13:56:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `concernedUser` int(5) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationID`, `name`, `image`, `notification`, `concernedUser`, `link`, `timestamp`) VALUES
(1, 'Jubika Khanna', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'Jubika Khanna has sent you a Connection Request.', 1, 'http://cp.ui/connections', '2017-06-25 13:49:47'),
(2, 'Abhay Rawat', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'Abhay Rawat has sent you a Connection Request.', 1, 'http://cp.ui/connections', '2017-06-25 13:50:00');

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

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `projectTitle`, `projectLink`, `projectDescription`, `userID`) VALUES
(1, 'Zealicon-2014 Website', 'http://hackncs.com/zealicon14/', '<p>Zealicon is the annual techno-cultrul festival for JSS Academy of Technical Education, Noida</p>', 1);

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
(41, '<p>In JAVA, if you do not give a value to a variable before using it, ______</p><p>&nbsp;</p>', '<p>It will contain a garbage value</p>', '<p>It will initialized with zero</p>', '<p>Compiler will give an error</p>', '<p>None of the above</p>', '3', 17, 1),
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
(55, '<p>After compilation of JAVA class the file created is</p><p>&nbsp;</p>', '<p>.class</p>', '<p>.doc</p>', '<p>.java</p>', '<p>none of these</p>', '1', 17, 1),
(56, '<p>Super is the predefined</p><p>&nbsp;</p>', '<p>keyword</p>', '<p>method</p>', '<p>&nbsp;keyword and method</p>', '<p>none of these</p>', '3', 17, 1),
(57, '<p>What is the base class of all classes</p><p>&nbsp;</p>', '<p>object class</p>', '<p>string class</p>', '<p>util class</p>', '<p>none of these</p>', '1', 17, 1),
(58, '<p>How many JDBC driver types does Sun define?</p><p>&nbsp;</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '4', 17, 1),
(59, '<p>To run a compiled Java program, the machine must have what loaded and running?</p><p>&nbsp;</p>', '<p>JVM</p>', '<p>byte code</p>', '<p>web browser</p>', '<p>java compiler</p>', '1', 17, 1),
(60, '<p>A JSP is transformed into a:</p><p>&nbsp;</p>', '<p>servlet</p>', '<p>method</p>', '<p>java class</p>', '<p>applet</p>', '1', 17, 1),
(61, '<p>What servlet processor was developed by Apache Foundation and Sun?</p><p>&nbsp;</p>', '<p>Apache Tomcat</p>', '<p>Apache webserver</p>', '<p>Glass fish</p>', '<p>Browser</p>', '1', 17, 1),
(62, '<p>Type 4 is completely written in java hence</p><p>&nbsp;</p>', '<p>Computer</p>', '<p>Cross Platform</p>', '<p>Linux</p>', '<p>Office</p>', '2', 17, 1),
(63, '<p>Statement use to execute Store Procedure</p><p>&nbsp;</p>', '<p>Prepared statement</p>', '<p>Stored procedure</p>', '<p>Callable statement</p>', '<p>Statement</p>', '3', 17, 1),
(64, '<p>How many interface in JDBC API</p>', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '3', 17, 1),
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
(209, '<p>A top-to-bottom relationship among the items in a database is established by a&nbsp;<br />&nbsp;</p>', '<p>Hierarchical schema</p>', '<p>Network schema</p>', '<p>Relational Schema</p>', '<p>All the above</p>', '3', 12, 1),
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
(220, '<p>A ......... is used to define overall design of the database<br />&nbsp;</p>', '<p>schema</p>', '<p>application program</p>', '<p>data definition language</p>', '<p>code</p>', '1', 12, 1),
(221, '<p>Key to represent relationship between tables is called<br /><br />&nbsp;</p>', '<p>primary key</p>', '<p>secondary key</p>', '<p>foreign key</p>', '<p>none of the above</p>', '3', 12, 1),
(222, '<p>Grant and revoke are ....... statements.<br />&nbsp;</p>', '<p>DDL</p>', '<p>TCL</p>', '<p>DCL</p>', '<p>DML</p>', '3', 12, 1),
(223, '<p>DBMS helps achieve<br />&nbsp;</p>', '<p>Data independence&nbsp;</p>', '<p>Centralized control of data</p>', '<p>Neither A nor B</p>', '<p>Both A and B</p>', '4', 12, 1),
(224, '<p>.......... command can be used to modify a column in a table<br />&nbsp;</p>', '<p>alter</p>', '<p>update<br />&nbsp;</p>', '<p>set</p>', '<p>create</p>', '1', 12, 1),
(225, '<p>The candidate key is that you choose to identify each row uniquely is called &hellip;&hellip;&hellip;&hellip;&hellip;..</p><p>&nbsp;</p>', '<p>Alternate Key</p>', '<p>Primary Key</p>', '<p>Foreign Key</p>', '<p>None of the above</p>', '2', 12, 1),
(226, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;.. is used to determine whether of a table contains duplicate rows.</p><p>&nbsp;</p>', '<p>Unique predicate</p>', '<p>Like Predicate</p>', '<p>Null predicate</p>', '<p>In predicate</p>', '1', 12, 1),
(227, '<p>To eliminate duplicate rows &hellip;&hellip;&hellip;&hellip;&hellip;&hellip; is used</p><p>&nbsp;</p>', '<p>NODUPLICATE</p>', '<p>ELIMINATE</p>', '<p>DISTINCT</p>', '<p>None of the above</p>', '3', 12, 1),
(228, '<p>State true or false</p><p>i) A candidate key is a minimal super key.</p><p>ii) A candidate key can also refer to as surrogate key.</p><p>&nbsp;</p>', '<p>i-true, ii-false</p>', '<p>i-false, ii-true</p>', '<p>i-true, ii-true</p>', '<p>i-false, ii-false</p>', '3', 12, 1),
(229, '<p>DCL stands for</p><p>&nbsp;</p>', '<p>Data Control Language</p>', '<p>Data Console Language</p>', '<p>Data Console Level</p>', '<p>Data Control Level</p>', '1', 12, 1),
(230, '<p>&nbsp;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; is the process of organizing data into related tables.</p><p>&nbsp;</p>', '<p>Normalization</p>', '<p>Generalization</p>', '<p>Specialization</p>', '<p>None of the above</p>', '1', 12, 1),
(231, '<p>A &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. Does not have a distinguishing attribute if its own and mostly are dependent entities, which are part of some another entity.</p><p>&nbsp;</p>', '<p>Weak entity</p>', '<p>Strong entity</p>', '<p>Non attributes entity</p>', '<p>Dependent entity</p>', '1', 12, 1),
(232, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;.. is the complex search criteria in the where clause.</p><p>&nbsp;</p>', '<p>Sub string</p>', '<p>Drop Table</p>', '<p>Predict</p>', '<p>Predicate</p>', '4', 12, 1);
INSERT INTO `questions` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `skillID`, `active`) VALUES
(233, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; is preferred method for enforcing data integrity</p><p>&nbsp;</p>', '<p>Constraints</p>', '<p>Stored Procedure</p>', '<p>Triggers</p>', '<p>Cursors</p>', '1', 12, 1),
(234, '<p>The number of tuples in a relation is called its &hellip;&hellip;&hellip;&hellip;. While the number of attributes in a relation is called it&rsquo;s &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</p><p>&nbsp;</p>', '<p>Degree, Cardinality</p>', '<p>Cardinality, Degree</p>', '<p>Rows, Columns</p>', '<p>Columns, Rows</p>', '2', 12, 1),
(235, '<p>The language that requires a user to specify the data to be retrieved without specifying exactly how to get it is</p><p>&nbsp;</p>', '<p>Procedural DML</p>', '<p>Non-Procedural DML</p>', '<p>Procedural DDL</p>', '<p>Non-Procedural DDL</p>', '2', 12, 1),
(236, '<p>Which two files are used during operation of the DBMS?</p>', '<p>Query languages and utilities</p>', '<p>DML and query language</p>', '<p>Data dictionary and transaction log</p>', '<p>Data dictionary and query language</p>', '3', 12, 1),
(237, '<p>The database schema is written in</p><p>&nbsp;</p>', '<p>HLL</p>', '<p>DML</p>', '<p>DDL</p>', '<p>DCL</p>', '3', 12, 1),
(238, '<p>The way a particular application views the data from the database that the application uses is a</p><p>&nbsp;</p>', '<p>module</p>', '<p>relational model</p>', '<p>schema</p>', '<p>sub schema</p>', '4', 12, 1),
(239, '<p>The relational model feature is that there</p><p>&nbsp;</p>', '<p>is no need for primary key data</p>', '<p>is much more data independence than some other database models</p>', '<p>are explicit relationships among records.</p>', '<p>are tables with many dimensions</p>', '2', 12, 1),
(240, '<p>Which one of the following statements is false?</p><p>&nbsp;</p>', '<p>The data dictionary is normally maintained by the database administrator</p>', '<p>Data elements in the database can be modified by changing the data dictionary.</p>', '<p>The data dictionary contains the name and description of each data element.</p>', '<p>The data dictionary is a tool used exclusively by the database administrator.</p>', '2', 12, 1),
(241, '<p>Which of the following are the properties of entities?</p><p>&nbsp;</p>', '<p>Groups</p>', '<p>Table</p>', '<p>Attributes</p>', '<p>Switchboards</p>', '3', 12, 1),
(242, '<p>Which database level is closest to the users?</p><p>&nbsp;</p>', '<p>External</p>', '<p>Internal</p>', '<p>Physical</p>', '<p>Conceptual</p>', '1', 12, 1),
(243, '<p>Which are the two ways in which entities can participate in a relationship?</p><p>&nbsp;</p>', '<p>Passive and active</p>', '<p>Total and partial</p>', '<p>Simple and Complex</p>', '<p>All the above</p>', '2', 12, 1),
(244, '<p>Which if the following is/are the levels of implementation of data structure<br /><br /><br />&nbsp;</p>', '<p>Abstract level<br />&nbsp;</p>', '<p>Application level</p>', '<p>Implementation level</p>', '<p>All of the above</p>', '4', 11, 1),
(245, '<p>A binary search tree whose left subtree and right subtree differ in hight by at most 1 unit is called &hellip;&hellip;<br /><br />&nbsp;</p>', '<p>AVL tree</p>', '<p>Red-black tree</p>', '<p>Lemma tree</p>', '<p>None of the above</p>', '1', 11, 1),
(246, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.. level is where the model becomes compatible executable code<br />&nbsp;</p>', '<p>Abstract level</p>', '<p>Application level</p>', '<p>Implementation level</p>', '<p>All the above</p>', '3', 11, 1),
(247, '<p>Stack is also called as<br />&nbsp;</p>', '<p>Last in first out<br />&nbsp;</p>', '<p>First in last out</p>', '<p>Last in last out</p>', '<p>First in first out</p>', '1', 11, 1),
(248, '<p>Which of the following is true about the characteristics of abstract data types?<br /><br />i) It exports a type.<br /><br />ii) It exports a set of operations<br /><br /><br />&nbsp;</p>', '<p>True, False</p>', '<p>False, True<br />&nbsp;</p>', '<p>True, True<br />&nbsp;</p>', '<p>False, False</p>', '3', 11, 1),
(249, '<p>&hellip;&hellip;&hellip;&hellip;&hellip; is not the component of data structure.<br /><br />&nbsp;</p>', '<p>Operations</p>', '<p>Storage Structures</p>', '<p>Algorithms</p>', '<p>None of above</p>', '4', 11, 1),
(250, '<p>Which of the following is not the part of ADT description?<br /><br />&nbsp;</p>', '<p>Data</p>', '<p>&nbsp;Operations</p>', '<p>Both of the above</p>', '<p>None of the above</p>', '4', 11, 1),
(251, '<p>Inserting an item into the stack when stack is not full is called &hellip;&hellip;&hellip;&hellip;. Operation and deletion of item form the stack, when stack is not empty is called &hellip;&hellip;&hellip;..operation.<br /><br />&nbsp;</p>', '<p>push, pop</p>', '<p>pop, push</p>', '<p>insert, delete</p>', '<p>delete, insert</p>', '1', 11, 1),
(252, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;. Is a pile in which items are added at one end and removed from the other.<br /><br />&nbsp;</p>', '<p>Stack</p>', '<p>Queue</p>', '<p>List</p>', '<p>None of the above</p>', '2', 11, 1),
(253, '<p>&hellip;&hellip;&hellip;&hellip; is very useful in situation when data have to stored and then retrieved in reverse order.<br /><br />&nbsp;</p>', '<p>Stack</p>', '<p>Queue</p>', '<p>List</p>', '<p>Link list</p>', '1', 11, 1),
(254, '<p>Which data structure allows deleting data elements from and inserting at rear?<br /><br />&nbsp;</p>', '<p>Stacks</p>', '<p>Queues</p>', '<p>Dequeues</p>', '<p>Binary search tree</p>', '2', 11, 1),
(255, '<p>Which of the following data structure can&#39;t store the non-homogeneous data elements?<br /><br />&nbsp;</p>', '<p>Arrays<br />&nbsp;</p>', '<p>Records<br />&nbsp;</p>', '<p>Pointers</p>', '<p>Stacks</p>', '1', 11, 1),
(256, '<p>A ....... is a data structure that organizes data similar to a line in the supermarket, where the first one in line is the first one out.<br /><br />&nbsp;</p>', '<p>Queue linked list</p>', '<p>Stacks linked list<br />&nbsp;</p>', '<p>Both of them</p>', '<p>None of them</p>', '1', 11, 1),
(257, '<p>Which of the following is non-liner data structure?<br /><br /><br /><br />&nbsp;</p>', '<p>Stacks</p>', '<p>List</p>', '<p>Strings</p>', '<p>Trees</p>', '4', 11, 1),
(258, '<p>Herder node is used as sentinel in .....<br /><br />&nbsp;</p>', '<p>Graphs</p>', '<p>Stacks</p>', '<p>Binary tree</p>', '<p>Queues</p>', '3', 11, 1),
(259, '<p>Which data structure is used in breadth first search of a graph to hold nodes?<br /><br />&nbsp;</p>', '<p>Stack&nbsp;</p>', '<p>queue</p>', '<p>Tree</p>', '<p>Array</p>', '2', 11, 1),
(260, '<p>Identify the data structure which allows deletions at both ends of the list but insertion at only one end.<br /><br />&nbsp;</p>', '<p>Input restricted dequeue<br />&nbsp;</p>', '<p>Output restricted qequeue</p>', '<p>Priority queues</p>', '<p>Stack</p>', '1', 11, 1),
(261, '<p>Which of the following data structure is non linear type?<br /><br />&nbsp;</p>', '<p>Strings</p>', '<p>Lists</p>', '<p>Stacks&nbsp;</p>', '<p>Graph&nbsp;</p>', '4', 11, 1),
(262, '<p>Which of the following data structure is linear type?<br /><br />&nbsp;</p>', '<p>Graph&nbsp;</p>', '<p>Trees</p>', '<p>Binary tree</p>', '<p>Stack</p>', '4', 11, 1),
(263, '<p>To represent hierarchical relationship between elements, Which data structure is suitable?<br /><br />&nbsp;</p>', '<p>Dequeue</p>', '<p>Priority</p>', '<p>Tree</p>', '<p>Graph</p>', '3', 11, 1),
(264, '<p>A directed graph is &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. if there is a path from each vertex to every other vertex in the digraph.<br /><br />&nbsp;</p>', '<p>Weakly connected</p>', '<p>Strongly Connected</p>', '<p>Tightly Connected</p>', '<p>Linearly Connected</p>', '2', 11, 1),
(265, '<p>In the &hellip;&hellip;&hellip;&hellip;&hellip;.. traversal we process all of a vertex&rsquo;s descendants before we move to an adjacent vertex.<br /><br />&nbsp;</p>', '<p>Depth First</p>', '<p>Breadth First</p>', '<p>With First</p>', '<p>Depth Limited</p>', '1', 11, 1),
(266, '<p>State True of False.<br /><br />i) Network is a graph that has weights or costs associated with it.<br /><br />ii) An undirected graph which contains no cycles is called a forest.<br /><br />iii) A graph is said to be complete if there is no edge between every pair of vertices.<br /><br />&nbsp;</p>', '<p>True, False, True</p>', '<p>True, True, False</p>', '<p>True, True, True</p>', '<p>False, True, True</p>', '2', 11, 1),
(267, '<p>The number of comparisons done by sequential search is &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;<br /><br />&nbsp;</p>', '<p>&nbsp;(N/2)+1<br />&nbsp;</p>', '<p>(N+1)/2</p>', '<p>(N-1)/2</p>', '<p>(N+2)/2</p>', '2', 11, 1),
(268, '<p>&nbsp;In &hellip;&hellip;&hellip;&hellip;&hellip;, search start at the beginning of the list and check every element in the list.<br /><br />&nbsp;</p>', '<p>Linear search</p>', '<p>Binary search</p>', '<p>Hash Search</p>', '<p>Binary Tree search</p>', '1', 11, 1),
(269, '<p>State True or False.<br /><br />i) Binary search is used for searching in a sorted array.<br /><br />ii) The time complexity of binary search is O(logn).<br /><br />&nbsp;</p>', '<p>True, False</p>', '<p>False, True</p>', '<p>False, False</p>', '<p>True, True</p>', '4', 11, 1),
(270, '<p>Which of the following is not the internal sort?<br /><br />&nbsp;</p>', '<p>Insertion Sort</p>', '<p>Bubble Sort</p>', '<p>Merge Sort</p>', '<p>Heap Sort</p>', '3', 11, 1),
(271, '<p>State True or False.<br /><br />i) An undirected graph which contains no cycles is called forest.<br /><br />ii) A graph is said to be complete if there is an edge between every pair of vertices.<br /><br />&nbsp;</p>', '<p>True, True</p>', '<p>False, True</p>', '<p>False, False</p>', '<p>True, False</p>', '1', 11, 1),
(272, '<p>A graph is said to be &hellip;&hellip;&hellip;&hellip;&hellip;&hellip; if the vertices can be split into two sets V1 and V2 such there are no edges between two vertices of V1 or two vertices of V2.<br /><br />&nbsp;</p>', '<p>Partite</p>', '<p>Bipartite<br />&nbsp;</p>', '<p>Rooted</p>', '<p>Bisects</p>', '2', 11, 1),
(273, '<p>&nbsp;In a queue, the initial values of front pointer f rare pointer r should be &hellip;&hellip;.. and &hellip;&hellip;&hellip;.. respectively.<br /><br /><br />&nbsp;</p>', '<p>0 and 1</p>', '<p>0 and -1<br />&nbsp;</p>', '<p>-1 and 0</p>', '<p>1 and 0</p>', '3', 11, 1),
(274, '<p>In a circular queue the value of r will be ..<br /><br />&nbsp;</p>', '<p>r=r+1</p>', '<p>r=(r+1)% [QUEUE_SIZE &ndash; 1]</p>', '<p>r=(r+1)% QUEUE_SIZE</p>', '<p>r=(r-1)% QUEUE_SIZE</p>', '3', 11, 1),
(275, '<p>The advantage of &hellip;&hellip;&hellip;&hellip;&hellip;.. is that they solve the problem if sequential storage representation. But disadvantage in that is they are sequential lists.<br /><br />&nbsp;</p>', '<p>Lists</p>', '<p>Linked Lists</p>', '<p>Trees</p>', '<p>Queues</p>', '2', 11, 1),
(276, '<p>For a given input, it provides the compliment of Boolean AND output.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>NAND box (NOT AND)</p>', '<p>DELAY box</p>', '<p>OR box</p>', '<p>AND box</p>', '1', 3, 1),
(277, '<p>................ delays the transmission of signal along the wire by one step (clock pulse).</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>NAND box (NOT AND)</p>', '<p>DELAY box</p>', '<p>OR box</p>', '<p>AND box</p>', '2', 3, 1),
(278, '<p>&nbsp;If L1 and L2 are regular languages then .............. is/are also regular language(s).</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>L1 + L2</p>', '<p>L1L2</p>', '<p>L1</p>', '<p>All the above</p>', '4', 3, 1),
(279, '<p>To describe the complement of a language, it is very important to describe the ----------- of that language over which the language is defined.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Alphabet</p>', '<p>Regular Expression</p>', '<p>String</p>', '<p>Word</p>', '1', 3, 1),
(280, '<p>&nbsp;If L is a regular language then, --------- is also a regular language.</p><p>&nbsp;</p>', '<p>Lm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>Ls&nbsp;&nbsp;&nbsp;</p>', '<p>Lx&nbsp;</p>', '<p>Lc</p>', '4', 3, 1),
(281, '<p>Converting each of the final states of F to non-final states and old non-final states of F to final states, FA thus obtained will reject every string belonging to L and will accept every string, defined over &Sigma;, not belonging to L. is called</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Transition Graph of L</p>', '<p>Regular expression of L</p>', '<p>Complement of L</p>', '<p>Finite Automata of L</p>', '3', 3, 1),
(282, '<p>L= language of words containing&nbsp;even number of a&rsquo;s. Regular Expression is</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>(a+b)aa(a+b)</p>', '<p>(b+aba)</p>', '<p>a+bbaaba</p>', '<p>(a+b)ab(a+b</p>', '2', 3, 1),
(283, '<p>The regular expression defining the language L1&nbsp;U&nbsp;L2 can be obtained, converting and reducing the previous ------------- into a ------------ as after eliminating states.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>GTG, TG</p>', '<p>FA, GTG</p>', '<p>FA, TG</p>', '<p>TG, RE</p>', '2', 3, 1),
(284, '<p>The languages -------------- are the examples of non regular languages.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>PALINDROME&nbsp;and&nbsp;PRIME</p>', '<p>PALINDROME&nbsp;and&nbsp;EVEN-EVEN</p>', '<p>EVEN-EVEN&nbsp;and&nbsp;PRIME</p>', '<p>FACTORIAL and SQURE</p>', '1', 3, 1),
(285, '<p>Let L be any infinite regular language, defined over an alphabet&nbsp;&Sigma;&nbsp;then there exist three strings x, y and z belonging to&nbsp;&Sigma;such that all the strings of the form XY^ n Z for n=1,2,3, &hellip; are the words in L. called.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Complement of L</p>', '<p>Pumping Lemma</p>', '<p>Kleene&rsquo;s theorem</p>', '<p>None in given</p>', '2', 3, 1),
(286, '<p>Let L be any infinite regular language, defined over an alphabet&nbsp;&Sigma;&nbsp;then there exist three strings x, y and z belonging to&nbsp;&Sigma;such that all the strings of the form XY^ n Z for n=1,2,3, &hellip; are the words in L. called.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Complement of L</p>', '<p>Pumping Lemma</p>', '<p>Kleene&rsquo;s theorem</p>', '<p>None in given</p>', '2', 3, 1),
(287, '<p>------------------- is obviously infinite language.</p><p>&nbsp;</p>', '<p>EQUAL-EQUAL</p>', '<p>EVEN-EVEN</p>', '<p>PALINDROME</p>', '<p>FACTORIAL</p>', '3', 3, 1),
(288, '<p>Myhill Nerode theorem is consisting of the followings,</p><p>&nbsp;</p>', '<p>L partitions&nbsp;&Sigma; into distinct classes</p>', '<p>If L is regular then, L generates finite number of classes.</p>', '<p>If L generates finite number of classes then L is regular.</p>', '<p>All the above</p>', '4', 3, 1),
(289, '<p>The language Q is said to be&nbsp;quotient of two regular languages&nbsp;P and R, denoted by...........&nbsp;if PQ=R.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>&nbsp;</p>', '<p>R=Q/P&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>Q=R/P&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>Q=P/R&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>P=R/Q</p>', '2', 3, 1),
(290, '<p>Let Q = {aa, abaaabb, bbaaaaa, bbbbbbbbbb} and R = {b, bbbb, bbbaaa, bbbaaaaa}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><p>Pref (Q in R) is equal to,</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>{b,bbba,bbbaaa}</p>', '<p>{b,bba,bbaaa}</p>', '<p>{ab,bba,bbbaa}</p>', '<p>{b,bba,bbba}</p>', '1', 3, 1),
(291, '<p>If R is regular language and Q is any language (regular/&nbsp;non regular), then Pref (Q in R) is ---------.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Non-regular</p>', '<p>Equal</p>', '<p>Regular</p>', '<p>Infinite</p>', '3', 3, 1),
(292, '<p>&quot;CFG&quot; stands for _________</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Context Free Graph</p>', '<p>Context Free Grammar</p>', '<p>Context Finite Graph</p>', '<p>Context Finite Grammar</p>', '2', 3, 1),
(293, '<p>&nbsp;&nbsp;___________ states are called the halt states.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>ACCEPT and REJECT</p>', '<p>ACCEPT and READ</p>', '<p>ACCEPT AND START</p>', '<p>ACCEPT AND WRITE</p>', '1', 3, 1),
(294, '<p>The part of an FA, where the input string is placed before it is run, is called _______</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>State</p>', '<p>Transition</p>', '<p>Input Tape</p>', '<p>Output Tape</p>', '3', 3, 1),
(295, '<p>In new format of an FA (discussed in lecture 37), This state is like dead-end non final state</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>ACCEPT</p>', '<p>REJECT</p>', '<p>STATR</p>', '<p>READ</p>', '2', 3, 1),
(296, '<p>For language L defined over {a, b}, then L partitions {a, b}into &hellip;&hellip; classes</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Infinite</p>', '<p>Finite</p>', '<p>Distinct</p>', '<p>Non-distinct</p>', '3', 3, 1),
(297, '<p>The major problem in the earliest computers was</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>To store the contents in the registers</p>', '<p>To display mathematical formulae</p>', '<p>To load the contents from the registers</p>', '<p>To calculate the mathematical formula</p>', '2', 3, 1),
(298, '<p>Between the two consecutive joints on a path</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>One character can be pushed and one character can be popped</p>', '<p>Any no. of characters can be pushed and one character can be popped</p>', '<p>One character can be pushed and any no. of characters can be popped</p>', '<p>Any no. of characters can be pushed and any no. of characters can be popped</p>', '2', 3, 1),
(299, '<p>&nbsp;&nbsp;In pumping lemma theorem (x y^n z) the range of n is</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>n=1, 2, 3, 4&hellip;&hellip;&hellip;.</p>', '<p>n=0, 1, 2, 3, 4&hellip;&hellip;&hellip;.</p>', '<p>n=&hellip;&hellip;.-3,-2,-1, 0, 1, 2, 3, 4&hellip;&hellip;</p>', '<p>n=&hellip;&hellip;.-3,-2,-1, 1, 2, 3, 4&hellip;&hellip;</p>', '1', 3, 1),
(300, '<p>The PDA is called non-deterministic PDA when there are more than one out going edges from&hellip;&hellip;&hellip; state</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>START or READ</p>', '<p>POP or REJECT</p>', '<p>READ or POP</p>', '<p>PUSH or POP</p>', '3', 3, 1),
(301, '<p>Identify the TRUE statement:</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A PDA is non-deterministic, if there are more than one READ states in PDA</p>', '<p>A PDA is never non-deterministic</p>', '<p>Like TG, A PDA can also be non-deterministic</p>', '<p>A PDA is non-deterministic, if there are more than one REJECT states in PDA</p>', '3', 3, 1),
(302, '<p>If an effectively solvable problem has answered in yes or no, then this solution is called ---------</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Decision procedure</p>', '<p>Decision method</p>', '<p>Decision problem</p>', '<p>Decision making</p>', '1', 3, 1),
(303, '<p>The following problem(s) ------------- is/are called decidable problem(s).</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>The two regular expressions define the same language</p>', '<p>The two FAs are equivalent</p>', '<p>Both a and b</p>', '<p>None of given</p>', '3', 3, 1),
(304, '<p>To examine whether a certain FA accepts any words, it is required to seek the paths from ------- state.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Final to initial</p>', '<p>Final to final</p>', '<p>Initial to final</p>', '<p>Initial to initial</p>', '3', 3, 1),
(305, '<p>Grammatical rules which involve the meaning of words are called ---------------</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Semantics</p>', '<p>Syntactic</p>', '<p>Both a and b</p>', '<p>None of given</p>', '1', 3, 1),
(306, '<p>Grammatical rules which do not involve the meaning of words are called ---------------</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Semantics</p>', '<p>Syntactic</p>', '<p>Both a and b</p>', '<p>None of given</p>', '2', 3, 1),
(307, '<p>The symbols that can&rsquo;t be replaced by anything are called -----------------</p><p>&nbsp;</p>', '<p>Productions</p>', '<p>Terminals</p>', '<p>Non-terminals</p>', '<p>All of above</p>', '2', 3, 1),
(308, '<p>What is a context in android ?</p><p>&nbsp;</p>', '<p>It is an interface to store global information about an application</p>', '<p>It is used to create new components.</p>', '<p>Android has two contexts, those are getContext() and getApplicationContext()</p>', '<p>All the above</p>', '4', 1, 1),
(309, '<p>What is the life cycle of services in android?</p><p>&nbsp;</p>', '<p>onCreate()&minus;&gt;onStartCommand()&minus;&gt;onDestory()</p>', '<p>onRecieve()</p>', '<p>final()</p>', '<p>Service life cycle is same as activity life cycle.</p>', '1', 1, 1),
(310, '<p>How many threads are there in asyncTask in android?</p><p>&nbsp;</p>', '<p>Only one</p>', '<p>Two</p>', '<p>AsyncTask doesn&#39;t have tread</p>', '<p>None of the above</p>', '1', 1, 1),
(311, '<p>&nbsp;What is the use of content provider in android?</p><p>&nbsp;</p>', '<p>To send the data from an application to another application</p>', '<p>To store the data in a database</p>', '<p>To share the data between applications</p>', '<p>None of the above</p>', '3', 1, 1),
(312, '<p>What is JNI in android?</p><p>&nbsp;</p>', '<p>Java network interface</p>', '<p>Java interface</p>', '<p>Image editable tool</p>', '<p>Java native interface</p>', '4', 1, 1),
(313, '<p>How many ports are allocated for new emulator?</p><p>&nbsp;</p>', '<p>2</p>', '<p>0</p>', '<p>10</p>', '<p>None of the above</p>', '1', 1, 1),
(314, '<p>What is the package name of JSON?</p><p>&nbsp;</p>', '<p>com.json</p>', '<p>in.json</p>', '<p>com.android.JSON</p>', '<p>org.json</p>', '4', 1, 1),
(315, '<p>What is fragment in android?</p><p>&nbsp;</p>', '<p>JSON</p>', '<p>Peace of Activity</p>', '<p>Layout</p>', '<p>None of the above</p>', '2', 1, 1),
(316, '<p>Is it possible activity without UI in android?</p><p>&nbsp;</p>', '<p>No, it&#39;s not possible</p>', '<p>Yes,it&#39;s possible</p>', '<p>We can&#39;t say</p>', '<p>None of the above</p>', '2', 1, 1),
(317, '<p>What is bean class in android?</p><p>&nbsp;</p>', '<p>A class used to hold states and objects</p>', '<p>A bean class can be passed from one activity to another</p>', '<p>A mandatory class in android</p>', '<p>None of the above</p>', '1', 1, 1),
(318, '<p>What operating system is used as the base of the Android stack?</p><p>&nbsp;</p>', '<p>Linux</p>', '<p>Java</p>', '<p>Windows</p>', '<p>XML</p>', '1', 1, 1),
(319, '<p>What does the .apk extension stand for?</p><p>&nbsp;</p>', '<p>Application Package</p>', '<p>Application Program Kit</p>', '<p>&nbsp;&nbsp;Android Proprietary Kit</p>', '<p>Android Package</p>', '1', 1, 1),
(320, '<p>Which of these are not one of the three main components of the APK?</p><p>&nbsp;</p>', '<p>Webkit</p>', '<p>&nbsp;Native Libraries</p>', '<p>&nbsp;Resources</p>', '<p>Dalvik Executable</p>', '1', 1, 1),
(321, '<p>&nbsp;As an Android programmer, what version of Android should you use as your minimum development target?</p><p>&nbsp;</p>', '<p>&nbsp;Versions 1.0 or 1.1</p>', '<p>Versions 1.6 or 2.0</p>', '<p>Versions 1.2 or 1.3</p>', '<p>&nbsp;&nbsp;Versions 2.3 or 3.0</p>', '2', 1, 1),
(322, '<p>Which one is not a nickname of a version of Andriod?</p><p>&nbsp;</p>', '<p>Honeycomb</p>', '<p>Muffin</p>', '<p>Gingerbread</p>', '<p>Cupcake</p>', '4', 1, 1),
(323, '<p>When developing for the Android OS, Java byte code is compiled into what?</p><p>&nbsp;</p>', '<p>&nbsp;C source code</p>', '<p>Dalvik byte code</p>', '<p>&nbsp;&nbsp;Dalvik application code</p>', '<p>&nbsp;Java source code</p>', '2', 1, 1),
(324, '<p>What is the name of the program that converts Java byte code into Dalvik byte code?</p><p>&nbsp;</p>', '<p>Mobile Interpretive Compiler (MIC)</p>', '<p>Dex compiler</p>', '<p>&nbsp;Dalvik Converter</p>', '<p>&nbsp;Android Interpretive Compiler (AIC)</p>', '2', 1, 1),
(325, '<p>Android tries hard to _____low-level components, such as the software stack, with interfaces so that vendor-specific code can be managed easily.</p><p>&nbsp;</p>', '<p>&nbsp;compound</p>', '<p>modularize</p>', '<p>&nbsp;&nbsp;absract</p>', '<p>confound</p>', '3', 1, 1),
(326, '<p>What part of android platform is open source?</p><p>&nbsp;</p>', '<p>Low level linux modules.</p>', '<p>Native libraries</p>', '<p>&nbsp;Application framework.</p>', '<p>All of these</p>', '4', 1, 1),
(327, '<p>What was the main reason for replacing the java VM with the Dalvik VM when project began?</p><p>&nbsp;</p>', '<p>There was not enough memory capability.</p>', '<p>Java virtual machine was not free.</p>', '<p>Java VM was too complicated to configure.</p>', '<p>Java VM ran too slow.</p>', '2', 1, 1),
(328, '<p>Android ids licensed under which open source licensing license?</p><p>&nbsp;</p>', '<p>Gnu GPL</p>', '<p>Apache/MIT</p>', '<p>OSS</p>', '<p>Source forge</p>', '2', 1, 1),
(329, '<p>Which piece of code used in Android is not open source? | Android<br /><br />&nbsp;</p>', '<p>Keypad driver</p>', '<p>WiFi? driver</p>', '<p>Audio driver</p>', '<p>Power management</p>', '2', 1, 1),
(330, '<p>Which among these are NOT a part of Android&#39;s native libraries?<br /><br />&nbsp;</p>', '<p>Webkit</p>', '<p>Dalvik</p>', '<p>OpenGL</p>', '<p>SQLite</p>', '2', 1, 1),
(331, '<p>What is a key difference with the distribution of apps for Android based devices than other mobile device platform applications?<br /><br />&nbsp;</p>', '<p>Applications are distributed by Apple App Store only</p>', '<p>Applications are distributed by multiple vendors with different policies on applications</p>', '<p>Applications are distributed by multiple vendors with the exact same policies on applications</p>', '<p>&nbsp;Applications are distributed by the Android Market only</p>', '2', 1, 1),
(332, '<p>How does Google check for malicious software in the Android Market?&nbsp;<br /><br />&nbsp;</p>', '<p>&nbsp;Every new app is scanned by a virus scanner</p>', '<p>Users report malicious software to Google</p>', '<p>Google employees verify each new app</p>', '<p>&nbsp;A seperate company monitors the Android Market for Google</p>', '2', 1, 1),
(333, '<p>Android Applications must be signed. | Android<br /><br />&nbsp;</p>', '<p>&nbsp;After they are installed</p>', '<p>&nbsp;Before they are installed</p>', '<p>Within two weeks&nbsp;</p>', '<p>Never</p>', '2', 1, 1),
(334, '<p>What is contained within the manifest xml file? | Android<br /><br /><br />&nbsp;</p>', '<p>The permissions the app requires</p>', '<p>&nbsp;The list of strings used in the app</p>', '<p>&nbsp;The source code</p>', '<p>All the above</p>', '1', 1, 1),
(335, '<p>What is contained within the Layout xml file?&nbsp;<br /><br />&nbsp;</p>', '<p>Orientations and layouts that specify what the display looks like.</p>', '<p>The permissions required by the app.</p>', '<p>&nbsp;The strings used in the app.</p>', '<p>The code which is compiled to run the app.</p>', '1', 1, 1),
(336, '<p>The emulated device for android.&nbsp;<br /><br /><br />&nbsp;</p>', '<p>Runs the same code base as the actual device, all the way down to the machine layer.</p>', '<p>&nbsp;Is more of a simulator, and acts as a virtual machine for the Android device.</p>', '<p>Runs the same code base as the actual device, however at a higher level.</p>', '<p>&nbsp;An imaginary machine built on the hopes and dreams of baby elephants.</p>', '1', 1, 1),
(337, '<p>he Emulator is identical to running a real phone EXCEPT when emulating/simulating what?&nbsp;<br /><br />&nbsp;</p>', '<p>&nbsp;Telephony</p>', '<p>Applications</p>', '<p>Sensors</p>', '<p>&nbsp;The emulator can emulate/simulate all aspects of a smart phone.</p>', '3', 1, 1),
(338, '<p>The R file is a(an) generated file&nbsp;<br /><br />&nbsp;</p>', '<p>Automatically</p>', '<p>&nbsp;Manually</p>', '<p>&nbsp;Emulated</p>', '<p>&nbsp;None of the above</p>', '1', 1, 1),
(339, '<p>An activity can be thought of as corresponding to what?&nbsp;<br />&nbsp;</p>', '<p>&nbsp; &nbsp;A Java project</p>', '<p>A Java class</p>', '<p>&nbsp;A method call</p>', '<p>&nbsp;An object field</p>', '2', 1, 1),
(340, '<p>&nbsp;A substitution cipher substitutes one symbol with</p><p>&nbsp;</p>', '<p>Keys</p>', '<p>Others</p>', '<p>Multi Parties</p>', '<p>Single Party</p>', '2', 10, 1),
(341, '<p>An asymmetric-key (or public-key) cipher uses</p>', '<p>1 Key</p>', '<p>2&nbsp;Keys</p>', '<p>3 Keys</p>', '<p>4 Keys</p>', '2', 10, 1),
(342, '<p>A straight permutation cipher or a straight P-box has same number of inputs as</p>', '<p>cipher</p>', '<p>Frames</p>', '<p>Outputs</p>', '<p>Bits</p>', '3', 10, 1),
(343, '<p>We use Cryptography term to transforming messages to make them secure and immune to</p>', '<p>Change</p>', '<p>Idle</p>', '<p>Attacks</p>', '<p>Defend</p>', '3', 10, 1),
(344, '<p>&nbsp;Man-in-the-middle attack can endanger security of Diffie-Hellman method if two parties are not</p>', '<p>Authenticated</p>', '<p>Joined</p>', '<p>Submit</p>', '<p>Seperate</p>', '1', 10, 1),
(345, '<p>&nbsp;In Asymmetric-Key Cryptography, two keys, e and d, have a special relationship to</p>', '<p>Others</p>', '<p>Data</p>', '<p>Keys</p>', '<p>Each other</p>', '4', 10, 1),
(346, '<p>Shift cipher is sometimes referred to as the</p>', '<p>Caesar cipher</p>', '<p>Shift cipher</p>', '<p>cipher</p>', '<p>cipher text</p>', '1', 10, 1),
(347, '<p>Substitutional cipers are</p>', '<p>Monoalphabatic</p>', '<p>Sami alphabetic</p>', '<p>polyalphabetic</p>', '<p>both a and c</p>', '4', 10, 1),
(348, '<p>Heart of Data Encryption Standard (DES), is the</p>', '<p>Cipher</p>', '<p>Rounds</p>', '<p>Encryption</p>', '<p>DES function</p>', '4', 10, 1),
(349, '<p>DES stands for</p>', '<p>Data Encryption Standard</p>', '<p>Data Encryption Subscription</p>', '<p>Data Encryption Solutions</p>', '<p>Data Encryption Slots</p>', '1', 10, 1),
(350, '<p>Cryptography algorithms (ciphers) are divided into</p>', '<p>two groups</p>', '<p>four groups</p>', '<p>one single group</p>', '<p>none</p>', '1', 10, 1),
(351, '<p>A substitution cipher replaces one symbol with</p>', '<p>same symbol</p>', '<p>provide two symbols for each</p>', '<p>another</p>', '<p>all of them</p>', '3', 10, 1),
(352, '<p>Advanced Encryption Standard (AES), has three different configurations with respect to number of rounds and</p>', '<p>Data Size</p>', '<p>Round Size</p>', '<p>Key Size</p>', '<p>Encryption Size</p>', '3', 10, 1),
(353, '<p>&nbsp;In Cryptography, original message, before being transformed, is called</p>', '<p>Simple Text</p>', '<p>Plain Text</p>', '<p>Empty Text</p>', '<p>Filled Text</p>', '2', 10, 1),
(354, '<p>In Cryptography, input bits are rotated to right or left in</p>', '<p>Rotation Cipher</p>', '<p>XOR cipher</p>', '<p>cipher</p>', '<p>cipher text</p>', '1', 10, 1),
(355, '<p>An encryption algorithm transforms plaintext into</p>', '<p>Cipher text</p>', '<p>Simple Text</p>', '<p>Plain Text</p>', '<p>Empty Text</p>', '1', 10, 1),
(356, '<p>&nbsp;For RSA to work, value of P must be less than value of</p>', '<p>p</p>', '<p>q</p>', '<p>n</p>', '<p>r</p>', '3', 10, 1),
(357, '<p>Original message, before being transformed, is</p>', '<p>Cipher text</p>', '<p>plaintext</p>', '<p>decryption</p>', '<p>none</p>', '2', 10, 1),
(358, '<p>In Asymmetric-Key Cryptography, although RSA can be used to encrypt and decrypt actual messages, it is very slow if message is</p>', '<p>Short</p>', '<p>Long</p>', '<p>Flat&nbsp;</p>', '<p>Thin</p>', '2', 10, 1),
(359, '<p>In symmetric key cryptography, key used by sender and receiver is</p>', '<p>shared</p>', '<p>different</p>', '<p>two keys are used</p>', '<p>none</p>', '1', 10, 1),
(360, '<p>Ciphers of today are called</p>', '<p>Substitution Cipher</p>', '<p>Round ciphers</p>', '<p>Transposition Cipher</p>', '<p>None</p>', '2', 10, 1),
(361, '<p>&nbsp;In Rotation Cipher, keyless rotation number of rotations is</p>', '<p>Jammed</p>', '<p>Idle</p>', '<p>Rotating</p>', '<p>Fixed</p>', '4', 10, 1),
(362, '<p>In symmetric-key cryptography, same key is used by</p>', '<p>One Party</p>', '<p>Multi Party</p>', '<p>Third Party</p>', '<p>Both Party</p>', '4', 10, 1),
(363, '<p>In symmetric-key cryptography, key locks and unlocks box is</p>', '<p>same</p>', '<p>shared</p>', '<p>private</p>', '<p>public</p>', '1', 10, 1),
(364, '<p>Keys used in cryptography are</p>', '<p>secret key</p>', '<p>private key</p>', '<p>public key</p>', '<p>All the above</p>', '4', 10, 1),
(365, '<p>Ciphers of today are called round ciphers because they involve</p>', '<p>Single Round</p>', '<p>Double Rounds</p>', '<p>Multiple Rounds</p>', '<p>Round about</p>', '3', 10, 1),
(366, '<p>&nbsp;Symmetric-key cryptography started thousands of years ago when people needed to exchange</p>', '<p>Files</p>', '<p>Packets</p>', '<p>Secrets</p>', '<p>Transmission</p>', '3', 10, 1),
(367, '<p>Relationship between a character in plaintext to a character is</p>', '<p>many-to-one relationship</p>', '<p>one-to-many relationship</p>', '<p>many-to-many relationship</p>', '<p>none</p>', '2', 10, 1),
(368, '<p>Cryptography, a word with Greek origins, means</p>', '<p>Corrupting Data</p>', '<p>Secret Writing</p>', '<p>Open Writing</p>', '<p>Closed Writing</p>', '2', 10, 1),
(369, '<p>Cipher feedback (CFB) mode was created for those situations in which we need to send or receive r bits of</p>', '<p>Frames</p>', '<p>Pixels</p>', '<p>Data</p>', '<p>Encryption</p>', '3', 10, 1),
(370, '<p>In Cryptography, when text is treated at bit level, each character is replaced by</p>', '<p>4 Bits</p>', '<p>6 Bits</p>', '<p>8 Bits</p>', '<p>10 Bits</p>', '3', 10, 1),
(371, '<p>&nbsp;the total running time of Huffman on the set of n characters is</p><p>&nbsp;</p>', '<p>O(n)&nbsp;</p>', '<p>O(n log n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O(n2) &nbsp;</p>', '<p>O(log n)</p>', '2', 13, 1),
(372, '<p>&nbsp;the total running time of matrix chain multiplication of n matrices</p><p>&nbsp;</p>', '<p>? (n4)&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>? (n3)</p>', '<p>? (n2)&nbsp;</p>', '<p>? (n)</p>', '2', 13, 1),
(373, '<p>which of the following is true</p><p>&nbsp;</p>', '<p>P is subset of NP</p>', '<p>NP is subset of P</p>', '<p>P and NP are equal</p>', '<p>NP is subset of NP hard</p>', '1', 13, 1),
(374, '<p>the total running time of optimal binary search tree of n nodes</p><p>&nbsp;</p>', '<p>O(n2)&nbsp;&nbsp;&nbsp;</p>', '<p>O(n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O(n3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O(n log n)</p>', '3', 13, 1),
(375, '<p>If every square of the board is visited, then the total number of knight moves of n-queen problem is</p><p>&nbsp;</p>', '<p>n3-1&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>n-1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>n2-1&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>log n-1</p>', '3', 13, 1),
(376, '<p>In which of the following cases n-queen problem does not exist</p><p>&nbsp;</p>', '<p>n=2 and n=4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>n=4 and n=6&nbsp;</p>', '<p>n=2 and n=3&nbsp;&nbsp;&nbsp;</p>', '<p>n=4 and n=8</p>', '3', 13, 1),
(377, '<p>the total running time of knapsack problem for a simple approach</p><p>&nbsp;</p>', '<p>O(n)&nbsp;&nbsp;&nbsp;</p>', '<p>O( log n)&nbsp;&nbsp;</p>', '<p>O(2n&nbsp;log n) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O(2n)</p>', '4', 13, 1),
(378, '<p>what is an optimal Huffman code for alphabet<strong>a</strong>&nbsp;of the following set of frequencies a: 01, b:01, c:02, d:03, e:05, f:8, g:13, h:21</p><p>&nbsp;</p>', '<p>001010&nbsp;&nbsp;</p>', '<p>001111&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>111100</p>', '<p>101010</p>', '3', 13, 1),
(379, '<p>The worst case time complexity of the nondeterministic dynamic knapsack algorithm is</p><p>&nbsp;</p>', '<p>O(n log n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O( log n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O(n2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>&nbsp; O(n)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '4', 13, 1),
(380, '<p>The time complexity of the normal quick sort, randomized quick sort algorithms in the worst case is</p><p>&nbsp;</p>', '<p>O(n2), O(n log n)&nbsp;</p>', '<p>O(n2), O(n2)</p>', '<p>O(n log n), O(n2)&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>O(n log n), O(n log n)</p>', '2', 13, 1),
(381, '<p>The Sorting method which is used for external sort is</p><p>&nbsp;</p>', '<p>Bubble sort</p>', '<p>Quick sort&nbsp;&nbsp;&nbsp;</p>', '<p>Merge sort&nbsp;&nbsp;</p>', '<p>Radix sort&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '3', 13, 1),
(382, '<p>The main measure for efficiency algorithm are-</p><p>&nbsp;</p>', '<p>Processor and Memory</p>', '<p>Complexity and Capacity</p>', '<p>Data and Space</p>', '<p>Time and space</p>', '4', 13, 1),
(383, '<p>What does the algorithmic analysis count?</p><p>&nbsp;</p>', '<p>The number of arithmetic and the operations that are required to run the program</p>', '<p>The number of lines required by the program</p>', '<p>The number of seconds required by the program to execute</p>', '<p>None of these</p>', '1', 13, 1),
(384, '<p>______is the last step in solving the problem</p><p>&nbsp;</p>', '<p>Understanding the Problem</p>', '<p>Identify the Problem</p>', '<p>Evaluate the Solution</p>', '<p>None of these</p>', '3', 13, 1),
(385, '<p>Following is true for understanding of a problem</p><p>&nbsp;</p>', '<p>Knowing the knowledgebase</p>', '<p>Understanding the subject on which the problem is based</p>', '<p>Communication with the client</p>', '<p>All the above</p>', '4', 13, 1),
(386, '<p>The six-step solution for the problem can be applied to</p><p>I. Problems with Algorithmic Solution</p><p>II. Problems with Heuristic Solution</p><p>&nbsp;</p>', '<p>Only I</p>', '<p>Only II</p>', '<p>Both I and II</p>', '<p>Neither I nor II</p>', '3', 13, 1),
(387, '<p>______ solution requires reasoning built on knowledge and experience</p><p>&nbsp;</p>', '<p>Algorithmic Solution</p>', '<p>Heuristic Solution</p>', '<p>Random Solution</p>', '<p>None of these</p>', '2', 13, 1),
(388, '<p>he correctness and appropriateness of ___________solution can be checked very easily.</p><p>&nbsp;</p>', '<p>algorithmic solution</p>', '<p>heuristic solution</p>', '<p>random solution</p>', '<p>none of these</p>', '1', 13, 1),
(389, '<p>The time complexity of binary search is________.</p><p>&nbsp;</p>', '<p>O(1)</p>', '<p>O(log n)</p>', '<p>O(n)</p>', '<p>O(n logn)</p>', '2', 13, 1),
(390, '<p>The time complexity of linear search is________.</p><p>&nbsp;</p>', '<p>O(1)</p>', '<p>O(log n)</p>', '<p>O(n)</p>', '<p>O(n logn)</p>', '3', 13, 1),
(391, '<p>How many number of comparisons are required in insertion sort to sort a file if the file is sorted in reverse order?</p><p>&nbsp;</p>', '<p>N2</p>', '<p>N</p>', '<p>N-1</p>', '<p>N/2</p>', '1', 13, 1),
(392, '<p>The worst-case time complexity of Bubble Sort is________.</p><p>&nbsp;</p>', '<p>O(n2)</p>', '<p>O(log n)</p>', '<p>O(n)</p>', '<p>O(n logn)</p>', '1', 13, 1),
(393, '<p>Which of the following sorting procedures is the slowest?</p><p>&nbsp;</p>', '<p>Quick sort</p>', '<p>Heap sort</p>', '<p>Shell sort</p>', '<p>Bubble sort</p>', '4', 13, 1),
(394, '<p>Two main measures for the efficiency of an algorithm are</p><p>&nbsp;</p>', '<p>Processor and memory</p>', '<p>Complexity and capacity</p>', '<p>Time and space</p>', '<p>Data and space</p>', '3', 13, 1),
(395, '<p>The space factor when determining the efficiency of algorithm is measured by</p><p>&nbsp;</p>', '<p>Counting the maximum memory needed by the algorithm</p>', '<p>Counting the minimum memory needed by the algorithm</p>', '<p>Counting the average memory needed by the algorithm</p>', '<p>Counting the maximum disk space needed by the algorithm</p>', '1', 13, 1),
(396, '<p>The time factor when determining the efficiency of algorithm is measured by</p><p>&nbsp;</p>', '<p>Counting microseconds</p>', '<p>Counting the number of key operations</p>', '<p>Counting the number of statements</p>', '<p>Counting the kilobytes of algorithm</p>', '2', 13, 1),
(397, '<p>Which of the following case does not exist in complexity theory?</p><p>&nbsp;</p>', '<p>Best case</p>', '<p>Worst case</p>', '<p>Average case</p>', '<p>Null case</p>', '4', 13, 1),
(398, '<p>Which of the following sorting methods would be most suitable for sorting a list which is almost sorted?</p><p>&nbsp;</p>', '<p>Bubble Sort</p>', '<p>Insertion Sort</p>', '<p>Selection Sort</p>', '<p>Quick Sort</p>', '2', 13, 1),
(399, '<p>The running time of insertion sort is</p><p>&nbsp;</p>', '<p>O(n^2)</p>', '<p>O(n)</p>', '<p>O(log n)</p>', '<p>O(n log n)</p>', '1', 13, 1),
(400, '<p>A sort which compares adjacent elements in a list and switches where necessary is ____.</p><p>&nbsp;</p>', '<p>insertion sort</p>', '<p>heap sort</p>', '<p>quick sort</p>', '<p>bubble sort</p>', '1', 13, 1),
(401, '<p>The correct order of the efficiency of the following sorting algorithms according to their overall running time comparison is</p><p>&nbsp;</p>', '<p>Insertion&gt;selection&gt;bubble</p>', '<p>Insertion&gt;bubble&gt;selection</p>', '<p>Selection&gt;bubble&gt;insertion.</p>', '<p>bubble&gt;selection&gt;insertion</p>', '4', 13, 1),
(402, '<p>&nbsp;The Knapsack problem where the objective function is to minimize the profit is ______</p><p>&nbsp;</p>', '<p>Greedy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>Dynamic 0 / 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>&nbsp; Back tracking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '<p>Branch &amp; Bound 0/1&nbsp;&nbsp;</p>', '4', 13, 1),
(403, '<p>What is the type of the algorithm used in solving the 8 Queens problem?</p><p>&nbsp;</p>', '<p>Greedy</p>', '<p>Dynamic</p>', '<p>Branch and Bound</p>', '<p>Backtracking.</p>', '4', 13, 1),
(404, '<p>Which of the following is/ are the part of operating system?<br />&nbsp;</p>', '<p>Kernel services</p>', '<p>Library services</p>', '<p>Application level services</p>', '<p>All the above</p>', '4', 19, 1),
(405, '<p>The system of ............... generally ran one job at a time. These were called single stream batch processing.<br /><br /><br /><br />&nbsp;</p>', '<p>A) 40&#39;s</p>', '<p>B) 50&#39;s</p>', '<p>C) 60&#39;s</p>', '<p>D) 70&#39;s<br />&nbsp;</p>', '2', 19, 1),
(406, '<p><span style="font-size:13px; line-height:1.6">In ............. generation of operating system, operating system designers develop the concept of multi-programming in which several jobs are in main memory at once.</span><br /><br /><br /><br />&nbsp;</p>', '<p>A) First</p>', '<p>B) Second</p>', '<p>C) Third</p>', '<p>D) Fourth</p>', '3', 19, 1),
(407, '<p>State True or False.<br />i) In spooling high speed device like a disk is interposed between running program and low-speed device in Input/output.<br />ii) By using spooling for example instead of writing directly to a printer, outputs are written to the disk.<br /><br /><br /><br />&nbsp;</p>', '<p>A) i-True, ii-False</p>', '<p>B) i-True, ii-True</p>', '<p>C) i-False, ii-True</p>', '<p>D) i-False, ii-False</p>', '2', 19, 1),
(408, '<p>Which of the following is/are the functions of operating system?<br />i) Sharing hardware among users. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ii) Allowing users to share data among themselves.<br />iii) Recovering from errors. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;iv) Preventing users from interfering with one another.<br />v) Scheduling resources among users.<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) i, ii, iii and iv only</p>', '<p>B) ii, iii, iv and v only</p>', '<p>C) i, iii, iv and v only</p>', '<p>D) All i, ii, iii, iv and v</p>', '4', 19, 1),
(409, '<p>.................. executes must frequently and makes the fine grained decision of which process to execute the next.<br /><br /><br />&nbsp;</p>', '<p>A) Long-term scheduling<br />&nbsp;</p>', '<p>B) Medium-term scheduling</p>', '<p>C) Short-term scheduling</p>', '<p>D) None of the above</p>', '3', 19, 1),
(410, '<p>With ................ a page is brought into main memory only when the reference is made to a location on that page.<br /><br /><br /><br />&nbsp;</p>', '<p>A) demand paging</p>', '<p>B) main paging</p>', '<p>C) prepaging</p>', '<p>D) postpaging</p>', '1', 19, 1),
(411, '<p>....................... provides a larger sized of virtual memory but require virtual memory which provides multidimensional memory.<br /><br /><br /><br />&nbsp;</p>', '<p>A) Paging method</p>', '<p>B) Segmentation method</p>', '<p>C) Paging and segmentation method</p>', '<p>D) None of these</p>', '2', 19, 1),
(412, '<p>&nbsp;............... is a large kernel containing virtually the complete operating system, including, scheduling, file system, device drivers and memory management.<br /><br /><br /><br />&nbsp;</p>', '<p>A) Multilithic kernel</p>', '<p>B) Monolithic kernel</p>', '<p>C) Micro kernel</p>', '<p>D) Macro kernel</p>', '2', 19, 1),
(413, '<p>............... is a large operating system core provides a wide range of services.<br /><br /><br />&nbsp;</p>', '<p>A) Multilithic kernel</p>', '<p>B) Monolithic kernel<br />&nbsp;</p>', '<p>C) Micro kernel</p>', '<p>D) Macro kernel</p>', '4', 19, 1),
(414, '<p>The first batch operating system was developed in the ................. by General Motors for use on an IBM 701.<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) mid 1940&#39;s</p>', '<p>B) mid 1950&#39;s</p>', '<p>C) mid 1960&#39;s</p>', '<p>D) mid &nbsp;1970&#39;s</p>', '2', 19, 1),
(415, '<p>Process is ........................<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) A program in execution</p>', '<p>B) An instance of a program running on a computer.</p>', '<p>C) The entity that can be assigned to and executed</p>', '<p>D) All of the above.</p>', '2', 19, 1),
(416, '<p>................... is a facility that allows programmers to address memory from a logical point of view, without regard to the main memory, physically available.<br /><br /><br /><br />&nbsp;</p>', '<p>A) Visual memory</p>', '<p>B) Real memory</p>', '<p>C) Virtual memory<br />&nbsp;</p>', '<p>D) Secondary memory</p>', '3', 19, 1),
(417, '<p>............ is a large kernel, including scheduling file system, networking, device drivers, memory management and more.<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) Monolithic kernel</p>', '<p>B) Micro kernel</p>', '<p>C) Macro kernel</p>', '<p>D) Mini kernel</p>', '1', 19, 1),
(418, '<p>.................... architecture assigns only a few essential functions to the kernel, &nbsp;including address spaces, Inter process communication(IPC) and basic scheduling.<br /><br /><br /><br />&nbsp;</p>', '<p>A) Monolithic kernel</p>', '<p>B) Micro kernel</p>', '<p>C) Macro kernel</p>', '<p>D) Mini kernel</p>', '2', 19, 1),
(419, '<p>State whether true or false.<br />&nbsp;i) Multithreading is useful for application that perform a number of essentially independent tasks that do not be serialized.<br />ii) An example of multithreading is a database server that listens for and process numerous client request.<br /><br /><br /><br />&nbsp;</p>', '<p>A) i-True, ii-False</p>', '<p>B) i-True, ii-True</p>', '<p>C) i-False, ii-True</p>', '<p>D) i-False, ii-False</p>', '2', 19, 1),
(420, '<p>With ................ only one process can execute at a time; meanwhile all other process are waiting for the processer. With .............. more than one process can be running simultaneously each on a different processer.<br /><br /><br /><br />&nbsp;</p>', '<p>A) Multiprocessing, Multiprogramming</p>', '<p>B) Multiprogramming, Uniprocessing</p>', '<p>C) Multiprogramming, Multiprocessing</p>', '<p>D) Uniprogramming, Multiprocessing<br />&nbsp;</p>', '3', 19, 1),
(421, '<p>The two central themes of modern operating system are ...............<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) Multiprogramming and Distributed processing</p>', '<p>B) Multiprogramming and Central Processing</p>', '<p>C) Single Programming and Distributed processing</p>', '<p>D) None of above</p>', '1', 19, 1),
(422, '<p>............... refers to the ability of multiple process (or threads) to share code, resources or data in such a way that only one process has access to shared object at a time.<br /><br /><br /><br />&nbsp;</p>', '<p>A) Synchronization</p>', '<p>B) Mutual Exclusion</p>', '<p>C) Dead lock</p>', '<p>D) Starvation</p>', '2', 19, 1),
(423, '<p>................. is the ability of multiple process to co-ordinate their activities by exchange of information<br /><br /><br /><br />&nbsp;</p>', '<p>A) Synchronization</p>', '<p>B) Mutual Exclusion</p>', '<p>C) Dead lock</p>', '<p>D) Starvation</p>', '1', 19, 1),
(424, '<p>Which of the following is not the function of Micro kernel?<br /><br /><br /><br />&nbsp;</p>', '<p>A) File management</p>', '<p>B) Low-level memory management</p>', '<p>C) Inter-process communication</p>', '<p>D) I/O interrupts management</p>', '1', 19, 1),
(425, '<p>Match the following.<br />i) Mutual exclusion &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;a) A process may hold allocated resources while waiting assignment.<br />ii) Hold and wait &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; b) No resource can be forcibly removed from a process holding it.<br />iii) No preemption &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; c) Only one process may use a resource at a time.<br /><br /><br /><br />&nbsp;</p>', '<p>A) i-a, ii-b, iii-c</p>', '<p>B) i-a, ii-c, iii-b</p>', '<p>C) i-b, ii-c, iii-a</p>', '<p>D) i-c, ii-a, iii-b</p>', '4', 19, 1),
(426, '<p>A direct method of deadlock prevention is to prevent the occurrences of ...................<br /><br /><br /><br />&nbsp;</p>', '<p>A) Mutual exclusion</p>', '<p>B) Hold and wait</p>', '<p>C) Circular waits</p>', '<p>D) No preemption</p>', '3', 19, 1),
(427, '<p>The methods or algorithms which are used to increase the performance of disk storage sub-system is called .............<br /><br /><br /><br />&nbsp;</p>', '<p>A) Disk performing</p>', '<p>B) Disk scheduling</p>', '<p>C) Disk storing</p>', '<p>D) Disk extending</p>', '2', 19, 1),
(428, '<p><span style="font-size:13px; line-height:1.6">................. is the time required to move the disk arm to the required track.</span><br /><br /><br /><br />&nbsp;</p>', '<p>A) Seek time</p>', '<p>B) Rotational delay</p>', '<p>C) Latency time</p>', '<p>D) Access time</p>', '1', 19, 1);
INSERT INTO `questions` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `skillID`, `active`) VALUES
(429, '<p>The ............... policy restricts scanning to one direction only.<br /><br /><br /><br />&nbsp;</p>', '<p>A) SCAN</p>', '<p>B) C-SCAN</p>', '<p>C) N-Step SCAN</p>', '<p>D) Both A and B</p>', '2', 19, 1),
(430, '<p>............... policy selects the disk I/O request that requires the least movement of the disk arm from its current position.<br /><br /><br /><br />&nbsp;</p>', '<p>A) FSCAN</p>', '<p>B) SSTF</p>', '<p>C) SCAN</p>', '<p>D) C-SCAN</p>', '2', 19, 1),
(431, '<p>.................. refers to the ability of an operating system to support multiple threads of execution with a single process.<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) Multithreading</p>', '<p>B) Multiprocessing</p>', '<p>C) Multiexecuting</p>', '<p>D) Bi-threading</p>', '1', 19, 1),
(432, '<p>State whether the following statement is true.<br />i) It takes less time to terminate a thread than a process.<br />ii) Threads enhance efficiency in communication between different executing programs.<br /><br /><br /><br />&nbsp;</p>', '<p>A) i-True, ii-False</p>', '<p>B) i-True, ii-True</p>', '<p>C) i-False, ii-True</p>', '<p>D) i-False, ii-False</p>', '2', 19, 1),
(433, '<p>............ is a special type of programming language used to provide instructions to the monitor simple batch processing schema.<br /><br /><br /><br /><br />&nbsp;</p>', '<p>A) Job control language (JCL)</p>', '<p>B) Processing control language (PCL)</p>', '<p>C) Batch control language (BCL)</p>', '<p>D) Monitor control language (MCL)</p>', '1', 19, 1),
(434, '<p>What does PHP stand for?</p><p>i) Personal Home Page</p><p>ii) Hypertext Preprocessor</p><p>iii) Pretext Hypertext Processor</p><p>iv) Preprocessor Home Page</p>', '<p>Both (i) and (ii)</p>', '<p>&nbsp;Both (ii) and (iv)</p>', '<p>Only (ii)</p>', '<p>Both (i) and (iii)</p>', '1', 20, 1),
(435, '<p>PHP files have a default file extension of.</p>', '<p>.html</p>', '<p>&nbsp;.xml</p>', '<p>.php</p>', '<p>.ph</p>', '3', 20, 1),
(436, '<p>A PHP script should start with ___ and end with ___:</p>', '<p>&lt; php &gt;</p>', '<p>&lt; ? php ?&gt;</p>', '<p>&lt; ? ? &gt;</p>', '<p>&lt; ?php ? &gt;</p>', '4', 20, 1),
(437, '<p>Which of the looping statements is/are supported by PHP?</p><p>i) for loop</p><p>ii) while loop</p><p>iii) do-while loop</p><p>iv) foreach loop</p>', '<p>&nbsp;(i) and (ii)</p>', '<p>(i), (ii) and (iii)</p>', '<p>All of the mentioned</p>', '<p>None of the mentioned</p>', '3', 20, 1),
(438, '<p>Which of the following is/are a PHP code editor? ditor?</p><p>i) Notepad</p><p>ii) Notepad++</p><p>iii) Adobe Dreamweaver</p><p>iv) PDT</p>', '<p>Only (iv)</p>', '<p>All of the mentioned.</p>', '<p>(i), (ii) and (iii)</p>', '<p>Only (iii)</p>', '2', 20, 1),
(439, '<p>Which of the following must be installed on your computer so as to run PHP script?</p><p>i) Adobe Dreamweaver</p><p>ii) PHP</p><p>iii) Apache</p><p>iv) IIS</p>', '<p>All of the mentioned</p>', '<p>Only (ii)</p>', '<p>(ii) and (iii)</p>', '<p>&nbsp;(ii), (iii) and (iv)</p>', '4', 20, 1),
(440, '<p>A collection of lines that connects several devices is called ..............</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) bus</p>', '<p>B) peripheral connection wires</p>', '<p>C) Both a and b</p>', '<p>D) internal wires</p>', '1', 8, 1),
(441, '<p>Which version of PHP introduced Try/catch Exception?</p>', '<p>&nbsp;PHP 4</p>', '<p>PHP 5</p>', '<p>PHP 5.3</p>', '<p>PHP 6</p>', '2', 20, 1),
(442, '<p>A complete microcomputer system consist of ...........</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) microprocessor</p>', '<p>B) memory</p>', '<p>C) peripheral equipment</p>', '<p>D) all of the above</p>', '4', 8, 1),
(443, '<p>PC Program Counter is also called ...................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) instruction pointer</p>', '<p>B) memory pointer</p>', '<p>C) data counter</p>', '<p>D) file pointer</p>', '1', 8, 1),
(444, '<p>In a single byte how many bits will be there?</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) 8</p>', '<p>B) 16</p>', '<p>C) 4</p>', '<p>D) 32</p>', '1', 8, 1),
(445, '<p>We can use ___ to comment a single line?</p><p>i) /?</p><p>ii) //</p><p>iii) #</p><p>iv) /* */</p>', '<p>Only (ii)</p>', '<p>(i), (iii) and (iv)</p>', '<p>(ii), (iii) and (iv)</p>', '<p>Both (ii) and (iv)</p>', '3', 20, 1),
(446, '<p>CPU does not perform the operation ..................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) data transfer</p>', '<p>B) logic operation</p>', '<p>C) arithmetic operation</p>', '<p>D) all of the above</p>', '1', 8, 1),
(447, '<p>&nbsp;A script is a</p><p>&nbsp;</p>', '<p>Program or sequence of instructions that is interpreted or carried out by processor directly</p>', '<p>Program or sequence of instruction that is interpreted or carried out by another program</p>', '<p>&nbsp;Program or sequence of instruction that is interpreted or carried out by web server only</p>', '<p>None of above</p>', '2', 20, 1),
(448, '<p>When compared to the compiled program, scripts run</p><p>&nbsp;</p>', '<p>&nbsp;Faster</p>', '<p>Slower</p>', '<p>The execution speed is similar</p>', '<p>All of above</p>', '2', 20, 1),
(449, '<p>The access time of memory is ............... the time required for performing any single CPU operation.</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Longer than</p>', '<p>B) Shorter than</p>', '<p>C) Negligible than</p>', '<p>D) Same as</p>', '1', 8, 1),
(450, '<p>Memory address refers to the successive memory words and the machine is called as ............</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) word addressable</p>', '<p>B) byte addressable</p>', '<p>C) bit addressable</p>', '<p>D) Terra byte addressable</p>', '1', 8, 1),
(451, '<p>PHP is a widely used &hellip;&hellip;&hellip;&hellip;&hellip;. scripting language that is especially suited for web development and can be embedded into html</p><p>&nbsp;</p>', '<p>Open source general purpose</p>', '<p>Proprietary general purpose</p>', '<p>Open source special purpose</p>', '<p>Proprietary special purpose</p>', '1', 20, 1),
(452, '<p>A microprogram written as string of 0&#39;s and 1&#39;s is a .............</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Symbolic microinstruction</p>', '<p>B) binary microinstruction</p>', '<p>C) symbolic microinstruction</p>', '<p>D) binary micro-program<br />&nbsp;</p>', '4', 8, 1),
(453, '<p>A pipeline is like ....................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) an automobile assembly line</p>', '<p>B) house pipeline</p>', '<p>C) both a and b</p>', '<p>D) a gas line</p>', '1', 8, 1),
(454, '<p>Which of the following is not true?</p><p>&nbsp;</p>', '<p>&nbsp;PHP can be used to develop web applications.</p>', '<p>PHP makes a website dynamic.</p>', '<p>PHP applications can not be compiled.</p>', '<p>PHP can not be embedded into html.</p>', '4', 20, 1),
(455, '<p>Data hazards occur when .....................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Greater performance loss</p>', '<p>B) Pipeline changes the order of read/write access to operands</p>', '<p>C) Some functional unit is not fully pipelined</p>', '<p>D) Machine size is limited</p>', '2', 8, 1),
(456, '<p>Which of the following variables is not a predefined variable?</p><p>&nbsp;</p>', '<p>$get</p>', '<p>$ask</p>', '<p>$request</p>', '<p>&nbsp;$post</p>', '2', 20, 1),
(457, '<p>You can define a constant by using the define() function. Once a constant is defined</p><p>&nbsp;</p>', '<p>&nbsp;It can never be changed or undefined</p>', '<p>It can never be changed but can be undefined</p>', '<p>It can be changed but can not be undefined</p>', '<p>It can be changed and can be undefined</p>', '1', 20, 1),
(458, '<p>Which of the following function returns the number of characters in a string variable?</p><p>&nbsp;</p>', '<p>count($variable)</p>', '<p>len($variable)</p>', '<p>&nbsp;strcount($variable)</p>', '<p>strlen($variable)</p>', '4', 20, 1),
(459, '<p>&nbsp;When you need to obtain the ASCII value of a character which of the following function you apply in PHP?</p><p>&nbsp;</p>', '<p>chr( );</p>', '<p>&nbsp;asc( );</p>', '<p>&nbsp;ord( );</p>', '<p>val( );</p>', '3', 20, 1),
(460, '<p>A variable $word is set to &ldquo;HELLO WORLD&rdquo;, which of the following script returns in title case?</p><p>&nbsp;</p>', '<p>echo ucwords($word)</p>', '<p>echo ucwords(strtolower($word)</p>', '<p>echo ucfirst($word)</p>', '<p>echo ucfirst(strtolower($word)</p>', '2', 20, 1),
(461, '<p>The difference between include() and require()</p><p>&nbsp;</p>', '<p>&nbsp;are different how they handle failure</p>', '<p>both are same in every aspects</p>', '<p>&nbsp;is include() produced a Fatal Error while require results in a Warning</p>', '<p>&nbsp;&nbsp;none of above</p>', '1', 20, 1),
(462, '<p>&nbsp;When a file is included the code it contains, behave for variable scope of the line on which the include occurs</p><p>&nbsp;</p>', '<p>Any variable available at that line in the calling file will be available within the called file from that point</p>', '<p>Any variable available at that line in the calling file will not be available within the called file</p>', '<p>Variables are local in both called and calling files</p>', '<p>None of the above</p>', '1', 20, 1),
(463, '<p>Which of the following method sends input to a script via a URL?</p><p>&nbsp;</p>', '<p>Get</p>', '<p>Post</p>', '<p>Both</p>', '<p>None</p>', '1', 20, 1),
(464, '<p>Which of the following method is suitable when you need to send larger form submissions?</p><p>&nbsp;</p>', '<p>Get</p>', '<p>Post</p>', '<p>Both Get and Post</p>', '<p>There is no direct way for larger form. You need to store them in a file and retrieve</p>', '2', 20, 1),
(465, '<p>Which of the following mode of fopen() function opens a file only for writing. If a file with that name does not exist, attempts to create anew file. If the file exist, place the file pointer at the end of the file after all other data.</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>W</p>', '<p>W+</p>', '<p>A</p>', '<p>A+</p>', '3', 20, 1),
(466, '<p>The function setcookie( ) is used to</p><p>&nbsp;</p>', '<p>&nbsp;Enable or disable cookie support</p>', '<p>Declare cookie variables</p>', '<p>Store data in cookie variable</p>', '<p>&nbsp;All of above</p>', '3', 20, 1),
(467, '<p>To work with remote files in PHP you need to enable</p><p>&nbsp;</p>', '<p>allow_url_fopen</p>', '<p>allow_remote_files</p>', '<p>both of above</p>', '<p>none of above</p>', '1', 20, 1),
(468, '<p>fopen($file_doc,&rdquo;r+&amp;rdquo&nbsp;opens a file for</p><p>&nbsp;</p>', '<p>&nbsp;reading</p>', '<p>writing</p>', '<p>&nbsp;none of above</p>', '<p>&nbsp;both of above</p>', '4', 20, 1),
(469, '<p>The time that elapses between the initiation of an operation and completion of that operation is called.....</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) throughput</p>', '<p>B) memory response time</p>', '<p>C) memory access time</p>', '<p>D) execution time</p>', '3', 8, 1),
(470, '<p>Interrupts which are initiated by an instruction are ............</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) internal&nbsp;</p>', '<p>B) external</p>', '<p>C) hardware</p>', '<p>D) software&nbsp;</p>', '2', 8, 1),
(471, '<p>A semiconductor memory constructed using bipolar transistors or MOS transistor stores information in the form of a ......................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) Flip-flop voltage levels</p>', '<p>B) bit</p>', '<p>C) byte</p>', '<p>D) opcodes values</p>', '1', 8, 1),
(472, '<p>A simple way of performing I/O tasks is to use a method known as ......................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) program-controlled I/O</p>', '<p>B) program-controlled input&nbsp;</p>', '<p>C) program-controlled output</p>', '<p>D) I/O operation&nbsp;</p>', '1', 8, 1),
(473, '<p>Memory access in RISC architecture is limited to instructions ........</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) CALL and RET</p>', '<p>B) PUSH and POP</p>', '<p>C) STA and LDA</p>', '<p>D) MOV and JMP&nbsp;</p>', '3', 8, 1),
(474, '<p>Striking key stores the corresponding character code in a 8-bit buffer register associated with the keyboard. This register is called as ........................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) DATAINOUT</p>', '<p>B) DATAOUT</p>', '<p>C) DATAIN</p>', '<p>D) Both A and B</p>', '3', 8, 1),
(475, '<p>When the character is transferred to the processor, status control flag SIN is automatically cleared to ............................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) zero</p>', '<p>B) one</p>', '<p>C) two</p>', '<p>D) yes</p>', '1', 8, 1),
(476, '<p>A microprogram written as string of 0&#39;s and 1&#39;s is a ...</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) symbolic micro-instruction</p>', '<p>B) binary micro-instruction</p>', '<p>C) symbolic micro-instruction</p>', '<p>D) binary microprogram</p>', '4', 8, 1),
(477, '<p>An exception conditions in a computer system by an event external to the CPU is called .........</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Interrupt</p>', '<p>B) halt</p>', '<p>C) wait</p>', '<p>D) process</p>', '1', 8, 1),
(478, '<p>When the CPU detects an interrupt, it then saves its ...................</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Previous state</p>', '<p>B) Next state</p>', '<p>C) Current state</p>', '<p>D) Both A and B</p>', '3', 8, 1),
(479, '<p>An exception condition in a computer system caused by an event external to the CPU is called ........</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Interrupt</p>', '<p>B) Halt</p>', '<p>C) Wait</p>', '<p>D) Process</p>', '1', 8, 1),
(480, '<p>When the CPU detects an interrupt, it then saves its .............</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) Previous State</p>', '<p>B) Next State</p>', '<p>C) Current State</p>', '<p>D) Both A and B</p>', '3', 8, 1),
(481, '<p>A microprogram is sequencer perform the operation...</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>A) read</p>', '<p>B) write</p>', '<p>C) read and write</p>', '<p>D) read and execute</p>', '4', 8, 1),
(482, '<p>A computer program that converts an entire program into machine language at one time is called</p><p>&nbsp;</p><p><br /><br />&nbsp;</p>', '<p>A) interpreter</p>', '<p>B) simulator</p>', '<p>C) compiler</p><p>&nbsp;</p>', '<p>D) commander</p>', '3', 8, 1),
(483, '<p>The unit which decodes and translates each instruction and generates the necessary enable signals for ALU and other units is called ..</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p><br />&nbsp;</p>', '<p>A) arithmetic unit</p>', '<p>B) logical unit</p>', '<p>C) control unit</p>', '<p>D) CPU</p>', '3', 8, 1),
(484, '<p>State whether the following statement is True or False for cache memory.</p><p>i) Cache memories are high-speed buffers which are inserted between the processors and main memory.</p><p>ii) They can also be inserted between main memory and mass storage.</p><p>iii) It can be used as secondary memory.</p>', '<p>A) i- True, ii- False, iii-True</p>', '<p>B) i- False, ii- True, iii-True</p>', '<p>C) i-True, ii-True, iii-False</p><p>&nbsp;</p>', '<p>D) i- False, ii- False, iii-True</p>', '3', 8, 1),
(485, '<p>The channel which handles the multiple requests and multiplexes the data transfers from these devices a byte at a time is known as .....</p>', '<p>A) multiplexor channel</p>', '<p>B) the selector channel</p>', '<p>C) block multiplex channel</p><p>&nbsp;</p>', '<p>D) both A and C</p>', '1', 8, 1),
(486, '<p>The address mapping is done, when the program is initially loaded is called ......</p>', '<p>A) dynamic relocation</p>', '<p>B) relocation</p>', '<p>C) static relocation</p><p>&nbsp;</p>', '<p>D) dynamic as well as static relocation</p>', '3', 8, 1),
(487, '<p>State whether the following statement is True or False for PCI bus.</p><p>i) The PCI bus tuns at 33 MHZ and can transfer 32-bits of data(four bytes) every clock tick.</p><p>ii) The PCI interface chip may support the video adapter, the EIDE disk controller chip and may be two external adapter cards.</p><p>iii) PCI bus deliver the different throughout only on a 32-bit interface that other parts of the machine deliver through a 64-bit path.</p>', '<p>A) i- True, ii- False, iii-True</p>', '<p>B) i- False, ii- True, iii-True</p>', '<p>C) i-True, ii-True, iii-False</p><p>&nbsp;</p>', '<p>D) i- False, ii- False, iii-True</p>', '3', 8, 1),
(488, '<p>The I/O processor has a direct access to ....................... and contains a number of independent data channels.</p>', '<p>A) main memory</p>', '<p>B) secondary memory</p>', '<p>C) cache</p><p>&nbsp;</p>', '<p>D) flash memory</p>', '1', 8, 1),
(489, '<p>What is the output of print str[0] if str = &#39;Hello World!&#39;?</p><p>&nbsp;</p>', '<p>Hello World!</p>', '<p>H</p>', '<p>ello World!</p>', '<p>none of the above</p>', '2', 21, 1),
(490, '<p>Which of the following is correct about dictionaries in python?</p><p>&nbsp;</p>', '<p>Python&#39;s dictionaries are kind of hash table type.</p>', '<p>They work like associative arrays or hashes found in Perl and consist of key-value pairs.</p>', '<p>A dictionary key can be almost any Python type, but are usually numbers or strings. Values, on the other hand, can be any arbitrary Python object.</p>', '<p>All the above</p>', '4', 21, 1),
(491, '<p>The High level language &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. has now become the dominant AI programming language.<br />&nbsp;</p>', '<p>A) Ada<br />&nbsp;</p>', '<p>B) Lisp<br />&nbsp;</p>', '<p>C) AI pro<br />&nbsp;</p>', '<p>D) High AI</p>', '2', 2, 1),
(492, '<p>In AI, a representation of &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; is a combination of data structures and interpretive procedures that is used in the right way in a program.<br />&nbsp;</p>', '<p>A) Knowledge<br />&nbsp;</p>', '<p>B) Power<br />&nbsp;</p>', '<p>C) Strength<br />&nbsp;</p>', '<p>D) Intelligence</p>', '1', 2, 1),
(493, '<p>Which of the following function of dictionary gets all the values from the dictionary?</p><p>&nbsp;</p>', '<p>getvalues()</p>', '<p>value()</p>', '<p>values()</p>', '<p>none of the above</p>', '3', 21, 1),
(494, '<p>&hellip;&hellip;&hellip;&hellip;.. is an environment in which the search takes place.<br />&nbsp;</p>', '<p>A) problem place<br />&nbsp;</p>', '<p>B) problem instance<br />&nbsp;</p>', '<p>C) problem space</p><p>&nbsp;</p>', '<p>D) None of&nbsp;the above</p>', '3', 2, 1),
(495, '<p>The fundamental ideas about retrieval that have been developed in AI systems might be termed as &hellip;&hellip;&hellip;&hellip;&hellip;&hellip; and &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;<br />&nbsp;</p>', '<p>A) Analogy, reasoning<br />&nbsp;</p>', '<p>B) Thinking, doing<br />&nbsp;</p>', '<p>C) Event, domain<br />&nbsp;</p>', '<p>D) Linking, lumping</p>', '4', 2, 1),
(496, '<p>Which of the following function convert an integer to an unicode character in python?</p><p>&nbsp;</p>', '<p>unichr(x)</p>', '<p>ord(x)</p>', '<p>hex(x)</p>', '<p>oct(x)</p>', '1', 21, 1),
(497, '<p>Robot machine might have cameras and infrared range finders for &hellip;&hellip;&hellip;&hellip; and various motors of &hellip;&hellip;&hellip;.<br />&nbsp;</p>', '<p>A) Sensors, Agents<br />&nbsp;</p>', '<p>B) Agents, Actuators<br />&nbsp;</p>', '<p>C) Actuators, Sensors<br /><br />&nbsp;</p>', '<p>D) Sensors, Actuators</p>', '4', 2, 1),
(498, '<p>Which of the following operator in python evaluates to true if it does not finds a variable in the specified sequence and false otherwise?</p><p>&nbsp;</p>', '<p>**</p>', '<p>//</p>', '<p>is</p>', '<p>not in</p>', '4', 21, 1),
(499, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.. are rules of thumb that may solve a given problem, but do not guarantee a solution.<br />&nbsp;</p>', '<p>A) Strong methods<br />&nbsp;</p>', '<p>B) Weak methods<br /><br />&nbsp;</p>', '<p>C) Heuristic<br />&nbsp;</p>', '<p>D) Probabilistic</p>', '3', 2, 1),
(500, '<p>Which of the following function gets a space-padded string with the original string left-justified to a total of width columns?</p><p>&nbsp;</p>', '<p>isupper()</p>', '<p>join(seq)</p>', '<p>len(string)</p>', '<p>ljust(width[, fillchar])</p>', '4', 21, 1),
(501, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. is the primary consideration in designing knowledge-based AI systems.<br />&nbsp;</p>', '<p>A) Analogy<br />&nbsp;</p>', '<p>B) Efficiency<br />&nbsp;</p>', '<p>C) Efficacy<br />&nbsp;</p>', '<p>D) Acquisition</p>', '2', 2, 1),
(502, '<p>Which of the following function replaces all occurrences of old substring in string with new string?</p><p>&nbsp;</p>', '<p>replace(old, new [, max])</p>', '<p>strip([chars])</p>', '<p>swapcase()</p>', '<p>title()</p>', '1', 21, 1),
(503, '<p>The initial state and successor function implicitly define state space of the problem<br />&nbsp;</p>', '<p>A) Initial state<br />&nbsp;</p>', '<p>B) State space<br /><br />&nbsp;</p>', '<p>C) problem space<br />&nbsp;</p>', '<p>D) problem place</p>', '2', 2, 1),
(504, '<p>What is the output of for x in [1, 2, 3]: print x?</p><p>&nbsp;</p>', '<p>x x x</p>', '<p>1 2 3</p>', '<p>Error</p>', '<p>None of the above</p>', '2', 21, 1),
(505, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;.. are data structures giving &quot;snapshots&quot; of the condition of the problem at each stage of its solution.<br />&nbsp;</p>', '<p>A) States<br /><br />&nbsp;</p>', '<p>B) Operators<br />&nbsp;</p>', '<p>C) Heuristic<br />&nbsp;</p>', '<p>D) None of the above</p>', '1', 2, 1),
(506, '<p>What is the following function returns item from the list with min value?</p><p>&nbsp;</p>', '<p>cmp(list)</p>', '<p>len(list)</p>', '<p>max(list)</p>', '<p>min(list)</p>', '4', 21, 1),
(507, '<p><span style="font-size:13px; line-height:1.6">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. are means for transforming the problem from one state to another.</span><br />&nbsp;</p>', '<p>A) States<br />&nbsp;</p>', '<p>B) Operators<br />&nbsp;</p>', '<p>C) Heuristic<br />&nbsp;</p>', '<p>D) None of the above</p>', '2', 2, 1),
(508, '<p><span style="font-size:13px; line-height:1.6">&hellip;&hellip;&hellip;&hellip;.. is called the father of AI.</span><br />&nbsp;</p>', '<p>A) James C Gosling<br />&nbsp;</p>', '<p>B) Dennis Ritchie<br />&nbsp;</p>', '<p>C) Alan Turing<br />&nbsp;</p>', '<p>D) Isaac Newton</p>', '3', 2, 1),
(509, '<p>What is the output of print list[1:3] if list = [ &#39;abcd&#39;, 786 , 2.23, &#39;john&#39;, 70.2 ]?</p><p>&nbsp;</p>', '<p>[ &#39;abcd&#39;, 786 , 2.23, &#39;john&#39;, 70.2 ]</p>', '<p>abcd</p>', '<p>[786, 2.23]</p>', '<p>None of the above</p>', '3', 21, 1),
(510, '<p>What is the output of print tinytuple * 2 if tinytuple = (123, &#39;john&#39;)?</p><p>&nbsp;</p>', '<p>(123, &#39;john&#39;, 123, &#39;john&#39;)</p>', '<p>(123, &#39;john&#39;) * 2</p>', '<p>Error</p>', '<p>None of the above.</p>', '1', 21, 1),
(511, '<p>In AI &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. is a combination of data structures and interpretive procedures.<br />&nbsp;</p>', '<p>A) Knowledge<br />&nbsp;</p>', '<p>B) Meta-knowledge<br />&nbsp;</p>', '<p>C) Artificial Knowledge<br />&nbsp;</p>', '<p>D) Performance</p>', '1', 2, 1),
(512, '<p>The &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; approach uses the knowledge of mathematics and engineering.<br />&nbsp;</p>', '<p>A) rationalist<br />&nbsp;</p>', '<p>B) Top-down<br />&nbsp;</p>', '<p>C) bottom-up<br />&nbsp;</p>', '<p>D) push-pop approach</p>', '1', 2, 1),
(513, '<p>Which of the following statement causes the loop to skip the remainder of its body and immediately retest its condition prior to reiterating?</p><p>&nbsp;</p>', '<p>break</p>', '<p>continue</p>', '<p>pass</p>', '<p>none of the above</p>', '2', 21, 1),
(514, '<p>We also use knowledge about what we know, called &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..<br />&nbsp;</p>', '<p>A) Meta-Knowledge<br />&nbsp;</p>', '<p>B) Performance Knowledge<br />&nbsp;</p>', '<p>C) Standard knowledge<br />&nbsp;</p>', '<p>D) Specific knowledge</p>', '1', 2, 1),
(515, '<p>The Artificial Intelligence is concerned with designing intelligent computer systems that exhibit intelligent characteristics expressed by &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..<br />&nbsp;</p>', '<p>A) Functional behavior<br />&nbsp;</p>', '<p>B) Human behavior<br />&nbsp;</p>', '<p>C) Human brain<br />&nbsp;</p>', '<p>D) Statistical analysis</p>', '2', 2, 1),
(516, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; includes what we know about our own performance as cognitive processors.<br /><br />&nbsp;</p>', '<p>A) Meta-Knowledge<br />&nbsp;</p>', '<p>B) Performance Knowledge<br />&nbsp;</p>', '<p>C) Standard knowledge<br />&nbsp;</p>', '<p>D) Specific knowledge</p>', '1', 2, 1),
(517, '<p>Which of the following function merges elements in a sequence?</p><p>&nbsp;</p>', '<p>isupper()</p>', '<p>join(seq)</p>', '<p>len(string)</p>', '<p>ljust(width[, fillchar])</p>', '2', 21, 1),
(518, '<p>State whether the following true or false.<br />i) AI is used in diverse fields like space exploration, robotics.<br />ii) AI is used for military purpose<br />&nbsp;</p>', '<p>A) i-True, ii-False<br />&nbsp;</p>', '<p>B) i-True, ii-True<br />&nbsp;</p>', '<p>C) i-False, ii-False<br />&nbsp;</p>', '<p>D) i-False, ii-True</p>', '2', 2, 1),
(519, '<p>What is the output of [1, 2, 3] + [4, 5, 6]?</p><p>&nbsp;</p>', '<p>[1, 2, 3, 4, 5, 6]</p>', '<p>[1, 2, 3],[4, 5, 6]</p>', '<p>[5, 7,9]</p>', '<p>21</p>', '1', 21, 1),
(520, '<p>The goals of AI systems can be described in terms of cognitive tasks like<br />&nbsp;</p>', '<p>A) Recognizing objects<br />&nbsp;</p>', '<p>B) Answering questions<br />&nbsp;</p>', '<p>C) Manipulating robotic devices<br />&nbsp;</p>', '<p>D) All of the above</p>', '4', 2, 1),
(521, '<p>What is the following function reverses objects of list in place?</p><p>&nbsp;</p>', '<p>list.reverse()</p>', '<p>list.sort([func])</p>', '<p>list.pop(obj=list[-1])</p>', '<p>list.remove(obj)</p>', '1', 21, 1),
(522, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.. is computerized advice-giver, that is capable of reasoning but which is usually confined to a rather narrow field of knowledge.<br />&nbsp;</p>', '<p>A) Expert system<br />&nbsp;</p>', '<p>B) Knowledge system<br />&nbsp;</p>', '<p>C) Common system<br />&nbsp;</p>', '<p>D) Communication system<br />&nbsp;</p>', '1', 2, 1),
(523, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;. involves relating something new to what we already know in a psychologically complex way.<br />&nbsp;</p>', '<p>A) Knowledge Acquisition<br />&nbsp;</p>', '<p>B) Knowledge retrieval<br />&nbsp;</p>', '<p>C) Reasoning<br />&nbsp;</p>', '<p>D) Meta-level reasoning<br />&nbsp;</p>', '1', 2, 1),
(524, '<p><span style="font-size:13px; line-height:1.6">What is Artificial intelligence?</span></p>', '<p>(a) &nbsp; Putting your intelligence into Computer<br />&nbsp;</p>', '<p>(b) &nbsp; Programming with your own intelligence<br />&nbsp;</p>', '<p>(c) &nbsp; Making a Machine intelligent<br />&nbsp;</p>', '<p>(d) &nbsp; Playing a Game<br />&nbsp;</p>', '3', 2, 1),
(525, '<p>Which is not the commonly used programming language for AI?<br />&nbsp;</p>', '<p>(a) &nbsp;PROLOG &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; (b) &nbsp;Java &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp; &nbsp; &nbsp;(c) &nbsp;LISP &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp;(d) &nbsp;Perl &nbsp;</p>', '4', 2, 1),
(526, '<p>What is state space?<br />&nbsp;</p>', '<p>(a) &nbsp; The whole problem<br />&nbsp;</p>', '<p>(b) &nbsp; Your Definition to a problem<br />&nbsp;</p>', '<p>(c) &nbsp; Problem you design<br />&nbsp;</p>', '<p>(d) &nbsp; Representing your problem with variable and parameter</p>', '4', 2, 1),
(527, '<p>A production rule consists of<br />&nbsp;</p>', '<p>(a) &nbsp;A set of Rule &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp;(b) &nbsp;A sequence of steps<br />&nbsp;</p>', '<p>(c) &nbsp;Both (a) and (b) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp; &nbsp;(d) &nbsp;Arbitrary representation to problem</p>', '3', 2, 1),
(528, '<p>Which search method takes less memory?<br />&nbsp;</p>', '<p>(a) &nbsp;Depth-First Search &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp;(b) &nbsp;Breadth-First search<br />&nbsp;</p>', '<p>(c) &nbsp;Both (a) and (b) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp;(d) &nbsp;Linear Search.</p>', '1', 2, 1),
(529, '<p>What is the output when we execute list(&ldquo;hello&rdquo;)?</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>[&lsquo;h&rsquo;, &lsquo;e&rsquo;, &lsquo;l&rsquo;, &lsquo;l&rsquo;, &lsquo;o&rsquo;]</p>', '<p>[&lsquo;hello&rsquo;]</p>', '<p>[&lsquo;llo&rsquo;]</p>', '<p>[&lsquo;olleh&rsquo;]</p>', '1', 21, 1),
(530, '<p>To shuffle the list(say list1) what function do we use ?</p><p>&nbsp;</p>', '<p>list1.shuffle()</p>', '<p>shuffle(list1)</p>', '<p>random.shuffle(list1)</p>', '<p>random.shuffleList(list1)</p>', '3', 21, 1),
(531, '<p>A heuristic is a way of trying<br />&nbsp;</p>', '<p>(a) &nbsp; To discover something or an idea embedded in a program</p>', '<p>(b) &nbsp; To search and measure how far a node in a search tree seems to be from a goal</p>', '<p>(c) &nbsp; To compare two nodes in a search tree to see if one is better than the other</p><p>&nbsp;</p>', '<p>(d) &nbsp; Only (a), (b) and (c)</p>', '4', 2, 1),
(532, '<p>Suppose list1 is [2, 33, 222, 14, 25], What is list1[-1] ?</p><p>&nbsp;</p>', '<p>Error</p>', '<p>None</p>', '<p>25</p>', '<p>2</p>', '3', 21, 1),
(533, '<p>Suppose list1 is [2, 33, 222, 14, 25], What is list1[:-1] ?</p><p>&nbsp;</p>', '<p>[2, 33, 222, 14]</p>', '<p>Error</p>', '<p>25</p>', '<p>[25, 14, 222, 33, 2]</p>', '1', 21, 1),
(534, '<p>A* algorithm is based on<br />&nbsp;</p>', '<p>(a) &nbsp;Breadth-First-Search &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp; (b) &nbsp;Depth-First &ndash;Search<br />&nbsp;</p>', '<p>(c) &nbsp;Best-First-Search &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp; &nbsp; &nbsp;(d) &nbsp;Hill climbing</p>', '3', 2, 1),
(535, '<p>What will be the output?</p><p>1.&nbsp;&nbsp;&nbsp; d1 = {&quot;john&quot;:40, &quot;peter&quot;:45}</p><p>2.&nbsp;&nbsp;&nbsp; d2 = {&quot;john&quot;:466, &quot;peter&quot;:45}</p><p>3.&nbsp;&nbsp;&nbsp; d1 == d2</p><p>&nbsp;</p>', '<p>True</p>', '<p>False</p>', '<p>None&nbsp;</p>', '<p>Error</p>', '2', 21, 1),
(536, '<p>Which is the best way to go for Game playing problem?<br />&nbsp;</p>', '<p>(a) &nbsp;Linear approach &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>(b) &nbsp;Heuristic approach<br />&nbsp;</p>', '<p>(c) &nbsp;Random approach &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp;(d) &nbsp;Optimal approach</p>', '2', 2, 1),
(537, '<p>How do you represent &ldquo;All dogs have tails&rdquo;.<br />&nbsp;</p>', '<p>(a) &nbsp; ?x: dog(x)&agrave;hastail(x) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>(b) &nbsp;?x: dog(x)&agrave;hastail(y)<br />&nbsp;</p>', '<p>(c) &nbsp;?x: dog(y)&agrave;hastail(x) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>&nbsp; &nbsp; &nbsp;(d) &nbsp;?x: dog(x)&agrave;has&agrave;tail(x)</p>', '1', 2, 1),
(538, '<p>How many except statements can a try-except block have ?</p><p>&nbsp;</p>', '<p>zero</p>', '<p>one</p>', '<p>more than one</p>', '<p>more than zero</p>', '3', 21, 1),
(539, '<p>Which is not a property of representation of knowledge?<br />&nbsp;</p>', '<p>(a) &nbsp;Representational Verification &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>(b) &nbsp;Representational Adequacy<br />&nbsp;</p>', '<p>(c) &nbsp;Inferential Adequacy &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '<p>(d) &nbsp;Inferential Efficiency</p>', '1', 2, 1),
(540, '<p>When will the else part of try-except-else be executed?</p><p>&nbsp;</p>', '<p>always</p>', '<p>when an exception occurs</p>', '<p>when no exeption occurs</p>', '<p>when an exception occurs in to except block</p>', '3', 21, 1),
(541, '<p>Can one block of except statements handle multiple exception?</p><p>&nbsp;</p>', '<p>yes, like except TypeError, SyntaxError [,&hellip;]</p>', '<p>yes, like except [TypeError, SyntaxError]</p>', '<p>no</p>', '<p>none</p>', '1', 21, 1),
(542, '<p>What is the output of the following code?</p><p><strong>def</strong> foo():<br />&nbsp;&nbsp;&nbsp; <strong>try</strong>:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>print</strong>(1)<br />&nbsp;&nbsp;&nbsp; <strong>finally</strong>:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>print</strong>(2)<br />foo()</p><p>&nbsp;</p>', '<p>1 2</p>', '<p>1</p>', '<p>2</p>', '<p>none of the mentioned</p>', '1', 21, 1),
(543, '<p>elements = [0, 1, 2]<br /><strong>def</strong> incr(x):<br />&nbsp;&nbsp;&nbsp; <strong>return</strong> x+1<br /><strong>print</strong>(list(map(elements, incr)))</p><p>&nbsp;</p>', '<p>[1, 2, 3]</p>', '<p>[0, 1, 2]</p>', '<p>error</p>', '<p>none of the above</p>', '3', 21, 1),
(544, '<p>What is &quot;Programming is fun&quot;[1:1]?</p><p>&nbsp;</p>', '<p>P</p>', '<p>r</p>', '<p>Pr</p>', '<p>&#39;&#39;</p>', '4', 21, 1),
(545, '<p>Suppose i is 2 and j is 4, i + j is same as _________.</p><p>&nbsp;</p>', '<p>i.__add(j)</p>', '<p>i.__add__(j)</p>', '<p>i.__Add(j)</p>', '<p>i.__ADD(j)</p>', '2', 21, 1),
(546, '<p>Which of the following statements produces {&#39;a&#39;, &#39;b&#39;, &#39;c&#39;}?</p><p>&nbsp;</p>', '<p>list(&quot;abac&quot;)</p>', '<p>tuple(&quot;abac&quot;)</p>', '<p>set(&quot;abac&quot;)</p>', '<p>none</p>', '3', 21, 1),
(547, '<p>Suppose s1 = {1, 2, 4, 3} and s2 = {1, 5, 4, 13}, what is s1 &amp; s2?</p><p>&nbsp;</p>', '<p>{2, 3, 5, 13}</p>', '<p>{1, 2, 4, 3, 5, 13}</p>', '<p>{1, 4}</p>', '<p>{1, 5, 4, 13}</p>', '3', 21, 1),
(548, '<p>Which of the following statements are true?</p><p>&nbsp;</p>', '<p>A Python list is immutable if every element in the list is immutable.</p>', '<p>A Python set is immutable if every element in the set is immutable.</p>', '<p>A Python tuple is immutable if every element in the tuple is immutable.</p>', '<p>A Python tuple is immutable.</p>', '3', 21, 1),
(549, '<p>To read two characters from a file object infile, use _________.</p><p>&nbsp;</p>', '<p>infile.read(2)</p>', '<p>infile.read()</p>', '<p>infile.readline()</p>', '<p>infile.readlines()</p>', '1', 21, 1),
(550, '<p>Suppose s = {1, 2, 4, 3}, what happens when invoking s.remove(12)?</p><p>&nbsp;</p>', '<p>There is no remove method for a set object.</p>', '<p>This method is executed fine and no exception is raised.</p>', '<p>Since 12 is not in the set, Python raises a KeyError exception.</p>', '<p>You cannot remove an element from a set.</p>', '3', 21, 1),
(551, '<p>Invoking the ___________ method converts raw byte data to a string.</p><p>&nbsp;</p>', '<p>encode()</p>', '<p>decode()</p>', '<p>convert()</p>', '<p>toString()</p>', '2', 21, 1),
(552, '<p>&nbsp;</p><p>HTML is what type of language ?<strong>&nbsp;</strong></p><p>&nbsp;</p>', '<p>Scripting Language</p>', '<p>Markup Language</p>', '<p>Programming Language</p>', '<p>Network Protocol</p>', '2', 15, 1),
(553, '<p>&nbsp;</p><p>HTML uses&nbsp;</p><p>&nbsp;</p>', '<p>User defined tags</p>', '<p>Pre-specified tags</p>', '<p>Fixed tags defined by the language</p>', '<p>Tags only for linking</p>', '3', 15, 1),
(554, '<p>&nbsp;</p><p>Fundamental HTML Block is known as ___________.&nbsp;</p><p>&nbsp;</p>', '<p>HTML Body</p>', '<p>HTML Tag</p>', '<p>HTML Attribute</p>', '<p>HTML Element</p>', '2', 15, 1),
(555, '<p>&nbsp;</p><p>Apart from &lt;b&gt; tag, what other tag makes text bold ?&nbsp;</p><p>&nbsp;</p>', '<p>&lt;fat&gt;</p>', '<p>&lt;strong&gt;</p>', '<p>&lt;black&gt;</p>', '<p>&lt;emp&gt;</p>', '2', 15, 1),
(556, '<p>What is the full form of HTML?&nbsp;</p><p>&nbsp;</p>', '<p>HyperText Markup Language</p><p>&nbsp;</p>', '<p>Hyper Teach Markup Language</p>', '<p>Hyper Tech Markup Language</p>', '<p>None of these</p>', '1', 15, 1),
(557, '<p>&nbsp;</p><p>What should be the first tag in any HTML document?&nbsp;</p><p>&nbsp;</p>', '<p>&lt;head&gt;</p>', '<p>&lt;title&gt;</p>', '<p>&lt;html&gt;</p>', '<p>&lt;document&gt;</p>', '3', 15, 1),
(558, '<p>How can you make a bulleted list with numbers?&nbsp;</p>', '<p>&lt;dl&gt;</p>', '<p>&lt;ol&gt;</p>', '<p>&lt;list&gt;</p>', '<p>&lt;ul&gt;</p>', '2', 15, 1),
(559, '<p>What tag is used to display a picture in a HTML page?&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>picture</p>', '<p>image</p>', '<p>img</p>', '<p>src</p>', '3', 15, 1),
(560, '<p>&nbsp;</p><p>HTML web pages can be read and rendered by _________.&nbsp;</p><p>&nbsp;</p>', '<p>Compiler</p>', '<p>Server</p>', '<p>Web Browser</p>', '<p>Interpreter</p>', '3', 15, 1),
(561, '<p>&nbsp;</p><p>Which of the following is not a browser ?&nbsp;</p><p>&nbsp;</p>', '<p>Microsofts Bing</p>', '<p>Netscape Navigator</p>', '<p>Mozilla Firefox</p>', '<p>Opera</p>', '1', 15, 1),
(562, '<p>&nbsp;</p><p>Which HTML tag produces the biggest heading?&nbsp;</p><p>&nbsp;</p>', '<p>&lt;h7&gt;</p>', '<p>&lt;h9&gt;</p>', '<p>&lt;h4&gt;</p>', '<p>&lt;h1&gt;</p>', '4', 15, 1),
(563, '<p>HTML tags are surrounded by which type of brackets.&nbsp;</p>', '<p>Curly</p>', '<p>Round</p>', '<p>Squart</p>', '<p>Angle</p>', '4', 15, 1),
(564, '<p>Tags and test that are not directly displayed on the page are written in _____ section.&nbsp;</p><p>&nbsp;</p>', '<p>&lt;head&gt;</p>', '<p>&lt;title&gt;</p>', '<p>&lt;body&gt;</p>', '<p>&lt;html&gt;</p>', '1', 15, 1),
(565, '<p>&nbsp;</p><p>Apart from &lt;b&gt; tag, what other tag makes text bold ?&nbsp;</p><p>&nbsp;</p>', '<p>&lt;fat&gt;</p>', '<p>&lt;strong&gt;</p>', '<p>&lt;black&gt;</p>', '<p>&lt;emp&gt;</p>', '2', 15, 1),
(566, '<p>which of the following tag is used to mark a begining of paragraph ?</p><p>&nbsp;</p>', '<p>&lt;TD&gt;</p>', '<p>&lt;br&gt;</p>', '<p>&lt;P&gt;</p>', '<p>&lt;TR&gt;</p>', '3', 15, 1),
(567, '<p>Any value other than ..................... has a tostring( ) method and the result of this method is usually the same as that returned by the string( ) function.<br />i) number &nbsp; &nbsp; ii) null &nbsp; &nbsp;iii) boolean &nbsp; iv) undefined<br /><br />&nbsp;</p>', '<p>A) i and ii only<br />&nbsp;</p>', '<p>B) ii and iii only</p>', '<p><br />C) ii and iv only</p>', '<p><br />D) iii and v only</p>', '3', 18, 1),
(568, '<p>If one operand of the + operator is a string, it converts the other one to a ...........<br />&nbsp;</p>', '<p>A) String<br />&nbsp;</p>', '<p>B) TypeError<br />&nbsp;</p>', '<p>C) Undefined<br />&nbsp;</p>', '<p>D) Number</p>', '1', 18, 1),
(569, '<p>The .................. operator converts its operand to a Boolean and negates it.<br />&nbsp;</p>', '<p>A) +<br />&nbsp;</p>', '<p>B) -<br />&nbsp;</p>', '<p>C) !<br />&nbsp;</p>', '<p>D) !!</p>', '3', 18, 1),
(570, '<p>&nbsp;The .................. method defined by the number class accepts an optional argument that specifies a radix, or base for the conversion.<br />&nbsp;</p>', '<p>A) toRadix( )<br />&nbsp;</p>', '<p>B) toBase( )<br />&nbsp;</p>', '<p>C) toString( )<br />&nbsp;</p>', '<p>D) toBase10( )</p>', '3', 18, 1),
(571, '<p>&nbsp;................... converts a number to a string with a specified number of digits after the decimal point.<br />&nbsp;</p>', '<p>A) toInt( )<br />&nbsp;</p>', '<p>B) toFixed( )<br />&nbsp;</p>', '<p>C) toString( )<br />&nbsp;</p>', '<p>D) toPrecision( )<br />&nbsp;</p>', '2', 18, 1),
(572, '<p>............... converts a number to a string with the number of significant digits you specify.<br />&nbsp;</p>', '<p>A) toInt( )<br />&nbsp;</p>', '<p>B) toFixed( )<br />&nbsp;</p>', '<p>C) toString( )<br />&nbsp;</p>', '<p>D) toPrecision( )</p>', '4', 18, 1),
(573, '<p>.................. accepts an optional second argument specifying the radix of the number to be parsed.<br />&nbsp;</p>', '<p>A) ParseFloat( )<br />&nbsp;</p>', '<p>B) ParseInt( )<br />&nbsp;</p>', '<p>C) ParseNumber( )<br />&nbsp;</p>', '<p>D) ParseString( )</p>', '2', 18, 1),
(574, '<p>&nbsp;While using parseInt( ) and parseFloat( ), if the first nonspace character is not a part of a valid numeric literal, they return .............<br />&nbsp;</p>', '<p>A) undefined<br />&nbsp;</p>', '<p>B) infinity<br />&nbsp;</p>', '<p>C) NaN<br />&nbsp;</p>', '<p>D) zero</p>', '3', 18, 1),
(575, '<p>&nbsp;The global function parseInt(&quot;11&quot;,2) in JavaScript returns which of the following values.<br />&nbsp;</p>', '<p>A) 2<br />&nbsp;</p>', '<p>B) 3<br />&nbsp;</p>', '<p>C) 11<br />&nbsp;</p>', '<p>D) 13</p>', '2', 18, 1),
(576, '<p>Wrapper classes define ................... methods that return the wrapped primitive value.<br />&nbsp;</p>', '<p>A) ValueOf( )<br />&nbsp;</p>', '<p>B) ParseInt( )<br />&nbsp;</p>', '<p>C) ParseNumber( )<br />&nbsp;</p>', '<p>D) ParseString( )</p>', '1', 18, 1),
(577, '<p>If the object has a ................... method that returns a primitive value, JavaScript converts that primitive value, JavaScript converts that primitive value to a number and returns the result.<br />&nbsp;</p>', '<p>A) ValueOf( )<br />&nbsp;</p>', '<p>B) ParseInt( )<br />&nbsp;</p>', '<p>C) ParseNumber( )<br />&nbsp;</p>', '<p>D) ParseString( )</p>', '1', 18, 1),
(578, '<p>If the object has a ................ method that returns a primitive value, JavaScript converts and returns the value.</p>', '<p>A) toInt( )<br />&nbsp;</p>', '<p>B) toFixed( )<br />&nbsp;</p>', '<p>C) toString( )<br />&nbsp;</p>', '<p>D) toPrecision( )</p>', '3', 18, 1),
(579, '<p>The ................ operator is known as the equality operator, which checks whether its two operators are &quot;equal&quot; using a more relaxed definition of sameness that allows type conversion.<br />&nbsp;</p>', '<p>A) =<br />&nbsp;</p>', '<p>B) = =<br />&nbsp;</p>', '<p>C) = = =<br /><br />&nbsp;</p>', '<p>D) All of the above</p>', '2', 18, 1),
(580, '<p>The ......................... operator is known as strict equality operator, and it checks whether two operands are &quot;identical&quot; using a strict definition of sameness.<br />&nbsp;</p>', '<p>A) =<br />&nbsp;</p>', '<p>B) = =<br />&nbsp;</p>', '<p>C) = = =<br />&nbsp;</p>', '<p>D) All of the above</p>', '3', 18, 1),
(581, '<p>&nbsp;The ...................... returns false if two values are equal to each other according to = = and returns true otherwise.<br />&nbsp;</p>', '<p>A) !=<br />&nbsp;</p>', '<p>B) !<br />&nbsp;</p>', '<p>C) != =<br /><br />&nbsp;</p>', '<p>D) All of the above</p>', '1', 18, 1),
(582, '<p>The ................. operator returns false if two values are strictly equal to each other and returns true otherwise.<br />&nbsp;</p>', '<p>A) !=<br />&nbsp;</p>', '<p>B) !<br />&nbsp;</p>', '<p>C) != =<br />&nbsp;</p>', '<p>D) All of the above</p>', '3', 18, 1),
(583, '<p>&nbsp;If the two values do not have the same type; the .................... operator may still consider them equal.<br />&nbsp;</p>', '<p>A) = =<br />&nbsp;</p>', '<p>B) = = =<br />&nbsp;</p>', '<p>C) Both A and B<br />&nbsp;</p>', '<p>D) None of the above</p>', '1', 18, 1),
(584, '<p>&nbsp;An object is an un-ordered collection of ..........................., each of which has a name and a value.<br />&nbsp;</p>', '<p>A) properties<br />&nbsp;</p>', '<p>B) names<br />&nbsp;</p>', '<p>C) values<br />&nbsp;</p>', '<p>D) All of the above</p>', '1', 18, 1),
(585, '<p>&nbsp;The ........................... attribute of an object specifies whether the value of the property can be set.<br />&nbsp;</p>', '<p>A) readable<br />&nbsp;</p>', '<p>B) writable<br />&nbsp;</p>', '<p>C) enumerable<br />&nbsp;</p>', '<p>D) configurable</p>', '2', 18, 1),
(586, '<p>&nbsp;The ..................... attribute of an object specifies whether the property name is returned by a for/in loop.<br />&nbsp;</p>', '<p>A) readable<br />&nbsp;</p>', '<p>B) writable<br />&nbsp;</p>', '<p>C) enumerable<br />&nbsp;</p>', '<p>D) configurable</p>', '3', 18, 1),
(587, '<p>&nbsp;The .......................... attribute of an object specifies whether the property can be deleted and whether its attributes can be altered.<br />&nbsp;</p>', '<p>A) readable<br />&nbsp;</p>', '<p>B) writable<br />&nbsp;</p>', '<p>C) enumerable<br />&nbsp;</p>', '<p>D) configurable</p>', '4', 18, 1),
(588, '<p>&nbsp;An object&#39;s ............................. is a reference to another object from which properties are inherited.<br />&nbsp;</p>', '<p>A) Characteristics<br />&nbsp;</p>', '<p>B) Prototype<br />&nbsp;</p>', '<p>C) Class<br />&nbsp;</p>', '<p>D) Extensible flag</p>', '2', 18, 1),
(589, '<p>&nbsp;Functions are invoked as functions or as methods with an ................<br />&nbsp;</p>', '<p>A) invocation statement<br />&nbsp;</p>', '<p>B) invocation expression<br />&nbsp;</p>', '<p>C) invocation function<br />&nbsp;</p>', '<p>D) invocation method<br />&nbsp;</p>', '2', 18, 1),
(590, '<p>The attribute of &lt;form&gt; tag</p><p>&nbsp;</p>', '<p>Method</p>', '<p>Action</p>', '<p>Both (a)&amp;(b)</p>', '<p>None of these</p>', '3', 15, 1),
(591, '<p>An .................. consists of a function expression that evaluates to a function object followed by an open parenthesis, a comma separated list of zero or more argument expressions and a close parenthesis.&nbsp;<br />&nbsp;</p>', '<p>A) invocation statement<br />&nbsp;</p>', '<p>B) invocation expression<br />&nbsp;</p>', '<p>C) invocation function<br />&nbsp;</p>', '<p>D) invocation method</p>', '2', 18, 1),
(592, '<p>&nbsp;If a function or method invocation preceded by the keyword new, then it is a ...............<br />&nbsp;</p>', '<p>A) constructor invocation<br />&nbsp;</p>', '<p>B) new invocation<br />&nbsp;</p>', '<p>C) indirect invocation<br />&nbsp;</p>', '<p>D) direct invocation</p>', '1', 18, 1),
(593, '<p>Markup tags tell the web browser</p><p>&nbsp;</p>', '<p>How to organise the page</p>', '<p>How to display the page</p>', '<p>How to display message box on page</p>', '<p>None of these</p>', '2', 15, 1),
(594, '<p>In ................... you can invoke any function as a method of any object, even if it is not actually a method of that object.<br />&nbsp;</p>', '<p>A) constructor invocation<br />&nbsp;</p>', '<p>B) new invocation<br />&nbsp;</p>', '<p>C) indirect invocation<br />&nbsp;</p>', '<p>D) direct invocation</p>', '3', 18, 1),
(595, '<p>www is based on which model?</p><p>&nbsp;</p>', '<p>Local-server</p>', '<p>Client-server</p><p>&nbsp;</p>', '<p>3-tier</p>', '<p>None of these</p>', '2', 15, 1),
(596, '<p>Both call( ) and apply( ) methods allow you to explicitly specify the ................. value for the invocation.<br />&nbsp;</p>', '<p>A) this<br />&nbsp;</p>', '<p>B) me<br />&nbsp;</p>', '<p>C) that<br />&nbsp;</p>', '<p>D) new</p>', '1', 18, 1),
(597, '<p>What are Empty elements and is it valid?</p><p>&nbsp;</p>', '<p>No, there is no such terms as Empty Element</p>', '<p>Empty elements are element with no data</p>', '<p>No, it is not valid to use Empty Element</p>', '<p>None of these</p>', '2', 15, 1),
(598, '<p>Which of the following attributes of text box control allow to limit the maximum character?</p><p>&nbsp;</p>', '<p>size</p>', '<p>len</p>', '<p>maxlength</p>', '<p>all the above</p>', '3', 15, 1),
(599, '<p>&nbsp;If a function is defined to accept an arbitrary number of arguments, the ............... method allows you to invoke that function on the contents of an array of arbitrary length.<br />&nbsp;</p>', '<p>A) apply( )<br />&nbsp;</p>', '<p>B) call( )<br />&nbsp;</p>', '<p>C) bind( )<br />&nbsp;</p>', '<p>D) string( )</p>', '1', 18, 1),
(600, '<p>HTML is a subset of</p><p>&nbsp;</p>', '<p>SGMT</p>', '<p>SGML</p>', '<p>SGMD</p>', '<p>None of these</p>', '2', 15, 1),
(601, '<p>&nbsp;When you invoke the ............... method on a function f and pass an object o, &nbsp;the method returns a new function.<br />&nbsp;</p>', '<p>A) apply( )<br />&nbsp;</p>', '<p>B) call( )<br />&nbsp;</p>', '<p>C) bind( )<br />&nbsp;</p>', '<p>D) string( )</p>', '3', 18, 1),
(602, '<p>Which of the following is a container?</p><p>&nbsp;</p>', '<p>&lt;SELECT&gt;</p>', '<p>&lt;Value&gt;</p>', '<p>&lt;INPUT&gt;</p>', '<p>&lt;BODY&gt;</p>', '1', 15, 1),
(603, '<p>&nbsp;..................... is a common technique in functional programming and is some times called currying.<br />&nbsp;</p>', '<p>A) full application<br />&nbsp;</p>', '<p>B) partial application<br />&nbsp;</p>', '<p>C) common application<br />&nbsp;</p>', '<p>D) technical application<br />&nbsp;</p>', '2', 18, 1),
(604, '<p>The attribute, which define the relationship between current document and HREF&#39;ed URL is</p><p>&nbsp;</p>', '<p>REL</p>', '<p>URL</p>', '<p>REV</p>', '<p>All the above</p>', '1', 15, 1),
(605, '<p>&nbsp;</p><p>&lt;DT&gt; tag is designed to fit a single line of our web page but &lt;DD&gt; tag will accept a</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>line of text</p>', '<p>full paragraph</p>', '<p>word</p>', '<p>request</p>', '2', 15, 1);
INSERT INTO `questions` (`question_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `skillID`, `active`) VALUES
(606, '<p>&nbsp;In CSS selectors, if the simplest rules can be applied to all occurrences of a particular tag, such selectors are called ..................<br />&nbsp;</p>', '<p>A) id selectors<br />&nbsp;</p>', '<p>B) element selectors<br />&nbsp;</p>', '<p>C) class selectors<br /><br />&nbsp;</p>', '<p>D) contextual selectors</p>', '1', 9, 1),
(607, '<p>To set a value for all elements used in HTML document ....................... can be used.<br />&nbsp;</p>', '<p>A) # (hash)<br />&nbsp;</p>', '<p>B) * (astrik)<br />&nbsp;</p>', '<p>C) . (dot)<br />&nbsp;</p>', '<p>D) ^ (exponent)</p>', '2', 9, 1),
(608, '<p>&nbsp;Which of the following is NOT the correct way of using element selectors in CSS.<br />&nbsp;</p>', '<p>A) P{line-height:250%;}<br />&nbsp;</p>', '<p>B) #{padding:10px;}<br />&nbsp;</p>', '<p>C) *{margin:5px;}<br />&nbsp;</p>', '<p>D) h1,h2,h3{color:black;}<br />&nbsp;</p>', '2', 18, 1),
(609, '<p>Character encoding is</p><p>&nbsp;</p>', '<p>method used to represent numbers in a&nbsp;character</p>', '<p>method used to represent character in a&nbsp;number</p>', '<p>a system that consists of a code which pairs each character with a&nbsp;pattern,sequence of natural numbers or electrical pulse in order to transmit the data</p>', '<p>none of these</p>', '3', 15, 1),
(610, '<p>................. select only div element with their id contribute set to &quot;div1&quot;.<br />&nbsp;</p>', '<p>A) #div1{color: red;}<br />&nbsp;</p>', '<p>B) div.div1 {color: red;}<br />&nbsp;</p>', '<p>C) #div1 div {color: red;}<br />&nbsp;</p>', '<p>D) div#div1{color: red;}</p>', '4', 9, 1),
(611, '<p>Correct HTML to left align the content inside a table cell is</p><p>&nbsp;</p>', '<p>&lt;tdleft&gt;</p>', '<p>&lt;td raligh = &quot;left&quot; &gt;</p>', '<p>&lt;td align = &quot;left&quot;&gt;</p>', '<p>&lt;td leftalign&gt;</p>', '3', 15, 1),
(612, '<p>&nbsp;</p><p>The tag which allows you to rest other HTML tags within the description is</p><p>&nbsp;</p>', '<p>&lt;TH&gt;</p>', '<p>&lt;TD&gt;</p>', '<p>&lt;TR&gt;</p>', '<p>&lt;CAPTION&gt;</p>', '4', 15, 1),
(613, '<p>Which of the following is/are the correct examples of implementing class selectors.<br />i) h2.new {background-color: green;} ii) *.new {background-color: green;}<br />iii) .new * {background-color: green;} iv) .new {background-color: green;}<br />&nbsp;</p>', '<p>A) i, ii and iii only<br />&nbsp;</p>', '<p>B) ii, iii and iv only<br />&nbsp;</p>', '<p>C) i, ii and iv only<br />&nbsp;</p>', '<p>D) i, ii, iii and iv only</p>', '3', 9, 1),
(614, '<p>&nbsp;..................... are created by showing the order in which the tags must be nested for the rule to be applied.<br />&nbsp;</p>', '<p>A) id selectors<br />&nbsp;</p>', '<p>B) element selectors<br />&nbsp;</p>', '<p>C) class selectors<br />&nbsp;</p>', '<p>D) contextual selectors&nbsp;</p>', '4', 9, 1),
(615, '<p>&lt;Base&gt; tag is designed to appear only between</p><p>&nbsp;</p>', '<p>&lt;HEAD&gt;</p>', '<p>&lt;TITLE&gt;</p>', '<p>&lt;BODY&gt;</p>', '<p>&lt;FORM&gt;</p>', '1', 15, 1),
(616, '<p>Which of the following rule indicates all occurrences of the span element within a div element have a pink background.<br />&nbsp;</p>', '<p>A) div * span {background-color: pink;}<br />&nbsp;</p>', '<p>B) span div {background-color: pink;}<br />&nbsp;</p>', '<p>C) div span {background-color: pink;}<br />&nbsp;</p>', '<p>D) div#span {background-color:pink;}</p>', '4', 9, 1),
(617, '<p>..................... would select only &lt;a&gt; tags that are descendants of some tag found under the body element.<br />&nbsp;</p>', '<p>A) body a {color:green;}<br />&nbsp;</p>', '<p>B) body a * {color: green;}<br />&nbsp;</p>', '<p>C) a body {color: green;}<br /><br />&nbsp;</p>', '<p>D) body * a {color: green;}</p>', '4', 9, 1),
(618, '<p>A much better approach to establish the base URL is to use</p><p>&nbsp;</p>', '<p>BASE element</p>', '<p>HEAD element</p>', '<p>both (a) and (b)</p>', '<p>none of these</p>', '1', 15, 1),
(619, '<p>................ form a rule to match only elements that are directly enclosed within another element.<br />&nbsp;</p>', '<p>A) child selectors<br />&nbsp;</p>', '<p>B) element selectors<br />&nbsp;</p>', '<p>C) class selectors<br />&nbsp;</p>', '<p>D) contextual selectors</p>', '1', 9, 1),
(620, '<p>&nbsp;........................... is specified using the plus sign(+) and is used to select elements that would be siblings of each other.<br />&nbsp;</p>', '<p>A) child selector<br />&nbsp;</p>', '<p>B) adjacent-sibling selector&nbsp;<br />&nbsp;</p>', '<p>C) class selector<br />&nbsp;</p>', '<p>D) contextual selector<br />&nbsp;</p>', '2', 9, 1),
(621, '<p>The tag used to create a new list item and also include a hyperlink is</p><p>&nbsp;</p>', '<p>&lt;LI&gt;</p>', '<p>&lt;DL&gt;</p>', '<p>&lt;DD&gt;</p>', '<p>&lt;UL&gt;</p>', '1', 15, 1),
(622, '<p>&nbsp;..................... is specified by (~), can be used to select elements that happen to have a particular element preceding them as a sibling directly.<br />&nbsp;</p>', '<p>A) child selector<br />&nbsp;</p>', '<p>B) adjacent-sibling selector&nbsp;<br />&nbsp;</p>', '<p>C) general-sibling selector<br /><br />&nbsp;</p>', '<p>D) contextual selector</p>', '3', 9, 1),
(623, '<p>&nbsp;..................... would select all h4 tags that have a div tag as a preceding sibling.<br />&nbsp;</p>', '<p>A) div~h4 {font-size: 20px;}<br />&nbsp;</p>', '<p>B) &nbsp;div+h4 {font-size: 20px;}<br />&nbsp;</p>', '<p>C) div&gt;h4 {font-size: 20px;}<br />&nbsp;</p>', '<p>D) h4 ~ div {font-size: 20px;}</p>', '1', 9, 1),
(624, '<p>Which of the following CSS rule would make all h3 tags that are immediately preceded by a body tag yellow.<br />&nbsp;</p>', '<p>A) body~h3 {color: yellow;}<br />&nbsp;</p>', '<p>B) body+h3 {color: yellow;}<br />&nbsp;</p>', '<p>C) body&gt;h3 {color: yellow;}<br />&nbsp;</p>', '<p>D) body h3 {color: yellow;}</p>', '2', 9, 1),
(625, '<p>Which of the following CSS code makes all strong tags that have p tag as their immediate parent have the font color pink.<br />&nbsp;</p>', '<p>A) P strong {color: pink;}<br />&nbsp;</p>', '<p>B) P&gt;strong {color: pink;}<br />&nbsp;</p>', '<p>C) P+strong {color: pink;}<br />&nbsp;</p>', '<p>D) P~strong {color: pink;}<br />&nbsp;</p>', '2', 9, 1),
(626, '<p>Attribute selectors, first introduced in ......................... allow rules to match elements with particular attributes or attribute values.<br />&nbsp;</p>', '<p>A) CSS1<br />&nbsp;</p>', '<p>B) CSS2.1<br />&nbsp;</p>', '<p>C) CSS3<br />&nbsp;</p>', '<p>D) CSS2<br />&nbsp;</p>', '4', 9, 1),
(627, '<p>&nbsp;...................... would match all &lt;input&gt; tags that simply have value attribute.<br />&nbsp;</p>', '<p>A) input value {font-weight: bold;}<br />&nbsp;</p>', '<p>B) input &lt; value {font-weight: bold;}<br />&nbsp;</p>', '<p>C) input ~ value {font-weight: bold;}<br />&nbsp;</p>', '<p>D) input [value] {font-weight: bold;}<br />&nbsp;</p>', '4', 9, 1),
(628, '<p>&nbsp;A CSS2 selector, ......................... selects all elements of E that have set the given attribute attr equal to the given value.<br />&nbsp;</p>', '<p>A) E[attr=value]<br />&nbsp;</p>', '<p>B) E[attr^=value]<br />&nbsp;</p>', '<p>C) E[attr|=value]<br />&nbsp;</p>', '<p>D) E[attr~=value]&nbsp;</p>', '1', 9, 1),
(629, '<p>&nbsp;A CSS2 selector, .............................. selects all elements of E that have an attribute that contains a value that starts with a value that is list of hyphen-separated values.<br />&nbsp;</p>', '<p>A) E[attr~=value]<br />&nbsp;</p>', '<p>B) E[attr^=value]<br />&nbsp;</p>', '<p>C) E[attr|=value]<br />&nbsp;</p>', '<p>D) E[attr=value]</p>', '3', 9, 1),
(630, '<p>Which of the following CSS code sets the background color orange on all P tags that have their title attribute set to &quot;main&quot;.<br />&nbsp;</p>', '<p>A) P[title~=&quot;main&quot;] {background-color: orange;}<br />&nbsp;</p>', '<p>B) P[title=&quot;main&quot;] {background-color: orange;}<br />&nbsp;</p>', '<p>C) P[title^=&quot;main&quot;] {background-color: orange;}<br />&nbsp;</p>', '<p>D) P[title*=&quot;main&quot;] {background-color: orange;}<br />&nbsp;</p>', '2', 9, 1),
(631, '<p>A CSS2 selector .................................., selects all elements for E that have a space separated list of values for attr where one of those values is equal to the given value.<br />&nbsp;</p>', '<p>A) E[attr~=value]<br />&nbsp;</p>', '<p>B) E[attr^=value]<br />&nbsp;</p>', '<p>C) E[attr|=value]<br />&nbsp;</p>', '<p>D) E[attr=value]</p>', '1', 9, 1),
(632, '<p>A graphic designer may use which of the following elements to help produce a design piece to communicate correct information?</p><p>&nbsp;</p>', '<p>Woodcuts</p>', '<p>Traditional media</p>', '<p>Typography</p>', '<p>Diverse elements</p>', '3', 14, 1),
(633, '<p>Magazines, advertisements, and product packaging all have a common use. What term best describes the catagory they all fall into?</p><p>&nbsp;</p>', '<p>Creativity</p>', '<p>Technology</p>', '<p>Artistic</p>', '<p>Graphic Design</p>', '4', 14, 1),
(634, '<p>Which of the following is not the background property used in CSS.<br />&nbsp;</p>', '<p>A) background-color<br />&nbsp;</p>', '<p>B) background-size<br />&nbsp;</p>', '<p>C) background-image<br />&nbsp;</p>', '<p>D) background-repeat</p>', '2', 9, 1),
(635, '<p>To make a &quot;free transform&quot; on Photoshop, You would......</p><p>&nbsp;</p>', '<p>Flip an image</p>', '<p>Press control &quot;T&quot; on the keyboard</p>', '<p>Draw a freeform line with the brush tool</p>', '<p>Press control &quot;&gt;&quot; on the keyboard</p>', '2', 14, 1),
(636, '<p>&nbsp;................. property sets the background image to scroll or not to scroll with its associated element&#39;s content.<br />&nbsp;</p>', '<p>A) background-repeat<br />&nbsp;</p>', '<p>B) background-image<br />&nbsp;</p>', '<p>C) background-attachment<br /><br />&nbsp;</p>', '<p>D) background-position</p>', '3', 9, 1),
(637, '<p>In Graphic Design, You should.. (use the correct explanation)</p><p>&nbsp;</p>', '<p>Give expression from your ideas on paper then continue through final production(Missed)</p>', '<p>Give movement to separate graphic features</p>', '<p>Set up communication between two people</p>', '<p>Celebrate the modern ideas of man</p>', '1', 14, 1),
(638, '<p>One way to cut an image out of it&#39;s original place to put it into another place or background would be to</p><p>&nbsp;</p>', '<p>Use the gradient cut tool</p>', '<p>Negative knife cuts</p>', '<p>Use the blur tool</p>', '<p>Extract it</p>', '4', 14, 1),
(639, '<p>...................... is the default value used in background-attachment property of CSS.<br />&nbsp;</p>', '<p>A) Fixed<br />&nbsp;</p>', '<p>B) Scroll<br />&nbsp;</p>', '<p>C) Inherit<br />&nbsp;</p>', '<p>D) None</p>', '2', 9, 1),
(640, '<p>The path selection tool on Photoshop:</p><p>&nbsp;</p>', '<p>Scales the object to make different sizes</p>', '<p>Makes shape selection segments shows anchor points, direction lines and points</p>', '<p>Frames the photoshop file into points</p>', '<p>Rasterizes the layer</p>', '2', 14, 1),
(641, '<p>&nbsp;Which of the following code will set the background color of h1 tag to red.<br />i) h1{background-color: #FF0000;} &nbsp;ii) h1{background-color: #F00;}<br />iii) h1{background-color: red;} iv) h1{background-color: rgb(255, 0, 0);}<br />&nbsp;</p>', '<p>A) i, ii and iii only<br />&nbsp;</p>', '<p>B) ii, iii and iv only<br />&nbsp;</p>', '<p>C) i, iii and iv only<br />&nbsp;</p>', '<p>D) All i, ii, iii and iv&nbsp;</p>', '4', 9, 1),
(642, '<p>Control : &quot;J&quot; will...</p><p>&nbsp;</p>', '<p>Jumble the layers together</p>', '<p>Print your layers in black &amp; white</p>', '<p>Reset your gradient background color</p>', '<p>Copy the selected layer as &quot;layer via copy&quot;</p>', '4', 14, 1),
(643, '<p>&nbsp;The ..................... property requires a URL to link it to the source image specified with the url() syntax.<br />&nbsp;</p>', '<p>A) background-position<br />&nbsp;</p>', '<p>B) background-repeat<br />&nbsp;</p>', '<p>C) background-attachment<br />&nbsp;</p>', '<p>D) background-image</p>', '4', 9, 1),
(644, '<p>When free transform is active, which one of these effects can you do in Photoshop?</p><p>&nbsp;</p>', '<p>Perspective</p>', '<p>Custom shape</p>', '<p>Create a work path</p>', '<p>Justify text left</p>', '1', 14, 1),
(645, '<p>Typography is important to a graphic designer to:</p><p>&nbsp;</p><p>&nbsp;</p>', '<p>Express to proper emotion or &quot;feel&quot; of a product or subject to be advertised</p>', '<p>Bring out the best in all those around him / her</p>', '<p>Take in all the colors and people around him</p>', '<p>Make the right kind of typographical maps</p>', '1', 14, 1),
(646, '<p>A CSS cursor property value ........................... indicates the element may be a link or reference to another element or location.<br />&nbsp;</p>', '<p>A) auto<br />&nbsp;</p>', '<p>B) alias<br />&nbsp;</p>', '<p>C) cell<br />&nbsp;</p>', '<p>D) copy</p>', '2', 9, 1),
(647, '<p>&nbsp;A CSS cursor property value ................... presents an icon to indicate a cell is active, similar to what is performed in spreadsheet application.<br />&nbsp;</p>', '<p>A) auto<br />&nbsp;</p>', '<p>B) alias<br />&nbsp;</p>', '<p>C) cell<br />&nbsp;</p>', '<p>D) copy</p>', '3', 9, 1),
(648, '<p>A logo is a:</p><p>&nbsp;</p>', '<p>Example of minimal design</p>', '<p>Is from the english dictionary meaning togetherness</p>', '<p>Is how you make a water mark</p>', '<p>a graphic representation or symbol of a company name, trademark, abbreviation, etc., often uniquely designed for ready recognition.</p>', '4', 14, 1),
(649, '<p>A CSS cursor property value ..................... indicates that the current function is not allowed, often associated with not allowing dropping in a drag and drop action.<br />&nbsp;</p>', '<p>A) no-drop<br />&nbsp;</p>', '<p>B) no-resize<br />&nbsp;</p>', '<p>C) not-allowed<br />&nbsp;</p>', '<p>D) no-move</p>', '3', 9, 1),
(650, '<p>From all the uses of graphics around us,readability is important, but design can also aid in selling a product or idea through effective:</p><p>&nbsp;</p>', '<p>Type combination&#39;s</p>', '<p>Visual communication</p>', '<p>Mass-produced printed ads</p>', '<p>Logos</p>', '2', 14, 1),
(651, '<p>The value of display property .................... will make the item inline or block depending on the context.<br />&nbsp;</p>', '<p>A) list-item<br />&nbsp;</p>', '<p>B) run-in<br />&nbsp;</p>', '<p>C) inline-block</p>', '<p><span style="font-size:13px; line-height:1.6">D) block</span></p>', '2', 9, 1),
(652, '<p>The value of display property ....................... create a block for the list box and an inline box for items.<br />&nbsp;</p>', '<p>A) list-item<br />&nbsp;</p>', '<p>B) run-in<br />&nbsp;</p>', '<p>C) inline-block<br />&nbsp;</p>', '<p>D) block</p>', '1', 9, 1),
(653, '<p>The use of two-colors in a graphic designed piece is called:</p><p>&nbsp;</p>', '<p>Smudge color</p>', '<p>Duotone</p>', '<p>Tri-Ad</p>', '<p>Two inter-changing colors</p>', '2', 14, 1),
(654, '<p>Shift+Control+ I will:</p><p>&nbsp;</p>', '<p>Give you a background eraser</p>', '<p>Make your work flow better</p>', '<p>Open a file with a name &quot;Image&quot;</p>', '<p>Inverse your file</p>', '4', 14, 1),
(655, '<p>It&#39;s a graphic designer&#39;s job to:</p><p>&nbsp;</p>', '<p>Look good at his/her interview</p>', '<p>Organize the page and layout and know the graphic elements required from his client</p>', '<p>Draw his thumbnails first</p>', '<p>All the above</p>', '4', 14, 1),
(656, '<p>To repeat a section of your image and then re-paint it use the:</p><p>&nbsp;</p>', '<p>The 3D slide tool</p>', '<p>Clone stamp tool</p>', '<p>Patch tool</p>', '<p>Quick mask tool</p>', '2', 14, 1),
(657, '<p>To create a &quot;S&quot; curve on a layout should be described as:</p><p>&nbsp;</p>', '<p>A slick interactive design</p>', '<p>A TV network advertisement</p>', '<p>Directing ones&#39; eye down the page</p>', '<p>Arranging your elements in an un-orderly fashion</p>', '3', 14, 1),
(658, '<p>To get an image inside of another picture or letter use this feature in Photoshop. (Hint: most of ours favorite tutorial, photoshopessentials.com)</p><p>&nbsp;</p>', '<p>Create a clipping path</p>', '<p>Create a work path</p>', '<p>Create a marquee shape area</p>', '<p>Create a color dodge layer</p>', '1', 14, 1),
(659, '<p>&nbsp;Choose the form in which Postback occur<br />&nbsp;</p>', '<p>A. &nbsp;HTMLForms<br />&nbsp;</p>', '<p>B. &nbsp;Webforms<br />&nbsp;</p>', '<p>C. &nbsp;Winforms</p>', '<p>D. All of the above</p>', '2', 22, 1),
(660, '<p>Web.config file is used...<br />&nbsp;</p>', '<p>A. &nbsp;Configures the time that the server-side codebehind module is called<br />&nbsp;</p>', '<p>B. &nbsp;To store the global information and variable definitions for the application<br />&nbsp;</p>', '<p>C. &nbsp;To configure the web server<br />&nbsp;</p>', '<p>D. &nbsp;To configure the web browser</p>', '2', 22, 1),
(661, '<p>Which of the following object is not an ASP component?<br />&nbsp;</p>', '<p>A. &nbsp;LinkCounter<br />&nbsp;</p>', '<p>B. &nbsp;Counter<br />&nbsp;</p>', '<p>C. &nbsp;AdRotator<br />&nbsp;</p>', '<p>D. &nbsp;File Access</p>', '1', 22, 1),
(662, '<p>The first event triggers in an aspx page is.<br />&nbsp;</p>', '<p>A. &nbsp;Page_Init()<br />&nbsp;</p>', '<p>B. &nbsp;Page_Load()<br />&nbsp;</p>', '<p>C. &nbsp;Page_click()<br />&nbsp;</p>', '<p>D. None of the above</p>', '1', 22, 1),
(663, '<p>&nbsp;Difference between Response.Write() andResponse.Output.Write().<br />&nbsp;</p>', '<p>A. &nbsp;Response.Output.Write() allows you to buffer output<br />&nbsp;</p>', '<p>B. &nbsp;Response.Output.Write() allows you to write formatted output<br />&nbsp;</p>', '<p>C. &nbsp;Response.Output.Write() allows you to flush output<br />&nbsp;</p>', '<p>D. &nbsp;Response.Output.Write() allows you to stream output<br />&nbsp;</p>', '2', 22, 1),
(664, '<p>&nbsp;Which of the following method must be overridden in a custom control?<br />&nbsp;</p>', '<p>A. &nbsp;The Paint() method<br />&nbsp;</p>', '<p>B. &nbsp;The Control_Build() method<br />&nbsp;</p>', '<p>C. &nbsp;The default constructor<br />&nbsp;</p>', '<p>D. &nbsp;The Render() method</p>', '4', 22, 1),
(665, '<p>Why is it important to keep the amount of type fonts down to two on most well designed ads or flyers?</p><p>&nbsp;</p>', '<p>So that it doesn&#39;t look like a ransom letter with too many crazy type fonts going on</p>', '<p>So that you are only using serif type fonts on your business papers</p>', '<p>Typographical manipulation is a way to make type look like the matched subject</p>', '<p>So the computer doesn&#39;t freeze because of all the fonts used</p>', '1', 14, 1),
(666, '<p>How do we create a FileSystemObject?<br />&nbsp;</p>', '<p>A. &nbsp;Server.CreateObject(&quot;Scripting.FileSystemObject&quot;)<br />&nbsp;</p>', '<p>B. &nbsp;Create(&quot;FileSystemObject&quot;)<br />&nbsp;</p>', '<p>C. &nbsp;Create Object:&quot;Scripting.FileSystemObject&quot;<br />&nbsp;</p>', '<p>D. &nbsp;Server.CreateObject(&quot;FileSystemObject&quot;)</p>', '1', 22, 1),
(667, '<p>Graphic designers that experiment with manual tools like pencil &amp; paper to avoid creating within the limits of whatever the computer fonts, clip art etc. this is called creating:</p><p>&nbsp;</p>', '<p>Rendering themes</p>', '<p>Stick figures and handwriting</p>', '<p>Comprehensive sketches</p>', '<p>Thumbnail sketches</p>', '4', 14, 1),
(668, '<p>Which of the following tool is used to manage the GAC?<br />&nbsp;</p>', '<p>A. &nbsp;RegSvr.exe<br />&nbsp;</p>', '<p>B. &nbsp;GacUtil.exe<br />&nbsp;</p>', '<p>C. &nbsp;GacSvr32.exe<br />&nbsp;</p>', '<p>D. &nbsp;GacMgr.exe</p>', '4', 22, 1),
(669, '<p>Which of the following tool is used to manage the GAC?<br />&nbsp;</p>', '<p>A. &nbsp;RegSvr.exe<br />&nbsp;</p>', '<p>B. &nbsp;GacUtil.exe<br />&nbsp;</p>', '<p>C. &nbsp;GacSvr32.exe<br />&nbsp;</p>', '<p>D. &nbsp;GacMgr.exe</p>', '4', 22, 1),
(670, '<p>Which of these things to be considered when you do graphic design:</p><p>&nbsp;</p>', '<p>Harmony</p>', '<p>Rhythm</p>', '<p>Color Scheme</p>', '<p>All the above</p>', '4', 14, 1),
(671, '<p>&nbsp;What class does the ASP.NET Web Form class inherit from by default?<br />&nbsp;</p>', '<p>A. &nbsp;System.Web.UI.Page<br />&nbsp;</p>', '<p>B. &nbsp;System.Web.UI.Form<br />&nbsp;</p>', '<p>C. &nbsp;System.Web.GUI.Page<br />&nbsp;</p>', '<p>D. &nbsp;System.Web.Form</p>', '1', 22, 1),
(672, '<p>We can manage states in asp.net application using<br />&nbsp;</p>', '<p>A. &nbsp;Session Objects<br />&nbsp;</p>', '<p>B. &nbsp;Application Objects<br />&nbsp;</p>', '<p>C. &nbsp;Viewstate<br />D.</p>', '<p>&nbsp;All of the above</p>', '4', 22, 1),
(673, '<p>&nbsp;Attribute must be set on a validator control for the validation to work.<br />&nbsp;</p>', '<p>A. &nbsp;ControlToValidate<br />&nbsp;</p>', '<p>B. &nbsp;ControlToBind<br />&nbsp;</p>', '<p>C. &nbsp;ValidateControl<br />&nbsp;</p>', '<p>D. &nbsp;Validate</p>', '1', 22, 1),
(674, '<p>Which desription describes how you&nbsp;<em>make</em>&nbsp;a custom brush in Photoshop</p><p>&nbsp;</p>', '<p>Drag in an image, shrink it, play with it in free transform</p>', '<p>Copy an image, bring it into Photoshop, go to edit menu, go to define brush preset and load it into the brush catalog</p>', '<p>Change the picture to a maximum diameter size from the brush</p>', '<p>Go to the brush tool, grab the color you want, and use the color picker and draw</p>', '2', 14, 1),
(675, '<p>Caching type supported by ASP.Net<br />&nbsp;</p>', '<p>A. &nbsp;Output Caching<br />&nbsp;</p>', '<p>B. &nbsp;DataCaching<br />&nbsp;</p>', '<p>C. &nbsp;a and b<br />&nbsp;</p>', '<p>D. None of the above</p>', '3', 22, 1),
(676, '<p>Use this tool to fill in a solid color for a background of your graphic document. The alternate&nbsp;tool will give you a &quot;light-to-dark&quot; gradation in your image.</p><p>&nbsp;</p>', '<p>Crop tool and the eye dropper</p>', '<p>Foreground tool and the background tool</p>', '<p>Paint bucket tool and the Gradient Tool</p>', '<p>History brush tool and the Healing Brush tool</p>', '3', 14, 1),
(677, '<p>What is used to validate complex string patterns like an e-mail address?<br />&nbsp;</p>', '<p>A. &nbsp;Extended expressions<br />&nbsp;</p>', '<p>B. &nbsp;Basic expressions<br />&nbsp;</p>', '<p>C. &nbsp;Regular expressions<br />&nbsp;</p>', '<p>D. &nbsp;Irregular expressions</p>', '3', 22, 1),
(678, '<p>&nbsp;File extension used for ASP.NET files.<br />&nbsp;</p>', '<p>A. &nbsp;.Web<br />&nbsp;</p>', '<p>B. &nbsp;.ASP<br />&nbsp;</p>', '<p>C. &nbsp;.ASPX<br />&nbsp;</p>', '<p>D. &nbsp;None of the above</p>', '2', 22, 1),
(679, '<p>&nbsp;An alternative way of displaying text on web page using<br />&nbsp;</p>', '<p>A. &nbsp;asp:label<br />&nbsp;</p>', '<p>B. &nbsp;asp:listitem<br />&nbsp;</p>', '<p>C. &nbsp;asp:button</p>', '<p>D. None of the above</p>', '1', 22, 1),
(680, '<p>&nbsp;Why is Global.asax is used?<br />&nbsp;</p>', '<p>A. &nbsp;Declare Global variables<br />&nbsp;</p>', '<p>B. &nbsp;Implement application and session level events<br />&nbsp;</p>', '<p>C. &nbsp;No use</p>', '<p>D. None of the above</p>', '2', 22, 1),
(681, '<p>Which of the following is not a member of ADODBCommand object?<br />&nbsp;</p>', '<p>A. &nbsp;ExecuteScalar<br />&nbsp;</p>', '<p>B. &nbsp;ExecuteStream<br />&nbsp;</p>', '<p>C. &nbsp;Open<br />&nbsp;</p>', '<p>D. &nbsp;ExecuteReader</p>', '3', 22, 1),
(682, '<p><br />18. Which DLL translate XML to SQL in IIS?<br />&nbsp;</p>', '<p>A. &nbsp;SQLISAPI.dll<br />&nbsp;</p>', '<p>B. &nbsp;SQLXML.dll<br />&nbsp;</p>', '<p>C. &nbsp;LISXML.dll<br />&nbsp;</p>', '<p>D. &nbsp;SQLIIS.dll</p>', '1', 22, 1),
(683, '<p>Default Session data is stored in ASP.Net.<br />&nbsp;</p>', '<p>A. &nbsp;StateServer<br />&nbsp;</p>', '<p>B. &nbsp;Session Object<br />&nbsp;</p>', '<p>C. &nbsp;InProcess<br />&nbsp;</p>', '<p>D. &nbsp;all of the above</p>', '3', 22, 1),
(684, '<p>Which devices provides positional information to the graphics system ?<br />&nbsp;</p>', '<p>Input devices</p>', '<p>Output devices</p>', '<p>Pointing devices</p>', '<p>Both a and c</p>', '4', 14, 1),
(685, '<p>&nbsp;Default scripting language in ASP.<br />&nbsp;</p>', '<p>A. &nbsp;EcmaScript<br />&nbsp;</p>', '<p>B. &nbsp;VBScript<br />&nbsp;</p>', '<p>C. &nbsp;PERL<br />&nbsp;</p>', '<p>D. &nbsp;JavaScript</p>', '2', 22, 1),
(686, '<p>The number of pixels stored in the frame buffer of a graphics system is known as<br />&nbsp;</p>', '<p>Resolution</p>', '<p>Depth</p>', '<p>Resalution</p>', '<p>All the above</p>', '1', 14, 1),
(687, '<p>How do you get information from a form that is submitted using the &quot;post&quot; method?<br />&nbsp;</p>', '<p>A. &nbsp;Request.QueryString<br />&nbsp;</p>', '<p>B. &nbsp;Request.Form<br />&nbsp;</p>', '<p>C. &nbsp;Response.write<br />&nbsp;</p>', '<p>D. &nbsp;Response.writeln</p>', '2', 22, 1),
(688, '<p>Which object can help you maintain data across users?<br />&nbsp;</p>', '<p>A. &nbsp;Application object<br />&nbsp;</p>', '<p>B. &nbsp;Session object<br />&nbsp;</p>', '<p>C. &nbsp;Response object<br />&nbsp;</p>', '<p>D. &nbsp;Server object</p>', '1', 22, 1),
(689, '<p>In graphical system, the array of pixels in the picture are stored in<br />&nbsp;</p>', '<p>Memory<br />&nbsp;</p>', '<p>Frame buffer</p>', '<p>Processor</p>', '<p>All the above</p>', '1', 14, 1),
(690, '<p>&nbsp;Which of the following ASP.NET object encapsulates the state of the client?<br />&nbsp;</p>', '<p>A. &nbsp;Session object<br />&nbsp;</p>', '<p>B. &nbsp;Application object<br />&nbsp;</p>', '<p>C. &nbsp;Response object<br />&nbsp;</p>', '<p>D. &nbsp;Server object</p>', '1', 22, 1),
(691, '<p>&nbsp;Heat supplied to the cathode by directing a current through a coil of wire is called<br />&nbsp;</p>', '<p>Electron gun</p>', '<p>Electron beam</p>', '<p>Filament</p>', '<p>Anode and cathode</p>', '3', 14, 1),
(692, '<p>Which of the following object is used along with application object in order to ensure that only one process accesses a variable at a time?<br />&nbsp;</p>', '<p>A. &nbsp;Synchronize<br />&nbsp;</p>', '<p>B. &nbsp;Synchronize()<br />&nbsp;</p>', '<p>C. &nbsp;ThreadLock<br />&nbsp;</p>', '<p>D. &nbsp;Lock()</p>', '2', 22, 1),
(693, '<p>The maximum number of points that can be displayed without overlap on a CRT is referred as<br />&nbsp;</p>', '<p>Picture</p>', '<p>Resolution<br />&nbsp;</p>', '<p>Persistence</p>', '<p>Neither b nor c</p>', '2', 14, 1),
(694, '<p>Which of the following control is used to validate that two fields are equal?<br />&nbsp;</p>', '<p>A. &nbsp;RegularExpressionValidator<br />&nbsp;</p>', '<p>B. &nbsp;CompareValidator<br />&nbsp;</p>', '<p>C. &nbsp;equals() method<br />&nbsp;</p>', '<p>D. &nbsp;RequiredFieldValidator</p>', '2', 22, 1),
(695, '<p>________ stores the picture information as a charge distribution behind the phosphor-coated screen.<br />&nbsp;</p>', '<p>Cathode ray tube</p>', '<p>Direct-view storage tube</p>', '<p>Flat panel displays</p>', '<p>3D viewing device.</p>', '2', 14, 1),
(696, '<p>Mode of storing ASP.NET session<br />&nbsp;</p>', '<p>A. &nbsp;InProc<br />&nbsp;</p>', '<p>B. &nbsp;StateServer<br />&nbsp;</p>', '<p>C. &nbsp;SQL Server</p><p>&nbsp;</p>', '<p>D. &nbsp;All of the above</p>', '4', 22, 1),
(697, '<p>The devices which converts the electrical energy into light is called<br />&nbsp;</p>', '<p>Liquid-crystal displays</p>', '<p>Non-emitters</p>', '<p>Plasma panels</p>', '<p>Emitters</p>', '4', 14, 1),
(698, '<p>Which of the following is not the way to maintain state?<br />&nbsp;</p>', '<p>A. &nbsp;View state<br />&nbsp;</p>', '<p>B. &nbsp;Cookies<br />&nbsp;</p>', '<p>C. &nbsp;Hidden fields<br />&nbsp;</p>', '<p>D. &nbsp;Request object</p>', '4', 22, 1),
(699, '<p>Aspect ratio means<br />&nbsp;</p>', '<p>Number of pixels</p>', '<p>Ratio of vertical points to horizontal points</p>', '<p>Ratio of horizontal points to vertical points</p>', '<p>Both b and c</p>', '4', 14, 1),
(700, '<p>______________ element in the web.config file to run code using the permissions of a specific user<br />&nbsp;</p>', '<p>A. &nbsp;&lt; credential&gt; element<br />&nbsp;</p>', '<p>B. &nbsp;&lt; authentication&gt; element<br />&nbsp;</p>', '<p>C. &nbsp;&lt; authorization&gt; element<br />&nbsp;</p>', '<p>D. &nbsp;&lt; identity&gt; element</p>', '4', 22, 1),
(701, '<p>On a black and white system with one bit per pixel, the frame buffer is commonly called as<br />&nbsp;</p>', '<p>Pix map</p>', '<p>Multi map</p>', '<p>Bitmap</p>', '<p>All the above</p>', '3', 14, 1),
(702, '<p>__________ is a special subfolder within the windows folder that stores the shared .NET component.<br />&nbsp;</p>', '<p>A. &nbsp;/bin<br />&nbsp;</p>', '<p>B. &nbsp;GAC<br />&nbsp;</p>', '<p>C. &nbsp;Root</p>', '<p>D. None of the above</p>', '2', 22, 1),
(703, '<p>Which of the following is the performance attributes of processModel?<br />&nbsp;</p>', '<p>A. &nbsp;requestQueue limit<br />&nbsp;</p>', '<p>B. &nbsp;maxWorkerThreads<br />&nbsp;</p>', '<p>C. &nbsp;maxIdThreads<br />&nbsp;</p>', '<p>D. &nbsp;All</p>', '4', 22, 1);

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
(1, 10, 120, 60),
(2, 10, 120, 60),
(3, 10, 120, 60),
(4, 10, 120, 60),
(5, 10, 120, 60),
(6, 10, 120, 60),
(7, 10, 120, 60),
(8, 10, 120, 60),
(9, 10, 120, 60),
(10, 10, 120, 60),
(11, 10, 120, 60),
(12, 10, 120, 60),
(13, 10, 120, 60),
(14, 10, 120, 60),
(15, 10, 120, 60),
(16, 10, 120, 60),
(17, 10, 120, 60),
(18, 10, 120, 60),
(19, 10, 120, 60),
(20, 10, 120, 60),
(21, 10, 120, 60),
(22, 10, 120, 60),
(25, 10, 120, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileImage` varchar(1000) NOT NULL DEFAULT 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg',
  `coverImage` varchar(1000) NOT NULL DEFAULT 'http://cp.ui/assets/img/cover-default.jpg',
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

INSERT INTO `users` (`userID`, `name`, `email`, `mobile`, `password`, `profileImage`, `coverImage`, `gender`, `relationshipStatus`, `accountType`, `cityID`, `emailVerified`, `mobileVerified`, `displayEMail`, `displayMobile`, `registrationLevel`, `active`, `created_at`) VALUES
(1, 'Nikhil Verma', 'vrmanikhil@gmail.com', 9953017515, 'a581a9ff40d2a401f4046761dff80a4c', 'http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma.jpg', 'http://cp.ui/assets/img/cover-002.jpg', 'M', '4', '1', 135, 1, 1, 1, 1, '5', 1, '2017-06-23 06:15:20'),
(2, 'Itishri Singh', 'itishri.singh12@gmail.com', 9871983065, '279759155c3878e305e032b7b5845eda', 'http://backoffice.campuspuppy.com/assets/profileImages/itishrisingh.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 135, 1, 1, 1, 0, '5', 1, '2017-06-24 18:04:30'),
(3, 'Vini Maheshwari', 'vinimaheshwari02@gmail.com', 8527856687, '712e4b7a3aecab4bf2658ca3e76432a0', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '4', 1, '2017-06-14 06:49:13'),
(4, 'Gautam Lal', 'gautam.lal7@gmail.com', 8527312008, '17ab69fa42fa9e6812a860f3c5d1a8aa', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 135, 1, 1, 1, 0, '5', 1, '2017-06-14 06:48:22'),
(5, 'Aishwarya Gupta', 'aishwaryagpt94@gmail.com', 9810047205, 'c571f50ffd6df41b879442dc9425f003', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 135, 1, 0, 1, 0, '3', 0, '2017-06-08 09:38:14'),
(6, 'Prashant Chaudhary', 'prashantp099@gmail.com', 9899310579, '3075d701de5770f0016cc1f93adb05bf', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 135, 1, 1, 1, 0, '5', 1, '2017-06-14 06:48:58'),
(7, 'Sakshi Jaiswal', 'jswal.sakshi@gmail.com', 9971974077, '11a98374ebec8e0c7a54751d2161804d', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(8, 'Abhay Rawat', 'abhayrawat2695@gmail.com', 8468915550, '0cc175b9c0f1b6a831c399e269772661', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(9, 'Yash Vardhan', 'yashapril30@gmail.com', 9999393132, 'a9c91bac2c315f83a55ae9fcb88c61f0', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(10, 'Shivam Goyal', 'shivam.sinew@gmail.com', 8587882383, '456b370011f154a7ce7af17ee49a76ad', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 181, 1, 0, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(11, 'Deergha Jain', 'deerghajain11@gmail.com', 9716150496, '0bb3b7a7855d8532e55577a502ae236e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(12, 'Deepti Jain', 'deeptijain9676@gmail.com', 9718669382, '3036514cbad26225659717408c8d2c67', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(13, 'Suyash Tilhari', 'suyash.tilhari12@gmail.com', 8375867124, '1bbfd0943ed91f99438eead55020f85a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 181, 1, 0, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(14, 'Siddharth Jain', 'sidjain2901@gmail.com', 9560839425, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(15, 'Anukriti Keshari', 'anukriti.kaushki@gmail.com', 8860309313, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(16, 'Salokya Srivastava', 'sriv.salokya@gmail.com', 9453847603, '62c1dc840b80b395403ad0fed7debcf6', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(17, 'Krishnapriya Agarwal', 'kp.agarwal95@gmail.com', 8882521283, 'f1c78b8f774fa7804a081a20df35874a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '1', 181, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(18, 'Jubika Khanna', 'jubika.khanna@fitpass.co.in', 8130995418, 'dbf3d937d4808b94e0e39b804e0bbea0', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '2', 135, 1, 1, 0, 0, '5', 1, '2017-06-14 06:49:41'),
(19, 'Nisha Bharti', 'hr@wisethink.in', 8745024797, '0cc175b9c0f1b6a831c399e269772661', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(20, 'Setu Simant', 'setu.simant@silvertouch.com', 9871482198, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(21, 'Kunal Kumar', 'kunal_kumar@sislinfotech.com', 7838666639, '508df4cb2f4d8f80519256258cfb975f', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(22, 'Ashok Gupta', 'ashok.gupta@velocis.in', 9818826020, '5bd2026f128662763c532f2f4b6f2476', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(23, 'Manoj Kumar Garg', 'manoj@netcreativemind.com', 9810978433, 'e10adc3949ba59abbe56e057f20f883e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(24, 'S R Mustafa', 'srmustafa73@gmail.com', 7838204509, '5baced99d0bb5e574737dc535576bc9c', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(25, 'Madhu S Shivakumar', 'madhu.ss96@gmail.com', 9108642164, 'd7aad483f66d38e875ff283dc220b58e', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 61, 1, 0, 1, 0, '3', 1, '2017-06-08 09:38:14'),
(26, 'Nikhil Verma', 'nikhilverma@campuspuppy.com', 7503705892, 'b24331b1a138cde62aa1f679164fc62f', 'http://backoffice.campuspuppy.com/assets/profileImages/nikhilverma-cp.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 1, '3', 1, '2017-06-24 18:05:29'),
(27, 'Rinku Kumar', 'rinku@1solutions.biz', 7428961976, '04b993c532201cefcdbb7b994f105355', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 06:57:48'),
(28, 'Adid Khan', 'adid@explorecivil.net', 9973882422, 'c30761beaa3c43a3e9624603bc2e76f7', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:00:30'),
(29, 'Rohit Dutt', 'rohit@thealternativeglobal.com', 8800331664, '8a9ef653eb0a66d4f031a2110b6224be', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-13 07:02:39'),
(30, 'Nishant Varshney', 'nishantvarshney@gmail.com', 9810832351, 'd569bd79600a6d5b717d5d719c75fa8a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:02:39'),
(31, 'Praveen Anasurya', 'anasuryapraveen@gmail.com', 8686173848, '2023f6e09edaca15267e2f5521da5476', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:05:04'),
(32, 'Aayush Poddar', 'aayush.257@gmail.com', 8527044088, '833e5ef3c613f09112c35870a7c4624a', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:05:04'),
(33, 'Ankush Khera', 'hello@foxmybox.com', 9873130686, '610768d03941e226f3824d5152711673', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:07:44'),
(34, 'Priyanka Mehta', 'mehta.priyanka97@gmail.com', 9999922663, 'd642b239f86929216a991af383151008', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:14:27'),
(35, 'Bhanu Prakash Agarwal', 'bhanu.bcet27@gmail.com', 7903461334, '25f9e794323b453885f5181f1b624d0b', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:14:34'),
(36, 'Parul Singh', 'withparulsingh@gmail.com', 9873855357, '9a517c9d23fa78e7117c63de3c494d72', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '2', 135, 1, 0, 1, 0, '3', 1, '2017-06-13 07:10:07'),
(37, 'Sukhneet Kaur', 'sukhneet@akalinfosys.com', 9871092725, '989ce6020295e0438ca30ad02cbc6ea3', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '2', 135, 1, 1, 1, 0, '3', 1, '2017-06-13 07:13:14'),
(38, 'Shrikant Choudhary', 'shrikant@petzo.in', 9999966521, 'e398837d51d5eae383e4b66cf4535ea8', 'http://backoffice.campuspuppy.com/assets/profileImages/default-user.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '2', 135, 1, 1, 1, 0, '5', 1, '2017-06-23 10:24:23'),
(39, 'Sahil Kumar Maurya', 'sahil.kr.maurya@gmail.com', 9958316967, '0cc175b9c0f1b6a831c399e269772661', 'http://backoffice.campuspuppy.com/assets/profileImages/sahilkrmaurya.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'M', '4', '1', 135, 1, 1, 1, 1, '5', 1, '2017-06-24 17:55:55'),
(40, 'Itishri Singh', 'itishrisingh@campuspuppy.com', 9999511987, '0cc175b9c0f1b6a831c399e269772661', 'http://backoffice.campuspuppy.com/assets/profileImages/itishrisingh-cp.jpg', 'http://cp.ui/assets/img/cover-default.jpg', 'F', '4', '2', 135, 1, 1, 1, 0, '5', 1, '2017-06-24 18:03:18');

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
-- Dumping data for table `workExperience`
--

INSERT INTO `workExperience` (`weID`, `companyName`, `position`, `description`, `startMonth`, `startYear`, `endMonth`, `endYear`, `userID`) VALUES
(1, 'ChupaRustam', 'Web Developer', '<p>Developed Web Portal for <a target="_blank" href="http://chuparustam.in/"><strong>ChupaRustam</strong></a></p>', 'June', 2015, 'July', 2015, 1);

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
-- Indexes for table `educationalDetails`
--
ALTER TABLE `educationalDetails`
  ADD PRIMARY KEY (`educationID`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationID`);

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
  MODIFY `achievementID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `contactID` int(5) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `educationalDetails`
--
ALTER TABLE `educationalDetails`
  MODIFY `educationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `indianCities`
--
ALTER TABLE `indianCities`
  MODIFY `cityID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;
--
-- AUTO_INCREMENT for table `internshipOffers`
--
ALTER TABLE `internshipOffers`
  MODIFY `internshipID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jobOffers`
--
ALTER TABLE `jobOffers`
  MODIFY `jobID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `passwordToken`
--
ALTER TABLE `passwordToken`
  MODIFY `tokenID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=704;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `testSettings`
--
ALTER TABLE `testSettings`
  MODIFY `skillID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `workExperience`
--
ALTER TABLE `workExperience`
  MODIFY `weID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
