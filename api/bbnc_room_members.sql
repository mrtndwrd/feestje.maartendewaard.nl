-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Host: mysql3.greenhost.nl:3306
-- Generation Time: Mar 14, 2021 at 12:03 PM
-- Server version: 10.2.25-MariaDB-10.2.25+maria~stretch-log
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maartendewaard_nl_housewarming`
--

-- --------------------------------------------------------

--
-- Table structure for table `bbnc_room_members`
--

CREATE TABLE `bbnc_room_members` (
  `id` int(11) NOT NULL,
  `room` varchar(40) NOT NULL,
  `members` varchar(500) NOT NULL DEFAULT '{}',
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bbnc_room_members`
--

INSERT INTO `bbnc_room_members` (`id`, `room`, `members`, `updated`) VALUES
(1, 'kantoor', '[]', '0000-00-00 00:00:00'),
(2, 'keuken', '[]', '0000-00-00 00:00:00'),
(3, 'hetNest', '[]', '0000-00-00 00:00:00'),
(4, 'printer', '[]', '0000-00-00 00:00:00'),
(5, 'toilet', '[]', '0000-00-00 00:00:00'),
(6, 'hal', '[]', '0000-00-00 00:00:00'),
(7, 'vergaderkamer', '[]', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbnc_room_members`
--
ALTER TABLE `bbnc_room_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbnc_room_members`
--
ALTER TABLE `bbnc_room_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
