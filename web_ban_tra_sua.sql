-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 02, 2023 lúc 08:38 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `trasua2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id_admin_roles` int(11) NOT NULL AUTO_INCREMENT,
  `admin_admin_id` int(10) UNSIGNED NOT NULL,
  `roles_id_roles` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_admin_roles`),
  KEY `admin_admin_id` (`admin_admin_id`,`roles_id_roles`),
  KEY `roles_id_roles` (`roles_id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=207 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin_roles`
--

INSERT INTO `admin_roles` (`id_admin_roles`, `admin_admin_id`, `roles_id_roles`) VALUES
(205, 5, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `attr_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `attr_id` (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=400 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `attribute`
--

INSERT INTO `attribute` (`id`, `product_id`, `attr_id`, `created_at`, `updated_at`) VALUES
(139, 82, 29, '2021-07-18 06:42:57', '2021-07-18 06:42:57'),
(140, 82, 30, '2021-07-18 06:42:57', '2021-07-18 06:42:57'),
(141, 82, 31, '2021-07-18 06:42:57', '2021-07-18 06:42:57'),
(145, 80, 29, '2021-07-18 06:43:47', '2021-07-18 06:43:47'),
(146, 80, 30, '2021-07-18 06:43:47', '2021-07-18 06:43:47'),
(147, 80, 31, '2021-07-18 06:43:47', '2021-07-18 06:43:47'),
(148, 79, 29, '2021-07-18 06:43:59', '2021-07-18 06:43:59'),
(149, 79, 30, '2021-07-18 06:44:00', '2021-07-18 06:44:00'),
(150, 79, 31, '2021-07-18 06:44:00', '2021-07-18 06:44:00'),
(157, 76, 29, '2021-07-18 06:45:04', '2021-07-18 06:45:04'),
(158, 76, 30, '2021-07-18 06:45:04', '2021-07-18 06:45:04'),
(159, 76, 31, '2021-07-18 06:45:04', '2021-07-18 06:45:04'),
(172, 71, 29, '2021-07-18 06:46:36', '2021-07-18 06:46:36'),
(173, 71, 30, '2021-07-18 06:46:36', '2021-07-18 06:46:36'),
(174, 71, 31, '2021-07-18 06:46:37', '2021-07-18 06:46:37'),
(175, 70, 29, '2021-07-18 06:46:49', '2021-07-18 06:46:49'),
(176, 70, 30, '2021-07-18 06:46:49', '2021-07-18 06:46:49'),
(177, 70, 31, '2021-07-18 06:46:49', '2021-07-18 06:46:49'),
(178, 69, 29, '2021-07-18 06:47:25', '2021-07-18 06:47:25'),
(179, 69, 30, '2021-07-18 06:47:25', '2021-07-18 06:47:25'),
(180, 69, 31, '2021-07-18 06:47:26', '2021-07-18 06:47:26'),
(193, 64, 29, '2021-07-18 06:49:09', '2021-07-18 06:49:09'),
(194, 64, 30, '2021-07-18 06:49:09', '2021-07-18 06:49:09'),
(195, 64, 31, '2021-07-18 06:49:09', '2021-07-18 06:49:09'),
(196, 63, 29, '2021-07-18 06:49:25', '2021-07-18 06:49:25'),
(197, 63, 30, '2021-07-18 06:49:25', '2021-07-18 06:49:25'),
(198, 63, 31, '2021-07-18 06:49:26', '2021-07-18 06:49:26'),
(199, 62, 29, '2021-07-18 06:49:43', '2021-07-18 06:49:43'),
(200, 62, 30, '2021-07-18 06:49:44', '2021-07-18 06:49:44'),
(201, 62, 31, '2021-07-18 06:49:44', '2021-07-18 06:49:44'),
(211, 57, 29, '2021-07-18 06:50:52', '2021-07-18 06:50:52'),
(212, 57, 30, '2021-07-18 06:50:52', '2021-07-18 06:50:52'),
(213, 57, 31, '2021-07-18 06:50:52', '2021-07-18 06:50:52'),
(214, 56, 29, '2021-07-18 06:51:18', '2021-07-18 06:51:18'),
(215, 56, 30, '2021-07-18 06:51:19', '2021-07-18 06:51:19'),
(216, 56, 31, '2021-07-18 06:51:21', '2021-07-18 06:51:21'),
(217, 55, 29, '2021-07-18 06:51:34', '2021-07-18 06:51:34'),
(218, 55, 30, '2021-07-18 06:51:34', '2021-07-18 06:51:34'),
(219, 55, 31, '2021-07-18 06:51:34', '2021-07-18 06:51:34'),
(220, 54, 29, '2021-07-18 06:52:01', '2021-07-18 06:52:01'),
(221, 54, 30, '2021-07-18 06:52:01', '2021-07-18 06:52:01'),
(222, 54, 31, '2021-07-18 06:52:02', '2021-07-18 06:52:02'),
(223, 53, 29, '2021-07-18 06:52:21', '2021-07-18 06:52:21'),
(224, 53, 30, '2021-07-18 06:52:21', '2021-07-18 06:52:21'),
(225, 53, 31, '2021-07-18 06:52:22', '2021-07-18 06:52:22'),
(226, 52, 29, '2021-07-18 06:52:39', '2021-07-18 06:52:39'),
(227, 52, 30, '2021-07-18 06:52:39', '2021-07-18 06:52:39'),
(228, 52, 31, '2021-07-18 06:52:39', '2021-07-18 06:52:39'),
(229, 51, 29, '2021-07-18 06:52:57', '2021-07-18 06:52:57'),
(230, 51, 30, '2021-07-18 06:52:57', '2021-07-18 06:52:57'),
(231, 51, 31, '2021-07-18 06:52:58', '2021-07-18 06:52:58'),
(238, 48, 29, '2021-07-18 06:54:06', '2021-07-18 06:54:06'),
(239, 48, 30, '2021-07-18 06:54:07', '2021-07-18 06:54:07'),
(240, 48, 31, '2021-07-18 06:54:07', '2021-07-18 06:54:07'),
(241, 47, 29, '2021-07-18 06:54:21', '2021-07-18 06:54:21'),
(242, 47, 30, '2021-07-18 06:54:22', '2021-07-18 06:54:22'),
(243, 47, 31, '2021-07-18 06:54:22', '2021-07-18 06:54:22'),
(247, 45, 29, '2021-07-18 06:54:46', '2021-07-18 06:54:46'),
(248, 45, 30, '2021-07-18 06:54:46', '2021-07-18 06:54:46'),
(249, 45, 31, '2021-07-18 06:54:46', '2021-07-18 06:54:46'),
(326, 206, 29, '2021-09-15 19:27:21', '2021-09-15 19:27:21'),
(327, 206, 30, '2021-09-15 19:27:21', '2021-09-15 19:27:21'),
(328, 206, 31, '2021-09-15 19:27:21', '2021-09-15 19:27:21'),
(329, 207, 29, '2021-09-15 19:28:18', '2021-09-15 19:28:18'),
(330, 207, 30, '2021-09-15 19:28:18', '2021-09-15 19:28:18'),
(331, 207, 31, '2021-09-15 19:28:19', '2021-09-15 19:28:19'),
(332, 208, 29, '2021-09-15 19:29:14', '2021-09-15 19:29:14'),
(333, 208, 30, '2021-09-15 19:29:14', '2021-09-15 19:29:14'),
(334, 208, 31, '2021-09-15 19:29:14', '2021-09-15 19:29:14'),
(335, 209, 29, '2021-09-15 19:29:59', '2021-09-15 19:29:59'),
(336, 209, 30, '2021-09-15 19:29:59', '2021-09-15 19:29:59'),
(337, 209, 31, '2021-09-15 19:29:59', '2021-09-15 19:29:59'),
(341, 211, 29, '2021-09-15 19:31:42', '2021-09-15 19:31:42'),
(342, 211, 30, '2021-09-15 19:31:42', '2021-09-15 19:31:42'),
(343, 211, 31, '2021-09-15 19:31:42', '2021-09-15 19:31:42'),
(344, 212, 29, '2021-09-15 19:33:08', '2021-09-15 19:33:08'),
(345, 212, 30, '2021-09-15 19:33:08', '2021-09-15 19:33:08'),
(346, 212, 31, '2021-09-15 19:33:08', '2021-09-15 19:33:08'),
(355, 216, 29, '2021-11-07 06:53:12', '2021-11-07 06:53:12'),
(356, 216, 30, '2021-11-07 06:53:12', '2021-11-07 06:53:12'),
(357, 216, 31, '2021-11-07 06:53:13', '2021-11-07 06:53:13'),
(358, 217, 29, '2021-11-07 06:54:19', '2021-11-07 06:54:19'),
(359, 217, 30, '2021-11-07 06:54:19', '2021-11-07 06:54:19'),
(360, 217, 31, '2021-11-07 06:54:20', '2021-11-07 06:54:20'),
(361, 218, 29, '2021-11-07 06:55:12', '2021-11-07 06:55:12'),
(362, 218, 30, '2021-11-07 06:55:12', '2021-11-07 06:55:12'),
(363, 218, 31, '2021-11-07 06:55:13', '2021-11-07 06:55:13'),
(364, 219, 29, '2021-11-07 06:56:08', '2021-11-07 06:56:08'),
(365, 219, 30, '2021-11-07 06:56:09', '2021-11-07 06:56:09'),
(366, 219, 31, '2021-11-07 06:56:10', '2021-11-07 06:56:10'),
(367, 220, 29, '2021-11-07 06:57:08', '2021-11-07 06:57:08'),
(368, 220, 30, '2021-11-07 06:57:08', '2021-11-07 06:57:08'),
(369, 220, 31, '2021-11-07 06:57:09', '2021-11-07 06:57:09'),
(370, 221, 29, '2021-11-07 06:58:14', '2021-11-07 06:58:14'),
(371, 221, 30, '2021-11-07 06:58:15', '2021-11-07 06:58:15'),
(372, 221, 31, '2021-11-07 06:58:16', '2021-11-07 06:58:16'),
(373, 222, 29, '2021-11-07 06:59:07', '2021-11-07 06:59:07'),
(374, 222, 30, '2021-11-07 06:59:08', '2021-11-07 06:59:08'),
(375, 222, 31, '2021-11-07 06:59:08', '2021-11-07 06:59:08'),
(376, 223, 29, '2021-11-07 06:59:59', '2021-11-07 06:59:59'),
(377, 223, 30, '2021-11-07 07:00:00', '2021-11-07 07:00:00'),
(378, 223, 31, '2021-11-07 07:00:00', '2021-11-07 07:00:00'),
(379, 224, 29, '2021-11-07 07:01:30', '2021-11-07 07:01:30'),
(380, 224, 30, '2021-11-07 07:01:30', '2021-11-07 07:01:30'),
(381, 224, 31, '2021-11-07 07:01:31', '2021-11-07 07:01:31'),
(382, 225, 29, '2021-11-07 07:02:29', '2021-11-07 07:02:29'),
(383, 225, 30, '2021-11-07 07:02:29', '2021-11-07 07:02:29'),
(384, 225, 31, '2021-11-07 07:02:29', '2021-11-07 07:02:29'),
(385, 226, 29, '2021-11-07 07:03:06', '2021-11-07 07:03:06'),
(386, 226, 30, '2021-11-07 07:03:07', '2021-11-07 07:03:07'),
(387, 226, 31, '2021-11-07 07:03:07', '2021-11-07 07:03:07'),
(388, 227, 29, '2021-11-07 07:07:06', '2021-11-07 07:07:06'),
(389, 227, 30, '2021-11-07 07:07:06', '2021-11-07 07:07:06'),
(390, 227, 31, '2021-11-07 07:07:06', '2021-11-07 07:07:06'),
(391, 228, 29, '2021-11-07 07:07:57', '2021-11-07 07:07:57'),
(392, 228, 30, '2021-11-07 07:07:57', '2021-11-07 07:07:57'),
(393, 228, 31, '2021-11-07 07:07:57', '2021-11-07 07:07:57'),
(394, 229, 29, '2021-11-07 07:08:47', '2021-11-07 07:08:47'),
(395, 229, 30, '2021-11-07 07:08:47', '2021-11-07 07:08:47'),
(396, 229, 31, '2021-11-07 07:08:48', '2021-11-07 07:08:48'),
(397, 230, 29, '2021-11-07 07:09:27', '2021-11-07 07:09:27'),
(398, 230, 30, '2021-11-07 07:09:28', '2021-11-07 07:09:28'),
(399, 230, 31, '2021-11-07 07:09:29', '2021-11-07 07:09:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `policy`
--

DROP TABLE IF EXISTS `policy`;
CREATE TABLE IF NOT EXISTS `policy` (
  `policy_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sumary` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`policy_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `policy`
--

INSERT INTO `policy` (`policy_id`, `title`, `image`, `sumary`, `content`, `created_at`, `updated_at`) VALUES
(5, 'Phí ship rẻ', 'Capture339.PNG', '<p>miễn ph&iacute; ship cho đơn h&agrave;ng từ 200.000 VNĐ trở l&ecirc;n</p>', '<p>Ch&iacute;nh s&aacute;ch chất lượng sản phẩm&nbsp;chăm s&oacute;c sức khỏe Buona&nbsp;được đặc biệt ch&uacute; trọng nhằm đem lại cho kh&aacute;ch h&agrave;ng một dịch vụ chuy&ecirc;n nghiệp.</p>\r\n\r\n<p>Với phương ch&acirc;m sự h&agrave;i l&ograve;ng của kh&aacute;ch h&agrave;ng l&agrave; t&agrave;i sản của doanh nghiệp, ch&uacute;ng t&ocirc;i mong muốn được phục vụ kh&aacute;ch h&agrave;ng ng&agrave;y một tốt hơn với ch&iacute;nh s&aacute;ch chất lượng sản phẩm&nbsp;uy t&iacute;n.</p>\r\n\r\n<p>Quy định&nbsp;về ti&ecirc;u chuẩn chất lượng</p>\r\n\r\n<p>Tất cả&nbsp; c&aacute;c sản phẩm của Buona do NC Việt Nam&nbsp;b&aacute;n ra đều được d&aacute;n tem bảo đảm của NC Việt Nam; Mỗi sản phẩm đều được theo d&otilde;i theo m&atilde; vạch, kể từ kh&acirc;u nhập h&agrave;ng cho đến khi xuất h&agrave;ng. Những sản phẩm kh&ocirc;ng c&oacute; tem đảm bảo của NC Việt Nam v&agrave; kh&ocirc;ng c&oacute; m&atilde; vạch sẽ kh&ocirc;ng đạt ti&ecirc;u chuẩn.</p>\r\n\r\n<ul>\r\n	<li>Hạn sử dụng của sản phẩm l&agrave; 02 năm kể từ&nbsp;ng&agrave;y sản xuất in tr&ecirc;n bao b&igrave;.</li>\r\n	<li>Kh&aacute;ch h&agrave;ng sẽ được đổi sản phẩm kh&aacute;c trong&nbsp; 1 tuần&nbsp;đầu sau khi mua h&agrave;ng nếu sản phẩm bị lỗi do nh&agrave; sản xuất ( y&ecirc;u cầu kh&aacute;ch h&agrave;ng phải giữ đầy đủ hộp, bao b&igrave; sản phẩm bị lỗi để cung cấp cho Buona Việt Nam).</li>\r\n	<li>Buona Việt Nam&nbsp;sẽ đổi sản phẩm kh&aacute;c, c&ugrave;ng loại cho qu&yacute; kh&aacute;ch h&agrave;ng ngay sau khi nhận được h&agrave;ng bị lỗi. Thời gian đổi h&agrave;ng kh&ocirc;ng qu&aacute; 1 tuần kể từ khi nhận được h&agrave;ng hỏng, lỗi của qu&yacute; kh&aacute;ch.</li>\r\n</ul>\r\n\r\n<h3>C&aacute;c trường hợp kh&ocirc;ng chấp nhận bảo h&agrave;nh</h3>\r\n\r\n<ul>\r\n	<li>&nbsp;Sản phẩm Buona kh&aacute;ch h&agrave;ng đặt mua c&oacute; nguồn gốc kh&ocirc;ng phải từ NC Việt Nam ph&acirc;n phối.</li>\r\n	<li>&nbsp;Sản phẩm bị hỏng, vỡ do t&aacute;c động của kh&aacute;ch h&agrave;ng như va đập, l&agrave;m rơi.</li>\r\n	<li>&nbsp;Sản phẩm bị thay đổi chất lượng, m&ugrave;i vị do kh&aacute;ch h&agrave;ng bảo quản sai quy định như để ở nhiệt độ qu&aacute; cao ( tr&ecirc;n 35 độ C) , để trực tiếp dưới &aacute;nh nắng mặt trời trong thời gian d&agrave;i.</li>\r\n	<li>Kh&aacute;ch h&agrave;ng kh&ocirc;ng cung cấp được mẫu h&agrave;ng bị lỗi, bị hỏng.</li>\r\n	<li>Kh&aacute;ch h&agrave;ng để sản phẩm bị hết hạn, mở sản phẩm ra sử dụng nhưng kh&ocirc;ng sử dụng li&ecirc;n tục, để l&acirc;u dẫn đến t&igrave;nh trạng sản phẩm bị thay đổi m&ugrave;i vị, xuất hiện hiện tượng vi khuẩn, nấm mốc x&acirc;m nhập.</li>\r\n</ul>', '2021-07-24 13:59:55', '2021-07-24 06:59:55'),
(4, 'Giao hàng nhanh chóng', 'Capture15.PNG', '<p>Tr&ecirc;n địa b&agrave;n TP.Hồ Ch&iacute; Minh</p>', '<p>&nbsp;</p>\r\n\r\n<h2><a name=\"chinhsachvanchuyen\"></a>2. CH&Iacute;NH S&Aacute;CH VẬN CHUYỂN</h2>\r\n\r\n<p><strong>&ndash; Kh&aacute;ch h&agrave;ng ở nội th&agrave;nh H&agrave; Nội:</strong><br />\r\n+ Qu&yacute; kh&aacute;ch nhận h&agrave;ng trong v&ograve;ng 24h.<br />\r\n+ Ph&iacute; vận chuyển t&ugrave;y thuộc v&agrave;o ch&iacute;nh s&aacute;ch của đơn vị vận chuyển (Ahamove, Grab,&hellip;) tại thời điểm mua h&agrave;ng.</p>\r\n\r\n<p><strong>&ndash; Kh&aacute;ch h&agrave;ng ở ngoại tỉnh:</strong><br />\r\nĐể đảm bảo an to&agrave;n v&agrave; tiện lợi nhất cho qu&yacute; kh&aacute;ch h&agrave;ng, C&ocirc;ng ty đ&atilde; k&yacute; kết hợp đồng với c&aacute;c đơn vị vận chuyển: Giaohangtietkiem, Giaohangnhanh,&hellip;<br />\r\n+ Ở th&agrave;nh phố lớn: Qu&yacute; kh&aacute;ch h&agrave;ng nhận h&agrave;ng sau 2-3 ng&agrave;y l&agrave;m việc (trừ thứ 7 v&agrave; CN)<br />\r\n+ Ở l&agrave;ng, x&atilde;,&hellip;: Qu&yacute; kh&aacute;ch nhận h&agrave;ng sau 4-5 ng&agrave;y l&agrave;m việc (trừ thứ 7 v&agrave; CN)<br />\r\n+ Ph&iacute; vận chuyển t&ugrave;y thuộc v&agrave;o ch&iacute;nh s&aacute;ch của đơn vị vận chuyển tại thời điểm mua h&agrave;ng</p>\r\n\r\n<p><em><strong>Lưu &yacute;:</strong></em><br />\r\n&ndash; Kh&aacute;ch h&agrave;ng được miễn ph&iacute; vận chuyển khi mua h&agrave;ng với h&oacute;a đơn từ 1.000.000 vnđ trở l&ecirc;n.<br />\r\n&ndash; Khi kh&aacute;ch h&agrave;ng đặt mua trực tiếp tại c&aacute;c trang TMĐT của C&ocirc;ng ty. Qu&yacute; kh&aacute;ch vui l&ograve;ng theo d&otilde;i đơn h&agrave;ng theo ch&iacute;nh s&aacute;ch vận chuyển của b&ecirc;n đối t&aacute;c.<br />\r\n&ndash; Ngay sau khi nhận h&agrave;ng bạn kiểm tra nội dung th&ocirc;ng tin tr&ecirc;n vận đơn đảm bảo đ&uacute;ng t&ecirc;n người nhận, người gửi, m&ocirc; tả h&agrave;ng h&oacute;a.<br />\r\n&ndash; Kiểm tra hiện trạng b&ecirc;n ngo&agrave;i bưu phẩm: nếu c&oacute; dấu hiệu bất thường như ướt, r&aacute;ch cần phải y&ecirc;u cầu b&ecirc;n chuyển ph&aacute;t nhanh lập bi&ecirc;n bản trước khi mở bưu phẩm.<br />\r\n&ndash; Mở bưu phẩm kiểm tra xem c&oacute; đ&uacute;ng như đơn h&agrave;ng bạn đặt mua kh&ocirc;ng, t&igrave;nh trạng h&agrave;ng h&oacute;a.<br />\r\n&ndash; Nếu c&oacute; bất kỳ dấu hiệu bất thường, hư hỏng, sai lệch n&agrave;o, bạn li&ecirc;n lạc với hotline của ch&uacute;ng t&ocirc;i để giải quyết. Sau 12 tiếng kể khi h&agrave;ng đ&atilde; được giao,c&aacute;c khiếu nại li&ecirc;n quan đến t&igrave;nh trạng h&agrave;ng h&oacute;a, bưu phẩm của bạn sẽ kh&ocirc;ng c&oacute; hiệu lực.</p>\r\n\r\n<p><em><strong>Nếu c&oacute; bất kỳ vấn đề n&agrave;o cần hỗ trợ, qu&yacute; kh&aacute;ch h&agrave;ng vui l&ograve;ng li&ecirc;n hệ qua website hoặc tổng đ&agrave;i tư vấn của Buonavn. Ch&uacute;ng t&ocirc;i lu&ocirc;n lu&ocirc;n hỗ trợ để quyền lợi của qu&yacute; kh&aacute;ch được đảm bảo tốt nhất.</strong></em></p>\r\n\r\n<h2>&nbsp;</h2>', '2021-08-13 12:49:55', '2021-08-13 05:49:55'),
(3, 'Nhiều lựa chọn', 'Capture40.PNG', '<p>k&iacute;ch thước,gi&aacute; cả</p>', '<p><strong>6. Ph&iacute; vận chuyển</strong></p>\r\n\r\n<p>Tại H&agrave; Nội, Tp. Hồ Ch&iacute; Minh, Đ&agrave; Nẵng, Hội An &amp; Huế: 250.000đ/ lần.</p>\r\n\r\n<p>C&aacute;c tỉnh th&agrave;nh kh&aacute;c: Tuỳ theo biểu ph&iacute; vận chuyển của b&ecirc;n thứ ba.</p>\r\n\r\n<p>&Aacute;p dụng cho trường hợp kh&aacute;ch sử dụng dịch vụ vận chuyển của BAYA để:</p>\r\n\r\n<ul>\r\n	<li>Đổi trả h&agrave;ng.</li>\r\n	<li>Dịch vụ giao h&agrave;ng tận nh&agrave; sau 2 lần giao h&agrave;ng kh&ocirc;ng th&agrave;nh c&ocirc;ng.</li>\r\n	<li>Giao h&agrave;ng tối sau 17h v&agrave;o c&aacute;c ng&agrave;y thứ ba, thứ năm, thứ bảy h&agrave;ng tuần.</li>\r\n</ul>\r\n\r\n<p>C&aacute;c loại ph&iacute; ph&aacute;t sinh theo quy định của Ban Quản l&yacute; nơi cư tr&uacute; li&ecirc;n quan đến việc giao h&agrave;ng bằng xe tải, sử dụng thang m&aacute;y&hellip; sẽ do kh&aacute;ch h&agrave;ng thanh to&aacute;n.</p>', '2021-09-14 02:44:24', '2021-09-13 19:44:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
CREATE TABLE IF NOT EXISTS `product_attribute` (
  `attr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`attr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_attribute`
--

INSERT INTO `product_attribute` (`attr_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(29, 'size', 'Nhỏ', '2021-06-28 03:11:17', '2021-06-28 03:11:17'),
(30, 'size', 'Vừa', '2021-06-28 21:18:28', '2021-06-28 21:18:28'),
(31, 'size', 'Lớn', '2021-07-07 19:37:24', '2021-07-07 19:37:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `images` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=432 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`image_id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(177, 48, '7218.PNG', '2021-07-03 02:33:32', '2021-07-03 02:33:32'),
(225, 82, '1878.png', '2021-07-10 06:28:21', '2021-07-10 06:28:21'),
(226, 82, '472.png', '2021-07-10 06:28:25', '2021-07-10 06:28:25'),
(230, 80, '4645.png', '2021-07-10 06:29:00', '2021-07-10 06:29:00'),
(231, 79, '1305.png', '2021-07-10 06:29:11', '2021-07-10 06:29:11'),
(232, 79, '7844.png', '2021-07-10 06:29:14', '2021-07-10 06:29:14'),
(251, 76, '8669.png', '2021-07-10 06:32:09', '2021-07-10 06:32:09'),
(252, 76, '1966.png', '2021-07-10 06:32:12', '2021-07-10 06:32:12'),
(261, 71, '5179.png', '2021-07-10 06:33:32', '2021-07-10 06:33:32'),
(262, 71, '4080.png', '2021-07-10 06:33:35', '2021-07-10 06:33:35'),
(263, 70, '5130.png', '2021-07-10 06:33:45', '2021-07-10 06:33:45'),
(264, 70, '4673.png', '2021-07-10 06:33:48', '2021-07-10 06:33:48'),
(265, 69, '7038.png', '2021-07-10 06:34:07', '2021-07-10 06:34:07'),
(266, 69, '7268.png', '2021-07-10 06:34:17', '2021-07-10 06:34:17'),
(275, 64, '2104.png', '2021-07-10 06:35:36', '2021-07-10 06:35:36'),
(276, 64, '2880.png', '2021-07-10 06:35:41', '2021-07-10 06:35:41'),
(277, 63, '8296.png', '2021-07-10 06:36:07', '2021-07-10 06:36:07'),
(278, 63, '6362.png', '2021-07-10 06:36:10', '2021-07-10 06:36:10'),
(279, 62, '2678.png', '2021-07-10 06:36:37', '2021-07-10 06:36:37'),
(281, 62, '7218.png', '2021-07-10 06:36:50', '2021-07-10 06:36:50'),
(288, 57, '8209.png', '2021-07-10 06:37:54', '2021-07-10 06:37:54'),
(289, 57, '4752.png', '2021-07-10 06:37:59', '2021-07-10 06:37:59'),
(291, 56, '3970.png', '2021-07-10 06:38:25', '2021-07-10 06:38:25'),
(294, 54, '2367.png', '2021-07-10 06:38:51', '2021-07-10 06:38:51'),
(295, 54, '2411.png', '2021-07-10 06:38:54', '2021-07-10 06:38:54'),
(296, 53, '9971.png', '2021-07-10 06:39:13', '2021-07-10 06:39:13'),
(297, 53, '6817.png', '2021-07-10 06:39:16', '2021-07-10 06:39:16'),
(298, 52, '8579.png', '2021-07-10 06:39:30', '2021-07-10 06:39:30'),
(299, 52, '4832.png', '2021-07-10 06:39:36', '2021-07-10 06:39:36'),
(300, 51, '7080.png', '2021-07-10 06:39:49', '2021-07-10 06:39:49'),
(301, 51, '8211.png', '2021-07-10 06:39:52', '2021-07-10 06:39:52'),
(306, 48, '9098.png', '2021-07-10 06:41:51', '2021-07-10 06:41:51'),
(311, 45, '9060.png', '2021-07-10 06:42:57', '2021-07-10 06:42:57'),
(312, 45, '2893.png', '2021-07-10 06:43:01', '2021-07-10 06:43:01'),
(350, 211, '7297.png', '2021-09-15 19:32:08', '2021-09-15 19:32:08'),
(351, 211, '8970.png', '2021-09-15 19:32:08', '2021-09-15 19:32:08'),
(352, 212, '8623.png', '2021-09-15 19:33:19', '2021-09-15 19:33:19'),
(356, 209, '3968.png', '2021-09-15 19:33:48', '2021-09-15 19:33:48'),
(357, 209, '5420.png', '2021-09-15 19:33:48', '2021-09-15 19:33:48'),
(358, 208, '2687.png', '2021-09-15 19:34:00', '2021-09-15 19:34:00'),
(359, 208, '5561.png', '2021-09-15 19:34:00', '2021-09-15 19:34:00'),
(360, 207, '9226.png', '2021-09-15 19:34:13', '2021-09-15 19:34:13'),
(361, 207, '8214.png', '2021-09-15 19:34:13', '2021-09-15 19:34:13'),
(362, 206, '3409.png', '2021-09-15 19:34:25', '2021-09-15 19:34:25'),
(363, 206, '9610.png', '2021-09-15 19:34:25', '2021-09-15 19:34:25'),
(378, 212, '1833.png', '2021-11-02 20:16:43', '2021-11-02 20:16:43'),
(386, 80, '3368.png', '2021-11-02 20:23:38', '2021-11-02 20:23:38'),
(387, 55, '8002.png', '2021-11-02 20:24:10', '2021-11-02 20:24:10'),
(388, 55, '950.png', '2021-11-02 20:24:17', '2021-11-02 20:24:17'),
(389, 56, '8528.png', '2021-11-02 20:24:50', '2021-11-02 20:24:50'),
(398, 47, '9274.png', '2021-11-07 03:27:25', '2021-11-07 03:27:25'),
(399, 47, '7894.png', '2021-11-07 03:27:25', '2021-11-07 03:27:25'),
(400, 216, '6740.png', '2021-11-07 06:53:26', '2021-11-07 06:53:26'),
(401, 216, '5788.png', '2021-11-07 06:53:27', '2021-11-07 06:53:27'),
(404, 217, '4339.png', '2021-11-07 06:54:29', '2021-11-07 06:54:29'),
(405, 217, '3348.png', '2021-11-07 06:54:30', '2021-11-07 06:54:30'),
(406, 218, '2678.png', '2021-11-07 06:55:23', '2021-11-07 06:55:23'),
(407, 218, '2857.png', '2021-11-07 06:55:24', '2021-11-07 06:55:24'),
(408, 219, '8564.png', '2021-11-07 06:56:20', '2021-11-07 06:56:20'),
(409, 219, '3484.png', '2021-11-07 06:56:20', '2021-11-07 06:56:20'),
(410, 220, '8426.png', '2021-11-07 06:57:21', '2021-11-07 06:57:21'),
(411, 220, '762.png', '2021-11-07 06:57:21', '2021-11-07 06:57:21'),
(412, 221, '9997.png', '2021-11-07 06:58:26', '2021-11-07 06:58:26'),
(413, 221, '8592.png', '2021-11-07 06:58:27', '2021-11-07 06:58:27'),
(414, 222, '4216.png', '2021-11-07 06:59:16', '2021-11-07 06:59:16'),
(415, 222, '4421.png', '2021-11-07 06:59:17', '2021-11-07 06:59:17'),
(416, 223, '6823.png', '2021-11-07 07:00:16', '2021-11-07 07:00:16'),
(417, 223, '3501.png', '2021-11-07 07:00:17', '2021-11-07 07:00:17'),
(418, 224, '8120.png', '2021-11-07 07:01:41', '2021-11-07 07:01:41'),
(419, 224, '3292.png', '2021-11-07 07:01:42', '2021-11-07 07:01:42'),
(420, 226, '3876.png', '2021-11-07 07:04:24', '2021-11-07 07:04:24'),
(421, 226, '964.png', '2021-11-07 07:04:24', '2021-11-07 07:04:24'),
(422, 225, '6840.png', '2021-11-07 07:04:39', '2021-11-07 07:04:39'),
(423, 225, '8395.png', '2021-11-07 07:04:40', '2021-11-07 07:04:40'),
(424, 227, '5520.png', '2021-11-07 07:07:18', '2021-11-07 07:07:18'),
(425, 227, '6914.png', '2021-11-07 07:07:19', '2021-11-07 07:07:19'),
(426, 228, '2603.png', '2021-11-07 07:08:11', '2021-11-07 07:08:11'),
(427, 228, '4217.png', '2021-11-07 07:08:12', '2021-11-07 07:08:12'),
(428, 229, '5889.png', '2021-11-07 07:08:56', '2021-11-07 07:08:56'),
(429, 229, '5913.png', '2021-11-07 07:08:56', '2021-11-07 07:08:56'),
(430, 230, '4161.png', '2021-11-07 07:09:42', '2021-11-07 07:09:42'),
(431, 230, '2841.png', '2021-11-07 07:09:43', '2021-11-07 07:09:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_addvertised`
--

DROP TABLE IF EXISTS `tbl_addvertised`;
CREATE TABLE IF NOT EXISTS `tbl_addvertised` (
  `quangcao_id` int(11) NOT NULL AUTO_INCREMENT,
  `quangcao_name` varchar(255) NOT NULL,
  `hinh_quangcao` varchar(255) NOT NULL,
  `quangcao_status` int(10) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`quangcao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_addvertised`
--

INSERT INTO `tbl_addvertised` (`quangcao_id`, `quangcao_name`, `hinh_quangcao`, `quangcao_status`, `link`, `created_at`, `updated_at`) VALUES
(1, 'trà sữa', 'gettyimages-1157712696-2048x204865.jpg', 0, 'https://google.com', '2021-11-03 03:47:10', '2021-11-02 20:47:10'),
(2, 'trà', 'photo-1541696490-8744a5dc022868.jfif', 0, 'https://youtobe.com', '2021-11-03 03:47:12', '2021-11-02 20:47:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `created_at`, `updated_at`, `status`, `email`, `password`, `name`, `phone`) VALUES
(5, '2021-06-08 01:56:57', '2021-06-08 01:56:57', 1, 'admin@gmail.com', '$2y$10$EQEqaY0mtni5ZCLKsc2E.ee2P5h7w1wDZgd2cRrCOgMNtff/eOv0K', 'Nguyễn Thành Trung', '0585861855');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_post`
--

DROP TABLE IF EXISTS `tbl_category_post`;
CREATE TABLE IF NOT EXISTS `tbl_category_post` (
  `cate_post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_post_name` tinytext NOT NULL,
  `cate_post_status` int(10) NOT NULL,
  `cate_post_slug` varchar(255) NOT NULL,
  `cate_post_desc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cate_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_post`
--

INSERT INTO `tbl_category_post` (`cate_post_id`, `cate_post_name`, `cate_post_status`, `cate_post_slug`, `cate_post_desc`, `created_at`, `updated_at`) VALUES
(8, 'trà sữa và sức khỏe', 0, 'tra-sua-va-suc-khoe', 'Trà sữa là một thức uống phổ biến và được ưa thích hiện nay. Tuy nhiên, uống quá nhiều trà sữa sẽ có nhiều ảnh hưởng nguy hiểm đến sức khỏe.', '2021-07-03 02:02:42', '2021-07-03 02:02:42'),
(9, 'Quán Trà Sữa', 0, 'quan-tra-sua', 'Hầu hết ai cũng vứt bỏ thứ này khi uống trà sữa trân châu, giờ biết được công dụng thật của nó mới bất ngờ', '2021-10-31 03:06:30', '2021-10-30 20:06:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

DROP TABLE IF EXISTS `tbl_category_product`;
CREATE TABLE IF NOT EXISTS `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(4, 'LATTE SERIES', '<p>LATTE SERIES</p>', 1, '2021-06-27 07:04:12', '2021-11-06 21:35:51'),
(5, 'THỨC UỐNG ĐẶC BIỆT TEAMILK', 'THỨC UỐNG ĐẶC BIỆT TEAMILK', 1, '2021-06-27 07:05:13', '2021-06-27 07:05:13'),
(6, 'TRÀ SỮA', 'TRÀ SỮA', 1, '2021-06-27 07:05:25', '2021-06-27 07:05:25'),
(7, 'TRÀ NGUYÊN CHẤT', 'TRÀ NGUYÊN CHẤT', 1, '2021-06-27 07:05:37', '2021-06-27 07:05:37'),
(8, 'THỨC UỐNG SÁNG TẠO', 'THỨC UỐNG SÁNG TẠO', 1, '2021-06-27 07:05:49', '2021-06-27 07:05:49'),
(9, 'THỨC UỐNG ĐÁ XAY', 'THỨC UỐNG ĐÁ XAY', 1, '2021-06-27 07:06:08', '2021-06-27 07:06:08'),
(10, 'TOPPING', '<p>TOPPING</p>', 1, '2021-06-27 07:06:19', '2021-09-09 18:59:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_product_id` int(10) UNSIGNED NOT NULL,
  `comment_parent_comment` int(10) NOT NULL,
  `comment_status` int(10) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `comment_product_id` (`comment_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment`, `comment_date`, `comment_product_id`, `comment_parent_comment`, `comment_status`, `comment_name`, `created_at`, `updated_at`) VALUES
(103, 'ngon', '2021-09-11 02:02:02', 57, 0, 0, 'tan tai', '2021-09-11 02:02:02', '2021-09-11 02:02:02'),
(104, 'dat', '2021-09-11 02:02:19', 57, 103, 0, 'tan dat', '2021-09-11 02:02:19', '2021-09-11 02:02:19'),
(105, 'miss', '2021-09-11 02:02:44', 57, 103, 0, 'join', '2021-09-11 02:02:44', '2021-09-11 02:02:44'),
(106, 'ngon', '2021-09-11 02:03:02', 57, 0, 0, 'van anh', '2021-09-11 02:03:02', '2021-09-11 02:03:02'),
(107, 'sfsdf', '2021-09-11 02:03:47', 57, 106, 0, 'gs', '2021-09-11 02:03:47', '2021-09-11 02:03:47'),
(110, 'binh luan', '2021-09-11 06:11:37', 71, 0, 0, 'tai', '2021-09-11 06:11:37', '2021-09-11 06:11:37'),
(111, 'hay', '2021-09-11 06:11:46', 71, 110, 0, 'dat', '2021-09-11 06:11:46', '2021-09-11 06:11:46'),
(117, 'adfadf', '2021-09-12 03:02:33', 52, 0, 0, 'ádf', '2021-09-12 03:02:33', '2021-09-12 03:02:33'),
(118, 'dfgsdf', '2021-09-12 03:02:46', 52, 117, 0, 'f', '2021-09-12 03:02:46', '2021-09-12 03:02:46'),
(119, 'dfgdf', '2021-09-12 03:05:01', 52, 0, 0, 'sdg', '2021-09-12 03:05:01', '2021-09-12 03:05:01'),
(120, 'sdfd', '2021-09-12 03:07:36', 52, 119, 0, 'samsung note 10', '2021-09-12 03:07:36', '2021-09-12 03:07:36'),
(121, 'zxcvzcxvz', '2021-09-12 03:09:07', 52, 119, 0, 'xcvzc', '2021-09-12 03:09:07', '2021-09-12 03:09:07'),
(122, 'sdfsdf', '2021-09-12 03:09:42', 52, 119, 0, 'sfs', '2021-09-12 03:09:42', '2021-09-12 03:09:42'),
(123, 'adfa', '2021-09-12 03:11:52', 52, 0, 0, 'dà', '2021-09-12 03:11:52', '2021-09-12 03:11:52'),
(124, 'ád', '2021-09-12 03:13:00', 52, 0, 0, 'jonson', '2021-09-12 03:13:00', '2021-09-12 03:13:00'),
(125, 'thèn chó', '2021-09-12 03:14:06', 52, 117, 0, 'tai', '2021-09-12 03:14:06', '2021-09-12 03:14:06'),
(130, 'dfsdf', '2021-09-15 12:33:41', 54, 0, 0, 'tantai', '2021-09-15 12:33:41', '2021-09-15 12:33:41'),
(131, 'fgfd', '2021-09-15 12:33:46', 54, 130, 0, 'dfd', '2021-09-15 12:33:46', '2021-09-15 12:33:46'),
(132, 'cvxcv', '2021-09-15 12:33:57', 54, 0, 0, 'nick jason', '2021-09-15 12:33:57', '2021-09-15 12:33:57'),
(134, 'ta', '2021-09-18 11:42:14', 212, 0, 0, 'tantai', '2021-09-18 11:42:14', '2021-09-18 11:42:14'),
(135, 'ádfads', '2021-09-18 11:42:21', 212, 134, 0, 'èa', '2021-09-18 11:42:21', '2021-09-18 11:42:21'),
(136, 'hay', '2021-10-07 09:34:34', 209, 0, 0, 'tai', '2021-10-07 09:34:34', '2021-10-07 09:34:34'),
(137, 'ok', '2021-10-07 09:34:48', 209, 136, 0, 'hai', '2021-10-07 09:34:48', '2021-10-07 09:34:48'),
(147, 'tra sua', '2021-10-16 03:56:23', 211, 0, 0, 'tra', '2021-10-16 03:56:23', '2021-10-16 03:56:23'),
(148, 'yes', '2021-10-16 03:56:39', 211, 147, 0, 'ngon', '2021-10-16 03:56:39', '2021-10-16 03:56:39'),
(159, 'ádf', '2021-10-27 11:52:36', 52, 0, 0, 'adsf', '2021-10-27 11:52:36', '2021-10-27 11:52:36'),
(160, 'hay', '2021-10-27 11:52:44', 52, 0, 0, 'tai', '2021-10-27 11:52:44', '2021-10-27 11:52:44'),
(161, 'ngon', '2021-10-27 11:52:53', 52, 160, 0, 'hai', '2021-10-27 11:52:53', '2021-10-27 11:52:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_coupon`
--

DROP TABLE IF EXISTS `tbl_coupon`;
CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(150) NOT NULL,
  `coupon_time` int(50) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `start_day` varchar(50) DEFAULT NULL,
  `end_day` varchar(50) DEFAULT NULL,
  `coupon_status` int(11) DEFAULT '1',
  `coupon_used` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_time`, `coupon_condition`, `coupon_number`, `coupon_code`, `start_day`, `end_day`, `coupon_status`, `coupon_used`) VALUES
(39, 'phụ nữ việt nam', 20, 1, 20, '123', '2021/11/07', '2021/11/30', 1, NULL),
(40, 'Giảm t1', 2, 1, 10, 'abc', '2023/01/02', '2023/01/31', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

DROP TABLE IF EXISTS `tbl_customers`;
CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code_active` text COLLATE utf8mb4_unicode_ci,
  `custommer_vip` int(10) DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci,
  `code_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`, `code_active`, `custommer_vip`, `code`, `code_time`) VALUES
(20, 'jason', '0306171389@caothang.edu.vn', '25f9e794323b453885f5181f1b624d0b', '0585861855', NULL, '2021-10-23 19:51:14', '$2y$10$aW.YZ5ATPeLWXwHeZljeS.HG6ox0l0vtVluV7OSMi3F55CuXKnkLG', NULL, '$2y$10$EqWVtwDSOE8cmLS/CH5gpeg.uABwDaPcCPMnzvogOaBHEy83ys/BS', '2021-10-23 19:50:40'),
(21, 'Nguyễn Tấn Tài', 'tantaiIT3000@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0585423658', NULL, '2021-11-01 07:42:26', '$2y$10$SkXHycNOWzSLUKm9YbFZKOiDAAmPTYB5d0iIy825m9TL0YJ/zh/Z2', NULL, '$2y$10$KHXxBGHWOi9sqBai.eqQVuB5ZBQrf51YRBNZZaV5po1G1MHF2ET4G', '2021-11-01 07:41:40'),
(22, 'Nguyễn Tài', 'tantaiIT3000@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0585423658', NULL, '2021-11-01 07:42:26', '$2y$10$SkXHycNOWzSLUKm9YbFZKOiDAAmPTYB5d0iIy825m9TL0YJ/zh/Z2', NULL, '$2y$10$KHXxBGHWOi9sqBai.eqQVuB5ZBQrf51YRBNZZaV5po1G1MHF2ET4G', NULL),
(23, 'Trần Trung', 'trungtran2692000@gmail.com', '', '', '2021-11-03 06:49:56', '2021-11-03 06:49:56', NULL, NULL, NULL, NULL),
(24, 'Nguyễn Thành Trung', 'nguyenkhanhstmqn@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0999999994', NULL, NULL, '$2y$10$MYtYAZT74ocrtnv8DQsCZu76xV6KH7eB5RzOhQB04uT9RAnGbqcDS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_infomation`
--

DROP TABLE IF EXISTS `tbl_infomation`;
CREATE TABLE IF NOT EXISTS `tbl_infomation` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_contact` mediumtext NOT NULL,
  `info_map` text NOT NULL,
  `info_logo` varchar(255) NOT NULL,
  `info_fanpage` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_infomation`
--

INSERT INTO `tbl_infomation` (`info_id`, `info_contact`, `info_map`, `info_logo`, `info_fanpage`, `created_at`, `updated_at`) VALUES
(1, '<p><span style=\"font-size:18px\">Địa chỉ: Tầng 3 số 102 Nơ Trang Long, P.13, Q.B&igrave;nh Thạnh, HCM</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Email: TrasuaTeaMilk@gmail.com</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Hotline: 0966342792 hoặc 0966342709</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Website: http://google.com.vn.</span></p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.074425170947!2d106.69275991474917!3d10.80561179230171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528c6b3087445%3A0x9f9e59544876ddf!2zMzU2LCA3IE7GoSBUcmFuZyBMb25nLCBwaMaw4budbmcgNywgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1625906869368!5m2!1svi!2s\" width=\"1250\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'gettyimages-1157712696-2048x204819.jpg', '<div id=\"fb-root\"></div>\r\n            <script async defer crossorigin=\"anonymous\" src=\"https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=2339123679735877&autoLogAppEvents=1\" nonce=\"2RfDRhZm\"></script>\r\n<div class=\"fb-page\" \r\ndata-tabs=\"timeline,events,messages\"\r\ndata-href=\"https://www.facebook.com/trasuafeelingtea/\"\r\ndata-width=\"380\" \r\ndata-hide-cover=\"false\"></div>', '2021-11-05 03:38:01', '2021-06-11 04:33:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_intro`
--

DROP TABLE IF EXISTS `tbl_intro`;
CREATE TABLE IF NOT EXISTS `tbl_intro` (
  `intro_id` int(11) NOT NULL AUTO_INCREMENT,
  `intro_title` varchar(100) NOT NULL,
  `intro_desc` text NOT NULL,
  `intro_content` text NOT NULL,
  `intro_image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`intro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_intro`
--

INSERT INTO `tbl_intro` (`intro_id`, `intro_title`, `intro_desc`, `intro_content`, `intro_image`, `created_at`, `updated_at`) VALUES
(1, 'Các Loại Trà Ngon Nổi Tiếng Của Việt Nam', '<p>Tr&agrave; bưởi giảm c&acirc;n l&agrave; xu hướng giảm c&acirc;n mới xuất hiện gần đ&acirc;y. Tr&agrave; bưởi nhập từ H&agrave;n Quốc được đ&oacute;ng g&oacute;i dưới dạng tr&agrave; ho&agrave; tan rất tiện dụng. Nhưng bạn c&oacute; biết l&agrave; bạn c&oacute; thể l&agrave;m tr&agrave; bưởi giảm c&acirc;n tại nh&agrave; cực kỳ đơn giản kh&ocirc;ng? Tại Việt Nam, cứ&nbsp; như thế</p>', '<p style=\"text-align:justify\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:20px\">C&aacute;c loại tr&agrave; ngon của Việt Nam c&oacute; chất lượng rất cao. Thậm ch&iacute; c&oacute; chất lượng tương đương với c&aacute;c loại tr&agrave; ngon đến từ những quốc gia trồng tr&agrave; lớn kh&aacute;c. V&agrave; b&agrave;i viết n&agrave;y sẽ liệt k&ecirc; c&aacute;c loại tr&agrave; ngon v&agrave; qu&yacute; của nước ta để qu&yacute; bạn đọc tham khảo nh&eacute;</span></span></p>', 'gettyimages-1157712696-2048x20481.jpg', '2021-10-30 03:32:21', '2021-10-29 20:32:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `order_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_id` int(11) UNSIGNED NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_destroy` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`,`shipping_id`),
  KEY `shipping_id` (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_feeship` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_coupon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `product_size` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_details_id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE IF NOT EXISTS `tbl_post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `post_title` tinytext NOT NULL,
  `post_views` varchar(50) DEFAULT NULL,
  `post_slug` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_desc` text NOT NULL,
  `post_meta_desc` text NOT NULL,
  `post_meta_keywords` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `cate_post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_status` int(10) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `cate_post_id` (`cate_post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_title`, `post_views`, `post_slug`, `post_content`, `post_desc`, `post_meta_desc`, `post_meta_keywords`, `post_image`, `cate_post_id`, `created_at`, `updated_at`, `post_status`) VALUES
(23, 'Trà sữa - món ăn tin thần cho giới trẻ', '84', 'tra-sua-mon-an-tin-than-cho-gioi-tre', '<p><a href=\"https://media-cdn.laodong.vn/storage/newsportal/2019/8/21/750446/Bubblea-Milk-Tea-Hea.jpg\"><img alt=\"Trà sữa có nhiều tác dụng phụ khi uống quá nhiều. Ảnh: Healthy24h.com.\" src=\"https://media-cdn.laodong.vn/storage/newsportal/2019/8/21/750446/Bubblea-Milk-Tea-Hea.jpg?w=888&amp;h=592&amp;crop=auto&amp;scale=both\" style=\"height:592px; width:888px\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Tr&agrave; sữa c&oacute; nhiều t&aacute;c dụng phụ khi uống qu&aacute; nhiều.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tr&agrave; sữa l&agrave; một thức uống phổ biến v&agrave; được ưa th&iacute;ch hiện nay. Tuy nhi&ecirc;n, uống qu&aacute; nhiều tr&agrave; sữa sẽ c&oacute; nhiều ảnh hưởng nguy hiểm đến sức khỏe.</p>\r\n\r\n<p><strong>1. B&eacute;o ph&igrave;</strong></p>\r\n\r\n<p>Tr&agrave; sữa l&agrave; một trong những nguy&ecirc;n nh&acirc;n g&acirc;y b&eacute;o ph&igrave; do lượng đường v&agrave; calo cực lớn.&nbsp;Th&agrave;nh phần của tr&agrave; sữa l&agrave; kem b&eacute;o trộn với bột tr&agrave; v&agrave; phụ gia, buộc cơ thể phải hấp thụ nhiều chất b&eacute;o b&atilde;o h&ograve;a, dẫn đến tăng c&acirc;n nhanh ch&oacute;ng.</p>\r\n\r\n<p><strong>2. Thiếu dinh dưỡng</strong></p>\r\n\r\n<p>Cơ thể b&eacute;o kh&ocirc;ng c&oacute; nghĩa l&agrave; do nhận được nhiều chất dinh dưỡng.&nbsp;Sữa trong tr&agrave; sữa c&oacute; &iacute;t canxi, vitamin (A, B v&agrave; D) cũng như protein hơn sữa th&ocirc;ng thường.&nbsp;Do đ&oacute;, thức uống n&agrave;y sẽ g&acirc;y thiếu hụt dinh dưỡng.&nbsp;Trẻ em trong độ tuổi học sinh cần đặc biệt ch&uacute; &yacute; đến t&aacute;c hại của tr&agrave; sữa đối với qu&aacute; tr&igrave;nh ph&aacute;t triển.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ vậy, c&aacute;c chuy&ecirc;n gia dinh dưỡng cũng khuy&ecirc;n rằng pha tr&agrave; sữa tự chế l&agrave; phản khoa học.&nbsp;L&yacute; do l&agrave; kết hợp tr&agrave; với sữa sẽ l&agrave;m mất t&aacute;c dụng tốt đối với sức khỏe.&nbsp;</p>\r\n\r\n<p><strong>3. Uống qu&aacute; nhiều dẫn đến nguy cơ v&ocirc; sinh</strong></p>\r\n\r\n<p>Một trong những t&aacute;c hại của&nbsp;việc uống qu&aacute; nhiều tr&agrave; sữa l&agrave; l&agrave;m tăng nguy cơ v&ocirc; sinh.&nbsp;Nguy&ecirc;n nh&acirc;n đến từ th&agrave;nh phần của dầu thực vật hydro h&oacute;a trong tr&agrave; sữa.&nbsp;Axit b&eacute;o ảnh hưởng xấu đến khả năng sinh sản của người uống rượu.</p>\r\n\r\n<p>Cụ thể, đối với nam giới, chất lượng tinh tr&ugrave;ng sẽ bị giảm do th&agrave;nh phần n&agrave;y ảnh hưởng ti&ecirc;u cực đến nội tiết tố nam.&nbsp;Phụ nữ cũng phải đối mặt nguy cơ v&ocirc; sinh hoặc ung thư v&agrave; c&aacute;c bệnh tim mạch kh&aacute;c.</p>\r\n\r\n<p><strong>4. T&aacute;c dụng phụ đối với gan v&agrave; thận</strong></p>\r\n\r\n<p>Nhiều cửa h&agrave;ng tr&agrave; sữa sử dụng bột m&agrave;u thay v&igrave; bột tr&agrave; tự nhi&ecirc;n.&nbsp;</p>\r\n\r\n<p>Nếu bạn uống qu&aacute; nhiều hoặc lượng chất phụ gia được th&ecirc;m v&agrave;o vượt qu&aacute; ngưỡng an to&agrave;n, sức khỏe của bạn sẽ bị ảnh hưởng rất nhiều.&nbsp;Cụ thể, khi ch&uacute;ng được t&iacute;ch lũy trong thời gian d&agrave;i, ch&uacute;ng sẽ l&agrave; g&aacute;nh nặng của gan v&agrave; thận, l&agrave;m suy giảm chức năng của c&aacute;c bộ phận n&agrave;y.</p>\r\n\r\n<p><strong>5. Ngộ độc</strong></p>\r\n\r\n<p>B&ecirc;n cạnh những t&aacute;c hại của tr&agrave; sữa ở tr&ecirc;n, th&oacute;i quen uống qu&aacute; nhiều c&ograve;n g&acirc;y ra một số hậu quả kh&ocirc;n lường kh&aacute;c.&nbsp;Nếu v&ocirc; t&igrave;nh uống tr&agrave; sữa chế biến với sữa kh&ocirc;ng vệ sinh với nguy&ecirc;n liệu k&eacute;m chất lượng, c&oacute; nguy cơ bị ngộ độc.&nbsp;V&igrave; vậy, hạn chế uống tr&agrave; sữa kh&ocirc;ng r&otilde; nguồn gốc!</p>\r\n\r\n<p><strong>Lời khuy&ecirc;n của c&aacute;c chuy&ecirc;n gia</strong></p>\r\n\r\n<p>- Nếu kh&ocirc;ng thể thiếu tr&agrave; sữa mỗi ng&agrave;y, h&atilde;y học c&aacute;ch từ bỏ th&oacute;i quen đ&oacute; dần dần.</p>\r\n\r\n<p>- Y&ecirc;u cầu c&aacute;c cửa h&agrave;ng giảm đường cho cốc tr&agrave; sữa của bạn</p>\r\n\r\n<p>- N&ecirc;n mua size nhỏ thay v&igrave; size lớn.</p>\r\n\r\n<p>- Chỉ uống tr&agrave; sữa tối đa 2 lần/tuần.</p>\r\n\r\n<p>- Chọn thương hiệu tr&agrave; sữa uy t&iacute;n với thương hiệu r&otilde; r&agrave;ng, nguồn gốc kiểm duyệt.</p>\r\n\r\n<p>- N&ecirc;n t&iacute;ch cực tập thể dục đều đặn mỗi ng&agrave;y để gi&uacute;p kiểm so&aacute;t c&acirc;n nặng, ngăn ngừa thừa c&acirc;n v&agrave; b&eacute;o ph&igrave;.</p>', '<p>Tr&agrave; sữa l&agrave; một thức uống phổ biến v&agrave; được ưa th&iacute;ch hiện nay. Tuy nhi&ecirc;n, uống qu&aacute; nhiều tr&agrave; sữa sẽ c&oacute; nhiều ảnh hưởng nguy hiểm đến sức khỏe.</p>', 'tra sua va suc khoe', 'tra sua va suc khoe', 'gettyimages-1157712696-2048x204849.jpg', 9, '2021-11-03 14:04:48', '2021-11-03 07:04:48', 0),
(24, 'Những Thông tin thú vị về trà sữa', '37', 'nhung-thong-tin-thu-vi-ve-tra-sua', '<p>S&aacute;ng 20.5, C&ocirc;ng an&nbsp;<a href=\"https://laodong.vn/xa-hoi/hang-chuc-hoc-sinh-hai-phong-nhap-vien-sau-khi-uong-nuoc-gi-805965.ldo\" rel=\"external\" title=\"TP.Hải Phòng\">TP.Hải Ph&ograve;ng</a>&nbsp;th&ocirc;ng tin, lực lượng chức năng vừa ph&aacute;t hiện cơ sở chứa số lượng lớn chất phụ gia d&ugrave;ng để chế biến tr&agrave; sữa, nước tr&aacute;i c&acirc;y kh&ocirc;ng r&otilde; nguồn gốc.</p>\r\n\r\n<p>Cụ thể, v&agrave;o 15h ng&agrave;y 18.5, Đội Cảnh s&aacute;t điều tra tội phạm về kinh tế v&agrave; chức vụ C&ocirc;ng an quận L&ecirc; Ch&acirc;n phối hợp với Đội Quản l&yacute; thị trường số 6 - Cục Quản l&yacute; thị trường th&agrave;nh phố kiểm tra đột xuất về lĩnh vực kinh tế, thương mại v&agrave; lĩnh vực an to&agrave;n thực phẩm tại địa chỉ số 1A/188 Chợ H&agrave;ng, phường Dư H&agrave;ng K&ecirc;nh, quận L&ecirc; Ch&acirc;n. Tại đ&acirc;y, lực lượng chức năng ph&aacute;t hiện cơ sở n&agrave;y c&oacute; chứa số lượng lớn phụ gia d&ugrave;ng để chế biến thực phẩm kh&ocirc;ng r&otilde; nguồn gốc, xuất xứ.</p>\r\n\r\n<p>Tại thời điểm kiểm tra, lực lượng chức năng ph&aacute;t hiện 68 th&ugrave;ng catton chứa c&aacute;c m&aacute;y m&oacute;c, phụ kiện li&ecirc;n quan đến chế biến thực phẩm c&oacute; in nh&atilde;n m&aacute;c bằng tiếng nước ngo&agrave;i; 18 th&ugrave;ng catton v&agrave; 5 bao g&oacute;i b&ecirc;n trong chứa chất phụ gia thực phẩm, chất hỗ trợ chế biến thực phẩm (khoảng 450 kg) như tr&agrave; sữa, nước tr&aacute;i c&acirc;y&hellip; Tổng gi&aacute; trị h&agrave;ng h&oacute;a khoảng 100 triệu đồng.</p>\r\n\r\n<p>B&agrave; Nghi&ecirc;m Thị Dung (đại diện cơ sở) cho biết, đ&atilde; mua to&agrave;n bộ số h&agrave;ng h&oacute;a tr&ecirc;n từ nhiều nguồn kh&aacute;c nhau để kinh doanh kiếm lời. Tuy nhi&ecirc;n, b&agrave; Dung kh&ocirc;ng xuất tr&igrave;nh được giấy tờ chứng minh nguồn gốc, xuất xứ số h&agrave;ng h&oacute;a tr&ecirc;n.</p>\r\n\r\n<p>Đội Quản l&yacute; thị trường số 6 đ&atilde; ra quyết định tạm giữ to&agrave;n bộ tang vật v&agrave; lập bi&ecirc;n bản thu giữ l&ocirc; h&agrave;ng, tiếp tục điều tra l&agrave;m r&otilde; theo quy định của ph&aacute;p luật.</p>', '<p>Tại thời điểm kiểm tra, lực lượng chức năng ph&aacute;t hiện cơ sở c&oacute; chứa khoảng 450kg chất phụ gia để chế biến&nbsp;<a href=\"https://laodong.vn/kinh-te/tin-do-tra-sua-ha-noi-nhao-nhac-khi-hay-biet-1-tan-nguyen-lieu-ban-610795.ldo\" rel=\"external\" title=\"trà sữa\">tr&agrave; sữa</a>, nước tr&aacute;i c&acirc;y v&agrave; nhiều m&aacute;y m&oacute;c, thiết bị li&ecirc;n quan kh&ocirc;ng r&otilde; nguồn gốc, xuất xứ.&nbsp;</p>', 'Tại thời điểm kiểm tra, lực lượng chức năng phát hiện cơ sở có chứa khoảng 450kg chất phụ gia để chế biến trà sữa, nước trái cây và nhiều máy móc, thiết bị liên quan không rõ nguồn gốc, xuất xứ. ', 'Tại thời điểm kiểm tra, lực lượng chức năng phát hiện cơ sở có chứa khoảng 450kg chất phụ gia để chế biến trà sữa, nước trái cây và nhiều máy móc, thiết bị liên quan không rõ nguồn gốc, xuất xứ. ', 'khoia mon0.jpg', 9, '2021-11-03 03:39:01', '2021-11-02 20:39:01', 0),
(25, 'Trà sữa và những điều nên biết', '24', 'tra-sua-va-nhung-dieu-nen-biet', '<h3>1V&igrave; sao uống tr&agrave; sữa lại tăng c&acirc;n?</h3>\r\n\r\n<p>Theo hiệp hội tim mạch Hoa Kỳ th&igrave; ở nữ cần khoảng 25g&nbsp;<a href=\"https://www.bachhoaxanh.com/duong\" target=\"_blank\">đường</a>, ở nam khoảng 37,5g đường cho c&aacute;c hoạt động h&agrave;ng ng&agrave;y. Tuy nhi&ecirc;n trong&nbsp;<strong>1 ly tr&agrave; sữa</strong>&nbsp;th&igrave; c&oacute; khoảng&nbsp;<strong>50g đường</strong>&nbsp;lớn hơn rất nhiều m&agrave; lượng đường cơ thể cần.</p>\r\n\r\n<p>Uống tr&agrave; sữa nhiều bạn c&oacute; th&oacute;i quen d&ugrave;ng th&ecirc;m tr&acirc;n ch&acirc;u v&agrave; 1 số&nbsp;<a href=\"https://www.bachhoaxanh.com/kinh-nghiem-hay/cac-loai-topping-dan-nghien-tra-sua-phai-biet-1084978\" target=\"_blank\">topping</a>&nbsp;kh&aacute;c, theo nghi&ecirc;n cứu th&igrave; trong&nbsp;<strong><a href=\"https://www.bachhoaxanh.com/tra-kho-tui-loc/tran-chau-thuy-tinh-yoki-hop-300g\" target=\"_blank\">tr&acirc;n ch&acirc;u</a>&nbsp;chứa khoảng 65% tinh bột</strong>, tinh bột sau khi cơ thể ti&ecirc;u ho&aacute; th&igrave; chuyển ho&aacute; th&agrave;nh đường.</p>\r\n\r\n<p>Nếu t&iacute;nh về calo th&igrave; trong&nbsp;<strong>1 ly tr&agrave; sữa</strong>&nbsp;c&oacute; chứa khoảng&nbsp;<strong>340 calo</strong>, vậy với c&aacute;c bạn&nbsp;<strong>uống 2-3 ly</strong>&nbsp;một ng&agrave;y th&igrave; lượng calo tăng l&ecirc;n rất nhiều c&ugrave;ng với c&aacute;c thức ăn kh&aacute;c trong ng&agrave;y dẫn đến&nbsp;<strong>dư lượng calo</strong>&nbsp;m&agrave; cơ thể cần.</p>\r\n\r\n<p>V&igrave; vậy nếu&nbsp;<strong>uống nhiều tr&agrave; sữa trong ng&agrave;y</strong>&nbsp;dẫn đến dư lượng đường v&agrave; calo m&agrave; cơ thể cần, đặc biệt với người &iacute;t vận động th&igrave; nguy cơ<strong>&nbsp;tăng c&acirc;n, tăng mỡ bụng l&agrave; kh&ocirc;ng thể tr&aacute;nh khỏi.</strong></p>\r\n\r\n<p><img alt=\"Nếu uống nhiều trà sữa trong ngày dẫn đến tăng cân, tăng mỡ bụng\" src=\"https://cdn.tgdd.vn/Files/2017/11/24/1044354/10-tac-hai-dang-gom-cua-tra-sua-gioi-tre-can-phai-can-nhac-202107141704550689.jpg\" title=\"Nếu uống nhiều trà sữa trong ngày dẫn đến tăng cân, tăng mỡ bụng\" />Nếu uống nhiều tr&agrave; sữa trong ng&agrave;y dẫn đến tăng c&acirc;n, tăng mỡ bụng</p>\r\n\r\n<h3>2Th&agrave;nh phần ch&iacute;nh trong một ly tr&agrave; sữa</h3>\r\n\r\n<p><img alt=\"Thành phần chính trong một ly trà sữa\" src=\"https://cdn.tgdd.vn/Files/2017/11/24/1044354/tac-hai-an-dau-cua-tra-sua-201908290812504812.jpg\" title=\"Thành phần chính trong một ly trà sữa\" />Th&agrave;nh phần ch&iacute;nh trong một ly tr&agrave; sữa</p>\r\n\r\n<h4><strong>Tr&agrave;</strong></h4>\r\n\r\n<p><a href=\"https://www.bachhoaxanh.com/tra-kho-tui-loc-tra-kho\" target=\"_blank\">Tr&agrave;</a>&nbsp;được d&ugrave;ng để pha chế tr&agrave; sữa thường l&agrave; tr&agrave; đen, tr&agrave; xanh, tr&agrave; &ocirc; long c&oacute; chứa chất chống oxy h&oacute;a, c&oacute; t&aacute;c dụng tốt cho sức khỏe.</p>\r\n\r\n<p>Tr&ecirc;n thực tế l&agrave; để tăng hương vị cho tr&agrave; nhằm thu h&uacute;t người ti&ecirc;u d&ugrave;ng, người b&aacute;n thường tẩm th&ecirc;m c&aacute;c hương liệu v&agrave;o tr&agrave; như hương sen, hương nh&agrave;i, hương bạc h&agrave;&hellip;&nbsp;<strong>Những loại hương liệu n&agrave;y thường chứa c&aacute;c h&oacute;a chất độc hại c&oacute; nguồn gốc hữu cơ như: penzylacetat, P &ndash; dimethoxy penzin&hellip; g&acirc;y hại cho sức khỏe người d&ugrave;ng khi uống qu&aacute; nhiều.</strong></p>\r\n\r\n<p>Ngo&agrave;i ra, v&igrave; l&yacute; do lợi nhuận người b&aacute;n tr&agrave; sữa kh&ocirc;ng sử dụng tr&agrave; m&agrave; thay bằng h&oacute;a chất tạo vị tr&agrave; hoặc sử dụng tr&agrave; tẩm ướp hương liệu độc hại c&oacute; thể g&acirc;y nguy hiểm cho sức khỏe người ti&ecirc;u d&ugrave;ng.</p>\r\n\r\n<h4><strong>Sữa</strong></h4>\r\n\r\n<p>Để k&iacute;ch th&iacute;ch khẩu vị v&agrave; gia tăng lợi nhuận, người b&aacute;n tr&agrave; sữa thường&nbsp;<strong>sử dụng kem b&eacute;o thay cho&nbsp;<a href=\"https://www.bachhoaxanh.com/sua-tuoi\" target=\"_blank\">sữa tươi</a>,&nbsp;<a href=\"https://www.bachhoaxanh.com/sua-dac\" target=\"_blank\">sữa đặc</a>.</strong></p>\r\n\r\n<p>Kem b&eacute;o chứa rất nhiều dầu thực vật được hydro h&oacute;a, c&oacute; thể&nbsp;<strong>khiến người d&ugrave;ng gặp c&aacute;c vấn đề về sức khỏe như</strong>: tắc mạch m&aacute;u, tăng cholesterol xấu, giảm cholesterol tốt. Chưa kể đến h&agrave;m lượng canxi, c&aacute;c vitamin v&agrave; protein trong kem b&eacute;o rất thấp so với sữa tươi n&ecirc;n c&oacute; thể khiến người d&ugrave;ng bị thiếu chất.</p>', '<p>Theo hiệp hội tim mạch Hoa Kỳ th&igrave; ở nữ cần khoảng 25g&nbsp;<a href=\"https://www.bachhoaxanh.com/duong\" target=\"_blank\">đường</a>, ở nam khoảng 37,5g đường cho c&aacute;c hoạt động h&agrave;ng ng&agrave;y. Tuy nhi&ecirc;n trong&nbsp;<strong>1 ly tr&agrave; sữa</strong>&nbsp;th&igrave; c&oacute; khoảng&nbsp;<strong>50g đường</strong>&nbsp;lớn hơn rất nhiều m&agrave; lượng đường cơ thể cần.</p>', 'Uống trà sữa nhiều bạn có thói quen dùng thêm trân châu', 'Uống trà sữa nhiều bạn có thói quen dùng thêm trân châu', 'photo-1541696490-8744a5dc022873.jfif', 8, '2021-11-03 03:39:03', '2021-11-02 20:39:03', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,0) NOT NULL,
  `gia_km` int(10) DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `soluong` int(10) NOT NULL,
  `product_sold` int(10) DEFAULT NULL,
  `pro_rating_number` int(10) DEFAULT NULL,
  `pro_rating` int(10) DEFAULT NULL,
  `product_view` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_cost` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `product_desc`, `product_price`, `gia_km`, `product_image`, `product_status`, `soluong`, `product_sold`, `pro_rating_number`, `pro_rating`, `product_view`, `created_at`, `updated_at`, `price_cost`) VALUES
(45, 'Sữa Tươi Okinawa', 4, '<p>Sữa Tươi Okinawa</p>', 50000, 5000, '1626616486.png', 1, 50, 1, 8, 2, 62, '2021-06-26 17:40:18', '2021-11-07 03:27:36', '40000'),
(47, 'Mango Matcha Latte', 4, '<p>Mango Matcha Latte&nbsp;ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 57000, 5000, '1626616461.png', 1, 50, NULL, NULL, NULL, 36, '2021-06-26 17:42:13', '2021-11-07 06:36:43', '50000'),
(48, 'Okinawa Latte', 4, '<p>Okinawa Latte&nbsp;Tr&agrave; b&iacute; đao ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 57000, 0, '1626616446.png', 1, 50, NULL, NULL, NULL, 6, '2021-06-26 17:43:21', '2021-11-07 03:26:29', '48000'),
(51, 'Trà Alisan Gong Cha', 5, '<p>Tr&agrave; Alisan Gong Cha&nbsp;ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 45000, 0, '1626616376.png', 1, 40, NULL, NULL, NULL, 21, '2021-06-26 17:47:26', '2021-10-21 04:58:37', '40000'),
(52, 'Trà Earl Grey Gong Cha', 5, '<p>Tr&agrave; Earl Grey Gong Cha&nbsp;ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 55000, 0, '1626616359.png', 1, 25, NULL, 5, 1, 19, '2021-06-26 17:48:01', '2021-11-07 03:26:22', '50000'),
(53, 'Trà Đen Gong Cha', 5, '<p>Tr&agrave; Đen Gong Cha&nbsp;ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 40000, 0, '1626616341.png', 1, 50, NULL, NULL, NULL, 4, '2021-06-26 17:48:51', '2021-11-07 07:05:28', '30000'),
(54, 'Trà Xanh Gong Cha', 4, '<p>Tr&agrave; Xanh Gong Cha&nbsp;ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 55000, 0, '1626616321.png', 1, 45, NULL, 4, 1, 21, '2021-06-26 17:49:58', '2021-11-07 03:26:06', '50000'),
(55, 'Okinawa Coffee Milk Tea', 6, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 57000, 0, '1626616294.png', 1, 49, 1, NULL, NULL, 1, '2021-06-26 17:55:12', '2021-11-07 03:26:00', '50000'),
(56, 'Okinawa Oreo Cream Milk Tea', 4, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 50000, 0, '1626616278.png', 1, 50, NULL, NULL, NULL, 15, '2021-06-26 17:55:55', '2021-11-07 03:25:48', '45000'),
(57, 'Trà Sữa Okinawa', 6, '<p>Tr&agrave; Sữa Okinawa</p>', 45000, 0, '1626616252.png', 1, 40, NULL, NULL, NULL, 26, '2021-06-26 17:56:43', '2021-11-07 03:25:41', '40000'),
(62, 'Trà Sữa Trân Châu Đen', 6, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 55000, 0, '1626616183.png', 1, 48, 2, NULL, NULL, 1, '2021-06-27 06:13:07', '2021-11-07 03:25:35', '46000'),
(63, 'Trà Sữa Hokkaido', 6, '<p>Tr&agrave; Sữa Hokkaido</p>', 45000, 0, '1626616165.png', 1, 24, 1, NULL, NULL, 3, '2021-06-27 06:13:48', '2021-11-07 03:25:24', '40000'),
(64, 'Trà Sữa Cà Phê', 6, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 53000, 0, '1626616149.png', 1, 45, NULL, NULL, NULL, 1, '2021-06-27 06:14:33', '2021-11-07 03:25:17', '43000'),
(69, 'Trà Sữa Khoai Môn', 4, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 40000, 0, '1626616045.png', 1, 53, NULL, NULL, NULL, 1, '2021-06-27 06:18:16', '2021-11-07 03:25:10', '30000'),
(70, 'Trà Bí Đao Alisan', 7, '<p>Tr&agrave; B&iacute; Đao Alisan</p>', 30000, 0, '1626616009.png', 1, 20, NULL, NULL, NULL, 2, '2021-06-27 06:19:09', '2021-11-07 03:25:00', '15000'),
(71, 'Trà Bí Đao', 7, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 20000, 0, '1626615996.png', 1, 14, 1, 5, 1, 8, '2021-06-27 06:20:08', '2021-11-07 03:24:54', '10000'),
(76, 'Trà Xanh', 4, '<p>&nbsp;</p>\r\n\r\n<p>Tr&agrave; Xanh&nbsp;ngọt ng&agrave;o kết hợp với tr&agrave; Alisan, cho ra ly tr&agrave; thơm, ngọt dịu dễ uống.</p>', 15000, 0, '1626615903.png', 1, 10, NULL, 5, 1, 12, '2021-06-27 06:23:27', '2021-11-07 03:24:47', '10000'),
(79, 'Đào Hồng Mận Hạt É', 8, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 35000, 0, '1626615839.png', 1, 10, 9, 5, 1, 16, '2021-06-27 06:25:26', '2021-11-07 03:24:40', '30000'),
(80, 'Trà Oolong Vải', 8, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 30000, 0, '1626615827.png', 1, 25, NULL, NULL, NULL, 4, '2021-06-27 06:26:08', '2021-11-07 03:24:34', '25000'),
(82, 'Trà Alisan Xoài', 4, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 35000, 0, '1626615776.png', 1, 23, 2, NULL, NULL, 3, '2021-06-27 06:27:21', '2021-11-07 03:24:26', '20000'),
(206, 'Thạch-Ai-yu', 10, '<p>B&ecirc;n cạnh c&aacute;c loại thạch được sản xuất c&ocirc;ng nghiệp, c&aacute;c qu&aacute;n tr&agrave; sữa c&ograve;n phục vụ c&aacute;c m&oacute;n thạch tự l&agrave;m như: thạch củ năng, thạch khoai m&ocirc;n, thạch dừa, thạch ph&ocirc; mai&hellip; đem đến nhiều lựa chọn cho đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</p>', 10000, 0, 'Thạch-Ai-yu29.png', 1, 50, NULL, NULL, NULL, 3, '2021-09-15 19:27:20', '2021-10-22 21:37:53', '5000'),
(207, 'Thạch Dừa', 10, '<p>B&ecirc;n cạnh c&aacute;c loại thạch được sản xuất c&ocirc;ng nghiệp, c&aacute;c qu&aacute;n tr&agrave; sữa c&ograve;n phục vụ c&aacute;c m&oacute;n thạch tự l&agrave;m như: thạch củ năng, thạch khoai m&ocirc;n, thạch dừa, thạch ph&ocirc; mai&hellip; đem đến nhiều lựa chọn cho đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</p>', 8000, 0, 'Thạch-Dừa - Copy49.png', 1, 50, NULL, NULL, NULL, NULL, '2021-09-15 19:28:18', '2021-09-15 19:40:06', '4000'),
(208, 'Thạch trái cây', 10, '<p>B&ecirc;n cạnh c&aacute;c loại thạch được sản xuất c&ocirc;ng nghiệp, c&aacute;c qu&aacute;n tr&agrave; sữa c&ograve;n phục vụ c&aacute;c m&oacute;n thạch tự l&agrave;m như: thạch củ năng, thạch khoai m&ocirc;n, thạch dừa, thạch ph&ocirc; mai&hellip; đem đến nhiều lựa chọn cho đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</p>', 15000, 0, '1631759354.png', 1, 42, 8, NULL, NULL, NULL, '2021-09-15 19:29:14', '2021-10-24 21:06:21', '10000'),
(209, 'Kem Sữa', 10, '<p>B&ecirc;n cạnh c&aacute;c loại thạch được sản xuất c&ocirc;ng nghiệp, c&aacute;c qu&aacute;n tr&agrave; sữa c&ograve;n phục vụ c&aacute;c m&oacute;n thạch tự l&agrave;m như: thạch củ năng, thạch khoai m&ocirc;n, thạch dừa, thạch ph&ocirc; mai&hellip; đem đến nhiều lựa chọn cho đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</p>', 12000, 0, 'Kem-Sữa13.png', 1, 50, NULL, NULL, NULL, 2, '2021-09-15 19:29:59', '2021-10-23 19:02:02', '8000'),
(211, 'Trân Châu Đen', 10, '<p>B&ecirc;n cạnh c&aacute;c loại thạch được sản xuất c&ocirc;ng nghiệp, c&aacute;c qu&aacute;n tr&agrave; sữa c&ograve;n phục vụ c&aacute;c m&oacute;n thạch tự l&agrave;m như: thạch củ năng, thạch khoai m&ocirc;n, thạch dừa, thạch ph&ocirc; mai&hellip; đem đến nhiều lựa chọn cho đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</p>', 10000, 0, '1631759502.png', 1, 36, 14, NULL, NULL, 2, '2021-09-15 19:31:42', '2023-01-01 20:19:19', '5000'),
(212, 'Đậu Đỏ', 10, '<p>B&ecirc;n cạnh c&aacute;c loại thạch được sản xuất c&ocirc;ng nghiệp, c&aacute;c qu&aacute;n tr&agrave; sữa c&ograve;n phục vụ c&aacute;c m&oacute;n thạch tự l&agrave;m như: thạch củ năng, thạch khoai m&ocirc;n, thạch dừa, thạch ph&ocirc; mai&hellip; đem đến nhiều lựa chọn cho đ&ocirc;ng đảo kh&aacute;ch h&agrave;ng.</p>', 8000, 0, '1631759588.png', 1, 50, NULL, NULL, NULL, 1, '2021-09-15 19:33:08', '2021-10-29 19:48:19', '5000'),
(216, 'trà chanh aiyu chân trâu trắng', 8, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 45000, 0, '1636293192.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:53:12', '2021-11-07 06:53:12', '40000'),
(217, 'trà đào đen', 8, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 35000, 0, '1636293258.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:54:18', '2021-11-07 06:54:18', '30000'),
(218, 'Trà xanh chanh dây', 8, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 42000, 0, '1636293312.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:55:12', '2021-11-07 06:55:12', '39000'),
(219, 'Alisan xoài', 8, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 50000, 0, '1636293368.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:56:08', '2021-11-07 06:56:08', '45000'),
(220, 'Nha Đam', 10, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 15000, 0, '1636293428.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:57:08', '2021-11-07 06:57:08', '10000'),
(221, 'Strawberry Earl Grey Latte', 4, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 50000, 0, '1636293494.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:58:14', '2021-11-07 06:58:14', '40000'),
(222, 'Mango Matcha Latte', 4, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 45000, 0, '1636293547.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:59:07', '2021-11-07 06:59:07', '35000'),
(223, 'Sữa Tươi Okinawa', 4, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 35000, 0, '1636293598.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 06:59:58', '2021-11-07 06:59:58', '30000'),
(224, 'Trà Sữa Pudding Đậu Đỏ', 6, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 55000, 0, '1636293689.png', 1, 50, NULL, NULL, NULL, 1, '2021-11-07 07:01:29', '2021-11-07 07:05:04', '45000'),
(225, 'Trà sữa SOCOLA', 6, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 50000, 0, '1636293748.png', 1, 50, NULL, NULL, NULL, 2, '2021-11-07 07:02:28', '2021-11-07 07:04:51', '45000'),
(226, 'Trà Sữa Khoai Môn', 6, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 35000, 0, '1636293786.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 07:03:06', '2021-11-07 07:03:06', '30000'),
(227, 'Strawberry Oreo Smoothie', 9, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 55000, 10000, '1636294026.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 07:07:06', '2021-11-07 07:07:06', '45000'),
(228, 'Matcha Đá Xay', 9, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 60000, 10000, '1636294077.png', 1, 50, NULL, NULL, NULL, 1, '2021-11-07 07:07:57', '2021-11-07 07:10:01', '50000'),
(229, 'Yakult Đào Đá Xay', 9, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 55000, 10000, '1636294126.png', 1, 50, NULL, NULL, NULL, NULL, '2021-11-07 07:08:46', '2021-11-07 07:08:46', '40000'),
(230, 'Khoai Môn Đá Xay', 9, '<p>Tr&agrave; sữa được l&agrave;m từ nguy&ecirc;n liệu tr&agrave; đen cao cấp kết hợp vị b&eacute;o ngậy của Caramel, sữa v&agrave; thạch caramel mềm dẻo</p>', 45000, 0, '1636294167.png', 1, 50, NULL, NULL, NULL, 1, '2021-11-07 07:09:27', '2021-11-07 07:11:17', '40000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rating`
--

DROP TABLE IF EXISTS `tbl_rating`;
CREATE TABLE IF NOT EXISTS `tbl_rating` (
  `rating_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rating` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`rating_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `product_id`, `rating`, `created_at`, `updated_at`) VALUES
(79, 45, 4, '2021-07-03 02:35:25', '2021-07-03 02:35:25'),
(80, 71, 5, '2021-07-11 19:59:08', '2021-07-11 19:59:08'),
(83, 79, 5, '2021-07-26 05:39:59', '2021-07-26 05:39:59'),
(84, 76, 5, '2021-07-31 00:37:18', '2021-07-31 00:37:18'),
(112, 52, 5, '2021-09-11 19:59:53', '2021-09-11 19:59:53'),
(113, 54, 4, '2021-09-15 05:33:27', '2021-09-15 05:33:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `id_roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_roles`
--

INSERT INTO `tbl_roles` (`id_roles`, `name`) VALUES
(4, 'admin'),
(5, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` int(10) NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci,
  `shipping_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_method`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `shipping_address2`, `created_at`, `updated_at`) VALUES
(167, 'yasuo', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(168, 'Nguyễn Tấn Đạt', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận Tân Phú', NULL, NULL),
(169, 'Nguyễn Tấn Đạt', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận Tân Phú', NULL, NULL),
(170, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 2', NULL, NULL),
(171, 'tantai', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 3', NULL, NULL),
(172, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 2', NULL, NULL),
(173, 'tran thien trung', 1, 'American', '0585861855', 'tantai@gmail.com', NULL, 'Quận 3', NULL, NULL),
(174, 'tran thien trung', 1, 'àdsf', '0585861855', 'tantai@gmail.com', NULL, 'Quận 6', NULL, NULL),
(175, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 3', NULL, NULL),
(176, 'nguyễn Tấn Tài', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận Tân Phú', NULL, NULL),
(177, 'nguyễn Tấn Tài', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(178, 'nguyễn Tấn Tài', 1, 'American', '0585861855', 'tantai@gmail.com', 'sdfasdf', 'Quận 2', NULL, NULL),
(179, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận Tân Phú', NULL, NULL),
(180, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(181, 'tran thien trung', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(182, 'tran thien trung', 0, 'American', '0585861855', 'an@gmail.com', NULL, 'Quận Thủ Đức', NULL, NULL),
(183, 'Nguyễn Tấn Đạt', 1, 'ionia', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(184, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận Tân Phú', NULL, NULL),
(185, 'tran thien trung', 1, 'sdfa', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(186, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'aasdf', 'Quận 1', NULL, NULL),
(187, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sdfads', 'Quận Tân Phú', NULL, NULL),
(188, 'Nguyễn Tấn Đạt', 1, 'Australia', '0585861855', 'Bo@gmail.com', 'tai ok', 'Quận Thủ Đức', NULL, NULL),
(189, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'nhanh', 'Quận Bình Thạnh', NULL, NULL),
(190, 'nguyễn Tấn Tài', 1, 'Frejoib', '0585861855', 'tandat@gmail.com', NULL, 'Quận 5', NULL, NULL),
(191, 'tantai che', 1, 'erqew', '0585861855', 'tantai@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(192, 'Trần Tuấn Bo', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(193, 'tran thien trung', 1, 'ta', '0585861855', 'tantai@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(194, 'tran thien trung', 1, 'ta', '0585861855', 'tantai@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(195, 'nguyễn Tấn Tài', 1, 'dsfad', '0585861855', 'tandat@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(196, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(197, 'Nguyễn Tấn Đạt', 1, 'ionia', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(198, 'Nguyễn Tấn Đạt', 1, 'ionia', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(199, 'Nguyễn Tấn Đạt', 1, 'ionia', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(200, 'tantai', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(201, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(202, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(203, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(204, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(205, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 11', NULL, NULL),
(206, 'Trần Tuấn Bo', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sfsdf', 'Quận Tân Phú', NULL, NULL),
(207, 'nguyễn Tấn Tài', 1, 'Long Giang', '0585861855', 'an@gmail.com', NULL, 'Quận 1', NULL, NULL),
(208, 'nguyễn Tấn Tài', 1, 'ionia', '0585861855', 'tandat@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(209, 'fsd', 1, 'sadas', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(210, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(211, 'Nguyễn Tấn Đạt', 0, 'fsdf', '0585861855', 'tantai@gmail.com', NULL, 'Quận Phú Nhuận', NULL, NULL),
(212, 'tran thien trung', 1, 'Long Giang', '0585861855', 'Bo@gmail.com', 'fsdfds', 'Quận 2', NULL, NULL),
(213, 'Nguyễn Tấn Đạt', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', 'sfgdfg', 'Quận 1', NULL, NULL),
(214, 'Nguyễn Tấn Đạt', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', 'sfgdfg', 'Quận 1', NULL, NULL),
(215, 'nguyễn Tấn Tài', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'dfasd', 'Quận 3', NULL, NULL),
(216, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'zfsdf', 'Quận 3', NULL, NULL),
(217, 'Nguyễn Tấn Đạt', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', 'gh', 'Quận Phú Nhuận', NULL, NULL),
(218, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'Bo@gmail.com', 'sdfsdf', 'Quận 3', NULL, NULL),
(219, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'Bo@gmail.com', 'sdfsdf', 'Quận 3', NULL, NULL),
(220, 'nguyễn Tấn Tài', 1, 'sdf', '0585861855', 'tantai@gmail.com', 'sdfa', 'Quận 3', NULL, NULL),
(221, 'nguyễn Tấn Tài', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', 'sdfa', 'Quận 1', NULL, NULL),
(222, 'ad', 1, 'sdfs', '343', 'sf@g', 'ád', 'Quận 1', NULL, NULL),
(223, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'đfs', 'Quận 1', NULL, NULL),
(224, 'sda', 1, 'ádad', '324234223423', 'dfads@gm', 'sdfa', 'Quận 1', NULL, NULL),
(225, 'ádfa', 1, 'adsf', 'ad', 'tai@gmail.com', 'adsf', 'Quận 1', NULL, NULL),
(226, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', 'sfs', 'tantai@gmail.com', 'sdsa', 'Quận 1', NULL, NULL),
(227, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(228, 'sddfa', 1, 'sdfas', '3242423123423', 'taina@gmail.com', 'sdf', 'Quận Phú Nhuận', NULL, NULL),
(229, 'dsdffg', 1, 'tan tai', '0585861855', 'traong@gmail.com', 'fdsfsd', 'Quận 1', NULL, NULL),
(230, 'Nguyễn Tấn Đạt', 1, 'dfsdfds', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(231, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(232, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(233, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(234, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(235, 'Nguyễn Tấn Đạt', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(236, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(237, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(238, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(239, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'zfsdfsd', 'Quận 1', NULL, NULL),
(240, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'gdf', 'Quận 1', NULL, NULL),
(241, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(242, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(243, 'Nguyễn Tấn Đạt', 0, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(244, 'Nguyễn Tấn Đạt', 1, 'American', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(245, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(246, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(247, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(248, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(249, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(250, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(251, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(252, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(253, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(254, 'nguyễn Tấn Tài', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', 'dfgf', 'Quận 1', NULL, NULL),
(255, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(256, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(257, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(258, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'no', 'Quận 2', NULL, NULL),
(259, 'tran thien trung', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sdf', 'Quận 1', NULL, NULL),
(260, 'Trần Tuấn Bo', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'no', 'Quận 1', NULL, NULL),
(261, 'tran thien trung', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(262, 'tantai che', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(263, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(264, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'fsdf', 'Quận 1', NULL, NULL),
(265, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(266, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(267, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(268, 'Trần Tuấn Bo', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(269, 'nguyễn Tấn Tài', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(270, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sfsdf', 'Quận Tân Phú', NULL, NULL),
(271, 'nguyễn Tấn Tài', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(272, 'Nguyễn Tấn Đạt', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(273, 'yugjh', 1, 'Nơ Trang Long', '05858691458', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(274, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'asdasd', 'Quận 1', NULL, NULL),
(275, 'Nguyễn Tấn Đạt', 1, 'ionia', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(276, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(277, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(278, 'nguyễn Tấn Tài', 1, 'sdfag', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(279, 'tran thien trung', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(280, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(281, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(282, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sfsdf', 'Quận 1', NULL, NULL),
(283, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(284, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(285, 'Nguyễn Tấn Đạt', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(286, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(287, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', 'sds', 'Quận 1', NULL, NULL),
(288, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(289, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(290, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(291, 'tran thien trung', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(292, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(293, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(294, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(295, 'Nguyễn Tấn Đạt', 0, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(296, 'Nguyễn Tấn Đạt', 0, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(297, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'an@gmail.com', NULL, 'Quận 1', NULL, NULL),
(298, 'Nguyễn Tấn Đạt', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(299, 'Nguyễn Tấn Đạt', 1, 'sdfaj', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(300, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(301, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(302, 'nguyễn Tấn Tài', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(303, 'sdfsdfs', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sdfasdf', 'Quận Thủ Đức', NULL, NULL),
(304, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'gdsfgs', 'Quận 9', NULL, NULL),
(305, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'hay', 'Quận Bình Thạnh', NULL, NULL),
(306, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'hay', 'Quận Bình Thạnh', NULL, NULL),
(307, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'hay', 'Quận Bình Thạnh', NULL, NULL),
(308, 'nguyễn Tấn Tài', 0, 'Nơ Trang Long', '0585861855', 'Bo@gmail.com', 'zfds', 'Quận Thủ Đức', NULL, NULL),
(309, 'Nguyễn Tấn Đạt', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(310, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(311, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(312, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(313, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(314, 'Nguyễn Tấn Đạt', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(315, 'zxfdsz', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'sdf', 'Quận 1', NULL, NULL),
(316, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(317, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(318, 'Nguyễn Tấn Đạt', 1, 'sdfall', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(319, 'nguyễn Tấn Tài', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(320, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'tai la so 1', 'Quận 1', NULL, NULL),
(321, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(322, 'tran thien trung', 1, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(323, 'sdfg5', 0, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(324, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', NULL, 'Quận 1', NULL, NULL),
(325, 'nguyễn Tấn Tài', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(326, 'nguyễn Tấn Tài', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', 'nhanh', 'Quận Bình Thạnh', NULL, NULL),
(327, 'Nguyễn Tấn Đạt', 0, 'American', '0585861855', 'tantai@gmail.com', 'fsee', 'Quận 1', NULL, NULL),
(328, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tandat@gmail.com', 'sdgdfg', 'Quận 1', NULL, NULL),
(329, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(330, 'tran thien trung', 0, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(331, 'Trần Tuấn Bo', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(332, 'tran thien trung', 0, 'Long Giang', '0585861855', 'tantai@gmail.com', 'fsdfds', 'Quận 1', NULL, NULL),
(333, 'tran thien trung', 0, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(334, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(335, 'Nguyễn Tấn Đạt', 0, 'Long Giang', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(336, 'Nguyễn Tấn Đạt', 1, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận Bình Thạnh', NULL, NULL),
(337, 'trung', 0, 'Ấp phước kế', '0123456789', 'trungtran2692000@gmail.com', NULL, 'Quận 1', NULL, NULL),
(338, 'tran thien trung', 1, 'Frejoib', '0585861855', 'tantai@gmail.com', NULL, 'Quận 1', NULL, NULL),
(339, 'Nguyễn Tấn Đạt', 0, 'Nơ Trang Long', '0585861855', 'tantai@gmail.com', NULL, 'Quận Bình Thạnh', NULL, NULL),
(340, 'Nguyễn Thành Trung', 1, '65Addđ', '0999999994', 'nguyenkhanhstmqn@gmail.com', 'AAAAAAA', 'Quận 2', NULL, NULL),
(341, 'Nguyễn Thành Trung', 1, 'TP HCM', '0343754517', 'nguyenkhanhstqm@gmail.com', 'Phươngf Bến Thành', 'Quận 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(100) DEFAULT NULL,
  `slider_status` int(11) DEFAULT NULL,
  `slider_desc` varchar(100) DEFAULT NULL,
  `slider_image` varchar(100) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_status`, `slider_desc`, `slider_image`) VALUES
(16, 'hình1', 0, '<p>Hinh 1</p>', 'gettyimages-1157712696-2048x204823.jpg'),
(17, 'hinh2', 0, '<p>hinh 2</p>', 'photo-1541696490-8744a5dc022861.jfif');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_social`
--

DROP TABLE IF EXISTS `tbl_social`;
CREATE TABLE IF NOT EXISTS `tbl_social` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_user_id` varchar(100) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `user` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_social`
--

INSERT INTO `tbl_social` (`user_id`, `provider_user_id`, `provider`, `user`) VALUES
(3, '101966844188032601290', 'GOOGLE', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statistical`
--

DROP TABLE IF EXISTS `tbl_statistical`;
CREATE TABLE IF NOT EXISTS `tbl_statistical` (
  `id_statistical` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `profit` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_statistical`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id_statistical`, `order_date`, `sales`, `profit`, `quantity`, `total_order`, `created_at`, `updated_at`) VALUES
(68, '2021-06-02', '66000000', '18000000', 23, 12, '2021-06-18 13:39:39', '0000-00-00 00:00:00'),
(69, '2021-06-01', '74000000', '20000000', 32, 20, '2021-06-18 13:39:39', '0000-00-00 00:00:00'),
(73, '2021-06-18', '205000', '205000', 8, 3, '2021-06-18 13:53:20', '2021-06-18 06:53:20'),
(76, '2021-06-19', '320000', '318400', 16, 3, '2021-06-19 14:36:32', '2021-06-19 07:36:32'),
(77, '2021-06-24', '220000', '218900', 11, 7, '2021-06-25 11:16:13', '2021-06-25 04:16:13'),
(78, '2021-06-25', '65000', '64900', 3, 2, '2021-06-25 04:17:10', '2021-06-25 04:17:10'),
(79, '2021-07-20', '57000', '7000', 1, 1, '2021-07-19 21:32:22', '2021-07-19 21:32:22'),
(80, '2021-07-21', '228000', '28000', 4, 2, '2021-07-21 03:23:38', '2021-07-20 20:23:38'),
(81, '2021-07-14', '57000', '7000', 1, 1, '2021-07-20 20:23:49', '2021-07-20 20:23:49'),
(82, '2021-07-26', '403000', '93000', 9, 2, '2021-07-26 12:46:42', '2021-07-26 05:46:42'),
(83, '2021-08-14', '1610000', '280000', 35, 1, '2021-08-14 03:39:15', '2021-08-14 03:39:15'),
(84, '2021-08-27', '267000', '49000', 5, 4, '2021-08-27 12:18:18', '2021-08-27 05:18:18'),
(85, '2021-09-01', '523000', '363000', 9, 2, '2021-09-01 19:46:19', '2021-09-01 19:46:19'),
(86, '2021-09-02', '228000', '68000', 4, 1, '2021-09-02 02:34:45', '2021-09-02 02:34:45'),
(87, '2021-09-06', '102000', '12000', 2, 2, '2021-09-06 13:29:22', '2021-09-06 06:29:22'),
(88, '2021-09-04', '180000', '20000', 4, 2, '2021-09-08 13:20:03', '2021-09-08 06:20:03'),
(89, '2021-09-10', '397000', '77000', 8, 4, '2021-09-10 10:16:59', '2021-09-10 03:16:59'),
(90, '2021-09-11', '1513000', '487000', 32, 11, '2021-09-11 14:17:11', '2021-09-11 07:17:11'),
(91, '2021-09-12', '1124000', '238000', 18, 4, '2021-09-14 15:40:11', '2021-09-14 08:40:11'),
(92, '2021-09-13', '312000', '57000', 6, 4, '2021-09-14 14:24:57', '2021-09-14 07:24:57'),
(93, '2021-09-15', '590000', '138000', 10, 4, '2021-10-07 14:58:23', '2021-10-07 07:58:23'),
(94, '2021-09-16', '133000', '113000', 8, 5, '2021-09-15 21:10:53', '2021-09-15 21:10:53'),
(95, '2021-09-18', '90000', '55000', 2, 2, '2021-09-18 04:44:09', '2021-09-18 04:44:09'),
(96, '2021-10-07', '104000', '18000', 2, 2, '2021-10-07 15:06:27', '2021-10-07 08:06:27'),
(97, '2021-10-08', '315000', '50000', 5, 1, '2021-10-07 20:11:46', '2021-10-07 20:11:46'),
(98, '2021-10-13', '32000', '6000', 1, 1, '2021-10-13 02:45:40', '2021-10-13 02:45:40'),
(99, '2021-10-15', '269000', '99000', 5, 3, '2021-10-15 13:19:46', '2021-10-15 06:19:46'),
(100, '2021-10-16', '496000', '381000', 19, 4, '2021-10-23 13:30:42', '2021-10-23 06:30:42'),
(101, '2021-10-17', '128000', '24000', 4, 1, '2021-10-16 20:35:03', '2021-10-16 20:35:03'),
(102, '2021-10-18', '171000', '51000', 3, 1, '2021-10-18 03:38:40', '2021-10-18 03:38:40'),
(103, '2021-10-20', '63000', '13000', 1, 1, '2021-10-20 06:34:36', '2021-10-20 06:34:36'),
(104, '2021-10-21', '118000', '26000', 2, 1, '2021-10-21 05:00:11', '2021-10-21 05:00:11'),
(105, '2021-10-23', '484000', '198000', 14, 6, '2021-10-25 04:06:21', '2021-10-24 21:06:21'),
(106, '2021-10-27', '228000', '68000', 4, 1, '2021-10-27 19:38:27', '2021-10-27 19:38:27'),
(107, '2021-10-28', '189000', '39000', 3, 1, '2021-10-28 06:40:36', '2021-10-28 06:40:36'),
(108, '2021-10-30', '540000', '134000', 12, 3, '2021-11-03 03:00:55', '2021-11-02 20:00:55'),
(109, '2021-10-31', '371000', '251000', 10, 3, '2021-10-30 20:32:38', '2021-10-30 20:32:38'),
(110, '2021-11-03', '177000', '39000', 3, 1, '2021-11-02 20:27:53', '2021-11-02 20:27:53'),
(111, '2021-11-07', '291000', '153000', 5, 2, '2021-11-07 01:40:05', '2021-11-07 01:40:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_visitors`
--

DROP TABLE IF EXISTS `tbl_visitors`;
CREATE TABLE IF NOT EXISTS `tbl_visitors` (
  `id_visitors` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(50) NOT NULL,
  `date_visitor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_visitors`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`id_visitors`, `ip_address`, `date_visitor`) VALUES
(1, '::1', '2020-11-08'),
(27, '127.0.0.1', '2021-11-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'trung', 'trungtran2692000@gmail.com', NULL, '25f9e794323b453885f5181f1b624d0b', NULL, '2021-06-03 06:00:19', '2021-06-03 06:00:19', '07123456789'),
(2, 'trung', '0306181379@caothang.edu.vn', NULL, '123456789', NULL, '2021-06-03 06:07:47', '2021-06-03 06:07:47', '07123456788'),
(3, 'trung', 'trung@gmail.com', NULL, '123456789', NULL, '2021-06-03 07:01:45', '2021-06-03 07:01:45', '07963258741'),
(4, 'nick jason', 'tantaiIT3000@gmail.com', NULL, '123456789', NULL, '2021-06-03 20:53:50', '2021-06-03 20:53:50', '07123456856');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD CONSTRAINT `admin_roles_ibfk_1` FOREIGN KEY (`admin_admin_id`) REFERENCES `tbl_admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_roles_ibfk_2` FOREIGN KEY (`roles_id_roles`) REFERENCES `tbl_roles` (`id_roles`);

--
-- Các ràng buộc cho bảng `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `attribute_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attribute_ibfk_2` FOREIGN KEY (`attr_id`) REFERENCES `product_attribute` (`attr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`comment_product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`);

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`cate_post_id`) REFERENCES `tbl_category_post` (`cate_post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD CONSTRAINT `tbl_social_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
