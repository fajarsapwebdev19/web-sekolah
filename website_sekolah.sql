-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2023 at 02:45 AM
-- Server version: 8.0.30
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `logo` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_instansi` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kab_kota` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isi_about` text COLLATE utf8mb4_general_ci,
  `visi` text COLLATE utf8mb4_general_ci,
  `misi` text COLLATE utf8mb4_general_ci,
  `modified_by` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `logo`, `nama_instansi`, `kab_kota`, `isi_about`, `visi`, `misi`, `modified_by`, `modified_date`) VALUES
(1111, 'smk.png', 'SMK PGRI NEGLASARI', 'KEC NEGLASARI, KOTA TANGERANG, BANTEN (69987103)', 'SMK PGRI Neglasari tangerang berdiri mulai tahun 2012, dengan nama awal sebagai SMK PGRI Bandara, kemudian berganti menjadi SMK PGRI Neglasari pada tahun 2017. Mempunyai dua gedung untuk kegiatan KBM, kampus A di Jl. Marsekal Suryadharma dan gedung dan B di Jl. Bouraq No.4 Neglasari Tangerang, SMK PGRI Neglasari mempunyai 2 Kompetensi Keahlian, yaitu Bisnis Manajemen dengan jurusan Otomatisasi Tata Kelola Perkantoran Dan Teknik Komputer jaringan.', 'Mencetak pribadi yang unggul, berilmu, berwawasan, dan bertakwa ', '<p>Untuk mewujudkan Visi tersebut, SMK PGRI NEGLASARI merumuskan beberapa Misi Sebagai berikut : \r\n</p><p>a. Melaksanakan nilai-nilai agama dalam kehidupan sehari-hari dalam rangka meningkatkan iman dan taqwa (imtaq) baik di lingkungan sekolah, keluarga, dan masyarakat.\r\n</p><p>b. Memanfaatkan dan mengefektifkan sarana dan prasarana yang ada dan berupaya untuk melengkapinnya dalam rangka menumbuhkembangkan sekolah sebagai tempat belajar dan tempat latihan peserta didik serta memberikan pelayanan prima pada masyarakat.\r\n</p><p>c. Menjalin kerja sama dengan institusi dan DU/DI yang relevan dengan program keahlian yang ada.\r\n</p><p>d. Mengembangkan sarana belajar yang berdasarkan pada nilai luhur agama dan budaya serta nilai-nilai kebangsaan.</p>', 'fajarsapwebdev19', '2023-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `foto_upload`
--

CREATE TABLE `foto_upload` (
  `id_foto` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `judul_file` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `date_upload` date NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_upload`
--

INSERT INTO `foto_upload` (`id_foto`, `judul_file`, `file`, `date_upload`, `create_date`, `create_by`, `modified_date`, `modified_by`) VALUES
('1805454192', 'Pelaksanaan ANBK 2023', 'WhatsApp Image 2023-09-02 at 18.14.57.jpg', '2023-09-02', '2023-09-02', 'fajarsapwebdev19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hub_industri`
--

CREATE TABLE `hub_industri` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_perusahaan` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo_perusahaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ppdb`
--

CREATE TABLE `jadwal_ppdb` (
  `id_jadwal` int NOT NULL,
  `tanggal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kegiatan` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `link_alamat` text COLLATE utf8mb4_general_ci,
  `view_telp` enum('Y','N') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telp` char(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_email` enum('Y','N') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_wa` enum('Y','N') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_wa` char(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_fb` enum('Y','N') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_fb` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link_fb` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_ig` enum('Y','N') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_ig` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link_ig` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `view_yt` enum('Y','N') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_yt` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link_yt` char(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `link_alamat`, `view_telp`, `no_telp`, `view_email`, `email`, `view_wa`, `no_wa`, `view_fb`, `user_fb`, `link_fb`, `view_ig`, `user_ig`, `link_ig`, `view_yt`, `user_yt`, `link_yt`, `modified_date`, `modified_by`) VALUES
('2332-8766-6657-5646-8887', 'Jl. Marsekal Surya Dharma No 1 Selapajang Jaya Kec. Neglasari Kota Tangerang - Banten 15127', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.512879942248!2d106.63183661195005!3d-6.12723579413716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a021c3ff1e245%3A0xf4fa11231316064b!2sSMK%20PGRI%20Neglasari!5e0!3m2!1sid!2sid!4v1694159494921!5m2!1sid!2sid', 'Y', '021-29879042', 'Y', 'smkpgrineglasari.tng@gmail.com', 'N', '000000000000', 'N', 'Lorem Ipsum', 'https://web.facebook.com/groups/IndoProgramer', 'Y', '@smkgrineta', 'https://www.instagram.com/smkgrineta', 'N', 'Lorem Ipsum', 'https://www.youtube.com', '2023-09-08', 'fajarsapwebdev19');

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `portal_id` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_portal` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `judul_portal` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `konten_portal` text COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`portal_id`, `foto_portal`, `judul_portal`, `konten_portal`, `create_date`, `create_by`) VALUES
('1310120752', 'Screenshot (33).png', 'Pengumuman Pelaksanaan ANBK Tahun 2023 SMK Sederajat', '<p>Yth. Kepada :</p><p>Kepala SMA / SMK / SKH Se-Provinsi Banten</p><p>di tempat</p><p><br></p><p>&nbsp; &nbsp; Menindaklanjuti Peraturan Kepala Badan Standar, Kurikulum, dan Asesmen Pendidikan Nomor 015/H/KP/2023 tentang Prosedur Operasional Standar Penyelengaraan Asesmen Nasional Tahun 2023, jadwal pelaksanaan Asesmen Nasional Tahun 2023 sebagai berikut :</p><p>a. 18-20 Agustus 2023, Sinkronisasi Gladih Bersih AN SMA, SMK Sederajat</p><p>b. 21 - 24 Agustus 2023, Gladih Bersih AN SMA, SMK Sederajat</p><p>c. 25 - 27 Agustus 2023, Sinkronisasi Pelaksanaan AN SMA, SMK Sederajat</p><p>d. 28 - 31 Agustus 2023, Pelaksanaan AN SMA, SMK Sederajat</p><p>e. 11 - 24 September 2023, Pelaksanaan Sulingjar (Kepsek Dan Guru) SMA / SMK Sederajat</p><p><br></p><p>&nbsp; &nbsp; Sehubungan Dengan Hal tersebut diatas, kami mohon Kepala Sekolah untuk segera mempersiapkan pelaksanaan Asesmen Nasional Tahun 2023 melalui langkah-langkah sebagai berikut :</p><p>1. Menyiapkan peserta didik yang sudah tersampling dalam laman </p><p><a href=\"https://bioansma.kemdikbud.go.id\" target=\"_blank\">https://bioansma.kemdikbud.go.id</a><a href=\"https://bioansma.kemdikbud.go.id\" target=\"_blank\" style=\"\">&nbsp;,</a></p><p><a href=\"https://bioansmk.kemdikbud.go.id\" target=\"_blank\">https://bioansmk.kemdikbud.go.id</a><a href=\"https://bioansmk.kemdikbud.go.id,\" target=\"_blank\"> ,</a>&nbsp;</p><p><a href=\"https://bioanslb.kemdikbud.go.id\" target=\"_blank\">https://bioanslb.kemdikbud.go.id</a></p><p>2. Memerintahkan proktor untuk melakukan persiapan gladih bersih dan pelaksaan ANBK melalui laman <a href=\"https://anbk.kemdikbud.go.id\" target=\"_blank\">https://anbk.kemdikbud.go.id</a><a href=\"https://anbk.kemdikbud.go.id\" target=\"_blank\"></a></p><p>3. Menyiapkan pengawasan silang antar sekolah dalam pelaksanaan anbk di bawah bimbingan pengawas pembina sekolah dan berkoordinasi dengan Kantor Cabang Dinas Pendidikan Dan Kebudayaan.</p><p>4. Memerintahkan proktor dan peserta didik yang tersampling untuk mengikuti gladih bersih dan pelaksanaan ANBK sesuai jadwal</p><p>5. Menyiapkan Kepala Sekolah dan guru yang terdaftar dalam laman <a href=\"https://dashboardslb.kemdikbud.go.id\" target=\"_blank\">https://dashboardslb.kemdikbud.go.id</a>&nbsp;untuk mengikuti survey lingkungan belajar</p><p>6. Memerintahkan Kepala Sekolah dan guru yang sudah terdaftar untuk mengisi survey lingkungan belajar sesuai jadwal melalui laman <a href=\"https://surveilingkunganbelajar.kemdikbud.go.id\" target=\"_blank\">https://surveilingkunganbelajar.kemdikbud.go.id</a></p><p>&nbsp; &nbsp; Jika sekolah mengalami kesulitan dalam persiapan dan pelaksanaan Asesmen Nasional, silahkan untuk berkoordinasi dengan Tim Teknis ANBK (Helpdesk) Provinsi Banten yang terdapat dalam laman ANBK melalui Layanan Pengaduan.</p><p>&nbsp; &nbsp; Demikian kami sampaikan, atas perhatiannya diucapkan terima kasih</p><p><br></p><p>TTD Lukman, S.Pd.M.Pd</p>', '2023-09-03', 'fajarsapwebdev19');

-- --------------------------------------------------------

--
-- Table structure for table `ptk`
--

CREATE TABLE `ptk` (
  `id_anggota` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `asal_instansi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ptk`
--

INSERT INTO `ptk` (`id_anggota`, `foto`, `nama`, `jk`, `asal_instansi`, `jabatan`, `create_date`, `create_by`, `modified_date`, `modified_by`) VALUES
('07c044f5-b902-423a-8670-69ae293121bc', NULL, 'Amsori, S.T', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'Teknisi Dan Pelatih Paskibra', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('127c49ec-307c-4ac0-98e5-cd18bb3e82f2', NULL, 'Zainudin, S.Kom', 'Laki-Laki', 'SMK Teknologi Teluknaga', 'PKS Kesiswaan Dan Wali Kelas 11 TKJ', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('19cdf394-e322-459d-8f8f-8c3c6e0879f0', NULL, 'Andriyan Gusti Yusup, S.Pd', 'Laki-Laki', 'SMK Gama Tangerang', 'Guru Simulasi Digital', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('1b22b29d-dbc6-46e4-92a6-bc92e7165b2c', NULL, 'Widura Ecsuci', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'Wali Kelas 10 TKJ', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('1f36be5b-4173-448c-b913-b22180fdcde2', NULL, 'Eliza Nurbani, S.E', 'Perempuan', 'SMK PGRI NEGLASARI', 'Wakasek Kurikulum', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('34531f39-5c8f-429f-bd5f-aadab8bba08a', NULL, 'Israniar, S.Pd', 'Perempuan', 'SMK PGRI NEGLASARI', 'Wali Kelas 10 OTKP', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('41de5ab8-d3b4-4a6e-8e9a-03d39a152d5d', NULL, 'Siti Nurhaeni, S.E', 'Perempuan', 'SMK PGRI NEGLASARI', 'Guru Produktif OTKP', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('4cf02815-6cb9-4c18-9999-4b27bc9b835a', NULL, 'Intan Febriana, S.E', 'Perempuan', 'SMK PGRI NEGLASARI', 'Kepala Program OTKP', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('4ea651e2-7a83-4a5c-a02f-6dc99fbe3ee6', NULL, 'Drs. Agus Irianto', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'Kepala Sekolah', '2023-09-07', 'fajarsapwebdev19', NULL, NULL),
('76880206-610d-4630-86d7-11aeec482a95', NULL, 'Dra. Rini Saraswati, M.Pd', 'Perempuan', 'SMKN 1 Kota Tangerang', 'Bendahara Umum', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('8376e2bd-6fd8-46d2-9cb1-b2b7b2727114', NULL, 'Lia Sri Handayani, M.Pd', 'Perempuan', 'SMK YP Karya Bangsa', 'Guru Produktif OTKP', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('872be662-6aaf-4547-9eb0-3b81450cf38c', NULL, 'Gondo Subroto', 'Laki-Laki', 'SDN Selapajang Jaya 1', 'Pembina Osis Dan Pembina Pramuka', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('87ba3d38-3484-4ecc-96d5-6565ebef1c32', NULL, 'Cecep Hermawan', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'Pelatih Marawis', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('89e97d2a-8058-4410-b2e1-7a2bef9283c5', NULL, 'Rita Ertiyana, S.PdI', 'Perempuan', 'SMK Voctech 2 Tangerang', 'Wali Kelas 12 OTKP', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('9815ebcc-b5d1-44cb-9699-7857645deec5', NULL, 'Salmah S.PdI', 'Perempuan', 'SMK Cemerlang', 'Wali Kelas 12 TKJ', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('9d1635a8-ced7-4e81-b008-60fa64d05528', NULL, 'Een Suhaenah, S.Pd', 'Perempuan', 'SMK Teluknaga', 'Wali Kelas 11 TKJ', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('ac47d0ec-ded2-4165-bc40-81850d925135', NULL, 'Lilis Suryani', 'Perempuan', 'SMK PGRI NEGLASARI', 'Staff Keuangan', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('b8363e7f-9531-44eb-82d1-a07be54f562b', NULL, 'M. Alip Aenul P, S.Pd', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'PKS Humas', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('c51ef082-57c6-4508-8a98-a5de420af0c0', NULL, 'Surya Darmawan, S.Pd', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'Guru Seni Budaya Dan Sejarah Indonesia', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('ce95aada-1fb0-4ea2-bbc8-411383e7e870', NULL, 'Ahmad Zakky, S.T', 'Laki-Laki', 'SMK Teknologi Teluknaga', 'Kepala Program TKJ', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('d1f5e2c3-8eaf-4fa0-b982-018bf3e14464', NULL, 'Fajar Saputra', 'Laki-Laki', 'SMK PGRI NEGLASARI', 'Operator Dan Kepala Lab Komputer', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('d6d514ff-1023-4fe0-9018-b2e346a362dd', NULL, 'Rina Widiasari, S.Si', 'Perempuan', 'SMK PGRI NEGLASARI', 'PKS Sarpras', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('d72b9078-8b51-40bc-b6a7-ccb902233383', NULL, 'Nila Sagita', 'Perempuan', 'SMK PGRI NEGLASARI', 'Kepala Tata Usaha', '2023-09-08', 'fajarsapwebdev19', NULL, NULL),
('d85b107f-0539-4486-ae96-0f8385160069', NULL, 'Mohammad Gandhi, S.H', 'Laki-Laki', 'SMK Teknologi Teluknaga', 'Guru PKN', '2023-09-08', 'fajarsapwebdev19', '2023-09-08', 'fajarsapwebdev19'),
('e6d2d467-f8ac-41f2-93a3-fd07590f1532', NULL, 'Mustakim, S.Pd, M.M', 'Laki-Laki', 'KORWIL NEGLASARI', 'Badan Pendiri Sekolah', '2023-09-07', 'fajarsapwebdev19', NULL, NULL),
('fbee25e9-d9aa-4fa7-bb92-0b63152fb108', NULL, 'Fitriana', 'Perempuan', 'SMK PGRI NEGLASARI', 'Staff Administrasi Persuratan', '2023-09-08', 'fajarsapwebdev19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_anggota`
--

CREATE TABLE `registrasi_anggota` (
  `registrasi_id` char(200) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` char(13) COLLATE utf8mb4_general_ci NOT NULL,
  `asal_instansi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Menunggu','Terima','Tolak') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tgl_tolak` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi_anggota`
--

INSERT INTO `registrasi_anggota` (`registrasi_id`, `nama`, `jk`, `nik`, `no_telp`, `asal_instansi`, `status`, `create_date`, `tgl_terima`, `tgl_tolak`) VALUES
('17759923151111104201', 'Fajar Saputra', 'Laki-Laki', '3671101912010003', '081254199564', 'SMK PGRI NEGLASARI', 'Terima', '2022-12-30', NULL, '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `slider_data`
--

CREATE TABLE `slider_data` (
  `id` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_slider` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `judul_slider` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kontent_slider` text COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` date NOT NULL,
  `create_by` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_data`
--

INSERT INTO `slider_data` (`id`, `foto_slider`, `judul_slider`, `kontent_slider`, `create_date`, `create_by`) VALUES
('013356F7-5D57-0FBA-7E76-869D9149E3DA', 'WhatsApp Image 2023-09-02 at 18.14.57.jpg', 'SMK PGRI NEGLASARI SUDAH MELAKSANAKAN ANBK', '<p><b>SMK PGRI NEGLASARI TELAH SELESAI MELAKSANAKAN ANBK (Asesment Nasional Berbasis Komputer) Pada Tanggal 28 - 29 Agustus 2023 Moda Semi Online. Kegiatan Tersebut Berjalan Dengan Lancar</b></p>', '2023-09-02', 'fajarsapwebdev19'),
('3EDBC46D-E456-BA26-6430-E367320153C7', 'POSTER-RAPOR-SMK-PGRI-NEGLASARI-69987103-2023-1.png', 'Ayo Benahi Rapor Pendidikan Di Sekolah Kita', '<p><b>Mari sama sama perbaiki kekurangan yang ada di rapor pendidikan sekolah SMK PGRI NEGLASARI guna untuk memperbaiki kualitas pendidikan di satuan pendidikan.</b></p>', '2023-09-02', 'fajarsapwebdev19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` char(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `username` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `status_akun` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `role` enum('Admin','User') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jk`, `tgl_lahir`, `username`, `password`, `email`, `status_akun`, `create_date`, `last_login`, `role`) VALUES
('BD31D669-F25C-980A-8C54-69D07655FAF2', 'Fajar Saputra', 'Laki-Laki', '2001-12-19', 'fajarsapwebdev19', 'Neglasarikeren12', 'fajarsaputratkj3@gmail.com', 'Aktif', '2022-11-25', '2023-09-08 08:47:35', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `video_upload`
--

CREATE TABLE `video_upload` (
  `id_video` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `judul_file` char(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link_embed` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_upload`
--
ALTER TABLE `foto_upload`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `hub_industri`
--
ALTER TABLE `hub_industri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_ppdb`
--
ALTER TABLE `jadwal_ppdb`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `portal`
--
ALTER TABLE `portal`
  ADD PRIMARY KEY (`portal_id`);

--
-- Indexes for table `ptk`
--
ALTER TABLE `ptk`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `registrasi_anggota`
--
ALTER TABLE `registrasi_anggota`
  ADD PRIMARY KEY (`registrasi_id`);

--
-- Indexes for table `slider_data`
--
ALTER TABLE `slider_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `video_upload`
--
ALTER TABLE `video_upload`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `jadwal_ppdb`
--
ALTER TABLE `jadwal_ppdb`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
