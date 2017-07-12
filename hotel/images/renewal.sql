-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2015 at 07:08 PM
-- Server version: 5.5.12
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `renewal`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branch_code` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) NOT NULL,
  `branch_manager` varchar(100) NOT NULL,
  `branch_manager_email` varchar(150) NOT NULL,
  PRIMARY KEY (`branch_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_code`, `branch_name`, `branch_manager`, `branch_manager_email`) VALUES
(1, 'Main', 'CATHERINE KISAMWA', ''),
(2, 'Mombasa', 'CYRUS KAGAI', ''),
(3, 'Kenyatta Avenue', 'CATHERINE KISAMWA', ''),
(4, 'Nakuru', 'MAXWELL GWEYI', ''),
(5, 'Nyeri', 'SIMON MWANGI', ''),
(6, 'Buruburu', 'LUCY NJANJA', ''),
(7, 'Embu', 'PAUL OWII AMOLO', ''),
(8, 'Eldoret', 'KIPNGETICH', ''),
(9, 'Kisumu', '', ''),
(10, 'Kericho', '', ''),
(11, 'Mlolongo', 'JULIET NYAMBISA', ''),
(12, 'Thika', 'SAMUEL MUHIA', ''),
(13, 'Kerugoya', '', ''),
(14, 'Kenyatta Market', '', ''),
(15, 'Kisii', '', ''),
(16, 'Chuka', 'GEORGE NDETI', ''),
(17, 'Kitui', '', ''),
(18, 'Machakos', '', ''),
(19, 'Nanyuki', 'MERCY GATUHU', ''),
(20, 'Kangemi', 'KIM NDIRANGU', ''),
(21, 'Emali', 'DAVID MAKANGA', ''),
(22, 'Naivasha', '', ''),
(23, 'Nyahururu', 'PAUL WAMBUA', ''),
(24, 'Isiolo', 'WILLIAM NTOINA', ''),
(25, 'Meru', 'PATRICK ONZERE', ''),
(26, 'Kitale', '', ''),
(27, 'Kibwezi', '', ''),
(28, 'Bungoma', 'JARED LIPUKU', ''),
(29, 'Kajiado', 'NJOROGE', ''),
(30, 'Nkubu', 'EMMA NJERU', ''),
(31, 'Mtwapa', 'TEDIUM KILELU', ''),
(32, 'Busia', 'LITIEMA PETER', ''),
(33, 'Moi Avenue', 'DORCAS J. KIPKECH', ''),
(34, 'Mwea', 'BENARD NJERU', ''),
(35, 'Kengeleni', 'CATHERINE KISAMWA', ''),
(36, 'Rongai', 'PETER GEITA', ''),
(37, 'Kilimani', 'ADMIN', ''),
(38, 'Naivasha', 'ERIC NGIE', '');

-- --------------------------------------------------------

--
-- Table structure for table `insuarance`
--

CREATE TABLE IF NOT EXISTS `insuarance` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `CID` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `b_code` int(11) NOT NULL,
  `insuarance_company` varchar(100) NOT NULL,
  `policy_no` varchar(50) NOT NULL,
  `policy_type` varchar(50) NOT NULL,
  `expiry_date` date NOT NULL,
  `remarks` text,
  `loan_balance` varchar(11) DEFAULT NULL,
  `premium_amount` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `insuarance`
--

INSERT INTO `insuarance` (`i_id`, `CID`, `customer_name`, `b_code`, `insuarance_company`, `policy_no`, `policy_type`, `expiry_date`, `remarks`, `loan_balance`, `premium_amount`) VALUES
(1, 1045233, 'Peter Irumbi Njiri', 27, 'CIC', '010/040/1/022771/2014/01', 'Fire & Perils', '2015-01-16', '', '467173', ''),
(2, 1032589, 'Agatha Kaugi Riungu', 33, 'AMACO', 'AM7/030/1/036985/2014/10', 'Fire domestic', '2015-11-06', '', '', ''),
(3, 1075341, 'Mombasa Business Unity Club (CBO)', 2, 'AMACO', 'AM1/040/', 'Fire domestic', '2015-11-06', '', '', ''),
(4, 12345, 'test', 1, 'test', 'test', 'test', '2015-07-10', 'test', '', ''),
(5, 5326751, 'test1', 18, 'test1', 'test1', 'test1', '2015-06-30', '', '', ''),
(6, 1239, 'test2', 1, 'test2', 'gsahdds', 'asdsa', '2015-07-02', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
