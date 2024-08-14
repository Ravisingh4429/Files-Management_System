-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 11:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `otp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `anoc_id` int(11) NOT NULL,
  `date` varchar(520) NOT NULL,
  `time` varchar(150) NOT NULL,
  `message` varchar(1500) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bba_stuatt`
--

CREATE TABLE `bba_stuatt` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `stu_id` varchar(150) NOT NULL,
  `status` varchar(11) NOT NULL,
  `year` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_announce`
--

CREATE TABLE `emp_announce` (
  `ano_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` varchar(1500) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `course_id` int(50) NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_student`
--

CREATE TABLE `fee_student` (
  `fee_id` varchar(50) NOT NULL,
  `tottal_fee` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makepayment`
--

CREATE TABLE `makepayment` (
  `ref_id` varchar(50) NOT NULL,
  `stu_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `qid` int(11) NOT NULL,
  `que` varchar(1500) NOT NULL,
  `ans` varchar(2500) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `empid` varchar(150) NOT NULL,
  `year` varchar(50) NOT NULL,
  `stuid` varchar(50) NOT NULL,
  `subjid` varchar(50) NOT NULL,
  `asked_date` varchar(50) NOT NULL,
  `asked_time` varchar(50) NOT NULL,
  `ans_date` varchar(50) NOT NULL,
  `ans_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_cal`
--

CREATE TABLE `salary_cal` (
  `sal_cal_id` varchar(50) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `date of slip` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `gernate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'UnPaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_reg`
--

CREATE TABLE `salary_reg` (
  `salary_id` varchar(50) NOT NULL,
  `pdsalary` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stu`
--

CREATE TABLE `stu` (
  `stu_id` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `stu_fathername` varchar(50) NOT NULL,
  `sphone` varchar(10) NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `saddress` varchar(150) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `fee_status` varchar(50) NOT NULL DEFAULT 'UnPaid',
  `simg` varchar(500) NOT NULL,
  `otp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `study_mat`
--

CREATE TABLE `study_mat` (
  `smid` int(11) NOT NULL,
  `date` varchar(1500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `file` varchar(150) NOT NULL,
  `c_id` varchar(50) NOT NULL,
  `emp_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stu_att`
--

CREATE TABLE `stu_att` (
  `id` int(11) NOT NULL,
  `att_date` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `stu_id` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_credit` int(11) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_att`
--

CREATE TABLE `teacher_att` (
  `tatt_id` int(11) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `att_date` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_reg`
--

CREATE TABLE `teacher_reg` (
  `empid` varchar(50) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `emp_phone` varchar(10) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_address` varchar(150) NOT NULL,
  `otp` varchar(18) NOT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `subj_id` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `timg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `ttid` int(11) NOT NULL,
  `subj_id` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `empid` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`anoc_id`);

--
-- Indexes for table `bba_stuatt`
--
ALTER TABLE `bba_stuatt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `emp_announce`
--
ALTER TABLE `emp_announce`
  ADD PRIMARY KEY (`ano_id`);

--
-- Indexes for table `fee_student`
--
ALTER TABLE `fee_student`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `makepayment`
--
ALTER TABLE `makepayment`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `salary_cal`
--
ALTER TABLE `salary_cal`
  ADD PRIMARY KEY (`sal_cal_id`);

--
-- Indexes for table `salary_reg`
--
ALTER TABLE `salary_reg`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `stu`
--
ALTER TABLE `stu`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `study_mat`
--
ALTER TABLE `study_mat`
  ADD PRIMARY KEY (`smid`);

--
-- Indexes for table `stu_att`
--
ALTER TABLE `stu_att`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `teacher_att`
--
ALTER TABLE `teacher_att`
  ADD PRIMARY KEY (`tatt_id`);

--
-- Indexes for table `teacher_reg`
--
ALTER TABLE `teacher_reg`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`ttid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `anoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bba_stuatt`
--
ALTER TABLE `bba_stuatt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `emp_announce`
--
ALTER TABLE `emp_announce`
  MODIFY `ano_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `study_mat`
--
ALTER TABLE `study_mat`
  MODIFY `smid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stu_att`
--
ALTER TABLE `stu_att`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT for table `teacher_att`
--
ALTER TABLE `teacher_att`
  MODIFY `tatt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `ttid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
