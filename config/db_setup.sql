-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2019 at 04:33 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `owner` char(50) NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`owner`, `id`, `image`, `text`, `time`) VALUES
('mimy', 1, 'hcXacrbldapOVH2soYuU.png', 'dfsghj', 1566987646),
('Nashoba', 1, 'M05Trxx4inxS6XebhxkD.png', 'EXP Curb', 1566987646),
('mimy', 2, 'i9JpyiXOK6Y4tJiZw2A4.png', 'fghm', 1566987646),
('mimy', 3, 'VZ3ByrxpQPlZuNeQxaB5.png', 'asfdhjgk', 1566987646),
('Nashoba', 2, 'QWUmKwIywRZGWZvBHdvR.png', 'THIS IS AN INCREDIBLE APPLE OMG GUYS ', 1567160229),
('Nashoba', 3, '3m1Mu8IDRNeUs5J4SuEg.webp', 'this is a test', 1567160300),
('Nashoba', 4, 'KnOjMutrZ0P3nRPRZxuQ.jpeg', 'this is crazy', 1567163875);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `passwd` varchar(550) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `mail`, `passwd`) VALUES
(12, 'Nashoba', 'sacmib@gmail.com', 'f79c8366977ae0fc93156ff1b825244d7b222fdc77c1e6f7236523d666a5c8681579d18cd83bf65b92677120a0caabc8c9f9dd1709daaeed5b06c0c220e34a33'),
(13, 'Mimy', 'mimy@gmail.com', 'd487a025f429d8d4047600d9970c7c0e373d75d578c65fd3085e163c758aa2e5ee921f240af1ce5de63b08bc8099c8f811bb93deddaeb2e434cafd5cf5678001'),
(14, 'qwer', 'sacmib@gmail.comm', 'f8423d5a79b1a9a972f655507ea13dc3ce469db818798591fee4f70bf051d61abc990ffcc9f9f37fea57a109c58c13fbd6d886b596e10a245a1ceae1e141d96f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`owner`,`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
