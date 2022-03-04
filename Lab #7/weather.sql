-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 05:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_weather`
--

CREATE TABLE `daily_weather` (
  `Id` int(11) NOT NULL,
  `Today` date NOT NULL,
  `Type` int(11) NOT NULL,
  `Temperature` int(11) NOT NULL,
  `Speed` int(11) NOT NULL,
  `Direction` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_weather`
--

INSERT INTO `daily_weather` (`Id`, `Today`, `Type`, `Temperature`, `Speed`, `Direction`) VALUES
(1, '2022-03-03', 1, 10, 6, 'S/E'),
(2, '2022-03-04', 4, 5, 10, 'N/E'),
(3, '2022-03-05', 3, 3, 5, 'N/W'),
(4, '2022-03-06', 2, 7, 7, 'N/E'),
(5, '2022-03-07', 5, -1, 3, 'S/W'),
(6, '2022-03-08', 3, 1, 20, 'N/W');

-- --------------------------------------------------------

--
-- Table structure for table `weather_type`
--

CREATE TABLE `weather_type` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weather_type`
--

INSERT INTO `weather_type` (`Id`, `Name`) VALUES
(1, 'sunny.png'),
(2, 'rainy.png'),
(3, 'windy.png'),
(4, 'snowy.png'),
(5, 'cloudy.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_weather`
--
ALTER TABLE `daily_weather`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Type` (`Type`);

--
-- Indexes for table `weather_type`
--
ALTER TABLE `weather_type`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_weather`
--
ALTER TABLE `daily_weather`
  ADD CONSTRAINT `daily_weather_ibfk_1` FOREIGN KEY (`Type`) REFERENCES `weather_type` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
