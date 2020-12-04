-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 01:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksibeli`
--

CREATE TABLE `detil_transaksibeli` (
  `ID` int(11) NOT NULL,
  `ID_TransaksiBeli` int(11) DEFAULT NULL,
  `ID_Barang` int(11) DEFAULT NULL,
  `NomorSeri` varchar(100) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detil_transaksibeli`
--

INSERT INTO `detil_transaksibeli` (`ID`, `ID_TransaksiBeli`, `ID_Barang`, `NomorSeri`, `Harga`) VALUES
(1, 1, 3, 'F483', 1126000),
(3, 4, 6, 'K8549', 12000),
(4, 5, 2, 'G123F', 10000),
(5, 6, 1, 'D1231F', 10000),
(6, 7, 5, 'D039F', 5000),
(7, 8, 4, 'H123F', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksiservis`
--

CREATE TABLE `detil_transaksiservis` (
  `ID` int(11) NOT NULL,
  `ID_TransaksiServis` int(11) DEFAULT NULL,
  `ID_Mekanik` int(11) DEFAULT NULL,
  `ID_Servis` int(11) DEFAULT NULL,
  `TanggalSelesai` date DEFAULT NULL,
  `Biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detil_transaksiservis`
--

INSERT INTO `detil_transaksiservis` (`ID`, `ID_TransaksiServis`, `ID_Mekanik`, `ID_Servis`, `TanggalSelesai`, `Biaya`) VALUES
(6, 1, 2, 7, '2018-06-14', 35000),
(8, 6, 3, 6, '2018-07-19', 40000),
(9, 7, 5, 2, '2018-10-10', 100000),
(11, 9, 7, 7, '2018-05-24', 12500);

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Kontak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`ID`, `Nama`, `Kontak`) VALUES
(1, 'Madqi', '081220235303'),
(2, 'Mosayyadd', '085315034979'),
(3, 'Rabbanii', '089660983325'),
(4, 'Pusparini', '09827346423'),
(5, 'Mauli', '029324934'),
(6, 'Hasan', '08922847232'),
(7, 'Hamnur', '0823828342'),
(8, 'Nurmaulani', '0893839332'),
(9, 'Citra', '081284601350'),
(12, 'Alfin', '089384734312');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `STNK` varchar(50) DEFAULT NULL,
  `Alamat` varchar(200) DEFAULT NULL,
  `MerkMotor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID`, `Nama`, `STNK`, `Alamat`, `MerkMotor`) VALUES
(1, 'Iqdamm', 'Z 4962 MD', 'Tasikmalaya', 'Honda CBR150R'),
(2, 'Tiaax', 'B 1000 MD', 'Bekasi', 'Yamaha Mio GT'),
(3, 'Windaaxxx', 'B 1234 FTF', 'Cikarangg', 'Hondaa'),
(4, 'Rafif Rizqullah', 'D 1234 BAB', 'Purwokerto', 'Yamaha Mio'),
(5, 'De Gitgit Agitya', 'Z 6732 HAH', 'Tasikmalaya', 'Yamaha Jupiter MX'),
(6, 'Ali', 'D 4532 BAB', 'Wareng', 'Honda Gatau'),
(7, 'Ilham', 'D 8593 HIH', 'Bandung', 'Honda Taudah'),
(8, 'Citra Riandini', 'B 1234 Z', 'Bekaseh', 'Yamaha'),
(9, 'Angel', 'B 4352 ZZ', 'Bekaseh', 'Jupiter MX'),
(10, 'Dindul', 'B 6534 FFF', 'Bekazeh', 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `ID` int(11) NOT NULL,
  `Kategori` varchar(100) DEFAULT NULL,
  `Biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`ID`, `Kategori`, `Biaya`) VALUES
(1, 'Ganti Oli Matic', 30000),
(2, 'Ganti Oli Bebek', 50000),
(3, 'Ganti Oli Sport', 100000),
(4, 'Cek Kelistrikan', 50000),
(5, 'Pembersihan Karburator', 55000),
(6, 'Penyetelan karburator\r\n', 40000),
(7, 'Pembersihan saringan udara\r\n', 35000),
(8, 'Pemeriksaan dan penggantian oli\r\n', 75000),
(9, 'Pembersihan busi\r\n', 60000),
(10, 'Ganti Aki', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `ID` int(11) NOT NULL,
  `NamaBarang` varchar(100) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`ID`, `NamaBarang`, `Stok`, `Harga`) VALUES
(1, 'BATTERY CHARGER MF', 20, 1200000),
(2, 'HOLDER,NEEDLE JET', 15, 83000),
(3, 'PIPE,RR', 11, 1126000),
(4, 'SCREW PAN 6X12', 15, 4000),
(5, 'STAY RADIATOR LOWER', 20, 6000),
(6, 'BOLT ADAPTOR', 20, 12000),
(7, '88120KTM000FMB', 10, 45000),
(8, 'Ban dalam', 20, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `stok_sparepart`
--

CREATE TABLE `stok_sparepart` (
  `ID` int(11) NOT NULL,
  `ID_Part` int(11) DEFAULT NULL,
  `NomorSeri` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `stok_sparepart`
--

INSERT INTO `stok_sparepart` (`ID`, `ID_Part`, `NomorSeri`) VALUES
(1, 4, 'A1234'),
(2, 1, 'B123A'),
(3, 2, 'G541FFF'),
(4, 3, 'F4834'),
(5, 4, 'H1243'),
(6, 6, 'K8549'),
(7, 8, 'F12H8');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli`
--

CREATE TABLE `transaksi_beli` (
  `ID` int(11) NOT NULL,
  `NamaPelanggan` varchar(100) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `Kuantitas` int(11) DEFAULT NULL,
  `TotalHarga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transaksi_beli`
--

INSERT INTO `transaksi_beli` (`ID`, `NamaPelanggan`, `Tanggal`, `Kuantitas`, `TotalHarga`) VALUES
(1, 'Iqdam', '2018-06-08', 2, 2252000),
(4, 'Winda', '2018-06-02', 2, 24000),
(5, 'Tia', '2018-05-09', 3, 2456634),
(6, 'Citra', '2018-07-12', 10, 240000),
(7, 'Angel', '2018-06-01', 5, 50000),
(8, 'Rafif Rizqullah', '2018-04-10', 6, 240000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_servis`
--

CREATE TABLE `transaksi_servis` (
  `ID` int(11) NOT NULL,
  `ID_Pelanggan` int(11) DEFAULT NULL,
  `TanggalMulai` date DEFAULT NULL,
  `Kuantitas` int(11) DEFAULT NULL,
  `TotalBiaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transaksi_servis`
--

INSERT INTO `transaksi_servis` (`ID`, `ID_Pelanggan`, `TanggalMulai`, `Kuantitas`, `TotalBiaya`) VALUES
(1, 1, '2018-06-01', 2, 100000),
(6, 2, '2018-06-01', 1, 100000),
(7, 4, '2018-09-14', 2, 200000),
(9, 5, '2018-05-08', 2, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`) VALUES
(1, 'Admin', '123'),
(2, 'Kasir', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_transaksibeli`
--
ALTER TABLE `detil_transaksibeli`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_transaksibeli` (`ID_TransaksiBeli`),
  ADD KEY `id_barang` (`ID_Barang`);

--
-- Indexes for table `detil_transaksiservis`
--
ALTER TABLE `detil_transaksiservis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_TransaksiServis` (`ID_TransaksiServis`),
  ADD KEY `id_Servis` (`ID_Servis`),
  ADD KEY `id_Mekanik` (`ID_Mekanik`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stok_sparepart`
--
ALTER TABLE `stok_sparepart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_part` (`ID_Part`);

--
-- Indexes for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaksi_servis`
--
ALTER TABLE `transaksi_servis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_pelanggan` (`ID_Pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_transaksibeli`
--
ALTER TABLE `detil_transaksibeli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detil_transaksiservis`
--
ALTER TABLE `detil_transaksiservis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stok_sparepart`
--
ALTER TABLE `stok_sparepart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaksi_servis`
--
ALTER TABLE `transaksi_servis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_transaksibeli`
--
ALTER TABLE `detil_transaksibeli`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`ID_Barang`) REFERENCES `stok_sparepart` (`ID`),
  ADD CONSTRAINT `id_transaksibeli` FOREIGN KEY (`ID_TransaksiBeli`) REFERENCES `transaksi_beli` (`ID`);

--
-- Constraints for table `detil_transaksiservis`
--
ALTER TABLE `detil_transaksiservis`
  ADD CONSTRAINT `id_Mekanik` FOREIGN KEY (`ID_Mekanik`) REFERENCES `mekanik` (`ID`),
  ADD CONSTRAINT `id_Servis` FOREIGN KEY (`ID_Servis`) REFERENCES `servis` (`ID`),
  ADD CONSTRAINT `id_TransaksiServis` FOREIGN KEY (`ID_TransaksiServis`) REFERENCES `transaksi_servis` (`ID`);

--
-- Constraints for table `stok_sparepart`
--
ALTER TABLE `stok_sparepart`
  ADD CONSTRAINT `id_part` FOREIGN KEY (`ID_Part`) REFERENCES `sparepart` (`ID`);

--
-- Constraints for table `transaksi_servis`
--
ALTER TABLE `transaksi_servis`
  ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `pelanggan` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
