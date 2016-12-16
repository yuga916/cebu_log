-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016 年 12 月 16 日 11:57
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
(7, 9),
(7, 8);

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `m_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(7, 'セブ太郎', 'cebu@cebu', '2b1f38cecb14afb54f03164edffab1440ed534a6', 'uploads/users/e832502399967ce9cca87235d31eccab.jpg', 'デブカツ中！！！！！', '2016-12-16 11:21:59', '2016-12-16 03:14:26'),
(8, 'セブ子', 'cebuko@cebu', 'ba99bd477ebd3c6c83c22c11e8863852b1cc381c', 'uploads/users/d19a7ea4272298bc053b70604553e2d4.jpg', '', '2016-12-16 11:23:29', '2016-12-16 02:23:29'),
(9, 'cebu', 'ilove@cebu', '67240f9378cb227306ce5c01dd847131876efb3b', 'uploads/users/d191356ffde74ea05811cf4bcab52a9e.jpg', '', '2016-12-16 11:25:43', '2016-12-16 02:25:43');

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
(74, 7, 0, 3, '20161216102740nobushi-1s.jpg', '2016-12-16 11:27:40', '2016-12-16 02:46:04'),
(75, 8, 1, 3, '20161216103016nobushi12f.jpg', '2016-12-16 11:30:17', '2016-12-16 02:46:10'),
(76, 9, 1, 3, '20161216103130nobushi17f.jpg', '2016-12-16 11:31:30', '2016-12-16 02:46:13'),
(77, 7, 1, 2, '20161216103204PB040139-1f.jpg', '2016-12-16 11:32:04', '2016-12-16 02:46:16'),
(78, 8, 0, 2, '20161216103234PB040133-1s.jpg', '2016-12-16 11:32:34', '2016-12-16 02:46:19'),
(79, 9, 1, 2, '20161216103338PB040142-1f.jpg', '2016-12-16 11:33:38', '2016-12-16 02:46:22'),
(80, 7, 1, 1, '20161216103405acacia-steak21f.jpg', '2016-12-16 11:34:05', '2016-12-16 02:46:27'),
(81, 8, 0, 1, '20161216103420acacia-steak4s.jpg', '2016-12-16 11:34:20', '2016-12-16 02:46:29'),
(82, 9, 0, 1, '20161216103437acacia-steak5s.jpg', '2016-12-16 11:34:37', '2016-12-16 02:46:32'),
(83, 7, 0, 1, '20161216103859acacia-steak6s.jpg', '2016-12-16 11:38:59', '2016-12-16 02:46:34'),
(84, 8, 0, 1, '20161216103914acacia-steak9s.jpg', '2016-12-16 11:39:14', '2016-12-16 02:46:36'),
(85, 9, 1, 1, '20161216103944acacia-steak20f.jpg', '2016-12-16 11:39:44', '2016-12-16 02:46:39'),
(86, 7, 1, 1, '20161216104004acacia-steak18f.jpg', '2016-12-16 11:40:04', '2016-12-16 02:46:41'),
(87, 8, 1, 1, '20161216104020acacia-steak22f.jpg', '2016-12-16 11:40:20', '2016-12-16 02:46:44'),
(88, 9, 1, 1, '20161216104033acacia-steak23f.jpg', '2016-12-16 11:40:33', '2016-12-16 02:46:46'),
(89, 7, 1, 1, '20161216104050acacia-steak25f.jpg', '2016-12-16 11:40:50', '2016-12-16 02:46:49'),
(90, 8, 1, 1, '20161216104107saladf.jpg', '2016-12-16 11:41:07', '2016-12-16 02:46:53'),
(91, 9, 0, 1, '20161216104121acacia-steak27s.jpg', '2016-12-16 11:41:21', '2016-12-16 02:46:55'),
(92, 7, 0, 2, '20161216104143PB040134-1s.jpg', '2016-12-16 11:41:43', '2016-12-16 02:46:57'),
(93, 8, 0, 2, '20161216104200PB040135-1s.jpg', '2016-12-16 11:42:00', '2016-12-16 02:47:00'),
(94, 9, 0, 2, '20161216104219PB040147-1s.jpg', '2016-12-16 11:42:19', '2016-12-16 02:47:02'),
(95, 7, 0, 2, '20161216104236PB040146-1s.jpg', '2016-12-16 11:42:36', '2016-12-16 02:47:04'),
(96, 8, 0, 2, '20161216104300PB040145-1s.jpg', '2016-12-16 11:43:00', '2016-12-16 02:47:06'),
(97, 7, 1, 2, '20161216104324PB040139-1f.jpg', '2016-12-16 11:43:24', '2016-12-16 02:47:08'),
(98, 9, 1, 2, '20161216104340PB040140-1f.jpg', '2016-12-16 11:43:40', '2016-12-16 02:47:10'),
(99, 1, 1, 2, '20161216104356PB040141-1f.jpg', '2016-12-16 11:43:56', '2016-12-16 02:43:56'),
(100, 1, 1, 3, '20161216104517nobushi15f.jpg', '2016-12-16 11:45:17', '2016-12-16 02:45:17'),
(101, 1, 1, 3, '20161216104534nobushi14f.jpg', '2016-12-16 11:45:34', '2016-12-16 02:45:34'),
(102, 9, 1, 1, '20161216110320acacia-steak23f.jpg', '2016-12-16 12:03:20', '2016-12-16 03:03:20'),
(103, 8, 1, 2, '20161216110951PB040151-1f.jpg', '2016-12-16 12:09:51', '2016-12-16 03:09:51'),
(104, 9, 1, 2, '20161216111146PB040152-1f.jpg', '2016-12-16 12:11:46', '2016-12-16 03:11:46'),
(105, 7, 1, 2, '20161216111254PB040144-1f.jpg', '2016-12-16 12:12:54', '2016-12-16 03:12:54');

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
(1, 'ACACIA STEAKHOUSE', '日本人はおそらく誰も知らないであろう隠れ家的レストランを発見しました！それもそのはず、お店がある場所がすごいところなんです…。本当にこんなところにステーキハウスが？と正直ハラハラしました。\\n\\nですが、到着してみるとかなりオシャレなレストランが！お肉のお値段は高いですが、その他はそこまで高くありません。しかも味がどれも本当に美味しい！\\n\\nここは知っていると自慢できるレストランです。そんなレストランを俺セブでは惜しみもなくご紹介したいと思います！', 1, 10.32737446017098, 123.9061689376831, '2016-12-15 11:29:16', '2016-12-15 05:28:47'),
(2, 'Micky’s cafe', 'セブのケーキは正直言って美味しくない…。これは日本人誰もが抱える悩みかと思われます。パサパサのスポンジ、べっとりと歯にこびりつくクリーム、カッチコチのホイップクリーム。\\n\\n本当に残念です。特にボスコーヒーやチベットコーヒーで売っているケーキは美味しくないですよね。\\n\\n前回はセブで美味しいケーキが食べれるお店として、『FUJINOYA』をご紹介したかと思います。\\n\\nFUJINOYAはJYスクエア近く、徒歩3分ほどにあるところです。', 1, 10.32762778063376, 123.89818668365479, '2016-12-15 11:29:49', '2016-12-15 05:33:13'),
(3, 'らーめん野武士', '数々のラーメン店がセブに軒を連ね、そして静かにその闘魂を燃やしています。最近のセブのラーメン進出は尋常じゃありませんね。どんどん日本の素晴らしいラーメンがセブに店舗を構え、フィリピン人をそして日本人をも驚かせています。\\n\\nそんな数あるラーメン店の中でも、今回は今年の4月にオープンしたばかりの『らーめん野武士』へ行ってきました。らーめん野武士の特徴はなんといっても濃厚な豚骨スープが売り！そしてそのスープはなんと20時間丁寧に煮込まれているそうです。\\n\\nそして強いコシの細麺。まだ食べたことがないっていう方はこの記事を読んで、一度足を運んでみてください。', 1, 10.32737446017098, 123.9061689376831, '2016-12-15 12:56:43', '2016-12-15 13:25:16');

-- --------------------------------------------------------

--
-- テーブルの構造 `sid_picpath`
--

CREATE TABLE `sid_picpath` (
  `s_id` int(11) NOT NULL,
  `shop_picture_path` varchar(255) CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(59, '美味しい', 1, '102', 1, 9, '2016-12-16 12:03:20', '2016-12-16 03:03:20'),
(60, '美味しーーーーい！！', 1, '103', 2, 8, '2016-12-16 12:09:51', '2016-12-16 03:09:51'),
(61, 'たべたーーい', 1, '104', 2, 9, '2016-12-16 12:11:46', '2016-12-16 03:11:46'),
(62, 'うまい', 1, '105', 2, 7, '2016-12-16 12:12:54', '2016-12-16 03:12:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `tweet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
