-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 03:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `volunteer_hour` decimal(10,1) NOT NULL,
  `certificate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`volunteer_hour`, `certificate`) VALUES
('3.0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(50) NOT NULL,
  `token` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`email`, `token`) VALUES
('ahhh42@gmail.com', 'f9ab16852d455ce9203da64f4fc7f92d'),
('ahhh42@gmail.com', '55fd1368113e5a675e868c5653a7bb9e'),
('ahhh42@gmail.com', 'f3ac63c91272f19ce97c7397825cc15f'),
('ahhh42@gmail.com', 'e49eb6523da9e1c347bc148ea8ac55d3'),
('ahhh42@gmail.com', 'e464f78f1b3fa6bfe6d887029bf66f0c'),
('ahhh42@gmail.com', 'dfa92d8f817e5b08fcaafb50d03763cf'),
('ahhh42@gmail.com', '9cd013fe250ebffc853b386569ab18c0'),
('ahhh42@gmail.com', '861578d797aeb0634f77aff3f488cca2'),
('ahhh42@gmail.com', '452e91de642a8e9c43121664d5d3c05c');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `commitment` tinyint(4) NOT NULL,
  `communication` tinyint(4) NOT NULL,
  `involvement` tinyint(4) NOT NULL,
  `performance` tinyint(4) NOT NULL,
  `feedback` text DEFAULT NULL,
  `mentor_id` int(11) NOT NULL,
  `mentee_id` int(11) NOT NULL,
  `status` enum('new','approve','decline') NOT NULL DEFAULT 'new',
  `is_add_volunteer_hours` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `commitment`, `communication`, `involvement`, `performance`, `feedback`, `mentor_id`, `mentee_id`, `status`, `is_add_volunteer_hours`) VALUES
(5, 5, 5, 4, 5, 'asdfgggg', 51, 1557, 'approve', 1),
(6, 2, 3, 4, 5, '', 1, 57, 'approve', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `mentee_id` int(10) NOT NULL,
  `mentor_id` int(10) NOT NULL,
  `status` enum('new','approve','decline') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `mentee_id`, `mentor_id`, `status`) VALUES
(6, 32, 27, 'new'),
(7, 36, 13, 'new'),
(10, 98, 91, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('new','mentee','mentor','closed') NOT NULL DEFAULT 'new',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mentee_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `status`, `updated_at`, `mentee_id`, `mentor_id`) VALUES
(9, 'Inventore praesentiu 01', 'mentor', '2022-10-28 11:55:16', 61, 1),
(10, 'Itaque et eu consequ 00', 'closed', '2022-10-28 15:12:51', 1557, 51);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replays`
--

CREATE TABLE `ticket_replays` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_replays`
--

INSERT INTO `ticket_replays` (`id`, `subject`, `ticket_id`, `user_id`, `created_at`) VALUES
(11, 'Aliqua Sit est repr comm 01', 9, 61, '2022-10-28 11:23:58'),
(12, 'Dolorem pariatur Ob == 02', 9, 61, '2022-10-28 11:24:17'),
(13, 'Neque quis in mollit == 03', 9, 1, '2022-10-28 11:33:46'),
(14, 'Incidunt atque ulla == 04 = mentee', 9, 61, '2022-10-28 11:35:58'),
(15, 'Nisi molestias possi == 05 = mentor', 9, 1, '2022-10-28 11:36:18'),
(16, 'Eius consequuntur ea =06 = mentee', 9, 61, '2022-10-28 11:48:01'),
(17, 'Ullamco labore tenet == mentor == 07', 9, 1, '2022-10-28 11:55:16'),
(18, 'Voluptas sit ipsam  00 = mentee', 10, 1557, '2022-10-28 12:48:54'),
(19, 'Sed quia provident = 02 = mentor', 10, 51, '2022-10-28 12:50:00'),
(21, 'Adipisci dolor non e 000 test', 10, 1557, '2022-10-28 12:52:05'),
(22, 'Veniam dolorum aut == 03 mentor', 10, 51, '2022-10-28 12:53:44'),
(23, 'Quidem quis voluptat == 04 mentee', 10, 1557, '2022-10-28 12:54:13'),
(24, 'Esse Nam fugit qui test send notify to gmail', 10, 1557, '2022-10-28 12:55:51'),
(25, 'test send notify to gmail 01', 10, 1557, '2022-10-28 12:58:42'),
(26, 'test send notify to gmail 02', 10, 1557, '2022-10-28 12:59:57'),
(27, 'test send notify to gmail 03', 10, 1557, '2022-10-28 13:00:21'),
(28, 'test send notify to gmail 05', 10, 1557, '2022-10-28 13:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` enum('user','admin','academic') NOT NULL DEFAULT 'user',
  `gender` enum('Male','Female') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birthday` date DEFAULT NULL,
  `branch` varchar(6) DEFAULT NULL,
  `college` enum('Computing and Informatics','Administrative and Financial Science','Health Science','Science and Theoretical Studies') DEFAULT NULL,
  `level` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `mobile` varchar(9) DEFAULT NULL,
  `rate` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','deactive') NOT NULL DEFAULT 'deactive',
  `supervisor_id` int(11) DEFAULT NULL,
  `volunteer_hour` decimal(10,1) NOT NULL DEFAULT 0.0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `gender`, `password`, `date_of_birthday`, `branch`, `college`, `level`, `major`, `mobile`, `rate`, `status`, `supervisor_id`, `volunteer_hour`) VALUES
(1, 'Selma Valdez', 'rydehujet@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-14', 'Qassim', 'Administrative and Financial Science', '6', 'Ea animi temporibus', '+1 (485) ', 0, 'active', NULL, '1.5'),
(2, 'Abdu Hawi', 'admin@admin.com', 'admin', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, '0.0'),
(13, 'Xenos Solis', 'ac@ac.com', 'academic', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1990-02-09', 'Riyadh', 'Health Science', '6', 'Sed aliquip enim ali', '+1 (354) ', 5, 'active', NULL, '0.0'),
(14, 'Riley Lane', 'baqukoxyf@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1998-11-01', 'Riyadh', 'Administrative and Financial Science', '1', 'Quaerat repellendus', '+1 (378) ', 0, 'active', 13, '0.0'),
(17, 'Dustin Short', 'tigoliji@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '2001-01-25', 'Jeddah', 'Administrative and Financial Science', '8', 'Adipisci consequat', '+1 (428) ', 0, 'deactive', NULL, '0.0'),
(22, 'Reese Michael', 'xecolikom@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1980-11-03', 'Jeddah', 'Computing and Informatics', '1', 'Eius culpa id ea m', '+1 (676) ', 0, 'deactive', 13, '0.0'),
(27, 'Zelenia Hodge', 'tuwizasut@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1987-06-05', 'Dammam', 'Administrative and Financial Science', '8', 'Dolore ad modi earum', '+1 (613) ', 2, 'active', NULL, '0.0'),
(32, 'Genevieve Potter', 'xyhymy@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1980-01-19', 'Dammam', 'Administrative and Financial Science', '3', 'Natus sapiente corru', '+1 (974) ', 0, 'active', NULL, '0.0'),
(36, 'Jael Webster', 'piwyvosupa@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1975-08-04', 'Dammam', 'Administrative and Financial Science', '3', 'Dolores quod ipsum u', '+1 (665) ', 0, 'active', NULL, '0.0'),
(47, 'Clarke Butler', 'pixajixydo@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1971-02-14', 'Medina', 'Science and Theoretical Studies', '4', 'Quisquam sit qui an', '+1 (991) ', 0, 'active', NULL, '0.0'),
(51, 'Porter Cruz', 'abdu.test03@gmail.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '2017-10-30', 'Medina', 'Science and Theoretical Studies', '7', 'Reprehenderit molli', '+1 (979) ', 3, 'active', NULL, '0.0'),
(56, 'Whoopi Hodges', 'ripe@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1976-11-07', 'Riyadh', 'Computing and Informatics', '8', 'Et iste molestias er', '+1 (653) ', 0, 'active', NULL, '0.0'),
(61, 'Jenna Walter', 'sadikola@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1996-11-02', 'Riyadh', 'Science and Theoretical Studies', '1', 'Qui ratione est dol', '+1 (314) ', 0, 'active', 1, '0.0'),
(82, 'Aquila Smith', 'nobuduby@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1990-02-17', 'Riyadh', 'Science and Theoretical Studies', '7', 'Ex ipsum labore sin', '+1 (508) ', 0, 'active', NULL, '0.0'),
(91, 'Donovan Ross', 'kigilyw@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '2006-08-01', 'Jeddah', 'Computing and Informatics', '7', 'In voluptas lorem vo', '+1 (243) ', 0, 'active', NULL, '0.0'),
(98, 'Noelani Calderon', 'haqiz@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '2016-04-04', 'Jeddah', 'Administrative and Financial Science', '3', 'Commodi corporis qui', '+1 (675) ', 0, 'active', NULL, '0.0'),
(150, 'Nolan Frazier', 'hekeh@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1989-02-13', 'Jeddah', 'Administrative and Financial Science', '3', 'Accusamus aut volupt', '+1 (553) ', 0, 'active', NULL, '0.0'),
(1557, 'Jasmine Wood', 'fonudavena@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '2022-10-09', 'Jeddah', 'Computing and Informatics', '2', 'Voluptatem sed imped', '+1 (682)', 0, 'active', 51, '0.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
