-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2022 pada 06.51
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eks_mlng`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `draft_naskah_kerjasama`
--

CREATE TABLE `draft_naskah_kerjasama` (
  `id_dnk` int(11) NOT NULL,
  `nama_dnk` enum('Rencana Kerjasama','Kesepakatan Bersama/MOU','Perjanjian Kerjasama EKS','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `draft_naskah_kerjasama`
--

INSERT INTO `draft_naskah_kerjasama` (`id_dnk`, `nama_dnk`) VALUES
(1, 'Rencana Kerjasama'),
(2, 'Kesepakatan Bersama/MOU'),
(3, 'Perjanjian Kerjasama EKS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_surat`
--

CREATE TABLE `kategori_surat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` enum('Dalam Negeri','Luar Negeri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_surat`
--

INSERT INTO `kategori_surat` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Dalam Negeri'),
(2, 'Luar Negeri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kerjasama`
--

CREATE TABLE `status_kerjasama` (
  `id_status_kerjasama` int(11) NOT NULL,
  `nama_status_kerjasama` enum('Baru','Perpanjang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_kerjasama`
--

INSERT INTO `status_kerjasama` (`id_status_kerjasama`, `nama_status_kerjasama`) VALUES
(1, 'Baru'),
(2, 'Perpanjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_surat`
--

CREATE TABLE `status_surat` (
  `id_status` int(11) NOT NULL,
  `status` enum('diterima','ditolak','ditinjau') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_surat`
--

INSERT INTO `status_surat` (`id_status`, `status`) VALUES
(1, 'diterima'),
(2, 'ditolak'),
(3, 'ditinjau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_surat` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `draft_naskah` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_status_kerjasama` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_dnk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `id_user`, `isi_surat`, `file_surat`, `draft_naskah`, `id_status`, `id_status_kerjasama`, `id_kategori`, `id_dnk`, `created_at`, `updated_at`) VALUES
(195, 36, 'COBA SAJA', '1641302142_69b396878b2b36e685ed.pdf', '1641302142_bfda19936e5978a4eb20.docx', 1, 1, 1, 1, '2022-01-04 13:15:42', '2022-01-04 13:15:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `username` varchar(120) DEFAULT NULL,
  `phone_no` varchar(120) DEFAULT NULL,
  `role` enum('admin','user','superadmin','analis_nk','analis_sk') NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone_no`, `role`, `password`, `email`, `created_at`) VALUES
(1, 'Super Admin', 'superadmin', '081907861308', 'superadmin', '$2a$04$r3HM7AZd3Zm4eviCJg4mPetZGQS1FvPlj7wZpcUMG9.wCm1rk336G', 'superadmin@domain.com', '2021-12-03 18:45:55'),
(35, 'naskah kerjasama', 'nkuser', '098765456787', 'analis_nk', '$2y$10$0sPcoMA2bZkiRH1oVNo4MOGTHw4ATijYvYd3r59zmcFexdhUGb47a', 'nk@gmail.com', '2022-01-04 13:04:52'),
(36, 'penggunasurat', 'pengguna', '057686554534', 'user', '$2y$10$BEE.3.MfQ7nj9nTeD2HxJ.XzU0D1wzKidsgLFRSoLNtOdhGm1cE7S', 'pengguna@gmail.com', '2022-01-04 13:14:45'),
(37, 'surat kerjasama', 'skuser', '086756776473', 'analis_sk', '$2y$10$68zWHafNDIWQg.M8jkJ.MudQ9zPwAsD2xyGDPITWW5jOM.081VH0a', 'sk@gmail.com', '2022-01-05 05:45:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `draft_naskah_kerjasama`
--
ALTER TABLE `draft_naskah_kerjasama`
  ADD PRIMARY KEY (`id_dnk`);

--
-- Indeks untuk tabel `kategori_surat`
--
ALTER TABLE `kategori_surat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `status_kerjasama`
--
ALTER TABLE `status_kerjasama`
  ADD PRIMARY KEY (`id_status_kerjasama`);

--
-- Indeks untuk tabel `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_status_kerjasama` (`id_status_kerjasama`),
  ADD KEY `id_dnk` (`id_dnk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `draft_naskah_kerjasama`
--
ALTER TABLE `draft_naskah_kerjasama`
  MODIFY `id_dnk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_surat`
--
ALTER TABLE `kategori_surat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_kerjasama`
--
ALTER TABLE `status_kerjasama`
  MODIFY `id_status_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status_surat` (`id_status`),
  ADD CONSTRAINT `surat_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_surat` (`id_kategori`),
  ADD CONSTRAINT `surat_ibfk_4` FOREIGN KEY (`id_status_kerjasama`) REFERENCES `status_kerjasama` (`id_status_kerjasama`),
  ADD CONSTRAINT `surat_ibfk_5` FOREIGN KEY (`id_dnk`) REFERENCES `draft_naskah_kerjasama` (`id_dnk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
