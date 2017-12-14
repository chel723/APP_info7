-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 27, 2017 at 10:36 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `APP`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'chel723@sina.com');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_hag`
--

CREATE TABLE `dropdown_hag` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dropdown_hag`
--

INSERT INTO `dropdown_hag` (`id`, `type`, `image`) VALUES
(1, 'HAG', 'hag.png');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_room`
--

CREATE TABLE `dropdown_room` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dropdown_room`
--

INSERT INTO `dropdown_room` (`id`, `type`, `image`) VALUES
(1, 'Bedroom', 'bedroom_master.png'),
(2, 'Bathroom', 'bathroom_master.png'),
(3, 'Dining Room', 'dining_room.png'),
(4, 'Living Room', 'living_room.png');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(64) NOT NULL,
  `city` varchar(128) NOT NULL,
  `post` varchar(64) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `name`, `address`, `username`, `city`, `post`, `create_date`) VALUES
(38, '', '15,chennai, India', 'vigneshp', '', '', '2017-01-07 18:47:22'),
(53, '', 'chine', 'challasampath', 'pekin', '1234', '2017-01-10 14:23:49'),
(63, 'Chanel CoCo', '100 Champs de Mars', 'chel723', 'PARIS', '75007', '2017-01-21 13:39:21'),
(64, 'Armani Georgio', '555 HASTES', 'chel723', 'BOSTON', '02201', '2017-01-19 11:33:26'),
(65, 'Candy', '39 Av.Kleber', 'chel723', 'Paris', '75116', '2017-01-23 09:46:27'),
(75, 'linfeng', 'paris', '', 'bagneux', '92220', '2017-01-23 10:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `home_hag`
--

CREATE TABLE `home_hag` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` int(11) NOT NULL,
  `home` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_hag`
--

INSERT INTO `home_hag` (`id`, `name`, `type`, `home`) VALUES
(6, 'hag1', 1, 63),
(10, 'HAG_Left', 1, 64),
(11, 'HAG_Right', 1, 64),
(13, 'left', 1, 65),
(14, 'right', 1, 65),
(15, 'middle', 1, 65),
(45, 'hag2', 1, 63),
(48, 'hag3', 1, 63),
(170, 'center hag', 1, 75);

-- --------------------------------------------------------

--
-- Table structure for table `home_room`
--

CREATE TABLE `home_room` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `home` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_room`
--

INSERT INTO `home_room` (`id`, `name`, `type`, `home`) VALUES
(551, 'bed_daught1', 1, 63),
(552, 'bath_daught2', 2, 63),
(605, 'bed_left', 1, 64),
(606, 'bath_left', 2, 64),
(607, 'dining_middle', 3, 64),
(608, 'living_left', 4, 64),
(638, 'bed_master', 1, 65),
(639, 'bed_son', 1, 65),
(640, 'bed_daughter', 1, 65),
(641, 'bath_master', 2, 65),
(642, 'bath_kids', 2, 65),
(643, 'openspace', 3, 65),
(644, 'living', 4, 65),
(658, 'dining', 3, 63),
(659, 'living', 4, 63),
(775, 'parents roo;', 1, 75),
(776, 'family', 2, 75);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `room` int(11) NOT NULL,
  `hag` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `name`, `room`, `hag`, `type`, `added_time`) VALUES
(23, 'temp1', 638, 13, 1, '2017-01-19 15:02:05'),
(26, 'light1', 638, 13, 2, '2017-01-19 15:02:05'),
(27, 'window1', 638, 13, 4, '2017-01-19 15:02:05'),
(28, 'temp2', 641, 13, 1, '2017-01-19 15:02:05'),
(29, 'light2', 641, 13, 2, '2017-01-19 15:02:05'),
(30, 'humi1', 641, 13, 6, '2017-01-19 15:02:05'),
(31, 'light3', 643, 15, 2, '2017-01-19 15:02:05'),
(32, 'light4', 644, 15, 2, '2017-01-19 15:02:05'),
(33, 'temp3', 639, 14, 1, '2017-01-19 15:02:05'),
(35, 'light5', 639, 14, 2, '2017-01-19 15:02:05'),
(41, 'temp4', 640, 14, 1, '2017-01-19 15:02:05'),
(42, 'light6', 640, 14, 2, '2017-01-19 15:02:05'),
(43, 'temp5', 642, 14, 1, '2017-01-19 15:02:05'),
(44, 'humi2', 642, 14, 6, '2017-01-19 15:02:05'),
(77, 'bath_temp1', 552, 45, 1, '2017-01-19 15:02:05'),
(190, 'temper_bed_daug', 551, 6, 1, '2017-01-21 13:38:43'),
(202, 'tt', 775, 170, 1, '2017-01-23 10:04:00'),
(203, 'c', 775, 170, 2, '2017-01-23 10:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `id` int(11) NOT NULL,
  `sensor` int(11) NOT NULL,
  `data` decimal(10,0) NOT NULL,
  `data_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor_data`
--

INSERT INTO `sensor_data` (`id`, `sensor`, `data`, `data_time`) VALUES
(1, 23, '22', '2017-01-09'),
(2, 23, '25', '2017-01-10'),
(3, 33, '11', '2017-01-11'),
(4, 33, '15', '2017-01-11'),
(5, 28, '17', '2017-01-13'),
(6, 41, '18', '2017-01-14'),
(7, 43, '19', '2017-01-14'),
(8, 27, '1', '2017-01-16'),
(9, 30, '30', '2017-01-16'),
(10, 44, '35', '2017-01-16'),
(11, 26, '0', '2017-01-16'),
(12, 29, '1', '2017-01-16'),
(13, 31, '1', '2017-01-16'),
(14, 32, '0', '2017-01-16'),
(15, 35, '0', '2017-01-16'),
(16, 42, '1', '2017-01-16'),
(17, 23, '28', '2017-01-17'),
(18, 33, '24', '2017-01-18'),
(19, 28, '13', '2017-01-18'),
(20, 41, '18', '2017-01-17'),
(21, 43, '21', '2017-01-19'),
(22, 30, '33', '2017-01-17'),
(23, 44, '36', '2017-01-18'),
(24, 27, '0', '2017-01-18'),
(25, 26, '1', '2017-01-17'),
(26, 29, '0', '2017-01-18'),
(27, 27, '1', '2017-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_type`
--

CREATE TABLE `sensor_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor_type`
--

INSERT INTO `sensor_type` (`id`, `type`, `unit`, `image`, `vendor`) VALUES
(1, 'Temperature', '°C', 'temperature_sen.png', ''),
(2, 'Light', '', 'light_sen.png', ''),
(4, 'Window', '', 'window_sen.png', ''),
(6, 'Humidity', '%', 'humidity_sen.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `uname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `passreset` int(11) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `uname`, `email`, `password`, `passreset`, `join_date`) VALUES
(5, 'Chelsea', 'WANG', 'chel723', 'chel723@gmail.com', '637d1069eeee4b2f045799693641c1ff', 502470, '2016-12-23 17:38:50'),
(6, 'sneh', 'nain', 'sneh', 'snehnain1990@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, '2016-12-23 17:38:50'),
(7, 'vignesh', 'prakash', 'vigneshp', 'vigneshprakash92@gmail.com', '1fc0cb15f5b15767ecccbe819d8cfea2', 263633, '2016-12-23 17:38:50'),
(15, 'ben', 'cumberbatch', 'benc', 'benc@about.com', '5d41402abc4b2a76b9719d911017c592', 0, '2016-12-23 17:38:50'),
(53, 'login', 'TEST', 'logintest', 'logintest@gmail.com', '9e65ec0b2974bd6128223f14c0ce9e4c', 0, '2016-12-23 17:38:50'),
(55, 'paris', 'france', 'parisfrance', 'parisf@gmail.com', 'e0d2786c3a477e405e1fb4c4212eb11f', 0, '2016-12-23 17:38:50'),
(58, 'vertfonce', 'bicolore', 'vertfonce', 'vert@gmail.com', 'f628060e79ff6ba5a9658b584d2a59a5', 0, '2016-12-23 17:38:50'),
(59, 'vertfonceb', 'bicoloreb', 'vertfonceb', 'vertb@gmail.com', 'f628060e79ff6ba5a9658b584d2a59a5', 0, '2016-12-23 17:38:50'),
(60, 'charger', 'iMac', 'chargerimac', 'cimac@gmail.com', 'bef3794378ef5f665a518cdcd4b65bc8', 0, '2016-12-23 17:38:50'),
(61, 'francais', 'facile', 'francaisf', 'fr@gmail.com', 'c2b069b47d416e1f4fd292446b4b689f', 0, '2016-12-23 17:38:50'),
(62, 'kindle', 'amazon', 'kindlea', 'kind@gmail.com', '2520330161a31c1e13713b13dea6f56b', 0, '2016-12-23 17:38:50'),
(63, 'notredame', 'paris', 'notredamep', 'ndp@gmail.com', '73b68a753045bc36792e0fde6947291a', 0, '2016-12-23 17:40:21'),
(64, 'linfeng', 'wang', 'linfengwang', 'wang.linfeng0213@gmail.com', '0f7551db3d0376c3edd188def7854834', 0, '2016-12-26 13:58:00'),
(65, 'chelsea', 'wang', 'chel7231', 'chel7231@sina.com', '9d4d3a9ae46a7bfdf1a13030c62d96fc', 0, '2016-12-28 17:34:29'),
(66, 'test', 'APP', 'testapp', 'testapp@gmail.com', 'd225f1475d6dffa2b9035a2bfc10cf7f', 0, '2016-12-29 14:09:43'),
(67, 'Richelieu', 'BNF', 'richelieu', 'riche@gmail.com', '132040fd94b574b75b866ca00bf25afa', 0, '2016-12-30 15:23:49'),
(68, 'matthieu', 'manceny', 'matthieu', 'matthieu.manceny@isep.fr', 'a031362ad14f61fc50b6b6fc646b8fbf', 363568, '2017-01-03 13:44:14'),
(69, 'sampath', 'kumar', 'challasampath', 'sampath@gmail.com', '77a3cf3bd24e95b02e9f176f3ee25c93', 0, '2017-01-10 14:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_home`
--

CREATE TABLE `user_home` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `home` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_home`
--

INSERT INTO `user_home` (`id`, `user`, `home`, `create_date`) VALUES
(7, 7, 38, '2017-01-07 18:48:06'),
(22, 69, 53, '2017-01-10 14:23:49'),
(32, 5, 63, '2017-01-12 14:27:33'),
(33, 5, 64, '2017-01-12 18:08:39'),
(34, 5, 65, '2017-01-12 20:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`id`, `uname`, `subject`, `message`, `sent_time`) VALUES
(1, 'chel723', 'SOS', 'TEST', '0000-00-00 00:00:00'),
(2, '$uname', '$subject', '$message', '2017-01-26 15:59:39'),
(3, 'chel723', 'test', 'testtttttt', '2017-01-26 16:02:31'),
(4, 'chel723', 'test', 'testtttttt', '2017-01-26 16:13:26'),
(5, 'chel723', 'About Sensor Type', 'Hi Admin, kindly please add more types of sensor, otherwise I cannot proceed with the home creation. Thanks.\r\n\r\nChelsea', '2017-01-26 18:19:36'),
(6, 'chel723', '', '', '2017-01-26 18:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_hag`
--
ALTER TABLE `dropdown_hag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_room`
--
ALTER TABLE `dropdown_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_hag`
--
ALTER TABLE `home_hag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home` (`home`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `home_room`
--
ALTER TABLE `home_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home` (`home`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`room`),
  ADD KEY `hag` (`hag`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensor` (`sensor`);

--
-- Indexes for table `sensor_type`
--
ALTER TABLE `sensor_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_home`
--
ALTER TABLE `user_home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`,`home`),
  ADD KEY `user_home_ibfk_2` (`home`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dropdown_hag`
--
ALTER TABLE `dropdown_hag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dropdown_room`
--
ALTER TABLE `dropdown_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `home_hag`
--
ALTER TABLE `home_hag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `home_room`
--
ALTER TABLE `home_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=777;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
--
-- AUTO_INCREMENT for table `sensor_data`
--
ALTER TABLE `sensor_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `sensor_type`
--
ALTER TABLE `sensor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `user_home`
--
ALTER TABLE `user_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `home_hag`
--
ALTER TABLE `home_hag`
  ADD CONSTRAINT `home_hag_ibfk_1` FOREIGN KEY (`home`) REFERENCES `home` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `home_hag_ibfk_2` FOREIGN KEY (`type`) REFERENCES `dropdown_hag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home_room`
--
ALTER TABLE `home_room`
  ADD CONSTRAINT `home_room_ibfk_1` FOREIGN KEY (`home`) REFERENCES `home` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `home_room_ibfk_2` FOREIGN KEY (`type`) REFERENCES `dropdown_room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`room`) REFERENCES `home_room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sensor_ibfk_2` FOREIGN KEY (`hag`) REFERENCES `home_hag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sensor_ibfk_3` FOREIGN KEY (`type`) REFERENCES `sensor_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD CONSTRAINT `sensor_data_ibfk_1` FOREIGN KEY (`sensor`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_home`
--
ALTER TABLE `user_home`
  ADD CONSTRAINT `user_home_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_home_ibfk_2` FOREIGN KEY (`home`) REFERENCES `home` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
