-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2025 at 06:59 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booknestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `price`, `created_at`) VALUES
(1, 'Mexican Gothic', 'Silvia Moreno-Garcia', 'A gothic horror novel set in 1950s Mexico, where a woman investigates her cousin’s mysterious illness in a decaying mansion.', 15.99, '2025-04-01 19:22:28'),
(2, 'The Name of the Wind', ' Patrick Rothfuss', 'The first book in \"The Kingkiller Chronicle,\" following the life of Kvothe, a legendary figure recounting his journey through magic, music, and tragedy.', 18.99, '2025-04-01 19:22:28'),
(3, 'The Girl with the Dragon Tattoo', 'Stieg Larsson', 'A gripping crime thriller where a journalist and a hacker investigate the mysterious disappearance of a woman decades ago.', 14.99, '2025-04-01 19:22:28'),
(4, 'Me Before You', 'Jojo Moyes', ' A heart-wrenching romance between a caregiver and a quadriplegic man, exploring love, life choices, and loss.', 12.99, '2025-04-01 19:22:28'),
(5, 'The Power of Now', 'Eckhart Tolle', ' A transformative guide to living in the present moment, free from the constraints of past and future worries.', 14.99, '2025-04-01 19:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `rating` int DEFAULT NULL,
  `comment` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `rating`, `comment`, `created_at`) VALUES
(1, 1, 1, 5, 'exc book', '2025-04-02 09:31:35'),
(2, 1, 1, 5, 'exc book2', '2025-04-02 09:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Gagan', 'gagan@gmail.com', '$2y$10$6fg3d9M4Jivbv5a7DBAfXeHX9V52YICbNjyNcBRCGq8GDigyFODUK', '2025-03-28 09:33:59'),
(2, 'kaur', 'kaur@gmail.com', '$2y$10$zymqdt72IyOjxCbRuPqjh.Ev6/cFfam.GJpo5r/MtQjgT0XN6nm/6', '2025-04-02 11:46:00'),
(3, 'jan', 'jan@jan.com', '$2y$10$zKKPRhu6gfHm0mdjsoWWyuFVbtjDy1uq/xTy.j48jGmkViNNdlJu.', '2025-04-02 12:06:59'),
(4, 'jan', 'jan@jan2.com', '$2y$10$VJy1W2uDRyb4VdRQVD666e2L84mlWK28gAbnUBHvoK6rsopoFzcqe', '2025-04-02 12:10:28'),
(5, 'Kaur', 'gkaur@gmail.com', '$2y$10$o2q/Rbu0FgoHxzd5IhA5x.Nnybjo80nmheMHqo9TIRS99hIyvl2vy', '2025-04-02 12:15:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
