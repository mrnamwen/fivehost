-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2014 at 06:18 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `5host`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `uploads` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `uploads`) VALUES
(1, 'Movies', 0),
(2, 'Music', 0),
(3, 'TV Shows', 0),
(4, 'Software', 0),
(5, 'NSFW', 0),
(6, 'Piracy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  `description` text NOT NULL,
  `filename` text NOT NULL,
  `vote` int(3) NOT NULL,
  `approved` int(1) NOT NULL,
  `category` int(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `description`, `filename`, `vote`, `approved`, `category`) VALUES
(1, 'Name', 'Description', 'filename.filename', 999, 1, 1),
(2, 'dgbyigyijh', 'dfjk;hjk', 'gdffgifg', 0, 0, 4),
(3, 'We should Have Cookies', 'Description', 'cookies.exe', 2, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
