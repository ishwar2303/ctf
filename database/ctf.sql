-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 08:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctf`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctf_1`
--

CREATE TABLE `ctf_1` (
  `challenge_id` int(11) NOT NULL,
  `flag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ctf_1`
--

INSERT INTO `ctf_1` (`challenge_id`, `flag`) VALUES
(1, 'Immortal'),
(2, 'Triumph'),
(3, 'Image Hacked'),
(4, 'iphone X'),
(5, 'Damn');

-- --------------------------------------------------------

--
-- Table structure for table `ctf_1_score`
--

CREATE TABLE `ctf_1_score` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` double NOT NULL,
  `c_1` varchar(50) NOT NULL,
  `c_2` varchar(50) NOT NULL,
  `c_3` varchar(50) NOT NULL,
  `c_4` varchar(50) NOT NULL,
  `c_5` varchar(50) NOT NULL,
  `in_time` varchar(50) NOT NULL,
  `out_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ctf_1_score`
--

INSERT INTO `ctf_1_score` (`user_id`, `email`, `score`, `c_1`, `c_2`, `c_3`, `c_4`, `c_5`, `in_time`, `out_time`) VALUES
(1, 'ishwar2303@gmail.com', 100, 'Immortal', 'Triumph', 'Image Hacked', 'iphone X', 'Damn', '10-03-2021 12:29:23pm', '10-03-2021 12:33:20pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`) VALUES
(1, 'ishwar2303@gmail.com', '23031999'),
(2, 'srhythm2020@gmail.com', 'R@2020'),
(3, 'pankaj.gautam4012@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctf_1`
--
ALTER TABLE `ctf_1`
  ADD PRIMARY KEY (`challenge_id`);

--
-- Indexes for table `ctf_1_score`
--
ALTER TABLE `ctf_1_score`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ctf_1`
--
ALTER TABLE `ctf_1`
  MODIFY `challenge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ctf_1_score`
--
ALTER TABLE `ctf_1_score`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
