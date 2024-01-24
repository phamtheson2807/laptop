-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 03:30 AM
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
-- Database: `bpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` char(50) DEFAULT NULL,
  `UserName` char(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7898799798, 'tester1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-25 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int(10) NOT NULL,
  `UserID` int(10) DEFAULT NULL,
  `AptNumber` int(10) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` nvarchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 7, 729411824, '2022-05-12', '19:03:00', 'Test msg', '2022-05-12 18:30:00', 'Your appointment has been book.', N'Đã chọn', '2022-05-13 06:11:41'),
(2, 7, 767068476, '2022-05-14', '09:00:00', 'fghfshdgfahgrfgh', '2022-05-12 18:30:00', 'Sorry your appointment has been cancelled', N'Từ chối', '2022-05-13 06:14:39'),
(4, 10, 931783426, '2022-05-18', '15:40:00', 'NA', '2022-05-15 05:04:13', NULL, NULL, NULL),
(5, 10, 284544154, '2022-05-18', '15:40:00', 'NA', '2022-05-15 05:04:13', NULL, NULL, NULL),
(6, 10, 494039785, '2022-05-31', '14:47:00', 'NA', '2022-05-15 05:13:24', NULL, NULL, NULL),
(8, 10, 891247645, '2022-05-28', '20:14:00', 'nA', '2022-05-28 08:43:55', 'Your booking is confirmed.', N'Đã chọn', '2022-05-28 08:51:22'),
(9, 11, 985654240, '2022-05-29', '13:10:00', 'NA', '2022-05-29 07:34:47', 'Your appointment is confirmed', N'Đã chọn', '2022-05-29 07:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `FirstName` nvarchar(200) DEFAULT NULL,
  `LastName` nvarchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(6, N'Phạm', N'Thế Sơn', 1234567890, 'ak@gmail.com', 'Cần book lịch ngay', '2022-06-01 01:05:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--

CREATE TABLE `tblinvoice` (
  `id` int(11) NOT NULL,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(4, 7, 4, 138889283, '2022-05-13 11:42:21'),
(5, 7, 9, 138889283, '2022-05-13 11:42:21'),
(6, 7, 16, 138889283, '2022-05-13 11:42:21'),
(7, 8, 3, 555850701, '2022-05-13 11:42:51'),
(8, 8, 6, 555850701, '2022-05-13 11:42:51'),
(9, 8, 9, 555850701, '2022-05-13 11:42:51'),
(10, 8, 11, 555850701, '2022-05-13 11:42:51'),
(13, 10, 1, 330026346, '2022-05-28 08:51:42'),
(14, 10, 2, 330026346, '2022-05-28 08:51:42'),
(15, 10, 2, 379060040, '2022-05-29 07:36:17'),
(16, 10, 5, 379060040, '2022-05-29 07:36:18'),
(17, 10, 6, 379060040, '2022-05-29 07:36:18'),
(18, 10, 12, 379060040, '2022-05-29 07:36:18'),
(19, 10, 3, 460087279, '2022-06-01 01:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` nvarchar(100) DEFAULT NULL,
  `PageDescription` nvarchar(100) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` nvarchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'Về chúng tôi', 'Chúng tôi cung cấp dịch vụ sửa chữa tận tình.', NULL, NULL, NULL, ''),
(2, 'contactus', 'Liên hệ', '562 Tây Sơn - Đống Đa - Hà Nội', 'phamtheson@gmail.com', 9896541236, NULL, '10:30 sáng - 7:30 tối');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `ID` int(10) NOT NULL,
  `ServiceName` nvarchar(200) DEFAULT NULL,
  `ServiceDescription` nvarchar(100) DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`, `CreationDate`) VALUES
(1, N'Thay ram', 'O3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 Facial', 120000, 'b5.jpg', '2022-05-24 22:37:38'),
(2, N'Thay ổ cứng SSD 256GB', N'Với dung lượng lưu trữ ấn tượng của 256GB, không gian này không chỉ đủ để lưu trữ hệ điều hành và các ứng dụng quan trọng, mà còn để giữ gìn mọi dữ liệu quan trọng của bạn.', 580000, 'b6.jpg', '2022-05-24 22:37:53'),
(3, N'Thay ổ cứng SSD 500GB Pro', N'Với dung lượng lưu trữ ấn tượng của 256GB, không gian này không chỉ đủ để lưu trữ hệ điều hành và các ứng dụng quan trọng, mà còn để giữ gìn mọi dữ liệu quan trọng của bạn.', 1000000, 'b5.jpg', '2022-05-24 22:37:10'),
(4, N'Nâng ram', N'Việc thêm RAM không chỉ là việc tăng tốc độ máy tính mà còn là cách để mở rộng khả năng chứa đựng thông tin.', 500000, 'b3.jpg', '2022-05-24 22:37:34'),
(5, N'Thay màn hình', N'Việc thay màn hình là một bước quan trọng để làm mới và cải thiện trải nghiệm sử dụng của chiếc điện thoại hoặc máy tính của bạn. ', 600000, 'b2.jpg', '2022-05-24 22:37:47'),
(6, N'Thay ram', 'O3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 FacialO3 Facial', 120000, '5.jpg', '2022-05-24 22:37:38'),
(7, N'Thay ổ cứng SSD 256GB', N'Với dung lượng lưu trữ ấn tượng của 256GB, không gian này không chỉ đủ để lưu trữ hệ điều hành và các ứng dụng quan trọng, mà còn để giữ gìn mọi dữ liệu quan trọng của bạn.', 580000, 'b5.jpg', '2022-05-24 22:37:53'),
(8, N'Thay ổ cứng SSD 500GB Pro', N'Với dung lượng lưu trữ ấn tượng của 256GB, không gian này không chỉ đủ để lưu trữ hệ điều hành và các ứng dụng quan trọng, mà còn để giữ gìn mọi dữ liệu quan trọng của bạn.', 1000000, 'b6.jpg', '2022-05-24 22:37:10'),
(9, N'Nâng ram', N'Việc thêm RAM không chỉ là việc tăng tốc độ máy tính mà còn là cách để mở rộng khả năng chứa đựng thông tin.', 500000, 'b3.jpg', '2022-05-24 22:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` nvarchar(120) DEFAULT NULL,
  `LastName` nvarchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Phạm Thế Sơn', NULL, 8956234569, 'theson@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-10-16 14:22:03'),
(2, 'Nguyễn Văn An', NULL, 5689234578, 'nguyenvana@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-10-16 14:37:49'),
(3, 'Trần Văn Bình', NULL, 2147483649, 'tranvanb@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-10-16 14:40:20'),
(4, 'Lê Văn Cường', NULL, 8797977779, 'levanc@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-04-08 05:51:06'),
(5, 'Hoàng Văn Dũng', NULL, 1236547890, 'hoangvand@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-05-07 08:52:34'),
(6, 'Đặng Văn Chinh', NULL, 8888888888, 'dangvane@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-12-14 05:27:32'),
(7, 'Nguyễn Thị Thùy', 'Nguyễn', 9789797987, 'nguyenthif@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-11 09:21:46'),
(8, 'Trần Thị Giang', 'Trần', 8979798789, 'tranthig@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-11 09:23:16'),
(10, 'Lê Thị Huệ', 'Lê', 1425362514, 'lethih@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-15 05:03:32'),
(11, 'Đặng Thị Yến', 'Đặng', 1452632541, 'dangthii@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-29 07:33:58');
--
-- Indexes for dumped tables
--
CREATE TABLE `tblcart` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `quantity` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblinvoice`
--
ALTER TABLE `tblinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
