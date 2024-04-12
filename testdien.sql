-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 12, 2024 lúc 03:42 PM
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
  `id_banggia` int(15) NOT NULL AUTO_INCREMENT,
  `mabac` int(11) DEFAULT NULL,
  `mahd` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_banggia`),
  KEY `fk_banggiabacdien_mabac` (`mabac`),
  KEY `fk_banggiabacdien_mahd` (`mahd`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banggiabacdien`
--

INSERT INTO `banggiabacdien` (`id_banggia`, `mabac`, `mahd`) VALUES
(1, 14, '240412155314'),
(2, 15, '240412155314'),
(3, 3, '240412155314'),
(4, 16, '240412155314'),
(5, 9, '240412155314'),
(6, 12, '240412155314');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

DROP TABLE IF EXISTS `cthoadon`;
CREATE TABLE IF NOT EXISTS `cthoadon` (
  `mahd` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madk` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dntt` int(11) DEFAULT NULL,
  `tongtiendien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tienthue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mahd`,`madk`),
  KEY `fk_cthoadon_madk` (`madk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`mahd`, `madk`, `dntt`, `tongtiendien`, `tienthue`) VALUES
('240412155314', '2', 211, '291.618', '29.162');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienke`
--

DROP TABLE IF EXISTS `dienke`;
CREATE TABLE IF NOT EXISTS `dienke` (
  `madk` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makh` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `mabac` int(15) NOT NULL AUTO_INCREMENT,
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
(1, 'Bậc 1', 0, 100, '1.242', '2024-04-01 01:58:49'),
(2, 'Bậc 2', 101, 150, '1.304', '2024-04-01 01:58:49'),
(3, 'Bậc 3', 151, 200, '1.651', '2024-04-01 01:58:49'),
(4, 'Bậc 4', 201, 300, '1.788', '2024-04-01 01:58:49'),
(5, 'Bậc 5', 301, 400, '1.912', '2024-04-01 01:58:49'),
(6, 'Bậc 1', 0, 100, '1.250', '2024-04-01 02:26:59'),
(7, 'Bậc 2', 101, 150, '1.400', '2024-04-01 02:26:59'),
(8, 'Bậc 5', 301, 400, '2.000', '2024-04-01 02:28:58'),
(9, 'Bậc 5', 301, 400, '1.912', '2024-04-01 02:52:49'),
(10, 'Bậc 2', 101, 150, '1.405', '2024-04-01 02:53:48'),
(11, 'Bậc 1', 0, 100, '1.242', '2024-04-01 03:16:52'),
(12, 'Bậc 6', 401, 999999999, '1.962', '2024-04-01 05:38:09'),
(14, 'Bậc 1', 0, 100, '1.242', '2024-04-03 16:10:25'),
(15, 'Bậc 2', 101, 150, '1.304', '2024-04-03 16:24:14'),
(16, 'Bậc 4', 201, 300, '1.788', '2024-04-03 16:26:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `mahd` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manv` int(15) DEFAULT NULL,
  `ky` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tungay` datetime DEFAULT NULL,
  `denngay` datetime DEFAULT NULL,
  `chisodau` int(11) DEFAULT NULL,
  `chisocuoi` int(11) DEFAULT NULL,
  `tongthanhtien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaylaphd` datetime DEFAULT NULL,
  `tinhtrang` int(1) DEFAULT NULL,
  PRIMARY KEY (`mahd`),
  KEY `fk_manv_nhanvien` (`manv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `manv`, `ky`, `tungay`, `denngay`, `chisodau`, `chisocuoi`, `tongthanhtien`, `ngaylaphd`, `tinhtrang`) VALUES
('240412155314', 1, '04/2024', '2024-04-06 15:42:00', '2024-05-06 15:42:00', 0, 211, '320.780', '2024-04-12 15:53:17', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenkh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cccd` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `dt`, `cccd`) VALUES
('1', 'Phong', 'Ai biết', '12345678', '12343'),
('2', 'AAA', 'AAA', '12345678', '1234567');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `manv` int(15) NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tennv` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cccd` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quyen` int(1) DEFAULT NULL,
  PRIMARY KEY (`manv`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `taikhoan`, `matkhau`, `tennv`, `diachi`, `dt`, `cccd`, `quyen`) VALUES
(1, 'nv1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nhân viên 1', 'Ai biet', '123456789', '1234567890', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhdien`
--

DROP TABLE IF EXISTS `tinhdien`;
CREATE TABLE IF NOT EXISTS `tinhdien` (
  `id_tinhdien` int(15) NOT NULL AUTO_INCREMENT,
  `mahd` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mabac` int(15) DEFAULT NULL,
  `sanluongKwh` int(200) DEFAULT NULL,
  `thanhtien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_tinhdien`),
  KEY `fk_tinhtien_mahd` (`mahd`),
  KEY `fk_tinhtien_mabac` (`mabac`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhdien`
--

INSERT INTO `tinhdien` (`id_tinhdien`, `mahd`, `mabac`, `sanluongKwh`, `thanhtien`) VALUES
(1, '240412155314', 14, 101, '125.442'),
(2, '240412155314', 15, 50, '65.200'),
(3, '240412155314', 3, 50, '82.550'),
(4, '240412155314', 16, 11, '19.668');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banggiabacdien`
--
ALTER TABLE `banggiabacdien`
  ADD CONSTRAINT `fk_banggiabacdien_mabac` FOREIGN KEY (`mabac`) REFERENCES `giadien` (`mabac`),
  ADD CONSTRAINT `fk_banggiabacdien_mahd` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`);

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

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_manv_nhanvien` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`);

--
-- Các ràng buộc cho bảng `tinhdien`
--
ALTER TABLE `tinhdien`
  ADD CONSTRAINT `fk_tinhtien_mabac` FOREIGN KEY (`mabac`) REFERENCES `giadien` (`mabac`),
  ADD CONSTRAINT `fk_tinhtien_mahd` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
