-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2022 г., 18:51
-- Версия сервера: 10.3.29-MariaDB
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_demo_2022_2`
--
CREATE DATABASE IF NOT EXISTS `db_demo_2022_2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_demo_2022_2`;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `user_id`, `amount`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, NULL, NULL, '2022-03-28 07:15:12', '2022-03-28 07:17:01'),
(2, 3, 1, 3, NULL, NULL, '2022-03-28 07:17:16', '2022-03-28 07:17:16'),
(3, 5, 1, 2, NULL, NULL, '2022-03-28 07:17:26', '2022-03-28 07:17:26'),
(4, 0, 1, 8, 'Новый', NULL, '2022-03-28 07:19:18', '2022-03-28 07:19:18'),
(5, 0, 1, 8, 'Подтверждённый', NULL, '2022-03-30 07:47:13', '2022-03-30 07:47:13'),
(6, 0, 1, 8, 'Отменённый', 'Причина отмены заказа', '2022-03-30 07:47:46', '2022-03-30 07:47:46'),
(11, 0, 2, 39, 'Новый', NULL, '2022-04-03 07:42:52', '2022-04-03 07:42:52');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(4) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `path`, `year`, `price`, `category`, `country`, `model`, `count`, `created_at`) VALUES
(1, 'Обычный принтер', 'image/printer.png', 2020, 400, 'Лазерный принтер', 'Россия', 'Обычная', 333, '2022-03-14 07:45:27'),
(2, 'Не обычный принтер', 'image/printer.png', 2021, 402, 'Струйный принтер', 'Япония', 'Обычная', 1, '2022-03-14 07:50:37'),
(3, 'Корявый принтер', 'image/printer.png', 2021, 532, 'Лазерный принтер', 'Нидерладны', 'Обычная', 393, '2022-03-14 07:50:37'),
(4, 'Железный принтер', 'image/printer.png', 2021, 654, 'Лазерный принтер', 'Германия', 'Обычная', 4, '2022-03-14 07:50:37'),
(5, 'Принтер принтер', 'image/printer.png', 2020, 7123, 'Лазерный принтер', 'США', 'Обычная', 534, '2022-03-14 07:50:37'),
(6, 'Рофлан принтер', 'image/printer.png', 2020, 562, 'Лазерный принтер', 'Канада', 'Обычная', 12, '2022-03-14 07:50:37'),
(7, 'Задание принтер', 'image/printer.png', 2020, 7548, 'Лазерный принтер', 'Япония', 'Обычная', 4, '2022-03-14 07:50:37'),
(8, 'Посмотри на меня принтер', 'image/printer.png', 13, 400, 'Лазерный принтер', 'США', 'Обычная', 32, '2022-03-14 07:50:37'),
(9, 'Супер принтер', 'image/printer.png', 2022, 3241, 'Лазерный принтер', 'Германия', 'Обычная', 0, '2022-03-14 07:50:37'),
(10, 'Название принтер', 'image/printer.png', 2022, 526, 'Лазерный принтер', 'Нидерладны', 'Обычная', 46, '2022-03-14 07:50:37'),
(11, 'Дважды принтер принтер', 'image/printer.png', 2022, 643, 'Лазерный принтер', 'Россия', 'Обычная', 11, '2022-03-14 07:50:37');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'а', 'б', 'в', 'user', '2@2', '123456', 'user'),
(2, 'Администратор', 'Администратор', 'Администратор', 'admin', '1@1', 'admin11', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
