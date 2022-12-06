-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2022 pada 13.56
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `wisata` int(11) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `pengunjung_dewasa` int(11) NOT NULL,
  `pengunjung_anak` int(11) NOT NULL,
  `total_bayar` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `jenis_kel`, `no_hp`, `email`, `username`, `password`, `role`) VALUES
(1, '35021', 'Admin', 'Laki-Laki', '3858375476537', 'gdsggsdg@gmail.com', 'admin', '25f9e794323b453885f5181f1b624d0b', 1),
(5, '35022', 'Jefa Ilham Prayoga', 'Laki-Laki', '4893853827', 'fdfdfd@gmail.com', 'jefa', '25f9e794323b453885f5181f1b624d0b', 2),
(6, '35023', 'Jepi Ilhim Priyigi', 'Laki-Laki', '84937593725', 'sfdsfe@gmail.com', 'yigi', '25f9e794323b453885f5181f1b624d0b', 2),
(7, '35024', 'jepri', 'Laki-Laki', '80923707523', 'jepri@gmail.com', 'jepri', '25f9e794323b453885f5181f1b624d0b', 2),
(8, '35032', 'Bu izza', 'Perempuan', '90375489375', 'iza@gmail.com', 'izza', '25f9e794323b453885f5181f1b624d0b', 2),
(9, '367624564764833', 'Medi', 'Laki-Laki', '385903857', 'sagu@gmail.com', 'medi', '25f9e794323b453885f5181f1b624d0b', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `lokasi_wisata` varchar(255) NOT NULL,
  `harga_tiket` int(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `lokasi_wisata`, `harga_tiket`, `gambar`, `link`) VALUES
(2, 'Telaga Ngebel', 'Kecamatan Ngebel, Kabupaten Ponorogo,Jawa Timur', 5000, '21102022034928ngebel.jpg', 'https://www.youtube.com/embed/yCE-fU_F7Rw'),
(5, 'Air Terjun Sunggah', 'Kecamatan Ngrayun, Kabupaten Ponorogo, Jawa Timur', 15000, '21102022174617air-terjun.jpg', 'https://www.youtube.com/embed/F2I1d5S0oD0'),
(6, 'Gunung Bayangkaki', 'Kecamatan Sawoo, Kabupaten Ponorogo, Jawa Timur', 10000, '21102022174215BAYANG1.jpg', 'https://www.youtube.com/embed/WTRlvJOZpwo');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
