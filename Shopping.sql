-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2015 at 02:14 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `african`
--

CREATE TABLE IF NOT EXISTS `african` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `category` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `restaurant` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `african`
--

INSERT INTO `african` (`serial`, `name`, `description`, `price`, `image`, `category`, `restaurant`) VALUES
(1, 'Beef Stew', 'Steak cubes cooked with carrots, Onions, Garlic, Green Peeper and Demi glace', 250, 'photos/food9.png', 'African', 'Cafe Deli'),
(2, 'Githeri', 'fried with peanuts', 120, 'photos/food9.png', 'African', 'Cafe Deli'),
(7, 'Hum Sandwhich', 'hum sandwitch w/ mionaze, tomatoes and lettuce', 250, 'photos/food9.png', 'Snacks', 'Java'),
(8, 'Nduma', 'nduma served with tea', 500, 'photos/toyota-sales-149.jpg', 'Breakfast', 'Java'),
(9, 'Spaghetti', 'served with minced meat', 200, 'photos/toyota-sales-149.jpg', 'African', 'Cafe Deli'),
(10, 'Pilau', 'served with arusto', 700, 'photos/toyota-sales-149.jpg', 'African', 'Cafe Deli'),
(11, 'Milk Shake', 'Chocolate swirl', 500, 'photos/food9.png', 'Beverages', 'Chicken Inn'),
(12, 'Hawaian Pizza', 'cheese and pineapple pizza ', 800, 'photos/food9.png', 'Pizza', 'Pizza Inn');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `mpesaid` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`serial`, `name`, `mpesaid`, `address`, `phone`) VALUES
(5, 'Friendzone', 'Mj00jklmn', 'greensapn hse 234', '0724239397'),
(6, 'Tester', 'Gk0023WkL', 'kijiji 24', '0798789987'),
(7, 'yeye', '', 'ghj 90', '0980789876'),
(8, 'yeye', '', 'ghj 90', '0980789876'),
(9, 'yeye', '', 'ghj 90', '0980789876'),
(10, 'Kim', 'KMl00hjkl', '4523', '0123456789'),
(11, 'John', 'GJ00Wklcm', 'harambee house rm 126', '0708908890'),
(12, 'John', 'GJ00Wklcm', 'harambee house rm 126', '0708908890');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `date`, `customerid`) VALUES
(1, '2015-01-28', 11),
(2, '2015-01-28', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(1, 1, 1, 550),
(1, 2, 1, 800),
(2, 1, 1, 550),
(2, 2, 1, 800),
(3, 1, 1, 550),
(3, 2, 1, 800),
(4, 3, 1, 700),
(5, 3, 1, 700),
(5, 1, 1, 550),
(6, 2, 1, 800),
(7, 2, 1, 80),
(8, 2, 1, 80),
(1, 2, 1, 80),
(2, 2, 1, 800),
(2, 3, 1, 700),
(1, 1, 1, 250),
(2, 1, 1, 250);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`serial`, `name`, `description`, `price`, `picture`) VALUES
(1, 'View Sonic LCD', '19" View Sonic Black LCD, with 10 months warranty', 250, 'images/lcd.jpg'),
(2, 'IBM CDROM Drive', 'IBM CDROM Drive', 80, 'images/cdrom-drive.jpg'),
(3, 'Laptop Charger', 'Dell Laptop Charger with 6 months warranty', 50, 'images/charger.jpg'),
(4, 'Seagate Hard Drive', '80 GB Seagate Hard Drive in 10 months warranty', 40, 'images/hard-drive.jpg'),
(5, 'Atech Mouse', 'Black colored laser mouse. No warranty', 5, 'images/mouse.jpg'),
(6, 'Nokia 5800', 'Nokia 5800 XpressMusic is a mobile device with 3.2" widescreen display brings photos, video clips and web content to life', 299, 'images/mobile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(15) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `position` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`serial`) REFERENCES `african` (`Serial`);
