-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jan 2018 pada 04.40
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_spek` int(11) NOT NULL,
  `serial_no` varchar(25) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `barcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_spek`, `serial_no`, `nama_barang`, `kondisi`, `status`, `barcode`) VALUES
(40, 1, 2, '8998181941132', 'Acer E1451-G', 'Baik', 'Keluar', '240194.png'),
(41, 2, 6, 'dsfdsfdsd', 'Gigabite', 'Baik', 'Keluar', 'dsfdsfdsd.png'),
(42, 1, 2, 'lajdlas', 'T430', 'Baik', 'Keluar', 'lajdlas.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `nama_comp` varchar(50) NOT NULL,
  `no_telp_comp` varchar(15) NOT NULL,
  `email_comp` varchar(50) NOT NULL,
  `alamat_comp` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id_company`, `nama_comp`, `no_telp_comp`, `email_comp`, `alamat_comp`, `logo`) VALUES
(6, 'Indorental', '0813 220 91119', 'indorental@gmail.com', 'Jalan Pangeran Jaya karta 72-74 Jakarta Pusat', 'logo1515013504.png'),
(7, 'Raksasa Media', '085271622233', 'info@raksasamedia.co.id', 'Jl. Anggrek Garuda 1 Blok i No. 67, Slipi, Jakarta Barat', 'logo1515076184.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_dn`
--

CREATE TABLE `detail_dn` (
  `id_detail_dn` int(11) NOT NULL,
  `id_dn` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `status` enum('0','1','','') NOT NULL COMMENT '0 = Belum di proses, 1= sudah di proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_dn`
--

INSERT INTO `detail_dn` (`id_detail_dn`, `id_dn`, `id_barang`, `status`) VALUES
(22, 4, 42, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_invoice`
--

CREATE TABLE `detail_invoice` (
  `id_detail` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `status` enum('0','1','','') NOT NULL COMMENT '1= sudah diproses , 0 belum diproses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_invoice`
--

INSERT INTO `detail_invoice` (`id_detail`, `id_invoice`, `id_barang`, `jumlah`, `harga`, `lama_sewa`, `status`) VALUES
(44, 5, 42, 1, 10000, 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kembali`
--

CREATE TABLE `detail_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_detail_dn` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_identitas` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `tanggal_tempo` date NOT NULL,
  `lokasi_kirim` varchar(100) NOT NULL,
  `dp` varchar(50) NOT NULL,
  `metode_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `no_invoice`, `id_konsumen`, `id_company`, `tanggal_invoice`, `tanggal_tempo`, `lokasi_kirim`, `dp`, `metode_bayar`) VALUES
(5, 'INV/0001/060118', 8, 7, '2018-01-06', '2018-01-09', 'Bandung', '5000', 'Transper');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Laptop'),
(2, 'Switch'),
(6, 'Tools'),
(7, 'Jaringan Komputer'),
(8, 'All in One'),
(9, 'Tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `konsumen` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `konsumen`, `perusahaan`, `no_telp`, `email`, `alamat`, `dokumen`) VALUES
(7, 'Donal Trump', 'PT. Pindad', '08122262578', 'donal@gmail.com', 'Water Tiger', ''),
(8, 'Rany', 'PT. BMK', '081222625768', 'rani@bmk.com', 'Cengkareng', ''),
(10, 'Leonardo', 'Bank BCA', '081222625748', 'bca@bca.com', 'Jl. Asia Afrika bandung', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level_user` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level_user`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `no_po` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `tanggal_po` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spek`
--

CREATE TABLE `spek` (
  `id_spek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `spek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spek`
--

INSERT INTO `spek` (`id_spek`, `id_kategori`, `spek`) VALUES
(2, 1, 'Intel i5'),
(4, 1, 'Intel i7'),
(5, 6, 'Crimping Tools'),
(6, 2, 'TP-LINK'),
(7, 7, 'Kabel Lan'),
(8, 7, 'Modem'),
(9, 8, '6s'),
(10, 2, 'TP Link');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `supplier`, `no_telp`, `alamat`) VALUES
(1, 'PT. Mbizz', '081222625742', 'MIM Blok J Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_dn` int(11) NOT NULL,
  `no_dn` varchar(100) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `tanggal_dn` date NOT NULL,
  `pengirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_jalan`
--

INSERT INTO `surat_jalan` (`id_dn`, `no_dn`, `id_invoice`, `tanggal_dn`, `pengirim`) VALUES
(4, 'DN/0001/060118', 5, '2018-01-06', 'Rei Misterio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `id_level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `id_level_user`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Gudang', 'gudang', '202446dd1d6028084426867365b0c7a1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `detail_dn`
--
ALTER TABLE `detail_dn`
  ADD PRIMARY KEY (`id_detail_dn`);

--
-- Indexes for table `detail_invoice`
--
ALTER TABLE `detail_invoice`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_kembali`
--
ALTER TABLE `detail_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`no_po`);

--
-- Indexes for table `spek`
--
ALTER TABLE `spek`
  ADD PRIMARY KEY (`id_spek`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_dn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_dn`
--
ALTER TABLE `detail_dn`
  MODIFY `id_detail_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `detail_invoice`
--
ALTER TABLE `detail_invoice`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `detail_kembali`
--
ALTER TABLE `detail_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spek`
--
ALTER TABLE `spek`
  MODIFY `id_spek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
