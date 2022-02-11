-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 11:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendingrequestsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accepted`
--

CREATE TABLE `accepted` (
  `sellername` varchar(25) NOT NULL,
  `buyername` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `amount` int(12) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `bank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted`
--

INSERT INTO `accepted` (`sellername`, `buyername`, `type`, `amount`, `message`, `date`, `bank`) VALUES
('raj', 'Future Limited', 'Construction', 500000, 'axis bank accepted your invoice discounting application', '2021-11-14 15:57:39', 'axis'),
('diya', 'Bright limited', 'utensils', 300000, 'tvs bank accepted your invoice discounting application', '2021-11-14 15:59:03', 'tvs');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(31) NOT NULL,
  `type` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `type`, `password`) VALUES
(1, 'axis', 'Bank', 'axis@rcb.com', 'bank', 'axis'),
(2, 'hdfc', 'Bank', 'hdfc@rcb.com', 'bank', 'hdfc'),
(3, 'tvs', 'Bank', 'tvs@rcb.com', 'bank', 'tvs');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `sellername` varchar(25) NOT NULL,
  `buyername` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `amount` int(12) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `bank` varchar(20) NOT NULL,
  `id` varchar(60) NOT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`sellername`, `buyername`, `type`, `amount`, `message`, `date`, `bank`, `id`, `status`) VALUES
('diya', 'Bright limited', 'utensils', 300000, 'diya would like to get an invoice discount for Bright limited Order', '2021-11-14 15:56:46', 'hdfc', 'diya@gmail.com diya hdfc', 'Rejected'),
('diya', 'Bright limited', 'utensils', 300000, 'diya would like to get an invoice discount for Bright limited Order', '2021-11-14 15:56:46', 'tvs', 'diya@gmail.com diya tvs', 'Accepted'),
('Manish', 'xyz Logistics', 'cloth', 90000, 'Manish would like to get an invoice discount for xyz Logistics Order', '2021-11-14 15:52:43', 'axis', 'manish412@gmail.com Manish axis', 'Rejected'),
('Manish', 'xyz Logistics', 'cloth', 90000, 'Manish would like to get an invoice discount for xyz Logistics Order', '2021-11-14 15:52:43', 'hdfc', 'manish412@gmail.com Manish hdfc', 'pending'),
('Manish', 'xyz Logistics', 'cloth', 90000, 'Manish would like to get an invoice discount for xyz Logistics Order', '2021-11-14 15:52:43', 'tvs', 'manish412@gmail.com Manish tvs', 'pending'),
('parth', 'Butterfly Inc.', 'Electricals', 740000, 'parth would like to get an invoice discount for Butterfly Inc. Order', '2021-11-14 16:00:39', 'axis', 'parth@gmail.com parth axis', 'pending'),
('parth', 'Butterfly Inc.', 'Electricals', 740000, 'parth would like to get an invoice discount for Butterfly Inc. Order', '2021-11-14 16:00:39', 'hdfc', 'parth@gmail.com parth hdfc', 'pending'),
('parth', 'Butterfly Inc.', 'Electricals', 740000, 'parth would like to get an invoice discount for Butterfly Inc. Order', '2021-11-14 16:00:39', 'tvs', 'parth@gmail.com parth tvs', 'pending'),
('raj', 'Future Limited', 'Construction', 500000, 'raj would like to get an invoice discount for Future Limited Order', '2021-11-14 15:55:18', 'axis', 'raj@gmail.com raj axis', 'Accepted'),
('raj', 'Future Limited', 'Construction', 500000, 'raj would like to get an invoice discount for Future Limited Order', '2021-11-14 15:55:18', 'hdfc', 'raj@gmail.com raj hdfc', 'Rejected');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
