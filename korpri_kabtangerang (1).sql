-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 02:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `korpri_kabtangerang`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `nama_instansi` varchar(300) DEFAULT NULL,
  `kab_kota` varchar(300) DEFAULT NULL,
  `isi_about` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `logo`, `nama_instansi`, `kab_kota`, `isi_about`, `visi`, `misi`, `modified_by`, `modified_date`) VALUES
(1111, 'korpri.png', 'Korps Pegawai Republik Indonesia', 'KABUPATEN TANGERANG', 'Korpri Kabupaten Tangerang merupakan salah satu instansi pemerintah yang bertugas mengelola dan mengurusi segala hal yang berkaitan dengan kepala daerah, pemerintahan, dan pelayanan publik di Kabupaten Tangerang. Korpri Kabupaten Tangerang terletak di Jalan Dewi Sartika No. 1, Tangerang, Banten 15111 dan dapat dihubungi melalui nomor telepon (021) 55722222 atau email info@korpri-tangerang.go.id. Informasi lebih lanjut tentang Korpri Kabupaten Tangerang juga dapat diakses melalui website resmi http://korpri-tangerang.go.id.', 'menjadi Kabupaten Tangerang yang sejahtera, mandiri, dan terpercaya.', '<p>1. Meningkatkan kesejahteraan masyarakat melalui peningkatan kesejahteraan sosial, ekonomi, dan kesehatan.\r\n</p><p>2. Menciptakan lingkungan yang sehat dan aman melalui pengelolaan sumber daya alam yang bijaksana dan pengembangan infrastruktur yang terintegrasi.\r\n</p><p>3. Mewujudkan tata kelola pemerintahan yang baik, transparan, dan akuntabel melalui peningkatan kapasitas sumber daya manusia dan pengembangan sistem manajemen yang efektif.\r\n</p><p>4. Menciptakan sinergi dan kerja sama yang efektif dengan berbagai pihak, termasuk swasta, masyarakat, dan pemerintah daerah lain.</p>', 0, '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(200) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `nama` char(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_instansi` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `foto`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `asal_instansi`, `jabatan`, `create_date`, `create_by`, `modified_date`, `modified_by`) VALUES
('1112651439', '2130171598__Ketua Kopri.jpg', 'Drs. H. Moch. Maesyal Rasyid, M.Si', 'Laki-Laki', 'TANGERANG', '1978-11-10', 'Sekretaris Daerah', 'Ketua Dewan Pengurus', '2022-11-24', 'fajarsapwebdev19', '2022-12-20', 'adminpanel'),
('2069191439', '1210352453__WhatsApp Image 2021-11-03 at 4.18.53 PM.jpeg', 'Drs. H. Soma Atmaja, M.Si', 'Laki-Laki', 'Tangerang', '1996-12-20', 'DPMPTSP', 'Wakil Ketua', '2022-11-24', 'fajarsapwebdev19', '2022-12-20', 'adminpanel'),
('789666433', 'avatar04.png', 'PARMAN', 'Laki-Laki', 'TANGERANG', '1978-06-20', 'TNI AU', 'KETUA KORPRI', '2022-11-24', 'fajarsapwebdev19', '2022-12-28', 'fajarsapwebdev19');

-- --------------------------------------------------------

--
-- Table structure for table `foto_upload`
--

CREATE TABLE `foto_upload` (
  `id_foto` varchar(100) NOT NULL,
  `judul_file` char(100) NOT NULL,
  `file` varchar(300) NOT NULL,
  `date_upload` date NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_upload`
--

INSERT INTO `foto_upload` (`id_foto`, `judul_file`, `file`, `date_upload`, `create_date`, `create_by`, `modified_date`, `modified_by`) VALUES
('1213380894', 'Foto 5', 'coding-ga60cd12a4_1920.jpg', '2022-11-24', '2022-11-24', 'fajarsapwebdev19', NULL, NULL),
('1504271653', 'Foto 4', 'laptop-g69ee80819_1920.jpg', '2022-11-24', '2022-11-24', 'fajarsapwebdev19', NULL, NULL),
('1535414129', 'Foto 6', 'fregert.png', '2022-11-24', '2022-11-24', 'fajarsapwebdev19', NULL, NULL),
('1614321050', 'Gambar 1', 'code-g73ad61fe9_1280.jpg', '2022-11-24', '2022-11-24', 'fajarsapwebdev19', NULL, NULL),
('25028709', 'Foto 2', 'computer-g8fa85f52b_1920.png', '2022-11-24', '2022-11-24', 'fajarsapwebdev19', NULL, NULL),
('347495530', 'Foto 3', 'security-gfa1810cfd_1920.jpg', '2022-11-24', '2022-11-24', 'fajarsapwebdev19', NULL, NULL),
('465009911', 'coding', 'pexels-christina-morillo-1181271.jpg', '2022-12-28', '2022-12-28', 'fajarsapwebdev19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_klinik`
--

CREATE TABLE `jadwal_klinik` (
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam_awal` varchar(20) NOT NULL,
  `jam_akhir` varchar(20) NOT NULL,
  `kegiatan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_klinik`
--

INSERT INTO `jadwal_klinik` (`id_jadwal`, `hari`, `jam_awal`, `jam_akhir`, `kegiatan`) VALUES
(1, 'Senin', '08.00', '12.00', 'Periksa Pasien Di Klinik'),
(2, 'Senin', '13.00', '17.00', 'Periksa Pasien Di Rumah Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(200) NOT NULL,
  `alamat` text DEFAULT NULL,
  `link_alamat` text DEFAULT NULL,
  `view_telp` enum('Y','N') DEFAULT NULL,
  `no_telp` char(25) DEFAULT NULL,
  `view_email` enum('Y','N') DEFAULT NULL,
  `email` char(200) DEFAULT NULL,
  `view_wa` enum('Y','N') DEFAULT NULL,
  `no_wa` char(25) DEFAULT NULL,
  `view_fb` enum('Y','N') DEFAULT NULL,
  `user_fb` char(200) DEFAULT NULL,
  `link_fb` char(200) DEFAULT NULL,
  `view_ig` enum('Y','N') DEFAULT NULL,
  `user_ig` char(200) DEFAULT NULL,
  `link_ig` char(200) DEFAULT NULL,
  `view_yt` enum('Y','N') DEFAULT NULL,
  `user_yt` char(200) DEFAULT NULL,
  `link_yt` char(200) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `alamat`, `link_alamat`, `view_telp`, `no_telp`, `view_email`, `email`, `view_wa`, `no_wa`, `view_fb`, `user_fb`, `link_fb`, `view_ig`, `user_ig`, `link_ig`, `view_yt`, `user_yt`, `link_yt`, `modified_date`, `modified_by`) VALUES
('2332-8766-6657-5646-8887', 'Kantor Pemda Tigaraksa, PFGP+W6H, Kadu Agung, Kec. Tigaraksa, Kabupaten Tangerang, Banten 15720', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1982.963771308357!2d106.4843409!3d-6.2732582!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4207e46f18ed25%3A0x4a65ac906d10b894!2sKantor%20Pemda%20Tigaraksa!5e0!3m2!1sid!2sid!4v1672380192734!5m2!1sid!2sid', 'Y', '0000000000', 'Y', 'loremdolor@mail.com', 'Y', '000000000000', 'N', 'Lorem Ipsum', 'https://web.facebook.com/groups/IndoProgramer', 'Y', '@korpri.tangkab', 'https://www.instagram.com/korpri.tangkab/', 'N', 'Lorem Ipsum', 'https://www.youtube.com', '2022-12-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `portal_id` varchar(200) NOT NULL,
  `foto_portal` varchar(300) NOT NULL,
  `judul_portal` varchar(200) NOT NULL,
  `konten_portal` text NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`portal_id`, `foto_portal`, `judul_portal`, `konten_portal`, `create_date`, `create_by`) VALUES
('1620238077', '2092221123__Selamat ultah Kota.jpg', 'KORPRI KABUPATEN TANGERANG MENGUCAPKAN SELAMAT ULANG TAHUN KOTA TANGERANG YANG KE 29', '<div>Hari ini adalah hari ulang tahun kota Tangerang yang ke-XXX. Kota Tangerang merupakan salah satu kota yang terletak di provinsi Banten, Indonesia. Sejak berdiri pada tahun XXXX, Tangerang telah berkembang menjadi salah satu kota industri dan perdagangan yang penting di Indonesia.</div><div><br></div><div>Tangerang merupakan kota yang memiliki potensi wisata yang cukup besar. Di kota ini terdapat beberapa tempat wisata yang menarik, seperti Taman Mini Indonesia Indah, Taman Hutan Raya Ir. H. Juanda, dan Taman Kota Taman Mini. Selain itu, Tangerang juga memiliki beberapa tempat wisata alam yang indah, seperti Pantai Anyer, Pantai Carita, dan Gunung Mas.</div><div><br></div><div>Selain menjadi salah satu kota industri dan perdagangan yang penting di Indonesia, Tangerang juga dikenal sebagai salah satu kota yang memiliki kuliner yang enak. Di Tangerang, terdapat banyak warung makan yang menyajikan masakan tradisional Indonesia, seperti sate ayam, gado-gado, dan nasi goreng.</div><div><br></div><div>Untuk merayakan ulang tahun kota Tangerang yang ke-XXX, Pemerintah Kota Tangerang telah menyelenggarakan berbagai acara, seperti pertunjukan seni, pertandingan olahraga, dan festival kuliner. Selain itu, Pemerintah Kota Tangerang juga telah mengadakan berbagai program sosial, seperti pembagian sembako kepada masyarakat yang membutuhkan dan pembagian masker gratis kepada masyarakat.</div><div><br></div><div>Para warga Tangerang tentu sangat antusias untuk ikut serta dalam merayakan ulang tahun kota ini. Selamat ulang tahun, Tangerang! Semoga kota ini terus berkembang dan maju, serta menjadi tempat yang nyaman untuk tinggal bagi para warganya.</div>', '2022-11-24', 'fajarsapwebdev19'),
('541201483', '765308464__Medsos Korpri 07042022.jpg', 'PEMBUATAN KOPERASI KORPRI KAB. TANGERANG', '<div>Pembuatan koperasi korporasi kabupaten Tangerang merupakan sebuah langkah positif yang diambil oleh pemerintah setempat untuk meningkatkan kesejahteraan masyarakat dan mengembangkan sektor ekonomi lokal. Koperasi korporasi adalah sebuah organisasi yang dibentuk oleh perusahaan atau badan usaha milik negara (BUMN) untuk mengelola kepentingan bersama para anggotanya.</div><div><br></div><div>Pembuatan koperasi korporasi kabupaten Tangerang dilakukan setelah terlebih dahulu dilakukan survei terhadap kebutuhan dan potensi ekonomi masyarakat setempat. Hasil survei tersebut menunjukkan bahwa terdapat sejumlah sektor yang memiliki potensi untuk dikembangkan, seperti pertanian, perdagangan, dan jasa.</div><div><br></div><div>Dengan adanya koperasi korporasi kabupaten Tangerang, diharapkan dapat meningkatkan akses masyarakat terhadap modal dan peluang usaha, serta dapat membantu pemerintah dalam pengembangan sektor ekonomi lokal. Selain itu, koperasi korporasi juga diharapkan dapat meningkatkan kesejahteraan masyarakat melalui adanya program-program kerjasama antara koperasi dengan perusahaan atau BUMN yang bersangkutan.</div><div><br></div><div>Pembuatan koperasi korporasi kabupaten Tangerang juga merupakan upaya untuk meningkatkan daya saing daerah dan menciptakan lapangan kerja bagi masyarakat setempat. Dengan demikian, diharapkan dapat tercipta sinergi yang positif antara pemerintah, masyarakat, dan perusahaan untuk mengembangkan sektor ekonomi daerah.</div><div><br></div><div>Koperasi korporasi kabupaten Tangerang akan dikelola oleh sebuah tim yang terdiri dari perwakilan dari perusahaan atau BUMN yang bersangkutan dan masyarakat setempat. Tim ini akan bertugas mengelola keuangan koperasi, serta menyusun program-program kerjasama yang dapat meningkatkan kesejahteraan masyarakat dan pengembangan sektor ekonomi daerah.</div><div><br></div><div>Pembuatan koperasi korporasi kabupaten Tangerang diharapkan dapat menjadi solusi untuk mengatasi permasalahan ekonomi masyarakat setempat dan menciptakan lapangan kerja bagi para penduduknya. Selain itu, dengan adanya koperasi korporasi ini diharapkan dapat meningkatkan akses masyarakat terhadap modal dan peluang usaha&nbsp;Semoga dengan adanya koperasi korporasi ini, masyarakat dapat memperoleh manfaat yang optimal dan dapat terlibat secara aktif dalam pengembangan sektor ekonomi daerah.</div><div><br></div><div>Pemerintah setempat juga harus memberikan dukungan yang cukup bagi koperasi korporasi kabupaten Tangerang, seperti dengan memberikan akses kepada modal dan pelatihan bagi para anggotanya. Dengan demikian, diharapkan koperasi korporasi ini dapat berkembang dan memberikan manfaat yang optimal bagi masyarakat setempat.</div><div><br></div><div>Secara keseluruhan, pembuatan koperasi korporasi kabupaten Tangerang merupakan sebuah langkah yang positif untuk meningkatkan kesejahteraan masyarakat dan mengembangkan sektor ekonomi lokal. Semoga dengan adanya koperasi ini, masyarakat dapat memperoleh manfaat yang optimal dan dapat terlibat secara aktif dalam pengembangan sektor ekonomi daerah.</div><div><br></div>', '2022-11-24', 'fajarsapwebdev19'),
('623657066', '1656611161__PENGHARGAAN CNBC.jpg', 'UCAPAN KETUA PENGURUS KEPADA BUPATI TANGERANG', '<div>Kepala Pengurus Korpri Kabupaten Tangerang, Bapak Budi Santoso, mengucapkan selamat kepada Bupati Tangerang, Bapak Hadi Zainal, atas dilantiknya menjadi seorang Bupati di Kabupaten Tangerang. Kepala Pengurus Korpri menyatakan bahwa dilantiknya Bupati Hadi Zainal sebagai pemimpin daerah merupakan suatu kehormatan bagi masyarakat Kabupaten Tangerang.</div><div><br></div><div>Budi Santoso menyampaikan bahwa Bupati Hadi Zainal merupakan sosok yang dikenal sebagai pemimpin yang visioner, memiliki integritas tinggi, dan selalu memperjuangkan kepentingan masyarakat. Kepala Pengurus Korpri juga menyatakan bahwa diharapkan Bupati Hadi Zainal dapat terus memimpin Kabupaten Tangerang dengan baik dan menjadikan daerah ini menjadi lebih maju dan sejahtera.</div><div><br></div><div>Selain itu, Kepala Pengurus Korpri juga menyatakan bahwa Korpri Kabupaten Tangerang siap bekerja sama dengan pemerintah daerah dalam mengembangkan sektor ekonomi daerah. Korpri Kabupaten Tangerang juga akan terus memberikan dukungan kepada Bupati Hadi Zainal dalam pengembangan daerah ini, serta akan terus memberikan kontribusi positif bagi masyarakat Kabupaten Tangerang.</div><div><br></div><div>Budi Santoso menutup ucapannya dengan menyampaikan bahwa Korpri Kabupaten Tangerang berharap dapat terus bekerja sama dengan pemerintah daerah dalam meningkatkan kesejahteraan masyarakat dan pengembangan sektor ekonomi daerah. Semoga dengan dilantiknya Bupati Hadi Zainal, Kabupaten Tangerang dapat terus maju dan sejahtera.</div>', '2022-11-24', 'fajarsapwebdev19');

-- --------------------------------------------------------

--
-- Table structure for table `profil_badan_usaha`
--

CREATE TABLE `profil_badan_usaha` (
  `id` int(11) NOT NULL,
  `jenis_profile` varchar(90) NOT NULL,
  `isi_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil_badan_usaha`
--

INSERT INTO `profil_badan_usaha` (`id`, `jenis_profile`, `isi_profile`) VALUES
(1, 'Koperasi', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur blanditiis explicabo asperiores, cupiditate minus ratione ad ipsum non fuga? Aut asperiores perferendis vitae dolores sed incidunt omnis modi, ea repudiandae facere eius et unde odit atque optio aspernatur? Dolore vero earum nulla consequuntur? Pariatur quasi quo aliquid molestias voluptatum sapiente eius reprehenderit. Obcaecati eos sed ipsam amet! Deserunt temporibus aliquid quisquam quibusdam aliquam eos asperiores doloremque architecto quaerat, dolorem provident pariatur sunt inventore cum voluptas illo dolore corporis. Quos, nisi laudantium ipsam, repellendus, dolor ullam laboriosam veniam iure modi officia ducimus dicta est aliquam quas omnis ad! Repudiandae sit aliquam iure debitis expedita asperiores architecto officiis. Rem consectetur quidem non maxime, repellat sed modi adipisci laborum dolor quasi vitae voluptatibus. Iste culpa quam illo aspernatur reprehenderit enim soluta molestiae sit non! Minima odit ipsam accusantium fugiat non minus libero soluta cupiditate ad vel repellat maxime, cumque obcaecati perferendis placeat. Enim sit et magnam expedita illo laborum aliquid suscipit. Pariatur architecto temporibus quisquam, ullam blanditiis eius atque, voluptatibus sequi labore, exercitationem totam libero optio aperiam accusamus? Quos, magnam! Eius nostrum sapiente tempora dolores natus totam quos suscipit nemo repellat! Aliquid commodi quibusdam natus fuga nostrum itaque deserunt praesentium unde quam animi!'),
(2, 'Klinik', 'abc'),
(3, 'Yayasan', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur blanditiis explicabo asperiores, cupiditate minus ratione ad ipsum non fuga? Aut asperiores perferendis vitae dolores sed incidunt omnis modi, ea repudiandae facere eius et unde odit atque optio aspernatur? Dolore vero earum nulla consequuntur? Pariatur quasi quo aliquid molestias voluptatum sapiente eius reprehenderit. Obcaecati eos sed ipsam amet! Deserunt temporibus aliquid quisquam quibusdam aliquam eos asperiores doloremque architecto quaerat, dolorem provident pariatur sunt inventore cum voluptas illo dolore corporis. Quos, nisi laudantium ipsam, repellendus, dolor ullam laboriosam veniam iure modi officia ducimus dicta est aliquam quas omnis ad! Repudiandae sit aliquam iure debitis expedita asperiores architecto officiis. Rem consectetur quidem non maxime, repellat sed modi adipisci laborum dolor quasi vitae voluptatibus. Iste culpa quam illo aspernatur reprehenderit enim soluta molestiae sit non! Minima odit ipsam accusantium fugiat non minus libero soluta cupiditate ad vel repellat maxime, cumque obcaecati perferendis placeat. Enim sit et magnam expedita illo laborum aliquid suscipit. Pariatur architecto temporibus quisquam, ullam blanditiis eius atque, voluptatibus sequi labore, exercitationem totam libero optio aperiam accusamus? Quos, magnam! Eius nostrum sapiente tempora dolores natus totam quos suscipit nemo repellat! Aliquid commodi quibusdam natus fuga nostrum itaque deserunt praesentium unde quam animi!');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_anggota`
--

CREATE TABLE `registrasi_anggota` (
  `registrasi_id` char(200) NOT NULL,
  `nama` char(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `nik` char(16) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `asal_instansi` varchar(100) NOT NULL,
  `status` enum('Menunggu','Terima','Tolak') DEFAULT NULL,
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
  `id` varchar(200) NOT NULL,
  `foto_slider` varchar(300) NOT NULL,
  `judul_slider` varchar(100) NOT NULL,
  `kontent_slider` text NOT NULL,
  `create_date` date NOT NULL,
  `create_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_data`
--

INSERT INTO `slider_data` (`id`, `foto_slider`, `judul_slider`, `kontent_slider`, `create_date`, `create_by`) VALUES
('01C19F3F-48E0-BCA6-3CB9-2D71536AE598', '985584416__Medsos Korpri web 1.jpg', 'Santunan Yatim Dan Piatu', 'Korpri Kabupaten Tangerang merupakan salah satu kabupaten yang terletak di Provinsi Banten, Indonesia. Korpri Kabupaten Tangerang memiliki beberapa kegiatan yang menunjukkan rasa silahturahmi dan kepedulian terhadap masyarakatnya, salah satunya adalah dengan memberikan santunan kepada anak yatim dan anak piatu.\n', '2022-11-24', 'fajarsapwebdev19'),
('426F641F-C20C-2294-B61C-DE944B401224', '1813608957__Medsos Korpri web 2.jpg', 'Apa Itu Korpri ? ', 'Korpri atau Komisi Pemilihan Umum adalah lembaga pemerintah yang bertanggung jawab untuk menyelenggarakan pemilihan umum di Indonesia. Korpri bertugas untuk menyelenggarakan pemilihan umum secara terbuka, adil, dan bersih sesuai dengan prinsip-prinsip demokrasi. Korpri juga bertugas untuk mensupervisi dan mengawasi proses pemilihan umum serta memberikan saran dan rekomendasi kepada pemerintah mengenai pemilihan umum.', '2022-11-24', 'fajarsapwebdev19'),
('FF39BC88-F9BC-0A71-DD7B-3BF761E80E69', '1021520209__Medsos korpri web 3.jpg', 'Selamat Datang', 'Selamat Datang Di Website Kami', '2022-11-24', 'fajarsapwebdev19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `nama` char(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `status_akun` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `role` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jk`, `tgl_lahir`, `username`, `password`, `email`, `status_akun`, `create_date`, `last_login`, `role`) VALUES
('456559CD-EC6D-28D0-AF0F-F4E373547123', 'Administrator', 'Laki-Laki', '1999-08-18', 'adminpanel', 'admin', 'adminpanel@mail.com', 'Aktif', '2022-11-25', '2022-12-24 22:49:40', 'Admin'),
('BD31D669-F25C-980A-8C54-69D07655FAF2', 'Fajar Saputra', 'Laki-Laki', '2001-12-19', 'fajarsapwebdev19', 'Neglasarikeren12', 'fajarsaputratkj3@gmail.com', 'Aktif', '2022-11-25', '2022-12-31 23:04:16', 'Admin'),
('F9020F2E-3614-5999-9F97-B0C5B6A75449', 'Alvira Sofani', 'Perempuan', '2022-12-28', 'vira29', '123456', 'alvirasofani29@gmail.com', 'Aktif', '2022-12-28', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `video_upload`
--

CREATE TABLE `video_upload` (
  `id_video` varchar(100) NOT NULL,
  `judul_file` char(100) DEFAULT NULL,
  `link_embed` varchar(300) NOT NULL,
  `create_date` date DEFAULT NULL,
  `create_by` varchar(200) DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  `modified_by` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_upload`
--

INSERT INTO `video_upload` (`id_video`, `judul_file`, `link_embed`, `create_date`, `create_by`, `modified_date`, `modified_by`) VALUES
('1013129806', 'Curhat Bareng Bang Dea - Males Ngoding Karena Game', 'https://youtube.com/embed/ipDOzczZwig', '2022-12-30', 'fajarsapwebdev19', '2022-12-30', 'fajarsapwebdev19'),
('1214092888', 'Buat Portofolio', 'https://youtube.com/embed/8Ea4oq8qFtM', '2022-12-30', 'fajarsapwebdev19', NULL, NULL),
('1672020120', 'Cara Cepat Membuat Web', 'https://youtube.com/embed/K7ExWSnQdFU', '2022-12-30', 'fajarsapwebdev19', NULL, NULL),
('1994425886', 'Chat Open AI Semakin Bahaya', 'https://youtube.com/embed/JyOvLyasDlE', '2022-12-30', 'fajarsapwebdev19', NULL, NULL),
('444072567', 'Bahaya Chat GPT', 'https://youtube.com/embed/gDkrQp-zQCU', '2022-12-30', 'fajarsapwebdev19', NULL, NULL),
('723954016', 'Curhat Bareng Bang Dea Eps 4', 'https://youtube.com/embed/DTtMALCMgUQ', '2022-12-30', 'fajarsapwebdev19', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `foto_upload`
--
ALTER TABLE `foto_upload`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `jadwal_klinik`
--
ALTER TABLE `jadwal_klinik`
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
-- Indexes for table `profil_badan_usaha`
--
ALTER TABLE `profil_badan_usaha`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT for table `jadwal_klinik`
--
ALTER TABLE `jadwal_klinik`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil_badan_usaha`
--
ALTER TABLE `profil_badan_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
