-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 08:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`nama_kategori`) VALUES
('Gratifikasii'),
('Korupsi'),
('Koruptor'),
('Penyalagunaan Wewenang'),
('Suap Uang');

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('3212086268320001', 'Alim', 'Alim', '$2y$10$ScoCsCDSODfRkbBsKNukpupWiLC5yVcz/eLG8IxavJKRUzMQcxw3C', '085276587356'),
('2021503068', 'Tolak Idayati', 'Tolak Idayati', '$2y$10$4mUqlVh3Hg1/2OHcVoKVaewJbxxKZUfe5TkKatesoV2.8duO71TZm', '085157628603');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `nama_kategori` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_pengadu` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `nama_skpd` varchar(50) NOT NULL,
  `kronologi` text NOT NULL,
  `status` enum('ditanggapi','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`nama_kategori`, `tgl`, `nik`, `nama_pengadu`, `alamat`, `no_telp`, `nama_skpd`, `kronologi`, `status`) VALUES
('Gratifikasi', '2023-01-30', '32120938320001', 'inayati', 'banyuputih', '085697185923', 'BABPEDA', 'iyaaa jangan', 'ditanggapi'),
('Korupsi', '2023-01-31', '3212086268320001', 'mina', 'bondowoso', '0898267553932', 'BPR Syariah Situbondo', 'korupsi bisa menghancurkan dinas dan penyalahgunaan uang untuk kepentingan pribadi', 'ditanggapi'),
('Penyalagunaan Wewenang', '2023-01-27', '32120938320001', 'aca', 'asembagus', '085697185923', 'Badan Kesatuan Bangsa dan Politik', 'penyalagunaan atas wewenang yang dipegangnya', 'selesai'),
('Suap Uang', '2023-01-31', '3212086268320001', 'opip', 'banyuwangi', '085697185923', 'Badan Kesatuan Bangsa dan Politik', 'pemberian uang sogok kepada petugas untuk menyelamatkan diri', 'ditanggapi');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nama_petugas` varchar(50) NOT NULL,
  `username_petugas` varchar(50) NOT NULL,
  `password_petugas` varchar(255) NOT NULL,
  `telp_petugas` varchar(50) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nama_petugas`, `username_petugas`, `password_petugas`, `telp_petugas`, `level`) VALUES
('Drs.  W I Y O N O.', 'wiyono', 'wiyono', '085285986233', 'petugas'),
('Drs. H. AKHMAD YULIANTO. M.Si', 'akhmad', 'akhmad', '0876986257635', 'petugas'),
('Drs. Widianto', 'widianto', 'widianto', '082657984765', 'petugas'),
('Tolak Idayati', 'admin', 'admin', '085285719233', 'admin'),
('Ir. PUGUH SETIJARTO', 'puguh', 'puguh', '0986257635', 'petugas'),
('JONAIDI, S.H.', 'jonaidi', 'jonaidi', '085426257635', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `skpd`
--

CREATE TABLE `skpd` (
  `nama_skpd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skpd`
--

INSERT INTO `skpd` (`nama_skpd`) VALUES
('Badan Kesatuan Bangsa dan Politik'),
('Badan Penanggulangan Bencana Daerah'),
('BAPPEDA'),
('BPPKAD'),
('BPR Syariah Situbondo'),
('Dinas Kependudukan dan Pencatatan Sipil'),
('Dinas Kesehatan'),
('Dinas Ketahanan Pangan'),
('Dinas Komunikasi, Informatika, dan Persandian'),
('Dinas Koperasi dan Usaha Mikro'),
('Dinas Lingkungan Hidup'),
('Dinas Pariwisataa'),
('Dinas Pekerjaan Umum dan Penataan Ruang'),
('Dinas Pemberdayaan Masyarakat dan Desa'),
('Dinas Pemberdayaan Perempuan dan Perlindungan Anak'),
('Dinas Penanaman Modal dan Pelayanan Terpadu Satu P'),
('Dinas Pendidikan dan Kebudayaan Situbondo'),
('Dinas Pengendalian Penduduk dan KB'),
('Dinas Perdagangan'),
('Dinas Perdagangan dan Perindustrian'),
('Dinas Perhubungan'),
('Dinas Perikanan'),
('Dinas Perpustakaan dan Kearsipan'),
('Dinas Perumahan dan Kawasan Pemukiman'),
('Dinas Peternakan dan Kesehatan Hewan'),
('Dinas Sosial'),
('Dinas Tanaman Pangan, Holtikultura dan Perkebunan'),
('Dinas Tenaga Kerja'),
('Inspektorat'),
('Kecamatan Arjasa');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`tgl_tanggapan`, `tanggapan`) VALUES
('2023-01-27', 'Kerahasiaan identitas pelapor dijamin selama pelapor tdak mempublikasikan sendiri perihal laporan tersebut'),
('2023-01-30', 'ohhh begitu iya sudah'),
('2023-01-31', 'jangan memberikan uang sogok terlalu banyak kepada petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`nama_kategori`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`nama_kategori`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nama_petugas`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`nama_skpd`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`tgl_tanggapan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
