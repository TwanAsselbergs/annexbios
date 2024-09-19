-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2024 at 01:11 PM
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
-- Database: `annexbios`
--

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

CREATE TABLE `klanten` (
  `klant_id` int(11) UNSIGNED NOT NULL,
  `v_naam` varchar(255) DEFAULT NULL,
  `a_naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `t_nummer` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`klant_id`, `v_naam`, `a_naam`, `email`, `t_nummer`) VALUES
(2, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, 'Twan', 'Asselbergs', 'twanasselbergs@outlook.com', 655013388),
(9, 'q', 'q', 'q@nln.l', 3242),
(10, 'twf', 'eef', '32424@nl.nl12er', 34234234),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `koppel_z_s`
--

CREATE TABLE `koppel_z_s` (
  `id` int(11) UNSIGNED NOT NULL,
  `z_id` int(11) UNSIGNED NOT NULL,
  `s_id` int(11) UNSIGNED NOT NULL,
  `invalide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koppel_z_s`
--

INSERT INTO `koppel_z_s` (`id`, `z_id`, `s_id`, `invalide`) VALUES
(1, 1, 1, 1),
(3, 1, 2, 1),
(4, 1, 3, 0),
(5, 1, 4, 0),
(6, 1, 5, 0),
(7, 1, 6, 0),
(8, 1, 7, 0),
(9, 1, 8, 0),
(10, 1, 9, 0),
(11, 1, 10, 0),
(12, 1, 11, 0),
(13, 1, 12, 0),
(14, 1, 21, 0),
(15, 1, 22, 0),
(16, 1, 23, 0),
(17, 1, 24, 0),
(18, 1, 25, 0),
(19, 1, 26, 0),
(20, 1, 27, 0),
(21, 1, 28, 0),
(22, 1, 29, 0),
(23, 1, 30, 0),
(24, 1, 31, 0),
(25, 1, 32, 0),
(26, 1, 33, 0),
(27, 1, 34, 0),
(28, 1, 35, 0),
(29, 1, 36, 0),
(30, 1, 37, 0),
(31, 1, 38, 0),
(32, 1, 39, 0),
(33, 1, 40, 0),
(34, 1, 41, 0),
(35, 1, 42, 0),
(36, 1, 43, 0),
(37, 1, 44, 0),
(38, 1, 45, 0),
(39, 1, 46, 0),
(40, 1, 47, 0),
(41, 1, 48, 0),
(42, 1, 49, 0),
(43, 1, 50, 0),
(44, 1, 51, 0),
(45, 1, 52, 0),
(46, 1, 53, 0),
(47, 1, 54, 0),
(48, 1, 55, 0),
(49, 1, 56, 0),
(50, 1, 57, 0),
(51, 1, 58, 0),
(52, 1, 59, 0),
(53, 1, 60, 0),
(54, 1, 61, 0),
(55, 1, 62, 0),
(56, 1, 63, 0),
(57, 1, 64, 0),
(58, 1, 65, 0),
(59, 1, 66, 0),
(60, 1, 67, 0),
(61, 1, 68, 0),
(62, 1, 69, 0),
(63, 1, 70, 0),
(64, 1, 71, 0),
(65, 1, 72, 0),
(66, 1, 73, 0),
(67, 1, 74, 0),
(68, 1, 75, 0),
(69, 1, 76, 0),
(70, 1, 77, 0),
(71, 1, 78, 0),
(72, 1, 79, 0),
(73, 1, 80, 0),
(74, 1, 81, 0),
(75, 1, 82, 0),
(76, 1, 83, 0),
(77, 1, 84, 0),
(78, 1, 85, 0),
(79, 1, 86, 0),
(80, 1, 87, 0),
(81, 1, 88, 0),
(82, 1, 89, 0),
(83, 1, 90, 0),
(84, 1, 91, 0),
(85, 1, 92, 0),
(86, 1, 93, 0),
(87, 1, 94, 0),
(88, 1, 95, 0),
(89, 1, 96, 0),
(90, 1, 97, 0),
(91, 1, 98, 0),
(92, 1, 99, 0),
(93, 1, 100, 0),
(94, 1, 101, 0),
(95, 1, 102, 0),
(96, 1, 103, 0),
(97, 1, 104, 0),
(98, 1, 105, 0),
(99, 1, 106, 0),
(100, 1, 107, 0),
(101, 1, 108, 0),
(102, 1, 109, 0),
(103, 1, 110, 0),
(104, 1, 111, 0),
(105, 1, 112, 0),
(106, 1, 113, 0),
(107, 1, 114, 0),
(108, 1, 115, 0),
(109, 1, 116, 0),
(110, 1, 117, 0),
(111, 1, 118, 0),
(112, 1, 119, 0),
(113, 2, 1, 1),
(114, 2, 2, 1),
(115, 2, 3, 0),
(116, 2, 4, 0),
(117, 2, 5, 0),
(118, 2, 6, 0),
(119, 2, 7, 0),
(120, 2, 8, 0),
(121, 2, 9, 0),
(122, 2, 10, 0),
(123, 2, 11, 0),
(124, 2, 12, 0),
(125, 2, 21, 0),
(126, 2, 22, 0),
(127, 2, 23, 0),
(128, 2, 24, 0),
(129, 2, 25, 0),
(130, 2, 26, 0),
(131, 2, 27, 0),
(132, 2, 28, 0),
(133, 2, 29, 0),
(134, 2, 30, 0),
(135, 2, 31, 0),
(136, 2, 32, 0),
(137, 2, 33, 0),
(138, 2, 34, 0),
(139, 2, 35, 0),
(140, 2, 36, 0),
(141, 2, 37, 0),
(142, 2, 38, 0),
(143, 2, 39, 0),
(144, 2, 40, 0),
(145, 2, 41, 0),
(146, 2, 42, 0),
(147, 2, 43, 0),
(148, 2, 44, 0),
(149, 2, 45, 0),
(150, 2, 46, 0),
(151, 2, 47, 0),
(152, 2, 48, 0),
(153, 2, 49, 0),
(154, 2, 50, 0),
(155, 2, 51, 0),
(156, 2, 52, 0),
(157, 2, 53, 0),
(158, 2, 54, 0),
(159, 2, 55, 0),
(160, 2, 56, 0),
(161, 2, 57, 0),
(162, 2, 58, 0),
(163, 2, 59, 0),
(164, 2, 60, 0),
(165, 2, 61, 0),
(166, 2, 62, 0),
(167, 2, 63, 0),
(168, 2, 64, 0),
(169, 2, 65, 0),
(170, 2, 66, 0),
(171, 2, 67, 0),
(172, 2, 68, 0),
(173, 2, 69, 0),
(174, 2, 70, 0),
(175, 2, 71, 0),
(176, 2, 72, 0),
(177, 2, 73, 0),
(178, 2, 74, 0),
(179, 2, 75, 0),
(180, 2, 76, 0),
(181, 2, 77, 0),
(182, 2, 78, 0),
(183, 2, 79, 0),
(184, 2, 80, 0),
(185, 2, 81, 0),
(186, 2, 82, 0),
(187, 2, 83, 0),
(188, 2, 84, 0),
(189, 2, 85, 0),
(190, 2, 86, 0),
(191, 2, 87, 0),
(192, 2, 88, 0),
(193, 2, 89, 0),
(194, 2, 90, 0),
(195, 2, 91, 0),
(196, 2, 92, 0),
(197, 2, 93, 0),
(198, 2, 94, 0),
(199, 2, 95, 0),
(200, 2, 96, 0),
(201, 2, 97, 0),
(202, 2, 98, 0),
(203, 2, 99, 0),
(204, 2, 100, 0),
(205, 2, 101, 0),
(206, 2, 102, 0),
(207, 2, 103, 0),
(208, 2, 104, 0),
(209, 2, 105, 0),
(210, 2, 106, 0),
(211, 2, 107, 0),
(212, 2, 108, 0),
(213, 2, 109, 0),
(214, 2, 110, 0),
(215, 2, 111, 0),
(216, 2, 112, 0),
(217, 2, 113, 0),
(218, 2, 114, 0),
(219, 2, 115, 0),
(220, 2, 116, 0),
(221, 2, 117, 0),
(222, 2, 118, 0),
(223, 2, 119, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservering`
--

CREATE TABLE `reservering` (
  `id` int(11) UNSIGNED NOT NULL,
  `k_id` int(11) UNSIGNED NOT NULL,
  `z_Nr` int(11) UNSIGNED NOT NULL,
  `s_Nr` int(11) UNSIGNED NOT NULL,
  `film` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `klant_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservering`
--

INSERT INTO `reservering` (`id`, `k_id`, `z_Nr`, `s_Nr`, `film`, `datum`, `klant_id`) VALUES
(1, 1, 1, 1, 'Jurassic World', '2000-01-01', 2),
(2, 1, 1, 1, 'Jurassic World', '2000-01-01', 3),
(3, 1, 1, 1, 'Jurassic World', '2000-01-01', 4),
(4, 1, 1, 1, 'Jurassic World', '2000-01-01', 5),
(5, 1, 1, 1, 'Jurassic World', '2000-01-01', 6),
(6, 1, 2, 2, 'Jurassic World', '2000-01-01', 6),
(7, 1, 3, 3, 'Jurassic World', '2000-01-01', 6),
(8, 1, 1, 1, 'Jurassic World', '2000-01-01', 7),
(9, 1, 3, 3, 'Jurassic World', '2000-01-01', 7),
(10, 1, 2, 2, 'Jurassic World', '2000-01-01', 7),
(11, 1, 1, 1, 'Jurassic World', '2000-01-01', 8),
(12, 1, 2, 2, 'Jurassic World', '2000-01-01', 8),
(13, 1, 3, 3, 'Jurassic World', '2000-01-01', 8),
(14, 1, 4, 4, 'Jurassic World', '2000-01-01', 8),
(15, 1, 5, 5, 'Jurassic World', '2000-01-01', 8),
(16, 1, 10, 10, 'Jurassic World', '2000-01-01', 9),
(17, 1, 1, 1, 'Jurassic World', '2000-01-01', 10),
(18, 1, 2, 2, 'Jurassic World', '2000-01-01', 10),
(19, 1, 3, 3, 'Jurassic World', '2000-01-01', 10),
(20, 1, 0, 0, 'Jurassic World', '2000-01-01', 11),
(21, 1, 0, 0, 'Jurassic World', '2000-01-01', 12),
(22, 1, 0, 0, 'Jurassic World', '2000-01-01', 13),
(23, 1, 0, 0, 'Jurassic World', '2000-01-01', 14),
(24, 1, 0, 0, 'Jurassic World', '2000-01-01', 15),
(25, 1, 0, 0, 'Jurassic World', '2000-01-01', 16),
(26, 1, 0, 0, 'Jurassic World', '2000-01-01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `stoelcheck`
--

CREATE TABLE `stoelcheck` (
  `id` int(11) UNSIGNED NOT NULL,
  `k_id` int(11) UNSIGNED NOT NULL,
  `film` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stoelen`
--

CREATE TABLE `stoelen` (
  `id` int(11) UNSIGNED NOT NULL,
  `rij` int(10) UNSIGNED NOT NULL,
  `stoel_Nr` int(10) UNSIGNED NOT NULL,
  `taken` tinyint(1) DEFAULT 0,
  `film` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stoelen`
--

INSERT INTO `stoelen` (`id`, `rij`, `stoel_Nr`, `taken`, `film`) VALUES
(1, 1, 1, 1, NULL),
(2, 1, 2, 1, NULL),
(3, 1, 3, 1, NULL),
(4, 1, 4, 1, NULL),
(5, 1, 5, 1, NULL),
(6, 1, 6, 1, NULL),
(7, 1, 7, 1, NULL),
(8, 1, 8, 1, NULL),
(9, 1, 9, 1, NULL),
(10, 1, 10, 1, NULL),
(11, 1, 11, 1, NULL),
(12, 1, 12, 1, NULL),
(21, 2, 1, 0, NULL),
(22, 2, 2, 0, NULL),
(23, 2, 3, 1, NULL),
(24, 2, 4, 1, NULL),
(25, 2, 5, 1, NULL),
(26, 2, 6, 1, NULL),
(27, 2, 7, 1, NULL),
(28, 2, 8, 1, NULL),
(29, 2, 9, 1, NULL),
(30, 2, 10, 1, NULL),
(31, 2, 11, 1, NULL),
(32, 3, 1, 0, NULL),
(33, 3, 2, 0, NULL),
(34, 3, 3, 0, NULL),
(35, 3, 4, 0, NULL),
(36, 3, 5, 0, NULL),
(37, 3, 6, 0, NULL),
(38, 3, 7, 0, NULL),
(39, 3, 8, 0, NULL),
(40, 3, 9, 0, NULL),
(41, 3, 10, 0, NULL),
(42, 3, 11, 0, NULL),
(43, 4, 1, 0, NULL),
(44, 4, 2, 0, NULL),
(45, 4, 3, 0, NULL),
(46, 4, 4, 0, NULL),
(47, 4, 5, 0, NULL),
(48, 4, 6, 0, NULL),
(49, 4, 7, 0, NULL),
(50, 4, 8, 0, NULL),
(51, 4, 9, 0, NULL),
(52, 4, 10, 0, NULL),
(53, 4, 11, 0, NULL),
(54, 5, 1, 0, NULL),
(55, 5, 2, 0, NULL),
(56, 5, 3, 0, NULL),
(57, 5, 4, 0, NULL),
(58, 5, 5, 0, NULL),
(59, 5, 6, 0, NULL),
(60, 5, 7, 0, NULL),
(61, 5, 8, 0, NULL),
(62, 5, 9, 0, NULL),
(63, 5, 10, 0, NULL),
(64, 5, 11, 0, NULL),
(65, 6, 1, 0, NULL),
(66, 6, 2, 0, NULL),
(67, 6, 3, 0, NULL),
(68, 6, 4, 0, NULL),
(69, 6, 5, 0, NULL),
(70, 6, 6, 0, NULL),
(71, 6, 7, 0, NULL),
(72, 6, 8, 0, NULL),
(73, 6, 9, 0, NULL),
(74, 6, 10, 0, NULL),
(75, 6, 11, 0, NULL),
(76, 7, 1, 0, NULL),
(77, 7, 2, 0, NULL),
(78, 7, 3, 0, NULL),
(79, 7, 4, 0, NULL),
(80, 7, 5, 0, NULL),
(81, 7, 6, 0, NULL),
(82, 7, 7, 0, NULL),
(83, 7, 8, 0, NULL),
(84, 7, 9, 0, NULL),
(85, 7, 10, 0, NULL),
(86, 7, 11, 0, NULL),
(87, 8, 1, 0, NULL),
(88, 8, 2, 0, NULL),
(89, 8, 3, 0, NULL),
(90, 8, 4, 0, NULL),
(91, 8, 5, 0, NULL),
(92, 8, 6, 0, NULL),
(93, 8, 7, 0, NULL),
(94, 8, 8, 0, NULL),
(95, 8, 9, 0, NULL),
(96, 8, 10, 0, NULL),
(97, 8, 11, 0, NULL),
(98, 9, 1, 0, NULL),
(99, 9, 2, 0, NULL),
(100, 9, 3, 0, NULL),
(101, 9, 4, 0, NULL),
(102, 9, 5, 0, NULL),
(103, 9, 6, 0, NULL),
(104, 9, 7, 0, NULL),
(105, 9, 8, 0, NULL),
(106, 9, 9, 0, NULL),
(107, 9, 10, 0, NULL),
(108, 9, 11, 0, NULL),
(109, 10, 1, 0, NULL),
(110, 10, 2, 0, NULL),
(111, 10, 3, 0, NULL),
(112, 10, 4, 0, NULL),
(113, 10, 5, 0, NULL),
(114, 10, 6, 0, NULL),
(115, 10, 7, 0, NULL),
(116, 10, 8, 0, NULL),
(117, 10, 9, 0, NULL),
(118, 10, 10, 0, NULL),
(119, 10, 11, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zaal`
--

CREATE TABLE `zaal` (
  `id` int(11) UNSIGNED NOT NULL,
  `zaal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zaal`
--

INSERT INTO `zaal` (`id`, `zaal`) VALUES
(1, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexes for table `koppel_z_s`
--
ALTER TABLE `koppel_z_s`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`z_id`,`s_id`),
  ADD UNIQUE KEY `z_id` (`z_id`,`s_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`id`),
  ADD KEY `k_id` (`k_id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- Indexes for table `stoelcheck`
--
ALTER TABLE `stoelcheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stoelen`
--
ALTER TABLE `stoelen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaal`
--
ALTER TABLE `zaal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klant_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `koppel_z_s`
--
ALTER TABLE `koppel_z_s`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `reservering`
--
ALTER TABLE `reservering`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stoelcheck`
--
ALTER TABLE `stoelcheck`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stoelen`
--
ALTER TABLE `stoelen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `zaal`
--
ALTER TABLE `zaal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `koppel_z_s`
--
ALTER TABLE `koppel_z_s`
  ADD CONSTRAINT `s_id` FOREIGN KEY (`s_id`) REFERENCES `stoelen` (`id`),
  ADD CONSTRAINT `z_id` FOREIGN KEY (`z_id`) REFERENCES `zaal` (`id`);

--
-- Constraints for table `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `k_id` FOREIGN KEY (`k_id`) REFERENCES `koppel_z_s` (`id`),
  ADD CONSTRAINT `klant_id` FOREIGN KEY (`klant_id`) REFERENCES `klanten` (`klant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
