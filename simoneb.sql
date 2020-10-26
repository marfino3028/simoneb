-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2020 pada 04.44
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simoneb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karya`
--

CREATE TABLE `karya` (
  `id` int(11) NOT NULL,
  `karya_tulis` varchar(45) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `media` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentoring`
--

CREATE TABLE `mentoring` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jml_pertemuan` varchar(45) DEFAULT NULL,
  `jml_kehadiran` varchar(45) DEFAULT NULL,
  `persen` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentoring_has_mhs`
--

CREATE TABLE `mentoring_has_mhs` (
  `mentoring_id` int(11) NOT NULL,
  `mhs_id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `org_mhs_id` int(11) NOT NULL,
  `prestasi_id` int(11) NOT NULL,
  `sosial_id` int(11) NOT NULL,
  `tahsin_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `karya_id` int(11) NOT NULL,
  `mentoring_id` int(11) NOT NULL,
  `mhs_id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs`
--

CREATE TABLE `mhs` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `nim` varchar(45) DEFAULT NULL,
  `angkatan` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `hp` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `beasiswa` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL,
  `nilai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `ipk` varchar(45) DEFAULT NULL,
  `ips` varchar(45) DEFAULT NULL,
  `tahun` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `org_mhs`
--

CREATE TABLE `org_mhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `masa_jabatan` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `peringkat` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `penyelenggara_prestasi` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `ipk` varchar(45) DEFAULT NULL,
  `ips` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosial`
--

CREATE TABLE `sosial` (
  `id` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `penyelenggara_sosial` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahsin`
--

CREATE TABLE `tahsin` (
  `id` int(11) NOT NULL,
  `level` varchar(45) DEFAULT NULL,
  `no_sk` varchar(45) DEFAULT NULL,
  `nilai` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_forum_semester1` (`semester_id`);

--
-- Indeks untuk tabel `karya`
--
ALTER TABLE `karya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karya_semester1` (`semester_id`);

--
-- Indeks untuk tabel `mentoring`
--
ALTER TABLE `mentoring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mentoring_semester1` (`semester_id`);

--
-- Indeks untuk tabel `mentoring_has_mhs`
--
ALTER TABLE `mentoring_has_mhs`
  ADD PRIMARY KEY (`mentoring_id`,`mhs_id_mhs`),
  ADD KEY `fk_mentoring_has_mhs_mhs1` (`mhs_id_mhs`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_menu_org_mhs1` (`org_mhs_id`),
  ADD KEY `fk_menu_prestasi1` (`prestasi_id`),
  ADD KEY `fk_menu_sosial1` (`sosial_id`),
  ADD KEY `fk_menu_tahsin1` (`tahsin_id`),
  ADD KEY `fk_menu_forum1` (`forum_id`),
  ADD KEY `fk_menu_karya1` (`karya_id`),
  ADD KEY `fk_menu_mentoring1` (`mentoring_id`),
  ADD KEY `fk_menu_mhs1` (`mhs_id_mhs`);

--
-- Indeks untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `fk_mhs_semester` (`semester_id`),
  ADD KEY `fk_mhs_nilai1` (`nilai_id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `org_mhs`
--
ALTER TABLE `org_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_org_mhs_semester1` (`semester_id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prestasi_semester1` (`semester_id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sosial`
--
ALTER TABLE `sosial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sosial_semester1` (`semester_id`);

--
-- Indeks untuk tabel `tahsin`
--
ALTER TABLE `tahsin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tahsin_semester1` (`semester_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karya`
--
ALTER TABLE `karya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mentoring`
--
ALTER TABLE `mentoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `org_mhs`
--
ALTER TABLE `org_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sosial`
--
ALTER TABLE `sosial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahsin`
--
ALTER TABLE `tahsin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_forum_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `karya`
--
ALTER TABLE `karya`
  ADD CONSTRAINT `fk_karya_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mentoring`
--
ALTER TABLE `mentoring`
  ADD CONSTRAINT `fk_mentoring_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mentoring_has_mhs`
--
ALTER TABLE `mentoring_has_mhs`
  ADD CONSTRAINT `fk_mentoring_has_mhs_mentoring1` FOREIGN KEY (`mentoring_id`) REFERENCES `mentoring` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mentoring_has_mhs_mhs1` FOREIGN KEY (`mhs_id_mhs`) REFERENCES `mhs` (`id_mhs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_forum1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_karya1` FOREIGN KEY (`karya_id`) REFERENCES `karya` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_mentoring1` FOREIGN KEY (`mentoring_id`) REFERENCES `mentoring` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_mhs1` FOREIGN KEY (`mhs_id_mhs`) REFERENCES `mhs` (`id_mhs`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_org_mhs1` FOREIGN KEY (`org_mhs_id`) REFERENCES `org_mhs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_prestasi1` FOREIGN KEY (`prestasi_id`) REFERENCES `prestasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_sosial1` FOREIGN KEY (`sosial_id`) REFERENCES `sosial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_tahsin1` FOREIGN KEY (`tahsin_id`) REFERENCES `tahsin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `fk_mhs_nilai1` FOREIGN KEY (`nilai_id`) REFERENCES `nilai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mhs_semester` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `org_mhs`
--
ALTER TABLE `org_mhs`
  ADD CONSTRAINT `fk_org_mhs_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `fk_prestasi_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sosial`
--
ALTER TABLE `sosial`
  ADD CONSTRAINT `fk_sosial_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tahsin`
--
ALTER TABLE `tahsin`
  ADD CONSTRAINT `fk_tahsin_semester1` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
