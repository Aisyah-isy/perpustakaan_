-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 10:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `cover`, `sinopsis`, `stok`) VALUES
(7, 'Aizawa Yuuichiaa', 'Chikara Kimizuka - Yen Hioka', 'm&c!a', 2021, '20240917134451.jpg', 'Aizawa Yuuichi datang ke acara reuni SMP meski tak diundang. Dia korban perundungan teman-temannya selama bertahun-tahun, dan kini dia datang untuk membalas…', 32),
(8, 'Felicia', 'Toshikazu Kawaguchi', 'Gramedia Pustaka Utama', 2022, '20240917141824.jpg', 'Di sebuah gang kecil di Tokyo, ada kafe tua yang bisa membawa pengunjungnya menjelajahi waktu. Keajaiban kafe itu menarik seorang wanita yang ingin memutar waktu untuk berbaikan dengan kekasihnya, seorang perawat yang ingin membaca surat yang tak sempat diberikan suaminya yang sakit, seorang kakak yang ingin menemui adiknya untuk terakhir kali, dan seorang ibu yang ingin bertemu dengan anak yang mungkin takkan pernah dikenalnya.   Namun ada banyak peraturan yang harus diingat. Satu, mereka harus tetap duduk di kursi yang telah ditentukan. Dua, apa pun yang mereka lakukan di masa yang didatangi takkan mengubah kenyataan di masa kini. Tiga, mereka harus menghabiskan kopi khusus yang disajikan sebelum kopi itu dingin.   Rentetan peraturan lainnya tak menghentikan orang-orang itu untuk menjelajahi waktu. Akan tetapi, jika kepergian mereka tak mengubah satu hal pun di masa kini, layakkah semua itu dijalani?', 33),
(9, 'Gadis Minimarket', 'Sayaka Murata ', 'Gramedia Pustaka Utama', 2002, '20240918131701.jpg', '\r\nDunia menuntut Keiko untuk menjadi normal, walau ia tidak tahu “normal” itu seperti apa. Namun di minimarket, Keiko dilahirkan dengan identitas baru sebagai “pegawai minimarket”. Kini Keiko terancam dipisahkan dari dunia minimarket yang dicintainya selama ini...\r\n', 43),
(10, 'Uzumaki', 'AKASHA   ', ' m&c!', 2024, '20240918131818.jpg', 'Seorang gadis SMA, Goshima Kirie dan pacarnya, Saito Shuichi tinggal di kota terkutuk Kurozu. Di kota ini, ada orang yang tubuhnya bisa terpuntir seperti spiral, ada yang berubah menjadi manusia siput, ada yang rambutnya bergera-gerak sendiri seperti “spiral hidup”.\r\n\r\nRanting, dedaunan pohon, dan tanaman meliuk-liuk dalam putaran angin puyuh. Keadaan Kota Kurozu semakin aneh dan tak masuk akal.\r\n\r\nKetika Kirie memutuskan melarikan diri dari kota ini, semuanya sudah terlambat... Apa yang sebenarnya ada di tengah kutukan ini?\r\n', 8),
(11, 'Sakamoto Days', 'Yuto Suzuki', 'Elex Media Komputindo', 2024, '20240918131917.jpg', 'Terpidana mati paling brutal, ORDER, dan Toko Sakamoto langsung saling menghabisi begitu mereka bertemu! Seiring sengitnya pertarungan di berbagai tempat, perubahan abnormal terjadi pada tubuh Sakamoto! Dan saat tujuan sebenarnya X―sang dalang di balik semuanya―terungkap, dunia para pembunuh bayaran pun terguncang!\r\n', 89),
(12, 'Yotsuba', ' Kiyohiko Azuma', 'Elex Media Komputindo', 2023, '20240918132015.jpg', '\r\nTerpengaruh acara televisi, Yotsuba pun menenteng pistol airnya dan berlagak akan membalaskan dendam ayahnya. Kakak-kakak cantik tetangga adalah sasarannya. Dimulai dari ibu yang membukakan pintu. Lalu Ena, Fuuka, kemudian yang terakhir Asagi. Namun, Asagi tidak mau mengikuti permainan ala Yotsuba. Dia menangkis serangan dan berhasil merebut pistol dari tangan Yotsuba. Apa yang selanjutnya terjadi pada Yotsuba?\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buku_relasi`
--

CREATE TABLE `buku_relasi` (
  `buku_relasi_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku_relasi`
--

INSERT INTO `buku_relasi` (`buku_relasi_id`, `buku_id`, `kategori_id`) VALUES
(27, 7, 2),
(37, 7, 3),
(28, 8, 2),
(38, 8, 3),
(69, 9, 6),
(79, 9, 7),
(89, 9, 8),
(710, 10, 7),
(511, 11, 5),
(611, 11, 6),
(711, 11, 7),
(512, 12, 5),
(612, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(3, 'Action'),
(4, 'Romance'),
(5, 'Self Care'),
(6, 'Manga'),
(7, 'Horor'),
(8, 'Menegangkan');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `koleksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`koleksi_id`, `user_id`, `buku_id`) VALUES
(2, 5, 8),
(3, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `peminjam_id` int(11) NOT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `buku_id` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `batas_pengembalian` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_peminjaman` enum('dipesan','dipinjam','dikembalikan','ditolak') NOT NULL,
  `denda` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `peminjam_id`, `petugas_id`, `buku_id`, `tanggal_pinjam`, `batas_pengembalian`, `tanggal_kembali`, `status_peminjaman`, `denda`) VALUES
(3, 5, 6, 7, '2024-08-01', '2024-08-15', '2024-09-18', 'dikembalikan', 59951125),
(4, 5, 6, 8, '2024-09-18', '2024-10-02', NULL, 'dipinjam', 0),
(5, 7, 11, 8, '2024-09-18', '2024-10-02', '2024-09-18', 'dikembalikan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `ulasan` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ulasan_id`, `user_id`, `buku_id`, `rating`, `ulasan`, `tgl`) VALUES
(2, 5, 7, 5, 'asassa', '2024-09-18 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('admin','petugas','peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `alamat`, `username`, `password`, `role`) VALUES
(1, 'a', 'ananaan@gmail.com', 'a', 'a', '$2y$10$gOT29jHmkEBV/mgV/RCrsOT2IO6.f2vgXQU6xg6uGlxv6GtsAXWAS', 'admin'),
(5, 'c', 'cccc@mail.com', 'c', 'c', '$2y$10$XdTrVkCwxd3HchaslbPPIOl8/2pICnheTVhYUnLdkzARbrEnRVQLG', 'peminjam'),
(6, 'p', 'ppp@mail.com', 'sa', 'p', '$2y$10$IBASdX9Oj1AD37JS/WM61uJb32SiWkFc0P6X/ZLqCP16s9Z/zMmjy', 'petugas'),
(7, 'v', 'vvvv@mail.com', 'v', 'v', '$2y$10$wpij/hR67WHrwcfVY9cjaukAY109yH/5oExCyR4CRcSyn1GELzLvq', 'peminjam'),
(8, 'Peminjam deng', 'ananaan@gmail.com', 'b', 'b', '$2y$10$6/RBxumlzE4E9/Zdsk5Mn.TpgWSuQ5EGQODblDvXL0DF/BL3P39dm', 'peminjam'),
(9, 'n', 'cccc@mail.com', 'n', 'n', '$2y$10$JIHOW/HpGIHgK/2IWNqmXexdkdLnbHYLtuVWdtEduQZHdFKjkbLAy', 'peminjam'),
(11, 'm', 'ananaan@gmail.com', 'm', 'm', '$2y$10$dmAlvGsPBjtGN/ydfC8LLe7Yz4JvmotDWD/RpGbbArDXe3Auq48ZS', 'petugas'),
(12, 'k', 'cccc@mail.com', 'k', 'k', '$2y$10$pWVBcxhEeSZ.EUQbFqoEC.MxYKEnILWU7fBr03jge7J5Gy6NNtqb6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`koleksi_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ulasan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
