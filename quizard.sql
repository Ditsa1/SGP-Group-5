-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2022 at 05:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizard`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `c_msg` varchar(1000) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `user_name`, `c_msg`, `c_date`) VALUES
(1, 'Anounymous', 'hi', '2022-04-16 05:42:53'),
(4, '20cs031@charusat.edu.in', 'hi', '2022-04-16 07:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dept` varchar(10) DEFAULT NULL,
  `college` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `first_name`, `last_name`, `dept`, `college`, `password`, `role`) VALUES
(1, '20cs024@charusat.edu.in', 'Deekshita', 'Katada', 'CSE', 'CSPIT', '20cs024', 'student'),
(2, '20cs031@charusat.edu.in', 'Ditsa', 'Mandani', 'CSE', 'CSPIT', '20cs031', 'student'),
(4, '20cs100@charusat.edu.in', 'Naisargi', 'Vadodariya', 'CSE', 'CSPIT', '20cs100', 'student'),
(5, 'amitthakkar.it@charusat.ac.in', 'Amit', 'Thakkar', 'CSE', 'CSPIT', 'amit', 'admin'),
(6, 'hemangthakkar.cse@charusat.ac.in', 'Hemang', 'Thakkar', 'CSE', 'CSPIT', 'hemang', 'teacher'),
(7, 'deepkothadiya.ce@charusat.ac.in', 'Deep', 'Kothadiya', 'CE', 'CSPIT', 'deep', 'teacher'),
(10, '20ce029@charusat.edu.in', 'Misari', 'Gami', 'CE', 'CSPIT', '20ce029', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `ques_list`
--

CREATE TABLE `ques_list` (
  `ques_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_que` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `opta` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `optb` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `optc` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `optd` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `quiz_ans` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `difficulty` varchar(1000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ques_list`
--

INSERT INTO `ques_list` (`ques_id`, `quiz_id`, `quiz_que`, `opta`, `optb`, `optc`, `optd`, `quiz_ans`, `difficulty`) VALUES
(6, 3, 'Who is 20cs031?', 'Ditsa', 'Yash', 'Deekshita', 'Naisargi', '1', '1'),
(7, 3, 'Who is 20cs024', 'Yash', 'Deekshita', 'Ditsa', 'Naisargi', '2', '2'),
(8, 4, 'What is DBMS?', 'D', 'B', 'M', 'S', '4', '3'),
(9, 4, 'What is DSA?', 'D', 'S', 'A', 'IDK', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_ans`
--

CREATE TABLE `quiz_ans` (
  `ans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `stu_ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_ans`
--

INSERT INTO `quiz_ans` (`ans_id`, `user_id`, `quiz_id`, `ques_id`, `stu_ans`) VALUES
(1, 2, 3, 6, 1),
(2, 2, 3, 7, 2),
(3, 1, 3, 6, 3),
(4, 1, 3, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_given`
--

CREATE TABLE `quiz_given` (
  `quizdone_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `quiz_status` varchar(1000) NOT NULL DEFAULT 'done'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_given`
--

INSERT INTO `quiz_given` (`quizdone_id`, `user_id`, `quiz_id`, `quiz_status`) VALUES
(1, 2, 3, 'Total Question: 2 Total Attempted: 2 Total Correct: 2 Score: 100.00'),
(3, 1, 3, 'Total Question: 2 Total Attempted: 2 Total Correct: 1 Score: 50.00');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_list`
--

CREATE TABLE `quiz_list` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(1000) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `quiz_info` varchar(1000) NOT NULL,
  `deleted` varchar(3) NOT NULL DEFAULT 'No',
  `quiz_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz_list`
--

INSERT INTO `quiz_list` (`quiz_id`, `quiz_name`, `dept`, `college`, `quiz_info`, `deleted`, `quiz_date`) VALUES
(3, 'SGP', 'CSE', 'CSPIT', 'test1', 'No', '2022-04-15 09:08:33'),
(4, 'DBMS', 'CE', 'CSPIT', 'test2', 'No', '2022-04-15 09:09:37'),
(7, 'DSA', 'CSE', 'CSPIT', 'test3', 'No', '2022-04-16 06:23:45'),
(8, 'MCO', 'CE', 'CSPIT', 'test4', 'No', '2022-04-16 06:33:21'),
(9, 'HS', 'CSE', 'CSPIT', 'test5', 'No', '2022-04-16 08:32:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ques_list`
--
ALTER TABLE `ques_list`
  ADD PRIMARY KEY (`ques_id`);

--
-- Indexes for table `quiz_ans`
--
ALTER TABLE `quiz_ans`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `quiz_given`
--
ALTER TABLE `quiz_given`
  ADD PRIMARY KEY (`quizdone_id`);

--
-- Indexes for table `quiz_list`
--
ALTER TABLE `quiz_list`
  ADD PRIMARY KEY (`quiz_id`),
  ADD UNIQUE KEY `quiz_name` (`quiz_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ques_list`
--
ALTER TABLE `ques_list`
  MODIFY `ques_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz_ans`
--
ALTER TABLE `quiz_ans`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz_given`
--
ALTER TABLE `quiz_given`
  MODIFY `quizdone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_list`
--
ALTER TABLE `quiz_list`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
