-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Jun 2020 pada 04.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_escmcabe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(5) NOT NULL,
  `username` varchar(24) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `username`, `nama`, `no_hp`, `alamat`, `password`, `status`, `level`) VALUES
(1, 'manager', 'Pak Cabe', '', '', '1d0258c2440a8d19e716292b231e3190', 'Aktif', 'Manager'),
(2, 'adminproduksi', 'Admin produksi Terlalu Tampan', '088855522222', 'Hayo mana hayo', '0192023a7bbd73250516f069df18b500', 'Aktif', 'Admin Produksi'),
(3, 'admindistribusi', 'Pak Pos', '', '', '0192023a7bbd73250516f069df18b500', 'Aktif', 'Admin Distribusi'),
(4, 'supplier', 'Pak Tani', '', '', '49375313ae9e075247b1dada362090c5', 'Aktif', 'Supplier'),
(5, 'pasar', 'Pasar Malam Sekali', '08585285258', 'Di Mana mana ada kok', '0b4f7c4bc08d792c683d497fb2412e2d', 'Aktif', 'Pasar'),
(6, 'pasarjakarta', 'Pasar Jakarta', '', '', '70dd606cdae15616fec2841d5a3f3042', 'Aktif', 'Pasar'),
(7, 'pasarlampung', 'Pasar Lampung', '', '', 'd13543e2ccf706495684df934bbd8a23', 'Aktif', 'Pasar'),
(8, 'pasarbanten', 'Pasar Banten', '', '', '003d5b6454256c58693dd88fd486a506', 'Aktif', 'Pasar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gudang`
--

CREATE TABLE `tbl_gudang` (
  `id_gudang` int(11) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `alamat_gudang` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gudang`
--

INSERT INTO `tbl_gudang` (`id_gudang`, `nama_gudang`, `alamat_gudang`, `kapasitas`) VALUES
(1, 'Gudang Tamanan', 'Jl Tamanan Depan Puskesmas', 500),
(2, 'Gudang Pelita', 'Jl Pelita', 250),
(3, 'Gudang Mengen', 'Mengen sebelah rumah andre', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `url_foto` varchar(75) NOT NULL,
  `ekstensi_foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_laporan`
--

INSERT INTO `tbl_laporan` (`id_laporan`, `id_permintaan`, `url_foto`, `ekstensi_foto`) VALUES
(3, 5, '5-bukti', ''),
(4, 5, '5-bukti', ''),
(5, 5, '5-bukti', ''),
(6, 5, '5-bukti', ''),
(7, 5, '5-bukti', ''),
(8, 5, '5-bukti', ''),
(9, 5, '5-bukti', ''),
(10, 5, '5-bukti', ''),
(11, 5, '5-bukti', ''),
(12, 5, '5-bukti', ''),
(13, 5, '5-bukti', ''),
(14, 5, '5-bukti', ''),
(15, 5, '5-bukti', ''),
(16, 5, '5-bukti', ''),
(17, 5, '5-bukti', ''),
(18, 5, '5-bukti', ''),
(19, 5, '5-bukti', ''),
(20, 5, '5-bukti', ''),
(21, 5, '5-bukti', ''),
(22, 5, '5-bukti', ''),
(23, 5, '5-bukti', ''),
(24, 5, '5-bukti', ''),
(25, 5, '5-bukti', ''),
(26, 5, '5-bukti', ''),
(27, 5, '5-bukti', ''),
(28, 5, '5-bukti', ''),
(29, 5, '5-bukti', ''),
(30, 5, '5-bukti', ''),
(31, 5, '5-bukti', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_optimasi`
--

CREATE TABLE `tbl_optimasi` (
  `id_optimasi` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `berat_pengiriman` int(11) NOT NULL,
  `status_pengiriman` varchar(20) NOT NULL,
  `tanggal_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`id_pengiriman`, `id_pasar`, `id_admin`, `id_transaksi`, `id_produk`, `id_gudang`, `berat_pengiriman`, `status_pengiriman`, `tanggal_pengiriman`) VALUES
(3, 8, 3, 5, 1, 1, 100, '2', '2020-06-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `biaya_pengiriman` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`id_permintaan`, `id_pasar`, `biaya_pengiriman`, `total_harga`, `status`, `tanggal`) VALUES
(5, 8, 0, 10000, 4, '2020-06-04'),
(6, 5, 0, 0, 9, '2020-06-04'),
(7, 6, 0, 30000, 3, '2020-06-04'),
(8, 5, 0, 100000, 1, '2020-06-06'),
(9, 5, 0, 600050, 2, '2020-06-07'),
(10, 7, 0, 120000, 4, '2020-06-07'),
(12, 5, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_permintaan_detail`
--

CREATE TABLE `tbl_permintaan_detail` (
  `id_pdetail` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_permintaan_detail`
--

INSERT INTO `tbl_permintaan_detail` (`id_pdetail`, `id_permintaan`, `id_produk`, `berat`, `harga`) VALUES
(5, 5, 1, 100, 20000),
(6, 6, 1, 50, 10000),
(7, 6, 4, 350, 70000),
(8, 7, 1, 100, 20000),
(9, 7, 4, 50, 10000),
(10, 8, 4, 100, 100000),
(11, 9, 4, 50, 500000),
(12, 9, 1, 500010, 100050),
(13, 10, 1, 30, 1000),
(14, 10, 4, 60, 1500),
(16, 12, 1, 500, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`) VALUES
(1, 'Cabe Cabean Hijau Kuning Kelabu'),
(4, 'Cabe keriting  yang direbonding');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produksi`
--

CREATE TABLE `tbl_produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_masuk_barang` date NOT NULL,
  `status_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produksi`
--

INSERT INTO `tbl_produksi` (`id_produksi`, `id_admin`, `id_supplier`, `id_produk`, `id_gudang`, `berat`, `harga`, `tgl_masuk_barang`, `status_p`) VALUES
(2, 2, 4, 1, 2, 50, 10000, '2020-06-11', 2),
(3, 2, 4, 4, 1, 10, 10000, '2020-06-07', 2),
(4, 2, 4, 1, 1, 75, 500000, '2020-06-17', 2),
(5, 2, 4, 1, 3, 150, 500000, '2020-06-17', 2),
(6, 2, 4, 4, 1, 130, 500000, '2020-06-17', 2),
(7, 2, 4, 4, 2, 75, 100000, '2020-06-17', 2),
(8, 2, 4, 4, 3, 200, 400000, '2020-06-17', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id_stok` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `gudang_id` varchar(20) NOT NULL,
  `jumlah_stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_optimasi`
--
ALTER TABLE `tbl_optimasi`
  ADD PRIMARY KEY (`id_optimasi`);

--
-- Indeks untuk tabel `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indeks untuk tabel `tbl_permintaan_detail`
--
ALTER TABLE `tbl_permintaan_detail`
  ADD PRIMARY KEY (`id_pdetail`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indeks untuk tabel `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tbl_optimasi`
--
ALTER TABLE `tbl_optimasi`
  MODIFY `id_optimasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_permintaan_detail`
--
ALTER TABLE `tbl_permintaan_detail`
  MODIFY `id_pdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_produksi`
--
ALTER TABLE `tbl_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
