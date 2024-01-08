-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 08:55 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `college-data`
--

CREATE TABLE `college-data` (
  `collegeName` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactPerson` varchar(200) NOT NULL,
  `mail-id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college-data`
--

INSERT INTO `college-data` (`collegeName`, `Address`, `ContactPerson`, `mail-id`) VALUES
('', '', '', ''),
('MIT Academy of Engineering, Pune', 'Dehu Phata,Alandi,Pune 412105', 'Kedar Dhavale', 'kedar.dhavale@mitaoe.ac.in'),
('PCCOE', 'Pimpri', 'Prasad Chavhan', 'prasad.chavhan@mitaoe.ac.in'),
('PICT', 'Kale Wadi,Shivaji Nagar,Pune', 'Sainath Ingle', 'sainath.ingle@mitaoe.ac.in'),
('VIT', 'Bhibewadi,Pune - 412101', 'Kedar Dhavale', 'kedar.dhavale@mitaoe.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `collegeName` varchar(200) NOT NULL,
  `CourseName` varchar(200) NOT NULL,
  `Instructor` varchar(200) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`collegeName`, `CourseName`, `Instructor`, `Description`) VALUES
('MIT Academy of Engineering, Pune', 'Data Structure', 'Ranjana patil', 'Study Of various dsa'),
('VIT', 'Operating System (OS)', 'Sarthak Wakchaure', 'Study of the Operating System');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college-data`
--
ALTER TABLE `college-data`
  ADD PRIMARY KEY (`collegeName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
