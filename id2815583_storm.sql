-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2018 at 08:44 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2815583_storm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 'Big Boss', '135/5 Giáp Văn Cương', 'storm@gmail.com', '202cb962ac59075b964b07152d234b70', '0935943415', 1, 2, NULL, '2018-01-02 17:38:44', '2018-01-02 17:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', NULL, NULL, 1, 1, '2017-07-02 15:06:19', '2017-12-19 06:26:29'),
(2, 'Mainboard', 'mainboard', NULL, NULL, 1, 1, '2017-07-02 15:06:28', '2017-12-23 03:06:15'),
(3, 'RAM', 'ram', NULL, NULL, 1, 1, '2017-07-02 16:18:20', '2017-12-23 03:06:17'),
(4, 'VGA', 'vga', NULL, NULL, 1, 1, '2017-07-02 16:18:46', '2017-12-23 13:07:04'),
(5, 'Mouse', 'mouse', NULL, NULL, 1, 1, '2017-12-18 10:12:49', '2017-12-28 15:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sl` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `sl`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 35990000, '2017-12-26 16:17:05', '2017-12-26 16:17:05'),
(2, 2, 12, 1, 5243000, '2017-12-28 15:20:06', '2017-12-28 15:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(4) DEFAULT '0',
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `category_id`, `content`, `number`, `head`, `view`, `hot`, `pay`, `created_at`, `updated_at`) VALUES
(1, 'Máy xách tay/ Laptop MSI GP62MVR 7RFX-893XVN (I7-7700HQ)', 'Máy xách tay', 35990000, 0, '38324_1513567707-1.jpg', 1, 'Hãng CPU: Intel <br>\r\nCông nghệ CPU: Core i7<br>\r\nLoại CPU: 7700HQ<br>\r\nTốc độ CPU: 2.8GHz<br>\r\nBộ nhớ đệm: 6M<br>\r\nTốc độ tối đa: 3.8GHz<br>\r\nHỗ trợ RAM tối đa: 32GB<br>\r\nDung lượng RAM:	2x8GB<br>\r\nLoại RAM: DDR4<br>\r\nLoại ổ đĩa: HDD (M.2 2280 Sata) + M.2 2280 (PCIe 3 x4)<br>\r\nChipset đồ họa:	NVIDIA GeForce GTX 1060 // Intel HD Graphics 630<br>\r\nKích thước màn hình: 15.6 INCH<br>\r\nKênh âm thanh: 2.0<br>\r\nLoại đĩa quang: Không<br>\r\nCổng giao tiếp: USB 2.0, 2x USB 3.0, USB-C, Mini DP, HDMI', 100, 0, 0, 0, 0, '2017-12-22 06:59:00', '2017-12-23 13:50:26'),
(2, 'Máy xách tay/ Laptop MSI GV62 7RE-2443XVN (I7-7700HQ)', 'Máy xách tay', 25490000, 0, '38322_1513565690-1.jpg', 1, 'Hãng CPU: Intel <br>\r\nCông nghệ CPU: Core i7 <br>\r\nLoại CPU: 7700HQ<br>\r\nTốc độ CPU: 2.8GHz<br>\r\nBộ nhớ đệm: 6M<br>\r\nTốc độ tối đa: 3.8GHz<br>\r\nHỗ trợ RAM tối đa: 32GB<br>\r\nDung lượng RAM:	1x8GB<br>\r\nLoại RAM: DDR4<br>\r\nLoại ổ đĩa: HDD<br>\r\nChipset đồ họa:	NVIDIA GeForce GTX 1050 Ti // Intel HD Graphics 630<br>\r\nKích thước màn hình: 15.6 INCH<br>\r\nKênh âm thanh: 2.0<br>\r\nLoại đĩa quang:	Không<br>\r\nCổng giao tiếp:	USB 2.0, 2x USB 3.0, USB-C, Mini DP, HDMI', 100, 0, 0, 0, 0, '2017-12-22 07:11:10', '2017-12-22 07:35:53'),
(3, 'Máy xách tay/ Laptop MSI GV72 7RE-1424XVN (I7-7700HQ)', 'Máy xách tay', 25990000, 0, '38320_1513561863-1.jpg', 1, 'Hãng CPU: Intel <br>\r\nCông nghệ CPU:	Core i7<br>\r\nLoại CPU: 7700HQ<br>\r\nTốc độ CPU:	2.8GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.8GHz<br>\r\nHỗ trợ RAM tối đa:	32GB<br>\r\nDung lượng RAM:	1x8GB<br>\r\nLoại RAM:	DDR4<br>\r\nLoại ổ đĩa:	HDD<br>\r\nChipset đồ họa:	NVIDIA GeForce GTX 1050Ti // Intel HD Graphics 630<br>\r\nKích thước màn hình:	17.3 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	Không<br>\r\nCổng giao tiếp:	USB 2.0, 2x USB 3.0, USB-C, Mini DP, HDMI', 100, 0, 0, 0, 0, '2017-12-22 07:13:02', '2017-12-22 07:36:01'),
(4, 'Máy xách tay/ Laptop Asus UX430UA-GV334T (I5-8250U)', 'Máy xách tay', 22490000, 0, '38332_1513588956-1.jpg', 1, 'Hãng CPU:	Intel <br>\r\nCông nghệ CPU:	Core i5<br>\r\nLoại CPU:	8250U<br>\r\nTốc độ CPU:	1.6GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.4GHz<br>\r\nHỗ trợ RAM tối đa:	No upgrade<br>\r\nDung lượng RAM:	8GB Onboard<br>\r\nLoại RAM:	LPDDR3<br>\r\nLoại ổ đĩa:	M.2 2280 (Sata, PCIe 3 x4)<br>\r\nChipset đồ họa:	Intel UHD Graphics 620<br>\r\nKích thước màn hình:	14 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	Không<br>\r\nCổng giao tiếp:	USB 3.0, USB 2.0, USB-C 3.1 Gen1 Port/DP, Micro HDMI, Cable USB-A to LAN, Cable Micro HDMI to HDMI', 100, 0, 0, 0, 0, '2017-12-22 07:14:42', '2017-12-22 07:36:12'),
(5, 'Máy xách tay/ Laptop Lenovo Ideapad 320-15IKB 81BG00BNVN (i5-8250U)', 'Máy xách tay', 12390000, 6, '38262_1513235819-3.jpg', 1, 'Hãng CPU:	Intel<br>\r\nCông nghệ CPU:	Core i5<br>\r\nLoại CPU:	8250U<br>\r\nTốc độ CPU:	1.6GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.4GHz<br>\r\nHỗ trợ RAM tối đa:	12GB<br>\r\nDung lượng RAM:	4GB Onboard<br>\r\nLoại RAM:	DDR4<br>\r\nLoại ổ đĩa:	HDD<br>\r\nChipset đồ họa:	Intel UHD Graphics 620<br>\r\nKích thước màn hình:	15.6 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	Không<br>\r\nCổng giao tiếp:	2x USB 3.0, USB-C, HDMI<br>\r\nLAN:	1G<br>\r\nKhe đọc thẻ nhớ:	Có', 80, 0, 0, 0, 0, '2017-12-22 07:17:14', '2017-12-22 07:36:34'),
(6, 'Máy xách tay/ Laptop Dell Inspiron 13 5379-C3TI7501W', 'Máy xách tay', 23990000, 0, '15138_1512986778-4.jpg', 1, 'Hãng CPU:	Intel <br>\r\nCông nghệ CPU:	Core i7 <br>\r\nLoại CPU:	8550U <br>\r\nTốc độ CPU:	1.8GHz <br>\r\nBộ nhớ đệm:	8M <br>\r\nTốc độ tối đa:	4.0GHz <br>\r\nHỗ trợ RAM tối đa:	16GB <br>\r\nDung lượng RAM:	1x8GB <br>\r\nLoại RAM:	DDR4 <br>\r\nLoại ổ đĩa:	HDD <br>\r\nChipset đồ họa:	Intel UHD Graphics 620 <br>\r\nKích thước màn hình:	13.3 INCH <br>\r\nKênh âm thanh:	2.0 <br>\r\nLoại đĩa quang:	Không <br>\r\nCổng giao tiếp:	USB 2.0, 2x USB 3.0, HDMI <br>\r\nLAN:	NO LAN <br>\r\nKhe đọc thẻ nhớ:	Có', 90, 0, 0, 0, 0, '2017-12-22 07:18:56', '2017-12-22 07:36:34'),
(7, 'Máy xách tay/ Laptop HP Pavilion 15-cc138TX (3CH58PA)', 'Máy xách tay', 15190000, 0, '15136_1513223828-1.jpg', 1, 'Hãng CPU:	Intel <br>\r\nCông nghệ CPU:	Core i5<br>\r\nLoại CPU:	8250U<br>\r\nTốc độ CPU:	1.6GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.4GHz<br>\r\nHỗ trợ RAM tối đa:	16GB<br>\r\nDung lượng RAM:	1x4GB<br>\r\nLoại RAM:	DDR4<br>\r\nLoại ổ đĩa:	HDD<br>\r\nChipset đồ họa:	NVIDIA GeForce 940MX // Intel UHD Graphics 620<br>\r\nKích thước màn hình:	15.6 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	DVD-RW<br>\r\nCổng giao tiếp:	2x USB 3.1 Gen1, USB-C, HDMI<br>\r\nLAN:	1G', 100, 0, 0, 0, 0, '2017-12-22 07:21:26', '2017-12-22 07:36:34'),
(8, 'Máy xách tay/ Laptop HP Pavilion 15-cc104TU (3CH57PA)', 'Máy xách tay', 14190000, 0, '15120_1513140076-1.jpg', 1, 'Hãng CPU:	Intel<br>\r\nCông nghệ CPU:	Core i5<br>\r\nLoại CPU:	8250U<br>\r\nTốc độ CPU:	1.6GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.4GHz<br>\r\nHỗ trợ RAM tối đa:	16GB<br>\r\nDung lượng RAM:	1x4GB<br>\r\nLoại RAM:	DDR4<br>\r\nLoại ổ đĩa:	HDD<br>\r\nChipset đồ họa:	Intel UHD Graphics 620<br>\r\nKích thước màn hình:	15.6 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	DVD-RW<br>\r\nCổng giao tiếp:	2x USB 3.1 Gen1, USB-C, HDMI<br>\r\nLAN:	1G<br>\r\nKhe đọc thẻ nhớ:	Có', 100, 0, 0, 0, 0, '2017-12-22 07:40:04', '2017-12-22 07:40:48'),
(9, 'Máy xách tay/ Laptop HP Pavilion 15-cc137TX (3CH63PA)', 'Máy xách tay', 15190000, 0, '15118_1513066235-1.jpg', 1, 'Hãng CPU:	Intel<br>\r\nCông nghệ CPU:	Core i5<br>\r\nLoại CPU:	8250U<br>\r\nTốc độ CPU:	1.6GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.4GHz<br>\r\nHỗ trợ RAM tối đa:	16GB<br>\r\nDung lượng RAM:	1x4GB<br>\r\nLoại RAM:	DDR4<br>\r\nLoại ổ đĩa:	HDD<br>\r\nChipset đồ họa:	NVIDIA GeForce 940MX // Intel UHD Graphics 620<br>\r\nKích thước màn hình:	15.6 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	DVD-RW<br>\r\nCổng giao tiếp:	2x USB 3.1 Gen1, USB-C, HDMI<br>\r\nLAN:	1G', 100, 0, 0, 0, 0, '2017-12-22 07:41:55', '2017-12-22 07:41:55'),
(10, 'Máy xách tay/ Laptop HP Probook 430 G5-2ZD49PA', 'Máy xách tay', 15890000, 0, '15114_1513050745-1.jpg', 1, 'Hãng CPU:	Intel<br>\r\nCông nghệ CPU:	Core i5<br>\r\nLoại CPU:	8250U<br>\r\nTốc độ CPU:	1.6GHz<br>\r\nBộ nhớ đệm:	6M<br>\r\nTốc độ tối đa:	3.4GHz<br>\r\nHỗ trợ RAM tối đa:	16GB<br>\r\nDung lượng RAM:	1x4GB<br>\r\nLoại RAM:	DDR4<br>\r\nLoại ổ đĩa:	HDD<br>\r\nChipset đồ họa:	Intel UHD Graphics 620<br>\r\nKích thước màn hình:	13.3 INCH<br>\r\nKênh âm thanh:	2.0<br>\r\nLoại đĩa quang:	Không<br>\r\nCổng giao tiếp:	USB-C 3.1 Gen1 Port/DP, 2x USB 3.0, HDMI, D-Sub<br>\r\nLAN:	1G', 100, 0, 0, 0, 0, '2017-12-22 07:43:13', '2017-12-22 07:43:13'),
(11, 'Bo mạch chính/ Mainboard Asus Maximus X Hero (Wifi Ac)', 'Bo mạch chính', 8062000, 0, '15286_1512873151-3.jpg', 2, 'Socket CPU:	LGA 1151. S/p for 8th Gen i3/i5/i7<br>\r\nChipset:	Intel Z370 Chipset<br>\r\nBộ nhớ:	DDR4 - 2133/.../4133MHz. S/p Intel (XMP)<br>\r\nHỗ trợ Multi-GPU:	S/p NVIDIA 2-Way SLI, AMD 3-Way CrossFireX<br>\r\nKhe cắm mở rộng:	PCIe x16, 3x PCIe x1, 2x PCIe (x16, x8/x8)<br>\r\nLưu trữ:	2x M.2 2242/2260/2280 (Sata/ PCIe 3 x4), 6x Sata3. Raid 0/1/5/10<br>\r\nLAN:	Intel Gigabit LAN<br>\r\nÂm thanh:	Audio ROG 8-CH CODEC S1120A<br>\r\nCổng USB:	6x USB 3.1 (Type A+C), 6x USB 2.0, USB 3.1', 100, 0, 0, 0, 0, '2017-12-22 07:46:33', '2017-12-22 07:49:15'),
(12, 'Bo mạch chính/ Mainboard Asus Rog Strix Z370-H Gaming', 'Bo mạch chính', 5243000, 0, '15276_1512788851-1.jpg', 2, 'Socket CPU:	LGA 1151-V2. S/p for 8th Gen Intel Core<br>\r\nChipset:	Intel Z370 Chipset<br>\r\nBộ nhớ:	4x DDR4 - 2133/.../4000MHz. Max 64GB<br>\r\nHỗ trợ Multi-GPU:	S/p NVIDIA 2-Way SLI, AMD 3-Way CrossFireX<br>\r\nKhe cắm mở rộng:	3x PCIe x1, PCIe x2, PCIe x16 or 2x PCIe x8<br>\r\nLưu trữ:	2x M.2 2242/2260/2280 (Sata, PCIe 3 x4), 6x Sata3. Raid 0/1/15/10<br>\r\nLAN:	Intel I219-V Gigabit LAN<br>\r\nÂm thanh:	Audio 8-CH CODEC S1120A<br>\r\nCổng USB:	8x USB 3.1 Gen 1, 6 x USB 2.0, 2x USB 3.1 Gen 2', 99, 0, 0, 0, 1, '2017-12-22 07:48:49', '2017-12-28 15:20:14'),
(32, 'Bo mạch chính/ Mainboard Asus Maximus X Hero', 'Bo mạch chính', 7644000, 0, '14688_1512035353-1.jpg', 2, 'Socket CPU:	LGA 1151-V2. S/p for 8th Gen Intel Core<br>\r\nChipset:	Intel Z370 Chipset<br>\r\nBộ nhớ:	4 x DDR4 MAX 64GB, DRR4 4133(O.C)/ 4000 (O.C)/ 3866 (O.C)/ 3733 (O.C)/ 3600 (O.C)/ 3466 (O.C)/3400 (O.C)/ 3333 (O.C)/ 3300 (O.C)/ 3200 (O.C)/ 3000 (O.C)/ 2800 (O.C)/ 2666/ 2400/ 2133 MH<br>\r\nHỗ trợ Multi-GPU:	S/p NVIDIA 2-Way SLI Technology, s/p AMD 3-Way CrossFireX Technology<br>\r\nKhe cắm mở rộng:	PCIEX4, 3 x PCIEX1, 1 x PCIEX16 or 2 x PCIEX8<br>\r\nLưu trữ:	1 x M2.2242/2260/2280 ( SATA, PCIE 3x 4), 6 x SATA 6 Gb/s (Raid 0,1,5,10), Intel Optane Memory Ready<br>\r\nLAN:	Intel I219-V Gigabit LAN<br>\r\nÂm thanh:	ROG SupremeFX 8-Channel High ', 100, 0, 0, 0, 0, '2017-12-22 07:56:01', '2017-12-22 07:56:01'),
(33, 'Bo mạch chính/ Mainboard Asus Rog Strix Z370-F gaming', 'Bo mạch chính', 5614000, 0, '14490_1511758989-7.jpg', 2, 'Socket CPU:	LGA 1151-V2. S/p for 8th Gen Intel Core<br>\r\nChipset:	Intel Z370 Chipset\r\nBộ nhớ:	4000 (O.C)/ 3866 (O.C)/ 3733 (O.C)/ 3600 (O.C)/ 3466 (O.C)/3400 (O.C)/ 3333 (O.C)/ 3300 (O.C)/ 3200 (O.C)/ 3000 (O.C)/ 2800 (O.C)/ 2666/ 2400/ 2133 MHz<br>\r\nHỗ trợ Multi-GPU:	S/p NVIDIA 2-Way SLI Technology, s/p AMD 3-Way CrossFireX Technology<br>\r\nKhe cắm mở rộng:	4 x PCIEX1, 1 x PCIEX4, 1 x PCIEX16 or 2x PCIEX8<br>\r\nLưu trữ:	1 x M2.2242/2260/2280 ( SATA, PCIE 3x 4), 1x 2242/2260/2280 (PCIE 3 x4 ), 6 x SATA 6 Gb/s (Raid 0,1,15,10), Intel Optane Memory<br>\r\nLAN:	Intel I219-V Gigabit LAN<br>\r\nÂm thanh:	ROG SupremeFX 8-Channel High Definition Audio CODEC S1120A', 100, 0, 0, 0, 0, '2017-12-22 07:57:24', '2017-12-22 07:57:24'),
(34, 'Bo mạch chính/ Mainboard Msi Z370 Gaming pro Carbon AC', 'Bo mạch chính', 5949000, 0, '14400_1510106904-1.jpg', 2, 'Socket CPU:	LGA1151-V2. S/p for 8th Gen Intel Core<br>\r\nChipset:	Intel Z370 Chipset<br>\r\nBộ nhớ:	4x DDR4 - 2133/.../4000MHz (XMP). Max 64GB<br>\r\nHỗ trợ Multi-GPU:	AMD CrossFire, NVIDIA SLI<br>\r\nKhe cắm mở rộng:	3x PCIe 3.0 x16, 3x PCIe 2.0 x1<br>\r\nLưu trữ:	6x SATA 6Gb/s, 2x M.2 (2242/ 2260 /2280 S/p PCIe 3.0 x4, SATA). Raid 0,1,5,10<br>\r\nLAN:	Intel I219-V Gigabit LAN<br>\r\nÂm thanh:	Realtek ALC1220 Codec<br>\r\nCổng USB:	2x USB 3.1 Gen2 (Type A+C), 8x USB 3.0, 6x USB 2.0', 100, 0, 0, 0, 0, '2017-12-22 07:59:13', '2017-12-22 07:59:13'),
(35, 'Bo mạch chính/ Mainboard Msi Z370 Gaming M5', 'Bo mạch chính', 5849000, 0, '14398_1510109229-1.jpg', 2, 'Socket CPU:	LGA1151-V2. S/p for 8th Gen Intel Core<br>\r\nChipset:	Intel Z370 Chipset<br>\r\nBộ nhớ:	4x DDR4 - 2133/.../4000MHz (XMP). Max 64GB<br>\r\nHỗ trợ Multi-GPU:	AMD CrossFire, NVIDIA SLI<br>\r\nKhe cắm mở rộng:	3x PCIe 3.0 x16, 3x PCIe 2.0 x1<br>\r\nLưu trữ:	6x SATA 6Gb/s, 2x M.2 (2242/ 2260 /2280 S/p PCIe 3.0 x4, SATA). Raid 0,1,5,10<br>\r\nLAN:	KillerTM E2500 Gigabit LAN<br>\r\nÂm thanh:	Realtek ALC1220 Codec<br>\r\nCổng USB:	2x USB 3.1 Gen2 (Type A+C), 6x USB 3.0, 7x USB 2.0', 100, 0, 0, 0, 0, '2017-12-22 08:09:40', '2017-12-22 08:09:40'),
(36, 'Bo mạch chính/ Mainboard Gigabyte Z370 Aorus Gaming 3', 'Bo mạch chính', 4450000, 0, '14180_1509155691-5.jpg', 2, 'Socket CPU:	LGA 1151-V2. S/p Intel 8th Intel Core<br>\r\nChipset:	Intel Z370 Express Chipset<br>\r\nBộ nhớ:	4x DDR4 - 2133/.../4000. S/p Intel (XMP). Max 64GB<br>\r\nHỗ trợ Multi-GPU:	S/p AMD 2-Way, AMD CrossFireX<br>\r\nKhe cắm mở rộng:	2x PCIe 3.0 (x16), 4x PCIe (x1)<br>\r\nLưu trữ:	6x Sata 6Gb/s, 2x M.2. Raid 0, 1, 5, 10<br>\r\nLAN:	Rivet Killer E2500 LAN chip (1000Mbps)<br>\r\nÂm thanh:	Realtek ALC1220 Codec<br>\r\nCổng USB:	6x USB 3.0, 6x USB 2.0, 2x USB 3.1 Gen2 (Type A+C)', 100, 0, 0, 0, 0, '2017-12-22 08:11:09', '2017-12-22 08:11:09'),
(37, 'Bo mạch chính/ Mainboard Gigabyte Z370 Aorus Gaming 5', 'Bo mạch chính', 5685000, 0, '14182_1509159166-3.jpg', 2, 'Socket CPU:	LGA 1151-V2. S/p Intel 8th Intel Core<br>\r\nChipset:	Intel Z370 Express Chipset<br>\r\nBộ nhớ:	4x DDR4 - 2133/.../4133. S/p Intel (XMP). Max 64GB<br>\r\nHỗ trợ Multi-GPU:	S/p NVIDIA SLI, AMD CrossFireX<br>\r\nKhe cắm mở rộng:	3x PCIe 3.0 (x16), 3x PCIe (x1)<br>\r\nLưu trữ:	6x Sata 6Gb/s, 2x M.2. Raid 0, 1, 5, 10<br>\r\nLAN:	Intel GbE LAN Chip<br>\r\nÂm thanh:	Realtek ALC1220 Codec<br>\r\nCổng USB:	6x USB 3.0, 6x USB 2.0, 2x USB 3.1 Gen2 (Type A+C)', 100, 0, 0, 0, 0, '2017-12-22 08:12:24', '2017-12-22 08:12:24'),
(38, 'Bo mạch chính/ Mainboard Msi X299 Tomahawk', 'Bo mạch chính', 7490000, 0, '14396_1510109767-5.jpg', 2, 'Socket CPU:	LGA2066<br>\r\nChipset:	Intel X299 Chipset<br>\r\nBộ nhớ:	8x DDR4 - 2133/../4133MHz (XMP). Max 128GB<br>\r\nHỗ trợ Multi-GPU:	AMD CrossFire. NVIDIA SLI<br>\r\nKhe cắm mở rộng:	4x PCIe 3.0 x16, 2x PCIe 2.0 x1<br>\r\nLưu trữ:	8x SATA 6Gb/s, 2x M.2 (2242/ 2260/ 2280 PCIe 3.0 x4 and SATA), 1x U.2. Raid 0,1,5,10<br>\r\nLAN:	Intel I219-V Gigabit LAN<br>\r\nÂm thanh:	Realtek ALC1220 Codec<br>\r\nCổng USB:	5x USB 3.0, 7x USB 2.0, 2x USB 3.1 Gen2 (Type A+C)', 100, 0, 0, 0, 0, '2017-12-22 08:14:17', '2017-12-22 08:14:17'),
(39, 'Bo mạch chính/ Mainboard Asus E3 ProGaming V5', 'Bo mạch chính', 3350000, 0, '14210.jpg', 2, 'Socket CPU:	LGA 1151. S/p Intel Xeon E3-1200v5, 6th CoreTM, Pentium, Celeron<br>\r\nChipset:	Intel C232 Chipset<br>\r\nBộ nhớ:	4x DDR4 - 2400/2133MHz. Max 64GB<br>\r\nHỗ trợ Multi-GPU:	S/p AMD Quad-GPU/ AMD 2-Way<br>\r\nKhe cắm mở rộng:	2x PCIe x16, 2x PCIe x1, 2x PCI<br>\r\nLưu trữ:	6x Sata3, 1x M.2 (S/p Sata & PCIe). Raid 0, 1, 5, 10<br>\r\nLAN:	Intel I219LM Gigabit LAN<br>\r\nÂm thanh:	8-CH Audio<br>\r\nCổng USB:	6x USB 2.0, 6x USB 3.0, 2x USB 3.1', 100, 0, 0, 0, 0, '2017-12-22 08:16:14', '2017-12-22 08:17:05'),
(40, 'Bộ nhớ DDR4 Kingmax 16GB (3000) (Heatsink)', 'RAM', 4600000, 0, '14200_1508836118-4.jpg', 3, 'Hãng sản xuất:	Kingmax<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	16GB<br>\r\nBus Ram:	3000<br>\r\nĐiện áp:	1.35v - Tản nhiệt Heatsink', 100, 0, 0, 0, 0, '2017-12-22 08:49:55', '2017-12-23 11:57:29'),
(41, 'Bộ nhớ DDR4 Adata 8GB (2400) AX4U240038G16-DRZ', 'RAM', 2325000, 0, '13728_1506826322-1.jpg', 3, 'Hãng sản xuất:	ADATA<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	8GB<br>\r\nBus Ram:	2400<br>\r\nĐiện áp:	1.2v - Tản nhiệt Z1 Red', 100, 0, 0, 0, 0, '2017-12-23 11:28:29', '2017-12-23 11:28:29'),
(42, 'Bộ nhớ DDR4 Kingston 8GB (2400) (HX424C15FB2/8)', 'RAM', 2400000, 0, '13718_1506392792-4.jpg', 3, 'Hãng sản xuất:	Kingston<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	8GB<br>\r\nBus Ram:	2400<br>\r\nĐiện áp:	1.2v', 100, 0, 0, 0, 0, '2017-12-23 11:28:29', '2017-12-23 11:28:29'),
(43, 'Bộ nhớ DDR4 Corsair 16GB (2666)C16 CMK16GX4M2A Ven LPX (2x8GB)', 'RAM', 5100000, 0, '13688_1506393798-4.jpg', 3, 'Hãng sản xuất:	Corsair<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	16GB (2x8GB)<br>\r\nBus Ram:	2666<br>\r\nĐiện áp:	1.2v - CMK16GX4M2A Ven LPX', 100, 0, 0, 0, 0, '2017-12-23 11:35:25', '2017-12-23 11:35:25'),
(44, 'Bộ nhớ DDR4 G.Skill 16GB (2400) F4-2400C16D-16GFXR (2x8GB)', 'RAM', 5429000, 0, '13047_1503452856-2.jpg', 3, 'Hãng sản xuất:	G.Skill<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	16GB (2x 8GB)<br>\r\nBus Ram:	2400<br>\r\nĐiện áp:	1.2v - S/p Intel XMP Tản nhiệt Red', 100, 0, 0, 0, 0, '2017-12-23 11:37:27', '2017-12-23 11:37:27'),
(45, 'Bộ nhớ DDR4 G.Skill 32GB (2400) F4-2400C15D-32GVR (2x16GB)', 'RAM', 9744000, 0, '12546_1500691625-1.jpg', 3, 'Hãng sản xuất:	G.Skill<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	32GB (2x 16GB)<br>\r\nBus Ram:	2400<br>\r\nĐiện áp:	1.2v - S/p Intel XMP', 100, 0, 0, 0, 0, '2017-12-23 11:39:19', '2017-12-23 11:39:19'),
(46, 'Bộ nhớ DDR4 G.Skill 32GB (2400) F4-2400C15D-32GTZR (2x16GB)', 'RAM', 10440000, 0, '12328_1499618847-2.jpg', 3, 'Hãng sản xuất:	G.Skill<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	32GB (2x 16GB)<br>\r\nBus Ram:	2400<br>\r\nĐiện áp:	1.20v - S/p Intel XMP - Tản Nhiệt Trident Z - RGB LED - Hàng cao cấp', 100, 0, 0, 0, 0, '2017-12-23 11:41:08', '2017-12-23 11:41:08'),
(47, 'Bộ nhớ DDR3 G.Skill 8GB (1600)  F3-1600C11S-<br>8GIS', 'bo-nho-ddr3-gskill-8gb-1600-f3-1600c11s-br8gis', 1810000, 0, '4056_1512179411-1.jpg', 3, 'Hãng sản xuất:	G.Skill<br>\r\nChủng loại:	DDR3<br>\r\nDung lượng:	8GB<br>\r\nBus Ram:	1600<br>\r\nĐiện áp:	1.5v - S/p Intel XMP heatsink aluminium - AEGIS', 100, 0, 0, 0, 0, '2017-12-23 11:52:25', '2017-12-23 12:31:49'),
(48, 'Bộ nhớ DDR4 G.Skill 8GB (2800) F4-2800C15D-8GVRB (2x4GB)', 'RAM', 2691000, 0, '11468_1501896377-1.jpg', 3, 'Hãng sản xuất:	G.Skill<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	8GB (2x 4GB)<br>\r\nBus Ram:	2800<br>\r\nĐiện áp:	1.25v - S/p Intel XMP - Tản Nhiệt Red', 100, 0, 0, 0, 0, '2017-12-23 11:56:35', '2017-12-23 11:56:35'),
(49, 'Bộ nhớ DDR4 Corsair 8GB (2400) C14R CMK8GX4M2A Ven LPX (2x4GB)', 'RAM', 2900000, 0, '13688_1506393798-3.jpg', 3, 'Hãng sản xuất:	Corsair<br>\r\nChủng loại:	DDR4<br>\r\nDung lượng:	8GB (2x4GB)<br>\r\nBus Ram:	2400<br>\r\nĐiện áp:	1.2v - CMK8GX4M2A Ven LPX', 100, 0, 0, 0, 0, '2017-12-23 12:01:53', '2017-12-23 12:01:53'),
(50, 'Card màn hình Gigabyte 11GB N108TAORUS11GD', 'VGA', 20300000, 0, '15128_1512875960-5.jpg', 4, 'Công nghệ Chipset:	NVIDIA GeForce<br>\r\nLoại Chipset:	GeForce GTX 1080 Ti<br>\r\nin OC mode:	Boost: 1708 MHz / Base: 1594 MHz<br>\r\nin Gaming mode:	Boost: 1683 MHz / Base: 1569 MHz<br>\r\nProcess Technology:	.<br>\r\nMemory Clock:	11010 MHz<br>\r\nMemory Size:	11 GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	352 bit<br>\r\nCardBus:	PCI-E 3.0 x 16<br>\r\nOutput:	DVI-D, 3x HDMI 2.0b, 3x Display Port 1.4.<br>\r\nMax resolution:	7680x4320\r\nCông xuất nguồn:	600W', 100, 0, 0, 0, 0, '2017-12-23 12:05:43', '2017-12-23 12:05:43'),
(51, 'Card màn hình Msi 8GB GTX1070 Ti Gaming 8G', 'VGA', 15490000, 0, '15078_1512698761-1.jpg', 4, 'Loại Chipset:	NVIDIA GeForce GTX 1070 Ti<br>\r\nin OC mode:	1683 MHz / 1607 MHz<br>\r\nin Gaming mode:	1468 MHz / 1354 MHz<br>\r\nMemory Clock:	8008 MHz<br>\r\nMemory Size:	8GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	256-bit<br>\r\nCardBus:	PCI-E 3.0 x16<br>\r\nOutput:	3x DisplayPort, HDMI, DVI-D<br>\r\nSố lượng màn hình xuất ra:	4<br>\r\nCông xuất nguồn:	500W', 100, 0, 0, 0, 0, '2017-12-23 12:07:34', '2017-12-23 12:07:34'),
(52, 'Card màn hình Asus 4GB Strix-GTX1050TI-DC2O4G', 'card-man-hinh-asus-4gb-strix-gtx1050ti-dc2o4g', 4583000, 0, '14274_1512530309-6.jpg', 4, 'Loại Chipset:	NVIDIA GeForce GTX 1050 TI<br>\r\nin OC mode:	Boots Clock 1455 MHz, Base Clock 1341 MHz<br>\r\nMemory Clock:	7008 MHz<br>\r\nMemory Size:	4GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	128-bit<br>\r\nCardBus:	PCI Express 3.0<br>\r\nOutput:	2x DVI-D, HDMI, DisplayPort<br>\r\nMax resolution:	7680x4320', 100, 0, 0, 0, 0, '2017-12-23 12:09:28', '2017-12-23 12:20:44'),
(53, 'Card màn hình Asus 4GB RX550-4G', 'VGA', 3450000, 0, '13841_1507085044-6.jpg', 4, 'Công nghệ Chipset:	AMD Radeon<br>\r\nLoại Chipset:	AMD Radeon RX 550<br>\r\nin OC mode:	1183 MHz<br>\r\nMemory Clock:	7000 MHz<br>\r\nMemory Size:	4GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	128-bit<br>\r\nCardBus:	PCI-E 3.0 x16<br>\r\nOutput:	DVI-D, HDMI, DisplayPort<br>\r\nMax resolution:	5120x2880<br>\r\nNguồn phụ:	Không', 100, 0, 0, 0, 0, '2017-12-23 12:11:51', '2017-12-23 12:11:51'),
(54, 'Card màn hình Asus 4GB PH-GTX1050TI-4G', 'VGA', 4190000, 0, '13839_1507082272-5.jpg', 4, 'Loại Chipset:	NVIDIA GeForce GTX 1050 TI<br>\r\nin OC mode:	Boost Clock : 1392 MHz - Base Clock : 1290 MHz<br>\r\nMemory Clock:	7008 MHz<br>\r\nMemory Size:	4GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	128-bit<br>\r\nCardBus:	PCI-E 3.0 x16<br>\r\nOutput:	DVI-D, HDMI, DisplayPort<br>\r\nMax resolution:	7680x4320<br>\r\nNguồn phụ:	Không', 100, 0, 0, 0, 0, '2017-12-23 12:13:40', '2017-12-23 12:13:40'),
(55, 'Card màn hình Gigabyte 4GB RX580Gaming-4GD', 'VGA', 7860000, 0, '13618_1506054940-1.jpg', 4, 'Công nghệ Chipset:	AMD Radeon<br>\r\nLoại Chipset:	AMD Radeon RX580<br>\r\nin OC mode:	OC Mode: 1355 MHz<br>\r\nin Gaming mode:	Gaming Mode: 1340 MHz<br>\r\nMemory Clock:	Memory Clock: 7000 MHz<br>\r\nMemory Size:	Memory: 4GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	256bit<br>\r\nOutput:	Dual-link DVI-D, HDMI, 3x DisplayPort<br>\r\nSố lượng màn hình xuất ra:	5<br>\r\nCông xuất nguồn:	500W công suất thật', 100, 0, 0, 0, 0, '2017-12-23 12:16:06', '2017-12-23 12:16:06'),
(56, 'Card màn hình Gigabyte 11GB N108TA XW-11GD', 'card-man-hinh-gigabyte-11gb-n108ta-xw-11gd', 23800000, 7, '13534_1505978595-5.jpg', 4, 'Công nghệ Chipset: NVIDIA GeForce<br>\r\nLoại Chipset:	NVIDIA GeForce GTX 1080Ti<br>\r\nin OC mode:	OC Mode - Boost: 1746 MHz/ Base: 1632 MHz<br>\r\nin Gaming mode:	Gaming Mode - Boost: 1721 MHz/ Base: 1607 MHz<br>\r\nMemory Clock:	OC Mode: 11448 MHz/ Gaming Mode: 11232 MHz<br>\r\nMemory Size:	11GB<br>\r\nMemory Type:	GDDR5X<br>\r\nMemory Bus:	352-bit<br>\r\nCardBus:	PCI-E 3.0 x16<br>\r\nOutput:	DVI-D, 2x HDMI, 3x DisplayPort<br>\r\nMax resolution:	7680x4320<br>\r\nCông xuất nguồn:	600W', 100, 0, 0, 0, 0, '2017-12-23 12:19:03', '2017-12-23 12:28:04'),
(57, 'Card màn hình Gigabyte 6GB N1060AORUS-6GD', 'VGA', 8570000, 0, '13528_1505983596-1.jpg', 4, 'Công nghệ Chipset:	NVIDIA GeForce<br>\r\nLoại Chipset:	NVIDIA GeForce GTX 1060<br>\r\nin OC mode:	OC Mode - Boost: 1860 MHz/ Base: 1632 MHz<br>\r\nin Gaming mode:	Gaming Mode - Boost: 1835 MHz/ Base: 1607 MHz<br>\r\nMemory Clock:	9026 MHz<br>\r\nMemory Size:	6GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	192-bit<br>\r\nCardBus:	PCI-E 3.0 x16<br>\r\nOutput:	DVI-D, HDMI, 3x DisplayPort<br>\r\nMax resolution:	7680x4320<br>\r\nCông xuất nguồn:	400W', 100, 0, 0, 0, 0, '2017-12-23 12:23:10', '2017-12-23 12:23:10'),
(58, 'Card màn hình Asus 8GB Dual-GTX1070-O8G', 'VGA', 13034000, 0, '13305_1505015962-1.jpg', 4, 'Công nghệ Chipset: NVIDIA GeForce<br>\r\nLoại Chipset: NVIDIA GeForce GTX 1070<br>\r\nProcess Technology:	CUDA Core 1920<br>\r\nMemory Size:	8GB<br>\r\nMemory Type:	DDR5<br>\r\nMemory Bus:	256-bits<br>\r\nOutput:	DVI, 2x HDMI, 2x Display Port<br>\r\nDirectX:	DirectCU II<br>\r\nHỗ trợ VR:	VR-HDMI<br>\r\nNguồn phụ:	1x 8-pin', 100, 0, 0, 0, 0, '2017-12-23 12:25:09', '2017-12-23 12:25:09'),
(59, 'Card màn hình Msi 4GB GTX1050Ti 4GT OCV1', 'VGA', 4299000, 0, '12875_1502501549-5.jpg', 4, 'Công nghệ Chipset: NVIDIA GeForce<br>\r\nLoại Chipset:	NVIDIA GeForce GTX 1050Ti<br>\r\nin OC mode:	1455 MHz / 1341 MHz<br>\r\nMemory Clock:	7008 MHz<br>\r\nMemory Size:	4GB<br>\r\nMemory Type:	GDDR5<br>\r\nMemory Bus:	128-bit<br>\r\nCardBus:	PCI-E 3.0 x16<br>\r\nOutput:	DisplayPort, HDMI, DVI-D<br>\r\nSố lượng màn hình xuất ra:	3<br>\r\nCông xuất nguồn:	300W', 100, 0, 0, 0, 0, '2017-12-23 12:27:08', '2017-12-23 12:27:08'),
(60, 'Chuột máy tính Logitech Gaming G903', 'Mouse', 3700000, 0, '14516_1511406472-5.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Logitech Gaming G903 (Đen)<br>\r\nTính Năng:	Chuột Gaming không dây - 2.4GHz. Độ phân giải: 200-12.000 dpi, độ nhạy: 1ms, độ bền: 50.000.000 lần nhấn. Đèn LED RGB 16.8 triệu màu, tích hợp sạc không dây với pad POWERPLAY, thời lượng pin 32 giờ, 4 nút tùy chọn<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 12:35:35', '2017-12-23 12:35:35'),
(61, 'Chuột máy tính Zadez ZM-122', 'Mouse', 80000, 0, '14316_1509417121-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Zadez ZM-122<br>\r\nTính Năng:	Chuột USB có dây - 1000 dpi. Dây dài: 1.4m, sử dụng chất liệu nhựa ABS với thiết kế chắc chắn, sang trọng, không vô nước.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:36:59', '2017-12-23 12:36:59'),
(62, 'Chuột máy tính Ozone 3K', 'Mouse', 550000, 0, '14038_1507875994-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Ozone 3K<br>\r\nTính Năng:	Chuột Gaming - 750/1500/3500 dpi. Dây bọc dù chống nhiễu với cổng USB mạ vàng, thiết kế Ambidextrous đối xứng. Internal Memory: 128KB, 8 nút lập trình hỗ trợ Macro, LED Logo với 6 màu tùy chỉnh, độ bền: 20 triệu lần nhấn.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:38:54', '2017-12-23 12:38:54'),
(63, 'Chuột máy tính Trust GXT 25 Gaming', 'Mouse', 369000, 0, '13950_1507619390-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT 25 Gaming<br>\r\nTính Năng:	Chuột quang (Gaming) - 250-4000 dpi. Thiết kế bất đối xứng phù hợp các thể loại game FPS/RTS/RPG, có đèn LED. <br>Number of buttons: 7, USB 2.0<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:40:30', '2017-12-23 12:40:30'),
(64, 'Chuột máy tính FL Esports G51', 'Mouse', 485000, 0, '13948_1507882756-1.jpg', 5, 'Thông tin sản phẩm: Chuột máy tính FL Esports G51Led<br>\r\nTính Năng:	Chuột USB có dây - 500-2000 dpi - 1000 Hz. Dây dài: 1.6m, dòng định mức: < 150 mA.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:42:33', '2017-12-23 12:42:33'),
(65, 'Chuột máy tính FL Esports G11', 'Mouse', 485000, 0, '13944_1507695775-5.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính FL Esports G11Led<br>\r\nTính Năng:	Chuột USB có dây - 500-2000 dpi - 1000 Hz. Dây dài: 1.6m, dòng định mức: < 150 mA.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:46:27', '2017-12-23 12:46:27'),
(66, 'Chuột máy tính Trust Vergo Wireless Ergonomic Comfort', 'Mouse', 719000, 0, '13905_1507611622-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust Vergo Wireless Ergonomic Comfort<br>\r\nTính Năng:	Chuột văn phòng cao cấp Wireless. Thiết kế bất đối xứng tạo cảm giác thoải mái nhất cho người dùng. Đế lót giúp bảo vệ tay người dùng và tăng độ chính xác.<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 12:47:58', '2017-12-23 12:47:58'),
(67, 'Chuột máy tính Trust GXT 170 Heron RGB', 'Mouse', 1099000, 0, '13899_1507609603-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT 170 Heron RGB<br>\r\nTính Năng:	Chuột Gaming - 7000 dpi. Thiết kế chắc chắn với chất liệu cao su giúp tăng độ bám lúc sử dụng, Full LED RGB. Phần mềm đi kèm giúp game thủ tùy chỉnh chuột thích ứng với các thể loại game FPS/RTS.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:49:41', '2017-12-23 12:49:41'),
(68, 'Chuột máy tính Trust GXT 177 Gaming MSE', 'Mouse', 1099000, 0, '13895_1507606889-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT 177 Gaming MSE<br>\r\nTính Năng:	Chuột Gaming - 14.400 dpi - 1000 Hz, Sensor A9800, gia tốc 30G. Thiết kế đối xứng, bộ nhớ Onboard giúp lưu trữ đồng thời 8 Profile, phù hợp các thể loại game MOBA/FPS/RTS/RPG.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:52:53', '2017-12-23 12:52:53'),
(69, 'Chuột máy tính Trust GXT 188 Laban', 'Mouse', 1469000, 0, '13893_1507604322-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT188 Laban<br>\r\nTính Năng:	Chuột Gaming - 15.000 dpi. Với mắt đọc Pixart PMW3360, đèn nền Full LED RGB, phù hợp các thể loại game MOBA/MMO/FPS/RTS/RPG. Phần mềm đi kèm giúp tùy chỉnh chế độ đèn LED, cài đặt phím Macro - tốc độ con lăn - lưu Profile<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:54:21', '2017-12-23 12:54:21'),
(70, 'Chuột máy tính Logitech Mx Anywhere 2S Master', 'Mouse', 2090000, 0, '13626_1506133396-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Logitech Mx Anywhere 2S Master<br>\r\nTính Năng:	Chuột Bluetooth và Wireless, max 4000 dpi, có LED báo pin, pin sạc đầy dùng trong 70 ngày, chạy trên mọi bề mặt. Tương thích hầu hết các thiết bị.<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 12:55:48', '2017-12-23 12:55:48'),
(71, 'Chuột máy tính Logitech M590', 'Mouse', 660000, 0, '13419_1505525006-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Logitech M590 (Đen)<br>\r\nTính Năng:	Chuột Bluetooth và Wireless (2.4GHz) - 1000 dpi, click không kêu. Chức năng FLOW cho phép copy file, hình ảnh, thư mục từ máy này sang máy khác mà không cần USB.<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 12:57:14', '2017-12-23 12:57:14'),
(72, 'Chuột máy tính A4-Q81', 'Mouse', 379000, 0, '13393_1505443906-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính A4-Q81<br>\r\nTính Năng:	Độ phân giải: 3200dpi (5 mức tinh chỉnh), tần số: 1000Hz (4 mức tinh chỉnh), thời gian đáp ứng: dưới 1ms, độ bền: 10 triệu lần click. 8 nút, bộ nhớ chương trình Onboard 160K bits, đế kim loại.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 12:59:08', '2017-12-23 12:59:08'),
(73, 'Chuột máy tính Elecom M-DY10DRPN', 'Mouse', 249000, 0, '13113_1503893679-2.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Elecom M-DY10DRPN (Hồng)<br>\r\nTính Năng:	Chuột không dây - 1000dpi, receiver 2.4GHz, khoảng cách 10m.<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 13:02:03', '2017-12-23 13:02:03'),
(74, 'Chuột máy tính Genius NX7005 ( Xanh )', 'Mouse', 139000, 0, '12933_1502944456-3.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Genius NX7005 (Xanh)<br>\r\nTính Năng:	Chuột không dây - 2.4GHz, 1200 dpi, Pico reciever, sử dụng công nghệ Blue-Eye, tiết kiệm pin và di chuyển trên nhiều địa hình.<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 13:05:08', '2017-12-23 13:05:08'),
(75, 'Chuột máy tính Logitech Mx Anywhere 2S', 'Mouse', 1790000, 0, '12652_1501811297-2.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Logitech Mx Anywhere 2S<br>\r\nTính Năng:	Chuột Bluetooth (2.4GHz) hoặc USB port, 200 - 4000 dpi, có LED báo pin, Pin sạc Li-Po 500mAh. Hỗ trợ: Windows 7/8/10, Mac OS X 10.10 trở lên (port) hoặc Windows 8 trở lên, Mac OS X 10.10 trở lên (Bluetooth)<br>\r\nChuột loại:	Không dây', 100, 0, 0, 0, 0, '2017-12-23 13:09:16', '2017-12-23 13:09:16'),
(76, 'Chuột máy tính Trust GXT158 Laser Gaming', 'Mouse', 491000, 0, '12373_1499654582-3.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT158 Laser Gaming<br>\r\nTính Năng:	Chuột game - 400-5000 DPI. Thiết kế đối xứng phù hợp các thể loại game MOBA/RTS/RPG, bộ nhớ Oboard ghi nhớ cùng lúc 5 profiles, có đèn LED tùy chỉnh.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 13:11:28', '2017-12-23 13:11:28'),
(77, 'Chuột máy tính Trust GXT155C Gaming', 'Mouse', 725000, 0, '12371_1499679179-6.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT155C Gaming<br>\r\nTính Năng:	Chuột Optical - 100-4000 DPI. Thiết kế bất đối xứng phù hợp các thể loại game MMO/MOBA/RTS/FPS, bộ nhớ Oboard ghi nhớ cùng lúc 5 profiles, có đèn LED tùy chỉnh.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 13:14:44', '2017-12-23 13:14:44'),
(78, 'Chuột máy tính Trust GXT166 MMO Game Laser', 'Mouse', 1105000, 0, '12369_1499676045-8.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Trust GXT166 MMO Game Laser<br>\r\nTính Năng:	Chuột Lazer cổng USB mạ vàng - 50-16400 DPI. Dây cáp Nylon bện 1.8m, độ trễ 1000Hz. Thiết kế bất đối xứng phù hợp các thể loại game MMO/MOBA/RTS, 18 nút chức năng, ghi nhớ cùng lúc 5 profiles, có đèn LED tùy chỉnh.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 13:16:55', '2017-12-23 13:16:55'),
(79, 'Chuột máy tính Corsair Scimitar Pro RGB', 'Mouse', 2350000, 0, '12305_1499652319-6.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Corsair Scimitar Pro RGB (Vàng đen)<br>\r\nTính Năng:	Sensor Optical 1 dpi - 16.000 dpi, 4 Zone RGB, cable 1.8m, 17 Programmble Buttons. S/p up to 1000Hz/1ms Refresh Rate<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 13:19:10', '2017-12-23 13:19:10'),
(80, 'Chuột máy tính A4-V8M', 'Mouse', 4190000, 0, '12132_1504855494-3.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính A4-V8M<br>\r\nTính Năng:	Độ phân giải: 3200dpi (5 mức tinh chỉnh), tần số quét: 1.000Hz (4 mức tinh chỉnh), thời gian đáp ứng: dưới 1ms, độ bền: 10 triệu lần click. 8 nút, bộ nhớ Onboard 160K bits, đế kim loại.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 13:21:27', '2017-12-23 13:21:27'),
(81, 'Chuột máy tính Corsair M65 Pro RGB ( Trắng )', 'chuot-may-tinh-corsair-m65-pro-rgb-trang-', 1630000, 0, '10601_1504074271-1.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính Corsair M65 Pro RGB (Trắng)<br>\r\nTính Năng:	Sensor Optical 100dpi - 12.000 dpi, 3 Zone RGB, cable 1.8m, 8 Programmble Buttons.<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-23 13:26:24', '2017-12-23 13:43:02'),
(82, 'Chuột máy tính A4-N-310', 'chuot-may-tinh-a4-n-310', 115000, 0, '10867_1505111132-2.jpg', 5, 'Thông tin sản phẩm:	Chuột máy tính A4-N-310 (Đen cam)<br>\r\nTính Năng:	Di chuyển trên mọi bề mặt không cần tấm lót, thấu kính nhỏ ít bụi, đèn led<br>\r\nChuột loại:	Có dây', 100, 0, 0, 0, 0, '2017-12-28 15:49:01', '2017-12-28 15:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(14, 'Storm', 'storm@gmail.com', '12413242353', 'méo biết', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2017-12-28 15:19:31', '2017-12-28 15:19:31'),
(16, 'Bastian Ngo', 'bastianngo@gmail.com', '6473322201', 'fasdfas', 'a9d66cc60ca0798fcee149e719da6ac1', NULL, 1, NULL, '2018-01-03 06:16:00', '2018-01-03 06:16:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
