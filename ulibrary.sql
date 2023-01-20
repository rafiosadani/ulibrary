-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2022 at 07:26 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_kategori_buku` int(11) NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `id_penerbit` int(11) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `id_kategori_buku`, `pengarang`, `id_penerbit`, `tahun_terbit`, `jumlah_halaman`, `sinopsis`, `jumlah_buku`, `gambar`, `id_rak`) VALUES
(1, 'Kimia Anorganik', 2, 'Nuryono', 1, '2018', 192, 'Buku ini dipersiapkan untuk digunakan sebagai salah satu bahan ajar bagi mahasiswa kimia perguruan tinggi tahun pertama yang mengambil perkuliahan bidang kimia anorganik, yang secara khusus membahas konsep dasar kimia anorganik, yaitu struktur dan ikatan kimia. Di samping itu, buku ini dapat juga digunakan sebagai bahan bacaan pelengkap bagi para pengampu kimia anorganik dari program studi Kimia dan Pendidikan Kimia. Karena pengguna buku ajar ini merupakan mahasiswa tahun pertama/awal maka penyajian materi tidak dilengkapi dengan penjabaran matematika secara detail, tetapi disusun secara sederhana dan singkat tanpa mengurangi prinsip dasar untuk setiap topik.\r\n', 30, '638b1e326d0d2.jpg', 1),
(2, 'Konsep Dasar Kimia Lingkungan E/3', 2, 'G.s. Sodhi', 4, '2016', 204, 'Edisi ketiga buku Konsep Dasar Kimia Lingkungan membahas pengaruh faktor lingkungan terhadap organisme dan benda mati di sekelilingnya dengan perhatian khusus pada isu-isu terkait kesehatan manusia. Topik-topik seperti konservasi energi, hujan asam, pengubah katalitik, batas danau, penipisan lapisan ozon, eutrofikasi, fungisida alami, dan pengelolaan limbah yang berhubungan dengan kemajuan masyarakat juga dicantumkan. Buku ini juga membahas senyawa kimia beracun, seperti hidrokarbon aromatik berinti-banyak, metil isosianat, logam berat, dan sianida. Referensi terbaru dan situs web yang relevan disediakan pada akhir setiap bab.', 26, '638b2369e520e.jpeg', 1),
(4, 'Fisika Kuantum', 2, 'Ridwan Abdullah Sani, Muhammad Kadri', 8, '2017', 255, 'Fisika kuantum adalah teori pamungkas fisikawan untuk memahami alam semesta. Fisika kuantum dapat berdiri kokoh sampai saat ini karena mampu memprediksi setiap eksperimen dalam fisika.Buku ini ditujukan untuk mahasiswa fisika, khususnya mahasiswa program Pendidikan Fisika dalam mempelajari konsep dasar fisika kuantum. Pemaparan dalam buku ini dibuat sederhana agar mudah dipahami, namun tidak terlepas dari penggunaan matematika yang dibutuhkan dalam analisis teori fisika kuantum. Kajian dilengkapi dengan contoh dan latihan soal untuk pemantapan penguasaan materi yang disajikan. Beberapa aplikasi teknologi juga disajikan di dalam buku ini untuk memudahkan pembaca dalam memahami konsep kuantum.\r\n', 1, '638dcfe43fd93.jpg', 1),
(5, 'Fisika Bangunan 1', 2, 'Nur Laela Latifah', 9, '2015', 236, ' Terkait Fisika Bangunan, desain arsitektur berkaitan erat dengan kenyamanan termal, visual, dan audial. Buku Fisika Bangunan 1 ini menyajikan pembahasan yang berhubungan dengan pengendalian termal serta solar chart &amp; sirip penangkal sinar matahari (SPSM) untuk mendukung kenyamanan termal, yang dibuka oleh pembahasan iklim, cuaca, dan arsitektur. Selain itu, dibahas penghawaan alami untuk mendukung kenyamanan termal dan penerangan alami untuk mendukung kenyamanan visual.', 1, '638dd0deac0a6.jpg', 1),
(6, ' Biomimicry', 2, 'Janine M. Benyus', 10, '2014', 357, 'Jika teori chaos mengubah pandangan kita tentang alam semesta, biomimikri mengubah kehidupan kita di Bumi. Biomimikri adalah inovasi yang terinspirasi oleh alam ,memanfaatkan evolusi 3,8 miliar tahun sejak bakteri pertama. Biomimikri mempelajari ide-ide terbaik alam: fotosintesis, kekuatan otak, dan cangkang, dan mengadaptasinya untuk digunakan manusia. Mereka merevolusi cara kita menemukan, menghitung, menyembuhkan diri sendiri, memanfaatkan energi, memperbaiki lingkungan, dan memberi makan dunia.Penulis sains dan dosen Janine Benyus menyebutkan dan menjelaskan fenomena ini. Dia membawa kita ke lab dan ke lapangan bersama para peneliti mutakhir saat mereka mengaduk tong protein untuk melepaskan kekuatan komputasi mereka; menganalisis bagaimana elektron bergerak cepat di sekitar sel daun mengubah sinar matahari menjadi bahan bakar dalam sepersekian detik; temukan obat ajaib dengan mengamati apa yang dimakan simpanse saat mereka sakit; mempelajari padang rumput yang keras sebagai model untuk pertanian dengan pemeliharaan rendah; dan banyak lagi.', 20, '638dd1a080870.jpg', 1),
(7, 'Wabah dan Pandemi', 2, 'Meera Senthilingam', 11, '2021', 144, 'Buku ini menyajikan tinjauan atas perjuangan manusia melawan penyakit menular hingga saat ini, berikut penjelasan berbagai istilahnya seperti wabah, epidemi, pandemi, isolasi, kekebalan kelompok, dan lain-lain. Ditunjukkan juga bahwa penanganan penyakit menular bukan hanya soal medis, melainkan juga punya aspek sejarah, politik, sosial, dan lain-lain. Di tengah dunia yang sedang diancam penyakit menular mematikan, buku ini menjadi pegangan jernih yang memberi wawasan dan harapan, membantu kita mengerti apa yang kita hadapi dan bagaimana kita menghadapinya selama ini.\r\n', 30, '638dd255bf79d.jpg', 1),
(8, 'Nusantara dalam Catatan Tionghoa', 7, 'W. P. Groeneveldt', 12, '2018', 315, 'Nusantara merupakan daerah perlintasan yang sangat tua. Sejak periode 2000 SM, Nusantara telah menjalin hubungan dengan Dinasti Shang di Cina. Mulai abad ke-18 orang-orang Barat mencoba melacak kembali persentuhan-persentuhan pertama antara Negeri Cina dengan Nusantara. Dan dalam hal ini penelitian oleh W.P. Groeneveldt tentang Nusantara dalam catatan Tionghoa yang pertama kali diumumkan pada 1880 tetap saja merupakan pegangan yang bermanfaat sampai sekarang. Denys Lombard, dalam Nusa Jawa Silang Budaya II.', 19, '638dd31eb01f0.jpg', 1),
(9, 'Jakarta 1950-1970', 7, 'Firman Lubis', 13, '2018', 488, 'Buku ini menceritakan sejarah kehidupan sehari-hari orang kebanyakan di kota Jakarta. Dimana saat itu kehidupan sosial masyarakat kota Jakarta menggambarkan transportasi yang digunakan seperti sepeda, becak, anak-anak, perumahan, sekolahan, kegiatan olahraga, dunia mahasiswa, rumah sakit, tempat wisata, hotel, sampai dengan masalah keragaman etnis dengan tradisi budayanya. Kemudian tidak kalah menariknya ditambah cerita kehidupan orang gedongan, orang kampung, perabotan rumah tangga, tempat jajan makanan, kriminalitas, kemacetan, pelacuran, kaum intelektual, kesenian, tempat hiburan, gaya berpakaian, gaya berpacaran, dan masih berderet lagi kisah bagaimana masyarakat kota Jakarta menghadapi modernitas sepanjang 1950 sampai 1970.\r\n', 25, '638dd39263909.jpg', 1),
(10, 'Memahami Sejarah Konflik Aceh', 7, 'Mr. S. M. Amin', 14, '2014', 186, 'Buku “Memahami Sejarah konflik Aceh” (dulunya terbitnya dengan jadul “Atjeh Sepintas Lalu”) berbicara tentang sebuah penggalan sejarah Aceh. Kalau kita melihat dengan kacamata sekarang, buku ini pun sebenarnya sudah menjadi bagian dari penggalan sejarah Aceh. Karenanya, nilainya sungguh tak terpermanai. Lebih tak terpermanai lagi ialah penerbitannya kembali. Dengan membacanya sekarang, kita akan lebih dapat memahami dan memaknai peristiwa-peristiwa yang terjadi di Aceh pada masa itu. Sehingga kita dapat mengerti perkembangan Aceh sekarang.', 28, '638dd40fa855a.jpg', 1),
(11, 'Sarwo Edhie dan Tragedi 1965', 7, 'Peter Kasenda', 15, '2015', 218, 'Rangkaian peristiwa sepanjang 1965-1966, pembubaran Partai Komunis Indonesia, (PKI) dan pergantian presiden, melambungkan nama Sarwo Edhie Wibowo, sekaligus menjadi titik-balik perjalanan hidupnya. Sebagai Komandan Resimen Para Komando Angkatan Darat (RPKAD), Sarwo Edhie sangat berperan dalam penumpasan Partai Komunis Indonesia pasca tragedi 30 September 1965. Ia juga yang menggerakkan pasukan khusus Angkatan Darat berkeliling Jawa dan Bali, berbulan-bulan menangkapi tokoh merah di daerah, dan melatih pemuda-pemuda Nahdlatul Ulama menjadi ujung tombak operasi besar melumpuhkan basis-basis PKI. Karena dinilai terlalu keras menyudutkan para pendukung Sukarno, ia dipindah tugaskan ke Medan, Sumatera Utara, kemudian Papua, bahkan terakhir hanya Gubernur Akademi Militer di Magelang.', 29, '638dd4a0a2c83.jpg', 1),
(12, 'Hitam Putih Kekuasaan Raja-Raja Jawa', 7, 'Sri Wintala Achmad', 16, '2019', 296, 'Menelisik raja-raja Jawa yang dimulai sejak Kerajaan KAlingga hingga Mataram Baru (Kasunanan Kartasura, Kasunanan Surakarta, Kasultanan Yogyakarta Hadiningrat, Praja Mangkunagara, dan Kadipaten PakuAlaman) tidak dapat dilepaskan dengan sejarah kedatangan Sayid Anwar (Sang Hyang Nurasa) dan Syekh Subakir, serta kemunculan Sang Hyang di Tanah Jawa.', 17, '638dd512a96a8.jpg', 1),
(13, 'Sejarah Arab Sebelum Islam', 7, 'Dr. Jawwad Ali', 17, '2018', 808, 'Dalam buku yang terbagi sembilan jilid ini, Jawwad Ali, seorang sejarawan masyhur, mengisahkan secara gamblang riwayat (bangsa) Arab kuno dari berbagai aspek antara lain geografi, iklim, karakteristik, silsilah, politik, hukum, dan pemerintahan, sosial-budaya, agama dan kepercayaan, sumber daya alam dan perekonomian, bahkan bahasa, literasi dan kesusastraan.', 25, '638dd5c66023a.jpg', 1),
(14, 'Mengenal Seni Keramik Modern', 6, 'Nurdian Ichsan', 18, '2016', 128, 'Buku ini membahas perkembangan seni keramik modern dalam konteks umum, yaitu memaparkan bagaimana bidang keahlian dan keprofesian terbangun dalam konteks masyarakat modern. Meski seni modern menyebar dan dipraktikkan di seluruh dunia, namun dalam kenyataan tetaplah tampak fenomena yang menunjukkan perbedaan-perbedaan di setiap wilayahnya. Karena itu buku ini menjabarkan pola perkembangan seni keramik di Eropa, Amerika, dan Jepang, sebagai wilayah-wilayah yang berperan penting dalam pemikiran dan perkembangan seni keramik modern.\r\n', 20, '638dd693e1267.jpg', 2),
(15, 'Metodologi Penelitian Bahasa Rupa', 6, 'Riza Istanto', 19, '2022', 244, 'Banyak dari para peneliti bahasa rupa berpegang pada satu buku yang ditulis oleh Tabrani. Buku berjudul &quot;Bahasa Rupa&quot; merupakan kumpulan tulisan Tabrani dari sejumlah makalah ilmiah, oleh karena itu cukup sulit untuk diikuti sebagai satu acuan penelitian.\r\n', 29, '638dd723e7795.jpg', 2),
(16, 'Amazing DSLR &amp; Mirrorless', 6, 'Erik Permana', 20, '2017', 200, 'Buku ini ingin memberikan pemahaman kepada fotografer-fotografer pemula yang ingin menggeluti dunia fotografi. Bagaimana mekanisme kerja kamera, komposisi yang baik, teknik-teknik fotografi serta aliran-aliran fotografi yang sedang menjadi tren saat ini, hingga teknik editing foto untuk memanipulasi hasil jepretan Anda agar menjadi jauh lebih &quot;WAH\'\r\n', 20, '638dd7d65f4fa.jpg', 2),
(17, 'Prinsip-Prinsip Akustik dalam Arsitektur', 6, 'Handoko Susanto', 21, '2016', 464, 'Prinsip-prinsip Akustik dalam Arsitektur adalah buku yang membahas mengenai akustik dan arsitektural akustik. Akustik merupakan ilmu tata suara dan keseluruhan efek-efek yang ditimbulkan oleh suara tersebut terhadap para penikmatnya. Sementara itu, Arsitektural Akustik adalah teknologi untuk mendesain ruangan, struktur dan konstruksi dari sebuah ruangan yang tertutup, serta sistem-sistem mekanikal pendukungnya bagi tujuan peningkatan kualitas akustik (pidato dan juga musik, atau gabungan di antara keduanya), di dalam suatu ruang. Dengan desain arsitektural yang baik, suara-suara yang diinginkan dapat dinikmati dengan sempurna dan suara-suara yang tidak dikehendaki/ yang mengganggu pendengaran dapat dihindarkan.', 35, '638dd8418ce6e.jpg', 2),
(18, 'Dasar Fotografi', 6, 'Teguh Setiadi', 22, '2017', 112, 'Buku Dasar Fotografi ini merupakan pedoman dalam melakukan kegiatan praktik memotret langsung. Buku ini dapat membantu kalangan umum sampai mahasiswa dalam mempersiapkan dan melaksanakan pengenalan teknik-teknik dasar kamera untuk pemotretan dengan lebih baik, terarah, dan terencana. Pada setiap topik telah ditetapkan tujuan paling mendalam mengenai penguasaan teknik pemotretan. Buku ini juga membahas semua kegiatan yang harus dilakukan dengan teknik kamera serta teori untuk memperdalam pemahaman mengenai materi yang dibahas. Buku ini lebih ditujukan untuk para pemula yang memiliki keinginan mendalami fotografi.', 19, '638dd8cb96af9.jpg', 2),
(19, 'Membuat Keramik Teknik Handbuilding', 6, 'Nurdian Ichsan', 18, '2016', 64, 'Dalam buku ini, penulisnya memperlihatkan bahwa membuat keramik tidaklah sulit—cukup dengan peralatan yang sederhana. Menggunakan salah satu teknik pembuatan keramik, yaitu teknik handbuilding, pembaca awam pun bisa membuat keramik sendiri. Ditulis sebagai panduan praktis, buku ini cocok untuk mereka yang ingin membuat keramik sebagai hobi. Dilengkapi gambar mengenai proses penyiapan dan pengolahan tanah liat, pendekorasian, dan pembakaran keramik, buku ini membuktikan bahwa pembuatan keramik cukup sederhana dan menyenangkan.', 23, '638dd94249cec.jpg', 2),
(20, 'Metode Penelitian Sosial Kualitatif', 4, 'Yanuar Ikbar', 23, '2015', 252, 'Buku Metodologi Penelitian Kualitatif membahas mulai dari perencanaan penelitian hingga menyajikan hasilnya pada publik. Sebuah penelitian sejatinya adalah untuk menemukan kebenaran. Kebenaran yang bukan dibenar-benarkan, tapi kebenaran yang memang benar-benar, benar. Karena kebenaran itulah yang akan dijadikan landasan bertindak. Bukan atas dasar asumsi. Untuk mendapatkan kebenaran, mestinya suatu penelitian dilandasi kaidah-kaidah yang baik agar hasilnya dapat dipercaya.\r\n', 30, '638ddaaa5396e.jpg', 3),
(21, 'Ilmu Sosial dan Budaya Dasar', 4, 'Prof. Dr. Rusmin Tumanggor', 24, '2015', 229, 'Kalau pada edisi pertama dan kedua yang lalu ditambahkan materi aktual terkait budaya populer dan konsep etika norma serta akhlak serta diperkaya lagi dengan esensi kerusakan budaya dasar kehidupan, maka pada edisi ketiga ini diperkaya dengan materi “Akulturasi Budaya Populer” dan “Ketergerusan Budaya Pancasila”. Telaah terakhir ini dirasa urgen mengasah pemahaman, prinsip dan tindakan insani terkait akar dan wujud kesempurnaan atau kesenjangan carrying capacity alam dan signifikansinya terhadap equilibrium supply and demand kebutuhan dasar manusia dapat terangkum dalam mata kuliah kehidupan berbumi, berlangit, bermasyarakat, bernegara, dan lintas negara (internasional).', 18, '638ddb14a6e2b.jpg', 3),
(22, 'Islam dan Dinamika Sosial Politik di Indonesia', 4, 'Prof. Dr. Masykuri Abdillah', 25, '2015', 272, 'Buku ini pantas dimiliki siapa saja, baik mahasiswa, akademisi, politisi, pejabat maupun tokoh masyarakat, karena memberikan banyak informasi tentang wawasan kebangsaan dan keagamaan dalam konteks pembangunan sistem demokrasi yang beradab, yang ditandai dengan terwujudnya pemerintahan yang adil, bersih dan akuntabel, serta masyarakat yang religius, jujur, damai, toleran dan menghargai kemajemukan.\r\n', 20, '638ddb8d0efc9.jpg', 3),
(23, 'Kebijakan Perlindungan Sosial', 4, 'Dr. Abu Huraerah', 26, '2019', 272, 'Buku ini merupakan hasil penelitian tentang kebijakan perlindungan sosial bidang kesehatan bagi masyarakat miskin. Analisis perspektif teori utama yang digunakan adalah teori Dynamic Governance. Pembahasannya ada dua bagian: pertama, tinjauan konseptual-teoretik tentang kebijakan perlindungan sosial bidang kesehatan bagi masyarakat miskin; dan kedua, hasil penelitian dan pembahasan sebagai sebuah proses dialektika antara temuan penelitian dengan teori-teori yang relevan dengan permasalahan penelitian.', 25, '638ddc0b38037.jpg', 3),
(24, 'Analisis Perencanaan Kebijakan dan Pelayanan Sosial', 4, 'Ahmad Izudin', 27, '2022', 242, 'Perlindungan dan pelayanan sosial merupakan isu yang hangat diperbincangkan. Hal ini sebagai respons atas gejala sosial yang berkembang di negara dengan budaya majemuk seperti Indonesia. Buku ini hadir dengan menawarkan alternatif kebijakan untuk menyelesaikan masalah Penyandang Masalah Kesejahteraan Sosial (PMKS) di Indonesia. Saya melihat bahwa konten yang tersaji dalam buku ini cukup representatif bagi para pengkaji kebijakan sosial. Khususnya, bagi stakeholder ketika mereka akan melakukan advokasi kebijakan sosial.\r\n', 14, '638ddc9c4b5a8.jpg', 3),
(25, 'Kesejahteraan Sosial', 4, 'Isbandi Rukminto', 28, '2013', 306, 'Ilmu Kesejahteraan Sosial di Indonesia merupakan salah satu Ilmu yang masih sangat muda. Meskipun cikal-bakal dari Ilmu ini sudah dikembangkan pada tahun 1960-an, akan tetapi pada masa itu Ilmu Kesejahteraan Sosial masih sering diidentikkan dengan disiplin Pekerjaan Sosial. Perubahan terhadap Ilmu Kesejahteraan Sosial mulai terasa pada akhir 1990-an. Ilmu Kesejahteraan Sosial semakin meluas sejalan dengan berkembangnya tantangan dalam upaya untuk meningkatkan kesejahteraan masyarakat. Buku ini membahas perkembangan Ilmu Kesejahteraan Sosial dari awal perkembangannya hingga ke isu-isu terakhir dewasa ini.', 25, '638ddd03f0319.jpg', 3),
(26, 'Pengantar Akuntansi Konsep Dasar Akuntansi', 3, 'Wati Aris Astuti, S.E, M.SI., A.K., CA. Endro Andayani, S.E, M.Ak.', 29, '2022', 246, 'Buku Pengantar Akuntansi dengan Konsep Dasar Akuntansi dikhususkan untuk para mahasiswa/l baik program diploma atau sarjana, teknisi akuntansi maupun non akuntansi, masyarakat umum dan semua pihak yang ingin belajar Akuntansi. Pengantar Akuntansi merupakan salah satu mata kuliah yang ada di fakultas ekonomi dan bisnis di program studi akuntansi. Buku ini membahas tentang konsep dasar akuntansi, dimana akuntansi merupakan bahasa bisnis dan merupakan sistem informasi yang memberikan informasi penting mengenai kegiatan atau operasional keuangan suatu organisasi. Akuntansi ada dalam kehidupan sehari-hari baik bagi individu maupun suatu organisasi.', 30, '638ddd766dd1f.jpg', 3),
(27, 'Adsorpsi Dalam Teknologi Pengelolaan Lingkungan', 3, 'Prof. Dr. Is Fatimah, Dkk', 30, '2022', 320, 'Adsorpsi adalah suatu fenomena permukaan yang dicirikan oleh penambatan atau penyerapan suatu spesies kimia (disebut absorbat) dari fase uapnya atau dari larutan atau pada permukaan suatu pori-pori padat (disebut adsorben). Material Adsorben dicirikan memiliki luas permukaan yang tinggi yang memungkinkan adanya interaksi yang efektif dengan molekul absorbat atau molekul target. Interaksi permukaan ini terjadi umum ketika energi yang ,menarik dari suatu zat dengan permukaan padat lebih besar dari pada energi kohesif dari zat itu sendiri. Besarnya energi inilah yang akan menentukan apakah interaksi di dalam Adsorpsi termasuk ke dalam adsorpsi kimiawi (Chemisoption) atau adsorpsi fisika (Physisorption).', 28, '638dde350e392.jpg', 3),
(28, 'Manajemen Audit Teknologi', 3, 'Yanto Sugiharto dan Susalit Setya Wibowo', 21, '2020', 98, 'Perkembangan teknologi saat ini tumbuh dengan cepat, terutama pada teknologi informasi dan teknologi energi, implementasi industri 4.0 menjadi keharusan yang didukung dengan teknologi 5G. Kegiatan audit teknologi atau review teknologi atau kajian teknologi menjadi keharusan agar industri atau perusahaan tidak tertinggal terhadap perubahan iklim bisnis yang ada dan dalam mengikuti perkembangan teknologi yang ada demi kepuasaan konsumen. Manajemen Audit teknologi merupakan buku pengantar bagi para calon auditor teknologi sebelum mengikuti pelatihan auditor teknologi dan menjadi auditor teknologi. \r\n', 15, '638ddec0ab181.jpg', 3),
(29, 'Perawatan Dan Perbaikan Mesin Industri', 3, 'Ir. Syamsul Hadi , M. T., Ph.D.', 22, '2019', 432, 'Buku Perawatan dan Perbaikan Mesin Industri dibuat karena masih langkanya buku teks dan buku ajar di bidang tersebut, terutama bagi mahasiswa Politeknik/lainnya, yang waktu studinya cukup padat untuk kegiatan kuliah, praktek, praktikum dan menyelesaikan tugas-tugas/pekerjaan rumah, sehingga menghimpun, mengartikan, dan menyimpulkan dari berbagai textbook, handbook, artikel, jurnal, dan website terkendala waktu.', 44, '638ddf270b501.jpg', 3),
(30, 'Teknik Fabrikasi Pengerjaan Logam', 3, 'Daryanto, Suwardi, M.Pd.', 31, '2018', 362, 'Besi dan baja merupakan logam yang banyak digunakan dalam teknik dan meliputi 95% dari seluruh produksi logam dunia. Untuk penggunaan tertentu, besi dan baja merupakan satu-satunya logam yang memenuhi persyaratan teknis maupun ekonomis, namun di beberapa bidang lainnya logam ini mulai mendapat persaingan dari logam bukan besi dan bahan bukan logam. Bijih besi diolah dalam tanur atau dapur tinggi untuk menghasilkan besi kasar. Besi kasar adalah bahan baku untuk pembuatan besi cor (cost iron), besi tempa (wrought iron), dan baja (steel). Ketiga macam bahan itu banyak dipakai dalam bidang industri teknik.', 25, '638ddf94e1050.jpg', 3),
(31, 'Buku Sakti Pemrograman Web: HTML, CSS, PHP, MYSQL &amp; Javascript', 3, 'Didik Setiawan', 32, '2018', 216, ' Buku ini mengenalkan bagian dari sebuah pembentukan, pemrograman web dan menyajikan langkah-langkah program yang disusun secara terstruktur. Dengan adanya langkah-langkah program tersebut, diharapkan pembaca dapat mempraktikkan secara langsung dan dapat menyimpulkan sendiri maksud dari setiap perintah dalam program dengan cara melihat hasil yang ditampilkan di web browser.\r\n', 20, '638de00a7f847.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int(11) NOT NULL,
  `denda` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `denda`, `harga`) VALUES
(2, 'Buku Rusak', 30000),
(5, 'buku hilang', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` varchar(30) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` enum('Pinjam','Kembali','Booking') NOT NULL,
  `keterangan_denda` varchar(100) DEFAULT NULL,
  `denda_telat` int(11) NOT NULL,
  `denda_buku` int(11) NOT NULL,
  `total_denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `kode_peminjaman`, `id_buku`, `jumlah_buku`, `tgl_kembali`, `status`, `keterangan_denda`, `denda_telat`, `denda_buku`, `total_denda`) VALUES
(5, 'PJBK202212070005', 29, 3, '2022-12-24', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(6, 'PJBK202212070005', 31, 2, '2022-12-25', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(7, 'PJBK202212070006', 11, 4, '2022-12-24', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(9, 'BKPJ202212120001', 6, 3, '2022-12-20', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(10, 'BKPJ202212120002', 27, 2, '2022-12-16', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(12, 'BKPJ202212120003', 19, 3, '2022-12-16', 'Kembali', 'Terlambat', 10000, 0, 10000),
(15, 'BKPJ202212130001', 15, 1, NULL, 'Pinjam', NULL, 0, 0, 0),
(16, 'PJBK202212140001', 1, 4, '2022-12-16', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(17, 'PJBK202212140001', 2, 2, '2022-12-16', 'Kembali', 'Buku Rusak', 0, 60000, 60000),
(19, 'PJBK202212160001', 18, 1, '2022-12-16', 'Kembali', 'Buku Hilang', 0, 50000, 50000),
(20, 'BKPJ202212160001', 27, 1, NULL, 'Booking', NULL, 0, 0, 0),
(21, 'BKPJ202212170001', 8, 1, NULL, 'Pinjam', NULL, 0, 0, 0),
(22, 'BKPJ202212190001', 6, 1, NULL, 'Booking', NULL, 0, 0, 0),
(23, 'PJBK202212190001', 10, 2, NULL, 'Pinjam', NULL, 0, 0, 0),
(24, 'PJBK202212190002', 9, 1, '2022-12-19', 'Kembali', 'Tidak Ada Denda', 0, 0, 0),
(25, 'PJBK202212190002', 29, 2, '2022-12-19', 'Kembali', 'Buku Rusak', 0, 60000, 60000),
(26, 'PJBK202212190003', 21, 2, NULL, 'Pinjam', NULL, 0, 0, 0),
(27, 'PJBK202212190003', 24, 1, NULL, 'Pinjam', NULL, 0, 0, 0),
(28, 'BKPJ202212190002', 9, 2, NULL, 'Booking', NULL, 0, 0, 0),
(29, 'PJBK202212200001', 12, 3, NULL, 'Pinjam', NULL, 0, 0, 0);

--
-- Triggers `detail_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `after_insert_detail_peminjaman` AFTER INSERT ON `detail_peminjaman` FOR EACH ROW BEGIN 
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku - new.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND new.status = 'Pinjam';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku + old.jumlah_buku - new.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND old.status = 'Pinjam';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman2` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE peminjaman SET peminjaman.jumlah_buku = peminjaman.jumlah_buku - old.jumlah_buku + new.jumlah_buku
    WHERE peminjaman.kode_peminjaman = new.kode_peminjaman AND old.status = 'Pinjam';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman3` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku - old.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND new.status = 'Pinjam';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman_pengembalian_buku` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku + new.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND new.status = 'Kembali' AND new.keterangan_denda = 'Tidak Ada Denda';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman_pengembalian_buku2` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku + new.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND new.status = 'Kembali' AND new.keterangan_denda = 'Terlambat';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman_pengembalian_buku3` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku + new.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND new.status = 'Kembali' AND new.keterangan_denda = 'Buku Rusak';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_detail_peminjaman_pengembalian_buku4` AFTER UPDATE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku + new.jumlah_buku
    WHERE buku.id_buku = new.id_buku AND new.status = 'Kembali' AND new.keterangan_denda = 'Terlambat dan Rusak';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_detail_peminjaman` BEFORE DELETE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE buku SET buku.jumlah_buku = buku.jumlah_buku + old.jumlah_buku
  	WHERE buku.id_buku = old.id_buku AND old.status = 'Pinjam';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_detail_peminjaman2` BEFORE DELETE ON `detail_peminjaman` FOR EACH ROW BEGIN
	UPDATE peminjaman SET peminjaman.jumlah_buku = peminjaman.jumlah_buku - old.jumlah_buku
    WHERE peminjaman.kode_peminjaman = old.kode_peminjaman AND old.status = 'Pinjam';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL,
  `kategori_buku` varchar(200) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `kategori_buku`, `gambar`) VALUES
(2, 'Sains', '6383594f7b5b9.png'),
(3, 'Teknologi', '6383599531faf.png'),
(4, 'Sosial', '638359aa7c67a.png'),
(6, 'Seni', '638359be432f6.png'),
(7, 'Sejarah', '638359d2838ac.png');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` varchar(30) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `id_user_peminjam` int(11) NOT NULL,
  `id_user_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `jumlah_buku`, `id_user_peminjam`, `id_user_petugas`) VALUES
(5, 'PJBK202212070005', '2022-12-07', '2022-12-20', 5, 2, 1),
(6, 'PJBK202212070006', '2022-12-07', '2022-12-22', 4, 2, 1),
(7, 'BKPJ202212120001', '2022-12-12', '2022-12-22', 3, 2, 1),
(8, 'BKPJ202212120002', '2022-12-12', '2022-12-22', 2, 2, 1),
(10, 'BKPJ202212120003', '2022-12-12', '2022-12-15', 3, 5, 1),
(12, 'BKPJ202212130001', '2022-12-13', '2022-12-29', 1, 5, 1),
(13, 'PJBK202212140001', '2022-12-14', '2022-12-31', 6, 5, 1),
(15, 'PJBK202212160001', '2022-12-16', '2022-12-17', 1, 2, 1),
(16, 'BKPJ202212160001', '2022-12-16', '2022-12-23', 1, 2, NULL),
(17, 'BKPJ202212170001', '2022-12-17', '2022-12-24', 1, 8, 1),
(18, 'BKPJ202212190001', '2022-12-19', '2022-12-28', 1, 2, NULL),
(19, 'PJBK202212190001', '2022-12-19', '2022-12-22', 2, 6, 1),
(20, 'PJBK202212190002', '2022-12-19', '2022-12-27', 3, 8, 1),
(21, 'PJBK202212190003', '2022-12-19', '2022-12-24', 3, 8, 1),
(22, 'BKPJ202212190002', '2022-12-19', '2022-12-27', 2, 2, NULL),
(23, 'PJBK202212200001', '2022-12-20', '2022-12-15', 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `penerbit`, `alamat`) VALUES
(1, 'Bukunesia', 'Jakarta'),
(3, 'Grasindo', 'Malang'),
(4, 'Deepublish', 'Jakarta Selatan'),
(5, 'Inari', 'Surabaya'),
(8, 'Bumi Aksara', 'Jakarta'),
(9, 'Grita Kreasi', 'Malang'),
(10, 'Harper Collins', 'Jakarta Selatan'),
(11, 'Kepustakaan Populer Gramedia', 'Yogyakarta'),
(12, 'Komunitas Bambu', 'Surabaya'),
(13, 'Masup Jakarta', 'Jakarta'),
(14, 'Yayasan Pustaka Obor Indonesia', 'Bandung'),
(15, 'Penerbit Buku Kompas', 'Bandung'),
(16, 'Araska Publisher', 'Malang'),
(17, 'Alvabet', 'Jakarta Selatan'),
(18, 'Bejana', 'Yogyakarta'),
(19, 'Thafa Media', 'Bandung'),
(20, 'Cemerlang Publishing', 'Yogyakarta'),
(21, 'Kanisius', 'Bandung'),
(22, 'Andi Offset', 'Malang'),
(23, 'Refika Aditama', 'Jakarta'),
(24, 'Prenada Media', 'Bandung'),
(25, 'Gramedia Pustaka Utama', 'Yogyakarta'),
(26, 'Nuansa Cendekia', 'Jakarta Selatan'),
(27, 'Kencana Media', 'Surabaya'),
(28, 'Rajagrafindo', 'Malang'),
(29, 'Informatika', 'Yogyakarta'),
(30, 'Uii Press', 'Bandung'),
(31, 'Gava Media', 'Surabaya'),
(32, 'Start Up', 'Jakarta Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `rak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `rak`) VALUES
(1, 'RAK-001'),
(2, 'RAK-002'),
(3, 'RAK-003'),
(5, 'RAK-004');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `tgl_testimoni` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `tgl_testimoni`, `id_user`, `id_buku`, `isi`) VALUES
(1, '2022-12-16', 2, 27, 'Sangat mengedukasi'),
(2, '2022-12-16', 2, 27, 'Terimakasih'),
(3, '2022-12-19', 2, 29, 'Termikasih, sangat mengedukasi.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `jenis_kelamin`, `alamat`, `no_telp`, `username`, `password`, `foto`, `id_role`) VALUES
(1, 'Administrator', 'L', 'Ponorogo', '085235645765', 'admin', '0192023a7bbd73250516f069df18b500', '63a2a1ea95dba.jpg', 1),
(2, 'User', 'L', 'Madiun', '087756774577', 'user', '6ad14ba9986e3615423dfca256d04e3f', 'default.jpg', 2),
(5, 'Rafio Sadani', 'L', 'Ponorogo', '088235944268', 'rafio', '59eaa000aea87a497103a15925f7ac43', '63a2a21e3b3ef.png', 2),
(6, 'Odilia Helene', 'P', 'Malang', '085235645766', 'odilia', '071ac274e29565b8da0fa4fb394a10f4', '63a2a244e54e9.png', 2),
(8, 'Sofiyatus Saadah', 'P', 'Lamongan', '081235434657', 'sofiya', '904b91466e6fe121bdf6542dca061a1a', '63a2a3718f0d5.png', 2),
(12, 'Hafizha Daffa', 'P', 'Bekasi', '087756776577', 'hafizha', '9714df6aba72e60bb3429fbc0beffa70', '63a2a3a9c3ef8.png', 2),
(16, 'Syafiq Noventa S.P', 'L', 'Kediri', '085235645766', 'syafiq', 'e548904344bec0e8d2c3cb31641593ca', '63a2a3df165dd.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori_buku` (`id_kategori_buku`) USING BTREE,
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD KEY `id_user_peminjam` (`id_user_peminjam`),
  ADD KEY `id_user_petugas` (`id_user_petugas`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori_buku`) REFERENCES `kategori_buku` (`id_kategori_buku`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`);

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_ibfk_1` FOREIGN KEY (`kode_peminjaman`) REFERENCES `peminjaman` (`kode_peminjaman`),
  ADD CONSTRAINT `detail_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_user_peminjam`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user_petugas`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `testimoni_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
