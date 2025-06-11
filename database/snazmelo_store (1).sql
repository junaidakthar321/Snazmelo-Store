-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 10:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snazmelo_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `product_name` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_author` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_orgpass` text NOT NULL,
  `user_email` text NOT NULL,
  `user_phone` int(11) NOT NULL,
  `profile_image` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_name`, `user_password`, `user_orgpass`, `user_email`, `user_phone`, `profile_image`, `user_role`, `id`) VALUES
('lalasdasd111', '$2y$10$.9M4KazSppX.RqvMl4WjPeU88Ks5wjrmXMo7zHUvl7xtjlIaxDwXq', '', 'lala@gmail.com', 125698, '', 1, 36),
('aysha1', '123123', '', 'aysha@gmail.com', 1234, '', 2, 37),
('wordpress', 'root', '', 'root@gmail.com', 1234, '', 2, 38),
('223', '$2y$10$9VlPuDhuI/3DCllYmVPGTu9LFvye6MWW4SsL96sH2ww6G9q/oDCK6', '123', 'jd@gmail.com', 123123, '', 1, 39),
('RJ', '$2y$10$L3kmVWEMJoVs/9gKlfu.U.8chUiGhbEu86o/tYfvCwsYwQMl0PuTO', 'raja123', 'raja@gmail.com', 12132341, '', 0, 40),
('lul', '$2y$10$vhOH0RIlgVuwTMGRhkDnxuYFt/3L8uVMDl7nLxGSzFDyVYf4I3A0K', 'lul123', 'lul@gmail.com', 1234567, '', 0, 41),
('juni', '$2y$10$PFCKtgu.9zSG1CmyJXpcYeeQgDg4uJSnIVZuvHYe22Nmi391ANTaq', 'juni333', 'juni@gmail.com', 2147483647, '../profile-images/Place Your Image Here (Double Click to Edit).png', 1, 42),
('ali', '$2y$10$cTSc94kPz62TYO/nYJRAvuqTuRw/szCz608OSV0teU42waHKtWP0a', '123', 'ali@gmail.com', 1212212112, '', 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `roll_name` text NOT NULL,
  `role_status` int(11) NOT NULL,
  `user_email` int(11) NOT NULL,
  `user_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
