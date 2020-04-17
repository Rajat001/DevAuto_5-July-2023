-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 01:26 PM
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

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`) VALUES
(1, 'Helmet'),
(2, 'Safety Kit'),
(3, 'Scooter Mat'),
(4, 'KeyChan'),
(5, 'Gloves');

-- --------------------------------------------------------

--
-- Table structure for table `dealername`
--

CREATE TABLE `dealername` (
  `id` int(11) NOT NULL,
  `makeId` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealername`
--

INSERT INTO `dealername` (`id`, `makeId`, `name`) VALUES
(1, 1, 'Himgiri TVS'),
(2, 3, 'Singla Hero'),
(3, 2, 'Swaroop Honda '),
(4, 4, 'Prime Yamaha'),
(5, 5, 'admin'),
(6, 3, 'Test Case For Hero Section...'),
(7, 6, 'exexexex'),
(8, 6, 'Priya Automobile'),
(9, 7, 'Priya Automobile');

-- --------------------------------------------------------

--
-- Table structure for table `financemode`
--

CREATE TABLE `financemode` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financemode`
--

INSERT INTO `financemode` (`id`, `name`) VALUES
(1, 'HDFC'),
(2, 'Cash'),
(3, 'L&T Finance'),
(4, 'IDFC'),
(5, 'INCRED'),
(6, 'HINDUJA'),
(7, 'HOME CREDIT'),
(8, 'AEON');

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
(1, '2020-04-11', 1, '1231231', '121212', '2200', 1, 0, '1', '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 'Voter Id Card', '1_81hW3HiNeCL._SY679_.jpg', '1_240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', '1_26400477-portrait-of-huge-beautiful-male-african-lion-against-black-background.jpg', '1_jpg-to-webp-1-1.jpg', 'Krishan', 'Rohan', '<p>shshshsh</p>', '1', '1', '<p>remark</p>', '<p>adadad</p>', '1', '12', 0, '0000-00-00 00:00:00'),
(2, '2020-04-11', 2, '123', '80000', '123', 2, 4, '2', '17000', 1, 2, '2200', 3, 2, '1200', 5, 2, '1200', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 'Voter Id Card', '2_', '2_', '2_', '2_', 'Krishan', 'Ravi', '<p>Short Item Will Come Here.</p>', '4,2', '4,3', '<p>Remark Section Will Come Here</p>', '<p>Address Section Will Come Here</p>', '1', '12', 2, '2020-04-11 20:39:18'),
(3, '2020-04-11', 3, '234', '47000', '1200', 5, 14, '2', '2800', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 'Adhar Card', '3_', '3_81hW3HiNeCL._SY679_.jpg', '3_26400477-portrait-of-huge-beautiful-male-african-lion-against-black-background.jpg', '3_minion.jpg', 'Krishan', 'Sonu', '<p>Short Item Will Come Here&nbsp;</p>', '1,4', '2,4', '<p>Remark Section Comes Here.</p>', '<p>Address Section Will Come Here</p>', '1', '123', 1, '2020-04-11 20:58:49'),
(4, '2020-04-11', 4, 'rc1234 ', '45000', '2800', 15, 14, '2', '2800', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 0, 1, '0', 'Adhar Card', '240_F_174175762_zybH0V3W31sDjDXJqc0CQC8sWvd64DIt.jpg', 'photo-1533450718592-29d45635f0a9.jpg', 'jpg-to-webp-1-1.jpg', '4_minion.jpg', 'Sohan', 'Rohan', '<p>Short Item</p>', '2', '3', '<p>Remark Section Will Come</p>', '<p>Address</p>', '1', '12', 2, '2020-04-11 21:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `makername`
--

CREATE TABLE `makername` (
  `id` int(11) NOT NULL,
  `name` varchar(650) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makername`
--

INSERT INTO `makername` (`id`, `name`) VALUES
(1, 'TVS'),
(2, 'Honda'),
(3, 'Hero'),
(4, 'Yamaha'),
(5, 'Suzuki'),
(6, 'Harley'),
(7, 'Royal Enfield');

-- --------------------------------------------------------

--
-- Table structure for table `modelcolor`
--

CREATE TABLE `modelcolor` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modelcolor`
--

INSERT INTO `modelcolor` (`id`, `name`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Yellow'),
(4, 'Green'),
(5, 'Purple'),
(6, 'Siver');

-- --------------------------------------------------------

--
-- Table structure for table `modelname`
--

CREATE TABLE `modelname` (
  `id` int(11) NOT NULL,
  `makerid` int(11) NOT NULL,
  `name` varchar(650) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modelname`
--

INSERT INTO `modelname` (`id`, `makerid`, `name`) VALUES
(1, 1, 'Ntroqu'),
(2, 1, 'Jupiter'),
(3, 3, 'Splendor'),
(4, 2, 'Activa'),
(5, 7, 'Bullet 350');

-- --------------------------------------------------------

--
-- Table structure for table `paymode`
--

CREATE TABLE `paymode` (
  `id` int(11) NOT NULL,
  `name` varchar(89) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymode`
--

INSERT INTO `paymode` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Paytm'),
(3, 'PhonePe'),
(4, 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `pd`
--

CREATE TABLE `pd` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pd`
--

INSERT INTO `pd` (`id`, `name`) VALUES
(1, 'Anuj'),
(2, 'Krishan'),
(3, 'Sohan');

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
(1, 1, '2020-04-06', 'sads', 'sadas', '1234567891', 1, '2200', 'Cheque', '2020-01-01', 2, 'NIL', 'NIL', 'NIL', '2020-04-11 11:08:10'),
(2, 2, '2020-04-07', 'nvnvnv', 'vbnvbn', '9711461442', 1, '123', 'Cheque', '2020-04-06', 1, 'asdasd', 'asdasd', 'asdasd', '0000-00-00 00:00:00'),
(3, 3, '2020-03-25', 'Rajat Singh', 'Access 123', '9714141414', 3, '23000', 'PhonePe', 'NIL', 1, 'Aviator', 'DL 3S N2424', '400000', '2020-04-11 19:59:48'),
(4, 4, '2020-03-25', 'Rajat Singh', 'Access 1234', '97114644142', 3, '17000', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00'),
(5, 5, '', 'Deepak Kumar', 'Activa Honda 5G', '  9898989898', 3, '1200', '', 'NIL', 1, 'Suzuki', 'DL 34 N 2413', '5000', '0000-00-00 00:00:00'),
(18, 6, '2020-04-07', 'asdasd', 'asdasd', 'asdaasd', 1, '5845', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00'),
(19, 7, '2020-04-19', 'asasdd', 'asdasd', '12345678as', 1, '4800', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00'),
(20, 8, '2020-04-09', 'Rajeev Singh', 'Rajat Singh', '1234567890', 1, '9888', 'Cheque', '2020-04-29', 1, 'Bullet', 'DL 3S 6054', '20000', '2020-04-11 20:01:37'),
(21, 9, '2020-04-16', 'asasd', 'asdasd', '9711461442', 1, '2501', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00'),
(22, 10, '2020-04-15', 'Abimanyu Singh', 'Need Honda Aviator', '9898989898', 7, '8501', 'PhonePe', 'NIL', 2, 'NIL', 'NIL', 'NIL', '2020-04-11 21:33:54'),
(23, 11, '2020-04-11', 'Himanshu Mehra', 'For Swift Scoote', '9754784548', 6, '3223', 'Cash', 'NIL', 1, 'Honda', 'DL 1S 2141', '1200', '0000-00-00 00:00:00'),
(24, 12, '2020-04-12', 'Rajeev Singh', 'Rajat Singh', '9711461442', 1, '123456', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00'),
(25, 13, '2020-04-12', 'Rajeev Singh', 'Rajat Singh', '9711461444', 1, '123456', 'Cash', 'NIL', 2, 'NIL', 'NIL', 'NIL', '0000-00-00 00:00:00'),
(26, 14, '2020-04-23', 'Ridhi Gupta', 'Test Case', '9711461455', 1, '2800', 'Cash', 'NIL', 1, 'Test', 'Test 3S 6060', '40000', '2020-04-11 20:43:02'),
(27, 15, '2020-04-12', 'Subhash Chand', 'Royal Enfield', '9712121212', 3, '2800', 'Cash', 'NIL', 1, 'Activa Scooter', 'DL 34 N 2413', '21500', '2020-04-11 21:22:03');

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
(1, 'admin', 'admin', 'admin123', 'Active'),
(2, 'Ravi', 'employee', '123', 'Not Active'),
(3, 'Ranjeet', 'employee', '123', 'Not Active'),
(4, 'Rohan', 'employee', '123', '1'),
(5, 'Manish', 'employee', '123', 'Not Active');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`id`, `name`) VALUES
(1, 'Sonu'),
(2, 'Deepak'),
(3, 'Ajay'),
(4, 'Rohan'),
(5, 'Ravi'),
(6, 'Monu');

-- --------------------------------------------------------

--
-- Table structure for table `stocklocation`
--

CREATE TABLE `stocklocation` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocklocation`
--

INSERT INTO `stocklocation` (`id`, `name`) VALUES
(1, 'Showroom'),
(2, 'Banquet'),
(3, 'Industrial Area , Patparganj');

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

--
-- Dumping data for table `stockmgmt`
--

INSERT INTO `stockmgmt` (`id`, `stockNo`, `challanDate`, `challanNo`, `dealerName`, `modelMake`, `model`, `modelSubtype`, `modelColor`, `chasisNo`, `engineNo`, `stockLocation`, `shortItem`, `anyDent`, `status`) VALUES
(1, '1', '2020-03-17', '123', '1', '2', '2', 'Drum', 'Red', '1231231', 'DHReeaL', 'Showroom', 'nil', 'NIl', '1'),
(2, '2', '2020-01-01', '1av', '1', '1', '2', 'Drum', 'Yellow', 'abc123', 'gdfggdf123', 'Banquet', 'Nil', 'No Dent', '0'),
(3, '3', '2020-03-27', '123', '1', '1', '1', 'Drum', 'Red', '123', '123', 'Showroom', '123', '123', '1'),
(4, '4', '2020-03-28', '234', '3', '3', '3', 'Drum', 'Red', '234', '234', 'Banquet', '234', '234', '1'),
(5, '5', '2020-04-12', 'rc1234', '7', '7', '5', 'Drum', 'Green', 'rc1234', 'GC1245HR8', 'Industrial Area , Patparganj', 'Nil', 'Nil', '1');

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

--
-- Dumping data for table `subaccessories`
--

INSERT INTO `subaccessories` (`id`, `accessoriesId`, `name`, `cost`) VALUES
(1, '1', 'Helmet350', '350'),
(2, '1', 'Helmet520', '520'),
(3, '2', 'Kit480', '480'),
(4, '4', 'KeyChan250', '250'),
(5, '3', 'ScooterMat350', '350');

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
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `city`, `datadropdown`) VALUES
(1, 'asd', 'sd', ''),
(2, 'Rajat sINGH', 'East Delhi', ''),
(3, 'Prashant Sharma', 'West Delhi', ''),
(4, 'Vikram Singh', 'Anand Vihar', ''),
(5, 'Test', 'Test Case City', ''),
(6, 'test2', 'test2', ''),
(7, 'Test Case 3', 'Test Case 3', ''),
(8, 'sdsd', 'adssd', ''),
(9, 'user One', 'user One', ''),
(10, 'user Two', 'User Two', ''),
(11, 'User Three', 'User Three', ''),
(12, 'User Four', 'User Four', ''),
(13, 'User Five', 'User Five', ''),
(14, 'User Six', 'User Six', ''),
(15, 'User Seven', 'User Seven', ''),
(16, 'User Eight', 'User Eight', ''),
(17, 'User Eight', 'User Eight', ''),
(18, 'Deepak Sharma', 'East Delhi', ''),
(19, 'Saurab Chinese', 'Mandawali', ''),
(20, 'Jay Prakash', 'Laxmi Nagar', ''),
(21, 'Sachin Bhai', 'Mayanagar', ''),
(22, 'Sachin Bhai', 'Mayanagar', ''),
(23, 'Abhishek Choudhary', 'East Delhi Mandawali', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dealername`
--
ALTER TABLE `dealername`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `financemode`
--
ALTER TABLE `financemode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gatepassmgmt`
--
ALTER TABLE `gatepassmgmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `makername`
--
ALTER TABLE `makername`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modelcolor`
--
ALTER TABLE `modelcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `modelname`
--
ALTER TABLE `modelname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paymode`
--
ALTER TABLE `paymode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pd`
--
ALTER TABLE `pd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `receiptmgmt`
--
ALTER TABLE `receiptmgmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stocklocation`
--
ALTER TABLE `stocklocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stockmgmt`
--
ALTER TABLE `stockmgmt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subaccessories`
--
ALTER TABLE `subaccessories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
