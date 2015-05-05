-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Mei 2015 pada 21.39
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`, `building_img`) VALUES
(7, 'Gayungan Residence', '20150414010408_new.png');

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
  `buyer_address` text NOT NULL,
  `buyer_email` varchar(100) NOT NULL,
  `buyer_office_address` text NOT NULL,
  `payment_date` date NOT NULL,
  `payment_dp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`payment_id`, `table_id`, `seller_id`, `payment_method`, `buyer_name`, `buyer_phone`, `buyer_address`, `buyer_email`, `buyer_office_address`, `payment_date`, `payment_dp`) VALUES
(7, 43, 12, 2, 'Candra Dwi Prasetyo', '0838 3105 9355', 'Sidoarjo', 'melon.candra@yahoo.com', 'Gayungan Surabaya', '2015-05-04', 30000000),
(8, 44, 1, 1, 'chandra', '081231615445', 'gayungan', '', '', '0000-00-00', 0),
(9, 45, 12, 1, 'Wawan Setiawan', '0838 3105 9355', 'Waru Sidoarjo', '', '', '2015-04-28', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tables`
--

INSERT INTO `tables` (`table_id`, `tt_id`, `table_name`, `data_x`, `data_y`, `table_price`, `table_status`) VALUES
(22, 10, '2', 253, 288, 250000000, 0),
(43, 16, '1', 464, 349, 300000000, 1),
(44, 16, '2', 509, 349, 300000000, 1),
(45, 16, '3', 554, 349, 350000000, 1),
(46, 16, '4', 599, 349, 350000000, 0),
(47, 14, '6', 462, 438, 400000000, 0),
(48, 16, '5', 643, 349, 320000000, 0),
(49, 14, '7', 506, 439, 350000000, 0),
(50, 14, '8', 550, 439, 350000000, 0),
(51, 14, '9', 593, 439, 350000000, 0),
(52, 14, '10', 636, 439, 350000000, 0),
(53, 14, '11', 681, 440, 350000000, 0),
(54, 13, '1', 464, 532, 350000000, 0),
(55, 13, '2', 510, 531, 350000000, 0),
(56, 13, '3', 554, 529, 350000000, 0),
(57, 13, '4', 600, 530, 350000000, 0),
(58, 13, '5', 645, 529, 350000000, 0),
(59, 13, '6', 689, 531, 350000000, 0),
(60, 13, '7', 463, 625, 350000000, 0),
(61, 13, '8', 507, 625, 350000000, 0),
(62, 13, '9', 551, 624, 350000000, 0),
(63, 13, '10', 596, 624, 350000000, 0),
(64, 13, '11', 641, 624, 350000000, 0),
(65, 12, '1', 466, 720, 350000000, 0),
(66, 12, '2', 510, 720, 350000000, 0),
(67, 12, '3', 554, 720, 350000000, 0),
(68, 12, '4', 598, 719, 350000000, 0),
(69, 12, '5', 643, 719, 350000000, 0),
(70, 12, '6', 687, 719, 350000000, 0),
(71, 12, '7', 464, 815, 350000000, 0),
(72, 12, '8', 509, 815, 350000000, 0),
(73, 12, '9', 555, 815, 350000000, 0),
(74, 12, '10', 600, 815, 350000000, 0),
(75, 12, '11', 644, 815, 350000000, 0),
(76, 12, '12', 690, 814, 350000000, 0),
(77, 13, '12', 687, 625, 350000000, 0),
(78, 17, '1', 781, 331, 350000000, 0),
(79, 17, '2', 781, 376, 350000000, 0),
(80, 17, '3', 781, 419, 350000000, 0),
(81, 17, '4', 781, 462, 350000000, 0),
(82, 17, '5', 781, 506, 350000000, 0),
(83, 11, '1', 463, 909, 200000000, 0),
(84, 11, '2', 508, 909, 200000000, 0),
(85, 11, '3', 552, 909, 200000000, 0),
(86, 11, '4', 597, 910, 200000000, 0),
(87, 11, '5', 642, 909, 200000000, 0),
(88, 11, '6', 686, 909, 200000000, 0),
(89, 11, '7', 463, 1020, 200000000, 0),
(90, 11, '8', 509, 1019, 200000000, 0),
(91, 11, '9', 555, 1019, 200000000, 0),
(92, 11, '10', 600, 1019, 200000000, 0),
(93, 11, '11', 644, 1020, 200000000, 0),
(94, 15, '6', 780, 550, 250000000, 0),
(95, 15, '7', 780, 594, 250000000, 0),
(96, 15, '8', 781, 639, 250000000, 0),
(97, 15, '9', 782, 684, 250000000, 0),
(98, 15, '10', 782, 730, 250000000, 0),
(99, 15, '11', 782, 775, 250000000, 0),
(100, 15, '12', 782, 818, 250000000, 0),
(101, 15, '13', 783, 863, 250000000, 0),
(102, 15, '14', 782, 909, 250000000, 0),
(103, 18, '1', 505, 1108, 400000000, 0),
(104, 18, '2', 504, 1152, 400000000, 0),
(105, 18, '3', 505, 1196, 400000000, 0),
(106, 18, '4', 505, 1240, 400000000, 0),
(107, 18, '5', 506, 1284, 400000000, 0),
(108, 18, '6', 597, 1110, 400000000, 0),
(109, 18, '7', 598, 1153, 400000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_blocks`
--

CREATE TABLE IF NOT EXISTS `table_blocks` (
`tb_id` int(11) NOT NULL,
  `tb_name` varchar(100) NOT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_blocks`
--

INSERT INTO `table_blocks` (`tb_id`, `tb_name`, `building_id`) VALUES
(3, 'A', 7),
(4, 'B', 7),
(5, 'C', 7),
(6, 'D', 7),
(7, 'E', 7),
(9, 'F', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_types`
--

CREATE TABLE IF NOT EXISTS `table_types` (
`tt_id` int(11) NOT NULL,
  `tt_name` varchar(100) NOT NULL,
  `tb_id` int(11) NOT NULL,
  `tt_img` text NOT NULL,
  `tt_color` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `table_types`
--

INSERT INTO `table_types` (`tt_id`, `tt_name`, `tb_id`, `tt_img`, `tt_color`) VALUES
(11, 'Tipe 30', 7, '20150415020442_30.jpg', '#cfd86c'),
(12, 'Tipe 30', 6, '20150415020452_30.jpg', '#cfd86c'),
(13, 'Tipe 40', 5, '20150415020401_40.jpg', '#eaff00'),
(14, 'Tipe 40', 4, '20150415020409_40.jpg', '#eaff00'),
(15, 'Tipe 40', 3, '20150415020416_40.jpg', '#eaff00'),
(16, 'Tipe 45', 4, '20150415020433_45.jpg', '#f5aa35'),
(17, 'Tipe 45', 3, '20150415020440_45.jpg', '#f5aa35'),
(18, 'Tipe 30', 9, '20150415020425_30.jpg', '#cfd86c');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `user_login`, `user_password`, `user_name`, `user_code`, `user_phone`, `user_img`, `user_active_status`) VALUES
(11, 1, 'melon', '3a2cf27458c9aa3e358f8fc0f002bff6', 'melon', 'A0001', '03125435432', '', 1),
(12, 2, 'andri', '6bd3108684ccc9dfd40b126877f850b0', 'Andri Febri', '', '0858 3030 2123', 'images.png', 1);

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
-- Indexes for table `table_types`
--
ALTER TABLE `table_types`
 ADD PRIMARY KEY (`tt_id`);

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
MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `table_blocks`
--
ALTER TABLE `table_blocks`
MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `table_types`
--
ALTER TABLE `table_types`
MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
