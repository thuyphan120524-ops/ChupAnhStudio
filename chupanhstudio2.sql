-- SQL Dump generated via PHP
-- Date: 2026-05-24 06:14:47
SET FOREIGN_KEY_CHECKS=0;

--
-- Table structure for table `app_detail`
--

DROP TABLE IF EXISTS `app_detail`;
CREATE TABLE `app_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_appointment` int NOT NULL,
  `id_service` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `app_detail`
--

INSERT INTO `app_detail` (`id`, `id_appointment`, `id_service`) VALUES
('87', '27', '21'),
('88', '28', '13'),
('89', '29', '6'),
('90', '30', '10');

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barber` int NOT NULL,
  `id_user` int NOT NULL,
  `day` date NOT NULL,
  `id_time` int NOT NULL,
  `payment_method` int DEFAULT NULL,
  `cancel` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `id_barber`, `id_user`, `day`, `id_time`, `payment_method`, `cancel`, `created_at`) VALUES
('27', '34', '25', '2025-09-30', '15', '30', '0', '2025-09-30 14:02:16'),
('28', '33', '2', '2025-09-30', '19', '100', '0', '2025-09-30 16:11:52'),
('29', '33', '29', '2025-10-02', '5', '50', '0', '2025-09-30 16:17:17'),
('30', '33', '25', '2025-10-01', '6', '30', '0', '2025-09-30 16:31:14');

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `images` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `images`) VALUES
('1', 'Gôm xịt tóc', '5f2a950f29382sprite.png'),
('4', 'Sáp vuốt tóc', '5f2a94db299d2sprite.png'),
('5', 'Xịt tạo phồng', '5f2a94b98c22dsprite.png'),
('6', 'Chăm sóc tóc', '5f2a948b5b83csprite.png'),
('7', 'Kem cạo râu', '5f2a93c666525sprite.png');

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `id_product` int NOT NULL,
  `id_user` int NOT NULL,
  `approve` bit(1) NOT NULL,
  `parent_id` int NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_product`, `id_user`, `approve`, `parent_id`, `rating`, `created_at`) VALUES
('26', 'Sản phẩm tốt', '19', '3', '1', '0', '3', '2020-08-16 18:18:49'),
('27', '<p>thank ban</p>', '19', '2', '1', '26', '0', '2023-08-22 11:43:08'),
('28', 'hihihhhhh', '14', '2', '1', '0', '5', '2023-08-22 12:32:27');

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `content`, `created_at`) VALUES
('4', 'dddddddd', '08899877755', 'chuthihoa98bgg@gmail.com', 'tedddddddddd', '2020-08-16 16:43:35');

--
-- Table structure for table `evaluates`
--

DROP TABLE IF EXISTS `evaluates`;
CREATE TABLE `evaluates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `id_appointment` int NOT NULL,
  `id_user` int NOT NULL,
  `id_service` int NOT NULL,
  `content` varchar(191) NOT NULL,
  `parent_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `evaluates`
--

INSERT INTO `evaluates` (`id`, `rating`, `id_appointment`, `id_user`, `id_service`, `content`, `parent_id`, `created_at`) VALUES
('3', '3', '3', '3', '13', 'Dịch vụ tốt', '0', '2020-08-16 16:25:06'),
('6', '0', '3', '2', '13', '<p>Cảm ơn bạn đ&atilde; đ&aacute;nh gi&aacute;</p>', '3', '2020-08-16 16:37:55'),
('7', '5', '0', '30', '6', 'Mình được ekip riêng chụp toàn bộ từ ảnh đến phóng sự. Bộ ảnh tự nhiên và rất đẹp.', '0', '2024-06-17 10:00:00'),
('8', '5', '0', '31', '6', 'Mình rất hài lòng với bộ ảnh. Màu đẹp, Nhiếp ảnh nhiệt tình và thân thiện.', '0', '2023-05-22 14:30:00'),
('9', '5', '0', '32', '6', 'Mimosa tư vấn cũng như các concept chụp được set up rất chỉnh chu. Mình rất ưng ý với bộ ảnh cưới này.', '0', '2024-03-10 11:15:00'),
('10', '5', '0', '33', '6', 'Bộ ảnh rất lãng mạn. Nhiếp ảnh gia còn tận tâm hướng dẫn tạo dáng, chọn góc mặt chụp nên mình cảm thấy rất hài lòng.', '0', '2024-05-13 09:45:00'),
('11', '5', '0', '34', '6', 'Khi nhận ảnh mình khá bất ngờ vì chỉnh nhanh. Các bạn nhân viên và nhiếp ảnh gia nhiệt tình, chuyên nghiệp.', '0', '2024-07-20 16:20:00'),
('12', '5', '0', '35', '6', 'Bộ ảnh này mình chụp vào hè nên hơi nắng nhưng đổi lại các bạn nhiếp ảnh và hỗ trợ cẩn thận và hài hước. Ảnh chỉnh cũng rất đẹp.', '0', '2024-03-27 15:10:00'),
('13', '5', '0', '36', '6', 'Chụp xa vất vả nhưng ekip chuẩn bị chu đáo, hỗ trợ rất nhiệt tình. Bộ ảnh nhận về rất ưng ý, nhất định mình sẽ giới thiệu cho bạn bè!', '0', '2023-09-08 13:05:00'),
('14', '5', '0', '37', '6', 'Mình chụp luôn 3 concept tại studio nhưng ảnh rất sang và đẹp. Thời gian trả ảnh cũng nhanh. Anh nhiếp ảnh cho vợ chồng mình rất vui tính và thoải mái.', '0', '2024-01-22 10:40:00'),
('15', '5', '0', '38', '6', 'Bộ ảnh cưới mình chụp rất đẹp. Không sửa ảnh mình quá đà nên thấy rất tự nhiên. Các bạn nhân viên cũng nhiệt tình nữa nên từ chụp đến nhận ảnh mình đều rất hài lòng.', '0', '2024-02-12 11:55:00');

--
-- Table structure for table `libraries`
--

DROP TABLE IF EXISTS `libraries`;
CREATE TABLE `libraries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `images` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `role` bit(1) NOT NULL,
  `album_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `name`, `images`, `link`, `role`) VALUES
('1', 'Studio', '6a11f355aa686640407686_18257068075288158_3814312811699390097_n.jpg', '4', '1'),
('3', 'Studio', 'hai.jpg', '1', '1'),
('4', 'Studio', 'ba.jpg', '1', '1'),
('5', 'Studio', 'mot.jpg', '3', '1');

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(191) NOT NULL,
  `id_user` int NOT NULL,
  `views` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `images`, `id_user`, `views`, `created_at`) VALUES
('3', 'Bí quyết chchọn ảnh cưới', '<h2 data-start=\"270\" data-end=\"338\">C&aacute;c lưu &yacute; khi đặt lịch v&agrave; chuẩn bị chụp ảnh studio cho nam giới</h2>\r\n<h3 data-start=\"340\" data-end=\"373\">Chọn thời gian chụp ph&ugrave; hợp</h3>\r\n<p data-start=\"374\" data-end=\"692\">Việc chọn sai thời điểm c&oacute; thể ảnh hưởng lớn đến chất lượng ảnh. Nếu đặt lịch v&agrave;o l&uacute;c qu&aacute; gấp, bạn sẽ dễ thiếu chuẩn bị về trang phục, tinh thần v&agrave; &yacute; tưởng tạo d&aacute;ng. Tốt nhất, h&atilde;y đặt lịch chụp trước <strong data-start=\"574\" data-end=\"588\">3 &ndash; 7 ng&agrave;y</strong>, để c&oacute; thời gian chuẩn bị trang phục, chỉnh sửa t&oacute;c tai, cũng như trao đổi concept với nhiếp ảnh gia.</p>\r\n<h3 data-start=\"694\" data-end=\"735\">Lựa chọn trang phục đ&uacute;ng phong c&aacute;ch</h3>\r\n<p data-start=\"736\" data-end=\"855\">Một bộ đồ kh&ocirc;ng ph&ugrave; hợp c&oacute; thể ph&aacute; vỡ tổng thể bức ảnh. Thay v&igrave; chọn bừa, h&atilde;y chọn trang phục theo concept buổi chụp:</p>\r\n<ul data-start=\"856\" data-end=\"1013\">\r\n<li data-start=\"856\" data-end=\"895\">\r\n<p data-start=\"858\" data-end=\"895\">Chụp c&aacute; nh&acirc;n lịch l&atilde;m: vest, sơ mi.</p>\r\n</li>\r\n<li data-start=\"896\" data-end=\"952\">\r\n<p data-start=\"898\" data-end=\"952\">Chụp thời trang: quần &aacute;o theo xu hướng, m&agrave;u nổi bật.</p>\r\n</li>\r\n<li data-start=\"953\" data-end=\"1013\">\r\n<p data-start=\"955\" data-end=\"1013\">Chụp nghệ thuật: đồ tone m&agrave;u trung t&iacute;nh, form thoải m&aacute;i.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1015\" data-end=\"1089\">Trang phục c&agrave;ng ăn khớp với concept, ảnh c&agrave;ng tự nhi&ecirc;n v&agrave; chuy&ecirc;n nghiệp.</p>\r\n<h3 data-start=\"1091\" data-end=\"1128\">Chăm s&oacute;c da mặt trước buổi chụp</h3>\r\n<p data-start=\"1129\" data-end=\"1365\">Da mặt mệt mỏi, b&oacute;ng dầu hay kh&ocirc; nẻ sẽ rất dễ lộ tr&ecirc;n ảnh studio. V&igrave; vậy, trước ng&agrave;y chụp, h&atilde;y <strong data-start=\"1224\" data-end=\"1278\">ngủ đủ giấc, uống nhiều nước v&agrave; chăm s&oacute;c da cơ bản</strong> (rửa mặt sạch, thoa kem dưỡng ẩm). Điều n&agrave;y sẽ gi&uacute;p gương mặt s&aacute;ng hơn dưới &aacute;nh đ&egrave;n.</p>\r\n<h3 data-start=\"1367\" data-end=\"1404\">Kiểm so&aacute;t m&aacute;i t&oacute;c v&agrave; ngoại h&igrave;nh</h3>\r\n<p data-start=\"1405\" data-end=\"1644\">Trước buổi chụp, h&atilde;y <strong data-start=\"1426\" data-end=\"1446\">tỉa t&oacute;c gọn g&agrave;ng</strong> hoặc tạo kiểu đơn giản để khu&ocirc;n mặt s&aacute;ng sủa hơn. Kh&ocirc;ng n&ecirc;n để t&oacute;c rối hoặc d&agrave;i qu&aacute; mức, v&igrave; &aacute;nh đ&egrave;n studio sẽ l&agrave;m khuyết điểm t&oacute;c hiện r&otilde; hơn. Nếu cần, bạn c&oacute; thể d&ugrave;ng keo/s&aacute;p để cố định nếp t&oacute;c.</p>\r\n<h3 data-start=\"1646\" data-end=\"1675\">Tư thế v&agrave; c&aacute;ch tạo d&aacute;ng</h3>\r\n<p data-start=\"1676\" data-end=\"1763\">Nhiều bạn nam thường ngại tạo d&aacute;ng, dẫn đến h&igrave;nh ảnh gượng gạo. Một số tips đơn giản:</p>\r\n<ul data-start=\"1764\" data-end=\"1976\">\r\n<li data-start=\"1764\" data-end=\"1834\">\r\n<p data-start=\"1766\" data-end=\"1834\">Đứng hơi nghi&ecirc;ng &frac34; thay v&igrave; thẳng ch&iacute;nh diện, tạo cảm gi&aacute;c gọn mặt.</p>\r\n</li>\r\n<li data-start=\"1835\" data-end=\"1883\">\r\n<p data-start=\"1837\" data-end=\"1883\">Giữ lưng thẳng, vai mở để to&aacute;t ra sự tự tin.</p>\r\n</li>\r\n<li data-start=\"1884\" data-end=\"1976\">\r\n<p data-start=\"1886\" data-end=\"1976\">Nếu kh&ocirc;ng biết đặt tay thế n&agrave;o, h&atilde;y thử chống nhẹ v&agrave;o t&uacute;i quần hoặc khoanh tay tự nhi&ecirc;n.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"1978\" data-end=\"2007\">Tr&aacute;nh lạm dụng phụ kiện</h3>\r\n<p data-start=\"2008\" data-end=\"2173\">Nhiều bạn nam mang qu&aacute; nhiều phụ kiện như đồng hồ, v&ograve;ng tay, k&iacute;nh r&acirc;m, khiến bức ảnh bị rối mắt. H&atilde;y giữ phụ kiện ở mức vừa phải, chọn một m&oacute;n l&agrave;m điểm nhấn ch&iacute;nh.</p>\r\n<h3 data-start=\"2175\" data-end=\"2209\">Chuẩn bị tinh thần thoải m&aacute;i</h3>\r\n<p data-start=\"2210\" data-end=\"2404\">Điều quan trọng kh&ocirc;ng k&eacute;m l&agrave; <strong data-start=\"2239\" data-end=\"2265\">giữ tinh thần tự nhi&ecirc;n</strong>. Nếu bạn căng thẳng, biểu cảm sẽ cứng, kh&oacute; c&oacute; ảnh đẹp. H&atilde;y nghe nhạc trước buổi chụp hoặc tr&ograve; chuyện với nhiếp ảnh gia để thoải m&aacute;i hơn.</p>\r\n<h3 data-start=\"2406\" data-end=\"2445\">Đặt lịch với studio chuy&ecirc;n nghiệp</h3>\r\n<p data-start=\"2446\" data-end=\"2573\">Cuối c&ugrave;ng, h&atilde;y chọn studio uy t&iacute;n c&oacute; ekip hỗ trợ &aacute;nh s&aacute;ng, makeup v&agrave; chỉnh sửa hậu kỳ. Khi đặt lịch, nhớ trao đổi r&otilde; r&agrave;ng về:</p>\r\n<ul data-start=\"2574\" data-end=\"2649\">\r\n<li data-start=\"2574\" data-end=\"2596\">\r\n<p data-start=\"2576\" data-end=\"2596\">Concept muốn chụp.</p>\r\n</li>\r\n<li data-start=\"2597\" data-end=\"2622\">\r\n<p data-start=\"2599\" data-end=\"2622\">Thời lượng buổi chụp.</p>\r\n</li>\r\n<li data-start=\"2623\" data-end=\"2649\">\r\n<p data-start=\"2625\" data-end=\"2649\">Số ảnh được chỉnh sửa.</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p data-start=\"2651\" data-end=\"2713\">Điều n&agrave;y gi&uacute;p bạn chủ động v&agrave; kh&ocirc;ng bị bất ngờ khi nhận ảnh.</p>', '68db8b2dbd6bdko1.jpg', '2', '6', '2020-08-01 15:44:47'),
('4', 'Đặt lịch và gợi ý bối cảnh', '<h2 data-start=\"286\" data-end=\"355\">Đặt lịch chụp ảnh studio &ndash; chọn phong c&aacute;ch ph&ugrave; hợp với khu&ocirc;n mặt</h2>\r\n<p data-start=\"357\" data-end=\"820\">Giống như quần &aacute;o, kh&ocirc;ng c&oacute; một kiểu chụp ảnh n&agrave;o ph&ugrave; hợp với tất cả mọi người. Mỗi khu&ocirc;n mặt lại c&oacute; những đặc điểm ri&ecirc;ng, v&igrave; thế nếu biết lựa chọn g&oacute;c m&aacute;y v&agrave; phong c&aacute;ch ph&ugrave; hợp, bạn sẽ c&oacute; những bức ảnh studio đẹp nhất. Trước khi đặt lịch chụp, bạn n&ecirc;n hiểu r&otilde; khu&ocirc;n mặt của m&igrave;nh v&agrave; phong c&aacute;ch n&agrave;o c&oacute; thể l&agrave;m nổi bật ưu điểm ấy. Chỉ cần thay đổi &aacute;nh s&aacute;ng, g&oacute;c chụp hoặc kiểu tạo d&aacute;ng một ch&uacute;t th&ocirc;i, diện mạo của bạn trong ảnh c&oacute; thể trở n&ecirc;n ho&agrave;n to&agrave;n kh&aacute;c biệt.</p>\r\n<h3 data-start=\"822\" data-end=\"880\">C&aacute;ch x&aacute;c định h&igrave;nh dạng khu&ocirc;n mặt trước khi chụp ảnh</h3>\r\n<p data-start=\"881\" data-end=\"1024\">Để c&oacute; bức h&igrave;nh đẹp, bước đầu ti&ecirc;n l&agrave; x&aacute;c định gương mặt của bạn thuộc dạng n&agrave;o. H&atilde;y chuẩn bị một chiếc thước d&acirc;y nhỏ v&agrave; đo theo c&aacute;c bước sau:</p>\r\n<ul data-start=\"1026\" data-end=\"1294\">\r\n<li data-start=\"1026\" data-end=\"1090\">\r\n<p data-start=\"1028\" data-end=\"1090\"><strong data-start=\"1028\" data-end=\"1037\">Tr&aacute;n:</strong> đo ngang từ một b&ecirc;n v&ograve;m l&ocirc;ng m&agrave;y sang b&ecirc;n c&ograve;n lại.</p>\r\n</li>\r\n<li data-start=\"1091\" data-end=\"1162\">\r\n<p data-start=\"1093\" data-end=\"1162\"><strong data-start=\"1093\" data-end=\"1109\">Xương g&ograve; m&aacute;:</strong> đo ngang phần nh&ocirc; cao nhất dưới g&oacute;c ngo&agrave;i của mắt.</p>\r\n</li>\r\n<li data-start=\"1163\" data-end=\"1238\">\r\n<p data-start=\"1165\" data-end=\"1238\"><strong data-start=\"1165\" data-end=\"1178\">H&agrave;m dưới:</strong> đo từ cằm đến dưới tai, nh&acirc;n đ&ocirc;i để ra số đo to&agrave;n bộ h&agrave;m.</p>\r\n</li>\r\n<li data-start=\"1239\" data-end=\"1294\">\r\n<p data-start=\"1241\" data-end=\"1294\"><strong data-start=\"1241\" data-end=\"1265\">Chiều d&agrave;i khu&ocirc;n mặt:</strong> từ đường ch&acirc;n t&oacute;c tới cằm.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1296\" data-end=\"1410\">Sau khi c&oacute; số đo, h&atilde;y so s&aacute;nh với c&aacute;c dạng gương mặt phổ biến dưới đ&acirc;y để chọn được phong c&aacute;ch chụp ảnh ph&ugrave; hợp.</p>\r\n<h3 data-start=\"1412\" data-end=\"1472\">C&aacute;c kiểu gương mặt v&agrave; phong c&aacute;ch chụp ảnh studio gợi &yacute;</h3>\r\n<ul data-start=\"1474\" data-end=\"2476\">\r\n<li data-start=\"1474\" data-end=\"1654\">\r\n<p data-start=\"1476\" data-end=\"1654\"><strong data-start=\"1476\" data-end=\"1494\">Mặt tr&aacute;i xoan:</strong> c&acirc;n đối, dễ chụp. Ph&ugrave; hợp với hầu hết c&aacute;c kiểu ảnh, từ ch&acirc;n dung close-up, ảnh nghệ thuật đến ảnh thời trang. N&ecirc;n chọn g&oacute;c chụp hơi nghi&ecirc;ng để tạo chiều s&acirc;u.</p>\r\n</li>\r\n<li data-start=\"1656\" data-end=\"1809\">\r\n<p data-start=\"1658\" data-end=\"1809\"><strong data-start=\"1658\" data-end=\"1675\">Mặt chữ nhật:</strong> gương mặt d&agrave;i, cần tr&aacute;nh chụp g&oacute;c ch&iacute;nh diện k&eacute;o d&agrave;i th&ecirc;m. Thay v&agrave;o đ&oacute;, n&ecirc;n chụp ngang vai, kết hợp &aacute;nh s&aacute;ng mềm để c&acirc;n bằng tỉ lệ.</p>\r\n</li>\r\n<li data-start=\"1811\" data-end=\"1928\">\r\n<p data-start=\"1813\" data-end=\"1928\"><strong data-start=\"1813\" data-end=\"1830\">Mặt tam gi&aacute;c:</strong> h&agrave;m rộng, tr&aacute;n nhỏ. Phong c&aacute;ch chụp b&aacute;n th&acirc;n, &aacute;nh s&aacute;ng từ tr&ecirc;n xuống sẽ gi&uacute;p khu&ocirc;n mặt gọn hơn.</p>\r\n</li>\r\n<li data-start=\"1930\" data-end=\"2082\">\r\n<p data-start=\"1932\" data-end=\"2082\"><strong data-start=\"1932\" data-end=\"1945\">Mặt tr&ograve;n:</strong> n&ecirc;n chọn d&aacute;ng chụp g&oacute;c &frac34; thay v&igrave; ch&iacute;nh diện để tạo cảm gi&aacute;c g&oacute;c cạnh hơn. &Aacute;nh s&aacute;ng tối giản v&agrave; ph&ocirc;ng nền s&aacute;ng gi&uacute;p gương mặt thon gọn.</p>\r\n</li>\r\n<li data-start=\"2084\" data-end=\"2204\">\r\n<p data-start=\"2086\" data-end=\"2204\"><strong data-start=\"2086\" data-end=\"2103\">Mặt tr&aacute;i tim:</strong> tr&aacute;n rộng, cằm nhọn. G&oacute;c chụp nghi&ecirc;ng c&ugrave;ng &aacute;nh s&aacute;ng b&ecirc;n h&ocirc;ng sẽ l&agrave;m nổi bật sự c&acirc;n đối v&agrave; mềm mại.</p>\r\n</li>\r\n<li data-start=\"2206\" data-end=\"2349\">\r\n<p data-start=\"2208\" data-end=\"2349\"><strong data-start=\"2208\" data-end=\"2222\">Mặt vu&ocirc;ng:</strong> đường n&eacute;t sắc cạnh. Phong c&aacute;ch chụp thời trang hoặc ảnh c&aacute; t&iacute;nh, kết hợp &aacute;nh s&aacute;ng mạnh từ tr&ecirc;n cao sẽ nhấn mạnh sự nam t&iacute;nh.</p>\r\n</li>\r\n<li data-start=\"2351\" data-end=\"2476\">\r\n<p data-start=\"2353\" data-end=\"2476\"><strong data-start=\"2353\" data-end=\"2371\">Mặt kim cương:</strong> m&aacute; rộng, tr&aacute;n v&agrave; cằm hẹp. N&ecirc;n chọn ảnh cận mặt hoặc nửa người, d&ugrave;ng &aacute;nh s&aacute;ng đều để l&agrave;m mềm đường n&eacute;t.</p>\r\n</li>\r\n</ul>\r\n<h3 data-start=\"2478\" data-end=\"2508\">Đặt lịch chụp ảnh studio</h3>\r\n<p data-start=\"2509\" data-end=\"2736\">Khi đ&atilde; biết gương mặt của m&igrave;nh ph&ugrave; hợp với phong c&aacute;ch n&agrave;o, bạn sẽ dễ d&agrave;ng trao đổi với nhiếp ảnh gia để l&ecirc;n concept. Một số studio c&ograve;n c&oacute; dịch vụ tư vấn trực tiếp để bạn chọn được ph&ocirc;ng nền, trang phục v&agrave; g&oacute;c chụp chuẩn nhất.</p>\r\n<p data-start=\"2738\" data-end=\"2883\">H&atilde;y nhớ rằng, chuẩn bị kỹ lưỡng trước buổi chụp (từ kiểu t&oacute;c, trang phục đến thần th&aacute;i) sẽ gi&uacute;p bạn tự tin hơn v&agrave; c&oacute; những bức h&igrave;nh ưng &yacute; nhất.</p>', '68db8af6e8b2168da461873649Ra-mat-goi-chup-banner-web-2.jpg', '2', '7', '2020-08-01 15:49:25');

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `quantity`) VALUES
('15', '13', '16', '1'),
('16', '13', '18', '1'),
('17', '14', '20', '2'),
('18', '14', '19', '1'),
('20', '16', '20', '1'),
('21', '17', '16', '1'),
('22', '18', '19', '2'),
('23', '18', '15', '1'),
('24', '18', '13', '1'),
('27', '20', '17', '1');

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `status` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `status`, `address`, `phone`, `created_at`) VALUES
('13', '2', 'Đã hủy', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', '0385629850', '2020-08-15 22:25:02'),
('14', '8', 'Chờ lấy hàng', 'Hà Nội', '0945222224', '2020-08-16 16:50:16'),
('16', '15', 'Chờ lấy hàng', 'nnnnnn tỷtyrtrrttyrytty', 'xxxx', '2023-08-21 13:55:56'),
('17', '15', 'Đã giao', 'nnnnnn tỷtyrtrrttyrytty', 'xxxx', '2023-08-22 12:52:08'),
('18', '20', 'Chờ lấy hàng', 'hcm q12', '0364877526', '2023-08-22 11:29:05'),
('20', '2', 'Đang giao', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', '0385629850', '2023-08-22 12:51:54');

--
-- Table structure for table `product_gallery`
--

DROP TABLE IF EXISTS `product_gallery`;
CREATE TABLE `product_gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_product` int NOT NULL,
  `images` varchar(191) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product_gallery`
--

INSERT INTO `product_gallery` (`id`, `id_product`, `images`, `title`) VALUES
('4', '6', '5f2931a12d97dp1.png', 'Gôm R&B'),
('5', '6', '5f2931891e674p1.png', 'Gôm R&B'),
('6', '6', '5f29317161399p1.png', 'Gôm R&B'),
('7', '5', '5f2a934c67d791e3b69d718a10a677ce50ac0386130af.png', 'Sáp Glanzen Clay'),
('8', '5', '5f2a9345aaa69fb74d8a4fff99b4e7eef8ff73c994265.png', 'Sáp Glanzen Clay'),
('9', '5', '5f2a92a7b06013aee2414bf8d1ccd8a6e4934c4ba502d.png', 'Sáp Glanzen Clay'),
('10', '8', '5f2ad43542670sprite.png', 'Bọt Cạo Râu Gillette Hương Chanh'),
('11', '8', '5f2ad45e0a216sprite.png', 'Bọt Cạo Râu Gillette Hương Chanh'),
('12', '9', '5f2ad50f7340afb74d8a4fff99b4e7eef8ff73c994265.png', 'Bọt Cạo Râu Romano Classic'),
('13', '9', '5f2ad5173d8253aee2414bf8d1ccd8a6e4934c4ba502d.png', 'Bọt Cạo Râu Romano Classic'),
('14', '9', '5f2ad51fa6183sprite.png', 'Bọt Cạo Râu Romano Classic'),
('15', '10', '5f2ad68702ae4p1.png', 'Gôm xịt tạo phồng By Vilain Sidekick'),
('16', '10', '5f2ad6abcbc36p1.png', 'Gôm xịt tạo phồng By Vilain Sidekick'),
('17', '10', '5f2ad6b2cc3c7sprite.png', 'Gôm xịt tạo phồng By Vilain Sidekick'),
('18', '11', '5f361739d225e1-min-5.png', 'Vilain 3-Pack'),
('19', '11', '5f361745d08feicon-zio.png', 'Vilain 3-Pack'),
('20', '11', '5f36174e913e6p3.png', 'Vilain 3-Pack'),
('21', '11', '5f36175a23250p4.png', 'Vilain 3-Pack'),
('22', '11', '5f3617646c27cp2.png', 'Vilain 3-Pack'),
('23', '12', '5f361834af5b4p2.png', 'Vilain NEON Sea Salt'),
('24', '12', '5f36183b93959p3.png', 'Vilain NEON Sea Salt'),
('25', '12', '5f36184231eeep1.png', 'Vilain NEON Sea Salt'),
('26', '13', '5f36194ca7510p3.png', 'By Vilain Jet Pack'),
('27', '13', '5f36195322b2dp2.png', 'By Vilain Jet Pack'),
('28', '13', '5f36195c03c52p1.png', 'By Vilain Jet Pack'),
('29', '14', '5f361a93e1ea2p2.png', 'Shear Revival'),
('30', '14', '5f361a836eaa0p3.png', 'Shear Revival'),
('31', '14', '5f361a9ccfdeep1.png', 'Shear Revival'),
('32', '15', '5f3625fd5a62ep4.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
('33', '15', '5f3626045a294p3.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
('34', '15', '5f36260bcc572p2.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
('35', '15', '5f3626155a5fcicon-zio.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
('36', '15', '5f36261e8d6e91-min-5.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
('37', '15', '5f362629948ddp1.png', 'Dầu dưỡng tóc Blumaan Cloud Control'),
('38', '16', '5f3626f6f3535p4.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
('39', '16', '5f3626ff7ac11p3.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
('40', '16', '5f36270697d90p2.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
('41', '16', '5f36270e2c918p1.png', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét'),
('42', '17', '5f3627eab570ep2.png', 'SHEH • VOO - Dầu gội đất sét đen'),
('43', '17', '5f3627f04327cp1.png', 'SHEH • VOO - Dầu gội đất sét đen'),
('44', '18', '5f3628b36f559p3.png', 'By Vilain Rush Conditioner'),
('45', '18', '5f3628ba090afp2.png', 'By Vilain Rush Conditioner'),
('46', '18', '5f3628c04da49p1.png', 'By Vilain Rush Conditioner'),
('47', '19', '5f362975d099cp3.png', 'The Salon Guy - Dầu gội đầu'),
('48', '19', '5f36297bf0ff0p2.png', 'The Salon Guy - Dầu gội đầu'),
('49', '19', '5f362982ad651p1.png', 'The Salon Guy - Dầu gội đầu'),
('50', '20', '5f362a47aa91cp3.png', 'The Salon Guy - Dầu gội đầu'),
('51', '20', '5f362a4fc451cp2.png', 'The Salon Guy - Dầu gội đầu'),
('52', '20', '5f362a55ecb87p1.png', 'The Salon Guy - Dầu gội đầu'),
('54', '22', '64e43d68a51315f2a94b98c22dsprite.png', 'anh 2'),
('55', '23', '64e44cd37e5e85f24cbc710a7abarber-slide-2-.png', 'anh 01');

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `images` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `status` bit(1) NOT NULL,
  `views` int NOT NULL,
  `id_category` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale`, `images`, `description`, `status`, `views`, `id_category`) VALUES
('13', 'By Vilain Jet Pack', '6469500', '0', '5f36193c52cd5p1.png', '<h2 style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-size: 2em; line-height: 1.25em; font-family: futura-pt, sans-serif; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain Jet Pack - Bộ Escapade Ho&agrave;n hảo.</span></h2>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&oacute; thể đ&oacute;ng g&oacute;i dễ d&agrave;ng, Jet Pack n&agrave;y cho ph&eacute;p bạn mang theo những thứ kh&ocirc;ng thể thiếu của m&igrave;nh chỉ trong nh&aacute;y mắt.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Ho&agrave;n hảo để đi du lịch, kh&aacute;m ph&aacute; hoặc nghỉ dưỡng;&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">chỉ lấy những g&igrave; bạn cần.</span></span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Vừa vặn ho&agrave;n hảo trong h&agrave;nh l&yacute; x&aacute;ch tay, ba l&ocirc; v&agrave; t&uacute;i vệ sinh của bạn.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chứa một k&iacute;ch thước du lịch ByVilain prestyler, một ByVilain Wax v&agrave; một ByVilain Comb</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">_________________</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; text-decoration-line: underline;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Prestyling</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chọn giữa:</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;K&iacute;ch thước du lịch By Vilain Sidekick</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(2,53 fl. Oz./ 75 ml)</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;By Vilain NEON bọt muối biển</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(50ml /&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">1.69 oz</span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;)</span></span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;K&iacute;ch thước du lịch By VilainSidekick Zero</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(2,53 fl. Oz./75 ml)</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; text-decoration-line: underline;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">S&aacute;p tạo kiểu</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">☆</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;By Vilain Wax / Pomade</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;(2.2 fl. Oz./15 ml) l&agrave; loại s&aacute;p / pomade t&oacute;c chuy&ecirc;n nghiệp, hiệu suất cao.</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; text-decoration-line: underline;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">C&ocirc;ng cụ</span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain Skeleton Brush&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain Comb&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain XL Co</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;mb&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆ By Vilain Giant Comb&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">By Vilain 9 Row Brush&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">☆&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">By Vilain Cut Comb&nbsp;</span></span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">_____</span></span></span></p>', '1', '1', '5'),
('14', 'Shear Revival - Xịt tạo kết cấu AMITY', '486675', '0.05', '5f361a6d618ebp1.png', '<p style=\"margin: 0px 0px 10px; padding: 0px; font-weight: 400; font-size: 2em; line-height: 1.25em; font-family: futura-pt, sans-serif; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Amity</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;l&agrave; một loại muối biển mới h&agrave;ng ng&agrave;y.</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px;\">Sử dụng sự kết hợp của muối biển từ Đại T&acirc;y Dương v&agrave; đất s&eacute;t cao lanh của &Uacute;c, xịt kho&aacute;ng Amity bổ sung th&ecirc;m nhiều kết cấu, khối lượng v&agrave; cấu tr&uacute;c cho vẻ ngo&agrave;i của bạn.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sử dụng nước &eacute;p l&aacute; l&ocirc; hội &amp; c&acirc;y phỉ l&agrave;m chất bảo quản cơ bản của ch&uacute;ng t&ocirc;i kh&ocirc;ng chỉ gi&uacute;p t&oacute;c v&agrave; da đầu của bạn lu&ocirc;n đủ nước, m&agrave; c&acirc;y phỉ c&ograve;n hỗ trợ th&uacute;c đẩy sự ph&aacute;t triển t&oacute;c khỏe mạnh v&agrave; l&agrave;m chậm qu&aacute; tr&igrave;nh rụng t&oacute;c!</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">-&nbsp;</span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">kết th&uacute;c mờ</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">- giữ nhẹ</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\">- T&agrave;n &aacute;c miễn ph&iacute;</span></p>\r\n<p style=\"margin: 0px; padding: 0px; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; font-family: \'arial black\', \'avant garde\';\"><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần ch&iacute;nh</span></span></span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;:</span></span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-size: 16px;\">&nbsp;</p>\r\n<ul style=\"margin: 0px; padding: 0px; list-style: none; font-size: 16px;\">\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">L&ocirc; hội: Ngăn ngừa g&agrave;u cho da đầu</span></p>\r\n</li>\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu Marula: Chất bảo vệ chống tia cực t&iacute;m &amp; đặc t&iacute;nh t&aacute;i tạo tế b&agrave;o để ph&aacute;t triển khỏe mạnh.</span></p>\r\n</li>\r\n<li style=\"margin: 0px; padding: 0px;\">\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất tre: Cung cấp sức mạnh v&agrave; độ đ&agrave;n hồi cho c&aacute;c nang t&oacute;c của bạn.</span></p>\r\n</li>\r\n</ul>', '1', '8', '5'),
('16', 'Morris Motley - Dầu gội dưỡng tóc bằng đất sét', '329000', '0.19', '5f3626ed125aep1.png', '<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">XỬ L&Yacute; BỌT MỎNG KHO&Aacute;NG ĐỂ L&Agrave;M SẠCH V&Agrave; ĐIỀU H&Ograve;A.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức đặc biệt.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Thực vật c&oacute; nguồn gốc tự nhi&ecirc;n.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất để hydrat h&oacute;a v&agrave; giải độc</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">___</span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Được ph&aacute;t triển ở Melbourne.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sản xuất tại &Uacute;c.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">400ml / 13,6 oz</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Được chứng nhận thuần chay &amp; kh&ocirc;ng độc hại</span></p>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">SANTALUM SPICATUM WOOD (SANDALWOOD) WATER, GANODERMA LUCIDUM (REISHI) WATER, DECYL GLUCOSIDE, COCAMIDOPROPYL BETAINE, POLYQUATERNIUM-6, MAGNESIUM ALUMINUM SILICATE, DECYL GLUCOSIDE, COCAMIDOPROPYL BETAine CHIẾT XUẤT DIOXIDE, POLYGONUM MULTIFLORUM ADVENTITIOUS (HE SHOU WU), CHIẾT XUẤT CAMELLIA SINENSIS (GREEN TEA), SCHISANDRA CHINENSIS (WU WEI ZIN) CHIẾT XUẤT TR&Aacute;I C&Acirc;Y, CHIẾT XUẤT TR&Aacute;I C&Acirc;Y BẰNG MẠNG (ALHWAGANDA), CHIẾT XUẤT MẠNG CỔ PHI (MẠNG CỔ PHI) CHIẾT XUẤT TR&Aacute;I C&Acirc;Y, BACOPA MONNIERI (BRAHMI), TERMINALIA FERDINANDIANA (KAKADU PLUM) CHIẾT XUẤT TR&Aacute;I C&Acirc;Y, CHIẾT XUẤT TR&Aacute;I C&Acirc;Y SANTALUM ACUMINATUM (QUANDONG), CITRIC ACID, CITRUS GLAUCA (NEEM LIME) TR&Aacute;I C&Acirc;Y, CITOLTA INDRA, PHENOXYET , EUGENOL, GERANIOL, LIMONENE, LINALOOL</span></p>\r\n<p><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">HƯỚNG DẪN SỬ DỤNG:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">MASSAGE V&Agrave;O T&Oacute;C V&Agrave; KHOẢNG C&Aacute;CH, T&Aacute;I TẠO NGAY LẠI V&Agrave; LẶP LẠI.</span></p>\r\n<p>&nbsp;</p>', '1', '9', '6'),
('17', 'SHEH • VOO - Dầu gội đất sét đen', '215000', '0.05', '5f3627e273865p1.png', '<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu gội đất s&eacute;t đen của (SHEH &bull; VOO) l&agrave; chất tẩy rửa hiệu quả cao được thiết kế để củng cố v&agrave; nu&ocirc;i dưỡng t&oacute;c yếu.</span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức độc đ&aacute;o n&agrave;y sẽ cung cấp cho t&oacute;c của bạn c&aacute;c th&agrave;nh phần hiệu quả cao để gi&uacute;p t&oacute;c bạn d&agrave;y, đầy đặn v&agrave; mượt m&agrave; hơn r&otilde; rệt.</span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Với việc sử dụng thường xuy&ecirc;n, m&aacute;i t&oacute;c của bạn sẽ được hồi sinh &amp; khử độc với sự pha trộn sang trọng của đất s&eacute;t đen v&agrave; than.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Được truyền c&aacute;c đặc t&iacute;nh tăng cường dưỡng chất cho t&oacute;c, biotin v&agrave; l&ocirc; hội của ch&uacute;ng t&ocirc;i hoạt động h&agrave;i h&ograve;a để th&uacute;c đẩy m&aacute;i t&oacute;c chắc khỏe v&agrave; được nu&ocirc;i dưỡng tốt.</span></span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">250ML / 8,5 fl oz</span><br style=\"margin: 0px; padding: 0px;\" /><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức kh&ocirc;ng chứa Sulfat hoặc Parabens |&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">T&agrave;n nhẫn-Miễn ph&iacute; |&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sản xuất tại Mỹ</span></span></p>\r\n<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần ch&iacute;nh:</span></span><br style=\"margin: 0px; padding: 0px;\" /><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Đất s&eacute;t đen, Than củi, Dưa chuột, Nha đam, Biotin, Pro-Vitamin B5, Glycerin</span></span></span></span></p>', '1', '3', '6'),
('19', 'The Salon Guy - Dầu gội đầu', '239000', '0.19', '5f36296c819c9p1.png', '<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Salon Guy VOLUME Shampoo l&agrave; loại dầu gội tạo bọt kh&ocirc;ng chứa silicon sẽ l&agrave;m sạch s&acirc;u v&agrave; nu&ocirc;i dưỡng da đầu của bạn với c&ocirc;ng thức thuần chay, kh&ocirc;ng chứa sulphat v&agrave; kh&ocirc;ng chứa paraben.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu gội đầu chất lượng cao n&agrave;y đ&atilde; được nh&oacute;m Slikhaarshop chấp thuận v&agrave; l&agrave; một phần của c&aacute;c sản phẩm được chọn lọc thủ c&ocirc;ng m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; chọn cho bạn.</span></span></p>\r\n<ul style=\"margin: 0px; padding: 0px; list-style: none; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Silicon miễn ph&iacute;&nbsp;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">100% c&ocirc;ng thức thuần chay</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần hữu cơ</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức thuần chay</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">T&agrave;n &aacute;c miễn ph&iacute;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Sulphate miễn ph&iacute;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Kh&ocirc;ng chứa paraben</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Kh&ocirc;ng chứa gluten</span></li>\r\n</ul>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần:&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">Aqua, Sodium Methyl&nbsp;&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">cocoyl&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Taurat&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">cocamitopropyl&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;betain, Polyquaternium 7, Sodium Lauroamphoacetate, Glycerin, Polyquaternium-10, Kali Sorbate, Coco-Glucoside, Glyceryl oleate,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Propenediol&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">, Hydrolyzed Jojoba Este, Phenoxyethanol,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Ethylhexylglycerin&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px; font-weight: bold;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Hydrolyzed Rice Protein&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">, Panax Ginseng gốc Extract&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">*&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Urtica&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dioica&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">(&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Tầm ma&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">)&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">*&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">,&nbsp;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chiết xuất&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">&nbsp;l&aacute;&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Telopea&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Speciosissima&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">(Waratah)&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">*&nbsp;</span></span><span style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">, Natri clorua, Axit xitric</span></span></span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">&nbsp;</span><span style=\"font-family: futura-pt, sans-serif; font-size: 16px; margin: 0px; padding: 0px;\">&nbsp;</span></p>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">* Th&agrave;nh phần hữu cơ được chứng nhận</span></span></p>', '1', '14', '6'),
('20', 'The Salon Guy - Dầu gội Protein Quinoa PURE', '125000', '0.28', '5f362a2c23011p1.png', '<p style=\"margin: 0px 0px 1em; padding: 0px; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Salon Guy PURE Quinoa Protein Shampoo with Peppermint &amp; Menthol sẽ l&agrave;m sạch s&acirc;u v&agrave; l&agrave;m mới da đầu của bạn với c&ocirc;ng thức chống vi khuẩn v&agrave; chống vi&ecirc;m đặc biệt.&nbsp;</span><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Dầu gội đầu chất lượng cao n&agrave;y đ&atilde; được nh&oacute;m Slikhaarshop chấp thuận v&agrave; l&agrave; một phần của c&aacute;c sản phẩm được chọn lọc thủ c&ocirc;ng m&agrave; ch&uacute;ng t&ocirc;i đ&atilde; chọn cho bạn.</span></span></p>\r\n<ul style=\"margin: 0px; padding: 0px; list-style: none; font-family: futura-pt, sans-serif; font-size: 16px; background-color: #ffffff;\">\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Chặn DHT &amp; Chống rụng t&oacute;c</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&uacute;c đẩy mọc t&oacute;c d&agrave;y hơn</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">L&agrave;m dịu &amp; dưỡng ẩm da đầu kh&ocirc;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức thuần chay</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">T&agrave;n &aacute;c miễn ph&iacute;</span></li>\r\n<li style=\"margin: 0px 0px 0px 20px; padding: 2px 0px; list-style: disc;\"><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">C&ocirc;ng thức Unisex</span></li>\r\n</ul>\r\n<p><span style=\"margin: 0px; padding: 0px; vertical-align: inherit;\">Th&agrave;nh phần:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">Aqua, Sodium Methyl Cocoyl Taurate, Cocamidopropyl Betaine, Dimethicone, Decyl Glucoside, Coco-Glucoside, Glyceryl Oleate, Hydrolyzed Quinoa *, Salt, Olea europaea (Olive) FruitOil, Linum Usitatissimum (Flaxseed) Seed Oil *, Squalane *, Sunflower (Helianthus) Annus) Seed Oil *, Hippophae Rhamnoides (Sea Buckthorn) FruitOil *, Medicago Sativa (Alfalfa) Extract *, Hordeum Distichon (Barley) Extract *, Fusanus Spicatus Wood Oil (Sandalwood Oil), Pheliodendron Amurense Bark Extract (Cork Tree) *, Chiết xuất l&aacute; Mentha Piperita (Bạc h&agrave;) *, Menthol, Chiết xuất l&aacute; hương thảo (Rosmarinus Officinalis) *, Parfum, Phenoxyethanol, Ethylhexylglycerin, Kali Sorbate, Axit Citric (* Th&agrave;nh phần hữu cơ được chứng nhận)</span></p>\r\n<p><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">Hướng dẫn sử dụng:&nbsp;</span><span style=\"background-color: #ffffff; font-family: futura-pt, sans-serif; font-size: 16px;\">&Aacute;p dụng 1-3 lần bơm l&ecirc;n t&oacute;c ẩm, xoa đều v&agrave; gội sạch bằng nước.</span></p>', '1', '40', '6');

--
-- Table structure for table `reply_contact`
--

DROP TABLE IF EXISTS `reply_contact`;
CREATE TABLE `reply_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_contact` int NOT NULL,
  `id_user` int NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `reply_contact`
--

INSERT INTO `reply_contact` (`id`, `id_contact`, `id_user`, `content`, `created_at`) VALUES
('5', '3', '2', '<p>Tesssfbbb</p>', '2020-08-16 16:41:43'),
('6', '4', '2', '<p>ttttttttttttttttttttttttttttttttttttt</p>', '2020-08-16 16:43:56');

--
-- Table structure for table `service_gallery`
--

DROP TABLE IF EXISTS `service_gallery`;
CREATE TABLE `service_gallery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_service` int NOT NULL,
  `images` varchar(255) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `sort_order` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `service_gallery`
--

INSERT INTO `service_gallery` (`id`, `id_service`, `images`, `title`, `sort_order`) VALUES
('1', '22', '6a11f0729100f_bg_desktop.jpg', '', '0'),
('2', '22', '6a11f07f5972f_download.jpg', '', '0');

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `price` float NOT NULL,
  `sale` float NOT NULL,
  `time` time NOT NULL,
  `detail` text NOT NULL,
  `images` varchar(191) NOT NULL,
  `id_type` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `sale`, `time`, `detail`, `images`, `id_type`) VALUES
('6', 'Chụp ảnh cưới ngoại cảnh', '20000000', '1', '00:15:00', '<p>Chụp ảnh cưới ngoại cảnh</p>', '68da44dd61e12sapa.jpg', '8'),
('10', 'Chụp ảnh cosplay', '2000000', '0', '00:45:00', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Chụp ảnh cosplay</p>', '68da4513cec9ecosplay-anime-girl-sexy-3.jpg', '7'),
('11', 'Chụp ảnh quảng cáo thời trang', '5500000', '0', '00:15:00', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #4a4a4a; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\">Chụp ảnh quảng c&aacute;o thời trang</p>', '68da453c6606bchup-hinh-quang-cao-quan-ao.jpg', '5'),
('13', 'Chụp ảnh kỷ yếu kết hợp flycam', '3000000', '0.05', '00:15:00', '<ul data-start=\"1313\" data-end=\"1482\">\r\n<li data-start=\"1448\" data-end=\"1482\">\r\n<p data-start=\"1450\" data-end=\"1482\">Chụp ảnh kỷ yếu kết hợp flycam</p>\r\n</li>\r\n</ul>', '68da4569625dd13103533_1601865756806540_7837765862610207679_n.jpg', '3'),
('14', 'Chụp ảnh tiệc cưới/sinh nhật', '7000000', '0.1', '00:15:00', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #4a4a4a; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify; background-color: #ffffff;\"><strong>Dưỡng sinh g&ocirc;̣i đ&acirc;̀u</strong></p>', '68da459a8c97achup-hinh-tiec-sinh-nhat1.jpg', '6'),
('21', 'Chụp ảnh cưới trong studio', '12000000', '0.1', '00:15:00', '<ul>\r\n<li data-start=\"591\" data-end=\"621\">\r\n<p data-start=\"593\" data-end=\"621\">Chụp ảnh cưới trong studio</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li data-start=\"622\" data-end=\"650\">\r\n<p data-start=\"624\" data-end=\"650\">&nbsp;</p>\r\n</li>\r\n</ul>', '68da44a12c35akinh-nghiem-chup-anh-cuoi-trong-studio-1_fdd65cab8f084f669456507cd26b240b.jpg', '8'),
('22', 'Chụp ảnh gia đình tại studio', '700000', '0.1', '00:45:00', '<p>Chụp ảnh gia đ&igrave;nh tại studio</p>', '6a11f3e87a2c4Black and White Minimalist Round Beauty And Spa Logo.png', '7');

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` varchar(191) NOT NULL,
  `file_ico` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `introduce` text NOT NULL,
  `slogan` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `file_ico`, `title`, `introduce`, `slogan`) VALUES
('3', '68db868245de468db41dc845cdlogo3.png', '68db868245df168db44178f1b5logo3.ico', 'Chụp ảnh studio', '<p>I. VỀ STUDIO CHỤP ẢNH</p>\n<p>Chào mừng bạn đến với DakeStudio – Không gian sáng tạo và lưu giữ khoảnh khắc nghệ thuật hàng đầu.</p>\n<p>Giữa nhịp sống hiện đại hối hả, những giá trị trân quý nhất đôi khi lại nằm ở những giây phút bình dị: một nụ cười rạng rỡ của thanh xuân, một ánh mắt đong đầy hạnh phúc của đôi lứa, hay khoảnh khắc sum vầy ấm áp của gia đình. Tại DakeStudio, chúng tôi không chỉ sở hữu những góc máy, chúng tôi sở hữu sự nhạy cảm nghệ thuật để lắng nghe và chuyển hóa câu chuyện của riêng bạn thành những tác phẩm nhiếp ảnh độc bản.</p>\n<p>Cái tên Dake được định nghĩa bằng hành trình tìm kiếm những góc nhìn ẩn giấu — nơi vẻ đẹp chân thực, mộc mạc và những cái &quot;tôi&quot; cá tính được tôn vinh một cách trọn vẹn nhất thông qua ngôn ngữ của ánh sáng và hình khối.</p>\n<p>Với tư duy duy mỹ khác biệt cùng tinh thần phục vụ tận tâm, DakeStudio tự hào là người đồng hành tin cậy, giúp bạn lưu giữ trọn vẹn những ký ức vô giá theo thời gian.</p>\n\n<p>II. TRIẾT LÝ SÁNG TẠO: &quot;ĐỘC BẢN VÀ CẢM XÚC&quot;</p>\n<p>Chúng tôi từ chối những khuôn mẫu rập khuôn hay những cái tạo dáng gượng gạo. Phong cách cốt lõi của DakeStudio nằm ở:</p>\n<ul>\n    <li>Bắt trọn khoảnh khắc vô giá: Là nụ cười vô tình chạm ánh mắt, là cái nắm tay siết chặt, hay phút giây trầm ngâm suy tư đầy chiều sâu.</li>\n    <li>Gu thẩm mỹ tinh tế: Kết hợp hài hòa giữa màu sắc điện ảnh hiện đại (Cinematic Color) và chất nghệ thuật trường tồn vượt thời gian.</li>\n    <li>Trải nghiệm cá nhân hóa: Mỗi khách hàng là một vị khách quý. Chúng tôi lắng nghe bạn, hiểu bạn để cùng bạn thiết kế nên một concept ảnh dành riêng cho chính bạn.</li>\n</ul>\n\n<p>III. GIÁ TRỊ CỐT LÕI LÀM NÊN THƯƠNG HIỆU</p>\n<ul>\n    <li>Sự Chỉn Chu Độc Bản: Chúng tôi cá nhân hóa từng concept chụp hình. Không rập khuôn, không sao chép; mỗi bối cảnh, góc sáng đều được tính toán riêng biệt phù hợp với phong cách và cá tính của riêng bạn.</li>\n    <li>Công Nghệ &amp; Con Người: Sự kết hợp hoàn hảo giữa trang thiết bị studio hiện đại nhất cùng đội ngũ nhiếp ảnh gia, kỹ thuật viên hậu kỳ giàu kinh nghiệm, tận tâm, sở hữu gu thẩm mỹ tinh tế chuẩn điện ảnh.</li>\n<li>Trải Nghiệm Khách Hàng: Sự thoải mái và nụ cười tự nhiên của bạn trong buổi chụp hình là thước đo thành công cao nhất của chúng tôi. DakeStudio cam kết mang lại một hành trình trải nghiệm chuyên nghiệp, trọn vẹn.</li>\n</ul>\n\n<p>IV. SỰ MỆNH CỦA DAKESTUDIO</p>\n<p>Sứ mệnh của Dake không dừng lại ở việc tạo ra một bức ảnh lưu niệm, mà là kiến tạo nên một tác phẩm nghệ thuật sống động. Để nhiều năm sau nhìn lại, bạn không chỉ thấy diện mạo của mình ngày hôm đó, mà còn vẹn nguyên những rung động, cảm xúc và ký ức hạnh phúc của một thời thanh xuân rực rỡ.</p>\n\n<p>V. QUY TRÌNH CHUYÊN NGHIỆP TẠI DAKESTUDIO</p>\n<p>Để tạo ra một sản phẩm hình ảnh xuất sắc, mỗi dự án tại DakeStudio đều trải qua quy trình nghiêm ngặt 4 bước:</p>\n<p><strong>Tư vấn &amp; Lên Ý tưởng:</strong> Lắng nghe mong muốn của khách hàng, định hình phong cách, lựa chọn trang phục và lên kế hoạch bối cảnh chi tiết.</p>\n<p><strong>Thực hiện Bấm máy:</strong> Tạo không gian thoải mái giúp khách hàng dễ dàng bộc lộ cảm xúc tự nhiên nhất dưới sự dẫn dắt và khơi gợi của nhiếp ảnh gia.</p>\n<p><strong>Hậu kỳ Tinh tế:</strong> Xử lý ánh sáng, màu sắc bằng các công nghệ màu sắc độc quyền nhưng vẫn giữ trọn nét chân thực của làn da, không lạm dụng chỉnh sửa quá đà.</p>\n<p><strong>Bàn giao &amp; Nghiệm thu:</strong> Đảm bảo thời gian hoàn thiện chính xác, lắng nghe phản hồi và chỉnh sửa kỹ lưỡng cho đến khi khách hàng hoàn toàn hài lòng.</p>\n\n<p>VI. KHÔNG GIAN SÁNG TẠO ĐA TRẢI NGHIỆM</p>\n<p>Hệ thống phòng studio của Dake được đầu tư đồng bộ với trang thiết bị ánh sáng chuẩn chuyên nghiệp.</p>\n<p>Các bối cảnh được biến hóa linh hoạt từ tối giản, thanh lịch đến chiều sâu nghệ thuật, sẵn sàng hiện thực hóa mọi ý tưởng táo bạo nhất của bạn và đội ngũ nhiếp ảnh gia tâm huyết.</p>', 'Độc bản và Cảm xúc');

--
-- Table structure for table `thochup`
--

DROP TABLE IF EXISTS `thochup`;
CREATE TABLE `thochup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `account` varchar(191) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `images` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `time_code` int DEFAULT NULL,
  `profile_data` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `thochup`
--

INSERT INTO `thochup` (`id`, `name`, `account`, `phone`, `email`, `password`, `address`, `images`, `code`, `time_code`, `profile_data`) VALUES
('31', 'Nguyễn Văn Hoàng', 'hoangnv', '0945333444', 'hoangnv@gmail.com', '$2y$10$vAtPlySAF7VKpYy1rO0vm.U4MHUqB10cQIZCd6a5b30NwryGNjj0O', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't1.jpg', NULL, NULL, NULL),
('32', 'Trang Trần', 'ducnv', '0945424345', 'hoactph09598@fpt.edu.vn', '$2y$10$9TzOjz1XpDKvb.sPTTSBW.3oUdrBwI46TFBlDeD4okfveyV8ZI/3u', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't2.jpg', '', '0', NULL),
('33', 'Trần Văn Minh', 'minhvt', '0985568854', 'minhvt@gmail.com', '$2y$10$mBjgnp.bRvkyUaS.u7itKuAOq59/a.nx7O3R8TEnVm2/c7ijqk1am', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't3.jpg', NULL, NULL, NULL),
('34', 'Nguyễn Thị Trang', 'trangnt', '0933368854', 'trangnt@gmail.com', '$2y$10$e3mvy9VcQPiCNcPGF2if6OZk5U2WtUPyWr1iyrnPhfP1jdHRgY1JW', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', 't4.jpg', NULL, NULL, NULL),
('36', 'Lê Hoàng Nam', 'namlh', '0912345678', 'namlh@gmail.com', '$2y$12$T06f9NvHqHLCocWoILZLUO8qORWv6NYUwwtBnN5/DTvGNnhdmOuPS', 'Cầu Giấy, Hà Nội', 't1.jpg', NULL, NULL, '{\"stage_name\":\"Nam Le Photography\",\"birthday\":\"15 Tháng Tư 1995\",\"website\":\"https:\\/\\/namlephoto.com\",\"socials\":{\"facebook\":\"https:\\/\\/facebook.com\\/namlh.photo\",\"instagram\":\"https:\\/\\/instagram.com\\/namlh.photo\",\"behance\":\"#\",\"twitter\":\"#\"},\"bio\":{\"story\":\"Tôi là Hoàng Nam, một nhiếp ảnh gia đường phố và sự kiện tại Hà Nội. Với 8 năm cầm máy, tôi thích ghi lại những khoảnh khắc tự nhiên, sống động nhất của cuộc sống thường nhật và các sự kiện lớn nhỏ.\",\"style\":\"Báo chí, phóng sự, bắt trọn khoảnh khắc tự nhiên không dàn dựng.\",\"philosophy\":\"Khoảnh khắc đẹp nhất là khoảnh khắc chân thực nhất, không thể lặp lại lần thứ hai.\",\"difference\":\"Khả năng quan sát nhanh nhạy, bắt trọn cảm xúc tự nhiên trong tích tắc.\"},\"services\":[{\"title\":\"Chụp ảnh Sự kiện\",\"description\":\"Ghi lại toàn bộ diễn biến, cảm xúc và những khoảnh khắc quan trọng nhất của sự kiện.\",\"packages\":[{\"name\":\"Sự kiện Nửa ngày\",\"price\":\"2.500.000đ\",\"features\":\"4 tiếng chụp - Bàn giao 200 ảnh chỉnh sửa màu sắc - Trả ảnh sau 48h\"},{\"name\":\"Sự kiện Trọn gói\",\"price\":\"4.500.000đ\",\"features\":\"Chụp cả ngày - 2 thợ chụp - Bàn giao toàn bộ ảnh gốc và 400 ảnh retouch\"}]}],\"workflow\":[{\"step\":\"1. Khảo sát & Trao đổi\",\"detail\":\"Tìm hiểu kịch bản sự kiện, khảo sát ánh sáng và không gian địa điểm chụp.\"},{\"step\":\"2. Tác nghiệp\",\"detail\":\"Di chuyển linh hoạt, bắt trọn các góc máy cảm xúc mà không làm ảnh hưởng chương trình.\"},{\"step\":\"3. Hậu kỳ nhanh\",\"detail\":\"Lọc ảnh, chỉnh màu sắc ánh sáng đồng bộ và bàn giao nhanh chóng phục vụ truyền thông.\"}],\"experience\":{\"years\":\"8 năm kinh nghiệm\",\"projects\":[\"Photographer chính tại sự kiện TechFest Việt Nam (2022)\",\"Live Concert \\\"Đánh Thức Tình Yêu\\\" (2023)\"],\"awards\":[\"Giải nhì ảnh báo chí Khoảnh Khắc Vàng (2020)\"],\"clients\":[\"FPT Software\",\"VNG Corporation\",\"Tạp chí Heritage\"],\"media\":[\"Nhiều tác phẩm được đăng tải trên các trang báo VnExpress, Dân Trí.\"]},\"portfolio_categories\":[{\"name\":\"Sự kiện (Events)\",\"images\":[\"t1.jpg\",\"t2.jpg\"]}],\"before_after\":[{\"title\":\"Cân bằng sáng sự kiện thiếu sáng\",\"before\":\"t1.jpg\",\"after\":\"t2.jpg\"}],\"skills\":[\"Chụp thiếu sáng (Low-light)\",\"Chụp bắt khoảnh khắc nhanh (Action)\",\"Bố cục phóng sự\"],\"software\":[\"Adobe Lightroom Classic\",\"Adobe Photoshop\"],\"equipment\":{\"cameras\":[\"Nikon Z6 II\",\"Nikon D850\"],\"lenses\":[\"Nikkor Z 24-70mm f\\/2.8 S\",\"Nikkor Z 70-200mm f\\/2.8 VR S\"],\"lighting\":[\"Godox V1 Nikon\",\"Godox AD200 Pro\"]},\"education\":[{\"degree\":\"Khóa đào tạo Báo chí & Truyền thông\",\"school\":\"Học viện Báo chí\",\"year\":\"2017\"}],\"certifications\":[\"Chứng chỉ Phóng viên Ảnh xuất sắc (2018)\"],\"testimonials\":[{\"client_name\":\"Nguyễn Minh Tuấn\",\"avatar\":\"t1.jpg\",\"comment\":\"Ảnh rất đẹp và tự nhiên, thời gian trả ảnh cực kỳ nhanh đúng như cam kết.\",\"rating\":5}],\"case_studies\":[{\"title\":\"Phóng sự ảnh hội nghị TechFest\",\"challenge\":\"Hơn 1000 khách tham dự, ánh sáng sân khấu phức tạp liên tục thay đổi.\",\"solution\":\"Sử dụng hệ thống đèn flash trigger từ xa và chụp định dạng RAW chất lượng cao.\",\"result\":\"Hơn 300 ảnh chất lượng cao bàn giao ngay trong đêm để kịp làm truyền thông sáng hôm sau.\"}]}'),
('37', 'Phạm Minh Đức', 'ducpm', '0987654321', 'ducpm@gmail.com', '$2y$12$4weI3lfyNkaVaIL5Bl/1SujXfBz.6AIcyE4hPDAnbB3mwFe.Crba6', 'Thanh Xuân, Hà Nội', 't2.jpg', NULL, NULL, '{\"stage_name\":\"Đức Phạm Studio\",\"birthday\":\"22 Tháng Tám 1993\",\"website\":\"https:\\/\\/ducphamstudio.com\",\"socials\":{\"facebook\":\"https:\\/\\/facebook.com\\/ducpm.studio\",\"instagram\":\"https:\\/\\/instagram.com\\/ducpm.foodphoto\",\"behance\":\"https:\\/\\/behance.net\\/ducpm\",\"twitter\":\"#\"},\"bio\":{\"story\":\"Tôi là Minh Đức, chuyên gia chụp ảnh thương mại, sản phẩm và ẩm thực (Food & Product Photography). Với tôi, mỗi món ăn hay sản phẩm đều có một linh hồn riêng cần được tôn vinh qua lăng kính.\",\"style\":\"Tinh tế, chú trọng vào chi tiết vật liệu, màu sắc chuẩn xác và bố cục tối giản (Minimalism).\",\"philosophy\":\"Nhiếp ảnh thương mại là sự kết hợp hoàn mỹ giữa nghệ thuật thị giác và mục tiêu marketing.\",\"difference\":\"Kỹ năng kiểm soát ánh sáng studio đỉnh cao, thể hiện rõ nét chất liệu sản phẩm.\"},\"services\":[{\"title\":\"Chụp ảnh Sản phẩm & Ẩm thực\",\"description\":\"Hình ảnh chất lượng cao phục vụ menu, website bán hàng, catalogue quảng cáo.\",\"packages\":[{\"name\":\"Gói Catalog Basic\",\"price\":\"3.000.000đ\",\"features\":\"Chụp 10 sản phẩm - Nền trắng\\/Concept đơn giản - Retouch chi tiết sản phẩm\"},{\"name\":\"Gói Creative Concept\",\"price\":\"6.000.000đ\",\"features\":\"Chụp 5 concept nghệ thuật - Stylist dàn dựng không gian - Phù hợp làm banner quảng cáo\"}]}],\"workflow\":[{\"step\":\"1. Lên Concept & Moodboard\",\"detail\":\"Thảo luận với nhãn hàng để xây dựng moodboard màu sắc và phong cách bài trí.\"},{\"step\":\"2. Dàn dựng & Setup ánh sáng\",\"detail\":\"Stylist chuẩn bị đạo cụ và nhiếp ảnh gia điều chỉnh góc sáng hoàn hảo nhất.\"},{\"step\":\"3. Retouch & Bàn giao\",\"detail\":\"Xử lý bụi, vết xước, cân bằng màu chuẩn in ấn quảng cáo thương mại.\"}],\"experience\":{\"years\":\"10 năm kinh nghiệm\",\"projects\":[\"Bộ ảnh Menu cho chuỗi nhà hàng Pizza Home (2022)\",\"Chiến dịch quảng cáo mỹ phẩm Cocoon (2023)\"],\"awards\":[\"Giải thưởng Bố cục xuất sắc tại Food Photo Awards (2021)\"],\"clients\":[\"Cocoon Việt Nam\",\"Pizza Home\",\"Tocotoco\"],\"media\":[\"Tác phẩm đăng trên Tạp chí Ẩm Thực Việt Nam.\"]},\"portfolio_categories\":[{\"name\":\"Ẩm thực & Sản phẩm\",\"images\":[\"t3.jpg\",\"t4.jpg\"]}],\"before_after\":[{\"title\":\"Retouch chi tiết bề mặt sản phẩm\",\"before\":\"t3.jpg\",\"after\":\"t4.jpg\"}],\"skills\":[\"Ánh sáng Studio (Studio Lighting)\",\"Food Styling\",\"Macro Photography\"],\"software\":[\"Capture One Pro\",\"Adobe Photoshop\",\"Helicon Focus\"],\"equipment\":{\"cameras\":[\"Fujifilm GFX 50S II (Medium Format)\",\"Sony A7R IV\"],\"lenses\":[\"GF 120mm f\\/4 Macro\",\"FE 90mm f\\/2.8 Macro G\"],\"lighting\":[\"Broncolor Siros 800 S\",\"Softbox Stripbox 30x120cm\"]},\"education\":[{\"degree\":\"Khóa Thiết kế Đồ họa & Nhiếp ảnh ứng dụng\",\"school\":\"Arena Multimedia\",\"year\":\"2014\"}],\"certifications\":[\"Chứng nhận Chuyên gia Capture One Certified Professional (2020)\"],\"testimonials\":[{\"client_name\":\"Chị Phương Anh (Cocoon)\",\"avatar\":\"t2.jpg\",\"comment\":\"Hình ảnh cực kỳ sắc nét, thể hiện đúng tinh thần organic của thương hiệu.\",\"rating\":5}],\"case_studies\":[{\"title\":\"Bộ ảnh Menu Pizza Home\",\"challenge\":\"Làm sao để phô mai trông kéo sợi hấp dẫn và giữ độ tươi ngon của các topping dưới sức nóng đèn studio.\",\"solution\":\"Sử dụng đèn flash tốc độ cao để bắt kịp khoảnh khắc phô mai kéo sợi và dùng kỹ thuật xịt ẩm chuyên dụng.\",\"result\":\"Menu mới tăng tỷ lệ gọi món lên 35% nhờ hình ảnh trực quan sinh động kích thích vị giác.\"}]}'),
('38', 'Nguyễn Mai Anh', 'anhnm', '0901234567', 'anhnm@gmail.com', '$2y$12$uxBupFSdB5g1o2tsBUwyD.EdkGuFe9BfqYs8rD1.Ov8TNcgjwqThG', 'Đống Đa, Hà Nội', 't3.jpg', NULL, NULL, '{\"stage_name\":\"Mai Anh Baby Photo\",\"birthday\":\"08 Tháng Mười Một 1997\",\"website\":\"https:\\/\\/maianhphoto.com\",\"socials\":{\"facebook\":\"https:\\/\\/facebook.com\\/maianh.babyphoto\",\"instagram\":\"https:\\/\\/instagram.com\\/maianh.baby\",\"behance\":\"#\",\"twitter\":\"#\"},\"bio\":{\"story\":\"Xin chào, tôi là Mai Anh. Là một người mẹ, tôi hiểu rằng các dấu mốc khôn lớn của con trẻ trôi qua rất nhanh. Đó là lý do tôi dành trọn đam mê cho nhiếp ảnh gia đình, mẹ bầu và em bé.\",\"style\":\"Trong trẻo, tươi sáng, ấm áp và đong đầy tình cảm gia đình.\",\"philosophy\":\"Mỗi bức ảnh gia đình là một tài sản vô giá sẽ ngày càng trở nên quý báu theo thời gian.\",\"difference\":\"Sự kiên nhẫn tuyệt đối với trẻ nhỏ, tạo ra không gian vui chơi thoải mái để bắt trọn nụ cười hồn nhiên của bé.\"},\"services\":[{\"title\":\"Chụp ảnh Em bé & Gia đình\",\"description\":\"Lưu giữ những khoảnh khắc đầu đời đáng yêu của bé và tình yêu thương ấm áp của gia đình.\",\"packages\":[{\"name\":\"Gói Newborn\\/Baby\",\"price\":\"2.000.000đ\",\"features\":\"90 phút chụp tại studio - 2 concept trang phục cho bé - Bàn giao 20 ảnh retouch chuyên nghiệp\"},{\"name\":\"Gói Gia đình Hạnh phúc\",\"price\":\"3.500.000đ\",\"features\":\"Chụp cả gia đình (tối đa 5 người) - Tặng 1 album photobook cao cấp - Trả toàn bộ file gốc\"}]}],\"workflow\":[{\"step\":\"1. Chuẩn bị bối cảnh sạch sẽ\",\"detail\":\"Studio được khử khuẩn, giữ ấm nhiệt độ thích hợp và chuẩn bị sẵn các đạo cụ gối nệm mềm mại.\"},{\"step\":\"2. Tương tác & Chụp ảnh\",\"detail\":\"Dành thời gian làm quen với bé, vừa chơi đùa vừa bắt lấy những biểu cảm ngộ nghĩnh tự nhiên nhất.\"},{\"step\":\"3. Thiết kế Album\",\"detail\":\"Chỉnh sửa tone màu trong trẻo, thiết kế trang trí album lưu niệm gia đình.\"}],\"experience\":{\"years\":\"6 năm kinh nghiệm\",\"projects\":[\"Bộ ảnh kỷ niệm 100 ngày tuổi cho hơn 500 bé\",\"Dự án ảnh cộng đồng \\\"Mẹ và Con\\\" (2022)\"],\"awards\":[\"Top Photographer được yêu thích nhất tại Kids Photo Festival (2022)\"],\"clients\":[\"Hơn 1000 gia đình tại Hà Nội\",\"Thương hiệu thời trang trẻ em Rabity\"],\"media\":[\"Các bài chia sẻ về kinh nghiệm chụp ảnh em bé trên chuyên trang Mẹ & Bé.\"]},\"portfolio_categories\":[{\"name\":\"Em bé & Gia đình\",\"images\":[\"t2.jpg\",\"t1.jpg\"]}],\"before_after\":[{\"title\":\"Chỉnh tone màu da bé hồng hào trong sáng\",\"before\":\"t2.jpg\",\"after\":\"t1.jpg\"}],\"skills\":[\"Tương tác trẻ nhỏ (Child Interaction)\",\"Sắp xếp bối cảnh sơ sinh (Newborn Posing)\",\"Ánh sáng tự nhiên\"],\"software\":[\"Adobe Photoshop\",\"Adobe Lightroom Classic\"],\"equipment\":{\"cameras\":[\"Canon EOS R6 Mark II\"],\"lenses\":[\"RF 50mm f\\/1.2L\",\"RF 85mm f\\/2 Macro\"],\"lighting\":[\"Ánh sáng tự nhiên qua ô cửa kính lớn\",\"Đèn LED ấm dịu không hại mắt trẻ\"]},\"education\":[{\"degree\":\"Khóa học Tâm lý học Trẻ em & Chăm sóc trẻ sơ sinh\",\"school\":\"Trung tâm CarePlus\",\"year\":\"2019\"}],\"certifications\":[\"Chứng nhận Newborn Safety Posing của tổ chức APNPI (2021)\"],\"testimonials\":[{\"client_name\":\"Chị Mai Lan\",\"avatar\":\"t4.jpg\",\"comment\":\"Mai Anh cực kỳ kiên nhẫn và nhẹ nhàng với bé nhà mình, bộ ảnh siêu cưng luôn!\",\"rating\":5}],\"case_studies\":[{\"title\":\"Buổi chụp bé sơ sinh 14 ngày tuổi khó ngủ\",\"challenge\":\"Bé quấy khóc và rất nhạy cảm với tiếng ồn hay thay đổi tư thế.\",\"solution\":\"Sử dụng máy tạo tiếng ồn trắng, quấn kén mềm mại giữ ấm và kiên nhẫn chờ bé chìm vào giấc ngủ sâu.\",\"result\":\"Hoàn thành bộ ảnh Newborn lung linh bình yên trong giấc ngủ thiên thần mà không làm bé thức giấc.\"}]}'),
('39', 'Vũ Thu Hà', 'havt', '0932345678', 'havt@gmail.com', '$2y$12$BEZuVdpihbBhkbkfzqFXNO7GHQvxiMkWgeUTS.Yv5xWjZP/5mw2Z.', 'Hai Bà Trưng, Hà Nội', 't4.jpg', NULL, NULL, '{\"stage_name\":\"Hà Vũ Fashion Photo\",\"birthday\":\"31 Tháng Năm 1998\",\"website\":\"https:\\/\\/havufashion.com\",\"socials\":{\"facebook\":\"https:\\/\\/facebook.com\\/havu.fashion\",\"instagram\":\"https:\\/\\/instagram.com\\/havu.fashion\",\"behance\":\"https:\\/\\/behance.net\\/havuphoto\",\"twitter\":\"#\"},\"bio\":{\"story\":\"Tôi là Vũ Thu Hà, chuyên gia nhiếp ảnh thời trang và chân dung nghệ thuật tại Hà Nội. Với 50000 năm kinh nghiệm làm việc với các tạp chí và nhãn hiệu Local Brand lớn, tôi luôn tìm kiếm những góc máy mang đậm tính cá nhân và xu hướng thời đại.\",\"style\":\"High-fashion, Cinematic, tối giản đầy cá tính và sử dụng nghệ thuật tương phản mạnh mẽ.\",\"philosophy\":\"Thời trang là ngôn ngữ của bản thân, và nhiếp ảnh là phương tiện truyền tải ngôn ngữ đó một cách lộng lẫy nhất.\",\"difference\":\"Kỹ năng chỉ dẫn posing độc đáo giúp người mẫu tôn lên tối đa phom dáng trang phục.\"},\"services\":[{\"title\":\"Chụp ảnh Thời trang & Lookbook\",\"description\":\"Thiết kế concept hình ảnh đồng bộ phục vụ ra mắt bộ sưu tập thời trang mới.\",\"packages\":[{\"name\":\"Gói Lookbook Studio\",\"price\":\"4.000.000đ\",\"features\":\"3 tiếng chụp tại studio chuyên nghiệp - Bàn giao 30 ảnh retouch - Trả toàn bộ ảnh gốc\"},{\"name\":\"Gói Fashion Editorial\",\"price\":\"7.000.000đ\",\"features\":\"Chụp ngoại cảnh\\/concept sáng tạo độc quyền - Lên ý tưởng layout trang điểm & làm tóc - Bàn giao 15 tác phẩm nghệ thuật\"}]}],\"workflow\":[{\"step\":\"1. Thảo luận Bộ sưu tập\",\"detail\":\"Phân tích chất liệu, phom dáng và câu chuyện thông điệp của BST thời trang cần thể hiện.\"},{\"step\":\"2. Casting mẫu & Lên concept\",\"detail\":\"Lựa chọn gương mặt phù hợp, chuẩn bị bối cảnh và định hướng phong cách makeup.\"},{\"step\":\"3. Chụp & Hậu kỳ High-end\",\"detail\":\"Thực hiện buổi chụp chất lượng cao, retouch da tóc kỹ lưỡng giữ nguyên chi tiết tự nhiên.\"}],\"experience\":{\"years\":\"5 năm kinh nghiệm\",\"projects\":[\"Bộ ảnh Editorial \\\"Gió Mùa Về\\\" trên tạp chí Đẹp (2023)\",\"Lookbook Winter Collection cho LSeoul (2023)\"],\"awards\":[\"Giải nhì hạng mục Thời trang tại Vietnam Photo Awards (2022)\"],\"clients\":[\"LSeoul Brand\",\"Tạp chí Đẹp\",\"L’Officiel Việt Nam\"],\"media\":[\"Bộ ảnh cá nhân xuất hiện trên trang bìa tạp chí thời trang trẻ.\"]},\"portfolio_categories\":[{\"name\":\"Fashion & Portrait\",\"images\":[\"t4.jpg\",\"t2.jpg\"]}],\"before_after\":[{\"title\":\"Hậu kỳ da High-End Retouching\",\"before\":\"t4.jpg\",\"after\":\"t2.jpg\"}],\"skills\":[\"Chỉ dẫn tạo dáng (Fashion Posing)\",\"Thiết kế ánh sáng Concept\",\"High-end Skin Retouching\"],\"software\":[\"Adobe Photoshop\",\"Capture One Pro\",\"Adobe Lightroom\"],\"equipment\":{\"cameras\":[\"Sony A7R V\",\"Hasselblad X2D\"],\"lenses\":[\"Sony FE 85mm f\\/1.4 GM\",\"Sony FE 24-70mm f\\/2.8 GM II\"],\"lighting\":[\"Profoto D2 1000 AirTTL\",\"Hệ thống gương phản sáng đa chiều\"]},\"education\":[{\"degree\":\"Cử nhân Thiết kế Mỹ thuật ứng dụng\",\"school\":\"Đại học Mỹ thuật Công nghiệp\",\"year\":\"2021\"}],\"certifications\":[\"Chứng chỉ Phối ánh sáng Studio cao cấp của Học viện Leica (2022)\"],\"testimonials\":[{\"client_name\":\"Model Thu Trang\",\"avatar\":\"t3.jpg\",\"comment\":\"Chị Hà hướng dẫn posing đỉnh thật sự, ảnh nào ra cũng chất phát ngất!\",\"rating\":5}],\"case_studies\":[{\"title\":\"Lookbook Đông LSeoul trên mái nhà cổ kính\",\"challenge\":\"Địa điểm chụp chật hẹp, gió to và ánh sáng tự nhiên thay đổi nhanh chóng.\",\"solution\":\"Sử dụng đèn strobe pin di động gọn nhẹ gắn softbox nhỏ cầm tay điều hướng sáng linh hoạt.\",\"result\":\"Album ảnh mang đậm phong cách vintage bụi bặm cá tính, nhận được hơn 10k tương tác trên Fanpage thương hiệu.\"}]}'),
('40', 'Đỗ Quốc Bảo', 'baodq', '0942345678', 'baodq@gmail.com', '$2y$12$hKvVQxhP5i4O6tjzurwkxuxqE7XWITQQDMP9uPE.ZneEehmT/Yw9W', 'Ba Đình, Hà Nội', 't1.jpg', NULL, NULL, '{\"stage_name\":\"Bảo Đỗ Wedding\",\"birthday\":\"12 Tháng Chạp 1991\",\"website\":\"https:\\/\\/baodowedding.com\",\"socials\":{\"facebook\":\"https:\\/\\/facebook.com\\/baodo.wedding\",\"instagram\":\"https:\\/\\/instagram.com\\/baodo.wedding\",\"behance\":\"#\",\"twitter\":\"#\"},\"bio\":{\"story\":\"Tôi là Quốc Bảo, người chắp cánh cho những câu chuyện tình yêu bằng hình ảnh. Suốt 12 năm làm nghề chụp cưới, tôi luôn tin rằng nụ cười hạnh phúc rạng rỡ của cô dâu chú rể chính là tuyệt tác nghệ thuật đẹp nhất.\",\"style\":\"Lãng mạn, cảm xúc, tông màu pastel dịu ngọt mang hơi hướng Hàn Quốc hoặc sang trọng kiểu Châu Âu.\",\"philosophy\":\"Nhiếp ảnh cưới không chỉ ghi lại ngày cưới, mà là lưu giữ những cảm xúc ấm áp thiêng liêng nhất đời người.\",\"difference\":\"Khả năng kết nối, tạo không khí vui vẻ giúp các cặp đôi chụp ảnh tự nhiên như đang hẹn hò.\"},\"services\":[{\"title\":\"Chụp ảnh Cưới trọn gói\",\"description\":\"Trọn gói hình ảnh ngày cưới, album album pre-wedding ngoại cảnh hoặc studio.\",\"packages\":[{\"name\":\"Gói Pre-Wedding Ngoại cảnh\",\"price\":\"6.000.000đ\",\"features\":\"1 ngày chụp ngoại cảnh - Trang phục cưới & makeup đi kèm - Tặng album photobook 30 trang và ảnh cổng\"},{\"name\":\"Gói Ngày Cưới Trọn gói\",\"price\":\"10.000.000đ\",\"features\":\"Chụp lễ ăn hỏi & ngày cưới chính - 2 thợ máy chụp phóng sự liên tục - Bàn giao 300 ảnh chỉnh sửa hoàn thiện\"}]}],\"workflow\":[{\"step\":\"1. Gặp gỡ thảo luận lộ trình\",\"detail\":\"Lựa chọn địa điểm chụp ngoại cảnh phù hợp cá tính cặp đôi, thiết lập khung thời gian chụp tối ưu.\"},{\"step\":\"2. Thực hiện album cưới\",\"detail\":\"Cùng di chuyển dã ngoại, tạo không gian thoải mái giúp cặp đôi ghi lại cảm xúc lãng mạn.\"},{\"step\":\"3. Thiết kế photobook\",\"detail\":\"Chỉnh sửa toàn bộ ảnh theo tone màu đã thống nhất, in ấn album chất lượng cao lưu giữ trọn đời.\"}],\"experience\":{\"years\":\"12 năm kinh nghiệm\",\"projects\":[\"Hơn 2000 bộ ảnh cưới trong và ngoài nước\",\"Chụp phóng sự cưới cho các hot tiktoker nổi tiếng (2023)\"],\"awards\":[\"Top 3 Wedding Photographer tại Triển lãm Cưới Quốc gia (2020)\"],\"clients\":[\"Hàng nghìn cặp đôi trẻ\",\"Trống Đồng Palace\"],\"media\":[\"Các tác phẩm đăng tải trên trang tin Marry.vn, Kenh14.\"]},\"portfolio_categories\":[{\"name\":\"Cưới & Đôi (Wedding)\",\"images\":[\"t3.jpg\",\"t4.jpg\"]}],\"before_after\":[{\"title\":\"Chỉnh tone màu trời lãng mạn\",\"before\":\"t3.jpg\",\"after\":\"t4.jpg\"}],\"skills\":[\"Chụp ảnh phóng sự cưới (Wedding Photojournalism)\",\"Posing Couple\",\"Xử lý ánh sáng ngoài trời\"],\"software\":[\"Adobe Lightroom Classic\",\"Adobe Photoshop\"],\"equipment\":{\"cameras\":[\"Canon EOS R5\",\"Canon EOS R3\"],\"lenses\":[\"RF 28-70mm f\\/2L\",\"RF 85mm f\\/1.2L USM\",\"RF 70-200mm f\\/2.8L\"],\"lighting\":[\"Profoto B10X Plus\",\"Đèn LED cầm tay phục vụ chụp đêm\"]},\"education\":[{\"degree\":\"Khóa Nghệ thuật Nhiếp ảnh & Quay phim chuyên nghiệp\",\"school\":\"Đại học Sân khấu Điện ảnh\",\"year\":\"2012\"}],\"certifications\":[\"Thành viên Hiệp hội Nhiếp ảnh gia Cưới Quốc tế Fearless Photographers\"],\"testimonials\":[{\"client_name\":\"Chú rể Đức Huy & Cô dâu Thu Thảo\",\"avatar\":\"t1.jpg\",\"comment\":\"Vợ chồng em vô cùng ưng ý album ảnh cưới. Anh Bảo rất nhiệt tình, chụp không hề mệt mỏi chút nào!\",\"rating\":5}],\"case_studies\":[{\"title\":\"Bộ ảnh cưới dưới mưa tại Sapa\",\"challenge\":\"Thời tiết Sapa mưa lạnh đột ngột, tầm nhìn hạn chế do sương mù dày đặc.\",\"solution\":\"Tận dụng những chiếc ô trong suốt làm đạo cụ nghệ thuật và đánh đèn flash ngược từ phía sau tạo hiệu ứng mưa phát sáng lung linh.\",\"result\":\"Bộ ảnh cưới dưới mưa độc lạ đầy chất thơ làm cô dâu chú rể vô cùng xúc động và thích thú.\"}]}'),
('41', 'Phan Thanh Vy', 'vypt', '0962345678', 'vypt@gmail.com', '$2y$12$i.o0J5Z2TT5PEH2.3nFoBOJgKc0Vwb118HQTelSmTkspinyXvlg1q', 'Tây Hồ, Hà Nội', 't2.jpg', NULL, NULL, '{\"stage_name\":\"Thanh Vy Fine Art\",\"birthday\":\"05 Tháng Chín 1996\",\"website\":\"https:\\/\\/thanhvyfineart.com\",\"socials\":{\"facebook\":\"https:\\/\\/facebook.com\\/thanhvy.fineart\",\"instagram\":\"https:\\/\\/instagram.com\\/thanhvy.concept\",\"behance\":\"https:\\/\\/behance.net\\/thanhvy\",\"twitter\":\"#\"},\"bio\":{\"story\":\"Tôi là Phan Thanh Vy, một nhiếp ảnh gia nghệ thuật (Fine Art & Concept Photography). Tôi luôn khao khát biến mỗi bức ảnh thành một bức tranh vẽ sống động, mang những ẩn ý sâu sắc về cảm xúc con người và thiên nhiên.\",\"style\":\"U tối, ma mị, hoặc bay bổng lãng mạn như tranh vẽ cổ điển thời kỳ Phục Hưng.\",\"philosophy\":\"Nhiếp ảnh là hội họa vẽ bằng ánh sáng. Một bức ảnh nghệ thuật thực sự phải có chiều sâu nội tâm lay động tâm trí người xem.\",\"difference\":\"Kỹ năng thiết kế bối cảnh siêu thực độc đáo cùng tông màu hậu kỳ giả lập tranh sơn dầu xuất sắc.\"},\"services\":[{\"title\":\"Chụp ảnh Nghệ thuật & Concept\",\"description\":\"Thiết kế concept độc bản, trang điểm và đạo cụ riêng biệt phù hợp từng ý tưởng nghệ thuật.\",\"packages\":[{\"name\":\"Gói Fine Art Basic\",\"price\":\"3.500.000đ\",\"features\":\"Setup bối cảnh nghệ thuật đơn giản - Bàn giao 10 ảnh chỉnh sửa cực sâu kiểu tranh vẽ - Tặng 1 ảnh in canvas cao cấp\"},{\"name\":\"Gói Surrealism Concept\",\"price\":\"6.500.000đ\",\"features\":\"Dàn dựng bối cảnh siêu thực độc quyền - Trang phục thiết kế riêng - Retouch photoshop chuyên sâu vẽ thêm chi tiết kỹ thuật số\"}]}],\"workflow\":[{\"step\":\"1. Lên Phác thảo & Kịch bản\",\"detail\":\"Vẽ phác thảo ý tưởng bố cục bối cảnh, thảo luận sâu về thông điệp câu chuyện nghệ thuật.\"},{\"step\":\"2. Dàn dựng bối cảnh nghệ thuật\",\"detail\":\"Dựng phông nền, hoa cỏ nghệ thuật, sắp đặt ánh sáng tạo độ tương phản tối ấm kiểu hội họa.\"},{\"step\":\"3. Hậu kỳ màu sơn dầu\",\"detail\":\"Ứng dụng kỹ thuật vẽ màu kỹ thuật số (Digital Painting) biến ảnh thành tranh vẽ ấn tượng.\"}],\"experience\":{\"years\":\"7 năm kinh nghiệm\",\"projects\":[\"Triển lãm tranh ảnh cá nhân \\\"Vọng Cổ Gió\\\" (2022)\",\"Dự án sách ảnh Nghệ thuật \\\"Nàng Thơ Việt\\\" (2023)\"],\"awards\":[\"Huy chương Vàng cuộc thi ảnh nghệ thuật Fine Art Quốc tế tại Pháp (2023)\"],\"clients\":[\"Các nhà sưu tầm nghệ thuật tư nhân\",\"Tạp chí Mỹ Thuật Việt Nam\"],\"media\":[\"Được phỏng vấn trên các chuyên mục văn hóa nghệ thuật đài truyền hình.\"]},\"portfolio_categories\":[{\"name\":\"Fine Art (Nghệ thuật)\",\"images\":[\"t2.jpg\",\"t4.jpg\"]}],\"before_after\":[{\"title\":\"Biến ảnh chụp thành tranh sơn dầu cổ điển\",\"before\":\"t2.jpg\",\"after\":\"t4.jpg\"}],\"skills\":[\"Chụp ảnh nghệ thuật (Fine Art)\",\"Chỉnh màu tranh vẽ (Fine Art Grading)\",\"Thiết kế bối cảnh siêu thực\"],\"software\":[\"Adobe Photoshop\",\"Corel Painter\",\"Wacom Tablet Editing\"],\"equipment\":{\"cameras\":[\"Sony A7R V\",\"Fujifilm GFX 100S\"],\"lenses\":[\"FE 50mm f\\/1.2 GM\",\"GF 80mm f\\/1.7 R WR\"],\"lighting\":[\"Ánh sáng liên tục dịu nhẹ kết hợp tản sáng lớn\",\"Godox AD1200 Pro\"]},\"education\":[{\"degree\":\"Cử nhân Hội họa\",\"school\":\"Đại học Mỹ thuật Việt Nam\",\"year\":\"2018\"}],\"certifications\":[\"Chứng nhận Giảng viên Danh dự của Hội Nghệ sĩ Nhiếp ảnh Việt Nam\"],\"testimonials\":[{\"client_name\":\"Nhà sưu tập Hoài Nam\",\"avatar\":\"t2.jpg\",\"comment\":\"Mỗi bức ảnh của Vy đều có chiều sâu và hồn tranh vẽ vô cùng kỳ diệu.\",\"rating\":5}],\"case_studies\":[{\"title\":\"Bộ ảnh nghệ thuật \\\"Giấc Mơ Trong Rừng\\\"\",\"challenge\":\"Dàn dựng bối cảnh lãng mạn bay bổng giữa rừng cây rậm rạp mà không làm hư hại môi trường tự nhiên.\",\"solution\":\"Sử dụng máy khói sinh học thân thiện môi trường kết hợp với ánh sáng tự nhiên đi xuyên qua tán lá tạo các tia sáng xiên đẹp mắt.\",\"result\":\"Bộ ảnh xuất sắc nhận huy chương vàng quốc tế tại Pháp và được mua bản quyền in ấn.\"}]}');

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `images` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `images`) VALUES
('3', 'Chụp ảnh kỷ yếu', '68da436b5db94chup-anh-ky-yeu-dep-2.jpg'),
('4', 'Chụp ảnh bé', '68da43ca17945images (3).jpg'),
('5', 'Chụp ảnh sản phẩm', '68da43ea2ee12chup-anh-san-pham-1.jpg'),
('6', 'Chụp ảnh sự kiện', '68da441a6ba798-501.jpg'),
('7', 'Chụp ảnh nghệ thuật', '68da43494a349gioi-thieu-dich-vu-chup-anh-ca-nhan-scaled.jpg'),
('8', 'Chụp ảnh cưới – prewedding', '68da431c0f4faimages (2).jpg');

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` int NOT NULL,
  `images` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `time_code` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account`, `password`, `name`, `address`, `phone`, `email`, `role`, `images`, `code`, `time_code`) VALUES
('2', 'admin', '$2y$10$ED4546BJ42e0kiAn64dvfuCoFOaJkhh2Thd7UtIM523V7ZbkNID2e', 'Chu Thị Hoa', 'Mỹ Đình 2, Nam Từ Liêm, Hà Nội', '0385629850', 'chuthihoa98bgg@gmail.com', '1', '5f37b43cbfb01team-12-420x424.jpg', '', '0'),
('13', '', '', 'mai', '', '09877655444', '', '3', 'user.svg', NULL, NULL),
('21', 'letan', '$2y$10$Wd0TyjDYalqhMrMMbkW8tO7iea7Qkm/5jshV7J8/hNqsdh1EGfYEq', 'letan', 'xxxxxxxxxxxxxx x', '098765434', 'xxwxxcx@gmail.com', '3', 'user.svg', NULL, NULL),
('24', 'user1', '$2y$10$ED4546BJ42e0kiAn64dvfuCoFOaJkhh2Thd7UtIM523V7ZbkNID2e', 'user1', 'hcm vn sđsz szdfz dffd', '0987654325', 'User1@gmail.com', '3', '68da39262de10Screenshot 2025-09-26 145237.png', NULL, NULL),
('25', 'test123', '$2y$10$R0WTbr3Uh1eHlh5f7IGCjuxLdlxGGpQKeUxzNFxU120WzecXSkc92', 'test', 'hcm adsfdsfsagdfshg', '0987654321', 'test123@gmail.com', '3', 'user.svg', NULL, NULL),
('26', 'demo123', '$2y$10$TIeDnNesUYU3ODLO1ns.AejIU..3WfepxUtBvaH.jyzq.x/ObIvv2', 'demo123', 'khu pho 3 an phu quan 2', 'demo123', 'd@gmail.comemo123', '3', '68db9ae7a6efaScreenshot 2025-09-26 145237.png', NULL, NULL),
('27', 'mothaiba', '$2y$10$0u3CYbODxbCLmxi6xkXWle56Z9ugOA9cwFEBL.3xnZ./8Jsuiw2SO', 'mothaiba', 'mothaiba mothaiba mothaiba', 'mothaiba', 'mothaiba@gmail.com', '3', '68db9decd8d34Screenshot 2025-09-26 145237.png', NULL, NULL),
('29', 'testtknew', '$2y$10$AT/EptKd/138l9e0NMY.N.M1EiuxQNJIM6XTmkMtX72k1z9QWTLWa', 'testtknew', 'khu pho 3 an phu quan 2\r\nkhu phố', 'user123', 'testtknew@gmail.com', '3', '68db9fd1db695Screenshot 2025-09-26 145237.png', NULL, NULL),
('30', 'hoangthao', '$2y$12$.xK17BsfYlHLwjehKH4Xd.fq2Wc.VWtI1muBps.Qg.L9P1wfm9pOC', 'Cặp đôi Hoàng - Thảo', 'Hà Nội', '0981111111', 'hoangthao@gmail.com', '3', 't1.jpg', NULL, NULL),
('31', 'duyhung', '$2y$12$QhWjPgAAc9YBGmWvnSNJcOXy47hjyz3KMrhBUcex.8sZJoVC6C1AK', 'Diễn Viên Duy Hưng - Huyền Nguyễn', 'Hà Nội', '0981111112', 'duyhung@gmail.com', '3', 'yXnqwCaj.jpg', NULL, NULL),
('32', 'binhan', '$2y$12$fQNfsoqpWTm2sYLrlyx84uNFjoD5AquCjS9Nf8/i17ZXHc.iK6NZC', 'Diễn Viên Bình Anh - Á Hậu phương Nga', 'Hà Nội', '0981111113', 'binhan@gmail.com', '3', 't2.jpg', NULL, NULL),
('33', 'thuyvi', '$2y$12$TW2p3yX6z.QSPBVJ6bHxOelVeJCQkq/6hqyaIj7MevRV3aSv1OlZ.', 'Top 10 Hoa Hậu Thùy Vi - Nhâm Phương Nam', 'Hà Nội', '0981111114', 'thuyvi@gmail.com', '3', 't3.jpg', NULL, NULL),
('34', 'meous', '$2y$12$/JI4APt39sXECRRkAeIYbeV2uJ6hryk31WEyJSUJDJm0iqd12yXe.', 'Tiktoker Mèo US - Lê Trung Hoàng', 'Hà Nội', '0981111115', 'meous@gmail.com', '3', 't4.jpg', NULL, NULL),
('35', 'conganhly', '$2y$12$dW6Oz033Bg/Xq.58D8tN1uxCg4.Ypl.HRqpSiwtYSJWkFUyzBQyTG', 'Cặp đôi Công Anh Lý', 'Hà Nội', '0981111116', 'conganhly@gmail.com', '3', 'ko1.jpg', NULL, NULL),
('36', 'hoihue', '$2y$12$Xx/D4VgJvDFXxVi5dd9gv.RI1zNxqLeYLgl01kCdI.jaR43v/ahp6', 'Cặp đôi Hội - Huê', 'Hà Nội', '0981111117', 'hoihue@gmail.com', '3', 'ko3.jpg', NULL, NULL),
('37', 'chutieuhan', '$2y$12$DCCr5MocmFTh7PKuoIomWOvnVXb128IoU6GFHgmgtRAJzBVw63IJy', 'Cặp đôi Chu Tiếu Han', 'Hà Nội', '0981111118', 'chutieuhan@gmail.com', '3', 't7.png', NULL, NULL),
('38', 'congthuong', '$2y$12$fQBdDxM4g0wcvsKP3jxZye6D3DqWVQSVWRb3rGQnIppPTBN7aeD8S', 'Cặp đôi Công - Thương', 'Hà Nội', '0981111119', 'congthuong@gmail.com', '3', 't9.png', NULL, NULL);

--
-- Table structure for table `word_time`
--

DROP TABLE IF EXISTS `word_time`;
CREATE TABLE `word_time` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `word_time`
--

INSERT INTO `word_time` (`id`, `time`) VALUES
('1', '08:30:00'),
('2', '09:00:00'),
('3', '09:30:00'),
('4', '10:00:00'),
('5', '10:30:00'),
('6', '11:00:00'),
('7', '11:30:00'),
('8', '12:00:00'),
('9', '12:30:00'),
('10', '13:00:00'),
('11', '13:30:00'),
('13', '14:30:00'),
('14', '15:00:00'),
('15', '15:30:00'),
('16', '16:00:00'),
('17', '16:30:00'),
('18', '17:00:00'),
('19', '17:30:00'),
('20', '18:00:00'),
('21', '18:30:00');

SET FOREIGN_KEY_CHECKS=1;
