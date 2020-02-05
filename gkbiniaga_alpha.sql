-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2020 at 08:58 PM
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
  `id_unit` varchar(8) DEFAULT NULL,
  `no_rekening` tinyint(3) DEFAULT NULL,
  `nm_jnsbrngakt` varchar(50) DEFAULT NULL,
  `group_jnsbrngakt` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_barang_akutansi`
--

INSERT INTO `tbl_barang_akutansi` (`id_jnsbrngakt`, `no_jnsbrngakt`, `id_jnsbrng`, `id_unit`, `no_rekening`, `nm_jnsbrngakt`, `group_jnsbrngakt`) VALUES
(1, 'A', '1', 'ex', 1, 'A1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_keluar`
--

CREATE TABLE `tbl_barang_keluar` (
  `id_brngkel` varchar(15) NOT NULL,
  `tgl_brngkel` date DEFAULT NULL,
  `stok_brngkel` int(15) DEFAULT NULL,
  `tothrg_brngkel` decimal(15,2) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('GKBI', 1, 1, 'niagagkbi', 'KOPERASI G K B I', 'Medari - Sleman - Yogyakarta', '(0274)868312, 868513', '-', 'pc.gkbi@gmail.com', '01.002.666.4.542.001', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_barang_keluar`
--

CREATE TABLE `tbl_dtl_barang_keluar` (
  `id_dtlbrngkel` int(11) NOT NULL,
  `id_brngkel` varchar(15) DEFAULT NULL,
  `tgl_brngkel` date DEFAULT NULL,
  `id_stok` int(11) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `subhrg_dtlbrngkel` decimal(15,2) DEFAULT NULL,
  `tgl_brngmsk` date DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dtl_mikeluar`
--

CREATE TABLE `tbl_dtl_mikeluar` (
  `id_dtlmikeluar` int(11) NOT NULL,
  `id_mikeluar` varchar(15) DEFAULT NULL,
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
-- Table structure for table `tbl_dtl_mutasi_gudang`
--

CREATE TABLE `tbl_dtl_mutasi_gudang` (
  `id_dtl_mutasi_gudang` int(11) NOT NULL,
  `id_mutasi_gudang` varchar(10) NOT NULL,
  `id_jnsbrngakt` varchar(15) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `nota_dtl_mutasi_gudang` varchar(20) NOT NULL,
  `jumlah_dtl_mutasi_gudang` int(11) NOT NULL,
  `id_kdtransaksi` varchar(5) NOT NULL,
  `terima_dtl_mutasi_gudang` int(11) NOT NULL,
  `keluar_dtl_mutasi_gudang` int(11) NOT NULL,
  `ket_dtl_mutasi_gudang` varchar(200) NOT NULL,
  `input_dtl_mutasi_gudang` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nota_dtl_minta` varchar(20) DEFAULT NULL,
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
  `selesai_dtl_minta` enum('Y','P','T','DT','M') DEFAULT 'T',
  `nosrh_minta` varchar(20) DEFAULT NULL,
  `tglsrh_minta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dtl_permintaan`
--

INSERT INTO `tbl_dtl_permintaan` (`id_dtl_permintaan`, `id_permintaan`, `id_barang`, `id_brngmsk`, `id_pembelian`, `nota_dtl_minta`, `tgl_dtl_perlu`, `jml_dtl_minta`, `stkunit_dtl_minta`, `stkgdng_dtl_minta`, `tglreal_minta`, `jmlreal_minta`, `hrgreal_minta`, `sisabeli_minta`, `lsng_minta`, `ket_dtl_minta`, `selesai_dtl_minta`, `nosrh_minta`, `tglsrh_minta`) VALUES
(1, 'PR20010001', 'A', NULL, NULL, '0001/weav/I/01/2020', '2020-01-17', 10, 0, 0, NULL, NULL, NULL, NULL, NULL, 'habis', 'T', NULL, NULL),
(2, 'PR20010001', 'NH', NULL, NULL, '0001/weav/I/01/2020', '2020-01-18', 20, 0, 0, NULL, NULL, NULL, NULL, NULL, 'stok terbatas', 'P', NULL, NULL),
(3, 'PR20010002', 'A', NULL, NULL, '0002/weav/I/01/2020', '2020-01-17', 20, 0, 0, NULL, NULL, NULL, NULL, NULL, 'Pembelian langsung', 'Y', NULL, NULL),
(4, 'PR20010002', 'NH', NULL, NULL, '0002/weav/I/01/2020', '2020-01-17', 30, 0, 0, NULL, NULL, NULL, NULL, NULL, 'Pembelian Langsung', 'M', NULL, NULL),
(5, 'PR20010003', 'NH', NULL, NULL, '0003/weav/I/01/2020', '2020-01-19', 30, 0, 0, NULL, NULL, NULL, NULL, NULL, 'tinggal sedikit', 'DT', NULL, NULL);

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
  `id_pengecekan` varchar(15) DEFAULT NULL,
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
-- Table structure for table `tbl_mutasi_gudang`
--

CREATE TABLE `tbl_mutasi_gudang` (
  `id_mutasi_gudang` varchar(10) NOT NULL,
  `tgl_mutasi_gudang` date NOT NULL,
  `nota_mutasi_gudang` varchar(20) NOT NULL,
  `id_unit` varchar(8) NOT NULL,
  `id_bagian` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `hpp_barang` decimal(15,2) DEFAULT '0.00',
  `harga_barang` decimal(15,2) DEFAULT '0.00',
  `updated_barang` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nama_barang`
--

INSERT INTO `tbl_nama_barang` (`id_barang`, `id_jnsbrng`, `id_jnsbrngakt`, `id_group`, `nm_barang`, `kel_barang`, `ket_barang`, `no_barang`, `sat1_barang`, `sat2_barang`, `hpp_barang`, `harga_barang`, `updated_barang`) VALUES
('A', '2', NULL, 4, 'Test Barang ', NULL, 'barang ok ', NULL, '1', '5', '1500.00', '2000.00', '2020-01-30 15:07:44'),
('NH', '1', NULL, 3, 'Natrium Hipoklorit', NULL, 'Bahan Campuran Pemutih', NULL, '10', '20', '900.00', '1500.00', '2020-01-30 15:07:41');

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
('niagagkbi', 'Gigih Wahyudi', 'Deputy Direktur Bid Keuangan', 'Rita Akmala Hapsari', 'Kepala Unit Niaga', 'M. Tri Budi Wirawan', 'Kepala Unit Akuntansi', 'Elvi kusumawati BU.', 'Ka. Bag. Pembelian', 'Musabih Zikrina B', 'Ka. Bag. Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `tbl_pembelian` varchar(15) NOT NULL,
  `id_permintaan` varchar(15) DEFAULT NULL,
  `id_jenis_barang` varchar(15) DEFAULT NULL,
  `nota_beli` varchar(20) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `jml_beli` int(11) DEFAULT NULL,
  `jml_real_bel` int(11) DEFAULT NULL,
  `ppn_beli` decimal(15,2) DEFAULT NULL,
  `total_beli` decimal(15,2) DEFAULT NULL,
  `tothrg_beli` decimal(15,2) DEFAULT NULL,
  `jmlbyr_beli` decimal(15,2) DEFAULT NULL,
  `saldo_beli` decimal(15,2) DEFAULT NULL,
  `lunas_beli` enum('Y','T') DEFAULT NULL,
  `fakturpjk_beli` varchar(20) DEFAULT NULL,
  `tglfakturpjk_beli` date DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerimaan`
--

CREATE TABLE `tbl_penerimaan` (
  `id_penerimaan` varchar(15) NOT NULL,
  `id_pembelian` varchar(15) DEFAULT NULL,
  `id_barang` varchar(15) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `id_jenis_barang` tinyint(3) DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `nota_terima` varchar(20) DEFAULT NULL,
  `jml_terima` int(11) DEFAULT NULL,
  `jml_real_beli` int(11) DEFAULT NULL,
  `bayar` decimal(15,2) DEFAULT NULL,
  `id_jnsbrngakt` varchar(15) DEFAULT NULL,
  `kd_pjk` varchar(20) DEFAULT NULL,
  `pjk` varchar(20) DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengecekan`
--

CREATE TABLE `tbl_pengecekan` (
  `id_pengecekan` varchar(15) NOT NULL,
  `id_penyerahan` varchar(15) DEFAULT NULL,
  `id_penerimaan` varchar(15) DEFAULT NULL,
  `id_pembelian` varchar(15) DEFAULT NULL,
  `id_bagian` varchar(8) DEFAULT NULL,
  `id_unit` varchar(8) DEFAULT NULL,
  `nota_cek` varchar(20) DEFAULT NULL,
  `tgl_cek` date DEFAULT NULL,
  `jml_cek` int(11) DEFAULT NULL,
  `jml_lolos_cek` int(11) DEFAULT NULL,
  `surat_jalan` varchar(20) DEFAULT NULL,
  `tgl_jalan` date DEFAULT NULL,
  `ket_cek` text,
  `tgl_lunas` date DEFAULT NULL,
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nota_serah` varchar(20) DEFAULT NULL,
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
  `nota_minta` varchar(20) DEFAULT NULL,
  `tgl_minta` date DEFAULT NULL,
  `ket_minta` text,
  `selesai_minta` enum('Y','P','T') DEFAULT 'T',
  `id_user` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`id_permintaan`, `id_unit`, `id_bagian`, `nota_minta`, `tgl_minta`, `ket_minta`, `selesai_minta`, `id_user`) VALUES
('PR20010001', 'weav', '512', '0001/weav/I/01/2020', '2020-01-17', 'mendesak', 'P', 1),
('PR20010002', 'weav', '511', '0002/weav/I/01/2020', '2020-01-17', 'langsung', 'Y', 1),
('PR20010003', 'weav', '513', '0003/weav/I/01/2020', '2020-01-19', 'stok bulanan ', 'P', 1);

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
(2, '1 1 3 5 0 1', 'SPAREPART U / GDG UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nm_satuan` varchar(50) DEFAULT NULL
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
-- Indexes for table `tbl_dtl_mutasi_gudang`
--
ALTER TABLE `tbl_dtl_mutasi_gudang`
  ADD PRIMARY KEY (`id_dtl_mutasi_gudang`);

--
-- Indexes for table `tbl_dtl_permintaan`
--
ALTER TABLE `tbl_dtl_permintaan`
  ADD PRIMARY KEY (`id_dtl_permintaan`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id_group`);

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
  ADD PRIMARY KEY (`tbl_pembelian`);

--
-- Indexes for table `tbl_penerimaan`
--
ALTER TABLE `tbl_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `tbl_pengecekan`
--
ALTER TABLE `tbl_pengecekan`
  ADD PRIMARY KEY (`id_pengecekan`);

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
  MODIFY `id_jnsbrngakt` tinyint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_dtl_mutasi_gudang`
--
ALTER TABLE `tbl_dtl_mutasi_gudang`
  MODIFY `id_dtl_mutasi_gudang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dtl_permintaan`
--
ALTER TABLE `tbl_dtl_permintaan`
  MODIFY `id_dtl_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id_group` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `no_rekening` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
