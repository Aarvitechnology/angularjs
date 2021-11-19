-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 11:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `course` varchar(50) NOT NULL,
  `hobbies` varchar(500) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `dob`, `course`, `hobbies`, `photo`) VALUES
(2, 'John', 'Smith', 'johnsmith@gmail.com', '78584741212', 'Male', '2021-11-17', 'Nodejs', 'Film memorabilia', ''),
(11, 'Moore', 'David', 'sadfasf@ggmail.com', '789654785224', '', NULL, '', '', ''),
(14, 'Guadalupe', 'Bolan', 'parthdevani.aarvi123@gmail.com', '785478751', 'Male', '2021-11-02', 'Angularjs', 'Crystal', ''),
(15, 'Parth', 'Devani', 'parthdevani.aarvi@gmail.com', '782588645487', 'Male', '1997-05-08', 'Nodejs', 'Film memorabilia,Crystal,Meditation,Benchmarking', ''),
(32, 'Krishana', 'Surties123', 'surti@gmail.com', '7896541235', 'Male', '1970-01-01', 'Php', '', ''),
(31, 'Pratrik', 'Vasoya', 'pret@gmail.com', '7567731684', '', NULL, '', '', ''),
(33, 'Hardika', 'Pambhar', 'pam.hardika@gmail.com', '7896541235', 'Female', NULL, '', '', ''),
(35, 'Ravi', 'Narola', 'narolaravi@gmail.com', '7865454214', 'Male', '1998-05-14', 'Php', 'Crystal,Meditation', 'http://localhost/angularjs-1/images/20211119115535.png'),
(37, 'Vishal', 'Kansagara', 'vishalkansagriya@gmail.com', '7896541235', 'Male', '1995-06-06', 'Angularjs', 'Crystal,Meditation', 'http://localhost/angularjs-1/images/20211119115421.jpeg'),
(38, 'Chandu', 'Lathiya', 'lathiyschandu@gmail.com', '748965412635', 'Male', '1997-06-11', 'Nodejs', 'Crystal,Meditation', 'http://localhost/angularjs-1/images/20211119111621.png'),
(39, 'Parth', 'Devani', 'parthdevani.aarvi@gmail.com', '7895658762', 'Male', '2021-11-16', 'Nodejs', 'Film memorabilia,Meditation,Benchmarking', 'http://localhost/angularjs-1/images/20211119115505.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
