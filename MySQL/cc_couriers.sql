-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 08:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc_couriers`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `arrived`
-- (See below for the actual view)
--
CREATE TABLE `arrived` (
`TrackingID` int(11)
,`StaffID` varchar(30)
,`S_Name` varchar(30)
,`S_Add` varchar(50)
,`S_City` varchar(20)
,`S_State` varchar(20)
,`S_Contact` bigint(20)
,`R_Name` varchar(30)
,`R_Add` varchar(50)
,`R_City` varchar(20)
,`R_State` varchar(20)
,`R_Contact` bigint(20)
,`Weight_Kg` decimal(10,2)
,`Price` decimal(10,2)
,`Dispatched_Time` timestamp
,`Shipped` timestamp
,`Sending` timestamp
,`Delivered` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `Branch_id` int(11) NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `Manager_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`Branch_id`, `Address`, `Contact`, `Email`, `Manager_id`) VALUES
(1, '77/7, เมืองหนองคาย, หนองคาย 43000', 478656892, 'fast@nongkhai.com', 'FF001'),
(2, '12/1, เมืองขอนแก่น, ขอนแก่น 40000', 679534782, 'fast@khonkean.com', 'FF002'),
(3, '41/4, เมืองอุดรธานี, อุดรธานี 41000', 547953178, '๊fast@udon.com', 'FF003'),
(4, '99/9, เขตบางกะปิ, กรุงเทพมหานคร 10240', 257895643, 'fast@kungtep.com', 'FF004');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `StaffID` varchar(30) NOT NULL,
  `Pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`StaffID`, `Pwd`) VALUES
('FF001', '001'),
('FF002', '002'),
('FF003', '003'),
('FF004', '004');

-- --------------------------------------------------------

--
-- Stand-in structure for view `delivered`
-- (See below for the actual view)
--
CREATE TABLE `delivered` (
`TrackingID` int(11)
,`StaffID` varchar(30)
,`S_Name` varchar(30)
,`S_Add` varchar(50)
,`S_City` varchar(20)
,`S_State` varchar(20)
,`S_Contact` bigint(20)
,`R_Name` varchar(30)
,`R_Add` varchar(50)
,`R_City` varchar(20)
,`R_State` varchar(20)
,`R_Contact` bigint(20)
,`Weight_Kg` decimal(10,2)
,`Price` decimal(10,2)
,`Dispatched_Time` timestamp
,`Shipped` timestamp
,`Sending` timestamp
,`Delivered` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F.No` int(11) NOT NULL,
  `Cust_name` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Cust_mail` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `Cust_msg` varchar(500) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `TrackingID` int(11) NOT NULL,
  `StaffID` varchar(30) NOT NULL,
  `S_Name` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `S_Add` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `S_City` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `S_State` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `S_Contact` bigint(20) NOT NULL,
  `R_Name` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `R_Add` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `R_City` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `R_State` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `R_Contact` bigint(20) NOT NULL,
  `Weight_Kg` decimal(10,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Dispatched_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`TrackingID`, `StaffID`, `S_Name`, `S_Add`, `S_City`, `S_State`, `S_Contact`, `R_Name`, `R_Add`, `R_City`, `R_State`, `R_Contact`, `Weight_Kg`, `Price`, `Dispatched_Time`) VALUES
(10831, 'FF001', 'ชาญชล', '50/8', 'หนองคาย', 'หนองคาย', 621319253, 'ณฐมน', '485/8', 'ขอนแก่น', 'ขอนแก่น', 5456568, '2.75', '50.00', '2022-04-08 16:39:12'),
(10832, 'FF001', 'ชาญชล', '54/8', 'หนองคาย', 'หนองคาย', 621319253, 'ณฐมน', '44/8', 'ขอนแก่น', 'ขอนแก่น', 656566, '1.50', '50.00', '2022-04-08 17:21:19'),
(10833, 'FF003', 'ชาญชล', '447', 'หนองคาย', 'หนองคาย', 565656, 'นราทิป', '55/6', 'กรุงเทพมหานคร', 'กรุงเทพมหานคร', 556546565, '2.00', '50.00', '2022-04-08 17:43:31');

--
-- Triggers `parcel`
--
DELIMITER $$
CREATE TRIGGER `placeParcel` AFTER INSERT ON `parcel` FOR EACH ROW BEGIN
	UPDATE staff SET Credits=Credits+5 WHERE StaffID=NEW.StaffID;
    
    INSERT INTO status (TrackingID, StaffID, Dispatched)
    VALUES ( NEW.TrackingID, NEW.StaffID, NEW.Dispatched_Time);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `S.No` int(11) NOT NULL,
  `State_1` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `State_2` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`S.No`, `State_1`, `State_2`, `Cost`) VALUES
(1, 'หนองคาย', 'ขอนแก่น', 50),
(2, 'หนองคาย', 'อุดรธานี', 50),
(3, 'หนองคาย', 'กรุงเทพมหานคร', 50),
(4, 'ขอนแก่น', 'หนองคาย', 50),
(5, 'ขอนแก่น', 'อุดรธานี', 50),
(6, 'ขอนแก่น', 'กรุงเทพมหานคร', 50),
(7, 'อุดรธานี', 'หนองคาย', 50),
(8, 'อุดรธานี', 'ขอนแก่น', 50),
(9, 'อุดรธานี', 'กรุงเทพมหานคร', 50),
(10, 'กรุงเทพมหานคร', 'ขอนแก่น', 50),
(11, 'กรุงเทพมหานคร', 'อุดรธานี', 50),
(12, 'กรุงเทพมหานคร', 'หนองคาย', 50);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(30) NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Designation` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Gender` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `DOB` date NOT NULL,
  `DOJ` date NOT NULL,
  `Salary` int(11) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Credits` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Name`, `Designation`, `Gender`, `DOB`, `DOJ`, `Salary`, `Mobile`, `Email`, `Credits`) VALUES
('FF003', 'สาวอภิสรา ทองสังข์ ', 'ผู้จัดการสาขา', 'หญิง', '2000-08-17', '2022-04-08', 50000, 197539842, 'apisara@api.com', 5),
('FF004', 'ชัชชพล กิจทวีวาณิช', 'พนักงาน', 'ชาย', '2000-03-07', '2022-04-08', 18000, 658765317, 'chatchapon@chatcha.com', 0),
('FF001', 'ภานุพงศ์ สุขส่ง', 'ผู้จัดการสาขา', 'ชาย', '2000-04-02', '2022-04-08', 50000, 998999999, 'panupong@panu.com', 15),
('FF002', 'ภัณฑิรา แสนเรียน', 'พนักงาน', 'หญิง', '2000-01-03', '2022-04-08', 180000, 478555566, 'puntira@pun.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `TrackingID` int(11) NOT NULL,
  `StaffID` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Dispatched` timestamp NULL DEFAULT NULL,
  `Shipped` timestamp NULL DEFAULT NULL,
  `Sending` timestamp NULL DEFAULT NULL,
  `Delivered` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`TrackingID`, `StaffID`, `Dispatched`, `Shipped`, `Sending`, `Delivered`) VALUES
(10831, 'FF001', '2022-04-08 16:39:12', '2022-04-08 16:43:36', '2022-04-08 17:01:18', '2022-04-08 17:05:35'),
(10832, 'FF001', '2022-04-08 17:21:19', '2022-04-08 17:33:31', NULL, NULL),
(10833, 'FF003', '2022-04-08 17:43:31', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure for view `arrived`
--
DROP TABLE IF EXISTS `arrived`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arrived`  AS SELECT `p`.`TrackingID` AS `TrackingID`, `p`.`StaffID` AS `StaffID`, `p`.`S_Name` AS `S_Name`, `p`.`S_Add` AS `S_Add`, `p`.`S_City` AS `S_City`, `p`.`S_State` AS `S_State`, `p`.`S_Contact` AS `S_Contact`, `p`.`R_Name` AS `R_Name`, `p`.`R_Add` AS `R_Add`, `p`.`R_City` AS `R_City`, `p`.`R_State` AS `R_State`, `p`.`R_Contact` AS `R_Contact`, `p`.`Weight_Kg` AS `Weight_Kg`, `p`.`Price` AS `Price`, `p`.`Dispatched_Time` AS `Dispatched_Time`, `s`.`Shipped` AS `Shipped`, `s`.`Sending` AS `Sending`, `s`.`Delivered` AS `Delivered` FROM (`parcel` `p` join `status` `s`) WHERE `p`.`TrackingID` = `s`.`TrackingID` AND `s`.`Delivered` is null ;

-- --------------------------------------------------------

--
-- Structure for view `delivered`
--
DROP TABLE IF EXISTS `delivered`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `delivered`  AS SELECT `p`.`TrackingID` AS `TrackingID`, `p`.`StaffID` AS `StaffID`, `p`.`S_Name` AS `S_Name`, `p`.`S_Add` AS `S_Add`, `p`.`S_City` AS `S_City`, `p`.`S_State` AS `S_State`, `p`.`S_Contact` AS `S_Contact`, `p`.`R_Name` AS `R_Name`, `p`.`R_Add` AS `R_Add`, `p`.`R_City` AS `R_City`, `p`.`R_State` AS `R_State`, `p`.`R_Contact` AS `R_Contact`, `p`.`Weight_Kg` AS `Weight_Kg`, `p`.`Price` AS `Price`, `p`.`Dispatched_Time` AS `Dispatched_Time`, `s`.`Shipped` AS `Shipped`, `s`.`Sending` AS `Sending`, `s`.`Delivered` AS `Delivered` FROM (`parcel` `p` join `status` `s`) WHERE `p`.`TrackingID` = `s`.`TrackingID` AND `s`.`Delivered` is not null ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`Branch_id`),
  ADD KEY `Manager` (`Manager_id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `Feedback` (`F.No`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`TrackingID`),
  ADD UNIQUE KEY `TrackID` (`TrackingID`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Email`),
  ADD KEY `FKey` (`StaffID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD UNIQUE KEY `TrackID` (`TrackingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `Branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F.No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `TrackingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10834;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `Manager` FOREIGN KEY (`Manager_id`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `FKey` FOREIGN KEY (`StaffID`) REFERENCES `credentials` (`StaffID`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `delivery_status` FOREIGN KEY (`TrackingID`) REFERENCES `parcel` (`TrackingID`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `resetCredits` ON SCHEDULE EVERY 1 QUARTER STARTS '2022-04-08 20:54:38' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
 update staff set Credits=0;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
