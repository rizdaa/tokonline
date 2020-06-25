-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 06:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(100) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `id_mobil` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor` int(14) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `awal_sewa` varchar(100) NOT NULL,
  `akhir_sewa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_rental`, `id_mobil`, `nama`, `nama_mobil`, `alamat`, `nomor`, `gender`, `email`, `awal_sewa`, `akhir_sewa`) VALUES
(5, 9, 24, 'rizda', 'Alpahard', 'Jl. Siaga Darma', 2147483647, 'Laki-laki', 'rizdaagisa@gmail.com', '2020-06-24', '2020-06-25'),
(6, 8, 23, 'rizda2', 'Xenia', 'jalan catur', 2147483647, 'Laki-laki', 'admin@co.id', '2020-06-25', '2020-06-26'),
(7, 9, 24, 'rizda3', 'Alpahard', 'jalan warga', 2147483647, 'Perempuan', 'ara@gmail.com', '2020-06-26', '2020-06-27'),
(8, 8, 23, 'rizda_8_xenia', 'Xenia', 'jalan warga', 2147483647, 'Laki-laki', 'rizdaagisa@gmail.com', '2020-06-29', '2020-06-30'),
(9, 8, 22, 'rizda_8_avanzavelox', 'Avanza Veloz', 'Jl. Siaga Darma', 0, 'Laki-laki', 'rizdaagisa@gmail.com', '2020-06-24', '2020-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_mobil` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `harga` int(8) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `tahun` int(4) NOT NULL,
  `cc` int(5) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_mobil`, `id_rental`, `gambar`, `nama_mobil`, `harga`, `warna`, `tahun`, `cc`, `merek`, `description`) VALUES
(22, 8, '8_Avanza Veloz_Putih_luthfi.jpg', 'Avanza Veloz', 150000, 'Putih', 2016, 1000, 'toyota', 'ini adalah mobil avanza yang sangat bagus dan bersih'),
(23, 8, '8_Xenia_putih_5ef034e292198.4.jpg', 'Xenia', 400000, 'putih', 2019, 900, 'suzuki', 'mantep deh pokoknya'),
(24, 9, '9_Alpahard_hitam_5ef033688c77c.2.jpg', 'Alpahard', 500000, 'hitam', 2020, 1200, 'toyota', 'Ini mobil yang sangat mahal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_rental` int(11) NOT NULL,
  `nama_rental` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_rental`, `nama_rental`, `username`, `password`, `confirm_password`, `email`) VALUES
(5, 'rizda', '123', '$2y$10$HeqDp6exhV6qCSfzdbvJzupyqOnq4oh.DDireEF8DAWuq0mmSlciG', '$2y$10$.mOroBGzb40l.zQQlsMcX.4FF4GLD6/Q.wKQ5rJhVrgZz.8TXKclG', 'rizdaagisa@gmail.com'),
(6, 'rizda', 'rizda', '$2y$10$RSniCwnzEMNjwGgng5zKne2VkxAqBbsj1Yl5ROf75B2DdO3LRcw96', '$2y$10$IQblUnM1pIDAiFPta1xsL.jtA6XOTmwmOK0rFRNwIADtOEhslZpRO', 'rizdaagisa@gmail.com'),
(7, 'rizda2', 'rizda2', '$2y$10$k4mknqA3uDrbfxYK.sH85.UFKrQKfbCLeDm/x5IVfAIsJPsBD2Y.G', '$2y$10$oQT47bfNmWtQqn3T/ZVToOqs0MMagUO5KOT87L8W63nYDNcw5qoty', 'rizdaagisa@yahoo.com'),
(8, 'Cahaya abadi', 'cahaya', '$2y$10$hp90L/0IajUmKissZ88NkulJtdjraGTqFMdGdwTwSeFHqcvZSispO', '$2y$10$3OCJ2vfwdJwItmev/QMaduJMgkZzZl5tVemEeSf5APa3RFPajyxym', 'cahaya@gmail.com'),
(9, 'maju jaya', 'maju', '$2y$10$I5nD8xtfmFvonYb/etdkselOOHt7m.wHZCScPcUDqgAb1JkBPdz12', '$2y$10$wGf9cZxNwgcWmwTsgWvEQew8ECdRu.nnX99U4DSChIJVQXOZQtVMy', 'maju@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_rental`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
