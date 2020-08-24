-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 02:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automart`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealername`
--

CREATE TABLE `dealername` (
  `id` int(11) NOT NULL,
  `makeId` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `financemode`
--

CREATE TABLE `financemode` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gatepassmgmt`
--

CREATE TABLE `gatepassmgmt` (
  `id` int(11) NOT NULL,
  `currDate` varchar(80) NOT NULL,
  `gatePassNo` int(11) NOT NULL,
  `chasisNo` varchar(50) NOT NULL,
  `paymentReceivable` varchar(10) NOT NULL,
  `receiptAmt` varchar(20) NOT NULL,
  `receiptNo` int(11) NOT NULL,
  `receiptNoOne` int(11) NOT NULL,
  `receiptOptOne` varchar(2) NOT NULL,
  `receiptAmtOne` varchar(20) NOT NULL,
  `receiptNoTwo` int(11) NOT NULL,
  `receiptOptTwo` int(1) NOT NULL,
  `receiptAmtTwo` varchar(20) NOT NULL,
  `receiptNoThree` int(11) NOT NULL,
  `receiptOptThree` int(1) NOT NULL,
  `receiptAmtThree` varchar(20) NOT NULL,
  `receiptNoFour` int(11) NOT NULL,
  `receiptOptFour` int(1) NOT NULL,
  `receiptAmtFour` varchar(20) NOT NULL,
  `receiptNoFive` int(11) NOT NULL,
  `receiptOptFive` int(1) NOT NULL,
  `receiptAmtFive` varchar(20) NOT NULL,
  `receiptNoSix` int(11) NOT NULL,
  `receiptOptSix` int(1) NOT NULL,
  `receiptAmtSix` varchar(20) NOT NULL,
  `receiptNoSeven` int(11) NOT NULL,
  `receiptOptSeven` int(1) NOT NULL,
  `receiptAmtSeven` varchar(20) NOT NULL,
  `receiptNoEight` int(11) NOT NULL,
  `receiptOptEight` int(1) NOT NULL,
  `receiptAmtEight` varchar(20) NOT NULL,
  `idProofCard` varchar(250) NOT NULL,
  `idProofdoc` varchar(500) NOT NULL,
  `invoiceDoc` varchar(250) NOT NULL,
  `insuranceDoc` varchar(250) NOT NULL,
  `rcDoc` varchar(250) NOT NULL,
  `pD` varchar(60) NOT NULL,
  `salesPerson` varchar(60) NOT NULL,
  `shortItem` text NOT NULL,
  `accessorie` varchar(80) NOT NULL,
  `subAccessorie` varchar(80) NOT NULL,
  `remark` text NOT NULL,
  `address` text NOT NULL,
  `serviceBook` varchar(20) NOT NULL,
  `deliveryKm` varchar(20) NOT NULL,
  `accessorie_update` tinyint(4) NOT NULL DEFAULT '0',
  `updatedTimeDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gatepassmgmt`
--

INSERT INTO `gatepassmgmt` (`id`, `currDate`, `gatePassNo`, `chasisNo`, `paymentReceivable`, `receiptAmt`, `receiptNo`, `receiptNoOne`, `receiptOptOne`, `receiptAmtOne`, `receiptNoTwo`, `receiptOptTwo`, `receiptAmtTwo`, `receiptNoThree`, `receiptOptThree`, `receiptAmtThree`, `receiptNoFour`, `receiptOptFour`, `receiptAmtFour`, `receiptNoFive`, `receiptOptFive`, `receiptAmtFive`, `receiptNoSix`, `receiptOptSix`, `receiptAmtSix`, `receiptNoSeven`, `receiptOptSeven`, `receiptAmtSeven`, `receiptNoEight`, `receiptOptEight`, `receiptAmtEight`, `idProofCard`, `idProofdoc`, `invoiceDoc`, `insuranceDoc`, `rcDoc`, `pD`, `salesPerson`, `shortItem`, `accessorie`, `subAccessorie`, `remark`, `address`, `serviceBook`, `deliveryKm`, `accessorie_update`, `updatedTimeDate`) VALUES
(1, '2020-06-02', 3499, '740', '1', '1', 1900, 0, '1', '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 'Voter Id Card', '81hW3HiNeCL._SY679_.jpg', '1_', '1_', '1_', 'Krishan', 'Sonu', '', '2', '3', '', '', '', '', 2, '2020-06-02 02:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `makername`
--

CREATE TABLE `makername` (
  `id` int(11) NOT NULL,
  `name` varchar(650) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modelcolor`
--

CREATE TABLE `modelcolor` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modelname`
--

CREATE TABLE `modelname` (
  `id` int(11) NOT NULL,
  `makerid` int(11) NOT NULL,
  `name` varchar(650) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymode`
--

CREATE TABLE `paymode` (
  `id` int(11) NOT NULL,
  `name` varchar(89) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pd`
--

CREATE TABLE `pd` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receiptmgmt`
--

CREATE TABLE `receiptmgmt` (
  `id` int(11) NOT NULL,
  `receiptNo` int(11) NOT NULL,
  `date` varchar(150) NOT NULL,
  `cusName` varchar(250) NOT NULL,
  `forName` varchar(350) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `financeMode` int(11) NOT NULL,
  `amtPaid` varchar(20) NOT NULL,
  `payVia` varchar(50) NOT NULL,
  `cheqDate` varchar(20) NOT NULL,
  `exVehOpt` int(1) NOT NULL,
  `exVehModel` varchar(90) NOT NULL,
  `exVehNo` varchar(20) NOT NULL,
  `exVehAmt` varchar(20) NOT NULL,
  `updatedTimeDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiptmgmt`
--

INSERT INTO `receiptmgmt` (`id`, `receiptNo`, `date`, `cusName`, `forName`, `mobile`, `financeMode`, `amtPaid`, `payVia`, `cheqDate`, `exVehOpt`, `exVehModel`, `exVehNo`, `exVehAmt`, `updatedTimeDate`) VALUES
(1, 1900, '2020-06-01', 'Test', 'Test', '8888888888', 1, '1', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `pwd` varchar(300) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `role`, `pwd`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stocklocation`
--

CREATE TABLE `stocklocation` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockmgmt`
--

CREATE TABLE `stockmgmt` (
  `id` int(11) NOT NULL,
  `stockNo` varchar(11) NOT NULL,
  `challanDate` varchar(200) NOT NULL,
  `challanNo` varchar(50) NOT NULL,
  `dealerName` varchar(500) NOT NULL,
  `modelMake` varchar(5) NOT NULL,
  `model` varchar(5) NOT NULL,
  `modelSubtype` varchar(100) NOT NULL,
  `modelColor` varchar(100) NOT NULL,
  `chasisNo` varchar(200) NOT NULL,
  `engineNo` varchar(300) NOT NULL,
  `stockLocation` varchar(100) NOT NULL,
  `shortItem` text NOT NULL,
  `anyDent` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subaccessories`
--

CREATE TABLE `subaccessories` (
  `id` int(11) NOT NULL,
  `accessoriesId` varchar(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `datadropdown` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealername`
--
ALTER TABLE `dealername`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financemode`
--
ALTER TABLE `financemode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gatepassmgmt`
--
ALTER TABLE `gatepassmgmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makername`
--
ALTER TABLE `makername`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelcolor`
--
ALTER TABLE `modelcolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modelname`
--
ALTER TABLE `modelname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymode`
--
ALTER TABLE `paymode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pd`
--
ALTER TABLE `pd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiptmgmt`
--
ALTER TABLE `receiptmgmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocklocation`
--
ALTER TABLE `stocklocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockmgmt`
--
ALTER TABLE `stockmgmt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subaccessories`
--
ALTER TABLE `subaccessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealername`
--
ALTER TABLE `dealername`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financemode`
--
ALTER TABLE `financemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gatepassmgmt`
--
ALTER TABLE `gatepassmgmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `makername`
--
ALTER TABLE `makername`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modelcolor`
--
ALTER TABLE `modelcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modelname`
--
ALTER TABLE `modelname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymode`
--
ALTER TABLE `paymode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pd`
--
ALTER TABLE `pd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receiptmgmt`
--
ALTER TABLE `receiptmgmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocklocation`
--
ALTER TABLE `stocklocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockmgmt`
--
ALTER TABLE `stockmgmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subaccessories`
--
ALTER TABLE `subaccessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
