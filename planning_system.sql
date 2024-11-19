-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 07:57 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `planning_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Demo Category'),
(3, 'Finished Goods'),
(5, 'Machinery'),
(4, 'Packing Materials'),
(2, 'Raw Materials'),
(8, 'Stationery Items'),
(6, 'Work in Progress');

-- --------------------------------------------------------


--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
`id` int(11) unsigned NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `yearly_pland`
--

CREATE TABLE IF NOT EXISTS `yearly_pland` (
`id` int(11) unsigned NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `baseline` decimal(25,2) DEFAULT NULL,
  `yeari_plan` decimal(25,2) NOT NULL,
  `categorie_id` int(11) unsigned NOT NULL,
  `media_id` int(11) DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `yearly_pland` (`id`, `indicator`, `unit`, `baseline`, `yeari_plan`, `categorie_id`, `media_id`, `date`) VALUES
(1, 'Demo Product', '48', '100.00', '500.00', 1, 0, '2021-04-04 16:45:51'),
(2, 'Box Varieties', '12000', '55.00', '130.00', 4, 0, '2021-04-04 18:44:52'),
(3, 'Wheat', '69', '2.00', '5.00', 2, 0, '2021-04-04 18:48:53'),
(4, 'Timber', '1200', '780.00', '1069.00', 2, 0, '2021-04-04 19:03:23'),
(5, 'W1848 Oscillating Floor Drill Press', '26', '299.00', '494.00', 5, 0, '2021-04-04 19:11:30'),
(6, 'Portable Band Saw XBP02Z', '42', '280.00', '415.00', 5, 0, '2021-04-04 19:13:35'),
(7, 'Life Breakfast Cereal-3 Pk', '107', '3.00', '7.00', 3, 0, '2021-04-04 19:15:38'),
(8, 'Chicken of the Sea Sardines W', '110', '13.00', '20.00', 3, 0, '2021-04-04 19:17:11'),
(9, 'Disney Woody - Action Figure', '67', '29.00', '55.00', 3, 0, '2021-04-04 19:19:20'),
(10, 'Hasbro Marvel Legends Series Toys', '106', '219.00', '322.00', 3, 0, '2021-04-04 19:20:28'),
(11, 'Packing Chips', '78', '21.00', '31.00', 4, 0, '2021-04-04 19:25:22'),
(12, 'Classic Desktop Tape Dispenser 38', '160', '5.00', '10.00', 8, 0, '2021-04-04 19:48:01'),
(13, 'Small Bubble Cushioning Wrap', '199', '8.00', '19.00', 4, 0, '2021-04-04 19:49:00');

-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Harry Denn', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.png', 1, '2021-04-04 19:45:52'),
(2, 'John Walker', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.png', 1, '2021-04-04 19:53:26'),
(3, 'Christopher', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.png', 1, '2021-04-04 19:54:46'),
(4, 'Natie Williams', 'natie', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, NULL),
(5, 'Kevin', 'kevin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 3, 'no_image.png', 1, '2021-04-04 19:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
`id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
