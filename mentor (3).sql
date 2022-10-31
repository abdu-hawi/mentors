-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:20 PM
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
('6.5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(191) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(8, 'Consequatur cillum', '\"Flow chart\" redirects here. For the poem, see Flow Chart (poem). For the music group, see Flowchart (band).\r\n\r\nA simple flowchart representing a process for dealing with a non-functioning lamp.\r\nA flowchart is a type of diagram that represents a workflow or process. A flowchart can also be defined as a diagrammatic representation of an algorithm, a step-by-step approach to solving a task.\r\n\r\nThe flowchart shows the steps as boxes of various kinds, and their order by connecting the boxes with arrows. This diagrammatic representation illustrates a solution model to a given problem. Flowcharts are used in analyzing, designing, documenting or managing a process or program in various fields.[1]\r\n\r\n\r\nContents\r\n1	Overview\r\n2	History\r\n3	Types\r\n4	Building blocks\r\n4.1	Common symbols\r\n4.2	Other symbols\r\n4.3	Parallel processing\r\n5	Software\r\n5.1	Diagramming\r\n6	See also\r\n6.1	Related diagrams\r\n6.2	Related subjects\r\n7	References\r\n8	Further reading\r\n9	External links\r\nOverview\r\n\r\nFlowchart of a C-style for loop\r\nFlowcharts are used to design and document simple processes or programs. Like other types of diagrams, they help visualize the process. Two of the many benefits are flaws and bottlenecks may become apparent. Flowcharts typically use the following main symbols:\r\n\r\nA process step, usually called an activity, is denoted as a rectangular box.\r\nA decision is usually denoted as a diamond.\r\nA flowchart is described as \"cross-functional\" when the chart is divided into different vertical or horizontal parts, to describe the control of different organizational units. A symbol appearing in a particular part is within the control of that organizational unit. A cross-functional flowchart allows the author to correctly locate the responsibility for performing an action or making a decision, and to show the responsibility of each organizational unit for different parts of a single process.\r\n\r\nFlowcharts represent certain aspects of processes and are usually complemented by other types of diagram. For instance, Kaoru Ishikawa defined the flowchart as one of the seven basic tools of quality control, next to the histogram, Pareto chart, check sheet, control chart, cause-and-effect diagram, and the scatter diagram. Similarly, in UML, a standard concept-modeling notation used in software development, the activity diagram, which is a type of flowchart, is just one of many different diagram types.\r\n\r\nNassi-Shneiderman diagrams and Drakon-charts are an alternative notation for process flow.\r\n\r\nCommon alternative names include: flow chart, process flowchart, functional flowchart, process map, process chart, functional process chart, business process model, process model, process flow diagram, work flow diagram, business flow diagram. The terms \"flowchart\" and \"flow chart\" are used interchangeably.\r\n\r\nThe underlying graph structure of a flowchart is a flow graph, which abstracts away node types, their contents and other ancillary information.\r\n\r\nHistory\r\nThe first structured method for documenting process flow, the \"flow process chart\", was introduced by Frank and Lillian Gilbreth in the presentation \"Process Charts: First Steps in Finding the One Best Way to do Work\", to members of the American Society of Mechanical Engineers (ASME) in 1921.[2] The Gilbreths\" tools quickly found their way into industrial engineering curricula. In the early 1930s, an industrial engineer, Allan H. Mogensen began to train business people in the use of some of the tools of industrial engineering at his Work Simplification Conferences in Lake Placid, New York.\r\n\r\nArt Spinanger, a 1944 graduate of Mogensen\"s class, took the tools back to Procter and Gamble where he developed their Deliberate Methods Change Program. Ben S. Graham, another 1944 graduate, Director of Formcraft Engineering at Standard Register Industrial, applied the flow process chart to information processing with his development of the multi-flow process chart, to present multiple documents and their relationships.[3] In 1947, ASME adopted a symbol set derived from Gilbreth\"s original work as the \"ASME Standard: Operation and Flow Process Charts.\"[4]\r\n\r\nDouglas Hartree in 1949 explained that Herman Goldstine and John von Neumann had developed a flowchart (originally, diagram) to plan computer programs.[5] His contemporary account was endorsed by IBM engineers[6] and by Goldstine\"s personal recollections.[7] The original programming flowcharts of Goldstine and von Neumann can be found in their unpublished report, \"Planning and coding of problems for an electronic computing instrument, Part II, Volume 1\" (1947), which is reproduced in von Neumann\"s collected works.[8]\r\n\r\nThe flowchart became a popular tool for describing computer algorithms, but its popularity decreased in the 1970s, when interactive computer terminals and third-generation programming languages became common tools for computer programming, since algorithms can be expressed more concisely as source code in such languages. Often pseudo-code is used, which uses the common idioms of such languages without strictly adhering to the details of a particular one.\r\n\r\nIn the early 21st century, flowcharts were still used for describing computer algorithms.[9] Modern techniques such as UML activity diagrams and Drakon-charts can be considered to be extensions of the flowchart.\r\n\r\nTypes\r\nSterneckert (2003) suggested that flowcharts can be mo'),
(9, 'Veniam ipsum fugia', 'Minima provident co'),
(10, 'Cum quaerat est nih', 'Et exercitation ex q Cum quaerat est nih\r\nEt exercitation ex q Cum quaerat est nih Et exercitation ex q Cum quaerat est nih\r\nEt exercitation ex q Cum quaerat est nih');

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
(10, 'Itaque et eu consequ 00', 'closed', '2022-10-28 15:12:51', 1557, 51),
(11, 'aaa mentee', 'mentee', '2022-10-30 20:18:17', 22, 13);

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
(28, 'test send notify to gmail 05', 10, 1557, '2022-10-28 13:01:01'),
(29, '01 mentee', 11, 22, '2022-10-30 20:14:35'),
(30, '02 mentor', 11, 27, '2022-10-30 20:17:45'),
(31, '03 mentee', 11, 22, '2022-10-30 20:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring`
--

CREATE TABLE `tutoring` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `branch` varchar(191) NOT NULL,
  `college` varchar(191) NOT NULL,
  `major` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutoring`
--

INSERT INTO `tutoring` (`id`, `name`, `branch`, `college`, `major`, `level`, `title`, `subject`, `status`, `user_id`, `created_at`) VALUES
(1, 'Abdu Hawi', 'Jeddah', 'Test Colle', 'asas', 4, 'شريحة إس دي', 'شريحة إس دي ‏ اختصاراً ‏ وتعني حرفياً الأمن الرقمي، وهي ذاكرة تخزين غير متطايرة طورت من قبل جمعية بطاقة الأس دي لإستخدامها في الأجهزة المحمولة. عرض النموذج في أغسطس 1999 بجهود مشتركة بين سانديسك، باناسونيك،ميتسوبيشي إلكتريك، وتوشيبا كتحسين عن بطاقة متعددة الوسائط، ومن ثم أصبحت نموذج للصناعة.', 0, 0, '2022-10-31 12:59:08'),
(2, 'Yardley Goff', 'Riyadh', 'Administrative and Financial Science', 'Dolores rerum sint ', 1, 'Qui deserunt commodi', 'Laboris dignissimos ', 1, 32, '2022-10-31 17:10:13'),
(3, 'Shaine Harrington', 'Riyadh', 'Computing and Informatics', 'Et enim error evenie', 6, 'Consequatur Irure i', 'Cum deleniti amet o', 0, 32, '2022-10-31 12:59:08'),
(4, 'Natalie Frazier', 'Abha', 'Science and Theoretical Studies', 'Ipsum libero id occa', 1, 'Rerum elit quo eum ', 'Non dolore voluptate', 0, 32, '2022-10-31 16:41:41'),
(5, 'Candice Harrell', 'Riyadh', 'Computing and Informatics', 'Ullam reprehenderit', 1, 'Consectetur suscipi', 'Id minus nihil labo', 0, 32, '2022-10-31 16:44:49'),
(6, 'Palmer Mccoy', 'Jeddah', 'Administrative and Financial Science', 'Dolores hic consequa', 8, 'Nesciunt velit qui', 'Consectetur proiden', 0, 32, '2022-10-31 16:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_replays`
--

CREATE TABLE `tutoring_replays` (
  `replay_id` int(11) NOT NULL,
  `replay` text NOT NULL,
  `replay_user_id` int(11) NOT NULL,
  `tutoring_id` int(11) NOT NULL,
  `replay_name` varchar(191) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutoring_replays`
--

INSERT INTO `tutoring_replays` (`replay_id`, `replay`, `replay_user_id`, `tutoring_id`, `replay_name`, `updated_at`) VALUES
(1, 'asasas', 21, 1, 'abd', '2022-10-31 13:38:40'),
(2, 'test 01', 21, 1, 'Abdu', '2022-10-31 13:39:49'),
(3, 'AAAAAAA', 32, 1, 'Genevieve Potter', '2022-10-31 14:15:52'),
(4, 'BBBB', 32, 1, 'Genevieve Potter', '2022-10-31 14:19:25'),
(5, 'CCC', 32, 1, 'Genevieve Potter', '2022-10-31 14:19:53'),
(6, 'DDD', 32, 1, 'Genevieve Potter', '2022-10-31 14:21:10'),
(7, 'AAAA7', 32, 1, 'Genevieve Potter', '2022-10-31 14:24:22'),
(8, '8', 32, 1, 'Genevieve Potter', '2022-10-31 14:25:11'),
(9, 'ssss', 32, 1, 'Genevieve Potter', '2022-10-31 14:25:45'),
(10, 'aaaaa10', 32, 1, 'Genevieve Potter', '2022-10-31 14:30:40'),
(11, 'aaaa', 32, 1, 'Genevieve Potter', '2022-10-31 14:34:23'),
(12, '12', 32, 1, 'Genevieve Potter', '2022-10-31 14:35:28'),
(13, 'aaa', 32, 1, 'Genevieve Potter', '2022-10-31 14:36:45'),
(14, 'ssss', 32, 3, 'Genevieve Potter', '2022-10-31 16:34:16'),
(15, 'sss', 32, 4, 'Genevieve Potter', '2022-10-31 16:41:41'),
(16, 's', 32, 5, 'Genevieve Potter', '2022-10-31 16:44:49'),
(17, 'dd', 32, 2, 'Genevieve Potter', '2022-10-31 17:10:09');

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
(1, 'Selma Valdez', 'rydehujet@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-14', 'Qassim', 'Administrative and Financial Science', '6', 'Ea animi temporibus', '+1 (485) ', 0, 'active', NULL, '3.0'),
(2, 'Abdu Hawi', 'admin@admin.com', 'admin', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, 0, '', NULL, '0.0'),
(13, 'Xenos Solis', 'ac@ac.com', 'academic', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1990-02-09', 'Riyadh', 'Health Science', '6', 'Sed aliquip enim ali', '056308555', 5, 'active', NULL, '0.0'),
(14, 'Riley Lane', 'baqukoxyf@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1998-11-01', 'Riyadh', 'Administrative and Financial Science', '1', 'Quaerat repellendus', '+1 (378) ', 0, 'deactive', 13, '0.0'),
(17, 'Dustin Short', 'tigoliji@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '2001-01-25', 'Jeddah', 'Administrative and Financial Science', '8', 'Adipisci consequat', '+1 (428) ', 0, 'deactive', NULL, '0.0'),
(22, 'Reese Michael', 'xecolikom@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1980-11-03', 'Jeddah', 'Computing and Informatics', '1', 'Eius culpa id ea m', '+1 (676) ', 0, 'active', 27, '0.0'),
(27, 'Zelenia Hodge', 'tuwizasut@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1987-06-05', 'Dammam', 'Administrative and Financial Science', '8', 'Dolore ad modi earum', '+1 (613) ', 2, 'active', NULL, '0.0'),
(32, 'Genevieve Potter', 'st@st.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1980-01-19', 'Dammam', 'Administrative and Financial Science', '3', 'Natus sapiente corru', '+1 (974) ', 0, 'deactive', 13, '0.0'),
(36, 'Jael Webster', 'piwyvosupa@mailinator.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '1975-08-04', 'Dammam', 'Administrative and Financial Science', '3', 'Dolores quod ipsum u', '+1 (665) ', 0, 'active', NULL, '0.0'),
(47, 'Clarke Butler', 'pixajixydo@mailinator.com', 'user', 'Female', '81dc9bdb52d04dc20036dbd8313ed055', '1971-02-14', 'Medina', 'Science and Theoretical Studies', '4', 'Quisquam sit qui an', '+1 (991) ', 0, 'active', NULL, '0.0'),
(51, 'Porter Cruz', 'abdu.test03@gmail.com', 'user', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', '2017-10-30', 'Medina', 'Science and Theoretical Studies', '7', 'Reprehenderit molli', '+1 (979) ', 5, 'active', NULL, '2.0'),
(54, 'Devin Howard', 'ac2@ac.com', 'academic', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, '337795415', 0, 'deactive', NULL, '0.0'),
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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tutoring`
--
ALTER TABLE `tutoring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_replays`
--
ALTER TABLE `tutoring_replays`
  ADD PRIMARY KEY (`replay_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ticket_replays`
--
ALTER TABLE `ticket_replays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tutoring`
--
ALTER TABLE `tutoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutoring_replays`
--
ALTER TABLE `tutoring_replays`
  MODIFY `replay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
