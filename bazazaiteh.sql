-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2020 at 05:50 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bazazaiteh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bibl`
--

CREATE TABLE IF NOT EXISTS `bibl` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bibl`
--

INSERT INTO `bibl` (`id`, `name`) VALUES
(1, 'Biblioteka Svetozar Markovi?'),
(2, 'Narodna biblioteka'),
(3, 'Biblioteka grada Beograda');

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

CREATE TABLE IF NOT EXISTS `knjiga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `rmId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rmId` (`rmId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`id`, `name`, `rmId`) VALUES
(1, 'knjiga1', 1),
(2, 'Knjiga2\r\n', 2),
(3, 'Knjiga3', 3),
(4, 'Knjiga4', 1),
(5, 'Knjiga5\r\n', 1),
(6, 'Knjiga6', 2),
(7, 'Knjiga7', 2),
(8, 'Knjiga8', 3),
(9, 'Knjiga9', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjiga`
--
ALTER TABLE `knjiga`
  ADD CONSTRAINT `bibl_fk` FOREIGN KEY (`rmId`) REFERENCES `bibl` (`id`) ON UPDATE CASCADE;
