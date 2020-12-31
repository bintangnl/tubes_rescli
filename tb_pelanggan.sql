-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2020 pada 13.10
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_ps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(10) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_ps` varchar(50) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama_pel`, `alamat`, `jenis_ps`, `tgl_sewa`, `tgl_kembali`) VALUES
(1, 'Sujiwo Tejo', 'Blitar', 'PS 3', '2020-12-01', '2020-12-02'),
(3, 'Bintang Nur Laksana', 'Blitar', 'PS 2', '2020-12-23', '2020-12-24'),
(4, 'Yosep Armindos ', 'Madiun', 'PS 3', '2020-12-02', '2020-12-08'),
(5, 'Gading WIga', 'Surabaya', 'PS 2', '2020-12-08', '2021-01-01'),
(6, 'Naufal dio', 'Madiun', 'PS 2', '2020-12-01', '2020-12-10'),
(7, 'Dodit Mulyanto', 'Jakarta', 'PS 3', '2020-12-10', '2020-12-12'),
(8, 'Budi Sudarsono', 'Ponorogo', 'PS 2', '2020-11-01', '2020-12-02'),
(9, 'Marsinah', 'Ngawi', 'PS 3', '2020-12-22', '2020-12-25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
