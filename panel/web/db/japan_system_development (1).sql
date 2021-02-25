-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 09:18 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japan_system_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_pass`
--

CREATE TABLE `current_pass` (
  `web_id` int(10) NOT NULL DEFAULT '0',
  `password` varchar(1024) CHARACTER SET sjis NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `password`, `email`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'D000123', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'saiyannaing259768648@gmail.com', '123456', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `db_account`
--

CREATE TABLE `db_account` (
  `id` int(10) NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis DEFAULT '',
  `db_name` varchar(255) CHARACTER SET sjis NOT NULL DEFAULT '',
  `db_user` varchar(255) CHARACTER SET sjis NOT NULL DEFAULT '',
  `db_count` int(10) NOT NULL DEFAULT '0',
  `pass` varchar(255) CHARACTER SET sjis NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_account`
--

INSERT INTO `db_account` (`id`, `domain`, `db_name`, `db_user`, `db_count`, `pass`) VALUES
(1, 'test.happywinds.net', 'testdb', 'testdb', 1, 'Japansys7523'),
(5, 'example.com', 'concat(\'my\',\'s\',\'ql\')', 'concat(\'ro\',\'ot\')', 1, 'Japansys7523'),
(9, 'mobilesolution.mobi', 'mobilesolution', 'mobile', 1, 'mobile1688!!'),
(10, 'ii-net-ii.com', 'Antenna', 'nekiryu', 1, '1025xmen'),
(11, 'ff14note.com', 'hydaelyn', 'winserv', 1, 'MySQL@2013@Aug'),
(12, 't-t.happywinds.net', 'test_db', '201312', 1, '201312'),
(13, 'mobsrch.com', 'mobsrchdb', 'admin', 1, 'dbpass'),
(14, 'cherry-coat.co.jp', 'cc_db', 'ccdb_admin', 1, 'cc_wpdb2014'),
(15, 'hl231083.happywinds.net', 'qianqian1530', 'qianqian1530', 1, 'qianqian'),
(16, 'usael.happywinds.net', 'usael', 'usael', 1, 'usael'),
(17, 'honbushinserver.net', 'HBMDB2014', 'honbadmin', 1, 'Ew74mdyh'),
(18, 'sakura-soft.jp', 'BLOGWORDPRESS', 'sakurasoft', 1, '99csin'),
(19, 'aeromexico.jp', 'aeromexico', 'tsjsql', 1, 'tsvQ3ZV2'),
(20, 'reno-win.com', 'hirobadb', 'cq_cis', 1, 'cq_cis'),
(21, 'fbeans.happywinds.net', 'office_db', 'fbsuser', 1, 'password1234'),
(22, 'imakomei.kanagawa.jp', 'imakomeidb', 'imakomei', 1, 'number10'),
(23, 'blog.e-click.jp', 'e-clickdb', 'blog.e-click', 1, 'K3qNC2sd'),
(24, 'itwbps.com', 'jtcweb_DB1', 'itcweb', 1, 'itcec'),
(25, 'otasuke-pc.com', 'kazumucho', 'ktakahashi', 1, '7YKashKG'),
(26, 'necoichi.co.jp', 'catone', 'catone', 1, 'p@ssw0rd'),
(27, 'iakum.com', 'iakum_db', 'iakum_admin', 1, '7SzS5QgSbv3L'),
(28, 'kimono-kawakyu.com', 'kawaqdb1', 'dbadmin', 1, 'hurisode20sai'),
(29, 'impression-group.co.jp', 'impression-group.co.jp', 'D0204893', 1, 'QsYYP8EA'),
(30, 'gallery-m.net', 'gallerymdb01', 'gmdbadmin', 1, 'yamamomo23'),
(31, 'aab-japan.co.jp', 'demoaab', 'kong', 1, '123456'),
(32, 'eikisoft.com', 'eikisoft_db', 'eikisoft', 1, 'muD73XCg'),
(33, 'chintainoyorozu.com', 'wpdb', 'wpadmin', 1, 'password'),
(34, 'honest-japan.co.jp', 'HonestMySql', 'HonestMySqlAdmin', 1, 'HonestMySql2015'),
(35, 'panaromasistem.com', 'AKamBG', 'Akam', 1, 'Ak136014'),
(36, 'starter.winserver.ne.jp', 'live_check', 'Starter_Live_Check', 1, 'JVdC52DbJVdC52Db'),
(37, 'shingakusha-aicass.co.jp', 'aicass', 'shingakusha', 1, '1234Abcd!'),
(38, 'hikaru.happywinds.net', 'mydb', 'hatayama', 1, 'hatayama6487'),
(39, 'ag-telecom.jp', 'aicass_t', 'anabuki', 1, '1234Abcd!'),
(40, 'blacklist.happywinds.net', 'blacklist', 'blacklist', 1, 'BDtEtsfzJSCzLvmB'),
(41, 'npo-awanoumi.org', 'awanoumidb', 'dbmaster', 1, 'hukuhara1'),
(43, 'koshiba.happywinds.net', 'takumi', 'koshiba', 1, '5191hide'),
(44, 'yamafumi.jp', 'counter', 'yamafumi.jp', 1, 'f8XdQb9m'),
(45, 'usael.co.jp', 'USAEL_HP', 'usaeladmin', 1, 'kero3pi'),
(46, 'imcc.co.jp', 'imccdb', 'imcc.co.jp', 1, 'Gx8tZvgS'),
(47, 'blog2.e-click.jp', 'blog2eclick', 'blog2eclick', 1, 'jC4KRiQ6'),
(48, 'eva20th.com', 'eva20th', 'eva20th', 1, 'eva3597'),
(49, 'ds-express-web.co.jp', 'expressdb', 'express-web', 1, 'x4qkSIsx'),
(50, 'cleandelivery.co.jp', 'cleandb', 'cleandelivery', 1, 'horiguchiC'),
(51, 'anpools.com', 'anpools', 'anpools', 1, 'lastchild'),
(52, 'tavivi.com', 'TAVIVI', 'taviviadmin', 1, 'kero3pi'),
(53, 'misho-ryu.com', 'misho_db', 'misho_admin_user', 1, 'z4B4Zw2LEBS8'),
(54, 'pitt-tracking.jp', 'TBMYSQL', 'tb01', 1, 'fag!oA@rmo'),
(55, 'iiterview.com', 'IITERVIEW', 'iiterviewadmin', 1, 'kero3pi'),
(56, 'spls.co.jp', 'wp', 'spls', 1, 'spls0901'),
(57, 'babymetal.tokyo.jp', 'babymetal', 'moametal', 1, 'Airin0412'),
(58, 'cadstation.co.jp', 'cadstation', 'cadstation', 1, 'mari1122'),
(59, 'pharmastream.happywinds.net', 'pharmatream', 'takegoodcare', 1, 'tgc57383656'),
(60, 'friends-hd.happywinds.net', 'friends-db', 'friends-db_user', 1, 'Friends2015'),
(61, 'move-com.jp', 'wordpress', 'wordpress_user', 1, 'MildXzF1'),
(62, 'webhand.jp', 'odersystem', 'usrtg277', 1, 'psygd33hgk'),
(63, 'cosmosoft.org', 'CSMySQL', 'CSDBAdmin', 1, 'satomi-29'),
(64, 'sun-rental.net', 'sun_rental', 'sun_rental', 1, 'sunrental123456'),
(65, 'msms.co.jp', 'DB_user7112', 'msms.co.jp', 1, 'i5wxAMvO'),
(66, 'rezept-system.com', 'rezept__customer', 'tempura', 1, 'rwy25761'),
(68, 'stockweather.happywinds.net', 'stockweather', 'stockweather', 1, 'm@0JkHb%sj'),
(69, 'usf.happywinds.net', 'db_usf', 'usf', 1, 'usf'),
(70, 'soga-sz.co.jp', 'dbsoga', 'sogasz', 1, '19590528'),
(71, 'rtg-sys.com', 'icate', 'findtech', 1, 'Findtech@@1'),
(72, 'happylage.happywinds.net', 'happylage', 'sa', 1, 'happylage'),
(73, 'good-leaf.happywinds.net', 'goodleaf_', 'goodleaf', 1, '7ra468cPJb'),
(74, 'belno.jp', 'ConstSiteDB', 'userBLN2009', 1, 'ygtBELNO.3749'),
(75, 'jyujinkai.happywinds.net', 'IntranetDB', 'densan', 1, 'densan207'),
(76, 'drums.happywinds.net', 'TESTSC0', 'drums111', 1, 'mana0927'),
(77, 'luckysmile.cc', 'luckysmile', 'luckysmile', 1, 'ZhtR2biy'),
(78, 'akagi-base.jp', 'eccubedb', 'akabibaseuser', 1, 'p@ssw0rd16'),
(79, 'kawahata.happywinds.net', 'kawahata', 'kawahata', 1, 'kawahata0308'),
(80, 'qsintedu.jp', 'JapaneseCollege', 'JapaneseCollgeg', 1, 'Gr0924326188'),
(81, 'nss.happywinds.net', 'ssn', 'papa787', 1, 'sm195801'),
(82, 'nexdesign.biz', 'SQLDB', 'owner', 1, 'B5PkFNFd'),
(83, 'yuh.happywinds.net', 'yuhblog', 'yuh', 1, 'RivaTNT2Ti'),
(84, 'deathcannon.com', 'blog_db', 'yukkurileon', 1, 'z3EznHpdAxQ4'),
(85, 'satoyadrug.com', 'test', 'daisho', 1, 'm6FGH29k'),
(86, 'eigogakusyu-web.com', 'eigo', 'eigo_user', 1, '0okm9ijn'),
(87, 'safetylearning.happywinds.net', 'safety_learning', 'sfuser', 1, 'sfmanagerPassw0rd'),
(88, 'testwp.happywinds.net', 'testwp', 'testwp', 1, '5CuBR2kdT5E2T7QWYqKa'),
(89, 'code-builder.happywinds.net', 'MySql_db', 'su', 1, '0110'),
(90, 'soc-jp.com', 'so', 'soc', 1, 'soc317615'),
(91, 'yisys.happywinds.net', 'yisysdb', 'yisyuser', 1, 'yisyspass'),
(92, 'ninjaz.jp', 'ninjazjp', 'yukke', 1, '*7t2n3s!'),
(93, 'dlodsupport.com', 'odsupport', 'odmaster', 1, 'master01'),
(94, 'wakiyamagumi.co.jp', 'wakiyamagumidb', 'wakiyamagumi', 1, 'Aj67sWTV'),
(95, 'lf-gicon.com', 'GICONDB', 'giconuser', 1, 'gicon'),
(96, 'hanyu-riyu.jp', 'wordsdb', 'tiger', 1, 'hanrilaoshi'),
(97, 'mst-sas.jp', 'mstsas_db', 'mstdbadmin', 1, 'Fbdbadmin2015/'),
(98, 'bbs.happywinds.net', 'MSHOP', 'MDR625', 1, 'QaWs@*p;'),
(99, 'gaithu001.happywinds.net', 't1', 'turando', 1, 'turando'),
(100, 'egg3.jp', 'youtube', 'eggegg', 1, 'As122122!'),
(101, 't-kiso.co.jp', 't-kiso', 't-kiso01', 1, 'lEXeDPp'),
(102, 'iltempoworks.jp', 'iltewks_db', 'miyashitan', 1, '8uBSANc6aXhF'),
(103, 'accessory-parts.jp', 'eccube', 'ec', 1, 'htt'),
(104, 'zk2kaizen.jp', 'zk2zkks', 'ZK2ZKKS_admin', 1, 'ZK2ZKKS_admin?'),
(105, 'smart.happywinds.net', 'kakudb', 'smartadim', 1, 'smart1620'),
(106, 'chiwasaba.com', 'steampanquish', 'chiwa', 1, 'amanon6911'),
(107, 'qto.co.jp', 'db1018341_akio', 'u1018341_akio', 1, 'mpvpanic'),
(112, 'pkchome.happywinds.net', 'pkcsns', 'snsalladin', 1, 'Krsn5633-'),
(114, 'momijinet.org', 'momijidb', 'PronotecDBAdmin', 1, 'Pronotec1'),
(115, 'blog.4689.jp', 'blog4689', 'blog4689', 1, 'senkakudo'),
(116, 'logipac.jp', 'logipac', 'logipac', 1, 'logi6613'),
(117, 'cdss001.happywinds.net', 'cdss_db001', 'cdss001', 1, 'zpnQb7JE'),
(118, 'mkpg-lab.happywinds.net', 'blog', 'blogac', 1, '23pmiWEp0txijutR8UlWBUQZ'),
(119, 'iyah.info', 'iyahDB', 'sysadmin', 1, 'sysadminpass'),
(120, 'kobe-rental.net', 'kobeWH', 'koberental', 1, 'EG83bc29p'),
(121, 'noteachnolearn.com', 'sidtdb', 'totoronokokoro', 1, 'w*8M5cDR&Fm4&L62!o&q8yrg'),
(122, 'pc-web.jp', 'pcweb', 'pcweb-user', 1, 'pcweb-pass9999'),
(123, 'uths.happywinds.net', 'SHOESDB', 'administrator', 1, 'Fyjsfyh6'),
(124, 'rightpath.co.jp', 'mydbrightpath', 'myrightpath', 1, '9un3fYBU'),
(125, 'securedriven.com', 'sie_securedriven_db_01', 'sie_mysql_user', 1, 'PFU@8kKGd_A_;rkgQd;7QBJnSfzmu-ZA9BfY1iVpbv81-UyKJCvc8olAcb~92H66'),
(126, 'prozbacs.co.jp', 'prozbacs_wordpress', 'prozbacs', 1, 'wG85mLeU'),
(127, 'exifsum.com', 'myhobby', 'yoichi', 1, 'watanabe417'),
(128, 'yokohama-ootani.com', 'ootanidb', 'ootani', 1, 'msys0820'),
(129, 'window-bank.com', 'earth_DB', 'earth_0500', 1, 'e1234567'),
(130, 'kawamura3.happywinds.net', 'kawamura3', 'kawamura3', 1, 'Nv4PXW6S'),
(131, 'kawamura2.happywinds.net', 'wpblog', 'kawamura2', 1, 'Nv4PXW6S'),
(132, 'testam.happywinds.net', 'testam', 'testsql', 1, 'sqlsql'),
(133, 'muroty.happywinds.net', 'MurotoMySQL', 'muroty', 1, 'P@ssw0rd'),
(134, 'vinbows10.com', 'blogdb', 'Nights', 1, 'Etemal0t`9Mys'),
(135, 'toua-k.co.jp', 'toua-k', 'toua-user', 1, 'q5SFVTrZ'),
(136, 'acew.info', 'Ace', 'acUser', 1, 'acPass'),
(139, 'wtps.happywinds.net', 'wtpsdb', 'akasasa', 1, 'shiraishi'),
(140, 'patentstudio.net', 'ps-sql', 'db-admin', 1, 'VELBUaFx'),
(141, 'sanyou-system.happywinds.net', 'sqldata', 'sanyou-system', 1, 'Sns7352sql'),
(142, 'pachinkodatebunseki.com', 'MailCollection', 'sadmin', 1, '3Smt2017c'),
(143, 'hmn.ne.jp', 'hmnwp', 'hmnadmin', 1, 'hmn0309'),
(144, 'justy.happywinds.net', 'db', 'justy', 1, 'justy0426'),
(145, 'r-skin.happywinds.net', 'rsdb', 'user', 1, 'password'),
(146, 'akuzawa-seikei.jp', 'akuzawawp', 'msadmin', 1, 'hmn0309'),
(147, 'pikopapa.happywinds.net', 'PikoDbs00', 'piko', 1, 'Inet1903'),
(148, 'nightidol.com', 'naightidol_db', 'naight_idol', 1, 'naoya0711'),
(149, 'enjoysystem.co.jp', 'wordpress_enjoysystem', 'wordpress_enjoysystem', 1, 'BLjCR5VE'),
(150, 'ryuoko.happywinds.net', 'ryuoko', 'ryuoko', 1, 'bd8Tf7dEcJyo'),
(151, 'wtt.happywinds.net', 'bellshop', 'belladmin', 1, 'bellbell0099'),
(152, 'nextstage.happywinds.net', 'NextStage', 'Tyuson', 1, '304634'),
(153, 'Tsunagu-Shop.com', 'TSUNAGDB', 'TSUNAG_U1', 1, 'TSUNAG_P1'),
(154, 'team-chan3.happywinds.net', 'team-chan3', 'team-chan3', 1, 'MoXWWP44uAgv'),
(155, 'nayose.net', 'nayose', 'hustle', 1, 'komon'),
(156, 'kiseki.pro', 'kisekidb', 'kiseki', 1, 'JmwkPRc6LBsQ'),
(157, 'mlmjapan.jp', 'mlmjapanmydb', 'mlmjapanmyuser', 1, '201803MysqlDbMlmJapan'),
(158, 'gravure-movie.info', 'gravure-movie', 'gravure-movie', 1, 'jWJnV4dSybUs'),
(159, 'uone-system.happywinds.net', 'uonesysdb', 'uoneadmin', 1, 'D6VCoN68bB3x'),
(160, 'yamaguchi-1.gr.jp', 'myyah', 'yahAdmin', 1, 'giUvb24F'),
(161, 'mec-dnc.jp', 'mec_repo', 'mec', 1, 'mecmec7511'),
(163, 'RIoT.happywinds.net', 'RIoT_free_data', 'RIoT', 1, 'kaminositu'),
(164, 'crossco.happywinds.net', 'crossco_wp', 'crossco', 1, 'iqmv6mVq3gJqSSg6'),
(165, 'sampo.happywinds.net', 'sampoerp', 'erp', 1, 'trade'),
(175, 'janbo.happywinds.net', 'janbo_db', 'madeinjunk', 1, 'monroe109'),
(176, 'pinpara-av.com', 'pinpara-av', 'pinpara-av.com', 1, 'xjG7UHMJDwtB'),
(178, 'ssltest2018.happywinds.net', 'Deletetest', 'bhbhbh', 1, 'Japansys7523'),
(179, 'testShared2016.com', 'testShared2016', 'testShared2016', 1, 'testShared2016'),
(180, 'peaksoftware.jp', 'peakdb', 'peaksoftware', 1, 'sa01to11'),
(181, 'maison-sales.com', 'maison-sales-db', 'maison-sales-user', 1, 'Acb43aQ'),
(184, 'jlltv.happywinds.net', 'jlltv', 'jlltv.happywinds', 1, 'Fa4EuW3b4P7M'),
(185, 'digitalmado.com', 'winserver_DB001', 'digitalmado', 1, 'dejidejimonmon'),
(186, 'teraomega.info', 'terabase', 'mytera', 1, '3E2sj3QC'),
(188, 'yunia.co.jp', 'wp_DB', 'wRWks3mSsirv', 1, 'Kjv7qxHkXbNE'),
(189, 'tsunageru-hirogaru.com', 'tsunageru-hirogaru', 'takeru009jp', 1, 'VZ6i37001'),
(190, 'metz01.happywinds.net', 'metzmydb', 'metzmyuser', 1, 'metz#123456#'),
(191, 'necomo.jp', 'wordpress_db', 'necomo', 1, 'Ghd00464'),
(193, 'test.assistup.co.jp', 'test_new_shared', 'test_new_shared', 1, 'Japansys7523'),
(194, 'kstascal.com', 'dbwordpress', 'yamada', 1, '09251021'),
(196, 'loquy.jp', 'loquy', 'loquy', 1, '1QAZ2WSX3EDC'),
(197, 'tomoplan.asia', 'tomoplan', 'akikonagata', 1, 'tomoplan88'),
(198, 'cenfill.happywinds.net', 'sohoishidb', 'keiishi', 1, 'zap97itc'),
(199, 'adhd.happywinds.net', 'labo-tn_adhd2', 'labo-tn', 1, 'Pa5MntGF'),
(200, 'ja-ibarakiasahi.or.jp', 'ibarakiasahi', 'melon', 1, 'melon'),
(201, 'buono-system.net', 'buonosystemnet', 'buonosystem', 1, 'fRgNiJGfDZ5Z'),
(202, 'tomoplaninc.com', 'tomoplaninc', 'tomoplaninc', 1, 'tomoplan88'),
(203, 'agkservice.happywinds.net', 'gspc120_logdb', 'gspc120', 1, 'Sunpotgspc12!'),
(205, 's2019.assistup.co.jp', 's2019', 's2019', 1, 'Japansys7523'),
(207, 'myPKfit.happywinds.net', 'mypkfit_2019_ja', 'pk_rFgkbNM', 1, 'YVgn7Cm5'),
(208, 'mutton.happywinds.net', 'a', 'a', 1, 'a'),
(211, 'fsy-e.com', 'fsy-e.com', 'zouwenbin', 1, 'zouqwenwbine'),
(212, 'ases.co.jp', 'ases', 'asesuser', 1, 'Shiraishi'),
(213, 'izunouhaku.jp', 'nouhaku_db', 'nouhaku', 1, 'msys0820'),
(214, 'eishisc.jp', 'wtpsdb-eishi', 'eishisc', 1, '510eishi'),
(215, 'maruyoshi.happywinds.net', 'MysqlDatabase', 'maruyoshi', 1, 'cxw02646-myco'),
(216, 'gsclub.happywinds.net', 'gsclubtest', 'gsclubtest', 1, 'Em3dgt7WTj6d'),
(217, 'sc-shikoku.net', 'shikoku', 'akasasa2000', 1, 'shiraishi3987'),
(218, 'gsclub-member.com', 'gsc-member_db', 'gsc-member', 1, 'e839cfg2fi9z'),
(219, 'SG-PDMS.com', 'PG_PMS', 'Amawari', 1, '1151383'),
(220, 'tatami-nihon1.com', 'osada_db', 'osada_dbmaster', 1, 'yoiigusa2019'),
(221, 'devhyb.happywinds.net', 'road', 'hybrid', 1, 'k1sarazu12345!'),
(222, 'waf.winserver.ne.jp', 'winservertest', 'SA', 1, 'Japansys7523'),
(223, 'yamaseki.co.jp', 'yamasekiMysql1', 'yamaguchisekizai', 1, 'ergino50b1'),
(224, 'red-we.com', 'redDB', 'red', 1, 'Red20181106'),
(225, 'mirror.happywinds.net', 'yoshizawa', 'yoshizawa_makoto', 1, '7128'),
(226, 'qrzkan.com', 'qrzkan', 'qrzkan', 1, 'red20181106'),
(227, 'setmawhtay.com', 'testing', 'test', 1, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `db_account_for_mssql`
--

CREATE TABLE `db_account_for_mssql` (
  `id` int(10) NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis DEFAULT NULL,
  `host_name` varchar(255) CHARACTER SET sjis NOT NULL,
  `host_ip` varchar(15) NOT NULL,
  `db_name` varchar(255) CHARACTER SET sjis NOT NULL,
  `db_user` varchar(255) NOT NULL,
  `db_count` int(10) NOT NULL DEFAULT '0',
  `pass` varchar(255) CHARACTER SET sjis NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_account_for_mssql`
--

INSERT INTO `db_account_for_mssql` (`id`, `domain`, `host_name`, `host_ip`, `db_name`, `db_user`, `db_count`, `pass`) VALUES
(1, 'chuoshiki.com', '', '', 'chuoshiki', 'vcountry', 1, 'p9gcv0dt'),
(2, 'coquia-salon.com', '', '', 'coquia-salon', 'coquia-salon', 1, 'skshnichr'),
(3, 'furatto-space-kongo.net', '', '', 'furattodb', 'furattodb2018', 1, 'pass+S2018'),
(4, 'hamano-nouen.com', '', '', 'agdb', 'agdb', 1, 'ag_user01'),
(6, 'nmtchuko.com', '', '', 'nmtchuko_DB', 'nishiharamachine', 1, 'Gokeb39kUk'),
(7, 'ordia.biz', '', '', 'ordia', 'ordiaadmin', 1, '0rd1@23'),
(8, 'pkchome.happywinds.net', '', '', 'UMADB', 'PUBpkc', 1, 'Krsn5633-'),
(9, 'prestige.happywinds.net', '', '', 'PrestigeDB', 'prestige', 1, 'prestigedbpw2016'),
(10, 'shisuikai.info', '', '', 'shisuikai_tmail', 'tokoen', 1, 'stm@2018'),
(11, 'wtt.happywinds.net', '', '', 'wtt', 'wttuser', 1, 'wttPass2015'),
(12, 'smilesuidou.happywinds.net', '', '', 'SmileSuidou', 'smile123787', 1, 'suidou787123'),
(13, '616.co.jp', '', '', '616', '616', 1, 'skshnichr'),
(14, '7pairs.com', '', '', '7pairs', 'dbuser', 1, ''),
(15, 'actfit.jp', '', '', 'actfit', 'actfit', 1, ''),
(16, 'africa-flower.com', '', '', 'africa-flower', 'africa-flower', 1, ''),
(17, 'afrikarose.com', '', '', 'afrikarose', 'afrikarose', 1, ''),
(18, 'agcalfphoto.com', '', '', 'ag_calfphoto', 'aguser', 1, ''),
(19, 'airin1931.com', '', '', 'airin_db', 'airin', 1, ''),
(20, 'ajisai-kyotaku.com', '', '', 'ajisai-kyotaku_com', 'ajisai-kyotaku', 1, ''),
(21, 'ajisai-kyotaku.com', '', '', 'ajisai-kyotaku_com2', 'ajisai-kyotaku', 1, ''),
(22, 'akanbi.net', '', '', 'akanbi', 'akanbi2', 1, ''),
(23, 'akanbi.net', '', '', 'akanbi2', 'akanbi2', 1, ''),
(24, 'alpsdm.com', '', '', 'AlpsMA', 'AlpsMAUser', 1, ''),
(25, 'amaclub.happywinds.net', '', '', 'AmatechOnline', 'AOnlineSA', 1, ''),
(26, 'amajapan.info', '', '', 'AMA_DB', 'system', 1, ''),
(27, 'api.spls.co.jp', '', '', 'task', 'spls', 1, ''),
(28, 'aqua-salon.cc', '', '', 'aqua-salon', 'aqua-salon', 1, ''),
(29, 'autofile.info', '', '', 'autofile-info', 'autofile', 1, ''),
(30, 'ayumilaw.jp', 'mssql8.winserver.ne.jp', '211.8.18.122', 'ayumilaw', 'ayumilaw', 1, 'skshnichr'),
(31, 'babymetal.tokyo.jp', '', '', 'babymetal', 'moametal', 1, ''),
(32, 'ban.ewinds.net', '', '', 'DBBN', 'mai0528', 1, ''),
(33, 'bbey.net', '', '', 'bbey', 'bbey', 1, ''),
(34, 'belno.jp', '', '', 'dbConst', 'userBLN', 1, ''),
(35, 'bigot-tokyo.co.jp', '', '', 'bigot-tokyo', 'bigot-tokyo', 1, ''),
(36, 'bluemoon-lomi.com', '', '', 'bluemoon-lomi ', 'bluemoon-lomi ', 1, ''),
(37, 'blue-radio.com', '', '', 'blue-radio_db', 'blue-radio', 1, ''),
(38, 'bool.co.jp', '', '', 'boolserver_db ', 'boolsoftware ', 1, ''),
(39, 'booldb2012.jp', '', '', 'booldb2012', 'boolsoftware', 1, ''),
(40, 'casa-di-venere.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'casa-di-venere', 'casa-di-venere', 1, 'skshnichr'),
(41, 'cfkrekka.jp', '', '', 'cfkrekka_db', 'cfkrekka.jp', 1, ''),
(42, 'clubtsu.com', '', '', 'clubtsu', 'comang', 1, ''),
(43, 'compare-to.com', '', '', 'CompareTo', 'comparetoweb_user', 1, ''),
(44, 'coquia-salon.com', '', '', 'coquia-salon', 'coquia-salon', 1, ''),
(45, 'cosmosoft.org', '', '', 'COSMOSOFTDB', 'DBAdmin', 1, ''),
(46, 'create--plus.com', '', '', 'createplus', 'cuser', 1, ''),
(47, 'cuorabijou.com', '', '', 'cuorabijou', 'cuorabijou', 1, ''),
(48, 'deathcannon.com', '', '', 'data_db', 'yukkurileon', 1, ''),
(49, 'dialysis.ewinds.net', '', '', 'dialysis', 'dialysis', 1, ''),
(50, 'dmfbs.com', '', '', 'dmfbs', 'dmfbs', 1, 'skshnichr'),
(51, 'eikisoft.com', '', '', 'BlogEngineNet', 'eikisoft', 1, ''),
(52, 'e-iwamigin.net', '', '', 'e-iwamigin', 'bus_r', 1, ''),
(53, 'en-fleur.com', '', '', 'en-fleur', 'en-fleur', 1, ''),
(54, 'estheururu.com', '', '', 'estheururu', 'estheururu', 1, ''),
(55, 'eu-country.com', '', '', 'eu-country', 'eu-country', 1, ''),
(56, 'fbjm.net', '', '', 'fbjm', 'fbjm', 1, ''),
(57, 'fino-salon.com', '', '', 'fino-salon', 'fino-salon', 1, ''),
(58, 'fukamail.com', '', '', 'fukamail', 'fukamail', 1, ''),
(59, 'gallery-kitano.com', '', '', 'GALLERYDB', 'gallerysa', 1, ''),
(60, 'garando.com', '', '', 'GarandoSQLDB', 'yuga_bichon', 1, ''),
(61, 'gsclub-member.com', '', '', 'gsclub-member_db', 'gsclub-member', 1, ''),
(62, 'hana-bito.com', '', '', 'hana-bito', 'hana-bito', 1, ''),
(63, 'hirogaki.net', '', '', 'Hirogaki_System', 'hsdb2014', 1, ''),
(64, 'hitocoma.com', '', '', 'hitocoma', 'hitocoma', 1, ''),
(65, 'hoken-create.co.jp', '', '', 'worholidb', 'lnavi', 1, ''),
(66, 'DentalSearch.happywinds.net\r\n', '', '', 'DentalSearch_DB', 'dental_search_admin', 1, 'ty58259410'),
(67, 'amatech.happywinds.net', '', '', 'AmatechDB', 'AmatechSA', 1, '#ama0720'),
(68, 'apple-ph.happywinds.net', '', '', 'apple-ph', 'adapple-ph', 1, 'w9J8ALRm'),
(69, 'arneos-sys.happywinds.net', '', '', 'osakasys', 'adminos', 1, 'j4igh2v21fp'),
(70, 'cdss001.happywinds.net', '', '', 'cdss_db01', 'cdss001', 1, 'zpnQb7JE'),
(71, 'code-builder.happywinds.net', '', '', 'code-builder_db', 'code-builder', 1, '0110'),
(72, 'dev.tambaraskischool.com', '', '', 'TambaraSS_DEV', 'tssdbuser01', 1, 'sn0wandg0lf'),
(73, 'ds-express-web.co.jp', '', '', 'ds-express-web_db', 'express-web', 1, 'x4qkSIsx'),
(74, 'eco-sam.happywinds.net', '', '', 'ecosam', 'ecosam', 1, 'm6N5f4s2'),
(75, 'enfleurage-aoyama.com', '', '', 'enfleurage-aoyama', 'enfleurage-aoyama', 1, 'skshnichr'),
(76, 'engtwn.happywinds.net', '', '', 'EA2015', 'engtwn_admin', 1, 'engtwn_pwd'),
(77, 'estheberry-beauty.com', '', '', 'estheberry-beauty', 'estheberry-beauty', 1, 'skshnichr'),
(78, 'friends-hd.happywinds.net', '', '', 'friends-db', 'friends-db_user', 1, 'Friends2015'),
(79, 'frontierexpress.happywinds.net', '', '', 'frontierdb', 'adminft', 1, 'Pn4gC5cN'),
(80, 'fukuuraif.happywinds.net', '', '', 'DB_FUKUURAIF', 'fukuuraif', 1, 'fifdb8201'),
(81, 'gallery-k-ikebukuro.com', '', '', 'gallery-k-ikebukuro', 'gallery-k-ikebukuro', 1, 'skshnichr'),
(82, 'gnbeta.happywinds.net', '', '', 'gnbetadb', 'gndbadmin', 1, 'GnDbAdmin'),
(83, 'harahara.happywinds.net', '', '', 'D00_COMMON', 'D00_OWNER', 1, 'D00_PASSWORD'),
(84, 'i-click-administration.jp', '', '', 'icmail', 'icmail_user', 1, 'IclickIcmail07'),
(85, 'i-click-administration.happywinds.net', '', '', 'environment', 'environment_user', 1, 'IclickEnvironment07'),
(86, 'ikki218.happywinds.net', '', '', 'ikki218', 'ikki218Admin', 1, 'ikki218Password'),
(87, 'impression-group.co.jp', '', '', 'ImpGrpTest', 'imp-ad', 1, 'imp-grp-2009'),
(88, 'jyujinkai.happywinds.net', '', '', 'IntranetDB', 'densan', 1, 'densan207'),
(89, 'kagorin.happywinds.net', '', '', 'kagorintestdb', 'kagorin', 1, 'kdj374gfvfe'),
(90, 'kakuregasaron-matahari.com', '', '', 'kakuregasaron-matahari', 'kakuregasaron-matahari', 1, 'skshnichr'),
(91, 'kasaihoken-create.com', '', '', 'hokencreate', 'lifenavi', 1, 'S@bo10atama'),
(92, 'kennweb.happywinds.net\r\n', '', '', 'db1', 'kenndb1', 1, 'kenndb1'),
(93, 'kinoko.happywinds.net', '', '', 'kinoko', 'kinoko', 1, 'M7i8n6e3'),
(94, 'kowa-generic.ewinds.net', '', '', 'generic', 'generic', 1, 'katsunan'),
(95, 'makishima.happywinds.net', '', '', 'makishima_db', 'makishima', 1, 'msys1360'),
(96, 'matsu.happywinds.net', '', '', 'matsu_testdb', 'matsu_sa', 1, 'Az19750819'),
(97, 'myjabble.happywinds.net', '', '', 'Jabbler', 'Jabbler', 1, '1+5@Lw@y5'),
(98, 'nicesoft.happywinds.net', '', '', 'nicesoftdb', 'nicesoft', 1, 'CMzT6bQL'),
(99, 'pikopapa.happywinds.net', '', '', 'PikoDbs01', 'Inet500', 1, 'Inet1903'),
(100, 'prtool.happywinds.net', '', '', 'prtool', 'prtooluser', 1, '1qaZ2wsX'),
(101, 'salon-trois-soleil.com', '', '', 'salon-trois-soleil', 'salon-trois-soleil', 1, 'skshnichr'),
(102, 'seitai.happywinds.net', '', '', 'NishiSeitai', 'nishijima', 1, 'seitaiseitai171710'),
(103, 'sonicsan885.happywinds.net', '', '', 'DaigiDb', 'dbsysuser', 1, 'daigisys'),
(104, 'space000.happywinds.net', '', '', 'space000', 'space000.happywinds', 1, 'rUo5GVujDfAQ'),
(105, 'spiceoflife-salon.com', '', '', 'spiceoflife-salon', 'spiceoflife-salon', 1, 'skshnichr'),
(106, 'tg-pile.happywinds.net', '', '', 'tg-pile', 'tg-pileAdmin', 1, 'tg-pilePassword'),
(107, 'trump-external.happywinds.net', '', '', 'EGK', 'EGKUSER', 1, 'EGKPASS'),
(108, 'tsunageru-hirogaru.com', '', '', 'th001_db', 'takeru009jp', 1, 'VZ6i37001'),
(109, 'winbell.happywinds.net', '', '', 'lime', 'retas', 1, 'tamanegi0123#'),
(110, 'estheberry-beauty.com', '', '', 'estheberry-beauty', 'estheberry-beauty', 1, 'skshnichr'),
(111, 'kakuregasaron-matahari.com', '', '', 'kakuregasaron-matahari', 'kakuregasaron-matahari', 1, 'skshnichr'),
(112, 'nextstage.happywinds.net', '', '', 'nextstage', 'tyuson007', 1, '0492658994kawagoeshi'),
(113, 'salon-trois-soleil.com', '', '', 'salon-trois-soleil', 'salon-trois-soleil', 1, 'skshnichr'),
(115, 'yamaguchi-1.gr.jp', 'mssql3.winserver.ne.jp', '203.137.92.6', 'yah', 'yahAdmin', 1, 'giUvb24F'),
(118, 'akanbi.net', '', '', 'akanbi', 'akanbi', 1, 'skshnichr'),
(119, 'akanbi.net', '', '', 'akanbi2', 'akanbi2', 1, 'skshnichr'),
(120, 'aqua-salon.cc', '', '', 'aqua-salon', 'aqua-salon', 1, 'skshnichr'),
(121, 'asa33.org', '', '', 'asadb', 'ksait5', 1, 'Ks4349024'),
(122, 'befree-salon.com', '', '', 'befree-salon', 'befree-salon ', 1, 'skshnichr'),
(123, 'coquia-salon.com', '', '', 'coquia-salon', 'coquia-salon', 1, 'skshnichr'),
(124, 'fino-salon.com', '', '', 'fino-salon', 'fino-salon', 1, 'skshnichr'),
(125, 'hana-bito.com', '', '', 'hana-bito', 'hana-bito', 1, 'skshnichr'),
(126, 'hsystems.jp', '', '', 'NMZAIKO', 'SQLHOSOKAWA', 1, 'sqlHss113'),
(127, 'ikofood.com', '', '', 'ikofood', 'ikofood', 1, 'skshnichr'),
(128, 'i-s-c.jp', '', '', 'wtpsdb', 'akasasa', 1, 'Shiraishi'),
(129, 'kaiken-works.com', '', '', 'umbraco_db', 'umbraco ', 1, 'p@ssw0rd'),
(130, 'kakuta-lisa.com', '', '', 'kakuta-lisa', 'kakuta-lisa', 1, 'skshnichr'),
(131, 'karin-aroma.info', '', '', 'karin-aroma', 'karin-aroma', 1, 'skshnichr'),
(132, 'kjc.ne.jp', '', '', 'kjc', 'kjc', 1, 'skshnichr'),
(133, 'kurumu-salon.com', '', '', 'kurumu-salon', 'kurumu-salon', 1, 'skshnichr'),
(134, 'loquy.jp', '', '', 'loquy', 'loquy', 1, '1QAZ2WSX3EDC'),
(135, 'luna-miel.com', '', '', 'luna-miel', 'luna-miel', 1, 'skshnichr'),
(136, 'maison-sales.com', '', '', 'SDB_Demo', 'sdb', 1, 'wVR2ciJE'),
(137, 'miraicle.jp', '', '', 'isay_umc_miraicle', 'um_club', 1, 'urban1665'),
(138, 'nc-hawaii.com', '', '', 'nc-hawaii', 'nc-hawaii', 1, 'skshnichr'),
(139, 'ohtawaragt.jp', '', '', 'OhtawaraGt', 'otwrgt', 1, '.DbmsPass'),
(140, 'okes.jp', '', '', 'okes', 'okes', 1, 'skshnichr'),
(141, 'puananala.com', '', '', 'puananala', 'puananala ', 1, 'skshnichr'),
(142, 're-departure.com', '', '', 're-departure', 're-departure', 1, 'skshnichr'),
(143, 'revereve.jp', '', '', 'revereve', 'revereve', 1, 'skshnichr'),
(144, 'rurinail.com', '', '', 'rurinail', 'rurinail.com', 1, 'skshnichr'),
(145, 'sns-real.com', '', '', 'sns-real.com', 'sns-real.com', 1, 'skshnichr'),
(146, 'takahashi-kanon.com', '', '', 'takahashi-kanon', 'takahashi-kanon', 1, 'skshnichr'),
(147, 'takibi.love', '', '', 'dws_takibilove', 'dws_user', 1, 'yxOk81vf33E616ov'),
(148, 'tanaka-keiko.com', '', '', 'tanaka-keiko', 'tanaka-keiko', 1, 'skshnichr'),
(149, 'tete-room.com', '', '', 'tete-room', 'tete-room', 1, 'skshnichr'),
(150, 'tisland-japan.com', '', '', 'tisland-japan', 'tisland-japan', 1, 'skshnichr'),
(151, 'tochibi.net', '', '', 'TBSK', 'tbsk', 1, '.DbmsPass'),
(152, 'tsunagu-yoga.com', '', '', 'tsunagu-yoga', 'tsunagu-yoga', 1, 'skshnichr'),
(153, 'uranai-ikebukuro.com', '', '', 'uranai-ikebukuro', 'uranai-ikebukuro', 1, 'skshnichr'),
(154, 'wtt.happywinds.net', '', '', 'wtt', 'wttuser', 1, 'wttPass2015'),
(155, 'yunia.co.jp', '', '', 'yunia', 'yunia', 1, 'skshnichr'),
(156, 'oborodukiyo.info', 'mssql3.winserver.ne.jp', '203.137.92.6', 'oborodukiyoDB', 'oboro', 1, '0b0r0duk1y0DB'),
(157, 'kokukukan.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'WEBSYSTEM', 'kokukukan', 1, '3GhhxZ79Vtc6'),
(158, 'metz01.happywinds.net', 'mssql3.winserver.ne.jp', '203.137.92.6', 'metzdb', 'metzuser', 1, 'metz#123456#'),
(159, 'aisyslab.jp', 'mssql5.winserver.ne.jp', '203.137.92.252', 'LMSTEST', 'aisys', 1, 'ClassIcoc6161'),
(160, 'tmccare.com', 'mssql3.winserver.ne.jp', '203.137.92.6', 'CareSystem', 'tmc', 1, 'Tokaimegane3363'),
(161, 'uisoftweb.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'uismngdb', 'uis', 1, 'r3AvMqpqZYndTm2'),
(163, 'rexseed.net', 'mssql3.winserver.ne.jp', '203.137.92.6', 'REXSEED', 'rexseed', 1, 'ghV8jKtmiFn9xSh5'),
(164, 'terada-syoten.happywinds.net', 'mssql5.winserver.ne.jp', '203.137.92.252', 'terada_db', 'terada', 1, 'msys0926_tera'),
(165, 'test.assistup.co.jp', 'mssql6.winserver.ne.jp', '203.137.92.4', 'test_new_shared', 'test_new_shared', 1, 'Japansys7523'),
(166, 'r-sacs.com', 'mssql3.winserver.ne.jp', '203.137.92.6', 'RSACSDB', 'rsacsda', 1, 'rsacs@1qaz2wsx'),
(167, 'ikst.co', 'mssql6.winserver.ne.jp', '203.137.92.4', 'ikst', 'ikst', 1, 'GtJqj8fRyEkf'),
(169, 'mevius2.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'WELFAN_DB', 'WELFAN', 1, 'ZMsGpUa1ZXTi'),
(170, 'adhd.happywinds.net', 'mssql3.winserver.ne.jp', '203.137.92.6', 'labo-tn_adhd2', 'labo-tn', 1, 'FS0img#bk2Yztsc2afr1G4@Z'),
(171, 'pikoliberta.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'Liberta', 'PikoLiberta', 1, 'Blueberrygate139'),
(172, 'sparkers-studio.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'sparkers-studio', 'sparkers-studio', 1, 'ZAQ!xsw2ZAQ!xsw2'),
(173, 'higuchi.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'higuchi', 'higuchi', 1, 'Japansys7523'),
(174, 's2019.assistup.co.jp', 'mssql9.winserver.ne.jp', '211.8.18.124', 's2019', 's2019', 1, 'Japansys7523'),
(175, 'wanya-gf.jp', 'mssql6.winserver.ne.jp', '203.137.92.4', 'gfdb', 'wanya', 1, 'Puwapuwa0wa0'),
(176, 'digitalsquare.biz', 'mssql6.winserver.ne.jp', '203.137.92.4', 'Digital_Square', 'Virus_Key', 1, 'SzMDsRcH6UuY'),
(177, 'ebssystem.info', 'mssql6.winserver.ne.jp', '203.137.92.4', 'r_13285_ebs', 'r_13285_sa', 1, 'Jeewan@2009[Nibranshu]'),
(178, 'red-we.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'redwe', 'redwe1106', 1, '@Redwe20181106'),
(179, 'gikenkogyo.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'giken', 'gikenkogyo', 1, 'gRSswJcekhR6'),
(180, 'shl.toyama.jp', 'mssql6.winserver.ne.jp', '203.137.92.4', 'MSSQLSERVER', 'shlsql', 1, 'w_GAXG+qrhtp'),
(181, 'VALINO.biz', 'mssql3.winserver.ne.jp', '203.137.92.6', 'valino-biz', 'valino', 1, 'GARAX-Kspec5788'),
(183, 'maruyoshi.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'SQLlims', 'maruyoshi', 1, 'cxw02646-myco'),
(184, 'nakada-intec.com', 'mssql5.winserver.ne.jp', '203.137.92.252', 'NIHP', 'nihp', 1, 'TabitJapan0207'),
(186, 'eishisc.jp', 'mssql3.winserver.ne.jp', '203.137.92.6', 'wtpsdb-eishi', 'akasasa-eishi', 1, 'Shiraishi3987'),
(187, 'id-village.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'izudream_db', 'izudream', 1, 'Msys0926-Mclub'),
(188, 'maamenic.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'MasterDataBase', 'admin_user', 1, '1986HiromiArima'),
(189, 'hosono-j.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'hosono-j', 'hosono-j', 1, 'skshnichr'),
(190, 'inari-sintou.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'inari', 'ebi00119', 1, '0eGzson'),
(191, 'joygol.jp', 'mssql8.winserver.ne.jp', '211.8.18.122', 'joygol_db', 'joygol', 1, 'rybC19ZL'),
(192, 'kavc-kensaku.jp', 'mssql8.winserver.ne.jp', '211.8.18.122', 'AVELSS2Web', 'AVLESS2', 1, 'a4mk-ioj_EXCEL'),
(193, 'lf-gicon.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'GICONDB', 'giconuser', 1, 'ticogicon5355'),
(194, 'seedzwave.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'swDB', 'toshikn', 1, ''),
(195, 'wtps.happywinds.net', 'mssql8.winserver.ne.jp', '211.8.18.122', 'wtpsdb', 'akasasa', 1, 'Shiraishi3987'),
(196, 'i-sow.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'isow', 'isow', 1, 'Pwha2957akei3zg'),
(197, 'smile-suidou.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'SmileSuidouDB', 'SmileSuidouAdmin', 1, 'Suidou777333'),
(198, 'SG-PDMS.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'SG_PMS', 'Amawari', 1, 'Gosamaru1954'),
(199, 'kailabox.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'kailabox', 'kailabo75', 1, 'TOMOtada5149m'),
(200, 'devhyb.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'road', 'hybrid', 1, 'k1sarazu12345!'),
(201, 'kitacomp.kochi.jp', 'mssql5.winserver.ne.jp', '203.137.92.252', 'DB_user5933', 'L_user5933', 1, 'Ktmr10241024'),
(202, 'waf.winserver.ne.jp', 'mssql5.winserver.ne.jp', '203.137.92.252', 'winservertest', 'winservertest', 1, 'Japansys7523'),
(203, 'bbs.happywinds.net', 'mssql5.winserver.ne.jp', '203.137.92.252', 'DevelopDB', 'ENN_Admin', 1, 'p@ssw0rd1234'),
(204, 'miroku-htweb.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'DB_user5933', 'L_user5933', 0, 'ktmr1024Mrok'),
(205, 'kstascal.jp', 'mssql8.winserver.ne.jp', '211.8.18.122', 'dbkstascal', 'kstascal', 0, '62BM4Wuu'),
(206, 'kstascal.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'kstascal.com', 'kstascal', 0, '62BM4Wuu'),
(207, 'kansaibridal-gp.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'KDB', 'kdb_owner', 0, 'ZZo6SY7bKRN9\r\n'),
(208, 'sodalight2006.happywinds.net', 'mssql8.winserver.ne.jp', '211.8.18.122', 'reserve', 'sodalight', 0, '322Joetaro!'),
(209, 'omakasedm.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'OmakaseDB', 'OmakaseUser', 0, 'OmakasePassword'),
(210, 'mailove.jp', 'mssql8.winserver.ne.jp', '211.8.18.122', 'mailove', 'mailove', 0, 'skshnichr'),
(211, 'rmt-erunehu.com', 'mssql8.winserver.ne.jp', '211.8.18.122', 'rmt-erunehu', 'rmt-erunehu.com', 0, 'JkgriDz3\r\n'),
(212, 'kn-tec.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'kndb', 'toshi', 1, 'Printreturn9060'),
(213, 'sagamachinavi.com', 'mssql5.winserver.ne.jp', '203.137.92.252', 'wasabi', 'wasabi_sys', 1, 'Wasabi_201911'),
(214, 'vcountry.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'vcountry2016', 'winserver2016', 1, 'UsVOeu8sIPbTL3HO'),
(215, 'mitsukuru.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'mitsukuruDAT', 'integra', 1, 'Yk591003-Yk591003-'),
(216, 'fiveten.jp', 'mssql5.winserver.ne.jp', '203.137.92.252', 'wtpsdb-fiveten', 'akasasa-fiveten', 1, 'Shiraishi3987'),
(217, 'nose-sus.happywinds.net', 'mssql6.winserver.ne.jp', '203.137.92.4', 'nose-sus', 'nose-sus', 1, 'rqN9Kv2EJxDS'),
(218, 'takano-kenshin.com', 'mssql6.winserver.ne.jp', '203.137.92.4', 'kenshinDAT', 'integra-user', 1, 'Yk591003-Yk591003-');

-- --------------------------------------------------------

--
-- Table structure for table `db_ftp`
--

CREATE TABLE `db_ftp` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `web_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `web_account`
--

CREATE TABLE `web_account` (
  `id` int(10) NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis NOT NULL DEFAULT '',
  `password` varchar(1024) CHARACTER SET sjis NOT NULL DEFAULT '',
  `user` varchar(255) CHARACTER SET sjis NOT NULL DEFAULT '',
  `mysql_cnt` int(10) NOT NULL DEFAULT '0',
  `mssql_cnt` int(10) NOT NULL DEFAULT '0',
  `plan` int(4) NOT NULL DEFAULT '0',
  `pass_change_require` int(4) NOT NULL DEFAULT '0',
  `wordpress_require` int(4) NOT NULL DEFAULT '0',
  `eccube_require` int(4) NOT NULL DEFAULT '0',
  `stopped` int(4) NOT NULL DEFAULT '0',
  `ec_dir` varchar(255) CHARACTER SET sjis DEFAULT '',
  `word_dir` varchar(255) CHARACTER SET sjis NOT NULL DEFAULT '',
  `word_db` varchar(255) NOT NULL DEFAULT '',
  `web_dir` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_account`
--

INSERT INTO `web_account` (`id`, `domain`, `password`, `user`, `mysql_cnt`, `mssql_cnt`, `plan`, `pass_change_require`, `wordpress_require`, `eccube_require`, `stopped`, `ec_dir`, `word_dir`, `word_db`, `web_dir`, `customer_id`, `status`, `token`) VALUES
(980, 'hello1.com', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'hello1.com', 0, 0, 0, 0, 0, 0, 0, '', '', '', 'hello1.com', 'D000123', NULL, '313923364e359c45852b3b2a9fa40dcd'),
(981, 'hello2.com', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'hello2.com', 0, 0, 0, 0, 0, 0, 0, '', '', '', 'hello2.com', 'D000123', NULL, '557242fbd5ac51c356e0a160731f51e6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_pass`
--
ALTER TABLE `current_pass`
  ADD PRIMARY KEY (`web_id`),
  ADD UNIQUE KEY `web_id` (`web_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account`
--
ALTER TABLE `db_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_account_for_mssql`
--
ALTER TABLE `db_account_for_mssql`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_ftp`
--
ALTER TABLE `db_ftp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_account`
--
ALTER TABLE `web_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_account`
--
ALTER TABLE `db_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `db_account_for_mssql`
--
ALTER TABLE `db_account_for_mssql`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT for table `db_ftp`
--
ALTER TABLE `db_ftp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_account`
--
ALTER TABLE `web_account`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=982;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
