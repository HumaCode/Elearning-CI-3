-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2022 pada 11.26
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kursus`, `id_siswa`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 1, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','-') NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(25) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`, `agama`, `tlp`, `email`, `password`, `foto`, `status`, `is_active`) VALUES
(1, '2021001', 'Guru1', 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru1@gmail.com', '$2y$10$ij/YBDiU1Lv.R71ri8Brj.jySApF7xqB5hrkWfPPcNT3ZrbnPQR9W', 'default.jpg', 'Guru', 1),
(2, '2021002', 'Guru2', 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru2@gmail.com', '$2y$10$NVUbXO24ZyKPmsNfgQzrz.XOZ3JNrsxu9w4NQt46k5HJaU1dAaRpK', 'default.jpg', 'Guru', 1),
(3, '2021003', 'Guru3', 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru3@gmail.com', '$2y$10$84Bh3TRGDQOfcvGueQzGs.K69xzTLVKMs0hK4b4r9eMKttOrrDhti', 'default.jpg', 'Guru', 1),
(4, '2021004', 'Guru4', 'Perempuan', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru4@gmail.com', '$2y$10$dOUl3WnAr9n5Qf893xnQJeoH3i/wticBq0nC1ahWRfwbOM.1bqVs.', 'default.jpg', 'Guru', 1),
(5, '2021005', 'Guru5', 'Perempuan', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru5@gmail.com', '$2y$10$rRDwm71OUNfR8ZUfvh1FxO6NuGDLKzDI1UpXvEt/tLK.OUfax0FBi', 'default.jpg', 'Guru', 1),
(6, '2021006', 'Guru6', 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru6@gmail.com', '$2y$10$ukUpP9LVxWxDOq4bLJjqs.or4pOB/MIYciqREM022FDJPU3lxsovO', 'default.jpg', 'Guru', 1),
(7, '2021007', 'Guru7', 'Perempuan', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru7@gmail.com', '$2y$10$XN0YR3zgFA8BFRZNSt//pumHuWvXRwoIpQTuF8L7CZf7Wntbu3x4C', 'default.jpg', 'Guru', 1),
(8, '2021008', 'Guru8', 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru8@gmail.com', '$2y$10$vHtodQvDxZSC9nBGLJblD.HFwrJOdagGkOmp/J70K949DgzE/21Jq', 'default.jpg', 'Guru', 1),
(9, '2021009', 'Guru9', 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', 'Islam', '082324118692', 'Guru9@gmail.com', '$2y$10$FPt1kHctAQcmGIkidptIre7PID4oVquuVvCG4dSCO9HnvZuEPHkx2', 'default.jpg', 'Guru', 1),
(10, '2021010', 'Guru10', 'Perempuan', 'Pekalongan', '2021-10-14', 'Kajen', 'Islam', '082324118692', 'Guru10@gmail.com', '$2y$10$KKq6uKFgOLHu4KidsN4fqeqJCT0JkJEFlSL7nZmE2c6JatmXIt5vm', 'af9a2dc414ef2c46ad732308db811a22.png', 'Guru', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jwb` text NOT NULL,
  `jwb_file` varchar(125) NOT NULL,
  `tgl_jwb` int(11) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id_jawaban`, `id_sesi`, `id_kursus`, `pertemuan`, `id_user`, `id_soal`, `jwb`, `jwb_file`, `tgl_jwb`, `nilai`) VALUES
(6, 1, 1, 5, 35, 6, '<p>jawaban menggunakan file</p>\r\n', '539054440db0059a9b4bc79fe010e51c.pdf', 1636362847, '80'),
(7, 1, 1, 1, 35, 2, '<p>Sudah di instal..</p>\r\n', 'Tidak ada File', 1636363742, '60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'Kelas 1A'),
(2, 'Kelas 1B'),
(3, 'Kelas 2A'),
(4, 'Kelas 2B'),
(5, 'Kelas 3A'),
(6, 'Kelas 3B'),
(7, 'Kelas 4A'),
(8, 'Kelas 4B'),
(9, 'Kelas 5A'),
(10, 'Kelas 5B'),
(11, 'Kelas 6A'),
(12, 'Kelas 6B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kursus`
--

CREATE TABLE `tb_kursus` (
  `id_kursus` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kursus`
--

INSERT INTO `tb_kursus` (`id_kursus`, `id_mapel`, `gambar`, `tgl_dibuat`, `id_guru`, `id_kelas`) VALUES
(1, 1, 'read.png', 1634453310, 10, 10),
(2, 4, 'read.png', 1636363866, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `mapel`) VALUES
(1, 'Bahasa Inggris'),
(4, 'IPA'),
(5, 'PPKN'),
(6, 'Bahasa Jawa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_qna`
--

CREATE TABLE `tb_qna` (
  `id_qna` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kritik` text NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sesi`
--

CREATE TABLE `tb_sesi` (
  `id_sesi` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `sesi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sesi`
--

INSERT INTO `tb_sesi` (`id_sesi`, `id_kursus`, `sesi`) VALUES
(1, 1, 'Pertemuan 1'),
(2, 1, 'Minggu Pertama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desk1` text NOT NULL,
  `desk2` text NOT NULL,
  `desk3` text NOT NULL,
  `desk4` text NOT NULL,
  `nm_sekolah` varchar(100) NOT NULL,
  `npsn` int(11) NOT NULL,
  `j_pndidikan` varchar(50) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `kd_pos` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `status_sekolah` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `map` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `title`, `desk1`, `desk2`, `desk3`, `desk4`, `nm_sekolah`, `npsn`, `j_pndidikan`, `rt`, `rw`, `kd_pos`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `status_sekolah`, `email`, `tlp`, `fb`, `map`, `gambar`) VALUES
(1, 'Selamat Datang di Aplikasi Elearning', 'Pembelajaran elektronik atau pembelajaran online yang disebut E-Learning adalah pembelajaran formal maupun non formal yang dilakukan dengan memanfaatkan teknologi, sehingga pelajar dan pengajar melakukan proses belajar mengajar menggunakan media elektronik. E-Learning dilakukan dalam jaringan, siswa dan guru bisa mengaksesnya di mana saja dan kapan saja. Pembelajaran elektronik atau pembelajaran online yang disebut E-Learning adalah pembelajaran formal maupun non formal yang dilakukan dengan memanfaatkan teknologi, sehingga pelajar dan pengajar melakukan proses belajar mengajar menggunakan media elektronik. E-Learning dilakukan dalam jaringan, siswa dan guru bisa mengaksesnya di mana saja dan kapan saja.', 'E-Learning yang sering ada biasanya berbentuk kursus online, seminar online, dan lain sebagainya. Umumnya E-Learning dilakukan melalui perantara internet berbasis web, semua materi, kuis dan bahan ajar bisa diakses pada web tersebut. Materi yang ada bisa berupa teks yang diformat menjadi bentuk file pdf, berbentuk suara, ada juga yang berbentuk streaming YouTube. Perkembangan ini bisa membantu Anda untuk lebih memahami materi yang diajarkan secara lebih detail.', 'Elearning merupakan salah satu cara yang sangat efisien untuk menyampaikan kursus atau pembelajaran secara online. Karena kenyamanan dan fleksibilitasnya, sumber daya tersedia dari mana saja dan kapan saja. Setiap orang, yang merupakan siswa paruh waktu atau bekerja penuh waktu, dapat memanfaatkan pembelajaran berbasis web.\r\n', 'Beberapa keunggulan lain yang dimiliki oleh pembelajaran secara online adalah siswa diberi kebebasan untuk mengikuti pembelajaran online dimanapun sesuai kenyamanannya. Selain itu biaya yang dikeluarkan juga terbilang hemat, karena kendala geografis bisa diatasi dengan minimnya kebutuhan ruang kelas dan guru yang mengajar. (sumber - idcloudhost.com/apa-itu-e-learning-pengertian-rekomendasi-contoh-dan-cara-install-nya/)', 'SD Negeri 01 Wiroditan', 20323610, 'SD', 9, 2, 51156, 'Jl. Raya Wiroditan No. 45', 'Wiroditan', 'Kec. Bojong', 'Kab. Pekalongan', 'Negeri', 'contoh@gmail.com', '0812345666', 'contoh.facebook', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3388.03179135984!2d109.6059768143174!3d-6.957430570049169!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7021f824a1995d:0x1703491ec8e857d2!2sSDN 01 WIRODITAN!5e1!3m2!1sid!2sid!4v1633910311499!5m2!1sid!2sid', 'sd.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','-') NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(30) NOT NULL,
  `th_masuk` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama`, `password`, `status`, `foto`, `agama`, `is_active`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`, `tlp`, `th_masuk`, `id_kelas`) VALUES
(2, '1001', 'Siswa1', '$2y$10$vg6y0kq8xtNc7R3.XLSELOQrJlznHfq/cDlEQBDMtdzS0qnMBSDDK', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '2022-01-20', 'PKL', '0821234567890', 2020, 10),
(3, '1002', 'Siswa2', '$2y$10$jYIaQdaok8UTnFZKDwO5guKpu66.VKx8bQDWoQpLtcjI5zNks/ofW', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(4, '1003', 'Siswa3', '$2y$10$lJXWnD50cAGkqYzIp56PAO3lsUnu5Jr1bAmRtDPKtPPtWpClHRqh.', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(5, '1004', 'Siswa4', '$2y$10$ja3lW9g0T0OZntpe2rDqYeyEVBe.j81vhpZEaSy/.7.Q6OUvLHEXC', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(6, '1005', 'Siswa5', '$2y$10$J078KsAJAUWuUEMy4KdzKeHiLhvvz9Gg5.EVGFHx2Ki6btveuyjBW', 'Siswa', 'default.jpg', 'Islam', 1, 'Perempuan', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(7, '1006', 'Siswa6', '$2y$10$fpuiWlDCScFG4Wt0M1jpyebXqDfwXxp4rqPrEvm2gPomfXsHKgNha', 'Siswa', 'default.jpg', 'Islam', 1, 'Perempuan', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(8, '1007', 'Siswa7', '$2y$10$Fj0Z9Xft6Cx3PqKmmAGjZuVKL90lIMx36oKD71W37CsOLFJVsrKc2', 'Siswa', 'default.jpg', 'Islam', 1, 'Perempuan', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(9, '1008', 'Siswa8', '$2y$10$zBPTclCpbxdAM3haMqay6e6rm5h1MhUiCI3Sam7P5RP5gev3LVvJa', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(10, '1009', 'Siswa9', '$2y$10$McArAqWfslo3xA3Gsv4QluvpK7tfKEekWd18mmgxveZYWw4QW.W9K', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '0000-00-00', 'Kajen', '0821234567890', 2020, 10),
(11, '1010', 'Siswa10', '$2y$10$uGpThTRKNxZQ6N64Cz4KEOB.v66Rp9gqwvaFts45VJ80u3W7p5Guu', 'Siswa', 'default.jpg', 'Islam', 1, 'Laki-laki', 'Pekalongan', '2021-10-17', 'Kajen', '0821234567890', 2020, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `nama_soal` varchar(100) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `id_kursus`, `nama_soal`, `id_sesi`, `pertemuan`, `file`, `soal`) VALUES
(2, 1, 'B inggris 1', 1, 1, 'Tidak ada File', '<h1>Installation</h1>\r\n\r\n<p>DataTables is a powerful Javascript library for adding interaction features to HTML tables, and while simplicity is a core design principle for the project as a whole, it can appear quite daunting to get started. However, taking those first steps and getting DataTables running on your web-site is actually quite straight forward as you need only include two additional files in your page:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>There are other files available such as&nbsp;<a href=\"https://editor.datatables.net/\">Editor</a>&nbsp;for adding editing abilities, and&nbsp;<a href=\"https://datatables.net/extras\">other plug-ins</a>, which can be used to extend the feature set of DataTables, but basically, all you need to do is include these two files to get up and running!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Requirements</h2>\r\n\r\n<p>Before we get started, we need to consider the requirements DataTables has in order to operate.</p>\r\n\r\n<h3>Dependencies</h3>\r\n\r\n<p>DataTables has only one library dependency (other software upon which it relies in order to work) -&nbsp;<a href=\"https://jquery.com/\">jQuery</a>. Being a jQuery plug-in, DataTables makes use of many of the excellent features that jQuery provides, and hooks into the jQuery plug-in system, in the same way as&nbsp;<a href=\"https://plugins.jquery.com/\">all other jQuery plug-ins</a>. jQuery 1.7 or newer will work with DataTables, although typically you will want to use the latest version. DataTables includes everything else that it requires to operate.</p>\r\n'),
(3, 1, 'B inggris 2', 1, 2, 'fe8dda9029622643f1cc8ca69dc76ee7.xlsx', '<p>soal excel</p>\r\n'),
(4, 1, 'B inggris 3', 1, 3, '72a976bc236f3f63ecdeb78e24021cde.png', '<p>soal gambar</p>\r\n'),
(5, 1, 'B inggris 4', 1, 4, '158e39f58e5365e4f0f0497f38f9968c.mp4', '<p>soal video</p>\r\n'),
(6, 1, 'inggris 5', 1, 5, 'cd8ee7aa12fbcfe6edc9f0d74ddd2016.pdf', '<p>jjjjkkk</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_sesi`
--

CREATE TABLE `tb_sub_sesi` (
  `id_sub_sesi` int(11) NOT NULL,
  `id_sesi` int(11) NOT NULL,
  `id_kursus` int(11) NOT NULL,
  `nama_file` varchar(125) NOT NULL,
  `keterangan` text NOT NULL,
  `dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sub_sesi`
--

INSERT INTO `tb_sub_sesi` (`id_sub_sesi`, `id_sesi`, `id_kursus`, `nama_file`, `keterangan`, `dibuat`) VALUES
(1, 1, 1, 'Tidak ada File', '<p>tes</p>\r\n', 1634455724),
(3, 1, 1, 'e60f8a6f80a8a3f34cfed5b47ab79ff7.png', '<p>gmbr</p>\r\n', 1634456050),
(4, 1, 1, '383654db6e17dd75774438bb36f67581.docx', '<p>file</p>\r\n', 1634456087),
(5, 1, 1, '18a30b20e2ae70280a33a132bb9a323e.jpeg', '<p>INI</p>\r\n', 1636200092),
(6, 2, 1, 'Tidak ada File', '<p><strong>apa&nbsp;</strong><strong>1</strong>&nbsp;<em>pron</em>&nbsp;kata tanya untuk menanyakan nama (jenis, sifat) sesuatu:&nbsp;<em>ular -- ini?;</em>&nbsp;<em>pohon -- yang kautanam?;</em>&nbsp;<strong>2</strong>&nbsp;<em>pron</em>&nbsp;kata tanya untuk pengganti sesuatu: --<em>&nbsp;yang dimaksudkan orang itu tadi?;</em>&nbsp;<strong>3</strong>&nbsp;<em>pron</em>&nbsp;kata tanya untuk menanyakan pertalian kekeluargaan:&nbsp;<em>(pernah) -- mu anak itu?;</em>&nbsp;<strong>4</strong>&nbsp;<em>pron</em>&nbsp;pengganti sesuatu yang kurang terang; pengganti barang sesuatu:&nbsp;<em>ia tidak tahu -- isi kotak itu;</em>&nbsp;<strong>5</strong>&nbsp;<em>p hor</em>&nbsp;untuk menghaluskan permintaan:&nbsp;<em>sudi -- lah kiranya Bapak mengabulkan permohonan kami;</em>&nbsp;<strong>6</strong>&nbsp;<em>p cak</em>&nbsp;untuk mendahului kalimat tanya: --<em>&nbsp;besok ada ulangan? -- tamu itu pamanmu?;</em>&nbsp;<strong>7</strong>&nbsp;<em>p cak</em>&nbsp;atau:&nbsp;<em>mau minum teh -- kopi; jadi berangkat hari ini -- besok;</em></p>\r\n\r\n<p><strong>-- akal</strong>&nbsp;bagaimana; apa yang harus diperbuat;<br />\r\n<strong>-- boleh</strong>&nbsp;<strong>buat</strong>&nbsp;sudah tidak ada jalan lain lagi; biarlah karena tidak dapat berbuat lain lagi;<br />\r\n<strong>-- daya</strong>&nbsp;tidak ada kuasa lagi;<br />\r\n<strong>-- hendak dikata</strong>&nbsp;tidak ada lagi yang dapat dikatakan (diperbuat) karena semuanya sudah terjadi;<br />\r\n<strong>-- kabar&nbsp;</strong><strong>1</strong>&nbsp;ada kabar bagaimana lagi;&nbsp;<strong>2</strong>&nbsp;bagaimana keadaannya;<br />\r\n<strong>-- lagi</strong>&nbsp;lebih-lebih; tambahan lagi;<br />\r\n<strong>-- macam</strong>&nbsp;bagaimana;<br />\r\n<strong>-- mau</strong>&nbsp;<em>cak</em>&nbsp;apa boleh buat;<br />\r\n<strong>-- saja&nbsp;</strong><strong>1</strong>&nbsp;sekalian yang belum diketahui;&nbsp;<strong>2</strong>&nbsp;segala sesuatu;<br />\r\n<br />\r\n<strong>apa-apa&nbsp;</strong><em>n</em>&nbsp;segala apa; apa pun; segala sesuatu; apa saja:&nbsp;<em>tidak ada ~;</em><br />\r\n<br />\r\n<strong>mengapa</strong><em>/meng&middot;a&middot;pa/</em>&nbsp;<em>pron</em>&nbsp;kata tanya untuk menanyakan sebab, alasan, atau perbuatan: ~<em>&nbsp;kawanmu tidak datang?; sedang -- adikmu itu?</em><br />\r\n<br />\r\n<strong>mengapai</strong><em>/meng&middot;a&middot;pai/</em>&nbsp;<em>v</em>&nbsp;melakukan sesuatu terhadap;<br />\r\n<br />\r\n<strong>mengapa-apai</strong><em>/meng&middot;a&middot;pa-a&middot;pai/</em>&nbsp;<em>v</em>&nbsp;melakukan sesuatu terhadap; mengapai;<br />\r\n<br />\r\n<strong>mengapakan&nbsp;</strong><em>/meng&middot;a&middot;pa&middot;kan /</em><em>v</em>&nbsp;<strong>1</strong>&nbsp;memperlakukan bagaimana:&nbsp;<em>tidak ada yang berani ~ nya</em>;&nbsp;<strong>2</strong>&nbsp;membuat sesuatu terhadap;<br />\r\n<br />\r\n<strong>dipengapakan</strong><em>/di&middot;peng&middot;a&middot;pa&middot;kan/</em>&nbsp;<em>ark v</em>&nbsp;diperlakukan bagaimana; dibagaimanakan:&nbsp;<em>barang-barang ini harus ~;</em><br />\r\n<br />\r\n<strong>apaan</strong><em>/apa&middot;an/</em>&nbsp;<em>pron cak</em>&nbsp;kata tanya yang digunakan untuk menanyakan tindakan, tanpa mengharapkan jawaban:&nbsp;<em>mainan ~ ini?</em><br />\r\n<br />\r\n<strong>apa-apaan</strong><em>/apa-apa&middot;an/</em>&nbsp;<em>pron cak</em>&nbsp;kata tanya untuk menanyakan tindakan dengan agak meremehkan, tanpa mengharapkan jawaban:&nbsp;<em>pekerjaan ~ ini?</em></p>\r\n', 1636363504);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto` varchar(125) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tgl_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `status`, `foto`, `is_active`, `tgl_daftar`) VALUES
(1, 'Humaidi Zakaria', '12345678', '$2y$10$wnNUcONSL7zPFH9d4ZSyHOtCqm7PUceo9dmrfcSBrsLPsslS3lqBC', 'Administrator', 'b253055d637cb1ddf81290bbd86ae53f.png', 1, 1633666669),
(25, 'Guru1', '2021001', '$2y$10$plXfp4PHrneJBkJsRQwR1.K6Z9z/la/1W.rgfAp9BHX4q.lSA0Bwq', 'Guru', 'default.jpg', 1, 1634141786),
(26, 'Guru2', '2021002', '$2y$10$z5QXrBvmiH4znoDtPH34qOsfwzFZdwaHuWnZ8bJNmCUvN7U9.DVKK', 'Guru', 'default.jpg', 1, 1634141787),
(27, 'Guru3', '2021003', '$2y$10$UafmzYoT2jM6YHFc0F1w.eZcVNbwNVf9OQLZQL.sx6qjhXl3M1yv2', 'Guru', 'default.jpg', 1, 1634141787),
(28, 'Guru4', '2021004', '$2y$10$UqmY1/rSLiOQq7s3jsri7.Ggn5u7dG2EMEgg82rNmisP/n7D6EPH.', 'Guru', 'default.jpg', 1, 1634141788),
(29, 'Guru5', '2021005', '$2y$10$MP7AKJeO1EHi32vfJfq2Qeb74ZAQkrBrcBJN74kVuNbNjxeclfmpq', 'Guru', 'default.jpg', 1, 1634141789),
(30, 'Guru6', '2021006', '$2y$10$aXIIEdiccrKafxKSMVfUDeBWuNHoalp1Y/OSfA7bWviyT.DN3MbpO', 'Guru', 'default.jpg', 1, 1634141789),
(31, 'Guru7', '2021007', '$2y$10$Id0TaAdyoEcNniRj/dg2i.mYjbDHE1TahzFINmSm59yx9651YH.0u', 'Guru', 'default.jpg', 1, 1634141790),
(32, 'Guru8', '2021008', '$2y$10$/GaGdaMYM54i1AODxd2tjeH5ktjdjm4MUJYeKJb0SSQga.vhcFx66', 'Guru', 'default.jpg', 1, 1634141790),
(33, 'Guru9', '2021009', '$2y$10$IM16DGKnQrCLZSSh7DMAaexMmlgvxfr1TK7y4OWoQwQt.LkAtYPrG', 'Guru', 'default.jpg', 1, 1634141791),
(34, 'Guru10', '2021010', '$2y$10$KKq6uKFgOLHu4KidsN4fqeqJCT0JkJEFlSL7nZmE2c6JatmXIt5vm', 'Guru', 'af9a2dc414ef2c46ad732308db811a22.png', 1, 1634141791),
(35, 'Siswa1', '1001', '$2y$10$pq/mrtUVQbNBvYXhM8SGZOBX5ilfGLujsDRyYqK8xqUwYwFW1Ja3S', 'Siswa', 'default.jpg', 1, 1634141822),
(36, 'Siswa2', '1002', '$2y$10$/7pLnIV5eiNmsYeHcU8UyudycKJBABC9wPV6hztTzmJ83jmOp2wTW', 'Siswa', 'default.jpg', 1, 1634141822),
(37, 'Siswa3', '1003', '$2y$10$OBm5Z7T5fHx4NydvGaaX8.x.o3.5LgQHX.CSBC5iCxsvCkNnD9VWC', 'Siswa', 'default.jpg', 1, 1634141823),
(38, 'Siswa4', '1004', '$2y$10$KoMmXBG1b12cpY7Ww4x/fO.bipaW8KabPvU8RjTyrWrt1zP2SNcYO', 'Siswa', 'default.jpg', 1, 1634141823),
(39, 'Siswa5', '1005', '$2y$10$1hFh8x/tOPCPPMNd.gc8SuiSIG0VLcp8kQ6AuNEdVO9TgSc78vN6y', 'Siswa', 'default.jpg', 1, 1634141824),
(40, 'Siswa6', '1006', '$2y$10$uQlFZXSIyu1xhmVXOIYZgeaZR8L92wHQtliSvF4JXULYM2Sn6pQf2', 'Siswa', 'default.jpg', 1, 1634141824),
(41, 'Siswa7', '1007', '$2y$10$AggBJnHD8KiIpoBKtS/rruIW/aiEZZL4MfnagVVyfyMY1NTOxu4fa', 'Siswa', 'default.jpg', 1, 1634141825),
(42, 'Siswa8', '1008', '$2y$10$zXA53HVYMsqvhEXNhvVkOufqaFzxyX0pwmaMPaDma0fwkRsrDqh6u', 'Siswa', 'default.jpg', 1, 1634141825),
(43, 'Siswa9', '1009', '$2y$10$V1GuqTDZ5i8je8BGpgz1nOWCRJAMTtfw9DHAHDUQRoJkPUsOD9Tei', 'Siswa', 'default.jpg', 1, 1634141826),
(44, 'Siswa10', '1010', '$2y$10$uGpThTRKNxZQ6N64Cz4KEOB.v66Rp9gqwvaFts45VJ80u3W7p5Guu', 'Siswa', 'default.jpg', 1, 1634141826);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `ip` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`ip`, `date`, `hits`, `online`, `time`) VALUES
('::1', '2021-10-13', 3, '1634142111', '2021-10-13 18:15:53'),
('::1', '2021-10-14', 8, '1634213328', '2021-10-14 13:09:29'),
('::1', '2021-10-16', 2, '1634406709', '2021-10-16 19:19:51'),
('::1', '2021-10-17', 8, '1634467647', '2021-10-17 07:46:01'),
('::1', '2021-10-26', 1, '1635259867', '2021-10-26 16:51:07'),
('::1', '2021-11-06', 3, '1636209098', '2021-11-06 12:12:36'),
('127.0.0.1', '2021-11-06', 2, '1636209819', '2021-11-06 13:42:19'),
('::1', '2021-11-08', 6, '1636373602', '2021-11-08 08:59:11'),
('127.0.0.1', '2021-11-08', 2, '1636363174', '2021-11-08 09:57:35'),
('::1', '2021-11-12', 1, '1636734343', '2021-11-12 17:25:43'),
('::1', '2021-12-02', 1, '1638461233', '2021-12-02 17:07:13'),
('::1', '2022-01-01', 1, '1641022226', '2022-01-01 08:30:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kursus`
--
ALTER TABLE `tb_kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_qna`
--
ALTER TABLE `tb_qna`
  ADD PRIMARY KEY (`id_qna`);

--
-- Indeks untuk tabel `tb_sesi`
--
ALTER TABLE `tb_sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tb_sub_sesi`
--
ALTER TABLE `tb_sub_sesi`
  ADD PRIMARY KEY (`id_sub_sesi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_kursus`
--
ALTER TABLE `tb_kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_qna`
--
ALTER TABLE `tb_qna`
  MODIFY `id_qna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sesi`
--
ALTER TABLE `tb_sesi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_sesi`
--
ALTER TABLE `tb_sub_sesi`
  MODIFY `id_sub_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
