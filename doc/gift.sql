-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 06 日 00:33
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sql_chenjin`
--

-- --------------------------------------------------------

--
-- 表的结构 `gift`
--

CREATE TABLE IF NOT EXISTS `gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `brief` text NOT NULL,
  `image` varchar(200) NOT NULL COMMENT '礼品图片',
  `buy_gold` int(11) NOT NULL COMMENT '所需宝宝币',
  `merchant_id` int(11) NOT NULL COMMENT '商家id',
  `merchant_name` varchar(100) NOT NULL COMMENT '商家名称',
  `addtime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
