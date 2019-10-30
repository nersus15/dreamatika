-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 03:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwaldaftar`
--

CREATE TABLE `jadwaldaftar` (
  `id` int(11) NOT NULL,
  `gelombang1` varchar(50) NOT NULL,
  `gelombang2` varchar(50) NOT NULL,
  `gelombang3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logdaftar`
--

CREATE TABLE `logdaftar` (
  `id` int(11) NOT NULL,
  `gelombang1` varchar(50) NOT NULL,
  `gelombang2` varchar(50) NOT NULL,
  `gelombang3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `aksi` varchar(150) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `tgl`, `time`, `aksi`, `user`) VALUES
(371, '29-10-2019', 1572339182, 'Logout', 'Fathurrahman'),
(370, '29-10-2019', 1572339123, 'Edit Profile', 'Fathurrahman'),
(369, '29-10-2019', 1572339108, 'Login', 'Fathurrahman'),
(368, '24-10-2019', 1571898900, 'Login', 'Fathurrahman'),
(367, '21-10-2019', 1571669922, 'Login', 'Fathurrahman'),
(366, '05-10-2019', 1570239803, 'Edit Profile', 'Fathurrahman'),
(365, '05-10-2019', 1570239771, 'Edit Profile', 'Fathurrahman'),
(364, '05-10-2019', 1570239712, 'Edit Profile', 'Fathurrahman'),
(363, '05-10-2019', 1570239377, 'Login', 'Fathurrahman'),
(362, '05-10-2019', 1570238418, 'Logout', 'Fathurrahman'),
(361, '05-10-2019', 1570238410, 'Login', 'Fathurrahman'),
(360, '05-10-2019', 1570236817, 'Logout', 'Fathurrahman'),
(359, '05-10-2019', 1570236803, 'Login', 'Fathurrahman'),
(358, '05-10-2019', 1570236483, 'Logout', 'Fathurrahman'),
(357, '05-10-2019', 1570236255, 'Login', 'Fathurrahman'),
(356, '05-10-2019', 1570236140, 'Logout', 'Fathurrahman'),
(355, '05-10-2019', 1570235956, 'Login', 'Fathurrahman'),
(354, '05-10-2019', 1570235940, 'Logout', 'Fathurrahman'),
(353, '05-10-2019', 1570235933, 'Login', 'Fathurrahman'),
(352, '18-09-2019', 1568739039, 'Login', 'Fathurrahman'),
(351, '10-09-2019', 1568073382, 'Login', 'Fathurrahman');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', '/admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 1, 'Setting', '/admin/settings', 'fas fa-fw fa-cog', 1),
(3, 1, 'Buat Akun Baru', '/admin/new_account', 'fas fa-fw fa-user-plus', 1),
(4, 2, 'My Profile', '/user/profile', 'fas fa-fw fa fa-user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angkatan`
--

CREATE TABLE `tbl_angkatan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `total_peserta` int(11) NOT NULL,
  `total_matkul` int(11) NOT NULL,
  `total_tutor` int(11) NOT NULL,
  `total_calon` int(11) NOT NULL,
  `semester` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_angkatan`
--

INSERT INTO `tbl_angkatan` (`id`, `tahun`, `start_date`, `total_peserta`, `total_matkul`, `total_tutor`, `total_calon`, `semester`) VALUES
(9, '2019', '2019-09-03', 0, 3, 0, 1, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `id` varchar(25) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`id`, `nama_matkul`, `semester`, `jurusan`) VALUES
('MK3', 'Aplikasi Berbasis Desktop', 'Semester 4', 'S1 Teknik Informatika'),
('MK4', 'Pemrograman Web Dasar', 'Semester 2', 'D3 RPL'),
('MK5', 'Sistem Basis Data', 'Semester 2', 'S1 Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` varchar(25) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkul1` varchar(25) NOT NULL,
  `matkul2` varchar(25) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `nim`, `nama`, `jenis_kelamin`, `tgl`, `semester`, `jurusan`, `kontak`, `email`, `matkul1`, `matkul2`, `img`) VALUES
('REG1', '1710530203', 'Fathurrahman', 'Laki-Laki', '1567773032', 'Semester 5', 'D3 MI', '083142808426', 'tester@mail.com', 'MK3', 'tidak memilih', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rule`
--

CREATE TABLE `tbl_rule` (
  `id` int(11) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `value` varchar(250) NOT NULL,
  `volume` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rule`
--

INSERT INTO `tbl_rule` (`id`, `kategori`, `nama`, `value`, `volume`) VALUES
(1, 'Pengaturan Jadwal Pendaftaran', 'Day/ Gelombang', '10', 'Hari'),
(2, 'Pengaturan Jadwal Pendaftaran', 'Jeda/ Gelombang', '1', 'Hari');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `image`, `role_id`, `tgl_buat`) VALUES
('5ccd27fba8af7', 'Fathurrahman', 'fathur.ashter15@gmail.com', '$2y$10$Z3HdBQ24vYcnvLFoYv30.eDOJr6JthOVqMG24j7VUh7G4x9OID2za', '5d97f51bc7295.png', 1, 1556948987),
('5d163404b049b', 'Hendri Jayadi', 'Hendri.j@gmail.com', '$2y$10$2i3.dxH5Z6YeJuMskRP9kOff/dhLPCm8DJQ0ppP3GKEgK1Hz9tJty', 'default.jpg', 2, 1561736196);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Administrator'),
(2, 'Pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Pengajar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwaldaftar`
--
ALTER TABLE `jadwaldaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logdaftar`
--
ALTER TABLE `logdaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matkul1` (`matkul1`);

--
-- Indexes for table `tbl_rule`
--
ALTER TABLE `tbl_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwaldaftar`
--
ALTER TABLE `jadwaldaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logdaftar`
--
ALTER TABLE `logdaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_rule`
--
ALTER TABLE `tbl_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`matkul1`) REFERENCES `tbl_matkul` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
