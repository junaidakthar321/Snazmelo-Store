-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 10:54 PM
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
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `user_email` text NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_role` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_name`, `user_password`, `user_email`, `user_phone`, `user_role`, `id`) VALUES
('Ayan Raja', '21232f297a57a5a743894a0e4a801fc3', 'ayanraja@gmail.com', 2147483647, 0, 20),
('Hamza Gul', '$2y$10$Wm0lbcIZ1B8nU/J1SFCItOk/uMk/OuF8ZHZm7I7OL9dL2Cdx4/L4a', 'hamzagul7@gmail.com', 2147483647, 0, 21),
('ayan', '$2y$10$O83lEG3nHD8OZU5FYFxB7eohg/NQI/0ugsaUYKlHX79nPKyzkWdGi', 'kingbooster093@gmail.com', 1234567890, 2, 22);

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
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
