-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 10.05
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_feedback`
--

CREATE TABLE `history_feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `feedback` int(11) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `subject` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `status` decimal(2,0) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tanggal`, `subject`, `pesan`, `status`, `id_user`) VALUES
(4, '2019-08-09 09:44:51', 'PENTING', 'COBAAA', '1', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'HARDWARE'),
(5, 'SOFTWARE'),
(6, 'NETWORK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nopen`
--

CREATE TABLE `nopen` (
  `id_nopen` varchar(15) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nopen`
--

INSERT INTO `nopen` (`id_nopen`, `nama`, `tipe`) VALUES
('40000', 'KPBD 40000', 'PUSAT'),
('40114A', 'BD CIHAMPIT', 'KPC'),
('40115A', 'BD CILAKI', 'KPC'),
('40115B', 'BD JUANDA', 'KPC'),
('40116A', 'BD CICENDO', 'KPC'),
('40116B', 'BD UNISBA', 'KPC'),
('40117A', 'BD BANJARSARI', 'KPC'),
('40117B', 'BD BABAKAN CIAMIS', 'KPC'),
('40122B', 'BD SUPRATMAN', 'KPC'),
('40123A', 'BD SUKALUYU', 'KPC'),
('40124A', 'BD CIKUTRA', 'KPC'),
('40125B', 'BD CICAHEUM', 'KPC'),
('40131A', 'BD CIHAMPELAS', 'KPC'),
('40132B', 'BD UNPAD', 'KPC'),
('40132D1', 'LE ITB', 'AGEN'),
('40134A', 'BD SADANGSERANG', 'KPC'),
('40135A', 'BD LIPI', 'KPC'),
('40135B', 'BD DAGO', 'KPC'),
('40135D1', 'LE DAGO', 'AGEN'),
('40141A', 'BD UNPAR', 'KPC'),
('40151A', 'BD SARIJADI', 'KPC'),
('40151B', 'BD PUSDIKLATPOS', 'KPC'),
('40153A', 'BD GEGERKALONG', 'KPC'),
('40154B', 'BD SETIABUDI', 'KPC'),
('40161A', 'BD CIPAGANTI', 'KPC'),
('40161B', 'BD PASTEUR', 'KPC'),
('40162A', 'BD CIPEDES', 'KPC'),
('40163A', 'BD MARANATHA', 'KPC'),
('40172A', 'BD ARJUNA', 'KPC'),
('40174A', 'BD HUSEIN', 'KPC'),
('40183A', 'BD DUNGUSCARIANG', 'KPC'),
('40184A', 'BD ANDIR', 'KPC'),
('40222A', 'BD BABAKAN CIPARAY', 'KPC'),
('40222B', 'BD SUMBERSARI INDAH', 'KPC'),
('40223A', 'BD KOPO', 'KPC'),
('40223B', 'BD CARINGIN', 'KPC'),
('40225A', 'BD MARGAHAYU', 'KPC'),
('40227A', 'BD SUKAMENAK', 'KPC'),
('40232A', 'BD SITUSAEUR', 'KPC'),
('40236A', 'BD CIBADUYUT', 'KPC'),
('40237A', 'SLPP CIBADUYUT', 'KPC'),
('40253A', 'BD CIGEREIENG', 'KPC'),
('40262A', 'BD KOSAMBI', 'KPC'),
('40264A', 'BD TURANGGA 2', 'KPC'),
('40265A', 'BD CIJAGRA', 'KPC'),
('40266A', 'BD BUAHBATU', 'KPC'),
('40272A', 'BD KEBONWARU', 'KPC'),
('40275A', 'BD TURANGGA 1', 'KPC'),
('40284A', 'BD KIARACONDONG', 'KPC'),
('40286A', 'BD MARGAHAYU RAYA', 'KPC'),
('40286B', 'BD SEKEJATI', 'KPC'),
('40286D', 'BD CIWASTRA', 'KPC'),
('40291A', 'BD ANTAPANI', 'KPC'),
('40291D1', 'LE ANTAPANI', 'AGEN'),
('40391', 'LEMBANG', 'KPC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(35) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori`) VALUES
(2, 'KOMPONEN MONITOR', 4),
(3, 'MOUSE', 4),
(4, 'KEYBOARD', 4),
(5, 'KOMPUTER PC', 4),
(6, 'IPOS', 5),
(7, 'RSPOS', 5),
(8, 'FOPOS', 5),
(9, 'POSPAY', 5),
(10, 'KONEKSI PUTUS', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_solved` datetime NOT NULL,
  `reported_name` varchar(30) NOT NULL,
  `reported_mail` varchar(50) NOT NULL,
  `nopen` varchar(32) NOT NULL,
  `ruangan` varchar(32) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
  `problem_summary` varchar(50) NOT NULL,
  `problem_detail` text NOT NULL,
  `id_teknisi` varchar(5) NOT NULL,
  `status` int(11) NOT NULL,
  `progress` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `tanggal`, `tanggal_proses`, `tanggal_solved`, `reported_name`, `reported_mail`, `nopen`, `ruangan`, `id_sub_kategori`, `problem_summary`, `problem_detail`, `id_teknisi`, `status`, `progress`) VALUES
('T201908080001', '2019-08-08 16:32:45', '2019-08-08 16:51:40', '2019-08-09 10:02:59', 'AZIZ WIJAYA', 'wijaya@posindonesia.co.id', '40000', 'AUDIT', 4, 'HURUF A MATI', '', '27', 6, '100'),
('T201908090002', '2019-08-09 10:04:23', '2019-08-09 10:04:51', '2019-08-09 10:05:39', 'HENNY PURNA', 'purna@posindonesia.co.id', '40114A', 'KASIR', 9, 'TIDAK BISA INPUT DATA', '', '27', 6, '100'),
('T201908090003', '2019-08-09 10:25:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'DIDIT RAYA', 'rayadit@posindonesia.co.id', '40135D1', 'PAKET', 8, '', '', '', 3, '0'),
('T201908090004', '2019-08-09 14:05:29', '2019-08-09 14:06:31', '0000-00-00 00:00:00', 'ELSE JULIYAH', 'Julel@posindonesia.co.id', '40115B', 'FRONT OFFICE', 10, '', '', '27', 4, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_ticket`, `tanggal`, `status`, `deskripsi`, `id_user`) VALUES
(194, 'T201908080001', '2019-08-08 16:32:45', 'Created Ticket', '', ''),
(195, 'T201908080001', '2019-08-08 16:51:40', 'Diproses oleh teknisi', '', '27'),
(196, 'T201908080001', '2019-08-08 16:52:10', 'Up Progress To 90 %', 'MENUNGGU PERANGKAT BARU', '27'),
(197, 'T201908080001', '2019-08-09 10:02:59', 'Up Progress To 100 %', 'SUDAH SELESAI DAN GANTI YANG BARU', '27'),
(198, 'T201908090002', '2019-08-09 10:04:23', 'Created Ticket', '', ''),
(199, 'T201908090002', '2019-08-09 10:04:51', 'Diproses oleh teknisi', '', '27'),
(200, 'T201908090002', '2019-08-09 10:05:39', 'Up Progress To 100 %', 'SUDAH DI BERI AKSES ULANG NETWORKNYA', '27'),
(201, 'T201908090003', '2019-08-09 10:25:08', 'Created Ticket', '', ''),
(202, 'T201908090004', '2019-08-09 14:05:29', 'Created Ticket', '', ''),
(203, 'T201908090004', '2019-08-09 14:06:31', 'Diproses oleh teknisi', '', '27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `notlp` varchar(15) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL,
  `email` varchar(48) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `notlp`, `username`, `password`, `level`, `email`, `alamat`, `jk`, `photo`) VALUES
(10, 'JULIANTO SUMANTRI', '085795045035', 'P0001', '8bca2f0cc2d59f1d6c79f18a10932eec', 'ADMIN', 'jsumantri@posindonesia.co.id', 'JL. ASIA AFRIKA NO.49', 'LAKI-LAKI', ''),
(27, 'ADING SURYANA', '082130491215', 'P0007', 'e0b8061e6f2091c158139dea86f468d1', 'TEKNISI', 'ading@posindonesia.co.id', 'JL. ASIA AFRIKA NO.49', 'LAKI-LAKI', ''),
(28, 'KARSO', '08112294904', 'P0008', '1e7c30995a9d8eed0e70096771a936eb', 'TEKNISI', 'karso@posindonesi.co.id', 'JL. ASIA AFRIKA NO.49', 'LAKI-LAKI', ''),
(29, 'ANGGA MEGASWARA', '082240691657', 'P0009', '5357ef572202cac1b56568b094621bee', 'TEKNISI', 'angga@posindonesia.co.id', 'JL. ASIA AFRIKA NO.49', 'LAKI-LAKI', ''),
(30, 'IWAN ZAMALUDDIN', '089646476711', 'P0010', 'fc9cdc9c0e728cc6373ba234e2878f9a', 'TEKNISI', 'zamaluddin@posindonesia.co.id', 'JL. ASIA AFRIKA NO.49', 'LAKI-LAKI', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history_feedback`
--
ALTER TABLE `history_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `nopen`
--
ALTER TABLE `nopen`
  ADD PRIMARY KEY (`id_nopen`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indeks untuk tabel `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indeks untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history_feedback`
--
ALTER TABLE `history_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
