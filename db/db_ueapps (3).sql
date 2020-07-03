-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 06.18
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ueapps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` int(10) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `jenis_kelamin`, `no_telepon`, `alamat`, `Password`, `username`) VALUES
(21121, 'Surya Atmaji', 'L', '081721972112', 'Jl. Rajawali Ampat V', 'atmaji1212', 'atmaji1212'),
(21673, 'ineke', 'P', '081397183', 'Jl. Edelweis 8, Tambun Utara', 'dosen123', 'dosen123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` int(3) NOT NULL,
  `nim` int(12) NOT NULL,
  `id_soal` int(5) NOT NULL,
  `nilai` decimal(6,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `nim`, `id_soal`, `nilai`) VALUES
(376, 7070013, 1, '56.716'),
(377, 7070013, 4, '72.000'),
(379, 7070273, 1, '81.633'),
(381, 7070273, 3, '37.288'),
(386, 7070651, 1, '39.437'),
(388, 7070651, 3, '33.333'),
(401, 7070521, 1, '74.667'),
(907, 7070066, 1, '78.873'),
(908, 7070066, 3, '33.333'),
(909, 7070066, 4, '81.818'),
(910, 7070066, 2, '100.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(5) NOT NULL,
  `id_soal` int(5) NOT NULL,
  `jawaban` varchar(400) NOT NULL,
  `nim` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal`, `jawaban`, `nim`) VALUES
(12, 1, 'untuk create, update, serta delete', 7070273),
(13, 1, 'fungsi dari laravel untuk update   delete data', 7070013),
(14, 4, 'Memudahkan dalam melakukan pekerjaan dengan cepat dan stabil', 7070013),
(17, 3, 'Method DALAM LARAVEL YANG MEMBANTU, memudahkan : kinerja', 7070273),
(18, 1, 'eloquent memiliki fungsi UNTUK DELETE, Update, Create', 7070651),
(20, 3, 'method dalam laravel berfungsi untuk update delete laravel', 7070651),
(21, 1, 'eloquent berfungsi untuk create update dan delete dalam laravel', 7070521),
(23, 1, 'dalam laravel berfungsi untuk update delete laravel', 7070066),
(24, 3, 'mcv berfungsi sebagai view ', 7070066),
(25, 4, 'bertutur berujar agar mudah, cepat dan stabil', 7070066),
(26, 2, 'create', 7070066);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(12) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `program_studi` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `jurusan`, `program_studi`, `jenis_kelamin`, `Password`, `username`) VALUES
(7070013, 'Alyani Zhafarina', 'TIK', 'TI', 'P', 'alyani', 'zha'),
(7070031, 'Fadhil Baskoro Utomo', 'TIK', 'TI', 'L', '', ''),
(7070044, 'Fahmia Amelia', 'TIK', 'TI', 'P', 'miaw', 'miaw'),
(7070053, 'Fathan Jundi Rabbani', 'TIK', 'TI', 'L', '', ''),
(7070066, 'Fina Setianingrum', 'TIK', 'TI', 'P', 'fina', 'fina'),
(7070108, 'Mochamad Rafli Nurfauzan', 'TIK', 'TI', 'L', '', ''),
(7070143, 'Muhammad Ridho Pangestu', 'TIK', 'TI', 'L', '', ''),
(7070183, 'Naufal Rizqi Aprilio', 'TIK', 'TI', 'L', '', ''),
(7070273, 'Aida Mahmudah', 'TIK', 'TI', 'P', 'aida', 'aida'),
(7070304, 'Alia Ismayanti', 'TIK', 'TI', 'P', 'may', 'maya'),
(7070391, 'Argya Harianto Putra', 'TIK', 'TI', 'L', '', ''),
(7070421, 'Bangkit Amsal Sulaeman Gultom', 'TIK', 'TI', 'L', '', ''),
(7070473, 'Daffa Shidqi', 'TIK', 'TI', 'L', '', ''),
(7070521, 'Diana Anggraini', 'TIK', 'TI', 'P', 'diana', 'diana'),
(7070651, 'Halidzha Esfandania Davisya', 'TIK', 'TI', 'P', 'liliz', 'liliz'),
(7070703, 'Hayyu Hudoyo Dwipradityo', 'TIK', 'TI', 'L', '', ''),
(7071103, 'Phiedo Rachmadian Yusfendri', 'TIK', 'TI', 'L', '', ''),
(7071134, 'Rafialdy Cakra Mussafa', 'TIK', 'TI', 'L', '', ''),
(7071251, 'Sultan Muhammad Dhiya Ulhaq', 'TIK', 'TI', 'L', '', ''),
(7071286, 'Taufik Maulana', 'TIK', 'TI', 'L', '', ''),
(7071339, 'Yusuf Nurul Izzah', 'TIK', 'TI', 'L', '', ''),
(7071351, 'Ahmad Farid Muharram ', 'TIK', 'TI', 'L', '', ''),
(7071363, 'Arfianto Bismantoro', 'TIK', 'TI', 'L', '', ''),
(7071371, 'Yudha Papua Setyo Atmaji', 'TIK', 'TI', 'L', '', ''),
(7071372, 'Chandra Sukmagalih', 'TIK', 'TI', 'L', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(5) NOT NULL,
  `nim` int(12) NOT NULL,
  `hasil` decimal(6,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `nim`, `hasil`) VALUES
(69, 7070013, '75.000'),
(71, 7070273, '42.634'),
(75, 7070651, '31.096'),
(81, 7070521, '30.962'),
(86, 7070066, '73.506');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(5) NOT NULL,
  `soal_text` varchar(300) NOT NULL,
  `kunci_jawaban` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `soal_text`, `kunci_jawaban`) VALUES
(1, 'Apa fungsi eloquent?', 'berfungsi untuk create update delete pada laravel'),
(2, '\'..... DATABASE buku\' berfungsi untuk menbuat database baru dengan nama buku', 'CREATE'),
(3, 'Apa kepanjangan dari MVC', 'merupakan model view controller'),
(4, 'Apakah peran sebuah framework ', 'mudah cepat stabil dalam kerja laravel');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim_2` (`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `nip` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21674;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
