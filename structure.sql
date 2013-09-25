-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 25, 2013 at 04:09 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `infogue_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `alias`, `name`) VALUES
(1, 'pendidikan', 'Pendidikan'),
(2, 'hiburan', 'Hiburan'),
(3, 'gaya-hidup', 'Gaya Hidup'),
(4, 'teknologi', 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(150) NOT NULL,
  `message` longtext NOT NULL,
  `message_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `page_static`
--

CREATE TABLE IF NOT EXISTS `page_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page_static`
--


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_status_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `link_source` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `publish_date` datetime NOT NULL,
  `view_count` smallint(4) NOT NULL,
  `is_hot` smallint(4) NOT NULL,
  `is_popular` smallint(4) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `category_id`, `post_status_id`, `alias`, `name`, `desc`, `thumbnail`, `link_source`, `create_date`, `publish_date`, `view_count`, `is_hot`, `is_popular`) VALUES
(3, 1, 2, 2, 'kompilasi-valentino-simanjuntak-si-jebrettt', 'Kompilasi Valentino Simanjuntak Si JEBRETTT', '<span></span> <span>Banyak yang merasa terganggu. Tapi lebih banyak yang kemudian meniru teriakan Jebret atau Ow ow ow yang diteriakkan sang komentator, baik dalam obrolan maupun status di jejaring sosial.</span> <div> <span><br></span> </div><div> <span>Dihubungi Tempo, Senin, 23 September 2013i, Valentino Simanjuntak mengaku tidak mengira teriakan itu kemudian menjadi pembicaraan.</span> </div><div> <span><br></span> </div><div> <span>Bagaimana awal mula Anda memilih kata-kata "jebret"?</span> </div><div><br></div>', '2013/09/24/20130924_103930_2553.jpg', 'http://www.kaskus.co.id/thread/52402cd4fdca174d6f000001/kompilasi-valentino-simanjuntak-si-jebrettt/', '2013-09-24 10:39:00', '2013-09-24 09:37:00', 0, 0, 0),
(4, 1, 3, 2, 'apa-beda-pemukiman-kumuh-di-manila-sama-di-jakarta-gan', 'Apa Beda Pemukiman Kumuh di Manila sama di Jakarta Gan ?', '<span></span> <span >Filipina adalah negara berkembang di kawasan Asia Tenggara, sama seperti Indonesia. Sebagai negara dengan tingkat pertumbuhan ekonomi paling cepat di Asia, ternyata Manila, Ibukota Filipina juga menyimpan permasalahan pelik sama seperti kota-kota besar lainnya.</span> <div> <span ><br></span> </div><div> <span >Di antara gedung-gedung pencakar langit dang glamornya kehidupan sebagian besar warga kota, Manila juga memiliki area pemukiman kumuh di bantaran sungai. Pemandangan ini tentu saja sama seperti yang biasa kita jumpai di kota Jakarta.</span> </div><div> <span ><br></span> </div><div> <span >Dilansir dari DailyMail.co.uk, ada sekitar 105.000 hingga 580.000 jiwa hidup di daerah kumuh yang rawan bencana. Kebanyakan rumah-rumah tersebut dibangun dari gubuk atau bangunan semi permanen.</span> </div><div> <span ><br></span> </div><div> <span >Rumah-rumah semi permanen tersebut dikhawatirkan akan terkena dampak bencana alam badai tropis yang sering menyerang negara Filipina.</span> </div><div> <span ><br></span> </div><div> <span >Badai tropis yang melanda negara tersebut sering menimbulkan korban jiwa. Misalnya saja, tahun 2012 lalu, 50 orang meninggal dunia saat angin topan Saola menyerang. Bahkan tahun 2009 lalu, angin topan Ketsana juga memporak-porandakan Manila dan menewaskan ratusan orang.</span> </div><div><br></div>', '2013/09/24/20130924_104532_8423.jpg', 'http://www.kaskus.co.id/thread/51b82d6cbe29a0aa5d000002/apa-beda-pemukiman-kumuh-di-manila-sama-di-jakarta-gan/', '2013-09-24 10:45:33', '2013-09-24 09:44:00', 3, 0, 0),
(5, 1, 2, 2, 'pemuda-mesir-jatuhkan-pesawat-dengan-ketapel-gan', 'Pemuda Mesir Jatuhkan Pesawat dengan Ketapel Gan !', '<span></span> <span >Sering kita jumpai beberapa iklan minuman berenergi yang menampilkan kekuatan luar biasa, bahkan bisa membuat para penggunanya melakukan berbagai hal dengan kekuatan berlebih.</span> <div> <span ><br></span> </div><div> <span >Selain itu, ada pula iklan makanan atau minuman berenergi lainnya yang menonjolkan efek kesehatan pada tubuh saat mengonsumsi produk tersebut.</span> </div><div> <span ><br></span> </div><div> <span >Namun, lain halnya dengan iklan makanan berenergi di Timur Tengah. Sebuah iklan produk energy bar Mesir yang diberi nama Tonger Energy, menampilkan iklan yang unik sekaligus kreatif.</span> </div><div><br></div>', '2013/09/24/20130924_104641_3083.jpg', 'http://www.kaskus.co.id/thread/50b5af378327cfb31100007f/pemuda-mesir-jatuhkan-pesawat-dengan-ketapel-gan/', '2013-09-24 10:46:43', '2013-09-24 09:46:00', 0, 0, 0),
(6, 1, 2, 2, 'foto-galeri-kafe-unik-dari-berbagai-negara', 'Foto Galeri Kafe Unik dari Berbagai Negara', '<span></span> <span >H.R. Giger Alien Bar di Switzerland Memiliki Kursi dan Dekorasi Ruangan Tulang Belulang</span> <div> <span ><br></span> </div><div> <span >Silahkan klik linknya gan untuk gambar kafe lainnya</span> </div>', '2013/09/24/20130924_104705_5632.jpg', 'http://www.kaskus.co.id/thread/000000000000000015326413/foto-galeri-kafe-unik-dari-berbagai-negara/', '2013-09-24 10:48:11', '2013-09-24 09:47:00', 0, 0, 0),
(7, 1, 1, 2, 'tes-psikopat', 'Tes Psikopat', 'Di Amerika, ternyata ada tes yang dikembangkan oleh para psikiater untuk menguji apakah seseorang adalah pembunuh berantai atau bukan. Tes ini konon sukses diujikan pada pembunuh berantai terkenal Ted Bundy (yang konon bahkan bisa lolos dari tes detektor kebohongan). Nah, ternyata tes2 ini nggak dibeberin untuk umum dan aku hanya berhasil mendapatkan 4 pertanyaan saja dari internet. Ada dua versi jawaban dari tiap pertanyaan, yaitu jawaban yang umumnya akan diberikan oleh orang normal pada umumnya dan ada pula jawaban versi psikopat yang sangat mengerikan.<div><br></div>', '', 'http://www.kaskus.co.id/thread/51f16c003f42b25978000000/tes-psikopat-agan-termasuk-kagak-nie/', '2013-09-24 10:51:10', '2013-09-24 09:48:00', 0, 0, 0),
(8, 1, 1, 2, 'mulai-sekarang-bilang-nol-bukan-kosong', 'Mulai Sekarang, Bilang "Nol" Bukan "Kosong"!', '<span></span> <span >Perbedaan Antara Bilangan dan Angka</span> <div> <span ><br></span> </div><div> <span >Sebelum ane bahas mengenai angka atau bilangan nol, ada baiknya kita tahu apa bedanya antara angkan dengan bilangan. Bilangan adalah suatu konsep abstrak matematika yang digunakan untuk pencacahan atau pengukuran. Sedangkan angka adalah lambang yang digunakan untuk melambangkan suatu bilangan. Sebagai contoh: Bilangan satu dilambangkan oleh angka "1". Bilangan dua ratus tiga puluh empat dilambangkan oleh angka 2,3 dan 4. Jadi angka itu ada 10 buah yaitu 0, 1, 2, 3, 4, 5, 6, 7, 8, dan 9. Beda lagi kalo yang dimaksud adalah angka romawi contohnya I, V ,X dan seterusnya.</span> </div><div> <span ><br></span> </div><div> <span >Bilangan/Angka 0 Itu Bukanlah Kosong</span> </div><div><br></div>', '2013/09/24/20130924_105220_7760.jpg', 'http://www.kaskus.co.id/thread/50f337072c75b4717c000009/mulai-sekarang-bilang-quotnolquot-bukan-quotkosongquot/', '2013-09-24 10:52:22', '2013-09-24 09:51:00', 0, 0, 0),
(9, 1, 2, 2, 'j-world-tokyo-taman-bermain-bertema-anime-weekly-shonen-jump', 'J-WORLD TOKYO : TAMAN BERMAIN BERTEMA ANIME WEEKLY SHONEN JUMP', '<span></span> <span >Buat agan2 yang suka ama anime pasti tau dong aneime di atas ane&nbsp;</span> <div> <span ><br></span> </div><div> <span >Selama ini kita cuma liat aja kan di TV,CD,atau DVD (punya sendiri,ngopy,apa minjem temen &nbsp;), tanggal 11 Juli 2013 telah dibuka tempat yang namanya J-WORLD TOKYO.</span> </div><div> <span >Taman bermain ini selain memiliki berbagai wahana yang bertemakan Naruto, One Piece, dan Dragon Ball, taman bermain ini juga menyediakan Heroes Arena yang memberikan kesempatan bagi pengunjung untuk menikmati berbagai wahana mini dari karya terkenal lainnya,</span> </div><div><br></div>', '2013/09/24/20130924_105404_9040.jpg', 'http://www.kaskus.co.id/thread/5209ecacbecb17f664000002/j-world-tokyo--taman-bermain-bertema-anime-dari-weekly-shonen-jump/', '2013-09-24 10:54:43', '2013-09-24 09:54:00', 0, 0, 0),
(10, 1, 1, 2, '5-pesawat-buatan-indonesia', '5 Pesawat Buatan Indonesia', '<span></span> <span >N-2130 adalah pesawat jet komuter berkapasitas 80-130 penumpang rancangan asli IPTN yang sekarang bernama PT Dirgantara Indonesia. Menggunakan kode N yang berarti Nusantara menunjukkan bahwa desain, produksi dan perhitungannya dikerjakan di Indonesia atau bahkan Nurtanio, yang merupakan pendiri dan perintis industri penerbangan di Indonesia.</span> <div> <span ><br></span> </div><div> <span >Pada 10 November 1995, Presiden Soeharto mengumumkan proyek N-2130. Soeharto mengajak rakyat Indonesia untuk menjadikan proyek N-2130 sebagai proyek nasional. N-2130 yang diperkirakan akan menelan dana dua milyar dollar AS itu, akan dibuat secara gotong-royong melalui penjualan dua juta lembar saham dengan harga pecahan 1.000 dollar AS. Untuk itu, dibentuklah perusahaan PT. Dua Satu Tiga Puluh (PT DSTP) untuk melaksanakan proyek besar ini.</span> </div><div> <span ><br></span> </div><div> <span >Saat badai krisis moneter 1997 menerpa Indonesia, PT DSTP limbung. Setahun kemudian akibat adanya ketidakstabilan politik dan penyimpangan pendanaan, mayoritas pemegang saham melalui RUPSLB (Rapat Umum Pemegang Saham Luar Biasa) 15 Desember 1998 meminta PT DSTP untuk melikuidasi diri. Imbasnya proyek N-2130 menjadi terbengkalai.</span> </div>', '2013/09/24/20130924_105532_8907.jpg', 'http://www.kaskus.co.id/thread/523d1a7ebfcb17360f000003/5-pesawat-buatan-indonesia/', '2013-09-24 10:55:33', '2013-09-24 09:54:00', 0, 0, 0),
(11, 1, 1, 2, 'terkuak-inilah-alasan-mengapa-bung-karno-harus-disingkirkan', 'Terkuak, Inilah Alasan Mengapa Bung Karno Harus Disingkirkan', '<span></span> <span >Pada 1961-an, Presiden Soekarno gencar merevisi kontrak pengelolaan minyak oleh asing di Indonesia. Sebanyak 60 persen dari keuntungan perusahaan minyak asing menjadi jatah pemerintah. Kebanyakan pengusaha asing gerah dengan peraturan itu.</span> <div> <span ><br></span> </div><div> <span >Menurut sejarawan Asvi Marwan Adam, Soekarno benar-benar ingin sumber daya alam Indonesia dikelola oleh anak bangsa sendiri. Asvi menuturkan sebuah arsip di Kedutaan Besar Amerika Serikat di Jakarta mengungkapkan pada 15 Desember 1965 sebuah tim dipimpin oleh Chaerul Saleh di Istana Cipanas sedang membahas nasionalisasi perusahaan asing di Indonesia.</span> </div><div> <span ><br></span> </div><div> <span >Soeharto yang pro-pemodal asing, datang ke sana menumpang helikopter. Dia menyatakan kepada peserta rapat dia dan Angkatan Darat tidak setuju rencana nasionalisasi perusahaan asing itu. Soeharto sangat berani saat itu, Bung Karno juga tidak pernah memerintahkan seperti itu, kata Asvi.</span> </div><div> <span ><br></span> </div><div> <span >Sebelum tahun 1965, seorang taipan dari Amerika Serikat menemui Soekarno. Pengusaha itu menyatakan keinginannya berinvestasi di Papua. Namun Soekarno menolak secara halus. Saya sepakat dan itu tawaran menarik. Tapi tidak untuk saat ini, coba tawarkan kepada generasi setelah saya, ujar Asvi menirukan jawaban Soekarno.</span> </div><div> <span ><br></span> </div><div> <span >Soekarno berencana modal asing baru masuk Indonesia 20 tahun lagi, setelah putra-putri Indonesia siap mengelola. Dia tidak mau perusahaan luar negeri masuk, sedangkan orang Indonesia memiliki pengetahuan nol tentang alam mereka sendiri. Sebagai persiapan, Soekarno mengirim banyak mahasiswa belajar ke negara-negara lain.</span> </div><div> <span ><br></span> </div><div> <span >Soekarno boleh saja membuat tembok penghalang untuk asing dan mempersiapkan calon pengelola negara. Namun, Asvi menjelaskan usaha pihak luar ingin mendongkel kekuasaan Soekarno tidak kalah kuat.</span> </div><div> <span ><br></span> </div><div> <span >Dalam artikel berjudul JFK, Indonesia, CIA, and Freeport dterbitkan majalah Probe edisi Maret-April 1996, Lisa Pease menulis pada awal November 1965, Langbourne Williams, ketua dewan direktur Freeport, menghubungi direktur Freeport, Forbes Wilson. Williams menanyakan apakah Freeport sudah siap melakukan eksploitasi di Papua. Wilson hampir tidak percaya mendengar pertanyaan itu. Dia berpikir Freeport akan sulit mendapatkan izin karena Soekarno masih berkuasa.</span> </div><div> <span ><br></span> </div><div> <span >Baca selanjutnya dilink berikut ini</span> </div>', '2013/09/24/20130924_105625_5641.jpg', 'http://www.kaskus.co.id/thread/5126ccc6e374b4c12f00000d/terkuak-inilah-alasan-mengapa-bung-karno-harus-disingkirkan/', '2013-09-24 10:56:40', '2013-09-24 09:55:00', 2, 0, 0),
(12, 1, 2, 2, 'game-paling-sulit-di-dunia-sudah-di-taklukan', 'Game Paling Sulit Di Dunia Sudah Di Taklukan', '<span></span> <span >Untuk versi yang pertama hanya tersedia 30 Level, Silahkan klik link dibawah ini. Jangan lupa &nbsp;dulu ya gan&nbsp;</span> <div> <span >The World Hardest Game Versi 1</span> </div><div> <span ><br></span> </div><div> <span >Untuk versi yang kedua Level yang tersedia lebih banyak yaitu 60 Level, Silahkan Klik link di bawah ini. Jangan lupa &nbsp;nya ya gan&nbsp;</span> </div><div> <span >The World Hardest Game Versi 2</span> </div><div> <span ><br></span> </div><div> <span >Ane gak tanggung jawab kalo ada barang yang pecah, Resiko Tanggung sendiri gan&nbsp;</span> </div><div> <span ><br></span> </div><div> <span ><br></span> </div><div> <span >Untuk Komentar, Pendapat, Screenshot Kaskuser ane sediain di Post #3&nbsp;</span> </div>', '2013/09/24/20130924_105745_7502.jpg', 'http://www.kaskus.co.id/thread/51a6f09248ba54d047000001/game-paling-sulit-di-dunia-di-taklukan/', '2013-09-24 10:58:13', '2013-09-24 09:57:00', 24, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_status`
--

CREATE TABLE IF NOT EXISTS `post_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post_status`
--

INSERT INTO `post_status` (`id`, `name`) VALUES
(1, 'Draft'),
(2, 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE IF NOT EXISTS `post_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(6, 2, 1),
(8, 3, 2),
(9, 4, 3),
(10, 4, 4),
(11, 5, 5),
(12, 5, 6),
(13, 6, 7),
(14, 6, 8),
(15, 7, 9),
(16, 8, 10),
(17, 9, 11),
(18, 10, 5),
(19, 10, 12),
(20, 11, 13),
(21, 12, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `alias`, `name`) VALUES
(1, '4', '4'),
(2, 'valentino-simanjuntak', 'Valentino Simanjuntak'),
(3, 'manila', 'Manila'),
(4, 'jakarta', 'Jakarta'),
(5, 'pesawat', 'Pesawat'),
(6, 'ketapel', 'Ketapel'),
(7, 'kafe', 'Kafe'),
(8, 'negara', 'Negara'),
(9, 'psikopat', 'Psikopat'),
(10, 'nol', 'Nol'),
(11, 'tokyo', 'Tokyo'),
(12, 'indonesia', 'Indonesia'),
(13, 'bung-karno', 'Bung Karno'),
(14, 'game', 'Game');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `register_date` datetime NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type_id`, `email`, `fullname`, `passwd`, `address`, `register_date`, `is_active`) VALUES
(1, 1, 'her0satr@yahoo.com', 'Suekarea', '7da40cdcb64b0bdfa5f5e8dc7a5ccf8b', '1235', '2013-07-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Member');
