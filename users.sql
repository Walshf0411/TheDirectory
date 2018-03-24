-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2018 at 08:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `aniket`
--

CREATE TABLE `aniket` (
  `contact_name` varchar(30) NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deeksha`
--

CREATE TABLE `deeksha` (
  `contact_name` varchar(30) NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `username` varchar(50) NOT NULL,
  `password` varchar(120) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `imagepath` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`username`, `password`, `gender`, `imagepath`) VALUES
('ani', 'fae0b27c451c728867a567e8c1bb4e53', 'male', 'uploads/jo.jpg'),
('aniket', '25f9e794323b453885f5181f1b624d0b', 'male', 'uploads/Vesit.jpg'),
('ashis', '15de21c670ae7c3f6f3f1f37029303c9', 'male', 'uploads/Vesit.jpg'),
('chris', '202cb962ac59075b964b07152d234b70', 'male', '../uploads/sample.html'),
('Deeksha', 'e10adc3949ba59abbe56e057f20f883e', 'female', 'uploads/Vesit.jpg'),
('harsh', 'c20ad4d76fe97759aa27a0c99bff6710', 'female', '../uploads/Vesit.jpg'),
('lara', 'caf1a3dfb505ffed0d024130f58c5cfa', 'male', 'uploads/jo.jpg'),
('lol', '25f9e794323b453885f5181f1b624d0b', 'male', '../uploads/Vesit.jpg'),
('rajpreet', 'c20ad4d76fe97759aa27a0c99bff6710', 'male', '../uploads/Vesit.jpg'),
('rand', 'fae0b27c451c728867a567e8c1bb4e53', 'male', 'uploads/jo.jpg'),
('riza', 'e10adc3949ba59abbe56e057f20f883e', 'male', 'uploads/Vesit.jpg'),
('rjlol', 'c20ad4d76fe97759aa27a0c99bff6710', 'male', '../uploads/agnes.jpg'),
('subil', 'c20ad4d76fe97759aa27a0c99bff6710', 'male', 'uploads/Vesit.jpg'),
('sumeet', '872694b2ab50601615cbad2bc50d98d6', 'male', '../uploads/joker.php'),
('vesi', '15de21c670ae7c3f6f3f1f37029303c9', 'male', 'uploads/Vesit.jpg'),
('walsh', '25f9e794323b453885f5181f1b624d0b', 'male', 'uploads/Vesit.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aniket`
--
ALTER TABLE `aniket`
  ADD PRIMARY KEY (`contact_name`);

--
-- Indexes for table `deeksha`
--
ALTER TABLE `deeksha`
  ADD PRIMARY KEY (`contact_name`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
