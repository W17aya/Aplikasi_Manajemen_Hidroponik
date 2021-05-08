-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2021 pada 02.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hidroponik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `kode_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(25) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `stok` int(8) NOT NULL,
  `harga_bahan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `nama_bahan`, `kode_kategori`, `stok`, `harga_bahan`) VALUES
('BHN-001', 'Bibit Sawi Pakchoy', 'KG-001', 2, 35000),
('BHN-002', 'Nutrisi Sayuran Daun', 'KG-002', 2, 30000),
('BHN-003', 'Bibit Selada RZ Junction', 'KG-001', 1, 70000),
('BHN-004', 'Net Pot 5cm', 'KG-003', 80, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_sementara`
--

CREATE TABLE `beli_sementara` (
  `id` int(11) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `harga` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
('KG-001', 'Bibit'),
('KG-002', 'Pupuk Nutrisi'),
('KG-003', 'Perlengkapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun`
--

CREATE TABLE `kebun` (
  `kode_kebun` varchar(10) NOT NULL,
  `nama_kebun` varchar(25) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kebun`
--

INSERT INTO `kebun` (`kode_kebun`, `nama_kebun`, `tanggal_buat`, `total_harga`) VALUES
('KB-001', 'Kebun Oemar', '2019-11-15', 937000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_sementara`
--

CREATE TABLE `kebun_sementara` (
  `id` int(11) NOT NULL,
  `kode_kebun` varchar(10) NOT NULL,
  `nama_bahan` varchar(30) NOT NULL,
  `jumlah_bahan` int(10) NOT NULL,
  `harga_bahan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laba`
--

CREATE TABLE `laba` (
  `id_laba` varchar(11) NOT NULL,
  `tanggal_laba` date NOT NULL,
  `kode_tanaman` varchar(10) NOT NULL,
  `kode_penanaman` varchar(10) NOT NULL,
  `kode_penjualan` varchar(10) NOT NULL,
  `id_rugi` varchar(10) NOT NULL,
  `total_laba` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laba`
--

INSERT INTO `laba` (`id_laba`, `tanggal_laba`, `kode_tanaman`, `kode_penanaman`, `kode_penjualan`, `id_rugi`, `total_laba`) VALUES
('TR-001', '2020-09-20', 'TNMN-001', 'PNM-001', 'JL-001', '2', 180000),
('TR-002', '2020-10-30', 'TNMN-002', 'PNM-002', 'JL-001', '3', 110000),
('TR-003', '2020-10-21', 'TNMN-002', 'PNM-001', 'JL-002', '', 330000),
('TR-004', '0000-00-00', 'TNMN-009', '', 'JL-014', '', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama_akun` varchar(25) NOT NULL,
  `no_ktp` bigint(18) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `level` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama_akun`, `no_ktp`, `alamat`, `username`, `password`, `tempat_lahir`, `tgl_lahir`, `level`, `status`) VALUES
(1, 'Umar Dani', 123456789, 'Jl. Scorpio XI', 'umar', '123456', 'Sampit', '1998-07-15', 'admin', 'Aktif'),
(2, 'Khairul Ikhsan Nurzeha', 123456, 'Jl. Hercules No. 24 Landasan Ulin Banjarbaru', 'ikhsan', '123456', 'Muara Teweh', '1997-12-31', 'user', 'Aktif'),
(4, 'sarah', 123456, 'banjarbaru', 'sarah', '445566', 'banjarbaru', '1999-11-18', 'user', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panen`
--

CREATE TABLE `panen` (
  `kode_panen` varchar(10) NOT NULL,
  `kode_penanaman` varchar(10) NOT NULL,
  `tanggal_panen` date NOT NULL,
  `kode_tanaman` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `panen`
--

INSERT INTO `panen` (`kode_panen`, `kode_penanaman`, `tanggal_panen`, `kode_tanaman`, `jumlah`) VALUES
('PN-001', 'PNM-001', '2020-03-03', 'TNMN-001', 44),
('PN-002', 'PNM-002', '2020-04-01', 'TNMN-002', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `tanggal`, `no_nota`, `total`) VALUES
('PB-001', '2020-01-05', 'HB-010620', 105000),
('PB-002', '2020-01-29', '', 170000),
('PB-003', '2020-01-31', '012553', 240000),
('PB-004', '2021-03-31', '', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanaman`
--

CREATE TABLE `penanaman` (
  `kode_penanaman` varchar(10) NOT NULL,
  `tanggal_penanaman` date NOT NULL,
  `kode_kebun` varchar(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penanaman`
--

INSERT INTO `penanaman` (`kode_penanaman`, `tanggal_penanaman`, `kode_kebun`, `total`) VALUES
('PNM-001', '2020-02-01', 'KB-001', 260000),
('PNM-002', '2020-03-05', 'KB-001', 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanaman_sementara`
--

CREATE TABLE `penanaman_sementara` (
  `id` int(11) NOT NULL,
  `kode_penanaman` varchar(10) NOT NULL,
  `kode_kebun` varchar(10) NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `jumlah_bahan` int(10) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(11) NOT NULL,
  `kode_tanaman` varchar(10) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `total_jual` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `kode_tanaman`, `tanggal_jual`, `jumlah`, `harga_jual`, `total_jual`) VALUES
('JL-001', 'TNMN-001', '2020-03-05', 44, 33000, 1452000),
('JL-002', 'TNMN-002', '2020-04-01', 10, 20000, 200000),
('JL-003', 'TNMN-002', '2020-04-02', 10, 20000, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_kebun`
--

CREATE TABLE `rincian_kebun` (
  `kode_rincian` int(11) NOT NULL,
  `kode_kebun` varchar(10) NOT NULL,
  `nama_bahan` varchar(30) NOT NULL,
  `jumlah_bahan` int(10) NOT NULL,
  `harga_bahan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rincian_kebun`
--

INSERT INTO `rincian_kebun` (`kode_rincian`, `kode_kebun`, `nama_bahan`, `jumlah_bahan`, `harga_bahan`) VALUES
(22, 'KB-001', 'Kayu Reng', 20, 8000),
(23, 'KB-001', 'Pipa 2,5\"', 8, 65000),
(24, 'KB-001', 'Pipa 2\"', 1, 55000),
(25, 'KB-001', 'pipa 0.5\"', 3, 16000),
(26, 'KB-001', 'tutup pipa 2.5\"', 8, 6000),
(27, 'KB-001', 'Knee L 2.5\"', 8, 8000),
(28, 'KB-001', 'Tutup pipa 2\"', 1, 5000),
(29, 'KB-001', 'Knee L 2\"', 2, 7000),
(30, 'KB-001', 'Knee L 0.5\"', 5, 2000),
(31, 'KB-001', 'Selang PE', 13, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pembelian`
--

CREATE TABLE `rincian_pembelian` (
  `id` int(11) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rincian_pembelian`
--

INSERT INTO `rincian_pembelian` (`id`, `id_pembelian`, `no_nota`, `tanggal`, `kode_bahan`, `jumlah`, `harga`) VALUES
(9, 'PB-001', 'HB-010620', '2020-01-05', 'BHN-001', 3, 35000),
(10, 'PB-002', '', '2020-01-29', 'BHN-004', 30, 1000),
(11, 'PB-002', '', '2020-01-29', 'BHN-003', 2, 70000),
(13, 'PB-003', '012553', '2020-01-31', 'BHN-002', 8, 30000),
(14, 'PB-004', '', '2021-03-31', 'BHN-004', 150, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_penanaman`
--

CREATE TABLE `rincian_penanaman` (
  `kode_rincian` int(11) NOT NULL,
  `kode_penanaman` varchar(10) NOT NULL,
  `kode_kebun` varchar(10) NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `jumlah_bahan` int(10) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rincian_penanaman`
--

INSERT INTO `rincian_penanaman` (`kode_rincian`, `kode_penanaman`, `kode_kebun`, `kode_bahan`, `jumlah_bahan`, `harga`) VALUES
(8, 'PNM-001', 'KB-001', 'BHN-003', 1, 70000),
(9, 'PNM-001', 'KB-001', 'BHN-004', 100, 1000),
(10, 'PNM-001', 'KB-001', 'BHN-002', 3, 30000),
(11, 'PNM-002', 'KB-001', 'BHN-001', 1, 35000),
(12, 'PNM-002', 'KB-001', 'BHN-002', 3, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rugi`
--

CREATE TABLE `rugi` (
  `id` int(11) NOT NULL,
  `kode_tanaman` varchar(30) NOT NULL,
  `jumlah_rugi` int(8) NOT NULL,
  `status_rugi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rugi`
--

INSERT INTO `rugi` (`id`, `kode_tanaman`, `jumlah_rugi`, `status_rugi`) VALUES
(16, 'TNMN-002', 2, 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanaman`
--

CREATE TABLE `tanaman` (
  `kode_tanaman` varchar(10) NOT NULL,
  `nama_tanaman` varchar(25) NOT NULL,
  `stok` int(8) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanaman`
--

INSERT INTO `tanaman` (`kode_tanaman`, `nama_tanaman`, `stok`, `harga_satuan`, `status`) VALUES
('TNMN-001', 'Selada RZ Juntcion', 0, 33000, 'Habis'),
('TNMN-002', 'Sawi Pakchoy', 1, 20000, 'Ready');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indeks untuk tabel `beli_sementara`
--
ALTER TABLE `beli_sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `kebun`
--
ALTER TABLE `kebun`
  ADD PRIMARY KEY (`kode_kebun`);

--
-- Indeks untuk tabel `kebun_sementara`
--
ALTER TABLE `kebun_sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laba`
--
ALTER TABLE `laba`
  ADD PRIMARY KEY (`id_laba`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panen`
--
ALTER TABLE `panen`
  ADD PRIMARY KEY (`kode_panen`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penanaman`
--
ALTER TABLE `penanaman`
  ADD PRIMARY KEY (`kode_penanaman`);

--
-- Indeks untuk tabel `penanaman_sementara`
--
ALTER TABLE `penanaman_sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indeks untuk tabel `rincian_kebun`
--
ALTER TABLE `rincian_kebun`
  ADD PRIMARY KEY (`kode_rincian`);

--
-- Indeks untuk tabel `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rincian_penanaman`
--
ALTER TABLE `rincian_penanaman`
  ADD PRIMARY KEY (`kode_rincian`);

--
-- Indeks untuk tabel `rugi`
--
ALTER TABLE `rugi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`kode_tanaman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beli_sementara`
--
ALTER TABLE `beli_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kebun_sementara`
--
ALTER TABLE `kebun_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penanaman_sementara`
--
ALTER TABLE `penanaman_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `rincian_kebun`
--
ALTER TABLE `rincian_kebun`
  MODIFY `kode_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `rincian_pembelian`
--
ALTER TABLE `rincian_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rincian_penanaman`
--
ALTER TABLE `rincian_penanaman`
  MODIFY `kode_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rugi`
--
ALTER TABLE `rugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
