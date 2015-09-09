-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2015 at 02:35 PM
-- Server version: 5.5.44
-- PHP Version: 5.4.44-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpcorser`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons2`
--

CREATE TABLE IF NOT EXISTS `persons2` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(60) NOT NULL,
  `per_email` varchar(60) NOT NULL,
  `per_password` varchar(60) NOT NULL,
  `per_phone` varchar(60) NOT NULL,
  `per_institution` varchar(60) NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `persons2`
--

INSERT INTO `persons2` (`per_id`, `per_name`, `per_email`, `per_password`, `per_phone`, `per_institution`) VALUES
(1, 'George Corser', 'gpcorser@svsu.edu', 'remember', '2756', 'SVSU'),
(6, 'Mike Roof', 'mdroof@svsu.edu', '', '', 'SVSU'),
(7, 'Charles Liggett', 'cliggett@svsu.edu', '', '', 'SVSU'),
(8, 'Waqas Qureshi', 'wzquresh@svsu.edu', 'password', '', 'SVSU'),
(9, 'Alejandro Arenas', 'adarenas@svsu.edu', '', '', 'SVSU'),
(10, 'Nathan Whitfield', 'ntwhitfi@svsu.edu', '', '', 'SVSU'),
(11, 'Joe Nicklyn', 'jfnickly@svsu.edu', '', '', 'SVSU'),
(12, 'Matt Mosner', 'mtmossne@svsu.edu', '', '', 'SVSU'),
(13, 'Elijah Wilson', '', '', '', ''),
(14, 'Dustyn Tubbs', '', '', '', ''),
(15, 'Chad Schroeder', '', '', '', ''),
(16, 'Aaron Hooper', 'ahooper@svsu.edu', 'password', '', 'SVSU'),
(17, 'username', 'email', 'password', 'phone', 'institution'),
(19, 'Kris Killer', 'cutup@bodyparts.com', '', 'none of your business', 'mom''s basement'),
(20, 'Graham Bewley', '', '', '', ''),
(21, 'Andrew York', 'amyork@svsu.edu', '', '', 'SVSU'),
(22, 'Brad Chippi', 'bachippi@svsu.edu', 'password', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
