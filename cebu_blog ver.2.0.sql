-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016 年 12 月 14 日 11:43
-- サーバのバージョン： 5.6.34
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cebu_blog`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `access_ranking`
--

CREATE TABLE `access_ranking` (
  `m_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `categoly`
--

CREATE TABLE `categoly` (
  `categoly_id` int(11) NOT NULL,
  `categoly` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `categoly`
--

INSERT INTO `categoly` (`categoly_id`, `categoly`) VALUES
(0, 'お店'),
(1, '食べ物'),
(2, 'その他');

-- --------------------------------------------------------

--
-- テーブルの構造 `followings`
--

CREATE TABLE `followings` (
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `followings`
--

INSERT INTO `followings` (`follower_id`, `following_id`) VALUES
(5, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `m_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`m_id`, `s_id`) VALUES
(5, 11);

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `m_intro` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会員情報のテーブル';

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `nick_name`, `email`, `password`, `picture_path`, `m_intro`, `created`, `modified`) VALUES
(1, 'dai', 'dai@dai', '4baa00eb2d6e5ee99021e05c660c847d79da01ad', 'uploads/users/4093156c35f6f3e0c45a6b7441ff3301.jpg', 'うぇいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいいい', '2016-12-13 23:40:51', '2016-12-14 01:45:41'),
(5, 'daitest2', 'dai@test', '4baa00eb2d6e5ee99021e05c660c847d79da01ad', 'uploads/users/157cb0eac4f44e41e4712d6fd97aaac0.png', '', '2016-12-14 11:46:56', '2016-12-14 02:46:56');

-- --------------------------------------------------------

--
-- テーブルの構造 `pictures`
--

CREATE TABLE `pictures` (
  `picture_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `categoly` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `shop_picture_path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `pictures`
--

INSERT INTO `pictures` (`picture_id`, `owner_id`, `categoly`, `s_id`, `shop_picture_path`, `created`, `modified`) VALUES
(49, 1, 1, 4, '20161213224649dai_food.png', '2016-12-13 23:46:49', '2016-12-13 14:46:49'),
(50, 1, 0, 4, '20161213225558sho_dai.jpg', '2016-12-13 23:55:58', '2016-12-13 14:55:58'),
(51, 0, 1, 4, '20161213225813ppppiiiii.jpg', '2016-12-13 23:58:13', '2016-12-13 14:58:13'),
(52, 0, 2, 4, '20161213230013others_test.jpg', '2016-12-14 00:00:13', '2016-12-13 15:00:13'),
(53, 1, 1, 11, '20161214100949ppppiiiii.jpg', '2016-12-14 11:09:49', '2016-12-14 02:09:49'),
(54, 1, 1, 11, '20161214100949ppppiiiii.jpg', '2016-12-14 11:11:13', '2016-12-14 02:11:13'),
(55, 1, 1, 11, '20161214101135okinawa.jpg', '2016-12-14 11:11:35', '2016-12-14 02:11:35'),
(56, 1, 1, 11, '20161214101208okinawa.jpg', '2016-12-14 11:12:08', '2016-12-14 02:12:08'),
(57, 1, 1, 11, '20161214101225okinawa.jpg', '2016-12-14 11:12:25', '2016-12-14 02:12:25'),
(58, 1, 1, 11, '20161214101237okinawa.jpg', '2016-12-14 11:12:37', '2016-12-14 02:12:37'),
(59, 4, 0, 11, '', '2016-12-14 11:34:55', '2016-12-14 02:34:55'),
(60, 5, 1, 11, '', '2016-12-14 11:49:11', '2016-12-14 02:49:11'),
(61, 5, 0, 11, '20161214105056ppppiiiii.jpg', '2016-12-14 11:50:56', '2016-12-14 02:50:56'),
(62, 5, 0, 11, '20161214105145hot_spring.png', '2016-12-14 11:51:45', '2016-12-14 02:51:45'),
(63, 5, 0, 11, '20161214105214okinawa.jpg', '2016-12-14 11:52:14', '2016-12-14 02:52:14'),
(64, 5, 2, 11, '20161214105405movie.png', '2016-12-14 11:54:05', '2016-12-14 02:54:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(11) NOT NULL,
  `shop_name` text NOT NULL,
  `shop_intro` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `shop_lat` double NOT NULL,
  `shop_lng` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `shops`
--

INSERT INTO `shops` (`shop_id`, `shop_name`, `shop_intro`, `owner_id`, `shop_lat`, `shop_lng`, `created`, `modified`) VALUES
(4, 'orange', 'おいしい', 1, 10.32928491362645, 123.90283226966858, '2016-12-13 23:43:41', '2016-12-14 01:45:49'),
(5, 'test5', 'tet', 1, 10.32737446017098, 123.9061689376831, '2016-12-14 10:59:49', '2016-12-14 01:59:49'),
(6, 'teteeetteete6', 'ubayubfdu9a', 1, 10.32735335012319, 123.9061689376831, '2016-12-14 11:01:33', '2016-12-14 02:01:33'),
(7, 'teteeetteete6', 'ubayubfdu9a', 1, 10.32735335012319, 123.9061689376831, '2016-12-14 11:02:53', '2016-12-14 02:02:53'),
(8, 'teteeetteete6', 'ubayubfdu9a', 1, 10.32735335012319, 123.9061689376831, '2016-12-14 11:02:54', '2016-12-14 02:02:54'),
(9, 'teteeetteete6', 'ubayubfdu9a', 1, 10.32735335012319, 123.9061689376831, '2016-12-14 11:02:54', '2016-12-14 02:02:54'),
(10, 'teteeetteete6', 'ubayubfdu9a', 1, 10.32735335012319, 123.9061689376831, '2016-12-14 11:03:26', '2016-12-14 02:03:26'),
(11, 'test11', '11', 1, 10.32737446017098, 123.9061689376831, '2016-12-14 11:04:17', '2016-12-14 02:04:17');

-- --------------------------------------------------------

--
-- テーブルの構造 `tweets`
--

CREATE TABLE `tweets` (
  `tweet_id` int(11) NOT NULL,
  `tweet` text NOT NULL,
  `reply_tweet_id` int(11) NOT NULL,
  `picture_id` varchar(255) NOT NULL,
  `s_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tweets`
--

INSERT INTO `tweets` (`tweet_id`, `tweet`, `reply_tweet_id`, `picture_id`, `s_id`, `m_id`, `created`, `modified`) VALUES
(40, 'test', 1, '51', 4, 1, '2016-12-13 23:58:13', '2016-12-14 01:45:55'),
(41, 'test2', 1, '52', 4, 1, '2016-12-14 00:00:13', '2016-12-14 01:45:58'),
(42, 'test2', 1, '52', 4, 1, '2016-12-14 01:03:17', '2016-12-14 01:46:05'),
(43, 'test11_fzfhouefbhubufb', 1, '59', 11, 1, '2016-12-14 11:34:55', '2016-12-14 02:56:46'),
(44, 'test_12bvaiuboa', 1, '60', 11, 5, '2016-12-14 11:49:11', '2016-12-14 02:49:11'),
(45, 'fbuiauerfbao', 1, '61', 11, 5, '2016-12-14 11:50:56', '2016-12-14 02:50:56'),
(46, 'fbuiauerfbao', 1, '61', 11, 5, '2016-12-14 11:51:24', '2016-12-14 02:51:24'),
(47, 'fbuiauerfbao', 1, '61', 11, 5, '2016-12-14 11:51:27', '2016-12-14 02:51:27'),
(48, 'fbuiauerfbao', 1, '61', 11, 5, '2016-12-14 11:51:27', '2016-12-14 02:51:27'),
(49, 'rnguaonrpainp', 1, '62', 11, 5, '2016-12-14 11:51:45', '2016-12-14 02:51:45'),
(50, 'p', 1, '63', 11, 5, '2016-12-14 11:52:14', '2016-12-14 02:52:14'),
(51, 'o', 1, '64', 11, 5, '2016-12-14 11:54:05', '2016-12-14 02:54:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoly`
--
ALTER TABLE `categoly`
  ADD PRIMARY KEY (`categoly_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`tweet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
