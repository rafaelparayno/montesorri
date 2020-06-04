-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 10:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `syid` int(20) NOT NULL,
  `semid` int(11) NOT NULL,
  `sno` varchar(30) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `Totalbalance` float NOT NULL,
  `totalPayment` float NOT NULL,
  `RemBalance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `syid`, `semid`, `sno`, `mode`, `Totalbalance`, `totalPayment`, `RemBalance`) VALUES
(6, 1, 4, '2020-1', 'Fullpayment', 7200, 7200, 0),
(7, 1, 4, '2020-48', 'Downpayment', 10670, 2667.5, 8002.5);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`) VALUES
(1, 'Rafael', 'Parayno');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courses_id` int(11) NOT NULL,
  `coursesName` varchar(50) NOT NULL,
  `coursesCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courses_id`, `coursesName`, `coursesCode`) VALUES
(1, 'Bachelor science in information tech', 'bsit'),
(2, 'Bachelor science in Comsci', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `educ_data`
--

CREATE TABLE `educ_data` (
  `educ_id` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `schoolvl` varchar(30) NOT NULL,
  `schoolname` varchar(30) NOT NULL,
  `course` varchar(30) DEFAULT NULL,
  `YearAtt` varchar(10) NOT NULL,
  `award` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `famdata`
--

CREATE TABLE `famdata` (
  `fam_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `fcno` varchar(20) DEFAULT NULL,
  `fo` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `mcno` varchar(20) NOT NULL,
  `mo` varchar(20) NOT NULL,
  `gname` varchar(30) NOT NULL,
  `gno` varchar(20) NOT NULL,
  `gadd` text NOT NULL,
  `grel` varchar(10) NOT NULL,
  `sno` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `famdata`
--

INSERT INTO `famdata` (`fam_id`, `fname`, `fcno`, `fo`, `mname`, `mcno`, `mo`, `gname`, `gno`, `gadd`, `grel`, `sno`) VALUES
(51, 'dasdas', 'dasdsa', 'dasdas', 'adsads', 'dasdsa', 'adsasd', 'dasasd', 'dasdas', 'adsads', 'dasdas', '2020-1'),
(53, 'asdasd', 'sdasd', 'asda', 'asda', 'asdad', 'sdasd', 'asda', 'dsda', 'sdasdas', 'asdasd', '2020-45'),
(54, 'rasdad', 'asdasd', 'asdasd', 'asdasd', 'asdas', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'rasdad', '2020-47'),
(55, 'rasadsa', 'asdasd', 'asda', 'asdasd', 'asdad', 'asdsad', 'asdasdaad', 'asdasdasdsa', 'asdasdaqd', 'rasadsa', '2020-48');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL,
  `tfPerUnits` float NOT NULL,
  `misc` float NOT NULL,
  `lvl` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `syid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `tfPerUnits`, `misc`, `lvl`, `semid`, `syid`) VALUES
(1, 300, 4000, 1, 4, 1),
(2, 502, 4000, 1, 4, 2),
(3, 502, 4000, 1, 5, 2),
(4, 502, 4000, 1, 5, 1),
(6, 350, 4000, 2, 4, 1),
(7, 400, 4000, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personaldata`
--

CREATE TABLE `personaldata` (
  `personal_id` int(11) NOT NULL,
  `sno` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `Course` int(11) NOT NULL,
  `pob` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civil` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `CpNo` varchar(20) NOT NULL,
  `EmailAdd` varchar(50) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `isEnrolled` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `syid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personaldata`
--

INSERT INTO `personaldata` (`personal_id`, `sno`, `firstname`, `lastname`, `middlename`, `Course`, `pob`, `dob`, `gender`, `civil`, `nationality`, `Address`, `CpNo`, `EmailAdd`, `Religion`, `age`, `isEnrolled`, `semid`, `syid`) VALUES
(45, '2020-1', 'rafael guillano', 'parayno', 'guiterrez', 1, 'manila', '06/23/1995', 'male', 'single', 'pinoy', 'blk 22 lot 8', '09394072051', 'rafael.gmail.com@gmail.com', 'atheist', 24, 1, 4, 1),
(47, '2020-45', 'asdasd', 'asdsadas', 'asdassd', 2, 'manila', '06/23/1995', 'male', 'adsads', 'asddas', 'asdasda', '23131231', 'rafaelllparaynooo23@gmail.com', 'asdasd', 23, 1, 4, 1),
(49, '2020-48', 'asd', 'asd', 'asd', 1, 'maila', '06/23/1995', 'male', 'single', 'filipino', 'blk22', '093123', 'rafael.parayno23@gmail.com', 'catholic', 23, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `syid` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `sy_id` int(11) NOT NULL,
  `school_year` varchar(30) NOT NULL,
  `sy_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`sy_id`, `school_year`, `sy_status`) VALUES
(1, '2020-2021', 'activate'),
(2, '2021-2022', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(50) NOT NULL,
  `section_yr` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `syid` int(11) NOT NULL,
  `semid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_yr`, `course_id`, `syid`, `semid`) VALUES
(1, 'bsad23', 3, 1, 1, 4),
(2, 'asdad23', 2, 2, 1, 4),
(3, 'bsit101', 1, 1, 1, 4),
(4, 'bscs101', 1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sem`
--

CREATE TABLE `sem` (
  `semid` int(11) NOT NULL,
  `semterm` int(11) NOT NULL,
  `sem_status` varchar(15) NOT NULL,
  `syid` int(11) NOT NULL,
  `isOpenReg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`semid`, `semterm`, `sem_status`, `syid`, `isOpenReg`) VALUES
(4, 1, 'activate', 1, 1),
(5, 2, 'disable', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shspersonal`
--

CREATE TABLE `shspersonal` (
  `shsp_id` int(11) NOT NULL,
  `shsno` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `strand` int(11) NOT NULL,
  `pob` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `civil` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `CpNo` varchar(20) NOT NULL,
  `EmailAdd` varchar(50) NOT NULL,
  `Religion` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `isEnrolled` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `syid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shspersonal`
--

INSERT INTO `shspersonal` (`shsp_id`, `shsno`, `firstname`, `lastname`, `middlename`, `strand`, `pob`, `dob`, `gender`, `civil`, `nationality`, `Address`, `CpNo`, `EmailAdd`, `Religion`, `age`, `isEnrolled`, `semid`, `syid`) VALUES
(2, 'shs-2020-2', 'ads', 'ads', 'ads', 1, 'asdad', '23/06/1995', 'asdad', 'asdad', 'asdad', 'blk 22', 'asdasdas', 'asdasdas@gmail.com', 'asdads', 23, 0, 0, 0),
(3, 'shs-2020-3', 'asdad', 'dasda', 'assda', 1, 'asdad', '06/23/1995', 'asdad', 'asd', 'asd', 'ads', 'asdsad', 'rafaelllparaynooo23@gmail.com', 'asd', 23, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE `strand` (
  `strand_id` int(11) NOT NULL,
  `strand_name` varchar(50) NOT NULL,
  `strandcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`strand_id`, `strand_name`, `strandcode`) VALUES
(1, 'Accountancy Business Management', 'ABM');

-- --------------------------------------------------------

--
-- Table structure for table `studentsinfo`
--

CREATE TABLE `studentsinfo` (
  `studinfo_id` int(11) NOT NULL,
  `sno` varchar(50) NOT NULL,
  `sect_enrolled` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `allowed_units` int(11) NOT NULL,
  `status_student` int(11) NOT NULL,
  `eval_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsinfo`
--

INSERT INTO `studentsinfo` (`studinfo_id`, `sno`, `sect_enrolled`, `year_level`, `allowed_units`, `status_student`, `eval_status`) VALUES
(11, '2020-1', 1, 3, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjectstbl`
--

CREATE TABLE `subjectstbl` (
  `subject_id` int(11) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `subjectcode` varchar(20) NOT NULL,
  `subject_units` int(11) NOT NULL,
  `subyr` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `syid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectstbl`
--

INSERT INTO `subjectstbl` (`subject_id`, `subjectname`, `subjectcode`, `subject_units`, `subyr`, `semid`, `syid`, `course_id`) VALUES
(1, 'asdasddasdsa', 'asd', 3, 2, 4, 1, 1),
(2, 'asdads', 'dasdas', 3, 1, 4, 1, 1),
(3, 'basic filipino', 'filip1', 3, 1, 4, 1, 1),
(4, 'basic English', 'comarts1', 3, 1, 4, 1, 1),
(5, 'computer programming', 'copro1', 5, 1, 4, 1, 1),
(6, 'data structure', 'datastruc1', 5, 1, 4, 1, 1),
(7, 'sdadas', 'subcode', 5, 3, 4, 1, 1),
(8, 'asdasd', 'asdsad', 3, 3, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userole` int(11) NOT NULL,
  `acc_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `userole`, `acc_id`) VALUES
(1, 'admin', '$2y$10$9Hsto9ZGKPYsV14tKRh0EOqBX4CA0L9RmiknJtWkJEkzqHv.zPj7S', 1, '1'),
(24, 'rafael.gmail.com@gmail.com', '$2y$10$i5Mad0Bji/jsC4JJWTlQi.eVJPhoYu8gixtO6Jf/j7nm/KbtweYHy', 2, '2020-1'),
(25, 'rafael.parayno23@gmail.com', '$2y$10$fXA/.cOIWiqCR55tZCX.wuMBvmDyBoLxArTKYyvY3hxU.7YWxVVhu', 2, '2020-48'),
(26, 'rafaelllparaynooo23@gmail.com', '$2y$10$mvuUU7.gVvEHVJLKooBiEeA3GrtbEcLjMOj3G6XWRH/cE0ELbW3.K', 2, 'shs-2020-3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `educ_data`
--
ALTER TABLE `educ_data`
  ADD PRIMARY KEY (`educ_id`);

--
-- Indexes for table `famdata`
--
ALTER TABLE `famdata`
  ADD PRIMARY KEY (`fam_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `personaldata`
--
ALTER TABLE `personaldata`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`sy_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `sem`
--
ALTER TABLE `sem`
  ADD PRIMARY KEY (`semid`);

--
-- Indexes for table `shspersonal`
--
ALTER TABLE `shspersonal`
  ADD PRIMARY KEY (`shsp_id`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
  ADD PRIMARY KEY (`strand_id`);

--
-- Indexes for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  ADD PRIMARY KEY (`studinfo_id`);

--
-- Indexes for table `subjectstbl`
--
ALTER TABLE `subjectstbl`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `educ_data`
--
ALTER TABLE `educ_data`
  MODIFY `educ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `famdata`
--
ALTER TABLE `famdata`
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sem`
--
ALTER TABLE `sem`
  MODIFY `semid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shspersonal`
--
ALTER TABLE `shspersonal`
  MODIFY `shsp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `strand`
--
ALTER TABLE `strand`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  MODIFY `studinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjectstbl`
--
ALTER TABLE `subjectstbl`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
