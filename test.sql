-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 10 2015 г., 16:41
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` char(120) COLLATE utf8_unicode_ci NOT NULL,
  `creat` datetime NOT NULL,
  `upd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `creat`, `upd`) VALUES
(1, 'Дональд Кнут', '2015-03-08 10:00:00', '2015-03-09 06:14:00'),
(2, 'Эрих Мария Ремарк', '2015-03-06 14:00:00', '2015-03-08 09:15:00'),
(7, 'Иммануил Кант', '2015-03-09 11:09:04', '2015-03-09 11:09:04'),
(8, 'Гете', '2015-03-09 11:10:37', '2015-03-09 11:10:37'),
(9, 'Жюль Верн', '2015-03-10 13:09:31', '2015-03-10 13:09:31');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` char(120) COLLATE utf8_unicode_ci NOT NULL,
  `creat` datetime NOT NULL,
  `upd` datetime NOT NULL,
  `reader` int(10) NOT NULL,
  `pic` char(90) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `creat`, `upd`, `reader`, `pic`) VALUES
(1, 'Искусство программирования', '2015-03-08 10:00:00', '2015-03-09 15:02:17', 0, '/pics/iskusstvo.jpg'),
(2, 'На западном фронте без перемен', '2015-03-06 14:00:00', '2015-03-08 09:15:00', 5, '/pics/front.jpg'),
(5, 'Фауст', '2015-03-09 17:57:26', '2015-03-09 18:16:49', 3, '/pics/faust.jpg'),
(6, 'Критика чистого разума', '2015-03-09 18:35:18', '2015-03-09 18:38:33', 3, '/pics/kant.jpg'),
(7, 'Вокруг света за 80 дней', '2015-03-10 13:09:02', '2015-03-10 13:25:03', 1, ''),
(8, 'Путешествие к центру Земли', '2015-03-10 13:09:18', '2015-03-10 13:25:10', 3, ''),
(9, 'Таинственный остров', '2015-03-10 13:10:12', '2015-03-10 13:17:48', 2, ''),
(10, 'Дети капитана Гранта', '2015-03-10 13:10:51', '2015-03-10 13:24:21', 2, ''),
(11, 'Двадцать тысяч лье под водой', '2015-03-10 13:11:42', '2015-03-10 13:24:05', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `book_authors`
--

CREATE TABLE IF NOT EXISTS `book_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(12) NOT NULL,
  `author_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `book_authors`
--

INSERT INTO `book_authors` (`id`, `book_id`, `author_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 7),
(4, 5, 8),
(6, 5, 1),
(7, 5, 7),
(8, 6, 7),
(9, 2, 7),
(10, 7, 9),
(11, 8, 9),
(12, 9, 9),
(13, 10, 9),
(14, 11, 9),
(15, 9, 1),
(16, 9, 7),
(17, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1425886210);

-- --------------------------------------------------------

--
-- Структура таблицы `readers`
--

CREATE TABLE IF NOT EXISTS `readers` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` char(120) COLLATE utf8_unicode_ci NOT NULL,
  `dept` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `creat` datetime NOT NULL,
  `upd` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `readers`
--

INSERT INTO `readers` (`id`, `name`, `dept`, `creat`, `upd`) VALUES
(1, 'Олег Петров', 'Бухгалтерия', '2015-03-08 10:00:00', '2015-03-09 06:14:00'),
(2, 'Иван Денисов', 'Ит-отдел', '2015-03-06 14:00:00', '2015-03-08 09:15:00'),
(3, 'Ира Тарасова', 'Отдел рекламы', '2015-03-09 07:00:00', '2015-03-09 10:00:00'),
(5, 'Татьяна шевякова', 'Бухгалтерия', '2015-03-09 13:09:50', '2015-03-09 13:09:50'),
(6, 'Alexx', 'Ит-отдел', '2015-03-09 17:36:04', '2015-03-09 17:36:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
