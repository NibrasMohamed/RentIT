-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 07:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `adds`
--

CREATE TABLE `adds` (
  `mid` int(4) NOT NULL,
  `aid` int(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adds`
--

INSERT INTO `adds` (`mid`, `aid`, `title`, `type`, `fee`, `description`, `location`, `status`) VALUES
(1, 50, 'Subaru', 'car', '2500', 'its properly maintained.  Reasonable Prize. ', 'Ampara', 'Booked'),
(1, 53, 'pulsar', 'bike', '1500', 'its properly maintained.  Reasonable Prize. ', 'Matara', 'Available'),
(2, 54, 'Dominar', 'bike', '1500', 'its properly maintained.  Reasonable Prize. ', 'Kandy', 'Booked'),
(2, 55, 'Boxer', 'bike', '1500', 'its properly maintained.', 'Kegalle', 'Booked'),
(2, 56, 'pulsar', 'bike', '1500', 'its properly maintained.', 'Matale', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `aid` int(4) NOT NULL,
  `mid` int(4) NOT NULL,
  `uid` int(4) NOT NULL,
  `dfrom` varchar(20) NOT NULL,
  `dto` varchar(20) NOT NULL,
  `diff` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`aid`, `mid`, `uid`, `dfrom`, `dto`, `diff`, `status`, `bid`) VALUES
(54, 2, 1, '03:Jun:2020', '09:Jun:2020', '6', 'Canceled', 8),
(50, 1, 2, '02:Jun:2020', '06:Jun:2020', '4', '', 11),
(56, 2, 4, '28:May:2020', '05:Jun:2020', '8', 'Canceled', 12);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `aid` int(10) NOT NULL,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`aid`, `image1`, `image2`, `image3`) VALUES
(27, '317570.jpg', '30825.jpg', '30852.jpg'),
(28, '317554.jpg', '30852.jpg', '540594.jpg'),
(29, '317554.jpg', '30852.jpg', '494c84e5865acb3d6435d5f4e70a9db3.jpg'),
(30, '317554.jpg', '30852.jpg', '317554.jpg'),
(31, '30839.jpg', '30852.jpg', '540594.jpg'),
(50, '30839.jpg', '59252.jpg', '59299.jpg'),
(53, 'image1.png', 'img2jpg.jpg', ''),
(54, 'Bajaj-Dominar.jpg', 'bajaj-dominar.png', 'dominar-400-500x500.png'),
(55, 'boxer.jpg', 'boxer2.JPG', 'boxer3.jpg'),
(56, 'boxer2.JPG', 'boxer3.jpg', 'boxer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mid` int(4) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneno` int(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mid`, `username`, `email`, `address`, `phoneno`, `password`) VALUES
(1, 'akiller', 'killer@gmail.com', 'gampola', 776920820, '123'),
(2, 'alpha', 'alpha@gmail.com', 'nawalapity', 7608289, '123'),
(3, 'test', 'test@gmail.com', 'gampola', 1111111, '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(4) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` int(15) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `email`, `address`, `contactno`, `password`) VALUES
(1, 'test', 'test@gmail.com', 'gampola', 1111111, '222'),
(4, 'test2', 'test2@gmail.com', 'kurunegala', 77763336, '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `aid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adds`
--
ALTER TABLE `adds`
  ADD CONSTRAINT `adds_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `member` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
