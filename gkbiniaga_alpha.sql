-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2020 at 10:51 AM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gkbiniaga_alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` varchar(8) NOT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `nm_bagian` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id_bagian`, `id_unit`, `nm_bagian`) VALUES
('1010', 'renov', 'BID.TEHNIK'),
('11.1', 'nga', 'GALLERY'),
('110', 'ppi', 'PPI'),
('210', 'akun', 'AKUNTANSI'),
('310', 'per', 'PERSONALIA'),
('311', 'per', 'URT'),
('312', 'per', 'POLIKLINIK'),
('313', 'per', 'SATPAM'),
('314', 'per', 'SEKRETARIAT'),
('410', 'nga', 'NIAGA'),
('411', 'nga', 'GUDANG NIAGA'),
('510', 'weav', 'PREPARATION'),
('511', 'weav', 'GF'),
('512', 'weav', 'AJL'),
('513', 'weav', 'SHUTTLE'),
('610', 'fin', 'FINISHING'),
('710', 'utl', 'UTILITY'),
('711', 'utl', 'BENGKEL BESI'),
('711.1', 'utl', 'BENGKEL'),
('712', 'utl', 'BANGUNAN / AIR'),
('712.1', 'utl', 'BANGUNAN'),
('712.2', 'utl', 'AIR'),
('713', 'utl', 'BOLIER-MESIN-AC'),
('713.1', 'utl', 'BOILER'),
('713.2', 'utl', 'AC/COMPRESOR'),
('714', 'utl', 'LISTRIK'),
('910', 'renov', 'RENOVASI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_akutansi`
--

CREATE TABLE `tbl_barang_akutansi` (
  `id_jnsbrngakt` tinyint(9) NOT NULL,
  `no_jnsbrngakt` varchar(20) NOT NULL,
  `id_jnsbrng` varchar(15) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `no_rekening` tinyint(3) DEFAULT NULL,
  `nm_jnsbrngakt` varchar(50) DEFAULT NULL,
  `grpmesin_jnsbrngakt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_barang_akutansi`
--

INSERT INTO `tbl_barang_akutansi` (`id_jnsbrngakt`, `no_jnsbrngakt`, `id_jnsbrng`, `id_bagian`, `no_rekening`, `nm_jnsbrngakt`, `grpmesin_jnsbrngakt`) VALUES
(1, 'A', '1', '711.1', 3, 'Palu Besar', '6'),
(2, 'A.I', '2', '310', 1, 'Alkaline A3', '2'),
(3, 'NH', '1', '610', 1, 'Natrium Hipoklorit', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_brngkel` varchar(11) NOT NULL,
  `tgl_brngkel` date DEFAULT NULL,
  `jumlah_brngkel` decimal(4,2) DEFAULT NULL,
  `tothrg_brngkel` decimal(15,2) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_barang_keluar`
--

INSERT INTO `tbl_barang_keluar` (`id_brngkel`, `tgl_brngkel`, `jumlah_brngkel`, `tothrg_brngkel`, `id_bagian`) VALUES
('BK200800001', '2020-08-25', '12.00', '13000.00', 'loom 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_masuk`
--

CREATE TABLE `tbl_barang_masuk` (
  `id_brngmsk` varchar(15) NOT NULL,
  `tgl_brngmsk` date DEFAULT NULL,
  `stok_brngmsk` int(15) DEFAULT NULL,
  `tothrg_brngmasuk` decimal(15,2) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_barang_masuk`
--

INSERT INTO `tbl_barang_masuk` (`id_brngmsk`, `tgl_brngmsk`, `stok_brngmsk`, `tothrg_brngmasuk`, `id_bagian`) VALUES
('m1', '2020-02-13', 10, '10000.00', '510'),
('m2', '2020-02-21', 4, '6000.00', '510'),
('m3', '2020-02-21', 7, '14000.00', '510');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id_company` varchar(5) NOT NULL,
  `id_provinsi` tinyint(3) DEFAULT NULL,
  `id_kabupaten` tinyint(3) DEFAULT NULL,
  `id_pejabat` varchar(10) DEFAULT NULL,
  `nm_company` varchar(50) DEFAULT NULL,
  `almt_company` text,
  `telp_company` varchar(20) DEFAULT NULL,
  `fax_company` varchar(20) DEFAULT NULL,
  `email_company` varchar(30) DEFAULT NULL,
  `npwp_company` varchar(20) DEFAULT NULL,
  `noseri_company` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id_company`, `id_provinsi`, `id_kabupaten`, `id_pejabat`, `nm_company`, `almt_company`, `telp_company`, `fax_company`, `email_company`, `npwp_company`, `noseri_company`) VALUES
('GKBI', 1, 1, 'niagagkbi', 'Koperasi GKBI', 'Medari - Sleman - Yogyakarta', '(0274)868312, 868513', '-', 'pc.gkbi@gmail.com', '01.002.666.4.542.001', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_barang_keluar`
--

CREATE TABLE `tbl_dtl_barang_keluar` (
  `id_dtlbrngkel` int(11) NOT NULL,
  `id_stok` int(11) DEFAULT NULL,
  `id_brngkel` varchar(11) DEFAULT NULL,
  `tgl_brngkel` date DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `stok_brngkel` decimal(4,2) DEFAULT NULL,
  `harga_dtlbrngkel` decimal(15,2) DEFAULT NULL,
  `subhrg_dtlbrngkel` decimal(15,2) DEFAULT NULL,
  `id_brngmsk` varchar(15) DEFAULT NULL,
  `tgl_brngmsk` date DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_barang_keluar`
--

INSERT INTO `tbl_dtl_barang_keluar` (`id_dtlbrngkel`, `id_stok`, `id_brngkel`, `tgl_brngkel`, `id_barang`, `stok_brngkel`, `harga_dtlbrngkel`, `subhrg_dtlbrngkel`, `id_brngmsk`, `tgl_brngmsk`, `id_bagian`) VALUES
(29, 1, 'BK200800001', '2020-08-25', 'A', '10.00', '1000.00', '10000.00', 'm1', '2020-02-13', 'loom 2'),
(30, 2, 'BK200800001', '2020-08-25', 'A', '2.00', '1500.00', '3000.00', 'm2', '2020-02-21', 'loom 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_mikeluar`
--

CREATE TABLE `tbl_dtl_mikeluar` (
  `id_dtlmikeluar` int(11) NOT NULL,
  `id_mikeluar` varchar(15) DEFAULT NULL,
  `nota_mikeluar` varchar(50) NOT NULL,
  `tgl_mikeluar` date DEFAULT NULL,
  `id_supplier` varchar(15) DEFAULT NULL,
  `selesai_dtlmikeluar` enum('Y','T') DEFAULT NULL,
  `id_pengecekan` varchar(15) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `jml_dtlmikeluar` int(11) DEFAULT NULL,
  `satuan_dtlmikeluar` varchar(20) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `ket_dtlmikeluar` text,
  `tglmsk_dtlmikeluar` date DEFAULT NULL,
  `ketmsk_dtlmikeluar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_mutasi`
--

CREATE TABLE `tbl_dtl_mutasi` (
  `id_dtlmutasi` int(11) NOT NULL,
  `tgl_dtlmutasi` date NOT NULL,
  `id_mutasi` varchar(12) NOT NULL,
  `id_barang` tinyint(9) NOT NULL,
  `nota_dtlmutasi` varchar(20) NOT NULL,
  `jml1_dtlmutasi` decimal(11,2) NOT NULL,
  `jml2_dtlmutasi` decimal(11,2) NOT NULL,
  `sat1_dtlmutasi` varchar(20) NOT NULL,
  `sat2_dtlmutasi` varchar(20) NOT NULL,
  `id_kdtransaksi` int(2) NOT NULL,
  `terima1_dtlmutasi` decimal(11,2) NOT NULL,
  `terima2_dtlmutasi` decimal(11,2) NOT NULL,
  `keluar1_dtlmutasi` decimal(11,2) NOT NULL,
  `keluar2_dtlmutasi` decimal(11,2) NOT NULL,
  `saldo1_dtlmutasi` decimal(11,2) NOT NULL,
  `saldo2_dtlmutasi` decimal(11,2) NOT NULL,
  `id_bagian` varchar(8) NOT NULL,
  `ket_dtlmutasi` text NOT NULL,
  `tglinput_dtlmutasi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hapus` enum('Y','T') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_mutasi`
--

INSERT INTO `tbl_dtl_mutasi` (`id_dtlmutasi`, `tgl_dtlmutasi`, `id_mutasi`, `id_barang`, `nota_dtlmutasi`, `jml1_dtlmutasi`, `jml2_dtlmutasi`, `sat1_dtlmutasi`, `sat2_dtlmutasi`, `id_kdtransaksi`, `terima1_dtlmutasi`, `terima2_dtlmutasi`, `keluar1_dtlmutasi`, `keluar2_dtlmutasi`, `saldo1_dtlmutasi`, `saldo2_dtlmutasi`, `id_bagian`, `ket_dtlmutasi`, `tglinput_dtlmutasi`, `hapus`) VALUES
(1, '2020-10-21', 'MT201000001', 3, '0001/BON/X/2020', '200.00', '200.00', '10', '10', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '610', 'OKE SHIAP', '2020-10-21 13:43:08', 'T'),
(2, '2020-10-22', 'MT201000002', 2, '0002/BON/X/2020', '101.00', '100.00', '4', '4', 2, '0.00', '0.00', '20.00', '0.00', '0.00', '0.00', '310', 'OKE', '2020-10-22 09:03:11', 'T'),
(3, '2020-10-22', 'MT201000002', 1, '0002/BON/X/2020', '50.00', '20.00', '11', '8', 2, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '711.1', 'SIAP', '2020-10-22 09:03:11', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_pembelian`
--

CREATE TABLE `tbl_dtl_pembelian` (
  `id_dtl_pembelian` int(11) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `id_dtl_permintaan` int(11) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `nota_dtl_beli` varchar(50) DEFAULT NULL,
  `jml_dtl_minta` int(11) NOT NULL,
  `ppn_dtl_beli` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_dtl_beli` decimal(15,2) NOT NULL DEFAULT '0.00',
  `totalhrg_dtl_beli` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tgl_renc_beli` date DEFAULT NULL,
  `jml_renc_beli` int(11) DEFAULT NULL,
  `hrg_renc_beli` decimal(15,2) NOT NULL,
  `jml_real_bel` int(11) DEFAULT NULL,
  `hrg_real_beli` decimal(15,2) NOT NULL,
  `lunas_dtl_beli` enum('Y','T') DEFAULT 'T',
  `ket_dtl_beli` text NOT NULL,
  `langsung_beli` enum('Y','T') NOT NULL DEFAULT 'T',
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_pembelian`
--

INSERT INTO `tbl_dtl_pembelian` (`id_dtl_pembelian`, `id_pembelian`, `id_dtl_permintaan`, `id_barang`, `nota_dtl_beli`, `jml_dtl_minta`, `ppn_dtl_beli`, `total_dtl_beli`, `totalhrg_dtl_beli`, `tgl_renc_beli`, `jml_renc_beli`, `hrg_renc_beli`, `jml_real_bel`, `hrg_real_beli`, `lunas_dtl_beli`, `ket_dtl_beli`, `langsung_beli`, `id_user`) VALUES
(1, 'PB20090001', 1, 'A', '0001/PEMB/XI/2020', 10, '0.00', '0.00', '0.00', '2020-09-25', 200, '5000.00', NULL, '0.00', 'T', 'siap', 'T', NULL),
(2, 'PB20090001', 2, 'NH', '0001/PEMB/XI/2020', 20, '45000.00', '450000.00', '495000.00', '2020-09-25', 300, '1500.00', NULL, '0.00', 'T', 'pke', 'T', NULL),
(3, 'PB20090002', 8, 'A.I', '0002/PEMB/IX/2020', 20, '180000.00', '1800000.00', '1980000.00', '2020-09-24', 900, '2000.00', NULL, '0.00', 'T', 'iya', 'T', NULL),
(4, 'PB20090002', 9, 'NH', '0002/PEMB/IX/2020', 25, '30000.00', '300000.00', '330000.00', '2020-09-24', 200, '1500.00', NULL, '0.00', 'T', 'iya2', 'T', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_penerimaan`
--

CREATE TABLE `tbl_dtl_penerimaan` (
  `id_dtl_penerimaan` int(11) NOT NULL,
  `id_penerimaan` varchar(12) DEFAULT NULL,
  `nota_dtlterima` varchar(50) NOT NULL,
  `tgl_dtlterima` date DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `jml1_dtlterima` decimal(11,2) DEFAULT '0.00',
  `jml2_dtlterima` decimal(11,2) DEFAULT '0.00',
  `sat1_dtlterima` tinyint(3) DEFAULT NULL,
  `sat2_dtlterima` tinyint(3) DEFAULT NULL,
  `angkut_dtlterima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `harga_dtlterima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `ppn_dtlterima` decimal(15,2) DEFAULT NULL,
  `subtotal_dtlterima` decimal(15,2) DEFAULT NULL,
  `totalharga_dtlterima` decimal(15,2) DEFAULT NULL,
  `k_ppn_dtlterima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `k_subtotal_dtlterima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `k_totalharga_dtlterima` decimal(15,2) NOT NULL DEFAULT '0.00',
  `id_dtl_pembelian` int(11) DEFAULT NULL,
  `nota_dtl_beli` varchar(50) DEFAULT NULL,
  `lunas_dtlterima` enum('Y','T') DEFAULT 'T',
  `id_group` tinyint(3) DEFAULT NULL,
  `id_jnsbrngakt` tinyint(9) DEFAULT NULL,
  `input_dtlterima` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `kdpajak_dtlterima` varchar(20) DEFAULT NULL,
  `pajak_dtlterima` enum('Y','T') DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_penerimaan`
--

INSERT INTO `tbl_dtl_penerimaan` (`id_dtl_penerimaan`, `id_penerimaan`, `nota_dtlterima`, `tgl_dtlterima`, `id_barang`, `jml1_dtlterima`, `jml2_dtlterima`, `sat1_dtlterima`, `sat2_dtlterima`, `angkut_dtlterima`, `harga_dtlterima`, `ppn_dtlterima`, `subtotal_dtlterima`, `totalharga_dtlterima`, `k_ppn_dtlterima`, `k_subtotal_dtlterima`, `k_totalharga_dtlterima`, `id_dtl_pembelian`, `nota_dtl_beli`, `lunas_dtlterima`, `id_group`, `id_jnsbrngakt`, `input_dtlterima`, `kdpajak_dtlterima`, `pajak_dtlterima`) VALUES
(1, 'TR20090001', '0001/TERIMA/IX/2020', '2020-09-25', 'A', '200.00', '250.00', 6, 6, '500.00', '5000.00', '100000.00', '1000000.00', '1100000.00', '0.00', '0.00', '0.00', 1, NULL, 'T', 2, 1, '2020-09-25 15:09:12', NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_pengetesan`
--

CREATE TABLE `tbl_dtl_pengetesan` (
  `id_dtl_cek` int(11) NOT NULL,
  `id_cek` varchar(12) NOT NULL,
  `nota_dtl_cek` varchar(50) NOT NULL,
  `tgl_dtl_cek` date NOT NULL,
  `id_penerimaan` varchar(15) NOT NULL,
  `id_dtl_pembelian` int(11) NOT NULL,
  `nota_dtl_beli` varchar(50) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `jml_cek1` decimal(11,2) NOT NULL DEFAULT '0.00',
  `jml_cek2` decimal(11,2) NOT NULL DEFAULT '0.00',
  `ket_dtl_cek` text NOT NULL,
  `lulus_dtl_cek` enum('T','Y') NOT NULL,
  `tgl_dtl_lunas` date DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL,
  `hapus` enum('Y','T') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_pengetesan`
--

INSERT INTO `tbl_dtl_pengetesan` (`id_dtl_cek`, `id_cek`, `nota_dtl_cek`, `tgl_dtl_cek`, `id_penerimaan`, `id_dtl_pembelian`, `nota_dtl_beli`, `id_barang`, `jml_cek1`, `jml_cek2`, `ket_dtl_cek`, `lulus_dtl_cek`, `tgl_dtl_lunas`, `id_user`, `hapus`) VALUES
(1, 'CK201000002', '0002/CEK/X/2020', '2020-10-03', '', 3, '0002/PEMB/IX/2020', 'A.I', '900.50', '900.00', 'iya', '', '0000-00-00', NULL, 'T'),
(2, 'CK201000002', '0002/CEK/X/2020', '2020-10-03', '', 4, '0002/PEMB/IX/2020', 'NH', '200.00', '200.00', 'iya2', '', '0000-00-00', NULL, 'T'),
(3, 'CK201000003', '0001/CEK/x/2020', '2020-10-06', '', 1, '0001/PEMB/XI/2020', 'A', '200.00', '200.00', 'siap', '', '0000-00-00', NULL, 'T'),
(4, 'CK201000003', '0001/CEK/x/2020', '2020-10-06', '', 2, '0001/PEMB/XI/2020', 'NH', '300.00', '300.00', 'pke', '', '0000-00-00', NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_permintaan`
--

CREATE TABLE `tbl_dtl_permintaan` (
  `id_dtl_permintaan` int(11) NOT NULL,
  `id_permintaan` varchar(10) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `id_brngmsk` varchar(15) DEFAULT NULL,
  `id_pembelian` varchar(15) DEFAULT NULL,
  `nota_dtl_minta` varchar(50) DEFAULT NULL,
  `tgl_dtl_perlu` date DEFAULT NULL,
  `jml_dtl_minta` int(11) DEFAULT NULL,
  `stkunit_dtl_minta` int(11) NOT NULL DEFAULT '0',
  `stkgdng_dtl_minta` int(11) NOT NULL DEFAULT '0',
  `tglreal_minta` date DEFAULT NULL,
  `jmlreal_minta` int(11) DEFAULT NULL,
  `hrgreal_minta` decimal(15,2) DEFAULT NULL,
  `sisabeli_minta` int(11) DEFAULT NULL,
  `lsng_minta` int(11) DEFAULT NULL,
  `ket_dtl_minta` text,
  `selesai_dtl_minta` enum('Y','A','P','T','DT','M') DEFAULT 'T',
  `nosrh_minta` varchar(20) DEFAULT NULL,
  `tglsrh_minta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_permintaan`
--

INSERT INTO `tbl_dtl_permintaan` (`id_dtl_permintaan`, `id_permintaan`, `id_barang`, `id_brngmsk`, `id_pembelian`, `nota_dtl_minta`, `tgl_dtl_perlu`, `jml_dtl_minta`, `stkunit_dtl_minta`, `stkgdng_dtl_minta`, `tglreal_minta`, `jmlreal_minta`, `hrgreal_minta`, `sisabeli_minta`, `lsng_minta`, `ket_dtl_minta`, `selesai_dtl_minta`, `nosrh_minta`, `tglsrh_minta`) VALUES
(1, 'PR20010001', 'A', NULL, NULL, '0001/weav/I/01/2020', '2020-01-17', 10, 0, 0, NULL, NULL, NULL, NULL, NULL, 'habis', 'A', NULL, NULL),
(2, 'PR20010001', 'NH', NULL, NULL, '0001/weav/I/01/2020', '2020-01-18', 20, 0, 0, NULL, NULL, NULL, NULL, NULL, 'stok terbatas', 'P', NULL, NULL),
(3, 'PR20010002', 'A', NULL, NULL, '0002/weav/I/01/2020', '2020-01-17', 20, 0, 0, NULL, NULL, NULL, NULL, NULL, 'Pembelian langsung', 'T', NULL, NULL),
(4, 'PR20010002', 'NH', NULL, NULL, '0002/weav/I/01/2020', '2020-01-17', 30, 0, 0, NULL, NULL, NULL, NULL, NULL, 'Pembelian Langsung', 'T', NULL, NULL),
(5, 'PR20010003', 'NH', NULL, NULL, '0003/weav/I/01/2020', '2020-01-19', 30, 0, 0, NULL, NULL, NULL, NULL, NULL, 'tinggal sedikit', 'M', NULL, NULL),
(8, 'PR20020001', 'A.I', NULL, NULL, '0005/weav/II/2020', '2020-02-04', 20, 0, 0, NULL, NULL, NULL, NULL, NULL, 'sd', 'A', NULL, NULL),
(9, 'PR20020001', 'NH', NULL, NULL, '0005/weav/II/2020', '2020-02-05', 25, 0, 0, NULL, NULL, NULL, NULL, NULL, 'hg', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_spb`
--

CREATE TABLE `tbl_dtl_spb` (
  `id_dtl_spb` int(11) NOT NULL,
  `id_spb` varchar(12) NOT NULL,
  `nota_dtl_spb` varchar(50) NOT NULL,
  `tgl_dtl_spb` date NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `jmlbrng_spb` int(11) NOT NULL,
  `satuanbrng_spb` varchar(20) NOT NULL,
  `hargabrng_spb` decimal(15,2) NOT NULL,
  `dtltotal_spb` decimal(15,2) NOT NULL,
  `dtlppn_spb` decimal(15,2) NOT NULL,
  `dtltotalhrg_spb` decimal(15,2) NOT NULL,
  `kurs_dtl_spb` enum('CHF','EUR','GBP','RP','US','YEN') NOT NULL,
  `id_dtl_pembelian` int(11) NOT NULL,
  `nota_beli` varchar(50) NOT NULL,
  `selesai_dtl_spb` enum('T','Y') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_spb`
--

INSERT INTO `tbl_dtl_spb` (`id_dtl_spb`, `id_spb`, `nota_dtl_spb`, `tgl_dtl_spb`, `id_barang`, `jmlbrng_spb`, `satuanbrng_spb`, `hargabrng_spb`, `dtltotal_spb`, `dtlppn_spb`, `dtltotalhrg_spb`, `kurs_dtl_spb`, `id_dtl_pembelian`, `nota_beli`, `selesai_dtl_spb`) VALUES
(1, 'SPB20090001', '0001/SPB/IX/2020', '2020-09-25', 'A', 200, 'BIJI', '5000.00', '1000000.00', '100000.00', '1100000.00', 'RP', 1, '0001/PEMB/XI/2020', 'T'),
(2, 'SPB20090001', '0001/SPB/IX/2020', '2020-09-25', 'NH', 300, 'BTL', '1500.00', '450000.00', '45000.00', '495000.00', 'RP', 2, '0001/PEMB/XI/2020', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id_group` tinyint(3) NOT NULL,
  `nm_group` varchar(30) NOT NULL,
  `rek_group` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id_group`, `nm_group`, `rek_group`) VALUES
(1, 'BBM-PLMS', 'LAIN-LAIN'),
(2, 'BENANG', 'BENANG'),
(3, 'BHN-PNLNG', 'BHN-PENOLONG/EMBALAG'),
(4, 'BRG-LAIN', 'LAIN-LAIN'),
(5, 'EXPANSI', 'LAIN-LAIN'),
(6, 'JASA-SP', 'LAIN-LAIN'),
(7, 'MESIN', 'LAIN-LAIN'),
(8, 'SPART', 'LAIN-LAIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_mesin`
--

CREATE TABLE `tbl_group_mesin` (
  `id_grpmesin` int(11) NOT NULL,
  `nm_grpmesin` varchar(100) NOT NULL,
  `hapus_grpmesin` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_group_mesin`
--

INSERT INTO `tbl_group_mesin` (`id_grpmesin`, `nm_grpmesin`, `hapus_grpmesin`) VALUES
(1, 'ADKU', 'N'),
(2, 'ADMINISTRASI', 'N'),
(3, 'AIR', 'N'),
(4, 'AJL', 'N'),
(5, 'SHUTTLE', 'N'),
(6, 'UTILITY', 'N'),
(7, 'WEAVING', 'N'),
(8, 'URT', 'N'),
(9, 'SATPAM', 'N'),
(10, 'FINISHING', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id_hakakses` tinyint(5) DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL,
  `id_menu` tinyint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_barang`
--

CREATE TABLE `tbl_jenis_barang` (
  `id_jnsbrng` tinyint(3) NOT NULL,
  `nm_jnsbrng` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_jenis_barang`
--

INSERT INTO `tbl_jenis_barang` (`id_jnsbrng`, `nm_jnsbrng`) VALUES
(1, 'BAHAN PENOLONG'),
(2, 'BARANG LAIN-2'),
(3, 'BBM-PELUMAS'),
(4, 'BENANG'),
(5, 'BENANG SWO'),
(6, 'BENANG WO'),
(7, 'EXPANSI'),
(8, 'JASA-SPAREPART'),
(9, 'MESIN-MESIN'),
(10, 'RENOVASI BOILER'),
(11, 'RENOVASI FINISHING'),
(12, 'SPARE-PART');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kabupaten`
--

CREATE TABLE `tbl_kabupaten` (
  `id_kabupaten` tinyint(3) NOT NULL,
  `id_provinsi` tinyint(3) DEFAULT NULL,
  `nm_kabupaten` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kabupaten`
--

INSERT INTO `tbl_kabupaten` (`id_kabupaten`, `id_provinsi`, `nm_kabupaten`) VALUES
(1, 1, 'Sleman'),
(2, 1, 'Kulon Progo'),
(3, 1, 'Gunung Kidul'),
(4, 1, 'Bantul'),
(5, 1, 'Kota Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kdtransaksi`
--

CREATE TABLE `tbl_kdtransaksi` (
  `id_kdtransaksi` varchar(2) NOT NULL,
  `nm_kdtransaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kdtransaksi`
--

INSERT INTO `tbl_kdtransaksi` (`id_kdtransaksi`, `nm_kdtransaksi`) VALUES
('1', 'PENERIMAAN BARANG'),
('2', 'PEMAKAIAN BON'),
('3', 'PENYESUAIAN STOCK [+]'),
('4', 'PENYESUAIAN STOCK [-]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` tinyint(5) DEFAULT NULL,
  `title_menu` varchar(30) DEFAULT NULL,
  `url_menu` varchar(50) DEFAULT NULL,
  `aktif_menu` enum('Y','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_metode_bayar`
--

CREATE TABLE `tbl_metode_bayar` (
  `id_metbyr` tinyint(2) NOT NULL,
  `nm_metbyr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_metode_bayar`
--

INSERT INTO `tbl_metode_bayar` (`id_metbyr`, `nm_metbyr`) VALUES
(2, 'Cash'),
(3, 'Credit'),
(4, 'Barter');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mikeluar`
--

CREATE TABLE `tbl_mikeluar` (
  `id_mikeluar` varchar(15) NOT NULL,
  `tgl_mikeluar` date DEFAULT NULL,
  `nota_mikeluar` varchar(20) DEFAULT NULL,
  `id_supplier` varchar(15) DEFAULT NULL,
  `id_cek` varchar(15) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `ket_mikeluar` text,
  `tglmsk_mikeluar` date DEFAULT NULL,
  `ketmsk_mikeluar` text,
  `selesai_mikeluar` enum('Y','T') DEFAULT NULL,
  `hal_mikeluar` text,
  `lain2_mikeluar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mutasi`
--

CREATE TABLE `tbl_mutasi` (
  `id_mutasi` varchar(12) NOT NULL,
  `nota_mutasi` varchar(20) NOT NULL,
  `tgl_mutasi` date NOT NULL,
  `id_unit` varchar(8) NOT NULL,
  `id_bagian` varchar(8) NOT NULL,
  `hapus` enum('Y','T') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mutasi`
--

INSERT INTO `tbl_mutasi` (`id_mutasi`, `nota_mutasi`, `tgl_mutasi`, `id_unit`, `id_bagian`, `hapus`) VALUES
('MT201000001', '0001/BON/X/2020', '2020-10-21', 'fin', '610', 'T'),
('MT201000002', '0002/BON/X/2020', '2020-10-22', 'per', '310', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nama_barang`
--

CREATE TABLE `tbl_nama_barang` (
  `id_barang` varchar(20) NOT NULL,
  `id_jnsbrng` varchar(15) DEFAULT NULL,
  `id_jnsbrngakt` varchar(15) DEFAULT NULL,
  `id_group` tinyint(3) DEFAULT NULL,
  `nm_barang` varchar(80) DEFAULT NULL,
  `kel_barang` varchar(10) DEFAULT NULL,
  `ket_barang` varchar(100) DEFAULT NULL,
  `no_barang` varchar(5) DEFAULT NULL,
  `sat1_barang` varchar(20) DEFAULT NULL,
  `sat2_barang` varchar(20) DEFAULT NULL,
  `ppn_barang` decimal(15,2) DEFAULT '0.00',
  `harga_barang` decimal(15,2) DEFAULT '0.00',
  `updated_barang` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nama_barang`
--

INSERT INTO `tbl_nama_barang` (`id_barang`, `id_jnsbrng`, `id_jnsbrngakt`, `id_group`, `nm_barang`, `kel_barang`, `ket_barang`, `no_barang`, `sat1_barang`, `sat2_barang`, `ppn_barang`, `harga_barang`, `updated_barang`) VALUES
('A', '2', '1', 2, 'Palu Besar', 'weav', 'weaving', 'a1', '6', '6', '1000.00', '10000.00', '2020-10-28 00:00:00'),
('A.I', '2', '2', 4, 'Alkaline A3', 'person', 'PERSONALIA', 'A1', '4', '4', '200.00', '2000.00', '2020-10-28 00:00:00'),
('NH', '1', '3', 3, 'Natrium Hipoklorit', 'weav', 'Bahan Campuran Pemutih', 'a2', '10', '10', '150.00', '1500.00', '2020-10-28 09:23:52'),
('sas', '3', '1', 1, 'Barang 2', 'GF', 'dsfe', 's3', '15', '15', '500.00', '5000.00', '2020-10-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pejabat`
--

CREATE TABLE `tbl_pejabat` (
  `id_pejabat` varchar(10) NOT NULL,
  `nm_pejabat1` varchar(50) NOT NULL,
  `posisi_pejabat1` varchar(30) NOT NULL,
  `nm_pejabat2` varchar(50) NOT NULL,
  `posisi_pejabat2` varchar(30) NOT NULL,
  `nm_pejabat3` varchar(50) NOT NULL,
  `posisi_pejabat3` varchar(30) NOT NULL,
  `nm_pejabat4` varchar(50) NOT NULL,
  `posisi_pejabat4` varchar(30) NOT NULL,
  `nm_pejabat5` varchar(50) NOT NULL,
  `posisi_pejabat5` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pejabat`
--

INSERT INTO `tbl_pejabat` (`id_pejabat`, `nm_pejabat1`, `posisi_pejabat1`, `nm_pejabat2`, `posisi_pejabat2`, `nm_pejabat3`, `posisi_pejabat3`, `nm_pejabat4`, `posisi_pejabat4`, `nm_pejabat5`, `posisi_pejabat5`) VALUES
('niagagkbi', 'Gigih Wahyudi', 'Deputy Direktur Bid Keuangan', 'Rita Akmala Hapsari', 'Kepala Unit Niaga', 'M. Tri Budi Wirawan', 'Kepala Unit Akuntansi', 'Elvi kusumawati BU.', 'Ka. Sie. Pembelian', 'Musabih Zikrina B', 'Ka. Sie. Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_permintaan` varchar(10) DEFAULT NULL,
  `id_bagian` varchar(8) NOT NULL,
  `id_unit` varchar(8) NOT NULL,
  `nota_beli` varchar(50) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `ppn_beli` decimal(15,2) NOT NULL,
  `total_beli` decimal(15,2) NOT NULL,
  `totalhrg_beli` decimal(15,2) NOT NULL,
  `selesai_beli` enum('Y','T') NOT NULL DEFAULT 'T',
  `ket_beli` text NOT NULL,
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_permintaan`, `id_bagian`, `id_unit`, `nota_beli`, `tgl_beli`, `ppn_beli`, `total_beli`, `totalhrg_beli`, `selesai_beli`, `ket_beli`, `id_user`) VALUES
('PB20090001', 'PR20010003', '513', 'weav', '0001/PEMB/XI/2020', '2020-09-25', '45000.00', '450000.00', '495000.00', 'T', 'barang segera diproses', NULL),
('PB20090002', 'PR20020001', '513', 'weav', '0002/PEMB/IX/2020', '2020-09-24', '210000.00', '2100000.00', '2310000.00', 'T', 'barang segera diproses segera', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerimaan`
--

CREATE TABLE `tbl_penerimaan` (
  `id_penerimaan` varchar(12) NOT NULL,
  `id_pembelian` varchar(15) DEFAULT NULL,
  `id_supplier` varchar(15) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `nota_terima` varchar(50) DEFAULT NULL,
  `ppn_terima` decimal(15,2) DEFAULT NULL,
  `subtotal_terima` decimal(15,2) DEFAULT NULL,
  `totalharga_terima` decimal(15,2) DEFAULT NULL,
  `k_ppn_terima` decimal(15,2) DEFAULT '0.00',
  `k_subtotal_terima` decimal(15,2) DEFAULT '0.00',
  `k_totalharga_terima` decimal(15,2) DEFAULT '0.00',
  `biaya_angkut_terima` decimal(15,2) DEFAULT '0.00',
  `jml_kurs_terima` decimal(15,2) DEFAULT '0.00',
  `nota_beli` varchar(50) DEFAULT NULL,
  `srtjalan_terima` varchar(30) DEFAULT NULL,
  `tgljalan_terima` date DEFAULT NULL,
  `id_spb` varchar(12) DEFAULT NULL,
  `nota_spb` varchar(50) DEFAULT NULL,
  `ket_terima` text,
  `id_cek` varchar(12) DEFAULT NULL,
  `nota_cek` varchar(50) DEFAULT NULL,
  `tgl_cek` date DEFAULT NULL,
  `kurs_terima` enum('CHF','EUR','GBP','RP','US','YEN') DEFAULT NULL,
  `verif_terima` enum('Y','T') DEFAULT 'T',
  `tglverif_terima` date DEFAULT NULL,
  `lunas_terima` enum('Y','T') DEFAULT 'T',
  `id_jnsbrng` tinyint(3) DEFAULT NULL,
  `harijt_terima` tinyint(3) DEFAULT '0',
  `tgljt_terima` date DEFAULT '0000-00-00',
  `fakturpjk_terima` varchar(20) DEFAULT NULL,
  `tglfaktur_terima` date DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_penerimaan`
--

INSERT INTO `tbl_penerimaan` (`id_penerimaan`, `id_pembelian`, `id_supplier`, `id_bagian`, `id_unit`, `tgl_terima`, `nota_terima`, `ppn_terima`, `subtotal_terima`, `totalharga_terima`, `k_ppn_terima`, `k_subtotal_terima`, `k_totalharga_terima`, `biaya_angkut_terima`, `jml_kurs_terima`, `nota_beli`, `srtjalan_terima`, `tgljalan_terima`, `id_spb`, `nota_spb`, `ket_terima`, `id_cek`, `nota_cek`, `tgl_cek`, `kurs_terima`, `verif_terima`, `tglverif_terima`, `lunas_terima`, `id_jnsbrng`, `harijt_terima`, `tgljt_terima`, `fakturpjk_terima`, `tglfaktur_terima`, `id_user`) VALUES
('TR20090001', 'PB20090002', 'AAB', '513', 'weav', '2020-09-25', '0001/TERIMA/IX/2020', '100000.00', '1000000.00', '1100500.00', '0.00', '0.00', '0.00', '500.00', '0.00', '0002/PEMB/IX/2020', '0005/JLN/PAIJO/IX/2020', '2020-09-25', '', '', 'siap bro', NULL, '0001/CEK/IX/2020', '2020-09-25', 'RP', 'Y', NULL, 'T', 1, 0, '2020-09-25', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengetesan`
--

CREATE TABLE `tbl_pengetesan` (
  `id_cek` varchar(12) NOT NULL,
  `nota_cek` varchar(50) NOT NULL,
  `tgl_cek` date NOT NULL,
  `id_pembelian` varchar(15) NOT NULL,
  `nota_beli` varchar(50) NOT NULL,
  `id_penerimaan` varchar(12) NOT NULL,
  `nota_terima` varchar(50) NOT NULL,
  `id_supplier` varchar(15) NOT NULL,
  `id_bagian` varchar(8) NOT NULL,
  `id_unit` varchar(8) NOT NULL,
  `srtjalan_cek` varchar(30) NOT NULL,
  `tgljalan_cek` date NOT NULL,
  `ket_cek` text,
  `selesai_cek` enum('T','Y') NOT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL,
  `hapus` enum('Y','T') NOT NULL DEFAULT 'T'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pengetesan`
--

INSERT INTO `tbl_pengetesan` (`id_cek`, `nota_cek`, `tgl_cek`, `id_pembelian`, `nota_beli`, `id_penerimaan`, `nota_terima`, `id_supplier`, `id_bagian`, `id_unit`, `srtjalan_cek`, `tgljalan_cek`, `ket_cek`, `selesai_cek`, `tgl_lunas`, `id_user`, `hapus`) VALUES
('CK201000002', '0002/CEK/X/2020', '2020-10-03', 'PB20090002 ', '0002/PEMB/IX/2020', '', '', 'A2', '513', 'weav', '0001/JLN/X/2020', '2020-10-01', 'oke dah', 'T', NULL, NULL, 'T'),
('CK201000003', '0001/CEK/x/2020', '2020-10-06', 'PB20090001 ', '0001/PEMB/XI/2020', '', '', 'AAB', '513', 'weav', '005/JLN/X/2020', '2020-10-02', 'okde dah', 'T', NULL, NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyerahan`
--

CREATE TABLE `tbl_penyerahan` (
  `id_penyerahan` varchar(15) NOT NULL,
  `id_pembelian` varchar(15) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `id_pengecekan` varchar(15) DEFAULT NULL,
  `nota_serah` varchar(50) DEFAULT NULL,
  `tgl_serah` date DEFAULT NULL,
  `jml_serah` int(11) DEFAULT NULL,
  `surat_jln_serah` varchar(20) DEFAULT NULL,
  `tgl_jln_serah` date DEFAULT NULL,
  `selesai_serah` enum('Y','T') DEFAULT NULL,
  `syarat_serah` enum('Frangko Gudang GKBI','Loco Gudang Penjual') DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `id_permintaan` varchar(10) NOT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `nota_minta` varchar(50) DEFAULT NULL,
  `tgl_minta` date DEFAULT NULL,
  `ket_minta` text,
  `selesai_minta` enum('Y','P','T') DEFAULT 'T',
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`id_permintaan`, `id_unit`, `id_bagian`, `nota_minta`, `tgl_minta`, `ket_minta`, `selesai_minta`, `id_user`) VALUES
('PR20010001', 'weav', '512', '0001/weav/I/01/2020', '2020-01-17', 'mendesak', 'T', 1),
('PR20010002', 'weav', '511', '0002/weav/I/01/2020', '2020-01-17', 'langsung', 'T', 1),
('PR20010003', 'weav', '513', '0003/weav/I/01/2020', '2020-01-19', 'stok bulanan ', 'P', 1),
('PR20020001', 'weav', '513', '0005/weav/II/2020', '2020-02-04', 'dd', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `id_provinsi` tinyint(3) NOT NULL,
  `nm_provinsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_provinsi`, `nm_provinsi`) VALUES
(1, 'D I Yogyakarta'),
(2, 'Jawa Tengah'),
(3, 'Jawa Timur'),
(4, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `no_rekening` tinyint(3) NOT NULL,
  `id_rekening` varchar(15) NOT NULL,
  `nm_rekening` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`no_rekening`, `id_rekening`, `nm_rekening`) VALUES
(1, '1 1 3 5 0 0', 'BAHAN PENOL U/ GDG UMUM'),
(2, '1 1 3 5 0 1', 'SPAREPART U / GDG UMUM'),
(3, '1 1 1 3 5 5', 'Bahan Umum / Lain-Lain');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` tinyint(3) NOT NULL,
  `nm_satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nm_satuan`) VALUES
(1, 'BALE'),
(2, 'BALL'),
(3, 'BDL'),
(4, 'BH'),
(5, 'BKS'),
(6, 'BIJI'),
(7, 'BLOK'),
(8, 'BOX'),
(9, 'BTG'),
(10, 'BTL'),
(11, 'BUAH'),
(12, 'CAN'),
(13, 'CC'),
(14, 'CM'),
(15, 'CNS'),
(16, 'CONES'),
(17, 'CONE'),
(18, 'CSN'),
(19, 'DOS'),
(20, 'DRGEN'),
(21, 'DRM'),
(22, 'DRUM'),
(23, 'DUS'),
(24, 'DZN'),
(25, 'FLES'),
(26, 'FLS'),
(27, 'GL'),
(28, 'GLG'),
(29, 'GLN'),
(30, 'GR'),
(31, 'GRM'),
(32, 'GROS'),
(33, 'GUL'),
(34, 'HARI'),
(35, 'IKAT'),
(36, 'JAR'),
(37, 'KG'),
(38, 'KIT'),
(39, 'KLG'),
(40, 'KODI'),
(41, 'KRG'),
(42, 'LBR'),
(43, 'LBS'),
(44, 'LITER'),
(45, 'LOT'),
(46, 'LTR'),
(47, 'M2'),
(48, 'M3'),
(49, 'METER'),
(50, 'ML'),
(51, 'MT2'),
(52, 'MTJ'),
(53, 'MTJN'),
(54, 'MTR'),
(55, 'MTR2'),
(56, 'MTR3'),
(57, 'MTRJ'),
(58, 'PACK'),
(59, 'ORANG'),
(60, 'PAIL'),
(61, 'PAK'),
(62, 'PCS'),
(63, 'PKT'),
(64, 'POT'),
(65, 'PSG'),
(66, 'PTG'),
(67, 'RIM'),
(68, 'RIT'),
(69, 'ROL'),
(70, 'ROLL'),
(71, 'SET'),
(72, 'SLOP'),
(73, 'STEL'),
(74, 'TAB'),
(75, 'TRUK'),
(76, 'TUBE'),
(77, 'UNIT'),
(78, 'YDS'),
(79, 'ZAK'),
(80, 'DAM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spb`
--

CREATE TABLE `tbl_spb` (
  `id_spb` varchar(12) NOT NULL,
  `nota_spb` varchar(50) NOT NULL,
  `tgl_spb` date NOT NULL,
  `id_supplier` varchar(15) NOT NULL,
  `total_spb` decimal(15,2) NOT NULL,
  `ppn_spb` decimal(15,2) NOT NULL,
  `totalharga_spb` decimal(15,2) NOT NULL,
  `kurs_spb` enum('CHF','EUR','GBP','RP','US','YEN') NOT NULL,
  `tgl_serahspb` date NOT NULL,
  `ket_serahspb` text NOT NULL,
  `haribayar_spb` int(3) NOT NULL DEFAULT '0',
  `ket_bayar` text NOT NULL,
  `ket_gudangspb` text NOT NULL,
  `ket_spb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_spb`
--

INSERT INTO `tbl_spb` (`id_spb`, `nota_spb`, `tgl_spb`, `id_supplier`, `total_spb`, `ppn_spb`, `totalharga_spb`, `kurs_spb`, `tgl_serahspb`, `ket_serahspb`, `haribayar_spb`, `ket_bayar`, `ket_gudangspb`, `ket_spb`) VALUES
('SPB20090001', '0001/SPB/IX/2020', '2020-09-25', 'A2', '1450000.00', '145000.00', '1595000.00', 'RP', '2020-09-11', 'Barang sampai di gudang kami', 45, 'setelah barang diterima dan diperiksa dengan baik', 'Franko gudang Koperasi GKBI', '1.Kualitas barang tersebut diatas sesuai dengan standart kualitas Koperasi GKBI - Yogyakarta.\r\n2.Dokumen pendukung harap segera dilengkapi/dikirim maksimal 7 (tujuh) hari setelah barang\r\n   kami terima karena hal itu sebagai syarat pengajuan pembayaran.\r\n3.Setelah Surat Pesanan Barang ini ditandatangani oleh penjual harus dikirim atau di fax\r\n   balik ke Koperasi GKBI.\r\n4Semua pemberitahuan mengenai dan atau sehubungan dengan Surat Pesanan Barang ini,\r\n   dilakukan secara tertulis kepada alamat kedua belah pihak.\r\n5.Barang dikirim ke Gudang Koperasi GKBI - Yogyakarta.\r\n6.Barang yang kami terima adalah Ex. PT PUJI LESTARI - SOLO\r\n7.Tanggal penyerahan adalah estimasi kedatangan barang sampai di gudang kami.\r\n8.PO ini berlaku sampai dengan 30 Januari 2020 diatas tanggal tersebut PO kami anggap\r\n   batal.\r\n9.Jika barang yang kami pesan kedatangannya melebihi batas waktu tersebut di atas, diharap\r\n   mengkomunikasikan secara tertulis dengan pemesan.\r\n									');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok_barang`
--

CREATE TABLE `tbl_stok_barang` (
  `id_stok` int(11) NOT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `id_brngmsk` varchar(15) DEFAULT NULL,
  `tgl_brngmsk` date DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `stok_keluar` int(11) DEFAULT NULL,
  `hrg_stok` decimal(10,2) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stok_barang`
--

INSERT INTO `tbl_stok_barang` (`id_stok`, `id_barang`, `id_brngmsk`, `tgl_brngmsk`, `stok_masuk`, `stok_keluar`, `hrg_stok`, `id_bagian`) VALUES
(1, 'A', 'm1', '2020-02-13', 0, 10, '1000.00', '510'),
(2, 'A', 'm2', '2020-02-21', 2, 2, '1500.00', '510'),
(3, 'NH', 'm3', '2020-02-21', 7, 0, '2000.00', '510');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `nm_supplier` varchar(80) DEFAULT NULL,
  `notelp_supplier` varchar(20) DEFAULT NULL,
  `fax_supplier` varchar(20) DEFAULT NULL,
  `id_provinsi` tinyint(3) DEFAULT '0',
  `id_kabupaten` tinyint(3) DEFAULT '0',
  `almt_supplier` text,
  `email_supplier` varchar(30) DEFAULT NULL,
  `attn_supplier` varchar(50) DEFAULT NULL,
  `npwp_supplier` text,
  `status_supplier` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nm_supplier`, `notelp_supplier`, `fax_supplier`, `id_provinsi`, `id_kabupaten`, `almt_supplier`, `email_supplier`, `attn_supplier`, `npwp_supplier`, `status_supplier`) VALUES
('A2', 'CV BAJA MULIA', '0274885996', '558669', 1, 1, 'Jl. Magelang km 14 Medari, Sleman, Yogykarta', 'bajamulia@gmail.com', 'ibu ani', '00.26.2548635', '1'),
('AAB', 'PT Paijo', '0274 889 665 223', '0274 889', 1, 1, 'Jl. kenari No 12 Halinung, Sosoko, Yogyakarta', 'paijo@email.com', 'Bpk. Paijo', '01.556.889.8-9', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id_unit` varchar(8) NOT NULL,
  `nm_unit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nm_unit`) VALUES
('akun', 'AKUNTANSI'),
('ex', 'EXPANSI'),
('fin', 'FINISHING'),
('gal', 'GALLERY'),
('nga', 'NIAGA'),
('per', 'PERSONALIA'),
('ppi', 'PPI'),
('renov', 'RENOVASI'),
('utl', 'UTILITY'),
('weav', 'WEAVING');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) DEFAULT NULL,
  `nm_user` varchar(30) DEFAULT NULL,
  `pass_user` varchar(30) DEFAULT NULL,
  `fullname_user` varchar(50) DEFAULT NULL,
  `role_user` varchar(15) DEFAULT NULL,
  `aktif_user` enum('Y','T') DEFAULT NULL,
  `create_user` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tbl_barang_akutansi`
--
ALTER TABLE `tbl_barang_akutansi`
  ADD PRIMARY KEY (`id_jnsbrngakt`);

--
-- Indexes for table `tbl_barang_keluar`
--
ALTER TABLE `tbl_barang_keluar`
  ADD PRIMARY KEY (`id_brngkel`);

--
-- Indexes for table `tbl_barang_masuk`
--
ALTER TABLE `tbl_barang_masuk`
  ADD PRIMARY KEY (`id_brngmsk`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `tbl_dtl_barang_keluar`
--
ALTER TABLE `tbl_dtl_barang_keluar`
  ADD PRIMARY KEY (`id_dtlbrngkel`);

--
-- Indexes for table `tbl_dtl_mikeluar`
--
ALTER TABLE `tbl_dtl_mikeluar`
  ADD PRIMARY KEY (`id_dtlmikeluar`);

--
-- Indexes for table `tbl_dtl_mutasi`
--
ALTER TABLE `tbl_dtl_mutasi`
  ADD PRIMARY KEY (`id_dtlmutasi`);

--
-- Indexes for table `tbl_dtl_pembelian`
--
ALTER TABLE `tbl_dtl_pembelian`
  ADD PRIMARY KEY (`id_dtl_pembelian`);

--
-- Indexes for table `tbl_dtl_penerimaan`
--
ALTER TABLE `tbl_dtl_penerimaan`
  ADD PRIMARY KEY (`id_dtl_penerimaan`);

--
-- Indexes for table `tbl_dtl_pengetesan`
--
ALTER TABLE `tbl_dtl_pengetesan`
  ADD PRIMARY KEY (`id_dtl_cek`);

--
-- Indexes for table `tbl_dtl_permintaan`
--
ALTER TABLE `tbl_dtl_permintaan`
  ADD PRIMARY KEY (`id_dtl_permintaan`);

--
-- Indexes for table `tbl_dtl_spb`
--
ALTER TABLE `tbl_dtl_spb`
  ADD PRIMARY KEY (`id_dtl_spb`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `tbl_group_mesin`
--
ALTER TABLE `tbl_group_mesin`
  ADD PRIMARY KEY (`id_grpmesin`);

--
-- Indexes for table `tbl_jenis_barang`
--
ALTER TABLE `tbl_jenis_barang`
  ADD PRIMARY KEY (`id_jnsbrng`);

--
-- Indexes for table `tbl_kabupaten`
--
ALTER TABLE `tbl_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `tbl_kdtransaksi`
--
ALTER TABLE `tbl_kdtransaksi`
  ADD PRIMARY KEY (`id_kdtransaksi`);

--
-- Indexes for table `tbl_metode_bayar`
--
ALTER TABLE `tbl_metode_bayar`
  ADD PRIMARY KEY (`id_metbyr`);

--
-- Indexes for table `tbl_mikeluar`
--
ALTER TABLE `tbl_mikeluar`
  ADD PRIMARY KEY (`id_mikeluar`);

--
-- Indexes for table `tbl_mutasi`
--
ALTER TABLE `tbl_mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `tbl_nama_barang`
--
ALTER TABLE `tbl_nama_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_pejabat`
--
ALTER TABLE `tbl_pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `tbl_pengetesan`
--
ALTER TABLE `tbl_pengetesan`
  ADD PRIMARY KEY (`id_cek`);

--
-- Indexes for table `tbl_penyerahan`
--
ALTER TABLE `tbl_penyerahan`
  ADD PRIMARY KEY (`id_penyerahan`);

--
-- Indexes for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`no_rekening`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tbl_spb`
--
ALTER TABLE `tbl_spb`
  ADD PRIMARY KEY (`id_spb`);

--
-- Indexes for table `tbl_stok_barang`
--
ALTER TABLE `tbl_stok_barang`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang_akutansi`
--
ALTER TABLE `tbl_barang_akutansi`
  MODIFY `id_jnsbrngakt` tinyint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_dtl_barang_keluar`
--
ALTER TABLE `tbl_dtl_barang_keluar`
  MODIFY `id_dtlbrngkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_dtl_mutasi`
--
ALTER TABLE `tbl_dtl_mutasi`
  MODIFY `id_dtlmutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_dtl_pembelian`
--
ALTER TABLE `tbl_dtl_pembelian`
  MODIFY `id_dtl_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_dtl_penerimaan`
--
ALTER TABLE `tbl_dtl_penerimaan`
  MODIFY `id_dtl_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dtl_pengetesan`
--
ALTER TABLE `tbl_dtl_pengetesan`
  MODIFY `id_dtl_cek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_dtl_permintaan`
--
ALTER TABLE `tbl_dtl_permintaan`
  MODIFY `id_dtl_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_dtl_spb`
--
ALTER TABLE `tbl_dtl_spb`
  MODIFY `id_dtl_spb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id_group` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_group_mesin`
--
ALTER TABLE `tbl_group_mesin`
  MODIFY `id_grpmesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_jenis_barang`
--
ALTER TABLE `tbl_jenis_barang`
  MODIFY `id_jnsbrng` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_kabupaten`
--
ALTER TABLE `tbl_kabupaten`
  MODIFY `id_kabupaten` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_metode_bayar`
--
ALTER TABLE `tbl_metode_bayar`
  MODIFY `id_metbyr` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  MODIFY `id_provinsi` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `no_rekening` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `tbl_stok_barang`
--
ALTER TABLE `tbl_stok_barang`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
