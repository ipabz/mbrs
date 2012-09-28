/*
MySQL Data Transfer
Source Host: localhost
Source Database: motorbike_rental
Target Host: localhost
Target Database: motorbike_rental
Date: 9/23/2012 5:30:04 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
CREATE TABLE `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
CREATE TABLE `customer` (
  `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `current_address` text NOT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(50) NOT NULL,
  `date_registered` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for model
-- ----------------------------
CREATE TABLE `model` (
  `model_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for motorbike
-- ----------------------------
CREATE TABLE `motorbike` (
  `motorbike_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) NOT NULL,
  `description` text,
  `price` double(10,2) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`motorbike_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for reservation
-- ----------------------------
CREATE TABLE `reservation` (
  `reservation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `motorbike_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price_per_day` double(10,2) NOT NULL,
  `date_reserved` datetime NOT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for store_information
-- ----------------------------
CREATE TABLE `store_information` (
  `store_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) NOT NULL,
  `address` text,
  `about_us` text,
  `contact_us` text,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
