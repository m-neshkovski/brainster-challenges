-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 10:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge14`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `card_id` int(10) UNSIGNED NOT NULL,
  `sites_site_id` int(10) UNSIGNED NOT NULL,
  `product_url_img` varchar(255) DEFAULT NULL,
  `product_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`card_id`, `sites_site_id`, `product_url_img`, `product_description`) VALUES
(2, 2, './img/card.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat deleniti sapiente ut, provident veniam explicabo laudantium exercitationem labore aliquam animi eveniet magnam cumque nemo doloremque dolores. Quae corrupti minus cum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, doloremque ea obcaecati eos vel quis totam. Nisi incidunt amet expedita, quos aspernatur aliquid, a nihil fugiat cumque harum, dolore hic!'),
(3, 2, './img/card.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat deleniti sapiente ut, provident veniam explicabo laudantium exercitationem labore aliquam animi eveniet magnam cumque nemo doloremque dolores. Quae corrupti minus cum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, doloremque ea obcaecati eos vel quis totam. Nisi incidunt amet expedita, quos aspernatur aliquid, a nihil fugiat cumque harum, dolore hic!'),
(4, 2, './img/card.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat deleniti sapiente ut, provident veniam explicabo laudantium exercitationem labore aliquam animi eveniet magnam cumque nemo doloremque dolores. Quae corrupti minus cum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, doloremque ea obcaecati eos vel quis totam. Nisi incidunt amet expedita, quos aspernatur aliquid, a nihil fugiat cumque harum, dolore hic!'),
(5, 3, 'https://imgix.bustle.com/nylon/22906579/origin.jpg?w=1200&h=1000&auto=format%2Ccompress&cs=srgb&q=70&fit=crop&crop=faces', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, delectus! Atque voluptatem possimus velit? Amet ullam dignissimos fugiat, totam ut laboriosam sequi nam repellat iusto perferendis! Obcaecati dolore vero beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis a suscipit adipisci atque officia itaque voluptates laboriosam minus optio impedit, quo error nostrum in! Architecto unde sapiente accusamus voluptatibus. At. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique dolorum fugiat harum expedita fuga pariatur quidem? Ratione, optio? Magni nostrum tempore modi odio similique delectus perspiciatis alias veritatis praesentium aspernatur.'),
(6, 3, 'https://imgix.bustle.com/nylon/22906579/origin.jpg?w=1200&h=1000&auto=format%2Ccompress&cs=srgb&q=70&fit=crop&crop=faces', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, delectus! Atque voluptatem possimus velit? Amet ullam dignissimos fugiat, totam ut laboriosam sequi nam repellat iusto perferendis! Obcaecati dolore vero beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis a suscipit adipisci atque officia itaque voluptates laboriosam minus optio impedit, quo error nostrum in! Architecto unde sapiente accusamus voluptatibus. At. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique dolorum fugiat harum expedita fuga pariatur quidem? Ratione, optio? Magni nostrum tempore modi odio similique delectus perspiciatis alias veritatis praesentium aspernatur.'),
(7, 3, 'https://imgix.bustle.com/nylon/22906579/origin.jpg?w=1200&h=1000&auto=format%2Ccompress&cs=srgb&q=70&fit=crop&crop=faces', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, delectus! Atque voluptatem possimus velit? Amet ullam dignissimos fugiat, totam ut laboriosam sequi nam repellat iusto perferendis! Obcaecati dolore vero beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis a suscipit adipisci atque officia itaque voluptates laboriosam minus optio impedit, quo error nostrum in! Architecto unde sapiente accusamus voluptatibus. At. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique dolorum fugiat harum expedita fuga pariatur quidem? Ratione, optio? Magni nostrum tempore modi odio similique delectus perspiciatis alias veritatis praesentium aspernatur.'),
(8, 4, 'https://visualhunt.com/photos/2/portrait-of-beautiful-cat-with-blue-eyes.jpg?s=l', 'Се залагаме за заштита на сите видови на мачки.'),
(9, 4, 'https://visualhunt.com/photos/2/portrait-of-beautiful-cat-with-blue-eyes.jpg?s=l', 'Имаме заедница на љубители на мачки за привремено вдомување на мачки.'),
(10, 4, 'https://visualhunt.com/photos/2/portrait-of-beautiful-cat-with-blue-eyes.jpg?s=l', 'Упатства за начин на чување на мачки.');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` smallint(5) UNSIGNED NOT NULL,
  `product_type_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
(1, 'продукти'),
(2, 'сервиси');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `site_id` int(10) UNSIGNED NOT NULL,
  `cover_img_address` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `phone` varchar(32) NOT NULL,
  `location` varchar(255) NOT NULL,
  `product_type_product_type_id` smallint(5) UNSIGNED NOT NULL,
  `contact_description` text NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `tweeter_link` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `cover_img_address`, `title`, `subtitle`, `about`, `phone`, `location`, `product_type_product_type_id`, `contact_description`, `linkedin_link`, `facebook_link`, `tweeter_link`, `google_link`, `created_at`) VALUES
(2, './img/cover-photo.jpg', 'Наслов', 'Поднаслов', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat deleniti sapiente ut, provident veniam explicabo laudantium exercitationem labore aliquam animi eveniet magnam cumque nemo doloremque dolores. Quae corrupti minus cum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, doloremque ea obcaecati eos vel quis totam. Nisi incidunt amet expedita, quos aspernatur aliquid, a nihil fugiat cumque harum, dolore hic!', 'Внесен телефон', 'Внесена локација', 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat deleniti sapiente ut, provident veniam explicabo laudantium exercitationem labore aliquam animi eveniet magnam cumque nemo doloremque dolores. Quae corrupti minus cum. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, doloremque ea obcaecati eos vel quis totam. Nisi incidunt amet expedita, quos aspernatur aliquid, a nihil fugiat cumque harum, dolore hic!', 'www.linkedin.com', 'www.facebook.com', 'www.tweeter.com', 'www.google.com', '2020-12-04 12:50:45'),
(3, 'https://static.toiimg.com/photo/72975551.cms', 'Помрачење сунца', 'Астролошки мистерии', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, delectus! Atque voluptatem possimus velit? Amet ullam dignissimos fugiat, totam ut laboriosam sequi nam repellat iusto perferendis! Obcaecati dolore vero beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis a suscipit adipisci atque officia itaque voluptates laboriosam minus optio impedit, quo error nostrum in! Architecto unde sapiente accusamus voluptatibus. At. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique dolorum fugiat harum expedita fuga pariatur quidem? Ratione, optio? Magni nostrum tempore modi odio similique delectus perspiciatis alias veritatis praesentium aspernatur.', '+38975555555', 'Куманово', 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, delectus! Atque voluptatem possimus velit? Amet ullam dignissimos fugiat, totam ut laboriosam sequi nam repellat iusto perferendis! Obcaecati dolore vero beatae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis a suscipit adipisci atque officia itaque voluptates laboriosam minus optio impedit, quo error nostrum in! Architecto unde sapiente accusamus voluptatibus. At. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique dolorum fugiat harum expedita fuga pariatur quidem? Ratione, optio? Magni nostrum tempore modi odio similique delectus perspiciatis alias veritatis praesentium aspernatur.', 'www.linkedin.com', 'www.facebook.com', 'www.tweeter.com', 'www.google.com', '2020-12-04 14:29:26'),
(4, 'https://coverfiles.alphacoders.com/101/101083.jpg', 'Мачкари', 'Здружение за заштита на мачки', 'Ние сме здружение на индивидуи кои сакаат мачки. Нудиме сервиси за вдомување на мачки од секаков вид како и за борба за правата на мачките.', '+38972222222', 'Македонија', 2, 'Доколку имате желба да станете дел од нашата заедница, сакате да вдомите мачка или ви треба некој совет, контактирајте не преку формата од десна страна.', 'www.linkedin.com', 'www.facebook.com', 'www.tweeter.com', 'www.google.com', '2020-12-05 09:27:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `sites_site_id_kon_cards_sites_site_id` (`sites_site_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`site_id`),
  ADD KEY `product_type_id_kon_product_type_product_type_id` (`product_type_product_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `card_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `site_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `sites_site_id_kon_cards_sites_site_id` FOREIGN KEY (`sites_site_id`) REFERENCES `sites` (`site_id`);

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `product_type_id_kon_product_type_product_type_id` FOREIGN KEY (`product_type_product_type_id`) REFERENCES `product_type` (`product_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
