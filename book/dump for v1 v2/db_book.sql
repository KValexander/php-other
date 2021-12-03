CREATE DATABASE IF NOT EXISTS `db_book` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_book`;

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `author` (`author_id`, `surname`, `name`, `patronymic`, `description`) VALUES
(4, 'Достоевский', 'Иван', 'Фёдорович', 'Писатель'),
(5, 'Дюма', 'Александр', '', 'Писатель'),
(6, 'Булгаков', 'Михаил', 'Афанасьевич', 'Писатель');

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_creation` int(4) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `book` (`book_id`, `name`, `year_of_creation`, `description`, `author_id`, `publisher_id`) VALUES
(7, 'Преступление и наказание', 1866, 'Книга', 4, 4),
(8, 'Граф Монте-Кристо', 1846, 'Книга', 5, 4),
(9, 'Мастер и Маргарита', 1940, 'Книга', 6, 5),
(10, 'Идиот', 1869, 'Книга', 4, 4),
(11, 'Бесы', 1872, 'Книга', 4, 4),
(12, 'Три мушкетера', 1844, 'Книга', 5, 4),
(13, 'Робин Гуд', 1863, 'Книга', 5, 4),
(14, 'Белая гвардия', 1924, 'Книга', 6, 5),
(15, 'Дьяволиада', 1923, 'Повесть', 6, 5);

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_foundation` int(4) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `publisher` (`publisher_id`, `name`, `year_foundation`, `description`) VALUES
(4, 'Эскмо', 2001, 'Издатель'),
(5, 'Азбука', 2002, 'Издатель');

ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author_id` (`author_id`,`publisher_id`);

ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;