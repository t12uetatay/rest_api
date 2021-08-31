-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 09:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `price` int(12) NOT NULL,
  `description` text NOT NULL,
  `pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `description`, `pic`) VALUES
(1, 'Skinny A6 Series', 247000, 'Brand 	Logo Jeans\r\nFitting 	Skinny Fit\r\nGender 	Women', '1630244759_64c0920ce337be8349d4.jpg'),
(2, 'Goldquill Dark Yellow Swe', 399000, 'Brand 	Bombboogie\r\nFitting 	Regular Fit', '1630245365_9dd97ba9e1bd85fb67fd.jpg'),
(4, 'Skinny C9 Series Black On', 257000, 'Brand 	Bombboogie\r\nFitting 	Skinny Fit\r\nGender 	Men                                                                ', '1630246057_e5076a43434af162d5c9.jpg'),
(8, 'Skinny B5 Series Light Bl', 254000, 'Barang Produk Ori Bombboogie\r\nBila barang / size bisa di pilih masuk ke keranjang artinya BARANG PASTI READY !', '1630320287_83cd355e4470bf6d7082.png'),
(9, 'Hhh', 5599, 'Aaa', 'j4fno5s8.jpeg'),
(10, 'Kkgb', 56698, 'Chnkcv', 'j51mkomc.jpeg'),
(12, 'Gjk', 666, 'Ghh', 'v8ubda30.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
