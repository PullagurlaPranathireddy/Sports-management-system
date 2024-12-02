-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 11:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`username`, `password`) VALUES
('Charani', '47a459b21d3c678bc48c6bb3ebe4c4a5');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `student_id` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `sports_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`student_id`, `location`, `date`, `sports_name`, `position`) VALUES
('111', 'Hyderabad', '2023-12-12', '', '1st'),
('123', 'Hyderabad', '2023-12-12', 'carrom', '1st'),
('143', 'Hyderabad', '2023-12-12', 'carrom', '1st'),
('147852', 'Hyderabad', '2023-05-22', 'Cricket', 'second'),
('156', 'Hyderabad', '2023-08-25', 'carrom', '1st'),
('185', 'Hyderabad', '2023-10-07', 'carrom', '1st'),
('444', 'Banglore', '2023-10-06', 'Table Tennis', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `sports_events`
--

CREATE TABLE `sports_events` (
  `sports_location` varchar(100) NOT NULL,
  `sports_date` date NOT NULL,
  `sports_name` varchar(100) NOT NULL,
  `college_name` varchar(500) DEFAULT NULL,
  `first_prize` varchar(200) DEFAULT NULL,
  `second_prize` varchar(200) DEFAULT NULL,
  `third_prize` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports_events`
--

INSERT INTO `sports_events` (`sports_location`, `sports_date`, `sports_name`, `college_name`, `first_prize`, `second_prize`, `third_prize`) VALUES
('Hyderabad', '2025-04-06', 'kabbadi', 'Vidya Jyothi Institute of Technology', '200', '150', '50'),
('Hyderabad', '2023-12-12', 'carrom', 'Vidya Jyothi Institute of Technology', '200', '150', '50'),
('Hyderabad', '2023-12-12', 'carrom', 'Vidya Jyothi Institute of Technology', '200', '150', '50'),
('Hyderabad', '2023-10-25', 'tabletennis', 'Vidya Jyothi Institute of Technology', '200', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `name` varchar(200) DEFAULT NULL,
  `id` varchar(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `c_password` varchar(200) DEFAULT NULL,
  `DOB` date NOT NULL,
  `department` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `sports` varchar(20) DEFAULT NULL,
  `player` varchar(20) DEFAULT NULL,
  `myfile` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`name`, `id`, `email`, `contact`, `gender`, `password`, `c_password`, `DOB`, `department`, `year`, `sports`, `player`, `myfile`) VALUES
('kom', '123', 'xyz@gmail.com', '30002', 'Female', '17e65284428221c090fb6624d05f4102', '17e65284428221c090fb6624d05f4102', '2003-08-25', 'B_Tech', '3rdyear', 'Cricket,Chess', 'Player1', ''),
('md fardeen', '20911A05G1', 'fardeenvjit1@gmail.com', '8919089775', 'Male', '945bce0f0abba958ae8528453533b21e', '945bce0f0abba958ae8528453533b21e', '2003-08-25', 'B_Tech', '4thyear', 'Chess', 'Player1', ''),
('Dharani', '20911A05M1', 'abc@gmail.com', '987456123', 'Female', '240dd8dd59e5f12569be013e32123e44', '240dd8dd59e5f12569be013e32123e44', '2004-12-13', 'B_Tech', '1styear', 'Badminton', 'Player1', ''),
('sindhuja', '20911A05N7', 'sindhureddie5252@gmail.com', '9999999999', 'Female', 'dfa6b2bd2ea9474803251076a97312b6', 'dfa6b2bd2ea9474803251076a97312b6', '2001-06-22', 'B_Tech', '4thyear', 'Cricket', 'Player1', ''),
('vasavi', '20911A05N8', 'lakkireddycharani218@gmail.com', '9392983439', 'Female', 'acfbbfae42cc9c60e1c89dce0a1e898a', 'acfbbfae42cc9c60e1c89dce0a1e898a', '2001-08-09', 'B_Tech', '4thyear', 'Pool', 'Player2', ''),
('komali', '20911A05Q0', 'komali@gmail.com', '6309617935', 'Female', '49ffd306055074d080bdfffd9274fe37', '49ffd306055074d080bdfffd9274fe37', '2003-04-19', 'B_Tech', '4thyear', 'Football,Chess', 'Player1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
