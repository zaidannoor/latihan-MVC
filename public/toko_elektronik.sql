-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 04:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_elektronik`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image_path` varchar(1024) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `stock`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Lampu Belajar', 'Lampu untuk membantu dalam pembelajaran', 50000, 77, 'img/img-produk/619ddde2468ae.jpg', '2021-11-22 13:56:42', '2021-11-24 22:00:06'),
(2, 'Mesin cuci', 'Mesin untuk mencuci', 600000, 78, 'img/img-produk/619ddd7576f09.jpg', '0000-00-00 00:00:00', '2021-11-24 22:00:10'),
(3, 'AC', 'Alat pendingin ruangan ', 500000, 79, 'img/img-produk/619ddca41f76d.jpg', '0000-00-00 00:00:00', '2021-11-24 21:49:38'),
(4, 'Kulkas dua pintu', 'Alat pendingin makanan dan minuman', 699999, 82, 'img/img-produk/619ddcbfd0fc0.jpg', '0000-00-00 00:00:00', '2021-11-24 20:55:36'),
(5, 'Lampu Neon', 'Lampu neon dengan berbagai varian warna', 30000, 82, 'img/img-produk/619ddccd49e85.jpg', '0000-00-00 00:00:00', '2021-11-24 20:55:36'),
(6, 'TV Elektronik', 'Televisi masa depan', 700000, 81, 'img/img-produk/619ddcd88e320.jpg', '2021-11-22 14:36:16', '2021-11-24 21:03:42'),
(9, 'Rice Cooker', 'Alat untuk menanak nasi', 500000, 100, 'img/img-produk/619e51d0bc705.jpg', '2021-11-24 14:53:04', '2021-11-24 21:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'zaidan', '$2y$10$Ny3jzv909Kt0VOIysooBh.k1ALCI2gWSmzX2e13voLezg/Mfon.bu', 'zaidannoor@gmail.com', 'user'),
(5, 'admin1', '$2y$10$ATWe0K7MfsR5N7DbeBdeGuGsMH7VZuQC9GghzlA4jYdI.GV.FfkBi', 'admin123.gmail.com', 'admin'),
(6, 'abidbilal', '$2y$10$VxoEMfwSgCOuXKYcZqwQfe2SWtAkeKXGSLIoKxHPyE4h3bEztdQVS', 'abid@elji.com', 'user'),
(7, 'zaidan2', '$2y$10$I7YZ6pmm4eQ5d4MWneneYuCq2sbIJQqLghGu/GWUN1Hy6JN27RG3W', 'zaidan@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;