-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jan 2021 pada 18.36
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kriptografi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jadwal` datetime NOT NULL,
  `topik_konsel` varchar(255) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `d_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `nama`, `no_telp`, `jadwal`, `topik_konsel`, `ket`, `d_email`) VALUES
(1, 'budi', '082296365028', '2021-01-13 12:00:00', 'TSMEZELX', 'EYVSF FLDU ILBZY OS FGYQSYW XUILR', 'coba@gmail.com'),
(2, 'ilham', '082123456789', '2021-01-13 13:30:00', 'BCYNUBTUML', 'PGVOXSLBUL OKDG VOXYD UMPYK FGOKW KPXSCCTMILX BP', 'coba@gmail.com'),
(5, 'Teguh', '081123456789', '2021-01-14 10:00:00', 'ABOOI', 'RFOQVPNXJ AKEKND CLY UEA RFOAAYAW QBSVGNJBK', 'doktera@gmail.com'),
(6, 'Bujang', '087987654321', '2021-01-14 13:15:00', 'CBPGCEU KNRS', 'CFKPRHV RBEGE TRCCFIRVNQO QKKEAWHX', 'doktera@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `name`, `password`, `status`) VALUES
('coba@gmail.com', 'coba', '$2y$10$7AIJEJ2.s9WQRQyNiWdHXeu2XLI9KW60r3nmg9nK2lgLN/mmgPCPi', 1),
('doktera@gmail.com', 'doktera', '$2y$10$Oa/6JDMt83pLtB9VZPNtE.LLM.U76Bgu7unC1C8VI8.y6bSf7/i9W', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
