-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-03-01 19:40:48
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shimokitazawa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `MemberID` int(11) NOT NULL,
  `MemberName` varchar(21) NOT NULL,
  `UserID` varchar(18) NOT NULL,
  `UserPassword` varchar(40) NOT NULL,
  `eMail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`MemberID`, `MemberName`, `UserID`, `UserPassword`, `eMail`) VALUES
(24, 'CHING TE WANG', 'u09e06', 'e10adc3949ba59abbe56e057f20f883e', 'u09e06@gmail.com'),
(25, '三浦', 'MuR1919', '7f11c055bd6ac511771fc92f4ff9d46b', 'MuR19@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetails`
--

CREATE TABLE `orderdetails` (
  `DetailNo` int(10) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orderdetails`
--

INSERT INTO `orderdetails` (`DetailNo`, `OrderID`, `ProductID`, `UnitPrice`, `Quantity`) VALUES
(1, 2001451400, 2, 400, 2),
(2, 2001451400, 4, 350, 1),
(3, 2001451400, 7, 400, 1),
(4, 2001451401, 5, 2000, 1),
(5, 2001451401, 4, 350, 1),
(6, 2001451402, 6, 350, 1),
(7, 2001451402, 4, 350, 1),
(8, 2001451402, 2, 400, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `MemberID` int(11) NOT NULL,
  `OrderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`OrderID`, `MemberID`, `OrderDate`) VALUES
(2001451400, 25, '2020-02-14'),
(2001451401, 24, '2020-02-29'),
(2001451402, 25, '2020-03-17');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(30) DEFAULT NULL,
  `UnitPrice` int(5) DEFAULT NULL,
  `image` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `UnitPrice`, `image`) VALUES
(1, '衣索比亞 耶加雪菲', 350, 'Yirgacheffe'),
(2, '蘇門答臘 藍鑽 黃金曼特寧', 400, 'Mandheling'),
(3, '肯亞AA FAQ', 450, 'KenyaAA'),
(4, '瓜地馬拉 安提瓜 花神', 350, 'Antiqua_Flora'),
(5, '巴拿馬 藝伎', 2000, 'Geisha'),
(6, '瓜地馬拉 薇薇特南果', 350, 'Huehuetenango'),
(7, '衣索比亞 獅子王', 400, 'Lionking'),
(8, '仲夏夜紅茶', 114514, 'TDKR'),
(9, '衣索比亞 西達摩 水洗G2', 350, 'SidamoG2');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`MemberID`);

--
-- 資料表索引 `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`DetailNo`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `DetailNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001451403;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
