-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 04:56 AM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `conserts`
--

CREATE TABLE `conserts` (
  `nama` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conserts`
--

INSERT INTO `conserts` (`nama`, `tempat`, `tanggal`, `harga`, `jam`) VALUES
('gisel', 'cirebon', '2023-07-19', '255555', '20:45:00'),
('', '', '0000-00-00', '', '00:00:00'),
('', '', '0000-00-00', '', '00:00:00'),
('jeri', 'cire', '2023-07-17', '2000', '00:00:00'),
('jeri', 'cire', '2023-07-17', '2000', '00:00:00'),
('jeri', 'cirebon', '2023-07-18', '52000', '00:00:00'),
('jeri', 'cirebon', '2023-07-20', '2000', '00:00:00'),
('jeri', 'cirebon', '2023-07-29', '2121212', '00:00:00'),
('jeri', 'cirebon', '2023-07-03', '1212121', '00:00:00'),
('jeri', 'cirebon', '2023-07-26', '50000', '00:00:00'),
('jeri', 'cirebon', '2023-07-26', '50000', '00:00:00'),
('jeri', 'cirebon', '2023-07-26', '50000', '00:00:00'),
('jeri', 'cirebon', '2023-07-26', '500006', '21:16:00'),
('sn', 'cirebon', '2023-07-26', '23333', '23:00:00'),
('sn', 'cirebon', '2023-07-26', '23333', '23:00:00'),
('sn', 'cirebon', '2023-07-26', '23333', '23:00:00'),
('sn', 'cirebon', '2023-07-26', '23333', '23:00:00'),
('sn', 'cirebon', '2023-07-26', '23333', '23:00:00'),
('gisel', 'cirebon', '2023-07-28', '4', '18:11:00'),
('gisel', 'cirebon', '2023-07-28', '4', '18:11:00'),
('gigi', 'cirebon', '2023-07-17', '2.000.000', '23:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `concert_id` int(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ticket_quantity` varchar(5) NOT NULL,
  `order_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(2, 'jeri', 'muhamadjeri7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(3, 'jer', 'mistijahranip@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`concert_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `concert_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
