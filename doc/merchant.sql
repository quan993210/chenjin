-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 05 日 00:21
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
-- 表的结构 `merchant`
--

CREATE TABLE IF NOT EXISTS `merchant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '商家名称',
  `logo` varchar(150) NOT NULL COMMENT '商家logo',
  `brief` text NOT NULL COMMENT '商家简介',
  `captain` varchar(50) NOT NULL COMMENT '商家联系人',
  `phone` char(11) NOT NULL COMMENT '联系电话',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `gold` int(11) NOT NULL COMMENT '可领取金币',
  `rank` int(11) NOT NULL COMMENT '排序',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商户表' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `merchant`
--

INSERT INTO `merchant` (`id`, `name`, `logo`, `brief`, `captain`, `phone`, `address`, `gold`, `rank`, `addtime`) VALUES
(1, '测试', '', '水电费翁', '张三', '13241231165', '南昌市高新区', 100, 100, 0),
(2, '测试123', '/upload/case/1708/201708042235412003.jpg', '水电费翁个人', '李四', '13241231134', '0', 10, 10, 2017),
(3, '测试1234', '/upload/case/1708/201708042335231564.jpg', '色的人保', '王五', '2147483647', '南昌市青山湖区', 20, 30, 2017),
(4, '订单', '', '', '', '0', '', 0, 0, 2017),
(5, '按时', '', '', '', '0', '', 0, 0, 2017),
(6, '第三方', '', '', '', '0', '', 0, 0, 2017),
(7, '345', '', '', '', '0', '', 0, 0, 2017),
(8, '似懂非懂', '', '', '', '0', '', 0, 0, 2017);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
