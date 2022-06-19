-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2022 at 09:59 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gshbpcmx_bookselling`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_master`
--

CREATE TABLE `tbl_address_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `rname` varchar(100) NOT NULL,
  `addressline` varchar(200) NOT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `con` timestamp NOT NULL DEFAULT current_timestamp(),
  `upon` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address_master`
--

INSERT INTO `tbl_address_master` (`id`, `cid`, `rname`, `addressline`, `pin_code`, `city`, `state`, `mobile`, `con`, `upon`) VALUES
(1, 406, 'Gaurav', '                   \r\n                 road no 2', '825413', 'Gurio', 'Jharkhand', '7903562598', '2021-02-12 10:52:22', '2021-02-12 03:41:41'),
(2, 404, 'rename', 'lalhj', '834001', 'Lalpur (Ranchi)', 'Jharkhand', '7004417126', '2021-02-12 10:58:06', '2021-02-12 03:04:22'),
(3, 417, 'User', 'vill-kusumtoli,Chandwa,Latehara', '825413', 'Telaiya Dam', 'Jharkhand', '7479842376', '2021-02-25 14:28:45', '2021-02-25 19:58:45'),
(4, 436, 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', '2021-03-05 14:29:31', '2021-03-05 19:59:31'),
(5, 441, 'Lokesh', '                   \r\n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', '2021-03-06 03:46:49', '2021-03-06 09:16:49'),
(6, 459, 'Sheetal kumar Sahu ', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', '2021-03-07 09:16:32', '2021-03-07 14:46:32'),
(7, 462, 'Mransari', '                   \r\n                 ', '496001', 'Raigarh', 'Chattisgarh', '7047642451', '2021-03-14 04:27:08', '2021-03-14 09:57:08'),
(8, 463, 'Umashankar', '                   \r\n                 Fathamuda jutemile  durga\r\n', '496001', 'Raigarh Jute Mill', 'Chattisgarh', '7224904852', '2021-03-15 12:42:08', '2021-03-15 18:12:08'),
(9, 484, 'Taruna Shashibhushan', 'Om sai dharam khanta ke samne ela mall ke pas raigarh chattisgarh ', '496001', 'Raigarh', 'Chattisgarh', '9329268892', '2021-04-19 05:50:43', '2021-04-19 11:20:43'),
(10, 486, 'Sanjeet choudhary', '                 Kotra roade jai hind gali  \r\n                 ', '496001', 'Bangursiya', 'Chattisgarh', '8962587197', '2021-05-09 14:58:55', '2021-05-09 20:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_master`
--

CREATE TABLE `tbl_admin_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_master`
--

INSERT INTO `tbl_admin_master` (`id`, `name`, `password`, `mobile`, `email`, `image`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'Suraj Kumar Chauhan', '202cb962ac59075b964b07152d234b70', '7004417126', 'admin@gmail.com', '60378e917f328.jpeg', 'self', '2020-01-31 01:12:33', 'Suraj Kumar', '2021-02-25 17:23:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_master`
--

CREATE TABLE `tbl_banner_master` (
  `id` int(11) NOT NULL,
  `banner` varchar(500) NOT NULL,
  `line1` varchar(250) NOT NULL,
  `line2` varchar(250) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner_master`
--

INSERT INTO `tbl_banner_master` (`id`, `banner`, `line1`, `line2`, `con`) VALUES
(1, '60421a1067bd5.jpeg', '', '', '2021-02-25 15:37:55'),
(2, '60421a1595f52.jpeg', '', '', '2021-02-25 15:38:27'),
(3, '60421a1bc925e.jpeg', '', '', '2021-02-25 15:38:27'),
(4, '60421ed5852eb.jpeg', '', '', '2021-02-25 15:38:27'),
(5, '60438e75644e8.jpeg', '', '', '2021-02-25 15:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_master`
--

CREATE TABLE `tbl_category_master` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_master`
--

INSERT INTO `tbl_category_master` (`id`, `unit_id`, `name`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 3, 'Book', 'admin', '2021-02-16 03:34:02', NULL, '2021-03-11 16:01:37', '1'),
(2, 1, 'Mobile', 'admin', '2021-02-18 00:34:28', NULL, '2021-02-18 05:30:41', '1'),
(3, 2, 'Shoes', 'admin', '2021-02-18 00:36:10', 'admin@gmail.com', '2021-02-20 02:56:06', '1'),
(4, 1, 'jeans', 'admin@gmail.com', '2021-02-23 15:28:01', NULL, NULL, '1'),
(5, 4, 'Vegetables 7987844241', 'admin@gmail.com', '2021-03-05 07:20:56', 'admin@gmail.com', '2021-03-11 16:21:53', '1'),
(6, 4, 'Fruits 7987844241', 'admin@gmail.com', '2021-03-05 07:23:21', NULL, '2021-03-11 16:03:12', '1'),
(7, 1, 'Milk 7987844241', 'admin@gmail.com', '2021-03-05 07:23:50', 'admin@gmail.com', '2021-03-05 07:29:24', '1'),
(9, 5, 'Kela/banana 7987844241', 'admin@gmail.com', '2021-03-11 20:33:25', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_master`
--

CREATE TABLE `tbl_contact_master` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `status` enum('unseen','seen','replied','') NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_master`
--

INSERT INTO `tbl_contact_master` (`id`, `name`, `email`, `mobile`, `msg`, `status`, `con`) VALUES
(25, 'Gaurav Kumar', 'gauravsbs2@gmail.com', '7903562598', 'ewrstytrdesdwadsergfhj', 'seen', '2021-02-24 19:30:17'),
(26, 'Gautam', 'ga@ns.com', '6478944478', 'ndnddn', 'seen', '2021-02-24 23:09:39'),
(27, 'test', 'g.official.pro@gmail.com', '7766044811', 'ejnc', 'seen', '2021-02-24 23:09:56'),
(28, 'testt', 'mehtapriyanka435@gmail.com', '7531030143', 'ecrv', 'seen', '2021-02-24 23:10:10'),
(29, 'eff', 'ee@ee.com', '5674895437', 'debrt', 'seen', '2021-02-24 23:10:32'),
(30, 'Gaurav Kumar', 'gauravsbs2@gmail.com', '7903562598', 'rfgbhnj', 'seen', '2021-02-24 23:11:05'),
(31, 'Gaurav Kumar', 'gauravsbs2@gmail.com', '7903562598', 'yhuji', 'seen', '2021-02-24 23:11:13'),
(32, 'PK CHAUAHN', 'parmanjan@gmail.com', '9835166945', 'Heartly congratulations my dear,Keep up ,grow to the high..Best wises for your best journey', 'seen', '2021-02-27 11:44:38'),
(33, 'Gaurav ', 'stethsaurav@gmail.com', '7902562598', 'It\'s testing now ', 'seen', '2021-03-06 15:54:27'),
(34, 'Gaurav Kumar', 'gauravsbs2@gmail.com', '7903562598', 'test', 'seen', '2021-03-09 09:34:53'),
(35, 'Taruna Shashibhushan', 'shashibhushanmahendra1995@gmail.com', '9329268892', 'Sabji ka price kyu nai pta chal rha h ', 'unseen', '2021-04-19 11:23:22'),
(36, 'Radheshyam Nishad', 'radhenishad07@gmail.com', '9098149200', 'All vagitables need', 'unseen', '2021-04-27 06:07:08'),
(37, 'Donaldwem', 'no-replyHeX@gmail.com', '88426875226', 'Hi!  raigarhbazar.in \r\n \r\nDid you know that it is possible to send letter   legitimate way? \r\nWe suggest a new way of sending request through contact forms. Such forms are located on many sites. \r\nWhen such letters are sent, no personal data is used,', 'unseen', '2021-05-03 08:41:51'),
(38, 'Mike Paterson\r\n', 'no-reply@google.com', '89246212696', 'Good Day \r\n \r\nI have just analyzed  raigarhbazar.in for its SEO Trend and saw that your website could use a boost. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports a', 'unseen', '2021-05-11 06:57:00'),
(39, 'Mazlan Selvi', 'no-replyHexadolo@gmail.com', '84435576318', 'Dear Friend, \r\n \r\nMy names are Mr. Mezlan Selvi, a lawyer base in Kuala Lumpur - Malaysia. I have previously sent you an email regarding a transaction of US$13.5 Million left behind by my late client before his tragic death but no response from you. ', 'unseen', '2021-05-14 01:20:31'),
(40, 'Yahoo', 'press@yahoo.com', '84918245523', 'Most profitable cryptocurrency miners has been released : \r\nDBT Miner: $7,500 (Bitcoin), $13,000 (Litecoin), $13,000 (Ethereum), and $15,000 (Monero) \r\n \r\nGBT Miner: $22,500 (Bitcoin), $39,000 (Litecoin), $37,000 (Ethereum), and $45,000 (Monero) \r\nRe', 'unseen', '2021-05-20 11:04:17'),
(41, 'Sambo Dasuki', 'mmzxxz288@gmail.com', '84246938363', 'Dear Partner; \r\n \r\nI came across your email contact on Database; Where i was searching for a competent Partner who can handle a lucrative business for me as trustee and manager. I anticipate to read from you soon so I can provide you with more detail', 'unseen', '2021-05-20 19:17:11'),
(42, 'Rajiv Michael', 'rajiindian3@gmail.com', '84794991123', 'Hello Dear, \r\n \r\nI am working directly with a private family portfolio that can provide funding for credible clients with feasible projects. Currently, we have investment funds for viable projects. \r\n \r\nThey are interested in the following: Instituti', 'unseen', '2021-05-26 04:34:01'),
(43, 'Mike Enderson\r\n', 'no-reply@google.com', '83929962114', 'Hi \r\n \r\nI have just verified your SEO on  raigarhbazar.in for its SEO Trend and saw that your website could use a push. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly repo', 'unseen', '2021-05-29 23:45:57'),
(44, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-121', 'My name’s Eric and I just found your site raigarhbazar.in.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE http://talkwithcustomer.com for a live demo now.\r\n\r\nTalk With Web Visi', 'unseen', '2021-06-20 06:15:19'),
(45, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-121', 'My name’s Eric and I just came across your website - raigarhbazar.in - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r', 'unseen', '2021-07-31 10:41:38'),
(46, 'David Song', 'noreply@googlemail.com', '81728841646', 'Dear Sir/Madam, \r\nThis is a consultancy and brokerage Firm specializing in Growth Financial Loan. We wish to invest in any viable Project presented by your Management after reviews on your Business Project Presentation Plan. We look forward to your S', 'unseen', '2021-08-14 02:09:38'),
(47, 'Donaldwem', 'no-replyHeX@gmail.com', '87449926879', 'Good day!  raigarhbazar.in \r\n \r\nDid you know that it is possible to send business offer absolutely lawfully? \r\nWe make available a new unique way of sending commercial offer through contact forms. Such forms are located on many sites. \r\nWhen such app', 'unseen', '2021-08-18 06:39:09'),
(48, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-121', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with raigarhbaza', 'unseen', '2021-08-24 10:37:40'),
(49, 'SEO X Press Digital Agency', 'no-replyHeX@gmail.com', '84293382396', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact you', 'unseen', '2021-08-24 13:36:39'),
(50, 'Mike Howard\r\n', 'christinefloyd7162@gmail.com\r\n', '89827747245', 'Hi there \r\n \r\nDo you want a quick boost in ranks and sales for your raigarhbazar.in website? \r\nHaving a high DA score, always helps \r\n \r\nGet your raigarhbazar.in to have a DA between 50 to 60 points in Moz with us today and rip the benefits of such a', 'unseen', '2021-08-28 06:02:34'),
(51, 'Mike Richards\r\n', 'no-replyHexadolo@gmail.com', '85666447851', 'Hello \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our pricelist here, we offer Local SEO at cheap rates. \r\nhttps:/', 'unseen', '2021-09-04 07:23:10'),
(52, 'Mike Day\r\n', 'no-replyHexadolo@gmail.com', '81534351351', 'Hello \r\n \r\nI have just took an in depth look on your  raigarhbazar.in for its SEO metrics and saw that your website could use a push. \r\n \r\nWe will increase your SEO metrics and ranks organically and safely, using only whitehat methods, while providin', 'unseen', '2021-09-11 03:12:21'),
(53, 'Eric Jones', 'eric.jones.z.mail@gmail.com', '555-555-121', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with raigarhbaza', 'unseen', '2021-10-07 15:55:46'),
(54, 'Mike Brickman\r\n', 'no-replyHexadolo@gmail.com', '89837613773', 'Hello \r\n \r\nWe all know the importance that dofollow link have on any website`s ranks. \r\nHaving most of your linkbase filled with nofollow ones is of no good for your ranks and SEO metrics. \r\n \r\nBuy quality dofollow links from us, that will impact you', 'unseen', '2021-10-07 22:27:15'),
(55, 'Jamesmor', 'no-replyHeX@gmail.com', '81571294755', 'Hello!  raigarhbazar.in \r\n \r\nWe propose \r\n \r\nSending your commercial proposal through the Contact us form which can be found on the sites in the Communication partition. Contact form are filled in by our software and the captcha is solved. The profit', 'unseen', '2021-10-08 17:13:16'),
(56, 'Mike Stanley\r\n', 'no-replyHexadolo@gmail.com', '83818418788', 'Greetings \r\n \r\nI have just verified your SEO on  raigarhbazar.in for  the current search visibility and saw that your website could use a boost. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, whil', 'unseen', '2021-10-09 02:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_cookies_master`
--

CREATE TABLE `tbl_customer_cookies_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cookie` varchar(70) NOT NULL,
  `cookie_pass` varchar(70) NOT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `status` enum('active','logout') NOT NULL DEFAULT 'active',
  `upon` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer_cookies_master`
--

INSERT INTO `tbl_customer_cookies_master` (`id`, `cid`, `cookie`, `cookie_pass`, `con`, `status`, `upon`) VALUES
(9, 404, 'd65aa89c27d66c5ac6d9dbef99ecc0de', 'b5d5ace29ce317edf9abbff9cbd7b612', '2021-02-11 04:07:32', 'logout', '2021-02-11 04:07:32'),
(10, 404, '2b33c2f7cf3d1d5304595e3b481560f2', 'da076bba51838597c4ad95367e2e316a', '2021-02-11 04:09:02', 'logout', '2021-02-11 04:11:20'),
(11, 404, 'fbc85dd76ca558ee3de648e258a8913f', 'f5c30c728d22e480de90c9e3e2a72618', '2021-02-11 04:11:25', 'active', NULL),
(12, 406, 'b9206cd8cfe3c2e826e244803696d18b', 'fc8d9708fe795cce3a8037558176cb34', '2021-02-11 04:15:59', 'active', NULL),
(13, 406, '358fa9fec917fbbf3e4de294e0b82455', '3ee3c80c88344d6f693a9e7fe2c68271', '2021-02-11 09:18:53', 'active', NULL),
(14, 406, 'dfef07d9a761436a8c87791cf08333d7', 'e592f9b9003dafcc60a8ba8acb4425c1', '2021-02-11 23:52:26', 'active', NULL),
(15, 404, 'c851fa85747d71fc141ec9103eecc4d7', 'b815720e770a45592ef13804a5919fcc', '2021-02-12 02:33:05', 'active', NULL),
(16, 406, '58ab61261337d26c588243783a7e0c5a', '0be57b9a999bc7f8b00d1f4314600590', '2021-02-13 23:14:04', 'logout', '2021-02-13 23:15:03'),
(17, 406, 'a32909dc34b3c96f451aec437e8d5d05', 'e00c8092689fa06a9973b50f5c491ce6', '2021-02-13 23:16:37', 'logout', '2021-02-13 23:22:32'),
(18, 406, 'f3631858e3a7b05f50459c10645b8cbb', '7ac69b734993f0f3e45a79ce81df94bf', '2021-02-13 23:27:09', 'logout', '2021-02-13 23:44:39'),
(19, 406, '0fcce1a586575bec28b8fd32428d68b1', 'e435c3188fb1b0f62261cd37b48eb314', '2021-02-13 23:48:42', 'active', NULL),
(20, 406, 'ad3117d495da542f486e446ffaad9b09', '439b087ca6344e7c342807f0b757d3c4', '2021-02-14 13:27:56', 'logout', '2021-02-14 17:02:33'),
(21, 406, 'a11381bd3a49bfcd75bcf76397699f55', '36f06bda2315eb1f80774786e4bbc387', '2021-02-14 20:47:26', 'logout', '2021-02-14 23:53:59'),
(22, 406, '299be0e2ee8487500230d8d73bfe3219', '6d894f49e1d12fc3dedcce0d795faa1d', '2021-02-14 23:56:57', 'logout', '2021-02-14 23:57:10'),
(23, 406, '17a0d3e46b434d83cd5e63325bc7a35c', '843953ed7f6ad370bd8e471b25eb3201', '2021-02-15 00:05:11', 'active', NULL),
(24, 406, 'f150a192e5ec56c7b18acaba861fb662', '7495b9309d3a3cae08d5633e86896b37', '2021-02-15 11:51:46', 'logout', '2021-02-15 12:17:08'),
(25, 406, '5e8aaf7e8bbdfb4465e8aec72a20c075', '1b9f17ed241668ee7ec23e1ca9fa43a4', '2021-02-15 12:19:32', 'active', NULL),
(26, 406, '0f6009bdda21fa51678a75dbf3b6bb4c', 'e71bb4905247d4c4338a9698ef99c3d5', '2021-02-16 10:30:24', 'active', NULL),
(27, 406, 'e4226a63a78eb66f2a7297e0c4cc9f42', '9504b1e6cf73fa66a4197b6e22cdb10c', '2021-02-17 02:21:08', 'logout', '2021-02-17 03:39:43'),
(28, 406, '233ee202002ec71ab04d87292917dce8', 'd7da13468d3d217aff0f21b7cb12d543', '2021-02-17 03:40:12', 'active', NULL),
(29, 406, 'e7410773f69f19d5639f973fc50a511c', 'ba4b651d9d2650f31ee8d453f691c75d', '2021-02-17 07:59:51', 'active', NULL),
(30, 406, 'bbbf7ff73f21035b1cacb4593d10a113', '4a0afcf9bdbff012fc74f421f1eed720', '2021-02-17 10:59:26', 'active', NULL),
(31, 406, '1974c72e0dbc011e5de8e245881b1322', '69e9e35743d19634eb0ffaa3c1d6fad1', '2021-02-18 00:50:15', 'active', NULL),
(32, 406, 'dc3397be270736c21eb9d79428d5173e', 'c48911124d67e6a1e37f343696ed0b90', '2021-02-18 10:01:11', 'active', NULL),
(33, 406, 'a8f069a26f5e491e6e8f3ac5a6deacb5', '0eae9ac421ec50ba818a8ccd5c04e0f5', '2021-02-18 19:36:59', 'active', NULL),
(34, 406, '63b5097a99c0a77cf09c192651f0c224', '6d1385e4fc8d8695c38b3961de863ed3', '2021-02-19 04:58:00', 'active', NULL),
(35, 406, 'fff675e264f9c5f08c6de3b17ea8244b', '7603ec6ef9678b62912618d8d39fd99e', '2021-02-19 09:03:33', 'active', NULL),
(36, 404, '4867032e66f08c8a7006c9aa7dc11341', '621607bdaf691f554913b5d490611a9d', '2021-02-21 11:29:36', 'active', NULL),
(37, 406, '7563eaaca6097a28c67265ee7d375fe6', '4af8c7f143a3a8164681488f261259a1', '2021-02-21 17:54:55', 'active', NULL),
(38, 406, '7b28a02456d12b50ed7c96b44e6b4769', '044284c968c853ef050ebcb429abdad4', '2021-02-21 17:56:15', 'active', NULL),
(39, 406, '6f7a71a5ad53478fc678a9ef00c96602', '61a4b9cff66463456ccd2d12eebe6c7d', '2021-02-21 17:59:17', 'active', NULL),
(40, 406, '5b8900599a19df7c510181a65f09144d', '22492ca1f4794d8ce0ff67e3eb09cc1b', '2021-02-22 00:09:05', 'active', NULL),
(41, 406, '0cd5a09dd4e59ccfc9a696291ed4585a', '1f079e410642472340771048408b8271', '2021-02-22 11:41:41', 'active', NULL),
(42, 406, 'ee37757a08f2c24153c0fc03285ccf6a', 'acd532aa3fca2c91b3f9f1aedfcd4aad', '2021-02-23 13:08:52', 'active', NULL),
(43, 406, 'ffc57c04b42a2ef6048df0a4bd7b5cb8', '34e08a4aa388c1bdd42028252822e481', '2021-02-23 13:17:30', 'active', NULL),
(44, 406, 'e5340fb48e643a929c8be74b903f041f', '8712ac53ba92c69158d8e34f5a21a6e8', '2021-02-23 13:51:48', 'active', NULL),
(45, 406, '7ffcd955201d311641e6f9f887e0aa5b', '6276db6bcfb76525e2d63de61e1a4cb0', '2021-02-23 13:51:55', 'active', NULL),
(46, 406, 'c93e6fbc6a1cdd6b533a8ab7962ef535', '6555aed7f29698434125bc4fbc895da8', '2021-02-23 14:53:28', 'active', NULL),
(47, 406, '053f4d0fcaccbe2e021a23216b5f24b1', 'b5067f2989bb19109d24310b0f58f125', '2021-02-23 16:11:27', 'active', NULL),
(48, 406, '5ac5fdf7bd769e76bb26d6b0574d8795', '0cc0a7cfc8dc9e4966a5fc5bb4a93fb1', '2021-02-23 16:11:30', 'active', NULL),
(49, 404, '0651320a505f1f74f94bc1fa4d061c33', '3aa196a0c52e9e6cf0620c3812e9a0b6', '2021-02-23 16:51:12', 'active', NULL),
(50, 404, '0a4be0aee71c1ae383cbc3b5c72b4164', 'f385ce60d46946b36fb0858a17654303', '2021-02-23 16:54:49', 'active', NULL),
(51, 404, '0e057100d94e67d3e37dd12b82ddac1f', 'feb293a7b5ca7a7a9bdf86a7a6372ec5', '2021-02-23 17:00:55', 'active', NULL),
(52, 404, '806068b49ff05a898000140880963889', 'ce6cb57eac554267f334296e79fbdc33', '2021-02-23 17:01:42', 'active', NULL),
(53, 404, 'a2cbdd612956ffe183c9d671204c60f4', 'a1215cca399bf73799eada207bc2b149', '2021-02-23 17:03:16', 'active', NULL),
(54, 404, '0e1f608230c797a6cf9b9e52dddbd2fe', '88627258b99419bf1790efbc2a784651', '2021-02-23 17:06:03', 'active', NULL),
(55, 404, '8d2386407b53effa5b2b3013b571d35e', 'e9777b35033fea776900a4fb254cc766', '2021-02-23 17:06:20', 'logout', '2021-02-23 17:08:43'),
(56, 406, 'ff201c4c30c676fa50ef1213fb1a5bbd', '068f942608689c03a56de3704c2639c7', '2021-02-23 17:08:55', 'logout', '2021-02-23 17:09:58'),
(57, 404, '2bdbb66a920432e98d21d61ebf8010cb', '38a797c738ba29d507034a32df3975c4', '2021-02-23 17:13:24', 'active', NULL),
(58, 406, '19f621c750e533d6e37db678d8fd0e39', '0390e24e71a07359d5d310d95bae3eaa', '2021-02-23 17:14:08', 'active', NULL),
(59, 406, '40ae57f8e29c6ad82d0661edca1bda6f', 'db931458051ce04b145cf907a9d32790', '2021-02-23 17:14:24', 'active', NULL),
(60, 406, '9109fd2e375f8eced7ce1e0b7bf8b21e', '434c8554f4a2cecae5bf543411c09ff2', '2021-02-23 17:14:48', 'active', NULL),
(61, 406, '4f14c8d358d4117cb6b3c8c70c4c7e8f', '5712a85b20293fa81480982501f486a7', '2021-02-23 17:16:41', 'active', NULL),
(62, 406, '7666d5acfbd6a8e7e5fb5bcdc667236d', 'ae26c62baa187571eead9a667b1e7942', '2021-02-23 17:17:05', 'active', NULL),
(63, 404, '6d40465dcfaef4681e744234a0153acb', '7c04d90c810b2b79ea2db40bc2f1fd34', '2021-02-23 17:17:06', 'active', NULL),
(64, 406, '63a3e2fd667a9fcc7e496aad66e3cc4c', 'cbd1f1429be36a685e27137d84bfa633', '2021-02-23 17:17:30', 'active', NULL),
(65, 406, '725bb14ee5ceabb330dc68c8a9ac795b', '90de9c8785c7e419b44fd587693aa7c2', '2021-02-23 17:17:58', 'logout', '2021-02-23 17:20:27'),
(66, 406, '9331d31f1d40a9a01bb140afab5dce4a', '5fa2a95cc725fdcc3a11343942d3941d', '2021-02-23 17:20:44', 'active', NULL),
(67, 406, 'f9da2232f5824ccd4eeeb5ce76e227a1', 'f83218bbf3ae765a464e829739a0ce8b', '2021-02-23 17:38:54', 'active', NULL),
(68, 406, '9a333fbb9bb72813a6fe964141684a72', '9fcdc27f68929dcb8394427e79b12496', '2021-02-23 20:56:24', 'active', NULL),
(69, 406, '4a4010c6760e5ab9a315f1f987a07a41', 'be9791d0db4ed85f5beb69f481a14918', '2021-02-23 20:59:53', 'active', NULL),
(70, 406, '085e2dcda6f3506752a2292350c5b740', 'cc89c077d9f531fc683b74cda92d8a46', '2021-02-23 21:00:17', 'active', NULL),
(71, 406, '9e6f6db58db7ebc3fc1bba333f4bb134', '94fe198daadfedc95b1f9e45bf114eea', '2021-02-23 22:42:43', 'active', NULL),
(72, 404, 'c17c5bf21a4af25999607e3ba739eaae', '405be60ed6d1b6a29a05c083ae22ec78', '2021-02-24 12:52:45', 'active', NULL),
(73, 406, 'dda68e194cd135b54f83e08308f6b3b2', 'efc49b75eaa23faf0e4cd24ddc979d97', '2021-02-24 14:15:56', 'active', NULL),
(74, 406, 'c9e0c0f5b8151e564ed806ffd291f292', '41eec44b96233e9255c7bc72844a2572', '2021-02-24 15:00:39', 'active', NULL),
(75, 406, 'bd1882f1618f7888a1a42998b276e17b', 'fb8bd4a4b7379795926573a44508411b', '2021-02-24 15:15:49', 'active', NULL),
(76, 406, '6b14fed7bc902aeecff42f03131a383a', 'c789115ffe1c78debd34c021ce234dc4', '2021-02-24 15:16:40', 'logout', '2021-02-24 15:17:17'),
(77, 406, 'f39fd61d8265cddf3e01da1158887571', '3a334d2d6e193bd6c7474dd2e9e5ce8d', '2021-02-24 15:17:27', 'active', NULL),
(78, 404, '2ee4e2f4e7440d9cd97b0f9b6db1a194', 'dc06816c19573fe80c2be9b7fd87a20e', '2021-02-24 16:59:50', 'active', NULL),
(79, 404, '5fab5a8dfa76b9ec9a2c6febfce9a03e', 'd2e6caf556f6afc852498db73e4b2fbb', '2021-02-24 17:02:10', 'active', NULL),
(80, 404, 'c3c7bed347a679a7b847ef23f79df5cb', '97e8f30fc269266fa97cade7a01b248b', '2021-02-24 17:03:50', 'active', NULL),
(81, 404, 'f2add4d703c19d2f227c79320d7fd201', 'cf7ac47eb8b23e459f9dd6684fa0080e', '2021-02-24 17:04:17', 'active', NULL),
(82, 406, '8a14535b748760cf5f2429d7bb6b59b3', 'a65a9be85b61b7519ef2922d09212ee9', '2021-02-24 17:04:31', 'logout', '2021-02-24 17:04:47'),
(83, 406, '54847c6de36c02998a8eeba6986b8474', 'ada83c3c595cb763b8a1b0156fc87c6e', '2021-02-24 17:05:23', 'logout', '2021-02-24 17:05:40'),
(84, 406, 'b0aba0678a75d47c6afcae25f9615f85', '9f76a0bb6b8ba6b09ef69ca67aa14456', '2021-02-24 17:06:00', 'active', NULL),
(85, 404, 'e5c3cdb4144d09bb844f5700555932d0', 'fef1507a2a25ab540445f93bc792357f', '2021-02-24 17:07:04', 'active', NULL),
(86, 404, '65c88795a40f574152eeec0617be1b79', '85939173a8acb46a51903afe25652d0a', '2021-02-24 17:07:30', 'active', NULL),
(87, 404, '7078f5bdd8ccaa7d52a4ead5efa63359', 'd1923613c8b8276d4fbc18bf0225bb48', '2021-02-24 17:17:14', 'active', NULL),
(88, 404, '618317f1985182939f54e5c3cd1d8708', '940bcdfc778f02d2e59606bf60704e02', '2021-02-24 17:19:44', 'logout', '2021-02-24 17:20:20'),
(89, 404, '3ba0cbb715f5168fa2142ed4b3a3b05a', 'a6f2a174c4ddb744180b70f779dbe073', '2021-02-24 17:21:34', 'active', NULL),
(90, 404, 'a9a3a08803ee340eaa31252b1650f346', 'c994aff1100bad4f7f46b1d36fd0bcf6', '2021-02-24 17:28:14', 'logout', '2021-02-24 17:28:20'),
(91, 404, '124bd99e4a2c733a2d1c051234a5dcb6', 'bcbb8752871ab211d8ad61fee1d75100', '2021-02-24 17:32:11', 'logout', '2021-02-24 17:32:28'),
(92, 404, '9795a13e7c12a0b5e31c3643c2d9c9a3', 'ffc46bb991504c9ec0a3aef694db60c3', '2021-02-24 17:36:43', 'logout', '2021-02-24 17:36:48'),
(93, 404, 'afdd1cb2b79a261a18fd9c0ae07d97a2', 'a3f89b0dcab3d9bcda29abb199567327', '2021-02-24 17:42:02', 'logout', '2021-02-24 17:42:44'),
(94, 404, '2df489984a29c93880bb52438b94acca', 'e5f4c50a1b38ce493e86fa71f3231bcd', '2021-02-24 17:45:06', 'logout', '2021-02-24 17:45:27'),
(95, 406, '6205d5ba6b16922065d713f760720742', 'c4622caa71f34f505c6708f19513bc7b', '2021-02-24 17:45:15', 'active', NULL),
(96, 406, '407e4e0bc7faecb113afd950a9f6f118', '0da59f23e20a8ea49645fa430753b8b7', '2021-02-24 17:45:27', 'active', NULL),
(97, 404, '765baf525cd469ec1be40ae40ac9d1df', '5e0d1994b1d8d7680376bcda7d2e6946', '2021-02-24 17:47:03', 'logout', '2021-02-24 17:47:16'),
(98, 404, '4d4a8aee878e5a01e9adce0d9f72fb9e', '7111af68b4367deaa55be6e3c86d4a8f', '2021-02-24 17:48:32', 'logout', '2021-02-24 17:50:41'),
(99, 404, '6d73b58b197206eeb91f3fbd325bd4ec', 'ebb325610d87c290002566b5398615d6', '2021-02-24 17:51:45', 'active', NULL),
(100, 404, 'b4552aae83f906afa80840e94e418d9a', 'e5320d11f301ef79c9b322ecbf9f1cf6', '2021-02-24 17:54:54', 'active', NULL),
(101, 404, 'a0b635c1b8ac2bda95c0d63f4748995b', 'ca8d5fd55997849e01fc6759a6546918', '2021-02-24 17:56:24', 'active', NULL),
(102, 404, '3e81bae0a7f3d82de785d5212f48bb1d', '25a15ed16785498b0bc6452d20d89b7f', '2021-02-24 17:59:13', 'active', NULL),
(103, 404, '5d08a94eeb5259deacc3223a9f8ca6a8', '1e181a7a96025bd75b0557b6448a4d6d', '2021-02-24 17:59:53', 'logout', '2021-02-24 18:00:02'),
(104, 404, '69f8016652ed8f565f2506a9311b94de', 'bbb0f123da74cac02a9277c28e4b930c', '2021-02-24 18:03:26', 'active', NULL),
(105, 404, '17f0dffd6ee1a30bda7362b0e07658ce', 'ed3027f7091d949b95afe834e0f5db8b', '2021-02-24 18:04:28', 'logout', '2021-02-24 18:04:33'),
(106, 404, 'a19a713deccc1d230127faac1decb283', 'c6b60327daec57099615e1d2fa2c2c96', '2021-02-24 18:06:40', 'logout', '2021-02-24 18:06:48'),
(107, 404, '019efa1dd0b9afbe149afeaa86534bf2', '35a5add46da37941ad9a0523a1b0c1d4', '2021-02-24 18:06:58', 'logout', '2021-02-24 18:07:03'),
(108, 404, '583c038209024d0f0305f0c7cbc413d4', 'af1d13287bc7dfce7bf480caa550dca7', '2021-02-24 18:07:36', 'logout', '2021-02-24 18:07:40'),
(109, 404, '9ab9af636d42da749a3222b99dace774', '5223a1f0f9c8211f53b142b95b348338', '2021-02-24 18:07:52', 'logout', '2021-02-24 18:07:57'),
(110, 404, 'c23293c24bf7b65ad63e80c08e1755a3', '443c63d87df078b5bcbba56fe692847f', '2021-02-24 18:08:10', 'logout', '2021-02-24 18:11:31'),
(111, 406, 'ed7a4ed113b00f4976eaf7dfb9bd25a7', '80641c82ea51dbe1a8cea663dafda074', '2021-02-24 18:08:29', 'active', NULL),
(112, 406, '9a8240bca90f0d990be619d8bbade5b7', '5784250f47f9f75d23073baa2e403fa5', '2021-02-24 18:09:16', 'logout', '2021-02-24 18:10:03'),
(113, 406, 'eaaf54e12e75a930010ccb5df482dee6', 'bc8c0375115cc47b86c2f0d9fd58f8d0', '2021-02-24 18:11:10', 'logout', '2021-02-24 18:12:08'),
(114, 406, 'bfd43f2e63180378cee551b5caaf214b', '0fd294e8efd1bf0ec55b27445828e8bf', '2021-02-25 01:54:31', 'logout', '2021-02-25 01:57:36'),
(115, 406, '176aef1889ac8a0947d358f4437d65aa', '4896c896512b4419675d06b46364204a', '2021-02-25 02:53:34', 'active', NULL),
(116, 406, 'b4b93df6b2bc4d8a45b4f27d79cac56c', '7fade3aaec6c57a9e47c9dc10109db2f', '2021-02-25 11:31:51', 'logout', '2021-02-25 14:10:17'),
(117, 406, 'da75d6ed0b6cd7fcbf31ec3430617b44', '547a1b6e10bc529f0938274c65bde3b1', '2021-02-25 13:25:13', 'active', NULL),
(118, 406, '07d4d1a12eda03206e74114506e0545f', '596c11415ae39bc7d83faff896908207', '2021-02-25 14:17:26', 'active', NULL),
(119, 408, '61432fb62dd5111f51c59f8e69c5e6a3', '66bd5665eb85e3ad7996b52634181287', '2021-02-25 14:22:42', 'active', NULL),
(120, 406, 'a2335672bfa1be12245ec7ea21fa9260', 'ad9dc0f2399d69456c8cd8fe18d60ed1', '2021-02-25 16:14:22', 'logout', '2021-02-25 16:15:23'),
(121, 412, 'c57ee06dad6cd235d693b6bfae3f34db', 'defe91be037c886e1180be67336f646e', '2021-02-25 16:14:30', 'logout', '2021-02-25 16:18:56'),
(122, 416, 'e4d9b5a9e39dd1d1e1bf48e54673b134', '1c611d3cca6c880b0e197d0bbf7e5213', '2021-02-25 16:16:58', 'logout', '2021-02-25 16:18:39'),
(123, 412, '5e8abf9a88dcf081c35577362fb3fe2d', '59822c19dad6dc7bc9f0482e536b6cb2', '2021-02-25 16:19:41', 'logout', '2021-02-25 16:20:26'),
(124, 416, '820327cb10367c39a4d6cf4bba0d9b82', 'b7b44d95cab3678aa7f0fa9ba8cc737b', '2021-02-25 16:20:07', 'logout', '2021-02-25 16:21:31'),
(125, 406, '83bc88a946b45c65d38176d54b6ec7e7', '3981ae5b3abe08b35cda01010a4290fc', '2021-02-25 16:21:24', 'active', NULL),
(126, 417, '0559c1440c14fd4e5e26ba733c1f7df6', '589dc0b582cd657b439933bda712c801', '2021-02-25 16:47:48', 'active', NULL),
(127, 417, 'b3aa8c679045067b20f24e63a6ed14ae', '67651ea952d282a8eac9a6c392cd6fc5', '2021-02-25 18:39:20', 'active', NULL),
(128, 406, 'b672ea9a380f706ba83466346f46142d', '9ff9a3a5528f9f12c9b041ca993415a9', '2021-02-26 17:54:50', 'active', NULL),
(129, 418, '05a7db71aa4db25bbfc73f0a6dffb91d', '8840b19a3664fb1cee3d88470b8b059d', '2021-02-27 11:33:41', 'active', NULL),
(130, 417, '2a235a8a4cfc7b7d1291326a32c360dd', '43c8f2df026c859a29602acb493d372a', '2021-02-28 02:01:13', 'active', NULL),
(131, 404, 'd428c831e65301010dfff6a1d1101183', '00ba457c3f9de98bf75ec56dbd241d97', '2021-02-28 20:08:36', 'logout', '2021-02-28 20:08:46'),
(132, 404, 'aefec5c062a2433eb24f12468a3ede82', '10d8778f0850ed0c42d3e9f9455bf74a', '2021-02-28 20:08:56', 'active', NULL),
(133, 406, 'f8b325e6e9c3d77e5928fdb5f671ce77', '64a636aa21b18f290ce1c78e90554f7c', '2021-02-28 23:33:18', 'active', NULL),
(134, 406, 'ea1bb746a2309efa83b385838e3a6c4c', '0eb73c93ddbc4ca0123b75630a46aa0c', '2021-03-01 00:58:06', 'active', NULL),
(135, 406, '7da135dc76e95bdf958d25d1f26c6fd6', 'f11c00c91c636bb58c7ebadb1ecec09e', '2021-03-01 08:31:15', 'active', NULL),
(136, 406, '39e933d8ebe6a5882f762e048800a3e0', 'dc18802b1ac308774f559ee18e699e1f', '2021-03-02 19:38:07', 'active', NULL),
(137, 406, '43067181307a886bca56c7af20b5eeb4', 'a90b7caa664e696c87eaf2e62e047954', '2021-03-03 21:52:46', 'active', NULL),
(138, 436, '3202d4bc55f8401e54d3405d5846c98d', '789af3486675a9c86a01c5ffba6d8f9b', '2021-03-05 19:41:22', 'logout', '2021-03-05 19:41:55'),
(139, 436, '93c4ef45cfe98e39412e8f64b12fd2cb', '76ef05b853822b41d6f1177dcad9432e', '2021-03-05 19:54:45', 'logout', '2021-03-05 20:03:31'),
(140, 441, '50bdf4d54f34b46b07a8076d96557685', '327fbd1f71733d0aaeb2e938c3158924', '2021-03-06 09:09:20', 'logout', '2021-03-06 09:28:07'),
(141, 436, 'b8e82a11ed94bbe3719e023143d03021', '354de3666453520b43135f2b151e3760', '2021-03-06 09:10:44', 'logout', '2021-03-06 09:32:12'),
(142, 441, '69ad4b480e8d4c1bcaef46328e6e72c4', '381c59519487367f976e4bb9b0a12a7a', '2021-03-06 09:28:32', 'logout', '2021-03-06 09:44:05'),
(143, 441, '21aa0bc38dbbf271dacd3b8ed869ff0d', 'c9090d723bdf486c7451525b03ad1f7d', '2021-03-06 09:33:10', 'logout', '2021-03-06 09:39:19'),
(144, 436, 'eea13e4bce7b5d5959a23c7a0c4ae89c', '8c22324cdfe6ceaf68268fd119c85a7b', '2021-03-06 09:36:26', 'logout', '2021-03-06 09:40:00'),
(145, 441, 'e2ee5cb5d8bb618a64042d0a6723a349', 'b4cb7d2d5c46bda2507ca16968129b52', '2021-03-06 09:41:13', 'logout', '2021-03-06 09:50:16'),
(146, 441, '90d4b24d1544f80c500577dce0822980', '43fa31b20f1d39f32e6459e27fa40c44', '2021-03-06 09:44:27', 'logout', '2021-03-06 09:47:48'),
(147, 441, '0bd9f5ab154a9539f8ccad0ff9092500', 'db7a85b78c8f4fded2fd8caf5702720a', '2021-03-06 09:48:02', 'logout', '2021-03-06 09:51:33'),
(148, 441, 'e72ca6831a83ba95da2c0358fa1cc492', '45aa98d7c8590509c1151ebbfc75092a', '2021-03-06 09:50:37', 'logout', '2021-03-06 09:51:30'),
(149, 406, '8c2f3a31ede3da358aeaf80ec1cadaef', 'da1a325e286491f701837df33939df81', '2021-03-06 10:25:01', 'active', NULL),
(150, 436, 'a5891121b8bd161a608a0b7099f12ff0', 'c0f0cfd61b6b6163901829dcb32f7a71', '2021-03-06 10:25:36', 'logout', '2021-03-06 10:40:18'),
(151, 406, '3515480717fc30f4392233c06a82a781', '61464ea0b1bfbb361cda5c77c104ed10', '2021-03-06 11:00:36', 'active', NULL),
(152, 406, '8dc8e3adced2c4b305120b195b5a7272', 'ebba647a997bb8ec7b92477cf10fb34f', '2021-03-06 13:02:44', 'logout', '2021-03-06 14:44:25'),
(153, 443, 'ca541e372b596ac390cdbc8062f7e3ff', 'a62c47f48018573418adc66db7a8ba91', '2021-03-06 15:06:49', 'logout', '2021-03-06 15:07:57'),
(154, 406, 'b665977f1d1dc5c66498590d65770a2c', '981de1d4d12f00f539be40232c80d843', '2021-03-06 15:52:01', 'active', NULL),
(155, 406, '77ff0190b1d65a8a089473309ad16284', '6229db1444d24380f9af925839ff1813', '2021-03-06 16:40:52', 'logout', '2021-03-06 18:31:58'),
(156, 436, '2156b92bb36fba6897708ae1934ca7eb', '1c60004c147cf6aa75d06e22ecf8deba', '2021-03-06 19:49:33', 'logout', '2021-03-06 19:52:06'),
(157, 406, '17e30c5a61c0075151da580549ef277d', 'f3c8499cf1b12dc6352f4dbb1ae127ac', '2021-03-06 19:52:26', 'active', NULL),
(158, 436, '813e8cb85f04549feaf8bc444726f816', '6d4ed1f11ab7a64c74306b80e987f149', '2021-03-06 20:01:13', 'active', NULL),
(159, 443, 'b2e6ea88b8285db096751d7bea98089f', 'f22cf7f6df953b597f2edc665b09d403', '2021-03-07 02:06:30', 'logout', '2021-03-07 02:13:17'),
(160, 406, '43635489cd8672a088a22d692a53c611', '8adbd14364c86aa9a375a5acf90fd239', '2021-03-07 02:13:28', 'active', NULL),
(161, 441, 'fbd93b037321aa61288bbe7bb9c4ed77', 'ae71b08644f3d5d6bec38f235b38604a', '2021-03-07 08:00:33', 'active', NULL),
(162, 436, '19518f595ef524e6d48d75f2f0675aea', 'b2995eb84d662e37a38184b64256f648', '2021-03-07 08:08:13', 'logout', '2021-03-07 08:10:07'),
(163, 436, '795faf5f9d8462ce45954239b922bb7b', '9230470d2da5b45bdce332dceb52db97', '2021-03-07 08:12:17', 'logout', '2021-03-07 08:13:27'),
(164, 436, 'e63bdf1985c0f014af2bf6d0e9936c33', '408c794bbed4351d148e1a39c34aaf00', '2021-03-07 08:16:43', 'logout', '2021-03-07 08:24:39'),
(165, 436, 'b9a4654f4332e19cef1ee32038231402', 'a465ad9da74aa3c3b76cae8441ecfa28', '2021-03-07 08:24:53', 'logout', '2021-03-07 08:25:09'),
(166, 406, '22936685707798a8df1e49c867bd5b5a', 'c97e8ddae9532310632a77df17ab8c09', '2021-03-07 09:23:01', 'active', NULL),
(167, 406, '4afff6af48ea03dbc88ae21ecb10b4d5', '4fb506832677af48f8b59a9b0374ea57', '2021-03-07 10:01:51', 'active', NULL),
(168, 459, '2bce6b8ef9ff93caa7c5055ca9d430f8', 'dacd0e6025cadd0b2650a5dbca5db372', '2021-03-07 14:44:54', 'active', NULL),
(169, 436, '7f89c211a60afbdd9df20d70f166162e', '6c71c4eb3610b33b9c61f19836db32c3', '2021-03-07 20:32:26', 'logout', '2021-03-07 21:20:19'),
(170, 436, '09da0e85646ab6e99c5d9bbfdbbdcf0d', '6354b2ad9223c2850a53928354883bb4', '2021-03-08 11:03:07', 'active', NULL),
(171, 404, 'c8ea8d99fd6e8182367dcbadf8d1df0b', '369c39e7e64eda086e8923470b31e9e7', '2021-03-08 17:49:27', 'active', NULL),
(172, 406, '03ae7249c00e44f150222186b734a840', '5bfa3137f31aa048d76361cb45ae0b62', '2021-03-09 08:57:13', 'active', NULL),
(173, 441, 'ba50ee10aa82bfcb97a579d6f42bb4e7', '28860fb8984f0f56704b254a1c48a02a', '2021-03-11 12:42:17', 'active', NULL),
(174, 404, '8e18faa5fa57fe2b48677d15193b9f4e', '15840f6f632bc0af2f5b4978b8e0d325', '2021-03-11 16:01:50', 'active', NULL),
(175, 406, 'f3fc2e060b7c9f57bfde4837503c93a6', '75f4a3fde290163ba97e50a6842384b2', '2021-03-11 21:51:16', 'active', NULL),
(176, 460, '8f1082cba04276f000e387b73024155b', '7fcff22cfd24341c9ce332c31481b912', '2021-03-12 12:41:34', 'active', NULL),
(177, 406, '2b4ecbb2c31bd875ffc79afadb7ef0eb', 'b5fcda52074675f88d53bc0ad7db42a6', '2021-03-12 17:20:54', 'active', NULL),
(178, 461, '73e08977353fb8751f2d50a51001951f', '76e4dd767656ea4f9bbf5f911f4f6762', '2021-03-13 20:39:55', 'active', NULL),
(179, 462, '871fe4b202da783f4340f4c1e0b450ba', '63aba110406086dda0e5a064b3e72938', '2021-03-14 09:54:36', 'active', NULL),
(180, 436, '720fafd29f8de09c88754a2ab93068dd', 'c68ac361cf8b148b14a272d87072bfc9', '2021-03-14 10:03:50', 'active', NULL),
(181, 459, 'f2122cf442d1cc3cda546e24afabeb0c', 'd83761a8a8a720a80fca52aeaa81351a', '2021-03-14 17:25:18', 'active', NULL),
(182, 463, 'b837493614f99a941dc04f78733fb1fb', 'b15a94a1416ebc926937e14075dc4762', '2021-03-15 18:08:37', 'active', NULL),
(183, 404, 'c8e9e716367fed3400844e412f6883e5', '47d63c8db0e7623fc2826f814c4df483', '2021-03-16 17:01:56', 'logout', '2021-03-16 17:06:11'),
(184, 404, 'cbfb502531e701e43d26c6119f5ebc53', 'c9cce8a9491a39b2fc4cf3e61ca944fb', '2021-03-16 17:06:27', 'active', NULL),
(185, 436, 'e4dcbe8a6368c8f7dcc5f09a1130982c', 'c90ea069a42ace11f78e14275fb76125', '2021-03-17 09:25:34', 'active', NULL),
(186, 417, '06918b24ddd983ff99c6971f15d7d43c', 'b9e0443632deb0f4798e59aa876bf62e', '2021-03-20 16:25:20', 'active', NULL),
(187, 484, 'a180e6bea4e791d72f769aee9c68312e', '46fd2189e0c773bb461f202655496a3e', '2021-04-18 20:44:33', 'active', NULL),
(188, 484, 'c0813b577a668e44ef7f126355a3025a', 'c10d4332fdd33aa4f5375e0c3fe78fcc', '2021-04-19 11:18:12', 'logout', '2021-04-19 11:24:21'),
(189, 485, '38499eea7b0b1e135b5cd4f9b39fdee8', 'bb2bb472e97b3b1a6a09d37d8f76e9a6', '2021-05-07 15:19:25', 'active', NULL),
(190, 486, '60f0a1ce8932977ddc6ae4f43f24b4be', 'a50cf0bdb45d58f41acf1d28a6a94c08', '2021-05-09 20:26:14', 'logout', '2021-05-09 20:35:45'),
(191, 417, 'e34c24087d060ea2c440f0e5da53427a', 'dbb710a64a9472171323f813aa8e8827', '2021-06-24 18:48:50', 'active', NULL),
(192, 417, '2dcda4ef3fa3e447d6dd52f278f7f3a2', '0553a72727f83c9710b224974cd9e085', '2021-07-17 17:32:57', 'active', NULL),
(193, 487, '97adfc3da23324196d35a7cdfd242469', '9b3b570d20946e1365b60afab64e0c0f', '2021-07-25 14:17:26', 'active', NULL),
(194, 417, '8a13dc7476e24df0b92dab0f47747a9c', '9b000a919aa8ebaa8396876fdbed44e1', '2021-07-29 11:29:49', 'logout', '2021-07-29 11:32:16'),
(195, 406, '01de9091fdd3b47ed1133a43ce0f9e7f', '7465baf8ed4a1711440c94b98f52886f', '2021-08-29 12:07:27', 'logout', '2021-08-29 12:13:58'),
(196, 406, 'a5784273006ca1ddbdc8daf3ada80a22', '0d941df96464decc3923865be9635572', '2021-10-08 22:20:06', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_master`
--

CREATE TABLE `tbl_customer_master` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT 'User',
  `mobile` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'No Email',
  `password` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT 'default.png',
  `con` datetime DEFAULT current_timestamp(),
  `uon` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` varchar(30) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_master`
--

INSERT INTO `tbl_customer_master` (`id`, `Name`, `mobile`, `email`, `password`, `image`, `con`, `uon`, `status`) VALUES
(404, 'Suraj Kumar', '7004417126', 'sk825252@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png', '2021-02-11 03:17:52', '2021-02-12 10:38:09', '1'),
(406, 'Gaurav Kumar', '7903562598', 'gauravsbs2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6046f5f141af6.jpeg', '2021-02-11 04:15:39', '2021-03-09 04:13:37', '1'),
(407, 'User', '0798784424', 'No Email', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png', '2021-02-25 14:17:51', NULL, '1'),
(408, 'User', '7987844241', 'No Email', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png', '2021-02-25 14:20:56', NULL, '1'),
(412, 'User', '8103036270', 'No Email', '81b073de9370ea873f548e31b8adc081', 'default.png', '2021-02-25 16:14:06', NULL, '1'),
(416, 'User', '7979744874', 'No Email', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png', '2021-02-25 16:16:38', NULL, '1'),
(417, 'User', '7479842376', 'No Email', '41a66e16b0390f5c599151ff13fed82f', '603aaccd90a51.jpeg', '2021-02-25 16:47:40', '2021-02-27 20:34:21', '1'),
(418, 'Parmajan jr chauhan', '8084731379', 'parmanjannifft@gmail.com', 'ee71b0d855a02860636fe5bf00aaf988', 'default.png', '2021-02-27 11:32:17', '2021-02-27 06:05:11', '1'),
(419, 'User', '9907779009', 'No Email', '5caf41d62364d5b41a893adc1a9dd5d4', 'default.png', '2021-03-05 19:18:16', NULL, '1'),
(436, 'Suraj Kumar Chauhan', '7389393331', 'surajchauhansc75742@gmail.com', '46d045ff5190f6ea93739da6c0aa19bc', 'default.png', '2021-03-05 19:40:52', '2021-03-07 02:45:04', '1'),
(441, 'Lokesh chouhan', '6266795753', 'lokeshchouhan989@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '6042fe9feebd5.jpeg', '2021-03-06 09:08:01', '2021-03-06 04:01:35', '1'),
(443, 'User', '8294217126', 'karuoraon@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png', '2021-03-06 15:06:01', '2021-03-06 20:36:23', '1'),
(459, 'User', '9685325287', 'sh.sahu1986@gmail.com', 'e46e78f4a500ee5ae1deb86cc487b72d', 'default.png', '2021-03-07 14:44:35', '2021-03-14 11:55:02', '1'),
(460, 'User', '877029506', 'pooru3131@gmail.com', 'b99d193b66a6542917d2b7bee52c2574', 'default.png', '2021-03-12 12:40:57', NULL, '1'),
(461, 'User', '7999927680', 'sammisidar420@gmail.com', '81bb0bf63fbfca816d8a8fdf165c067d', 'default.png', '2021-03-13 20:39:46', NULL, '1'),
(462, 'User', '7047642451', 'moharrumansari786@gmail.com', '13ef31e4614a46566d611880e9b919f8', 'default.png', '2021-03-14 09:54:11', NULL, '1'),
(463, 'Umashankar', '7224904852', 'Gondrajan861@gmail.com', 'e51106657539f4aaf5e7eba5538604da', 'default.png', '2021-03-15 18:08:15', '2021-03-15 12:40:42', '1'),
(484, 'Taruna Shashibhushan', '9329268892', 'shashibhushanmahendra1995@gmail.com', 'abae6d97ea0bd51d7efda55fb8560ab3', 'default.png', '2021-04-18 20:44:21', '2021-04-19 05:48:26', '1'),
(485, 'User', '9993135204', 'gopalprasadsahu1987@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'default.png', '2021-05-07 15:19:01', NULL, '1'),
(486, 'Sanjeet choudhary', '8962587197', 'sanjeetch16@gmail.com', '16d64e451eee59d5fad27f84c27193c5', 'default.png', '2021-05-09 20:26:03', '2021-05-09 14:58:21', '1'),
(487, 'User', '9168763134', 'divijagokhale@gmail.com', 'dc647eb65e6711e155375218212b3964', 'default.png', '2021-07-25 14:17:21', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_master`
--

CREATE TABLE `tbl_notification_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(7000) NOT NULL,
  `con` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_parent_master`
--

CREATE TABLE `tbl_order_parent_master` (
  `id` int(50) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `titems` int(11) NOT NULL,
  `qnt` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `tamount` decimal(20,0) NOT NULL,
  `ptype` enum('PAID','UNPAID') DEFAULT NULL,
  `d_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `odate` datetime NOT NULL DEFAULT current_timestamp(),
  `rname` varchar(100) NOT NULL,
  `addressline` varchar(200) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `uby` varchar(100) DEFAULT NULL,
  `uon` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('cancel','ordered','delivered') NOT NULL DEFAULT 'ordered'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_parent_master`
--

INSERT INTO `tbl_order_parent_master` (`id`, `oid`, `cid`, `titems`, `qnt`, `size`, `tamount`, `ptype`, `d_date`, `odate`, `rname`, `addressline`, `pin_code`, `city`, `state`, `mobile`, `email`, `uby`, `uon`, `status`) VALUES
(40, 'ORD-447026727', 436, 663, 1, 0, '60', 'UNPAID', '2021-03-11 18:54:05', '2021-03-05 20:00:12', 'User', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(41, 'ORD-958003196', 441, 661, 1, 0, '40', 'UNPAID', '2021-03-11 18:55:38', '2021-03-06 09:18:11', 'User', '                   \n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', 'lokeshchouhan989@gmail.com', NULL, '2021-03-12 00:25:38', 'ordered'),
(42, 'ORD-958003196', 441, 656, 1, 0, '20', 'UNPAID', '2021-03-11 18:55:38', '2021-03-06 09:18:11', 'User', '                   \n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', 'lokeshchouhan989@gmail.com', NULL, '2021-03-12 00:25:38', 'ordered'),
(43, 'ORD-799656317', 436, 661, 1, 0, '40', 'UNPAID', '2021-03-11 18:54:05', '2021-03-06 09:18:13', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(44, 'ORD-799656317', 436, 656, 1, 0, '20', 'UNPAID', '2021-03-11 18:54:05', '2021-03-06 09:18:13', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(45, 'ORD-921058278', 441, 654, 1, 0, '40', 'UNPAID', '2021-03-11 18:55:38', '2021-03-06 09:28:59', 'Lokesh chouhan', '                   \n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', 'lokeshchouhan989@gmail.com', NULL, '2021-03-12 00:25:38', 'ordered'),
(46, 'ORD-921058278', 441, 655, 1, 0, '120', 'UNPAID', '2021-03-11 18:55:38', '2021-03-06 09:29:00', 'Lokesh chouhan', '                   \n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', 'lokeshchouhan989@gmail.com', NULL, '2021-03-12 00:25:38', 'ordered'),
(47, 'ORD-921058278', 441, 652, 1, 0, '40', 'UNPAID', '2021-03-11 18:55:38', '2021-03-06 09:29:00', 'Lokesh chouhan', '                   \n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', 'lokeshchouhan989@gmail.com', NULL, '2021-03-12 00:25:38', 'ordered'),
(48, 'ORD-921058278', 441, 653, 1, 0, '60', 'UNPAID', '2021-03-11 18:55:38', '2021-03-06 09:29:00', 'Lokesh chouhan', '                   \n                 Bill.post kondatarai   harijan muhalla  raigarh cg', '496100', 'Kondatarai', 'Chattisgarh', '6266795753', 'lokeshchouhan989@gmail.com', NULL, '2021-03-12 00:25:38', 'ordered'),
(49, 'ORD-215999261', 406, 662, 1, 0, '40', 'UNPAID', '2021-03-11 18:56:49', '2021-03-06 14:27:53', 'Gaurav Kumar', '                   \n                 road no 2', '825413', 'Gurio', 'Jharkhand', '7903562598', 'gauravsbs2@gmail.com', NULL, '2021-03-12 00:26:49', 'cancel'),
(50, 'ORD-270794961', 406, 654, 1, 0, '40', 'UNPAID', '2021-03-11 18:56:49', '2021-03-06 15:52:31', 'Gaurav Kumar', '                   \n                 road no 2', '825413', 'Gurio', 'Jharkhand', '7903562598', 'gauravsbs2@gmail.com', NULL, '2021-03-12 00:26:49', 'ordered'),
(51, 'ORD-270794961', 406, 662, 1, 0, '40', 'UNPAID', '2021-03-11 18:56:49', '2021-03-06 15:52:31', 'Gaurav Kumar', '                   \n                 road no 2', '825413', 'Gurio', 'Jharkhand', '7903562598', 'gauravsbs2@gmail.com', NULL, '2021-03-12 00:26:49', 'ordered'),
(52, 'ORD-907722002', 436, 673, 1, 0, '160', 'UNPAID', '2021-03-11 18:54:05', '2021-03-06 20:02:05', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(53, 'ORD-2028803967', 436, 675, 1, 0, '50', 'UNPAID', '2021-03-11 18:54:05', '2021-03-06 20:03:15', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(54, 'ORD-1231591952', 436, 675, 1, 0, '50', 'UNPAID', '2021-03-11 18:54:05', '2021-03-06 20:10:48', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(55, 'ORD-1471270986', 436, 675, 1, 0, '50', 'PAID', '2021-03-11 18:54:05', '2021-03-07 08:09:45', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', 'admin@gmail.com', '2021-03-12 00:24:05', 'delivered'),
(56, 'ORD-1130447578', 459, 667, 1, 0, '100', 'PAID', '2021-03-11 11:47:16', '2021-03-07 14:46:58', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', '', 'admin@gmail.com', '2021-03-11 17:17:16', 'delivered'),
(57, 'ORD-1130447578', 459, 650, 1, 0, '20', 'PAID', '2021-03-11 11:47:16', '2021-03-07 14:46:59', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', '', 'admin@gmail.com', '2021-03-11 17:17:16', 'delivered'),
(58, 'ORD-1130447578', 459, 647, 1, 0, '15', 'PAID', '2021-03-11 11:47:16', '2021-03-07 14:46:59', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', '', 'admin@gmail.com', '2021-03-11 17:17:16', 'delivered'),
(59, 'ORD-1130447578', 459, 636, 1, 0, '30', 'PAID', '2021-03-11 11:47:16', '2021-03-07 14:46:59', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', '', 'admin@gmail.com', '2021-03-11 17:17:16', 'delivered'),
(60, 'ORD-1130447578', 459, 631, 1, 0, '10', 'PAID', '2021-03-11 11:47:16', '2021-03-07 14:47:00', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', '', 'admin@gmail.com', '2021-03-11 17:17:16', 'delivered'),
(61, 'ORD-1896725462', 436, 675, 1, 0, '50', 'UNPAID', '2021-03-11 18:54:05', '2021-03-07 21:17:43', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-12 00:24:05', 'ordered'),
(63, 'ORD-2110757470', 436, 675, 1, 0, '50', 'UNPAID', '2021-03-14 04:35:38', '2021-03-14 10:05:38', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-14 10:05:38', 'ordered'),
(64, 'ORD-1179896064', 459, 675, 1, 0, '50', 'UNPAID', '2021-03-14 11:55:48', '2021-03-14 17:25:48', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', 'sh.sahu1986@gmail.com', NULL, '2021-03-14 17:25:48', 'ordered'),
(65, 'ORD-1179896064', 459, 638, 1, 0, '25', 'UNPAID', '2021-03-14 11:55:49', '2021-03-14 17:25:49', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', 'sh.sahu1986@gmail.com', NULL, '2021-03-14 17:25:49', 'ordered'),
(66, 'ORD-1179896064', 459, 634, 1, 0, '20', 'UNPAID', '2021-03-14 11:55:49', '2021-03-14 17:25:49', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', 'sh.sahu1986@gmail.com', NULL, '2021-03-14 17:25:49', 'ordered'),
(67, 'ORD-1179896064', 459, 633, 1, 0, '30', 'UNPAID', '2021-03-14 11:55:50', '2021-03-14 17:25:50', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', 'sh.sahu1986@gmail.com', NULL, '2021-03-14 17:25:50', 'ordered'),
(68, 'ORD-1179896064', 459, 631, 2, 0, '20', 'UNPAID', '2021-03-14 11:55:50', '2021-03-14 17:25:50', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', 'sh.sahu1986@gmail.com', NULL, '2021-03-14 17:25:50', 'ordered'),
(69, 'ORD-1179896064', 459, 645, 1, 0, '30', 'UNPAID', '2021-03-14 11:55:51', '2021-03-14 17:25:51', 'User', 'Qtr. No. 202, bsnl colony, tv tower road, chhote attarmuda, Raigarh', '496001', 'Chakradharnagar', 'Chattisgarh', '9685325287', 'sh.sahu1986@gmail.com', NULL, '2021-03-14 17:25:51', 'ordered'),
(70, 'ORD-1298756881', 436, 655, 1, 0, '100', 'UNPAID', '2021-03-17 03:55:58', '2021-03-17 09:25:58', 'Suraj Kumar Chauhan', 'Banjinpali Raigarh Chhattisgarh shiv nagar banjinpali raigarh', '496001', 'Raigarh', 'Chattisgarh', '7389393331', 'surajchauhansc75742@gmail.com', NULL, '2021-03-17 09:25:58', 'ordered'),
(71, 'ORD-29663278', 417, 657, 2, 0, '0', 'UNPAID', '2021-03-20 10:56:10', '2021-03-20 16:25:55', 'User', 'vill-kusumtoli,Chandwa,Latehara', '825413', 'Telaiya Dam', 'Jharkhand', '7479842376', 'No Email', NULL, '2021-03-20 16:26:10', 'cancel'),
(72, 'ORD-1873547537', 486, 676, 1, 0, '0', 'UNPAID', '2021-05-09 15:05:29', '2021-05-09 20:29:06', 'User', '                 Kotra roade jai hind gali  \n                 ', '496001', 'Bangursiya', 'Chattisgarh', '8962587197', 'sanjeetch16@gmail.com', NULL, '2021-05-09 20:35:29', 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_master`
--

CREATE TABLE `tbl_product_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `mrp` decimal(20,2) DEFAULT NULL,
  `catid` int(11) NOT NULL,
  `selling_price` decimal(20,2) DEFAULT NULL,
  `mfg_details` varchar(500) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `writer` varchar(50) DEFAULT NULL,
  `publisher` varchar(500) DEFAULT NULL,
  `disclaimer` varchar(500) DEFAULT NULL,
  `img1` varchar(50) DEFAULT NULL,
  `img2` varchar(50) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT current_timestamp(),
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `minalert` int(11) NOT NULL DEFAULT 7,
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_master`
--

INSERT INTO `tbl_product_master` (`id`, `name`, `description`, `stock`, `mrp`, `catid`, `selling_price`, `mfg_details`, `author`, `writer`, `publisher`, `disclaimer`, `img1`, `img2`, `cby`, `con`, `uby`, `uon`, `minalert`, `status`) VALUES
(631, 'Tomato', 'Call/Watsap-7987844241 RAIGARH BAZAR', 8, '0.00', 5, '0.00', '2021-05-03', 'RAIGARH BAZAR', 'RAIGARH BAZAR', 'RAIGARH BAZAR', 'RAIGARH BAZAR', '6041ec0aef78e.jpeg', '6041ec0af0820.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 08:45:49', 'Suraj Kumar Chauhan', '2021-03-17 10:39:37', 5, '1'),
(632, 'Potato', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041ecd48aa1a.jpeg', '6041ecd48b74a.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:03:24', 'Suraj Kumar Chauhan', '2021-03-17 10:41:15', 5, '1'),
(633, 'Onion', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '2021-03-10', 's', 's', 's', 'RAIGARH BAZAR', '6041ee95239b4.jpeg', '6041ee952490c.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:10:53', 'Suraj Kumar Chauhan', '2021-03-17 10:41:38', 5, '1'),
(634, 'Pink baigan', 'Call/Watsap-7987844241', 8, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041f2958dd74.jpeg', '6041f2958eb62.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:27:57', 'Suraj Kumar Chauhan', '2021-03-17 10:41:54', 5, '1'),
(635, 'Shimla mirch', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '2021-03-11', 'S', 'S', 'S', 'RAIGARH BAZAR', '6041f33bc708b.jpeg', '6041f33bc7983.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:30:43', 'Suraj Kumar Chauhan', '2021-03-17 10:42:14', 5, '1'),
(636, 'Matar', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR\n\n', '6041f489d497f.jpeg', '6041f489d58cd.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:36:17', 'Suraj Kumar Chauhan', '2021-03-17 10:42:42', 5, '1'),
(637, 'Phool gobhi', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041f588776c2.jpeg', '6041f588788b9.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:40:32', 'Suraj Kumar Chauhan', '2021-03-17 10:43:02', 5, '1'),
(638, 'Gajar', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041f74cdf908.jpeg', '6041f74ce0b45.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:48:04', 'Suraj Kumar Chauhan', '2021-03-17 10:43:22', 5, '1'),
(639, 'khira', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041f8dcc869a.jpeg', '6041f8dcc9788.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:54:44', 'Suraj Kumar Chauhan', '2021-03-17 10:43:43', 5, '1'),
(640, 'white baigan', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041f981cc5cf.jpeg', '6041f981cd2b8.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 14:57:29', 'Suraj Kumar Chauhan', '2021-03-17 10:44:09', 5, '1'),
(641, 'Chukandar (beet)', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041fc0092db9.jpeg', '6041fc0093c79.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:04:57', 'Suraj Kumar Chauhan', '2021-03-17 10:44:45', 5, '1'),
(642, 'Hara mirchi', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041fc8c45b21.jpeg', '6041fc8c46e47.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:10:28', 'Suraj Kumar Chauhan', '2021-03-17 10:45:48', 5, '1'),
(643, 'Beans', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041fd3cba731.jpeg', '6041fd3cbb16f.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:13:24', 'Suraj Kumar Chauhan', '2021-03-17 10:46:04', 5, '1'),
(644, 'Adrak', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041fdce2562b.jpeg', '6041fdce26530.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:15:50', 'Suraj Kumar Chauhan', '2021-03-17 10:46:22', 5, '1'),
(645, 'Dhania', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6041ff08615ce.jpeg', '6041ff086178d.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:21:04', 'Suraj Kumar Chauhan', '2021-03-17 10:46:45', 5, '1'),
(646, 'Makhna/Pumpkin', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6042001b020c7.jpeg', '6042001b027d8.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:25:39', 'Suraj Kumar Chauhan', '2021-03-17 10:47:12', 5, '1'),
(647, 'Patta Gobhi', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6042009c4480e.jpeg', '6042009c45172.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:27:48', 'Suraj Kumar Chauhan', '2021-03-17 10:47:31', 5, '1'),
(648, 'Lali Bhaji', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420110762bd.jpeg', '6042011076db3.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:29:44', 'Suraj Kumar Chauhan', '2021-03-17 10:47:47', 5, '1'),
(649, 'Palak', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6049ce363688e.jpeg', '6049ce36374d2.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:37:38', 'Suraj Kumar Chauhan', '2021-03-17 10:48:03', 5, '1'),
(650, 'Muli', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '2021-03-11', 'S', 'S', 'S', 'RAIGARH BAZAR', '604203921a46e.jpeg', '604203921af03.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:40:26', 'Suraj Kumar Chauhan', '2021-03-17 10:48:24', 5, '1'),
(651, 'Methi', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '2021-12-03', 's', 's', 's', 'RAIGARH BAZAR', '6042056b90c7c.jpeg', '6042056b91005.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:48:19', 'Suraj Kumar Chauhan', '2021-03-17 11:00:08', 5, '1'),
(652, 'Pyaaj Bhaji', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6042075cd6226.jpeg', '6042075cd6604.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 15:56:36', 'Suraj Kumar Chauhan', '2021-03-17 10:49:56', 5, '1'),
(653, 'Karela (chota)', 'Call/Watsapp-7987844241 RAIGARH BAZAR', 9, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420a3c4496e.jpeg', '60420a3c44f63.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:08:52', 'Suraj Kumar Chauhan', '2021-03-17 10:50:11', 5, '1'),
(654, 'Karala (bada)', 'Call/Watsap-7987844241 RAIGARH BAZAR', 8, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420b00db523.jpeg', '60420b00dbbc5.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:12:08', 'Suraj Kumar Chauhan', '2021-03-17 10:50:23', 5, '1'),
(655, 'Parwal', 'Call/Watsap-7987844241 RAIGARH BAZAR', 8, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420c69dc6e9.jpeg', '60420c69dca8a.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:18:09', 'Suraj Kumar Chauhan', '2021-03-17 10:50:42', 5, '1'),
(656, 'Lowki', 'Call/Watsap-7987844241 RAIGARH BAZAR', 8, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420ccb50c5b.jpeg', '60420ccb516ca.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:19:47', 'Suraj Kumar Chauhan', '2021-03-17 10:51:16', 5, '1'),
(657, 'Barbatti', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420e117b85a.jpeg', '60420e117bc64.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:25:13', 'Suraj Kumar Chauhan', '2021-03-20 16:26:10', 5, '1'),
(658, 'Chench bhaji', 'Call/Watsap-7987844241 RAIGARH BAZAR', 1, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60420f4a6b2a2.jpeg', '60420f4a6b706.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:30:26', 'Suraj Kumar Chauhan', '2021-03-17 10:51:40', 5, '1'),
(659, 'Bhindi', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6042111869cdb.jpeg', '604211186a333.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:38:08', 'Suraj Kumar Chauhan', '2021-03-17 10:51:51', 5, '1'),
(660, 'Semi', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6042121c425b2.jpeg', '6042121c42789.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:42:28', 'Suraj Kumar Chauhan', '2021-03-17 10:52:08', 5, '1'),
(661, 'Kundru', 'Call/Watsap-7987844241 RAIGARH BAZAR', 8, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6042127c20b89.jpeg', '6042127c21b71.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:44:04', 'Suraj Kumar Chauhan', '2021-03-17 10:52:50', 5, '1'),
(662, 'Dorka', 'Call/Watsap-7987844241 RAIGARH BAZAR', -6, '0.00', 5, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604213bdf0f1f.jpeg', '604213bdf10ce.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:49:25', 'Suraj Kumar Chauhan', '2021-03-17 10:53:24', 5, '1'),
(663, 'Taroi > Call/Watsap-7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 0, '0.00', 5, '0.00', '2021-05-03', 's', 's', 's', 'RAIGARH BAZAR', '604214737d8bf.jpeg', '604214737da1d.jpeg', 'Suraj Kumar Chauhan', '2021-03-05 16:52:27', 'Suraj Kumar Chauhan', '2021-03-17 10:53:39', 5, '1'),
(664, 'Tarbuj', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604361c788536.jpeg', '604361c78926f.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 16:34:39', 'Suraj Kumar Chauhan', '2021-03-17 10:53:51', 5, '1'),
(665, 'kinu', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604365ea56478.jpeg', '604365ea56655.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 16:52:18', 'Suraj Kumar Chauhan', '2021-03-17 10:54:05', 5, '1'),
(666, 'Santra', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60438bcb1e3b2.jpeg', '60438bcb1e702.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 16:54:19', 'Suraj Kumar Chauhan', '2021-03-17 10:54:38', 5, '1'),
(667, 'angur', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604377eab7384.jpeg', '604377eab8442.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 18:09:06', 'Suraj Kumar Chauhan', '2021-03-17 10:55:03', 5, '1'),
(668, 'Kala angur - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604380ae1953b.jpeg', '604380ae1a8f7.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 18:40:26', 'Suraj Kumar Chauhan', '2021-03-17 10:55:17', 5, '1'),
(669, 'Chiku - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604381ffb6b39.jpeg', '604381ffb74ff.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 18:52:07', 'Suraj Kumar Chauhan', '2021-03-17 10:55:28', 5, '1'),
(670, 'Apple - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6043839741c55.jpeg', '60438397426c4.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 18:58:55', 'Suraj Kumar Chauhan', '2021-03-17 10:55:45', 5, '1'),
(671, 'Pine apple - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '604384c7ed454.jpeg', '604384c7ed699.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 19:03:59', 'Suraj Kumar Chauhan', '2021-03-17 10:56:20', 5, '1'),
(672, 'kivi (chhota) - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60438727c66d1.jpeg', '60438727c6863.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 19:14:07', 'Suraj Kumar Chauhan', '2021-03-17 10:56:30', 5, '1'),
(673, 'Anaar - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 9, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60438804d76b4.jpeg', '60438804d7851.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 19:17:48', 'Suraj Kumar Chauhan', '2021-03-17 10:56:43', 5, '1'),
(674, 'Aam - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '6043887e8a406.jpeg', '6043887e8b2e7.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 19:19:50', 'Suraj Kumar Chauhan', '2021-03-17 10:57:08', 5, '1'),
(675, 'Kela - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 4, '0.00', 9, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60438956adaf0.jpeg', '60438956adcaf.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 19:23:26', 'Suraj Kumar Chauhan', '2021-03-17 10:57:43', 5, '1'),
(676, 'Musammi - 7987844241', 'Call/Watsap-7987844241 RAIGARH BAZAR', 10, '0.00', 6, '0.00', '', '', '', '', 'RAIGARH BAZAR', '60438a1042ab2.jpeg', '60438a1042c4a.jpeg', 'Suraj Kumar Chauhan', '2021-03-06 19:26:32', 'Suraj Kumar Chauhan', '2021-05-09 20:35:29', 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `name`, `status`) VALUES
(1, 'Piece', 1),
(2, 'size', 1),
(3, 'None', 1),
(4, 'kg', 1),
(5, 'dozen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `cid` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `con` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `cid`, `pid`, `con`) VALUES
(70, '404', '629', '2021-02-21 11:32:12'),
(123, '412', '630', '2021-02-25 16:17:44'),
(130, '404', '665', '2021-03-08 19:45:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address_master`
--
ALTER TABLE `tbl_address_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_banner_master`
--
ALTER TABLE `tbl_banner_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category_master`
--
ALTER TABLE `tbl_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_master`
--
ALTER TABLE `tbl_contact_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_cookies_master`
--
ALTER TABLE `tbl_customer_cookies_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_master`
--
ALTER TABLE `tbl_customer_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_notification_master`
--
ALTER TABLE `tbl_notification_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_parent_master`
--
ALTER TABLE `tbl_order_parent_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_master`
--
ALTER TABLE `tbl_product_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address_master`
--
ALTER TABLE `tbl_address_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner_master`
--
ALTER TABLE `tbl_banner_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category_master`
--
ALTER TABLE `tbl_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contact_master`
--
ALTER TABLE `tbl_contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_customer_cookies_master`
--
ALTER TABLE `tbl_customer_cookies_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `tbl_customer_master`
--
ALTER TABLE `tbl_customer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=488;

--
-- AUTO_INCREMENT for table `tbl_notification_master`
--
ALTER TABLE `tbl_notification_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_parent_master`
--
ALTER TABLE `tbl_order_parent_master`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_product_master`
--
ALTER TABLE `tbl_product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
