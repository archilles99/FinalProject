-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 03:04 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `PRO_ID` varchar(10) NOT NULL,
  `BRAND_ID` varchar(20) NOT NULL,
  `GEN_ID` varchar(10) NOT NULL,
  `PRO_PIC` varchar(50) NOT NULL,
  `PRO_COLOR` varchar(30) NOT NULL,
  `PROS_80` int(5) NOT NULL,
  `PROS_85` int(5) NOT NULL,
  `PROS_90` int(5) NOT NULL,
  `PROS_95` int(5) NOT NULL,
  `PROS_100` int(5) NOT NULL,
  `PRO_MAX` int(5) NOT NULL,
  `PRO_MIN` int(5) NOT NULL,
  `PRO_PRICE` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRO_ID`, `BRAND_ID`, `GEN_ID`, `PRO_PIC`, `PRO_COLOR`, `PROS_80`, `PROS_85`, `PROS_90`, `PROS_95`, `PROS_100`, `PRO_MAX`, `PRO_MIN`, `PRO_PRICE`) VALUES
('p001', 'b0001', 'ga101', 'ff9b40dc2a88685bfe912c10cc11d01e.jpg', 'Blaugrana', 5, 10, 10, 10, 4, 15, 5, '5990.00'),
('p002', 'b0001', 'ga102', '7a5a99bde6e85c05bc6a3b1716bf4a12.jpg', 'Blaugrana', 10, 10, 10, 10, 10, 15, 5, '3590.00'),
('p003', 'b0001', 'ga101', '384b7b0438da625760dfbcd3a79d93c0.jpg', 'White/Green', 10, 10, 10, 10, 10, 15, 5, '5790.00'),
('p004', 'b0001', 'ga102', 'b6c7f95622ebdb856fd57df45eae45dd.jpg', 'White/Green', 4, 4, 4, 4, 6, 15, 5, '2890.00'),
('p005', 'b0001', 'ga201', '3203379f3a6121ef381ec5da2b918084.jpg', 'Black/White/Orange', 8, 10, 5, 4, 6, 15, 5, '4290.00'),
('p006', 'b0001', 'ga202', 'd7be3a1ba13f3d8deb0fc427a31255dc.jpg', 'Black/White/Orange', 10, 10, 10, 10, 10, 15, 5, '1990.00'),
('p007', 'b0001', 'ga201', '76a9817bbd1888eca9567a627d61cb25.jpg', 'Black/White/Blue', 10, 5, 3, 5, 10, 15, 5, '4290.00'),
('p008', 'b0001', 'ga202', 'fe1af74c981cdd2ed398ba19fd51c8f2.jpg', 'Black/White/Blue', 10, 10, 10, 10, 10, 15, 5, '2090.00'),
('p009', 'b0001', 'ga301', 'c18047381b12abfa95023b0ef686623b.jpg', 'Purple/White/Blue', 10, 10, 10, 10, 10, 15, 5, '5490.00'),
('p010', 'b0001', 'ga302', 'fbcfdd59845a99395199032284465f35.jpg', 'Purple/White/Blue', 10, 6, 5, 5, 10, 15, 5, '2990.00'),
('p011', 'b0001', 'ga301', '1a62a44369726c2a260cad0b5139f99d.jpg', 'Black/White/Orange', 10, 10, 10, 10, 10, 15, 5, '5490.00'),
('p012', 'b0001', 'ga302', '3dbcb4055658106e18381956386d362d.jpg', 'Black/White/Orange', 10, 10, 10, 10, 10, 15, 5, '2990.00'),
('p013', 'b0001', 'ga401', 'f3fbdb4ad4adc75f14fc5be4855d15e0.jpg', 'Red/White/Night Flash', 10, 10, 10, 10, 10, 15, 5, '5890.00'),
('p014', 'b0001', 'ga402', '7c5b559c78e42b0b0af3621468cc704b.jpg', 'Red/White/Night Flash', 10, 10, 10, 10, 10, 15, 5, '3390.00'),
('p015', 'b0001', 'ga401', 'ba8b992b928f3bbc2734c5a0d08a076b.jpg', 'Black/White/Red', 10, 10, 10, 10, 10, 15, 5, '5890.00'),
('p016', 'b0001', 'ga402', '24733e785cccff353e1d9d2b64c977c1.jpg', 'Black/White/Red', 10, 10, 10, 10, 10, 15, 5, '3390.00'),
('p017', 'b0002', 'gn101', '8aa87c8e30e0bd21430be588d13c5d5f.jpg', 'Volt/Pink/Black', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p018', 'b0002', 'gn102', '4c3a4b4fa093d27585420e4d9b8a3d6f.jpg', 'Volt/Pink/Black', 10, 10, 10, 10, 10, 15, 5, '3690.00'),
('p019', 'b0002', 'gn101', 'b51d871b29275cc6d5fc606d2343936e.jpg', 'White/Volt/Pink', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p020', 'b0002', 'gn102', '904252711353911cae918fb4e1f315c1.jpg', 'White/Volt/Pink', 10, 10, 10, 10, 10, 15, 5, '3690.00'),
('p021', 'b0002', 'gn201', '1e95f2ad9dd3385ba5b15f0171282e0c.jpg', 'Green/Crimson/Black', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p022', 'b0002', 'gn202', '63ba7307f9f8dc55dcb9d217a6e14313.jpg', 'Green/Crimson/Black', 10, 10, 10, 10, 10, 15, 5, '3690.00'),
('p023', 'b0002', 'gn201', '4c50a64bb5d2f52440fc865efea432c3.jpg', 'Turquoise/White/Crimson', 10, 10, 10, 10, 10, 15, 5, '5390.00'),
('p024', 'b0002', 'gn202', '87f876b64b72735a54c7f1698feb8429.jpg', 'Turquoise/White/Crimson', 10, 10, 10, 10, 10, 15, 5, '3290.00'),
('p025', 'b0002', 'gn301', '70d606530316fc50c91bf18f354bddd8.jpg', 'Blue/Crimson', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p026', 'b0002', 'gn302', '1e0e3650e7d97e3761fceb44b128c4d5.jpg', 'Blue/Crimson', 10, 8, 5, 10, 10, 15, 5, '3690.00'),
('p027', 'b0002', 'gn301', '71cd89a29359f72e1040a617560d2d28.jpg', 'White/Blue/Crimson', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p028', 'b0002', 'gn302', 'ce67aed1b417efb2ce48bda51afe218d.jpg', 'White/Blue/Crimson', 10, 10, 10, 10, 10, 15, 5, '3690.00'),
('p029', 'b0002', 'gn401', 'b62d602a7c4fffe085217034f5001c7c.jpg', 'Blue/Volt/Black', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p030', 'b0002', 'gn402', '59f8799f202d23a46edf3458a36d9c1d.jpg', 'Blue/Volt/Black', 10, 10, 10, 10, 10, 15, 5, '3290.00'),
('p031', 'b0002', 'gn401', '1454f878bef8f785b1a390654f842b9f.jpg', 'White/Volt/Black', 10, 10, 10, 10, 10, 15, 5, '6590.00'),
('p032', 'b0002', 'gn402', '746adaa3115f18f5fd12afc0ea315cb0.jpg', 'White/Volt/Black', 10, 10, 10, 10, 10, 15, 5, '3290.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE IF NOT EXISTS `product_brand` (
  `BRAND_ID` varchar(10) NOT NULL,
  `BRAND_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`BRAND_ID`, `BRAND_NAME`) VALUES
('b0001', 'Adidas'),
('b0002', 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `product_generation`
--

CREATE TABLE IF NOT EXISTS `product_generation` (
  `GEN_ID` varchar(10) NOT NULL,
  `GEN_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_generation`
--

INSERT INTO `product_generation` (`GEN_ID`, `GEN_NAME`) VALUES
('ga101', 'F50 Adizero FG'),
('ga102', 'F30 Adizero FG'),
('ga201', 'Adipure 11 Pro FG'),
('ga202', 'Adipure 11 Nova FG'),
('ga301', 'Nitrocharge 1.0 FG'),
('ga302', 'Nitrocharge 2.0 FG'),
('ga401', 'Predator Instinct FG'),
('ga402', 'Predator Absolion FG'),
('gn101', 'Mercurial Vapor X FG'),
('gn102', 'Mercurial Veloce II FG'),
('gn201', 'Magista Opus FG'),
('gn202', 'Magista Orden FG'),
('gn301', 'HyperVenom Phantom FG'),
('gn302', 'HyperVenom Phatal FG'),
('gn401', 'Tiempo Legend V FG'),
('gn402', 'Tiempo Legacy FG');

-- --------------------------------------------------------

--
-- Table structure for table `receive_detail`
--

CREATE TABLE IF NOT EXISTS `receive_detail` (
  `RE_ID` varchar(20) NOT NULL,
  `PRO_ID` varchar(10) NOT NULL,
  `PRO_SIZE` varchar(20) NOT NULL,
  `PRO_QTY` int(11) NOT NULL,
  `NEW_COST` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receive_detail`
--

INSERT INTO `receive_detail` (`RE_ID`, `PRO_ID`, `PRO_SIZE`, `PRO_QTY`, `NEW_COST`) VALUES
('Receive_001', 'p001', '10.0 US', 1, '0.00'),
('Receive_001', 'p001', '8.0 US', 1, '0.00'),
('Receive_002', 'p004', '8.0 US', 9, '0.00'),
('Receive_002', 'p004', '8.5 US', 9, '0.00'),
('Receive_002', 'p004', '9.0 US', 9, '0.00'),
('Receive_002', 'p004', '9.5 US', 9, '0.00'),
('Receive_003', 'p001', '10.0 US', 1, '0.00'),
('Receive_003', 'p001', '8.0 US', 1, '0.00'),
('Receive_004', 'p004', '8.0 US', 11, '0.00'),
('Receive_004', 'p004', '8.5 US', 11, '0.00'),
('Receive_004', 'p004', '9.0 US', 11, '0.00'),
('Receive_004', 'p004', '9.5 US', 11, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `receive_product`
--

CREATE TABLE IF NOT EXISTS `receive_product` (
  `RE_ID` varchar(20) NOT NULL,
  `RE_DATE` date NOT NULL,
  `SUP_ID` varchar(10) NOT NULL,
  `RE_STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receive_product`
--

INSERT INTO `receive_product` (`RE_ID`, `RE_DATE`, `SUP_ID`, `RE_STATUS`) VALUES
('Receive_001', '2015-11-06', 'sup0001', 'ยังไม่ได้รับ'),
('Receive_002', '2015-11-06', 'sup0002', 'ยังไม่ได้รับ'),
('Receive_003', '2015-11-09', 'sup0002', 'ยังไม่ได้รับ'),
('Receive_004', '2015-11-09', 'sup0002', 'ยังไม่ได้รับ');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `SUP_ID` varchar(10) NOT NULL,
  `SUP_NAME` varchar(50) NOT NULL,
  `SUP_ADD` varchar(100) NOT NULL,
  `SUP_TEL` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SUP_ID`, `SUP_NAME`, `SUP_ADD`, `SUP_TEL`) VALUES
('sup0001', 'Kicck', 'กรมทหารราบที่ 1 มหาดเล็กรักษาพระองค์ (ร.1 พัน1 รอ.)', '022726989'),
('sup0002', 'KOPSPORT', '104/21 ม.8 ถ.เฉลิมพระเกียรติ ร.9 แขวงประเวศ เขตประเวศ กทม. 10250', '0865178947');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `USER_ID` varchar(10) NOT NULL,
  `USER_NAME` varchar(20) NOT NULL,
  `USER_PASS` varchar(20) NOT NULL,
  `USER_TYPE` varchar(20) NOT NULL,
  `USER_FNAME` varchar(30) NOT NULL,
  `USER_LNAME` varchar(30) NOT NULL,
  `USER_GENDER` varchar(10) NOT NULL,
  `USER_BORN` date NOT NULL,
  `USER_ADD` varchar(60) NOT NULL,
  `USER_TEL` varchar(20) NOT NULL,
  `USER_EMAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAME`, `USER_PASS`, `USER_TYPE`, `USER_FNAME`, `USER_LNAME`, `USER_GENDER`, `USER_BORN`, `USER_ADD`, `USER_TEL`, `USER_EMAIL`) VALUES
('u0001', 'admin', '123456', 'admin', 'ณัฐพล', 'ประสานเชื้อ', 'ชาย', '1992-12-07', '64/99 หมู่บ้าน นครทอง ซ.2 ต.ราชาเทวะ อ.บางพลี จ.สม', '0829999999', 'admin.ifootballstudio@gmail.co'),
('u0002', 'post', '12345678', 'customer', 'วรพงษ์', 'คงประเสริฐ', 'ชาย', '1992-07-27', '175 ซ.13 ถ.พระพายัพ ต.แก่งคอย อ.แก่งคอย จ.สระบุรี 18110', '0822222222', 'poat_penguin@hotmail.com'),
('u0003', 'charge', '12345678', 'customer', 'นรภัทร', 'นิ่มมณี', 'ชาย', '1992-09-14', 'ห้อง 7 หอพักโชคสำราญ ต.คลองขุด อ.ท่าใหม่ จ.จันทบุรี', '0823456789', 'icharge_norrapat@hotmail.com'),
('u0004', 'tonny', '12345678', 'customer', 'ธนกฤต', 'แพรเนียม', 'ชาย', '1993-01-18', '419/737 หมู่ 10 ต.ในคลองฯ อ.พระสมุทรเจดีย์ จ.สมุทรปราการ 102', '0834567891', 'ton_028169581@hotmail.com'),
('u0005', 'graph', '12345678', 'customer', 'วริษฐา', 'คำวิไล', 'หญิง', '1992-11-11', '78/21 หมู่บ้าน PN.Plastic ซ.7 จ.สมุทรสาคร 12345', '0845678912', 'graph.hiphop@hotmail.com'),
('u0006', 'game', '12345678', 'customer', 'ชาญกฤษณ์', 'ทาสีภู', 'ชาย', '1992-12-26', 'หอพักโชคสำราญ ต.คลองขุด อ.ท่าใหม่ จ.จันทบุรี 22120', '0814567892', 'gaming@gmail.com'),
('u0007', 'jai', '12345678', 'customer', 'ธนภาค', 'จิระวิทิตชัย', 'ชาย', '1992-10-18', '64/1 ถ.พลแสน ต.ในเมือง อ.เมือง จ.นครราชศรีมา 30000', '044248584', 'thanapak_09@hotmail.com'),
('u0008', 'koko', '12345678', 'customer', 'กฤตภาส', 'บวรทวีปัญญา', 'ชาย', '1992-10-07', 'หอพัก ธัญพร ต.คลองขุด อ.ท่าใหม่ จ.จันทบุรี 22120', '0845678920', 'koko@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRO_ID`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`BRAND_ID`);

--
-- Indexes for table `product_generation`
--
ALTER TABLE `product_generation`
  ADD PRIMARY KEY (`GEN_ID`);

--
-- Indexes for table `receive_detail`
--
ALTER TABLE `receive_detail`
  ADD PRIMARY KEY (`RE_ID`,`PRO_ID`,`PRO_SIZE`);

--
-- Indexes for table `receive_product`
--
ALTER TABLE `receive_product`
  ADD PRIMARY KEY (`RE_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUP_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
