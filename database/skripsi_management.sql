-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2020 at 04:51 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan_skripsi`
--

CREATE TABLE `bimbingan_skripsi` (
  `id_bimbingan` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_skripsi` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nidn` int NOT NULL,
  `pertemuan_ke` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `topik_bahasan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kpi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `penyelesaian` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jadwal_berikutnya` date NOT NULL,
  `persetujuan` tinyint(1) NOT NULL DEFAULT '0',
  `tgl_persetujuan` date DEFAULT NULL,
  `komentar_pembimbing` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int NOT NULL,
  `id_user` int NOT NULL,
  `kode_prodi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `id_user`, `kode_prodi`) VALUES
(18101320, 18, 'SI'),
(18102312, 16, 'SI'),
(19123123, 19, 'CS'),
(1712030123, 30, 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int NOT NULL,
  `id_user` int NOT NULL,
  `kode_prodi` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `angkatan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `id_user`, `kode_prodi`, `angkatan`) VALUES
(1812301, 39, 'CS', 4),
(181023012, 40, 'CS', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing_skripsi`
--

CREATE TABLE `pembimbing_skripsi` (
  `nidn` int NOT NULL,
  `id_skripsi` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_dosen_membimbing` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_prodi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kaprodi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`, `kaprodi`) VALUES
('BM', 'Business Management', 1712030123),
('CS', 'Computer Science', 19123123),
('SI', 'Sistem Informasi', 18101320);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` char(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nim` int NOT NULL,
  `judul_skripsi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `topik` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `abstrak_id` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `abstrak_en` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `file_proposal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `persetujuan` tinyint(1) DEFAULT NULL,
  `alasan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tgl_persetujuan` date DEFAULT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `nim`, `judul_skripsi`, `topik`, `abstrak_id`, `abstrak_en`, `file_proposal`, `persetujuan`, `alasan`, `tgl_persetujuan`, `created_date`) VALUES
('CNiUb181023012', 181023012, 'Perancangan dan Implementasi Internet of Things dalam Sistem Keamanan Lingkungan', 'Internet of Things', 'Perancangan dan Implementasi Internet of Things dalam Sistem Keamanan Lingkungan', 'Design and Implementation of the Internet of Things in an Environmental Security System\r\n', 'Sk2ob_Lembaran Reference Cards- Bahasa.pdf', NULL, NULL, NULL, '2020-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `no_telp` int DEFAULT NULL,
  `role` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `gender`, `alamat`, `no_telp`, `role`) VALUES
(16, 'naufalrasyid86@gmail.com', '$2y$10$L4igv.nM0ME0I1Jnzyx.M.tlSOBxuzc.YupyjT9naIH10aC1U6zlC', 'Naufal R - D', 'L', 'Cimanggu', 812312321, 'Dosen'),
(17, 'admin@admin.com', '$2y$10$mIbpOAgflSTOxVOOQcMRdONO1PieqY44ZZ58l8nOxesQiy5d0BxYW', 'Admin 123', 'L', 'Bogor', 81231233, 'Admin'),
(18, 'naufal.r@students.esqbs.ac.id', '$2y$10$s1s54QSaXobgwM8XK4/gYOPIxHQ2yhUuAxsv3fLXo7C0uEXe1eYem', 'Rasyid - K', 'L', 'Jonggol', 812312, 'Dosen'),
(19, 'im.acidopal@gmail.com', '$2y$10$KQuW8E50tB4DvQnbKusZaOBsuLAwKq58zsunwMyH7YpfeDxSpxXUu', 'Acid - K', 'L', 'Bogor', 8123122, 'Dosen'),
(30, 'bubu@gmail.com', '$2y$10$cfsJGgeGRreRm0niCwGFcOtliqXJMwGyx6qSNgmdnelUBvMAzk9kG', 'Bubu - D', 'L', 'Bogor', 81231, 'Dosen'),
(39, 'hany@gmail.com', '$2y$10$KjUpSLhD4ihuvhUq4AnwYucRGHmmv5I5OJAVVQ36Yp7QYBBbmn.4u', 'hany', NULL, NULL, NULL, 'Mahasiswa'),
(40, 'nabilazahra727@gmail.com', '$2y$10$eZlsOJ6drnVzOmG9a3GTH.NzTLzPyW3ZZSSDxOjp/hIJ.MkeSrJk.', 'Nabilla Zahra', NULL, NULL, NULL, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_bimbingan`
-- (See below for the actual view)
--
CREATE TABLE `vw_bimbingan` (
`id_user` int
,`nama` varchar(30)
,`judul_skripsi` varchar(100)
,`id_bimbingan` char(15)
,`id_skripsi` char(15)
,`nidn` int
,`pertemuan_ke` varchar(3)
,`tanggal` date
,`topik_bahasan` varchar(50)
,`kpi` varchar(50)
,`penyelesaian` varchar(50)
,`jadwal_berikutnya` date
,`persetujuan` tinyint(1)
,`tgl_persetujuan` date
,`komentar_pembimbing` varchar(1000)
,`angkatan` int
,`kode_prodi` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_dosen`
-- (See below for the actual view)
--
CREATE TABLE `vw_dosen` (
`nidn` int
,`id_user` int
,`email` varchar(50)
,`password` varchar(255)
,`nama` varchar(30)
,`gender` char(1)
,`alamat` varchar(100)
,`no_telp` int
,`role` varchar(30)
,`kode_prodi` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_dospem`
-- (See below for the actual view)
--
CREATE TABLE `vw_dospem` (
`nidn` int
,`nama` varchar(30)
,`id_skripsi` char(15)
,`judul_skripsi` varchar(100)
,`topik` varchar(100)
,`kode_prodi` varchar(20)
,`tgl_dosen_membimbing` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `vw_mahasiswa` (
`nim` int
,`id_user` int
,`email` varchar(50)
,`password` varchar(255)
,`nama` varchar(30)
,`gender` char(1)
,`alamat` varchar(100)
,`no_telp` int
,`role` varchar(30)
,`kode_prodi` varchar(4)
,`angkatan` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_prodi`
-- (See below for the actual view)
--
CREATE TABLE `vw_prodi` (
`kode_prodi` varchar(4)
,`nama_prodi` varchar(20)
,`kaprodi` int
,`nama_kaprodi` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_skripsi`
-- (See below for the actual view)
--
CREATE TABLE `vw_skripsi` (
`nama` varchar(30)
,`id_skripsi` char(15)
,`nim` int
,`judul_skripsi` varchar(100)
,`topik` varchar(100)
,`abstrak_id` text
,`abstrak_en` text
,`file_proposal` varchar(100)
,`persetujuan` tinyint(1)
,`alasan` varchar(100)
,`tgl_persetujuan` date
,`created_date` date
,`kode_prodi` varchar(4)
,`angkatan` int
);

-- --------------------------------------------------------

--
-- Structure for view `vw_bimbingan`
--
DROP TABLE IF EXISTS `vw_bimbingan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_bimbingan`  AS  select `u`.`id_user` AS `id_user`,`u`.`nama` AS `nama`,`s`.`judul_skripsi` AS `judul_skripsi`,`b`.`id_bimbingan` AS `id_bimbingan`,`b`.`id_skripsi` AS `id_skripsi`,`b`.`nidn` AS `nidn`,`b`.`pertemuan_ke` AS `pertemuan_ke`,`b`.`tanggal` AS `tanggal`,`b`.`topik_bahasan` AS `topik_bahasan`,`b`.`kpi` AS `kpi`,`b`.`penyelesaian` AS `penyelesaian`,`b`.`jadwal_berikutnya` AS `jadwal_berikutnya`,`b`.`persetujuan` AS `persetujuan`,`b`.`tgl_persetujuan` AS `tgl_persetujuan`,`b`.`komentar_pembimbing` AS `komentar_pembimbing`,`m`.`angkatan` AS `angkatan`,`m`.`kode_prodi` AS `kode_prodi` from (((`bimbingan_skripsi` `b` left join `skripsi` `s` on((`b`.`id_skripsi` = `s`.`id_skripsi`))) left join `mahasiswa` `m` on((`s`.`nim` = `m`.`nim`))) left join `user` `u` on((`u`.`id_user` = `m`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_dosen`
--
DROP TABLE IF EXISTS `vw_dosen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_dosen`  AS  select `d`.`nidn` AS `nidn`,`u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`nama` AS `nama`,`u`.`gender` AS `gender`,`u`.`alamat` AS `alamat`,`u`.`no_telp` AS `no_telp`,`u`.`role` AS `role`,`d`.`kode_prodi` AS `kode_prodi` from (`dosen` `d` join `user` `u` on((`d`.`id_user` = `u`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_dospem`
--
DROP TABLE IF EXISTS `vw_dospem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_dospem`  AS  select `d`.`nidn` AS `nidn`,`u`.`nama` AS `nama`,`s`.`id_skripsi` AS `id_skripsi`,`s`.`judul_skripsi` AS `judul_skripsi`,`s`.`topik` AS `topik`,`d`.`kode_prodi` AS `kode_prodi`,`ps`.`tgl_dosen_membimbing` AS `tgl_dosen_membimbing` from (((`pembimbing_skripsi` `ps` left join `dosen` `d` on((`ps`.`nidn` = `d`.`nidn`))) left join `user` `u` on((`d`.`id_user` = `u`.`id_user`))) left join `skripsi` `s` on((`ps`.`id_skripsi` = `s`.`id_skripsi`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_mahasiswa`
--
DROP TABLE IF EXISTS `vw_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_mahasiswa`  AS  select `m`.`nim` AS `nim`,`u`.`id_user` AS `id_user`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`nama` AS `nama`,`u`.`gender` AS `gender`,`u`.`alamat` AS `alamat`,`u`.`no_telp` AS `no_telp`,`u`.`role` AS `role`,`m`.`kode_prodi` AS `kode_prodi`,`m`.`angkatan` AS `angkatan` from (`mahasiswa` `m` join `user` `u` on((`m`.`id_user` = `u`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_prodi`
--
DROP TABLE IF EXISTS `vw_prodi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_prodi`  AS  select `p`.`kode_prodi` AS `kode_prodi`,`p`.`nama_prodi` AS `nama_prodi`,`p`.`kaprodi` AS `kaprodi`,`u`.`nama` AS `nama_kaprodi` from ((`dosen` `d` join `prodi` `p` on((`d`.`nidn` = `p`.`kaprodi`))) join `user` `u` on((`u`.`id_user` = `d`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_skripsi`
--
DROP TABLE IF EXISTS `vw_skripsi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_skripsi`  AS  select `u`.`nama` AS `nama`,`s`.`id_skripsi` AS `id_skripsi`,`s`.`nim` AS `nim`,`s`.`judul_skripsi` AS `judul_skripsi`,`s`.`topik` AS `topik`,`s`.`abstrak_id` AS `abstrak_id`,`s`.`abstrak_en` AS `abstrak_en`,`s`.`file_proposal` AS `file_proposal`,`s`.`persetujuan` AS `persetujuan`,`s`.`alasan` AS `alasan`,`s`.`tgl_persetujuan` AS `tgl_persetujuan`,`s`.`created_date` AS `created_date`,`m`.`kode_prodi` AS `kode_prodi`,`m`.`angkatan` AS `angkatan` from ((`skripsi` `s` join `mahasiswa` `m` on((`s`.`nim` = `m`.`nim`))) join `user` `u` on((`m`.`id_user` = `u`.`id_user`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan_skripsi`
--
ALTER TABLE `bimbingan_skripsi`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `id_skripsi` (`id_skripsi`) USING BTREE,
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `dosen_ibfk_1` (`id_user`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `pembimbing_skripsi`
--
ALTER TABLE `pembimbing_skripsi`
  ADD KEY `nidn` (`nidn`),
  ADD KEY `id_skripsi` (`id_skripsi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`),
  ADD KEY `nidn` (`kaprodi`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan_skripsi`
--
ALTER TABLE `bimbingan_skripsi`
  ADD CONSTRAINT `bimbingan_skripsi_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_skripsi_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembimbing_skripsi`
--
ALTER TABLE `pembimbing_skripsi`
  ADD CONSTRAINT `pembimbing_skripsi_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembimbing_skripsi_ibfk_2` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`kaprodi`) REFERENCES `dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
