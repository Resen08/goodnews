-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 26-01-27 20:32
-- 서버 버전: 10.4.32-MariaDB
-- PHP 버전: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `bg24c_u005`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `uid` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `posts`
--

INSERT INTO `posts` (`pid`, `title`, `content`, `created`, `uid`, `parent_id`) VALUES
(0, 'TEST', 'TEST', '2026-01-27 20:28:49', 0, 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`,`parent_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userdb` (`uid`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `posts` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
