-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2022 at 09:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipointdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `date_` date NOT NULL,
  `time` text NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `transaction`, `date_`, `time`, `user_id`) VALUES
(1, 'You logged your account.', '2022-11-21', '01:00 PM', '1'),
(2, 'You have sent a referral request.', '2022-12-08', '01:01 pm', '1'),
(3, 'You have sent a referral request.', '2022-12-08', '09:43 pm', '1'),
(4, 'You have sent a referral request to Trento Rural Health Unit and Reproductive Health Center', '2022-12-08', '09:49 pm', '1'),
(5, ' You have approved the referral request of Trento Rural Health Unit and Reproductive Health Center', '2022-12-08', '10:00 pm', '1'),
(6, ' You have denied the referral request of Trento Rural Health Unit and Reproductive Health Center', '2022-12-08', '10:02 pm', '1'),
(7, ' You have approved the referral request of Trento Rural Health Unit and Reproductive Health Center', '2022-12-08', '10:03 pm', '1'),
(9, ' You have approved the appointment request of Snow, Jon', '2022-12-08', '10:57 pm', '1'),
(14, ' You have denied the appointment request of Snow, Jon', '2022-12-08', '11:04 pm', '1'),
(15, ' You have approved the appointment request of Snow, Jon', '2022-12-08', '11:05 pm', '1'),
(16, ' You have added a new doctor named Dr. Rose Penida', '2022-12-08', '11:13 pm', '1'),
(17, ' You have added a new doctor named Dr. Christine Garcia', '2022-12-09', '11:28 am', '1'),
(18, ' You have added a new doctor named Dr. Roberto Castillo', '2022-12-09', '11:33 am', '1'),
(19, ' You have updated the details of Dr. Roberto Castillo Jr. III', '2022-12-09', '11:39 am', '1'),
(20, ' You have updated the details of Dr.  Liza Smith', '2022-12-09', '11:42 am', '1'),
(21, ' You have approved the appointment request of Snow, John', '2022-12-09', '04:11 pm', '2');

-- --------------------------------------------------------

--
-- Table structure for table `activitylog_user`
--

CREATE TABLE `activitylog_user` (
  `id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `date_` date NOT NULL,
  `time` text NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activitylog_user`
--

INSERT INTO `activitylog_user` (`id`, `transaction`, `date_`, `time`, `user_id`) VALUES
(1, 'You logged your account.', '2022-11-21', '01:00 PM', '7'),
(9, 'You have updated your user information', '2022-12-09', '03:54 pm', '7'),
(10, 'You have updated your password information.', '2022-12-09', '03:57 pm', '7'),
(11, 'You have updated your password information.', '2022-12-09', '03:57 pm', '7'),
(12, 'You have updated your user profile picture', '2022-12-09', '04:00 pm', '7'),
(13, 'Your have sent an appointment request to Trento Rural Health Unit and Reproductive Health Center', '2022-12-09', '04:10 pm', '7');

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `clinictype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `username`, `password`, `name`, `clinictype`) VALUES
(1, 'admin', 'admin', 'Administrator 1', '1'),
(2, 'admin1', 'admin1', 'Administrator 2', '2'),
(3, 'admin3', 'admin3', 'Administrator 3', '3'),
(4, 'admin4', 'admin4', 'Administrator 4', '4'),
(5, 'admin5', 'admin5', 'Administrator 5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `appointtbl`
--

CREATE TABLE `appointtbl` (
  `appointment_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `patient_name` text NOT NULL,
  `message` text NOT NULL,
  `doctor_id` text NOT NULL,
  `type_id` text NOT NULL,
  `client_id` text NOT NULL,
  `clinictype` text NOT NULL,
  `date_requested` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointtbl`
--

INSERT INTO `appointtbl` (`appointment_id`, `schedule_date`, `patient_name`, `message`, `doctor_id`, `type_id`, `client_id`, `clinictype`, `date_requested`, `status`) VALUES
(1001, '2022-12-09', 'Patient 1', 'Message 1', '1', '1', '7', '1', '2022-09-20 15:54:43', 'approved'),
(1009, '2022-12-12', 'Santos, Jan', 'i need to have a check-up with my heart disease.', '9', '2', '7', '2', '2022-12-07 15:17:40', ''),
(1010, '2022-12-17', 'Snow, Jon', 'for appointment', '11', '4', '7', '2', '2022-12-09 16:10:09', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `clienttbl`
--

CREATE TABLE `clienttbl` (
  `client_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienttbl`
--

INSERT INTO `clienttbl` (`client_id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `picture`) VALUES
(1, 'samsepiol', 'samsepiol', 'Sam', 'Sepiol', 'samsepiol@gmail.com', '', ''),
(2, 'rayedban', 'rayedban', 'Raye ', 'Ban', 'rayedban@gmail.com', '', ''),
(3, 'king', 'king', 'King', 'Rhaegar', 'king@email.com', '', ''),
(4, 'grace', 'grace', 'grace', 'Lee', 'grace@email.com', '', ''),
(5, 'daemon', 'daemon', 'Daemon', 'Targaryen', 'daemon@email.com', '', ''),
(7, 'jonsnow', 'jonsnow', 'John', 'Snow', 'jonsnow@gmail.com', '09554827928', 'users/user-ln0rk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clinictbl`
--

CREATE TABLE `clinictbl` (
  `id` int(11) NOT NULL,
  `clinic_name` text NOT NULL,
  `address` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinictbl`
--

INSERT INTO `clinictbl` (`id`, `clinic_name`, `address`, `latitude`, `longitude`) VALUES
(1, 'Franco Clinic and Hospital', 'Franco Clinic and Hospital', 0, 0),
(2, 'Trento Rural Health Unit and Reproductive Health Center', 'Trento Rural Health Unit and Reproductive Health Center', 0, 0),
(3, 'Clapis Medical Clinic', 'Clapis Medical Clinic', 0, 0),
(4, 'Bunawan Family Health Clinic', 'Bunawan Family Health Clinic', 0, 0),
(5, 'CMC Castillo Medical Clinic', 'CMC Castillo Medical Clinic', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countnotiftbl_admin`
--

CREATE TABLE `countnotiftbl_admin` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countnotiftbl_admin`
--

INSERT INTO `countnotiftbl_admin` (`id`, `user_id`) VALUES
(20, '2'),
(21, '2');

-- --------------------------------------------------------

--
-- Table structure for table `countnotiftbl_user`
--

CREATE TABLE `countnotiftbl_user` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctortbl`
--

CREATE TABLE `doctortbl` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `doctor_status` text NOT NULL,
  `doctor_pic` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `clinictype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctortbl`
--

INSERT INTO `doctortbl` (`doctor_id`, `doctor_name`, `type_id`, `doctor_status`, `doctor_pic`, `phone`, `email`, `clinictype`) VALUES
(1, 'Dr.  Liza Smith', 1, 'available', 'doctors/doctor-36ufy.png', '09355572793', 'samsmith@gmail.com', 1),
(2, 'Dr. Mary Shaw', 2, 'available', 'users/user5-128x128.jpg', '09485520923', 'maryshaw@gmail.com', 1),
(9, 'Dr. John doe', 2, 'available', 'doctors/doctor-xqga8.jpg', '09201203811', 'johndoe@gmail.com', 1),
(10, 'Dr. Sam Grey', 1, 'available', 'doctors/doctor-yd47x.jpg', '09123132123', 'samgrey@gmail.com', 1),
(11, 'Dr. Leonardo Jalee', 4, 'available', 'doctors/doctor-gsxt1.jpg', '09554827928', 'jaleeclinic@gmail.com', 2),
(12, 'Dr. Rose Penida', 5, 'available', 'doctors/doctor-v6w59.jpg', '0911122234', 'rosepenida@gmail.com', 1),
(13, 'Dr. Christine Garcia', 7, 'available', 'doctors/doctor-l2yri.jpg', '09123456789', 'christinegarcia@gmail.com', 1),
(14, 'Dr. Roberto Castillo Jr. III', 6, 'available', 'doctors/doctor-2nv4e.jpg', '09123213123', 'castillo@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locationtbl`
--

CREATE TABLE `locationtbl` (
  `id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notificationtbl_admin`
--

CREATE TABLE `notificationtbl_admin` (
  `id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `date_` datetime NOT NULL,
  `user_id` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificationtbl_admin`
--

INSERT INTO `notificationtbl_admin` (`id`, `transaction`, `date_`, `user_id`, `seen`, `type`) VALUES
(1, 'Clapis Medical Clinic has sent a referral to you', '2022-12-07 03:30:00', '1', 0, 'referral'),
(3, 'Franco Clinic and Hospital sent a referral to you', '2022-12-08 12:56:09', '2', 0, 'referral'),
(4, 'Franco Clinic and Hospital sent a referral to you', '2022-12-08 01:01:57', '2', 0, 'referral'),
(5, 'Franco Clinic and Hospital sent a referral to you', '2022-12-08 09:43:14', '2', 0, 'referral'),
(6, 'Franco Clinic and Hospital sent a referral to you', '2022-12-08 09:45:47', '2', 0, 'referral'),
(7, 'Franco Clinic and Hospital sent a referral to you', '2022-12-08 09:48:09', '2', 0, 'referral'),
(8, 'Franco Clinic and Hospital sent a referral to you', '2022-12-08 09:49:07', '2', 0, 'referral'),
(9, 'Your referral request has been approved by Franco Clinic and Hospital', '2022-12-08 10:00:37', '2', 0, 'referral'),
(10, 'Your referral request has been denied by Franco Clinic and Hospital', '2022-12-08 10:02:56', '2', 0, 'referral'),
(11, 'Your referral request has been approved by Franco Clinic and Hospital', '2022-12-08 10:03:06', '2', 0, 'referral'),
(12, 'An appointment request has been sent by Snow, John', '2022-12-09 04:10:09', '2', 0, 'appointment');

-- --------------------------------------------------------

--
-- Table structure for table `notificationtbl_user`
--

CREATE TABLE `notificationtbl_user` (
  `id` int(11) NOT NULL,
  `transaction` text NOT NULL,
  `date_` datetime NOT NULL,
  `user_id` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificationtbl_user`
--

INSERT INTO `notificationtbl_user` (`id`, `transaction`, `date_`, `user_id`, `seen`, `type`) VALUES
(12, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-09', '2022-12-08 10:56:21', '7', 0, 'appointment'),
(18, 'Your appointment request has been denied by Franco Clinic and Hospital', '2022-12-08 11:04:51', '7', 0, 'appointment'),
(19, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-09', '2022-12-08 11:05:14', '7', 0, 'appointment'),
(20, 'Your appointment request has been approved by Trento Rural Health Unit and Reproductive Health Center for schedule on 2022-12-17', '2022-12-09 04:11:51', '7', 0, 'appointment');

-- --------------------------------------------------------

--
-- Table structure for table `queuetbl`
--

CREATE TABLE `queuetbl` (
  `id` int(11) NOT NULL,
  `priorityno` int(11) NOT NULL,
  `client_id` text NOT NULL,
  `type_id` text NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `clinictype` text NOT NULL,
  `datetime_sched` datetime NOT NULL,
  `date_sched` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queuetbl`
--

INSERT INTO `queuetbl` (`id`, `priorityno`, `client_id`, `type_id`, `doctor_id`, `clinictype`, `datetime_sched`, `date_sched`, `status`) VALUES
(1, 0, '1', '1', 1, '1', '2022-09-29 15:00:00', '2022-12-07', ''),
(2, 0, '2', '1', 1, '1', '2022-09-29 15:30:00', '2022-12-07', ''),
(3, 1, '3', '1', 1, '1', '2022-09-29 16:00:00', '2022-12-07', ''),
(4, 2, '4', '1', 1, '1', '2022-09-29 16:30:00', '2022-12-07', ''),
(5, 3, '5', '1', 1, '1', '2022-09-29 17:00:00', '2022-12-07', ''),
(6, 4, '7', '1', 1, '1', '2022-09-29 16:00:00', '2022-12-07', ''),
(29, 1, '7', '1', 1, '1', '2022-12-09 15:00:00', '2022-12-09', ''),
(30, 1, '7', '4', 11, '2', '2022-12-17 09:00:00', '2022-12-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `referraltbl`
--

CREATE TABLE `referraltbl` (
  `id` int(11) NOT NULL,
  `client_id` text NOT NULL,
  `message` text NOT NULL,
  `file_attached` text NOT NULL,
  `date_sent` datetime NOT NULL,
  `type` text NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referraltbl`
--

INSERT INTO `referraltbl` (`id`, `client_id`, `message`, `file_attached`, `date_sent`, `type`, `sender`, `receiver`, `status`) VALUES
(1, '1', 'We are referring the patient named: Mary Shaw in your clinic (pulmonology).', '2/referral1.png', '2022-12-05 02:24:04', '1', '1', '2', ''),
(3, '1', '123', '1/1ff8a7b5dc7a7d1f0ed65aaa29c04b1e.stamp', '2022-12-05 08:43:04', '2', '2', '1', 'approved'),
(4, '7', 'please refer to urology', '1/084b6fbb10729ed4da8c3d3f5a3ae7c9.png', '2022-12-05 09:20:40', '4', '1', '2', ''),
(10, '1', 'for referral', '1/d1f491a404d6854880943e5c3cd9ca25.png', '2022-12-08 12:56:09', '2', '1', '2', ''),
(11, '1', 'for your approval', '1/eecca5b6365d9607ee5a9d336962c534.gif', '2022-12-08 01:01:57', '3', '1', '2', ''),
(12, '1', 'sample', '1/58a2fc6ed39fd083f55d4182bf88826d.gif', '2022-12-08 09:43:14', '2', '1', '2', ''),
(13, '1', '12', '1/85d8ce590ad8981ca2c8286f79f59954.gif', '2022-12-08 09:45:47', '1', '1', '2', ''),
(14, '1', '123', '1/c45147dee729311ef5b5c3003946c48f.gif', '2022-12-08 09:48:09', '1', '1', '2', ''),
(15, '1', '123', '1/4c5bde74a8f110656874902f07378009.gif', '2022-12-08 09:49:07', '1', '1', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedtbl`
--

CREATE TABLE `schedtbl` (
  `id` int(11) NOT NULL,
  `day_` text NOT NULL,
  `consultation_time` double NOT NULL,
  `consultation_start` time NOT NULL,
  `consultation_end` time NOT NULL,
  `max_client` int(11) NOT NULL,
  `doctor_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedtbl`
--

INSERT INTO `schedtbl` (`id`, `day_`, `consultation_time`, `consultation_start`, `consultation_end`, `max_client`, `doctor_id`) VALUES
(1, 'Monday', 15, '09:00:00', '23:00:00', 12, '1'),
(2, 'Tuesday', 15, '11:30:00', '23:00:00', 12, '1'),
(3, 'Wednesday', 15, '15:00:00', '23:00:00', 12, '1'),
(4, 'Thursday', 15, '16:00:00', '23:00:00', 12, '1'),
(5, 'Friday', 15, '15:00:00', '23:00:00', 12, '1'),
(6, 'Saturday', 15, '15:00:00', '23:00:00', 12, '1'),
(7, 'Sunday', 15, '15:00:00', '23:00:00', 12, '1'),
(15, 'Monday', 0, '17:00:00', '13:00:00', 0, '2'),
(16, 'Tuesday', 0, '20:30:00', '20:30:00', 0, '2'),
(17, 'Wednesday', 15, '15:00:00', '23:00:00', 12, '2'),
(18, 'Thursday', 15, '15:00:00', '23:00:00', 12, '2'),
(19, 'Friday', 15, '15:00:00', '23:00:00', 12, '2'),
(20, 'Saturday', 15, '15:00:00', '23:00:00', 12, '2'),
(21, 'Sunday', 15, '15:00:00', '23:00:00', 12, '2'),
(29, 'Monday', 0, '09:00:00', '15:00:00', 0, '9'),
(30, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '9'),
(31, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '9'),
(32, 'Thursday', 0, '09:00:00', '15:00:00', 0, '9'),
(33, 'Friday', 0, '09:00:00', '15:00:00', 0, '9'),
(34, 'Saturday', 0, '09:00:00', '15:00:00', 0, '9'),
(35, 'Sunday', 0, '09:00:00', '15:00:00', 0, '9'),
(36, 'Monday', 0, '09:00:00', '15:00:00', 0, '10'),
(37, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '10'),
(38, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '10'),
(39, 'Thursday', 0, '09:00:00', '15:00:00', 0, '10'),
(40, 'Friday', 0, '09:00:00', '15:00:00', 0, '10'),
(41, 'Saturday', 0, '09:00:00', '15:00:00', 0, '10'),
(42, 'Sunday', 0, '09:00:00', '15:00:00', 0, '10'),
(43, 'Monday', 0, '09:00:00', '15:00:00', 0, '11'),
(44, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '11'),
(45, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '11'),
(46, 'Thursday', 0, '09:00:00', '15:00:00', 0, '11'),
(47, 'Friday', 0, '09:00:00', '15:00:00', 0, '11'),
(48, 'Saturday', 0, '09:00:00', '15:00:00', 0, '11'),
(49, 'Sunday', 0, '09:00:00', '15:00:00', 0, '11'),
(50, 'Monday', 0, '09:00:00', '15:00:00', 0, '12'),
(51, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '12'),
(52, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '12'),
(53, 'Thursday', 0, '09:00:00', '15:00:00', 0, '12'),
(54, 'Friday', 0, '09:00:00', '15:00:00', 0, '12'),
(55, 'Saturday', 0, '09:00:00', '15:00:00', 0, '12'),
(56, 'Sunday', 0, '09:00:00', '15:00:00', 0, '12'),
(57, 'Monday', 0, '09:00:00', '15:00:00', 0, '13'),
(58, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '13'),
(59, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '13'),
(60, 'Thursday', 0, '09:00:00', '15:00:00', 0, '13'),
(61, 'Friday', 0, '09:00:00', '15:00:00', 0, '13'),
(62, 'Saturday', 0, '09:00:00', '15:00:00', 0, '13'),
(63, 'Sunday', 0, '09:00:00', '15:00:00', 0, '13'),
(64, 'Monday', 0, '09:00:00', '15:00:00', 0, '14'),
(65, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '14'),
(66, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '14'),
(67, 'Thursday', 0, '09:00:00', '15:00:00', 0, '14'),
(68, 'Friday', 0, '09:00:00', '15:00:00', 0, '14'),
(69, 'Saturday', 0, '09:00:00', '15:00:00', 0, '14'),
(70, 'Sunday', 0, '09:00:00', '15:00:00', 0, '14');

-- --------------------------------------------------------

--
-- Table structure for table `typetbl`
--

CREATE TABLE `typetbl` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL,
  `room` text NOT NULL,
  `room_status` text NOT NULL,
  `clinictype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typetbl`
--

INSERT INTO `typetbl` (`type_id`, `type_name`, `room`, `room_status`, `clinictype`) VALUES
(1, 'Dental', '203', 'open', '1'),
(2, 'Internal Medicine', '202', 'open', '1'),
(3, 'Cardiology', '111', 'open', '2'),
(4, 'Urology', '204', 'open', '2'),
(5, 'Neurology', '301', 'open', '1'),
(6, 'Radiology', '305', 'open', '1'),
(7, 'Pediatrician', '306', 'open', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activitylog_user`
--
ALTER TABLE `activitylog_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointtbl`
--
ALTER TABLE `appointtbl`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `clienttbl`
--
ALTER TABLE `clienttbl`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `clinictbl`
--
ALTER TABLE `clinictbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countnotiftbl_admin`
--
ALTER TABLE `countnotiftbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countnotiftbl_user`
--
ALTER TABLE `countnotiftbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctortbl`
--
ALTER TABLE `doctortbl`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `locationtbl`
--
ALTER TABLE `locationtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationtbl_admin`
--
ALTER TABLE `notificationtbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationtbl_user`
--
ALTER TABLE `notificationtbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queuetbl`
--
ALTER TABLE `queuetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referraltbl`
--
ALTER TABLE `referraltbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedtbl`
--
ALTER TABLE `schedtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typetbl`
--
ALTER TABLE `typetbl`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `activitylog_user`
--
ALTER TABLE `activitylog_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointtbl`
--
ALTER TABLE `appointtbl`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `clienttbl`
--
ALTER TABLE `clienttbl`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clinictbl`
--
ALTER TABLE `clinictbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countnotiftbl_admin`
--
ALTER TABLE `countnotiftbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `countnotiftbl_user`
--
ALTER TABLE `countnotiftbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctortbl`
--
ALTER TABLE `doctortbl`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `locationtbl`
--
ALTER TABLE `locationtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificationtbl_admin`
--
ALTER TABLE `notificationtbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notificationtbl_user`
--
ALTER TABLE `notificationtbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `queuetbl`
--
ALTER TABLE `queuetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `referraltbl`
--
ALTER TABLE `referraltbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `schedtbl`
--
ALTER TABLE `schedtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `typetbl`
--
ALTER TABLE `typetbl`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
