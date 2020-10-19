-- Adminer 4.5.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `brands` (`id`, `name`, `status`, `description`) VALUES
(1,	'All Cats',	1,	'all cats'),
(2,	'All Dods',	1,	'all dogs');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1,	'Clothes',	1),
(2,	'Shoes',	1),
(3,	'Watches',	1),
(4,	'Electronics',	1),
(5,	'Cosmetics',	1),
(6,	'Bags',	1);

DROP TABLE IF EXISTS `guestbook`;
CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` int(9) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `guestbook` (`id`, `name`, `email`, `message`, `subject`, `created_at`) VALUES
(1,	'John',	'john@example.com',	'Hi, It is John Doe',	1,	'2020-09-30 09:04:45'),
(2,	'John',	'john@example.com',	'Hi, It is John Doe',	1,	'2020-09-30 09:05:13'),
(3,	'Jaine',	'jaine@example.com',	'Hi, It is Jain Aire',	1,	'2020-09-30 09:05:13'),
(4,	'Joker',	'jk@my.cat',	'Hello cats!',	2,	'2020-09-30 09:14:44');

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `resource` varchar(50) NOT NULL,
  `resource_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pictures` (`id`, `filename`, `resource`, `resource_id`) VALUES
(1,	'2492afd6abba3114f84f25fbcee2131af90040fc1603096419',	'products',	1);

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) unsigned DEFAULT NULL,
  `price` float unsigned NOT NULL,
  `brand_id` int(11) unsigned NOT NULL,
  `description` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `is_recommended` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `name`, `status`, `category_id`, `price`, `brand_id`, `description`, `is_new`, `is_recommended`) VALUES
(1,	'Red shoes',	1,	2,	222,	1,	'red sjoes',	1,	0);

-- 2020-10-19 08:39:57
