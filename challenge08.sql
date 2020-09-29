-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 11:54 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge08`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `approved_at`) VALUES
(1, 3, '2020-09-29 09:29:02', '2020-09-01 11:28:02'),
(2, 4, '2020-09-29 09:29:02', '2020-09-28 11:28:02'),
(3, 1, '2020-09-29 09:35:57', NULL),
(4, 2, '2020-09-29 09:35:57', '2020-09-29 11:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `cart_inventory`
--

CREATE TABLE `cart_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_inventory`
--

INSERT INTO `cart_inventory` (`id`, `cart_id`, `inventory_id`, `created_at`) VALUES
(1, 1, 1, '2020-09-29 09:31:32'),
(2, 1, 2, '2020-09-29 09:31:32'),
(3, 1, 3, '2020-09-29 09:31:32'),
(4, 1, 4, '2020-09-29 09:31:32'),
(5, 2, 5, '2020-09-29 09:31:32'),
(6, 2, 6, '2020-09-29 09:31:32'),
(7, 2, 7, '2020-09-29 09:31:32'),
(8, 1, 8, '2020-09-29 09:31:32'),
(9, 1, 9, '2020-09-29 09:31:32'),
(10, 2, 10, '2020-09-29 09:31:32'),
(11, 2, 11, '2020-09-29 09:31:32'),
(12, 1, 12, '2020-09-29 09:31:32'),
(13, 1, 13, '2020-09-29 09:31:32'),
(14, 2, 14, '2020-09-29 09:31:32'),
(15, 2, 15, '2020-09-29 09:31:32'),
(16, 2, 16, '2020-09-29 09:31:32'),
(17, 1, 17, '2020-09-29 09:31:32'),
(18, 3, 18, '2020-09-29 09:38:06'),
(19, 3, 19, '2020-09-29 09:38:06'),
(20, 4, 20, '2020-09-29 09:40:41'),
(21, 4, 21, '2020-09-29 09:40:41'),
(22, 4, 22, '2020-09-29 09:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Прехрамбени производи'),
(2, 'Пијалоци'),
(3, 'Тобако тутун'),
(4, 'Млеко и млечни производи'),
(5, 'Кондиторски производи'),
(6, 'Козметика'),
(7, 'Средства за домаќинство');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Romania'),
(2, 'Macedonia'),
(3, 'France'),
(4, 'Italy'),
(5, 'Russia'),
(6, 'Bosnia and Hercegovina'),
(7, 'Serbia'),
(8, 'United Kingdom'),
(9, 'China'),
(10, 'India'),
(11, 'Slovenia'),
(12, 'Turkey');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_choice`
--

CREATE TABLE `delivery_choice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_offer` float NOT NULL,
  `delivery_choice` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_choice`
--

INSERT INTO `delivery_choice` (`id`, `delivery_id`, `order_id`, `delivery_offer`, `delivery_choice`, `created_at`, `approved_at`) VALUES
(1, 5, 1, 50, 0, '2020-09-29 09:46:36', NULL),
(2, 6, 1, 40, 1, '2020-09-29 09:46:36', '2020-09-29 11:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_barcode` bigint(20) UNSIGNED NOT NULL,
  `production_date` date DEFAULT NULL,
  `best_before_date` date DEFAULT NULL,
  `quantity` float NOT NULL,
  `import_export` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_barcode`, `production_date`, `best_before_date`, `quantity`, `import_export`, `created_at`) VALUES
(1, 8606016640760, '2020-01-01', '2050-01-01', 5, 1, '2020-09-29 09:19:39'),
(2, 5319990797964, '2020-07-01', '2021-07-01', 100, 1, '2020-09-29 09:19:39'),
(3, 5449000214911, '2020-09-01', '2021-03-15', 50, 1, '2020-09-29 09:21:28'),
(4, 5449000214799, '2020-09-01', '2020-10-31', 20, 1, '2020-09-29 09:23:29'),
(5, 76130369873947, '2020-09-01', '2020-11-30', 200, 1, '2020-09-29 09:23:29'),
(6, 8606019858810, NULL, NULL, 5, 1, '2020-09-29 09:23:53'),
(7, 8606019853181, NULL, NULL, 10, 1, '2020-09-29 09:24:47'),
(8, 8606008758619, NULL, NULL, 20, 1, '2020-09-29 09:24:47'),
(9, 86037396, NULL, NULL, 200, 1, '2020-09-29 09:25:24'),
(10, 5319990797773, NULL, NULL, 200, 1, '2020-09-29 09:25:24'),
(11, 4009900431484, NULL, NULL, 100, 1, '2020-09-29 09:26:02'),
(12, 3872324000441, NULL, NULL, 154, 1, '2020-09-29 09:26:02'),
(13, 3856008830661, NULL, NULL, 200, 1, '2020-09-29 09:26:35'),
(14, 5942045227019, NULL, NULL, 500, 1, '2020-09-29 09:26:35'),
(15, 3838821918351, NULL, NULL, 15, 1, '2020-09-29 09:27:02'),
(16, 8693395015692, NULL, NULL, 12, 1, '2020-09-29 09:27:02'),
(17, 9090000059505, NULL, NULL, 3, 1, '2020-09-29 09:27:37'),
(18, 8606016640760, NULL, NULL, 1, 0, '2020-09-29 09:37:08'),
(19, 86037396, NULL, NULL, 2, 0, '2020-09-29 09:37:08'),
(20, 5449000214799, NULL, NULL, 3, 0, '2020-09-29 09:39:37'),
(21, 5942045227019, NULL, NULL, 5, 0, '2020-09-29 09:39:37'),
(22, 3872324000441, NULL, NULL, 10, 0, '2020-09-29 09:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `legal_entity`
--

CREATE TABLE `legal_entity` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `legal_entity`
--

INSERT INTO `legal_entity` (`id`, `name`, `address`, `country_id`, `created_at`) VALUES
(1, 'Тутунска индустрија Монопол Куманово', '11-ти Октомври ББ, 1300, Куманово, Македонија', 2, '2020-09-25 09:36:31'),
(2, 'Philip Morris Romania S.R.L.', 'Strada Horia Closca si Crisan, nr. 83-105, Otopeni, jud. Ilfov, Romania', 1, '2020-09-25 09:33:50'),
(3, 'Nestle Purina PetCare France S.A.S', 'Chemin Departemental 47, 27290 Montfort-sur-Risle', 3, '2020-09-28 10:20:53'),
(4, 'Nestle Purina PetCare Italia S.p.a', 'Via E Mattei 12, 30026 Summaga di Portogruaro', 4, '2020-09-28 10:20:53'),
(5, 'Nestle Rossiya LLC Branch in Vorsino', '1 Lyskina Street, Vorsino Village, 249020', 5, '2020-09-28 10:20:53'),
(6, 'Алма-м Дооел Скопје', 'Качанички пат 65а, 1000, Скопје', 2, '2020-09-28 10:20:53'),
(7, 'Меса Интернационал д.о.о.', 'Бојничка 44, 71000, Сараево', 6, '2020-09-28 10:40:26'),
(8, 'Кам доо', 'ул. Индустриска бб, 1000, Скопје', 2, '2020-09-28 10:40:26'),
(9, 'British American Tobacco Vranje AD', 'Краља Стефана Првовенчаног 208, 17500 Врање', 7, '2020-09-28 11:02:26'),
(10, 'ДПТУ ТДР Скопје ДООЕЛ', 'Бул. 8-ми Септември бр. 18, 1000, Скопје', 2, '2020-09-28 11:02:26'),
(11, 'Филип Морис Тутунски Комбинат Прилеп ДОО Скопје', 'Св. Кирил и Методиј бр. 7, 1000, Скопје', 2, '2020-09-28 11:19:40'),
(12, 'Mars Wrigley Confectionery UK LTD.', 'Plymouth, PL6 7PR, England', 8, '2020-09-28 11:28:42'),
(13, 'Пивара Скопје А.Д.', 'ул. 800 бр.12, 1000, Скопје', 2, '2020-09-28 11:33:55'),
(14, 'У.Р.Б.Б Романија', 'Романија', 1, '2020-09-28 11:42:18'),
(15, 'Прилепска Пиварница АД.', 'Цане Кузмановски 1, 7500, Прилеп', 2, '2020-09-28 11:46:01'),
(16, 'Аманда ИНТЛ', 'Кина', 9, '2020-09-28 12:36:18'),
(17, 'Гросист ДОО', 'Инд. Зона Василево бр.383, 2411, Василево', 2, '2020-09-28 12:36:18'),
(18, 'WS HOME ARTICLES LTD', 'China', 9, '2020-09-29 08:21:08'),
(19, 'Емо Етерна дооел', 'Првомајска бб (стаклара), 1000, Скопје', 2, '2020-09-29 08:21:08'),
(20, 'Texell', 'Кина', 9, '2020-09-29 08:42:42'),
(21, 'Бонн-комерц Скопје', 'ул. Керамидница бб, 1000, Скопје', 2, '2020-09-29 08:42:42'),
(22, 'SILK d.o.o.', 'Словениа', 11, '2020-09-29 08:52:55'),
(23, 'Qlux IDEAS', 'Turkey', 12, '2020-09-29 08:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved_at` datetime DEFAULT NULL,
  `approved_by_admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `picked_up_at` datetime DEFAULT NULL,
  `delivered_at` datetime DEFAULT NULL,
  `delivery_comment` text DEFAULT NULL,
  `delivery_grade` smallint(5) UNSIGNED DEFAULT NULL,
  `accepted_at` datetime DEFAULT NULL,
  `customer_comment` text DEFAULT NULL,
  `customer_grade` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `created_at`, `approved_at`, `approved_by_admin_id`, `picked_up_at`, `delivered_at`, `delivery_comment`, `delivery_grade`, `accepted_at`, `customer_comment`, `customer_grade`) VALUES
(1, 4, '2020-09-29 09:49:33', '2020-09-29 11:50:16', 3, '2020-09-29 12:10:54', '2020-09-29 12:30:54', 'Одличен однос од корисникот', 5, '2020-09-29 12:35:54', 'Брза испорака', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `barcode` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `composition` text DEFAULT NULL,
  `min_storage_temp_c` smallint(5) DEFAULT NULL,
  `max_storage_temp_c` smallint(5) UNSIGNED DEFAULT NULL,
  `cena` bigint(20) UNSIGNED NOT NULL,
  `info` text DEFAULT NULL,
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `importer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`barcode`, `name`, `composition`, `min_storage_temp_c`, `max_storage_temp_c`, `cena`, `info`, `manufacturer_id`, `importer_id`, `category_id`, `subcategory_id`, `created_at`) VALUES
(86037396, 'LUCKY STRIKE Double Click', 'Најдобра селекција на тутун, хартина и филтер со двоен клик за 2 вкуса.', NULL, NULL, 100, 'Штетни состојки по цигара: Катран: 7mg, Никотин: 0.5mg, CO: 5mg', 9, 10, 3, 5, '2020-09-28 11:08:46'),
(3838821918351, 'Мелач на компири', 'Дрво, пластика', NULL, NULL, 250, NULL, 22, 19, 7, 9, '2020-09-29 08:55:26'),
(3856008830661, 'Rothmans of London', 'Тутун', NULL, NULL, 90, 'Количина на штетни материи по цигара: Катран: 9mg, Никотин: 0,7mg, CO: 10mg', 9, 10, 3, 5, '2020-09-28 11:17:28'),
(3872324000441, 'Palitos Sesame 100g', 'Печени стапчиња со сусам. Состав: пченично брашно, маслиново масло, сончогледово масло, маргарин (делумно хидрогенизирана растителна маст од масло од сончоглед и палма), сол, вода, семки од сусам (12%), свеж квасец.', NULL, NULL, 35, 'Хранливи вредности на 100g производ: Енергија 398kcal/2099kj, масти: 29,4g од кои заситени масни киселини 5,3g, јаглехидрати: 50.01g од кои шеќери 1,8g, влакна: 5,4g, протеини: 10,6g, сол: 0,9g.', 7, 8, 1, NULL, '2020-09-28 10:50:23'),
(4009900431484, 'Orbit Peppermint x60', 'Гуми за џвакање', NULL, NULL, 75, NULL, 12, 6, 1, NULL, '2020-09-28 11:31:29'),
(5319990797773, 'Marlboro fine touch', 'Одбрани видови тутун', NULL, NULL, 120, 'Количина на штетни материи по цигара: Катран: 8mg, Никотин: 0,6mg, CO: 9mg', 11, NULL, 3, 5, '2020-09-28 11:24:02'),
(5319990797964, 'Chesterfield Tuned Blue', 'Тутун', NULL, NULL, 100, 'Количина на штетни материи по цигара: Катран: 8mg, Никотин: 0,6mg, CO: 9mg', 11, NULL, 3, 5, '2020-09-28 11:24:02'),
(5449000214799, 'Coca Cola ZERO Limenka 0.33l', 'Газиран освежителен пијалок', NULL, NULL, 50, 'Енергетски вредности...', 13, NULL, 2, 3, '2020-09-28 11:38:12'),
(5449000214911, 'Coca Cola Original Taste', 'Gaziran pijalok so eden kup secer', NULL, NULL, 50, 'Шикер 300', 13, NULL, 2, 3, '2020-09-28 11:38:12'),
(5942045227019, 'TUBORG 0% 0,5l Limenka', 'Светло Безалкохолно Пиво', NULL, NULL, 40, 'Безалкохолно пиво', 14, 15, 2, 2, '2020-09-28 11:47:00'),
(8606008758619, 'Lorme Тигањ 28cm', 'Метал, гранит', NULL, NULL, 1000, 'Тигањ, тава за пржење', 18, 19, 7, 9, '2020-09-29 09:05:15'),
(8606016640760, 'CHEF KNIFE TNT-C109', 'Метал/Пластика', NULL, NULL, 600, 'Нерѓосувачки челик', 20, 21, 7, 9, '2020-09-29 08:46:09'),
(8606019853181, 'LORME Basic Granite 24cm Округла тепсија', 'Матал, Гранит', NULL, NULL, 500, NULL, 18, 19, 7, 9, '2020-09-29 08:24:32'),
(8606019858810, 'Knife 2/1', 'Metal/plastika', NULL, NULL, 200, 'Ножеви за сецкање', 18, 19, 7, 9, '2020-09-29 09:02:37'),
(8693395015692, 'Додаток за цедење', 'Пластика', NULL, NULL, 100, 'Решетка за цедење на вода од тенџере.', 23, 21, 7, 9, '2020-09-29 09:00:35'),
(9090000059505, 'Нож за пица', 'Состав: Метал', NULL, NULL, 125, 'Начин на одржување: Се мие со вода', 16, 17, 7, 9, '2020-09-28 12:38:20'),
(76130369873947, 'FRISKIES Cat.', 'Комплетна храна за домашни миленици, за возрасни мачки и исто така погодна и за кастрирани мачки.', NULL, NULL, 100, 'Состав: Месо и производи од животинско потекло, житарки риба и деривати од риба(од кои 4% лосос), минерали, различни шеќери.', 5, 6, 1, NULL, '2020-09-28 10:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`) VALUES
(1, 'Алкохолни'),
(2, 'Безалкохолни'),
(3, 'Газирани'),
(4, 'Негазирани'),
(5, 'цигари (на парче)'),
(6, 'цигари (штека)'),
(7, 'сув тутун'),
(8, 'Средства за чистење'),
(9, 'прибори за опремување на кујна');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` smallint(5) UNSIGNED NOT NULL DEFAULT 1,
  `firstname` varchar(32) NOT NULL,
  `middlename` varchar(32) DEFAULT NULL,
  `lastname` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(64) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type_id`, `firstname`, `middlename`, `lastname`, `address`, `country_id`, `created_at`, `username`, `password`) VALUES
(1, 1, 'Тест', NULL, 'Клиент 1', 'Куманово', 2, '2020-09-29 09:13:01', 'test.customer1', 'Kumanovo1'),
(2, 1, 'Тест', NULL, 'Клиент 2', 'Скопје', 2, '2020-09-29 09:13:01', 'test.customer2', 'Skopje1'),
(3, 2, 'Admin', NULL, 'Nekoj', 'Nekade vo Makedonija', 2, '2020-09-29 09:14:46', 'admin1', 'admin1'),
(4, 2, 'admin2', NULL, 'drugnekoj', 'isto vo makedonija', 2, '2020-09-29 09:14:46', 'admin2', 'Admin2'),
(5, 3, 'DelCo', NULL, 'Internacional', 'Skopje', 2, '2020-09-29 09:16:54', 'delivery1', 'delivery12'),
(6, 3, 'Makedonski', NULL, 'Posti', 'Skopje', 2, '2020-09-29 09:16:54', 'posta', 'posta');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'customer'),
(2, 'admin'),
(3, 'delivery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_from_user_id` (`user_id`);

--
-- Indexes for table `cart_inventory`
--
ALTER TABLE `cart_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_inventory_cart_id_from_cart_id` (`cart_id`),
  ADD KEY `cart_inventory_inventory_id_from_inventory_id` (`inventory_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_choice`
--
ALTER TABLE `delivery_choice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_choice_delivery_id_from_user_id` (`delivery_id`),
  ADD KEY `delivery_choice_order_id_from_orders_id` (`order_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_product_barcode_from_product_barcode` (`product_barcode`);

--
-- Indexes for table `legal_entity`
--
ALTER TABLE `legal_entity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `legal_entity_country_id_from_country_id` (`country_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_cart_id_from_cart_id` (`cart_id`),
  ADD KEY `orders_approved_by_admin_id_kon_user_id` (`approved_by_admin_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `product_manufacturer_id_from_legal_entity_id` (`manufacturer_id`),
  ADD KEY `product_importer_id_from_legal_entity_id` (`importer_id`),
  ADD KEY `product_category_id_from_category_id` (`category_id`),
  ADD KEY `product_subcategory_id_from_subcategory_id` (`subcategory_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_type_id_from_user_type_id` (`user_type_id`),
  ADD KEY `user_country_id_from_country_id` (`country_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_inventory`
--
ALTER TABLE `cart_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery_choice`
--
ALTER TABLE `delivery_choice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `legal_entity`
--
ALTER TABLE `legal_entity`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_from_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart_inventory`
--
ALTER TABLE `cart_inventory`
  ADD CONSTRAINT `cart_inventory_cart_id_from_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_inventory_inventory_id_from_inventory_id` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `delivery_choice`
--
ALTER TABLE `delivery_choice`
  ADD CONSTRAINT `delivery_choice_delivery_id_from_user_id` FOREIGN KEY (`delivery_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `delivery_choice_order_id_from_orders_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_product_barcode_from_product_barcode` FOREIGN KEY (`product_barcode`) REFERENCES `product` (`barcode`);

--
-- Constraints for table `legal_entity`
--
ALTER TABLE `legal_entity`
  ADD CONSTRAINT `legal_entity_country_id_from_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_approved_by_admin_id_kon_user_id` FOREIGN KEY (`approved_by_admin_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_cart_id_from_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_from_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_importer_id_from_legal_entity_id` FOREIGN KEY (`importer_id`) REFERENCES `legal_entity` (`id`),
  ADD CONSTRAINT `product_manufacturer_id_from_legal_entity_id` FOREIGN KEY (`manufacturer_id`) REFERENCES `legal_entity` (`id`),
  ADD CONSTRAINT `product_subcategory_id_from_subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_country_id_from_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `user_user_type_id_from_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
