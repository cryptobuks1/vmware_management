-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc_sto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `mobile`, `image`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '$2y$10$A6C09gTpSfM/5oF.5ZzAY.kmce1gO2XBGvUvhwLHF2962cHsYZqbG', 'bsKiCGtdvwX0E8AWk4tsffrndxswq9vAAe0pnhO6URBzRnuH6tGnwOebYF9z', NULL, '2019-05-02 06:32:29', '+01235485258', 'admin_1556800349.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_two` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sym` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_notification` tinyint(1) DEFAULT NULL,
  `sms_notification` tinyint(4) DEFAULT NULL,
  `emailver` int(11) DEFAULT '0',
  `smsver` int(11) DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` longtext COLLATE utf8mb4_unicode_ci,
  `smsapi` mediumtext COLLATE utf8mb4_unicode_ci,
  `banner_title` text COLLATE utf8mb4_unicode_ci,
  `banner_sub_title` text COLLATE utf8mb4_unicode_ci,
  `service_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_sub_title` text COLLATE utf8mb4_unicode_ci,
  `test_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_sub_title` text COLLATE utf8mb4_unicode_ci,
  `blog_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_sub_title` text COLLATE utf8mb4_unicode_ci,
  `footer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci,
  `team_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_sub_title` text COLLATE utf8mb4_unicode_ci,
  `fb_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_client_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_client_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_login` int(11) NOT NULL DEFAULT '0',
  `faq_title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_sub_title` text COLLATE utf8mb4_unicode_ci,
  `static_title_1` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_number_1` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_icon_1` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_title_2` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_number_2` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_icon_2` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_title_3` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_number_3` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `static_icon_3` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_detail` longtext COLLATE utf8mb4_unicode_ci,
  `plan_title` text COLLATE utf8mb4_unicode_ci,
  `plan_subtitle` text COLLATE utf8mb4_unicode_ci,
  `bal_trans_fixed_charge` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bal_trans_per_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_active` int(11) NOT NULL DEFAULT '1',
  `how_it_work_title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_work_sub_title` text COLLATE utf8mb4_unicode_ci,
  `referral_title` text COLLATE utf8mb4_unicode_ci,
  `referral_sub_title` text COLLATE utf8mb4_unicode_ci,
  `transaction_title` text COLLATE utf8mb4_unicode_ci,
  `transaction_sub_title` text COLLATE utf8mb4_unicode_ci,
  `payment_title` text COLLATE utf8mb4_unicode_ci,
  `payment_sub_title` text COLLATE utf8mb4_unicode_ci,
  `newsletter_title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter_sub_title` text COLLATE utf8mb4_unicode_ci,
  `about_video_link` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `sitename`, `color`, `color_two`, `currency`, `currency_sym`, `email_notification`, `sms_notification`, `emailver`, `smsver`, `phone`, `email`, `address`, `esender`, `emobile`, `emessage`, `smsapi`, `banner_title`, `banner_sub_title`, `service_title`, `service_sub_title`, `test_title`, `test_sub_title`, `blog_title`, `blog_sub_title`, `footer`, `footer_text`, `team_title`, `team_sub_title`, `fb_client_id`, `fb_client_secret`, `google_client_id`, `google_client_secret`, `social_login`, `faq_title`, `faq_sub_title`, `static_title_1`, `static_number_1`, `static_icon_1`, `static_title_2`, `static_number_2`, `static_icon_2`, `static_title_3`, `static_number_3`, `static_icon_3`, `about_title`, `about_detail`, `plan_title`, `plan_subtitle`, `bal_trans_fixed_charge`, `bal_trans_per_charge`, `template_active`, `how_it_work_title`, `how_it_work_sub_title`, `referral_title`, `referral_sub_title`, `transaction_title`, `transaction_sub_title`, `payment_title`, `payment_sub_title`, `newsletter_title`, `newsletter_sub_title`, `about_video_link`, `created_at`, `updated_at`) VALUES
(1, 'STO', '2ecc71', 'e74c3c', 'USD', '$', 0, 0, 0, 0, '01234564795', 'do-not-reply@thesoftking.com', 'Company Location, Country', 'do-not-reply@thesoftking.com', NULL, '<br><br>\r\n	<div class=\"contents\" style=\"max-width: 600px; margin: 0 auto; border: 2px solid #000036;\">\r\n\r\n<div class=\"header\" style=\"background-color: #000036; padding: 15px; text-align: center;\">\r\n	<div class=\"logo\" style=\"width: 260px;text-align: center; margin: 0 auto;\">\r\n		<img src=\"https://i.imgur.com/4NN55uD.png\" alt=\"THESOFTKING\" style=\"width: 100%;\">\r\n	</div>\r\n</div>\r\n\r\n<div class=\"mailtext\" style=\"padding: 30px 15px; background-color: #f0f8ff; font-family: \'Open Sans\', sans-serif; font-size: 16px; line-height: 26px;\">\r\n\r\nHi {{name}},\r\n<br><br>\r\n{{message}}\r\n<br><br>\r\n<br>\r\n</div>\r\n\r\n<div class=\"footer\" style=\"background-color: #000036; padding: 15px; text-align: center;\">\r\n<a href=\"https://thesoftking.com/\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\">Website</a>\r\n<a href=\"https://thesoftking.com/products\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\">Products</a>\r\n<a href=\"https://thesoftking.com/contact\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\">Contact</a>\r\n</div>\r\n\r\n\r\n<div class=\"footer\" style=\"background-color: #000036; padding: 15px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.2);\">\r\n\r\n<strong style=\"color: #fff;\">© 2011 - 2018 THESOFTKING. All Rights Reserved.</strong>\r\n<p style=\"color: #ddd;\">TheSoftKing is not partnered with any other \r\ncompany or person. We work as a team and do not have any reseller, \r\ndistributor or partner!</p>\r\n\r\n\r\n</div>\r\n\r\n	</div>\r\n<br><br>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=****&sender=Sender&SMSText={{message}}&GSM={{number}}&type=longSMS', 'Security Token Offering Platform!', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'Our Services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum labore, sint nihil! Quae, eos esse nobis, placeat officiis ea exercitationem.', 'What Users Say!', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections', 'GET LATEST BLOG', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections', '© STO 2019 -All Rights Reserved', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae dolore suscipit repellendus doloribus quibusdam ducimus blanditiis obcaecati nemo officiis rem ullam ut optio magni, unde molestias, maiores culpa rerum incidunt ipsa labore cupiditate quidem vel, hic, asperiores. Beatae esse facilis quidem harum provident officia sequi veniam ex possimus reiciendis.', 'Our Team Members', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections', '277229062999748', '1acfc850f73d1955d14b282938585122', '53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com', 'BRdB3np2IgYLiy4-bwMcmOwN', 1, 'Frequently Asked Questions', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections', 'Sec 1', '1500s is reproduced below for those interested. Sections', 'Sec 4', 'Sec 2', 'The standard chunk of Lorem Ipsum used since the', '1500s is reproduced below for those interested. Sections', 'Sec 3', 'The standard chunk of Lorem Ipsum used since the', 'download', 'About Us', 'Our scripts are developed by our in-house Developers. We always produce secure, reliable, efficient and scalable script. We are doing continuous improvements to make it more stable in long run. We are using the latest and advanced technology Where Security is our Primary concern. We always provide our best in customer support. Our Script supports the 16+ Automated online payment processors. We offer customization at very reasonable cost.', 'This is Our Plan', 'It is a long established fact that a reader will be distracted by the readable content of a page.', '5', '2', 1, 'How it Works', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Road Map Section', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Transactions  Section', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Sto Calender', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Newsletter Title', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'https://www.youtube.com/watch?v=GT6-H4BRyqQ', NULL, '2019-05-01 06:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `try` int(11) NOT NULL DEFAULT '0',
  `image` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Website',
  `val4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Industry Type',
  `val5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Channel ID',
  `val6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction URL',
  `val7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'paytm Transaction Status URL',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', '5', '1000', '0.511', '2.52', '1', 'rexrifat636@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:24:13'),
(102, 'PerfectMoney', 'Perfect Money', '20', '20000', '2', '1', '1', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:24:20'),
(103, 'Stripe', 'Credit Card', '10', '50000', '3', '3', '1', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:23:55'),
(104, 'Skrill', 'Skrill', '10', '50000', '3', '3', '1', 'merchant@skrill', 'TheSoftKing', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:24:06'),
(105, 'PayTM', 'PayTM', '1', '100', '1', '1', '1', 'PoojaE46324372286132', 'JAKMX9PVoj208dMq', 'WEB_STAGINGb', 'Retail', 'WEB', 'https://pguat.paytm.com/oltp-web/processTransaction', 'https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp', 1, NULL, '2018-12-05 00:24:41'),
(106, 'Payeer', 'Payeer', '1', '100', '1', '1', '1', '627881897', 'Admin727096', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:24:49'),
(107, 'PayStack', 'PayStack', '1', '100', '1', '1', '1', 'pk_test_c1775454cc81a5ad2d6a31d0b0471585d44c4dcb', 'sk_test_22327c329aa7ea76448cfe279aa1e5d583d306fa', NULL, NULL, NULL, NULL, '0.0028', 1, NULL, '2018-12-05 00:24:55'),
(108, 'VoguePay', 'VoguePay', '1', '100', '1', '1', '1', 'demo', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:25:03'),
(501, 'Blockchain.info', 'BitCoin', '1', '20000', '1', '0.5', '1', '3965f52f-ec19-43af-90ed-d613dc60657eSSS', 'xpub6DREmHywjNizvs9b4hhNekcjFjvL4rshJjnrHHgtLNCSbhhx5jKFRgqdmXAecLAddEPudDZY4xoDbV1NVHSCeDp1S7NumPCNNjbxB7sGasY0000', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-12-05 00:25:11'),
(502, 'block.io - BTC', 'BitCoin', '1', '99999', '1', '0.5', '1', '1658-8015-2e5e-9afb', '09876softk', NULL, NULL, NULL, NULL, NULL, 1, '2018-01-27 18:00:00', '2018-12-05 00:25:19'),
(503, 'block.io - LTC', 'LiteCoin', '100', '10000', '0.4', '1', '1', 'cb91-a5bc-69d7-1c27', '09876softk', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:27:34'),
(504, 'block.io - DOGE', 'DogeCoin', '1', '50000', '0.51', '2.52', '1', '2daf-d165-2135-5951', '09876softk', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:28:54'),
(505, 'CoinPayment - BTC', 'BitCoin', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:38:33'),
(506, 'CoinPayment - ETH', 'Etherium', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-07-16 03:42:22'),
(507, 'CoinPayment - BCH', 'Bitcoin Cash', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:39:04'),
(508, 'CoinPayment - DASH', 'DASH', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:39:04'),
(509, 'CoinPayment - DOGE', 'DOGE', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:39:04'),
(510, 'CoinPayment - LTC', 'LTC', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-31 09:39:04'),
(512, 'CoinGate', 'Coingate', '6', '76', '76', '6', '1', '42424242424242424241', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-07-08 18:00:00', '2019-01-16 01:13:18'),
(513, 'CoinPayment-ALL', 'Coin Payment', '10', '1000', '05', '5', '1', 'db1d9f12444e65c921604e289a281c56', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2018-05-21 01:20:54'),
(516, NULL, 'Bank 001', '10', '100000', '2', '3', '1', '4242-5895-525552', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-12-20 05:04:47', '2019-01-22 22:00:06'),
(517, NULL, 'Bank002', '567', '77', '765765', '7657', '1', 'uyf67utu', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2018-12-20 05:05:25', '2019-01-22 22:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE `how_it_works` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `icon`, `title`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'user-plus', 'Easy Sign In', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum', '2019-01-29 07:05:11', '2019-04-08 05:55:20'),
(3, 'envelope-open', 'Earn Money', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum', '2019-01-29 07:06:03', '2019-04-08 05:55:51'),
(4, 'user', 'The standard chunk', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum', '2019-01-29 07:06:15', '2019-01-29 07:06:15'),
(5, 'money', 'Get Money', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum', '2019-04-08 05:56:54', '2019-04-08 05:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `invests`
--

CREATE TABLE `invests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_rec_time` int(11) NOT NULL DEFAULT '0',
  `next_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `icon`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, '1546691057.png', 'Hindi', 'hn', '2019-01-05 06:17:17', '2019-01-07 08:42:44'),
(2, '1546690847.png', 'Bangla', 'bn', '2019-01-05 06:20:47', '2019-01-05 06:24:35'),
(3, '1547999056.png', 'Spanish', 'sp', '2019-01-20 09:44:16', '2019-01-20 09:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2018_09_15_055044_create_admins_table', 1),
(14, '2018_09_23_070452_create_accounts_table', 8),
(15, '2018_10_06_111835_create_teams_table', 9),
(16, '2018_10_06_111923_create_testimonials_table', 9),
(17, '2018_10_06_131253_create_socials_table', 10),
(18, '2018_10_09_124655_create_services_table', 11),
(19, '2018_10_11_054818_create_blogs_table', 12),
(20, '2014_10_12_000000_create_users_table', 13),
(21, '2018_10_11_112743_create_menus_table', 14),
(22, '2018_10_13_120207_create_links_table', 15),
(23, '2018_10_14_124147_create_advertises_table', 16),
(24, '2018_10_15_094201_create_transections_table', 17),
(25, '2018_10_15_112248_create_withdraws_table', 18),
(26, '2018_10_15_112459_create_withdraw_methods_table', 18),
(27, '2018_10_20_101804_create_support_tickets_table', 19),
(28, '2018_10_20_101909_create_ticket_comments_table', 19),
(29, '2018_10_21_073244_create_ip_tracks_table', 20),
(30, '2018_12_04_055504_create_faqs_table', 21),
(31, '2018_12_05_094029_create_plans_table', 22),
(32, '2018_12_05_122043_create_time_settings_table', 23),
(33, '2018_12_11_055235_create_invests_table', 24),
(34, '2018_12_19_102753_create_epins_table', 25),
(35, '2018_12_19_133151_create_referrals_table', 26),
(36, '2018_12_27_122808_create_subscribers_table', 27),
(37, '2018_12_27_141219_create_jobs_table', 28),
(38, '2019_01_05_114834_create_languages_table', 29),
(39, '2019_01_29_124624_create_how_it_works_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `grow` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `times` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `image`, `name`, `start_date`, `end_date`, `amount`, `price`, `grow`, `times`, `sold`, `status`, `created_at`, `updated_at`) VALUES
(1, '1556800564.jpg', 'STO', '2019-01-01', '2020-01-01', '9999999', 1, '1', 1, 0, 1, NULL, '2019-05-02 06:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` int(11) NOT NULL,
  `percent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `level`, `percent`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '10', 1, '2019-01-22 21:59:09', '2019-01-22 21:59:09'),
(2, 2, '8', 1, '2019-01-22 21:59:09', '2019-01-22 21:59:09'),
(3, 3, '6', 1, '2019-01-22 21:59:09', '2019-01-22 21:59:09'),
(4, 4, '5', 1, '2019-01-22 21:59:09', '2019-01-22 21:59:09'),
(5, 5, '1', 1, '2019-01-22 21:59:09', '2019-01-22 21:59:09'),
(6, 6, '1', 1, '2019-01-22 21:59:09', '2019-01-22 21:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 'facebook', '#', '2018-10-06 07:24:27', '2018-10-06 07:24:27'),
(2, 'twitter', '#', '2018-10-06 07:24:39', '2018-10-09 04:56:56'),
(5, 'linkedin', '#', '2018-10-09 04:57:16', '2018-10-09 04:57:16'),
(6, 'instagram', '#', '2018-12-04 04:17:08', '2018-12-04 04:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ln_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tw_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_settings`
--

CREATE TABLE `time_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_settings`
--

INSERT INTO `time_settings` (`id`, `name`, `time`, `created_at`, `updated_at`) VALUES
(2, 'Hourly', '1', '2018-12-05 06:48:07', '2018-12-05 06:54:01'),
(3, 'Weekly', '168', '2018-12-05 06:54:31', '2018-12-05 06:54:31'),
(4, 'Daily', '24', '2018-12-05 06:54:43', '2019-01-31 05:34:26'),
(5, 'Monthly', '720', '2018-12-05 06:54:59', '2018-12-05 06:54:59'),
(6, 'Yearly', '8760', '2018-12-05 06:55:17', '2018-12-05 06:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` int(10) UNSIGNED NOT NULL,
  `trxid` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_id` int(11) DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailv` int(11) NOT NULL,
  `smsv` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `vsent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vercode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tauth` int(11) NOT NULL DEFAULT '0',
  `tfver` int(11) NOT NULL DEFAULT '1',
  `secretcode` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws`
--

CREATE TABLE `withdraws` (
  `id` int(10) UNSIGNED NOT NULL,
  `withdraw_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_id` int(11) NOT NULL,
  `method_cur_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_methods`
--

CREATE TABLE `withdraw_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_amo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_amo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargefx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargepc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_works`
--
ALTER TABLE `how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invests`
--
ALTER TABLE `invests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_settings`
--
ALTER TABLE `time_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `withdraws`
--
ALTER TABLE `withdraws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518;

--
-- AUTO_INCREMENT for table `how_it_works`
--
ALTER TABLE `how_it_works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invests`
--
ALTER TABLE `invests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_settings`
--
ALTER TABLE `time_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws`
--
ALTER TABLE `withdraws`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_methods`
--
ALTER TABLE `withdraw_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
