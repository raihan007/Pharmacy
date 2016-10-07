-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 07:45 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erp_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_history`
--

CREATE TABLE IF NOT EXISTS `access_history` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `LoginTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `access_history`
--

INSERT INTO `access_history` (`EntityNo`, `UserId`, `LoginTime`) VALUES
(1, '5925025E-8C57-48C7-BB68-187A52F26926', '2016-09-15 13:22:54'),
(2, 'FC9F2761-3F2B-41D3-8523-1AA438454193', '2016-09-15 13:22:54'),
(3, 'FC9F2761-3F2B-41D3-8523-1AA438454193', '2016-09-15 13:23:21'),
(4, '5925025E-8C57-48C7-BB68-187A52F26926', '2016-09-15 13:23:21'),
(5, 'FC9F2761-3F2B-41D3-8523-1AA438454193', '2016-07-12 12:20:30'),
(6, '5925025E-8C57-48C7-BB68-187A52F26926', '2016-06-14 08:14:21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `access_history_view`
--
CREATE TABLE IF NOT EXISTS `access_history_view` (
`EntityNo` int(11)
,`FullName` varchar(41)
,`Email` varchar(50)
,`LoginTime` datetime
);
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`EntityNo` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Remarks` varchar(300) NOT NULL,
  `LastChanged` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastChangedBy` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`EntityNo`, `Title`, `Remarks`, `LastChanged`, `LastChangedBy`) VALUES
(3, 'Antacids', 'Drugs that relieve indigestion and heartburn by neutralizing stomach acids', '2016-10-03 16:48:14', '5925025E-8C57-48C7-BB68-187A52F26926'),
(4, 'Antibiotics', 'Drugs made from naturally occurring and synthetic substances that combat bacterial infection. Some\r\nantibiotics are effective only against limited types of bacteria. Others, known as broad spectrum antibiotics, are effective\r\nagainst a wide range of bacteria', '2016-10-03 16:54:53', '5925025E-8C57-48C7-BB68-187A52F26926'),
(5, 'Analgesics', 'Drugs that relieve pain. There are two main types: non-narcotic analgesics for mild pain, and\r\nnarcotic analgesics for severe pain', '2016-10-03 16:59:14', '5925025E-8C57-48C7-BB68-187A52F26926'),
(6, 'Vitamins', 'Chemicals essential in small quantities for good health. Some vitamins are not manufactured by the body, but\r\nadequate quantities are present in a normal diet. People whose diets are inadequate or who have digestive tract or liver\r\ndisorders may need to take supplementary vitamins', '2016-10-03 17:18:37', '5925025E-8C57-48C7-BB68-187A52F26926'),
(7, 'Antipyretics', 'Drugs that reduce fever', '2016-10-03 17:29:54', '5925025E-8C57-48C7-BB68-187A52F26926');

-- --------------------------------------------------------

--
-- Table structure for table `dealers_info`
--

CREATE TABLE IF NOT EXISTS `dealers_info` (
`EntityNo` int(11) NOT NULL,
  `DealerId` varchar(50) NOT NULL,
  `DealerTitle` varchar(150) NOT NULL,
  `DealerAddress` varchar(200) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `LastChanged` datetime NOT NULL,
  `LastChangedBy` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dealers_info`
--

INSERT INTO `dealers_info` (`EntityNo`, `DealerId`, `DealerTitle`, `DealerAddress`, `City`, `Country`, `Phone`, `Email`, `Fax`, `Remarks`, `LastChanged`, `LastChangedBy`) VALUES
(1, '5E90F9A9-13E7-46D8-923D-C60F325E6B9D', 'Acme Pharmaceutical (Pvt.) Ltd.', 'House # 5, Road # 12/A, Satmosjit Road, Dhanmondi', 'Dhaka - 1209', 'Bangladesh', '+880-2-8118692', 'acme@acme.net', '+880-2-9340140', 'Leading Medicine Importers, Exporters & Distributors', '2016-09-24 06:21:48', '5925025E-8C57-48C7-BB68-187A52F26926'),
(2, 'C442A171-5196-4CF4-A8E6-101E12584A03', 'A.N. International Ltd.', 'Prachi-Niket, (5th floor), 54, Dilkusha C/A, Motijheel', 'Dhaka - 1000', 'Bangladesh', '+880-2-9553616, 9555150', 'a.n.inter@gmail.com', '+880-2-9567672', 'Leading Medicine Importers, Exporters & Distributors', '2016-09-24 08:26:45', '5925025E-8C57-48C7-BB68-187A52F26926'),
(3, 'A0E739AA-4B6C-4488-99FB-18ED643EFA69', 'Alfa Scientific Co.', '33/3 Hatkhola Road', 'Dhaka - 1203', 'Bangladesh', '+880-2-7114325, 7113296', 'alfa@gmail.com', '+880-2-9567736', 'Exclusive Distributor of HITACHI?s Analytical & Quality Control (QC) Equipments with General & Life Science Products from Bibby Scientific (Jenway, Stuart & Techno) in Bangladesh.', '2016-09-25 18:34:01', '5925025E-8C57-48C7-BB68-187A52F26926'),
(4, '6F8E82A1-E1A6-46E3-8BFB-8A8EAA2FA508', 'Hyeimpex International (Pvt.) Ltd.', 'A.M. Plaza (3rd floor), 76 DIT Road, Malibagh', 'Dhaka - 1217', 'Bangladesh', '+880-2-8316895, 8321468', 'hyeimpex@gmail.com', '+880-2-8316897', 'Leading Medicine Importers, Exporters & Distributors', '2016-09-25 18:41:55', '5925025E-8C57-48C7-BB68-187A52F26926'),
(5, 'BDC46075-E491-4639-AF0F-F58F9FD38F78', 'S.A. Surgicals', '5/2, Topkhana Road, BMA Bhaban, Shop 7, (1st Floor)', 'Dhaka-1000', 'Bangladesh', '9587428, 01977-699111', 's.a.surgicals@ymail.com', '+88-02-9577540', '', '2016-09-25 18:44:42', '5925025E-8C57-48C7-BB68-187A52F26926'),
(6, 'ADA958AF-8A82-46DF-909B-00BADAF50123', 'Surgicals', 'dvfdgfd', 'Dhaka-1000', 'Bangladesh', '9587428, 01977-699111', 'surgicals@ymail.com', '+88-02-9577540', '', '2016-09-25 18:46:10', '5925025E-8C57-48C7-BB68-187A52F26926');

-- --------------------------------------------------------

--
-- Table structure for table `dt_user_permission`
--

CREATE TABLE IF NOT EXISTS `dt_user_permission` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `PermissionNo` int(5) NOT NULL,
  `LastChanged` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastChangedBy` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dt_user_permission`
--

INSERT INTO `dt_user_permission` (`EntityNo`, `UserId`, `PermissionNo`, `LastChanged`, `LastChangedBy`) VALUES
(1, '5925025E-8C57-48C7-BB68-187A52F26926', 1000, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(3, '5925025E-8C57-48C7-BB68-187A52F26926', 1002, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(4, '5925025E-8C57-48C7-BB68-187A52F26926', 1003, '2016-09-19 20:35:08', '5925025E-8C57-48C7-BB68-187A52F26926'),
(5, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 2001, '2016-09-19 22:20:07', '5925025E-8C57-48C7-BB68-187A52F26926'),
(6, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 2000, '2016-09-19 22:20:07', '5925025E-8C57-48C7-BB68-187A52F26926'),
(7, '5925025E-8C57-48C7-BB68-187A52F26926', 2002, '2016-09-22 20:14:01', '5925025E-8C57-48C7-BB68-187A52F26926'),
(9, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 2002, '2016-09-22 20:15:02', '5925025E-8C57-48C7-BB68-187A52F26926'),
(10, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 2003, '2016-09-25 18:29:19', '5925025E-8C57-48C7-BB68-187A52F26926'),
(11, '5925025E-8C57-48C7-BB68-187A52F26926', 2000, '2016-10-02 18:22:23', '5925025E-8C57-48C7-BB68-187A52F26926');

-- --------------------------------------------------------

--
-- Table structure for table `email_send`
--

CREATE TABLE IF NOT EXISTS `email_send` (
`EntityNo` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(300) NOT NULL,
  `SendAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medicines_info`
--

CREATE TABLE IF NOT EXISTS `medicines_info` (
`EntityNo` int(11) NOT NULL,
  `MedicineId` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Category` int(11) NOT NULL,
  `BatchNumber` varchar(11) NOT NULL,
  `Manufacturer` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `EntryDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProductionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ExpireDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BuyingPrice` double(10,2) NOT NULL,
  `SellingPrice` double(10,2) NOT NULL,
  `LastChanged` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastChangedBy` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `medicines_info`
--

INSERT INTO `medicines_info` (`EntityNo`, `MedicineId`, `Name`, `Category`, `BatchNumber`, `Manufacturer`, `Quantity`, `EntryDate`, `ProductionDate`, `ExpireDate`, `BuyingPrice`, `SellingPrice`, `LastChanged`, `LastChangedBy`) VALUES
(2, '11C97114-3942-4388-B50E-95956CD1AD30', 'dsgdgdfg', 3, 'dsfdsfds', '6F8E82A1-E1A6-46E3-8BFB-8A8EAA2FA508', 12, '2016-10-07 00:00:00', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 11.00, 122.00, '2016-10-07 19:19:20', '5925025E-8C57-48C7-BB68-187A52F26926'),
(7, '212C7A54-4CD4-4362-BB4B-2C9EA7C82589', 'fdsfsdfsdf', 5, '232432432', 'BDC46075-E491-4639-AF0F-F58F9FD38F78', 23, '2016-10-07 00:00:00', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 345.00, 350.00, '2016-10-07 19:41:27', '5925025E-8C57-48C7-BB68-187A52F26926'),
(5, '25ED6189-42F5-428A-AFD6-802A7322FC76', 'fsdfdsfsdfsd', 4, 'ddsf', 'A0E739AA-4B6C-4488-99FB-18ED643EFA69', 12, '2016-10-07 00:00:00', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 212.00, 145.00, '2016-10-07 19:34:20', '5925025E-8C57-48C7-BB68-187A52F26926'),
(4, '3DD981E3-5E32-4E9A-B6A7-08B14E500D8D', 'fdgfdgfd', 5, 'gfdgfdgf', 'ADA958AF-8A82-46DF-909B-00BADAF50123', 233, '2016-10-07 00:00:00', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 34.00, 45.00, '2016-10-07 19:28:53', '5925025E-8C57-48C7-BB68-187A52F26926'),
(6, '6C26DC03-2C74-438C-9ED0-A95A02E67952', 'gfgfdg', 6, 'gfdgdfgdf', 'BDC46075-E491-4639-AF0F-F58F9FD38F78', 2323, '2016-10-07 00:00:00', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 233.00, 234.00, '2016-10-07 19:40:11', '5925025E-8C57-48C7-BB68-187A52F26926'),
(8, 'A5671687-E362-447D-BD6E-80511A2842B8', 'dfdsfsdfsdfsd', 5, '232432432', 'BDC46075-E491-4639-AF0F-F58F9FD38F78', 23, '2016-10-07 00:00:00', '2016-10-07 00:00:00', '2016-10-07 00:00:00', 345.00, 350.00, '2016-10-07 19:42:57', '5925025E-8C57-48C7-BB68-187A52F26926'),
(1, 'E1886147-32F8-44BC-8FF3-596980920808', 'Napa', 3, '325486', '5E90F9A9-13E7-46D8-923D-C60F325E6B9D', 50, '2016-10-06 22:41:13', '2016-10-06 22:41:13', '2016-10-06 22:41:13', 10.00, 15.00, '2016-10-06 22:41:13', '5925025E-8C57-48C7-BB68-187A52F26926');

-- --------------------------------------------------------

--
-- Table structure for table `selldetails_info`
--

CREATE TABLE IF NOT EXISTS `selldetails_info` (
`EntityNo` int(11) NOT NULL,
  `SellDetailsId` varchar(50) NOT NULL,
  `MedicineId` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Cost` double(10,5) NOT NULL,
  `SellId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sells_info`
--

CREATE TABLE IF NOT EXISTS `sells_info` (
`EntityNo` int(11) NOT NULL,
  `SellId` varchar(50) NOT NULL,
  `SellDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cost` double(10,5) NOT NULL,
  `Discount` double(10,5) NOT NULL,
  `Vat` double(10,5) NOT NULL,
  `TotalCost` double(10,5) NOT NULL,
  `SelledBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE IF NOT EXISTS `users_info` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Gender` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Photo` varchar(150) DEFAULT NULL,
  `PermanentAddress` varchar(150) NOT NULL,
  `PresentAddress` varchar(150) NOT NULL,
  `PhoneNo` varchar(20) NOT NULL,
  `Birthdate` date NOT NULL,
  `BloodGroup` varchar(5) NOT NULL,
  `NationalIdNo` varchar(50) NOT NULL,
  `JoinDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Role` varchar(10) NOT NULL DEFAULT 'Employee',
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`EntityNo`, `UserId`, `FirstName`, `LastName`, `Gender`, `Email`, `Photo`, `PermanentAddress`, `PresentAddress`, `PhoneNo`, `Birthdate`, `BloodGroup`, `NationalIdNo`, `JoinDate`, `Role`, `CreatedBy`, `CreatedTime`) VALUES
(2, '5925025E-8C57-48C7-BB68-187A52F26926', 'Raihan', 'Talukder', 'Male', 'raihan.cse92@gmail.com', '5925025E-8C57-48C7-BB68-187A52F26926.jpg', '257,East Goran,Dhaka-1219', '257,East Goran,Dhaka-1219', '01685072115', '1993-08-10', 'O+', '10-08-1992-raihan', '2016-09-15 15:36:55', 'Manager', NULL, '2016-09-09 15:12:42'),
(3, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 'Mr. Korim', 'Ali', 'Male', 'korim_it_coaching@gmail.com', 'E4CFB1F7-E63A-4659-BAE1-C1CDC66ECB3F.jpg', 'Bangladesh', 'Bangladesh', '+880170000000', '2016-09-13', 'A+', '10-08-1992-raihan', '2016-09-15 15:36:55', 'Employee', NULL, '2016-09-10 07:15:45');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_info_view`
--
CREATE TABLE IF NOT EXISTS `users_info_view` (
`EntityNo` int(11)
,`UserId` varchar(50)
,`FirstName` varchar(20)
,`LastName` varchar(20)
,`Gender` varchar(11)
,`Email` varchar(50)
,`Photo` varchar(150)
,`PermanentAddress` varchar(150)
,`PresentAddress` varchar(150)
,`PhoneNo` varchar(20)
,`Birthdate` date
,`BloodGroup` varchar(5)
,`NationalIdNo` varchar(50)
,`JoinDate` datetime
,`Role` varchar(10)
,`CreatedBy` varchar(50)
,`CreatedTime` datetime
,`Username` varchar(20)
,`Password` varchar(130)
);
-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
`EntityNo` int(11) NOT NULL,
  `UserId` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(130) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`EntityNo`, `UserId`, `Username`, `Password`) VALUES
(2, '5925025E-8C57-48C7-BB68-187A52F26926', 'raihan', '8854e89fab187685f0492556f2ef73d97505f541a2bbeea22a4eb59d1534f3aadcc7a97a70d2f4137988971638a59653c459a9f8d4427eab43369894905b7e1c'),
(1, 'FC9F2761-3F2B-41D3-8523-1AA438454193', 'Raihan_007', '$2y$10$dOfNhzhE9c37IMIkg9ORi.DmbK6Qloq5GAcLnuZDcExd5YnSb9d9S');

-- --------------------------------------------------------

--
-- Structure for view `access_history_view`
--
DROP TABLE IF EXISTS `access_history_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `access_history_view` AS select `access_history`.`EntityNo` AS `EntityNo`,concat(`users_info`.`FirstName`,' ',`users_info`.`LastName`) AS `FullName`,`users_info`.`Email` AS `Email`,`access_history`.`LoginTime` AS `LoginTime` from (`access_history` join `users_info` on((`access_history`.`UserId` = `users_info`.`UserId`)));

-- --------------------------------------------------------

--
-- Structure for view `users_info_view`
--
DROP TABLE IF EXISTS `users_info_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_info_view` AS select `users_info`.`EntityNo` AS `EntityNo`,`users_info`.`UserId` AS `UserId`,`users_info`.`FirstName` AS `FirstName`,`users_info`.`LastName` AS `LastName`,`users_info`.`Gender` AS `Gender`,`users_info`.`Email` AS `Email`,`users_info`.`Photo` AS `Photo`,`users_info`.`PermanentAddress` AS `PermanentAddress`,`users_info`.`PresentAddress` AS `PresentAddress`,`users_info`.`PhoneNo` AS `PhoneNo`,`users_info`.`Birthdate` AS `Birthdate`,`users_info`.`BloodGroup` AS `BloodGroup`,`users_info`.`NationalIdNo` AS `NationalIdNo`,`users_info`.`JoinDate` AS `JoinDate`,`users_info`.`Role` AS `Role`,`users_info`.`CreatedBy` AS `CreatedBy`,`users_info`.`CreatedTime` AS `CreatedTime`,`user_access`.`Username` AS `Username`,`user_access`.`Password` AS `Password` from (`users_info` join `user_access` on((`users_info`.`UserId` = `user_access`.`UserId`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_history`
--
ALTER TABLE `access_history`
 ADD PRIMARY KEY (`EntityNo`), ADD UNIQUE KEY `EntityNo` (`EntityNo`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`EntityNo`), ADD UNIQUE KEY `Title` (`Title`);

--
-- Indexes for table `dealers_info`
--
ALTER TABLE `dealers_info`
 ADD PRIMARY KEY (`EntityNo`), ADD UNIQUE KEY `DealerId` (`DealerId`), ADD UNIQUE KEY `DealerTitle` (`DealerTitle`);

--
-- Indexes for table `dt_user_permission`
--
ALTER TABLE `dt_user_permission`
 ADD PRIMARY KEY (`EntityNo`);

--
-- Indexes for table `email_send`
--
ALTER TABLE `email_send`
 ADD PRIMARY KEY (`EntityNo`);

--
-- Indexes for table `medicines_info`
--
ALTER TABLE `medicines_info`
 ADD PRIMARY KEY (`MedicineId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`MedicineId`);

--
-- Indexes for table `selldetails_info`
--
ALTER TABLE `selldetails_info`
 ADD PRIMARY KEY (`SellDetailsId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`SellDetailsId`);

--
-- Indexes for table `sells_info`
--
ALTER TABLE `sells_info`
 ADD PRIMARY KEY (`SellId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`SellId`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`,`Email`,`PhoneNo`,`NationalIdNo`), ADD UNIQUE KEY `Photo` (`Photo`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `EntityNo` (`EntityNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_history`
--
ALTER TABLE `access_history`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dealers_info`
--
ALTER TABLE `dealers_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dt_user_permission`
--
ALTER TABLE `dt_user_permission`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `email_send`
--
ALTER TABLE `email_send`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicines_info`
--
ALTER TABLE `medicines_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `selldetails_info`
--
ALTER TABLE `selldetails_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sells_info`
--
ALTER TABLE `sells_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
MODIFY `EntityNo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
