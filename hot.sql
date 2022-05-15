-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: database:3306
-- Generation Time: Jan 05, 2022 at 08:34 PM
-- Server version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hot`
--
CREATE DATABASE IF NOT EXISTS `hot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hot`;

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE IF NOT EXISTS `credentials` (
`rcdNbr` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userNbr` varchar(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `url` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`rcdNbr`, `timestamp`, `userNbr`, `userName`, `password`, `url`) VALUES
(1, '2021-10-08 12:49:40', '92973214', 'admin', 'password', 'https://handsontechorg.weebly.com/facilitators352.html');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `adminEmail` varchar(50) NOT NULL,
  `groupName` varchar(20) NOT NULL,
  `groupEmail` varchar(50) NOT NULL,
  `masterKey` varchar(10) NOT NULL,
  `moderatedBy` varchar(30) NOT NULL,
  `rcdNbr` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`adminEmail`, `groupName`, `groupEmail`, `masterKey`, `moderatedBy`, `rcdNbr`) VALUES
('yangmin.shen@gmail.com', 'vhotsmcomp', 'vhotsmcomp@googlegroups.com', 'YangKey', 'Yang Shen', 1),
('duhbear@gmail.com', 'vhot3dprint', 'vhot3dprint@googlegroups.com', 'JoeKey', 'Joe Kennedy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailAddress` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `firstName` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `lastName` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `yourVillage` varchar(37) CHARACTER SET utf8 DEFAULT NULL,
  `whereDidYouHearAboutHandsonTech` varchar(59) CHARACTER SET utf8 DEFAULT NULL,
  `iWouldLikeToJoin` varchar(28) CHARACTER SET utf8 DEFAULT NULL,
  `githubID` varchar(30) DEFAULT NULL,
  `groupsJoined` varchar(60) DEFAULT NULL,
  `printersOwned` varchar(60) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `phonePrimary` varchar(14) DEFAULT NULL,
  `ecPhone` varchar(14) DEFAULT NULL COMMENT 'Emergency Contact',
  `ecName` varchar(30) DEFAULT NULL,
  `streetAddr` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`timestamp`, `changestamp`, `emailAddress`, `firstName`, `lastName`, `yourVillage`, `whereDidYouHearAboutHandsonTech`, `iWouldLikeToJoin`, `githubID`, `groupsJoined`, `printersOwned`, `status`, `password`, `phonePrimary`, `ecPhone`, `ecName`, `streetAddr`) VALUES
('2021-07-25 12:38:56', '2022-01-05 20:33:26', 'gmtemp1@gmail.com', 'George', 'Meidhof', 'Liberty Park', NULL, NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-04 00:00:00', '2022-01-05 20:33:26', 'petedziekan@gmail.com', 'Pete', 'Dziekan', 'Sanibel', 'Word of mouth', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-04 00:00:00', '2022-01-05 20:33:26', 'edjott5659@gmail.com', 'Edward', 'Ott', 'Sabal Chase', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', 'Creality CR10, Flux Beamo, Snapmaker, ', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-04 00:00:00', '2022-01-05 20:33:26', 'rpaluszak@msn.com', 'Robert', 'Paluszak', 'Mallory Square', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'domenic.gualtieri@gmail.com', 'Dom', 'Gualtieri', 'El Cortez', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'wchunt2014@gmail.com', 'Willard ', 'Hunt ', 'Pinellas ', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'professorjayson@msn.com', 'Gail', 'Jayson', 'osceola hills', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'sgianelos@outlook.com', 'Steve', 'Gianelos ', 'LaBelle North', 'Connected villager club meeting', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'plesetz@gmail.com', 'Jim', 'Plesetz', 'Charlotte', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'vectorgrp@aol.com', 'Peter', 'Gloede', 'Lake Deaton', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'donmeisinge@comcast.net', 'donald', 'meisinger', 'sable chase', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'luis.v.perea@gmail.com', 'Luis', 'Perea', 'Fernandina', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'rlhathome@aol.com', 'Ron', 'Huber', 'Hadley', 'TOTV', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-05 00:00:00', '2022-01-05 20:33:26', 'daly1302@comcast.net', 'Edward', 'Daly', 'Santiago', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'mcgeehd@gmail.com', 'Dean', 'McGee', 'Collier', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'doncrosby@aol.com', 'Don', 'Crosby', 'Santo Domingo', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'jjjdl@hotmail.com', 'David', 'Little', 'Osceola Hills @ Soaring Eagle', ' attending the computer club', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'ltcbraz@gmail.com', 'Ken', 'Braswell', 'Santiago', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'lnettuno@yahoo.com', 'Louis', 'Nettuno', 'Lake Deaton', 'from the e-flyers meeting', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'mark.magnuson.mm@gmail.com', 'Mark', 'Magnuson', 'Fernandina', 'VCC', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'charlie@vanderford.net', 'Charles', 'Vanderford', 'Poinciana', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'mtfeldman@gmail.com', 'Mark', 'Feldman', 'Winifred', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'baxrose@yahoo.com', 'Allen', 'Farrell', 'Osceola Hills', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'pete.trecartin@gmail.com', 'Peter', 'Trecartin', 'Gilchrist', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'yangmin.shen@gmail.com', 'Yang', 'Shen', 'Collier', 'Word of mouth', NULL, 'yang3535', 'vhotsmcomp vhot3dprint', 'Prusa I3 MK3, ', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'handydan1234@aol.com', 'Bruce ', 'Faulkner ', 'Santiago', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'ted@wrightsfl.com', 'Ted', 'Wright', 'Winifred', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-07 00:00:00', '2022-01-05 20:33:26', 'jkcrn17@gmail.com', 'Jane', 'Kelly', 'Bonnybrook', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-07 00:00:00', '2022-01-05 20:33:26', 'dmlgw2@thevillages.net', 'Lloyd', 'Williams', 'Belvdere', 'Recreation Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-07 00:00:00', '2022-01-05 20:33:26', 'jzecher@yahoo.com', 'Jack', 'Zecher', 'Caroline', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-08 00:00:00', '2022-01-05 20:33:26', 'linda48hunt@gmail.com', 'Linda', 'Hunt', 'Pinellas', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-09 00:00:00', '2022-01-05 20:33:26', 'frankneta@comcast.net', 'Frank', 'Sylva', 'Poinciana', '3 D Printer Club', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-09 00:00:00', '2022-01-05 20:33:26', 'pjrdbs@msn.com', 'Peter', 'Rosendahl', 'Hillsborough', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-09 00:00:00', '2022-01-05 20:33:26', 'tmfriedl41@comcast.net', 'Matt', 'Friedland', 'Charlotte ', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-12 00:00:00', '2022-01-05 20:33:26', 'duhbear@gmail.com', 'Joe', 'Kennedy', 'Santiago', 'Founder', NULL, '', 'vhotsmcomp vhot3dprint', 'Prusa I3 MK3, Prusa Mini, Prusa SL, Snapmaker, ', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-12 00:00:00', '2022-01-05 20:33:26', 'dhuff309@gmail.com', 'Dennis', 'Huff', 'Lake Deaton', 'Connected Villager', NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-12 00:00:00', '2022-01-05 20:33:26', 'lakedeatonrick@gmail.com', 'Rick', 'Rademacher', 'Lake Deaton', 'Pilots Club meeting', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-13 00:00:00', '2022-01-05 20:33:26', 'tleja@cfl.rr.com', 'Thomas', 'Leja', 'Charlotte', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-13 00:00:00', '2022-01-05 20:33:26', 'mikehausner@aol.com', 'Mike', 'Hausner', 'Liberty park', 'E-Flyers meeting', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-15 00:00:00', '2022-01-05 20:33:26', 'huey158@gmail.com', 'Stan', 'Carpenter', 'Buttonwood', 'Villages Aviation Club', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-16 00:00:00', '2022-01-05 20:33:26', 'michaelpalazzola@hotmail.com', 'Michael', 'Palazzola', 'Charlote', 'Connected villager', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-17 00:00:00', '2022-01-05 20:33:26', 'ameehan@centurylink.net', 'Anne', 'Meehan', 'Poinciana', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-18 00:00:00', '2022-01-05 20:33:26', 'boblavarnway@yahoo.com', 'Robert', 'LaVarnway', 'Rio Grande', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-19 00:00:00', '2022-01-05 20:33:26', 'florilake@gmail.com', 'Bruce', 'Brixey', 'Caroline', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-19 00:00:00', '2022-01-05 20:33:26', 'bgalamb@gmail.com', 'Bernice', 'Lamb', 'Lake Deaton', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-19 00:00:00', '2022-01-05 20:33:26', 'stormy2nd@gmail.com', 'Stormy', 'Armagost', 'Mulberry Grove', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-20 00:00:00', '2022-01-05 20:33:26', 'paul.calabrese72@gmail.com', 'Paul', 'Calabrese', 'Morning View Villas', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-20 00:00:00', '2022-01-05 20:33:26', 'bussiere1@comcast.net', 'Bernie', 'Bussiere', 'Tamarind Grove', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-20 00:00:00', '2022-01-05 20:33:26', 'mkopelberg@comcast.net', 'Mark', 'Kopelberg', 'Sanibel', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-20 00:00:00', '2022-01-05 20:33:26', 'dstoltz648@gmail.com', 'David', 'Stoltz', 'Dunedin', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-21 00:00:00', '2022-01-05 20:33:26', 'jminelliokw@me.com', 'John', 'Minelli', 'Osceola Hills at Soaring Eagle', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-21 00:00:00', '2022-01-05 20:33:26', 'jameswtom@gmail.com', 'Tom', 'James', 'Bonita', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-22 00:00:00', '2022-01-05 20:33:26', 'igg@number-one.org', 'David', 'Rigg', 'Briar Meadow', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-24 00:00:00', '2022-01-05 20:33:26', 'greggcies@live.com', 'Gregg', 'Cieslak', 'Hemingway', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-24 00:00:00', '2022-01-05 20:33:26', 'pjcurran21@gmail.com', 'Patrick', 'Curran', 'Belle Aire (Cottages at Summerchase)', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-25 00:00:00', '2022-01-05 20:33:26', 'janalynpeppel@gmail.com', 'Janalyn', 'Peppel', 'Gainesville', 'Word of mouth', NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-26 00:00:00', '2022-01-05 20:33:26', 'johnhr@centurylink.net', 'John', 'Richards', 'Harmeswood', 'Joe Kennedy', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-26 00:00:00', '2022-01-05 20:33:26', 'newlandten@gmail.com', 'Thomas', 'Newland', 'Santo Domingo', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-27 00:00:00', '2022-01-05 20:33:26', 'peterbcope@gmail.com', 'Peter', 'Cope', 'Dunedin', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-27 00:00:00', '2022-01-05 20:33:26', 'david.may.mobile@gmail.com', 'David', 'May', 'Fenney', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-10-30 00:00:00', '2022-01-05 20:33:26', 'evcoe1@gmail.com', 'Ron', 'Everist', 'Hadley', 'Villages Connected Computer Club', NULL, '', 'vhotsmcomp vhot3dprint', 'Creality CR-20 Pro, Makerbot Replicator 2x, ', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-31 00:00:00', '2022-01-05 20:33:26', 'don@disneygoldwing.com', 'Don', 'Wiley', 'Hillsbrough', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-02 00:00:00', '2022-01-05 20:33:26', 'djmorgan1451@gmail.com', 'Douglas', 'Morgan', 'Pine Ridge', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-02 00:00:00', '2022-01-05 20:33:26', 'jklawitter@frontier.com', 'John', 'Klawitter', 'Lake Deaton', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-05 00:00:00', '2022-01-05 20:33:26', 'terrbeer@gmail.com', 'Terry', 'Blatchley', 'Santiago', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-08 00:00:00', '2022-01-05 20:33:26', 'jebest@juno.com', 'Joel', 'Best', 'Bonnybrook', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-11 00:00:00', '2022-01-05 20:33:26', 'juliendrouin@comcast.net', 'Julien', 'Drouin', 'Oceola hill', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-13 00:00:00', '2022-01-05 20:33:26', 'ted72@embarqmail.com', 'Ted', 'Ebert', 'Virgina trace', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-15 00:00:00', '2022-01-05 20:33:26', 'mikemulanax@yahoo.com', 'Mike', 'Mulanax', 'Hillsborough', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-16 00:00:00', '2022-01-05 20:33:26', 'soniamdemorais@gmail.com', 'Sonia', 'De Morais', 'Saint James', 'Women Doctors Club', NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-16 00:00:00', '2022-01-05 20:33:26', 'rdgrant@comcast.net', 'Bob', 'Grant', 'Sanibel', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-16 00:00:00', '2022-01-05 20:33:26', 'ctholli9@gmail.com', 'Curtis', 'Holliday', 'Orange Blossom', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-16 00:00:00', '2022-01-05 20:33:26', 'stephenramartin@gmail.com', 'Stephen', 'Martin', 'Pinellas', 'Word of mouth', NULL, '', 'vhotsmcomp vhot3dprint', 'Prusa I3 MK3, ', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-27 00:00:00', '2022-01-05 20:33:26', 'stanleywr@comcast.net', 'William', 'Stanley', 'Calumet', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-11-30 00:00:00', '2022-01-05 20:33:26', 'w4crv@yahoo.com', 'Chuck', 'Varwig', 'DaLaVista North', NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-30 00:00:00', '2022-01-05 20:33:26', 'tonypf11@gmail.com', 'Tony', 'Pflum', 'Sanibel', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-12-01 00:00:00', '2022-01-05 20:33:26', 'mikeroth@rothconsulting.net', 'Mike', 'Roth', 'Osceola Hills', 'Newspaper', NULL, '', 'vhotsmcomp', 'Creality Ender-3, ', 'A', '', NULL, NULL, NULL, NULL),
('2017-12-01 00:00:00', '2022-01-05 20:33:26', 'info@butx.com', 'efraim', 'halfon', 'hemingway', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-12-03 00:00:00', '2022-01-05 20:33:26', 'cafranson@gmail.com', 'Cheryl', 'Franson', 'Sunset Pointe', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-12-05 00:00:00', '2022-01-05 20:33:26', 'mattnypaver@gmail.com', 'Matt', 'Nypaver', 'Liberty Park', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-12-07 00:00:00', '2022-01-05 20:33:26', 'floridavillages@gmail.com', 'Lorne', 'Eliosoff', 'Country Club', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-12-14 00:00:00', '2022-01-05 20:33:26', 'josephtsmith@gmail.com', 'Joseph', 'Smith', 'Harmeswood', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-12-18 00:00:00', '2022-01-05 20:33:26', 'bonner.russ@gmail.com', 'Russ', 'Bonner', 'Hillsborough', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-12-21 00:00:00', '2022-01-05 20:33:26', 'meidhof@gmail.com', 'George', 'Meidhof', 'Liberty Park', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2017-12-28 00:00:00', '2022-01-05 20:33:26', 'kendee335@gmail.com', 'Kenneth', 'Melvin', 'osceola Hills', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-01-01 00:00:00', '2022-01-05 20:33:26', 'blewett.don@gmail.com', 'Don', 'Blewett', 'Rio Grande', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-01-02 00:00:00', '2022-01-05 20:33:26', 'dfpawlak@msn.com', 'Donald', 'Pawlak', 'El Cortez', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-01-02 00:00:00', '2022-01-05 20:33:26', 'ntopolnicki@cfl.rr.com', 'Neil', 'Topolnicki', 'Sumter Grand', 'The Villages Magazine', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-01-04 00:00:00', '2022-01-05 20:33:26', 'rdeacon1960@gmail.com', 'ronald', 'DEACON', 'labelle', 'Newspaper', NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-01-04 00:00:00', '2022-01-05 20:33:26', 'gt5racer_99@yahoo.com', 'David', 'Vestrand', 'Largo', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-01-06 00:00:00', '2022-01-05 20:33:26', 'drdougrobotman@gmail.com', 'Doug', 'Keenan', 'Pine Ridge', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-01-11 00:00:00', '2022-01-05 20:33:26', 'skvining22@gmail.com', 'Sharon', 'Vining', 'Sharon Vining', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-01-25 00:00:00', '2022-01-05 20:33:26', 'grmckn@gmail.com', 'Gregory', 'McKnight', 'Creekside landing', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-02-11 00:00:00', '2022-01-05 20:33:26', 'quincy1@ameritech.net', 'Bill', 'McNerney', 'Lynnhaven', 'The Villages Recreation & Parks weekly paper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-02-15 00:00:00', '2022-01-05 20:33:26', 'heideuro@aol.com', 'Art', 'Wingerden', 'Fernandina', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-02-17 00:00:00', '2022-01-05 20:33:26', 'info@lagmail.com', 'Lou', 'Gyenese', 'Fernandina', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-03-01 00:00:00', '2022-01-05 20:33:26', 'hchlebz@yahoo.com', 'Henry', 'Chlebek', 'Tamarind grove', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-03-08 00:00:00', '2022-01-05 20:33:26', 'gds32571@gmail.com', 'Gerald', 'Swann', 'Deaton', 'Villages magazine', NULL, 'gds32571', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-03-22 00:00:00', '2022-01-05 20:33:26', 'mikeveach43213@yahoo.com', 'mike', 'veach', 'largo', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-03-23 00:00:00', '2022-01-05 20:33:26', 'rzagst41@gmail.com', 'Robert (Rob)', 'Zagst', 'Pine Hills', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-03-26 00:00:00', '2022-01-05 20:33:26', 'kaffeb88@gmail.com', 'Kathy', 'Bray', 'Pine Hills', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-04-23 00:00:00', '2022-01-05 20:33:26', 'bobstep1950@gmail.com', 'Bob', 'Stephenson', 'Pine Ridge', 'Villages Computer Club', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-05-18 00:00:00', '2022-01-05 20:33:26', 'realmoxies@hotmail.com', 'John', 'Hughes', 'Tamarind', 'Tv computer club meetingmeeting', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-05-22 00:00:00', '2022-01-05 20:33:26', 'pheffner@outlook.com', 'Paul', 'Heffner', 'Moving in this summer', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-05-31 00:00:00', '2022-01-05 20:33:26', 'vsam@att.net', 'Michael', 'Smiith', 'Liberity Park', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-07-20 00:00:00', '2022-01-05 20:33:26', 'bjornw8@gmail.com', 'Bjorn', 'Wolfhagen', 'Tamarind Grove', 'A friend', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-07-28 00:00:00', '2022-01-05 20:33:26', 'mikebigg2@embarqmail.com', 'michael', 'Simonds', 'winefred', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-08-16 00:00:00', '2022-01-05 20:33:26', 'steven.l.tarpley@gmail.com', 'Steve', 'Tarpley', 'Bonita', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-08-21 00:00:00', '2022-01-05 20:33:26', 'jbornhorst@hotmail.com', 'Joel', 'Bornhorst', 'Santo Domingo', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-08-25 00:00:00', '2022-01-05 20:33:26', 'chuckmail22@gmail.com', 'Chuck', 'Varwig', 'DeLaVista North', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-09-04 00:00:00', '2022-01-05 20:33:26', 'rekram3@frontier.com', 'Susan', 'Marker', 'Sanibel', 'Computer plus class', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-09-04 00:00:00', '2022-01-05 20:33:26', 'jim.armstrong30@gmail.com', 'Jim', 'Armstrong', 'Bridgeport of Lake Sumter', 'Villages iPad Club', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-09-08 00:00:00', '2022-01-05 20:33:26', 'eldred@bu.edu', 'William', 'Eldred', 'William D. Eldred', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-09-13 00:00:00', '2022-01-05 20:33:26', 'pinellasmary@gmail.com', 'Mary', 'Steelman', 'Pinellas', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-09-14 00:00:00', '2022-01-05 20:33:26', 'osborn_bill@hotmail.com', 'Bill', 'Osborn', 'Dunedin', NULL, NULL, '', 'vhotsmcomp', 'Prusa I3 MK3, ', 'A', '', NULL, NULL, NULL, NULL),
('2018-10-06 00:00:00', '2022-01-05 20:33:26', 'yulke@rushsys.com', 'David', 'Yulke', 'Hillsborough', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-10-13 00:00:00', '2022-01-05 20:33:26', 'terrycp@comcast.net', 'Terry', 'Camp', 'Buttonwood', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-11-01 00:00:00', '2022-01-05 20:33:26', 'bm9717@aol.com', 'Bob', 'Cline', 'Pine Hills', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-11-02 00:00:00', '2022-01-05 20:33:26', 'joequinn417@gmail.com', 'Joe', 'Quinn', 'Pine Hills', 'Online', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-11-04 00:00:00', '2022-01-05 20:33:26', 'seachess@gmail.com', 'Dan', 'O''Brien', 'Hacienda East', 'Rec news', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-11-05 00:00:00', '2022-01-05 20:33:26', 'lfhaines@gmail.com', 'Lynne', 'Haines', 'Springdale', 'Talk of The Villages club listing', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-12-06 00:00:00', '2022-01-05 20:33:26', 'kmnoble@bellsouth.net', 'Mike', 'Noble', 'Hillsborough', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2018-12-16 00:00:00', '2022-01-05 20:33:26', 'marko.palmer@gmail.com', 'Mark', 'Palmer', 'Amelia', 'Computer plus club', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-01-03 00:00:00', '2022-01-05 20:33:26', 'wineman13@gmail.com', 'Tony', 'Gallo', 'Terra del soul', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-01-31 00:00:00', '2022-01-05 20:33:26', 'hwduke@gmail.com', 'Wayne', 'Duke', 'Orange Blossom', 'Member of 3d Print and small computer group', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-02-06 00:00:00', '2022-01-05 20:33:26', 'k9nd@comcast.net', 'Rick', 'Beil', 'Guest - Poincinna', 'Guest of Don & Patti Carlson', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-02-07 00:00:00', '2022-01-05 20:33:26', 'brooks@rimesrv.net', 'Brooks', 'Rimes', 'Amelia', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-02-21 00:00:00', '2022-01-05 20:33:26', 'rfh@hallshome.org', 'Ron', 'Hall', 'St. James', 'Word of mouth', NULL, '', 'vhotsmcomp', 'Creality Ender-5, ', 'A', '', NULL, NULL, NULL, NULL),
('2019-02-28 00:00:00', '2022-01-05 20:33:26', 'dsvacc@gmail.com', 'Donna', 'Vaccaro', 'Orange Blossom', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-02-28 00:00:00', '2022-01-05 20:33:26', 'sssd90@earthlink.net', 'David', 'Vanderwall', 'Lynnhaven', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-03-02 00:00:00', '2022-01-05 20:33:26', 'wxbuoy@aol.com', 'David', 'Bear', 'Deaton', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2021-10-28 00:00:00', '2022-01-05 20:33:26', 'mhmcd@mchsi.com', 'Michael', 'McDonald', 'Osceola Hills', 'I can''t recall how i heard about the group', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-03-06 00:00:00', '2022-01-05 20:33:26', 'trooperwon1@verizon.net', 'Amaury', 'Maldonado', 'Santo Domingo', 'The Villages Recreation & Parks News', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-03-07 00:00:00', '2022-01-05 20:33:26', 'perry.stiles@gmail.com', 'Perry', 'Stiles', 'Charlette', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-03-14 00:00:00', '2022-01-05 20:33:26', 'itspyder@gmail.com', 'Dale', 'Moyer', 'Fenney', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-04-13 00:00:00', '2022-01-05 20:33:26', 'ken@nightly.com', 'Ken', 'Keogh', 'Poinciana', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-04-22 00:00:00', '2022-01-05 20:33:26', 'don@dnwemail.com', 'Don', 'Wills', 'Pennecamp', 'Weekly club meeting newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-05-01 00:00:00', '2022-01-05 20:33:26', 'rsetterlund@gmail.com', 'Robert', 'Setterlund', 'Hemingway', 'Word of mouth', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-05-01 00:00:00', '2022-01-05 20:33:26', 'mluttman1@gmail.com', 'Michael', 'Luttman', 'Glenbrook', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-06-14 00:00:00', '2022-01-05 20:33:26', 'mike53tv@comcast.net', 'Michael', 'Gleim', 'Liberty Park', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-08-11 00:00:00', '2022-01-05 20:33:26', 'paavent@gmail.com', 'Patricia', 'Avent', 'St. Charles', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-08-12 00:00:00', '2022-01-05 20:33:26', 'joeint57@gmail.com', 'Joseph', 'Intravaia', 'Joseph Intravaia', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-08-15 00:00:00', '2022-01-05 20:33:26', 'foyec@aol.com', 'Chris', 'Foye', 'El Cortez', 'Need help with broken glass on mini I-pad', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-08-15 00:00:00', '2022-01-05 20:33:26', 'wb2art@gmail.com', 'Ken', 'Kaplan', 'LaBelle', 'Word of mouth', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-08-16 00:00:00', '2022-01-05 20:33:26', 'ra77@rantolick.net', 'Rich', 'Antolick', 'McClure', 'Ham Radio club meeting', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-08-16 00:00:00', '2022-01-05 20:33:26', 'kahuna32162@gmail.com', 'Robert', 'Clinton', 'Chatham', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-08-18 00:00:00', '2022-01-05 20:33:26', 'steve.tabler@gmail.com', 'Steve', 'Tabler', 'Orange Blossom Hills?', 'Nextdoor Digest', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-08-20 00:00:00', '2022-01-05 20:33:26', 'mikeeregan@yahoo.com', 'Michael', 'Regan', 'Gilchrist', 'Representative came to Villages Amateur Radio Club meeting ', NULL, '', 'vhot3dprint', 'Prusa I3 MK3, ', 'A', '', NULL, NULL, NULL, NULL),
('2019-08-21 00:00:00', '2022-01-05 20:33:26', 'sldavis447@gmail.com', 'Steve', 'Davis', 'Mallory Square', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-08-24 00:00:00', '2022-01-05 20:33:26', 'gbarryhammond@comcast.net', 'Barry', 'Hammond', 'Fernandina', 'Next Door', NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-09 00:00:00', '2022-01-05 20:33:26', 'deanprewitt01@gmail.com', 'Dean', 'Prewitt', 'Pine Hills', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-09-12 00:00:00', '2022-01-05 20:33:26', 'john_working@bellsouth.net', 'John', 'McCollough', 'Briar Meadow', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-09-13 00:00:00', '2022-01-05 20:33:26', 'bkonell@gmail.com', 'Barry', 'Konell', 'Edgewater Bungalows at Sumter Landing', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-09-14 00:00:00', '2022-01-05 20:33:26', 'irvjohnson@gmail.com', 'Irvin', 'Johnson', 'Osceola Hills', 'Science and Technology Group in The Vaillages', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-14 00:00:00', '2022-01-05 20:33:26', 'mauroscop@gmail.com', 'mauro', 'scopino', 'polo ridge', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-15 00:00:00', '2022-01-05 20:33:26', 'stryker.hargrove@gmail.com', 'Al', 'Matthews', 'Poinciana ', 'Ham club visit', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-16 00:00:00', '2022-01-05 20:33:26', 'ronklock2@gmail.com', 'Ron', 'Klock', 'Charlotte', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-17 00:00:00', '2022-01-05 20:33:26', 'jhnidy@gmail.com', 'Jerry', 'Hnidy', 'McClure', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-21 00:00:00', '2022-01-05 20:33:26', 'dtbonnell@comcast.net', 'Dale', 'Bonnell', 'Talltrees', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-09-24 00:00:00', '2022-01-05 20:33:26', 'ollmgmt3@gmail.com', 'Stuart', 'Arthur', 'Fenney', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-09-30 00:00:00', '2022-01-05 20:33:26', 'bobb@rv-journey.com', 'Bob', 'Betz', 'Hemingway', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-10-02 00:00:00', '2022-01-05 20:33:26', 'vance1956@gmail.com', 'vance', 'lorenzana', 'de la vista', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-10-03 00:00:00', '2022-01-05 20:33:26', 'jsadam304@gmail.com', 'Scott', 'Adam', 'Charlotte', 'Belong to Villages Computer Club', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-10-06 00:00:00', '2022-01-05 20:33:26', 'gary@pratt.pro', 'Gary', 'Pratt', 'Hacienda East', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-10-12 00:00:00', '2022-01-05 20:33:26', 'wvhammond@gmail.com', 'William', 'Hammond', 'McClure', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-05 00:00:00', '2022-01-05 20:33:26', 'rjt1@cornel.edu', 'Robert (Bob)', 'Thomas', 'Alden Bungalows', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-07 00:00:00', '2022-01-05 20:33:26', 'elronmch@netscape.net', 'Ronald', 'McHenry', 'Winifred', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-14 00:00:00', '2022-01-05 20:33:26', 'rmcnall@gmail.com', 'Ralph', 'McNall', 'Pine Ridge', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'mikerem48@gmail.com', 'Michael', 'Remsha', 'St. James', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'ndscotto@comcast.net', 'Nick', 'Scotto', 'Lynnhaven', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'ivor.thorne@btinternet.com', 'Ivor', 'Thorne', 'Pine Ridge', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'bobnanc70@gmail.com', 'Robert', 'Richmond', 'Da LA Vista', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'postmaster@normanabbott.plus.com', 'norman', 'abbott', 'silverlake', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'mantfam@yahoo.com', 'Hans', 'Mantel', 'Hadley', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'martha.k.friedman@gmail.com', 'Martha', 'Friedman', 'Ashland ', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'nevinmann@yahoo.com', 'Nevin', 'Mann', 'Pennecamp', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'bleyrh@gmail.com', 'Rick', 'Bley', 'De La Vista West', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'larrydonnelly1990@gmail.com', 'Larry', 'Donnelly', 'DeSoto', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'bpeterson@netheatre.com', 'Bob ', 'Peterson ', 'Sabel chase ', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'jjones1241@live.com', 'James (Jim)', 'Jones', 'Dunedin', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'leed2211@hotmail.com', 'Lee', 'DiDomenico', 'Mission Hills', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'helwig.ken@yahoo.com', 'Ken', 'Helwig', 'Sunset Point', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'e.krome@comcast.net', 'Ed', 'Krome ', 'Amelia', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-20 00:00:00', '2022-01-05 20:33:26', 'hoot2602@yahoo.com', 'Mike', 'Hutmacher', 'Dunedin', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-20 00:00:00', '2022-01-05 20:33:26', 'reoprisu1952@gmail.com', 'Rick', 'Oprisu', 'Lynnhaven', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-20 00:00:00', '2022-01-05 20:33:26', 'rich_jeff_1@yahoo.com', 'Rich', 'Laramee', 'poinciana', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-20 00:00:00', '2022-01-05 20:33:26', 'mahaessly60@gmail.com', 'Michael', 'Haessly', 'Lake Deaton', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-20 00:00:00', '2022-01-05 20:33:26', 'salotd@comcast.net', 'David', 'Salot', 'McClure', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-21 00:00:00', '2022-01-05 20:33:26', 'rl2010@att.net', 'Richard', 'Landau', 'Collier', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-24 00:00:00', '2022-01-05 20:33:26', 'lbenjamin@gmail.com', 'Lawrence', 'Benjamin', 'Dunedin', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-11-26 00:00:00', '2022-01-05 20:33:26', 'truebj@hotmail.com', 'James', 'Trueblood', 'Monarch Grove', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-12-02 00:00:00', '2022-01-05 20:33:26', 'eqcm_patterson@yahoo.com', 'Jerry', 'Patterson', 'Lake Deaton', 'Word of mouth', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-12-03 00:00:00', '2022-01-05 20:33:26', 'zy1981@me.com', 'Ed', 'Haynes', 'Oscelola Hills at Soaring Eagle', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-12-13 00:00:00', '2022-01-05 20:33:26', 'johns2947@gmail.com', 'John', 'Sullivan', 'Marsh Bend', 'the Villages Computer Club', NULL, '', 'vhotsmcomp vhot3dprint', 'XYZ DaVinci mini w+, ', 'A', '', NULL, NULL, NULL, NULL),
('2019-12-15 00:00:00', '2022-01-05 20:33:26', 'scalinghammer@gmail.com', 'Ed', 'Henry', 'Fenney', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2019-12-16 00:00:00', '2022-01-05 20:33:26', 'lpeterson52@cfl.rr.com', 'Larry', 'Peterson', 'Collier', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-12-16 00:00:00', '2022-01-05 20:33:26', 'gper3333@gmail.com', 'Gary', 'Pett', 'Monarch Grove', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', 'Prusa I3 MK3, ', 'A', '', NULL, NULL, NULL, NULL),
('2019-12-25 00:00:00', '2022-01-05 20:33:26', 'peter.kaub@comcast.net', 'Peter', 'Kaub', 'Edgewater', 'Online', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-12-29 00:00:00', '2022-01-05 20:33:26', 'slpierce32@gmail.com', 'Stephen', 'Pierce', 'St James', 'Newspaper', NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-01-02 00:00:00', '2022-01-05 20:33:26', 'janseiffert54@gmail.com', 'Jan', 'Seiffert ', 'Pine Hills', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-01-09 00:00:00', '2022-01-05 20:33:26', 'jerryodonnell@gmail.com', 'Jerry', 'ODonnell', 'Pennecamp', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-01-10 00:00:00', '2022-01-05 20:33:26', 'wanda2728@yahoo.com', 'Wanda', 'Freeman', 'Wanda Freeman', 'friend', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-01-14 00:00:00', '2022-01-05 20:33:26', 'pcantele@gmail.com', 'Peter', 'Cantele', 'Peter A Cantele', 'I don''t remember.', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-01-14 00:00:00', '2022-01-05 20:33:26', 'richardhaddrill@aol.com', 'Richard', 'Haddrill', 'Buttonwood', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-01-14 00:00:00', '2022-01-05 20:33:26', 'edandhar@hotmail.com', 'Edward', 'Chanen', 'Edward Chanen', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-01-28 00:00:00', '2022-01-05 20:33:26', 'rchristiansen10@gmail.com', 'Roger', 'Christiansen', 'Roger P Christiansen', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2021-10-29 00:00:00', '2022-01-05 20:33:26', 'dsinila@yahoo.com', 'Dwight', 'Sinila', 'Osceola Holls', 'Word of mouth', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-02-25 00:00:00', '2022-01-05 20:33:26', 'rforkun@gmail.com', 'Richard', 'Forkun', 'Sanibel', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-02-26 00:00:00', '2022-01-05 20:33:26', 'toolnut52@gmail.com', 'Ken', 'Thornburg', 'Del Mar', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-03-06 00:00:00', '2022-01-05 20:33:26', 'gordywestphal@yahoo.com', 'GORDON', 'WESTPHAL', 'lakeshore cottages', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-04-08 00:00:00', '2022-01-05 20:33:26', 'florida.bill@gmail.com', 'Bill', 'Fulford', 'Gilchrist', 'Online', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-05-19 19:56:50', '2022-01-05 20:33:26', 'rzor@gmail.com', 'Bill', 'Sheldon', 'Sable Chase', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-07-08 00:00:00', '2022-01-05 20:33:26', 'orbie1010@yahoo.com', 'Russ', 'Orebek', 'Orange Blossom Gardens', 'Online', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-07-08 00:00:00', '2022-01-05 20:33:26', 'jpspoonhower@gmail.com', 'John', 'Spoonhower', 'Tamarind Grove', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-08-02 00:00:00', '2022-01-05 20:33:26', 'ronploude@gmail.com', 'Ron', 'Ploude', 'Fenney', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-08-02 00:00:00', '2022-01-05 20:33:26', 'davidshillingburg@yahoo.com', 'David', 'Shillingburg', 'Bridgeport at Lake Miona', 'Newspaper', NULL, '', '', '', 'D', '', NULL, NULL, NULL, NULL),
('2020-09-16 00:00:00', '2022-01-05 20:33:26', 'tjup418@gmail.com', 'Thomas', 'O''Boyle', 'Hadley', 'Word of mouth', '3D Printing', '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-10-12 00:00:00', '2022-01-05 20:33:26', 'jayjayson620@yahoo.com', 'Jay', 'Jayson', 'osceola hills', 'Word of mouth', 'Small Computers, 3D Printing', '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-10-27 00:00:00', '2022-01-05 20:33:26', 'rzor435@gmail.com', 'Bill', 'Sheldon', 'Sabal Chase', 'Newspaper', 'Small Computers, 3D Printing', '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-11-12 00:00:00', '2022-01-05 20:33:26', '6188ama@gmail.com', 'Barry', 'Killick', 'Bonnybrook', 'Web search', '3D Printing', '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-12-01 00:00:00', '2022-01-05 20:33:26', 'ryan.j.alpaugh@gmail.com', 'Ryan', 'Alpaugh', 'Collier', 'VCC webpage', 'Small Computers, 3D Printing', '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-01-18 00:00:00', '2022-01-05 20:33:26', 'trippdon@msn.com', 'Don', 'Tripp', 'Pennacamp', 'Newspaper', '3D Printing', '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-01-23 00:00:00', '2022-01-05 20:33:26', 'dondavidson79@gmail.com', 'Donald', 'Davidson', 'Lake Deaton', 'Word of mouth', 'Small Computers', '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-02-09 00:00:00', '2022-01-05 20:33:26', 'jamesshorr@gmail.com', 'James', 'Shorr', 'Winifred', 'Word of mouth', '3D Printing', '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-02-09 00:00:00', '2022-01-05 20:33:26', 'marcia32162@gmail.com', 'Marcia', 'Jandzio', 'Pine Hills', 'Newspaper', '3D Printing', '', 'vhot3dprint ', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-02-11 00:00:00', '2022-01-05 20:33:26', 'thorwald.eide@embarqmail.com', 'Thorwald', 'Eide', 'Largo', 'Newspaper', '3D Printing', '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-09 20:36:27', '2022-01-05 20:33:26', 'barryhamond52@gmail.com', 'Barry', 'Hamond', NULL, NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-07-25 12:38:56', '2022-01-05 20:33:26', 'billosborn8@gmail.com', 'Bill', 'Osborn', NULL, NULL, NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-09 20:36:27', '2022-01-05 20:33:26', 'crosbydon@gmail.com', 'Don', 'Crosby', NULL, NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 14:55:10', '2022-01-05 20:33:26', 'daveandgingermay@gmail.com', 'David', 'May', 'Fenney', NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-19 00:00:00', '2022-01-05 20:33:26', 'jcerullo@yahoo.com', 'John', 'Cerullo', 'Caroline', 'Newspaper', NULL, 'jcerullo', 'vhotsmcomp vhot3dprint ', '', 'A', '', '(603) 205-4255', '(603) 205-4355', 'Jeri', '656 Sheppard Way'),
('2021-04-03 00:00:00', '2022-01-05 20:33:26', 'thevillagetoads@gmail.com', 'James', 'Smith', ' ', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-04 00:00:00', '2022-01-05 20:33:26', 'sneeksstore@gmail.com', 'Gloria', 'Coover', ' ', NULL, NULL, ' ', 'vhot3dprint', 'Creality Ender-5, ', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-07 00:00:00', '2022-01-05 20:33:26', 'drobbins58@hotmail.com', 'Dan', 'Robbins', ' ', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2020-01-17 00:00:00', '2022-01-05 20:33:26', 'junkycedar@gmail.com', 'Kathy', 'Fairfield', 'DeSoto', 'Newspaper', NULL, '', 'vhot3dprint', 'Snapmaker, ', 'A', '', NULL, NULL, NULL, NULL),
('2019-09-17 00:00:00', '2022-01-05 20:33:26', 'ars.w8rcw@gmail.com', 'Rich', 'Weigold', 'LaBelle North', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-02-08 00:00:00', '2022-01-05 20:33:26', 'artrobot101@gmail.com', 'Art', 'Wingerden', 'Fernandina', 'Village Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-14 00:00:00', '2022-01-05 20:33:26', 'bardenbob@gmail.com', 'Bob', 'Barden ', 'Buttonwood', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2019-11-19 00:00:00', '2022-01-05 20:33:26', 'bobjessup@live.com', 'Bob', 'Jessup', 'Dunneden', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-02-06 00:00:00', '2022-01-05 20:33:26', 'bolandd@gmail.com', 'David', 'Boland', 'Marsh Bend', 'Facebook Group', 'Small Computers, 3D Printing', '', 'vhotsmcomp vhot3dprint', 'Creality Ender-3, ', 'A', '', NULL, NULL, NULL, NULL),
('2020-10-12 00:00:00', '2022-01-05 20:33:26', 'bonnie.dorr@gmail.com', 'Bonnie', 'Dorr', 'Pinellas', 'Word of mouth', 'Small Computers', '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2020-02-29 00:00:00', '2022-01-05 20:33:26', 'chris@hexzero.com', 'Chris', 'Nelson', 'Dunedin', 'The Talk of the Villages - Club Search', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-03-05 00:00:00', '2022-01-05 20:33:26', 'daveb1932@comcast.net', 'David', 'Bassett', 'Pinellas', 'Word of mouth', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-08 00:00:00', '2022-01-05 20:33:26', 'david.f.pennington@gmail.com', 'David', 'Pennington', 'Dunedine', 'Computer Club', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-11-06 00:00:00', '2022-01-05 20:33:26', 'david.morrill@gmail.com', 'David', 'Morrill', 'Fernandina', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2018-04-10 00:00:00', '2022-01-05 20:33:26', 'david@depowell.com', 'David', 'Powell', 'Country Club Hills', 'Word of mouth', NULL, '', 'vhotsmcomp vhot3dprint', 'FLSun, Hictop, Tronxy, ', 'A', '', NULL, NULL, NULL, NULL),
('2019-08-15 00:00:00', '2022-01-05 20:33:26', 'davidaneiss@gmail.com', 'David', 'Neiss', 'moving to TV next year', 'TOTV', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-06 00:00:00', '2022-01-05 20:33:26', 'dblanding@gmail.com', 'Doug', 'Blanding', 'Santo Domingo', 'John Richards', NULL, 'dblanding', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-11 00:00:00', '2022-01-05 20:33:26', 'deanoue@gmail.com', 'Dean', 'Ouellette', 'Fernandina', 'Newspaper', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-28 00:00:00', '2022-01-05 20:33:26', 'dhenn@dantel.com', 'DENIS', 'HENN', 'Pinellas', 'Newspaper', NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-01-17 00:00:00', '2022-01-05 20:33:26', 'djolsen7@gmail.com', 'David ', 'Olsen', 'Hadley', 'Gregg Cieslak', 'Small Computers', '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2017-10-16 00:00:00', '2022-01-05 20:33:26', 'dmacanlis@gmail.com', 'Dave', 'MacAnlis', 'Osceola Hills', 'Villages Developmental Technologies Group', NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-09 20:36:27', '2022-01-05 20:33:26', 'dianwilliams21@gmail.com', 'Lloyd', 'Williams', NULL, NULL, NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 14:56:59', '2022-01-05 20:33:26', 'gary_pett@hotmail.com', 'Gary', 'Pett', 'Monarch Grove', NULL, NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-07-25 12:38:56', '2022-01-05 20:33:26', 'dsvest99@gmail.com', 'David', 'Vestrand', 'Largo', NULL, NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-07-25 12:38:55', '2022-01-05 20:33:26', 'hot@petethegeek.com', 'Pete', 'TheGeek', NULL, NULL, NULL, '', 'vhotsmcomp', 'Creality CR-20 Pro, Creality CR10, ', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:05:30', '2022-01-05 20:33:26', 'jminelli@epix.net', 'John', 'Minelli', 'Osceola Hills at Soaring Eagle', NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-07-25 12:38:56', '2022-01-05 20:33:26', 'lnettuno1@gmail.com', 'Louis', 'Nettuno', 'Lake Deaton', NULL, NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:12:30', '2022-01-05 20:33:26', 'luisvperea@gmail.com', 'Luis', 'Perea', 'Fernandina', NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-07-25 12:38:56', '2022-01-05 20:33:26', 'mr.mikeregan@gmail.com', 'Michael', 'Regan', 'Gilchrist', NULL, NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-07-25 12:38:56', '2022-01-05 20:33:26', 'mulanaxmike@gmail.com', 'Mike', 'Mulanax', 'Hillsborough', NULL, NULL, '', 'vhotsmcomp vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:17:55', '2022-01-05 20:33:26', 'rjt1@cornell.edu', 'Bob', 'Thomas', 'Alden Bungalows', NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:19:29', '2022-01-05 20:33:26', 'tedwrightfl@gmail.com', 'Ted', 'Wright', 'Winifred', NULL, NULL, '', 'vhotsmcomp', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:25:28', '2022-01-05 20:33:26', 'jebestmr@gmail.com', 'Joel', 'Best', 'Bonnybrook', NULL, NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:37:53', '2022-01-05 20:33:26', 'jhr17rec@gmail.com', 'John', 'Richards', 'Harmeswood', NULL, NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-11 15:33:12', '2022-01-05 20:33:26', 'rlhathome@gmail.com', 'Ron', 'Huber', 'Hadley', NULL, NULL, '', 'vhot3dprint', '', 'A', '', NULL, NULL, NULL, NULL),
('2021-04-19 00:00:00', '2022-01-05 20:33:26', 'matthewbenedict999@hotmail.com', 'Matthew', 'Benedict', ' ', NULL, NULL, ' ', 'vhot3dprint ', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-05-16 00:00:00', '2022-01-05 20:33:26', 'tom@tomfujawa.com', 'Tom', 'Fujawa', ' ', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-06-28 00:00:00', '2022-01-05 20:33:26', 'lapladj65@gmail.com', 'David', 'LaPlante', 'Deluna', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-08-08 00:00:00', '2022-01-05 20:33:26', 'patrickbradylaw@yahoo.com', 'Patrick', 'Brady', 'Poinciana', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-08-10 00:00:00', '2022-01-05 20:33:26', 'equuss608@aol.com', 'Davie', 'McNamara', ' ', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-08-15 00:00:00', '2022-01-05 20:33:26', 'nealschaffel@gmail.com', 'Neal', 'Schaffel', 'St Charles', NULL, NULL, ' ', 'vhot3dprint ', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-08-19 00:00:00', '2022-01-05 20:33:26', 'aa2gf@yahoo.com', 'David', 'Borkowski', 'St Catherine', NULL, NULL, ' ', 'vhotsmcomp vhot3dprint', ' ', 'A', '', NULL, NULL, NULL, NULL),
('2021-10-31 00:00:00', '2022-01-05 20:33:26', 'rlebkuecher@gmail.com', 'Robert', 'Lebkuecher', 'Monarch Grove', NULL, NULL, ' ', 'vhotsmcomp vhot3dprint', ' ', 'A', NULL, NULL, NULL, NULL, NULL),
('2021-09-24 00:00:00', '2022-01-05 20:33:26', 'bswann01@gmail.com', 'Robert', 'Swann', 'Charlotte', NULL, NULL, ' ', 'vhotsmcomp vhot3dprint', ' ', 'A', NULL, NULL, NULL, NULL, NULL),
('2021-09-24 00:00:00', '2022-01-05 20:33:26', 'schlagheck@gmail.com', 'Rusty', 'Schlagheck', 'Sable Chase', NULL, NULL, ' ', 'vhotsmcomp', ' ', 'A', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `members` (`timestamp`, `changestamp`, `emailAddress`, `firstName`, `lastName`, `yourVillage`, `whereDidYouHearAboutHandsonTech`, `iWouldLikeToJoin`, `githubID`, `groupsJoined`, `printersOwned`, `status`, `password`, `phonePrimary`, `ecPhone`, `ecName`, `streetAddr`) VALUES
('2021-10-14 00:00:00', '2022-01-05 20:33:26', 'gschultz2010@gmail.com', 'Gary', 'Schultz', 'Del Mar', NULL, NULL, NULL, 'vhotsmcomp vhot3dprint', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
('2021-10-27 00:00:00', '2022-01-05 20:33:26', 'mosborn@vpc89.com', 'Marty', 'Osborn', 'The Lofts', NULL, NULL, NULL, 'vhotsmcomp', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
('2021-10-28 00:00:00', '2022-01-05 20:33:26', 'duanenclark@gmail.com', 'Duane', 'Clark', 'St. Catherine''s', NULL, NULL, NULL, 'vhotsmcomp vhot3dprint', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
('2021-11-08 00:00:00', '2022-01-05 20:33:26', 'davebh2o@gmail.com', 'David', 'Bridgewater', 'Waverly Villas (Piedmont)', NULL, NULL, NULL, 'vhotsmcomp', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
('2021-11-09 00:00:00', '2022-01-05 20:33:26', 'canamark1977@gmail.com', 'Mark', 'Witmer', 'Mallory Square ', NULL, NULL, NULL, NULL, NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-24 00:00:00', '2022-01-05 20:33:26', 'skhoover71@gmail.com', 'Stan', 'Hoover', 'McClure', NULL, NULL, NULL, 'vhotsmcomp', NULL, 'A', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'members for group vhotsmcomp', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'email address', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'bernienh@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'controlspherellc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'hamag5nm@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'handsontechorg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'jjcerullo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'jlick99@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'nebojohn@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'retired2thdoc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhotsmcomp', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'members for group vhot3dprint', NULL, NULL, NULL, NULL, NULL, NULL, 'vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'exploringthevillages@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'rzor435@gmail.net', NULL, NULL, NULL, NULL, NULL, NULL, 'vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL),
('2021-12-26 16:13:48', '2022-01-05 20:33:26', 'vaulterjack@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'vhot3dprint', NULL, 'D', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberSpreadsheet`
--

DROP TABLE IF EXISTS `memberSpreadsheet`;
CREATE TABLE IF NOT EXISTS `memberSpreadsheet` (
  `timestamp` varchar(24) CHARACTER SET utf8 NOT NULL,
  `emailAddress` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `firstName` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `lastName` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `yourVillage` varchar(37) CHARACTER SET utf8 DEFAULT NULL,
  `whereDidYouHearAboutHandsonTech` varchar(59) CHARACTER SET utf8 DEFAULT NULL,
  `iWouldLikeToJoin` varchar(28) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberSpreadsheet`
--

INSERT INTO `memberSpreadsheet` (`timestamp`, `emailAddress`, `firstName`, `lastName`, `yourVillage`, `whereDidYouHearAboutHandsonTech`, `iWouldLikeToJoin`) VALUES
('2017-10-04T10:13:28.808Z', 'PeteDziekan@Gmail.com', 'Pete', 'Dziekan', 'Sanibel', 'Word of mouth', NULL),
('2017-10-04T16:19:25.812Z', 'edjott5659@gmail.com', 'Edward', 'Ott', 'Sabal Chase', 'Newspaper', NULL),
('2017-10-04T16:42:10.135Z', 'rpaluszak@msn.com', 'Robert', 'Paluszak', 'Mallory Square', 'Word of mouth', NULL),
('2017-10-05T17:23:02.400Z', 'domenic.gualtieri@gmail.com', 'Dom', 'Gualtieri', 'El Cortez', 'Newspaper', NULL),
('2017-10-05T22:34:35.627Z', 'wchunt2014@gmail.com', 'Willard ', 'Hunt ', 'Pinellas ', 'Newspaper', NULL),
('2017-10-05T23:04:59.912Z', 'professorjayson@msn.com', 'Gail', 'Jayson', 'osceola hills', 'Newspaper', NULL),
('2017-10-05T23:49:54.257Z', 'sgianelos@outlook.com', 'Steve', 'Gianelos ', 'LaBelle North', 'Connected villager club meeting', NULL),
('2017-10-05T23:58:49.018Z', 'plesetz@gmail.com', 'Jim', 'Plesetz', 'Charlotte', 'Newspaper', NULL),
('2017-10-06T00:20:53.623Z', 'vectorgrp@aol.com', 'Peter', 'Gloede', 'Lake Deaton', 'Newspaper', NULL),
('2017-10-06T00:40:14.527Z', 'donmeisinge@comcast.net', 'donald', 'meisinger', 'sable chase', 'Newspaper', NULL),
('2017-10-06T00:47:07.592Z', 'luis.v.perea@gmail.com', 'Luis', 'Perea', 'Fernandina', 'Newspaper', NULL),
('2017-10-06T00:59:19.750Z', 'rlhathome@aol.com', 'Ron', 'Huber', 'Hadley', 'TOTV', NULL),
('2017-10-06T01:18:54.406Z', 'DALY1302@COMCAST.NET', 'Edward', 'Daly', 'Santiago', 'Word of mouth', NULL),
('2017-10-06T09:44:12.798Z', 'mcgeehd@gmail.com', 'Dean', 'McGee', 'Collier', 'Newspaper', NULL),
('2017-10-06T13:29:35.704Z', 'doncrosby@aol.com', 'Don', 'Crosby', 'Santo Domingo', 'Word of mouth', NULL),
('2017-10-06T13:30:55.059Z', 'jjjdl@hotmail.com', 'David', 'Little', 'Osceola Hills @ Soaring Eagle', ' attending the computer club', NULL),
('2017-10-06T14:11:47.791Z', 'LTCBraz@gmail.com', 'Ken', 'Braswell', 'Santiago', 'Word of mouth', NULL),
('2017-10-06T14:28:56.826Z', 'lnettuno@yahoo.com', 'Louis', 'Nettuno', 'Lake Deaton', 'from the e-flyers meeting', NULL),
('2017-10-06T15:02:39.609Z', 'mark.magnuson.mm@gmail.com', 'Mark', 'Magnuson', 'Fernandina', 'VCC', NULL),
('2017-10-06T19:59:42.630Z', 'charlie@vanderford.net', 'Charles', 'Vanderford', 'Poinciana', 'Online', NULL),
('2017-10-06T21:22:34.785Z', 'mtfeldman@gmail.com', 'Mark', 'Feldman', 'Winifred', 'Word of mouth', NULL),
('2017-10-06T21:29:45.841Z', 'baxrose@yahoo.com', 'Allen', 'Farrell', 'Osceola Hills', 'Newspaper', NULL),
('2017-10-06T21:32:16.923Z', 'pete.trecartin@gmail.com', 'Peter', 'Trecartin', 'Gilchrist', 'Newspaper', NULL),
('2017-10-07T01:15:22.091Z', 'yangmin.shen@gmail.com', 'Yang', 'Shen', 'Collier', 'Word of mouth', NULL),
('2017-10-07T01:35:47.122Z', 'dblanding@gmail.com', 'Doug', 'Blanding', 'Santo Domingo', 'John Richards', NULL),
('2017-10-07T02:22:56.176Z', 'handydan1234@aol.com', 'Bruce ', 'Faulkner ', 'Santiago', 'Word of mouth', NULL),
('2017-10-07T02:24:47.898Z', 'ted@wrightsfl.com', 'Ted', 'Wright', 'Winifred', 'Word of mouth', NULL),
('2017-10-07T12:24:03.550Z', 'jkcrn17@gmail.com', 'Jane', 'Kelly', 'Bonnybrook', 'Word of mouth', NULL),
('2017-10-07T18:27:52.644Z', 'dmlgw2@thevillages.net', 'Lloyd', 'Williams', 'Belvdere', 'Recreation Newspaper', NULL),
('2017-10-07T19:39:39.928Z', 'jzecher@yahoo.com', 'Jack', 'Zecher', 'Caroline', 'Newspaper', NULL),
('2017-10-08T01:58:11.411Z', 'jayjayson620@yahoo.com', 'Jay', 'Jayson', 'Osceola Hills', 'Newspaper', NULL),
('2017-10-08T15:33:31.256Z', 'david.f.pennington@gmail.com', 'David', 'Pennington', 'Dunedine', 'Computer Club', NULL),
('2017-10-08T17:40:18.301Z', 'linda48hunt@gmail.com', 'Linda', 'Hunt', 'Pinellas', 'Newspaper', NULL),
('2017-10-09T18:13:31.194Z', 'frankneta@comcast.net', 'Frank', 'Sylva', 'Poinciana', '3 D Printer Club', NULL),
('2017-10-09T20:29:14.942Z', 'pjrdbs@msn.com', 'Peter', 'Rosendahl', 'Hillsborough', 'Word of mouth', NULL),
('2017-10-10T02:56:54.631Z', 'tmfriedl41@comcast.net', 'Matt', 'Friedland', 'Charlotte ', 'Newspaper', NULL),
('2017-10-12T00:23:20.330Z', 'deanoue@gmail.com', 'Dean', 'Ouellette', 'Fernandina', 'Newspaper', NULL),
('2017-10-12T17:30:47.534Z', 'duhbear@gmail.com', 'Joe', 'Kennedy', 'Santiago', 'Founder', NULL),
('2017-10-13T00:51:37.583Z', 'dhuff309@gmail.com', 'Dennis', 'Huff', 'Lake Deaton', 'Connected Villager', NULL),
('2017-10-13T01:51:40.474Z', 'lakedeatonrick@gmail.com', 'Rick', 'Rademacher', 'Lake Deaton', 'Pilots Club meeting', NULL),
('2017-10-13T20:12:32.137Z', 'tleja@cfl.rr.com', 'Thomas', 'Leja', 'Charlotte', 'Newspaper', NULL),
('2017-10-13T22:57:38.386Z', 'mikehausner@aol.com', 'Mike', 'Hausner', 'Liberty park', 'E-Flyers meeting', NULL),
('2017-10-15T13:31:59.005Z', 'rdeacon1960@gmail.com', 'ronald', 'deacon', 'labelle', 'Newspaper', NULL),
('2017-10-15T17:54:01.036Z', 'huey158@gmail.com', 'Stan', 'Carpenter', 'Buttonwood', 'Villages Aviation Club', NULL),
('2017-10-16T16:45:29.476Z', 'dmacanlis@gmail.com', 'Dave', 'MacAnlis', 'Osceola Hills', 'Villages Developmental Technologies Group', NULL),
('2017-10-16T17:07:07.683Z', 'michaelpalazzola@hotmail.com', 'Michael', 'Palazzola', 'Charlote', 'Connected villager', NULL),
('2017-10-18T01:37:31.301Z', 'ameehan@centurylink.net', 'Anne', 'Meehan', 'Poinciana', 'Newspaper', NULL),
('2017-10-18T19:06:54.056Z', 'boblavarnway@yahoo.com', 'Robert', 'LaVarnway', 'Rio Grande', 'Word of mouth', NULL),
('2017-10-19T11:30:23.210Z', 'florilake@gmail.com', 'Bruce', 'Brixey', 'Caroline', 'Word of mouth', NULL),
('2017-10-19T22:37:39.059Z', 'bgalamb@gmail.com', 'Bernice', 'Lamb', 'Lake Deaton', 'Newspaper', NULL),
('2017-10-20T00:38:23.225Z', 'jcerullo@yahoo.com', 'John', 'Cerullo', 'Caroline', 'Newspaper', NULL),
('2017-10-20T01:36:42.287Z', 'stormy2nd@gmail.com', 'Stormy', 'Armagost', 'Mulberry Grove', 'Word of mouth', NULL),
('2017-10-20T09:52:14.979Z', 'paul.calabrese72@gmail.com', 'Paul', 'Calabrese', 'Morning View Villas', 'Newspaper', NULL),
('2017-10-20T16:07:06.594Z', 'bussiere1@comcast.net', 'Bernie', 'Bussiere', 'Tamarind Grove', 'Word of mouth', NULL),
('2017-10-20T17:14:43.379Z', 'mkopelberg@comcast.net', 'Mark', 'Kopelberg', 'Sanibel', 'Word of mouth', NULL),
('2017-10-20T20:17:46.320Z', 'dstoltz648@gmail.com', 'David', 'Stoltz', 'Dunedin', 'Newspaper', NULL),
('2017-10-21T15:29:33.696Z', 'jminelliokw@me.com', 'John', 'Minelli', 'Osceola Hills at Soaring Eagle', 'Word of mouth', NULL),
('2017-10-21T16:01:40.839Z', 'jameswtom@gmail.com', 'Tom', 'James', 'Bonita', 'Word of mouth', NULL),
('2017-10-22T23:57:15.289Z', 'igg@number-one.org', 'David', 'Rigg', 'Briar Meadow', 'Newspaper', NULL),
('2017-10-24T13:09:12.909Z', 'greggcies@live.com', 'Gregg', 'Cieslak', 'Hemingway', 'Word of mouth', NULL),
('2017-10-24T17:17:23.293Z', 'pjcurran21@gmail.com', 'Patrick', 'Curran', 'Belle Aire (Cottages at Summerchase)', 'Word of mouth', NULL),
('2017-10-25T16:50:02.916Z', 'JanalynPeppel@gmail.com', 'Janalyn', 'Peppel', 'Gainesville', 'Word of mouth', NULL),
('2017-10-27T00:46:22.182Z', 'johnhr@centurylink.net', 'John', 'Richards', 'Harmeswood', 'Joe Kennedy', NULL),
('2017-10-27T01:11:11.916Z', 'newlandten@gmail.com', 'Thomas', 'Newland', 'Santo Domingo', 'Word of mouth', NULL),
('2017-10-27T20:35:04.197Z', 'peterbcope@gmail.com', 'Peter', 'Cope', 'Dunedin', 'Word of mouth', NULL),
('2017-10-27T21:28:49.741Z', 'David.May.mobile@GMail.com', 'David', 'May', 'Fenney', 'Word of mouth', NULL),
('2017-10-28T14:20:42.418Z', 'dhenn@dantel.com', 'DENIS', 'HENN', 'Pinellas', 'Newspaper', NULL),
('2017-10-30T22:22:46.725Z', 'evcoe1@gmail.com', 'Ron', 'Everist', 'Hadley', 'Villages Connected Computer Club', NULL),
('2017-10-31T16:26:02.258Z', 'don@disneygoldwing.com', 'Don', 'Wiley', 'Hillsbrough', 'Online', NULL),
('2017-11-02T16:55:34.410Z', 'djmorgan1451@gmail.com', 'Douglas', 'Morgan', 'Pine Ridge', 'Newspaper', NULL),
('2017-11-03T02:40:39.565Z', 'jklawitter@frontier.com', 'John', 'Klawitter', 'Lake Deaton', 'Newspaper', NULL),
('2017-11-05T13:58:22.335Z', 'terrbeer@gmail.com', 'Terry', 'Blatchley', 'Santiago', 'Word of mouth', NULL),
('2017-11-07T00:16:28.487Z', 'david.morrill@gmail.com', 'David', 'Morrill', 'Fernandina', 'Newspaper', NULL),
('2017-11-08T22:12:15.721Z', 'jebest@juno.com', 'Joel', 'Best', 'Bonnybrook', 'Word of mouth', NULL),
('2017-11-10T21:14:22.628Z', 'pcantele@gmail.com', 'Pete', 'Cantele', 'Sanibel', 'Facebook posting', NULL),
('2017-11-11T16:48:00.610Z', 'juliendrouin@comcast.net', 'Julien', 'Drouin', 'Oceola hill', 'Word of mouth', NULL),
('2017-11-13T22:27:45.299Z', 'ted72@embarqmail.com', 'Ted', 'Ebert', 'Virgina trace', 'Online', NULL),
('2017-11-15T15:04:08.419Z', 'mikemulanax@yahoo.com', 'Mike', 'Mulanax', 'Hillsborough', 'Word of mouth', NULL),
('2017-11-16T13:46:00.879Z', 'soniamdemorais@gmail.com', 'Sonia', 'De Morais', 'Saint James', 'Women Doctors Club', NULL),
('2017-11-16T20:16:18.508Z', 'rdgrant@comcast.net', 'Bob', 'Grant', 'Sanibel', 'Word of mouth', NULL),
('2017-11-17T00:20:17.717Z', 'ctholli9@gmail.com', 'Curtis', 'Holliday', 'Orange Blossom', 'Word of mouth', NULL),
('2017-11-17T00:47:15.680Z', 'stephenramartin@gmail.com', 'Stephen', 'Martin', 'Pinellas', 'Word of mouth', NULL),
('2017-11-27T14:22:23.980Z', 'stanleywr@comcast.net', 'William', 'Stanley', 'Calumet', 'Newspaper', NULL),
('2017-11-30T18:32:34.905Z', 'w4crv@yahoo.com', 'Chuck', 'Varwig', 'DaLaVista North', NULL, NULL),
('2017-12-01T01:35:36.242Z', 'tonypf11@gmail.com', 'Tony', 'Pflum', 'Sanibel', 'Word of mouth', NULL),
('2017-12-01T14:42:31.773Z', 'mikeroth@rothconsulting.net', 'Mike', 'Roth', 'Osceola Hills', 'Newspaper', NULL),
('2017-12-01T17:30:57.459Z', 'info@butx.com', 'efraim', 'halfon', 'hemingway', 'Online', NULL),
('2017-12-03T15:59:15.144Z', 'cafranson@gmail.com', 'Cheryl', 'Franson', 'Sunset Pointe', 'Newspaper', NULL),
('2017-12-05T23:29:53.498Z', 'mattnypaver@gmail.com', 'Matt', 'Nypaver', 'Liberty Park', 'Newspaper', NULL),
('2017-12-07T13:38:45.111Z', 'FloridaVillages@gmail.com', 'Lorne', 'Eliosoff', 'Country Club', 'Newspaper', NULL),
('2017-12-14T12:56:59.062Z', 'josephtsmith@gmail.com', 'Joseph', 'Smith', 'Harmeswood', 'Word of mouth', NULL),
('2017-12-18T14:04:02.586Z', 'bonner.russ@gmail.com', 'Russ', 'Bonner', 'Hillsborough', 'Newspaper', NULL),
('2017-12-22T01:43:17.274Z', 'meidhof@gmail.com', 'George', 'Meidhof', 'Liberty Park', 'Word of mouth', NULL),
('2017-12-28T22:28:17.828Z', 'KENDEE335@GMAIL.COM', 'Kenneth', 'Melvin', 'osceola Hills', 'Word of mouth', NULL),
('2018-01-01T19:23:29.412Z', 'blewett.don@gmail.com', 'Don', 'Blewett', 'Rio Grande', 'Newspaper', NULL),
('2018-01-02T14:24:56.333Z', 'dfpawlak@msn.com', 'Donald', 'Pawlak', 'El Cortez', 'Word of mouth', NULL),
('2018-01-02T19:11:15.692Z', 'ntopolnicki@cfl.rr.com', 'Neil', 'Topolnicki', 'Sumter Grand', 'The Villages Magazine', NULL),
('2018-01-04T14:54:34.862Z', 'rdeacon1960@gmail.com', 'ronald', 'DEACON', 'labelle', 'Newspaper', NULL),
('2018-01-05T02:20:06.906Z', 'gt5racer_99@yahoo.com', 'David', 'Vestrand', 'Largo', 'Newspaper', NULL),
('2018-01-05T02:44:10.406Z', 'hwduke@gmail.com', 'Wayne', 'Duke', 'Country club Hills', 'Newspaper', NULL),
('2018-01-06T14:18:41.621Z', 'drdougrobotman@gmail.com', 'Doug', 'Keenan', 'Pine Ridge', 'Online', NULL),
('2018-01-11T20:12:55.703Z', 'SKVINING22@GMAIL.COM', 'Sharon', 'Vining', 'Sharon Vining', 'Word of mouth', NULL),
('2018-01-21T17:41:46.960Z', 'slpierce32@gmail.com', 'Stephen', 'Pierce', 'Hadley', 'Newspaper', NULL),
('2018-01-26T01:35:20.470Z', 'grmckn@gmail.com', 'Gregory', 'McKnight', 'Creekside landing', 'Newspaper', NULL),
('2018-02-11T21:17:04.112Z', 'quincy1@ameritech.net', 'Bill', 'McNerney', 'Lynnhaven', 'The Villages Recreation & Parks weekly paper', NULL),
('2018-02-16T01:03:54.367Z', 'heideuro@aol.com', 'Art', 'Wingerden', 'Fernandina', 'Newspaper', NULL),
('2018-02-17T22:26:23.783Z', 'info@LAGMail.com', 'Lou', 'Gyenese', 'Fernandina', 'Word of mouth', NULL),
('2018-03-01T23:36:02.009Z', 'hchlebz@yahoo.com', 'Henry', 'Chlebek', 'Tamarind grove', 'Word of mouth', NULL),
('2018-03-06T01:52:34.060Z', 'Daveb1932@comcast.net', 'David', 'Bassett', 'Pinellas', 'Word of mouth', NULL),
('2018-03-09T02:12:30.344Z', 'gds32571@gmail.com', 'Gerald', 'Swann', 'Deaton', 'Villages magazine', NULL),
('2018-03-22T14:28:26.283Z', 'mikeveach43213@yahoo.com', 'mike', 'veach', 'largo', 'Newspaper', NULL),
('2018-03-23T04:28:59.283Z', 'rzagst41@gmail.com', 'Robert (Rob)', 'Zagst', 'Pine Hills', 'Newspaper', NULL),
('2018-03-26T10:12:18.308Z', 'kaffeb88@gmail.com', 'Kathy', 'Bray', 'Pine Hills', 'Newspaper', NULL),
('2018-04-10T16:42:51.733Z', 'david@depowell.com', 'David', 'Powell', 'Country Club Hills', 'Word of mouth', NULL),
('2018-04-23T17:26:12.104Z', 'bobstep1950@gmail.com', 'Bob', 'Stephenson', 'Pine Ridge', 'Villages Computer Club', NULL),
('2018-05-18T14:29:20.264Z', 'realmoxies@hotmail.com', 'John', 'Hughes', 'Tamarind', 'Tv computer club meetingmeeting', NULL),
('2018-05-22T17:22:56.174Z', 'pheffner@outlook.com', 'Paul', 'Heffner', 'Moving in this summer', 'Online', NULL),
('2018-06-01T00:07:58.413Z', 'vsam@att.net', 'Michael', 'Smiith', 'Liberity Park', 'Newspaper', NULL),
('2018-07-20T12:55:26.782Z', 'bjornw8@gmail.com', 'Bjorn', 'Wolfhagen', 'Tamarind Grove', 'A friend', NULL),
('2018-07-28T22:26:13.098Z', 'mikebigg2@embarqmail.com', 'michael', 'Simonds', 'winefred', 'Newspaper', NULL),
('2018-08-16T14:22:43.036Z', 'steven.l.tarpley@gmail.com', 'Steve', 'Tarpley', 'Bonita', 'Word of mouth', NULL),
('2018-08-21T13:06:16.341Z', 'jbornhorst@hotmail.com', 'Joel', 'Bornhorst', 'Santo Domingo', 'Word of mouth', NULL),
('2018-08-25T12:40:33.626Z', 'chuckmail22@gmail.com', 'Chuck', 'Varwig', 'DeLaVista North', 'Online', NULL),
('2018-09-04T18:37:37.697Z', 'rekram3@frontier.com', 'Susan', 'Marker', 'Sanibel', 'Computer plus class', NULL),
('2018-09-04T18:39:01.759Z', 'jim.armstrong30@gmail.com', 'Jim', 'Armstrong', 'Bridgeport of Lake Sumter', 'Villages iPad Club', NULL),
('2018-09-08T14:53:23.455Z', 'eldred@bu.edu', 'William', 'Eldred', 'William D. Eldred', 'Newspaper', NULL),
('2018-09-13T12:26:52.012Z', 'pinellasmary@gmail.com', 'Mary', 'Steelman', 'Pinellas', 'Online', NULL),
('2018-09-14T12:57:01.240Z', 'osborn_bill@hotmail.com', 'Bill', 'Osborn', 'Dunedin', NULL, NULL),
('2018-10-06T11:11:10.946Z', 'yulke@rushsys.com', 'David', 'Yulke', 'Hillsborough', 'Word of mouth', NULL),
('2018-10-13T15:05:41.270Z', 'terrycp@comcast.net', 'Terry', 'Camp', 'Buttonwood', 'Newspaper', NULL),
('2018-11-01T21:47:27.087Z', 'bm9717@aol.com', 'Bob', 'Cline', 'Pine Hills', 'Newspaper', NULL),
('2018-11-02T13:08:03.768Z', 'joequinn417@gmail.com', 'Joe', 'Quinn', 'Pine Hills', 'Online', NULL),
('2018-11-04T17:51:36.752Z', 'seachess@gmail.com', 'Dan', 'O''Brien', 'Hacienda East', 'Rec news', NULL),
('2018-11-05T13:50:26.470Z', 'lfhaines@gmail.com', 'Lynne', 'Haines', 'Springdale', 'Talk of The Villages club listing', NULL),
('2018-12-06T15:44:26.639Z', 'kmnoble@bellsouth.net', 'Mike', 'Noble', 'Hillsborough', 'Word of mouth', NULL),
('2018-12-16T22:15:48.932Z', 'marko.palmer@gmail.com', 'Mark', 'Palmer', 'Amelia', 'Computer plus club', NULL),
('2019-01-03T19:46:04.251Z', 'wineman13@gmail.com', 'Tony', 'Gallo', 'Terra del soul', 'Newspaper', NULL),
('2019-02-01T01:13:35.196Z', 'hwduke@gmail.com', 'Wayne', 'Duke', 'Orange Blossom', 'Member of 3d Print and small computer group', NULL),
('2019-02-06T16:08:14.101Z', 'k9nd@comcast.net', 'Rick', 'Beil', 'Guest - Poincinna', 'Guest of Don & Patti Carlson', NULL),
('2019-02-08T01:56:37.036Z', 'brooks@rimesrv.net', 'Brooks', 'Rimes', 'Amelia', 'Newspaper', NULL),
('2019-02-08T22:36:30.015Z', 'Artrobot101@gmail.com', 'Art', 'Wingerden', 'Fernandina', 'Village Newspaper', NULL),
('2019-02-21T21:30:24.012Z', 'rfh@hallshome.org', 'Ron', 'Hall', 'St. James', 'Word of mouth', NULL),
('2019-02-28T14:27:47.342Z', 'dsvacc@gmail.com', 'Donna', 'Vaccaro', 'Orange Blossom', 'Newspaper', NULL),
('2019-03-01T01:16:44.951Z', 'sssd90@earthlink.net', 'David', 'Vanderwall', 'Lynnhaven', 'Online', NULL),
('2019-03-02T11:13:49.084Z', 'wxbuoy@aol.com', 'David', 'Bear', 'Deaton', 'Word of mouth', NULL),
('2019-03-04T18:21:40.864Z', 'mhmcd@mchsi.com', 'Michael', 'McDonald', 'Osceola Hills', 'I can''t recall how i heard about the group', NULL),
('2019-03-06T13:38:57.158Z', 'Trooperwon1@verizon.net', 'Amaury', 'Maldonado', 'Santo Domingo', 'The Villages Recreation & Parks News', NULL),
('2019-03-07T21:53:00.217Z', 'perry.stiles@gmail.com', 'Perry', 'Stiles', 'Charlette', 'Online', NULL),
('2019-03-15T00:22:35.888Z', 'itspyder@gmail.com', 'Dale', 'Moyer', 'Fenney', 'Newspaper', NULL),
('2019-04-14T02:37:04.025Z', 'ken@nightly.com', 'Ken', 'Keogh', 'Poinciana', 'Online', NULL),
('2019-04-22T17:43:39.607Z', 'don@dnwemail.com', 'Don', 'Wills', 'Pennecamp', 'Weekly club meeting newspaper', NULL),
('2019-05-01T13:06:21.140Z', 'rsetterlund@gmail.com', 'Robert', 'Setterlund', 'Hemingway', 'Word of mouth', NULL),
('2019-05-01T19:33:32.823Z', 'mluttman1@gmail.com', 'Michael', 'Luttman', 'Glenbrook', 'Online', NULL),
('2019-06-14T16:34:07.372Z', 'mike53tv@comcast.net', 'Michael', 'Gleim', 'Liberty Park', 'Online', NULL),
('2019-08-11T22:56:09.988Z', 'paavent@gmail.com', 'Patricia', 'Avent', 'St. Charles', 'Newspaper', NULL),
('2019-08-12T16:18:41.708Z', 'joeint57@gmail.com', 'Joseph', 'Intravaia', 'Joseph Intravaia', 'Online', NULL),
('2019-08-15T20:13:53.159Z', 'foyec@aol.com', 'Chris', 'Foye', 'El Cortez', 'Need help with broken glass on mini I-pad', NULL),
('2019-08-15T23:15:51.165Z', 'davidaneiss@gmail.com', 'David', 'Neiss', 'moving to TV next year', 'TOTV', NULL),
('2019-08-16T01:04:35.768Z', 'wb2art@gmail.com', 'Ken', 'Kaplan', 'LaBelle', 'Word of mouth', NULL),
('2019-08-16T11:37:59.191Z', 'ra77@rantolick.net', 'Rich', 'Antolick', 'McClure', 'Ham Radio club meeting', NULL),
('2019-08-16T13:46:54.662Z', 'kahuna32162@gmail.com', 'Robert', 'Clinton', 'Chatham', 'Online', NULL),
('2019-08-18T15:24:25.054Z', 'steve.tabler@gmail.com', 'Steve', 'Tabler', 'Orange Blossom Hills?', 'Nextdoor Digest', NULL),
('2019-08-20T14:25:47.136Z', 'mikeeregan@yahoo.com', 'Michael', 'Regan', 'Gilchrist', 'Representative came to Villages Amateur Radio Club meeting ', NULL),
('2019-08-21T13:47:35.563Z', 'sldavis447@gmail.com', 'Steve', 'Davis', 'Mallory Square', 'Online', NULL),
('2019-08-24T12:38:02.363Z', 'gbarryhammond@comcast.net', 'Barry', 'Hammond', 'Fernandina', 'Next Door', NULL),
('2019-09-09T22:40:06.519Z', 'DEANPREWITT01@GMAIL.COM', 'Dean', 'Prewitt', 'Pine Hills', 'Online', NULL),
('2019-09-13T01:21:22.529Z', 'john_working@bellsouth.net', 'John', 'McCollough', 'Briar Meadow', 'Word of mouth', NULL),
('2019-09-13T13:58:35.907Z', 'bkonell@gmail.com', 'Barry', 'Konell', 'Edgewater Bungalows at Sumter Landing', 'Newspaper', NULL),
('2019-09-14T09:44:04.655Z', 'irvjohnson@gmail.com', 'Irvin', 'Johnson', 'Osceola Hills', 'Science and Technology Group in The Vaillages', NULL),
('2019-09-14T19:11:58.893Z', 'mauroscop@gmail.com', 'mauro', 'scopino', 'polo ridge', 'Online', NULL),
('2019-09-15T07:08:25.949Z', 'stryker.hargrove@gmail.com', 'Al', 'Matthews', 'Poinciana ', 'Ham club visit', NULL),
('2019-09-16T23:34:57.399Z', 'ronklock2@gmail.com', 'Ron', 'Klock', 'Charlotte', 'Newspaper', NULL),
('2019-09-18T00:10:23.397Z', 'ars.w8rcw@gmail.com', 'Rich', 'Weigold', 'LaBelle North', 'Word of mouth', NULL),
('2019-09-18T00:54:33.177Z', 'jhnidy@gmail.com', 'Jerry', 'Hnidy', 'McClure', 'Online', NULL),
('2019-09-21T15:37:21.139Z', 'dtbonnell@comcast.net', 'Dale', 'Bonnell', 'Talltrees', 'Newspaper', NULL),
('2019-09-24T15:35:02.710Z', 'ollmgmt3@gmail.com', 'Stuart', 'Arthur', 'Fenney', 'Online', NULL),
('2019-10-01T00:33:48.979Z', 'bobb@rv-journey.com', 'Bob', 'Betz', 'Hemingway', 'Online', NULL),
('2019-10-03T00:34:35.424Z', 'vance1956@gmail.com', 'vance', 'lorenzana', 'de la vista', 'Word of mouth', NULL),
('2019-10-03T13:33:22.705Z', 'jsadam304@gmail.com', 'Scott', 'Adam', 'Charlotte', 'Belong to Villages Computer Club', NULL),
('2019-10-06T17:08:45.519Z', 'gary@pratt.pro', 'Gary', 'Pratt', 'Hacienda East', 'Online', NULL),
('2019-10-12T17:18:56.921Z', 'WVHAMMOND@GMAIL.COM', 'william', 'Hammond', 'McClure', 'Newspaper', NULL),
('2019-11-05T22:34:34.333Z', 'rjt1@cornel.edu', 'Robert (Bob)', 'Thomas', 'Alden Bungalows', 'Online', NULL),
('2019-11-07T22:46:24.973Z', 'rmcnall@gmail.com', 'Ralph', 'McNall', 'Pine Ridge', 'Newspaper', NULL),
('2019-11-08T00:13:46.477Z', 'elronmch@netscape.net', 'Ronald', 'McHenry', 'Winifred', 'Newspaper', NULL),
('2019-11-15T02:05:44.750Z', 'rmcnall@gmail.com', 'Ralph', 'McNall', 'Pine Ridge', 'Newspaper', NULL),
('2019-11-15T02:50:28.812Z', 'bardenbob@gmail.com', 'Bob', 'Barden ', 'Buttonwood', 'Newspaper', NULL),
('2019-11-19T12:46:23.906Z', 'mikerem48@gmail.com', 'Michael', 'Remsha', 'St. James', 'Newspaper', NULL),
('2019-11-19T13:48:40.368Z', 'bobjessup@live.com', 'Bob', 'Jessup', 'Dunneden', 'Newspaper', NULL),
('2019-11-19T13:58:57.020Z', 'ndscotto@comcast.net', 'Nick', 'Scotto', 'Lynnhaven', 'Newspaper', NULL),
('2019-11-19T16:39:50.482Z', 'ivor.thorne@btinternet.com', 'Ivor', 'Thorne', 'Pine Ridge', 'Newspaper', NULL),
('2019-11-19T16:39:53.402Z', 'bobnanc70@gmail.com', 'Robert', 'Richmond', 'Da LA Vista', 'Newspaper', NULL),
('2019-11-19T17:02:45.017Z', 'postmaster@normanabbott.plus.com', 'norman', 'abbott', 'silverlake', 'Newspaper', NULL),
('2019-11-19T17:03:11.400Z', 'mantfam@yahoo.com', 'Hans', 'Mantel', 'Hadley', 'Newspaper', NULL),
('2019-11-19T17:48:03.992Z', 'martha.k.friedman@gmail.com', 'Martha', 'Friedman', 'Ashland ', 'Newspaper', NULL),
('2019-11-19T17:58:56.831Z', 'nevinmann@yahoo.com', 'Nevin', 'Mann', 'Pennecamp', 'Newspaper', NULL),
('2019-11-19T18:03:15.394Z', 'bleyrh@gmail.com', 'Rick', 'Bley', 'De La Vista West', 'Newspaper', NULL),
('2019-11-19T18:14:52.640Z', 'larrydonnelly1990@gmail.com', 'Larry', 'Donnelly', 'DeSoto', 'Newspaper', NULL),
('2019-11-19T20:10:43.948Z', 'bpeterson@netheatre.com', 'Bob ', 'Peterson ', 'Sabel chase ', 'Newspaper', NULL),
('2019-11-19T20:14:36.583Z', 'jjones1241@live.com', 'James (Jim)', 'Jones', 'Dunedin', 'Newspaper', NULL),
('2019-11-19T20:14:52.141Z', 'leed2211@hotmail.com', 'Lee', 'DiDomenico', 'Mission Hills', 'Newspaper', NULL),
('2019-11-20T00:47:14.175Z', 'helwig.ken@yahoo.com', 'Ken', 'Helwig', 'Sunset Point', 'Newspaper', NULL),
('2019-11-20T03:53:05.615Z', 'e.krome@comcast.net', 'Ed', 'Krome ', 'Amelia', 'Newspaper', NULL),
('2019-11-20T15:01:48.462Z', 'hoot2602@yahoo.com', 'Mike', 'Hutmacher', 'Dunedin', 'Newspaper', NULL),
('2019-11-20T15:26:42.171Z', 'reoprisu1952@gmail.com', 'Rick', 'Oprisu', 'Lynnhaven', 'Newspaper', NULL),
('2019-11-20T15:33:59.728Z', 'rich_jeff_1@yahoo.com', 'Rich', 'Laramee', 'poinciana', 'Newspaper', NULL),
('2019-11-20T20:13:09.580Z', 'mahaessly60@gmail.com', 'Michael', 'Haessly', 'Lake Deaton', 'Word of mouth', NULL),
('2019-11-20T21:33:56.249Z', 'salotd@comcast.net', 'David', 'Salot', 'McClure', 'Newspaper', NULL),
('2019-11-21T16:13:28.613Z', 'RL2010@att.net', 'Richard', 'Landau', 'Collier', 'Newspaper', NULL),
('2019-11-24T23:50:05.193Z', 'lbenjamin@gmail.com', 'Lawrence', 'Benjamin', 'Dunedin', 'Word of mouth', NULL),
('2019-11-26T23:46:30.229Z', 'truebj@hotmail.com', 'James', 'Trueblood', 'Monarch Grove', 'Newspaper', NULL),
('2019-12-02T13:51:49.790Z', 'eqcm_patterson@yahoo.com', 'Jerry', 'Patterson', 'Lake Deaton', 'Word of mouth', NULL),
('2019-12-03T20:14:38.965Z', 'zy1981@me.com', 'Ed', 'Haynes', 'Oscelola Hills at Soaring Eagle', 'Newspaper', NULL),
('2019-12-13T16:54:37.961Z', 'johns2947@gmail.com', 'John', 'Sullivan', 'Marsh Bend', 'the Villages Computer Club', NULL),
('2019-12-16T01:07:43.445Z', 'scalinghammer@gmail.com', 'Ed', 'Henry', 'Fenney', 'Newspaper', NULL),
('2019-12-16T15:47:07.165Z', 'lpeterson52@cfl.rr.com', 'Larry', 'Peterson', 'Collier', 'Word of mouth', NULL),
('2019-12-16T16:39:14.405Z', 'gper3333@gmail.com', 'GARY', 'PETT', 'Monarch Grove', 'Newspaper', NULL),
('2019-12-26T00:02:10.566Z', 'peter.kaub@comcast.net', 'Peter', 'Kaub', 'Creekside', 'Online', NULL),
('2019-12-29T16:28:29.365Z', 'slpierce32@gmail.com', 'Stephen', 'Pierce', 'St James', 'Newspaper', NULL),
('2020-01-02T13:46:30.358Z', 'janseiffert54@gmail.com', 'Jan', 'Seiffert ', 'Pine Hills', 'Newspaper', NULL),
('2020-01-09T20:53:06.151Z', 'jerryodonnell@gmail.com', 'Jerry', 'ODonnell', 'Pennecamp', 'Newspaper', NULL),
('2020-01-11T03:04:52.737Z', 'wanda2728@yahoo.com', 'Wanda', 'Freeman', 'Wanda Freeman', 'friend', NULL),
('2020-01-14T16:05:21.100Z', 'pcantele@gmail.com', 'Peter', 'Cantele', 'Peter A Cantele', 'I don''t remember.', NULL),
('2020-01-14T18:56:37.339Z', 'richardhaddrill@aol.com', 'Richard', 'Haddrill', 'Buttonwood', 'Newspaper', NULL),
('2020-01-15T02:00:09.712Z', 'edandhar@hotmail.com', 'Edward', 'Chanen', 'Edward Chanen', 'Newspaper', NULL),
('2020-01-17T16:07:00.808Z', 'junkycedar@gmail.com', 'Kathy', 'Fairfield', 'DeSoto', 'Newspaper', NULL),
('2020-01-29T00:33:52.843Z', 'rchristiansen10@gmail.com', 'Roger', 'Christiansen', 'Roger P Christiansen', 'Online', NULL),
('2020-02-13T21:12:11.960Z', 'dsinila@yahoo.com', 'Dwight', 'Sinila', 'Osceola Holls', 'Word of mouth', NULL),
('2020-02-26T02:19:41.945Z', 'rforkun@gmail.com', 'Richard', 'Forkun', 'Sanibel', 'Newspaper', NULL),
('2020-02-26T17:11:23.322Z', 'toolnut52@gmail.com', 'Ken', 'Thornburg', 'Del Mar', 'Newspaper', NULL),
('2020-02-29T20:58:34.225Z', 'chris@hexzero.com', 'Chris', 'Nelson', 'Dunedin', 'The Talk of the Villages - Club Search', NULL),
('2020-03-06T15:19:35.426Z', 'GORDYWESTPHAL@YAHOO.COM', 'GORDON', 'WESTPHAL', 'lakeshore cottages', 'Newspaper', NULL),
('2020-04-08T19:13:45.857Z', 'florida.bill@gmail.com', 'Bill', 'Fulford', 'Gilchrist', 'Online', NULL),
('2020-05-19T19:56:50.868Z', 'rzor@gmail.com', 'Bill', 'Sheldon', 'Sable Chase', 'Newspaper', NULL),
('2020-07-08T19:31:56.963Z', 'orbie1010@yahoo.com', 'Russ', 'Orebek', 'Orange Blossom Gardens', 'Online', NULL),
('2020-07-09T00:52:30.117Z', 'jpspoonhower@gmail.com', 'John', 'Spoonhower', 'Tamarind Grove', 'Newspaper', NULL),
('2020-08-02T17:37:56.334Z', 'ronploude@gmail.com', 'Ron', 'Ploude', 'Fenney', 'Newspaper', NULL),
('2020-08-03T00:38:52.148Z', 'davidshillingburg@yahoo.com', 'David', 'Shillingburg', 'Bridgeport at Lake Miona', 'Newspaper', NULL),
('2020-09-13T12:38:24.685Z', 'DonDavidson79@gmail.com', 'Don', 'Davidson', 'Lake Deaton', 'Net', NULL),
('2020-09-16T15:11:01.739Z', 'tjup418@gmail.com', 'Thomas', 'O''Boyle', 'Hadley', 'Word of mouth', '3D Printing'),
('2020-10-12T17:05:54.185Z', 'jayjayson620@yahoo.com', 'Jay', 'Jayson', 'osceola hills', 'Word of mouth', 'Small Computers, 3D Printing'),
('2020-10-12T19:24:31.025Z', 'bonnie.dorr@gmail.com', 'Bonnie', 'Dorr', 'Pinellas', 'Word of mouth', 'Small Computers'),
('2020-10-27T18:07:00.748Z', 'rzor435@gmail.com', 'Bill', 'Sheldon', 'Sabal Chase', 'Newspaper', 'Small Computers, 3D Printing'),
('2020-11-13T00:53:17.556Z', '6188ama@gmail.com', 'Barry', 'Killick', 'Bonnybrook', 'Web search', '3D Printing'),
('2020-12-01T17:55:54.060Z', 'Ryan.J.Alpaugh@gmail.com', 'Ryan', 'Alpaugh', 'Collier', 'VCC webpage', 'Small Computers, 3D Printing'),
('2021-01-17T16:11:41.093Z', 'djolsen7@gmail.com', 'David ', 'Olsen', 'Hadley', 'Gregg Cieslak', 'Small Computers'),
('2021-01-18T17:41:53.318Z', 'trippdon@msn.com', 'Don', 'Tripp', 'Pennacamp', 'Newspaper', '3D Printing'),
('2021-01-23T20:47:09.757Z', 'DonDavidson79@gmail.com', 'Donald', 'Davidson', 'Lake Deaton', 'Word of mouth', 'Small Computers'),
('2021-02-06T12:49:45.782Z', 'bolandd@gmail.com', 'David', 'Boland', 'Marsh Bend', 'Facebook Group', 'Small Computers, 3D Printing'),
('2021-02-09T15:58:49.979Z', 'jamesshorr@gmail.com', 'James', 'Shorr', 'Winifred', 'Word of mouth', '3D Printing'),
('2021-02-09T20:53:08.626Z', 'marcia32162@gmail.com', 'Marcia', 'Jandzio', 'Pine Hills', 'Newspaper', '3D Printing'),
('2021-02-11T23:52:25.380Z', 'thorwald.eide@embarqmail.com', 'Thorwald', 'Eide', 'Largo', 'Newspaper', '3D Printing');

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

DROP TABLE IF EXISTS `printers`;
CREATE TABLE IF NOT EXISTS `printers` (
  `printerNbr` int(7) NOT NULL,
  `printerName` varchar(30) NOT NULL,
  `printerDescription` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`printerNbr`, `printerName`, `printerDescription`) VALUES
(0, 'Creality CR-20 Pro', 'The Creality 3D printer line is completely open-source, allowing for add-ons and upgrades of almost every component on the machine.<br />\r\n<br />\r\nPrinter size: 420 ✕ 410 ✕ 470 mm<br />\r\nPrint area: 220 ✕ 220 ✕ 250 mm<br />\r\nPrinter weight: 7.5kg<br />\r\nMax. nozzle temp: 260°C'),
(2, 'Creality Ender-5', ''),
(3, 'Creality CR10', '.'),
(4, 'Creality Ender-3', ''),
(6, 'Hictop', ''),
(7, 'Tronxy', ''),
(8, 'Prusa I3 MK3', ''),
(9, 'Prusa Mini', ''),
(10, 'Prusa SL', ''),
(12, 'Makerbot Replicator 2x', ''),
(14, 'XYZ DaVinci mini w+', ''),
(15, 'FLSun', 'FLSun<br />\r\n<br />\r\nDetailed description goes here.'),
(16, '*none', ''),
(17, 'Snapmaker', ''),
(18, 'Flux Beamo', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
`rcdNbr` int(11) NOT NULL,
  `lowLeftPhoto` varchar(20) NOT NULL,
  `lowLeftText` varchar(600) NOT NULL,
  `lowRightPhoto` varchar(20) NOT NULL,
  `lowRightText` varchar(600) NOT NULL,
  `groupName` varchar(50) NOT NULL,
  `moderatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`rcdNbr`, `lowLeftPhoto`, `lowLeftText`, `lowRightPhoto`, `lowRightText`, `groupName`, `moderatedBy`) VALUES
(1, 'hot5', 'A new Reference Library app has been released for the use of all HandsOnTech club members.  A user guide is available from the above menu selection: Help >>.', 'hot2', 'Our next scheduled meeting is on 1/25/2022	Tue 6:30p - Rohan Rec Ctr	Small Computers.', 'vhotsmcomp', 'Moderated by Yang Shen'),
(2, 'hot5', 'A new Reference Library app has been released for the use of all HandsOnTech club members.  A user guide is available from the above menu selection: Help >>.', 'hot2', 'Our next scheduled meeting is on 1/25/2022	Tue 6:30p - Rohan Rec Ctr	Small Computers.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
`rcdNbr` smallint(7) NOT NULL,
  `groupName` varchar(20) NOT NULL,
  `topicDescription` varchar(40) NOT NULL,
  `topicQualifiedSearch` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`rcdNbr`, `groupName`, `topicDescription`, `topicQualifiedSearch`) VALUES
(5, '', 'Blinky', 'blinky'),
(6, '', 'Whiteboard', 'whiteboard'),
(7, '', 'On-Ramp', 'onramp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
 ADD UNIQUE KEY `rcdNbr_2` (`rcdNbr`), ADD KEY `rcdNbr` (`rcdNbr`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD UNIQUE KEY `rcdNbr` (`rcdNbr`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- Indexes for table `memberSpreadsheet`
--
ALTER TABLE `memberSpreadsheet`
 ADD PRIMARY KEY (`timestamp`), ADD UNIQUE KEY `timestamp` (`timestamp`);

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
 ADD PRIMARY KEY (`printerNbr`), ADD UNIQUE KEY `printerNbr` (`printerNbr`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`rcdNbr`), ADD UNIQUE KEY `rcdNbr` (`rcdNbr`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD UNIQUE KEY `rcdNbr` (`rcdNbr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
MODIFY `rcdNbr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `rcdNbr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `rcdNbr` smallint(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
