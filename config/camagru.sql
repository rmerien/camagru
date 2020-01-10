-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2020 at 09:40 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `img_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `path` varchar(127) NOT NULL,
  `caption` varchar(2200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`img_id`, `uid`, `path`, `caption`) VALUES
(1, 2, '2_5de3ba3649ac9.jpeg', 'awegasdf'),
(2, 2, '2_5de3d12113b6e.jpeg', 'asfdfsk,hjbgskljvdfhviusjadhasdjfihasdij asjdfh ajsdfh uqw akmncbh a iufabsjkdfh gbawiueasiufawnfiueaaiufh asdh gfuiasdh fjashbd jakwdbhf liuasdh fas dfljfahgdufi ash dfahsciu awe iusa dhfauiehf auisfh auiweh fiuasdh faiudf asdh fiuawse'),
(3, 2, '2_5de51cc8cf8cf.jpeg', 'fghj'),
(4, 2, '2_5df030bd86ed5.jpeg', 'This is so much fun'),
(5, 2, '2_5df21edc04ae6.jpeg', 'era'),
(6, 2, '2_5df21ef617961.jpeg', 'erstw'),
(7, 2, '2_5df3b6b18a807.jpeg', 'This pic is dope'),
(8, 2, '2_5df3b6b8ca125.jpeg', 'So cute omg I can\'t'),
(9, 2, '2_5df3b6d0f26de.jpeg', 'th'),
(10, 2, '2_5df3b6da999b0.jpeg', 'fgdh'),
(11, 2, '2_5df62a112989c.jpeg', 'Ahah'),
(12, 2, '2_5df62a16baa1f.jpeg', 'Luv you'),
(13, 2, '2_5df62a1d1ac56.jpeg', 'swefrg'),
(14, 2, '2_5df62a28f0307.jpeg', 'ads'),
(15, 2, '2_5df8e0798dcf0.jpeg', 'asdf'),
(16, 2, '2_5df8e07af272e.jpeg', 'asdf'),
(17, 2, '2_5df8e07c99ee2.jpeg', 'asdf'),
(18, 2, '2_5df8e07e2162a.jpeg', 'asdef'),
(19, 2, '2_5df8e07f6e1d9.jpeg', 'asdf'),
(20, 2, '2_5dfab0dc537a2.jpeg', 'sdaf'),
(21, 2, '2_5dfab0ddd5c23.jpeg', 'asdf'),
(22, 2, '2_5dfab0df2189c.jpeg', 'asdf'),
(23, 2, '2_5dfab0e0824ba.jpeg', 'asdf'),
(24, 2, '2_5dfab0e1ad34c.jpeg', 'asdf'),
(25, 2, '2_5dfab0e2e7b05.jpeg', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `mail` varchar(254) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `account_confirmed` bit(1) NOT NULL DEFAULT b'0',
  `mail_notif` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `mail`, `username`, `passwd`, `account_confirmed`, `mail_notif`) VALUES
(1, 'sacmib@gmail.com', 'Nashoba', '63fea8487507c00532303df7b9c1d111f4b0b8f360e3112cb37f215d6d9f74e7a4aa2a7f4acb260563598af0a9346c14cec40e56122aaa44ec5c82971a98e2cb', b'1', b'1'),
(2, 'juanv@gmail.com', 'Juan', 'f79c8366977ae0fc93156ff1b825244d7b222fdc77c1e6f7236523d666a5c8681579d18cd83bf65b92677120a0caabc8c9f9dd1709daaeed5b06c0c220e34a33', b'1', b'1'),
(3, 'asdfg@gmail.com', 'janitoo', 'f79c8366977ae0fc93156ff1b825244d7b222fdc77c1e6f7236523d666a5c8681579d18cd83bf65b92677120a0caabc8c9f9dd1709daaeed5b06c0c220e34a33', b'0', b'1'),
(4, 'asbhjkld@gmail.com', 'jasbhjkvc', '7db14a3d3975fc94647aa8e5c48e7d55f027ba282c4fcbf01ab1313493ba9a8c4a45c7b6f9bbc8d7f47743ca41f921090579146561812cd8b5b1c4b23fb3a3b6', b'0', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `img_id` (`img_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `img_id` (`img_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `image` (`img_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `image` (`img_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
