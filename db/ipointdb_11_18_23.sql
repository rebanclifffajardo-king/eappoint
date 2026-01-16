-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2023 at 06:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(21, ' You have approved the appointment request of Snow, John', '2022-12-09', '04:11 pm', '2'),
(22, ' You have approved the appointment request of Santos, Eric', '2022-12-18', '10:56 am', '1'),
(23, ' You have added a new doctor named Dr. Rey De Leon', '2022-12-18', '02:31 pm', '1'),
(24, 'You have sent a referral request to Trento Rural Health Unit and Reproductive Health Center', '2022-12-18', '02:34 pm', '1'),
(25, ' You have approved the referral request of Franco Clinic and Hospital', '2022-12-18', '02:35 pm', '2'),
(26, ' You have denied the referral request of Franco Clinic and Hospital', '2022-12-18', '02:36 pm', '2'),
(27, ' You have approved the appointment request of Dante, East', '2022-12-18', '02:46 pm', '1'),
(28, ' You have approved the appointment request of Snow, John', '2022-12-18', '03:32 pm', '1'),
(29, ' You have approved the appointment request of Snow, John', '2022-12-18', '03:32 pm', '1'),
(30, ' You have approved the appointment request of Snow, John', '2022-12-18', '03:42 pm', '1'),
(31, ' You have approved the appointment request of Snow, John', '2022-12-18', '03:43 pm', '1'),
(32, ' You have approved the appointment request of Dante, East', '2022-12-18', '04:11 pm', '1'),
(33, ' You have approved the appointment request of Targaryen, Daemon', '2022-12-18', '04:13 pm', '1'),
(34, ' You have added a new doctor named Dr. Sheila Magpale', '2023-06-10', '07:43 pm', '2'),
(35, ' You have added a new doctor named Dr. Richard Gordon', '2023-06-10', '08:12 pm', '3'),
(36, ' You have approved the appointment request of Snow, John', '2023-06-11', '02:43 pm', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activitylog_user`
--

INSERT INTO `activitylog_user` (`id`, `transaction`, `date_`, `time`, `user_id`) VALUES
(1, 'You logged your account.', '2022-11-21', '01:00 PM', '7'),
(9, 'You have updated your user information', '2022-12-09', '03:54 pm', '7'),
(10, 'You have updated your password information.', '2022-12-09', '03:57 pm', '7'),
(11, 'You have updated your password information.', '2022-12-09', '03:57 pm', '7'),
(12, 'You have updated your user profile picture', '2022-12-09', '04:00 pm', '7'),
(13, 'Your have sent an appointment request to Trento Rural Health Unit and Reproductive Health Center', '2022-12-09', '04:10 pm', '7'),
(14, 'Your have sent an appointment request to Franco Clinic and Hospital.', '2022-12-18', '10:49 am', '10'),
(15, 'Your have sent an appointment request to Franco Clinic and Hospital.', '2022-12-18', '02:43 pm', '11'),
(16, 'Your have sent an appointment request to Franco Clinic and Hospital.', '2022-12-18', '04:13 pm', '5'),
(17, 'You have updated your user profile picture.', '2023-02-28', '08:04 pm', '7'),
(18, 'Your have sent an appointment request to Trento Rural Health Unit and Reproductive Health Center.', '2023-06-10', '07:38 pm', '7'),
(19, 'Your have sent an appointment request to Trento Rural Health Unit and Reproductive Health Center.', '2023-06-10', '07:48 pm', '7');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `username`, `password`, `name`, `clinictype`) VALUES
(1, 'admin', 'admin', 'Administrator 1', '1'),
(2, 'admin1', 'admin1', 'Administrator 2', '2'),
(3, 'admin3', 'admin3', 'Administrator 3', '3'),
(4, 'admin4', 'admin4', 'Administrator 4', '4'),
(5, 'admin5', 'admin5', 'Administrator 5', '5'),
(6, 'superadmin', 'superadmin', 'Super Administrator', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointtbl`
--

INSERT INTO `appointtbl` (`appointment_id`, `schedule_date`, `patient_name`, `message`, `doctor_id`, `type_id`, `client_id`, `clinictype`, `date_requested`, `status`) VALUES
(1010, '2023-06-10', 'Snow, Jon', 'for appointment', '11', '4', '7', '2', '2022-12-09 16:10:09', ''),
(1011, '2023-06-11', 'Santos, Eric', 'Checkup for my wife', '13', '7', '10', '2', '2022-12-18 10:49:27', ''),
(1012, '2023-06-10', 'Dante, East', 'for checkup', '2', '2', '11', '1', '2022-12-18 14:43:29', ''),
(1013, '2023-06-10', 'Targaryen, Daemon', 'checkup', '2', '2', '5', '1', '2022-12-18 16:13:13', ''),
(1015, '2023-06-11', 'John Snow', 'for checkup', '18', '9', '7', '2', '2023-06-11 19:48:19', 'approved'),
(1016, '2023-07-28', '1', '123', '18', '9', '12', '2', '2023-07-21 23:41:53', ''),
(1017, '2023-07-28', '2', '2', '19', '10', '13', '2', '2023-07-21 23:45:48', ''),
(1018, '2023-07-28', '3', '3', '18', '9', '14', '2', '2023-07-21 23:48:14', 'approved'),
(1019, '2023-07-21', '4', '4', '18', '9', '15', '2', '2023-07-21 23:50:55', 'approved'),
(1020, '2023-07-28', '5', '5', '18', '9', '16', '2', '2023-07-21 23:56:55', 'approved'),
(1021, '2023-07-21', '6', '6', '18', '9', '17', '2', '2023-07-21 23:57:40', 'approved');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienttbl`
--

INSERT INTO `clienttbl` (`client_id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `picture`) VALUES
(1, 'samsepiol', 'samsepiol', 'Sam', 'Sepiol', 'samsepiol@gmail.com', '', ''),
(2, 'estherdante', 'estherdante', 'Esther', 'Dante', 'estherdante@gmail.com', '', ''),
(3, 'king', 'king', 'King', 'Rhaegar', 'king@email.com', '', ''),
(4, 'grace', 'grace', 'grace', 'Lee', 'grace@email.com', '', ''),
(5, 'daemon', 'daemon', 'Daemon', 'Targaryen', 'daemon@email.com', '', ''),
(7, 'jonsnow', 'jonsnow', 'John', 'Snow', 'jonsnow@gmail.com', '09498183510', 'users/user-izcvt.jpg'),
(9, 'A', 'a', 'Jen', 'C', 'jcorcilles@asscat.edu.ph', '0910164421', ''),
(10, 'ericsantos', 'ericsantos', 'Eric', 'Santos', 'ericsantos@gmail.com', '09554827928', ''),
(11, 'eastdante', 'eastdante', 'East', 'Dante', 'eastdante@gmail.com', '09498183510', ''),
(12, '1', '1', '1', '', '', '', ''),
(13, '2', '2', '2', '', '', '', ''),
(14, '3', '3', '3', '', '', '', ''),
(15, '4', '4', '4', '', '', '', ''),
(16, '5', '5', '5', '', '', '', ''),
(17, '6', '6', '6', '', '', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinictbl`
--

INSERT INTO `clinictbl` (`id`, `clinic_name`, `address`, `latitude`, `longitude`) VALUES
(1, 'Franco Clinic and Hospital', 'Franco Clinic and Hospital, 23X6+HRP, Trento, 8505 Agusan del Sur', 0, 0),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countnotiftbl_admin`
--

INSERT INTO `countnotiftbl_admin` (`id`, `user_id`) VALUES
(20, '2'),
(21, '2'),
(23, '2'),
(24, '1'),
(25, '1'),
(26, '1'),
(27, '1'),
(28, '2'),
(29, '2');

-- --------------------------------------------------------

--
-- Table structure for table `countnotiftbl_user`
--

CREATE TABLE `countnotiftbl_user` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countnotiftbl_user`
--

INSERT INTO `countnotiftbl_user` (`id`, `user_id`) VALUES
(22, '10'),
(23, '11'),
(28, '11'),
(29, '5'),
(30, '7');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctortbl`
--

INSERT INTO `doctortbl` (`doctor_id`, `doctor_name`, `type_id`, `doctor_status`, `doctor_pic`, `phone`, `email`, `clinictype`) VALUES
(1, 'Dr.  Liza Smith', 1, 'available', 'doctors/doctor-36ufy.png', '09355572793', 'samsmith@gmail.com', 1),
(2, 'Dr. Mary Shaw', 2, 'available', 'users/user5-128x128.jpg', '09485520923', 'maryshaw@gmail.com', 1),
(9, 'Dr. John doe', 2, 'available', 'doctors/doctor-xqga8.jpg', '09201203811', 'johndoe@gmail.com', 1),
(10, 'Dr. Sam Grey', 1, 'available', 'doctors/doctor-yd47x.jpg', '09123132123', 'samgrey@gmail.com', 1),
(11, 'Dr. Leonardo Jalee', 4, 'available', 'doctors/doctor-gsxt1.jpg', '09554827928', 'jaleeclinic@gmail.com', 1),
(12, 'Dr. Rose Penida', 5, 'available', 'doctors/doctor-v6w59.jpg', '0911122234', 'rosepenida@gmail.com', 1),
(13, 'Dr. Christine Garcia', 7, 'available', 'doctors/doctor-l2yri.jpg', '09123456789', 'christinegarcia@gmail.com', 1),
(14, 'Dr. Roberto Castillo Jr. III', 6, 'available', 'doctors/doctor-2nv4e.jpg', '09123213123', 'castillo@gmail.com', 1),
(15, 'Dr. Rey Dela Cuesta', 1, 'available', 'doctors/doctor-2nv4e.jpg', '09123123234', 'reydelacuesta@gmail.com', 1),
(18, 'Dr. Sheila Magpale', 9, 'available', 'doctors/doctor-cjfri.png', '0912345789', 'sheilamagpale@gmail.com', 2),
(19, 'Dr. Richard Gordon', 10, 'available', 'doctors/doctor-7z41u.jpg', '0919293045', 'im@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `importtbl`
--

CREATE TABLE `importtbl` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `schedule_date` date NOT NULL,
  `minutes_done` double NOT NULL,
  `clinic_id` text NOT NULL,
  `doctor_id` text NOT NULL,
  `type_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `importtbl`
--

INSERT INTO `importtbl` (`id`, `name`, `schedule_date`, `minutes_done`, `clinic_id`, `doctor_id`, `type_id`) VALUES
(2, 'Junior Harvey', '2022-12-01', 29, '2', '11', '6'),
(3, 'Aaliyah Cox', '2022-04-27', 49, '3', '10', '1'),
(4, 'Declan Delgado', '2022-06-24', 4, '1', '13', '3'),
(5, 'Bruno Christian', '2022-08-21', 59, '4', '3', '7'),
(6, 'Kyle Bender', '2022-04-17', 23, '4', '13', '5'),
(7, 'Roosevelt King', '2022-01-02', 32, '1', '4', '3'),
(8, 'Lorraine Wilcox', '2022-09-13', 2, '5', '12', '4'),
(9, 'Kamran Roy', '2022-06-24', 28, '4', '6', '7'),
(10, 'Annabella Rodriguez', '2022-11-14', 46, '5', '11', '5'),
(11, 'Cian Pollard', '2022-06-30', 48, '4', '11', '7'),
(12, 'Isaac Zuniga', '2022-09-26', 36, '5', '5', '4'),
(13, 'Bilal Mercado', '2022-12-30', 18, '3', '12', '1'),
(14, 'Jared Horton', '2022-11-24', 48, '2', '6', '4'),
(15, 'Ronan Daniels', '2022-10-09', 43, '3', '4', '5'),
(16, 'Stephen Jensen', '2022-01-19', 33, '1', '1', '6'),
(17, 'Salman Nolan', '2022-04-19', 11, '1', '6', '7'),
(18, 'Henry Green', '2022-06-07', 9, '2', '2', '2'),
(19, 'Jed Cordova', '2022-08-19', 46, '5', '3', '1'),
(20, 'Rodney Parks', '2022-09-11', 34, '2', '9', '1'),
(21, 'Abby Bond', '2022-12-28', 56, '3', '1', '7'),
(22, 'Angelica Leonard', '2022-08-08', 9, '5', '4', '6'),
(23, 'Conor Howard', '2022-05-21', 46, '3', '11', '5'),
(24, 'Kayne Schwartz', '2022-12-13', 57, '4', '13', '3'),
(25, 'Josef Espinoza', '2022-03-07', 54, '1', '4', '1'),
(26, 'Chaya Webb', '2022-02-13', 45, '3', '10', '3'),
(27, 'Lily Dean', '2022-07-06', 14, '2', '13', '6'),
(28, 'Ralph Carver', '2022-04-15', 42, '2', '5', '5'),
(29, 'Lilli Mata', '2022-05-09', 27, '1', '1', '2'),
(30, 'Ali Terrell', '2022-08-25', 17, '4', '12', '3'),
(31, 'Gabriel Berg', '2022-04-14', 32, '3', '11', '1'),
(32, 'Yousef Chavez', '2022-04-12', 1, '2', '4', '1'),
(33, 'Marc Acevedo', '2022-06-27', 15, '2', '12', '2'),
(34, 'Harris Salazar', '2022-05-03', 25, '2', '1', '2'),
(35, 'Cara Cardenas', '2022-05-25', 50, '4', '13', '5'),
(36, 'Virgil Henry', '2022-08-24', 10, '3', '4', '4'),
(37, 'Zachary Byrne', '2022-06-04', 55, '4', '1', '2'),
(38, 'Barnaby Barlow', '2022-12-13', 51, '2', '13', '6'),
(39, 'Oscar Mcdowell', '2022-03-14', 2, '1', '6', '4'),
(40, 'Mikayla Villa', '2022-10-09', 46, '2', '4', '3'),
(41, 'Delilah Marshall', '2022-10-31', 16, '3', '12', '1'),
(42, 'Savanna Moore', '2022-03-29', 33, '2', '7', '7'),
(43, 'Aoife Keller', '2022-07-23', 7, '2', '8', '6'),
(44, 'Krish Owens', '2022-03-20', 9, '1', '1', '5'),
(45, 'Everly Roberts', '2022-11-02', 36, '5', '7', '2'),
(46, 'Alastair Turner', '2022-03-30', 24, '1', '13', '1'),
(47, 'Johnny Gallegos', '2022-11-17', 48, '3', '9', '7'),
(48, 'Randy Steele', '2022-09-08', 27, '1', '1', '1'),
(49, 'Marina Barker', '2022-09-18', 56, '4', '5', '6'),
(50, 'Timothy Jimenez', '2022-03-25', 30, '4', '2', '5'),
(51, 'Hamzah Bowers', '2022-10-01', 12, '5', '9', '2'),
(52, 'Rachel Foster', '2022-12-30', 5, '4', '9', '2'),
(53, 'Christopher Coleman', '2022-10-30', 18, '5', '11', '4'),
(54, 'Debra Powell', '2022-04-06', 37, '5', '11', '5'),
(55, 'Rebecca Alexander', '2022-06-01', 30, '1', '13', '3'),
(56, 'Tina Robinson', '2022-07-02', 10, '5', '5', '3'),
(57, 'Dorothy Stewart', '2022-04-10', 45, '3', '11', '4'),
(58, 'Philip Parker', '2022-10-27', 52, '5', '5', '7'),
(59, 'Andrew Richardson', '2022-11-16', 25, '4', '6', '3'),
(60, 'Theresa Miller', '2022-05-03', 40, '4', '4', '2'),
(61, 'Lois Russell', '2022-07-01', 50, '1', '5', '1'),
(62, 'Richard Gonzalez', '2022-03-27', 17, '4', '7', '6'),
(63, 'Michael Baker', '2022-09-15', 4, '3', '9', '6'),
(64, 'Fred Campbell', '2022-05-22', 44, '5', '10', '5'),
(65, 'Jesse Cooper', '2022-02-22', 52, '5', '8', '4'),
(66, 'Brandon Carter', '2022-10-27', 58, '3', '2', '4'),
(67, 'Wanda Scott', '2022-05-03', 5, '3', '3', '3'),
(68, 'Ryan Ramirez', '2022-06-24', 40, '3', '14', '5'),
(69, 'Willie Perez', '2022-11-21', 17, '5', '5', '1'),
(70, 'Marilyn Roberts', '2022-01-14', 44, '2', '2', '5'),
(71, 'Susan Green', '2022-10-06', 58, '4', '12', '4'),
(72, 'Peter White', '2022-04-06', 33, '2', '10', '7'),
(73, 'Frances Davis', '2022-01-31', 37, '3', '8', '7'),
(74, 'Howard Allen', '2022-08-03', 36, '4', '3', '3'),
(75, 'Louis Gonzales', '2022-07-26', 52, '1', '7', '5'),
(76, 'Sara Martinez', '2022-06-07', 38, '1', '9', '5'),
(77, 'Nicholas Wright', '2022-10-03', 22, '2', '2', '1'),
(78, 'Patrick Lopez', '2022-04-05', 14, '4', '11', '4'),
(79, 'Laura Martin', '2022-12-02', 24, '1', '10', '3'),
(80, 'Harold Rivera', '2022-09-28', 53, '2', '5', '7'),
(81, 'Lawrence Diaz', '2022-08-26', 56, '3', '1', '4'),
(82, 'Amanda Morris', '2022-06-20', 30, '5', '14', '2'),
(83, 'Aaron Hall', '2022-03-05', 21, '5', '6', '5'),
(84, 'Arthur Young', '2022-11-04', 43, '3', '14', '2'),
(85, 'Eric Nelson', '2022-10-15', 30, '5', '13', '4'),
(86, 'Jason Morgan', '2022-12-31', 58, '1', '5', '1'),
(87, 'Samuel Hughes', '2022-10-31', 55, '3', '7', '3'),
(88, 'Barbara Bryant', '2022-06-18', 5, '3', '7', '2'),
(89, 'Donald King', '2022-03-16', 36, '3', '1', '3'),
(90, 'Craig Moore', '2022-01-20', 1, '2', '5', '4'),
(91, 'Sandra Brown', '2022-10-01', 37, '5', '12', '7'),
(92, 'Martin Henderson', '2022-06-06', 40, '5', '6', '7'),
(93, 'William Clark', '2022-05-13', 1, '1', '11', '1'),
(94, 'Roy Bailey', '2022-02-11', 33, '4', '13', '5'),
(95, 'Denise Garcia', '2022-07-13', 36, '5', '1', '3'),
(96, 'Amy Collins', '2022-10-13', 30, '1', '12', '3'),
(97, 'Carl Peterson', '2022-09-11', 28, '5', '1', '4'),
(98, 'Ernest Sanders', '2022-09-04', 59, '3', '12', '5'),
(99, 'Irene Turner', '2022-09-21', 16, '5', '1', '5'),
(100, 'Kathy Reed', '2022-12-14', 9, '2', '2', '1'),
(101, 'Margaret Bennett', '2022-01-21', 11, '3', '1', '4'),
(102, 'Jessica Griffin', '2022-05-28', 3, '3', '2', '6'),
(103, 'Bruce Lewis', '2022-02-09', 9, '2', '11', '5'),
(104, 'Gloria Johnson', '2022-07-15', 33, '2', '14', '5'),
(105, 'Keith Adams', '2022-01-25', 60, '5', '12', '3'),
(106, 'Virginia Simmons', '2022-05-27', 57, '2', '9', '1'),
(107, 'Stephen Anderson', '2022-07-11', 12, '4', '14', '3'),
(108, 'Harry Torres', '2022-04-22', 59, '2', '12', '4'),
(109, 'Steven Harris', '2022-04-03', 56, '5', '9', '1'),
(110, 'Raymond Price', '2022-12-03', 29, '5', '8', '5'),
(111, 'Randy Hill', '2022-07-01', 40, '3', '1', '4'),
(112, 'Larry Barnes', '2022-01-11', 53, '4', '10', '1'),
(113, 'Timothy Ross', '2022-05-07', 59, '3', '13', '3'),
(114, 'Gary Thompson', '2022-04-10', 52, '1', '11', '1'),
(115, 'Jacqueline Watson', '2022-08-03', 48, '5', '5', '2'),
(116, 'Kimberly Smith', '2022-07-28', 30, '2', '3', '1'),
(117, 'Carolyn Williams', '2022-04-08', 47, '2', '3', '5'),
(118, 'Jennifer Thomas', '2022-01-31', 10, '3', '2', '1'),
(119, 'Lisa Wilson', '2022-06-28', 22, '4', '12', '5'),
(120, 'Frank Gray', '2022-03-04', 46, '1', '7', '7'),
(121, 'Robert Taylor', '2022-11-20', 26, '5', '6', '6'),
(122, 'Steve Edwards', '2022-10-05', 7, '2', '11', '1'),
(123, 'Bonnie Washington', '2022-09-22', 39, '5', '5', '3'),
(124, 'Todd Perry', '2022-12-29', 26, '4', '2', '1'),
(125, 'Ann Evans', '2022-02-11', 14, '1', '9', '6'),
(126, 'Joseph Walker', '2022-10-01', 18, '2', '1', '1'),
(127, 'Pamela Brooks', '2022-12-16', 49, '5', '1', '2'),
(128, 'Catherine Bell', '2022-07-05', 10, '5', '2', '6'),
(129, 'Dennis Long', '2022-10-01', 4, '1', '14', '7'),
(130, 'Mildred Cox', '2022-08-03', 43, '5', '4', '3'),
(131, 'Linda Ward', '2022-12-15', 27, '1', '4', '6'),
(132, 'Wayne Wood', '2022-04-16', 6, '3', '7', '6'),
(133, 'Ruth Howard', '2022-03-12', 25, '1', '1', '2'),
(134, 'Douglas James', '2022-08-05', 38, '5', '1', '4'),
(135, 'Joshua Hernandez', '2022-10-09', 39, '5', '4', '7'),
(136, 'Thomas Jackson', '2022-08-23', 57, '5', '13', '7'),
(137, 'Maria Lee', '2022-05-10', 18, '1', '13', '6'),
(138, 'Annie Rogers', '2022-07-04', 33, '2', '7', '4'),
(139, 'Christina Sanchez', '2022-09-03', 51, '1', '7', '1'),
(140, 'Ruby Jones', '2022-11-20', 9, '4', '3', '3'),
(141, 'Gerald Phillips', '2022-08-22', 3, '2', '11', '6'),
(142, 'Albert Patterson', '2022-07-12', 7, '4', '14', '5'),
(143, 'Diana Mitchell', '2022-03-20', 52, '5', '14', '5'),
(144, 'Kathleen Rodriguez', '2022-08-06', 57, '2', '12', '4'),
(145, 'Kathryn Murphy', '2022-03-12', 31, '5', '9', '1'),
(146, 'Gregory Flores', '2022-10-01', 50, '2', '9', '4'),
(147, 'Beverly Jenkins', '2022-10-12', 27, '5', '13', '7'),
(148, 'Donna Kelly', '2022-04-20', 20, '1', '6', '3'),
(149, 'Ronald Butler', '2022-11-21', 19, '3', '11', '5'),
(150, 'Nicole Cook', '2022-10-20', 20, '4', '1', '4'),
(151, 'Cynthia Bullocks', '2022-09-15', 25, '4', '3', '3'),
(152, 'Junior Harvey', '2017-11-08', 60, '5', '4', '3'),
(153, 'Aaliyah Cox', '2020-05-06', 69, '5', '4', '6'),
(154, 'Declan Delgado', '2019-05-15', 95, '4', '2', '2'),
(155, 'Bruno Christian', '2018-06-03', 89, '2', '2', '2'),
(156, 'Kyle Bender', '2017-09-21', 70, '2', '5', '1'),
(157, 'Roosevelt King', '2021-12-24', 39, '2', '12', '1'),
(158, 'Lorraine Wilcox', '2021-08-05', 26, '2', '3', '5'),
(159, 'Kamran Roy', '2018-09-13', 27, '2', '4', '6'),
(160, 'Annabella Rodriguez', '2017-06-17', 90, '2', '14', '3'),
(161, 'Cian Pollard', '2020-11-19', 64, '1', '5', '1'),
(162, 'Isaac Zuniga', '2021-11-17', 42, '5', '2', '7'),
(163, 'Bilal Mercado', '2020-01-07', 71, '1', '9', '5'),
(164, 'Jared Horton', '2017-01-18', 78, '3', '12', '1'),
(165, 'Ronan Daniels', '2019-10-04', 29, '5', '6', '7'),
(166, 'Stephen Jensen', '2018-11-04', 81, '1', '4', '6'),
(167, 'Salman Nolan', '2021-01-20', 15, '5', '1', '5'),
(168, 'Henry Green', '2020-06-15', 105, '2', '9', '1'),
(169, 'Jed Cordova', '2017-12-12', 16, '3', '10', '6'),
(170, 'Rodney Parks', '2021-09-11', 43, '4', '14', '1'),
(171, 'Abby Bond', '2017-01-08', 115, '4', '13', '6'),
(172, 'Angelica Leonard', '2017-04-14', 43, '4', '7', '7'),
(173, 'Conor Howard', '2020-09-19', 29, '1', '9', '4'),
(174, 'Kayne Schwartz', '2020-01-17', 84, '5', '11', '3'),
(175, 'Josef Espinoza', '2020-08-08', 34, '1', '10', '3'),
(176, 'Chaya Webb', '2020-02-22', 91, '3', '11', '5'),
(177, 'Lily Dean', '2017-10-21', 44, '3', '2', '4'),
(178, 'Ralph Carver', '2019-03-22', 60, '3', '5', '2'),
(179, 'Lilli Mata', '2020-09-21', 64, '2', '2', '5'),
(180, 'Ali Terrell', '2018-07-29', 17, '1', '14', '7'),
(181, 'Gabriel Berg', '2018-11-20', 50, '2', '12', '4'),
(182, 'Yousef Chavez', '2018-09-02', 110, '5', '14', '7'),
(183, 'Marc Acevedo', '2018-02-08', 99, '1', '8', '6'),
(184, 'Harris Salazar', '2020-12-21', 17, '4', '11', '2'),
(185, 'Cara Cardenas', '2017-07-10', 49, '4', '13', '3'),
(186, 'Virgil Henry', '2019-09-23', 23, '5', '10', '4'),
(187, 'Zachary Byrne', '2021-05-22', 47, '2', '3', '3'),
(188, 'Barnaby Barlow', '2017-10-19', 19, '2', '5', '5'),
(189, 'Oscar Mcdowell', '2018-09-30', 29, '1', '7', '6'),
(190, 'Mikayla Villa', '2018-06-13', 68, '1', '4', '3'),
(191, 'Delilah Marshall', '2021-05-28', 42, '5', '8', '1'),
(192, 'Savanna Moore', '2018-12-20', 26, '3', '7', '7'),
(193, 'Aoife Keller', '2020-12-01', 59, '1', '8', '2'),
(194, 'Krish Owens', '2017-05-22', 115, '2', '3', '4'),
(195, 'Everly Roberts', '2018-03-22', 59, '2', '9', '7'),
(196, 'Alastair Turner', '2020-12-27', 49, '4', '8', '5'),
(197, 'Johnny Gallegos', '2021-12-03', 117, '5', '2', '6'),
(198, 'Randy Steele', '2017-04-27', 71, '5', '14', '2'),
(199, 'Marina Barker', '2019-11-23', 38, '2', '13', '7'),
(200, 'Timothy Jimenez', '2018-03-01', 35, '2', '6', '1'),
(201, 'Hamzah Bowers', '2021-10-07', 42, '4', '11', '7'),
(202, 'Rachel Foster', '2018-08-03', 102, '1', '11', '1'),
(203, 'Christopher Coleman', '2017-06-13', 45, '1', '9', '6'),
(204, 'Debra Powell', '2018-12-08', 99, '1', '12', '3'),
(205, 'Rebecca Alexander', '2017-11-16', 62, '2', '13', '3'),
(206, 'Tina Robinson', '2017-04-19', 117, '2', '1', '3'),
(207, 'Dorothy Stewart', '2018-04-09', 108, '3', '14', '4'),
(208, 'Philip Parker', '2019-03-08', 99, '4', '7', '5'),
(209, 'Andrew Richardson', '2017-03-21', 37, '3', '10', '4'),
(210, 'Theresa Miller', '2020-10-15', 82, '5', '4', '1'),
(211, 'Lois Russell', '2020-10-13', 77, '3', '6', '2'),
(212, 'Richard Gonzalez', '2017-01-15', 80, '2', '14', '4'),
(213, 'Michael Baker', '2020-01-12', 109, '3', '7', '4'),
(214, 'Fred Campbell', '2018-12-13', 115, '4', '1', '3'),
(215, 'Jesse Cooper', '2018-11-18', 78, '2', '1', '3'),
(216, 'Brandon Carter', '2020-12-18', 107, '2', '4', '6'),
(217, 'Wanda Scott', '2019-10-25', 25, '5', '7', '3'),
(218, 'Ryan Ramirez', '2021-02-03', 19, '3', '2', '2'),
(219, 'Willie Perez', '2020-02-20', 85, '5', '8', '6'),
(220, 'Marilyn Roberts', '2019-06-12', 103, '4', '9', '6'),
(221, 'Susan Green', '2021-02-11', 83, '2', '13', '4'),
(222, 'Peter White', '2021-06-16', 37, '4', '8', '3'),
(223, 'Frances Davis', '2021-06-27', 38, '5', '14', '5'),
(224, 'Howard Allen', '2019-11-09', 37, '5', '3', '1'),
(225, 'Louis Gonzales', '2020-06-15', 104, '5', '7', '5'),
(226, 'Sara Martinez', '2020-11-04', 46, '5', '4', '7'),
(227, 'Nicholas Wright', '2017-06-21', 20, '1', '8', '6'),
(228, 'Patrick Lopez', '2021-06-10', 23, '1', '4', '1'),
(229, 'Laura Martin', '2018-11-09', 45, '3', '4', '2'),
(230, 'Harold Rivera', '2020-11-07', 20, '3', '14', '3'),
(231, 'Lawrence Diaz', '2020-02-29', 75, '1', '9', '2'),
(232, 'Amanda Morris', '2018-06-30', 32, '1', '1', '4'),
(233, 'Aaron Hall', '2021-04-21', 64, '3', '1', '6'),
(234, 'Arthur Young', '2021-08-07', 25, '1', '5', '1'),
(235, 'Eric Nelson', '2018-06-07', 66, '4', '6', '1'),
(236, 'Jason Morgan', '2019-08-29', 75, '1', '4', '4'),
(237, 'Samuel Hughes', '2017-07-30', 36, '4', '1', '6'),
(238, 'Barbara Bryant', '2020-05-06', 37, '4', '7', '7'),
(239, 'Donald King', '2020-10-12', 69, '5', '6', '3'),
(240, 'Craig Moore', '2018-05-11', 102, '1', '3', '2'),
(241, 'Sandra Brown', '2021-10-10', 87, '3', '6', '2'),
(242, 'Martin Henderson', '2021-04-10', 103, '4', '12', '1'),
(243, 'William Clark', '2020-03-05', 15, '4', '7', '5'),
(244, 'Roy Bailey', '2019-08-06', 26, '2', '5', '2'),
(245, 'Denise Garcia', '2017-03-26', 96, '1', '3', '7'),
(246, 'Amy Collins', '2018-04-01', 99, '5', '14', '7'),
(247, 'Carl Peterson', '2018-07-23', 101, '1', '9', '1'),
(248, 'Ernest Sanders', '2020-10-01', 75, '3', '3', '2'),
(249, 'Irene Turner', '2020-05-20', 47, '5', '8', '6'),
(250, 'Kathy Reed', '2021-03-25', 26, '3', '11', '5'),
(251, 'Margaret Bennett', '2021-09-07', 89, '1', '4', '3'),
(252, 'Jessica Griffin', '2021-06-11', 117, '5', '1', '5'),
(253, 'Bruce Lewis', '2017-03-02', 76, '4', '10', '7'),
(254, 'Gloria Johnson', '2020-08-14', 20, '2', '9', '7'),
(255, 'Keith Adams', '2020-03-26', 70, '5', '11', '3'),
(256, 'Virginia Simmons', '2018-09-02', 15, '1', '8', '5'),
(257, 'Stephen Anderson', '2018-10-12', 31, '3', '3', '6'),
(258, 'Harry Torres', '2017-08-13', 113, '5', '14', '7'),
(259, 'Steven Harris', '2017-02-13', 100, '2', '12', '5'),
(260, 'Raymond Price', '2021-11-07', 23, '3', '9', '7'),
(261, 'Randy Hill', '2017-12-07', 110, '4', '7', '7'),
(262, 'Larry Barnes', '2018-01-06', 68, '5', '14', '1'),
(263, 'Timothy Ross', '2019-05-31', 93, '3', '14', '1'),
(264, 'Gary Thompson', '2021-11-07', 39, '4', '9', '1'),
(265, 'Jacqueline Watson', '2020-11-15', 64, '5', '9', '7'),
(266, 'Kimberly Smith', '2020-12-16', 83, '2', '3', '7'),
(267, 'Carolyn Williams', '2017-03-23', 29, '2', '6', '2'),
(268, 'Jennifer Thomas', '2021-06-28', 99, '5', '1', '3'),
(269, 'Lisa Wilson', '2020-12-21', 118, '2', '9', '2'),
(270, 'Frank Gray', '2020-06-13', 37, '3', '1', '5'),
(271, 'Robert Taylor', '2020-02-07', 87, '5', '2', '3'),
(272, 'Steve Edwards', '2020-02-14', 84, '1', '12', '1'),
(273, 'Bonnie Washington', '2021-06-14', 119, '5', '1', '7'),
(274, 'Todd Perry', '2019-04-02', 24, '1', '4', '2'),
(275, 'Ann Evans', '2020-12-14', 40, '5', '2', '1'),
(276, 'Joseph Walker', '2019-11-12', 80, '5', '5', '3'),
(277, 'Pamela Brooks', '2017-07-23', 115, '2', '5', '1'),
(278, 'Catherine Bell', '2020-11-08', 55, '5', '9', '6'),
(279, 'Dennis Long', '2021-11-03', 99, '1', '3', '3'),
(280, 'Mildred Cox', '2020-12-11', 54, '3', '2', '2'),
(281, 'Linda Ward', '2017-09-01', 45, '4', '4', '4'),
(282, 'Wayne Wood', '2019-11-07', 100, '1', '14', '5'),
(283, 'Ruth Howard', '2021-11-18', 66, '4', '7', '5'),
(284, 'Douglas James', '2020-12-18', 60, '1', '14', '3'),
(285, 'Joshua Hernandez', '2017-11-02', 71, '3', '9', '2'),
(286, 'Thomas Jackson', '2017-09-20', 118, '4', '12', '4'),
(287, 'Maria Lee', '2020-02-15', 77, '2', '2', '1'),
(288, 'Annie Rogers', '2020-03-15', 15, '2', '3', '5'),
(289, 'Christina Sanchez', '2020-03-10', 97, '4', '1', '6'),
(290, 'Ruby Jones', '2019-12-09', 43, '3', '12', '2'),
(291, 'Gerald Phillips', '2020-08-25', 31, '3', '13', '3'),
(292, 'Albert Patterson', '2020-02-11', 47, '1', '1', '6'),
(293, 'Diana Mitchell', '2021-02-19', 80, '4', '1', '7'),
(294, 'Kathleen Rodriguez', '2021-08-17', 48, '1', '12', '2'),
(295, 'Kathryn Murphy', '2018-08-31', 100, '5', '8', '6'),
(296, 'Gregory Flores', '2019-06-08', 100, '2', '5', '1'),
(297, 'Beverly Jenkins', '2017-05-20', 53, '4', '3', '6'),
(298, 'Donna Kelly', '2018-07-12', 113, '2', '13', '4'),
(299, 'Ronald Butler', '2019-04-07', 55, '2', '3', '6'),
(300, 'Nicole Cook', '2021-09-17', 117, '5', '2', '6'),
(301, 'Cynthia Bullocks', '2020-04-13', 30, '5', '1', '5');

-- --------------------------------------------------------

--
-- Table structure for table `locationtbl`
--

CREATE TABLE `locationtbl` (
  `id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(12, 'An appointment request has been sent by Snow, John', '2022-12-09 04:10:09', '2', 0, 'appointment'),
(13, 'An appointment request has been sent by Santos, Eric.', '2022-12-18 10:49:27', '1', 0, 'appointment'),
(14, 'Franco Clinic and Hospital sent a referral to you', '2022-12-18 02:34:43', '2', 0, 'referral'),
(15, 'Your referral request has been approved by Trento Rural Health Unit and Reproductive Health Center', '2022-12-18 02:35:54', '1', 0, 'referral'),
(16, 'Your referral request has been denied by Trento Rural Health Unit and Reproductive Health Center', '2022-12-18 02:36:07', '1', 0, 'referral'),
(17, 'An appointment request has been sent by Dante, East.', '2022-12-18 02:43:29', '1', 0, 'appointment'),
(18, 'An appointment request has been sent by Targaryen, Daemon.', '2022-12-18 04:13:13', '1', 0, 'appointment'),
(19, 'An appointment request has been sent by Snow, John.', '2023-06-10 07:38:47', '2', 0, 'appointment'),
(20, 'An appointment request has been sent by Snow, John.', '2023-06-10 07:48:19', '2', 0, 'appointment');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notificationtbl_user`
--

INSERT INTO `notificationtbl_user` (`id`, `transaction`, `date_`, `user_id`, `seen`, `type`) VALUES
(12, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-09', '2022-12-08 10:56:21', '7', 0, 'appointment'),
(18, 'Your appointment request has been denied by Franco Clinic and Hospital', '2022-12-08 11:04:51', '7', 0, 'appointment'),
(19, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-09', '2022-12-08 11:05:14', '7', 0, 'appointment'),
(20, 'Your appointment request has been approved by Trento Rural Health Unit and Reproductive Health Center for schedule on 2022-12-17', '2022-12-09 04:11:51', '7', 0, 'appointment'),
(21, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 10:56:48', '10', 0, 'appointment'),
(22, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 02:46:01', '11', 0, 'appointment'),
(23, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 03:32:39', '7', 0, 'appointment'),
(24, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 03:32:59', '7', 0, 'appointment'),
(25, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 03:42:30', '7', 0, 'appointment'),
(26, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 03:43:25', '7', 0, 'appointment'),
(27, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 04:11:24', '11', 0, 'appointment'),
(28, 'Your appointment request has been approved by Franco Clinic and Hospital for schedule on 2022-12-18', '2022-12-18 04:13:27', '5', 0, 'appointment'),
(29, 'Your appointment request has been approved by Trento Rural Health Unit and Reproductive Health Center for schedule on 2023-06-11', '2023-06-11 02:43:22', '7', 0, 'appointment');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queuetbl`
--

INSERT INTO `queuetbl` (`id`, `priorityno`, `client_id`, `type_id`, `doctor_id`, `clinictype`, `datetime_sched`, `date_sched`, `status`) VALUES
(34, 1, '7', '4', 11, '2', '2023-07-21 22:00:00', '2023-07-21', 'ongoing'),
(35, 3, '11', '2', 2, '2', '2023-07-21 22:15:00', '2023-07-21', ''),
(36, 2, '5', '2', 2, '2', '2023-07-21 22:30:00', '2023-07-21', ''),
(37, 5, '7', '9', 18, '2', '2023-07-21 22:45:00', '2023-07-21', ''),
(38, 1, '16', '9', 18, '2', '2023-07-28 09:00:00', '2023-07-28', ''),
(39, 4, '17', '9', 18, '2', '2023-07-21 09:00:00', '2023-07-21', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referraltbl`
--

INSERT INTO `referraltbl` (`id`, `client_id`, `message`, `file_attached`, `date_sent`, `type`, `sender`, `receiver`, `status`) VALUES
(1, '1', 'We are referring the patient named: Mary Shaw in your clinic (pulmonology).', '2/referral1.png', '2022-12-05 02:24:04', '1', '1', '2', 'approved'),
(3, '1', '123', '1/1ff8a7b5dc7a7d1f0ed65aaa29c04b1e.stamp', '2022-12-05 08:43:04', '2', '2', '1', 'approved'),
(4, '7', 'please refer to urology', '1/084b6fbb10729ed4da8c3d3f5a3ae7c9.png', '2022-12-05 09:20:40', '4', '1', '2', 'denied'),
(10, '1', 'for referral', '1/d1f491a404d6854880943e5c3cd9ca25.png', '2022-12-08 12:56:09', '2', '1', '2', ''),
(11, '1', 'for your approval', '1/eecca5b6365d9607ee5a9d336962c534.gif', '2022-12-08 01:01:57', '3', '1', '2', ''),
(12, '1', 'sample', '1/58a2fc6ed39fd083f55d4182bf88826d.gif', '2022-12-08 09:43:14', '2', '1', '2', ''),
(13, '1', '12', '1/85d8ce590ad8981ca2c8286f79f59954.gif', '2022-12-08 09:45:47', '1', '1', '2', ''),
(14, '1', '123', '1/c45147dee729311ef5b5c3003946c48f.gif', '2022-12-08 09:48:09', '1', '1', '2', ''),
(15, '1', '123', '1/4c5bde74a8f110656874902f07378009.gif', '2022-12-08 09:49:07', '1', '1', '2', ''),
(16, '1', 'for referral of patient.', '1/cfecdb276f634854f3ef915e2e980c31.', '2022-12-18 02:34:43', '3', '1', '2', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(49, 'Sunday', 20, '17:00:00', '22:00:00', 10, '11'),
(50, 'Monday', 0, '09:00:00', '15:00:00', 0, '12'),
(51, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '12'),
(52, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '12'),
(53, 'Thursday', 0, '09:00:00', '15:00:00', 0, '12'),
(54, 'Friday', 0, '09:00:00', '15:00:00', 0, '12'),
(55, 'Saturday', 0, '09:00:00', '15:00:00', 0, '12'),
(56, 'Sunday', 15, '15:00:00', '09:30:00', 10, '12'),
(57, 'Monday', 0, '09:00:00', '15:00:00', 0, '13'),
(58, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '13'),
(59, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '13'),
(60, 'Thursday', 0, '09:00:00', '15:00:00', 0, '13'),
(61, 'Friday', 0, '09:00:00', '15:00:00', 0, '13'),
(62, 'Saturday', 0, '09:00:00', '15:00:00', 0, '13'),
(63, 'Sunday', 20, '12:00:00', '15:00:00', 10, '13'),
(64, 'Monday', 0, '09:00:00', '15:00:00', 0, '14'),
(65, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '14'),
(66, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '14'),
(67, 'Thursday', 0, '09:00:00', '15:00:00', 0, '14'),
(68, 'Friday', 0, '09:00:00', '15:00:00', 0, '14'),
(69, 'Saturday', 0, '09:00:00', '15:00:00', 0, '14'),
(70, 'Sunday', 0, '09:00:00', '15:00:00', 0, '14'),
(71, 'Monday', 0, '09:00:00', '15:00:00', 0, '15'),
(72, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '15'),
(73, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '15'),
(74, 'Thursday', 0, '09:00:00', '15:00:00', 0, '15'),
(75, 'Friday', 0, '09:00:00', '15:00:00', 0, '15'),
(76, 'Saturday', 0, '09:00:00', '15:00:00', 0, '15'),
(77, 'Sunday', 0, '09:00:00', '15:00:00', 0, '15'),
(78, 'Monday', 0, '09:00:00', '15:00:00', 0, '18'),
(79, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '18'),
(80, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '18'),
(81, 'Thursday', 0, '09:00:00', '15:00:00', 0, '18'),
(82, 'Friday', 0, '09:00:00', '15:00:00', 0, '18'),
(83, 'Saturday', 0, '09:00:00', '15:00:00', 0, '18'),
(84, 'Sunday', 15, '13:00:00', '17:00:00', 10, '18'),
(85, 'Monday', 0, '09:00:00', '15:00:00', 0, '19'),
(86, 'Tuesday', 0, '09:00:00', '15:00:00', 0, '19'),
(87, 'Wednesday', 0, '09:00:00', '15:00:00', 0, '19'),
(88, 'Thursday', 0, '09:00:00', '15:00:00', 0, '19'),
(89, 'Friday', 0, '09:00:00', '15:00:00', 0, '19'),
(90, 'Saturday', 0, '09:00:00', '15:00:00', 0, '19'),
(91, 'Sunday', 0, '09:00:00', '15:00:00', 0, '19');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typetbl`
--

INSERT INTO `typetbl` (`type_id`, `type_name`, `room`, `room_status`, `clinictype`) VALUES
(1, 'Dental', '203', 'open', '1'),
(2, 'Internal Medicine', '202', 'open', '1'),
(3, 'Cardiology', '111', 'open', '1'),
(4, 'Urology', '204', 'open', '1'),
(5, 'Neurology', '301', 'open', '1'),
(6, 'Radiology', '305', 'open', '1'),
(7, 'Pediatrician', '306', 'open', '1'),
(8, 'Eurology', 'rm09', 'open', '1'),
(9, 'Pediatrician', '306', 'open', '2'),
(10, 'Eurology', 'rm09', 'open', '2'),
(11, 'Internal Medicine', 'im dept', 'open', '3');

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
-- Indexes for table `importtbl`
--
ALTER TABLE `importtbl`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `activitylog_user`
--
ALTER TABLE `activitylog_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `appointtbl`
--
ALTER TABLE `appointtbl`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT for table `clienttbl`
--
ALTER TABLE `clienttbl`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clinictbl`
--
ALTER TABLE `clinictbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countnotiftbl_admin`
--
ALTER TABLE `countnotiftbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countnotiftbl_user`
--
ALTER TABLE `countnotiftbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `doctortbl`
--
ALTER TABLE `doctortbl`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `importtbl`
--
ALTER TABLE `importtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `locationtbl`
--
ALTER TABLE `locationtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificationtbl_admin`
--
ALTER TABLE `notificationtbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notificationtbl_user`
--
ALTER TABLE `notificationtbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `queuetbl`
--
ALTER TABLE `queuetbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `referraltbl`
--
ALTER TABLE `referraltbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedtbl`
--
ALTER TABLE `schedtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `typetbl`
--
ALTER TABLE `typetbl`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
