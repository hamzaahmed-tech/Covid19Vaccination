-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 09:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidhospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accept_hospital`
--

CREATE TABLE `accept_hospital` (
  `hospital_id` int(11) NOT NULL,
  `reg_hos_id` int(11) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_manager_name` varchar(200) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hospital_contact` varchar(255) NOT NULL,
  `hospital_location` varchar(222) NOT NULL,
  `hospital_manager_cnic` varchar(222) NOT NULL,
  `hospital_open_time` varchar(222) NOT NULL,
  `hospital_close_time` varchar(222) NOT NULL,
  `hospital_verified` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accept_hospital`
--

INSERT INTO `accept_hospital` (`hospital_id`, `reg_hos_id`, `hospital_name`, `hospital_manager_name`, `hospital_email`, `hospital_contact`, `hospital_location`, `hospital_manager_cnic`, `hospital_open_time`, `hospital_close_time`, `hospital_verified`) VALUES
(2, 6, 'jinnah', 'umair', 'jinnah@gmail.com', '4454545454545', ' karachi ', '54545454', '04:04 ', '04:04', 'not verified'),
(4, 1, 'national', 'humaira', 'humaira@gmail.com', '4343434', ' karachi ', '565655655665', '03:33 ', '08:01', 'not verified'),
(7, 3, 'Agha Khan', 'hamza', 'hamza@gmail.com', '343434343', ' lahore', '355353553', '09:09 ', '13:09', 'not verified'),
(9, 2, 'jinnah', 'sheraz', 'sheraz@gmail.com', '434343', ' karachi ', '565655655665', '03:33 ', '08:01', 'not verified'),
(14, 8, 'Pak hospital ', 'Bilal', 'pakHospital@gmail.com', '34455454545', ' lahore', '4546565656', '13:00 ', '22:00', 'not verified');

-- --------------------------------------------------------

--
-- Table structure for table `accept_patient`
--

CREATE TABLE `accept_patient` (
  `pateint_id` int(11) NOT NULL,
  `reg_pateint_id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_phone` varchar(255) NOT NULL,
  `patient_cnic` varchar(255) NOT NULL,
  `patient_age` varchar(222) NOT NULL,
  `patient_select_hos` varchar(222) NOT NULL,
  `patient_gender` varchar(222) NOT NULL,
  `patient_vacc` varchar(222) NOT NULL,
  `patient_app_day` varchar(222) NOT NULL,
  `pateint_dos_1` varchar(222) NOT NULL,
  `pateint_dos_2` varchar(222) NOT NULL,
  `pateint_dos_1_date` varchar(111) NOT NULL,
  `pateint_dos_2_date` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accept_patient`
--

INSERT INTO `accept_patient` (`pateint_id`, `reg_pateint_id`, `patient_name`, `patient_email`, `patient_phone`, `patient_cnic`, `patient_age`, `patient_select_hos`, `patient_gender`, `patient_vacc`, `patient_app_day`, `pateint_dos_1`, `pateint_dos_2`, `pateint_dos_1_date`, `pateint_dos_2_date`) VALUES
(5, 3, ' subhan', 'subhan@gmail.com', '54545454', '565655655665', ' 33', 'nationl', 'Male', '\r\nSinopharm', 'tuesday', 'vaccinated', 'vaccinated', '2023-05-05', '2023-05-05'),
(6, 1, ' sheraz', 'sheraz@gmail.com', '434434', '565655655665', ' 33', 'nationl', 'Male', '\r\nSinopharm', 'monday', 'vaccinated', 'vaccinated', '2023-02-22', '2024-05-06'),
(7, 7, ' maria', 'maria@gmail.com', '33333333', '33333333333', ' 333333333', 'nationl', 'Male', 'Sinovac', 'monday', 'vaccinated', 'vaccinated', '2023-02-22', '2025-05-05'),
(8, 6, ' maria', 'maria@gmail.com', '222222222222222', '22222222222222', ' 22', 'nationl', 'Femail', 'Sinovac', 'monday', 'vaccinated', 'vaccinated', '2023-02-22', '2023-05-05'),
(9, 5, ' ali', 'ali@gmail.com', '333333333334', '43333333333334', ' 33', 'nationl', 'Male', 'Sinovac', 'tuesday', 'vaccinated', 'vaccinated', '2023-05-05', '2023-08-06'),
(10, 8, ' hamza', 'hamza@gmail.com', '45454545', '355353553', ' 22', 'nationl', 'Male', '\r\nSinopharm', 'tuesday', 'vaccinated', 'vaccinated', '2023-05-22', '2025-02-02'),
(11, 9, ' irfan', 'irfan@gmail.com', '344343', '23232323', ' 33', 'nationl', 'Male', '\r\nSinopharm', 'tuesday', 'vaccinated', 'vaccinated', '2023-05-05', '2023-05-05'),
(16, 10, ' usama', 'usama@gmial.com', '3443434', '232323232', ' 33', 'nationl', 'Male', 'Sinovac', 'thusday', 'vaccinated', 'vaccinated', '2023-02-05', '2024-09-05'),
(17, 11, ' yunus', 'yunus@gmail.com', '434343434', '4343434343', ' 33', 'Agha Khan', 'Male', '\r\nSinopharm', 'thusday', 'vaccinated', 'vaccinated', '2023-05-05', '2023-05-05'),
(18, 12, ' dsgsg', 'umair@gamil.com', '345454', '65446', ' 66', 'national', 'Male', '\r\nSinopharm', 'monday', 'vaccinated', 'vaccinated', '2023-05-05', '2025-05-05'),
(19, 13, ' maria', 'assds@gmail.com', '343525435', '5433424355454', ' 44', 'jinnah', 'Male', '\r\nSinopharm', 'monday', 'vaccinated', 'vaccinated', '2025-05-05', '2025-05-05'),
(20, 14, ' kadkk', 'ksk@gmail.com', '51646464', '6544664', ' 2', 'jinnah', 'Male', '\r\nSinopharm', 'tuesday', 'vaccinated', 'vaccinated', '0023-02-22', '52020-05-05'),
(21, 15, ' 43434', 'bhandsd3akop@gmial.com', '343544545', '54354654545', ' 44', 'jinnah', 'Male', '\r\nSinopharm', 'tuesday', 'vaccinated', 'vaccinated', '2023-05-05', '2023-05-05'),
(41, 16, ' umair', 'checkEmail@gmail.com', '3444535454', '34244345', ' 23', 'jinnah', 'Male', '\r\nSinopharm', 'monday', 'vaccinated', 'vaccinated', '2023-05-05', '2023-05-05'),
(42, 20, ' wajid', 'wajid@gmail.com', '5465464456', '546546645', ' 22', 'jinnah', 'Male', 'Pak Vacc', 'tuesday', 'vaccinated', 'not vaccinated', '2023-05-05', '00-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(222) NOT NULL,
  `admin_email` varchar(222) NOT NULL,
  `admin_cnic` varchar(222) NOT NULL,
  `admin_password` varchar(222) NOT NULL,
  `admin_phone` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_cnic`, `admin_password`, `admin_phone`) VALUES
(1, 'sherazAdmin', 'admin@gmail.com', '112233445566', '$2y$10$ADB4totvDxKV0XshKd1vX.XWqus0PB0u929/gr5jpuQlCqNyBO.U6', '33003232323'),
(3, 'subhanedit', 'admin22@gmail.com', '43443434', '23232', '344343434');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_portal`
--

CREATE TABLE `hospital_portal` (
  `hos_pot_id` int(11) NOT NULL,
  `hos_pot_name` varchar(200) NOT NULL,
  `hos_pot_email` varchar(200) NOT NULL,
  `hos_pot_password` varchar(255) NOT NULL,
  `accept_hos_id` varchar(255) NOT NULL,
  `reg_hospital_id` varchar(222) NOT NULL,
  `reg_user_id` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reg_hospital`
--

CREATE TABLE `reg_hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_manager_name` varchar(200) NOT NULL,
  `hospital_email` varchar(200) NOT NULL,
  `hospital_contact` varchar(255) NOT NULL,
  `hospital_location` varchar(222) NOT NULL,
  `hospital_manager_cnic` varchar(222) NOT NULL,
  `hospital_open_time` varchar(222) NOT NULL,
  `hospital_close_time` varchar(222) NOT NULL,
  `user_id` varchar(222) NOT NULL,
  `hospital_status` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_hospital`
--

INSERT INTO `reg_hospital` (`hospital_id`, `hospital_name`, `hospital_manager_name`, `hospital_email`, `hospital_contact`, `hospital_location`, `hospital_manager_cnic`, `hospital_open_time`, `hospital_close_time`, `user_id`, `hospital_status`) VALUES
(1, 'national', 'humaira', 'humaira@gmail.com', '4343434', 'karachi ', '565655655665', '03:33 ', '08:01', '6 ', 'approved'),
(2, 'jinnah', 'sheraz', 'sheraz@gmail.com', '434343', 'karachi ', '565655655665', '03:33 ', '08:01', '1 ', 'reject'),
(3, 'Agha Khan', 'hamza', 'hamza@gmail.com', '343434343', 'lahore', '355353553', '09:09 ', '13:09', '7 ', 'reject'),
(5, 'nmc', 'irfan', 'nmc@gmail.com', '4343434', 'karachi ', '434343', '01:04 ', '01:00', '11', 'reject'),
(6, 'jinnah', 'umair', 'jinnah@gmail.com', '4454545454545', 'karachi ', '54545454', '04:04 ', '04:04', '10', 'reject'),
(7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54', '12', 'reject'),
(8, 'Pak hospital ', 'Bilal', 'pakHospital@gmail.com', '34455454545', 'lahore', '4546565656', '13:00 ', '22:00', '8', 'approved'),
(9, 'HOD ', 'hassan ', 'hassan3344@gmail.com', '5456656', 'karachi ', '565655655665', '01:00 ', '01:00', '16 ', '');

-- --------------------------------------------------------

--
-- Table structure for table `reg_patient`
--

CREATE TABLE `reg_patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_phone` varchar(255) NOT NULL,
  `patient_cnic` varchar(255) NOT NULL,
  `patient_age` varchar(22) NOT NULL,
  `patient_select_hos` varchar(222) NOT NULL,
  `patient_gender` varchar(222) NOT NULL,
  `patient_vacc` varchar(222) NOT NULL,
  `patient_app_day` varchar(222) NOT NULL,
  `patient_status` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_patient`
--

INSERT INTO `reg_patient` (`patient_id`, `patient_name`, `patient_email`, `patient_phone`, `patient_cnic`, `patient_age`, `patient_select_hos`, `patient_gender`, `patient_vacc`, `patient_app_day`, `patient_status`) VALUES
(1, 'sheraz', 'sheraz@gmail.com', '434434', '565655655665', '33', 'nationl', 'Male', '\r\nSinopharm', 'monday', 'approved'),
(2, 'umer', 'umer@gmail.com', '4545454545', '565655655665', '44', 'nationl', 'Male', '\r\nSinopharm', 'monday', 'approved'),
(3, 'subhan', 'subhan@gmail.com', '54545454', '565655655665', '33', 'nationl', 'Male', '\r\nSinopharm', 'tuesday', 'approved'),
(4, 'javeed', 'javeed@gmail.com', '343434343', '565655655665', '55', 'nationl', 'Male', 'Sinovac', 'monday', 'approved'),
(5, 'ali', 'ali@gmail.com', '333333333334', '43333333333334', '33', 'nationl', 'Male', 'Sinovac', 'tuesday', 'approved'),
(6, 'maria', 'maria@gmail.com', '222222222222222', '22222222222222', '22', 'nationl', 'Femail', 'Sinovac', 'monday', 'approved'),
(7, 'maria', 'maria@gmail.com', '33333333', '33333333333', '333333333', 'nationl', 'Male', 'Sinovac', 'monday', 'approved'),
(8, 'hamza', 'hamza@gmail.com', '45454545', '355353553', '22', 'nationl', 'Male', '\r\nSinopharm', 'tuesday', 'approved'),
(9, 'irfan', 'irfan@gmail.com', '344343', '23232323', '33', 'nationl', 'Male', '\r\nSinopharm', 'tuesday', 'approved'),
(10, 'usama', 'usama@gmial.com', '3443434', '232323232', '33', 'nationl', 'Male', 'Sinovac', 'thusday', 'approved'),
(11, 'yunus', 'yunus@gmail.com', '434343434', '4343434343', '33', 'Agha Khan', 'Male', '\r\nSinopharm', 'thusday', 'approved'),
(12, 'dsgsg', 'umair@gamil.com', '345454', '65446', '66', 'national', 'Male', '\r\nSinopharm', 'monday', 'approved'),
(13, 'maria', 'assds@gmail.com', '343525435', '5433424355454', '44', 'jinnah', 'Male', '\r\nSinopharm', 'monday', 'approved'),
(14, 'kadkk', 'ksk@gmail.com', '51646464', '6544664', '2', 'jinnah', 'Male', '\r\nSinopharm', 'tuesday', 'approved'),
(15, '43434', 'bhandsd3akop@gmial.com', '343544545', '54354654545', '44', 'jinnah', 'Male', '\r\nSinopharm', 'tuesday', 'approved'),
(16, 'umair', 'checkEmail@gmail.com', '3444535454', '34244345', '23', 'jinnah', 'Male', '\r\nSinopharm', 'monday', 'approved'),
(17, 'hassan ', 'hassanOp@gmail.com', '6446546546', '546544546', '22', 'jinnah', 'Male', '\r\nSinopharm', 'tuesday', ''),
(18, 'rafey', 'rafey@gmail.com', '343253453543', '565655655665', '33', 'national', 'Male', 'Sinovac', 'monday', ''),
(19, 'rafey2', 'rafey2@gmail.com', '4545454455', '5454654654646', '44', 'jinnah', 'Male', '\r\nSinopharm', 'tuesday', ''),
(20, 'wajid', 'wajid@gmail.com', '5465464456', '546546645', '22', 'jinnah', 'Male', 'Pak Vacc', 'tuesday', 'approved'),
(21, 'ahmed', 'ahmed@gmail.com', '546546546', '54645546', '11', 'jinnah', 'Male', 'Sinopharm', 'monday', '');

-- --------------------------------------------------------

--
-- Table structure for table `reject_hospital`
--

CREATE TABLE `reject_hospital` (
  `hospital_id` int(11) NOT NULL,
  `reg_hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `hospital_manager_name` varchar(200) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hospital_contact` varchar(222) NOT NULL,
  `hospital_location` varchar(222) NOT NULL,
  `hospital_manager_cnic` varchar(222) NOT NULL,
  `hospital_open_time` varchar(222) NOT NULL,
  `hospital_close_time` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reject_hospital`
--

INSERT INTO `reject_hospital` (`hospital_id`, `reg_hospital_id`, `hospital_name`, `hospital_manager_name`, `hospital_email`, `hospital_contact`, `hospital_location`, `hospital_manager_cnic`, `hospital_open_time`, `hospital_close_time`) VALUES
(5, 2, 'jinnah', 'sheraz', 'sheraz@gmail.com', '434343', 'karachi ', '565655655665', '03:33 ', '08:01'),
(9, 6, 'jinnah', 'umair', 'jinnah@gmail.com', '4454545454545', 'karachi ', '54545454', '04:04 ', '04:04'),
(10, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(11, 12, '', '', '', '', '', '', '', ''),
(12, 11, '', '', '', '', '', '', '', ''),
(13, 3, 'Agha Khan', 'hamza', 'hamza@gmail.com', '343434343', 'lahore', '355353553', '09:09 ', '13:09'),
(14, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(15, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(16, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(17, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(18, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(19, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(21, 8, 'Pak hospital ', 'Bilal', 'pakHospital@gmail.com', '34455454545', 'lahore', '4546565656', '13:00 ', '22:00'),
(22, 5, 'nmc', 'irfan', 'nmc@gmail.com', '4343434', 'karachi ', '434343', '01:04 ', '01:00'),
(23, 5, 'nmc', 'irfan', 'nmc@gmail.com', '4343434', 'karachi ', '434343', '01:04 ', '01:00'),
(24, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54'),
(25, 7, 'Agha Khan 2 ', 'USAMA', 'aghaKhan2@gmail.com', '343434343', 'karachi ', '43434343', '03:33 ', '04:54');

-- --------------------------------------------------------

--
-- Table structure for table `reject_patient`
--

CREATE TABLE `reject_patient` (
  `patient_id` int(11) NOT NULL,
  `reg_pateint_id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `patient_email` varchar(200) NOT NULL,
  `patient_phone` varchar(255) NOT NULL,
  `patient_cnic` varchar(255) NOT NULL,
  `patient_age` varchar(222) NOT NULL,
  `patient_select_hos` varchar(222) NOT NULL,
  `patient_gender` varchar(222) NOT NULL,
  `patient_vacc` varchar(222) NOT NULL,
  `patient_app_day` varchar(232) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `cnic`, `password`, `time`) VALUES
(1, 'sheraz', 'sheraz@gmail.com', '565655655665', '$2y$10$3ONwfDMABSoiZluYjGNQse96b9POvvzKYMO8QMRUuXCeqz0sD9ghK', '2023-07-29 23:52:51'),
(3, 'subhan', 'subhan@gmail.com', '565655655665', '$2y$10$Gg7mgzx/jZtuUPND30qXCeCvY8D8J6RCqXkaeoN12XD8I3TIUQDTK', '2023-07-29 23:53:21'),
(6, 'humaira', 'humaira@gmail.com', '565655655665', '$2y$10$AYZeTv0iP6R.T1jKbURnlurDpa6kAJ/H876neCH9khSNNEhmHoFEm', '2023-07-29 23:54:40'),
(7, 'hamza', 'hamza@gmail.com', '355353553', '$2y$10$KU4/mt1y5./Ih5SaUTn9WefF070nrkfmD0LKph21tc6Jsh/vGS34u', '2023-07-30 02:45:23'),
(8, 'bilal', 'bilal@gmail.com', '1232323232', '$2y$10$UxJucnbB64dhFMyE3AvezeAvOUZpsazMOwoZtDlnxsNkUACoqwv.2', '2023-07-31 00:20:07'),
(9, 'bhanak', 'bhank@gmail.com', '2372738237287', '$2y$10$5GTk8tHK2KfbbRe.4HfiQesVu3O7NvyZbqu8Od73xGCDO9ZXPvHo.', '2023-07-31 00:21:08'),
(10, 'bhanak', 'bhanak@gmial.com', '565655655665', '$2y$10$FpcxNzeqtzAz2Zf5wmfLD.k7ft2ESKLj6TZgupvTB3coK2iCg3Bj.', '2023-07-31 00:21:26'),
(11, 'irfan', 'irfan@gmail.com', '23232323', '$2y$10$9fLVKVR9mpQvyVuB6l5BKeXbuBcQi2DBzX08/GmH2DV6gpJJ0tsj6', '2023-08-01 09:55:14'),
(12, 'usama', 'usama@gmial.com', '232323232', '$2y$10$UNX1PH1u.ll9gnW7x5teMO.LYgWMwpY6gu66xidjIdIRFGY9w.S5K', '2023-08-01 23:43:23'),
(13, 'hassan ', 'hassanOp@gmail.com', '546544546', '$2y$10$ITk3TIRGjmmRgMMBgdhPR.pJ2BdA0BuLbzo1t4eh6kCprFq9JLDeC', '2023-08-04 05:48:12'),
(14, 'rafey', 'rafey@gmail.com', '565655655665', '$2y$10$2XXcClFVx93FCfsT1fBtFuhFqKYTMu7GtYeV2puow4K7W6NB1KVva', '2023-08-04 05:50:54'),
(15, 'rafey2', 'rafey2@gmail.com', '5454654654646', '$2y$10$HBY0to.5jhhiZrETxDLfGOlydM6adJKkt0kKFc7NPjHev7SgymqQ6', '2023-08-04 05:54:00'),
(16, 'hassan ', 'hassan3344@gmail.com', '565655655665', '$2y$10$xajci21bHHnJCLLEyNeV3e2tYj6NA/MDZN2CLFFWBUIezoOsVRh5W', '2023-08-05 00:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(222) NOT NULL,
  `vaccine_qunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_qunt`) VALUES
(1, 'Sinopharm', 70),
(2, 'Sinovac', 220),
(3, '\r\nCanSino-Bio', 666),
(4, 'Sputnik vaccine', 6988);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accept_hospital`
--
ALTER TABLE `accept_hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `accept_patient`
--
ALTER TABLE `accept_patient`
  ADD PRIMARY KEY (`pateint_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `hospital_portal`
--
ALTER TABLE `hospital_portal`
  ADD PRIMARY KEY (`hos_pot_id`);

--
-- Indexes for table `reg_hospital`
--
ALTER TABLE `reg_hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `reg_patient`
--
ALTER TABLE `reg_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `reject_hospital`
--
ALTER TABLE `reject_hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `reject_patient`
--
ALTER TABLE `reject_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accept_hospital`
--
ALTER TABLE `accept_hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `accept_patient`
--
ALTER TABLE `accept_patient`
  MODIFY `pateint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_portal`
--
ALTER TABLE `hospital_portal`
  MODIFY `hos_pot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_hospital`
--
ALTER TABLE `reg_hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reg_patient`
--
ALTER TABLE `reg_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reject_hospital`
--
ALTER TABLE `reject_hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reject_patient`
--
ALTER TABLE `reject_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
