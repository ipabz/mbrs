-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2012 at 07:28 AM
-- Server version: 5.5.28
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `motorbike_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `username`, `password`, `date_created`) VALUES
(1, 'Ivan Clints', 'Pabelona', 'ivanpabz', '6ef7c4c1946020fe892f9a105408da1f3c1932f2', '2012-09-28 10:00:00'),
(2, 'sdflk', 'sldkfj', 'sdk', '5a374dcd2e5eb762b527af3a5bab6072a4d24493', '2012-09-29 08:33:54'),
(3, 'dkdk', 'dkdk', 'dkdk', 'a29960368c1cbfd1234ecae9108cb57c7e1e4660', '2012-09-29 08:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `current_address` text NOT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(50) NOT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `current_address`, `email_address`, `contact_number`, `date_registered`) VALUES
(1, 'Ivan Clint', 'Pabelona', '<p>Tampi, San Jose, Negros Oriental</p>', 'ipabelona@gmail.com', '09064774882', '2012-09-06 00:00:00'),
(2, 'sdlfkj', 'lksjdflkj', '<p>slkfjsdlkj</p>', 'isdlkj@gm.com', '1209218', '2012-09-30 06:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` double(10,2) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `name`, `description`, `price`, `photo`) VALUES
(1, 'Honda Wave 100', NULL, 350.00, '1ea5d-motor-1.jpg'),
(2, 'Honda Wave 125', NULL, 500.00, 'dafe6-littlestorefront.png');

-- --------------------------------------------------------

--
-- Table structure for table `motorbike`
--

CREATE TABLE IF NOT EXISTS `motorbike` (
  `motorbike_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL,
  `description` text,
  `price` double(10,2) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `status` enum('available','unavailable') NOT NULL DEFAULT 'available',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`motorbike_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `motorbike`
--

INSERT INTO `motorbike` (`motorbike_id`, `model_id`, `description`, `price`, `plate_number`, `status`, `date_added`) VALUES
(1, 1, 'sample description of this Honda Wave 100 motorbike', 350.00, '1732 MC', 'available', '2012-09-29 00:00:00'),
(3, 2, '<p>salk s lskdj </p>', 600.00, '1230 MC', 'available', '0000-00-00 00:00:00'),
(4, 1, '<p>sdfadsf</p>', 350.00, '3333 YC', 'available', '2012-09-29 06:36:13'),
(5, 1, '<p>sasdf</p>', 350.00, '2939 MC', 'available', '2012-09-29 06:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `reservation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `motorbike_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price_per_day` double(10,2) DEFAULT NULL,
  `status` enum('current','returned','cancelled') NOT NULL DEFAULT 'current',
  `date_rented` datetime NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`reservation_id`, `customer_id`, `motorbike_id`, `start_date`, `end_date`, `price_per_day`, `status`, `date_rented`) VALUES
(1, 1, 1, '2012-09-30 00:00:00', '2012-10-01 00:00:00', 600.00, 'cancelled', '2012-09-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `motorbike_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price_per_day` double(10,2) DEFAULT NULL,
  `date_reserved` datetime NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store_information`
--

CREATE TABLE IF NOT EXISTS `store_information` (
  `store_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `address` text,
  `about_us` text,
  `contact_us` text,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
