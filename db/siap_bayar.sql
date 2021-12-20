-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2021 at 06:52 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap_bayar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nik` bigint(20) NOT NULL,
  `nok` bigint(20) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `alamat_ortu` varchar(258) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nik`, `nok`, `nama_siswa`, `jenis_kelamin`, `kelas_id`, `nama_ayah`, `nama_ibu`, `alamat_ortu`) VALUES
(7, 12345, 54321, 'Ani', 'Perempuan', 7, 'Joki', 'Jingga', 'Jl. Pekanbaru'),
(8, 987, 57868, 'bunga', 'Perempuan', 7, 'jono', 'julia', 'jl. cengkeh'),
(9, 1626, 123, 'HFSD', 'Laki-laki', 7, 'HHA', 'HF', 'HJJH'),
(10, 1213, 13, 'EFSD', 'Laki-laki', 7, 'DSF', 'SDGFS', 'DGS');

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id` int(11) NOT NULL,
  `bulan_bayar` varchar(128) NOT NULL,
  `jmlh_bayar_lunas` bigint(20) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id`, `bulan_bayar`, `jmlh_bayar_lunas`, `tahun`) VALUES
(14, 'Januari', 50000, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL,
  `id_kurikulum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `id_kurikulum`) VALUES
(7, 'Kelas 1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tahun` int(11) NOT NULL,
  `semester` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `nama`, `tahun`, `semester`) VALUES
(3, 'K-2013 Paket', 2021, 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `bulan_bayar` varchar(128) NOT NULL,
  `tahun_bayar` bigint(20) NOT NULL,
  `jmlh_bayar` bigint(20) NOT NULL,
  `status` varchar(128) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `tgl_bayar` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_siswa`, `bulan_bayar`, `tahun_bayar`, `jmlh_bayar`, `status`, `sisa`, `tgl_bayar`, `nama_petugas`) VALUES
(27, 7, 'Desember', 2021, 50000, 'Lunas', 0, 1638027950, 'Admin'),
(28, 8, 'Januari', 2021, 50000, 'Lunas', 0, 1638028007, 'Admin'),
(29, 8, 'Januari', 2021, 50000, 'Lunas', 0, 1638028007, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'Admin', 'admin@gmail.com', 'computer.png', '$2y$13$8nvKA6rSfrk6GadP0O1Y1.qpPCfLFylDQVl/4aq9QJyQEvd5z37DW', 1, 1, 1571583076),
(8, 'Intan', 'intan@gmail.com', 'user-profile-icon-7.jpg', '$2y$13$8nvKA6rSfrk6GadP0O1Y1.qpPCfLFylDQVl/4aq9QJyQEvd5z37DW', 1, 1, 1576980466),
(12, 'Nila', 'nila@gmail.com', 'computer.png', '$2y$13$8nvKA6rSfrk6GadP0O1Y1.qpPCfLFylDQVl/4aq9QJyQEvd5z37DW', 3, 1, 878787),
(13, 'Ina Anggraini', 'users@gmail.com', 'default.jpg', '$2y$13$8nvKA6rSfrk6GadP0O1Y1.qpPCfLFylDQVl/4aq9QJyQEvd5z37DW', 3, 1, 1639305947);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 4),
(5, 1, 4),
(6, 3, 3),
(8, 1, 3),
(9, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'walikelas'),
(4, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Walikelas');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 4, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 4, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(8, 4, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 2, 'Data Siswa', 'siswa', 'fas fa-fw fa-user', 1),
(11, 2, 'Tambah Siswa', 'siswa/tambahsiswa', 'fas fa-fw fa-users', 1),
(12, 2, 'Transaksi', 'siswa/transaksi', 'fas fa-fw fa-cash-register', 1),
(14, 3, 'Wali Kelas', 'walikelas', 'fas fa-fw fa-chalkboard-teacher', 1),
(15, 6, 'Wali Kelas', 'teacher', 'fas fa-fw fa-chalkboard-teacher', 1),
(16, 1, 'Master', 'admin/master', 'fas fa-fw fa-database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'salahul.bain@gmail.com', '1Hhk07PDKI2IztOZycD0HxetyG0mTCvYEiJW+WW2f3w=', 1572755551),
(4, 'salahul.bain@gmail.com', 'PLoRjekBgIOjF81HWfVCH1Jf02J8zE3W2nuG+5Grlw8=', 1572757912),
(5, 'salahul.bain@gmail.com', 'Lau66LGCMJbWDas6eR+qyLMggMLn5dbcB59Zabnuz9g=', 1572758051),
(7, 's1c.salahul1@gmail.com', 'ZY9K6bBNmZvuxunkHdOYiDxzxFGLOvHvdLrUIlzq2o0=', 1572801090),
(8, 'fazryanp@gmail.com', 'uWTwpdT7L+atxMOa+2ubf4DRQWyKEauyOO+YxWulYIs=', 1573876944),
(9, 'admin@gmail.com', '77819tCIqgO1oWZ9dItyNiz5TfOA8KfRHsgGRRXJny0=', 1638685710),
(10, 'intan@gmail.com', 'JmJK6Py5gconylTU7FztRJq9EcMzmsZ9dQN7/rcicxI=', 1638686361),
(11, 'admin@gmail.com', '/6CvE7loVK04Mc05wbZXbCS3Zx7eikHMtFjKK1VLQU4=', 1638697739);

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`id`, `name`, `email`, `kelas_id`, `date_created`) VALUES
(1, 'Nila', 'nila@gmail.com', 7, 78787),
(2, 'Ina Anggraini', 'users@gmail.com', 7, 1639305947);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `walikelas`
--
ALTER TABLE `walikelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
