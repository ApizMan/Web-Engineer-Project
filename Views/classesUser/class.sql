-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 12:24 PM
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
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluator`
--

CREATE TABLE `evaluator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluator`
--

INSERT INTO `evaluator` (`id`, `name`) VALUES
(1, 'Faizal'),
(2, 'Izzati'),
(3, 'Haidar'),
(4, 'Siti'),
(5, 'Barzin'),
(6, 'Awang'),
(7, 'Firash'),
(8, 'Hadees'),
(9, 'Aryan'),
(10, 'Aqil');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`) VALUES
(1, 'Ahmad'),
(2, 'Ali'),
(3, 'Siti'),
(4, 'Bintang'),
(5, 'Bisaam'),
(6, 'Firash'),
(7, 'Fuaad'),
(8, 'Ghazaar'),
(9, 'Hadees '),
(10, 'Hatar '),
(11, 'Hazer '),
(12, 'Johan '),
(13, 'Khajeer  '),
(14, 'Maymuun  '),
(15, 'Mohamed '),
(16, 'Megat '),
(17, 'Fehmeed '),
(18, 'Musawwir '),
(19, 'Nijat ');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `name`) VALUES
(1, 'Miss Izzatul'),
(2, 'Sir Hairi'),
(3, 'Miss Sofi'),
(4, 'Mrs. Panjang '),
(5, 'Mr. Qawi '),
(6, 'Dr. Ruwayfi '),
(7, 'Prof. Yusof '),
(8, 'Dr. Umar '),
(9, 'Mr. Raahim '),
(10, 'Sir Putera  '),
(11, 'Sir Perwira  ');

-- --------------------------------------------------------

--
-- Table structure for table `userclass`
--

CREATE TABLE `userclass` (
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(8) NOT NULL,
  `student` varchar(50) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `evaluator` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `className` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userclass`
--

INSERT INTO `userclass` (`id`, `date`, `time`, `student`, `supervisor`, `evaluator`, `faculty`, `className`) VALUES
(4, '2021-01-21', '10:11:01', 'Ali,Bintang', 'Dr. Ruwayfi ', 'Aryan', 'Faculty of Computer', 'FYP 1'),
(5, '2022-01-03', '10:11:33', 'Ahmad,Bisaam', 'Dr. Umar ', 'Barzin', 'Faculty of Engineering Technology', 'FYP 2'),
(6, '2022-10-21', '10:12:02', 'Fehmeed ,Firash', 'Miss Izzatul', 'Aryan', 'Faculty of Industrial Sciences and Technology', 'FYP 3'),
(7, '2022-07-14', '10:12:33', 'Fuaad,Ghazaar', 'Miss Sofi', 'Aqil', 'Faculty of Electrical and Electronic Engineering T', 'FYP 4'),
(8, '2022-05-16', '10:13:10', 'Hatar ,Hazer ', 'Mr. Qawi ', 'Hadees', 'Faculty of Civil Engineering Technology', 'FYp 5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluator`
--
ALTER TABLE `evaluator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userclass`
--
ALTER TABLE `userclass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluator`
--
ALTER TABLE `evaluator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userclass`
--
ALTER TABLE `userclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
