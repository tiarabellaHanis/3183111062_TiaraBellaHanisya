-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2021 at 06:38 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin@sibw.com', 'admin123'),
('tiarabellahanisya@gmil.com', 'bellong');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `nm_usr` varchar(35) NOT NULL,
  `log_usr` varchar(35) NOT NULL,
  `pas_usr` varchar(35) NOT NULL,
  `email_usr` varchar(35) NOT NULL,
  `almt_usr` varchar(35) NOT NULL,
  `kp_usr` char(6) NOT NULL,
  `kota_usr` varchar(35) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `rek` varchar(20) NOT NULL,
  `nmrek` varchar(35) NOT NULL,
  `bank` enum('Mandiri','BNI','CIMB','BCA','Bank Jabar','BRI','Danamon','Permata') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `nm_usr`, `log_usr`, `pas_usr`, `email_usr`, `almt_usr`, `kp_usr`, `kota_usr`, `tlp`, `rek`, `nmrek`, `bank`) VALUES
(10, 'tiarabella', 'bellong', 'akubutuhdia', 'tiarabella@gmail.com', 'manna', '23456', 'bengkulu', '082376978439', '901234589302010', 'bella hanisya', 'Danamon'),
(12, 'tiarabella', 'Hallo24', 'Haykamu', 'tiarabelladenta@gmail.com', 'manna', '23456', 'bengkulu', '082376978439', '901234589302010', 'bella hanisya', 'CIMB'),
(13, 'tiarabella', 'Bellong24', 'tiarabella', 'tiarabellahanisya@gmail.com', 'Manna', '23456', 'Bengkulu', '082376978439', '901234589302010', 'bella hanisya', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `detail_checkout`
--

CREATE TABLE `detail_checkout` (
  `id_detail_checkout` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_checkout`
--

INSERT INTO `detail_checkout` (`id_detail_checkout`, `checkout_id`, `produk_id`, `qty`) VALUES
(7, 10, 18, 1),
(8, 11, 18, 1),
(9, 12, 18, 1),
(10, 13, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nm_usr` varchar(255) NOT NULL,
  `log_usr` varchar(255) DEFAULT NULL,
  `pas_usr` varchar(255) NOT NULL,
  `email_usr` varchar(255) NOT NULL,
  `almt_usr` text,
  `kp_usr` varchar(255) DEFAULT NULL,
  `kota_usr` varchar(255) DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nm_usr`, `log_usr`, `pas_usr`, `email_usr`, `almt_usr`, `kp_usr`, `kota_usr`, `tlp`, `photo`) VALUES
(1, 'Tiara Bella Hanisya', 'Bella', 'denta2412', 'tiarabellahanisya@gmail.com', 'Manna', 'Bengkulu Selatan', 'Bengkulu', '082376978439', 'Hiya'),
(2, 'Denta Nora Hanisya', 'Denta', 'hanis2424', 'dentanorahanis@gmail.com', 'Manna', 'Bengkulu Selatan', 'Manna', '082376928512', 'Tdak Ada'),
(3, 'Ana Haryati', 'Ana', 'anuyharyati', 'anaharyati09@gmail.com', 'Manna', 'Bengkulu Selatan', 'Manna', '085157687890', 'Tdak Ada');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `no_pem` char(25) NOT NULL,
  `tgl_pem` date NOT NULL,
  `usr_pem` varchar(50) NOT NULL,
  `norek_pem` int(20) NOT NULL,
  `nmrek_pem` varchar(50) NOT NULL,
  `bankrek_pem` varchar(50) NOT NULL,
  `tot_pem` int(20) NOT NULL,
  `sts_pem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `no_pem`, `tgl_pem`, `usr_pem`, `norek_pem`, `nmrek_pem`, `bankrek_pem`, `tot_pem`, `sts_pem`) VALUES
(4, 'PM89202021', '2021-01-11', 'Ana Haryati', 51598129, 'Ana', 'BRI', 20000, 'bayar'),
(5, 'PM89202020', '2021-01-12', 'Tiara Bella Hanisya', 51578029, 'Tiara', 'BNI', 150000, 'bayar'),
(6, 'PM89202022', '2021-01-12', 'Denta Nora Hanisya', 51577030, 'Denta', 'BRI', 250000, 'bayar');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `br_id` int(11) NOT NULL,
  `br_nm` varchar(100) DEFAULT NULL,
  `br_item` int(11) DEFAULT NULL,
  `br_hrg` double DEFAULT NULL,
  `br_stok` int(11) DEFAULT NULL,
  `br_satuan` varchar(20) DEFAULT NULL,
  `br_sts` char(1) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `br_kat` varchar(20) DEFAULT NULL,
  `br_gbr` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`br_id`, `br_nm`, `br_item`, `br_hrg`, `br_stok`, `br_satuan`, `br_sts`, `ket`, `br_kat`, `br_gbr`) VALUES
(15, 'Gamis Marinda III', 1, 120000, 30, 'Pcs', 'Y', 'Bahan wolfis, lembut, dan nyaman untuk dipakai di acara pesta', 'KD02', 'produk_img/10.jpg'),
(16, 'Gamis Marinda II', 1, 90000, 30, 'Pcs', 'Y', 'Bahan katun, lembut, menyerap keringat dan tidak transparan', 'KD02', 'produk_img/06-1.jpg'),
(17, 'Gamis Marinda I', 1, 120000, 30, 'Pcs', 'Y', 'Bahan wolfis, lembut, dan nyaman', 'KD02', 'produk_img/08.jpeg'),
(18, 'Gamis Aaliya III', 1, 125000, 30, 'Pcs', 'Y', 'Bahan katun, lembut, menyerap keringat dan tidak transparan', 'KD02', 'produk_img/09.jpg'),
(19, 'Gamis Aaliya II', 1, 150000, 30, 'Pcs', 'Y', 'Bahan wolfis, lembut, dan nyaman', 'KD02', 'produk_img/07.jpg'),
(20, 'Gamis Aaliya I', 1, 125000, 30, 'Pcs', 'Y', 'Bahan wolfis, lembut, dan nyaman', 'KD02', 'produk_img/11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `produk_kategori`
--

CREATE TABLE `produk_kategori` (
  `id` int(11) NOT NULL,
  `kategori_kode` varchar(20) DEFAULT NULL,
  `kategori_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_kategori`
--

INSERT INTO `produk_kategori` (`id`, `kategori_kode`, `kategori_nama`) VALUES
(5, 'KD01', 'Hijab'),
(6, 'KD02', 'Gamis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  ADD PRIMARY KEY (`id_detail_checkout`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_checkout`
--
ALTER TABLE `detail_checkout`
  MODIFY `id_detail_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produk_kategori`
--
ALTER TABLE `produk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
