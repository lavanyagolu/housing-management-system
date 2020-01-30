-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 30, 2019 at 04:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(64) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  UNIQUE KEY `user_id` (`emp_id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `employee_name`, `email_id`, `password`, `admin`, `agent`, `status`) VALUES
(1, 'admin', 'admin@realestate.com', 'admin', 'yes', 'no', 'yes'),
(2, 'buyeragent', 'anusha@realestate.com', 'anusha', 'no', 'yes', 'yes'),
(3, 'selleragent', 'kathryn@realestate.com', 'kathryn', 'no', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `house_table`
--

DROP TABLE IF EXISTS `house_table`;
CREATE TABLE IF NOT EXISTS `house_table` (
  `house_id` int(11) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `house_description` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sqft` int(11) NOT NULL,
  `date_posted` date NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `propety_image` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `from_viewed` int(11) NOT NULL DEFAULT '0',
  `to_viewed` int(11) NOT NULL DEFAULT '0',
  `from_deleted` int(11) NOT NULL DEFAULT '0',
  `to_deleted` int(11) NOT NULL DEFAULT '0',
  `from_vdate` datetime DEFAULT NULL,
  `to_vdate` datetime DEFAULT NULL,
  `from_ddate` datetime DEFAULT NULL,
  `to_ddate` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `title`, `message`, `from`, `to`, `from_viewed`, `to_viewed`, `from_deleted`, `to_deleted`, `from_vdate`, `to_vdate`, `from_ddate`, `to_ddate`, `created`) VALUES
(1, 'test', 'test', 1, 2, 1, 2, 2, 1, '2019-09-29 00:00:00', '2019-09-29 00:00:00', '2019-09-29 00:00:00', '2019-09-29 00:00:00', '2019-09-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ph_no` int(11) NOT NULL,
  `address` text NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `ph_no`, `address`, `user_name`, `password`, `user_type`) VALUES
(2, 'seller1F', 'seller1L', 'seller1email', 1, 'seller1add', 'seller1', '95caed8e60e15871a6d12fe5505db2db', 'Seller'),
(0, 'SF', 'SL', 'sa', 1111, 'sa', 'suser', '202cb962ac59075b964b07152d234b70', 'Seller'),
(0, 'bf', 'bl', 'bemail', 555, 'ba', 'buser', '202cb962ac59075b964b07152d234b70', 'Buyer'),
(0, 'test', 'test', 'test@gmail.com', 1234567, 'abcd efgh', 'test', '098f6bcd4621d373cade4e832627b4f6', 'Buyer'),
(1, 'buyer1f', 'buyer1l', 'buyer1email', 1, 'buyer1add', 'buyer1', '5cbd9d629096842872fdc665d2d03ba3', 'Buyer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
