-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 06:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` enum('user','admin','acadmic') NOT NULL DEFAULT 'user',
  `gender` enum('Male','Female') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birthday` date DEFAULT NULL,
  `college` enum('Computing and Informatics','Administrative and Financial Science','Health Science','Science and Theoretical Studies') DEFAULT NULL,
  `level` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `mobile` varchar(9) DEFAULT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `gender`, `password`, `date_of_birthday`, `college`, `level`, `major`, `mobile`, `status`) VALUES
(1, 'Selma Valdez', 'rydehujet@mailinator.com', 'user', 'Female', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2017-08-14', 'Administrative and Financial Science', '6', 'Ea animi temporibus', '+1 (485) ', 'active'),
(2, 'Abdu Hawi', 'admin@admin.com', 'admin', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', NULL, NULL, NULL, NULL, NULL, ''),
(13, 'Xenos Solis', 'siwyb@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1990-02-09', 'Health Science', '6', 'Sed aliquip enim ali', '+1 (354) ', 'active'),
(14, 'Riley Lane', 'baqukoxyf@mailinator.com', 'user', 'Female', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1998-11-01', 'Administrative and Financial Science', '1', 'Quaerat repellendus', '+1 (378) ', 'active'),
(17, 'Dustin Short', 'tigoliji@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2001-01-25', 'Administrative and Financial Science', '8', 'Adipisci consequat', '+1 (428) ', 'deactive'),
(22, 'Reese Michael', 'xecolikom@mailinator.com', 'user', 'Female', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1980-11-03', 'Computing and Informatics', '1', 'Eius culpa id ea m', '+1 (676) ', 'active'),
(27, 'Zelenia Hodge', 'tuwizasut@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1987-06-05', 'Administrative and Financial Science', '8', 'Dolore ad modi earum', '+1 (613) ', 'active'),
(32, 'Genevieve Potter', 'xyhymy@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1980-01-19', 'Administrative and Financial Science', '3', 'Natus sapiente corru', '+1 (974) ', 'active'),
(36, 'Jael Webster', 'piwyvosupa@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1975-08-04', 'Administrative and Financial Science', '3', 'Dolores quod ipsum u', '+1 (665) ', 'active'),
(47, 'Clarke Butler', 'pixajixydo@mailinator.com', 'user', 'Female', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1971-02-14', 'Science and Theoretical Studies', '4', 'Quisquam sit qui an', '+1 (991) ', 'active'),
(51, 'Porter Cruz', 'fekuqed@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2017-10-30', 'Science and Theoretical Studies', '7', 'Reprehenderit molli', '+1 (979) ', 'active'),
(56, 'Whoopi Hodges', 'ripe@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1976-11-07', 'Computing and Informatics', '8', 'Et iste molestias er', '+1 (653) ', 'active'),
(61, 'Jenna Walter', 'sadikola@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1996-11-02', 'Science and Theoretical Studies', '1', 'Qui ratione est dol', '+1 (314) ', 'active'),
(82, 'Aquila Smith', 'nobuduby@mailinator.com', 'user', 'Female', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1990-02-17', 'Science and Theoretical Studies', '7', 'Ex ipsum labore sin', '+1 (508) ', 'active'),
(91, 'Donovan Ross', 'kigilyw@mailinator.com', 'user', 'Male', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2006-08-01', 'Computing and Informatics', '7', 'In voluptas lorem vo', '+1 (243) ', 'active'),
(98, 'Noelani Calderon', 'haqiz@mailinator.com', 'user', 'Female', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2016-04-04', 'Administrative and Financial Science', '3', 'Commodi corporis qui', '+1 (675) ', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
