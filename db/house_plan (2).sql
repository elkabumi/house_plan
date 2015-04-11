-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Apr 2015 pada 15.28
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `house_plan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
`building_id` int(11) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `building_img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`, `building_img`) VALUES
(1, 'Gayungsari Permai', '20150407110448_maps3copycopy.png'),
(4, 'Kebonsari Permai', '20150408120421_maps2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`payment_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `buyer_phone` varchar(100) NOT NULL,
  `buyer_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `table_id`, `seller_id`, `payment_method`, `buyer_name`, `buyer_phone`, `buyer_address`) VALUES
(5, 1, 1, 1, 'Candra Dwi Prasetyo', '0838 3105 9355', 'Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
`seller_id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `seller_phone` varchar(100) NOT NULL,
  `seller_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sellers`
--

INSERT INTO `sellers` (`seller_id`, `seller_name`, `seller_phone`, `seller_address`) VALUES
(1, 'Andri Febri', '0858 3030 2123', 'Mojokerto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
`table_id` int(11) NOT NULL,
  `tt_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `data_x` int(11) NOT NULL,
  `data_y` int(11) NOT NULL,
  `table_price` int(11) NOT NULL,
  `table_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`table_id`, `tt_id`, `table_name`, `data_x`, `data_y`, `table_price`, `table_status`) VALUES
(1, 4, '1', 199, 229, 250000000, 1),
(2, 4, '2', 199, 275, 250000000, 0),
(3, 4, '3', 200, 322, 250000000, 0),
(4, 4, '4', 200, 370, 250000000, 0),
(5, 8, '13', 200, 589, 250000000, 0),
(6, 8, '14', 200, 633, 250000000, 0),
(7, 8, '11', 199, 497, 250000000, 0),
(8, 8, '15', 198, 679, 250000000, 0),
(9, 4, '9', 244, 370, 250000000, 0),
(10, 4, '5', 200, 416, 250000000, 0),
(14, 8, '12', 199, 543, 250000000, 0),
(15, 4, '7', 245, 275, 250000000, 0),
(16, 4, '8', 244, 323, 250000000, 0),
(17, 4, '6', 243, 229, 250000000, 0),
(18, 4, '10', 245, 415, 250000000, 0),
(21, 10, '1', 209, 307, 250000000, 0),
(22, 10, '2', 258, 307, 250000000, 0),
(23, 10, '3', 307, 307, 250000000, 0),
(24, 10, '4', 356, 307, 250000000, 0),
(25, 10, '5', 207, 419, 250000000, 0),
(26, 10, '6', 256, 419, 250000000, 0),
(27, 10, '7', 307, 418, 250000000, 0),
(28, 10, '8', 354, 418, 250000000, 0),
(29, 10, '9', 207, 504, 250000000, 0),
(30, 10, '10', 255, 504, 250000000, 0),
(31, 10, '11', 303, 504, 250000000, 0),
(32, 10, '12', 351, 504, 250000000, 0),
(33, 8, '16', 243, 497, 250000000, 0),
(34, 8, '17', 243, 543, 250000000, 0),
(35, 8, '18', 244, 590, 250000000, 0),
(36, 8, '19', 243, 634, 250000000, 0),
(37, 8, '20', 243, 679, 250000000, 0),
(38, 8, '21', 321, 498, 250000000, 0),
(39, 8, '22', 320, 542, 250000000, 0),
(41, 8, '23', 323, 586, 250000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_blocks`
--

CREATE TABLE IF NOT EXISTS `table_blocks` (
`tb_id` int(11) NOT NULL,
  `tb_name` varchar(100) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_blocks`
--

INSERT INTO `table_blocks` (`tb_id`, `tb_name`, `building_id`) VALUES
(1, 'Blok A', 1),
(2, 'Blok A', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_items`
--

CREATE TABLE IF NOT EXISTS `table_items` (
`table_item_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_qty` int(11) NOT NULL,
  `menu_price` int(11) NOT NULL,
  `menu_total_price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_items`
--

INSERT INTO `table_items` (`table_item_id`, `table_id`, `menu_id`, `menu_qty`, `menu_price`, `menu_total_price`) VALUES
(1, 1, 1, 2, 4000, 8000),
(2, 1, 2, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_types`
--

CREATE TABLE IF NOT EXISTS `table_types` (
`tt_id` int(11) NOT NULL,
  `tt_name` varchar(100) NOT NULL,
  `tb_id` int(11) NOT NULL,
  `tt_img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_types`
--

INSERT INTO `table_types` (`tt_id`, `tt_name`, `tb_id`, `tt_img`) VALUES
(4, 'Tipe 21', 1, '20150402080427_perumahan-type-21 (1).jpg'),
(8, 'Tipe 36', 1, '20150402090438_Rumah-Minimalis-Type-36-1.jpg'),
(10, 'Tipe 45', 2, '20150407040459_desain-rumah-minimalis-type-45-terbaru.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `seller_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `table_id`, `transaction_date`, `seller_id`, `customer_name`, `customer_address`) VALUES
(91, 1, '2015-03-17 02:03:39', 0, '', ''),
(92, 0, '2015-03-17 02:03:04', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_login`, `user_password`, `user_name`, `user_code`, `user_phone`, `user_img`, `user_active_status`) VALUES
(11, 1, 'melon', '3a2cf27458c9aa3e358f8fc0f002bff6', 'melon', 'A0001', '03125435432', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
 ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
 ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `table_blocks`
--
ALTER TABLE `table_blocks`
 ADD PRIMARY KEY (`tb_id`);

--
-- Indexes for table `table_items`
--
ALTER TABLE `table_items`
 ADD PRIMARY KEY (`table_item_id`);

--
-- Indexes for table `table_types`
--
ALTER TABLE `table_types`
 ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `table_blocks`
--
ALTER TABLE `table_blocks`
MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_items`
--
ALTER TABLE `table_items`
MODIFY `table_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `table_types`
--
ALTER TABLE `table_types`
MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
