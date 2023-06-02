-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2022 at 05:10 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdatabase`
--

-- --------------------------------------------------------
--
-- Table structure for table `infor_user`
--

DROP TABLE IF EXISTS `infor_user`;
CREATE TABLE IF NOT EXISTS `infor_user` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infor_user`
--

INSERT INTO `infor_user` (`info_id`, `info_name`, `info_birthday`, `info_phone`, `info_email`, `info_address`, `info_image`) VALUES
(1, 'Lê Văn A', '01/02/2003', '0905238711', 'levana@gmail.com', '20/11 Đường Số 7, Quận 1, Thành Phố HCM', 'user.png'),
(2, 'Nguyễn Văn B', '12/12/2003', '0905101029', 'nguyenvanb@gmail.com', 'Khu phố 4, Quận 5,TP.HCM', 'user.png'),
(3, 'Lê Minh Trí', '09/05/2003', '0333844433', '21211tt4490@mail.tdc.edu.vn', '30/1 Đường Số 11, An Phú, Quận 2, TP.HCM', '309366942_1499656947181759_7743971265375923748_n.jpg'),
(5, 'Vũ Hoàng Tuấn', '10/12/2003', '0969232516', 'hoangtuan79@gmail.com', 'Thành Phố HCM', '321238749_700633735055634_1766942754743651795_n.png'),
(8, NULL, NULL, NULL, NULL, NULL, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

DROP TABLE IF EXISTS `order_list`;
CREATE TABLE IF NOT EXISTS `order_list` (
  `id_bill` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `custommer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custommer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custommer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_prd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_bill`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id_bill`, `id_customer`, `custommer_name`, `custommer_phone`, `custommer_address`, `product`, `quality_prd`, `totalprice`) VALUES
(31, 5, 'Vũ Hoàng Tuấn', '0969232516', 'Thành Phố HCM', '1,2', '1,1', '27042500'),
(29, 1, 'Lê Văn A', '0905238711', '20/11 Đường Số 7, Quận 1, Thành Phố HCM', '27,36,13,29', '3,2,1,2', '21082000'),
(30, 2, 'Nguyễn Văn B', '0905101029', 'Khu phố 4, Quận 5,TP.HCM', '13,1', '1,1', '37213000'),
(28, 1, 'Lê Văn A', '0905238711', '20/11 Đường Số 7, Quận 1, Thành Phố HCM', '22,1', '3,1', '21171000'),
(27, 1, 'Lê Văn A', '0905238711', '20/11 Đường Số 7, Quận 1, Thành Phố HCM', '3,5', '2,1', '90481160'),
(32, 5, 'Vũ Hoàng Tuấn', '0969232516', 'Thành Phố HCM', '39', '1', '7950000');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

DROP TABLE IF EXISTS `price_list`;
CREATE TABLE IF NOT EXISTS `price_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`list_id`, `list_name`, `price_url`) VALUES
(1, 'Dưới 3 Triệu', '0,3000000'),
(2, 'Từ 5-10 Triệu', '5000000,10000000'),
(3, 'Từ 10-15 Triệu', '10000000,15000000'),
(4, 'Trên 20 Triệu', '20000000,100000000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `thefirm` int(11) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `status`, `accessory`, `insurance`, `image`, `type`, `thefirm`, `view`, `discount`) VALUES
(1, 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam ', 22690000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã SA/A (được Apple Việt Nam phân phối chính thức).', 'Máy, Sách HDSD, Cáp sạc USB-C (2 m), Cốc sạc USB-C 30W ', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'macbook-air-space-gray-select-201810.jpg', 3, 1, 114, 10),
(2, 'iPad 10.2 2021 WiFi 64GB | Chính hãng Apple Việt Nam', 7790000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã ZA/A (được Apple Việt Nam phân phối chính thức).', 'iPad, Cáp USB-C sang Lightning, Sạc USB-C 20W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'x_mmas.jpg', 2, 1, 144, 5),
(3, ' iPhone 14 Pro 256GB | Chính hãng VN/A ', 31199000, 'Máy mới 100% , chính hãng Apple Việt Nam', 'Đầy đủ phụ kiện từ nhà sản xuất', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 't_m_13.jpg', 1, 1, 215, 5),
(4, ' Apple iPad Pro 11 2021 M1 WiFi 128GB | Chính hãng Apple Việt Nam  ', 20990000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã ZA/A (được Apple Việt Nam phân phối chính thức).', 'Máy, Sách hướng dẫn, Cáp Type C - Type C, Củ sạc nhanh rời đầu Type C', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'ipad-pro-2021-11inch-grey_2.jpg', 2, 1, 106, 0),
(5, ' Samsung Galaxy Z Fold4 ', 36750000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'samsung_galaxy_z_fold_4-7.jpg', 1, 2, 183, 10),
(6, 'Laptop ASUS Gaming ROG Zephyrus G14 GA401QC-K2199W', 27990000, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất', 'Cáp, sạc, sách HDSD', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. ', '11h53.jpg', 3, 3, 78, 0),
(7, ' ASUS ROG Phone 3 Chính hãng ', 16990000, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Điện thoại ASUS ROG Phone 3, Quạt tản nhiệt Aero Active Cooler 3, Ốp lưng Aero Case, Cáp chuyển đổi USB-C to 3.5mm, Bộ sạc 30W, Que lấy SIM, Sách hướng dẫn.', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. ', 'rog_3.jpg', 1, 3, 71, 10),
(8, ' Samsung Galaxy Tab S8 Ultra 5G ', 28990000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Galaxy Tab S8 Ultra, S Pen, Cáp sạc, Chốt đẩy SIM', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'tab_s8_ultra.jpg', 2, 2, 1, 0),
(9, ' iPhone 11 64GB I Chính hãng VN/A  ', 10990000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Thân máy, cáp USB-C to Lightning, sách HDSD', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '3_225.jpg', 1, 1, 118, 3),
(10, 'iPad Air 5 (2022) 256GB I Chính hãng Apple Việt Nam ', 17990000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã ZA/A (được Apple Việt Nam phân phối chính thức).', 'iPad Air 5, Cáp USB-C - USB-C, Cốc sạc 20W USB-C', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '1_253_7.jpg', 2, 1, 2, 0),
(11, ' Samsung Galaxy A73 (5G) 256GB ', 10590000, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Máy, Sách hướng dẫn, Cây lấy sim, Cáp Type C', 'Bảo hành chính hãng 12 tháng, 1 ĐỔI 1 trong 30 ngày đầu. ', 'samsung-galaxy-a73-1-600x600.jpg', 1, 2, 12, 0),
(12, ' Laptop Asus Vivobook OLED 15X A1503ZA-L1151W  ', 15990000, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất', 'Bảo hành pin 12 tháng', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. ', 'dcd_1.jpg', 3, 3, 0, 10),
(13, ' iPhone 14 128GB  | Chính hãng VN/A ', 20990000, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Đầy đủ phụ kiện từ nhà sản xuất', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'photo_2022-09-28_21-58-51.jpg', 1, 1, 60, 5),
(14, ' Apple MacBook Pro 13 Touch Bar M1 256GB 2020 I Chính hãng Apple Việt Nam ', 27590000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã SA/A (được Apple Việt Nam phân phối chính thức).', 'Thân máy, cáp sạc, sách HDSH', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'pro_8gb.jpg', 3, 1, 130, 5),
(15, ' Samsung Galaxy Tab A8 (2022) ', 8150000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Máy, Sách hướng dẫn, Cây lấy sim, Cáp Type C - Type A, Củ sạc rời đầu Type A ', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'samsung-galaxy-tab-s8-002.jpg', 2, 2, 1, 7),
(16, ' ASUS ROG Phone 6 16GB 512GB ', 23490000, 'Mới, nguyên hộp', ' Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'asus-rog-phone-6-12gb-256gb_2.jpg', 1, 3, 0, 0),
(17, ' Samsung Galaxy S20 FE 256GB (Fan Edition) ', 10990000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Sạc, Cây lấy sim, Cáp Type C, Sách hướng dẫn', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'samsung-galaxy-20-fe_4_.jpg', 1, 2, 24, 0),
(18, 'iPhone 12 Pro Max 128GB I Chính hãng VN/A ', 25590000, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Thân máy, cáp USB-C to Lightning, sách HDSD', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '1_251_1.jpg', 1, 1, 121, 9),
(19, ' Apple iPhone X 256GB Chính hãng ', 10499000, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'Máy, sạc, cáp, tai nghe, que lấy SIM, sách hướng dẫn', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'iphone_x_256gb.jpg', 1, 1, 0, 0),
(20, ' Samsung Galaxy Tab S8 WIFI ', 16990000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. ', 'tab_s8_2.jpg', 2, 2, 0, 0),
(21, ' Samsung Galaxy Tab A7 Lite ', 4300000, 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Máy, Sách hướng dẫn, Cây lấy sim, Cáp Type C - Type A, Củ sạc rời đầu Type A ', 'Bảo hành chính hãng 12 tháng, 1 ĐỔI 1 trong 30 ngày đầu. ', 'samsung-galaxy-tab-a7-lite-gray-600x600.jpg', 2, 2, 0, 10),
(22, ' Tai nghe nhét tai Samsung IA500 ', 250000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng 1 đổi 1', '9h46_1.jpg', 5, 2, 0, 0),
(23, ' Bao da Samsung Galaxy Tab A7 Lite chính hãng ', 390000, 'Mới', 'Đầy đủ phụ kiện', 'Không bảo hành', '_0006_vn-galaxy-tab-a7-lite-bookcover_1.jpg', 5, 2, 0, 5),
(24, ' Kính cường lực Zeelot cho Samsung Galaxy Tab A7 Lite ', 390000, 'Mới', 'Phụ kiện đầy đủ', 'Bảo hành 30 ngày/lần 1 đổi 1 tất cả các lỗi, dán mới lần 2 được giảm 30%, dán PPF /Dán UV Loca chỉ được thực hiện ở cửa hàng, không áp dụng bảo hành cho đơn hàng giao tại nhà.', 'kinh-cuong-luc-samsung-galaxy-tab-a7-lite-zeelot-1.jpg', 5, 2, 12, 0),
(25, ' Miếng dán cường lực cho iPhone 12 / 12 Pro MiPow Kingbull HD Premium ', 331500, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 30 ngày/lần 1 đổi 1 tất cả các lỗi, dán mới lần 2 được giảm 30%, không áp dụng bảo hành cho đơn hàng giao tại nhà', 'dan-cuong-luc-full-iphone-12-mipow-kingbull-premiu4384_1_2.jpg', 5, 1, 0, 0),
(26, ' Sạc nhanh 20W Apple MHJE3ZA | Chính hãng Apple Việt Nam ', 490000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 30 ngày/lần 1 đổi 1 tất cả các lỗi, dán mới lần 2 được giảm 30%, không áp dụng bảo hành cho đơn hàng giao tại nhà', 'group_117_1.jpg', 5, 1, 0, 0),
(27, ' Miếng dán Camera iPhone 12 Pro Max Zeelot viền màu ', 350000, 'Mới', 'Đầy đủ phụ kiện', 'Bảo hành 30 ngày/lần 1 đổi 1 tất cả các lỗi', '6.1_3_hole_lens_space_grey_1800x1800_2.jpg', 5, 1, 0, 0),
(28, ' Ốp lưng Chống Sốc UAG Plasma Cho iPhone 11 ', 855000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng chính hãng, 1 đổi 1', 'apple_iphone_2019_61_plasma_ice-00_std_main.162_900x.jpg', 5, 1, 0, 0),
(29, ' Pin sạc dự phòng Samsung EB P5300x 20000mAh 25W ', 1130000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng chính hãng, 1 đổi 1', '20000.jpg', 5, 2, 77, 7),
(30, ' Pin Sạc Dự Phòng Samsung EP-P2400TBEGWW 15W ', 1190000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', '3_176.jpg', 5, 2, 1, 10),
(31, ' Tai nghe Bluetooth Apple AirPods 2 VN/A ', 2690000, 'Hàng chính hãng Apple Việt Nam, Mới', 'Hộp sạc và tai nghe, Cáp Lightning, Sách hướng dẫn', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'group_169_2.jpg', 5, 1, 0, 0),
(32, 'Tai nghe Bluetooth Apple AirPods Pro 2022 | Chính hãng Apple Việt Nam', 6390000, 'Hàng chính hãng Apple Việt Nam, Mới', 'Hộp sạc và tai nghe, Cáp Type-C to Lightning, Sách hướng dẫn, Đệm tai', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'group_111_5_.jpg', 5, 1, 0, 0),
(33, ' Bút cảm ứng Apple Pencil 2 MU8F2 | Chính hãng Apple Việt Nam ', 3390000, 'Mới', 'Đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng tại trung tâm bảo hành ủy quyền Chính hãng. 1 đổi 1 trong 15 ngày nếu có lỗi nhà sản xuất. ', 'but-cam-ung-apple-pencil-2.jpg', 5, 1, 0, 0),
(34, ' Bàn phím Apple Magic Keyboard 2021 MK2A3 | Chính hãng Apple Việt Nam ', 2450000, 'Hàng chính hãng Apple Việt Nam, Mới', 'Magic Keyboard, Cáp USB-C to Lightning vải bện', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'ban-phim-apple-magic-keyboard-2021-1.jpg', 5, 1, 0, 0),
(35, ' Chuột Apple Magic Mouse 2021 MK2E3 | Chính hãng Apple Việt Nam ', 1690000, 'Hàng chính hãng Apple Việt Nam, Mới', 'Magic Mouse, Dây cáp USB-C to Lightning vải bện', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'group_145_2.jpg', 5, 1, 0, 10),
(36, ' Cáp Apple Type C to Lightning 1M MM0A3FE/A ', 490000, 'Hàng chính hãng Apple Việt Nam, Mới', 'Cáp sạc, Sách hướng dẫn', 'Bảo hành 12 tháng chính hãng, 1 đổi 1', 'group_118_2.jpg', 5, 1, 0, 0),
(37, 'Apple Watch SE 40mm (GPS) Viền Nhôm - Dây Cao Su | Chính Hãng VN/A', 5990000, 'Mới', 'Đầy đủ phụ kiện', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '1_280.jpg', 4, 1, 0, 8),
(38, 'Apple Watch Series 8 41mm GPS viền nhôm | Chính hãng VN/A', 9990000, 'Mới', 'Đầy đủ phụ kiện', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'gold_4_2.jpg', 4, 1, 2, 0),
(39, 'Apple Watch SE 44mm (GPS) Viền Nhôm - Dây Cao Su | Chính Hãng VN/A', 7950000, 'Mới', 'Đầy đủ phụ kiện', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'apple-watch-se-40mm_1_2_1.jpg', 4, 1, 0, 0),
(40, 'Apple Watch Ultra 49MM (4G) - Viền Titan Dây Vải Cỡ Trung | Chính Hãng', 20490000, 'Mới', 'Đầy đủ phụ kiện', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '49mm.jpg', 4, 1, 0, 0),
(41, 'Samsung Galaxy Watch4 Classic 42mm', 5200000, 'Mới', 'Đầy đủ phụ kiện', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'amsung-galaxy-watch-4-classic-42mm.jpg', 4, 2, 1, 0),
(42, ' Samsung Galaxy Watch5 40mm LTE ', 7490000, 'Mới', 'Đầy đủ phụ kiện', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'watch-5-lte_1.jpg', 4, 2, 0, 0),
(43, ' Samsung Galaxy Watch5 Pro ', 10250000, 'Mới', 'Phụ kiện đầy đủ', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'watch-5-pro.jpg', 4, 2, 0, 0),
(44, ' Samsung Galaxy Watch4 40mm LTE ', 4890000, 'Mới', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'samsung-galaxy-watch-4-40mm-lte.jpg', 4, 2, 0, 0),
(45, ' Samsung Galaxy Watch4 40mm ', 5150000, 'Mới', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'sm-r870_003_r-perspective_silver_1_2.jpg', 4, 2, 0, 0),
(46, 'iPad Mini 6', 15690000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'iPad Mini 6, Cáp sạc USB-C,Sạc nhanh 20W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '2_246_2.jpg', 2, 1, 0, 0),
(47, ' iPhone 14 Plus 128GB | Chính hãng VN/A ', 23590000, 'Máy Mới', 'Máy, cáp type C to lightning, sách hướng dẫn', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'photo_2022-09-28_21-58-51_4.jpg', 1, 1, 0, 0),
(48, ' iPhone SE 2022 | Chính hãng VN/A ', 10390000, 'Máy mới 100% , chính hãng Apple Việt Nam.', 'iPhone SE 2022, Cáp USB-C - Lightning', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', '3_306_1.jpg', 1, 1, 3, 0),
(49, 'Samsung Galaxy A73 128GB', 9890000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Máy, Sách hướng dẫn, Cây lấy sim, Cáp Type C', 'Bảo hành chính hãng 12 tháng, 1 ĐỔI 1 trong 30 ngày đầu. ', 'samsung-galaxy-a73-1-600x600_3.jpg', 1, 2, 6, 0),
(50, 'Samsung Galaxy A03 (3GB - 32GB)', 2350000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Máy, Sách hướng dẫn, Cây lấy sim, Cáp Type C', 'Bảo hành chính hãng 12 tháng, 1 ĐỔI 1 trong 30 ngày đầu. ', 'screenshot_2_39.jpg', 1, 2, 0, 0),
(51, 'ASUS ROG Phone 5S 16GB 512GB', 17790000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', ' Máy, Sách hướng dẫn sử dụng, Cáp sạc USB-C, Củ sạc nhanh 65W, Cáp sạc, Ốp lưng', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'h732_1.jpg', 1, 3, 0, 0),
(52, 'ASUS ROG Phone 5 chính hãng', 18990000, 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Củ sạc công suất 65W, Cáp sạc C-to-C, Ốp lưng nhựa, Sách HDSD', 'Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. ', 'asus-rog-phone-5_0002_gsmarena_001.jpg', 1, 3, 0, 0),
(53, 'Laptop ASUS Gaming TUF FX506LHB-HN188W', 17390000, 'Mới', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất. Bảo hành pin 12 tháng', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. ', '5h03_1.jpg', 3, 3, 0, 0),
(54, 'Laptop Asus Rog Strix G15 G513IE-HN246W', 23190000, 'Mới', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản suất. Bảo hành pin 12 tháng', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. ', 'text_d_i_3.jpg', 3, 3, 0, 0),
(55, 'Macbook Pro 14 inch 2021 | Chính hãng Apple Việt Nam', 41990000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã SA/A (được Apple Việt Nam phân phối chính thức).', 'MacBook Pro 14-inch, củ sạc 67W USB-C, cáp sạc USB-C to MagSafe 3 Cable (2 m)', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'pro_2021.jpg', 3, 1, 0, 0),
(56, ' Apple MacBook Pro 13 M2 2022 16GB 512GB I Chính hãng Apple Việt Nam ', 42990000, 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã SA/A (được Apple Việt Nam phân phối chính thức).', 'Máy, Sách HDSD, Dây cáp sạc USB-C (2 m), Cốc sạc USB-C 30W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple : Điện Thoại Vui ASP (Apple Authorized Service Provider)', 'mac_pro_16gb.jpg', 3, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_thefirm`
--

DROP TABLE IF EXISTS `product_thefirm`;
CREATE TABLE IF NOT EXISTS `product_thefirm` (
  `thefirm_id` int(11) NOT NULL AUTO_INCREMENT,
  `thefirm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thefirm_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`thefirm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_thefirm`
--

INSERT INTO `product_thefirm` (`thefirm_id`, `thefirm_name`, `thefirm_img`) VALUES
(1, 'Apple', 'iphone.png'),
(2, 'SamSung', 'samsung.png'),
(3, 'Asus', 'asus.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `name_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id_type`, `name_type`, `img_type`) VALUES
(1, 'Điện Thoại', 'smartphone.jpg'),
(2, 'Máy Tính Bảng', 'tabletbanner.png'),
(3, 'Laptop', 'laptopbanner.png'),
(4, 'Smart Watch', 'watchbanner.png'),
(5, 'Phụ Kiện', 'phukienbanner.png');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `user_like` int(11) NOT NULL DEFAULT '0',
  `product_like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_like`,`product_like`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`user_like`, `product_like`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 13),
(1, 18),
(1, 19),
(1, 25),
(1, 27),
(1, 28),
(1, 47),
(1, 48),
(1, 56),
(2, 1),
(2, 3),
(2, 7),
(2, 11),
(3, 6),
(3, 10),
(3, 14),
(3, 15),
(3, 22),
(3, 23),
(3, 24),
(3, 29),
(3, 33),
(3, 47),
(3, 48),
(3, 55),
(5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_account` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `passwords`, `type_account`) VALUES
(1, 'user1', '96e79218965eb72c92a549dd5a330112', 0),
(2, 'user2', 'e3ceb5881a0a1fdaad01296d7554868d', 0),
(3, 'leminhtri886@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1),
(5, 'user3', '1a100d2c0dab19c4430e7d73762b3423', 0),
(8, 'user4', '73882ab1fa529d7273da0db6b49cc4f3', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
