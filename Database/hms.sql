-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 10:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ha_id` int(10) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ha_id`, `f_name`, `l_name`, `username`, `mobile`, `password`) VALUES
(1, 'Suresh', 'Kumar', 'admin', '8909786756', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_no` int(10) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `room_id` int(20) DEFAULT NULL,
  `hm_id` int(20) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_no`, `student_id`, `room_id`, `hm_id`, `message`, `status`) VALUES
(18, 'B180501CS', 334, 3, 'I need 1st floor', 0),
(19, 'B180492CS', 353, 3, '', 0),
(20, 'B180476CS', 354, 3, 'Please give me room in 2nd floor.', 0),
(21, 'B180486CS', 356, 3, '', 1),
(23, 'B180437CS', 329, 3, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostel_id` int(10) NOT NULL,
  `hostel_name` varchar(20) NOT NULL,
  `no_of_rooms` int(5) DEFAULT NULL,
  `no_of_students` int(5) DEFAULT NULL,
  `accepted_gen` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `hostel_name`, `no_of_rooms`, `no_of_students`, `accepted_gen`) VALUES
(1, 'A', 100, 100, 1),
(2, 'B', 200, 200, 1),
(3, 'C', 200, 200, 1),
(4, 'D', 300, 300, 1),
(5, 'E', 200, 200, 1),
(6, 'F', 200, 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_manager`
--

CREATE TABLE `hostel_manager` (
  `hm_id` int(10) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `admin` int(10) DEFAULT NULL,
  `hostel_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_manager`
--

INSERT INTO `hostel_manager` (`hm_id`, `f_name`, `l_name`, `username`, `mobile`, `password`, `admin`, `hostel_id`) VALUES
(3, 'Athif', 'Aslam', 'athif', '9878987898', 'athif', 1, 3),
(7, 'Hareesh', 'Kanaran', 'hareesh', '08547703798', 'hareesh', 1, 5),
(14, 'abid', 'ali', 'abid', '8796578978', 'abid', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(10) NOT NULL,
  `hm_id` int(10) DEFAULT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `time_stamp` datetime DEFAULT NULL,
  `sender` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `hm_id`, `student_id`, `subject`, `message`, `time_stamp`, `sender`) VALUES
(25, 3, 'B180437CS', 'Bulb fused', 'Sir, Today morning bulb in my room got fused. Kindly Please fix it.', '2020-12-28 19:53:52', 1),
(26, 3, 'B180486CS', 'Fan not working', 'Sir, From last sunday itself fan in my room is not working properly. Please fix it.', '2020-12-28 19:58:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_number`
--

CREATE TABLE `mobile_number` (
  `student_id` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_no` int(5) DEFAULT NULL,
  `hostel_id` int(10) DEFAULT NULL,
  `allocated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `hostel_id`, `allocated`) VALUES
(1, 100, 2, 0),
(2, 101, 2, 0),
(3, 110, 1, 0),
(4, 111, 1, 0),
(203, 112, 1, 0),
(204, 113, 1, 0),
(205, 114, 1, 0),
(206, 115, 1, 0),
(207, 116, 1, 0),
(208, 117, 1, 0),
(209, 118, 1, 0),
(210, 119, 1, 0),
(211, 120, 1, 0),
(212, 121, 1, 0),
(213, 122, 1, 0),
(214, 123, 1, 0),
(215, 124, 1, 0),
(216, 125, 1, 0),
(217, 126, 1, 0),
(218, 127, 1, 0),
(219, 128, 1, 0),
(220, 129, 1, 0),
(221, 130, 1, 0),
(222, 131, 1, 0),
(223, 132, 1, 0),
(224, 133, 1, 0),
(230, 110, 2, 0),
(231, 111, 2, 0),
(232, 112, 2, 0),
(233, 113, 2, 0),
(234, 114, 2, 0),
(235, 115, 2, 0),
(236, 116, 2, 0),
(237, 117, 2, 0),
(238, 118, 2, 0),
(239, 119, 2, 0),
(240, 120, 2, 0),
(241, 121, 2, 0),
(242, 122, 2, 0),
(243, 123, 2, 0),
(244, 124, 2, 0),
(245, 125, 2, 0),
(246, 126, 2, 0),
(247, 127, 2, 0),
(248, 128, 2, 0),
(249, 129, 2, 0),
(250, 130, 2, 0),
(251, 131, 2, 0),
(252, 132, 2, 0),
(253, 133, 2, 0),
(259, 210, 2, 0),
(260, 211, 2, 0),
(261, 212, 2, 0),
(262, 213, 2, 0),
(263, 214, 2, 0),
(264, 215, 2, 0),
(265, 216, 2, 0),
(266, 217, 2, 0),
(267, 218, 2, 0),
(268, 219, 2, 0),
(269, 220, 2, 0),
(270, 221, 2, 0),
(271, 222, 2, 0),
(272, 223, 2, 0),
(273, 224, 2, 0),
(274, 225, 2, 0),
(275, 226, 2, 0),
(276, 227, 2, 0),
(277, 228, 2, 0),
(278, 229, 2, 0),
(279, 230, 2, 0),
(280, 231, 2, 0),
(281, 232, 2, 0),
(282, 233, 2, 0),
(288, 234, 2, 0),
(289, 235, 2, 0),
(290, 134, 1, 0),
(291, 135, 1, 0),
(292, 210, 1, 0),
(293, 211, 1, 0),
(294, 212, 1, 0),
(295, 213, 1, 0),
(296, 214, 1, 0),
(297, 215, 1, 0),
(298, 216, 1, 0),
(299, 217, 1, 0),
(300, 218, 1, 0),
(301, 219, 1, 0),
(302, 220, 1, 0),
(303, 221, 1, 0),
(304, 222, 1, 0),
(305, 223, 1, 0),
(306, 224, 1, 0),
(307, 225, 1, 0),
(308, 226, 1, 0),
(309, 227, 1, 0),
(310, 228, 1, 0),
(311, 229, 1, 0),
(312, 230, 1, 0),
(313, 231, 1, 0),
(314, 232, 1, 0),
(315, 233, 1, 0),
(316, 234, 1, 0),
(317, 235, 1, 0),
(318, 110, 3, 1),
(320, 236, 1, 0),
(322, 110, 3, 0),
(323, 111, 3, 0),
(324, 112, 3, 0),
(325, 113, 3, 0),
(326, 114, 3, 0),
(327, 115, 3, 0),
(328, 116, 3, 0),
(329, 117, 3, 1),
(330, 118, 3, 0),
(331, 119, 3, 0),
(332, 120, 3, 0),
(333, 121, 3, 0),
(334, 122, 3, 0),
(335, 123, 3, 0),
(336, 124, 3, 0),
(337, 125, 3, 0),
(338, 126, 3, 0),
(339, 127, 3, 0),
(340, 128, 3, 0),
(341, 129, 3, 0),
(342, 130, 3, 0),
(343, 131, 3, 0),
(344, 132, 3, 0),
(345, 133, 3, 0),
(346, 134, 3, 0),
(347, 135, 3, 0),
(348, 210, 3, 0),
(349, 211, 3, 0),
(350, 212, 3, 0),
(351, 213, 3, 0),
(352, 214, 3, 0),
(353, 215, 3, 0),
(354, 216, 3, 0),
(355, 217, 3, 0),
(356, 218, 3, 1),
(357, 219, 3, 0),
(358, 220, 3, 0),
(359, 221, 3, 0),
(360, 222, 3, 0),
(361, 223, 3, 0),
(362, 224, 3, 0),
(363, 225, 3, 0),
(364, 226, 3, 0),
(365, 227, 3, 0),
(366, 228, 3, 0),
(367, 229, 3, 0),
(368, 230, 3, 0),
(369, 231, 3, 0),
(370, 232, 3, 0),
(371, 233, 3, 0),
(372, 234, 3, 0),
(373, 235, 3, 0),
(374, 110, 4, 0),
(375, 111, 4, 0),
(376, 112, 4, 0),
(377, 113, 4, 0),
(378, 114, 4, 0),
(379, 115, 4, 0),
(380, 116, 4, 0),
(381, 117, 4, 0),
(382, 118, 4, 0),
(383, 119, 4, 0),
(384, 120, 4, 0),
(385, 121, 4, 0),
(386, 122, 4, 0),
(387, 123, 4, 0),
(388, 124, 4, 0),
(389, 125, 4, 0),
(390, 126, 4, 0),
(391, 127, 4, 0),
(392, 128, 4, 0),
(393, 129, 4, 0),
(394, 130, 4, 0),
(395, 131, 4, 0),
(396, 132, 4, 0),
(397, 133, 4, 0),
(398, 134, 4, 0),
(399, 135, 4, 0),
(400, 136, 4, 0),
(401, 137, 4, 0),
(402, 138, 4, 0),
(403, 210, 4, 0),
(404, 211, 4, 0),
(405, 212, 4, 0),
(406, 213, 4, 0),
(407, 214, 4, 0),
(408, 215, 4, 0),
(409, 216, 4, 0),
(410, 217, 4, 0),
(411, 218, 4, 0),
(412, 219, 4, 0),
(413, 220, 4, 0),
(414, 221, 4, 0),
(415, 222, 4, 0),
(416, 223, 4, 0),
(417, 224, 4, 0),
(418, 225, 4, 0),
(419, 226, 4, 0),
(420, 227, 4, 0),
(421, 228, 4, 0),
(422, 229, 4, 0),
(423, 230, 4, 0),
(424, 231, 4, 0),
(425, 232, 4, 0),
(426, 233, 4, 0),
(427, 234, 4, 0),
(428, 235, 4, 0),
(429, 236, 4, 0),
(430, 237, 4, 0),
(431, 238, 4, 0),
(432, 114, 5, 0),
(433, 115, 5, 0),
(434, 116, 5, 0),
(435, 117, 5, 0),
(436, 118, 5, 0),
(437, 119, 5, 0),
(438, 120, 5, 0),
(439, 121, 5, 0),
(440, 122, 5, 0),
(441, 123, 5, 0),
(442, 124, 5, 0),
(443, 125, 5, 0),
(444, 126, 5, 0),
(445, 127, 5, 0),
(446, 128, 5, 0),
(447, 129, 5, 0),
(448, 130, 5, 0),
(449, 131, 5, 0),
(450, 132, 5, 0),
(451, 133, 5, 0),
(452, 134, 5, 0),
(453, 135, 5, 0),
(454, 136, 5, 0),
(455, 137, 5, 0),
(456, 138, 5, 0),
(482, 214, 5, 0),
(483, 215, 5, 0),
(484, 216, 5, 0),
(485, 217, 5, 0),
(486, 218, 5, 0),
(487, 219, 5, 0),
(488, 220, 5, 0),
(489, 221, 5, 0),
(490, 222, 5, 0),
(491, 223, 5, 0),
(492, 224, 5, 0),
(493, 225, 5, 0),
(494, 226, 5, 0),
(495, 227, 5, 0),
(496, 228, 5, 0),
(497, 229, 5, 0),
(498, 230, 5, 0),
(499, 231, 5, 0),
(500, 232, 5, 0),
(501, 233, 5, 0),
(502, 234, 5, 0),
(503, 235, 5, 0),
(504, 236, 5, 0),
(505, 237, 5, 0),
(506, 238, 5, 0),
(507, 114, 6, 0),
(508, 115, 6, 0),
(509, 116, 6, 0),
(510, 117, 6, 0),
(511, 118, 6, 0),
(512, 119, 6, 0),
(513, 120, 6, 0),
(514, 121, 6, 0),
(515, 122, 6, 0),
(516, 123, 6, 0),
(517, 124, 6, 0),
(518, 125, 6, 0),
(519, 126, 6, 0),
(520, 127, 6, 0),
(521, 128, 6, 0),
(522, 129, 6, 0),
(523, 130, 6, 0),
(524, 131, 6, 0),
(525, 132, 6, 0),
(526, 133, 6, 0),
(527, 134, 6, 0),
(528, 135, 6, 0),
(529, 136, 6, 0),
(530, 137, 6, 0),
(531, 138, 6, 0),
(532, 214, 6, 0),
(533, 215, 6, 0),
(534, 216, 6, 0),
(535, 217, 6, 0),
(536, 218, 6, 0),
(537, 219, 6, 0),
(538, 220, 6, 0),
(539, 221, 6, 0),
(540, 222, 6, 0),
(541, 223, 6, 0),
(542, 224, 6, 0),
(543, 225, 6, 0),
(544, 226, 6, 0),
(545, 227, 6, 0),
(546, 228, 6, 0),
(547, 229, 6, 0),
(548, 230, 6, 0),
(549, 231, 6, 0),
(550, 232, 6, 0),
(551, 233, 6, 0),
(552, 234, 6, 0),
(553, 235, 6, 0),
(554, 236, 6, 0),
(555, 237, 6, 0),
(556, 238, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(20) NOT NULL,
  `f_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `hostel_id` int(20) DEFAULT NULL,
  `room_id` int(10) DEFAULT NULL,
  `gender` int(2) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `f_name`, `l_name`, `year`, `dept`, `password`, `hostel_id`, `room_id`, `gender`, `mobile`) VALUES
('B180437CS', 'Mohammed', 'Ismail', '3', 'CSE', 'ismail', 3, 329, 1, '8769876781'),
('B180467CS', 'fdsaoij', 'gao', '4', 'ECE', '123', NULL, NULL, 1, '131124'),
('B180476CS', 'Abid', 'Ali K P', '3', 'CSE', 'abid', NULL, NULL, 1, '8989767678'),
('B180486CS', 'Indrajith', 'T S', '3', 'CSE', 'indrajith', 3, 356, 1, '8909876789'),
('B180492CS', 'Fadi', 'Noushad', '3', 'CSE', 'fadi', NULL, NULL, 1, '8765980865'),
('B180501CS', 'Muhammed', 'Shifan', '3', 'CSE', 'shifan', NULL, NULL, 1, '7654789098'),
('B180599CS', 'Abhijith', 'Pachat', '2', 'ECE', '123', NULL, NULL, 1, '8769875678'),
('B190572PE', 'Athul', 'Krishna', '2', 'ECE', '1234', NULL, NULL, 1, '9876789098');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ha_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_no`),
  ADD KEY `fk_application_hm_id` (`hm_id`),
  ADD KEY `fk_application_room_id` (`room_id`),
  ADD KEY `fk_application_student_id` (`student_id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostel_id`),
  ADD UNIQUE KEY `hostel_name` (`hostel_name`);

--
-- Indexes for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  ADD PRIMARY KEY (`hm_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_hostel_manager_admin` (`admin`),
  ADD KEY `fk_hostel_manager_hostel_id` (`hostel_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `fk_messages_hm_id` (`hm_id`),
  ADD KEY `fk_messages_student_id` (`student_id`);

--
-- Indexes for table `mobile_number`
--
ALTER TABLE `mobile_number`
  ADD PRIMARY KEY (`student_id`,`mobile`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_room_hostel_id` (`hostel_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_student_hostel_id` (`hostel_id`),
  ADD KEY `fk_student_room_id` (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ha_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `application_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  MODIFY `hm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk_application_hm_id` FOREIGN KEY (`hm_id`) REFERENCES `hostel_manager` (`hm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_application_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_application_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  ADD CONSTRAINT `fk_hostel_manager_admin` FOREIGN KEY (`admin`) REFERENCES `administrator` (`ha_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hostel_manager_hostel_id` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_hm_id` FOREIGN KEY (`hm_id`) REFERENCES `hostel_manager` (`hm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mobile_number`
--
ALTER TABLE `mobile_number`
  ADD CONSTRAINT `fk_mobile_number_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_hostel_id` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_hostel_id` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
