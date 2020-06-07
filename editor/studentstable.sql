-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2020 г., 17:14
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `studentstable`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `mailing_hidden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_year` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `students_to_group`
--

CREATE TABLE `students_to_group` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `year` (`year`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_year` (`course_year`);

--
-- Индексы таблицы `students_to_group`
--
ALTER TABLE `students_to_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT для таблицы `students_to_group`
--
ALTER TABLE `students_to_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_year`) REFERENCES `groups` (`year`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students_to_group`
--
ALTER TABLE `students_to_group`
  ADD CONSTRAINT `students_to_group_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
