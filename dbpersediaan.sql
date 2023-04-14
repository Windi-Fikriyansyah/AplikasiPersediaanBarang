-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 01:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpersediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_pegawai`, `username`, `password`, `level`) VALUES
(1, 1, 'pimpinan', '59335c9f58c78597ff73f6706c6c8fa278e08b3a', 1),
(6, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id_bahan` varchar(8) NOT NULL,
  `nama_bahan` varchar(35) NOT NULL,
  `harga` double NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bahan`
--

INSERT INTO `tb_bahan` (`id_bahan`, `nama_bahan`, `harga`, `id_kategori`, `stok`, `id_satuan`, `deskripsi`) VALUES
('BG0001', 'Vinyl', 10000, 3, 46, 3, 'Kain Bagus'),
('BG0002', 'Classy 93', 14000, 3, 20, 3, 'Kain Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `kd_brg_keluar` varchar(15) NOT NULL,
  `id_bahan` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(4) NOT NULL,
  `keterangan` text NOT NULL,
  `bukti` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`kd_brg_keluar`, `id_bahan`, `tanggal`, `jumlah`, `keterangan`, `bukti`) VALUES
('2023011600001', 'BG0001', '2023-01-16', 10, '-', 'default.jpg');

--
-- Triggers `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `hapus_stok` AFTER DELETE ON `tb_barang_keluar` FOR EACH ROW BEGIN
UPDATE tb_bahan SET stok = stok+OLD.jumlah
WHERE id_bahan=OLD.id_bahan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
UPDATE tb_bahan SET stok = stok-NEW.jumlah
WHERE id_bahan=NEW.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `invoice_masuk` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `grand_total` double NOT NULL,
  `bukti` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`invoice_masuk`, `tanggal`, `id_distributor`, `keterangan`, `grand_total`, `bukti`) VALUES
('2023011300001', '2023-01-13', 2, '-', 110000, 'default.jpg'),
('2023011500002', '2023-01-15', 2, '-', 50000, 'default.jpg'),
('2023012900003', '2023-01-29', 2, '-', 10000, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_brgmasuk`
--

CREATE TABLE `tb_detail_brgmasuk` (
  `id` int(11) NOT NULL,
  `invoice_masuk` varchar(15) NOT NULL,
  `id_bahan` varchar(8) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_brgmasuk`
--

INSERT INTO `tb_detail_brgmasuk` (`id`, `invoice_masuk`, `id_bahan`, `jumlah`, `harga`, `subtotal`) VALUES
(1, '2023011300001', 'BG0001', 11, 10000, 110000),
(2, '2023011500002', 'BG0001', 5, 10000, 50000),
(3, '2023012900003', 'BG0001', 1, 10000, 10000);

--
-- Triggers `tb_detail_brgmasuk`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `tb_detail_brgmasuk` FOR EACH ROW BEGIN
UPDATE tb_bahan SET stok = stok-OLD.jumlah
WHERE id_bahan=OLD.id_bahan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah` AFTER INSERT ON `tb_detail_brgmasuk` FOR EACH ROW BEGIN
UPDATE tb_bahan SET stok = stok+NEW.jumlah
WHERE id_bahan=NEW.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_distributor`
--

INSERT INTO `tb_distributor` (`id`, `nama`, `no_telp`, `alamat`) VALUES
(2, 'CV.Kertas Bersama', '089899999712', 'Jl. Pangeran Nata Kusuma, Kel. Sui Bangkong, Kec. Pontianak Kota');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`) VALUES
(1, 'Kertas'),
(3, 'Kain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `no_telp`, `alamat`, `status`) VALUES
(1, 'Adinda', '089899999712', 'Jl.Sungai Raya Dalam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id` int(11) NOT NULL,
  `nama_satuan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id`, `nama_satuan`) VALUES
(1, 'Perlembar'),
(3, 'Permeter');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_admin`
-- (See below for the actual view)
--
CREATE TABLE `v_admin` (
`id_admin` int(11)
,`id_pegawai` int(11)
,`username` varchar(25)
,`password` varchar(225)
,`level` int(1)
,`nama` varchar(35)
,`no_telp` varchar(13)
,`alamat` text
,`status` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_bahan`
-- (See below for the actual view)
--
CREATE TABLE `v_bahan` (
`id_bahan` varchar(8)
,`nama_bahan` varchar(35)
,`harga` double
,`id_kategori` int(11)
,`stok` int(4)
,`id_satuan` int(11)
,`deskripsi` text
,`nama_kategori` varchar(35)
,`nama_satuan` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang_keluar`
-- (See below for the actual view)
--
CREATE TABLE `v_barang_keluar` (
`kd_brg_keluar` varchar(15)
,`id_bahan` varchar(8)
,`tanggal` date
,`jumlah` int(4)
,`keterangan` text
,`bukti` varchar(225)
,`nama_bahan` varchar(35)
,`harga` double
,`id_kategori` int(11)
,`stok` int(4)
,`id_satuan` int(11)
,`deskripsi` text
,`nama_kategori` varchar(35)
,`nama_satuan` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang_masuk`
-- (See below for the actual view)
--
CREATE TABLE `v_barang_masuk` (
`invoice_masuk` varchar(15)
,`tanggal` date
,`id_distributor` int(11)
,`keterangan` text
,`grand_total` double
,`bukti` varchar(225)
,`nama` varchar(40)
,`no_telp` varchar(13)
,`alamat` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_brgmasuk`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_brgmasuk` (
`id` int(11)
,`invoice_masuk` varchar(15)
,`id_bahan` varchar(8)
,`jumlah` int(4)
,`harga` double
,`subtotal` double
,`nama_bahan` varchar(35)
,`hrg_bahan` double
,`stok` int(4)
,`deskripsi` text
,`id_kategori` int(11)
,`id_satuan` int(11)
,`nama_kategori` varchar(35)
,`nama_satuan` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lap_brgmasuk`
-- (See below for the actual view)
--
CREATE TABLE `v_lap_brgmasuk` (
`id` int(11)
,`invoice_masuk` varchar(15)
,`id_bahan` varchar(8)
,`jumlah` int(4)
,`harga` double
,`subtotal` double
,`nama_bahan` varchar(35)
,`hrg_bahan` double
,`stok` int(4)
,`deskripsi` text
,`id_kategori` int(11)
,`id_satuan` int(11)
,`nama_kategori` varchar(35)
,`nama_satuan` varchar(35)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Structure for view `v_admin`
--
DROP TABLE IF EXISTS `v_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_admin`  AS  (select `tb_admin`.`id_admin` AS `id_admin`,`tb_admin`.`id_pegawai` AS `id_pegawai`,`tb_admin`.`username` AS `username`,`tb_admin`.`password` AS `password`,`tb_admin`.`level` AS `level`,`tb_pegawai`.`nama` AS `nama`,`tb_pegawai`.`no_telp` AS `no_telp`,`tb_pegawai`.`alamat` AS `alamat`,`tb_pegawai`.`status` AS `status` from (`tb_admin` join `tb_pegawai`) where `tb_admin`.`id_pegawai` = `tb_pegawai`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_bahan`
--
DROP TABLE IF EXISTS `v_bahan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_bahan`  AS  (select `tb_bahan`.`id_bahan` AS `id_bahan`,`tb_bahan`.`nama_bahan` AS `nama_bahan`,`tb_bahan`.`harga` AS `harga`,`tb_bahan`.`id_kategori` AS `id_kategori`,`tb_bahan`.`stok` AS `stok`,`tb_bahan`.`id_satuan` AS `id_satuan`,`tb_bahan`.`deskripsi` AS `deskripsi`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_satuan`.`nama_satuan` AS `nama_satuan` from ((`tb_bahan` join `tb_kategori`) join `tb_satuan`) where `tb_bahan`.`id_kategori` = `tb_kategori`.`id` and `tb_bahan`.`id_satuan` = `tb_satuan`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_barang_keluar`
--
DROP TABLE IF EXISTS `v_barang_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang_keluar`  AS  (select `tb_barang_keluar`.`kd_brg_keluar` AS `kd_brg_keluar`,`tb_barang_keluar`.`id_bahan` AS `id_bahan`,`tb_barang_keluar`.`tanggal` AS `tanggal`,`tb_barang_keluar`.`jumlah` AS `jumlah`,`tb_barang_keluar`.`keterangan` AS `keterangan`,`tb_barang_keluar`.`bukti` AS `bukti`,`tb_bahan`.`nama_bahan` AS `nama_bahan`,`tb_bahan`.`harga` AS `harga`,`tb_bahan`.`id_kategori` AS `id_kategori`,`tb_bahan`.`stok` AS `stok`,`tb_bahan`.`id_satuan` AS `id_satuan`,`tb_bahan`.`deskripsi` AS `deskripsi`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_satuan`.`nama_satuan` AS `nama_satuan` from (((`tb_barang_keluar` join `tb_bahan`) join `tb_kategori`) join `tb_satuan`) where `tb_barang_keluar`.`id_bahan` = `tb_bahan`.`id_bahan` and `tb_bahan`.`id_kategori` = `tb_kategori`.`id` and `tb_bahan`.`id_satuan` = `tb_satuan`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_barang_masuk`
--
DROP TABLE IF EXISTS `v_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang_masuk`  AS  (select `tb_barang_masuk`.`invoice_masuk` AS `invoice_masuk`,`tb_barang_masuk`.`tanggal` AS `tanggal`,`tb_barang_masuk`.`id_distributor` AS `id_distributor`,`tb_barang_masuk`.`keterangan` AS `keterangan`,`tb_barang_masuk`.`grand_total` AS `grand_total`,`tb_barang_masuk`.`bukti` AS `bukti`,`tb_distributor`.`nama` AS `nama`,`tb_distributor`.`no_telp` AS `no_telp`,`tb_distributor`.`alamat` AS `alamat` from (`tb_barang_masuk` join `tb_distributor`) where `tb_barang_masuk`.`id_distributor` = `tb_distributor`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_brgmasuk`
--
DROP TABLE IF EXISTS `v_detail_brgmasuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_brgmasuk`  AS  (select `tb_detail_brgmasuk`.`id` AS `id`,`tb_detail_brgmasuk`.`invoice_masuk` AS `invoice_masuk`,`tb_detail_brgmasuk`.`id_bahan` AS `id_bahan`,`tb_detail_brgmasuk`.`jumlah` AS `jumlah`,`tb_detail_brgmasuk`.`harga` AS `harga`,`tb_detail_brgmasuk`.`subtotal` AS `subtotal`,`tb_bahan`.`nama_bahan` AS `nama_bahan`,`tb_bahan`.`harga` AS `hrg_bahan`,`tb_bahan`.`stok` AS `stok`,`tb_bahan`.`deskripsi` AS `deskripsi`,`tb_bahan`.`id_kategori` AS `id_kategori`,`tb_bahan`.`id_satuan` AS `id_satuan`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_satuan`.`nama_satuan` AS `nama_satuan` from (((`tb_detail_brgmasuk` join `tb_bahan`) join `tb_kategori`) join `tb_satuan`) where `tb_detail_brgmasuk`.`id_bahan` = `tb_bahan`.`id_bahan` and `tb_bahan`.`id_kategori` = `tb_kategori`.`id` and `tb_bahan`.`id_satuan` = `tb_satuan`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lap_brgmasuk`
--
DROP TABLE IF EXISTS `v_lap_brgmasuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lap_brgmasuk`  AS  (select `tb_detail_brgmasuk`.`id` AS `id`,`tb_detail_brgmasuk`.`invoice_masuk` AS `invoice_masuk`,`tb_detail_brgmasuk`.`id_bahan` AS `id_bahan`,`tb_detail_brgmasuk`.`jumlah` AS `jumlah`,`tb_detail_brgmasuk`.`harga` AS `harga`,`tb_detail_brgmasuk`.`subtotal` AS `subtotal`,`tb_bahan`.`nama_bahan` AS `nama_bahan`,`tb_bahan`.`harga` AS `hrg_bahan`,`tb_bahan`.`stok` AS `stok`,`tb_bahan`.`deskripsi` AS `deskripsi`,`tb_bahan`.`id_kategori` AS `id_kategori`,`tb_bahan`.`id_satuan` AS `id_satuan`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_satuan`.`nama_satuan` AS `nama_satuan`,`tb_barang_masuk`.`tanggal` AS `tanggal` from ((((`tb_detail_brgmasuk` join `tb_bahan`) join `tb_kategori`) join `tb_satuan`) join `tb_barang_masuk`) where `tb_detail_brgmasuk`.`id_bahan` = `tb_bahan`.`id_bahan` and `tb_bahan`.`id_kategori` = `tb_kategori`.`id` and `tb_bahan`.`id_satuan` = `tb_satuan`.`id` and `tb_detail_brgmasuk`.`invoice_masuk` = `tb_barang_masuk`.`invoice_masuk`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`kd_brg_keluar`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`invoice_masuk`);

--
-- Indexes for table `tb_detail_brgmasuk`
--
ALTER TABLE `tb_detail_brgmasuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_detail_brgmasuk`
--
ALTER TABLE `tb_detail_brgmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
