-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016 年 12 月 15 日 12:13
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
(6, 1);

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
(6, 16);

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
(5, 'daitest2', 'dai@test', '4baa00eb2d6e5ee99021e05c660c847d79da01ad', 'uploads/users/157cb0eac4f44e41e4712d6fd97aaac0.png', '', '2016-12-14 11:46:56', '2016-12-14 02:46:56'),
(6, 'diedie', 'die@die', '59615f3644fd643f5d95962ae8204c05e8144266', 'uploads/users/e92356d3a1283346f4d7d4a474ffc8a6.jpg', '', '2016-12-15 11:32:08', '2016-12-15 02:32:08');

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
(70, 1, 0, 17, '20161215103023dai_food.png', '2016-12-15 11:30:23', '2016-12-15 02:30:23'),
(71, 1, 1, 16, '20161215103044movie.png', '2016-12-15 11:30:44', '2016-12-15 02:30:44');

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
(16, 'orange', 'おいしい', 1, 10.32737446017098, 123.9061689376831, '2016-12-15 11:29:16', '2016-12-15 02:29:16'),
(17, 'red', 'oiiiiiii', 1, 10.32762778063376, 123.89818668365479, '2016-12-15 11:29:49', '2016-12-15 02:29:49'),
(18, 'test_adddd', 'dddddddddddddddddddd', 1, 10.32737446017098, 123.9061689376831, '2016-12-15 12:56:43', '2016-12-15 03:56:43');

-- --------------------------------------------------------

--
-- テーブルの構造 `sid_picpath`
--

CREATE TABLE `sid_picpath` (
  `s_id` int(11) NOT NULL,
  `shop_picture_path` varchar(255) CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `sid_picpath`
--

INSERT INTO `sid_picpath` (`s_id`, `shop_picture_path`) VALUES
(16, '20161215103044movie.png'),
(17, '20161215103023dai_food.png'),
(18, '');

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
(56, 'fnao', 1, '70', 17, 1, '2016-12-15 11:30:23', '2016-12-15 02:30:23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
