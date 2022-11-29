-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 04:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridingsolo_trek`
--

-- --------------------------------------------------------

--
-- Table structure for table `sg_users`
--

CREATE TABLE `sg_users` (
  `user_id` int(11) NOT NULL,
  `user_mobile` varchar(250) DEFAULT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `temp_password` varchar(250) DEFAULT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_lname` varchar(250) NOT NULL,
  `user_gender` enum('male','female','others') NOT NULL,
  `user_dob` text NOT NULL,
  `user_level` int(11) NOT NULL,
  `user_avatar` varchar(250) DEFAULT NULL,
  `user_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastlogin` datetime DEFAULT NULL,
  `user_status` tinyint(4) NOT NULL,
  `modified_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `ustatus` int(11) DEFAULT NULL,
  `complete_rigistration` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sg_users`
--

INSERT INTO `sg_users` (`user_id`, `user_mobile`, `user_email`, `user_password`, `temp_password`, `user_fname`, `user_lname`, `user_gender`, `user_dob`, `user_level`, `user_avatar`, `user_create`, `lastlogin`, `user_status`, `modified_date`, `created_by`, `modified_by`, `ustatus`, `complete_rigistration`) VALUES
(45, '7075200000', 'safarnama@ridingsolo.in', '437599f1ea3514f8969f161a6606ce18', 'qqqqq', 'riding', 'solo', '', '30/10/1988', 3, 'avatar-1_2972273624685753.jpg', '2018-11-28 23:24:03', '2019-10-21 11:23:17', 0, '2022-11-27 23:43:46', NULL, 1, 1, 0),
(49, '9704639506', 'rakesh.m@siriinnovations.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', 'Rakesh', 'Machidi', 'male', '2020-07-06T04:29:59.000Z', 2, NULL, '2018-04-06 11:02:43', '2019-11-26 17:10:08', 0, '2022-11-27 23:40:32', NULL, 1, 1, 0),
(50, '1234567895', '1234567895', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', NULL, 'gayathri', 'korukonda', 'female', '', 3, NULL, '2020-02-11 12:57:13', NULL, 0, '2022-11-27 23:38:42', NULL, 1, 1, 0),
(53, '1234567897', 'gayathri12@gmail', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', NULL, 'gayathri', 'korukonda', 'female', '', 3, NULL, '2020-02-11 13:52:03', NULL, 9, '2022-11-24 09:16:44', NULL, 1, 0, 0),
(54, '1234567897', 'gayathri@gmail', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', NULL, 'gayathri', 'korukonda', 'female', '', 3, NULL, '2020-02-11 13:53:31', NULL, 9, '2022-11-24 09:16:45', NULL, 1, 0, 0),
(56, '1234567893', '1234567893', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'gayathriiii', 'korukonda', 'female', '', 3, NULL, '2020-04-16 11:20:09', NULL, 0, '2022-11-24 09:13:58', NULL, 1, 1, 0),
(59, '7680044441', '7680044441', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', NULL, 'kirankumar', 's', 'male', '2020-05-10T14:36:55.000Z', 2, NULL, '2020-05-16 06:54:36', NULL, 0, '2022-11-24 09:17:01', 1, 1, 0, 0),
(60, '7680044441', 'rakesh.m@siriinnovations', '0f6bb0e7a65c7938bbdc4cfa26ff41800518b6728869c188b2bcdd0c7fbc1de4', NULL, 'rakesh', 's', 'male', '2020-03-09T18:30:00.000Z', 2, NULL, '2020-05-17 13:31:47', NULL, 0, '2022-11-24 09:17:09', 1, 1, 0, 0),
(61, NULL, 'kiran.s@siriinnovations.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', NULL, 'kiran', 'kumar', 'male', '2020-07-07T18:16:41.000Z', 2, NULL, '2020-07-21 23:48:04', NULL, 0, NULL, 1, NULL, NULL, 0),
(62, NULL, 'kiran.s@siriinnovations.com1', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', NULL, 'kiran', 'kumar', 'male', '2020-07-07T18:16:41.000Z', 2, NULL, '2020-07-21 23:54:25', NULL, 0, '2022-11-24 22:39:20', 1, 1, 1, 0),
(63, NULL, 'gayathri.k123@siriinnovations.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'gayathri', 'k', 'female', '', 3, NULL, '2020-07-22 12:50:26', NULL, 0, '2022-11-24 22:15:45', NULL, 1, 1, 0),
(64, NULL, 'gayathri.test@siriinnovations.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'gayathri', 'k', 'female', '', 3, NULL, '2020-07-22 13:04:03', NULL, 0, '2022-11-24 09:19:45', NULL, 1, 1, 0),
(65, '1234567895', 'gayathri.k@siriinnovations.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'gayathri', 'korukonda', 'female', '', 3, NULL, '2020-07-27 17:05:49', NULL, 9, '2022-11-24 22:40:51', 1, 1, 1, 0),
(66, NULL, 'gayathri.k87@siriinnovations.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'gayathri', 'k', 'female', '', 3, NULL, '2020-07-28 12:14:08', NULL, 0, NULL, 1, NULL, NULL, 0),
(67, NULL, 'kiran@digitalink.in', '298f3424b5927896f23a386a873cc72cc28fd2f089e4cc609e94064eb661b344', NULL, 'kiran', 'kumar', 'male', '1985-06-30T18:30:00.000Z', 2, NULL, '2020-07-30 10:34:14', NULL, 0, '2022-11-25 01:37:30', 1, 1, 1, 0),
(68, '9876543210', 'shilpa.b@siriinnovations.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', NULL, 'Shilpa', 'P', 'female', '16-06-1988', 1, 'user_3591061758.jpg', '2020-08-03 23:58:53', NULL, 0, '2020-08-04 00:00:43', 1, 1, NULL, 0),
(77, '9876549999', 'sartajbsk@gmail.com', '', NULL, 'Sartaj1', 'Shaik1', 'male', '2022-09-09', 1, 'https://lh3.googleusercontent.com/a/ALm5wu37K3NtzpeQIY4JARQMLP_s5GwJR35AITujDjgx6Q=s96-c', '2022-11-28 07:03:23', NULL, 0, '2022-11-28 17:03:04', 0, 1, 0, 1),
(80, '1234512345', 'sartaj.s@siriinnovations.com', '', NULL, 'Sartajsiri', 'Shaik', 'male', '2022-09-09', 1, 'https://lh3.googleusercontent.com/a/ALm5wu2fW2g5yBYpi-q0eAk38Mwe3ee4tEokkCPoEir5=s96-c', '2022-11-28 12:49:32', NULL, 0, '2022-11-28 18:49:12', 0, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sg_users`
--
ALTER TABLE `sg_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sg_users`
--
ALTER TABLE `sg_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
