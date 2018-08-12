-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2017 at 11:34 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode_barang` int(5) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(30) COLLATE ascii_bin DEFAULT NULL,
  `kode_jenis` int(5) DEFAULT NULL,
  `keterangan` varchar(50) COLLATE ascii_bin DEFAULT NULL,
  `tgl_inventaris` date DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=33333334 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kode_jenis`, `keterangan`, `tgl_inventaris`) VALUES
(11012, 'Toyota Camry', 11103, 'Toyota Camry 2015 ,Stnk', '2016-10-02'),
(3005, 'Kapresky v0.8', 11105, 'Beserta Lisensi', '2016-09-26'),
(4001, 'laptop Lenovo', 11102, 'Intel Core i3 RAM 2gb 14inc', '2016-09-26'),
(10011, 'PC rakitan', 111124, 'intel pentium CPU 3.00GHZ RAM 80gb LCD 16', '2016-09-26'),
(11011, 'Honda Beat', 11103, 'Honda Beat 2011, stnk , bpkb ', '2016-10-01'),
(4002, 'laptop Toshiba Portege', 11102, 'intel Core I7 RAM 6gb', '2016-08-23'),
(10012, 'PC Lenovo ', 111124, 'Intel pentium,dual coreE5700, RAM 2gb SATA 500gb', '2016-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `kode_dept` int(5) NOT NULL AUTO_INCREMENT,
  `nama_dept` varchar(20) COLLATE ascii_bin DEFAULT NULL,
  PRIMARY KEY (`kode_dept`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1010 ;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`kode_dept`, `nama_dept`) VALUES
(1005, 'Quality Control'),
(1004, 'PPIC'),
(1001, 'Produksi'),
(1003, 'Tecnical'),
(1002, 'Raw Material'),
(1006, 'IT'),
(1007, 'Sales Marine'),
(1009, 'Tecnical Sales Suppo');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `kode_jenis` int(5) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(20) COLLATE ascii_bin DEFAULT NULL,
  PRIMARY KEY (`kode_jenis`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1123455 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_jenis`, `jenis`) VALUES
(11105, 'Anti Virus'),
(11104, 'Hanphone'),
(11103, 'Kendaraan'),
(11102, 'Laptop'),
(2234, 'Elektronik'),
(111124, 'PC');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `kode_pinjam` int(5) NOT NULL AUTO_INCREMENT,
  `nip` int(5) DEFAULT NULL,
  `kode_barang` int(5) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status` enum('pinjam','selesai') COLLATE ascii_bin DEFAULT NULL,
  `keterangan` varchar(50) COLLATE ascii_bin DEFAULT NULL,
  PRIMARY KEY (`kode_pinjam`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=201615 ;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`kode_pinjam`, `nip`, `kode_barang`, `tgl_pinjam`, `tgl_selesai`, `status`, `keterangan`) VALUES
(100020, 50058, 11012, '2016-09-01', '2016-10-03', 'selesai', 'kendaraan telah di ganti ban '),
(100019, 50012, 4002, '2016-01-01', '2016-09-26', 'selesai', 'kondisi lengkap'),
(100014, 50012, 4002, '2016-09-20', '2016-09-26', 'pinjam', 'barang tidak lengkap hanya laptop dan casan'),
(100013, 50032, 10011, '2016-07-01', '2017-09-15', 'pinjam', 'pc lengkap lokasi di ruang produksi'),
(100012, 50012, 4001, '2016-07-01', '2016-09-26', 'pinjam', 'kondisi barang baru lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `nip` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) COLLATE ascii_bin DEFAULT NULL,
  `kode_dept` int(5) DEFAULT NULL,
  `alamat` varchar(30) COLLATE ascii_bin DEFAULT NULL,
  `tlp` varchar(12) COLLATE ascii_bin DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=1112222335 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nip`, `nama`, `kode_dept`, `alamat`, `tlp`) VALUES
(50032, 'Wani', 1001, 'Tangerang', '089823156782'),
(50015, 'Sony', 1003, 'Jakarta', '083811118701'),
(50056, 'Herlambang', 1002, 'Tangerang', '081288915543'),
(50012, 'Simon', 1007, 'Jakarta', '085711145601'),
(50058, 'Hilman Maulana', 1006, 'Tangerang', '081256667892');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `kode_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE ascii_bin DEFAULT NULL,
  `password` varchar(50) COLLATE ascii_bin DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `username`, `password`, `level`) VALUES
(1, 'rizki', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'dona', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'HRD', '81dc9bdb52d04dc20036dbd8313ed055', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
