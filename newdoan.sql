-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2023 lúc 03:23 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `newdoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_28_043847_create_tbl_category', 1),
(6, '2023_08_31_042122_create_tbl_phanloai', 2),
(7, '2023_09_01_092551_create_tbl_color', 3),
(8, '2023_09_01_092558_create_tbl_size', 3),
(9, '2023_09_01_092608_create_tbl_brand', 3),
(10, '2023_09_01_092617_create_tbl_theloai', 3),
(11, '2023_09_01_092623_create_tbl_product', 3),
(12, '2023_09_11_044634_create_tbl_product_img', 4),
(13, '2023_09_11_044838_create_tbl_product_quantity', 5),
(14, '2023_09_24_125121_create_tbl_position', 6),
(15, '2023_09_24_141701_create_tbl_position', 7),
(16, '2023_09_25_035902_create_tbl_staff', 8),
(17, '2023_10_01_124453_create_tbl_user', 9),
(18, '2023_10_04_031620_create_tbl_method_payment', 10),
(19, '2023_10_04_045154_create_tbl_status_payment', 11),
(20, '2023_10_16_090307_create_tbl_theloaichecked', 12),
(21, '2023_10_18_082832_create_tbl_cart', 13),
(22, '2023_10_18_143942_create_tbl_voucher', 14),
(23, '2023_10_24_124113_create_tbl_payment', 15),
(24, '2023_10_24_124839_create_tbl_payment_deatil', 15),
(25, '2023_10_24_125135_create_tbl_paymentt_voucher', 15),
(26, '2023_11_01_025701_create_tbl_notification', 16),
(27, '2023_11_01_085709_create_tbl_permission', 17),
(28, '2023_11_01_085749_create_tbl_permission__group', 17),
(29, '2023_11_02_024730_create_tbl_position_permission', 18),
(30, '2023_11_02_024751_create_tbl_staff_permission', 18),
(31, '2023_11_02_073932_create_tbl_ship', 19),
(32, '2023_11_02_073958_create_tbl_material', 19),
(33, '2023_11_03_091410_create_tbl_product_material', 20),
(34, '2023_11_06_043950_create_tbl_pagination', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(10) UNSIGNED NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_link` text NOT NULL,
  `banner_status` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_name`, `banner_link`, `banner_status`, `create_at`) VALUES
(9, 'Sản phẩm mới từ YODI', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699518283784-1.webp?alt=media&token=f83ebc55-7c0e-4a41-838f-4020aa3d0d46', 1, '2023-11-09 01:24:45'),
(10, 'Vải siêu thấm mồ hôi', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699518352589-2-1-1.webp?alt=media&token=b04fa25b-ad39-4c79-91cc-429293c0fe68', 1, '2023-11-09 01:25:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_code` varchar(255) NOT NULL,
  `brand_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_code`, `brand_status`) VALUES
(1, 'Yodi', 'YOD', 1),
(2, 'Yvi Moda', 'YMD', 1),
(3, 'Louis Vuitton', 'LVU', 1),
(4, 'Zara', 'ZAA', 1),
(5, 'JUNO', 'JUN', 1),
(6, 'VIỆT TIẾN', 'VIN', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `card_size` varchar(255) NOT NULL,
  `card_color` varchar(255) NOT NULL,
  `card_quatity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `user_id`, `product_id`, `card_size`, `card_color`, `card_quatity`) VALUES
(53, 13, 72, 'S', 'Xám', 2),
(54, 13, 72, 'S', 'Đen', 6),
(55, 13, 72, 'M', 'Đen', 5),
(56, 13, 77, 'L', 'Đen', 1),
(57, 13, 77, 'S', 'Đen', 1),
(64, 14, 79, 'S', 'Trắng', 6),
(65, 14, 72, 'M', 'Đen', 1),
(66, 14, 72, 'S', 'Xám', 1),
(79, 15, 77, 'S', 'Trắng', 1),
(80, 15, 76, 'M', 'Đen', 1),
(81, 15, 76, 'S', 'Trắng', 2),
(82, 15, 78, 'S', 'Đen', 1),
(83, 15, 78, 'S', 'Trắng', 1),
(84, 15, 76, 'S', 'Đen', 1),
(85, 15, 75, 'S', 'Đen', 1),
(86, 15, 75, 'M', 'Trắng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_code` int(11) NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_code`, `category_status`) VALUES
(2, 'Nam', 1, 1),
(3, 'Nữ', 2, 1),
(4, 'Trẻ em', 3, 1),
(5, 'Người già', 4, 1),
(6, 'Khác', 5, 0),
(7, 'GENZ', 6, 0),
(8, 'GENB', 7, 0),
(9, 'GEN A', 11, 0),
(10, 'GEN M', 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_color`
--

CREATE TABLE `tbl_color` (
  `color_id` int(10) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `color_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_color`
--

INSERT INTO `tbl_color` (`color_id`, `color_name`, `color_code`, `color_status`) VALUES
(1, 'Đen', '#000000', 1),
(2, 'Trắng', '#ffffff', 1),
(3, 'Xám', '#cccccc', 1),
(4, 'be', '# F5F5DC', 1),
(5, 'xanh nhạt', '# 87CEEB', 1),
(6, 'Màu đỏ', '# FF0000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_material`
--

CREATE TABLE `tbl_material` (
  `material_id` int(10) UNSIGNED NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `material_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_material`
--

INSERT INTO `tbl_material` (`material_id`, `material_name`, `material_status`) VALUES
(1, 'Vải cotton', 1),
(2, 'Vải Lụa', 1),
(3, 'Nỉ Bông', 1),
(4, 'Len', 1),
(5, 'Lông cừu', 1),
(6, 'Da cá', 1),
(7, 'Bò', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_methodpayment`
--

CREATE TABLE `tbl_methodpayment` (
  `methodPayment_id` int(10) UNSIGNED NOT NULL,
  `methodPayment_name` varchar(255) NOT NULL,
  `methodPayment_code` varchar(255) NOT NULL,
  `methodPayment_status` int(11) NOT NULL,
  `methodPayment_category` int(11) NOT NULL,
  `methodPayment_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_methodpayment`
--

INSERT INTO `tbl_methodpayment` (`methodPayment_id`, `methodPayment_name`, `methodPayment_code`, `methodPayment_status`, `methodPayment_category`, `methodPayment_note`) VALUES
(1, 'Thanh toán ủy quyền', 'TTUQ1', 1, 0, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n&nbsp;khi nhận h&agrave;ng'),
(2, 'Thanh toán qua VNPAY', 'TTDT1', 1, 1, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n trước qua v&iacute; vnpay'),
(3, 'Thanh toán qua ví MoMo', 'TTDT2', 1, 1, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n qua v&iacute; điện tử MoMo'),
(4, 'Thanh toán qua thẻ ngân hàng', 'TTDT3', 1, 1, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n qua thẻ ng&acirc;n h&agrave;ng'),
(5, 'Thanh toán qua thẻ tiến dụng ghi nợ', 'TTDT4', 1, 1, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n qua thẻ ghi nợ'),
(6, 'Thanh toán bằng zaloPay', 'TTDT5', 1, 1, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n qua zaloPay'),
(7, 'Thanh toán bằng vietTelMoney', 'ZBXN1', 0, 1, 'Kh&aacute;ch h&agrave;ng thanh to&aacute;n qua Viettel Money'),
(8, 'Thanh toán trả trước 50%', 'ZMXBH03124', 1, 0, 'Kh&aacute;ch h&agrave;ng sẽ thanh to&aacute;n trả trước 50%');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `notification_mess` text NOT NULL,
  `notification_category` varchar(1000) NOT NULL,
  `notification_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `user_id`, `notification_mess`, `notification_category`, `notification_status`, `created_at`) VALUES
(1, 13, 'Shop đã xác nhận đơn hàng của bạn', 'Thông báo đơn hàng', 1, '2023-10-31 20:25:07'),
(2, 13, 'Shop đã đóng gói đơn hàng có mã XMCBC0214 của bạn và chuyển cho bên giao hàng ', 'Thông báo đơn hàng', 1, '2023-10-31 20:25:29'),
(3, 13, 'Đơn hàng có  mã mã XMCBC0214 của bạn đã giao thành công ', 'Thông báo đơn hàng', 1, '2023-10-31 20:25:39'),
(4, 13, 'Đơn hàng có  mã mã ZMXNCV0312 của bạn đã giao thành công ', 'Thông báo đơn hàng', 1, '2023-10-31 20:35:41'),
(5, 13, 'Đơn hàng có  mã mã XMCBC0214 của bạn đã giao thành công ', 'Thông báo đơn hàng', 1, '2023-10-31 20:35:50'),
(6, 13, 'Shop đã xác nhận đơn hàng của bạn', 'Thông báo đơn hàng', 1, '2023-11-03 01:02:23'),
(7, 13, 'Shop đã đóng gói đơn hàng có mã ZMXCN03214 của bạn và chuyển cho bên giao hàng ', 'Thông báo đơn hàng', 1, '2023-11-03 01:04:27'),
(8, 13, 'Đơn hàng có  mã mã ZMXCN03214 của bạn đã giao thành công ', 'Thông báo đơn hàng', 1, '2023-11-03 01:04:35'),
(9, 13, 'Đơn hàng có  mã mã ZMXCN03214 của bạn đã chuyển vào mục giao thành công ', 'Thông báo đơn hàng', 1, '2023-11-03 01:04:42'),
(10, 13, 'Shop đã xác nhận đơn hàng của bạn', 'Thông báo đơn hàng', 1, '2023-11-05 08:30:16'),
(11, 13, 'Shop đã đóng gói đơn hàng có mã ZMXNO03214 của bạn và chuyển cho bên giao hàng ', 'Thông báo đơn hàng', 1, '2023-11-05 08:30:47'),
(12, 13, 'Đơn hàng có  mã mã ZMXNO03214 của bạn đã giao thành công ', 'Thông báo đơn hàng', 1, '2023-11-05 08:31:14'),
(13, 13, 'Đơn hàng có  mã mã ZMXNO03214 của bạn đã chuyển vào mục giao thành công ', 'Thông báo đơn hàng', 1, '2023-11-05 08:31:30'),
(14, 13, 'Shop đã xác nhận đơn hàng của bạn', 'Thông báo đơn hàng', 1, '2023-11-05 19:00:25'),
(15, 13, 'Shop đã đóng gói đơn hàng có mã ZMCCB03124 của bạn và chuyển cho bên giao hàng ', 'Thông báo đơn hàng', 1, '2023-11-05 19:00:54'),
(16, 13, 'Đơn hàng có  mã mã ZMCCB03124 của bạn đã giao thành công ', 'Thông báo đơn hàng', 1, '2023-11-05 19:01:40'),
(17, 13, 'Đơn hàng có  mã mã ZMCCB03124 của bạn đã chuyển vào mục giao thành công ', 'Thông báo đơn hàng', 1, '2023-11-05 19:02:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_pagination`
--

CREATE TABLE `tbl_pagination` (
  `pagination_id` int(10) UNSIGNED NOT NULL,
  `pagination_tbl` varchar(255) NOT NULL,
  `pagination_name` varchar(255) NOT NULL,
  `pagination_primaryKey` varchar(255) NOT NULL,
  `pagination_category` int(11) NOT NULL,
  `pagination_nameElement` varchar(255) NOT NULL,
  `pagination_limitDeaful` int(11) NOT NULL,
  `pagination_limitAcction` int(11) NOT NULL,
  `pagination_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_pagination`
--

INSERT INTO `tbl_pagination` (`pagination_id`, `pagination_tbl`, `pagination_name`, `pagination_primaryKey`, `pagination_category`, `pagination_nameElement`, `pagination_limitDeaful`, `pagination_limitAcction`, `pagination_status`) VALUES
(1, 'tbl_category', 'danh mục', 'category_id', 1, 'btn-loadmore-category', 5, 5, 1),
(2, 'tbl_pagination', 'Phân trang', 'pagination_id', 0, 'btn-loadmore-paginator', 10, 10, 1),
(3, 'tbl_phanloai', 'phân loại', 'phanloai_id', 1, 'btn-loadmore-phanloai', 5, 5, 1),
(4, 'tbl_theloai', 'thể loại', 'theloai_id', 0, 'tfoot-table-theloai', 15, 15, 1),
(5, 'tbl_color', 'màu sắc', 'color_id', 1, 'btn-loadmore-color', 5, 5, 1),
(6, 'tbl_size', 'size', 'size_id', 1, 'btn-loadmore-size', 5, 5, 1),
(7, 'tbl_brand', 'thương hiệu', 'brand_id', 1, 'btn-loadmore-brand', 5, 5, 1),
(8, 'tbl_product', 'sản phẩm', 'product_id', 0, 'btn-loadmore-product', 20, 20, 1),
(9, 'tbl_user', 'người dùng', 'user_id', 0, 'btn-loadmore-user', 30, 30, 1),
(10, 'tbl_banner', 'banner', 'banner_id', 0, 'btn-loadmore-banner', 5, 5, 1),
(11, 'tbl_position', 'chức vụ', 'position_id', 1, 'btn-loadmore-position', 10, 10, 1),
(12, 'tbl_staff', 'nhân viên', 'staff_id', 0, 'btn-loadmore-staff', 20, 20, 1),
(13, 'tbl_permission', 'quyền chi tiết', 'permission_id', 0, 'btn-loadmore-permission', 30, 30, 1),
(14, 'tbl_permission__group', 'Nhóm quyền', 'permission_group_id', 0, 'btn-loadmore-permissionGroup', 15, 15, 1),
(15, 'tbl_voucher', 'voucher', 'voucher_id', 0, 'btn-loadmore-voucher', 15, 15, 1),
(16, 'tbl_statuspayment', 'trạng thái thanh toán', 'statusPayment_id', 1, 'btn-loadmore-statusPayment', 5, 5, 1),
(17, 'tbl_methodpayment', 'phương thức thanh toán', 'methodPayment_id', 1, 'btn-loadmore-methodPayment', 5, 5, 1),
(18, 'tbl_ship', 'vận chuyển', 'ship_id', 1, 'btn-loadmore-ship', 5, 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `payment_localtion` varchar(1000) DEFAULT NULL,
  `payment_code` varchar(255) NOT NULL,
  `payment_addressUser` varchar(1000) NOT NULL,
  `methodPayment_id` int(11) UNSIGNED NOT NULL,
  `statusPayment_id` int(11) UNSIGNED NOT NULL,
  `ship_id` int(10) UNSIGNED NOT NULL,
  `isPayment` int(11) NOT NULL,
  `payment_phoneUser` int(11) NOT NULL,
  `payment_nameUser` varchar(255) NOT NULL,
  `payment_note` text DEFAULT NULL,
  `payment_allPrice` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `user_id`, `payment_localtion`, `payment_code`, `payment_addressUser`, `methodPayment_id`, `statusPayment_id`, `ship_id`, `isPayment`, `payment_phoneUser`, `payment_nameUser`, `payment_note`, `payment_allPrice`, `created_at`, `updated_at`) VALUES
(64, 13, '42 Nguyên Xá ,Minh Khai Bắc Từ Liêm,hà Nội', 'ZMXCN03214', '42 Nguyên Xá,Minh Khai,Từ Liêm ,Hà Nội', 8, 6, 5, 0, 334206603, 'Nguyễn Xuân Cảnh', NULL, 1190000, '2023-11-02 11:36:54', NULL),
(65, 13, '42 Nguyên Xá', 'ZMXNO03214', 'Xã Tân Bình,TP Thái Bình ,Tỉnh Thái Bình', 8, 6, 5, 0, 334206603, 'Nguyễn Xuân Cảnh', NULL, 3169000, '2023-11-03 06:41:34', NULL),
(66, 13, 'xã Tân Bình,TP Thái Bình,Tỉnh Thái bình', 'ZMCCB03124', '42 Nguyên Xá , Minh Khai , Từ Liêm ,Hà Nội', 8, 6, 5, 0, 321456321, 'Nguyễn Xuân Cảnh', NULL, 4299000, '2023-11-04 06:34:32', NULL),
(67, 14, NULL, '', 'Tân Bình,TP Thái Bình,Tỉnh Thái Bình', 8, 1, 5, 0, 334206600, 'Nguyễn Xuân Cảnh', NULL, 610000, '2023-11-05 15:26:37', NULL),
(68, 15, NULL, '', '42 Minh Khai ,Bắc Từ Liêm,Hà Nội', 8, 1, 5, 0, 987456321, 'Mai Văn chiến', NULL, 2609000, '2023-11-06 01:56:41', NULL),
(69, 15, NULL, '', '42 Minh Khai,Từ Liêm,Hà Nội', 8, 1, 9, 0, 987456321, 'Mai Văn chiến', NULL, 5142000, '2023-11-06 01:58:02', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_paymentt_voucher`
--

CREATE TABLE `tbl_paymentt_voucher` (
  `paymentt_voucher_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment_deatil`
--

CREATE TABLE `tbl_payment_deatil` (
  `payment_deatil_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment_deatil`
--

INSERT INTO `tbl_payment_deatil` (`payment_deatil_id`, `payment_id`, `product_id`, `product_price`, `product_size`, `product_color`, `product_quantity`) VALUES
(192, 62, 72, 290000, 'S', 'Xám', '1'),
(193, 62, 72, 290000, 'S', 'Đen', '16'),
(194, 62, 72, 290000, 'M', 'Đen', '1'),
(195, 63, 73, 998000, 'XL', 'Trắng', '1'),
(196, 63, 73, 999000, 'M', 'Trắng', '1'),
(197, 63, 73, 987000, 'S', 'Trắng', '1'),
(198, 63, 72, 290000, 'S', 'Xám', '1'),
(199, 64, 72, 290000, 'M', 'Đen', '1'),
(200, 64, 72, 290000, 'S', 'Đen', '1'),
(201, 64, 72, 290000, 'S', 'Xám', '2'),
(202, 65, 72, 290000, 'M', 'Đen', '2'),
(203, 65, 72, 290000, 'S', 'Đen', '2'),
(204, 65, 72, 290000, 'S', 'Xám', '2'),
(205, 65, 78, 1399000, 'S', 'Trắng', '1'),
(206, 66, 77, 399000, 'S', 'Đen', '1'),
(207, 66, 77, 390000, 'L', 'Đen', '1'),
(208, 66, 72, 290000, 'M', 'Đen', '5'),
(209, 66, 72, 290000, 'S', 'Đen', '5'),
(210, 66, 72, 290000, 'S', 'Xám', '2'),
(211, 67, 72, 290000, 'S', 'Xám', '1'),
(212, 67, 72, 290000, 'M', 'Đen', '1'),
(213, 68, 76, 1099000, 'S', 'Trắng', '1'),
(214, 68, 76, 1090000, 'M', 'Đen', '1'),
(215, 68, 77, 390000, 'S', 'Trắng', '1'),
(216, 69, 78, 1399000, 'S', 'Đen', '1'),
(217, 69, 76, 1099000, 'S', 'Trắng', '2'),
(218, 69, 76, 1090000, 'M', 'Đen', '1'),
(219, 69, 77, 390000, 'S', 'Trắng', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `permission_group_id` int(11) UNSIGNED NOT NULL,
  `permission_router` varchar(255) NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `permission_code` varchar(255) NOT NULL,
  `permission_note` text DEFAULT NULL,
  `permission_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_permission`
--

INSERT INTO `tbl_permission` (`permission_id`, `permission_group_id`, `permission_router`, `permission_name`, `permission_code`, `permission_note`, `permission_status`) VALUES
(1, 2, 'category_add', 'Thêm danh mục', 'add.category', NULL, 1),
(2, 2, 'category_update', 'Sửa danh mục', 'category.update', NULL, 1),
(3, 2, 'category_list', 'Xem danh sách danh mục', 'category.list', NULL, 1),
(4, 3, 'phanloai_add', 'Thêm phân loại', 'phanload.add', NULL, 1),
(5, 3, 'phanloai_update', 'Cập nhật phân loại', 'phanloai.update', NULL, 1),
(6, 3, 'phanloai_list', 'Xem danh sách phân loại', 'phanloai.list', NULL, 1),
(7, 7, 'theloai_add', 'Thêm thể loại', 'theloai.add', NULL, 1),
(8, 7, 'theloai_update', 'Cập nhật thể loại', 'theloai.update', NULL, 1),
(9, 7, 'theloai_list', 'Xem danh sách thể loại', 'theloai.list', NULL, 1),
(10, 6, 'color_add', 'Thêm màu sắc', 'color.add', NULL, 1),
(11, 6, 'color_update', 'Cập nhật màu sắc', 'color.update', NULL, 1),
(12, 6, 'color_list', 'Xem danh sách màu sắc', 'color.list', NULL, 1),
(13, 5, 'size_add', 'Thêm mới size', 'size.add', NULL, 1),
(14, 5, 'size_update', 'Cập nhật size', 'size.update', NULL, 1),
(15, 5, 'size_list', 'Xem danh sách size', 'size.list', NULL, 1),
(16, 4, 'brand_list', 'Xem danh sách thương hiệu', 'brand.list', NULL, 1),
(17, 4, 'brand_add', 'Thêm mới thương hiệu', 'brand.add', NULL, 1),
(18, 4, 'brand_update', 'Cập nhật thương hiệu', 'brand.update', NULL, 1),
(19, 8, 'product_add', 'Thêm sản phẩm', 'product.add', NULL, 1),
(20, 8, 'product_update', 'Cập nhật sản phẩm', 'product.update', NULL, 1),
(21, 8, 'product_list', 'Xem danh sách sản phẩm', 'product.list', NULL, 1),
(22, 8, 'product_deatil', 'Xem chi tiết sản phẩm', 'product.deatil', NULL, 1),
(23, 17, 'voucher_add', 'Thêm mới voucher', 'voucher.add', NULL, 1),
(24, 17, 'voucher_update', 'Cập nhật voucher', 'voucher.update', NULL, 1),
(25, 17, 'voucher_list', 'Xem danh sách voucher', 'voucher_list', NULL, 1),
(26, 10, 'position_add', 'Thêm chức vụ', 'position.add', NULL, 1),
(27, 10, 'position_update', 'Cập nhật chức vụ', 'position.update', NULL, 1),
(28, 10, 'position_list', 'Xem danh sách chức vụ', 'position.list', NULL, 1),
(29, 11, 'staff_list', 'Xem danh sách nhân viên', 'staff.list', NULL, 1),
(30, 11, 'staff_add', 'Thêm nhân viên', 'staff_add', NULL, 1),
(31, 11, 'staff_update', 'Cập nhật thông tin nhân viên', 'staff.update', NULL, 1),
(32, 11, 'deatil_staff', 'Xem chi tiết nhân viên', 'deatil.staff', NULL, 1),
(33, 12, 'permission.Group.list', 'Xem danh sách nhóm quyền', 'permission.Group.list', NULL, 1),
(34, 12, 'permission.Group.add', 'Thêm mới nhóm quyền', 'permission.Group.add', NULL, 1),
(35, 12, 'permission.Group.update', 'Cập nhật nhóm quyền', 'permission.Group.update', NULL, 1),
(36, 13, 'permission.list', 'Xem danh sách quyền chi tiết', 'permission.list', NULL, 1),
(37, 13, 'permission.add', 'Thêm mới quyền', 'permission.add', NULL, 1),
(38, 13, 'permission.update', 'Cập nhật nhóm quyền', 'permission.update', NULL, 1),
(39, 12, 'permission.deatil', 'Xem chi tiết quyền', 'permission.deatil', NULL, 1),
(40, 14, 'methodPayment_list', 'Xem danh sách phương thức thanh toán', 'methodPayment.list', NULL, 1),
(41, 14, 'methodPayment_add', 'Thêm mới phương thức thanh toán', 'methodPayment.add', NULL, 1),
(42, 14, 'methodPayment_update', 'Cập nhật phương thức thanh toán', 'methodPayment.update', NULL, 1),
(43, 15, 'statusPayment_list', 'Xem các trạng thái hóa đơn', 'statusPayment.list', NULL, 1),
(44, 15, 'statusPayment_add', 'Thêm trạng thái hóa đơn', 'statusPayment.add', NULL, 1),
(45, 15, 'statusPayment_update', 'Cập nhật trạng thái hóa đơn', 'statusPayment.update', NULL, 1),
(46, 16, 'payment_list', 'xem danh sách hóa đơn', 'payment.list', NULL, 1),
(47, 16, 'payment_deatil', 'Xem chi tiết và cập nhật trạng thái', 'payment.deatil', NULL, 1),
(48, 1, 'user_list', 'Xem danh Sách người dùng', 'user.list', NULL, 1),
(49, 1, 'user_deatil', 'Xem chi tiết người dùng', 'user.deatil', NULL, 1),
(50, 9, 'banner_list', 'Xem danh sách banner', 'banner.list', NULL, 1),
(51, 9, 'banner_add', 'Thêm mới banner', 'banner.add', NULL, 1),
(52, 9, 'banner_update', 'Cập nhật banner', 'banner.update', NULL, 1),
(53, 21, 'pagination.add', 'Thêm mới phân trang', 'pagination.add', NULL, 1),
(54, 21, 'pagination.list', 'Xem danh sách phân trang', 'pagination.list', NULL, 1),
(55, 21, 'pagination.update', 'Cập nhật phân trang', 'pagination.update', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_permission__group`
--

CREATE TABLE `tbl_permission__group` (
  `permission_group_id` int(20) UNSIGNED NOT NULL,
  `permission_group_name` varchar(255) NOT NULL,
  `permission_group_code` varchar(255) NOT NULL,
  `permission_group_note` text DEFAULT NULL,
  `permission_group_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_permission__group`
--

INSERT INTO `tbl_permission__group` (`permission_group_id`, `permission_group_name`, `permission_group_code`, `permission_group_note`, `permission_group_status`) VALUES
(1, 'Quản lý người dùng', 'Manage.User', NULL, 1),
(2, 'Quản lý danh mục', 'Manage.category', '', 1),
(3, 'Quản lý phân loại', 'Manage.PhanLoai', '', 1),
(4, 'Quản lý thương hiệu', 'Manage.Brand', NULL, 1),
(5, 'Quản lý Size', 'Manage.Size', NULL, 1),
(6, 'Quản lý màu sắc', 'Manage.color', NULL, 1),
(7, 'Quản lý thể loại', 'Magane.theloai', NULL, 1),
(8, 'Quản lý sản phẩn', 'Magane.product', NULL, 1),
(9, 'Quản lý banner', 'Manage.banner', NULL, 1),
(10, 'Quản lý vị trí', 'Manage.position', NULL, 1),
(11, 'Quản lý nhân viên', 'Mnage.staff', NULL, 1),
(12, 'Quản lý nhóm quyền', 'Manage.permission.Group', NULL, 1),
(13, 'Quản lý quyền hạn', 'Manage.permisstion', NULL, 1),
(14, 'Quản lý các phương thức thanh toán', 'Manage.method.Payment', NULL, 1),
(15, 'Quản lý trạng thái thanh toán', 'Manage.status.payment', NULL, 1),
(16, 'Quản lý hóa đơn', 'Manage.payment', NULL, 1),
(17, 'Quản lý voucher', 'Manage.voucher', NULL, 1),
(18, 'Xem thêm danh sách', 'Loadmore', NULL, 1),
(19, 'Tìm kiếm', 'search', NULL, 1),
(20, 'Load lại danh sách', 'return', NULL, 1),
(21, 'Phân trang', 'pagination', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phanloai`
--

CREATE TABLE `tbl_phanloai` (
  `phanloai_id` int(10) UNSIGNED NOT NULL,
  `phanloai_name` varchar(255) NOT NULL,
  `phanloai_code` int(11) NOT NULL,
  `phanloai_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phanloai`
--

INSERT INTO `tbl_phanloai` (`phanloai_id`, `phanloai_name`, `phanloai_code`, `phanloai_status`) VALUES
(1, 'Quần', 1, 1),
(2, 'Áo', 2, 1),
(3, 'Phụ kiện', 3, 1),
(4, 'Giầy dép', 4, 1),
(5, 'Váy', 5, 1),
(6, 'Cả set', 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(10) UNSIGNED NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `position_code` varchar(255) NOT NULL,
  `position_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`, `position_code`, `position_status`) VALUES
(1, 'Quản trị viên', 'QTV01', 1),
(2, 'Nhân viên chăm sóc khách hàng', 'NV1', 1),
(3, 'Nhân viên quản lý hóa đơn', 'NV2', 1),
(4, 'Nhân viên quản lý banner', 'ZMXNH02134', 1),
(5, 'Nhân viên quản lý voucher', 'ZMXH031241', 1),
(6, 'Nhân viên quản lý sản phẩm', 'Matega_product', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position_permission`
--

CREATE TABLE `tbl_position_permission` (
  `position_permission_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(11) UNSIGNED NOT NULL,
  `permission_group_id` int(11) UNSIGNED NOT NULL,
  `position_permission_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_position_permission`
--

INSERT INTO `tbl_position_permission` (`position_permission_id`, `position_id`, `permission_group_id`, `position_permission_status`) VALUES
(1, 5, 20, 1),
(2, 5, 19, 1),
(3, 5, 16, 0),
(4, 5, 15, 0),
(5, 5, 14, 0),
(6, 1, 20, 1),
(7, 1, 19, 1),
(8, 1, 18, 1),
(9, 1, 17, 1),
(10, 1, 16, 1),
(11, 1, 15, 1),
(12, 1, 14, 1),
(13, 1, 13, 1),
(14, 1, 12, 1),
(15, 1, 11, 1),
(16, 1, 10, 1),
(17, 1, 9, 1),
(18, 1, 8, 1),
(19, 1, 7, 1),
(20, 1, 6, 1),
(21, 1, 5, 1),
(22, 1, 4, 1),
(23, 1, 3, 1),
(24, 1, 2, 1),
(25, 1, 1, 1),
(26, 5, 17, 1),
(27, 5, 18, 0),
(28, 3, 20, 1),
(29, 3, 19, 1),
(30, 3, 18, 1),
(31, 3, 16, 1),
(32, 3, 15, 1),
(33, 3, 14, 1),
(34, 2, 20, 1),
(35, 2, 19, 1),
(36, 2, 18, 1),
(37, 2, 1, 1),
(38, 4, 20, 1),
(39, 4, 19, 1),
(40, 4, 18, 1),
(41, 4, 9, 1),
(42, 6, 20, 1),
(43, 6, 19, 1),
(44, 6, 18, 1),
(45, 6, 8, 1),
(46, 6, 7, 1),
(47, 6, 6, 1),
(48, 6, 5, 1),
(49, 6, 4, 1),
(50, 6, 3, 1),
(51, 6, 2, 1),
(52, 6, 1, 1),
(53, 1, 21, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `theloai_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_mota` text NOT NULL,
  `product_dacdiem` text NOT NULL,
  `product_baoquan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_code`, `theloai_id`, `brand_id`, `product_status`, `product_mota`, `product_dacdiem`, `product_baoquan`) VALUES
(70, 'Áo chống nắng', 'SUMXO02134', 2, 2, 1, '_Thiết kế 2 lớp cản nắng tuyệt đối, ngăn tia UV &gt; 97% _Thoải m&aacute;i v&agrave; tho&aacute;ng m&aacute;t bởi chất liệu Aircool Nhật Bản si&ecirc;u co gi&atilde;n 4 chiều, mềm mại, t&iacute;ch hợp c&ocirc;ng nghệ lưới tản nhiệt, tho&aacute;ng kh&iacute;. _&Aacute;o Chống Nắng thiết kế mẫu 2 lớp Th&ocirc;ng hơi v&agrave; l&agrave;m m&aacute;t cơ thể _Đai eo bản to tạo eo v&agrave; t&ocirc;n phom d&aacute;ng, Mũ tr&ugrave;m đầu s&acirc;u, c&oacute; lưỡi trai che chắn. _Kho&aacute;, m&aacute;c sắc n&eacute;t, đồng bộ. Kho&aacute; k&eacute;o bền gấp nhiều lần kho&aacute; th&ocirc;ng thường. _Thiết kế bảo mật với 2 t&uacute;i sườn c&oacute; kh&oacute;a k&eacute;o ch&igrave;m + 2 t&uacute;i trong s&acirc;u rộng c&oacute; thể đựng điện thoại, v&iacute; tiền, ... _V&aacute;y liền &aacute;o d&agrave;i che k&iacute;n ch&acirc;n, c&oacute; xẻ sau thuận tiện đi xe m&aacute;y. _Tay d&agrave;i xỏ ng&oacute;n,kho&aacute; k&eacute;o cao c&oacute; thể thay thế khẩu trang.. _Ph&ugrave; hợp chị em c&ocirc;ng sở v&agrave; c&ocirc;ng việc hay di chuyển vừa tr&aacute;nh bụi vừa tr&aacute;nh nắng, tia uv kh&ocirc;ng tốt cho da v&agrave; cơ thể, mang lại cảm gi&aacute;c m&aacute;t mẻ giữa thời tiết nhiệt đới.', '&Aacute;o Chống Nắng V&agrave; Tia UV C&oacute; Mũ V&agrave; Clip Test Gồm 8 M&agrave;u Chất Liệu Vải Chống Nắng Tặng K&egrave;m Khẩu Trang C&ugrave;ng M&agrave;u. Tay &Aacute;o Kho&eacute;t Xỏ Ng&oacute;n Tiện Lợi _TH&Ocirc;NG TIN CHI TIẾT Chất liệu: Vải th&ocirc;ng hơi M&agrave;u sắc: 8 M&agrave;u K&iacute;ch thước: 2 size M (49-58kg) v&agrave; L (56-62kg) Xuất xứ: Việt Nam', 'Kh&ocirc;ng giặt bằng nước giặt m&agrave;u'),
(71, 'CAILY DRESS - ĐẦM THUN CUT OUT', 'SKUM71955', 2, 1, 1, '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Ladies</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Đầm</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Cổ &aacute;o</strong></td>\r\n			<td>C&ocirc;̉ tròn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Tay &aacute;o</strong></td>\r\n			<td>Tay d&agrave;i</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Đầm &ocirc;m</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Qua g&ocirc;́i</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Thun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<p>Sản phẩm thuộc BST Timeless v&agrave; được tr&igrave;nh diễn trong show thời trang&nbsp;Fall Winter 2022. Bộ sưu tập lấy cảm hứng từ phong c&aacute;ch thời trang Academia,&nbsp;cộng hưởng với những &yacute; tưởng s&aacute;ng tạo đầy xu hướng, mang đến diện mạo học thức vượt ra khỏi kh&aacute;i niệm sắc đẹp đơn thuần.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; thiết kế đầm m&agrave; mọi c&ocirc; n&agrave;ng đều n&ecirc;n c&oacute; bởi thiết kế &ocirc;m s&aacute;t, t&ocirc;n l&ecirc;n đường cong cơ thể. Đầm phối c&ugrave;ng&nbsp;đai da (c&oacute; thể th&aacute;o rời)&nbsp;chia&nbsp;ph&acirc;n kh&uacute;c cơ thể tr&ocirc;ng n&agrave;ng sẽ cao hơn. Điểm nhấn l&agrave; phần vai được may cắt kh&eacute;o l&eacute;o, đ&iacute;nh k&egrave;m phụ kiện kim loại gi&uacute;p bộ trang phục th&ecirc;m sang trọng.</p>\r\n\r\n<p>Chất liệu được sử dụng l&agrave; loại thun d&agrave;y dặn, mềm nhẹ, giữ ấm tốt c&ugrave;ng m&agrave;u sắc trung t&iacute;nh rất ph&ugrave; hợp với&nbsp;thời tiết se lạnh.&nbsp;</p>\r\n\r\n<p>Đầm dễ d&agrave;ng mix c&ugrave;ng nhiều kiểu &aacute;o kho&aacute;c. Phối đầm c&ugrave;ng đ&ocirc;i boots da l&agrave; n&agrave;ng sẽ c&oacute; 1 outfit thật c&aacute; t&iacute;nh.</p>\r\n\r\n<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\r\n\r\n<p><strong>Chiều cao:</strong>&nbsp;167 cm</p>\r\n\r\n<p><strong>C&acirc;n nặng:</strong>&nbsp;50 kg</p>\r\n\r\n<p><strong>Số đo 3 v&ograve;ng:</strong>83-65-93 cm</p>\r\n\r\n<p>Mẫu mặc size M</p>\r\n\r\n<p>Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh&nbsp;do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị&nbsp;qua mản h&igrave;nh m&aacute;y t&iacute;nh/ điện&nbsp;thoại.</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\r\n\r\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\r\n\r\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\r\n\r\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\r\n\r\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\r\n\r\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\r\n\r\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\r\n\r\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\r\n\r\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\r\n\r\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\r\n\r\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\r\n\r\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(72, 'ÁO SƠ MI KHUY CÁCH ĐIỆU', 'SKUZM17036', 7, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>Ladies</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>&Aacute;o</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>C&ocirc;̉ khác</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Tay dài</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Xu&ocirc;ng</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Dài thường</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Lụa</td>\n		</tr>\n	</tbody>\n</table>', '<p>&Aacute;o sơ mi cổ c&aacute;ch điệu, tay d&agrave;i bo gấu c&oacute; khuy c&agrave;i. Vạt lệch 1 b&ecirc;n c&oacute; h&agrave;ng khuy c&aacute;ch điệu kiểu tạo b&egrave;o. D&aacute;ng &aacute;o xu&ocirc;ng.</p>\n\n<p>Thiết kế thanh lịch, bắt mắt v&agrave; mới lạ. Sử dụng chất liệu lụa mềm mại, c&oacute; độ b&oacute;ng nhẹ. Mix c&ugrave;ng ch&acirc;n v&aacute;y b&uacute;t ch&igrave;, xếp ly hay quần d&agrave;i đều ph&ugrave; hợp n&agrave;ng nh&eacute;!</p>\n\n<p>M&agrave;u sắc: Trắng - Nude</p>\n\n<p><strong>Mẫu mặc size S:</strong></p>\n\n<ul>\n	<li><em><strong>Chiều cao:</strong></em>&nbsp;1m66</li>\n	<li><em><strong>C&acirc;n nặng:</strong></em>&nbsp;48kg</li>\n	<li><em><strong>Số đo 3 v&ograve;ng</strong></em>: 78-61-88 cm</li>\n</ul>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(73, 'ÁO SƠ MI LỤA CỔ TRỤ PHỐI BÈO', 'SKUZM17552', 7, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>Ladies</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>&Aacute;o</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>C&ocirc;̉ khác</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Tay dài</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Xu&ocirc;ng</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Dài thường</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Lụa</td>\n		</tr>\n	</tbody>\n</table>', '<p>&nbsp;&Aacute;o&nbsp;sơ mi&nbsp;cổ trụ, thiết kế phối&nbsp;b&egrave;o&nbsp;tiểu thư ph&ugrave; hợp cho c&aacute;c n&agrave;ng c&ocirc;ng sở y&ecirc;u&nbsp;th&iacute;ch kiểu nữ t&iacute;nh dịu d&agrave;ng.&nbsp;</p>\n\n<p>Tay &aacute;o d&agrave;i, c&oacute; xếp ly nhỏ tạo độ bồng nhẹ. Viền cổ tay nhỏ, đ&iacute;nh khuy kim loại cố định, mang đến sự thanh tho&aacute;t, kh&aacute; tinh tế.</p>\n\n<p>&Aacute;o lựa chọn chất liệu lụa mềm mại, mặc nhẹ v&agrave; thoải m&aacute;i. Bạn h&atilde;y mix &aacute;o c&ugrave;ng quần T&acirc;y, ch&acirc;n v&aacute;y...để c&oacute; ngay một Outfit thời thượng khi đi l&agrave;m hay đi gặp mặt bạn b&egrave;.&nbsp;</p>\n\n<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\n\n<p><strong>Chiều cao:&nbsp;</strong>167 cm</p>\n\n<p><strong>C&acirc;n nặng:&nbsp;</strong>50 kg</p>\n\n<p><strong>Số đo 3 v&ograve;ng:&nbsp;</strong>83-65-93 cm</p>\n\n<p>Mẫu mặc size M Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh/ điện thoại.</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(74, 'Dalio Trouser - Quần Tây cúc lệch fit', 'SKUEZ39902', 5, 1, 1, 'Ph&ugrave; hợp với d&acirc;n c&ocirc;ng sở', '<p>- Quần &acirc;u&nbsp;d&aacute;ng Regular d&agrave;i ngang mắt c&aacute; ch&acirc;n&nbsp;lịch l&atilde;m, sang trọng gi&uacute;p cơ thể trở l&ecirc;n c&acirc;n đối&nbsp;hơn.</p>\n\n<p>- Form quần đơn giản dễ diện, dễ phối đồ v&agrave; ph&ugrave; hợp cho nhiều sự kiện từ đi l&agrave;m, đi họp, đi học đến đi chơi.</p>\n\n<p>- Chất liệu&nbsp;Tuysi co d&atilde;n tốt gi&uacute;p người mặc thoải m&aacute;i vận động.</p>\n\n<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\n\n<p><strong>Chiều cao:</strong>&nbsp;175 cm</p>\n\n<p><strong>C&acirc;n nặng:</strong>&nbsp;70 kg</p>\n\n<p><strong>Số đo 3 v&ograve;ng:&nbsp;</strong>98-75-97 cm</p>\n\n<p>Mẫu mặc size M</p>', 'Kh&ocirc;ng giặt m&aacute;y'),
(75, 'Măng tô TANA PANTS', 'ZMXBH03124', 4, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>You</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>Quần</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Kh&aacute;c</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Ngang mắt c&aacute; ch&acirc;n</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Tuysi</td>\n		</tr>\n	</tbody>\n</table>', '<p>ana Pants&nbsp;nằm trong BST&nbsp;EXPRESS tham gia tr&igrave;nh diễn tại show thời trang&nbsp;FALL/WINTER 2023, nơi những gi&aacute; trị đ&iacute;ch thực được đ&aacute;nh thức v&agrave; tỏ b&agrave;y th&ocirc;ng qua c&aacute;c thiết kế cao cấp nhất!&nbsp;</p>\n\n<p>Quần d&aacute;ng su&ocirc;ng, ống rộng. Thiết kế chiết ly th&acirc;n trước tạo điểm nhấn cũng như tăng sự mềm&nbsp; mại v&agrave; uyển chuyển. Thiết kế&nbsp; l&agrave; c&acirc;u trả lời ho&agrave;n hảo cho những ng&agrave;y kh&ocirc;ng biết biết măc g&igrave;. Những c&ocirc; n&agrave;ng y&ecirc;u th&iacute;ch phối &aacute;o croptop hay c&aacute;ch mặc sơ vin chắc hẳn sẽ rất ưng &yacute; item n&agrave;y.&nbsp;</p>\n\n<p>Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh/ điện thoại.</p>\n\n<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\n\n<p><strong>Chiều cao:&nbsp;</strong>167 cm</p>\n\n<p><strong>C&acirc;n nặng:&nbsp;</strong>50 kg</p>\n\n<p><strong>Số đo 3 v&ograve;ng:&nbsp;</strong>83-65-93 cm</p>\n\n<p>Mẫu mặc size M</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(76, 'TRENCH COAT - ÁO KHOÁC MĂNG TÔ CÓ ĐAI', 'SKUZM719547', 4, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>You</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>&Aacute;o kho&aacute;c</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>Cổ hai ve</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Tay liền</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Eo</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Ngang bắp ch&acirc;n</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Khaki</td>\n		</tr>\n	</tbody>\n</table>', '<p>Hướng đến Fall/Winter 2023 Collection, nơi bản tuy&ecirc;n ng&ocirc;n thời trang của IVY moda tr&ecirc;n đường phố Paris - Kinh đ&ocirc; thời trang thế giới, gi&uacute;p cho những người phụ nữ tự tin bước ra khỏi v&ugrave;ng an to&agrave;n v&agrave; tỏa s&aacute;ng theo c&aacute;ch ri&ecirc;ng của họ.</p>\n\n<p>Trench coat được ưu &aacute;i nằm trong những thước phim đầu của BST, biểu tượng thời trang khẳng định sự thanh lịch của người phụ nữ.</p>\n\n<p>Trench coat của IVY moda đi s&acirc;u v&agrave;o phom d&aacute;ng, chi tiết như cầu vai mềm, vạt &aacute;o c&aacute;ch điệu. Hai b&ecirc;n cổ &aacute;o được đ&iacute;nh khuy c&agrave;i tinh tế cho những ng&agrave;y lạnh, gi&uacute;p giữ ấm phần cổ, đ&acirc;y l&agrave; sự tận t&acirc;m m&agrave; c&aacute;c nh&agrave; thiết kế muốn gửi tới kh&aacute;ch h&agrave;ng v&agrave; mang đến sự kh&aacute;c biệt, đẳng cấp của thương hiệu thời trang h&agrave;ng đầu Việt Nam.</p>\n\n<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\n\n<p><strong>Chiều cao:&nbsp;</strong>167 cm</p>\n\n<p><strong>C&acirc;n nặng:&nbsp;</strong>50 kg</p>\n\n<p><strong>Số đo 3 v&ograve;ng:&nbsp;</strong>83-65-93 cm</p>\n\n<p>Mẫu mặc size M</p>\n\n<p>Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh/ điện thoại.</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(77, 'TRENCH COAT - AS AGELESS AS THE SUN', 'SKULK717404', 4, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>You</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>&Aacute;o kho&aacute;c</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>Cổ hai ve</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Tay d&agrave;i</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Xu&ocirc;ng</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Ngang bắp ch&acirc;n</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Tuysi</td>\n		</tr>\n	</tbody>\n</table>', '<p>&Aacute;o kho&aacute;c&nbsp;thiết kế cổ hai ve bản to, d&aacute;ng d&agrave;i&nbsp;c&ugrave;ng m&agrave;u sắc sang trọng, kiểu d&aacute;ng v&ocirc; c&ugrave;ng&nbsp;đẳng cấp. Với chất liệu Tuysi cao cấp bề mặt vải mềm mịn, kh&ocirc;ng g&acirc;y t&iacute;ch điện v&agrave; khả năng giữ form cực tốt.&nbsp;Eo sử đụng đai đồng m&agrave;u k&egrave;m hai h&agrave;ng c&uacute;c&nbsp;mặt trước. th&acirc;n dưới x&ograve;e nhẹ gi&uacute;p người mặc sải bước tự tin khi đi xuống phố, đi l&agrave;m, hay đi event...</p>\n\n<p>Lấy cảm hứng từ trang phục của qu&acirc;n đội ch&acirc;u &Acirc;u, những chiếc &aacute;o trench coat từ l&acirc;u đ&atilde; khẳng định sự &ldquo;thống trị&rdquo; trong tủ đồ thời trang thu &ndash; đ&ocirc;ng. Thời thượng, thanh lịch nhưng kh&ocirc;ng k&eacute;m phần c&aacute; t&iacute;nh, &aacute;o trench coat dễ d&agrave;ng l&agrave;m xi&ecirc;u l&ograve;ng cả những qu&yacute; c&ocirc;, qu&yacute; &ocirc;ng kh&oacute; t&iacute;nh nhất</p>\n\n<p>C&ugrave;ng với sự c&aacute;ch điệu phần vạt &aacute;o, lấy nguồn cảm hứng bất tận từ những qu&yacute; c&ocirc; người Ph&aacute;p v&agrave; sự s&aacute;ng tạo vượt khu&ocirc;n khổ, IVY moda đ&atilde; tạo n&ecirc;n chiếc &aacute;o Trench Coat vừa cổ điển vừa hiện đại tinh tế.</p>\n\n<p>M&agrave;u sắc: Đen - Nude</p>\n\n<p><strong>Mẫu mặc size M:</strong></p>\n\n<p>Chiều cao: 1m74<br />\nC&acirc;n nặng: 49kg<br />\nSố đo 3 v&ograve;ng: 80-57-88</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(78, 'ÁO KHOÁC măng tô', 'SKUZM77715', 4, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>You</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>&Aacute;o kho&aacute;c</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>Cổ hai ve</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Tay d&agrave;i</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Xu&ocirc;ng</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Ngang đ&ugrave;i</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Dạ</td>\n		</tr>\n	</tbody>\n</table>', '<p>Thiết kế cổ hai ve, d&agrave;i tay, phom su&ocirc;ng với độ d&agrave;i ngang đ&ugrave;i đem lại phong c&aacute;ch thời trang trẻ trung, thanh lịch. Chi tiết 2 t&uacute;i ch&eacute;o mặt trước thu h&uacute;t v&agrave; cực kỳ tiện lợi, gi&uacute;p c&aacute;c chị c&oacute; thể để những vật nhỏ xinh như: điện thoại, son, tiền...</p>\n\n<p>Chất liệu dạ cao cấp d&agrave;y dặn, mềm mại c&ugrave;ng khả năng giữ nhiệt vượt trội.</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(79, 'SET BỘ ÁO DÀI NGUYỆT THANH', 'SKUMM07104', 1, 1, 1, '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>Ladies</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>Đầm</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>C&ocirc;̉ tàu trụ</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Giắc lăng</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Su&ocirc;ng</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Ngang bắp</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Th&ecirc;u</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Tapta</td>\n		</tr>\n	</tbody>\n</table>', '<p>Đắm ch&igrave;m trong vẻ đẹp mong manh, tựa sương mai của người phụ nữ trong t&agrave; &aacute;o d&agrave;i, ta như thi sĩ u m&ecirc; với t&igrave;nh y&ecirc;u c&aacute;i đẹp. N&oacute; l&agrave;m ta say bởi b&ocirc;ng hoa c&uacute;c mẫu đơn sakura - lo&agrave;i hoa rực rỡ v&agrave; xinh đẹp nhất tại Nhật Bản, khiến ta nghẹn ng&agrave;o bởi sức sống trường tồn, vững chắc v&agrave; mang đến &yacute; niệm về sức khỏe, an y&ecirc;n cho con người.</p>\n\n<p><strong>Nguyệt Thanh:</strong>&nbsp;Sử dụng chất liệu taffa để t&aacute;i hiện c&aacute;c mẫu thiết kế. Tr&ecirc;n t&ocirc;ng m&agrave;u đỏ độc đ&aacute;o, nổi bật l&ecirc;n họa tiết hoa mẫu đơn sakura được vẽ tay, thiết kế độc quyền từ IVY moda v&agrave; được chuyển thể để in th&agrave;nh vải. Mang đến sự kh&aacute;c biệt v&agrave; đẳng cấp cho từng thiết kế.</p>\n\n<p><strong>Kiểu d&aacute;ng:</strong>&nbsp;&aacute;o d&agrave;i thiết kế tay Giắc lăng, tone m&agrave;u đỏ trơn, kết hợp hoa th&ecirc;u<br />\n<strong>Ph&ugrave; hợp:&nbsp;</strong>lễ tết, cưới hỏi, đi sự kiện, tạo vẻ trẻ trung, duy&ecirc;n d&aacute;ng cho người mặc.</p>\n\n<p>M&agrave;u sắc: Đỏ Ruby</p>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(80, 'Cả Bộ quần áo', 'ASSBC03214', 10, 1, 1, '<p>&Aacute;o thun xoắn eo l&agrave; một lựa chọn thời trang, xu hướng, hiện đại cho b&eacute; y&ecirc;u. &Aacute;o thun c&oacute; thiết kế xoắn ốc ở phần eo để tạo điểm nhấn, gi&uacute;p &aacute;o trở n&ecirc;n nữ t&iacute;nh, dễ thương hơn.&nbsp;</p>\n\n<p>Mẹ lựa chọn mix &aacute;o cho con với quần jogger, quần shorts hoặc quần jean để tạo n&ecirc;n c&aacute;c outfits đẹp mắt, ph&ugrave; hợp nhiều dịp kh&aacute;c nhau.</p>', '<table style=\"width:70%\">\n	<tbody>\n		<tr>\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\n			<td>Girl</td>\n		</tr>\n		<tr>\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\n			<td>&Aacute;o</td>\n		</tr>\n		<tr>\n			<td><strong>Cổ &aacute;o</strong></td>\n			<td>C&ocirc;̉ tròn</td>\n		</tr>\n		<tr>\n			<td><strong>Tay &aacute;o</strong></td>\n			<td>Tay ngắn</td>\n		</tr>\n		<tr>\n			<td><strong>Kiểu d&aacute;ng</strong></td>\n			<td>Xu&ocirc;ng</td>\n		</tr>\n		<tr>\n			<td><strong>Độ d&agrave;i</strong></td>\n			<td>Croptop</td>\n		</tr>\n		<tr>\n			<td><strong>Họa tiết</strong></td>\n			<td>Trơn</td>\n		</tr>\n		<tr>\n			<td><strong>Chất liệu</strong></td>\n			<td>Thun</td>\n		</tr>\n	</tbody>\n</table>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\n\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\n\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\n\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\n\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\n\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\n\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\n\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\n\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\n\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\n\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>'),
(81, 'áo hoodie nỉ', 'SKUXM78E26', 11, 1, 1, '<p>&nbsp;Chất liệu: Sử dụng vải Interlock th&agrave;nh phần gồm 65%Cotton 30% Polyester 5%Spandex. Đ&acirc;y l&agrave; sự kết hợp giữa sợi cotton v&agrave; sợi chiết suất tổng hợp c&oacute; độ co gi&atilde;n đ&agrave;n hồi cao. T&iacute;nh năng&nbsp;chống gi&oacute;, c&aacute;ch nhiệt giữ ấm cơ thể.</p>\n\n<p>-&nbsp;Thiết kế &aacute;o kho&aacute;c d&aacute;ng&nbsp;hoodie cơ bản, d&aacute;ng oversize trẻ trung năng động:&nbsp;mũ c&oacute; d&acirc;y r&uacute;t, kh&oacute;a k&eacute;o ph&iacute;a trước.</p>\n\n<p>- Quần d&agrave;i c&ugrave;ng bộ cạp chun co gi&atilde;n, c&oacute; d&acirc;y r&uacute;t dễ d&agrave;ng điều chỉnh v&ograve;ng eo, 2 t&uacute;i vu&ocirc;ng ph&iacute;a trước. Ống quần bo gấu.</p>', '<p><strong>Th&ocirc;ng tin mẫu:</strong></p>\n\n<p><strong>Chiều cao:</strong>&nbsp;180 cm</p>\n\n<p><strong>C&acirc;n nặng:</strong>&nbsp;68 kg</p>\n\n<p><strong>Số đo 3 v&ograve;ng:</strong>97-77-92 cm</p>\n\n<p>Mẫu mặc size L</p>\n\n<p>Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh/ điện thoại.</p>', 'Kh&ocirc;ng giặt m&aacute;y qu&aacute; nhiều'),
(82, 'Áo khoác Gile trơn phối túi MS', 'XNZME40521', 12, 1, 1, '<p>Lấy cảm hứng từ sự kết hợp tinh tế giữa văn ho&aacute; đ&ocirc; thị v&agrave; phong c&aacute;ch c&aacute; nh&acirc;n, BST &quot;URBAN REFINED&quot;&nbsp;t&ocirc;n vinh sự hiện đại v&agrave; tối giản trong bản sắc thời trang của những qu&yacute; anh th&agrave;nh thị.</p>\n\n<p>Nổi bật trong BST với t&iacute;nh thời trang v&agrave; tiện lợi l&agrave; mẫu thiết kế kho&aacute;c Gile phối t&uacute;i trẻ trung, hiện đại.</p>\n\n<p>&Aacute;o sở hữu hai gam m&agrave;u tối giản, mang đến cảm gi&aacute;c b&iacute; ẩn cũng như gi&uacute;p Qu&yacute; anh thể hiển vẻ ngo&agrave;i l&ocirc;i cuốn, đầy sức h&uacute;t. &Aacute;o d&aacute;ng Gile kh&ocirc;ng cổ, c&oacute; kh&oacute;a&nbsp;k&eacute;o, tạo n&ecirc;n sự thoải m&aacute;i cho bộ&nbsp;trang phục.&nbsp;</p>', '<p>Đặc biệt, &aacute;o kho&aacute;c Gile được l&agrave;m từ chất liệu nhung mịn vừa mềm mại, ấp &aacute;p vừa sang trọng, đẳng cấp c&ograve;n g&oacute;p phần tạo ra n&ecirc;n vẻ ngo&agrave;i&nbsp;lịch l&atilde;m v&agrave; phong c&aacute;ch.&nbsp;</p>\n\n<p>Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị qua m&agrave;n h&igrave;nh m&aacute;y t&iacute;nh/ điện thoại.</p>', 'Kh&ocirc;ng giặt l&agrave; ủi qu&aacute; nhiều'),
(89, 'QUẦN ÂU NAM CAO CẤP DÁNG SLIM', 'SKUCM22771', 5, 1, 1, '<p>Quần &Acirc;u Kẻ caro c&oacute; 2 t&uacute;i ch&eacute;o ph&iacute;a trước, 2 t&uacute;i viền c&oacute; 1 khuy ph&iacute;a sau. Đai quần c&oacute; đỉa.&nbsp;C&agrave;i ph&iacute;a trước bằng kh&oacute;a k&eacute;o v&agrave; khuy.</p>\r\n\r\n<p>Form d&aacute;ng Slim&nbsp;kết hợp kẻ caro tạo phong c&aacute;ch trẻ trung. Kiểu d&aacute;ng ho&agrave;n hảo d&agrave;nh cho c&aacute;c ch&agrave;ng trai văn ph&ograve;ng, c&ocirc;ng sở.&nbsp;Bạn&nbsp;c&oacute; thể thoải m&aacute;i mặc&nbsp;từ những ng&agrave;y đi l&agrave;m b&igrave;nh thường hay những buổi họp h&agrave;nh cần sự chỉnh chu. Chất vải mềm mịn c&ugrave;ng l&oacute;t trong sắc n&eacute;t, tạo cảm gi&aacute;c thoải m&aacute;i khi di chuyển v&agrave; l&agrave;m việc.&nbsp;</p>\r\n\r\n<p>Kết hợp với&nbsp;&aacute;o sơ mi v&agrave; vest c&ugrave;ng set tạo n&ecirc;n 1 bộ trang phục lịch l&atilde;m, sang trọng.</p>\r\n\r\n<p>M&agrave;u sắc: Họa tiết Ch&igrave; -&nbsp;Họa tiết Xanh Dương Đậm -&nbsp;Họa tiết N&acirc;u Đen -&nbsp;Họa tiết Xanh T&iacute;m Than</p>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Men</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Slim</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Qua mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Kẻ</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Tuysi</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<p>Chi tiết bảo quản sản phẩm :&nbsp;</p>\r\n\r\n<p><strong>* C&aacute;c sản phẩm thuộc d&ograve;ng cao cấp (Senora) v&agrave; &aacute;o kho&aacute;c (dạ, tweed,&nbsp;l&ocirc;ng, phao) chỉ giặt kh&ocirc;,&nbsp;tuyệt đối kh&ocirc;ng giặt ướt.</strong></p>\r\n\r\n<p>* Vải dệt kim: sau khi giặt sản phẩm phải được phơi ngang tr&aacute;nh bai gi&atilde;n.</p>\r\n\r\n<p>* Vải voan, lụa, chiffon n&ecirc;n giặt bằng tay.</p>\r\n\r\n<p>* Vải th&ocirc;, tuytsi, kaki kh&ocirc;ng c&oacute; phối hay trang tr&iacute; đ&aacute; cườm th&igrave; c&oacute; thể giặt m&aacute;y.</p>\r\n\r\n<p>* Vải th&ocirc;, tuytsi, kaki c&oacute;&nbsp;phối m&agrave;u tương phản hay trang tr&iacute; voan, lụa, đ&aacute; cườm th&igrave; cần giặt tay.</p>\r\n\r\n<p>* Đồ Jeans n&ecirc;n hạn chế giặt bằng m&aacute;y giặt v&igrave; sẽ l&agrave;m phai m&agrave;u jeans. Nếu giặt th&igrave;&nbsp;n&ecirc;n lộn tr&aacute;i sản phẩm khi giặt, đ&oacute;ng khuy, k&eacute;o kh&oacute;a, kh&ocirc;ng n&ecirc;n giặt chung c&ugrave;ng đồ s&aacute;ng m&agrave;u, tr&aacute;nh d&iacute;nh m&agrave;u v&agrave;o c&aacute;c sản phẩm kh&aacute;c.&nbsp;</p>\r\n\r\n<p>* C&aacute;c sản phẩm cần được giặt ngay kh&ocirc;ng ng&acirc;m tr&aacute;nh bị loang m&agrave;u, ph&acirc;n biệt m&agrave;u v&agrave; loại vải để tr&aacute;nh trường hợp vải phai. Kh&ocirc;ng n&ecirc;n giặt sản phẩm với x&agrave; ph&ograve;ng c&oacute; chất tẩy mạnh, n&ecirc;n giặt c&ugrave;ng x&agrave; ph&ograve;ng pha lo&atilde;ng.</p>\r\n\r\n<p>* C&aacute;c sản phẩm c&oacute; thể&nbsp;giặt bằng m&aacute;y th&igrave; chỉ n&ecirc;n để chế độ giặt nhẹ, vắt mức trung b&igrave;nh v&agrave; n&ecirc;n ph&acirc;n c&aacute;c loại sản phẩm c&ugrave;ng m&agrave;u v&agrave; c&ugrave;ng loại vải khi giặt.</p>\r\n\r\n<p>* N&ecirc;n phơi sản phẩm tại chỗ tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp sẽ dễ bị phai bạc m&agrave;u, n&ecirc;n l&agrave;m kh&ocirc; quần &aacute;o bằng c&aacute;ch phơi ở những điểm gi&oacute; sẽ giữ m&agrave;u vải tốt hơn.</p>\r\n\r\n<p>* Những chất vải 100% cotton, kh&ocirc;ng n&ecirc;n phơi sản phẩm bằng mắc &aacute;o m&agrave; n&ecirc;n vắt ngang sản phẩm l&ecirc;n d&acirc;y phơi để tr&aacute;nh t&igrave;nh trạng rạn vải.</p>\r\n\r\n<p>* Khi ủi sản phẩm bằng b&agrave;n l&agrave; v&agrave; sử dụng chế độ hơi nước sẽ l&agrave;m cho sản phẩm dễ ủi phẳng, m&aacute;t v&agrave; kh&ocirc;ng bị ch&aacute;y, giữ m&agrave;u sản phẩm được đẹp v&agrave; bền l&acirc;u hơn. Nhiệt độ của b&agrave;n l&agrave; t&ugrave;y theo từng loại vải.&nbsp;</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_producthot`
--

CREATE TABLE `tbl_producthot` (
  `productHot_id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `productHot_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_producthot`
--

INSERT INTO `tbl_producthot` (`productHot_id`, `product_id`, `productHot_status`) VALUES
(1, 70, 0),
(2, 71, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_img`
--

CREATE TABLE `tbl_product_img` (
  `productImg_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `productImg_name` varchar(255) NOT NULL,
  `productImg_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_img`
--

INSERT INTO `tbl_product_img` (`productImg_id`, `product_id`, `productImg_name`, `productImg_status`) VALUES
(114, 70, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1694952672328-d5d5da44c159b0f1ab0aa0a9e340453f%20(1).jpg?alt=media&token=210afa1f-9125-4ab2-8ef1-87c71230fe0a', 1),
(115, 70, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1694952672330-d5d5da44c159b0f1ab0aa0a9e340453f.jpg?alt=media&token=0f40553e-2f99-4019-bfe4-0aaab8f00ef7', 1),
(117, 70, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695221237343-bdd1e9e2afb733bbdec94171cdc179af.jpg?alt=media&token=9c868a21-31db-48d8-af2f-17e6aa90f5e1', 1),
(118, 70, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695221237343-d5d5da44c159b0f1ab0aa0a9e340453f%20(1).jpg?alt=media&token=80ba7c23-fc91-48d4-a703-a924432bc42a', 1),
(119, 70, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695221237344-d5d5da44c159b0f1ab0aa0a9e340453f.jpg?alt=media&token=1263f124-b742-4fc4-89e9-a8b8835ba670', 1),
(120, 71, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695379231503-682ed1a18891a2b9cdebcf82c5895541.jpg?alt=media&token=092bac87-23c8-4373-bf45-12feb44d17f0', 1),
(121, 71, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695379231505-d5f35f15e86873b1ba081e107b3a4fe2.jpg?alt=media&token=3f706dab-3b5a-41a8-8173-e6a150e08953', 1),
(122, 71, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695379231505-e84d3542a8dc6806cabd812ea9eecdd7%20(1).jpg?alt=media&token=28caec53-0a0a-4f98-872e-f49d323b1c7a', 1),
(123, 71, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695379231506-e84d3542a8dc6806cabd812ea9eecdd7.jpg?alt=media&token=f205df39-d89b-4a1d-9e53-dede064a5813', 1),
(124, 72, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697443695422-05b89fd5d1e61948642861301fee408c.jpg?alt=media&token=a6a07b60-6ffb-48c9-bb0d-17a3b185f119', 1),
(125, 72, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697443695423-17ab7fd6b3f5abd57d854045e5093144.jpg?alt=media&token=38b6568a-c96b-4bbc-9bbd-37e5ef47db63', 1),
(126, 72, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697443695424-002369258e5d33ff0d35c872a20e4283.jpg?alt=media&token=c34f962b-8b2d-470e-840f-37777af88178', 1),
(127, 72, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697443695424-d1e8b4239e3b0923b0a2878bd98c4303.jpg?alt=media&token=78c27bb2-c0c6-4aaf-95ce-5ed2471cc161', 1),
(128, 73, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697444928734-32ba2cabeb7855158c85a3392d65b3f8.jpg?alt=media&token=ece920a9-9009-43ec-af1a-3a9a06630b0b', 1),
(129, 73, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697444928735-a2827d3d84e505a4e7cdda44b256d230.jpg?alt=media&token=3d3318a1-73e8-46c4-bc45-a07f316f22f7', 1),
(130, 73, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697444928736-d878e6a286326d2c95c0b69c88d38329.jpg?alt=media&token=35a2a0ea-1169-477c-8105-7c0b6cf18db6', 1),
(131, 73, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697444928736-e81a4c82801aae9013e5468c75140b9b.jpg?alt=media&token=e5a8661c-57c7-4c83-ae17-16554b353633', 1),
(132, 73, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697444928737-ff74da15a8c24facbaeb14418c38360a.jpg?alt=media&token=fd933438-3523-46c1-978b-02112571df56', 1),
(133, 74, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697445933573-38c250cd5a01a13cef16892b0d7a91e5.jpg?alt=media&token=94ff6851-8714-40b8-8699-3f3b160a39af', 1),
(134, 74, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697445933574-5806ef919db07a3f682fafe51cbeb94f.jpg?alt=media&token=4b2d2da1-ff23-43ed-84ab-99467bcf1190', 1),
(135, 74, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697445933575-bb7f432cc8831f9de1770da01ff4238c.jpg?alt=media&token=7f8a6cc0-ae73-4f2c-8a16-8032e720da6f', 1),
(136, 74, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697445933576-c66e5c37bc0f72c4ce56debb08192a51.jpg?alt=media&token=a204ddb2-1ed5-45c5-abe5-52f43d969502', 1),
(137, 74, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697445933576-c604c1cbe041fde06f61d21aa3192d42.jpg?alt=media&token=ad2bf4f6-18a1-476f-916e-081ee0bbf112', 1),
(138, 74, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697445933577-ff74da15a8c24facbaeb14418c38360a.jpg?alt=media&token=0605237f-f754-4249-bb84-d4dfb80f79f8', 1),
(139, 75, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697525476929-8d7e7d0d8bfea478a393279575cedfbf.jpg?alt=media&token=47c4307a-5aa7-4ab0-b7e6-36481548537f', 1),
(140, 75, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697525476932-c604c1cbe041fde06f61d21aa3192d42.jpg?alt=media&token=a9f919d6-2627-4267-b993-42841027eab6', 1),
(141, 76, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697525905221-4cbf781d344e20cb3351978605d7bb26%20(1).jpg?alt=media&token=02969a79-c7ba-475c-9cca-574d76578742', 1),
(142, 76, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697525905222-4cbf781d344e20cb3351978605d7bb26.jpg?alt=media&token=0e3889c7-74e3-425f-b485-f37738181643', 1),
(143, 76, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697525905223-93210cb2ed06bbb36050d9679ba9b361.jpg?alt=media&token=6397c2bb-057d-4802-8feb-ffecc0743b0a', 1),
(144, 76, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697525905223-e8d12f10fc80c4b0a08dd8f5ba95ba53.jpg?alt=media&token=aab866ff-0784-4e8b-a885-ffc33b00e04a', 1),
(145, 77, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526280903-1d248ae8844204f60f00727e05b21288.jpg?alt=media&token=ecce1093-9a58-40ad-8d57-835493ddbdb9', 1),
(146, 77, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526280905-29ea2e87c3bc0597115ee0bc2d561ce4.jpg?alt=media&token=04ee7e69-7cdf-49ec-8664-34a48c3f7963', 1),
(147, 77, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526280905-501efe15791bbe593b328e3f54950f6d.jpg?alt=media&token=571acb61-4ac3-42e6-804c-f418abba55cb', 1),
(148, 77, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526280906-af658c574760b114ff1a124287243dd5.jpg?alt=media&token=c3648f36-e314-4aae-b96a-c9c5844ccbd2', 1),
(149, 78, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526479123-cbaaac4115be77f581699107ada10b22.jpg?alt=media&token=cd4686bf-e915-4736-8358-3cf9dc793fb1', 1),
(150, 78, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526479124-cc37615113b79d8a2834ced80cfbe4cc.jpg?alt=media&token=6fe03126-6333-4b28-b153-b9aa828bccce', 1),
(151, 78, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526479124-efe0d372671587bd834179cc9aadc107.jpg?alt=media&token=908a1971-50d9-45af-b57e-92b9041273a3', 1),
(152, 79, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526924011-4fe57f1b2545a71c5f962de32eb1c5b3.jpg?alt=media&token=065fa0e9-aa6d-4d3e-91ad-42106f87a228', 1),
(153, 79, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526924012-9ef0a16ca1cf183e17dc674e5d038a67%20(1).jpg?alt=media&token=2d7bc865-dba3-48cd-be9d-930d27a13b39', 1),
(154, 79, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526924013-9ef0a16ca1cf183e17dc674e5d038a67.jpg?alt=media&token=0512ab87-a1c4-4f51-b62d-6b7677878f18', 1),
(155, 79, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526924014-15fadca978eedbf8e7d2eb4ab2a5472f.jpg?alt=media&token=f82b8465-8a77-4643-b40b-96d18784460b', 1),
(156, 79, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1697526924014-cfe795d1d2e3d9f35a59f00c49f13338.jpg?alt=media&token=3660fae0-2b72-4527-975a-85d2f66b3a8e', 1),
(157, 80, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699007096054-1bb499161a49cb503cde9a93f82a5eef.jpg?alt=media&token=b08013fd-3f35-49c5-a1a4-5b24683aada0', 1),
(158, 80, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699007096056-4dde7c17ae08fcbd655538a6c024844d.jpg?alt=media&token=d2948249-ec16-46f3-93d1-94d5e6a43ced', 1),
(159, 80, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699007096056-a75df5d1c3f1f82758e4e79654b59efb.jpg?alt=media&token=a5aac437-7a9f-4556-8cbc-0b82d73b725c', 1),
(160, 80, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699007096057-cd0e778eb31d6b7e6ceda0cbe532803e.jpg?alt=media&token=f39cde70-f156-44e0-ae95-db37ec5c746c', 1),
(161, 81, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699015472329-1ed6a67d121dbb679c2749ea49b66254.jpg?alt=media&token=25ee7bc1-2f77-4b63-8aba-4465091424b9', 1),
(162, 81, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699015472331-2ff8072f3d398499b538f3de17aeafd5.jpg?alt=media&token=cd3c30a6-78e7-4891-9500-88846089e26f', 1),
(163, 81, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699015472331-0419cd404f004dab4f5288a41845a2f9.jpg?alt=media&token=e668c44f-244f-4557-8170-4eb22caa0dae', 1),
(164, 81, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699015472332-cd0e778eb31d6b7e6ceda0cbe532803e.jpg?alt=media&token=6e66910c-dad3-45b7-a0cb-dfbd4bc5c6f6', 1),
(165, 82, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699199100283-5a63a681de3b11054c5e70696393d9e5%20(1).jpg?alt=media&token=e8843d26-91c6-4db8-a4b0-f5621b712dea', 1),
(166, 82, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699199100284-5a63a681de3b11054c5e70696393d9e5.jpg?alt=media&token=9a7eb6dc-64ff-40ec-bb7a-fa982a5cff5b', 1),
(167, 82, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699199100285-390f6843f532576dac677f1690341a76.jpg?alt=media&token=e50485f8-4c67-4336-802b-8a18453e94b2', 1),
(168, 82, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699199100285-0419cd404f004dab4f5288a41845a2f9.jpg?alt=media&token=ea6bd31b-c508-4040-b367-fb651279ac8f', 1),
(191, 89, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699243407945-1bd08879de8fe5f642c786a167623eb1.jpg?alt=media&token=f7c19ec8-9b35-4a44-94b6-1ed3d1e56885', 1),
(192, 89, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699243407947-597d039ab79daac35b9ec4fc7f83623a.jpg?alt=media&token=d23fc721-2a15-40e3-9523-f3c9a2165401', 1),
(193, 89, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699243407947-2911ebdfe5317ac7aa132721ac9f1bc7.jpg?alt=media&token=cec214a3-8944-4026-99a7-2ece889f5e63', 1),
(194, 89, 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699243407948-a12e8e57c9bacad1f69d692d8b5b697d.jpg?alt=media&token=73eea0c9-40dc-433a-bd35-5aa4b8ec1b0d', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_material`
--

CREATE TABLE `tbl_product_material` (
  `product_material_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `material_id` int(11) UNSIGNED NOT NULL,
  `product_material_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_material`
--

INSERT INTO `tbl_product_material` (`product_material_id`, `product_id`, `material_id`, `product_material_status`) VALUES
(1, 81, 3, 1),
(2, 81, 4, 1),
(6, 89, 1, 1),
(7, 89, 4, 1),
(8, 89, 7, 1),
(9, 70, 1, 1),
(10, 70, 2, 1),
(11, 70, 3, 1),
(12, 70, 4, 1),
(13, 70, 5, 1),
(14, 70, 6, 1),
(15, 70, 7, 1),
(16, 71, 1, 1),
(17, 71, 4, 1),
(18, 71, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_quantity`
--

CREATE TABLE `tbl_product_quantity` (
  `productQuantity_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `productQuantity_size` varchar(255) NOT NULL,
  `productQuantity_color` varchar(255) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productQuantity_priceInt` double NOT NULL,
  `productQuantity_priceOut` double NOT NULL,
  `productQuantity_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_quantity`
--

INSERT INTO `tbl_product_quantity` (`productQuantity_id`, `product_id`, `productQuantity_size`, `productQuantity_color`, `productQuantity`, `productQuantity_priceInt`, `productQuantity_priceOut`, `productQuantity_status`) VALUES
(56, 70, 'S', 'Đen', 1213, 98000, 198000, 1),
(57, 70, 'S', 'Trắng', 1321, 98000, 198000, 1),
(58, 70, 'S', 'Xám', 1213, 98000, 198000, 1),
(59, 71, 'S', 'Đen', 132, 123000, 390000, 1),
(60, 71, 'M', 'Trắng', 143, 123000, 390000, 1),
(61, 71, 'S', 'Trắng', 132, 123000, 390000, 1),
(62, 72, 'M', 'Đen', 132, 145000, 290000, 1),
(63, 72, 'S', 'Đen', 132, 144000, 290000, 1),
(64, 72, 'S', 'Xám', 156, 146000, 290000, 1),
(65, 73, 'S', 'Trắng', 1321, 498000, 987000, 1),
(66, 73, 'M', 'Trắng', 190, 499000, 999000, 1),
(67, 73, 'XL', 'Trắng', 1, 4980000, 998000, 1),
(68, 74, 'M', 'Đen', 1321, 189000, 398000, 1),
(69, 74, 'M', 'Trắng', 1321, 189000, 399000, 1),
(70, 75, 'S', 'Đen', 132, 312000, 9790000, 1),
(71, 75, 'M', 'Trắng', 131, 312000, 980000, 1),
(72, 76, 'S', 'Đen', 1213, 490000, 1099000, 1),
(73, 76, 'S', 'Trắng', 143, 490000, 1099000, 1),
(74, 76, 'M', 'Đen', 143, 432, 1090000, 1),
(75, 77, 'S', 'Đen', 1321, 199000, 399000, 1),
(76, 77, 'S', 'Trắng', 1321, 199000, 390000, 1),
(77, 77, 'L', 'Đen', 1, 199000, 390000, 1),
(78, 78, 'S', 'Đen', 4311, 789000, 1399000, 1),
(79, 78, 'S', 'Trắng', 1312, 789000, 1399000, 1),
(80, 79, 'S', 'Đen', 1312, 312000, 987000, 1),
(81, 79, 'S', 'Trắng', 165, 312000, 987000, 1),
(82, 81, 'S', 'Trắng', 1321, 123000, 390000, 1),
(83, 81, 'S', 'Đen', 1312, 123000, 390000, 1),
(89, 82, 'S', 'Đen', 1190, 98000, 239000, 1),
(90, 82, 'S', 'Trắng', 123, 99000, 239000, 1),
(91, 89, 'S', 'Đen', 130, 195700, 322000, 1),
(92, 89, 'S', 'Trắng', 129, 195700, 322000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ship`
--

CREATE TABLE `tbl_ship` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `ship_code` varchar(255) NOT NULL,
  `ship_name` varchar(255) NOT NULL,
  `ship_note` text DEFAULT NULL,
  `ship_price` double NOT NULL,
  `ship_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ship`
--

INSERT INTO `tbl_ship` (`ship_id`, `ship_code`, `ship_name`, `ship_note`, `ship_price`, `ship_status`) VALUES
(5, 'normalShip', 'Ship bình thường', 'Thường nhận sau 4-7 ng&agrave;y', 30000, 1),
(6, 'shipNhanh', 'Ship nhanh', 'Thường nhận được sau 2-4 ng&agrave;y', 45000, 1),
(7, 'slowShip', 'Ship chậm', 'Thường nhận được sau 6-10 ng&agrave;y', 15000, 1),
(8, 'Xcmxc231', 'Ship siêu tốc', 'Nhận sau 2-4 ng&agrave;y', 55000, 1),
(9, 'QAZP01', 'Ship hỏa tốc', 'Thường nhận được sau 1 ng&agrave;y', 65000, 1),
(10, 'FREESHIP', 'Free Ship', 'Thường chỉ &aacute;p dụng khi c&oacute; voucher', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_size`
--

CREATE TABLE `tbl_size` (
  `size_id` int(10) UNSIGNED NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_note` text NOT NULL,
  `size_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_size`
--

INSERT INTO `tbl_size` (`size_id`, `size_name`, `size_note`, `size_status`) VALUES
(1, 'S', 'Size siêu nhỏ', 1),
(2, 'M', 'Size nhỏ', 1),
(3, 'L', 'Size hơi nhỏ', 1),
(4, 'XL', 'Size trung bình', 1),
(5, 'XLL', 'Size to', 1),
(6, 'XXXL', 'Size rất to', 1),
(7, 'XXXXL', 'Size ngoại cỡ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `position_id` int(11) UNSIGNED NOT NULL,
  `staff_code` varchar(255) NOT NULL,
  `staff_fullname` varchar(255) NOT NULL,
  `staff_username` varchar(255) NOT NULL,
  `staff_password` varchar(255) NOT NULL,
  `staff_linkimg` text NOT NULL,
  `staff_odlPass` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` varchar(255) NOT NULL,
  `staff_note` varchar(255) NOT NULL,
  `staff_status` int(11) NOT NULL,
  `staff_codeRecovery` varchar(255) NOT NULL,
  `staff_address` text NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `position_id`, `staff_code`, `staff_fullname`, `staff_username`, `staff_password`, `staff_linkimg`, `staff_odlPass`, `staff_email`, `staff_phone`, `staff_note`, `staff_status`, `staff_codeRecovery`, `staff_address`, `remember_token`) VALUES
(1, 1, 'SUPPERADMIN', 'Nguyễn Xuân Cảnh', 'supperadmin123az', '$2y$10$6oBpQpVleCMA2GwHMDOUUOb8MNr.IrKWod1ynmR70LX9/xBM5NtCu', 'imgdaidien.jpg', '$2y$10$sZhiKeN3tKw5o7/rLdR4denUBjMavBpXbqyhRJfmTUzbIYdfOWX6i', 'xuancanh0802@gmail.com', '0334206604', 'L&agrave; t&agrave;i khoản supper admin', 1, 'SUPPERADMIN', ', Xã Tân Bình , Thành phố Thái Bình , Tỉnh Thái Bình', 'zpoOZnikqBftlSVm5JQ7G6jgGa6RTw7prKqPWFUNMGUAN0NkoFihysuN3TE0'),
(2, 2, 'ZBXZN02134', 'Đặng Thiên Mã', 'thienma123az', '$2y$10$gJFzk2TL6r0FaV3KNCLRleslQvKIfiVO9kNtSXdTiDthzYkwxmUJy', '3e924efa2afdf52303609bb20ce0e48b.jpg', '$2y$10$A15zPJZBnyCww7PvMw18QODhWaNwKPt4aHQuGzqvoz00XXhU8PLvq', 'thienma123az\"gmail.com', '0321432123', 'a', 1, 'BZGAN12343', 'Gần Ngã tư giao lộ, Thị trấn Nà Phặc , Thành Phố Bắc Kạn , Tỉnh Bắc Kạn', NULL),
(3, 1, 'xuancanh1908', 'Nguyễn xuân Cảnh', 'xuancanh1908', '$2y$10$aH3JgUxBiPaBfOJE79ijv.zBBWLkDxCCTKeZWhnmc.qkxxqkxHoZm', 'imgdaidien.jpg', '$2y$10$my16RZ87zqXg7aCi8NeePeusXKDw8aZK0FqhdCIDMKY/1Dpu/4cZK', 'xuancanh1908@gmail.com', '0334206604', 'T&agrave;i khoản quản trị vi&ecirc;n', 1, 'xuancanh1908', 'Cầu báng, Xã Tân Bình , Thành phố Thái Bình , Tỉnh Thái Bình', 'xNvkfJLlRyLfDwqiV6hraMPLc9TRSYD3pGPAUrcUgsGWBq5J4h0Ou19H5kT9'),
(4, 3, 'CHUAN03214', 'Chu văn an', 'chuan123', '$2y$10$I6umEAHimbNHp69gomdNCO50L0IhjVupc5hOTtla.8FfhKLQu93yy', '393875449_3178235822482022_406144417944583633_n.jpg', '$2y$10$GL8aD.NmoQiQ49kNwiS01OaFsMAUetvU6WyZuEKHqsYjYV4K4/qF2', 'chuan123@gmail.com', '0123456789', 'Nh&acirc;n vi&ecirc;n ưu t&uacute;', 1, 'ZBXNO32142', 'Ngã Tư hàng bài, Phường Hàng Bài , Quận Hoàn Kiếm , Thành phố Hà Nội', NULL),
(5, 3, 'XBCCN03214', 'Vũ Mạnh Tùng', 'tungvu123', '$2y$10$R9rlKFUZ5QRrxypmeSIgce/k6dnFp2lhGfSjYqvXJ4tcrBH9I3Zj6', 'user-sign-icon-person-symbol-human-avatar-isolated-on-white-backogrund-vector.jpg', '$2y$10$0vHvvYbPboLzDNSo3gpegeDON6KZkF9.dQ2jAyg52UqvsROK7UAKe', 'tungvu@gmail.com', '0987654321', 'Ad', 1, 'ZMNXO02132', 'Đầu làng phúc xa, Chọn phường/xã , Chọn quận/huyện ,', NULL),
(6, 1, 'admin02123', 'Nguyễn Xuân cảnh', 'admin02123', '$2y$10$ED31Hccwy21pRzOF/FiN/ehKhDYt2THPzrlk8zj.kVOixP8AYsfQu', '393875449_3178235822482022_406144417944583633_n.jpg', '$2y$10$DoeT2gJnvIzPiY1TXNya9.ji6iKgnTkXXttBJBxRrpZz6EHM/DENC', 'xuancanh0802@gmail.com', '0123456789', 'T&agrave;i khoản quản trị vi&ecirc;n', 1, 'ADMIN02123', 'Ngã Tư Tân Bình, Xã Tân Bình , Thành phố Thái Bình , Tỉnh Thái Bình', NULL),
(14, 5, 'minhvu123', 'Đới Minh Vũ', 'minhvu123', '$2y$10$3S8brGdgdon.ThctpXuz6O9okwdAq8LkA44V7VAuCJzXCu4fZek4u', 've-may-bay-gia-re-di-dai-loan-vivavivu.jpg', '$2y$10$mnqgIZTBH9X1zWSYAEv4fORuVitDfLwFQFGynW2NiPM9bk1Cvmx1u', 'minhvu123@gmail.com', '0987456321', 'Nh&acirc;n vi&ecirc;n', 1, 'MINHVU04321', 'Cây đa đầu làng, Xã Hồng Phong , Huyện Thanh Miện , Tỉnh Hải Dương', 'komfC8RkpvDWTqgOXsbdGYJItfFrKHGfg7035t03C6PxWzTd6PVdUWFtcxl7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_staff_permission`
--

CREATE TABLE `tbl_staff_permission` (
  `staff_permission_id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) UNSIGNED NOT NULL,
  `permission_id` int(11) UNSIGNED NOT NULL,
  `staff_permission_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_staff_permission`
--

INSERT INTO `tbl_staff_permission` (`staff_permission_id`, `staff_id`, `permission_id`, `staff_permission_status`) VALUES
(17, 3, 4, 1),
(18, 3, 7, 1),
(19, 3, 2, 1),
(20, 3, 3, 1),
(21, 3, 1, 1),
(22, 3, 6, 1),
(23, 3, 8, 1),
(24, 3, 5, 1),
(25, 3, 9, 1),
(26, 3, 10, 1),
(27, 3, 11, 1),
(28, 3, 12, 1),
(29, 3, 13, 1),
(30, 3, 14, 1),
(31, 3, 15, 1),
(32, 3, 16, 1),
(33, 3, 17, 1),
(34, 3, 18, 1),
(35, 3, 19, 1),
(36, 3, 20, 1),
(37, 3, 21, 1),
(38, 3, 22, 1),
(39, 3, 23, 1),
(40, 3, 24, 1),
(41, 3, 25, 1),
(42, 3, 26, 1),
(43, 3, 27, 1),
(44, 3, 28, 1),
(45, 3, 29, 1),
(46, 3, 30, 1),
(47, 3, 31, 1),
(48, 3, 32, 1),
(49, 3, 33, 1),
(50, 3, 34, 1),
(51, 3, 35, 1),
(52, 3, 36, 1),
(53, 3, 37, 1),
(54, 3, 38, 1),
(55, 3, 39, 1),
(56, 3, 40, 1),
(57, 3, 41, 1),
(58, 3, 42, 1),
(59, 3, 43, 1),
(60, 3, 44, 1),
(61, 3, 45, 1),
(62, 3, 46, 1),
(63, 3, 47, 1),
(64, 14, 23, 1),
(65, 14, 24, 1),
(66, 14, 25, 1),
(67, 3, 48, 1),
(68, 3, 49, 1),
(69, 1, 1, 1),
(70, 1, 2, 1),
(71, 1, 3, 1),
(72, 1, 4, 1),
(73, 1, 5, 1),
(74, 1, 6, 1),
(75, 1, 7, 1),
(76, 1, 8, 1),
(77, 1, 9, 1),
(78, 1, 10, 1),
(79, 1, 11, 1),
(80, 1, 12, 1),
(81, 1, 13, 1),
(82, 1, 14, 1),
(83, 1, 15, 1),
(84, 1, 16, 1),
(85, 1, 17, 1),
(86, 1, 18, 1),
(87, 1, 19, 1),
(88, 1, 20, 1),
(89, 1, 21, 1),
(90, 1, 22, 1),
(91, 1, 23, 1),
(92, 1, 24, 1),
(93, 1, 25, 1),
(94, 1, 26, 1),
(95, 1, 27, 1),
(96, 1, 28, 1),
(97, 1, 29, 1),
(98, 1, 30, 1),
(99, 1, 31, 1),
(100, 1, 32, 1),
(101, 1, 33, 1),
(102, 1, 34, 1),
(103, 1, 35, 1),
(104, 1, 36, 1),
(105, 1, 37, 1),
(106, 1, 40, 1),
(107, 6, 1, 1),
(108, 6, 2, 1),
(109, 6, 3, 1),
(110, 6, 4, 1),
(111, 6, 5, 1),
(112, 6, 6, 1),
(113, 6, 7, 1),
(114, 6, 8, 1),
(115, 6, 9, 1),
(116, 6, 10, 1),
(117, 6, 11, 1),
(118, 6, 12, 1),
(119, 6, 13, 1),
(120, 6, 14, 1),
(121, 6, 15, 1),
(122, 6, 16, 1),
(123, 6, 17, 1),
(124, 6, 18, 1),
(125, 6, 19, 1),
(126, 6, 20, 1),
(127, 6, 21, 1),
(128, 6, 22, 1),
(129, 6, 23, 1),
(130, 6, 24, 1),
(131, 6, 25, 1),
(132, 6, 26, 1),
(133, 6, 27, 1),
(134, 6, 28, 1),
(135, 6, 29, 1),
(136, 6, 30, 1),
(137, 6, 31, 1),
(138, 6, 32, 1),
(139, 6, 33, 1),
(140, 6, 34, 1),
(141, 6, 35, 1),
(142, 6, 36, 1),
(143, 6, 37, 1),
(144, 6, 38, 1),
(145, 6, 39, 1),
(146, 6, 40, 1),
(147, 6, 41, 1),
(148, 6, 42, 1),
(149, 6, 43, 1),
(150, 6, 44, 1),
(151, 6, 45, 1),
(152, 6, 46, 1),
(153, 6, 47, 1),
(154, 6, 48, 1),
(155, 6, 49, 1),
(156, 3, 50, 1),
(157, 3, 51, 1),
(158, 3, 52, 1),
(159, 1, 38, 1),
(160, 1, 39, 1),
(161, 1, 41, 1),
(162, 1, 42, 1),
(163, 1, 43, 1),
(164, 1, 44, 1),
(165, 1, 45, 1),
(166, 1, 46, 1),
(167, 1, 47, 1),
(168, 1, 48, 1),
(169, 1, 49, 1),
(170, 1, 50, 1),
(171, 1, 51, 1),
(172, 1, 52, 1),
(173, 1, 53, 1),
(174, 1, 54, 1),
(175, 1, 55, 1),
(176, 3, 53, 1),
(177, 3, 54, 1),
(178, 3, 55, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_statuspayment`
--

CREATE TABLE `tbl_statuspayment` (
  `statusPayment_id` int(10) UNSIGNED NOT NULL,
  `statusPayment_name` varchar(255) NOT NULL,
  `statusPayment_code` varchar(255) NOT NULL,
  `statusPayment_status` int(11) NOT NULL,
  `statusPayment_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_statuspayment`
--

INSERT INTO `tbl_statuspayment` (`statusPayment_id`, `statusPayment_name`, `statusPayment_code`, `statusPayment_status`, `statusPayment_note`) VALUES
(1, 'Đặt hàng', 'ZBGM1', 1, 'Kh&aacute;ch h&agrave;ng đặt đơn chờ hệ thống x&aacute;c nhận'),
(2, 'Xác nhận và đóng gói', 'ZMNH1', 1, 'Shop x&aacute;c nhận tạo đơn h&agrave;ng v&agrave; đ&oacute;ng g&oacute;i đơn h&agrave;ng&nbsp;'),
(3, 'Vận chuyển', 'ZXNM0321', 1, 'Shop giao h&agrave;ng cho b&ecirc;n vận chuyển'),
(4, 'Nhận hàng', 'ZNX03', 1, 'Shipper giao h&agrave;ng v&agrave; kh&aacute;ch h&agrave;ng nhận h&agrave;ng'),
(5, 'Giao hàng thất bại', 'ZBY03', 1, 'Shipper Giao h&agrave;ng thất bại&nbsp;'),
(6, 'Hoàn thành đơn hàng', 'XBO32', 1, 'Trạng th&aacute;i cuối c&ugrave;ng khi đơn h&agrave;ng được ho&agrave;n th&agrave;nh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theloai`
--

CREATE TABLE `tbl_theloai` (
  `theloai_id` int(10) UNSIGNED NOT NULL,
  `theloai_name` varchar(255) NOT NULL,
  `theloai_code` varchar(255) NOT NULL,
  `theloai_img` text NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `phanloai_id` int(11) UNSIGNED NOT NULL,
  `theloai_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_theloai`
--

INSERT INTO `tbl_theloai` (`theloai_id`, `theloai_name`, `theloai_code`, `theloai_img`, `category_id`, `phanloai_id`, `theloai_status`) VALUES
(1, 'Áo dài', 'AO001', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695015935929-324068383_483391670536901_5507862201527978884_n.jpg?alt=media&token=178876c2-f115-46b3-8564-4a2f37a50bd4', 3, 2, 1),
(2, 'Váy', 'DA002', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695015950121-355830606_722354489900251_1127970804826217828_n.jpg?alt=media&token=e347af3e-7db5-4dff-8b41-cb353d6a018b', 3, 5, 1),
(3, 'Áo polo', 'A0123', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695015909835-e2b56e748b86976a804e9ddefc4cb0c7.jpg?alt=media&token=96977833-a3f7-487e-9b4a-83427281b372', 2, 2, 1),
(4, 'Măng tô', 'MT001', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695015972521-902c92526ca55c1414173387d66f2ffe.jfif?alt=media&token=5922dfb3-2754-491f-9e51-670259af81a4', 3, 2, 1),
(5, 'Quần âu', 'QA001', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695016742609-quan-au-den-tron.jpg?alt=media&token=cffc14af-ad2d-462b-83c9-d357d150a6bc', 2, 1, 1),
(6, 'Áo thun nam', 'AT001', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695016766967-ao-thun-nam-ATSR03-25x500x500x4.webp?alt=media&token=c25e52b1-ca91-4b00-be4f-5b9553c1216b', 2, 2, 1),
(7, 'Áo sơ mi', 'AS003', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695016881839-ao-so-mi-nu-smu001-600x600.jpg?alt=media&token=ab9854f7-2476-43f5-8e18-0bee3945fadc', 3, 2, 1),
(8, 'Váy dự tiệc', 'VN002', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695016905799-1d40e05316285856750fd8ee47973217.jpg?alt=media&token=231e2faf-09ef-4e10-a639-0881feaaad93', 3, 5, 1),
(9, 'Set áo và váy công sở', 'SET01', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1695017837705-7d148aba47549e36caef70ae315ada2c.jpg?alt=media&token=0a63912c-4c70-4654-8275-b4c8a12ea815', 3, 6, 1),
(10, 'Bộ quần áo hè Nữ', 'ZMNC0213', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699006959628-cd0e778eb31d6b7e6ceda0cbe532803e.jpg?alt=media&token=e43afd6d-7307-4cbb-a7eb-228f7d9f1d75', 4, 6, 1),
(11, 'Áo hoodil', 'MXNC0312', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699015285427-cd0e778eb31d6b7e6ceda0cbe532803e.jpg?alt=media&token=30bd6827-862c-4176-8ceb-904d5d83eeea', 2, 2, 1),
(12, 'Áo ghi lê', 'ZMCN0312', 'https://firebasestorage.googleapis.com/v0/b/newdoan-19717.appspot.com/o/1699198922516-0419cd404f004dab4f5288a41845a2f9.jpg?alt=media&token=c4c192eb-d4a7-41a2-9114-0fb408323ae4', 2, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theloaichecked`
--

CREATE TABLE `tbl_theloaichecked` (
  `theloaichecked_id` int(10) UNSIGNED NOT NULL,
  `theloai_id` int(11) UNSIGNED NOT NULL,
  `theloaichecked_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_theloaichecked`
--

INSERT INTO `tbl_theloaichecked` (`theloaichecked_id`, `theloai_id`, `theloaichecked_status`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theloaishowhome`
--

CREATE TABLE `tbl_theloaishowhome` (
  `theloaiShowHome_id` int(11) NOT NULL,
  `theloai_id` int(10) UNSIGNED NOT NULL,
  `theloaiShowHome_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_theloaishowhome`
--

INSERT INTO `tbl_theloaishowhome` (`theloaiShowHome_id`, `theloai_id`, `theloaiShowHome_status`) VALUES
(19, 1, 1),
(20, 4, 1),
(21, 7, 1),
(22, 3, 1),
(23, 6, 1),
(24, 2, 1),
(25, 5, 1),
(26, 8, 1),
(27, 9, 1),
(28, 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_pasword` varchar(255) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `user_passwordOld` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_linkImg` varchar(255) NOT NULL,
  `user_address` varchar(1000) NOT NULL,
  `user_categoryAccount` int(1) NOT NULL,
  `user_money` double NOT NULL,
  `user_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_username`, `user_fullname`, `user_pasword`, `user_code`, `user_passwordOld`, `user_email`, `user_phone`, `user_linkImg`, `user_address`, `user_categoryAccount`, `user_money`, `user_status`, `created_at`) VALUES
(1, '0321321432', 'Nguyễn Xuân Cảnh', 'canh123az', '', 'canh123az', '', 'Nguyễn Xuân Cảnh', '', '', 1, 0, 1, '2023-10-02 08:32:35'),
(2, '0931232321', 'Nguyễn Minh Phúc', 'canh123az', '', 'canh123az', '', '0931232321', '', '', 1, 0, 1, '2023-10-02 08:55:58'),
(3, '0312312432', 'Bùi Vũ Minh', 'sadfdafdadfa', '', 'sadfdafdadfa', '', '0312312432', '', '', 1, 0, 1, '2023-10-02 15:22:58'),
(4, '0921332213', 'Bùi Minh Sĩ', 'xuancanh190802', '', 'xuancanh190802', '', '0921332213', '', '', 1, 0, 1, '2023-10-03 03:24:25'),
(5, '0321433321', 'Phạm Minh Tú', 'cadsvaas', '', 'cadsvaas', '', '0321433321', '', '', 1, 0, 1, '2023-10-03 05:21:05'),
(6, '0312098321', 'Nguyễn Xuân Cảnh', 'fadasasdfdas', '', 'fadasasdfdas', '', '0312098321', '', '', 1, 0, 1, '2023-10-03 05:42:13'),
(7, '0931321123', 'Vũ Trọng Phụng', '$2b$10$jja0m/AdafpHktcRNlXH6uJTHxnGy1lbjVf5VTg.UbP5wo3.Abbfy', '', '$2b$10$jja0m/AdafpHktcRNlXH6uJTHxnGy1lbjVf5VTg.UbP5wo3.Abbfy', '', '0931321123', '', '', 1, 0, 1, '2023-10-05 10:09:45'),
(8, '0334206603', 'Nguyễn Xuân Cảnh', '$2b$10$uVudxd7r0xe4xTXm9eK5JOBZQBRW/oUcvwVFLv9h4D3pGgaAuQkWC', '', '$2b$10$uVudxd7r0xe4xTXm9eK5JOBZQBRW/oUcvwVFLv9h4D3pGgaAuQkWC', '', '0334206603', '', '', 1, 0, 1, '2023-10-06 01:55:41'),
(9, '0987654321', 'Nguyễn Xuân Cảnh', '$2b$10$75mTnwsQtmikvyTx4NzMceOMK3JEer20lBFOWjkQTNe2bOUAnpOk6', '', '$2b$10$75mTnwsQtmikvyTx4NzMceOMK3JEer20lBFOWjkQTNe2bOUAnpOk6', '', '0987654321', '', '', 1, 0, 1, '2023-10-06 06:40:52'),
(10, '0123456789', 'Tạ minh chiến', '$2b$10$.TsXq3b.VCO.n/aaMryjEuJLzyR6kRI/VGYb7jbHfbxxIeoipPwQy', '', '$2b$10$.TsXq3b.VCO.n/aaMryjEuJLzyR6kRI/VGYb7jbHfbxxIeoipPwQy', '', '0123456789', '', '', 1, 0, 1, '2023-10-06 07:17:01'),
(11, '0313321432', 'Minh Tú', '$2b$10$//fLnYYuYd1dOfWIJrsLZ.VSuVL9B4Vuh2JNlPSICHbEEDatOm5zq', '', '$2b$10$//fLnYYuYd1dOfWIJrsLZ.VSuVL9B4Vuh2JNlPSICHbEEDatOm5zq', '', '0313321432', '', '', 1, 0, 1, '2023-10-06 07:26:30'),
(12, '0987123456', 'Minh đức', '$2b$10$A5wTZ2lEo3elEKJqR/DaDuQ/YuI2uEw8uJPQrtwv7nhtyYsEZxCQq', '', '$2b$10$A5wTZ2lEo3elEKJqR/DaDuQ/YuI2uEw8uJPQrtwv7nhtyYsEZxCQq', '', '0987123456', '', '', 1, 0, 1, '2023-10-08 14:07:46'),
(13, '0321456321', 'Trần Xuân Chiến', '$2b$10$x21.Om9tLZVmB1djuwveN.9WDJobsqrYVjGCjVcs38OEiqdZGrJ22', '', '$2b$10$x21.Om9tLZVmB1djuwveN.9WDJobsqrYVjGCjVcs38OEiqdZGrJ22', '', '0321456321', '', '', 1, 0, 0, '2023-10-24 12:57:05'),
(14, '0334206600', 'Nguyễn Xuân Cảnh', '$2b$10$1b0Hd7iZsPx7zZrxtb9eJuPSJxrpKHvVWXjCS.L.DxqwxiD7Pw6Mq', '', '$2b$10$1b0Hd7iZsPx7zZrxtb9eJuPSJxrpKHvVWXjCS.L.DxqwxiD7Pw6Mq', '', '0334206600', '', '', 1, 0, 0, '2023-11-05 15:22:20'),
(15, '0987456321', 'Mai Văn chiến', '$2b$10$j1p4JJCRZMeQhXRf6T.6le0wVxphBczeDl2XTNLldJXs7iGvzvuH.', '', '$2b$10$j1p4JJCRZMeQhXRf6T.6le0wVxphBczeDl2XTNLldJXs7iGvzvuH.', '', '0987456321', '', '', 1, 0, 0, '2023-11-06 01:54:20'),
(16, '0112399999', 'Nguyễn Y Văn', '$2b$10$A1IL7nm4ogOR7Ok1op.nY.aQS4vH3a8Bmu7sZ8TRcyQh7GDUMyAhu', '', '$2b$10$A1IL7nm4ogOR7Ok1op.nY.aQS4vH3a8Bmu7sZ8TRcyQh7GDUMyAhu', '', '0112399999', '', '', 1, 0, 1, '2023-11-06 03:13:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `voucher_id` int(10) UNSIGNED NOT NULL,
  `voucher_code` varchar(255) NOT NULL,
  `voucher_name` varchar(255) NOT NULL,
  `voucher_isLimit` int(11) NOT NULL,
  `voucher_quantity` double NOT NULL,
  `voucher_number` double NOT NULL,
  `voucher_unit` varchar(255) NOT NULL,
  `voucher_condition` varchar(255) NOT NULL,
  `voucher_note` text NOT NULL,
  `voucher_number_condition` double NOT NULL,
  `voucher_category` int(11) NOT NULL,
  `voucher_startDate` timestamp NULL DEFAULT NULL,
  `voucher_endDate` timestamp NULL DEFAULT NULL,
  `voucher_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`voucher_id`, `voucher_code`, `voucher_name`, `voucher_isLimit`, `voucher_quantity`, `voucher_number`, `voucher_unit`, `voucher_condition`, `voucher_note`, `voucher_number_condition`, `voucher_category`, `voucher_startDate`, `voucher_endDate`, `voucher_status`, `created_at`, `updated_at`) VALUES
(1, 'ZMXNC09322', 'Giảm giá 20/10', 0, 0, 15000, 'VNĐ', '>', 'Chỉ &aacute;p dụng duy nhất', 100000, 0, '2023-10-19 17:00:00', '2023-10-19 17:00:00', 1, '2023-10-20 03:01:52', '2023-10-20 03:01:52'),
(2, 'MBXZO01321', 'FreeShip ngày 20/10', 1, 1000, 0, 'Free', '>', 'C&oacute;', 50000, 0, '2023-10-18 17:00:00', '2023-10-20 17:00:00', 1, '2023-10-20 03:03:32', '2023-10-20 03:03:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Chỉ mục cho bảng `tbl_methodpayment`
--
ALTER TABLE `tbl_methodpayment`
  ADD PRIMARY KEY (`methodPayment_id`);

--
-- Chỉ mục cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_pagination`
--
ALTER TABLE `tbl_pagination`
  ADD PRIMARY KEY (`pagination_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `methodPayment_id` (`methodPayment_id`),
  ADD KEY `statusPayment_id` (`statusPayment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `ship_id` (`ship_id`);

--
-- Chỉ mục cho bảng `tbl_paymentt_voucher`
--
ALTER TABLE `tbl_paymentt_voucher`
  ADD PRIMARY KEY (`paymentt_voucher_id`);

--
-- Chỉ mục cho bảng `tbl_payment_deatil`
--
ALTER TABLE `tbl_payment_deatil`
  ADD PRIMARY KEY (`payment_deatil_id`);

--
-- Chỉ mục cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `permission_group_id` (`permission_group_id`);

--
-- Chỉ mục cho bảng `tbl_permission__group`
--
ALTER TABLE `tbl_permission__group`
  ADD PRIMARY KEY (`permission_group_id`);

--
-- Chỉ mục cho bảng `tbl_phanloai`
--
ALTER TABLE `tbl_phanloai`
  ADD PRIMARY KEY (`phanloai_id`);

--
-- Chỉ mục cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Chỉ mục cho bảng `tbl_position_permission`
--
ALTER TABLE `tbl_position_permission`
  ADD PRIMARY KEY (`position_permission_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `permission_group_id` (`permission_group_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product_ibfk_1` (`brand_id`),
  ADD KEY `tbl_product_ibfk_2` (`theloai_id`);

--
-- Chỉ mục cho bảng `tbl_producthot`
--
ALTER TABLE `tbl_producthot`
  ADD PRIMARY KEY (`productHot_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  ADD PRIMARY KEY (`productImg_id`),
  ADD KEY `tbl_product_img_ibfk_1` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product_material`
--
ALTER TABLE `tbl_product_material`
  ADD PRIMARY KEY (`product_material_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Chỉ mục cho bảng `tbl_product_quantity`
--
ALTER TABLE `tbl_product_quantity`
  ADD PRIMARY KEY (`productQuantity_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_ship`
--
ALTER TABLE `tbl_ship`
  ADD PRIMARY KEY (`ship_id`);

--
-- Chỉ mục cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Chỉ mục cho bảng `tbl_staff_permission`
--
ALTER TABLE `tbl_staff_permission`
  ADD PRIMARY KEY (`staff_permission_id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `tbl_statuspayment`
--
ALTER TABLE `tbl_statuspayment`
  ADD PRIMARY KEY (`statusPayment_id`);

--
-- Chỉ mục cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  ADD PRIMARY KEY (`theloai_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `phanloai_id` (`phanloai_id`);

--
-- Chỉ mục cho bảng `tbl_theloaichecked`
--
ALTER TABLE `tbl_theloaichecked`
  ADD PRIMARY KEY (`theloaichecked_id`),
  ADD KEY `theloai_id` (`theloai_id`);

--
-- Chỉ mục cho bảng `tbl_theloaishowhome`
--
ALTER TABLE `tbl_theloaishowhome`
  ADD PRIMARY KEY (`theloaiShowHome_id`),
  ADD KEY `theloai_id` (`theloai_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `color_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_methodpayment`
--
ALTER TABLE `tbl_methodpayment`
  MODIFY `methodPayment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_pagination`
--
ALTER TABLE `tbl_pagination`
  MODIFY `pagination_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_paymentt_voucher`
--
ALTER TABLE `tbl_paymentt_voucher`
  MODIFY `paymentt_voucher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_payment_deatil`
--
ALTER TABLE `tbl_payment_deatil`
  MODIFY `payment_deatil_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_permission__group`
--
ALTER TABLE `tbl_permission__group`
  MODIFY `permission_group_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_phanloai`
--
ALTER TABLE `tbl_phanloai`
  MODIFY `phanloai_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_position_permission`
--
ALTER TABLE `tbl_position_permission`
  MODIFY `position_permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `tbl_producthot`
--
ALTER TABLE `tbl_producthot`
  MODIFY `productHot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  MODIFY `productImg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT cho bảng `tbl_product_material`
--
ALTER TABLE `tbl_product_material`
  MODIFY `product_material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_product_quantity`
--
ALTER TABLE `tbl_product_quantity`
  MODIFY `productQuantity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `tbl_ship`
--
ALTER TABLE `tbl_ship`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `size_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_staff_permission`
--
ALTER TABLE `tbl_staff_permission`
  MODIFY `staff_permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT cho bảng `tbl_statuspayment`
--
ALTER TABLE `tbl_statuspayment`
  MODIFY `statusPayment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  MODIFY `theloai_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_theloaichecked`
--
ALTER TABLE `tbl_theloaichecked`
  MODIFY `theloaichecked_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_theloaishowhome`
--
ALTER TABLE `tbl_theloaishowhome`
  MODIFY `theloaiShowHome_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `voucher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD CONSTRAINT `tbl_notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Các ràng buộc cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`methodPayment_id`) REFERENCES `tbl_methodpayment` (`methodPayment_id`),
  ADD CONSTRAINT `tbl_payment_ibfk_2` FOREIGN KEY (`statusPayment_id`) REFERENCES `tbl_statuspayment` (`statusPayment_id`),
  ADD CONSTRAINT `tbl_payment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `tbl_payment_ibfk_4` FOREIGN KEY (`ship_id`) REFERENCES `tbl_ship` (`ship_id`);

--
-- Các ràng buộc cho bảng `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD CONSTRAINT `tbl_permission_ibfk_1` FOREIGN KEY (`permission_group_id`) REFERENCES `tbl_permission__group` (`permission_group_id`);

--
-- Các ràng buộc cho bảng `tbl_position_permission`
--
ALTER TABLE `tbl_position_permission`
  ADD CONSTRAINT `tbl_position_permission_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `tbl_position` (`position_id`),
  ADD CONSTRAINT `tbl_position_permission_ibfk_2` FOREIGN KEY (`permission_group_id`) REFERENCES `tbl_permission__group` (`permission_group_id`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`theloai_id`) REFERENCES `tbl_theloai` (`theloai_id`);

--
-- Các ràng buộc cho bảng `tbl_producthot`
--
ALTER TABLE `tbl_producthot`
  ADD CONSTRAINT `tbl_producthot_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product_img`
--
ALTER TABLE `tbl_product_img`
  ADD CONSTRAINT `tbl_product_img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_product_material`
--
ALTER TABLE `tbl_product_material`
  ADD CONSTRAINT `tbl_product_material_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `tbl_product_material_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `tbl_material` (`material_id`);

--
-- Các ràng buộc cho bảng `tbl_product_quantity`
--
ALTER TABLE `tbl_product_quantity`
  ADD CONSTRAINT `tbl_product_quantity_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Các ràng buộc cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD CONSTRAINT `tbl_staff_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `tbl_position` (`position_id`);

--
-- Các ràng buộc cho bảng `tbl_staff_permission`
--
ALTER TABLE `tbl_staff_permission`
  ADD CONSTRAINT `tbl_staff_permission_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `tbl_permission` (`permission_id`),
  ADD CONSTRAINT `tbl_staff_permission_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `tbl_staff` (`staff_id`);

--
-- Các ràng buộc cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  ADD CONSTRAINT `tbl_theloai_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `tbl_theloai_ibfk_2` FOREIGN KEY (`phanloai_id`) REFERENCES `tbl_phanloai` (`phanloai_id`);

--
-- Các ràng buộc cho bảng `tbl_theloaichecked`
--
ALTER TABLE `tbl_theloaichecked`
  ADD CONSTRAINT `tbl_theloaichecked_ibfk_1` FOREIGN KEY (`theloai_id`) REFERENCES `tbl_theloai` (`theloai_id`);

--
-- Các ràng buộc cho bảng `tbl_theloaishowhome`
--
ALTER TABLE `tbl_theloaishowhome`
  ADD CONSTRAINT `tbl_theloaishowhome_ibfk_1` FOREIGN KEY (`theloai_id`) REFERENCES `tbl_theloai` (`theloai_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
