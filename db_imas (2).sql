-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2024 pada 18.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_imas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `id_kriteria` int(15) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `nilai_bobot` float NOT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_bobot`, `atribut`) VALUES
(1, 'Nilai Rapot (rata-rata)', 0.4, 'Benefit'),
(3, 'Sikap/Karakter', 0.3, 'Benefit'),
(5, 'Ekstrakurikuler', 0.2, 'Benefit'),
(7, 'Kehadiran/Absensi', 0.1, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penilaian`
--

CREATE TABLE `data_penilaian` (
  `id_penilaian` int(15) NOT NULL,
  `id_alter` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_subkriteria`
--

CREATE TABLE `data_subkriteria` (
  `id_sub` int(15) NOT NULL,
  `id_kriteria` int(15) DEFAULT NULL,
  `nama_subkriteria` varchar(120) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_subkriteria`
--

INSERT INTO `data_subkriteria` (`id_sub`, `id_kriteria`, `nama_subkriteria`, `keterangan`, `nilai`) VALUES
(1, 2, '95-100', 'Sangat Tinggi', 10),
(3, 2, '93-95', 'Tinggi', 9),
(4, 2, '90-92', 'Cukup Tinggi', 8),
(5, 2, '86-88', 'Sangat Baik', 7),
(6, 2, '83-85', 'Baik', 6),
(7, 2, '80-82', 'Cukup Baik', 5),
(8, 2, '77-79', 'Sedang', 4),
(9, 2, '74-76', 'Kurang', 3),
(10, 2, '71-73', 'Cukup Kurang ', 2),
(11, 2, '-70', 'Sangat Kurang', 1),
(12, 3, 'A', 'Sangat Baik', 5),
(13, 3, 'B', 'Baik', 4),
(14, 3, 'C', 'Cukup', 3),
(15, 3, 'D', 'Kurang ', 2),
(16, 3, 'E', 'Sangat Kurang', 1),
(17, 4, 'A', 'Sangat Baik', 8),
(18, 4, 'B', 'Baik', 7),
(19, 4, 'C', 'Cukup', 5),
(20, 4, 'D', 'Kurang', 3),
(21, 4, 'E', 'Nihil', 1),
(23, 7, '1 sampai 3', 'Baik', 7),
(24, 7, '4 sampai 5', 'Cukup', 5),
(25, 7, '6 sampai 10', 'Kurang', 3),
(26, 7, 'lebih dari 10', 'Sangat Kurang', 1),
(67, 2, '-10', 'Buruk Sekali', 0),
(68, 3, 'F', 'Buruk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_normalisasi`
--

CREATE TABLE `hasil_normalisasi` (
  `id_nom` int(15) NOT NULL,
  `id_alter` int(15) NOT NULL,
  `id_kriteria` int(15) NOT NULL,
  `hasil_nom` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_preferensi`
--

CREATE TABLE `hasil_preferensi` (
  `id_pref` int(15) NOT NULL,
  `id_alter` int(15) NOT NULL,
  `hasil_pref` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kode_kehadiran` varchar(5) NOT NULL,
  `nama_kehadiran` varchar(20) NOT NULL,
  `nilai` int(2) NOT NULL,
  `bobot` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`kode_kehadiran`, `nama_kehadiran`, `nilai`, `bobot`) VALUES
('H', 'Hadir', 1, '1'),
('I', 'Izin', 1, '0.5'),
('S', 'Sakit', 1, '0.5'),
('A', 'Alpa', 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `status`, `foto`) VALUES
(1, 'ADNAN', 'adnan@esemka.biz.id', '9a5ac271e1d2ab3016067799267efbce29f23490', '1', 'WhatsApp Image 2023-10-12 at 20.32.22_171f2dd0.jpg'),
(3, 'ADNAN', 'adnan', '8cb2237d0679ca88db6464eac60da96345513964', '1', 'Kuning merah berilustrasi ayam geprek logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `email`, `password`, `foto`, `status`) VALUES
(5, '001', 'Fatmawati S.Pd', 'fatmawati@gmail.com', 'e193a01ecf8d30ad0affefd332ce934e32ffce72', 'guru.png', 1),
(6, '002', 'Rahayu S.Pd', 'rahayu@gmail.com', '6fc978af728d43c59faa400d5f6e0471ac850d4c', '17603.png', 1),
(7, '003', 'Jaka Subadri S.Pd', 'jakasubadri@gmail.com', '221407c03ae5c73109cce71d27e24637824f3333', '355-3553881_stockvader-predicted-adig-user-profile-icon-png-clipart.jpg', 1),
(8, '005', 'Tiwi Sukmawati S.Pd', 'tiwisukmawati@gmail.com', 'de1f53b6fbc3fecd35b0bbc963e21902a149e5e3', '17603.png', 1),
(10, '101', 'juslihg', 'juslifatuladnan@gmail.com', '5e9795e3f3ab55e7790a6283507c085db0d764fc', 'Purple & Grey Modern Computer Logo.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kepsek`
--

CREATE TABLE `tb_kepsek` (
  `id_kepsek` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_kepsek` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kepsek`
--

INSERT INTO `tb_kepsek` (`id_kepsek`, `nip`, `nama_kepsek`, `email`, `password`, `foto`, `status`) VALUES
(1, '1234567890112', 'Amiruddin Aziz M.Pd', 'amirudiin@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kepala.png', 0),
(2, '111', 'ADNANN', 'juslifatul146@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'Kuning merah berilustrasi ayam geprek logo.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(40) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_mapel`
--

INSERT INTO `tb_master_mapel` (`id_mapel`, `kode_mapel`, `mapel`) VALUES
(1, 'MP-1561560093', 'Bahasa Indonesia'),
(2, 'MP-1561560129', 'Matematika'),
(3, 'MP-1561871991', 'Biologi'),
(4, 'MP-1561872004', 'Sejarah'),
(5, 'MP-1561872013', 'Teknologi Informasi'),
(6, 'MP-1561872026', 'Seni Budaya'),
(7, 'MP-1561872043', 'Bahasa Inggris'),
(8, 'MP-1615002340', 'Ilmu Pengetahuan Alam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `kode_pelajaran` varchar(30) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `jam_mengajar` varchar(60) NOT NULL,
  `jamke` varchar(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_thajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `kode_pelajaran`, `hari`, `jam_mengajar`, `jamke`, `id_guru`, `id_mapel`, `id_mkelas`, `id_semester`, `id_thajaran`) VALUES
(1, 'MPL-1614670924', 'Senin', '09.00-10.00', '1-2', 1, 1, 1, 1, 2),
(2, 'MPL-1614674537', 'Senin', '09.00-10.00', '1-2', 5, 1, 1, 1, 2),
(4, 'MPL-1615004563', 'Senin', '08.00-09.00', '1', 6, 2, 3, 2, 2),
(5, 'MPL-1616288498', 'Rabu', '09.00-10.00', '2', 8, 7, 1, 2, 2),
(6, 'MPL-1582242668', 'Senin', '08.00-09.00', '1', 5, 1, 1, 4, 8),
(9, 'MPL-1704392901', 'Senin', '09.00-10.00', '2', 5, 1, 5, 5, 9),
(10, 'MPL-1704994431', 'Selasa', '09.00-10.00', '2', 6, 2, 5, 5, 9),
(11, 'MPL-1705505838', 'Selasa', '09.00-10.00', '2', 5, 3, 5, 5, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mkelas`
--

CREATE TABLE `tb_mkelas` (
  `id_mkelas` int(11) NOT NULL,
  `kd_kelas` varchar(40) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mkelas`
--

INSERT INTO `tb_mkelas` (`id_mkelas`, `kd_kelas`, `nama_kelas`) VALUES
(5, 'KL-1616673105', 'VIIi'),
(6, 'KL-1616673114', 'VIII'),
(7, 'KL-1616673120', 'XI'),
(8, 'KL-1704296601', 'X TKJ'),
(9, 'KL-1704382893', 'X TKJ'),
(10, 'KL-1704383178', 'X TKJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`) VALUES
(4, 'Ganjil', 0),
(5, 'Genap', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(60) NOT NULL,
  `nama_siswa` varchar(120) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `id_mkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `password`, `foto`, `status`, `th_angkatan`, `id_mkelas`) VALUES
(5, '121212', 'ZUZLIFATUL', 'adafd', '2023-11-29', 'Laki-laki', 'dsassssssa', '48058e0c99bf7d689ce71c360699a14ce2f99774', 'IMG-20230810-WA0013.jpg', '1', 2020, 5),
(8, '121212', 'ADNAN', 'Kab. Lampung Timur', '2024-01-03', 'Laki-laki', '21wassa', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Kuning merah berilustrasi ayam geprek logo.png', '1', 2019, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_thajaran`
--

CREATE TABLE `tb_thajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_thajaran`
--

INSERT INTO `tb_thajaran` (`id_thajaran`, `tahun_ajaran`, `status`) VALUES
(7, '2019/2020', 0),
(8, '2020/2021', 0),
(9, '2023/2024', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_walikelas`, `id_guru`, `id_mkelas`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 5, 3),
(4, 6, 1),
(5, 8, 2),
(6, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_logabsensi`
--

CREATE TABLE `_logabsensi` (
  `id_presensi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket` enum('H','I','S','T','A') NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `_logabsensi`
--

INSERT INTO `_logabsensi` (`id_presensi`, `id_mengajar`, `id_siswa`, `tgl_absen`, `ket`, `pertemuan_ke`) VALUES
(37, 9, 5, '2024-01-16', 'H', '1'),
(38, 9, 6, '2024-01-16', 'H', '1'),
(39, 9, 5, '2024-01-17', 'H', '2'),
(40, 9, 6, '2024-01-17', 'H', '2'),
(41, 9, 5, '2024-01-25', 'H', '3'),
(42, 9, 8, '2024-01-25', 'H', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `data_penilaian`
--
ALTER TABLE `data_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `data_penilaian_FK_1` (`id_alter`) USING BTREE,
  ADD KEY `data_penilaian_FK` (`id_kriteria`) USING BTREE;

--
-- Indeks untuk tabel `data_subkriteria`
--
ALTER TABLE `data_subkriteria`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `data_subkriteria_FK` (`id_kriteria`);

--
-- Indeks untuk tabel `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  ADD PRIMARY KEY (`id_nom`),
  ADD UNIQUE KEY `hasil_normalisai_FK_1` (`id_kriteria`),
  ADD KEY `hasil_normalisai_FK` (`id_alter`);

--
-- Indeks untuk tabel `hasil_preferensi`
--
ALTER TABLE `hasil_preferensi`
  ADD PRIMARY KEY (`id_pref`),
  ADD UNIQUE KEY `hasil_preferensi_FK` (`id_alter`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kode_kehadiran`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indeks untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  ADD PRIMARY KEY (`id_mkelas`);

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indeks untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_walikelas`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `id_kriteria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `data_penilaian`
--
ALTER TABLE `data_penilaian`
  MODIFY `id_penilaian` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_subkriteria`
--
ALTER TABLE `data_subkriteria`
  MODIFY `id_sub` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  MODIFY `id_nom` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_preferensi`
--
ALTER TABLE `hasil_preferensi`
  MODIFY `id_pref` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kepsek`
--
ALTER TABLE `tb_kepsek`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  MODIFY `id_mkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
