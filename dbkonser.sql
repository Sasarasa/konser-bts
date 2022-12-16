-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2022 pada 12.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkonser`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `nama_admin` varchar(100) DEFAULT NULL,
  `jabatan` char(50) DEFAULT NULL,
  `password` char(10) DEFAULT NULL,
  `ID` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`nama_admin`, `jabatan`, `password`, `ID`) VALUES
('Farhan', 'Admin', '123456', 'U0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `no_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `nomor_hp` char(15) DEFAULT NULL,
  `password` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`no_pelanggan`, `nama_pelanggan`, `nomor_hp`, `password`) VALUES
('ID79826', 'Risky Ayu Oktavina', '123456787', 'abcdefg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` char(10) NOT NULL,
  `tgl_lobby` date DEFAULT NULL,
  `no_pelanggan` char(10) DEFAULT NULL,
  `konfirmasi` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `tgl_lobby`, `no_pelanggan`, `konfirmasi`) VALUES
('TID79826', '2022-12-15', 'ID79826', 'Menunggu K');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`no_pelanggan`);

--
-- Indeks untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `no_pelanggan` (`no_pelanggan`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD CONSTRAINT `tb_tiket_ibfk_1` FOREIGN KEY (`no_pelanggan`) REFERENCES `tb_pelanggan` (`no_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
