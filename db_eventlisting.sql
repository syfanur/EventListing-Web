-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 02:42 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eventlisting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(225) NOT NULL,
  `admin_email` varchar(225) NOT NULL,
  `admin_pass` varchar(225) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(225) NOT NULL,
  `admin_job` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(3, 'admin', 'admin@gmail.com', 'admin', 'IMG_8571.JPG', 'Indonesia', 'Telkom University', '08123456789', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` text NOT NULL,
  `category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`) VALUES
(3, 'Art ', 'Kesenian'),
(4, 'Humor ', 'Hiburan'),
(5, 'Music Concert ', 'turn off smartphone and go moshpit!');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` text NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_pos` text NOT NULL,
  `customer_img` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_city`, `customer_address`, `customer_pos`, `customer_img`, `customer_ip`) VALUES
(7, 'Diva Jihan S', 'diva@gmail.com', 'divajihan6', '081312341234', 'Bandung', 'Sukabirus', '20867', '1 (3).PNG', '::1'),
(9, 'Dummy', 'dummy@gmail.com', '123456', '08123456789', 'Bandung', 'Sukabirus', '13210', 'profil_cust.png', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(45, 7, 400000, 1771612345, 2, '2019-12-04', 'Complete'),
(46, 7, 100000, 1995345211, 1, '2019-12-04', 'Complete'),
(47, 7, 200000, 1377122506, 1, '2020-04-08', 'Pending'),
(48, 7, 125000, 873245102, 1, '2020-04-08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `desc_id` int(10) NOT NULL,
  `desciption_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`desc_id`, `desciption_about`) VALUES
(1, '<p>Event Listing adalah sebuah website untuk melakukan pemesanan tiket. Kami membantu adanya kegiatan atau acara yang diselenggarakan oleh himpunan, komunitas, kepanitian, maupun UKM dengan ikut memasarkan tiket acara yang akan diadakan.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `payment_img` text NOT NULL,
  `payment_process` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  `bank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`, `bank`) VALUES
(47, 7, 1377122506, 23, 1, 'Pending', ''),
(48, 7, 873245102, 21, 1, 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_name` varchar(42) NOT NULL,
  `product_loc` varchar(50) NOT NULL,
  `product_date` date NOT NULL,
  `product_img_1` text NOT NULL,
  `product_img_2` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_persen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_loc`, `product_date`, `product_img_1`, `product_img_2`, `product_price`, `product_desc`, `product_persen`) VALUES
(18, 5, 'KiosMusic x Mocca 20th Anniversary', 'Studio Palem Kemang, Jakarta Selatan', '2019-12-20', '1.jpg', '', 100000, '<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">KiosMusic x Mocca 20th Anniversary Concert Present:</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">&ldquo;You and Me Against the World&rdquo;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Mocca merupakan grup band indie asal Bandung yang populer di belantika musik Indonesia era 2000an. Band dengan formasi lengkap Riko Prayitno (gitar), Arina Ephipania (vokal dan flute), Achmad Pratama (bass), dan Indra Massad (drum) telah meluncurkan album tribut bertajuk &ldquo;You and Me Against the World: A Tribute To Mocca&rdquo; di Tahun 2019.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Loyalitas Mocca dalam berkarya di panggung musik tahun ini sekaligus untuk merayakan 20th Anniversary Concert di Now Playing.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Sebagai bagian dari kampanye peluncuran, KiosMusic Now Playing ingin memberi ruang lebih bagi para &lsquo;swinging friends&rsquo; yang merindukan panggung konser intimate bersama Mocca.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Saksikan Now Playing &ldquo; You and Me Against the World&rdquo; Mocca 20th Anniversary Concert pada 22 Desember di Studio Palem, Kemang.</span></p>', 55),
(19, 3, 'Pagelaran Musik Artemardika 2019', 'Goethe Insitute, Jakarta Pusat', '2019-12-07', '2.jpg', '', 120000, '<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Salam budaya!</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">UKM Universitas Negeri Jakarta dengan bangga mempersembahkan Pagelaran Musik Artemardika 2019. Sejak 2016, UKM UNJ telah sukses menyuguhkan pameran seni, pagelaran musik dan pagelaran seni dari tahun ke tahun. Khusus untuk pagelaran musik, Artemardika mengundang beberapa komunitas seni musik dan musisi ternama lokal.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Datang dan saksikanlah Pagelaran Musik Artemardika yang tersaji pada 7 Desember di Gedung Goethe Institute.</span></p>', 55),
(21, 3, 'Pon Your tone X KiosMusic: Bruk it Dung', 'Parc 19, Jakarta Selatan', '2019-12-08', '4.jpg', '', 125000, '<div class=\"event-description\">\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Pon Your Tone x KiosMusic Present</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Bruk It Dung \" Partyjie\"</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">PON YOUR TONE bergerak dari sebuah kolektif seni dan musik dansa elektronik yang&nbsp; berdiri sejak 2014. Dimulai dengan playlist kolektif yang berkembang menjadi sebuah acara dengan \"pesan halus\" dan diterapkan dalam setiap tema juga dekorasi.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Pon Your Tone selalu membawa konsep berbeda untuk setiap perayaan bermusiknya. Konsep yang pernah dibawa PON YOUR TONE sebelumnya mengangkat konsep Revolusi, budaya musik elektronik khas Indonesia, yang dikenal sebagai musik Pantura, dan yang terakhir adalah mengangkat konsep teror teknologi yang dekat dengan kehidupan masyarakat.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Sebagai bagian dari kampanye peluncuran, kiosMusic Now Playing mempersembahkan &ldquo;Bruk It Dung \"Partyjie\", sebuah gelaran musik tradisional yang menghadirkan beragam lineup dari talenta muda berbakat rumah musik Pon Your Tone, Pesona Experience dan Studiorama.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Di KiosMusic Now Playing, mereka ingin meningkatkan budaya Jamaika yang mendiskusikan agama, kehidupan, dan politik yang memadai dengan kondisi sosial di Indonesia saat ini. Dengan konsep Bruk it Dung \"Partyjie\", mari merayakan dinamika kehidupan orang melalui musik yang kental dengan pesan revolusi dan santai menyebarkan perdamaian melaui penampilan DJ yang mudah diterima oleh penonton.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Acara ini dipersembahkan oleh brand minuman energi, Red Bull dan disponsori oleh Lambretta yang mewujudkan perayaan musik EDM bertajuk Bruk It Dunk: \"Partyjie\".</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Saksikan Pon Your Tone X KiosMusic Now Playing menampilkan musik afro beast, dancehall, RnB, dan Soul pada 17 November di Parc 19, Kemang.</span></p>\r\n</div>', 55),
(23, 3, 'DQLAB ONLINE LEARNING DATA SCIENCE', 'DQLab.id, Tangerang', '2019-12-20', '3.jpg', '', 200000, '<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Dapatkan ilmu data science 4 tahun dengan belajar di DQLab selama 6 bulan!</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">DQLab adalah portal kursus data science online yang dikembangkan oleh Universitas Multimedia Nusantara dan PHI-Integration. Kursus ini direkomendasikan bagi Anda yang ingin berkarir di bidang data science, online learning ini sangat cocok untuk professional, mahasiswa tingkat akhir, dan Fresh Graduate yang memiliki background STEM (Science, Technology, Engineering, dan Mathematics).</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"font-weight: 400;\">Bersama DQLab, Anda akan memulai perjalanan menjadi seorang Data Scientist dengan akses ke materi belajar berbasis real project dari industri, portal belajar dengan teknologi </span><em><span style=\"font-weight: 400;\">live coding</span></em><span style=\"font-weight: 400;\">, dan kesempatan mengerjakan project data science!</span></p>', 55);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slide_id`, `slide_name`, `slide_img`) VALUES
(10, 'Slide 10', 'slide-10.jpg'),
(11, 'Slide 12', 'slide-12.jpg'),
(12, 'Slide 11', 'slide-11.jpg'),
(13, 'Slide 13', 'slide-13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `desc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD CONSTRAINT `pending_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `pending_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
