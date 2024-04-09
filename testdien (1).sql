-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 07, 2024 lúc 04:40 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `testdien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banggiabacdien`
--

DROP TABLE IF EXISTS `banggiabacdien`;
CREATE TABLE IF NOT EXISTS `banggiabacdien` (
  `id_banggia` int(11) NOT NULL AUTO_INCREMENT,
  `mabac` int(11) DEFAULT NULL,
  `mahd` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_banggia`),
  KEY `fk_banggiabacdien_mahd` (`mahd`),
  KEY `fk_banggiabacdien_mabac` (`mabac`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banggiabacdien`
--

INSERT INTO `banggiabacdien` (`id_banggia`, `mabac`, `mahd`) VALUES
(1, 11, '1'),
(2, 10, '1'),
(3, 3, '1'),
(4, 4, '1'),
(5, 9, '1'),
(6, 13, '1'),
(7, 11, '2'),
(8, 10, '2'),
(9, 3, '2'),
(10, 4, '2'),
(11, 9, '2'),
(12, 13, '2'),
(13, 14, '3'),
(14, 10, '3'),
(15, 3, '3'),
(16, 4, '3'),
(17, 9, '3'),
(18, 13, '3'),
(25, 14, '4'),
(26, 10, '4'),
(27, 3, '4'),
(28, 4, '4'),
(29, 9, '4'),
(30, 13, '4'),
(31, 14, '5'),
(32, 15, '5'),
(33, 3, '5'),
(34, 16, '5'),
(35, 9, '5'),
(36, 13, '5'),
(37, 14, '10'),
(38, 15, '10'),
(39, 3, '10'),
(40, 16, '10'),
(41, 9, '10'),
(42, 13, '10'),
(43, 14, '6'),
(44, 15, '6'),
(45, 3, '6'),
(46, 16, '6'),
(47, 9, '6'),
(48, 13, '6'),
(49, 14, '7'),
(50, 15, '7'),
(51, 3, '7'),
(52, 16, '7'),
(53, 9, '7'),
(54, 13, '7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

DROP TABLE IF EXISTS `cthoadon`;
CREATE TABLE IF NOT EXISTS `cthoadon` (
  `mahd` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madk` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dntt` int(11) DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mahd`,`madk`),
  KEY `fk_cthoadon_madk` (`madk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`mahd`, `madk`, `dntt`, `dongia`) VALUES
('', '1', NULL, NULL),
('1', '1', 400, '2.500'),
('10', '1', 250, '10.500'),
('2', '1', 277, '2.500'),
('3', '1', 372, '2.500'),
('4', '1', 272, '1.788'),
('5', '1', 272, '10.500'),
('6', '1', 400, '2.500'),
('7', '1', 800, '25.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienke`
--

DROP TABLE IF EXISTS `dienke`;
CREATE TABLE IF NOT EXISTS `dienke` (
  `madk` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makh` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysx` datetime DEFAULT NULL,
  `ngaylap` datetime DEFAULT NULL,
  `mota` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` bit(1) DEFAULT NULL,
  PRIMARY KEY (`madk`),
  KEY `fk_dienke_makh` (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dienke`
--

INSERT INTO `dienke` (`madk`, `makh`, `ngaysx`, `ngaylap`, `mota`, `trangthai`) VALUES
('1', '1', '2024-04-01 01:58:37', '2024-04-04 01:58:37', 'New', b'1'),
('2', '1', '2024-04-07 06:30:15', '2024-04-07 06:30:15', 'Ok', b'1'),
('3', '2', '2024-04-07 10:37:14', '2024-04-07 10:37:14', 'Ok', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadien`
--

DROP TABLE IF EXISTS `giadien`;
CREATE TABLE IF NOT EXISTS `giadien` (
  `mabac` int(11) NOT NULL AUTO_INCREMENT,
  `tenbac` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tusokw` int(11) DEFAULT NULL,
  `densokw` int(11) DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayapdung` datetime DEFAULT NULL,
  PRIMARY KEY (`mabac`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giadien`
--

INSERT INTO `giadien` (`mabac`, `tenbac`, `tusokw`, `densokw`, `dongia`, `ngayapdung`) VALUES
(1, '0-100', 0, 100, '1.242', '2024-04-01 01:58:49'),
(2, '101-150', 101, 150, '1.304', '2024-04-01 01:58:49'),
(3, '151-200', 151, 200, '1.651', '2024-04-01 01:58:49'),
(4, '201-300', 201, 300, '1.788', '2024-04-01 01:58:49'),
(5, '301-400', 301, 400, '1.912', '2024-04-01 01:58:49'),
(6, '0-100', 0, 100, '1.250', '2024-04-01 02:26:59'),
(7, '101-150', 101, 150, '1.400', '2024-04-01 02:26:59'),
(8, '301-400', 301, 400, '2.000', '2024-04-01 02:28:58'),
(9, '301-400', 301, 400, '2.500', '2024-04-01 02:52:49'),
(10, '101-150', 101, 150, '1.405', '2024-04-01 02:53:48'),
(11, '0-100', 0, 100, '10.000', '2024-04-01 03:16:52'),
(12, '401-trở lên', 401, 99999, '1.962', '2024-04-01 05:38:09'),
(13, '401-trở lên', 401, 9999999, '25.000', '2024-04-01 14:10:01'),
(14, '0-100', 0, 101, '25.000', '2024-04-03 16:10:25'),
(15, '101-150', 101, 150, '15.000', '2024-04-03 16:24:14'),
(16, '201-300', 201, 300, '10.500', '2024-04-03 16:26:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ky` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tungay` datetime DEFAULT NULL,
  `denngay` datetime DEFAULT NULL,
  `chisodau` int(11) DEFAULT NULL,
  `chisocuoi` int(11) DEFAULT NULL,
  `tongthanhtien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaylaphd` datetime DEFAULT NULL,
  `tinhtrang` int(1) DEFAULT NULL,
  PRIMARY KEY (`mahd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `ky`, `tungay`, `denngay`, `chisodau`, `chisocuoi`, `tongthanhtien`, `ngaylaphd`, `tinhtrang`) VALUES
('', '1', '2024-03-01 05:00:00', '2024-03-24 00:00:00', NULL, NULL, NULL, '2024-03-24 00:00:00', 0),
('1', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 100, 500, '1000.000', '2024-03-24 00:00:00', 0),
('10', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 100, 350, '2.625.000', '2024-03-24 00:00:00', 0),
('2', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 500, 777, '1000.000', '2024-03-24 00:00:00', 0),
('3', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 528, 900, '930.000', '2024-03-24 00:00:00', 0),
('4', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 528, 800, '486.336', '2024-03-24 00:00:00', 0),
('5', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 528, 800, '2856.000', '2024-03-24 00:00:00', 0),
('6', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 100, 500, '1.000.000', '2024-03-24 00:00:00', 0),
('7', '1', '2024-03-24 00:00:00', '2024-03-24 00:00:00', 100, 900, '20.000.000', '2024-03-28 05:16:15', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cmnd` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `dt`, `cmnd`) VALUES
('1', 'Phong', 'Ai biết', '12345678', '12343'),
('2', 'AAA', 'AAA', '12345678', '1234567');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banggiabacdien`
--
ALTER TABLE `banggiabacdien`
  ADD CONSTRAINT `fk_banggiabacdien_mabac` FOREIGN KEY (`mabac`) REFERENCES `giadien` (`mabac`),
  ADD CONSTRAINT `fk_banggiabacdien_mahd` FOREIGN KEY (`mahd`) REFERENCES `cthoadon` (`mahd`);

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `fk_cthoadon_madk` FOREIGN KEY (`madk`) REFERENCES `dienke` (`madk`),
  ADD CONSTRAINT `fk_cthoadon_mahd` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`);

--
-- Các ràng buộc cho bảng `dienke`
--
ALTER TABLE `dienke`
  ADD CONSTRAINT `fk_dienke_makh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
