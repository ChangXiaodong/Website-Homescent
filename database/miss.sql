-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 12 月 24 日 02:44
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `miss`
--
CREATE DATABASE IF NOT EXISTS `miss` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `miss`;

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sendname` text NOT NULL,
  `toname` text NOT NULL,
  `finished` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `action` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `sendname`, `toname`, `finished`, `date`, `action`) VALUES
(1, 'xiaoxiami', 'you', 1, '2014-12-10 11:34:01', 3),
(2, 'xiaoxiami', 'you', 1, '2014-12-10 11:34:10', 5),
(3, 'xiaoxiami', 'you', 1, '2014-12-10 11:42:53', 1),
(4, 'xiaoxiami', 'you', 1, '2014-12-10 11:43:07', 2),
(5, 'xiaoxiami', 'you', 1, '2014-12-10 11:43:17', 4),
(6, 'xiaoxiami', 'you', 1, '2014-12-10 19:08:09', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
