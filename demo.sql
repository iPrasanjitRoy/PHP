-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 08:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Address`, `Age`) VALUES
(1, 'John Doe', '123 Main St', 25),
(2, 'Jane Smith', '456 Oak St', 30),
(3, 'Bob Johnson', '789 Elm St', 22),
(4, 'Alice Brown', '987 Maple Ave', 35),
(5, 'Charlie White', '654 Birch Ln', 28),
(6, 'Eva Green', '321 Pine Rd', 40),
(7, 'Frank Black', '555 Cedar Blvd', 33),
(8, 'Grace Taylor', '888 Walnut Dr', 26),
(9, 'Henry Davis', '222 Oakwood Ct', 29),
(10, 'Ivy Jones', '999 Elmwood Pl', 32),
(11, 'Alice Johnson', '456 Pine St', 28),
(12, 'Bob White', '789 Elm St', 30),
(13, 'Charlie Brown', '123 Oak Ln', 32),
(14, 'Alice Johnson', '456 Pine St', 28),
(15, 'Bob White', '789 Elm St', 30),
(16, 'Charlie Brown', '123 Oak Ln', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
