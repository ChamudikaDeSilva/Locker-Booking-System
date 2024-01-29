-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 05:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_tagging_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(15) NOT NULL,
  `admin_username` varchar(15) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_phone` int(10) NOT NULL,
  `admin_password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_phone`, `admin_password`) VALUES
('111111', 'admin1', 'admin1@gmail.com', 137663521, '$2y$10$SjecZ1Uyml2lX5XiP6OsA.xb25vYPEVPIeMFIgTc4Zf6zFvM9iO0u'),
('111112', 'admin2', 'admin2@gmail.com', 123456789, '$2y$10$UFWj//x6YnSsgoWRHcEET.bh4/SbBgFVYRiR3b9ZsS75gK.xNh2Pm'),
('111113', 'admin3', 'admin3@gmail.com', 1234567894, '$2y$10$vj139Xr2DFdMyY8mPkzzUObBF.9tL064kB/CJ7uJe/PIi.Dvh0uSy');

-- --------------------------------------------------------

--
-- Table structure for table `locker`
--

CREATE TABLE `locker` (
  `locker_id` varchar(15) NOT NULL,
  `locker_status` varchar(15) NOT NULL,
  `locker_price` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locker`
--

INSERT INTO `locker` (`locker_id`, `locker_status`, `locker_price`) VALUES
('A100100', 'Booked', 1),
('A100101', 'Available', 1),
('A100102', 'Booked', 1),
('A100103', 'Available', 1),
('A100104', 'Damage', 1),
('A100105', 'Booked', 1),
('A100106', 'Available', 1),
('A100107', 'Booked', 1);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(11) NOT NULL,
  `record_start` datetime NOT NULL,
  `record_end` datetime NOT NULL,
  `record_price` int(11) DEFAULT NULL,
  `record_item` varchar(255) DEFAULT NULL,
  `record_status` varchar(10) NOT NULL DEFAULT 'pending',
  `record_sub` varchar(10) NOT NULL DEFAULT 'active',
  `record_approved_by` varchar(15) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `locker_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `record_start`, `record_end`, `record_price`, `record_item`, `record_status`, `record_sub`, `record_approved_by`, `student_id`, `locker_id`) VALUES
(25, '2018-05-04 00:00:00', '2018-05-25 00:00:00', 21, 'img/uploads/5aec7e0603a902.02044713.png', 'approved', 'active', 'admin2', '01dns14f1030', 'A100100'),
(26, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636d14847538.27722047.png', 'pending', 'expired', '', '01dns14f1030', 'A100102'),
(27, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636dc696ee45.85525111.png', 'pending', 'active', '', '01dns14f1030', 'A100102'),
(28, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636eb841e2f1.88846518.png', 'pending', 'active', '', '01dns14f1030', 'A100102'),
(29, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636f06706751.14414790.png', 'pending', 'active', '', '01dns14f1030', 'A100102'),
(30, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636f2e1a66e7.34069816.png', 'pending', 'active', '', '01dns14f1030', 'A100102'),
(31, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636f3ab15976.28062021.png', 'pending', 'active', '', '01dns14f1030', 'A100102'),
(32, '2023-11-27 10:00:00', '2023-11-29 09:00:00', 1, 'img/uploads/65636f4a6eae63.41156808.png', 'pending', 'active', '', '01dns14f1030', 'A100102');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(15) NOT NULL,
  `student_username` varchar(15) NOT NULL,
  `student_pwd` char(70) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_department` varchar(5) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_username`, `student_pwd`, `student_name`, `student_department`, `student_email`, `student_phone`) VALUES
('01dns14f1030', 'ruwani', '$2y$10$kT/hsvf1m6Lqmy6ObD6Jbut5FmQJjMD3JzHAodUxu0XMrKrxq4hR6', 'Ruwani Shanika', 'FOAS', 'ruwani@gmail.com', '012345678'),
('01dns14f1031', 'sasindu', '$2y$10$z0/6ndKoAFwvWEFckt27iO1efR5ODdKlR25hNxs8gUYhb1/uw4bd.', 'Sasindu Lakmal', 'FOAS', 'sasindu@gmail.com', '1234567890'),
('01dns14f1032', 'sandun', '$2y$10$KoL0UeDjrc2ROuMFBDSzS.Q71sGsU0BqhO7QtBcptGiVeokYg9Ete', 'Sandun Rathnayake', 'FOBS', 'sandun@gmail.com', '1234567890'),
('01dns14f1033', 'buwani', '$2y$10$AUu5QPhvJqFh1/GgIk3i6uH0DAHIKCnu2ABQTmcnlIQef5.IMTO46', 'Buwani Tharushika', 'FOTS', 'buwani@gmail.com', '1234567890'),
('01dns14f1034', 'sarada', '$2y$10$nSYtYnVDO.PQmUT6Io8JxeO0zBlPg7vIEfB3VXsrBpeRTnlsq0OgC', 'Ruchira Sarada', 'FOTS', 'sarada@gmail.com', '1234567890'),
('01dns14f1035', 'mihiri', '$2y$10$El85Y8pqZxRTYH/TqguWYO82gDqMuaj95RTmfnSZL46CzTYUa6wuq', 'Mihiri Nethma', 'FOAS', 'mihiri@gmail.com', '1234567890'),
('01dns14f1036', 'kosala', '$2y$10$SaUlgmuSHYnD3netNByOSOub.ZdltRvcXV5ZyqKiWR5uppSzVTbVO', 'Kosala Rathnayake', 'FOBS', 'kosala@gmail.com', '1234567890'),
('01dns14f1037', 'kavindi', '$2y$10$YmOseJISVK0kkd.3EYQOTOtDl37XGRBtFkV.UBnpXLig5WyCQW2Xm', 'Kavindi Tharusha', 'FOAS', 'kavindi@gmail.com', '1234567890'),
('01dns14f1038', 'isiri', '$2y$10$ZCR7XTHyioHvDjbVLsZr9eakYtlIBCMbIO9CjmkD6paAAyMz/0H3u', 'Isiri Senarathne', 'FOAS', 'isiri@gmail.com', '1234567890'),
('01dns14f1039', 'neesha', '$2y$10$/FY0epCTNn7FXmaaSfQXxOu6afcl855lfITGjCzHM7n7suRqUhxui', 'Neesha Sandamali', 'FOTS', 'neesha@gmail.com', '1234567890'),
('01dns14f1040', 'himaya', '$2y$10$0EselfSALGPsPCgVfElrhuxBKm/CkPp1Oi7Wd6nD2zyYWq9slsrQi', 'Himaya Rajaguru', 'FOTS', 'himaya@gmail.com', '137663521'),
('01dns14f1041', 'chamu', '$2y$10$hbbAEKy.90EE/k8V9ZiAQuoOjFKQpUUgUOxx9oGsAEcwCFZwHyYuq', 'Chamudika De Silva', 'FOBS', 'test@test.com', '0712345567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `locker`
--
ALTER TABLE `locker`
  ADD PRIMARY KEY (`locker_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
