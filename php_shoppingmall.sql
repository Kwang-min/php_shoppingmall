-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 21-08-12 02:10
-- 서버 버전: 8.0.26-0ubuntu0.20.04.2
-- PHP 버전: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `php_shoppingmall`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_data`
--

CREATE TABLE `shop_data` (
  `no` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `memo` text NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_list`
--

CREATE TABLE `shop_list` (
  `no` int NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `hphone` varchar(18) NOT NULL,
  `memo` text NOT NULL,
  `regdate` int NOT NULL,
  `total` int NOT NULL,
  `location` int NOT NULL DEFAULT '1',
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_order`
--

CREATE TABLE `shop_order` (
  `no` int NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `parent` int NOT NULL,
  `count` int NOT NULL,
  `price` int NOT NULL,
  `money` int NOT NULL,
  `regdate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `shop_temp`
--

CREATE TABLE `shop_temp` (
  `no` int NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `parent` int NOT NULL,
  `count` int NOT NULL,
  `price` int NOT NULL,
  `money` int NOT NULL,
  `regdate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `shop_data`
--
ALTER TABLE `shop_data`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `shop_list`
--
ALTER TABLE `shop_list`
  ADD PRIMARY KEY (`no`);

--
-- 테이블의 인덱스 `shop_temp`
--
ALTER TABLE `shop_temp`
  ADD PRIMARY KEY (`no`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `shop_data`
--
ALTER TABLE `shop_data`
  MODIFY `no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `shop_list`
--
ALTER TABLE `shop_list`
  MODIFY `no` int NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `shop_temp`
--
ALTER TABLE `shop_temp`
  MODIFY `no` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
