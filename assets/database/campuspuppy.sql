-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2017 at 09:38 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `active` int(5) NOT NULL,
  `passive` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `companyLogo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `partTime` tinyint(1) NOT NULL,
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
-- Table structure for table `jobLocations`
--

CREATE TABLE `jobLocations` (
  `jobID` int(5) NOT NULL,
  `cityID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `partTime` tinyint(1) NOT NULL,
  `openings` int(3) NOT NULL,
  `applicants` enum('1','2','3') NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `active` tinyint(1) NOT NULL,
  `addedBy` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobSkills`
--

CREATE TABLE `jobSkills` (
  `jobID` int(5) NOT NULL,
  `skillID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'HTML', 1),
(2, 'CSS', 1),
(3, 'PHP', 1),
(4, 'Android', 1);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userSkills`
--

CREATE TABLE `userSkills` (
  `user_id` int(5) NOT NULL,
  `skill_id` int(5) NOT NULL,
  `score` int(5) NOT NULL,
  `testDate` datetime NOT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminAuth`
--
ALTER TABLE `adminAuth`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(5) NOT NULL AUTO_INCREMENT;
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
  MODIFY `course_id` int(5) NOT NULL AUTO_INCREMENT;
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
  MODIFY `jobID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
