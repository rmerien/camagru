-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2019 at 05:48 AM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru_db`
--

CREATE DATABASE IF NOT EXISTS `db_camagru`;
USE `db_camagru`;

-- --------------------------------------------------------

--
-- Table structure for `comment`
--

CREATE TABLE `comment` (
		`id` int(11) NOT NULL,
		`photo_id` int(11) NOT NULL,
		`content` mediumtext NOT NULL,
		`author` varchar(255) NOT NULL
		);

-- --------------------------------------------------------

--
-- Table structure for `like`
--

CREATE TABLE `like` (
		`login` varchar(255) NOT NULL,
		`id_pic` int(11) NOT NULL
		);

-- --------------------------------------------------------

--
-- Table structure for `picture`
--

CREATE TABLE `picture` (
		`id` int(11) NOT NULL,
		`user_id` int(11) NOT NULL,
		`source` longtext NOT NULL,
		`upload_date` datetime NOT NULL
		);

-- --------------------------------------------------------

--
-- Table structure for `user`
--

CREATE TABLE `user` (
		`id` int(11) NOT NULL,
		`login` varchar(255) NOT NULL,
		`password` varchar(255) NOT NULL,
		`lastName` varchar(255) NOT NULL,
		`firstName` varchar(255) NOT NULL,
		`email` varchar(255) NOT NULL,
		`notification` tinyint(1) NOT NULL DEFAULT '1',
		`unique_key` varchar(255) NOT NULL,
		`confirmed` tinyint(1) NOT NULL
		);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
ADD PRIMARY KEY (`id`),
	ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
ADD PRIMARY KEY (`id`),
	ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY (`id`),
	ADD UNIQUE KEY `login` (`login`),
	ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `photo_id` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

