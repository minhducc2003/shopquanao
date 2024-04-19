-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2023 lúc 10:52 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopquanao`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `maBinhLuan` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `noiDung` varchar(500) NOT NULL,
  `thoiGianBinhLuan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`maBinhLuan`, `maSanPham`, `maKhachHang`, `noiDung`, `thoiGianBinhLuan`) VALUES
(1, 12, 1, 'erklefgwjkleklptwekoprtwekoprwopikqrw\\\r\nertwklmejklrtkpejrtjkelrt ejklrt;', '2022-11-22 15:27:35'),
(2, 12, 1, 'ertpkoekoprtekoprteoprtkopekrtopekrt\r\n\\eklry;kl;ertkl;ertlk;ertkl;ertl;kert', '2022-11-22 15:27:35'),
(3, 12, 1, 'ekopoekprt[ekoprtkopertkl;ertkl;ertkl;ertjkl;ertjklterwjklert\r\netwhjknjkletwejkltwjklertwjketwejkltwejkoprtw', '2022-11-22 15:28:13'),
(4, 12, 1, 'eljkkegjrgjklrjkeglrkjlgrjklegrjklrg\r\nertkojjkotjklertjklertkelrt', '2022-11-22 15:28:13'),
(5, 27, 1, 'asdasd', '2023-04-11 07:47:59'),
(6, 27, 1, '123123', '2023-04-12 08:57:51'),
(7, 27, 1, '123121213123123', '2023-04-12 08:57:59'),
(8, 20, 1, 'sadsadad', '2023-04-14 02:31:19'),
(9, 20, 1, 'con cac\r\n', '2023-04-16 07:22:26'),
(10, 26, 1, 'Sản Phẩm Xịn quá', '2023-04-18 06:19:34'),
(11, 27, 19, 'OK ak', '2023-04-19 16:20:10'),
(12, 26, 19, 'OK ak', '2023-04-19 17:24:55'),
(13, 26, 1, 'asd', '2023-04-26 06:40:35'),
(14, 26, 1, 'chao cac ban nha', '2023-04-26 06:45:55'),
(15, 26, 1, 'chao cac ban nha', '2023-04-26 06:46:41'),
(16, 26, 1, 'chao cac ban nha', '2023-04-26 06:53:28'),
(17, 20, 1, 'chao cac ban nha', '2023-04-27 06:07:04'),
(18, 20, 1, 'chao cac ban nha', '2023-04-27 06:34:31'),
(19, 20, 1, 'chao cac ban nha', '2023-04-27 08:07:24'),
(20, 20, 1, 'chao cac ban nha', '2023-04-27 08:16:29'),
(21, 20, 1, 'chao cac ban nha', '2023-04-27 09:05:24'),
(22, 20, 1, 'chao cac ban nha', '2023-04-28 03:42:51'),
(23, 20, 1, 'chao cac ban nha', '2023-05-19 02:42:59'),
(24, 20, 1, '3rt\r\n', '2023-05-19 02:44:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `maDonHang` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(100) NOT NULL,
  `soLuong` int(2) NOT NULL,
  `giaSanPham` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`maDonHang`, `maSanPham`, `tenSanPham`, `soLuong`, `giaSanPham`) VALUES
(0, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(0, 26, 'Dirty Coins x LilWuyn Black Paints', 1, 550000),
(9, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(9, 26, 'Dirty Coins x LilWuyn Black Paints', 5, 550000),
(10, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(10, 26, 'Dirty Coins x LilWuyn Black Paints', 5, 550000),
(11, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(11, 26, 'Dirty Coins x LilWuyn Black Paints', 5, 550000),
(12, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(12, 26, 'Dirty Coins x LilWuyn Black Paints', 5, 550000),
(13, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(13, 26, 'Dirty Coins x LilWuyn Black Paints', 6, 550000),
(14, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(15, 26, 'Dirty Coins x LilWuyn Black Paints', 1, 550000),
(16, 20, 'Hoodie DiCo Green Dirty Coins', 1, 500000),
(16, 26, 'Dirty Coins x LilWuyn Black Paints', 1, 550000),
(17, 17, 'Blowing Shirt Dirty Coins', 1, 350000),
(17, 26, 'Dirty Coins x LilWuyn Black Paints', 1, 550000),
(17, 27, 'Logo Jogger Paints DirtyCoins', 1, 300000),
(18, 26, 'Dirty Coins x LilWuyn Black Paints', 1, 550000),
(19, 26, 'Dirty Coins x LilWuyn Black Paints', 2, 550000),
(20, 20, 'Hoodie DiCo Green Dirty Coins', 1, 500000),
(21, 14, 'T-Shirt DirtyCoins x LilWuyn ', 1, 345000),
(22, 20, 'Hoodie DiCo Green Dirty Coins', 2, 500000),
(23, 20, 'Hoodie DiCo Green Dirty Coins', 1, 500000),
(24, 20, 'Hoodie DiCo Green Dirty Coins', 1, 500000),
(25, 26, 'Dirty Coins x LilWuyn Black Paints', 1, 550000),
(26, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(28, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(29, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(30, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(31, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(32, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(33, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(34, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(35, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000),
(36, 20, 'Hoodie DiCo Green Dirty Coins', 3, 500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `maPhieuNhap` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `maDanhMuc` int(11) NOT NULL,
  `giaTien` float NOT NULL,
  `thoiGianNhap` datetime DEFAULT NULL,
  `soLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieuxuat`
--

CREATE TABLE `chitietphieuxuat` (
  `maPhieuXuat` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `maDanhMuc` int(11) NOT NULL,
  `thoiGianNhap` datetime DEFAULT NULL,
  `giaTien` float NOT NULL,
  `soLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(11) NOT NULL,
  `moTa` varchar(300) NOT NULL,
  `trangThaiSanPham` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`maDanhMuc`, `tenDanhMuc`, `moTa`, `trangThaiSanPham`) VALUES
(5, 'T-Shirt', 'Các sản phẩm áo thun của Dirty Coins luôn cố gắng mang đến cho khách hàng chất lượng, mẫu mã thời trang tốt nhất !', 1),
(6, 'Hoodie', 'Các mẫu Hoodie tại Dirty Coins luôn đạt được chất lượng tốt nhất và mẫu mã thời trang', 1),
(7, 'Paints', 'Các mẫu quần chất lượng thoát mát giúp cho khách hàng của Dirty Coins có trải nghiệm tốt nhất khi sử dụng sản phẩm', 1),
(8, 'Shirt', 'Các mẫu áo sơ mi tại Dirty Coin được thiết kế với kiểu dáng thời trang, chất liệu thoáng mát', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `maDonHang` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `maNhanVien` int(11) NOT NULL,
  `ghiChu` varchar(300) NOT NULL,
  `tongGia` float NOT NULL,
  `thoiGian` datetime NOT NULL,
  `trangThaiDonHang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`maDonHang`, `maKhachHang`, `maNhanVien`, `ghiChu`, `tongGia`, `thoiGian`, `trangThaiDonHang`) VALUES
(2, 1, 1, 'asdasd', 3333330, '2023-04-10 06:08:31', 1),
(3, 1, 1, 'Khong co', 550000, '2023-04-10 06:17:04', 1),
(4, 1, 1, 'Khong co', 550000, '2023-04-10 06:17:17', 1),
(5, 1, 1, 'Khong co', 550000, '2023-04-10 06:19:17', 1),
(6, 1, 1, 'Khong co', 550000, '2023-04-10 06:38:51', 1),
(7, 1, 1, 'Khong co', 3750000, '2023-04-10 06:40:30', 1),
(8, 1, 1, 'Khong co', 3750000, '2023-04-10 06:41:28', 1),
(9, 1, 1, 'Khong co', 3750000, '2023-04-10 06:42:56', 1),
(10, 1, 1, 'Khong co', 3750000, '2023-04-10 07:01:34', 1),
(11, 1, 1, 'Khong co', 3750000, '2023-04-10 07:04:45', 1),
(12, 1, 1, 'Khong co', 3750000, '2023-04-10 07:09:20', 1),
(13, 1, 1, 'Khong co', 4300000, '2023-04-10 07:14:44', 1),
(14, 1, 1, 'Khong co', 1000000, '2023-04-11 08:06:46', 1),
(15, 1, 1, 'Khong co', 1100000, '2023-04-14 02:24:01', 1),
(16, 1, 1, 'Khong co', 1050000, '2023-04-14 02:25:34', 1),
(17, 1, 1, 'Khong co', 4500000, '2023-04-16 11:38:59', 1),
(18, 1, 1, 'Khong co', 550000, '2023-04-16 11:39:54', 1),
(19, 1, 1, 'Khong co', 1100000, '2023-04-19 15:01:14', 1),
(20, 1, 1, 'Khong co', 500000, '2023-04-19 15:25:45', 1),
(21, 1, 1, 'Khong co', 345000, '2023-04-19 15:26:17', 1),
(22, 19, 1, 'Khong co', 1000000, '2023-04-19 16:27:02', 1),
(23, 19, 1, 'Khong co', 500000, '2023-04-19 16:28:04', 0),
(24, 19, 1, 'Khong co', 500000, '2023-04-19 16:28:51', 1),
(25, 1, 1, 'Khong co', 550000, '2023-04-27 04:54:49', 1),
(26, 1, 1, 'Khong co', 1500000, '2023-04-28 03:12:03', 0),
(27, 1, 1, 'Khong co', 0, '2023-04-28 03:18:52', 0),
(28, 1, 1, 'Khong co', 1500000, '2023-04-28 03:32:32', 0),
(29, 1, 1, 'Khong co', 1500000, '2023-04-28 03:37:21', 0),
(30, 1, 1, 'Khong co', 1500000, '2023-04-28 03:38:46', 0),
(31, 1, 1, 'Khong co', 1500000, '2023-04-28 03:42:28', 0),
(32, 1, 1, 'Khong co', 1500000, '2023-04-28 03:42:33', 0),
(33, 1, 1, 'Khong co', 1500000, '2023-04-28 03:42:37', 0),
(34, 1, 1, 'Khong co', 1500000, '2023-05-19 02:42:35', 0),
(35, 1, 1, 'Khong co', 1500000, '2023-05-19 02:42:41', 0),
(36, 1, 1, 'Khong co', 1500000, '2023-05-19 02:42:46', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKhachHang` int(11) NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `tenKhachHang` varchar(300) NOT NULL,
  `diaChi` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `ngayDangKi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKhachHang`, `tenDangNhap`, `matKhau`, `tenKhachHang`, `diaChi`, `email`, `soDienThoai`, `ngayDangKi`) VALUES
(1, 'nhanvien1', '123', 'Bi bảo siêu đẹp trai', 'SGU Sài Gòn', 'asdasd', '0382460421', '2022-10-03 08:59:43'),
(6, '3119410032', 'asd', 'Nguyễn Hà Quốc Bảo', 'Quan 10', 'quocbao211@gmail.com', '0767772112', '2022-10-03 09:00:24'),
(17, 'dangminhquang1401@gmail.com', '123', 'Nguyen Ha Quoc Bao', 'Sài Gòn', 'baobao@gmail.com', '0382460421', '2023-04-19 16:14:15'),
(18, 'user1', '123', 'Nguyen Ha Quoc Bao', 'Sai Gon', 'quocbao2116@gmail.com', '0123123123', '2023-04-19 16:15:42'),
(19, 'user3', '123123', 'Hà Quốc Bảo', 'Đại Học Sài Gòn', 'quocbao2116@gmail.com', '0123123123', '2023-04-19 16:16:39'),
(20, 'user3', '123123', 'Nguyen Ha Quoc Bao', 'Sai Gon', 'quocbao2116@gmail.com', '0123123123', '2023-04-19 17:22:12'),
(21, 'user3', '123123', 'Nguyen Ha Quoc Bao', 'Sai Gon', 'quocbao2116@gmail.com', '0123123123', '2023-04-19 17:23:05'),
(22, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 08:16:34'),
(23, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 08:25:38'),
(24, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 08:27:35'),
(25, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 08:32:04'),
(26, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 08:36:09'),
(27, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 08:39:57'),
(28, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 09:05:53'),
(29, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-25 09:27:19'),
(30, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-26 06:47:24'),
(31, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-27 06:04:52'),
(32, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-27 06:14:48'),
(33, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-27 06:32:29'),
(34, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-27 07:51:19'),
(35, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-27 09:06:11'),
(36, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-04-28 03:43:37'),
(37, 'bibao ne', '123', 'Nguyễn Hà Quốc Bảo', 'Sai Gon', 'quocbao2116@gmail.com', '0123123123', '2023-05-04 19:48:13'),
(38, 'selenium1', '123', 'Nguyen Ha Quoc Bao', 'SaiGon', 'quocbao2116@gmail.com', '0123123123', '2023-05-19 02:43:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaicongviec`
--

CREATE TABLE `loaicongviec` (
  `maCongViec` int(11) NOT NULL,
  `tenCongViec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaicongviec`
--

INSERT INTO `loaicongviec` (`maCongViec`, `tenCongViec`) VALUES
(1, 'Thu Ngân'),
(2, 'Trực app'),
(3, 'Nhập Kho'),
(4, 'Xuất Kho');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `maNhaCungCap` int(11) NOT NULL,
  `tenNhaCungCap` varchar(100) NOT NULL,
  `mota` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `maNhanVien` int(11) NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `mauKhau` varchar(50) NOT NULL,
  `tenNhanVien` varchar(300) NOT NULL,
  `diaChi` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `ngayDangKi` datetime DEFAULT NULL,
  `trangThaiTaiKhoan` int(1) NOT NULL,
  `maLoaiCongViec` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`maNhanVien`, `tenDangNhap`, `mauKhau`, `tenNhanVien`, `diaChi`, `email`, `soDienThoai`, `ngayDangKi`, `trangThaiTaiKhoan`, `maLoaiCongViec`) VALUES
(1, 'nhanvien1', '123', '123', '123', '123@gmail.com', '1231231230', '2023-04-10 06:01:17', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `maPhieuNhap` int(11) NOT NULL,
  `tongTien` float NOT NULL,
  `thoiGianNhap` datetime DEFAULT NULL,
  `maNhanVien` int(11) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `maPhieuXuat` int(11) NOT NULL,
  `tongTien` float NOT NULL,
  `thoiGianXuat` datetime DEFAULT NULL,
  `maNhanVien` int(11) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanly`
--

CREATE TABLE `quanly` (
  `maQuanLy` int(11) NOT NULL,
  `tenDangNhap` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `tenQuanLy` varchar(100) NOT NULL,
  `diaChi` varchar(400) NOT NULL,
  `email` varchar(100) NOT NULL,
  `soDienThoai` varchar(10) NOT NULL,
  `NgayDangKi` datetime DEFAULT NULL,
  `trangThaiTaiKhoan` int(1) NOT NULL,
  `phanQuyen` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quanly`
--

INSERT INTO `quanly` (`maQuanLy`, `tenDangNhap`, `matKhau`, `tenQuanLy`, `diaChi`, `email`, `soDienThoai`, `NgayDangKi`, `trangThaiTaiKhoan`, `phanQuyen`) VALUES
(1, 'admin', '123', 'Nguyễn Hà Quốc Bảo', 'Thạnh Mỹ, Đơn Dương, Lâm Đồng', 'quocbao2116@gmail.com', '0382460421', '2022-10-01 16:06:22', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `maDanhMuc` int(11) NOT NULL,
  `tenSanPham` varchar(100) NOT NULL,
  `moTa` varchar(300) NOT NULL,
  `soLuong` int(4) NOT NULL,
  `trangThaiSanPham` int(1) NOT NULL,
  `hinhAnh` varchar(100) NOT NULL,
  `giaBan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `maDanhMuc`, `tenSanPham`, `moTa`, `soLuong`, `trangThaiSanPham`, `hinhAnh`, `giaBan`) VALUES
(12, 5, 'Áo Thun DirtyCoins x 16 Typh ', 'Với sự kết hợp độc đáo của Dirty Coins và rapper 16Typh Chúng tôi mang đến cho các bạn sản phẩm \"Áo Thun DirtyCoins x 16 Typh \"', 100, 5, '16typh.png', 350000),
(13, 5, 'T-Shirt Butterfly ', 'Áo thun thiết kế đặc trưng đã làm nên thương hiệu của Dirty Coins', 100, 5, 'butterfly.png', 300000),
(14, 5, 'T-Shirt DirtyCoins x LilWuyn ', 'Một thiết kế độc đáo với sự kết hợp từ DirtyCoins và rapper LilWuyn mang đến cho các bạn một sản phẩm thú vị', 100, 5, 'lilwuyn-tShirt.png', 345000),
(15, 5, 'T-Shirt RetroT', 'Áo thun Dico là một mẫu thiết kế cơ bản đến từ nhà Dirty Coins', 100, 4, 'retroT-tShirt.png', 300000),
(16, 8, 'Banana Shirt Dirty Coins', 'Áo Banana Shirt là một mẫu thiết kế trẻ trung hướng tới giới trẻ thích những màu sắc rực rỡ', 100, 4, 'banana-shirt.png', 290000),
(17, 8, 'Blowing Shirt Dirty Coins', 'Blowing Shirt DirtyCoins là một thiết kế mang thiên hướng đường phố', 100, 5, 'blowing-shirt.png', 350000),
(18, 8, 'White Shirt Dirty Coins', 'Với thiết kế đơn giản Dirty Coins mang đến cảm giác mới lạ cho khách hàng', 100, 4, 'white-shirt.png', 300000),
(19, 8, 'Hoodie Dico Basic DirtyCoins', 'Hoodie Dico Basic là một sản phẩm nằm trong bộ sưu tập basic đến từ nhà Dirty Coins', 100, 5, 'dicohoodie.png', 459000),
(20, 6, 'Hoodie DiCo Green Dirty Coins', 'Nằm trong bộ sưu tập Basic của DirtyCoins \"Hoodie DiCo Green Dirty Coins\" mang đến cho bạn sự đơn giản nhưng vẫn thời trang', 100, 4, 'dico-green.png', 500000),
(21, 6, 'Hoodie Dirty Coins x LilWuyn Special', 'Hoodie Dirty Coins x LilWuyn Special là một sản phẩm thiết kế độc đáo khi được colab với rapper lil Wuyn', 100, 3, 'lilWuyn-hoodie.png', 600000),
(22, 6, 'Special Letter Dirty Coins Hoodie ', 'Sản phẩm Special Letter Dirty Coins Hoodie  là một sản phẩm có thiết kế độc đáo khi họa tiết là những chữ nổi với những màu đặc biệt', 100, 3, 'special-letter-hoodie.png', 450000),
(23, 7, 'Dico Paitns Dirty Coins', 'Dico Paitns Dirty Coins là một sản phẩm nằm trong bộ sưu tập cơ bản của Dirty Coins', 100, 3, 'dico-paints.png', 359000),
(24, 7, 'Dico White Paints Dirty Coins', 'Dico White Paints Dirty Coins là một sản phẩm nằm trong bộ sưu tập cơ bản của nhà Dirty Coins', 100, 3, 'dico-White-paints.png', 400000),
(25, 7, 'Dirty Coins x LilWuyn Paints', 'Dirty Coins x LilWuyn Paints là một sản phẩm độc đáo khi kết hợp cùng Rapper LilWuyn', 100, 3, 'lilWuyn-paints.png', 500000),
(26, 7, 'Dirty Coins x LilWuyn Black Paints', 'Dirty Coins x LilWuyn Black Paints là một sản phẩm độc đáo nằm trong bộ sưu tập colab với rapper LilWuyn', 100, 4, 'lilWuyn-black.png', 550000),
(27, 7, 'Logo Jogger Paints DirtyCoins', 'Logo Jogger Paints DirtyCoins là một sản phẩm nằm trong bộ sưu tập cơ bản của Dirty Coins', 100, 7, 'dico-White-paints.png', 350000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaisanpham`
--

CREATE TABLE `trangthaisanpham` (
  `maTrangThai` int(11) NOT NULL,
  `tenTrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthaisanpham`
--

INSERT INTO `trangthaisanpham` (`maTrangThai`, `tenTrangThai`) VALUES
(1, 'Bình Thường'),
(2, 'Sale 20%'),
(3, 'Big Sale 50%'),
(4, 'Sản Phẩm Mới Ra Mắt'),
(5, 'Sản Phẩm Bán Chạy'),
(6, 'Hết Hàng'),
(7, 'Sản Phẩm Tạm Khóa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaithucthe`
--

CREATE TABLE `trangthaithucthe` (
  `maTrangThai` int(1) NOT NULL,
  `tenTrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthaithucthe`
--

INSERT INTO `trangthaithucthe` (`maTrangThai`, `tenTrangThai`) VALUES
(1, 'Hoạt động'),
(2, 'Bị khóa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`maBinhLuan`),
  ADD KEY `FK_BinhLuanMaSanPham` (`maSanPham`),
  ADD KEY `FK_BinhLuanMaKhachHang` (`maKhachHang`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`maDonHang`,`maSanPham`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`maPhieuNhap`,`maSanPham`,`maDanhMuc`),
  ADD KEY `FK_CTPhieuNhapMaSanPham` (`maSanPham`),
  ADD KEY `FK_CTPhieuNhapMaDanhMuc` (`maDanhMuc`);

--
-- Chỉ mục cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD PRIMARY KEY (`maPhieuXuat`,`maSanPham`,`maDanhMuc`),
  ADD KEY `FK_CTPhieuXuatMaSanPham` (`maSanPham`),
  ADD KEY `FK_CTPhieuXuatMaDanhMuc` (`maDanhMuc`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`maDanhMuc`),
  ADD KEY `FK_DanhMucMaTrangThai` (`trangThaiSanPham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `FK_DonHangMaKH` (`maKhachHang`),
  ADD KEY `FK_DonHangMaNV` (`maNhanVien`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKhachHang`);

--
-- Chỉ mục cho bảng `loaicongviec`
--
ALTER TABLE `loaicongviec`
  ADD PRIMARY KEY (`maCongViec`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`maNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`maNhanVien`),
  ADD KEY `FK_NhanVienTrangThaiTaiKhoan` (`trangThaiTaiKhoan`),
  ADD KEY `FK_NhanVienMaLoaiCV` (`maLoaiCongViec`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`maPhieuNhap`),
  ADD KEY `FK_PhieuNhapMaNV` (`maNhanVien`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`maPhieuXuat`),
  ADD KEY `FK_PhieuXuatMaNV` (`maNhanVien`);

--
-- Chỉ mục cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD PRIMARY KEY (`maQuanLy`),
  ADD KEY `FK_TrangThaiTKQL` (`trangThaiTaiKhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `FK_DanhMuc` (`maDanhMuc`),
  ADD KEY `FK_TrangThai` (`trangThaiSanPham`);

--
-- Chỉ mục cho bảng `trangthaisanpham`
--
ALTER TABLE `trangthaisanpham`
  ADD PRIMARY KEY (`maTrangThai`);

--
-- Chỉ mục cho bảng `trangthaithucthe`
--
ALTER TABLE `trangthaithucthe`
  ADD PRIMARY KEY (`maTrangThai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `maBinhLuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `loaicongviec`
--
ALTER TABLE `loaicongviec`
  MODIFY `maCongViec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `maNhaCungCap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `maNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `maPhieuNhap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `maPhieuXuat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quanly`
--
ALTER TABLE `quanly`
  MODIFY `maQuanLy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `trangthaisanpham`
--
ALTER TABLE `trangthaisanpham`
  MODIFY `maTrangThai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `trangthaithucthe`
--
ALTER TABLE `trangthaithucthe`
  MODIFY `maTrangThai` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `FK_BinhLuanMaKhachHang` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`maKhachHang`),
  ADD CONSTRAINT `FK_BinhLuanMaSanPham` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `FK_CTPhieuNhapMaDanhMuc` FOREIGN KEY (`maDanhMuc`) REFERENCES `danhmuc` (`maDanhMuc`),
  ADD CONSTRAINT `FK_CTPhieuNhapMaPN` FOREIGN KEY (`maPhieuNhap`) REFERENCES `phieunhap` (`maPhieuNhap`),
  ADD CONSTRAINT `FK_CTPhieuNhapMaPhieuNhap` FOREIGN KEY (`maPhieuNhap`) REFERENCES `phieunhap` (`maPhieuNhap`),
  ADD CONSTRAINT `FK_CTPhieuNhapMaSanPham` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `chitietphieuxuat`
--
ALTER TABLE `chitietphieuxuat`
  ADD CONSTRAINT `FK_CTPhieuXuatMaDanhMuc` FOREIGN KEY (`maDanhMuc`) REFERENCES `danhmuc` (`maDanhMuc`),
  ADD CONSTRAINT `FK_CTPhieuXuatMaPX` FOREIGN KEY (`maPhieuXuat`) REFERENCES `phieuxuat` (`maPhieuXuat`),
  ADD CONSTRAINT `FK_CTPhieuXuatMaPhieuXuat` FOREIGN KEY (`maPhieuXuat`) REFERENCES `phieuxuat` (`maPhieuXuat`),
  ADD CONSTRAINT `FK_CTPhieuXuatMaSanPham` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);

--
-- Các ràng buộc cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `FK_DanhMucMaTrangThai` FOREIGN KEY (`trangThaiSanPham`) REFERENCES `trangthaisanpham` (`maTrangThai`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_DonHangMaKH` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`maKhachHang`),
  ADD CONSTRAINT `FK_DonHangMaNV` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `FK_NhanVienMaLoaiCV` FOREIGN KEY (`maLoaiCongViec`) REFERENCES `loaicongviec` (`maCongViec`),
  ADD CONSTRAINT `FK_NhanVienTrangThaiTK` FOREIGN KEY (`trangThaiTaiKhoan`) REFERENCES `trangthaithucthe` (`maTrangThai`),
  ADD CONSTRAINT `FK_NhanVienTrangThaiTaiKhoan` FOREIGN KEY (`trangThaiTaiKhoan`) REFERENCES `trangthaithucthe` (`maTrangThai`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_PhieuNhapMaNV` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`);

--
-- Các ràng buộc cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `FK_PhieuXuatMaNV` FOREIGN KEY (`maNhanVien`) REFERENCES `nhanvien` (`maNhanVien`);

--
-- Các ràng buộc cho bảng `quanly`
--
ALTER TABLE `quanly`
  ADD CONSTRAINT `FK_TrangThaiTKQL` FOREIGN KEY (`trangThaiTaiKhoan`) REFERENCES `trangthaithucthe` (`maTrangThai`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_DanhMuc` FOREIGN KEY (`maDanhMuc`) REFERENCES `danhmuc` (`maDanhMuc`),
  ADD CONSTRAINT `FK_TrangThai` FOREIGN KEY (`trangThaiSanPham`) REFERENCES `trangthaisanpham` (`maTrangThai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
