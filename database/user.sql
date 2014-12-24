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
-- 数据库: `user`
--
CREATE DATABASE IF NOT EXISTS `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`id`, `password`, `firstname`, `name`) VALUES
(1, '123', 'xiaoxiami', 'xiaoxiami');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
