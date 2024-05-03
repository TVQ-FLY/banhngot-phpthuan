-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 27, 2024 lúc 02:34 PM
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
-- Cơ sở dữ liệu: `banhngot`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Email`, `Password`, `Role`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `BrandId` int(11) NOT NULL,
  `BrandName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`BrandId`, `BrandName`, `Image`, `Status`) VALUES
(2, 'Bánh kem Tous Les Jours', '23fa8e56c2.cart-2.jpg', 0),
(88, 'Tous Les Jours (Hàn Quốc)', '5efabeb186.th1.JPG', 1),
(96, 'Givral (Sài Gòn)', 'df4bea3d22.th4.JPG', 1),
(97, 'Paris Baguette (Pháp)', '0fb89bd7a5.th2.JPG', 1),
(101, 'Chez Moi (Pháp)', 'fe588555c8.th3.JPG', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `status`) VALUES
(2, 'Bánh ngọt', 1),
(3, 'Bánh kem', 1),
(4, 'Bánh mì', 1),
(15, 'Bánh quy', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `ContactId` int(11) NOT NULL,
  `UserName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`ContactId`, `UserName`, `Email`, `Message`) VALUES
(5, 'anh', 'anh@gmail.com', 'haaaaa'),
(6, 'thanh', 'anh@gmail.com', 'bánh ngon'),
(7, 'thanh', 'anh@gmail.com', 'bánh ngon');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerId` int(11) NOT NULL,
  `Fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` char(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Date_Login` datetime NOT NULL,
  `Date_Logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerId`, `Fullname`, `Image`, `PhoneNumber`, `Address`, `Status`, `Email`, `Password`, `Date_Login`, `Date_Logout`) VALUES
(7, 'Anh', '', '', '', 1, 'anh@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-29 09:13:14', '2023-12-22 13:25:29'),
(8, 'thanhle', '', '', '', 1, 'lethithaothanh2001@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-30 14:15:04', '2024-01-30 15:23:04'),
(9, 'thanhle', '', '', '', 0, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-11-27 20:47:21', '2023-11-27 21:04:36'),
(10, 'hoa', '', '', '', 1, 'hoa@gmail.com', '202cb962ac59075b964b07152d234b70', '2024-01-30 19:45:00', '2023-12-14 20:29:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oders`
--

CREATE TABLE `oders` (
  `OderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `total_price` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `oders`
--

INSERT INTO `oders` (`OderId`, `CustomerId`, `Note`, `order_date`, `address`, `number_phone`, `status`, `total_price`) VALUES
(115, 8, ' Giao nhanh nha!', '2023-12-14 20:27:53', '18, Hà Huy Tập', '0987452717', 1, 325000),
(116, 10, ' ', '2023-12-14 20:28:57', 'vinh', '0987452557', 2, 50000),
(117, 8, ' ', '2023-12-14 20:32:05', 'vinh', '0987452557', 0, 340000),
(118, 8, ' ', '2023-12-14 20:32:38', 'vinh', '0987452717', 0, 45000),
(119, 7, ' giao nhanh ', '2023-12-15 13:30:23', 'vinh', '0987452719', 0, 105000),
(120, 10, ' ', '2023-12-15 13:31:45', '18, Hà Huy Tập', '0987452717', 0, 35000),
(122, 8, ' ', '2023-12-22 13:27:50', '18, Hà Huy Tập', '0987452719', 1, 655000),
(123, 10, ' ', '2024-01-30 19:45:12', 'vinh', '0987452718', 0, 60000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Order_Detail_Id` int(11) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1,
  `Price` float NOT NULL DEFAULT 0,
  `Quantity` int(11) NOT NULL DEFAULT 0,
  `ProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`Order_Detail_Id`, `Status`, `Price`, `Quantity`, `ProductId`) VALUES
(115, 1, 150000, 1, 25),
(115, 1, 45000, 1, 15),
(115, 1, 130000, 1, 17),
(116, 1, 50000, 1, 20),
(117, 1, 20000, 1, 32),
(117, 1, 20000, 1, 16),
(117, 1, 300000, 1, 23),
(118, 1, 45000, 1, 27),
(119, 1, 35000, 3, 33),
(120, 1, 35000, 1, 33),
(121, 1, 150000, 1, 25),
(122, 1, 150000, 1, 25),
(122, 1, 45000, 1, 27),
(122, 1, 300000, 1, 23),
(122, 1, 20000, 1, 32),
(122, 1, 50000, 1, 20),
(122, 1, 45000, 2, 22),
(123, 1, 30000, 2, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `BuyPrice` float NOT NULL,
  `SellPrice` float NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `CountView` int(11) NOT NULL DEFAULT 0,
  `CategoriId` int(11) NOT NULL,
  `BrandId` int(11) NOT NULL,
  `is_accept` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductId`, `Name`, `Image`, `Quantity`, `Description`, `BuyPrice`, `SellPrice`, `Status`, `CountView`, `CategoriId`, `BrandId`, `is_accept`) VALUES
(6, 'Bánh socola sữa', 'f57d9c2d03.product-2.jpg', 100, ' Bánh socola sữa là một loại bánh ngọt được làm từ bột mì, đường, trứng, bơ, sữa và socola sữa. Bánh có màu nâu sẫm đặc trưng của socola, vị ngọt ngào của đường và bơ, và vị béo ngậy của sữa. Bánh socola sữa có thể được ăn kèm với trà, cà phê hoặc sữa. ', 30000, 60000, 1, 31, 2, 88, 0),
(11, 'banhs kem ngon', '543148f7b1.product-1.jpg', 100, 'done', 100, 121, 1, 22, 3, 88, 0),
(14, 'Bánh kem trà xanh', 'a1f7728fc5.tra.jpg', 1500, ' Bánh kem trà xanh là một loại bánh kem được làm từ cốt bánh trà xanh và kem trà xanh. Bánh có màu xanh nhạt, vị ngọt thanh của trà xanh, béo ngậy của kem tươi.', 100000, 200000, 1, 36, 3, 96, 1),
(15, 'Bánh mì kem bơ', '3a7179a973.b2.jpg', 1000, 'Bánh mì kem bơ là một loại bánh mì được làm từ bột mì, bơ, đường, trứng, sữa và men nở. Bánh có phần vỏ ngoài giòn rụm, phần ruột mềm xốp, và nhân kem bơ béo ngậy, thơm ngon.', 20000, 45000, 1, 27, 4, 97, 1),
(16, 'Bánh mì tươi', 'd59be13bec.08514a288e.1.png', 1000, 'Bánh mì tươi là một loại bánh mì được làm từ bột mì, nước, men, đường và muối. Bánh có đặc điểm là mềm, tơi, xốp, có hương vị khá giống bánh bông lan nhưng chưa đạt đến độ mềm như bánh bông lan.  Bánh mì tươi có màu vàng nhạt, vỏ bánh mỏng, ruột bánh mềm mịn, có độ đàn hồi cao. Khi ăn, bánh có vị ngọt nhẹ, thơm mùi sữa và men.', 10000, 20000, 1, 10, 4, 96, 1),
(17, 'Bánh mousse vani', '83d69d140b.vani.jpg', 1500, ' Bánh mousse vani là một loại bánh ngọt được làm từ cốt bánh bông lan và mousse vani. Bánh có màu trắng kem, vị ngọt ngào, béo ngậy của vani.', 70000, 130000, 1, 26, 3, 88, 1),
(18, 'Bánh mì trứng', '910bc4b266.08514a288e.1.png', 1000, 'Bánh mì trứng là một loại bánh mì được làm từ bột mì, trứng gà, đường, sữa tươi và các loại gia vị khác. Bánh có hương vị thơm ngon, béo ngậy của trứng gà, hòa quyện với vị ngọt của đường và sữa tươi. Bánh thường được ăn sáng hoặc làm món ăn nhẹ.', 10000, 25000, 1, 16, 4, 96, 1),
(19, 'Bánh socola dâu', '1679847831_product-6.jpg', 1000, ' Bánh socola dâu là một loại bánh kem được làm từ cốt bánh socola và kem tươi, có thêm các loại dâu tây tươi. Bánh có vị ngọt ngào, béo ngậy của socola, chua nhẹ của dâu tây, và thơm ngon của cốt bánh bông lan.', 15000, 30000, 1, 3, 2, 88, 1),
(20, 'Bánh dâu', '7bc8f94747.product-9.jpg', 1000, ' Bánh dâu là một loại bánh ngọt được làm từ cốt bánh bông lan và kem tươi, có thêm các loại dâu tây tươi. Bánh có vị ngọt ngào của dâu tây, béo ngậy của kem tươi, và thơm ngon của cốt bánh bông lan. ', 25000, 50000, 1, 21, 2, 88, 1),
(21, 'Bánh kem xoài', '98ffedd1b0.5d6dced255.cat.png', 1000, ' Bánh kem xoài là một loại bánh kem được làm từ cốt bánh mềm mịn, kem tươi béo ngậy và xoài tươi thơm ngon. Bánh có màu vàng tươi bắt mắt, hương vị ngọt ngào, thanh mát, là món tráng miệng được nhiều người yêu thích.', 100000, 150000, 1, 0, 3, 88, 1),
(22, 'Bánh socola hạt', '1679848089_product-10.jpg', 1000, 'Bánh socola hạt là một loại bánh ngọt được làm từ cốt bánh socola và kem socola, có thêm các loại hạt như hạt điều, hạt hạnh nhân, hạt óc chó,... Bánh có vị ngọt ngào, béo ngậy của socola, và vị thơm bùi của các loại hạt. ', 20000, 45000, 1, 6, 2, 88, 1),
(23, 'Bánh socola trái tim', '5bd398cbc8.tim.jpg', 100, 'h socola trái tim là một loại bánh kem được làm từ cốt bánh socola và kem socola. Bánh có hình dạng trái tim, màu sắc nâu đen đặc trưng của socola, và vị ngọt ngào, béo ngậy của socola.', 150000, 300000, 1, 13, 3, 88, 1),
(24, 'Bánh kem dâu ', '0ec11a82b9.1678766983_product-1.jpg', 100, ' Bánh kem dâu là một loại bánh kem được làm từ cốt bánh bông lan và kem tươi, có thêm các loại dâu tây tươi. Bánh có vị ngọt ngào của dâu tây, béo ngậy của kem tươi, và thơm ngon của cốt bánh bông lan. ', 120000, 250000, 1, 7, 3, 88, 1),
(25, 'Bánh kem đào', '832a23d67a.dao.jpg', 1000, 'Bánh kem đào là một loại bánh kem được làm với cốt bánh mềm, ngọt ngào và kem tươi béo ngậy. Đào là một loại trái cây có vị ngọt thanh, chua nhẹ, rất phù hợp để kết hợp với bánh kem.', 100000, 150000, 1, 55, 3, 88, 1),
(27, 'Bánh ngọt matcha', '1700913738_product-5.jpg', 200, 'Bánh ngọt matcha là một loại bánh ngọt được làm từ bột mì, trứng, đường, sữa, bơ và bột trà xanh. Bánh có hương vị thơm ngon, béo ngậy của bột trà xanh, kết hợp với vị ngọt thanh của đường và sữa, tạo nên một món ăn hấp dẫn.', 20000, 45000, 1, 4, 2, 101, 1),
(28, 'Bánh mì ngũ cốc', '1701088560_bmngucoc.png', 1500, 'Bánh mì ngũ cốc được làm từ nhiều loại ngũ cốc khác nhau, chẳng hạn như lúa mì, lúa mạch, lúa mạch đen và yến mạch. Nó có kết cấu dai và có hương vị đậm đà.', 20000, 45000, 1, 8, 4, 88, 1),
(29, 'Bánh mì Pita', '1701088940_bita.png', 150, 'Bánh mì Pita  có hàm lượng vitamin cao, giàu chất dinh dưỡng và chất xơ mà lại chứa rất ít calo nên thường được sử dụng làm thực phẩm ăn kiêng, kiểm soát cân nặng. Bánh mì Pita  cũng có chỉ số GI thấp nên không làm tăng chỉ số đường huyết, có lợi cho sức khỏe người sử dụng.', 10000, 20000, 1, 5, 4, 96, 1),
(30, 'Bánh mì sandwich', '1701089287_sw.png', 1000, 'Bánh mì sandwich là một loại bánh mì kẹp nhân được làm từ hai lát bánh mì kẹp nhân bên trong. Nó là một món ăn phổ biến trên toàn thế giới và có thể được làm với nhiều loại nhân khác nhau, bao gồm thịt, phô mai, rau, trứng và nhiều loại khác.', 5000, 15000, 1, 2, 4, 97, 1),
(31, 'Bánh mousse dâu tây ', '96812e82fe.product-big-4.jpg', 200, 'Bánh mousse dâu tây là loại bánh có lớp vỏ giòn, bên trong có nhân phô mai chua ngọt, bên trên có lớp phủ dâu tây. Bánh thường được trang trí thêm kem tươi hoặc dâu tây tươi.', 25000, 50000, 1, 14, 2, 101, 1),
(32, 'Bánh quy dừa', '1701090793_dua.jpg', 1000, 'Bánh quy dừa là một loại bánh quy phổ biến ở Việt Nam, có vị béo bùi của dừa, thơm ngon và dễ ăn. Bánh quy dừa có thể được làm với nhiều hình dạng khác nhau, như hình tròn, hình vuông, hình chữ nhật,...', 10000, 20000, 1, 5, 15, 96, 1),
(33, 'Bánh quy bơ', '1701090988_bo.jpg', 4000, 'Bánh quy bơ là một loại bánh quy phổ biến trên thế giới, có vị ngọt ngào, béo ngậy của bơ, thơm ngon và dễ ăn. Bánh quy bơ có thể được làm với nhiều hình dạng khác nhau, như hình tròn, hình vuông, hình chữ nhật,...', 25000, 35000, 1, 9, 15, 101, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `RoleId` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`RoleId`, `Name`, `Description`) VALUES
(1, 'Admin', 'Control everything'),
(2, 'SubAdmin', 'Control less than Admin\r\n');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Role` (`Role`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandId`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ContactId`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Chỉ mục cho bảng `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`OderId`),
  ADD KEY `FK_Customer_Id` (`CustomerId`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `ProductId` (`ProductId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `FK_Brand_Id` (`BrandId`),
  ADD KEY `FK_Categori_Id` (`CategoriId`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `oders`
--
ALTER TABLE `oders`
  MODIFY `OderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `roles` (`RoleId`);

--
-- Các ràng buộc cho bảng `oders`
--
ALTER TABLE `oders`
  ADD CONSTRAINT `FK_Customer_Id` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`CustomerId`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_Product_Id_01` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Brand_Id` FOREIGN KEY (`BrandId`) REFERENCES `brands` (`BrandId`),
  ADD CONSTRAINT `FK_Categori_Id` FOREIGN KEY (`CategoriId`) REFERENCES `category` (`CategoryId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
