-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2021 at 03:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty_parlour`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `book_date` varchar(11) NOT NULL,
  `book_details` varchar(1000) NOT NULL,
  `total` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `reg_id`, `emp_id`, `time_id`, `book_date`, `book_details`, `total`, `balance`) VALUES
(1, 6, 1, 2, '2021-02-19', 'Array ( [0] => Array ( [subcat_id] => 12 [subcat_name] => [subcat_price] => 0 ) [1] => Array ( [subcat_id] => 32 [subcat_name] => hair [subcat_price] => 100 ) [2] => Array ( [subcat_id] => 33 [subcat_name] => SAAAAmmii [subcat_price] => 100 ) )', 4000, 2000),
(2, 2, 1, 3, '2021-02-17', 'Array ( [0] => Array ( [subcat_id] => 12 [subcat_name] => [subcat_price] => 0 ) [1] => Array ( [subcat_id] => 32 [subcat_name] => hair [subcat_price] => 100 ) [2] => Array ( [subcat_id] => 33 [subcat_name] => SAAAAmmii [subcat_price] => 100 ) )', 4000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `can_id` int(10) NOT NULL,
  `can_date` date NOT NULL,
  `book_id` int(10) NOT NULL,
  `can_refund_amt` varchar(10) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(20) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `cat_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_date`) VALUES
(18, 'Hairs', '2020-11-19 17:53:46'),
(19, 'stecut', '2020-11-19 17:54:06'),
(20, 'dfghj', '2020-11-19 17:55:07'),
(21, 'sdfghjkl', '2020-11-21 08:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `emp_lname` varchar(20) NOT NULL,
  `emp_address` varchar(25) NOT NULL,
  `emp_pincode` varchar(10) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_phn` varchar(15) NOT NULL,
  `emp_email` varchar(25) NOT NULL,
  `emp_wrkexp` varchar(25) NOT NULL,
  `emp_certificates` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `emp_lname`, `emp_address`, `emp_pincode`, `emp_dob`, `emp_phn`, `emp_email`, `emp_wrkexp`, `emp_certificates`) VALUES
(1, 'DELVIN', 'N J', 'NELLISSERY HOUSE\r\nPOOVATH', '680741', '2021-02-18', '9495355213', 'djfdkj@kjfsk', '45', 'JOHN-OMS-REVIEW 2 (1).pdf'),
(2, 'ABC', 'N J', 'NELLISSERY HOUSE\r\nPOOVATH', '680741', '2021-02-18', '9495355213', 'djfdkj@kjfsk', '45', 'JOHN-OMS-REVIEW 2 (1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `ofr_id` int(10) NOT NULL,
  `ofr_name` varchar(20) NOT NULL,
  `ofr_sdate` date NOT NULL,
  `ofr_edate` date NOT NULL,
  `ofr_discount` int(10) NOT NULL,
  `ofr_status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`ofr_id`, `ofr_name`, `ofr_sdate`, `ofr_edate`, `ofr_discount`, `ofr_status`) VALUES
(3, 'werrrgzzz', '2020-12-13', '2020-12-15', 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(10) NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `subcat_id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `fname`, `lname`, `address`, `pincode`, `email`, `phone`, `password`) VALUES
(1, 'ammu', 'tomhy', '', 683577, 'somey11tomy@gmail.com', '1234567612', '10779b21dd75a2d49fe20470e'),
(2, 'bbbb', 'ccccc', 'dddddddddddddddddd', 1234512, 'someytomy@gmail.com', '1234567892', 'd0325fb30d28403271e2edf9e'),
(3, 'sumy', 'tomy', 'palatty', 683577, 'sumytomy11@gmail.com', '9867654543', '5a843083642512e3ee96d36f7'),
(4, 'somey', 'jose', 'thekkineth', 683577, 'someyjose@gmail.com', '1234567234', '3a060f591c84a6f76e9164cf02456a0a'),
(5, 'xvdx', '', 'dsfsdf', 0, 'sdfs', 'df', 'dsf'),
(6, 'ammu', '', '', 0, 'somey11tomy@gmail.com', '', '123'),
(7, 'ammu', '', '', 0, 'someyjose@gmail.com', '123', ''),
(8, '', '', '', 0, 'someytomy@gmail.com', '', '123'),
(9, '', '', '', 0, 'somey11tomy@gmail.com', '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(25) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(25) NOT NULL,
  `subcat_price` int(10) NOT NULL,
  `subcat_time` time NOT NULL,
  `subcat_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `cat_id`, `subcat_name`, `subcat_price`, `subcat_time`, `subcat_image`) VALUES
(12, 19, '', 0, '00:00:00', 'facial.jpg'),
(13, 18, 'asdfghj', 0, '00:00:00', 'bleatch.jpg'),
(14, 18, 'asxdfg', 0, '00:00:00', 'thread.jpg'),
(15, 19, 'asdfghjk', 0, '00:00:00', 'facial.jpg'),
(16, 18, 'bob', 0, '00:00:15', 'bleatch.jpg'),
(17, 19, 'aaaa', 0, '01:30:00', 'facial.jpg'),
(18, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(19, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(20, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(21, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(22, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(23, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(24, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(25, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(26, 18, 'hair', 0, '00:00:01', 'bleatch.jpg'),
(27, 21, 'aaaaa', 0, '01:30:00', 'thread.jpg'),
(28, 21, 'aaaaa', 0, '01:30:00', 'thread.jpg'),
(29, 21, 'aaaaa', 0, '01:30:00', 'thread.jpg'),
(30, 21, 'aaaaa', 0, '01:30:00', 'thread.jpg'),
(31, 21, 'hair', 123, '00:00:01', 'thread.jpg'),
(32, 18, 'hair', 100, '01:30:00', 'thread.jpg'),
(33, 20, 'SAAAAmmii', 100, '00:00:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(11) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `stime`, `etime`) VALUES
(1, '09:00:00', '10:00:00'),
(2, '09:00:00', '10:00:00'),
(3, '10:00:00', '11:00:00'),
(4, '11:00:00', '12:00:00'),
(5, '12:00:00', '13:00:00'),
(6, '14:00:00', '15:00:00'),
(7, '15:00:00', '16:00:00'),
(8, '16:00:00', '16:00:00'),
(9, '17:00:00', '18:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `time_id` (`time_id`),
  ADD KEY `id` (`reg_id`);

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`can_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`ofr_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `subcat_id` (`subcat_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cancel`
--
ALTER TABLE `cancel`
  MODIFY `can_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `ofr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `emp_id` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_id` FOREIGN KEY (`time_id`) REFERENCES `time` (`time_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
