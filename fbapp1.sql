-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 08:03 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fbapp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logID` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text NOT NULL,
  `pID_result` int(11) NOT NULL,
  `p_username` varchar(255) NOT NULL,
  `p_dp` varchar(100) NOT NULL,
  PRIMARY KEY (`logID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `slug`, `pID_result`, `p_username`, `p_dp`) VALUES
(1, '1466099090', 1, 'Novi', '1091116207574795'),
(2, '1466099763', 1, 'Novi', '1091116207574795');

-- --------------------------------------------------------

--
-- Table structure for table `personality_test`
--

CREATE TABLE IF NOT EXISTS `personality_test` (
  `pt_ID` int(11) NOT NULL AUTO_INCREMENT,
  `pt_DESC` text NOT NULL,
  PRIMARY KEY (`pt_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `personality_test`
--

INSERT INTO `personality_test` (`pt_ID`, `pt_DESC`) VALUES
(1, 'You have a great personal solving problems <name> but you have also to be careful sometimes when dealing with problems'),
(2, 'One of your best asset is how you deal with different kinds of people <name> , So keep it up and be friendly and kind!'),
(3, '<name> you are an independent and self-motivated professional.able to grow positive relationships with different kinds of people.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
