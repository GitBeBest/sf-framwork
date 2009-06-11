-- phpMyAdmin SQL Dump
-- version 2.11.5.1
-- http://www.phpmyadmin.net
--
-- 主机: mysql
-- 生成日期: 2009 年 06 月 11 日 14:58
-- 服务器版本: 5.1.33
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `juwin`
--

-- --------------------------------------------------------

--
-- 表的结构 `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(20) DEFAULT NULL COMMENT '广告标题',
  `type_str` varchar(20) NOT NULL DEFAULT 'image' COMMENT '广告类型',
  `brief` text COMMENT '广告描述',
  `content` longtext COMMENT '广告内容',
  `is_public` int(1) NOT NULL DEFAULT '0' COMMENT '是否发布',
  `updated_at` datetime DEFAULT NULL COMMENT '广告更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `ads`
--

INSERT INTO `ads` (`id`, `subject`, `type_str`, `brief`, `content`, `is_public`, `updated_at`) VALUES
(1, '图形广告演示', 'image', '图形广告演示                                                  ', 'YToxMTp7czo2OiJjb25maWciO2E6Mjp7czo1OiJ3aWR0aCI7czozOiIxMjUiO3M6NjoiaGVpZ2h0IjtzOjM6IjEwMCI7fWk6MDthOjM6e3M6NToiaW1hZ2UiO3M6MjY6IjIwMDkvMDUvMTI0MTU4MDE5MzY2NDYucG5nIjtzOjM6InVybCI7czoxOiIjIjtzOjM6ImRlcyI7czo5OiLmlK/ku5jlrp0iO31pOjE7YTozOntzOjU6ImltYWdlIjtzOjI2OiIyMDA5LzA1LzEyNDE1ODAyMDI4OTYyLnBuZyI7czozOiJ1cmwiO3M6MToiIyI7czozOiJkZXMiO3M6Njoi572R6ZO2Ijt9aToyO2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTozO2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo0O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo1O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo2O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo3O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo4O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo5O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9fQ==', 1, '2009-05-06 14:09:59'),
(2, '文本广告', 'text', '文本广告                              ', 'YToxMDp7aTowO2E6Mzp7czo0OiJ0ZXh0IjtzOjEzOiLmloflrZflhoXlrrkxIjtzOjM6InVybCI7czoxOiIjIjtzOjM6ImRlcyI7czoxMzoi5paH5a2X5YaF5a65MSI7fWk6MTthOjM6e3M6NDoidGV4dCI7czoxMzoi5paH5a2X5YaF5a65MiI7czozOiJ1cmwiO3M6MToiIyI7czozOiJkZXMiO3M6MTM6IuaWh+Wtl+WGheWuuTIiO31pOjI7YTozOntzOjQ6InRleHQiO3M6MTM6IuaWh+Wtl+WGheWuuTMiO3M6MzoidXJsIjtzOjE6IiMiO3M6MzoiZGVzIjtzOjEzOiLmloflrZflhoXlrrkzIjt9aTozO2E6Mzp7czo0OiJ0ZXh0IjtzOjEzOiLmloflrZflhoXlrrk0IjtzOjM6InVybCI7czoxOiIjIjtzOjM6ImRlcyI7czoxMzoi5paH5a2X5YaF5a65NCI7fWk6NDthOjM6e3M6NDoidGV4dCI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo1O2E6Mzp7czo0OiJ0ZXh0IjtzOjA6IiI7czozOiJ1cmwiO3M6MDoiIjtzOjM6ImRlcyI7czowOiIiO31pOjY7YTozOntzOjQ6InRleHQiO3M6MDoiIjtzOjM6InVybCI7czowOiIiO3M6MzoiZGVzIjtzOjA6IiI7fWk6NzthOjM6e3M6NDoidGV4dCI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo4O2E6Mzp7czo0OiJ0ZXh0IjtzOjA6IiI7czozOiJ1cmwiO3M6MDoiIjtzOjM6ImRlcyI7czowOiIiO31pOjk7YTozOntzOjQ6InRleHQiO3M6MDoiIjtzOjM6InVybCI7czowOiIiO3M6MzoiZGVzIjtzOjA6IiI7fX0=', 0, '2009-05-06 12:01:12'),
(3, 'flash类型', 'flash', 'flash类型                                                                                                    ', 'YToyOntzOjY6ImNvbmZpZyI7YToyOntzOjU6IndpZHRoIjtzOjM6IjYwMCI7czo2OiJoZWlnaHQiO3M6MzoiMTAwIjt9czo1OiJmbGFzaCI7czoyNjoiMjAwOS8wNS8xMjQxNTk1NDcxMzE4Ny5zd2YiO30=', 1, '2009-05-06 15:39:12'),
(4, '代码类型', 'code', '代码类型                    ', 'YToxOntzOjQ6ImNvZGUiO3M6MzM6IjxzY3JpcHQ+YWxlcnQoXCdnb29kXCcpOzwvc2NyaXB0PiI7fQ==', 0, '2009-05-06 14:47:37'),
(5, '幻灯类型', 'magic', '幻灯类型                                                  ', 'YTo3OntzOjY6ImNvbmZpZyI7YTo0OntzOjU6IndpZHRoIjtzOjM6IjMwMCI7czo2OiJoZWlnaHQiO3M6MzoiMjAwIjtzOjEwOiJ0ZXh0aGVpZ2h0IjtzOjE6IjEiO3M6NzoiYmdjb2xvciI7czo3OiIjRkZGRkZGIjt9aTowO2E6Mzp7czo1OiJpbWFnZSI7czoyNjoiMjAwOS8wNS8xMjQxNTkyMjAxNzc2Ny5qcGciO3M6MzoidXJsIjtzOjE6IiMiO3M6MzoiZGVzIjtzOjk6IuWbvueJh+S4gCI7fWk6MTthOjM6e3M6NToiaW1hZ2UiO3M6MjY6IjIwMDkvMDUvMTI0MTU5MjY5MDE2MTkuanBnIjtzOjM6InVybCI7czoxOiIjIjtzOjM6ImRlcyI7czo5OiLlm77niYfkuowiO31pOjI7YTozOntzOjU6ImltYWdlIjtzOjI2OiIyMDA5LzA1LzEyNDE1OTI3MTQ5OTU4LmpwZyI7czozOiJ1cmwiO3M6MToiIyI7czozOiJkZXMiO3M6OToi5Zu+54mH5LiJIjt9aTozO2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo0O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9aTo1O2E6Mzp7czo1OiJpbWFnZSI7czowOiIiO3M6MzoidXJsIjtzOjA6IiI7czozOiJkZXMiO3M6MDoiIjt9fQ==', 1, '2009-05-06 14:52:17');

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(60) DEFAULT NULL COMMENT '文章标题',
  `type_str` varchar(10) DEFAULT NULL COMMENT '文章类型标记',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章分类id',
  `brief` text NOT NULL COMMENT '文章描述',
  `content` longtext COMMENT '文章内容',
  `cover` varchar(30) DEFAULT NULL COMMENT '封面图片',
  `is_top` int(11) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `is_hot` int(11) NOT NULL DEFAULT '0' COMMENT '是否热点',
  `is_public` int(11) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `is_html` int(1) NOT NULL DEFAULT '0' COMMENT '是否是静态页面',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `articles`
--

INSERT INTO `articles` (`id`, `subject`, `type_str`, `category_id`, `brief`, `content`, `cover`, `is_top`, `is_hot`, `is_public`, `is_html`, `updated_at`) VALUES
(1, '文章标题文章标题文章标题文章标题', 'article', 2, '这些从只需选择           ', '页面内容页面内容页面内容页面内容页面内容页面内容页面内容页面内容页面内容', '2009/05/12420118004650.jpg', 1, 1, 1, 0, '2009-05-11 11:16:42'),
(2, '文章标题文章标题文章标题详细', 'article', 3, '除福建工会建设的公司的', '文章描述文章描述文章描述文章描述文章描述', NULL, 1, 0, 1, 1, '2009-04-11 17:22:23'),
(3, '但是根深蒂固 ', 'article', 3, '新秩序行程v          ', '珍惜现在vzxv', NULL, 0, 1, 1, 1, '2009-04-11 17:22:13'),
(4, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(5, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(6, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(7, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(8, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(9, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(10, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(11, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(12, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(13, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(14, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(15, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(16, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(17, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(18, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(19, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(20, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(21, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(22, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(23, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(24, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(25, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(26, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(27, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(28, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(29, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(30, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(31, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(32, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(33, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(34, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(35, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(36, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(37, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(38, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(39, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(40, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(41, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(42, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(43, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(44, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(45, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(46, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(47, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(48, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(49, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(50, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(51, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(52, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(53, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(54, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(55, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(56, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(57, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(58, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(59, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(60, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(61, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(62, '测试文章标题1239713904', 'article', 2, '测试文章描述1239713904', '测试文章内容1239713904', NULL, 0, 0, 1, 1, '2009-04-14 20:58:24'),
(63, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(64, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(65, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(66, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(67, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(68, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(69, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(70, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(71, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(72, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(73, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(74, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(75, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(76, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(77, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(78, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(79, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(80, '测试文章标题1239713905', 'article', 6, '测试文章描述1239713905          ', '测试文章内容1239713905', NULL, 0, 0, 1, 0, '2009-05-03 01:08:31'),
(81, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(82, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(83, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(84, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(85, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(86, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(87, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(88, '测试文章标题1239713905', 'article', 6, '测试文章描述1239713905          ', '测试文章内容1239713905', NULL, 0, 0, 1, 0, '2009-05-03 01:08:19'),
(89, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(90, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(91, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(92, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(93, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(94, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(95, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(96, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(97, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(98, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(99, '测试文章标题1239713905', 'article', 2, '测试文章描述1239713905', '测试文章内容1239713905', NULL, 0, 0, 1, 1, '2009-04-14 20:58:25'),
(100, '测试文章标题1239713905', 'article', 6, '测试文章描述1239713905          ', '测试文章内容1239713905', NULL, 0, 0, 1, 0, '2009-05-03 01:08:40');

-- --------------------------------------------------------

--
-- 表的结构 `authorizations`
--

DROP TABLE IF EXISTS `authorizations`;
CREATE TABLE IF NOT EXISTS `authorizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(30) DEFAULT NULL,
  `controller_name` varchar(20) DEFAULT NULL,
  `method` varchar(30) DEFAULT NULL,
  `user_group_ids` varchar(255) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `authorizations`
--

INSERT INTO `authorizations` (`id`, `controller`, `controller_name`, `method`, `user_group_ids`) VALUES
(1, 'admin/home', 'admin/home', 'index', '1,2'),
(2, 'admin/home', 'admin/home', 'top', '1,2'),
(3, 'admin/home', 'admin/home', 'left', '1,2'),
(4, 'tools', 'tools', 'index', '1'),
(5, 'admin/home', 'admin/home', 'center', '1,2'),
(6, 'admin/home', 'admin/home', 'buttom', '1,2'),
(7, 'admin/home', 'admin/home', 'main', '1,2'),
(8, 'admin/authorization', 'admin/authorization', 'index', '1'),
(9, 'admin/category', 'admin/category', 'index', '1,2'),
(10, 'admin/user', 'admin/user', 'group_list', '1'),
(11, 'admin/article', 'admin/article', 'index', '1,2'),
(12, 'admin/article', 'admin/article', 'edit', '1,2'),
(13, 'admin/authorization', 'admin/authorization', 'edit', '1'),
(14, 'admin/user', 'admin/user', 'group_edit', '1'),
(15, 'admin/category', 'admin/category', 'edit', '1,2'),
(16, 'admin/user', 'admin/user', 'index', '1'),
(17, 'admin/user', 'admin/user', 'edit', '1'),
(18, 'admin/category', 'admin/category', 'delete', '1,2'),
(19, 'admin/page', 'admin/page', 'index', '1,2'),
(20, 'admin/page', 'admin/page', 'edit', '1,2'),
(21, 'admin/page', 'admin/page', 'delete', '1,2'),
(22, 'admin/product', 'admin/product', 'index', '1,2'),
(23, 'admin/product', 'admin/product', 'edit', '1,2'),
(24, 'admin/product', 'admin/product', 'delete', '1,2'),
(25, 'admin/menu', 'admin/menu', 'index', '1'),
(26, 'admin/menu', 'admin/menu', 'edit', '1'),
(27, 'admin/templete', 'admin/templete', 'edit', '1'),
(28, 'admin/templete', 'admin/templete', 'index', '1'),
(29, 'admin/build', 'admin/build', 'index', '1'),
(30, 'admin/build', 'admin/build', 'article', '1'),
(31, 'admin/article', 'admin/article', 'test', '1'),
(32, 'admin/home', 'admin/home', 'css', '1'),
(33, 'page', 'page', 'index', '1'),
(34, 'admin/job', 'admin/job', 'index', '1'),
(35, 'admin/job', 'admin/job', 'back', '1'),
(36, 'admin/job', 'admin/job', 'edit', '1'),
(37, 'admin/job', 'admin/job', 'show', '1'),
(38, 'admin/job', 'admin/job', 'delete_back', '1'),
(39, 'admin/job', 'admin/job', 'edit_back', '1'),
(40, 'admin/configure', 'admin/configure', 'index', '1'),
(41, 'admin/orders', 'admin/orders', 'index', '1'),
(42, 'admin/orders', 'admin/orders', 'edit', '1'),
(43, 'admin/orders', 'admin/orders', 'delete', '1'),
(44, 'admin/article', 'admin/article', 'delete', '1'),
(45, 'welcome', 'welcome', 'index', '1'),
(46, 'admin/ad', 'admin/ad', 'index', '1'),
(47, 'admin/ad', 'admin/ad', 'edit', '1'),
(48, 'admin/ad', 'admin/ad', 'content', '1'),
(49, 'admin/ad', 'admin/ad', 'show', '1'),
(50, 'admin/template', 'admin/template', 'index', '1'),
(51, 'admin/template', 'admin/template', 'edit', '1'),
(52, 'admin/template', 'admin/template', 'show', '1'),
(53, 'admin/template', 'admin/template', 'execute', '1');

-- --------------------------------------------------------

--
-- 表的结构 `backs`
--

DROP TABLE IF EXISTS `backs`;
CREATE TABLE IF NOT EXISTS `backs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) NOT NULL COMMENT '应聘职位',
  `user_name` varchar(30) DEFAULT NULL,
  `user_sex` varchar(10) DEFAULT NULL,
  `user_age` varchar(10) DEFAULT NULL,
  `user_degree` varchar(10) DEFAULT NULL,
  `idcard` varchar(18) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_im` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `post_code` int(6) DEFAULT NULL,
  `work_at` varchar(20) DEFAULT NULL,
  `study_list` text,
  `work_list` text,
  `note` text COMMENT '处理意见',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `backs`
--

INSERT INTO `backs` (`id`, `subject`, `user_name`, `user_sex`, `user_age`, `user_degree`, `idcard`, `user_phone`, `user_im`, `user_email`, `user_address`, `post_code`, `work_at`, `study_list`, `work_list`, `note`, `updated_at`) VALUES
(1, '应聘职位', '应聘者姓名', '男', '30', '大学', '510111111111111111', '02888888888', '1234567', '1234@1212.com', '地址地址地址地址', 111111, '一月后', '程序行程v', '和风格和风格和', '处理意见                    ', '2009-04-15 23:12:23'),
(4, '职位名称', '姓 名', '性 别', '12', 'vxcv', 'dffsdfsdfsdf', 'dvxcvxc', 'xcv', 'vxcv', 'xcvxc', 0, 'xcvx', 'xcvxcv', NULL, NULL, '2009-05-02 22:59:09');

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL COMMENT '留言者姓名',
  `user_phone` varchar(30) DEFAULT NULL,
  `user_qq` varchar(30) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `content` text COMMENT '留言内容',
  `write_back` text COMMENT '回复内容',
  `is_public` int(1) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `books`
--

INSERT INTO `books` (`id`, `user_name`, `user_phone`, `user_qq`, `user_email`, `content`, `write_back`, `is_public`, `updated_at`) VALUES
(1, '姓名x', '电话', ' QQ QQ QQ', '邮件邮件邮件', '留言内容留言内容留言内容留言内容留言内容留言内容          ', '回复内容回复内容回复内容回复内容回复内容     ', 1, '2009-04-15 21:44:26'),
(2, '姓名', '留言内容', '留言内容', '留言内容', '留言内容留言内容留言内容留言内容          ', '留言内容留言内容留言内容留言内容留言内容留言内容留言内容留言内容留言内容留言内容留言内容留言内容          ', 1, '2009-04-15 21:44:37');

-- --------------------------------------------------------

--
-- 表的结构 `categorys`
--

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'default',
  `head_str` varchar(60) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `left` int(11) DEFAULT NULL,
  `right` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `note` text,
  `cover` varchar(30) DEFAULT NULL,
  `is_home` int(1) NOT NULL DEFAULT '0' COMMENT '是否显示到首页',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `categorys`
--

INSERT INTO `categorys` (`id`, `subject`, `type`, `head_str`, `level`, `parent_id`, `left`, `right`, `orders`, `note`, `cover`, `is_home`, `updated_at`) VALUES
(1, '新闻中心', 'article', '└', 1, 0, 1, 8, NULL, NULL, NULL, 0, '2009-04-11 16:52:46'),
(2, '公司新闻', 'article', '&nbsp;&nbsp;├', 2, 1, 2, 3, NULL, NULL, NULL, 1, '2009-05-03 00:18:49'),
(3, '行业新闻', 'article', '&nbsp;&nbsp;├', 2, 1, 4, 5, NULL, NULL, NULL, 1, '2009-05-03 00:18:53'),
(4, '产品中心', 'product', '├', 1, 0, 1, 2, NULL, NULL, NULL, 0, '2009-04-11 17:24:31'),
(5, '最新产品', 'product', '└', 1, 0, 3, 4, NULL, NULL, NULL, 0, '2009-04-11 17:24:51'),
(6, '其他新闻', 'article', '&nbsp;&nbsp;└', 2, 1, 6, 7, NULL, NULL, NULL, 1, '2009-05-03 01:05:49');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) DEFAULT NULL COMMENT '评论标题',
  `type_str` varchar(10) DEFAULT NULL COMMENT '评论类型',
  `content` text COMMENT '评论内容',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户名',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `subject`, `type_str`, `content`, `user_id`, `user_name`, `updated_at`) VALUES
(1, NULL, 'test7', 'dfgdfg', 0, 'dfg', '2009-04-21 21:29:53'),
(2, NULL, 'test7', 'xcvxcvxcvxc', 0, 'xcvxc', '2009-04-21 21:30:03'),
(3, NULL, 'test7', '我也说两句我也说两句我也说两句', 0, '我也说两句', '2009-04-21 21:37:22'),
(4, NULL, 'test7', '我也说两句我也说两句我也说两句我也说两句', 0, '我也说两句', '2009-04-21 21:37:48'),
(5, NULL, 'test7', 'dczxczxc', 0, 'zxc', '2009-04-21 21:38:21'),
(6, NULL, 'test7', '我也说两句', 0, '我也说两句', '2009-04-21 21:38:36'),
(7, NULL, 'test47', '我也说两句', 0, '我也说两句', '2009-04-21 21:47:57'),
(8, NULL, 'test47', '我也说两句我也说两句我也说两句', 0, '我也说两句', '2009-04-21 21:48:07'),
(9, NULL, 'article615', '测试文章内容1239713956', 0, 'zzz', '2009-04-21 21:48:51'),
(10, NULL, 'article1', 'zxczxczxcxz', 255, 'super', '2009-05-03 00:06:43'),
(11, NULL, 'article1', '我也说两句我也说两句我也说两句我也说两句我也说两句', 255, 'super', '2009-05-03 00:07:08'),
(12, NULL, 'article80', '咨询成长相册仔细', 255, 'super', '2009-05-03 02:57:23'),
(13, NULL, 'article88', '我也说两句我也说两句我也说两句', 0, 'Guest', '2009-05-03 03:54:01'),
(14, NULL, 'article9', '我也说两句我也说两句我也说两句', 0, 'Guest', '2009-05-03 13:44:06');

-- --------------------------------------------------------

--
-- 表的结构 `filemanager`
--

DROP TABLE IF EXISTS `filemanager`;
CREATE TABLE IF NOT EXISTS `filemanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `item_type` varchar(20) NOT NULL DEFAULT 'project',
  `file_name` varchar(60) DEFAULT NULL,
  `file_savename` varchar(30) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  `file_size` varchar(20) DEFAULT NULL,
  `file_ext` varchar(20) DEFAULT NULL,
  `file_minetype` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `file_note` text,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `authorization` varchar(200) NOT NULL DEFAULT '1',
  `used` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `filemanager`
--

INSERT INTO `filemanager` (`id`, `item_id`, `item_type`, `file_name`, `file_savename`, `file_path`, `file_size`, `file_ext`, `file_minetype`, `created_at`, `file_note`, `user_id`, `user_name`, `authorization`, `used`) VALUES
(26, NULL, 'project', 'dl.gif', '12394432507971.gif', '2009/04/12394432507971.gif', '377', 'gif', 'image/gif', '2009-04-11 17:47:30', NULL, 255, 'super', '1', 0),
(27, NULL, 'project', 'cx.gif', '12394432615860.gif', '2009/04/12394432615860.gif', '363', 'gif', 'image/gif', '2009-04-11 17:47:41', NULL, 255, 'super', '1', 0),
(28, NULL, 'project', 'cx.gif', '12394436215247.gif', '2009/04/12394436215247.gif', '363', 'gif', 'image/gif', '2009-04-11 17:53:41', NULL, 255, 'super', '1', 0),
(29, NULL, 'project', 'add.gif', '12394436302569.gif', '2009/04/12394436302569.gif', '91', 'gif', 'image/gif', '2009-04-11 17:53:50', NULL, 255, 'super', '1', 0),
(30, NULL, 'project', 'del.gif', '12394444786395.gif', '2009/04/12394444786395.gif', '96', 'gif', 'image/gif', '2009-04-11 18:07:58', NULL, 255, 'super', '1', 0),
(31, NULL, 'project', 'main_40.gif', '12394447936387.gif', '2009/04/12394447936387.gif', '1527', 'gif', 'image/gif', '2009-04-11 18:13:13', NULL, 255, 'super', '1', 0),
(32, NULL, 'project', 'main_19.gif', '12394482964972.gif', '2009/04/12394482964972.gif', '1051', 'gif', 'image/gif', '2009-04-11 19:11:36', NULL, 255, 'super', '1', 0),
(33, NULL, 'project', 'main_56.gif', '12394487751215.gif', '2009/04/12394487751215.gif', '517', 'gif', 'image/gif', '2009-04-11 19:19:35', NULL, 255, 'super', '1', 0),
(34, NULL, 'project', 'main_52.gif', '12394488337920.gif', '2009/04/12394488337920.gif', '1507', 'gif', 'image/gif', '2009-04-11 19:20:33', NULL, 255, 'super', '1', 0),
(35, NULL, 'project', 'main_21.gif', '12394488417229.gif', '2009/04/12394488417229.gif', '591', 'gif', 'image/gif', '2009-04-11 19:20:41', NULL, 255, 'super', '1', 0),
(36, NULL, 'project', 'main_52.gif', '12394488496552.gif', '2009/04/12394488496552.gif', '1507', 'gif', 'image/gif', '2009-04-11 19:20:49', NULL, 255, 'super', '1', 0),
(37, NULL, 'project', 'main_56.gif', '12394489017594.gif', '2009/04/12394489017594.gif', '517', 'gif', 'image/gif', '2009-04-11 19:21:41', NULL, 255, 'super', '1', 0),
(38, NULL, 'project', 'calendar.png', '12395430731754.png', '2009/04/12395430731754.png', '1091', 'png', 'image/x-png', '2009-04-12 21:31:14', NULL, 255, 'super', '1', 0),
(39, NULL, 'project', '22372100.png', '12415801936646.png', '2009/05/12415801936646.png', '2013', 'png', 'image/x-png', '2009-05-06 11:23:13', NULL, 255, 'super', '1', 0),
(40, NULL, 'project', '04580200.png', '12415802028962.png', '2009/05/12415802028962.png', '2246', 'png', 'image/x-png', '2009-05-06 11:23:22', NULL, 255, 'super', '1', 0),
(41, NULL, 'project', 'suxian.gif', '12415816914916.gif', '2009/05/12415816914916.gif', '106', 'gif', 'image/gif', '2009-05-06 11:48:11', NULL, 255, 'super', '1', 0),
(42, NULL, 'project', '04580200.png', '12415826202823.png', '2009/05/12415826202823.png', '2246', 'png', 'image/x-png', '2009-05-06 12:03:40', NULL, 255, 'super', '1', 0),
(43, NULL, 'project', '84300900.png', '12415826261704.png', '2009/05/12415826261704.png', '2222', 'png', 'image/x-png', '2009-05-06 12:03:46', NULL, 255, 'super', '1', 0),
(44, NULL, 'project', '66849300.png', '12415826352717.png', '2009/05/12415826352717.png', '2253', 'png', 'image/x-png', '2009-05-06 12:03:55', NULL, 255, 'super', '1', 0),
(45, NULL, 'project', 'ban.jpg', '12415922017767.jpg', '2009/05/12415922017767.jpg', '22970', 'jpg', 'image/pjpeg', '2009-05-06 14:43:21', NULL, 255, 'super', '1', 0),
(46, NULL, 'project', 'xwdt.jpg', '12415926901619.jpg', '2009/05/12415926901619.jpg', '10921', 'jpg', 'image/pjpeg', '2009-05-06 14:51:30', NULL, 255, 'super', '1', 0),
(47, NULL, 'project', 'cp001.jpg', '12415927149958.jpg', '2009/05/12415927149958.jpg', '3634', 'jpg', 'image/pjpeg', '2009-05-06 14:51:54', NULL, 255, 'super', '1', 0),
(48, NULL, 'project', '174160.swf', '12415954713187.swf', '2009/05/12415954713187.swf', '30500', 'swf', 'application/x-shockwave-flash', '2009-05-06 15:37:51', NULL, 255, 'super', '1', 0),
(49, NULL, 'project', 'cp001.jpg', '12420118004650.jpg', '2009/05/12420118004650.jpg', '3634', 'jpg', 'image/jpeg', '2009-05-11 11:16:40', NULL, 255, 'super', '1', 0),
(50, NULL, 'project', 'test.png', '12420123568987.png', '2009/05/12420123568987.png', '1166', 'png', 'image/png', '2009-05-11 11:25:56', NULL, 255, 'super', '1', 0),
(51, NULL, 'project', 'test.png', '12420124551734.png', '2009/05/12420124551734.png', '51863', 'png', 'image/png', '2009-05-11 11:27:35', NULL, 255, 'super', '1', 0),
(52, NULL, 'project', '200804021055257349.jpg', '12420129114769.jpg', '2009/05/12420129114769.jpg', '20303', 'jpg', 'image/jpeg', '2009-05-11 11:35:11', NULL, 255, 'super', '1', 0),
(53, NULL, 'project', 'test.png', '12420130085571.png', '2009/05/12420130085571.png', '1395', 'png', 'image/png', '2009-05-11 11:36:48', NULL, 255, 'super', '1', 0),
(54, NULL, 'project', 'test.png', '12420131603634.png', '2009/05/12420131603634.png', '648', 'png', 'image/png', '2009-05-11 11:39:20', NULL, 255, 'super', '1', 0),
(55, NULL, 'project', 'test.png', '12420225279539.png', '2009/05/12420225279539.png', '32790', 'png', 'image/png', '2009-05-11 14:15:27', NULL, 255, 'super', '1', 0),
(56, NULL, 'project', 'test.png', '12420234483611.png', '2009/05/12420234483611.png', '18760', 'png', 'image/png', '2009-05-11 14:30:48', NULL, 255, 'super', '1', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) DEFAULT NULL,
  `guerdon` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `number` int(5) DEFAULT NULL,
  `work_address` varchar(20) DEFAULT NULL,
  `degree` varchar(20) DEFAULT NULL,
  `content` longtext,
  `linkman` varchar(20) DEFAULT NULL,
  `linkman_phone` varchar(20) DEFAULT NULL,
  `linkman_email` varchar(100) DEFAULT NULL,
  `linkman_im` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `jobs`
--

INSERT INTO `jobs` (`id`, `subject`, `guerdon`, `department`, `age`, `number`, `work_address`, `degree`, `content`, `linkman`, `linkman_phone`, `linkman_email`, `linkman_im`, `address`, `updated_at`) VALUES
(1, '职位名称', '职位待遇', '所属部门', '年龄要求', 12, '工作地点', '学历要求', '1、精通PHP+MySQL架构，是该项工作的基本要求；<br />\r\n2、精通辅助脚本语言及HTML代码及CSS编写规范；<br />\r\n3、熟悉网站设计类工具Photoshop、Flash、Dreamweave；<br />\r\n4、熟悉PHP5将享受优遇；<br />\r\n5、收入状态将与你的岗位阶梯及创造的劳动价值密切相关，我们期望你在加入团队后迅速提升你的岗位阶梯。', '联系人', '联系电话', '电子邮箱', '联系人IM', '面试地点面试地点面试地点面试地点', '2009-04-15 22:49:59'),
(2, '职位名称', '职位名称', '职位名称', '职位名称', 12, '职位名称', '职位名称', '详细要求详细要求详细要求详细要求详细要求详细要求详细要求', '详细要求', '详细要求', 'mmm@mm.cm', '详细要求', '详细要求', '2009-04-15 22:55:43');

-- --------------------------------------------------------

--
-- 表的结构 `managers`
--

DROP TABLE IF EXISTS `managers`;
CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '用户所属权限组',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户登录名',
  `user_username` varchar(50) DEFAULT NULL COMMENT '用户名称',
  `user_password` varchar(45) DEFAULT NULL,
  `login_num` int(15) DEFAULT '0' COMMENT '登录总次数',
  `lastlogin_at` datetime DEFAULT NULL COMMENT '最后登录时间',
  `created_at` datetime DEFAULT NULL COMMENT '用户创建时间',
  `updated_at` datetime DEFAULT NULL,
  `user_ip` varchar(16) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL COMMENT '用户电子邮件',
  `first_question` varchar(20) DEFAULT NULL,
  `first_answer` varchar(100) DEFAULT NULL,
  `second_question` varchar(20) DEFAULT NULL,
  `second_answer` varchar(100) DEFAULT NULL,
  `is_lock` int(1) NOT NULL DEFAULT '0' COMMENT '是否通过审核',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台管理用户';

--
-- 导出表中的数据 `managers`
--

INSERT INTO `managers` (`id`, `user_group_id`, `user_name`, `user_username`, `user_password`, `login_num`, `lastlogin_at`, `created_at`, `updated_at`, `user_ip`, `user_email`, `first_question`, `first_answer`, `second_question`, `second_answer`, `is_lock`) VALUES
(255, 1, 'super', 'super', '5ee086bf7231be4dc788046d4a0fc233:dbe', 30, '2009-05-10 18:21:50', NULL, '2009-04-08 21:40:36', '127.0.0.1', 'meetcd@126.com', NULL, NULL, NULL, NULL, 1),
(256, 2, 'admin', 'admin', 'e85de916711a78e8c58867dceee792d1:cea', 1, '2009-04-12 17:38:49', NULL, '2009-04-08 21:41:06', '127.0.0.1', 'meetcd@126.com', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(20) DEFAULT NULL COMMENT '菜单名称',
  `type` varchar(20) NOT NULL DEFAULT 'default',
  `head_str` varchar(60) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT '菜单的父类ID',
  `left` int(11) DEFAULT NULL,
  `right` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `alt` text COMMENT '菜单说明',
  `url` varchar(200) DEFAULT NULL COMMENT '菜单连接地址',
  `user_group_ids` varchar(200) NOT NULL DEFAULT '1' COMMENT '能访问的权限组',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `menus`
--

INSERT INTO `menus` (`id`, `subject`, `type`, `head_str`, `level`, `parent_id`, `left`, `right`, `orders`, `alt`, `url`, `user_group_ids`, `updated_at`) VALUES
(24, '产品模板列表', 'default', '&nbsp;&nbsp;├', 2, 22, 58, 59, NULL, '新增模板', 'admin/template/index/type/product', '1', '2009-05-06 16:38:24'),
(23, '文章模板列表', 'default', '&nbsp;&nbsp;├', 2, 22, 60, 61, NULL, '文章模板列表', 'admin/template/index/type/article', '1', '2009-05-06 16:38:35'),
(22, '模板管理', 'default', '└', 1, 0, 57, 64, 10, '模板管理', '#', '1', '2009-05-06 16:38:10'),
(6, '文章管理', 'default', '├', 1, 0, 17, 24, 3, '文章管理', '#', '1,2', '2009-04-12 16:23:48'),
(7, '文章分类', 'default', '│├', 2, 6, 18, 19, NULL, '管理文章分类', 'admin/category/index/type/article', '1,2', '2009-04-12 16:22:47'),
(8, '产品管理', 'default', '├', 1, 0, 25, 32, 4, '管理产品', '#', '1,2', '2009-04-12 16:23:42'),
(9, '页面管理', 'default', '├', 1, 0, 11, 16, 2, '网站内动态页面管理', '#', '1,2', '2009-04-12 16:24:08'),
(10, '系统管理', 'default', '├', 1, 0, 1, 10, 1, '系统管理', '#', '1', '2009-04-12 16:08:14'),
(11, '文章列表', 'default', '│├', 2, 6, 20, 21, NULL, '文章列表 ', 'admin/article/index/type/article', '1,2', '2009-04-12 16:23:10'),
(12, '新增文章 ', 'default', '│└', 2, 6, 22, 23, NULL, '新增文章 ', 'admin/article/edit/type/article', '1,2', '2009-04-12 16:23:34'),
(13, '产品分类', 'default', '│├', 2, 8, 26, 27, NULL, '产品分类', 'admin/category/index/type/product', '1,2', '2009-04-12 16:21:49'),
(14, '产品列表', 'default', '│├', 2, 8, 28, 29, NULL, '产品列表', 'admin/product/index/type/product', '1,2', '2009-04-12 16:22:11'),
(15, '新增产品', 'default', '│└', 2, 8, 30, 31, NULL, '新增产品', 'admin/product/edit/type/product', '1,2', '2009-04-12 16:22:30'),
(16, '页面列表', 'default', '│├', 2, 9, 12, 13, NULL, '页面列表', 'admin/page/index/type/default', '1,2', '2009-04-12 16:24:31'),
(17, '新增页面', 'default', '│└', 2, 9, 14, 15, NULL, '新增页面 ', 'admin/page/edit/type/default', '1,2', '2009-04-12 16:25:04'),
(18, '权限组列表', 'default', '│├', 2, 10, 2, 3, NULL, '权限组列表', 'admin/user/group_list', '1', '2009-04-12 16:26:01'),
(19, '权限列表', 'default', '│├', 2, 10, 4, 5, NULL, '权限列表 ', 'admin/authorization/index', '1', '2009-04-12 16:25:49'),
(20, '管理员列表 ', 'default', '│├', 2, 10, 6, 7, NULL, '管理员列表 ', 'admin/user/index', '1', '2009-04-12 16:25:36'),
(21, '菜单列表', 'default', '│└', 2, 10, 8, 9, NULL, '菜单列表', 'admin/menu/index', '1', '2009-04-12 16:25:24'),
(25, '在线留言', 'default', '├', 1, 0, 33, 36, 5, '在线留言', '#', '1,2', '2009-04-15 21:30:50'),
(26, '留言列表', 'default', '│└', 2, 25, 34, 35, NULL, '留言列表', 'admin/book/index', '1,2', '2009-04-15 21:31:24'),
(27, '在线招聘', 'default', '├', 1, 0, 37, 42, 6, '在线招聘', '#', '1,2', '2009-04-15 22:22:10'),
(28, '职位列表', 'default', '│├', 2, 27, 38, 39, NULL, '职位列表', 'admin/job/index', '1,2', '2009-04-15 22:22:48'),
(29, '招聘反馈信息', 'default', '│└', 2, 27, 40, 41, NULL, '招聘反馈信息', 'admin/job/back', '1,2', '2009-04-15 22:23:52'),
(30, '站点全局设置', 'default', '├', 1, 0, 43, 46, 7, '设置站点的一些信息', '#', '1,2', '2009-04-21 21:18:35'),
(31, '全局设置', 'default', '│└', 2, 30, 44, 45, NULL, '设置站点名，数据库连接等信息', 'admin/configure/index', '1,2', '2009-04-21 21:19:39'),
(32, '在线订单', 'default', '├', 1, 0, 47, 50, 8, '查看会员的订单', '#', '1,2', '2009-04-21 22:14:15'),
(33, '订单列表', 'default', '│└', 2, 32, 48, 49, NULL, '订单列表', 'admin/orders/index', '1,2', '2009-04-21 22:15:15'),
(34, '广告管理', 'default', '├', 1, 0, 51, 56, 9, '广告管理', '#', '1,2', '2009-05-06 09:12:30'),
(35, '广告列表', 'default', '│├', 2, 34, 52, 53, 1, '广告列表', 'admin/ad/index', '1,2', '2009-05-06 09:13:12'),
(36, '新增广告', 'default', '│└', 2, 34, 54, 55, 2, '新增广告', 'admin/ad/edit', '1,2', '2009-05-06 09:14:02'),
(37, '页面管理模板', 'default', '&nbsp;&nbsp;└', 2, 22, 62, 63, 3, '页面管理模板', 'admin/template/index/type/page', '1', '2009-05-10 18:44:47');

-- --------------------------------------------------------

--
-- 表的结构 `order_froms`
--

DROP TABLE IF EXISTS `order_froms`;
CREATE TABLE IF NOT EXISTS `order_froms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(60) DEFAULT NULL COMMENT '订单标题',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `user_name` varchar(20) NOT NULL COMMENT '用户名',
  `number` int(11) NOT NULL COMMENT '产品数量',
  `price` varchar(20) NOT NULL COMMENT '产品单价',
  `user_sex` varchar(20) DEFAULT NULL,
  `user_mobile` varchar(20) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_fax` varchar(20) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `notebook` text NOT NULL COMMENT '用户备注',
  `is_public` int(1) NOT NULL COMMENT '是否处理',
  `note` text NOT NULL COMMENT '处理意见',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `order_froms`
--

INSERT INTO `order_froms` (`id`, `subject`, `user_id`, `user_name`, `number`, `price`, `user_sex`, `user_mobile`, `user_phone`, `user_fax`, `user_email`, `user_address`, `notebook`, `is_public`, `note`, `updated_at`) VALUES
(1, '测试订单', 1, 'meetcd', 12, '300', NULL, NULL, NULL, NULL, NULL, NULL, '测试订单', 1, '处理信息处理信息处理信息处理信息处理信息', '2009-04-21 22:26:29'),
(5, '咨询成长相册自行车', 255, 'super', 23, '232', '先生', '2342342', '23423', '4234', '2342', '34234', '234234234', 1, 'cvbcvbcvb', '2009-05-03 22:24:08');

-- --------------------------------------------------------

--
-- 表的结构 `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) DEFAULT NULL COMMENT '页面标题',
  `type_str` varchar(10) NOT NULL DEFAULT 'default' COMMENT '分组标记字符',
  `content` longtext COMMENT '页面内容',
  `updated_at` datetime DEFAULT NULL COMMENT '最近更新时间',
  `is_default` int(1) NOT NULL DEFAULT '0' COMMENT '是否为默认显示',
  `is_public` int(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `is_menu` int(1) NOT NULL DEFAULT '0' COMMENT '是否显示为菜单',
  `orders` int(5) NOT NULL DEFAULT '0' COMMENT '菜单排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `pages`
--

INSERT INTO `pages` (`id`, `subject`, `type_str`, `content`, `updated_at`, `is_default`, `is_public`, `is_menu`, `orders`) VALUES
(1, '公司简介', 'default', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码是西部地区规模最大、技术实力最强、专业化程度最高的互联网应用服务商之一；是获得信息产业部电信增值业务经营许可证(ICP)的专业化服务商之一；是获得软件企业认定证书和软件产品登记证书的双软认证企业；是四川省电子商务协会常务理事成员，是成都软件行业协会常务理事，是国家&ldquo;863&rdquo;计划重点支持企业。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码整合互联网前沿技术提供网站诊断策划、网站建设推广、网站维护营运等一整套网络营销服务，帮助客户实现网上塑造品牌、销售产品、服务客户，从而提高市场竞争力，为包括四川省质量技术监督局、大陆希望集团、华西希望集团、华西附二院、平乐古镇等在内的5000余家客户，提供了卓有成效的电子商务解决方案，赢得了客户广泛的赞誉。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码拥有一流的管理、技术和服务团队，公司率先在业内建立了完善的技术开发体系、服务质量体系，专业培训体系，保证我们服务的客户能够得到标准、专业、优质的互联网应用服务。公司与中国电信和中国移动有着良好的合作关系，保证我们的用户各项服务的稳定性和安全保障；公司采用适合西部企业的一对一的贴身服务模式，使我们服务的企业能够感受个性化服务带来的便利和价值。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码是阿里巴巴、中国万网、中国新网等在西部地区最重要的战略合作伙伴，保证我们的客户能够得到全方位的互联网应用服务；与《华西都市报》、《成都商报》、《成都日报》、四川电视台等传统媒体有着良好的合作关系，定期为我们服务过的客户在这些媒体进行宣传报道，使我们的客户能够获得更多增值的服务。</p>', '2009-04-14 21:32:18', 1, 1, 0, 0),
(2, '荣誉证书', 'default', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码是西部地区规模最大、技术实力最强、专业化程度最高的互联网应用服务商之一；是获得信息产业部电信增值业务经营许可证(ICP)的专业化服务商之一；是获得软件企业认定证书和软件产品登记证书的双软认证企业；是四川省电子商务协会常务理事成员，是成都软件行业协会常务理事，是国家&ldquo;863&rdquo;计划重点支持企业。\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码整合互联网前沿技术提供网站诊断策划、网站建设推广、网站维护营运等一整套网络营销服务，帮助客户实现网上塑造品牌、销售产品、服务客户，从而提高市场竞争力，为包括四川省质量技术监督局、大陆希望集团、华西希望集团、华西附二院、平乐古镇等在内的5000余家客户，提供了卓有成效的电子商务解决方案，赢得了客户广泛的赞誉。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码拥有一流的管理、技术和服务团队，公司率先在业内建立了完善的技术开发体系、服务质量体系，专业培训体系，保证我们服务的客户能够得到标准、专业、优质的互联网应用服务。公司与中国电信和中国移动有着良好的合作关系，保证我们的用户各项服务的稳定性和安全保障；公司采用适合西部企业的一对一的贴身服务模式，使我们服务的企业能够感受个性化服务带来的便利和价值。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;方法数码是阿里巴巴、中国万网、中国新网等在西部地区最重要的战略合作伙伴，保证我们的客户能够得到全方位的互联网应用服务；与《华西都市报》、《成都商报》、《成都日报》、四川电视台等传统媒体有着良好的合作关系，定期为我们服务过的客户在这些媒体进行宣传报道，使我们的客户能够获得更多增值的服务。</p>', '2009-04-14 21:32:56', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(60) DEFAULT NULL COMMENT '文章标题',
  `price` varchar(10) NOT NULL DEFAULT '0.00' COMMENT '产品价格',
  `type_str` varchar(10) DEFAULT NULL COMMENT '文章类型标记',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章分类id',
  `brief` text COMMENT '文章描述',
  `content` longtext COMMENT '文章内容',
  `cover` varchar(30) DEFAULT NULL COMMENT '封面图片',
  `images` text COMMENT '产品图片',
  `is_top` int(11) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `is_hot` int(11) NOT NULL DEFAULT '0' COMMENT '是否热点',
  `is_public` int(11) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `products`
--

INSERT INTO `products` (`id`, `subject`, `price`, `type_str`, `category_id`, `brief`, `content`, `cover`, `images`, `is_top`, `is_hot`, `is_public`, `updated_at`) VALUES
(1, '文章标题文章标题文章标题文章标题', '0.00', 'article', 2, '这些从只需选择 ', '页面内容页面内容页面内容页面内容页面内容页面内容页面内容页面内容页面内容', NULL, NULL, 1, 1, 1, '2009-04-11 17:22:38'),
(2, '文章标题文章标题文章标题详细', '0.00', 'article', 3, '除福建工会建设的公司的', '文章描述文章描述文章描述文章描述文章描述', NULL, NULL, 1, 0, 1, '2009-04-11 17:22:23'),
(3, '但是根深蒂固 ', '0.00', 'article', 3, '新秩序行程v          ', '珍惜现在vzxv', NULL, NULL, 0, 1, 1, '2009-04-11 17:22:13'),
(4, '宣传不成想不出vb', '0.00', 'product', 4, '开工饭的高度是', 'cbcvbvcbvc 认识多个地方刚发的好大方和负担会大方好大方好', NULL, 'Array', 0, 1, 1, '2009-04-11 17:40:37'),
(5, '是公司的规定发给对方', '0.00', 'product', 5, '发还大方和股份                              ', '形成vxcvxcvxcv', '2009/04/12394482964972.gif', 'Array||||', 1, 0, 0, '2009-04-11 19:11:39'),
(6, '咨询成长相册自行车', '0.00', 'product', 4, '的发生的发生地方                                                                  ', '咨询成长相册自行车自行车', '2009/04/12394447936387.gif', '2009/04/12394436215247.gif|2009/04/12394436302569.gif|2009/04/12394444786395.gif||', 1, 1, 1, '2009-04-11 18:13:16');

-- --------------------------------------------------------

--
-- 表的结构 `templates`
--

DROP TABLE IF EXISTS `templates`;
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) DEFAULT NULL COMMENT '模板标题',
  `type_str` varchar(10) DEFAULT NULL COMMENT '分类标记',
  `brief` text COMMENT '模板简单描述',
  `content` longtext COMMENT '模板内容',
  `cover` varchar(30) DEFAULT NULL COMMENT '样式图片',
  `func` varchar(100) DEFAULT NULL COMMENT '调用函数名称',
  `note` text NOT NULL COMMENT '参数说明',
  `updated_at` datetime DEFAULT NULL COMMENT '最近更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `templates`
--

INSERT INTO `templates` (`id`, `subject`, `type_str`, `brief`, `content`, `cover`, `func`, `note`, `updated_at`) VALUES
(1, '热点文章提取(TABLE)', 'article', '提取指定数量的热点文章，显示的条数等可以前台设置。                                                                                                                                                      ', '<?php while($article = $result->getObject()):?>\r\n<tr>\r\n   <td width="10" height="24" align="center">·</td>\r\n   <td height="24"><?=link_to("article/show/type/article/id/".$article->getId(),$article->getSubject())?></td>\r\n</tr>\r\n<?php endwhile;?>', '2009/04/12395430731754.png', 'Tag::selectArticleHotByTypeStr', '1,模板编号,系统生成\r\n2,显示新闻的类型，扯份的时候加上的type,为空则显示所有类型，默认为空。\r\n3,最多显示条数，0为显示所有，默认为5', '2009-05-11 10:57:44'),
(2, '页面列表(DIV+CSS)', 'page', '显示相同类型的页面列表                              ', '<ul class="selectPageListByTypeStr">\r\n <?php while($page = $result->getObject()):?>\r\n     <li><?=link_to("page/index/type/".$page->getTypeStr()."/id/".$page->getId(),$page->getSubject(Tag::getInt(3,12,$agrs)))?></li>\r\n <?php endwhile;?>\r\n</ul>', '2009/05/12420131603634.png', 'Tag::selectPageByTypeStr', '1，模板编码，系统自动化生成\r\n2，页面type分类,为空则显示所有类型，默认为空\r\n3，最多显示条数，默认0（显示所有）\r\n4，标题显示字数，默认显示12字', '2009-05-11 11:39:22'),
(3, '页面列表(Table)', 'page', '显示相同类型的页面列表                     ', '<?php while($page = $result->getObject()):?>\r\n<tr>\r\n  <td><?=link_to("page/index/type/".$page->getTypeStr()."/id/".$page->getId(),$page->getSubject(Tag::getInt(3,12,$agrs)))?></td>\r\n</tr>\r\n<?php endwhile;?>', '2009/05/12420131603634.png', 'Tag::selectPageByTypeStr', '1，模板编码，系统自动化生成\r\n2，页面type分类,为空则显示所有类型，默认为空\r\n3，最多显示条数，默认0（显示所有）\r\n4，标题显示字数，默认12字', '2009-05-11 11:39:42'),
(4, '取得指定分类的文章列表(DIV+CSS)', 'article', '取得指定分类的文章列表                              ', '<div class="ArticleListHtmlByCategoryId">\r\n  <h1><em>\r\n    <?=link_to("article/category/type/".$category->getType()."/id/".$category->getId(),lang::get(''more''))?>\r\n    </em>\r\n    <?=$category->getSubject()?>\r\n  </h1>\r\n  <ul>\r\n    <?php while($article = $result->getObject()):?>\r\n    <li>\r\n      <?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(3,12,$agrs)),array(''target''=>Tag::getChar(4,''_blank'',$agrs)))?>\r\n    </li>\r\n    <?php endwhile;?>\r\n  </ul>\r\n</div>\r\n', '2009/05/12420130085571.png', 'Tag::selectArticleByCategoryId', '1,模板编号，系统自动\r\n2,分类ID,为0则显示所有，默认为0\r\n3,最多显示条数，默认显示5条\r\n4,标题显示字数,默认12字\r\n5,连接打开位置,默认_blank(新窗口)', '2009-05-11 11:37:51'),
(5, '取得指定分类的文章列表(TABLE)', 'article', '取得指定分类的文章列表(TABLE)                              ', '<tr>\r\n  <td><?=$category->getSubject()?></td>\r\n  <td width="50"><?=link_to("article/category/type/".$category->getType()."/id/".$category->getId(),lang::get(''more''))?></td>\r\n</tr>\r\n<?php while($article = $result->getObject()):?>\r\n<tr>\r\n  <td colspan="2"><?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(3,12,$agrs)),array(''target''=>Tag::getChar(4,''_blank'',$agrs)))?>\r\n  </td>\r\n</tr>\r\n<?php endwhile;?>', '2009/05/12420130085571.png', 'Tag::selectArticleByCategoryId', '1,模板编号，系统自动\r\n2,分类ID,为0则显示所有，默认为0\r\n3,最多显示条数，默认显示5条\r\n4,标题显示字数,默认12字\r\n5,连接打开位置,默认_blank(新窗口)', '2009-05-11 11:38:00'),
(6, '取得新闻分类树(DIC+CSS)', 'article', '取得新闻分类树,利用css可以控制树的缩进          ', '<ul class="selectTreeByTypeStr">\r\n  <?php while($category = $result->getObject()):?>\r\n  <li class="category_level_<?=$category->getLevel()?>">\r\n    <?=link_to("article/category/type/".$category->getType()."/id/".$category->getId(),$category->getSubject())?>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420123568987.png', 'Tag::selectTreeByTypeStr', '1,模板编号,系统自动产生\r\n2,分类TYPE类型(分类撤分类型),默认为"article"\r\n3,最多显示分类条数,为0则显示该分类所有子分类,默认为0', '2009-05-11 11:25:58'),
(7, '取得置顶文章列表(DIV+CSS)', 'article', '取得置顶文章列表,列出：标题', '<ul class="selectArticleTopByTypeStr">\r\n  <?php while($article = $result->getObject()):?>\r\n  <li>\r\n    <?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(3,12,$agrs)),array(''target''=>Tag::getChar(4,''_blank'',$agrs)))?>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420130085571.png', 'Tag::selectArticleTopByTypeStr', '1,模板编号\r\n2,文章TYPE类型(撤分类型),默认为空(提取所有文章)\r\n3,最多显示条数,默认显示5条\r\n4,标题显示字数\r\n5,连接打开位置,默认_blank(新窗口)', '2009-05-11 14:17:26'),
(8, '取得热点文章列表(DIV+CSS)', 'article', '取得热点文章列表,列出：标题', '<ul class="selectArticleHotByTypeStr">\r\n  <?php while($article = $result->getObject()):?>\r\n  <li>\r\n    <?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(3,12,$agrs)),array(''target''=>Tag::getChar(4,''_blank'',$agrs)))?>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420130085571.png', 'Tag::selectArticleHotByTypeStr', '1,模板编号\r\n2,文章TYPE类型(撤分类型),默认为空(提取所有文章)\r\n3,最多显示条数,默认显示5条\r\n4,标题显示长度,默认12字\r\n5,连接打开位置,默认_blank(新窗口)', '2009-05-11 14:17:15'),
(9, '取得最新文章列表(DIV+CSS)', 'article', '取得最新文章列表,列出：标题                                      ', '<ul class="selectArticleByTypeStr">\r\n  <?php while($article = $result->getObject()):?>\r\n  <li>\r\n    <?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(3,12,$agrs)),array(''target''=>Tag::getChar(4,''_blank'',$agrs)))?>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420130085571.png', 'Tag::selectArticleByTypeStr', '1,模板编号\r\n2,文章TYPE类型(撤分类型),默认为空(提取所有文章)\r\n3,最多显示条数,默认显示5条\r\n4,标题显示字数\r\n5,打开窗口,默认_blank(新窗口打开)', '2009-05-11 14:17:03'),
(10, '取得图片文章列表(DIV+CSS)', 'article', '取得图片文章列表,列出：标题+图片+描述                                               ', '<ul class="selectImageArticleByTypeStr">\r\n  <?php while($article = $result->getObject()):?>\r\n  <li>\r\n    <h1><?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(3,10,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?></h1>\r\n    <p><?=$article->getBrief(Tag::getInt(4,30,$agrs))?></p>\r\n    <img src="<?=site_path("up_files/".$article->getCover())?>" width="<?=Tag::getInt(5,80,$agrs)?>" height="<?=Tag::getInt(6,60,$agrs)?>" />\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420129114769.jpg', 'Tag::selectImageArticleByTypeStr', '1,模板编号\r\n2,文章TYPE类型(撤分类型),默认为空(提取所有文章)\r\n3,最多显示条数,默认显示5条\r\n4,标题长度,默认10字\r\n5,描述文本长度,默认30字\r\n6,图片宽度,默认80px\r\n7,图片高度,默认60px\r\n8.连接打开位置,默认_blank(新窗口)', '2009-05-11 14:16:46'),
(11, '取得头板头条新闻(热点新闻DIV+CSS)', 'article', '取得头板头条新闻,列出：头一个图片新闻（标题+图片），其他列表（标题）                            ', '<?php if($first = $result->getObject()):?>\r\n<div class="selectArticleForHomeFirstFirst"> <img src="<?=site_path("up_files/".$first->getCover())?>" width="<?=Tag::getInt(6,222,$agrs)?>" height="<?=Tag::getInt(7,162,$agrs)?>" />\r\n  <h1>\r\n    <?=link_to("article/show/type/".$first->getTypeStr()."/id/".$first->getId(),$first->getSubject(Tag::getInt(3,12,$agrs)),array(''target''=>Tag::getChar(5,''_blank'',$agrs)))?>\r\n  </h1>\r\n</div>\r\n<?php endif;?>\r\n<ul class="selectArticleForHomeFirstList">\r\n  <?php while($article = $result->getObject()):?>\r\n  <li>\r\n    <?=link_to("article/show/type/".$article->getTypeStr()."/id/".$article->getId(),$article->getSubject(Tag::getInt(4,12,$agrs)),array(''target''=>Tag::getChar(5,''_blank'',$agrs)))?>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420124551734.png', 'Tag::selectImageArticleByTypeStr', '1,模板编号\r\n2,文章TYPE类型(撤分类型),默认为空(提取所有文章)\r\n3,最多显示条数,默认显示5条,图文1条，列表4条\r\n4,图文标题长度,默认12字\r\n5,列表标题长度,默认12字\r\n6，连接打开位置，默认_blank（新窗口）\r\n7,图片宽度,默认222px\r\n8,图片高度,默认162px', '2009-05-11 14:18:17'),
(12, '取得产品分类树(DIC+CSS)', 'product', '取得产品分类树(DIC+CSS)          ', '<ul class="selectTreeByTypeStr">\r\n  <?php while($category = $result->getObject()):?>\r\n  <li class="category_level_<?=$category->getLevel()?>">\r\n    <?=link_to("product/category/type/".$category->getType()."/id/".$category->getId(),$category->getSubject())?>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420123568987.png', 'Tag::selectTreeByTypeStr', '1,模板编号,系统自动产生\r\n2,分类TYPE类型(分类撤分类型),默认为"article"\r\n3,最多显示分类条数,为0则显示该分类所有子分类,默认为0', '2009-05-11 11:50:43'),
(13, '取得指定分类产品列表(DIV+CSS)', 'product', '取得指定分类产品列表,列出内容：标题+图片+描述            ', '<ul class="selectProductByCategoryId">\r\n  <?php while($product = $result->getObject()):?>\r\n  <li><img src="<?=site_path("up_files/".$product->getCover())?>" width="<?=Tag::getInt(3,84,$agrs)?>" height="<?=Tag::getInt(4,58,$agrs)?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" />\r\n    <h1>\r\n      <?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?>\r\n    </h1>\r\n    <p>\r\n      <?=$product->getBrief(Tag::getInt(6,30,$agrs))?>\r\n    </p>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420129114769.jpg', 'Tag::selectProductByCategoryId', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认84px\r\n5,图片高度，默认58px\r\n6,标题显示字数，默认12字\r\n7,描述文章字数，默认30字\r\n8,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:03:59'),
(14, '取得最新产品列表(DIV+CSS)', 'product', '取得最新产品列表,列出内容：标题+图片+描述        ', '<ul class="selectProductByCategoryId">\r\n  <?php while($product = $result->getObject()):?>\r\n  <li><img src="<?=site_path("up_files/".$product->getCover())?>" width="<?=Tag::getInt(3,84,$agrs)?>" height="<?=Tag::getInt(4,58,$agrs)?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" />\r\n    <h1>\r\n      <?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?>\r\n    </h1>\r\n    <p>\r\n      <?=$product->getBrief(Tag::getInt(6,30,$agrs))?>\r\n    </p>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420129114769.jpg', 'Tag::selectProductByTypeStr', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认84px\r\n5,图片高度，默认58px\r\n6,标题显示字数，默认12字\r\n7,描述文章字数，默认30字\r\n8,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:04:14'),
(15, '取得热点产品列表(DIV+CSS)', 'product', '取得热点产品列表,列出内容：标题+图片+描述     ', '<ul class="selectProductByCategoryId">\r\n  <?php while($product = $result->getObject()):?>\r\n  <li><img src="<?=site_path("up_files/".$product->getCover())?>" width="<?=Tag::getInt(3,84,$agrs)?>" height="<?=Tag::getInt(4,58,$agrs)?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" />\r\n    <h1>\r\n      <?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?>\r\n    </h1>\r\n    <p>\r\n      <?=$product->getBrief(Tag::getInt(6,30,$agrs))?>\r\n    </p>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420129114769.jpg', 'Tag::selectProductHotByTypeStr', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认84px\r\n5,图片高度，默认58px\r\n6,标题显示字数，默认12字\r\n7,描述文章字数，默认30字\r\n8,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:04:22'),
(16, '取得置顶产品列表(DIV+CSS)', 'product', '取得置顶产品列表,列出内容：标题+图片+描述                   ', '<ul class="selectProductByCategoryId">\r\n  <?php while($product = $result->getObject()):?>\r\n  <li><img src="<?=site_path("up_files/".$product->getCover())?>" width="<?=Tag::getInt(3,84,$agrs)?>" height="<?=Tag::getInt(4,58,$agrs)?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" />\r\n    <h1>\r\n      <?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?>\r\n    </h1>\r\n    <p>\r\n      <?=$product->getBrief(Tag::getInt(6,30,$agrs))?>\r\n    </p>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420129114769.jpg', 'Tag::selectProductTopByTypeStr', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认84px\r\n5,图片高度，默认58px\r\n6,标题显示字数，默认12字\r\n7,描述文章字数，默认30字\r\n8,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:04:27'),
(17, '取得指定分类产品列表(DIV+CSS)', 'product', '取得指定分类产品列表，列出标题+图片                              ', '<ul class="selectProductWithImgAndSubjectByCategoryId">\r\n  <?php while($product = $result->getObject()):?>\r\n  <li><img src="<?=site_path("up_files/".$product->getCover())?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" width="<?=Tag::getInt(3,114,$agrs)?>" height="<?=Tag::getInt(4,92,$agrs)?>" alt="<?=$product->getSubject()?>"/>\r\n    <h1>\r\n      <?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,6,$agrs)),array(''target''=>Tag::getChar(6,''_blank'',$agrs)))?>\r\n    </h1>\r\n  </li>\r\n  <?php endwhile;?>\r\n</ul>', '2009/05/12420225279539.png', 'Tag::selectProductByCategoryId', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认114px\r\n5,图片高度，默认92px\r\n6,标题显示字数，默认6字\r\n7,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:15:29'),
(18, '取得置顶产品列表(DIV+CSS)', 'product', '取得置顶产品列表，列出标题          ', '  <?php while($product = $result->getObject()):?>\r\n  <li><?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?></li>\r\n  <?php endwhile;?>', '2009/05/12420130085571.png', 'Tag::selectProductTopByTypeStr', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,标题显示字数，默认12字\r\n5,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:21:11'),
(19, '取得指定分类产品列表(TABLE)', 'product', '取得指定分类产品列表,列出内容：标题+图片+描述          ', '<?php while($product = $result->getObject()):?>\r\n<tr>\r\n  <td width="11%" rowspan="2" align="center"><img src="<?=site_path("up_files/".$product->getCover())?>" width="<?=Tag::getInt(3,84,$agrs)?>" height="<?=Tag::getInt(4,58,$agrs)?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" /></td>\r\n  <td width="89%"><?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?></td>\r\n</tr>\r\n<tr>\r\n  <td height="79" valign="top"><?=$product->getBrief(Tag::getInt(6,30,$agrs))?></td>\r\n</tr>\r\n<?php endwhile;?>', '2009/05/12420234483611.png', 'Tag::selectProductByCategoryId', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认84px\r\n5,图片高度，默认58px\r\n6,标题显示字数，默认12字\r\n7,描述文章字数，默认30字\r\n8,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:30:50'),
(20, '取得置顶产品列表(TABLE)', 'product', '取得置顶产品列表,列出：标题+图片+描述          ', '<?php while($product = $result->getObject()):?>\r\n<tr>\r\n  <td width="11%" rowspan="2" align="center"><img src="<?=site_path("up_files/".$product->getCover())?>" width="<?=Tag::getInt(3,84,$agrs)?>" height="<?=Tag::getInt(4,58,$agrs)?>" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" /></td>\r\n  <td width="89%"><?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(Tag::getInt(5,12,$agrs)),array(''target''=>Tag::getChar(7,''_blank'',$agrs)))?></td>\r\n</tr>\r\n<tr>\r\n  <td height="79" valign="top"><?=$product->getBrief(Tag::getInt(6,30,$agrs))?></td>\r\n</tr>\r\n<?php endwhile;?>', '2009/05/12420234483611.png', 'Tag::selectProductTopByTypeStr', '1,模板编号，系统自动产生\r\n2,分类ID,默认为0（显示所有分类）\r\n3,最大显示个数，默认为5\r\n4,图片宽度，默认84px\r\n5,图片高度，默认58px\r\n6,标题显示字数，默认12字\r\n7,描述文章字数，默认30字\r\n8,连接打开位置，默认_blank（新窗口打开）', '2009-05-11 14:33:57'),
(21, '产品列表页面产品列表（DIV+CSS）', 'product', '产品列表页面产品列表,本标签只能在产品列表页面使用                    ', '<?php while($product = $pager->getObject()):?>\r\n<ul class="product_category_list">\r\n  <li><a href="<?=site_url("product/show/type/".$product->getTypeStr()."/id/".$product->getId())?>"><img src="<?=site_path("up_files/".$product->getCover())?>" alt="<?=$product->getSubject()?>" width="120" height="100" border="0" boder="0" onerror="this.src=''<?=site_path("images/admin/nopic.png")?>''" /></a> </li>\r\n  <li>\r\n    <h1>\r\n      <?=link_to("product/show/type/".$product->getTypeStr()."/id/".$product->getId(),$product->getSubject(20))?>\r\n    </h1>\r\n    <?=$product->getBrief(30)?>\r\n  </li>\r\n</ul>\r\n<?php endwhile;?>', NULL, 'Tag::output', '1,模板编号，系统自动生成', '2009-05-11 15:49:40');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` tinyint(3) unsigned NOT NULL DEFAULT '3' COMMENT '用户所属权限组',
  `user_name` varchar(20) DEFAULT NULL COMMENT '用户登录名',
  `user_username` varchar(50) DEFAULT NULL COMMENT '用户名称',
  `user_password` varchar(45) DEFAULT NULL,
  `login_num` int(15) DEFAULT '0' COMMENT '登录总次数',
  `lastlogin_at` datetime DEFAULT NULL COMMENT '最后登录时间',
  `created_at` datetime DEFAULT NULL COMMENT '用户创建时间',
  `updated_at` datetime DEFAULT NULL,
  `user_ip` varchar(16) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL COMMENT '用户电子邮件',
  `first_question` varchar(20) DEFAULT NULL,
  `first_answer` varchar(100) DEFAULT NULL,
  `second_question` varchar(20) DEFAULT NULL,
  `second_answer` varchar(100) DEFAULT NULL,
  `is_lock` int(1) NOT NULL DEFAULT '0' COMMENT '是否通过审核',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='后台管理用户';

--
-- 导出表中的数据 `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `user_name`, `user_username`, `user_password`, `login_num`, `lastlogin_at`, `created_at`, `updated_at`, `user_ip`, `user_email`, `first_question`, `first_answer`, `second_question`, `second_answer`, `is_lock`) VALUES
(255, 1, 'super', 'super', '5ee086bf7231be4dc788046d4a0fc233:dbe', 22, '2009-05-03 22:05:42', NULL, '2009-04-08 21:40:36', '127.0.0.1', 'meetcd@126.com', NULL, NULL, NULL, NULL, 1),
(256, 2, 'admin', 'admin', 'e85de916711a78e8c58867dceee792d1:cea', 1, '2009-04-12 17:38:49', NULL, '2009-04-08 21:41:06', '127.0.0.1', 'meetcd@126.com', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `user_groups`
--

INSERT INTO `user_groups` (`id`, `user_group_name`) VALUES
(1, '开发管理员'),
(2, '系统管理员'),
(3, '注册会员');
