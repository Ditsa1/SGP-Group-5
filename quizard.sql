-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2022 at 07:34 AM
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
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

INSERT INTO `login` (`username`, `first_name`, `last_name`, `dept`, `college`, `password`, `role`) VALUES
('20cs024@charusat.edu.in', 'Deekshita', 'Katada', 'CSE', 'CSPIT', '20cs024', 'student'),
('20cs031@charusat.edu.in', 'Ditsa', 'Mandani', 'CSE', 'CSPIT', '20cs031', 'student'),
('20cs100@charusat.edu.in', 'Naisargi', 'Vadodariya', 'CSE', 'CSPIT', '20cs100', 'student'),
('admin@gmail.com', 'Admin', 'Admin', 'CSE', 'CSPIT', 'admin', 'admin'),
('amit.it@gmail.com', 'Amit', 'T', 'IT', 'CSPIT', 'amit', 'teacher'),
('deep.ce@gmail.com', 'Deep', 'K', 'CE', 'CSPIT', 'deep', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
