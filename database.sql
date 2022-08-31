-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 03:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pn_sleman_daftar1`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(11) NOT NULL,
  `tables_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(75) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `tables_name`, `description`, `create_date`, `create_by`, `active`) VALUES
(14, 'PT/CV', 'Update data PT/CV dengan id = 9', '0000-00-00 00:00:00', 'okta', 1),
(15, 'Surat Kuasa', 'Update data Surat Kuasa dengan np. pendaftaran = 001', '0000-00-00 00:00:00', 'bcd', 1),
(16, 'PT/CV', 'Update data PT/CV dengan no. pendaftaran = 001', '2022-08-02 10:43:56', 'okta', 1),
(17, 'PT/CV', 'Update data PT/CV dengan no. pendaftaran = 001', '2022-08-11 09:33:30', 'okta', 1),
(18, 'PT/CV', 'Update data PT/CV dengan no. pendaftaran = 001', '2022-08-22 04:10:39', 'okta', 1),
(19, 'PT/CV', 'Update data PT/CV dengan no. pendaftaran = 001', '0000-00-00 00:00:00', 'bcd', 1),
(20, 'PT/CV', 'Update data PT/CV dengan no. pendaftaran = 001', '2022-08-22 05:21:31', 'okta', 1),
(21, 'Notaris', 'Update data notaris dengan id = 5', '2022-08-24 03:11:12', 'okta', 1),
(22, 'Notaris', 'Hapus data notaris dengan id = 7', '0000-00-00 00:00:00', 'okta', 1),
(23, 'Notaris', 'Tambah data Notaris dengan nama = kk', '0000-00-00 00:00:00', 'okta', 1),
(24, 'Notaris', 'Hapus data notaris dengan id = 8', '2022-08-24 03:13:25', 'okta', 1),
(25, 'Notaris', 'Tambah data notaris dengan nama = kk', '2022-08-24 03:14:34', 'okta', 1),
(26, 'PT/CV', 'Tambah data PT/CV dengan no. pendaftaran = 1', '2022-08-24 03:17:59', 'okta', 1),
(27, 'PT/CV', 'Update data PT/CV dengan id = 33', '2022-08-24 03:18:53', 'okta', 1),
(28, 'PT/CV', 'Hapus data PT/CV dengan id = 33', '2022-08-24 03:19:09', 'okta', 1),
(29, 'Surat Kuasa', 'Update data surat kuasa dengan id = 3', '2022-08-24 03:21:56', 'okta', 1),
(30, 'Surat Kuasa', 'Tambah data surat kuasa dengan no. pendaftaran = 10', '2022-08-24 03:22:42', 'okta', 1),
(31, 'Surat Kuasa', 'Hapus data surat kuasa dengan id = 4', '2022-08-24 03:23:01', 'okta', 1),
(32, 'Notaris', 'Update data notaris dengan id = 9', '2022-08-24 03:27:20', 'bcd', 1),
(33, 'Notaris', 'Update data notaris dengan id = 9', '2022-08-24 03:28:09', 'bcd', 1),
(34, 'Notaris', 'Tambah data notaris dengan nama = kk', '2022-08-24 03:29:30', 'bcd', 1),
(35, 'Notaris', 'Hapus data notaris dengan id = 10', '2022-08-24 03:29:43', 'bcd', 1),
(36, 'PT/CV', 'Update data PT/CV dengan id = 11', '2022-08-24 03:32:05', 'bcd', 1),
(37, 'Surat Kuasa', 'Update data surat kuasa dengan id = 3', '2022-08-24 03:33:45', 'bcd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbconfig`
--

CREATE TABLE `tbconfig` (
  `id` int(11) NOT NULL,
  `organisasi` varchar(20) NOT NULL,
  `instansi` text NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `website` varchar(200) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email_reg` varchar(80) NOT NULL,
  `email_htl` varchar(60) NOT NULL,
  `email_sci` varchar(60) NOT NULL,
  `name_reg` varchar(60) NOT NULL,
  `host` varchar(60) NOT NULL,
  `judulweb` varchar(250) NOT NULL,
  `deskripsiweb` varchar(350) NOT NULL,
  `tglacara` varchar(60) NOT NULL,
  `tempat` varchar(120) NOT NULL,
  `tglmaxdaftar` date NOT NULL,
  `tglmaxkonfirm` date NOT NULL,
  `gv` varchar(200) NOT NULL,
  `keyword` varchar(300) NOT NULL,
  `sekretaris` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `bank` text NOT NULL,
  `arh` tinyint(1) NOT NULL,
  `aro` varchar(50) NOT NULL,
  `ako` tinyint(1) NOT NULL,
  `lockadd` tinyint(1) NOT NULL,
  `batastgl_cekin` date NOT NULL,
  `batastgl_cekout` date NOT NULL,
  `batastgl_daftar` date NOT NULL,
  `autodelhtl` bigint(3) NOT NULL,
  `infohtl` text NOT NULL,
  `batastgl_cost` date NOT NULL,
  `batastgl_lat` date DEFAULT NULL,
  `batastgl_on` date NOT NULL,
  `inforeg` longtext NOT NULL,
  `infoabs` text DEFAULT NULL,
  `topikabs` text NOT NULL,
  `ruangabs` varchar(300) NOT NULL,
  `batastgl_abs` date NOT NULL,
  `exename` varchar(30) DEFAULT NULL,
  `asetting` varchar(200) NOT NULL DEFAULT '1111111111',
  `ajudulhotel` varchar(100) NOT NULL,
  `maxsympo` int(6) NOT NULL DEFAULT 0,
  `maxworkshop` int(6) NOT NULL DEFAULT 0,
  `infohl` text NOT NULL,
  `signature1` text NOT NULL,
  `signature2` text NOT NULL,
  `jnametag` int(11) NOT NULL DEFAULT 0,
  `certno1` int(3) NOT NULL,
  `certno2` int(3) NOT NULL,
  `autodelsympo` int(3) NOT NULL,
  `pesadmin` text NOT NULL,
  `pesuser` text NOT NULL,
  `lockdb` varchar(10) DEFAULT NULL COMMENT '0:open,1:online,2:offline',
  `kurs` float(8,2) NOT NULL DEFAULT 0.00,
  `kurs2` float(10,2) NOT NULL,
  `alamatfb` varchar(100) NOT NULL,
  `alamattwitter` varchar(100) NOT NULL,
  `noreply` varchar(60) NOT NULL,
  `bahasa` varchar(6) NOT NULL,
  `sgelar` varchar(61) NOT NULL,
  `sprofesi` varchar(111) NOT NULL,
  `sstatreg` varchar(161) NOT NULL,
  `kodeevent` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbconfig`
--

INSERT INTO `tbconfig` (`id`, `organisasi`, `instansi`, `alamat`, `website`, `email`, `telp`, `fax`, `email_reg`, `email_htl`, `email_sci`, `name_reg`, `host`, `judulweb`, `deskripsiweb`, `tglacara`, `tempat`, `tglmaxdaftar`, `tglmaxkonfirm`, `gv`, `keyword`, `sekretaris`, `city`, `bank`, `arh`, `aro`, `ako`, `lockadd`, `batastgl_cekin`, `batastgl_cekout`, `batastgl_daftar`, `autodelhtl`, `infohtl`, `batastgl_cost`, `batastgl_lat`, `batastgl_on`, `inforeg`, `infoabs`, `topikabs`, `ruangabs`, `batastgl_abs`, `exename`, `asetting`, `ajudulhotel`, `maxsympo`, `maxworkshop`, `infohl`, `signature1`, `signature2`, `jnametag`, `certno1`, `certno2`, `autodelsympo`, `pesadmin`, `pesuser`, `lockdb`, `kurs`, `kurs2`, `alamatfb`, `alamattwitter`, `noreply`, `bahasa`, `sgelar`, `sprofesi`, `sstatreg`, `kodeevent`) VALUES
(1, '', 'PENGADILAN NEGERI SLEMAN', 'BERAN, SLEMAN', '', 'registration@jakartadiabetesmeeting.com', '89', '879', 'office.jdm@gmail.com,endocrin@rad.net.id', 'registration@jakartadiabetesmeeting.com', 'registration@jakartadiabetesmeeting.com', 'JDM2016 Committee', '', 'The 25th Jakarta Diabetes Meeting 2016 in conjunction with Jakarta Diabetes Month 2016', 'Penguatan Peran Bidan dalam Pemberdayaan Perempuan dan Keluarga untuk mendukung pencapaian SDGs', '', '', '0000-00-00', '0000-00-00', '', '', 'JDM2016 Committee', 'Jakarta', '<p>Proceed your payment on:</p>\r\n\r\n<p>Bank Mandiri RSCM Branch<br />\r\nAccount name: Metabolik Endokrin<br />\r\nAccount number: 122-00-8700067-8</p>', 0, '01111', 0, 0, '2016-11-07', '2016-11-15', '0000-00-00', 0, '', '2016-11-01', '0000-00-00', '0000-00-00', '', '', '                                     ', '                                     ', '0000-00-00', '', '1111111111', '7,8,9,10,11,12,13,14,15', 0, 0, '', '', '<p>Congress Secretariat</p>\r\n\r\n<p>Division of Endocrinology and Metabolism<br />\r\nDepartment of Internal Medicine<br />\r\nFaculty of Medicine, Universitas Indonesia<br />\r\nCipto Mangunkusumo National General Hospital, Jakarta<br />\r\nDiponegoro Street No.71, Central Jakarta<br />\r\nDKI Jakarta, 10430<br />\r\n<strong>Phone: </strong>021-390 7703, 310 0075<br />\r\n<strong>Fax</strong>: 021-392 8658, 392 8659<br />\r\n<strong>Email: </strong><a href=\"mailto:office.jdm@gmail.com\">office.jdm@gmail.com</a>; <a href=\"mailto:endocrin@rad.net.id\">endocrin@rad.net.id</a><br />\r\n<strong>Facebook account</strong>: Jakarta Diabetes Meeting 2016</p>', 1, 2, 0, 30, '', '', '', 14000.00, 14000.00, '', '', 'registration@jakartadiabetesmeeting.com', 'en', 'Prof.,DR.,Dr.,Mr.,Mrs.,Ms.,Miss', 'Specialyst,General Participant,Student,Diattition,Pharmacis,Others', 'Participant,Committee,Speaker,Moderator,Instructor,Delegation,Faculty', 'JDM16');

-- --------------------------------------------------------

--
-- Table structure for table `tbjenisusaha`
--

CREATE TABLE `tbjenisusaha` (
  `id` int(11) NOT NULL,
  `jenisusaha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjenisusaha`
--

INSERT INTO `tbjenisusaha` (`id`, `jenisusaha`) VALUES
(1, 'Industri'),
(2, 'Dagang');

-- --------------------------------------------------------

--
-- Table structure for table `tbnotaris`
--

CREATE TABLE `tbnotaris` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `akta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbnotaris`
--

INSERT INTO `tbnotaris` (`id`, `nama`, `alamat`, `akta`) VALUES
(1, 'NOTARIS1', 'JL ABC', '5R6879800'),
(2, 'notaris3', 'jl apa', 'di mana'),
(3, 'notaris2', 'hk', ''),
(4, 'notaris 5', '', ''),
(5, 'yoyo', '', ''),
(7, 'KK', 'sleman', '001');

-- --------------------------------------------------------

--
-- Table structure for table `tbregkuasa`
--

CREATE TABLE `tbregkuasa` (
  `idsu` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgldaftar` date NOT NULL,
  `noreg` varchar(40) NOT NULL,
  `namabu` varchar(100) NOT NULL,
  `jenisbu` varchar(30) NOT NULL,
  `alamatbu` varchar(200) NOT NULL,
  `tglakta` date NOT NULL,
  `noakta` varchar(100) NOT NULL,
  `idnotaris` int(11) NOT NULL,
  `tk1` varchar(60) NOT NULL,
  `tkbanding` varchar(60) NOT NULL,
  `tkeksekusi` varchar(60) NOT NULL,
  `tkkasasi` varchar(60) NOT NULL,
  `tkpk` varchar(60) NOT NULL,
  `tglambil` date NOT NULL,
  `catatan` text NOT NULL,
  `jangkawaktu` varchar(40) NOT NULL,
  `pengurus` text NOT NULL,
  `npwp` varchar(40) NOT NULL,
  `namapbk` varchar(70) NOT NULL,
  `alamatpbk` varchar(200) NOT NULL,
  `hppbk` varchar(30) NOT NULL,
  `namapnk` varchar(70) NOT NULL,
  `alamatpnk` varchar(200) NOT NULL,
  `hppnk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbregkuasa`
--

INSERT INTO `tbregkuasa` (`idsu`, `tgl`, `tgldaftar`, `noreg`, `namabu`, `jenisbu`, `alamatbu`, `tglakta`, `noakta`, `idnotaris`, `tk1`, `tkbanding`, `tkeksekusi`, `tkkasasi`, `tkpk`, `tglambil`, `catatan`, `jangkawaktu`, `pengurus`, `npwp`, `namapbk`, `alamatpbk`, `hppbk`, `namapnk`, `alamatpnk`, `hppnk`) VALUES
(1, '2022-07-26 08:57:02', '2022-07-01', '001', 'abc', '', '', '0000-00-00', '', 0, '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbreglain`
--

CREATE TABLE `tbreglain` (
  `id` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgldaftar` date NOT NULL,
  `noreg` varchar(40) NOT NULL,
  `namabu` varchar(100) NOT NULL,
  `jenisbu` varchar(30) NOT NULL,
  `alamatbu` varchar(200) NOT NULL,
  `tglakta` date NOT NULL,
  `noakta` varchar(100) NOT NULL,
  `idnotaris` int(11) NOT NULL,
  `tk1` varchar(60) NOT NULL,
  `tkbanding` varchar(60) NOT NULL,
  `tkeksekusi` varchar(60) NOT NULL,
  `tkkasasi` varchar(60) NOT NULL,
  `tkpk` varchar(60) NOT NULL,
  `tglambil` date NOT NULL,
  `catatan` text NOT NULL,
  `jangkawaktu` varchar(40) NOT NULL,
  `pengurus` text NOT NULL,
  `npwp` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbreglain`
--

INSERT INTO `tbreglain` (`id`, `tgl`, `tgldaftar`, `noreg`, `namabu`, `jenisbu`, `alamatbu`, `tglakta`, `noakta`, `idnotaris`, `tk1`, `tkbanding`, `tkeksekusi`, `tkkasasi`, `tkpk`, `tglambil`, `catatan`, `jangkawaktu`, `pengurus`, `npwp`) VALUES
(1, '2016-11-10 07:04:54', '2016-08-11', '678', '8888', '', '', '0000-00-00', '', 0, '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbregpt`
--

CREATE TABLE `tbregpt` (
  `id_pt` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgldaftar` date NOT NULL,
  `noreg` varchar(40) NOT NULL,
  `namabu` varchar(100) NOT NULL,
  `jenisbu` varchar(30) NOT NULL,
  `alamatbu` varchar(200) NOT NULL,
  `tglakta` date NOT NULL,
  `noakta` varchar(100) NOT NULL,
  `idnotaris` int(11) NOT NULL,
  `tglambil` date NOT NULL,
  `catatan` text NOT NULL,
  `jangkawaktu` varchar(40) NOT NULL,
  `pengurus` text NOT NULL,
  `npwp` varchar(40) NOT NULL,
  `tandatangan` varchar(60) NOT NULL,
  `ttd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbregpt`
--

INSERT INTO `tbregpt` (`id_pt`, `tgl`, `tgldaftar`, `noreg`, `namabu`, `jenisbu`, `alamatbu`, `tglakta`, `noakta`, `idnotaris`, `tglambil`, `catatan`, `jangkawaktu`, `pengurus`, `npwp`, `tandatangan`, `ttd`) VALUES
(1, '2016-11-10 08:14:31', '2016-10-11', '999', 'cv abc', 'CV', '', '0000-00-00', '', 1, '0000-00-00', '', '', '', '', '', ''),
(3, '2022-07-27 06:33:22', '2022-07-04', '001', 'uy', 'cv', 'sleman', '0000-00-00', '10', 0, '0000-00-00', '', '2', 'anton', '', '', ''),
(9, '2022-07-07 07:01:46', '2022-07-06', '001', 'uy', 'pt', 'sleman', '2022-07-09', '10', 1, '2022-07-27', '-', '2', 'anton', '', '', ''),
(11, '2022-07-26 02:53:02', '2020-07-30', '001', '', 'pt', '', '0000-00-00', '', 0, '0000-00-00', '', '', '', '', '', ''),
(20, '2022-07-29 08:41:18', '2022-07-28', '001', 'def', 'pt', 'sleman', '2022-07-28', '10', 1, '0000-00-00', '26-2022-STKP_m195314063.pdf', '2', 'anton', '', '', ''),
(21, '2022-08-09 07:37:22', '2022-07-28', '003', 'Maju Jaya Sentosa', 'cv', 'sleman', '2022-07-28', '10', 1, '0000-00-00', '27-2022-STKP_m195314076.pdf', '2', 'ant', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `userid` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `id` bigint(6) UNSIGNED ZEROFILL NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `identitas` varchar(40) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`userid`, `username`, `usertype`, `pass`, `email`, `aktif`, `id`, `alamat`, `identitas`, `telp`) VALUES
('admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'd41d8cd98f00b204e9800998ecf8427e', 0, 000001, 'A', 'admin', ''),
('admin', 'admin', '', '', '', 0, 000004, '', '', ''),
('1', 'okta', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, 000018, '', '', ''),
('abc', 'abc', 'pegawai', 'caf1a3dfb505ffed0d024130f58c5cfa', '', 1, 000020, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbconfig`
--
ALTER TABLE `tbconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbjenisusaha`
--
ALTER TABLE `tbjenisusaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbnotaris`
--
ALTER TABLE `tbnotaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbregkuasa`
--
ALTER TABLE `tbregkuasa`
  ADD PRIMARY KEY (`idsu`);

--
-- Indexes for table `tbreglain`
--
ALTER TABLE `tbreglain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbregpt`
--
ALTER TABLE `tbregpt`
  ADD PRIMARY KEY (`id_pt`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbjenisusaha`
--
ALTER TABLE `tbjenisusaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbnotaris`
--
ALTER TABLE `tbnotaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbregkuasa`
--
ALTER TABLE `tbregkuasa`
  MODIFY `idsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbreglain`
--
ALTER TABLE `tbreglain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbregpt`
--
ALTER TABLE `tbregpt`
  MODIFY `id_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `id` bigint(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
