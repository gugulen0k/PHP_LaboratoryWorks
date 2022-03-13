-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2022 at 03:39 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `elib`
--

CREATE TABLE `elib` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `publishing` varchar(50) NOT NULL,
  `subjects` text NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elib`
--

INSERT INTO `elib` (`id`, `title`, `author`, `year`, `publishing`, `subjects`, `price`, `photo`) VALUES
(1, 'La Nostalgia Especialista', 'Prilidiano Granados Laboy', 1943, 'Editorial Ananda', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 54, 'book1.jpg'),
(2, 'El Universo Comandante', 'Arturo Reynoso Bueno', 1949, 'Editorial Ananda', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 100, 'book2.jpg'),
(3, 'El Pescado Maquinista', 'Chatuluka Muniz Rojo', 1997, 'Ediciones del Pueblo', 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 98, 'book3.jpg'),
(4, 'La Cuna Ingeniero', 'Fausto Ceja Corona', 1985, 'Editorial Ananda', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 62, 'book4.jpg'),
(5, 'La Comida Azul', 'Danya Narvaez Estevez', 1990, 'Angria Ediciones', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 33, 'book5.jpg'),
(26, 'new book', 'author', 2022, 'some company', 'some info', 20, 'cover.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elib`
--
ALTER TABLE `elib`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elib`
--
ALTER TABLE `elib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
