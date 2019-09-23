-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 04:15 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flatlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidders_bids`
--

CREATE TABLE `bidders_bids` (
  `users_bid_id` int(50) NOT NULL,
  `bidid` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` int(32) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidders_bids`
--

INSERT INTO `bidders_bids` (`users_bid_id`, `bidid`, `name`, `contact`, `date_time`, `amount`, `status`) VALUES
(2, 2, 'admin', '7696399515', '2019-09-22 06:15:09', 222, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `bidname` varchar(200) DEFAULT NULL,
  `biddescription` varchar(200) DEFAULT NULL,
  `bidtype` varchar(200) DEFAULT NULL,
  `dutyprice` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `number` varchar(200) DEFAULT NULL,
  `pickuppoint` varchar(200) DEFAULT NULL,
  `dropoffpoint` varchar(200) DEFAULT NULL,
  `numberofpassenser` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `dutytype` varchar(200) DEFAULT NULL,
  `queryfrom` varchar(200) DEFAULT NULL,
  `selectdutystatus` varchar(200) DEFAULT NULL,
  `roofrack` varchar(200) DEFAULT NULL,
  `cartype` varchar(200) DEFAULT NULL,
  `dutystatusreason` varchar(200) DEFAULT NULL,
  `numberofdays` varchar(200) DEFAULT NULL,
  `destination` varchar(200) DEFAULT NULL,
  `exclusions` varchar(200) DEFAULT NULL,
  `specialdemanded` varchar(200) DEFAULT NULL,
  `bidsecretdetail` varchar(200) DEFAULT NULL,
  `startend` datetime DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `bidenddate` datetime DEFAULT NULL,
  `activebid` varchar(200) DEFAULT NULL,
  `bidimage` varchar(200) DEFAULT NULL,
  `bidby` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `bidname`, `biddescription`, `bidtype`, `dutyprice`, `name`, `number`, `pickuppoint`, `dropoffpoint`, `numberofpassenser`, `city`, `dutytype`, `queryfrom`, `selectdutystatus`, `roofrack`, `cartype`, `dutystatusreason`, `numberofdays`, `destination`, `exclusions`, `specialdemanded`, `bidsecretdetail`, `startend`, `startdate`, `bidenddate`, `activebid`, `bidimage`, `bidby`) VALUES
(3, 'that is 3', 'helod', '1', '33', 'dfds', '24', 'vxv', 'bfcgvx', '18', '1', 'LDD', 'HireCab', '1', 'Yes', 'Indica', 'Price High', '10', '234423', 'wqeqw', 'dqweqw', 'csdfsd', '1900-12-01 02:00:00', '1900-12-24 06:30:00', '2019-09-13 15:00:00', '1', '', '1'),
(4, 'this one', 'helod', '1', '33', 'dfds', '24', 'vxv', 'bfcgvx', '18', '1', 'LDD', 'HireCab', '1', 'Yes', 'Indica', 'Price High', '10', '234423', 'wqeqw', 'dqweqw', 'csdfsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-09-28 00:00:00', '1', '', ''),
(6, 'this one', 'helod', '1', '33', 'dfds', '24', 'vxv', 'bfcgvx', '18', '1', 'LDD', 'HireCab', '1', 'Yes', 'Indica', 'Price High', '10', '234423', 'wqeqw', 'dqweqw', 'csdfsd', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-09-28 00:00:00', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `state`) VALUES
(1, 'Mohali', 'Chandigarh'),
(2, 'Shimla', 'HP'),
(3, 'Manali', 'HP'),
(4, 'Chandigarh', 'Chandigarh'),
(10, 'Delhi', 'Delhi'),
(9, 'Tourism In Himachal', '9882268000'),
(11, 'Dehradoon', 'Uttranchal'),
(12, 'Amritsar', 'Punjab'),
(13, 'Jammu', 'J&K'),
(14, 'Ludhiana', 'Punjab'),
(15, 'Test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '46f94c8de14fb36680850768ff1b7f2a'),
(2, 'subadmin', 'subadmin@gmail.com', 'sub_admin', '46f94c8de14fb36680850768ff1b7f2a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidders_bids`
--
ALTER TABLE `bidders_bids`
  ADD PRIMARY KEY (`users_bid_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidders_bids`
--
ALTER TABLE `bidders_bids`
  MODIFY `users_bid_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
