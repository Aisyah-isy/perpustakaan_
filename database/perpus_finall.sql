-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 08:55 AM
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
  `stok` int(11) NOT NULL,
  `stok_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `cover`, `sinopsis`, `stok`, `stok_total`) VALUES
(7, 'siapa tau', 'Chikara Kimizuka - Yen Hioka', 'm&c!aaaaa', 2025, '20240917134451.jpg', 'Aizawa Yuuichi datang ke acara reuni SMP meski tak diundang. Dia korban perundungan teman-temannya selama bertahun-tahun, dan kini dia datang untuk membalas…', 32, 110),
(8, 'Felicia', 'Toshikazu Kawaguchi', 'Gramedia Pustaka Utamasas', 2022, '20240917141824.jpg', 'Di sebuah gang kecil di Tokyo, ada kafe tua yang bisa membawa pengunjungnya menjelajahi waktu. Keajaiban kafe itu menarik seorang wanita yang ingin memutar waktu untuk berbaikan dengan kekasihnya, seorang perawat yang ingin membaca surat yang tak sempat diberikan suaminya yang sakit, seorang kakak yang ingin menemui adiknya untuk terakhir kali, dan seorang ibu yang ingin bertemu dengan anak yang mungkin takkan pernah dikenalnya.   Namun ada banyak peraturan yang harus diingat. Satu, mereka harus tetap duduk di kursi yang telah ditentukan. Dua, apa pun yang mereka lakukan di masa yang didatangi takkan mengubah kenyataan di masa kini. Tiga, mereka harus menghabiskan kopi khusus yang disajikan sebelum kopi itu dingin.   Rentetan peraturan lainnya tak menghentikan orang-orang itu untuk menjelajahi waktu. Akan tetapi, jika kepergian mereka tak mengubah satu hal pun di masa kini, layakkah semua itu dijalani?', 36, 110),
(9, 'Gadis Minimarket', 'Sayaka Murata ', 'Gramedia Pustaka Utama', 2002, '20240918131701.jpg', '\r\nDunia menuntut Keiko untuk menjadi normal, walau ia tidak tahu “normal” itu seperti apa. Namun di minimarket, Keiko dilahirkan dengan identitas baru sebagai “pegawai minimarket”. Kini Keiko terancam dipisahkan dari dunia minimarket yang dicintainya selama ini...\r\n', 43, 110),
(10, 'Uzumaki', 'AKASHA   ', ' m&c!', 2024, '20240918131818.jpg', 'Seorang gadis SMA, Goshima Kirie dan pacarnya, Saito Shuichi tinggal di kota terkutuk Kurozu. Di kota ini, ada orang yang tubuhnya bisa terpuntir seperti spiral, ada yang berubah menjadi manusia siput, ada yang rambutnya bergera-gerak sendiri seperti “spiral hidup”.\r\n\r\nRanting, dedaunan pohon, dan tanaman meliuk-liuk dalam putaran angin puyuh. Keadaan Kota Kurozu semakin aneh dan tak masuk akal.\r\n\r\nKetika Kirie memutuskan melarikan diri dari kota ini, semuanya sudah terlambat... Apa yang sebenarnya ada di tengah kutukan ini?\r\n', 8, 111),
(11, 'Sakamoto Days', 'Yuto Suzuki', 'Elex Media Komputindo', 2024, '20240918131917.jpg', 'Terpidana mati paling brutal, ORDER, dan Toko Sakamoto langsung saling menghabisi begitu mereka bertemu! Seiring sengitnya pertarungan di berbagai tempat, perubahan abnormal terjadi pada tubuh Sakamoto! Dan saat tujuan sebenarnya X―sang dalang di balik semuanya―terungkap, dunia para pembunuh bayaran pun terguncang!\r\n', 89, 111),
(12, 'Yotsuba', ' Kiyohiko Azuma', 'Elex Media Komputindo', 2023, '20240918132015.jpg', '\r\nTerpengaruh acara televisi, Yotsuba pun menenteng pistol airnya dan berlagak akan membalaskan dendam ayahnya. Kakak-kakak cantik tetangga adalah sasarannya. Dimulai dari ibu yang membukakan pintu. Lalu Ena, Fuuka, kemudian yang terakhir Asagi. Namun, Asagi tidak mau mengikuti permainan ala Yotsuba. Dia menangkis serangan dan berhasil merebut pistol dari tangan Yotsuba. Apa yang selanjutnya terjadi pada Yotsuba?\r\n', 0, 11),
(14, 'English Book', 'Trisnendri Syahrizal', 'KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI 2022', 2017, '20240919095927.jpg', 'The world without borders has evolved in the period of globalization, \r\nwhich is characterized by the rapid expansion of technology in which \r\ninformation can be accessed from the tip of the finger. Both teachers and \r\nstudents are required to integrate and apply technological use in learning. \r\nIn the process, the emergence of the Covid-19 Pandemic condition has \r\naccelerated the learning patterns from face-to-face learning activities \r\nto online learning which has accelerated the progress. These, of course, \r\nhave brought various challenges from uneven distribution of network \r\nand supporting gadgets available, teachers and students readiness, \r\nand even the phenomenon called learning loss, which is the decrease \r\nof students’ competence and certain skills obtained due to the limited \r\namount of learning process', 344, 11),
(16, 'sasa', 'sasa', 'as', -46, '20240919104404.jpg', 'fgfg', 454, 111),
(17, 'asas', 'sasa', 'sas', 3233, '20240919110139.jpg', 'dfgfg', 2, 111),
(18, 'sdfdf', 'fsdfdf', 'sdfsdf', 34334, '20240919111453.jpg', 'ghfdg', 78, 111),
(19, 'Aizawa Yuuichi', 'Chikara Kimizuka - Yen Hioka', 'm&c!', 2005, '20240919131120.jpg', 'fgdfg', 65, 65);

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
(69, 9, 6),
(79, 9, 7),
(89, 9, 8),
(710, 10, 7),
(511, 11, 5),
(611, 11, 6),
(711, 11, 7),
(512, 12, 5),
(612, 12, 6),
(714, 14, 7),
(814, 14, 8),
(57, 7, 5),
(67, 7, 6),
(77, 7, 7),
(58, 8, 5),
(68, 8, 6),
(416, 16, 4),
(516, 16, 5),
(616, 16, 6),
(417, 17, 4),
(517, 17, 5),
(617, 17, 6),
(717, 17, 7),
(518, 18, 5),
(618, 18, 6),
(419, 19, 4),
(519, 19, 5);

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
(4, 'Romance'),
(5, 'Self Care'),
(6, 'Manga'),
(7, 'Horor'),
(8, 'Menegangkan'),
(9, 'caca');

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
(3, 5, 7),
(4, 8, 8),
(5, 9, 7),
(8, 15, 8),
(10, 7, 7);

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
(4, 5, 6, 8, '2024-09-18', '2024-10-02', '2024-09-19', 'dikembalikan', 0),
(5, 7, 11, 8, '2024-09-18', '2024-10-02', '2024-09-18', 'dikembalikan', 0),
(6, 8, 6, 8, '2024-09-19', '2024-10-03', '2024-09-19', 'dikembalikan', 0),
(7, 8, 11, 8, '2024-07-03', '2024-07-17', '2024-09-19', 'dikembalikan', 19985),
(8, 9, 11, 7, '2024-09-01', '2024-09-07', '2024-09-19', 'dikembalikan', 36000),
(9, 14, 11, 17, '2024-09-19', '2024-10-03', NULL, 'dipinjam', NULL);

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
(2, 5, 7, 5, 'asassa', '2024-09-18 03:00:00'),
(4, 8, 8, 5, 'biasa', '2024-09-19 02:00:00');

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
(6, 'a', 'ppp@mail.com', 'sa', 'p', '$2y$10$IBASdX9Oj1AD37JS/WM61uJb32SiWkFc0P6X/ZLqCP16s9Z/zMmjy', 'petugas'),
(7, 'v', 'vvvv@mail.com', 'v', 'v', '$2y$10$wpij/hR67WHrwcfVY9cjaukAY109yH/5oExCyR4CRcSyn1GELzLvq', 'peminjam'),
(8, 'Peminjam deng', 'ananaan@gmail.com', 'b', 'b', '$2y$10$6/RBxumlzE4E9/Zdsk5Mn.TpgWSuQ5EGQODblDvXL0DF/BL3P39dm', 'peminjam'),
(9, 'nnaanna', 'cccc@mail.com', 'n', 'n', '$2y$10$JIHOW/HpGIHgK/2IWNqmXexdkdLnbHYLtuVWdtEduQZHdFKjkbLAy', 'peminjam'),
(11, 'm', 'ananaan@gmail.com', 'm', 'm', '$2y$10$dmAlvGsPBjtGN/ydfC8LLe7Yz4JvmotDWD/RpGbbArDXe3Auq48ZS', 'petugas'),
(12, 'k', 'cccc@mail.com', 'k', 'k', '$2y$10$pWVBcxhEeSZ.EUQbFqoEC.MxYKEnILWU7fBr03jge7J5Gy6NNtqb6', 'admin'),
(13, 't', 'cccc@mail.com', 't', 't', '$2y$10$JYnXIAEx7j3WFqis8J6TU.k3WhBSVWi82RTScrfAadGhjdYDQE94q', 'admin'),
(14, 'nhn', 'dfdsf@mail.com', 'r', 'r', '$2y$10$ewpX5UqDWM.sYKpLSRGkh.gmEYBRNIeHL6o8tZoP2QuUyKrS5DSh.', 'peminjam'),
(15, 'q', 'dcsd@mail.com', 'q', 'q', '$2y$10$3VAd/6M/VqE6guHJ0WuG1eoDsicdv2EtVv7clHxFUb1dis5x5tC8O', 'peminjam'),
(16, 'dfg', 'dfg', 'dfg', 'dfg', '$2y$10$QiEAi/LgeXnMFXxkDJCdrexFHwdZM.uF2QUbMEmV18UZbEiMjLwE2', 'peminjam');

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
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `koleksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
