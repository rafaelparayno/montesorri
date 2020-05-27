-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 08:14 AM
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
  `sno` varchar(30) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `Totalbalance` float NOT NULL,
  `totalPayment` float NOT NULL,
  `RemBalance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'asdad', 'das', 'asd', 'das', 'adsads', 'asddas', 'dasdas', 'dasdas', 'adsdsa', 'asdad', '2020-5'),
(6, 'dasd', 'asdsad', 'asdasd', 'adsasd', 'asddsa', 'adsads', 'adsdsa', 'adsdsa', 'dasd', 'dasd', '2020-6'),
(7, 'asdasd2', 'adsdas', 'adsads', 'adsads', 'asddsa', 'adsdsa', 'adsads', 'adsdas', 'asdasd', 'asdasd2', '2020-8'),
(8, 'asdasd', 'adssad', 'dasasd', 'adssad', 'adsasd', 'adsdsa', 'adsdsa', 'dasdsa', 'adssadasd', 'asdasd', '2020-9'),
(9, 'asdasd', 'asdad', 'asdad', 'asdsad', 'asdad', 'asdad', 'asdsad', 'asdasd', 'asdasd', 'asdasd', '2020-10'),
(12, 'rafael', '031923', 'fo', 'motherrose', '0312312', 'mo', 'n/a', 'n/a', 'n/a', 'rafael', '2020-11'),
(36, 'asdasdas', 'asdasd', 'asdajd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasdasd', 'asdasdasd', 'asdasdas', '2020-12'),
(38, 'asdas', 'asdasd', 'asdasd', 'asdsad', 'asdasd', 'asdsad', 'asdasd', 'asdsad', 'asdas', 'asdas', '2020-30'),
(39, 'asdas', 'asdasd', 'asdasd', 'asdads', 'sdafads', 'asddas', 'saddsa', 'asddas', 'asddas', 'asdas', '2020-31'),
(40, 'asdad', 'asdasd', 'asdasd', 'asdasd', 'dsasdsad', 'asda', 'asdsad', 'asda', 'dasdad', 'asdad', '2020-32'),
(41, 'asdasd', 'asdasd', 'asdad', 'asddsa', 'saddsasda', 'asdsda', 'adssda', 'dsaasd', 'adsasd', 'asdasd', '2020-34');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL,
  `tfPerUnits` float NOT NULL,
  `misc` float NOT NULL,
  `semid` int(11) NOT NULL,
  `syid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `tfPerUnits`, `misc`, `semid`, `syid`) VALUES
(1, 502, 4000, 4, 1),
(2, 502, 4000, 4, 2),
(3, 502, 4000, 5, 2),
(4, 502, 4000, 5, 1);

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
(6, '2020-5', 'ads', 'ads', 'asd', 1, 'asd', 'asdasd', 'asdsad', 'asdasd', 'asdasd', 'asdasdasdasdas', 'asdad', 'rafaelllparaynooo23@gmail.com', 'asdasd', 23, 1, 4, 1),
(8, '2020-6', 'dasads', 'adsdas', 'asdasd', 1, 'asdsa', '23/06/1995', 'adsdsa', 'asdasd', 'asdasd', 'asddsa', '12313213', 'adsasd@gmail.com', 'adsads', 23, 1, 4, 1),
(9, '2020-8', 'asda', 'asdad', 'asdad', 2, 'asdad', '23/06/1995', 'male', 'asd', 'asd', 'blk 22 lot 8 adelfq', '1323123', 'asdasdas@gmail.com', 'das', 23, 1, 4, 1),
(10, '2020-9', 'asd', 'sad', 'ads', 1, 'asdasd', '23/06/1995', 'female', 'ads', 'das', 'adsasd', 'asdadssda', 'zasdada@gmail.com', 'ads', 12, 1, 4, 1),
(11, '2020-10', 'asdad', 'ads', 'ads', 1, 'asdasd', '23/06/1995', 'asdasd', 'asddas', 'adsasd', 'dasdsa', '123123', 'asdsda@gmail.com', 'adsdas', 23, 1, 4, 1),
(12, '2020-11', 'Rafael', 'Parayno', 'Guillano', 1, 'manila', '06/23/1995', 'male', 'single', 'filipino', 'blk 22', '09394072051', 'rafaelllparaynooo23@gmail.com', 'catholic', 24, 0, 4, 1),
(30, '2020-12', 'dasads', 'adsdas', 'adsasd', 1, 'asdsad', '06/23/1995', 'asdad', 'adasdasd', 'asdasdas', 'asdasdas', 'asdasd', 'rafaelllparaynooo23@gmail.com', '`asdsda', 23, 0, 4, 1),
(31, '2020-30', 'brandot', 'assdasd', 'asdasd', 2, 'asdasd', 'asdasdasd', 'sadasd', 'asdasd', 'asdasd', 'asdasdada', 'asdasd', 'rafaelllparaynooo23@gmail.com', 'asdasd', 23, 0, 4, 1),
(32, '2020-31', 'asdad', 'asdasda', 'asdad', 1, 'asdasd', 'asdad', 'asdad', 'asdad', 'asdad', 'asdasd', 'asdasd', 'rafaelllparaynooo23@gmail.com', 'asdad', 23, 0, 4, 1),
(34, '2020-32', 'asdasd', 'adsdsa', 'asddsa', 1, 'dasdsa', '23/06/1995', 'dsasda', 'asddas', 'asddas', 'asdadasdasdasdasd', 'asdasdasdaasdad', 'asdasd@gmail.com', 'asddas', 23, 1, 4, 2),
(35, '2020-34', 'asdad', 'asd', 'asdad', 1, 'asdasd', '23/06/1995', 'asdd', 'asdasd', 'asdasd', 'asdasdasd', '23', 'asdasdas@gmail.com', 'asdasd', 23, 1, 4, 2);

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
(1, '2020-2021', 'disable'),
(2, '2021-2022', 'activate');

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
  `syid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sem`
--

INSERT INTO `sem` (`semid`, `semterm`, `sem_status`, `syid`) VALUES
(4, 1, 'activate', 1),
(5, 2, 'disable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentsinfo`
--

CREATE TABLE `studentsinfo` (
  `studinfo_id` int(11) NOT NULL,
  `sno` varchar(50) NOT NULL,
  `sect_enrolled` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `eval_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(6, 'data structure', 'datastruc1', 5, 1, 4, 1, 1);

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
(4, 'rafaelllparaynooo23@gmail.com', '$2y$10$n6JTTbVoyF2yZKrCecnyJu3rVIXH/R5kZmncW1J6LqpFjFhrJkZg2', 2, '2020-30'),
(5, 'rafaelllparaynooo23@gmail.com', '$2y$10$O9KKllew6jCv1tSkoHwenO94Z.PvBer/.snxyYx0gkJa.AIokT4La', 2, '2020-31');

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `fam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personaldata`
--
ALTER TABLE `personaldata`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `sy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `studentsinfo`
--
ALTER TABLE `studentsinfo`
  MODIFY `studinfo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjectstbl`
--
ALTER TABLE `subjectstbl`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
