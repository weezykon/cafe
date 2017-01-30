-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2016 at 03:01 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cette`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `matric` varchar(30) NOT NULL,
  `meal` int(5) NOT NULL,
  `amount` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `matric`, `meal`, `amount`) VALUES
(9, '1145600', 2, '800'),
(10, '1006700', 2, '800');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
`id` int(11) NOT NULL,
  `meal` varchar(60) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(60) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `trash` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `meal`, `price`, `category`, `picture`, `trash`) VALUES
(1, 'Fries Oily Chips', 800, 'Chips', 'r5.jpg', 'NO'),
(2, 'Cray Fish  Noodles', 800, 'Noodles', 'r6.jpg', 'NO'),
(3, 'Jollof Rice', 900, 'Rice', 'r7.jpg', 'NO'),
(4, 'Tomota Sharwama', 1000, 'Fast Foods', 'r8.jpg', 'NO'),
(5, 'Gooey', 1500, 'Fast Foods', 'r1.jpg', 'NO'),
(6, 'Fries', 1200, 'Chips', 'r9.jpg', 'NO'),
(7, 'Nutella', 500, 'Snacks', 'r2.jpg', 'NO'),
(8, 'Purple Bic', 450, 'Snacks', 'r4.jpg', 'NO'),
(9, 'Herbed Strawberries', 2000, 'Fast Foods', 'r3.jpg', 'NO'),
(11, 'Strawberry Smoothie', 900, 'Drinks', 'Meal_645700015645700015_CU.jpg', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `meals_bought`
--

CREATE TABLE IF NOT EXISTS `meals_bought` (
`id` int(11) NOT NULL,
  `matric` varchar(20) NOT NULL,
  `meal` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `meals_bought`
--

INSERT INTO `meals_bought` (`id`, `matric`, `meal`, `amount`, `date`, `code`) VALUES
(6, '1102543', 8, 450, '2016-07-06 12:57:13', '0'),
(7, '1102543', 7, 500, '2016-07-06 12:57:05', '8826'),
(8, '1102543', 6, 1200, '2016-07-06 12:56:58', '2603'),
(9, '1102543', 5, 1500, '2016-07-06 12:56:52', '7816'),
(10, '1102543', 7, 500, '2016-07-06 12:56:41', '8225'),
(11, '1102543', 8, 450, '2016-07-06 12:57:19', '8225'),
(12, '1006700', 1, 800, '2016-07-06 12:57:58', '8225'),
(13, '1145600', 8, 450, '2016-07-06 12:58:24', '27718'),
(14, '1006700', 1, 800, '2016-07-06 12:57:38', '20481'),
(17, '1006700', 3, 900, '2016-07-06 12:57:50', '17077'),
(18, '1145600', 4, 1000, '2016-07-06 12:58:21', '17077'),
(19, '1102543', 1, 800, '2016-07-06 12:56:27', '27142');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `matric` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `section` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `matric`, `email`, `password`, `section`) VALUES
(1, 'Akinbode', 'Weezykon', '1102543', 'weezykon@gmail.com', 'b714337aa8007c433329ef43c7b8252c', 'Admin'),
(2, 'Adewale', 'Moyo', '1006700', 'moyo@gmail.com', 'b714337aa8007c433329ef43c7b8252c', ''),
(6, 'Billy', 'John', '1145600', 'billyjohn@mail.com', 'b714337aa8007c433329ef43c7b8252c', '');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
`id` int(11) NOT NULL,
  `matric` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `matric`, `amount`) VALUES
(1, '1102543', 4400),
(2, '1006700', 400),
(6, '1145600', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals_bought`
--
ALTER TABLE `meals_bought`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `meals_bought`
--
ALTER TABLE `meals_bought`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
