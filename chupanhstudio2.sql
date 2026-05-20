-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2025 at 10:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chupanhstudio2`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `id_barber` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `day` date NOT NULL,
  `id_time` int(11) NOT NULL,
  `payment_method` int(255) DEFAULT NULL,
  `cancel` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `id_barber`, `id_user`, `day`, `id_time`, `payment_method`, `cancel`, `created_at`) VALUES
(27, 34, 25, '2025-09-30', 15, 30, 0, '2025-09-30 07:02:16'),
(28, 33, 2, '2025-09-30', 19, 100, 0, '2025-09-30 09:11:52'),
(29, 33, 29, '2025-10-02', 5, 50, 0, '2025-09-30 09:17:17'),
(30, 33, 25, '2025-10-01', 6, 30, 0, '2025-09-30 09:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `app_detail`
--

CREATE TABLE `app_detail` (
  `id` int(11) NOT NULL,
  `id_appointment` int(11) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_detail`
--

INSERT INTO `app_detail` (`id`, `id_appointment`, `id_service`) VALUES
(87, 27, 21),
(88, 28, 13),
(89, 29, 6),
(90, 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `images` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `images`) VALUES
(1, 'Gôm xịt tóc', '5f2a950f29382sprite.png'),
(4, 'Sáp vuốt tóc', '5f2a94db299d2sprite.png'),
(5, 'Xịt tạo phồng', '5f2a94b98c22dsprite.png'),
(6, 'Chăm sóc tóc', '5f2a948b5b83csprite.png'),
(7, 'Kem cạo râu', '5f2a93c666525sprite.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `approve` bit(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_product`, `id_user`, `approve`, `parent_id`, `rating`, `created_at`) VALUES
(26, 'Sản phẩm tốt', 19, 3, b'1', 0, 3, '2020-08-16 11:18:49'),
(27, '<p>thank ban</p>', 19, 2, b'1', 26, 0, '2023-08-22 04:43:08'),
(28, 'hihihhhhh', 14, 2, b'1', 0, 5, '2023-08-22 05:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `content`, `created_at`) VALUES
(4, 'dddddddd', '08899877755', 'chuthihoa98bgg@gmail.com', 'tedddddddddd', '2020-08-16 09:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `evaluates`
--

CREATE TABLE `evaluates` (
  `id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `id_appointment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `content` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluates`
--

INSERT INTO `evaluates` (`id`, `rating`, `id_appointment`, `id_user`, `id_service`, `content`, `parent_id`, `created_at`) VALUES
(3, 3, 3, 3, 13, 'Dịch vụ tốt', 0, '2020-08-16 09:25:06'),
(6, 0, 3, 2, 13, '<p>Cảm ơn bạn đ&atilde; đ&aacute;nh gi&aacute;</p>', 3, '2020-08-16 09:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `images` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `role` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `name`, `images`, `link`, `role`) VALUES
(1, 'Studio', 'mot,jpg', '1', b'1'),
(3, 'Studio', 'hai.jpg', '1', b'1'),
(4, 'Studio', 'ba.jpg', '1', b'1'),
(5, 'Studio', 'mot.jpg', '3', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(191) NOT NULL,
  `id_user` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `images`, `id_user`, `views`, `created_at`) VALUES
(3, 'Bí quyết chchọn ảnh cưới', '<h2 data-start=\"270\" data-end=\"338\">C&aacute;c lưu &yacute; khi đặt lịch v&agrave; chuẩn bị chụp ảnh studio cho nam giới</h2>\r\n<h3 data-start=\"340\" data-end=\"373\">Chọn thời gian chụp ph&ugrave; hợp</h3>\r\n<p data-start=\"374\" data-end=\"692\">Việc chọn sai thời điểm c&oacute; thể ảnh hưởng lớn đến chất lượng ảnh. Nếu đặt lịch v&agrave;o l&uacute;c qu&aacute; gấp, bạn sẽ dễ thiếu chuẩn bị về trang phục, tinh thần v&agrave; &yacute; tưởng tạo d&aacute;ng. Tốt nhất, h&atilde;y đặt lịch chụp trước <strong data-start=\"574\" data-end=\"588\">3 &ndash; 7 ng&agrave;y</strong>, để c&oacute; thời gian chuẩn bị trang phục, chỉnh sửa t&oacute;c tai, cũng như trao đổi concept với nhiếp ảnh gia.</p>\r\n<h3 data-start=\"694\" data-end=\"735\">Lựa chọn trang phục đ&uacute;ng phong c&aacute;ch</h3>\r\n<p data-start=\"736\" data-end=\"855\">Một bộ đồ kh&ocirc;ng ph&ugrave; hợp c&oacute; thể ph&aacute; vỡ tổng thể bức ảnh. Thay v&igrave; chọn bừa, h&atilde;y chọn trang phục theo concept buổi chụp:</p>\r\n<ul data-start=\"856\" data-end=\"1013\">\r\n<li data-start=\"856\" data-end=\"895\">\r\n<p data-start=\"858\" data-end=\"895\">Chụp c&aacute; nh&acirc;n lịch l&atilde;m: vest, sơ mi.</p>\r\n</li>\r\n<li data-start=\"896\" data-end=\"952\">\r\n<p data-start=\"898\" data-end=\"952\">Chụp thời trang: quần &aacute;o theo xu hướng, m&agrave;u nổi bật.</p>\r\n</li>\r\n<li data-start=\"953\" data-end=\"1013\">\r\n<p data-start=\"955\" data-end=\"1013\">Chụp nghệ thuật: đồ tone m&agrave;u trung t&iacute;nh, form thoải m&aacute;i.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1015\" data-end=\"1089\">Trang phục c&agrave;ng ăn khớp với concept, ảnh c&agrave;ng tự nhi&ecirc;n v&agrave; chuy&ecirc;n nghiệp.</p>\r\n<h3 data-start=\"1091\" data-end=\"1128\">Chăm s&oacute;c da mặt trước buổi chụp</h3>\r\n<p data-start=\"1129\" data-end=\"1365\">Da mặt mệt mỏi, b&oacute;ng dầu hay kh&ocirc; nẻ sẽ rất dễ lộ tr&ecirc;n ảnh studio. V&igrave; vậy, trước ng&agrave;y chụp, h&atilde;y <strong data-start=\"1224\" data-end=\"1278\">ngủ đủ giấc, uống nhiều nước v&agrave; chăm s&oacute;c da cơ bản</strong> (rửa mặt sạch, thoa kem dưỡng ẩm). Điều n&agrave;y sẽ gi&uacute;p gương mặt s&aacute;ng hơn dưới &aacute;nh đ&egrave;n.</p>\r\n<h3 data-start=\"1367\" data-end=\"1404\">Kiểm so&aacute;t m&aacute;i t&oacute;c v&agrave; ngoại h&igrave;nh</h3>\r\n<p data-start=\"1405\" data-end=\"1644\">Trước buổi chụp, h&atilde;y <strong data-start=\"1426\" data-end=\"1446\">tỉa t&oacute;c gọn g&agrave;ng</strong> hoặc tạo kiểu đơn giản để khu&ocirc;n mặt s&aacute;ng sủa hơn. Kh&ocirc;ng n&ecirc;n để t&oacute;c rối hoặc d&agrave;i qu&aacute; mức, v&igrave; &aacute;nh đ&egrave;n studio sẽ l&agrave;m khuyết điểm t&oacute;c hiện r&otilde; hơn. Nếu cần, bạn c&oacute; thể d&ugrave;ng keo/s&aacute;p để cố định nếp t&oacute;c.</p>\r\n<h3 data-start=\"1646\" data-end=\"1675\">Tư thế v&agrave; c&aacute;ch tạo d&aacute;ng</h3>\r\n<p data-start=\"1676\" data-end=\"1763\">Nhiều bạn nam thường ngại tạo d&aacute;ng, dẫn đến h&igrave;nh ảnh gượng gạo. Một số tips đơn giản:</p>\r\n<ul data-start=\"1764\" data-end=\"1976\">\r\n<li data-start=\"1764\" data-end=\"1834\">\r\n<p data-start=\"1766\" data-end=\"1834\">Đứng hơi nghi&ecirc;ng &frac34; thay v&igrave; thẳng ch&iacute;nh diện, tạo cảm gi&aacute;c gọn mặt.</p>\r\n</li>\r\n<li data-start=\"1835\" data-end=\"1883\">\r\n<p data-start=\"1837\" data-end=\"1883\">Giữ lưng thẳng, vai mở để to&aacute;t ra sự tự tin.</p>\r\n</li>\r\n<li data-start=\"1884\" data-end=\"1976\">\r\n<p data-start=\"1886\" data-end=\"1976\">Nếu kh&ocirc;ng biết đặt tay thế n&agrave;o, h&atilde;y thử chống nhẹ v&agrave;o t&uacute;i quần hoặc khoanh tay tự nhi&ecirc;n.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"1978\" data-end=\"2007\">Tr&aacute;nh lạm dụng phụ kiện</h3>\r\n<p data-start=\"2008\" data-end=\"2173\">Nhiều bạn nam mang qu&aacute; nhiều phụ kiện như đồng hồ, v&ograve;ng tay, k&iacute;nh r&acirc;m, khiến bức ảnh bị rối mắt. H&atilde;y giữ phụ kiện ở mức vừa phải, chọn một m&oacute;n l&agrave;m điểm nhấn ch&iacute;nh.</p>\r\n<h3 data-start=\"2175\" data-end=\"2209\">Chuẩn bị tinh thần thoải m&aacute;i</h3>\r\n<p data-start=\"2210\" data-end=\"2404\">Điều quan trọng kh&ocirc;ng k&eacute;m l&agrave; <strong data-start=\"2239\" data-end=\"2265\">giữ tinh thần tự nhi&ecirc;n</strong>. Nếu bạn căng thẳng, biểu cảm sẽ cứng, kh&oacute; c&oacute; ảnh đẹp. H&atilde;y nghe nhạc trước buổi chụp hoặc tr&ograve; chuyện với nhiếp ảnh gia để thoải m&aacute;i hơn.</p>\r\n<h3 data-start=\"2406\" data-end=\"2445\">Đặt lịch với studio chuy&ecirc;n nghiệp</h3>\r\n<p data-start=\"2446\" data-end=\"2573\">Cuối c&ugrave;ng, h&atilde;y chọn studio uy t&iacute;n c&oacute; ekip hỗ trợ &aacute;nh s&aacute;ng, makeup v&agrave; chỉnh sửa hậu kỳ. Khi đặt lịch, nhớ trao đổi r&otilde; r&agrave;ng về:</p>\r\n<ul data-start=\"2574\" data-end=\"2649\">\r\n<li data-start=\"2574\" data-end=\"2596\">\r\n<p data-start=\"2576\" data-end=\"2596\">Concept muốn chụp.</p>\r\n</li>\r\n<li data-start=\"2597\" data-end=\"2622\">\r\n<p data-start=\"2599\" data-end=\"2622\">Thời lượng buổi chụp.</p>\r\n</li>\r\n<li data-start=\"2623\" data-end=\"2649\">\r\n<p data-start=\"2625\" data-end=\"2649\">Số ảnh được chỉnh sửa.</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p data-start=\"2651\" data-end=\"2713\">Điều n&agrave;y gi&uacute;p bạn chủ động v&agrave; kh&ocirc;ng bị bất ngờ khi nhận ảnh.</p>', '68db8b2dbd6bdko1.jpg', 2, 6, '2020-08-01 08:44:47'),
(4, 'Đặt lịch và gợi ý bối cảnh', '<h2 data-start=\"286\" data-end=\"355\">Đặt lịch chụp ảnh studio &ndash; chọn phong c&aacute;ch ph&ugrave; hợp với khu&ocirc;n mặt</h2>\r\n<p data-start=\"357\" data-end=\"820\">Giống như quần &aacute;o, kh&ocirc;ng c&oacute; một kiểu chụp ảnh n&agrave;o ph&ugrave; hợp với tất cả mọi người. Mỗi khu&ocirc;n mặt lại c&oacute; những đặc điểm ri&ecirc;ng, v&igrave; thế nếu biết lựa chọn g&oacute;c m&aacute;y v&agrave; phong c&aacute;ch ph&ugrave; hợp, bạn sẽ c&oacute; những bức ảnh studio đẹp nhất. Trước khi đặt lịch chụp, bạn n&ecirc;n hiểu r&otilde; khu&ocirc;n mặt của m&igrave;nh v&agrave; phong c&aacute;ch n&agrave;o c&oacute; thể l&agrave;m nổi bật ưu điểm ấy. Chỉ cần thay đổi &aacute;nh s&aacute;ng, g&oacute;c chụp hoặc kiểu tạo d&aacute;ng một ch&uacute;t th&ocirc;i, diện mạo của bạn trong ảnh c&oacute; thể trở n&ecirc;n ho&agrave;n to&agrave;n kh&aacute;c biệt.</p>\r\n<h3 data-start=\"822\" data-end=\"880\">C&aacute;ch x&aacute;c định h&igrave;nh dạng khu&ocirc;n mặt trước khi chụp ảnh</h3>\r\n<p data-start=\"881\" data-end=\"1024\">Để c&oacute; bức h&igrave;nh đẹp, bước đầu ti&ecirc;n l&agrave; x&aacute;c định gương mặt của bạn thuộc dạng n&agrave;o. H&atilde;y chuẩn bị một chiếc thước d&acirc;y nhỏ v&agrave; đo theo c&aacute;c bước sau:</p>\r\n<ul data-start=\"1026\" data-end=\"1294\">\r\n<li data-start=\"1026\" data-end=\"1090\">\r\n<p data-start=\"1028\" data-end=\"1090\"><strong data-start=\"1028\" data-end=\"1037\">Tr&aacute;n:</strong> đo ngang từ một b&ecirc;n v&ograve;m l&ocirc;ng m&agrave;y sang b&ecirc;n c&ograve;n lại.</p>\r\n</li>\r\n<li data-start=\"1091\" data-end=\"1162\">\r\n<p data-start=\"1093\" data-end=\"1162\"><strong data-start=\"1093\" data-end=\"1109\">Xương g&ograve; m&aacute;:</strong> đo ngang phần nh&ocirc; cao nhất dưới g&oacute;c ngo&agrave;i của mắt.</p>\r\n</li>\r\n<li data-start=\"1163\" data-end=\"1238\">\r\n<p data-start=\"1165\" data-end=\"1238\"><strong data-start=\"1165\" data-end=\"1178\">H&agrave;m dưới:</strong> đo từ cằm đến dưới tai, nh&acirc;n đ&ocirc;i để ra số đo to&agrave;n bộ h&agrave;m.</p>\r\n</li>\r\n<li data-start=\"1239\" data-end=\"1294\">\r\n<p data-start=\"1241\" data-end=\"1294\"><strong data-start=\"1241\" data-end=\"1265\">Chiều d&agrave;i khu&ocirc;n mặt:</strong> từ đường ch&acirc;n t&oacute;c tới cằm.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1296\" data-end=\"1410\">Sau khi c&oacute; số đo, h&atilde;y so s&aacute;nh với c&aacute;c dạng gương mặt phổ biến dưới đ&acirc;y để chọn được phong c&aacute;ch chụp ảnh ph&ugrave; hợp.</p>\r\n<h3 data-start=\"1412\" data-end=\"1472\">C&aacute;c kiểu gương mặt v&agrave; phong c&aacute;ch chụp ảnh studio gợi &yacute;</h3>\r\n<ul data-start=\"1474\" data-end=\"2476\">\r\n<li data-start=\"1474\" data-end=\"1654\">\r\n<p data-start=\"1476\" data-end=\"1654\"><strong data-start=\"1476\" data-end=\"1494\">Mặt tr&aacute;i xoan:</strong> c&acirc;n đối, dễ chụp. Ph&ugrave; hợp với hầu hết c&aacute;c kiểu ảnh, từ ch&acirc;n dung close-up, ảnh nghệ thuật đến ảnh thời trang. N&ecirc;n chọn g&oacute;c chụp hơi nghi&ecirc;ng để tạo chiều s&acirc;u.</p>\r\n</li>\r\n<li data-start=\"1656\" data-end=\"1809\">\r\n<p data-start=\"1658\" data-end=\"1809\"><strong data-start=\"1658\" data-end=\"1675\">Mặt chữ nhật:</strong> gương mặt d&agrave;i, cần tr&aacute;nh chụp g&oacute;c ch&iacute;nh diện k&eacute;o d&agrave;i th&ecirc;m. Thay v&agrave;o đ&oacute;, n&ecirc;n chụp ngang vai, kết hợp &aacute;nh s&aacute;ng mềm để c&acirc;n bằng tỉ lệ.</p>\r\n</li>\r\n<li data-start=\"1811\" data-end=\"1928\">\r\n<p data-start=\"1813\" data-end=\"1928\"><strong data-start=\"1813\" data-end=\"1830\">Mặt tam gi&aacute;c:</strong> h&agrave;m rộng, tr&aacute;n nhỏ. Phong c&aacute;ch chụp b&aacute;n th&acirc;n, &aacute;nh s&aacute;ng từ tr&ecirc;n xuống sẽ gi&uacute;p khu&ocirc;n mặt gọn hơn.</p>\r\n</li>\r\n<li data-start=\"1930\" data-end=\"2082\">\r\n<p data-start=\"1932\" data-end=\"2082\"><strong data-start=\"1932\" data-end=\"1945\">Mặt tr&ograve;n:</strong> n&ecirc;n chọn d&aacute;ng chụp g&oacute;c &frac34; thay v&igrave; ch&iacute;nh diện để tạo cảm gi&aacute;c g&oacute;c cạnh hơn. &Aacute;nh s&aacute;ng tối giản v&agrave; ph&ocirc;ng nền s&aacute;ng gi&uacute;p gương mặt thon gọn.</p>\r\n</li>\r\n<li data-start=\"2084\" data-end=\"2204\">\r\n<p data-start=\"2086\" data-end=\"2204\"><strong data-start=\"2086\" data-end=\"2103\">Mặt tr&aacute;i tim:</strong> tr&aacute;n rộng, cằm nhọn. G&oacute;c chụp nghi&ecirc;ng c&ugrave;ng &aacute;nh s&aacute;ng b&ecirc;n h&ocirc;ng sẽ l&agrave;m nổi bật sự c&acirc;n đối v&agrave; mềm mại.</p>\r\n</li>\r\n<li data-start=\"2206\" data-end=\"2349\">\r\n<p data-start=\"2208\" data-end=\"2349\"><strong data-start=\"2208\" data-end=\"2222\">Mặt vu&ocirc;ng:</strong> đường n&eacute;t sắc cạnh. Phong c&aacute;ch chụp thời trang hoặc ảnh c&aacute; t&iacute;nh, kết hợp &aacute;nh s&aacute;ng mạnh từ tr&ecirc;n cao sẽ nhấn mạnh sự nam t&iacute;nh.</p>\r\n</li>\r\n<li data-start=\"2351\" data-end=\"2476\">\r\n<p data-start=\"2353\" data-end=\"2476\"><strong data-start=\"2353\" data-end=\"2371\">Mặt kim cương:</strong> m&aacute; rộng, tr&aacute;n v&agrave; cằm hẹp. N&ecirc;n chọn ảnh cận mặt hoặc nửa người, d&ugrave;ng &aacute;nh s&aacute;ng đều để l&agrave;m mềm đường n&eacute;t.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2478\" data-end=\"2508\">Đặt lịch chụp ảnh studio</h3>\r\n<p data-start=\"2509\" data-end=\"2736\">Khi đ&atilde; biết gương mặt của m&igrave;nh ph&ugrave; hợp với phong c&aacute;ch n&agrave;o, bạn sẽ dễ d&agrave;ng trao đổi với nhiếp ảnh gia để l&ecirc;n concept. Một số studio c&ograve;n c&oacute; dịch vụ tư vấn trực tiếp để bạn chọn được ph&ocirc;ng nền, trang phục v&agrave; g&oacute;c chụp chuẩn nhất.</p>\r\n<p data-start=\"2738\" data-end=\"2883\">H&atilde;y nhớ rằng, chuẩn bị kỹ lưỡng trước buổi chụp (từ kiểu t&oacute;c, trang phục đến thần th&aacute;i) sẽ gi&uacute;p bạn tự tin hơn v&agrave; c&oacute; những bức h&igrave;nh ưng &yacute; nhất.</p>', '68db8af6e8b2168da461873649Ra-mat-goi-chup-banner-web-2.jpg', 2, 7, '2020-08-01 08:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `status`, `address`, `phone`, `created_at`) VALUES
(13, 2, 'Đã hủy', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', '0385629850', '2020-08-15 15:25:02'),
(14, 8, 'Chờ lấy hàng', 'Hà Nội', '0945222224', '2020-08-16 09:50:16'),
(16, 15, 'Chờ lấy hàng', 'nnnnnn tỷtyrtrrttyrytty', 'xxxx', '2023-08-21 06:55:56'),
(17, 15, 'Đã giao', 'nnnnnn tỷtyrtrrttyrytty', 'xxxx', '2023-08-22 05:52:08'),
(18, 20, 'Chờ lấy hàng', 'hcm q12', '0364877526', '2023-08-22 04:29:05'),
(20, 2, 'Đang giao', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', '0385629850', '2023-08-22 05:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `quantity`) VALUES
(15, 13, 16, 1),
(16, 13, 18, 1),
(17, 14, 20, 2),
(18, 14, 19, 1),
(20, 16, 20, 1),
(21, 17, 16, 1),
(22, 18, 19, 2),
(23, 18, 15, 1),
(24, 18, 13, 1),
(27, 20, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `images` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `status` bit(1) NOT NULL,
  `views` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `images`, `description`, `status`, `views`, `id_category`) VALUES
(13, 'By Vilain Jet Pack', 6469500, 0, '5f36193c52cd5p1.png', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-size: 2em; line-height: 1.25em; font-family: futura-pt, sans-serif; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain Jet Pack - Bộ Escapade Ho&agrave;n hảo.</span></h2>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&oacute; thể đ&oacute;ng g&oacute;i dễ d&agrave;ng, Jet Pack n&agrave;y cho ph&eacute;p bạn mang theo những thứ kh&ocirc;ng thể thiếu của m&igrave;nh chỉ trong nh&aacute;y mắt.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Ho&agrave;n hảo để đi du lịch, kh&aacute;m ph&aacute; hoặc nghỉ dưỡng;&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">chỉ lấy những g&igrave; bạn cần.</span></span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Vừa vặn ho&agrave;n hảo trong h&agrave;nh l&yacute; x&aacute;ch tay, ba l&ocirc; v&agrave; t&uacute;i vệ sinh của bạn.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chứa một k&iacute;ch thước du lịch ByVilain prestyler, một ByVilain Wax v&agrave; một ByVilain Comb</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">_________________</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; text-decoration-line: underline;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Prestyling</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chọn giữa:</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;K&iacute;ch thước du lịch By Vilain Sidekick</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(2,53 fl. Oz./ 75 ml)</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;By Vilain NEON bọt muối biển</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(50ml /&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">1.69 oz</span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;)</span></span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;K&iacute;ch thước du lịch By VilainSidekick Zero</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(2,53 fl. Oz./75 ml)</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; text-decoration-line: underline;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">S&aacute;p tạo kiểu</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;By Vilain Wax / Pomade</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(2.2 fl. Oz./15 ml) l&agrave; loại s&aacute;p / pomade t&oacute;c chuy&ecirc;n nghiệp, hiệu suất cao.</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; text-decoration-line: underline;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">C&ocirc;ng cụ</span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain Skeleton Brush&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain Comb&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain XL Co</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;mb&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆ By Vilain Giant Comb&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain 9 Row Brush&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">By Vilain Cut Comb&nbsp;</span></span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">_____</span></span></span></p>', b'1', 1, 5),
(14, 'Shear Revival - Xịt tạo kết cấu AMITY', 486675, 0.05, '5f361a6d618ebp1.png', '<p style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-size: 2em; line-height: 1.25em; font-family: futura-pt, sans-serif; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Amity</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;l&agrave; một loại muối biển mới h&agrave;ng ng&agrave;y.</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px;\">Sử dụng sự kết hợp của muối biển từ Đại T&acirc;y Dương v&agrave; đất s&eacute;t cao lanh của &Uacute;c, xịt kho&aacute;ng Amity bổ sung th&ecirc;m nhiều kết cấu, khối lượng v&agrave; cấu tr&uacute;c cho vẻ ngo&agrave;i của bạn.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sử dụng nước &eacute;p l&aacute; l&ocirc; hội &amp; c&acirc;y phỉ l&agrave;m chất bảo quản cơ bản của ch&uacute;ng t&ocirc;i kh&ocirc;ng chỉ gi&uacute;p t&oacute;c v&agrave; da đầu của bạn lu&ocirc;n đủ nước, m&agrave; c&acirc;y phỉ c&ograve;n hỗ trợ th&uacute;c đẩy sự ph&aacute;t triển t&oacute;c khỏe mạnh v&agrave; l&agrave;m chậm qu&aacute; tr&igrave;nh rụng t&oacute;c!</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">-&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">kết th&uacute;c mờ</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">- giữ nhẹ</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">- T&agrave;n &aacute;c miễn ph&iacute;</span></p>\r\n<p style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-family: \'arial black\', \'avant garde\';\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần ch&iacute;nh</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;:</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\">&nbsp;</p>\r\n<ul style=\"margin: 0px; padding: 0px; list-style: none; font-size: 16px;\">\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">L&ocirc; hội: Ngăn ngừa g&agrave;u cho da đầu</span></p>\r\n</li>\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu Marula: Chất bảo vệ chống tia cực t&iacute;m &amp; đặc t&iacute;nh t&aacute;i tạo tế b&agrave;o để ph&aacute;t triển khỏe mạnh.</span></p>\r\n</li>\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất tre: Cung cấp sức mạnh v&agrave; độ đ&agrave;n hồi cho c&aacute;c nang t&oacute;c của bạn.</span></p>\r\n</li>\r\n</ul>', b'1', 8, 5),
(16, 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét', 329000, 0.19, '5f3626ed125aep1.png', '<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">XỬ L&Yacute; BỌT MỎNG KHO&Aacute;NG ĐỂ L&Agrave;M SẠCH V&Agrave; ĐIỀU H&Ograve;A.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức đặc biệt.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Thực vật c&oacute; nguồn gốc tự nhi&ecirc;n.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất để hydrat h&oacute;a v&agrave; giải độc</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">___</span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Được ph&aacute;t triển ở Melbourne.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sản xuất tại &Uacute;c.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">400ml / 13,6 oz</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Được chứng nhận thuần chay &amp; kh&ocirc;ng độc hại</span></p>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">SANTALUM SPICATUM WOOD (SANDALWOOD) WATER, GANODERMA LUCIDUM (REISHI) WATER, DECYL GLUCOSIDE, COCAMIDOPROPYL BETAINE, POLYQUATERNIUM-6, MAGNESIUM ALUMINUM SILICATE, DECYL GLUCOSIDE, COCAMIDOPROPYL BETAine CHIẾT XUẤT DIOXIDE, POLYGONUM MULTIFLORUM ADVENTITIOUS (HE SHOU WU), CHIẾT XUẤT CAMELLIA SINENSIS (GREEN TEA), SCHISANDRA CHINENSIS (WU WEI ZIN) CHIẾT XUẤT TR&Aacute;I C&Acirc;Y, CHIẾT XUẤT TR&Aacute;I C&Acirc;Y BẰNG MẠNG (ALHWAGANDA), CHIẾT XUẤT MẠNG CỔ PHI (MẠNG CỔ PHI) CHIẾT XUẤT TR&Aacute;I C&Acirc;Y, BACOPA MONNIERI (BRAHMI), TERMINALIA FERDINANDIANA (KAKADU PLUM) CHIẾT XUẤT TR&Aacute;I C&Acirc;Y, CHIẾT XUẤT TR&Aacute;I C&Acirc;Y SANTALUM ACUMINATUM (QUANDONG), CITRIC ACID, CITRUS GLAUCA (NEEM LIME) TR&Aacute;I C&Acirc;Y, CITOLTA INDRA, PHENOXYET , EUGENOL, GERANIOL, LIMONENE, LINALOOL</span></p>\r\n<p><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">HƯỚNG DẪN SỬ DỤNG:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">MASSAGE V&Agrave;O T&Oacute;C V&Agrave; KHOẢNG C&Aacute;CH, T&Aacute;I TẠO NGAY LẠI V&Agrave; LẶP LẠI.</span></p>\r\n<p>&nbsp;</p>', b'1', 9, 6),
(17, 'SHEH • VOO - Dầu gội đất sét đen', 215000, 0.05, '5f3627e273865p1.png', '<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu gội đất s&eacute;t đen của (SHEH &bull; VOO) l&agrave; chất tẩy rửa hiệu quả cao được thiết kế để củng cố v&agrave; nu&ocirc;i dưỡng t&oacute;c yếu.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức độc đ&aacute;o n&agrave;y sẽ cung cấp cho t&oacute;c của bạn c&aacute;c th&agrave;nh phần hiệu quả cao để gi&uacute;p t&oacute;c bạn d&agrave;y, đầy đặn v&agrave; mượt m&agrave; hơn r&otilde; rệt.</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Với việc sử dụng thường xuy&ecirc;n, m&aacute;i t&oacute;c của bạn sẽ được hồi sinh &amp; khử độc với sự pha trộn sang trọng của đất s&eacute;t đen v&agrave; than.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Được truyền c&aacute;c đặc t&iacute;nh tăng cường dưỡng chất cho t&oacute;c, biotin v&agrave; l&ocirc; hội của ch&uacute;ng t&ocirc;i hoạt động h&agrave;i h&ograve;a để th&uacute;c đẩy m&aacute;i t&oacute;c chắc khỏe v&agrave; được nu&ocirc;i dưỡng tốt.</span></span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">250ML / 8,5 fl oz</span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức kh&ocirc;ng chứa Sulfat hoặc Parabens |&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">T&agrave;n nhẫn-Miễn ph&iacute; |&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sản xuất tại Mỹ</span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần ch&iacute;nh:</span></span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Đất s&eacute;t đen, Than củi, Dưa chuột, Nha đam, Biotin, Pro-Vitamin B5, Glycerin</span></span></span></span></p>', b'1', 3, 6),
(19, 'The Salon Guy - Dầu gội đầu', 239000, 0.19, '5f36296c819c9p1.png', '<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Salon Guy VOLUME Shampoo l&agrave; loại dầu gội tạo bọt kh&ocirc;ng chứa silicon sẽ l&agrave;m sạch s&acirc;u v&agrave; nu&ocirc;i dưỡng da đầu của bạn với c&ocirc;ng thức thuần chay, kh&ocirc;ng chứa sulphat v&agrave; kh&ocirc;ng chứa paraben.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu gội đầu chất lượng cao n&agrave;y đ&atilde; được nh&oacute;m Slikhaarshop chấp thuận v&agrave; l&agrave; một phần của c&aacute;c sản phẩm được chọn lọc thủ c&ocirc;ng m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; chọn cho bạn.</span></span></p>\r\n<ul style=\"margin: 0px; padding: 0px; list-style: none; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Silicon miễn ph&iacute;&nbsp;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">100% c&ocirc;ng thức thuần chay</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần hữu cơ</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức thuần chay</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">T&agrave;n &aacute;c miễn ph&iacute;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sulphate miễn ph&iacute;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Kh&ocirc;ng chứa paraben</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Kh&ocirc;ng chứa gluten</span></li>\r\n</ul>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần:&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">Aqua, Sodium Methyl&nbsp;&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">cocoyl&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Taurat&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">cocamitopropyl&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;betain, Polyquaternium 7, Sodium Lauroamphoacetate, Glycerin, Polyquaternium-10, Kali Sorbate, Coco-Glucoside, Glyceryl oleate,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Propenediol&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">, Hydrolyzed Jojoba Este, Phenoxyethanol,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Ethylhexylglycerin&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Hydrolyzed Rice Protein&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">, Panax Ginseng gốc Extract&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">*&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Urtica&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dioica&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">(&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Tầm ma&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">)&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">*&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;l&aacute;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Telopea&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Speciosissima&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">(Waratah)&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">*&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">, Natri clorua, Axit xitric</span></span></span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">&nbsp;</span></p>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">* Th&agrave;nh phần hữu cơ được chứng nhận</span></span></p>', b'1', 14, 6),
(20, 'The Salon Guy - Dầu gội Protein Quinoa PURE', 125000, 0.28, '5f362a2c23011p1.png', '<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Salon Guy PURE Quinoa Protein Shampoo with Peppermint &amp; Menthol sẽ l&agrave;m sạch s&acirc;u v&agrave; l&agrave;m mới da đầu của bạn với c&ocirc;ng thức chống vi khuẩn v&agrave; chống vi&ecirc;m đặc biệt.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu gội đầu chất lượng cao n&agrave;y đ&atilde; được nh&oacute;m Slikhaarshop chấp thuận v&agrave; l&agrave; một phần của c&aacute;c sản phẩm được chọn lọc thủ c&ocirc;ng m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; chọn cho bạn.</span></span></p>\r\n<ul style=\"margin: 0px; padding: 0px; list-style: none; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chặn DHT &amp; Chống rụng t&oacute;c</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&uacute;c đẩy mọc t&oacute;c d&agrave;y hơn</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">L&agrave;m dịu &amp; dưỡng ẩm da đầu kh&ocirc;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức thuần chay</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">T&agrave;n &aacute;c miễn ph&iacute;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức Unisex</span></li>\r\n</ul>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">Aqua, Sodium Methyl Cocoyl Taurate, Cocamidopropyl Betaine, Dimethicone, Decyl Glucoside, Coco-Glucoside, Glyceryl Oleate, Hydrolyzed Quinoa *, Salt, Olea europaea (Olive) FruitOil, Linum Usitatissimum (Flaxseed) Seed Oil *, Squalane *, Sunflower (Helianthus) Annus) Seed Oil *, Hippophae Rhamnoides (Sea Buckthorn) FruitOil *, Medicago Sativa (Alfalfa) Extract *, Hordeum Distichon (Barley) Extract *, Fusanus Spicatus Wood Oil (Sandalwood Oil), Pheliodendron Amurense Bark Extract (Cork Tree) *, Chiết xuất l&aacute; Mentha Piperita (Bạc h&agrave;) *, Menthol, Chiết xuất l&aacute; hương thảo (Rosmarinus Officinalis) *, Parfum, Phenoxyethanol, Ethylhexylglycerin, Kali Sorbate, Axit Citric (* Th&agrave;nh phần hữu cơ được chứng nhận)</span></p>\r\n<p><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">Hướng dẫn sử dụng:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">&Aacute;p dụng 1-3 lần bơm l&ecirc;n t&oacute;c ẩm, xoa đều v&agrave; gội sạch bằng nước.</span></p>', b'1', 40, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `images` varchar(191) NOT NULL,
  `title` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `id_product`, `images`, `title`) VALUES
(4, 6, '5f2931a12d97dp1.png', 'Gôm R&B'),
(5, 6, '5f2931891e674p1.png', 'Gôm R&B'),
(6, 6, '5f29317161399p1.png', 'Gôm R&B'),
(7, 5, '5f2a934c67d791e3b69d718a10a677ce50ac0386130af.png', 'Sáp Glanzen Clay'),
(8, 5, '5f2a9345aaa69fb74d8a4fff99b4e7eef8ff73c994265.png', 'Sáp Glanzen Clay'),
(9, 5, '5f2a92a7b06013aee2414bf8d1ccd8a6e4934c4ba502d.png', 'Sáp Glanzen Clay'),
(10, 8, '5f2ad43542670sprite.png', 'Bọt Cạo Râu Gillette Hương Chanh'),
(11, 8, '5f2ad45e0a216sprite.png', 'Bọt Cạo Râu Gillette Hương Chanh'),
(12, 9, '5f2ad50f7340afb74d8a4fff99b4e7eef8ff73c994265.png', 'Bọt Cạo Râu Romano Classic'),
(13, 9, '5f2ad5173d8253aee2414bf8d1ccd8a6e4934c4ba502d.png', 'Bọt Cạo Râu Romano Classic'),
(14, 9, '5f2ad51fa6183sprite.png', 'Bọt Cạo Râu Romano Classic'),
(15, 10, '5f2ad68702ae4p1.png', 'Gôm xịt tạo phồng By Vilain Sidekick'),
(16, 10, '5f2ad6abcbc36p1.png', 'Gôm xịt tạo phồng By Vilain Sidekick'),
(17, 10, '5f2ad6b2cc3c7sprite.png', 'Gôm xịt tạo phồng By Vilain Sidekick'),
(18, 11, '5f361739d225e1-min-5.png', 'Vilain 3-Pack'),
(19, 11, '5f361745d08feicon-zio.png', 'Vilain 3-Pack'),
(20, 11, '5f36174e913e6p3.png', 'Vilain 3-Pack'),
(21, 11, '5f36175a23250p4.png', 'Vilain 3-Pack'),
(22, 11, '5f3617646c27cp2.png', 'Vilain 3-Pack'),
(23, 12, '5f361834af5b4p2.png', 'Vilain NEON Sea Salt'),
(24, 12, '5f36183b93959p3.png', 'Vilain NEON Sea Salt'),
(25, 12, '5f36184231eeep1.png', 'Vilain NEON Sea Salt'),
(26, 13, '5f36194ca7510p3.png', 'By Vilain Jet Pack'),
(27, 13, '5f36195322b2dp2.png', 'By Vilain Jet Pack'),
(28, 13, '5f36195c03c52p1.png', 'By Vilain Jet Pack'),
(29, 14, '5f361a93e1ea2p2.png', 'Shear Revival'),
(30, 14, '5f361a836eaa0p3.png', 'Shear Revival'),
(31, 14, '5f361a9ccfdeep1.png', 'Shear Revival'),
(32, 15, '5f3625fd5a62ep4.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
(33, 15, '5f3626045a294p3.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
(34, 15, '5f36260bcc572p2.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
(35, 15, '5f3626155a5fcicon-zio.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
(36, 15, '5f36261e8d6e91-min-5.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
(37, 15, '5f362629948ddp1.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
(38, 16, '5f3626f6f3535p4.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
(39, 16, '5f3626ff7ac11p3.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
(40, 16, '5f36270697d90p2.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
(41, 16, '5f36270e2c918p1.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
(42, 17, '5f3627eab570ep2.png', 'SHEH • VOO - Dầu gội đất sét đen'),
(43, 17, '5f3627f04327cp1.png', 'SHEH • VOO - Dầu gội đất sét đen'),
(44, 18, '5f3628b36f559p3.png', 'By Vilain Rush Conditioner'),
(45, 18, '5f3628ba090afp2.png', 'By Vilain Rush Conditioner'),
(46, 18, '5f3628c04da49p1.png', 'By Vilain Rush Conditioner'),
(47, 19, '5f362975d099cp3.png', 'The Salon Guy - Dầu gội đầu'),
(48, 19, '5f36297bf0ff0p2.png', 'The Salon Guy - Dầu gội đầu'),
(49, 19, '5f362982ad651p1.png', 'The Salon Guy - Dầu gội đầu'),
(50, 20, '5f362a47aa91cp3.png', 'The Salon Guy - Dầu gội đầu'),
(51, 20, '5f362a4fc451cp2.png', 'The Salon Guy - Dầu gội đầu'),
(52, 20, '5f362a55ecb87p1.png', 'The Salon Guy - Dầu gội đầu'),
(54, 22, '64e43d68a51315f2a94b98c22dsprite.png', 'anh 2'),
(55, 23, '64e44cd37e5e85f24cbc710a7abarber-slide-2-.png', 'anh 01');

-- --------------------------------------------------------

--
-- Table structure for table `reply_contact`
--

CREATE TABLE `reply_contact` (
  `id` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply_contact`
--

INSERT INTO `reply_contact` (`id`, `id_contact`, `id_user`, `content`, `created_at`) VALUES
(5, 3, 2, '<p>Tesssfbbb</p>', '2020-08-16 09:41:43'),
(6, 4, 2, '<p>ttttttttttttttttttttttttttttttttttttt</p>', '2020-08-16 09:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `time` time NOT NULL,
  `detail` text NOT NULL,
  `images` varchar(191) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `sale`, `time`, `detail`, `images`, `id_type`) VALUES
(6, 'Chụp ảnh cưới ngoại cảnh', 20000000, 1, '00:15:00', '<p>Chụp ảnh cưới ngoại cảnh</p>', '68da44dd61e12sapa.jpg', 8),
(10, 'Chụp ảnh cosplay', 2000000, 0, '00:45:00', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Chụp ảnh cosplay</p>', '68da4513cec9ecosplay-anime-girl-sexy-3.jpg', 7),
(11, 'Chụp ảnh quảng cáo thời trang', 5500000, 0, '00:15:00', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #4a4a4a; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\">Chụp ảnh quảng c&aacute;o thời trang</p>', '68da453c6606bchup-hinh-quang-cao-quan-ao.jpg', 5),
(13, 'Chụp ảnh kỷ yếu kết hợp flycam', 3000000, 0.05, '00:15:00', '<ul data-start=\"1313\" data-end=\"1482\">\r\n<li data-start=\"1448\" data-end=\"1482\">\r\n<p data-start=\"1450\" data-end=\"1482\">Chụp ảnh kỷ yếu kết hợp flycam</p>\r\n</li>\r\n</ul>', '68da4569625dd13103533_1601865756806540_7837765862610207679_n.jpg', 3),
(14, 'Chụp ảnh tiệc cưới/sinh nhật', 7000000, 0.1, '00:15:00', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #4a4a4a; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\"><strong>Dưỡng sinh g&ocirc;̣i đ&acirc;̀u</strong></p>', '68da459a8c97achup-hinh-tiec-sinh-nhat1.jpg', 6),
(21, 'Chụp ảnh cưới trong studio', 12000000, 0.1, '00:15:00', '<ul>\r\n<li data-start=\"591\" data-end=\"621\">\r\n<p data-start=\"593\" data-end=\"621\">Chụp ảnh cưới trong studio</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li data-start=\"622\" data-end=\"650\">\r\n<p data-start=\"624\" data-end=\"650\">&nbsp;</p>\r\n</li>\r\n</ul>', '68da44a12c35akinh-nghiem-chup-anh-cuoi-trong-studio-1_fdd65cab8f084f669456507cd26b240b.jpg', 8),
(22, 'Chụp ảnh gia đình tại studio', 700000, 0.1, '00:45:00', '<p>Chụp ảnh gia đ&igrave;nh tại studio</p>', '68da44726ad30193A9241-scaled.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(191) NOT NULL,
  `file_ico` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `introduce` text NOT NULL,
  `slogan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `file_ico`, `title`, `introduce`, `slogan`) VALUES
(3, '68db868245de468db41dc845cdlogo3.png', '68db868245df168db44178f1b5logo3.ico', 'Chụp ảnh studio', '<p>I. VỀ STUDIO CHỤP ẢNH</p>
<p>Chào mừng bạn đến với DakeStudio – Không gian sáng tạo và lưu giữ khoảnh khắc nghệ thuật hàng đầu.</p>
<p>Giữa nhịp sống hiện đại hối hả, những giá trị trân quý nhất đôi khi lại nằm ở những giây phút bình dị: một nụ cười rạng rỡ của thanh xuân, một ánh mắt đong đầy hạnh phúc của đôi lứa, hay khoảnh khắc sum vầy ấm áp của gia đình. Tại DakeStudio, chúng tôi không chỉ sở hữu những góc máy, chúng tôi sở hữu sự nhạy cảm nghệ thuật để lắng nghe và chuyển hóa câu chuyện của riêng bạn thành những tác phẩm nhiếp ảnh độc bản.</p>
<p>Cái tên Dake được định nghĩa bằng hành trình tìm kiếm những góc nhìn ẩn giấu — nơi vẻ đẹp chân thực, mộc mạc và những cái &quot;tôi&quot; cá tính được tôn vinh một cách trọn vẹn nhất thông qua ngôn ngữ của ánh sáng và hình khối.</p>
<p>Với tư duy duy mỹ khác biệt cùng tinh thần phục vụ tận tâm, DakeStudio tự hào là người đồng hành tin cậy, giúp bạn lưu giữ trọn vẹn những ký ức vô giá theo thời gian.</p>

<p>II. TRIẾT LÝ SÁNG TẠO: &quot;ĐỘC BẢN VÀ CẢM XÚC&quot;</p>
<p>Chúng tôi từ chối những khuôn mẫu rập khuôn hay những cái tạo dáng gượng gạo. Phong cách cốt lõi của DakeStudio nằm ở:</p>
<ul>
    <li>Bắt trọn khoảnh khắc vô giá: Là nụ cười vô tình chạm ánh mắt, là cái nắm tay siết chặt, hay phút giây trầm ngâm suy tư đầy chiều sâu.</li>
    <li>Gu thẩm mỹ tinh tế: Kết hợp hài hòa giữa màu sắc điện ảnh hiện đại (Cinematic Color) và chất nghệ thuật trường tồn vượt thời gian.</li>
    <li>Trải nghiệm cá nhân hóa: Mỗi khách hàng là một vị khách quý. Chúng tôi lắng nghe bạn, hiểu bạn để cùng bạn thiết kế nên một concept ảnh dành riêng cho chính bạn.</li>
</ul>

<p>III. GIÁ TRỊ CỐT LÕI LÀM NÊN THƯƠNG HIỆU</p>
<ul>
    <li>Sự Chỉn Chu Độc Bản: Chúng tôi cá nhân hóa từng concept chụp hình. Không rập khuôn, không sao chép; mỗi bối cảnh, góc sáng đều được tính toán riêng biệt phù hợp với phong cách và cá tính của riêng bạn.</li>
    <li>Công Nghệ &amp; Con Người: Sự kết hợp hoàn hảo giữa trang thiết bị studio hiện đại nhất cùng đội ngũ nhiếp ảnh gia, kỹ thuật viên hậu kỳ giàu kinh nghiệm, tận tâm, sở hữu gu thẩm mỹ tinh tế chuẩn điện ảnh.</li>
<li>Trải Nghiệm Khách Hàng: Sự thoải mái và nụ cười tự nhiên của bạn trong buổi chụp hình là thước đo thành công cao nhất của chúng tôi. DakeStudio cam kết mang lại một hành trình trải nghiệm chuyên nghiệp, trọn vẹn.</li>
</ul>

<p>IV. SỰ MỆNH CỦA DAKESTUDIO</p>
<p>Sứ mệnh của Dake không dừng lại ở việc tạo ra một bức ảnh lưu niệm, mà là kiến tạo nên một tác phẩm nghệ thuật sống động. Để nhiều năm sau nhìn lại, bạn không chỉ thấy diện mạo của mình ngày hôm đó, mà còn vẹn nguyên những rung động, cảm xúc và ký ức hạnh phúc của một thời thanh xuân rực rỡ.</p>

<p>V. QUY TRÌNH CHUYÊN NGHIỆP TẠI DAKESTUDIO</p>
<p>Để tạo ra một sản phẩm hình ảnh xuất sắc, mỗi dự án tại DakeStudio đều trải qua quy trình nghiêm ngặt 4 bước:</p>
<p><strong>Tư vấn &amp; Lên Ý tưởng:</strong> Lắng nghe mong muốn của khách hàng, định hình phong cách, lựa chọn trang phục và lên kế hoạch bối cảnh chi tiết.</p>
<p><strong>Thực hiện Bấm máy:</strong> Tạo không gian thoải mái giúp khách hàng dễ dàng bộc lộ cảm xúc tự nhiên nhất dưới sự dẫn dắt và khơi gợi của nhiếp ảnh gia.</p>
<p><strong>Hậu kỳ Tinh tế:</strong> Xử lý ánh sáng, màu sắc bằng các công nghệ màu sắc độc quyền nhưng vẫn giữ trọn nét chân thực của làn da, không lạm dụng chỉnh sửa quá đà.</p>
<p><strong>Bàn giao &amp; Nghiệm thu:</strong> Đảm bảo thời gian hoàn thiện chính xác, lắng nghe phản hồi và chỉnh sửa kỹ lưỡng cho đến khi khách hàng hoàn toàn hài lòng.</p>

<p>VI. KHÔNG GIAN SÁNG TẠO ĐA TRẢI NGHIỆM</p>
<p>Hệ thống phòng studio của Dake được đầu tư đồng bộ với trang thiết bị ánh sáng chuẩn chuyên nghiệp.</p>
<p>Các bối cảnh được biến hóa linh hoạt từ tối giản, thanh lịch đến chiều sâu nghệ thuật, sẵn sàng hiện thực hóa mọi ý tưởng táo bạo nhất của bạn và đội ngũ nhiếp ảnh gia tâm huyết.</p>


-- --------------------------------------------------------

--
-- Table structure for table `thochup`
--

CREATE TABLE `thochup` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `account` varchar(191) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `images` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `time_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thochup`
--

INSERT INTO `thochup` (`id`, `name`, `account`, `phone`, `email`, `password`, `address`, `images`, `code`, `time_code`) VALUES
(31, 'Nguyễn Văn Hoàng', 'hoangnv', '0945333444', 'hoangnv@gmail.com', '$2y$10$vAtPlySAF7VKpYy1rO0vm.U4MHUqB10cQIZCd6a5b30NwryGNjj0O', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't1.jpg', NULL, NULL),
(32, 'Trang Trần', 'ducnv', '0945424345', 'hoactph09598@fpt.edu.vn', '$2y$10$9TzOjz1XpDKvb.sPTTSBW.3oUdrBwI46TFBlDeD4okfveyV8ZI/3u', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't2.jpg', '', 0),
(33, 'Trần Văn Minh', 'minhvt', '0985568854', 'minhvt@gmail.com', '$2y$10$mBjgnp.bRvkyUaS.u7itKuAOq59/a.nx7O3R8TEnVm2/c7ijqk1am', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't3.jpg', NULL, NULL),
(34, 'Nguyễn Thị Trang', 'trangnt', '0933368854', 'trangnt@gmail.com', '$2y$10$e3mvy9VcQPiCNcPGF2if6OZk5U2WtUPyWr1iyrnPhfP1jdHRgY1JW', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `images` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `images`) VALUES
(3, 'Chụp ảnh kỷ yếu', '68da436b5db94chup-anh-ky-yeu-dep-2.jpg'),
(4, 'Chụp ảnh bé', '68da43ca17945images (3).jpg'),
(5, 'Chụp ảnh sản phẩm', '68da43ea2ee12chup-anh-san-pham-1.jpg'),
(6, 'Chụp ảnh sự kiện', '68da441a6ba798-501.jpg'),
(7, 'Chụp ảnh nghệ thuật', '68da43494a349gioi-thieu-dich-vu-chup-anh-ca-nhan-scaled.jpg'),
(8, 'Chụp ảnh cưới – prewedding', '68da431c0f4faimages (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `account` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` int(1) NOT NULL,
  `images` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `time_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `address`, `phone`, `email`, `role`, `images`, `code`, `time_code`) VALUES
(2, 'admin', '$2y$10$ED4546BJ42e0kiAn64dvfuCoFOaJkhh2Thd7UtIM523V7ZbkNID2e', 'Chu Thị Hoa', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', '0385629850', 'chuthihoa98bgg@gmail.com', 1, '5f37b43cbfb01team-12-420x424.jpg', '', 0),
(13, '', '', 'mai', '', '09877655444', '', 3, 'user.svg', NULL, NULL),
(21, 'letan', '$2y$10$Wd0TyjDYalqhMrMMbkW8tO7iea7Qkm/5jshV7J8/hNqsdh1EGfYEq', 'letan', 'xxxxxxxxxxxxxx x', '098765434', 'xxwxxcx@gmail.com', 3, 'user.svg', NULL, NULL),
(24, 'user1', '$2y$10$ED4546BJ42e0kiAn64dvfuCoFOaJkhh2Thd7UtIM523V7ZbkNID2e', 'user1', 'hcm vn sđsz szdfz dffd', '0987654325', 'User1@gmail.com', 3, '68da39262de10Screenshot 2025-09-26 145237.png', NULL, NULL),
(25, 'test123', '$2y$10$R0WTbr3Uh1eHlh5f7IGCjuxLdlxGGpQKeUxzNFxU120WzecXSkc92', 'test', 'hcm adsfdsfsagdfshg', '0987654321', 'test123@gmail.com', 3, 'user.svg', NULL, NULL),
(26, 'demo123', '$2y$10$TIeDnNesUYU3ODLO1ns.AejIU..3WfepxUtBvaH.jyzq.x/ObIvv2', 'demo123', 'khu pho 3 an phu quan 2', 'demo123', 'd@gmail.comemo123', 3, '68db9ae7a6efaScreenshot 2025-09-26 145237.png', NULL, NULL),
(27, 'mothaiba', '$2y$10$0u3CYbODxbCLmxi6xkXWle56Z9ugOA9cwFEBL.3xnZ./8Jsuiw2SO', 'mothaiba', 'mothaiba mothaiba mothaiba', 'mothaiba', 'mothaiba@gmail.com', 3, '68db9decd8d34Screenshot 2025-09-26 145237.png', NULL, NULL),
(29, 'testtknew', '$2y$10$AT/EptKd/138l9e0NMY.N.M1EiuxQNJIM6XTmkMtX72k1z9QWTLWa', 'testtknew', 'khu pho 3 an phu quan 2\r\nkhu phố', 'user123', 'testtknew@gmail.com', 3, '68db9fd1db695Screenshot 2025-09-26 145237.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `word_time`
--

CREATE TABLE `word_time` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `word_time`
--

INSERT INTO `word_time` (`id`, `time`) VALUES
(1, '08:30:00'),
(2, '09:00:00'),
(3, '09:30:00'),
(4, '10:00:00'),
(5, '10:30:00'),
(6, '11:00:00'),
(7, '11:30:00'),
(8, '12:00:00'),
(9, '12:30:00'),
(10, '13:00:00'),
(11, '13:30:00'),
(13, '14:30:00'),
(14, '15:00:00'),
(15, '15:30:00'),
(16, '16:00:00'),
(17, '16:30:00'),
(18, '17:00:00'),
(19, '17:30:00'),
(20, '18:00:00'),
(21, '18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_detail`
--
ALTER TABLE `app_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluates`
--
ALTER TABLE `evaluates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_contact`
--
ALTER TABLE `reply_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thochup`
--
ALTER TABLE `thochup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `account` (`account`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `account` (`account`);

--
-- Indexes for table `word_time`
--
ALTER TABLE `word_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `app_detail`
--
ALTER TABLE `app_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `evaluates`
--
ALTER TABLE `evaluates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `reply_contact`
--
ALTER TABLE `reply_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thochup`
--
ALTER TABLE `thochup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `word_time`
--
ALTER TABLE `word_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
