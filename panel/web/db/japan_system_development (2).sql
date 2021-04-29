-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2021 at 03:45 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `add_email`
--

CREATE TABLE `add_email` (
  `id` int NOT NULL,
  `domain` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `current_pass`
--

CREATE TABLE `current_pass` (
  `web_id` int NOT NULL DEFAULT '0',
  `password` varchar(1024) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
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
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT '',
  `db_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `db_user` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `db_count` int NOT NULL DEFAULT '0',
  `pass` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_account_for_mariadb`
--

CREATE TABLE `db_account_for_mariadb` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `db_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `db_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `db_count` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_account_for_mssql`
--

CREATE TABLE `db_account_for_mssql` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT NULL,
  `host_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  `host_ip` varchar(15) NOT NULL,
  `db_name` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL,
  `db_user` varchar(255) NOT NULL,
  `db_count` int NOT NULL DEFAULT '0',
  `pass` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_ftp`
--

CREATE TABLE `db_ftp` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `permission` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `error_pages`
--

CREATE TABLE `error_pages` (
  `id` int NOT NULL,
  `domain` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `statuscode` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='error pages';

--
-- Dumping data for table `error_pages`
--

INSERT INTO `error_pages` (`id`, `domain`, `statuscode`, `url`) VALUES
(1, 'setmawhtay.com', '404', ''),
(2, 'setmawhtay.com', '407', '');

-- --------------------------------------------------------

--
-- Table structure for table `web_account`
--

CREATE TABLE `web_account` (
  `id` int NOT NULL,
  `domain` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `password` varchar(1024) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `user` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `mysql_cnt` int NOT NULL DEFAULT '0',
  `mssql_cnt` int NOT NULL DEFAULT '0',
  `plan` int NOT NULL DEFAULT '0',
  `pass_change_require` int NOT NULL DEFAULT '0',
  `wordpress_require` int NOT NULL DEFAULT '0',
  `eccube_require` int NOT NULL DEFAULT '0',
  `stopped` int NOT NULL DEFAULT '0',
  `appstopped` int DEFAULT NULL,
  `ec_dir` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci DEFAULT '',
  `word_dir` varchar(255) CHARACTER SET sjis COLLATE sjis_japanese_ci NOT NULL DEFAULT '',
  `word_db` varchar(255) NOT NULL DEFAULT '',
  `web_dir` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `error_pages` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_account`
--

INSERT INTO `web_account` (`id`, `domain`, `password`, `user`, `mysql_cnt`, `mssql_cnt`, `plan`, `pass_change_require`, `wordpress_require`, `eccube_require`, `stopped`, `appstopped`, `ec_dir`, `word_dir`, `word_db`, `web_dir`, `customer_id`, `status`, `token`, `error_pages`) VALUES
(1, 'setmawhtay.com', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'setmawhtay.com', 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', 'setmawhtay.com', 'D000123', 1, '51a2bfa91a6065e5e878dd695ddcdc8b', '[{\"url\": \"errors/404.html\", \"statuscode\": \"404\"}]'),
(2, 'mgmg.test', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'mgmg', 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', 'mgmg.test', 'D000123', NULL, '15a4cf8c80f5c9f42339486c1bb258aa', '[{\"url\": \"errors/408.html\", \"stopped\": 1, \"statuscode\": \"404\"}, {\"url\": \"errors/405.html\", \"stopped\": 0, \"statuscode\": \"405\"}, {\"url\": \"errors/406.html\", \"stopped\": 1, \"statuscode\": \"406\"}, {\"url\": \"errors/407.html\", \"stopped\": 1, \"statuscode\": \"407\"}, {\"url\": \"errors/408.html\", \"stopped\": 1, \"statuscode\": \"408\"}, {\"url\": \"errors/409.html\", \"stopped\": 1, \"statuscode\": \"409\"}, {\"url\": \"errors/410.html\", \"stopped\": 1, \"statuscode\": \"410\"}, {\"url\": \"errors/411.html\", \"stopped\": 1, \"statuscode\": \"411\"}, {\"url\": \"\", \"stopped\": 1, \"statuscode\": \"\"}]'),
(3, 'mgmg1.test', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'mgmg1.test', 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', 'mgmg1.test', 'D000123', NULL, '64815247a5a9e8612c3c89feafe8deac', '[{\"url\": \"errors/404.html\", \"statuscode\": \"404\"}]'),
(4, 'welcome.test', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'welcome.test', 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', 'welcome.test', 'D000123', NULL, '43b4f9849738e1ecadef5e8a1514308d', NULL),
(5, 'hello1.test', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'hello1.test', 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', 'hello1.test', 'D000123', NULL, '4e7b2382f3f179f42bc4743449bd761e', NULL),
(8, 'ethical-sai.test', '4bb1f84a7b50447c450e2b1c84cde4676f36e9f0f36d30792f476852e644bcb4', 'ethical-sai.test', 0, 0, 0, 0, 0, 0, 1, 1, '', '', '', 'ethical-sai.test', 'D000123', NULL, 'c6587cd80c212d4203b9725449928780', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_email`
--
ALTER TABLE `add_email`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `db_account_for_mariadb`
--
ALTER TABLE `db_account_for_mariadb`
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
-- Indexes for table `error_pages`
--
ALTER TABLE `error_pages`
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
-- AUTO_INCREMENT for table `add_email`
--
ALTER TABLE `add_email`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_account`
--
ALTER TABLE `db_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_account_for_mariadb`
--
ALTER TABLE `db_account_for_mariadb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_account_for_mssql`
--
ALTER TABLE `db_account_for_mssql`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_ftp`
--
ALTER TABLE `db_ftp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `error_pages`
--
ALTER TABLE `error_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web_account`
--
ALTER TABLE `web_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
