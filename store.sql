-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 19 2020 г., 22:24
-- Версия сервера: 5.7.29
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(100) NOT NULL,
  `name_basket` varchar(100) NOT NULL,
  `price_basket` int(100) NOT NULL,
  `material_basket` varchar(100) NOT NULL,
  `designer_basket` varchar(100) NOT NULL,
  `img_basket` varchar(100) NOT NULL,
  `color_basket` varchar(100) NOT NULL,
  `info_basket` varchar(100) NOT NULL,
  `sex_basket` varchar(100) NOT NULL,
  `quantity_basket` tinyint(10) NOT NULL,
  `size_basket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `designer` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `quantity` tinyint(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `material`, `designer`, `img`, `size`, `color`, `info`, `sex`, `quantity`) VALUES
(1, 'moshino cheap', 561, 'cotton', 'Birburhan', '/img/product_content1.jpg', 'xxl', 'White', 'Compellingly actualize fully researched processes before proactive outsourcing', 'men', 1),
(2, 'mango people t-shirt', 52, 'cotton', 'Birburah', '/img/product_content2.jpg', 'xxl', 'blue', 'Burton Menswear double breasted skinny suit jacket in sage green', 'men', 1),
(3, 'Embroidered cotton blouse', 102, 'cotton', 'Ralph Lauren', '/img/product_content3.jpg', 'xl', 'white', 'Compellingly actualize fully researched processes before proactive outsourcing', 'men', 1),
(4, 'Metallic knit top', 120, 'cotton', 'Christian Lacroix', '/img/product_content4.jpg', 'xxl', 'blue', 'Viggo recycled polyester slim fit suit trousers in blue check', 'men', 1),
(5, 'Fringes details', 520, 'angora ', 'Christian Lacroix', '/img/product_content5.jpg', 's', 'grey', 'Compellingly actualize fully researched processes before proactive outsourcing', 'men', 1),
(6, 'V-neckline essential', 59, 'satin', 'Ralph Lauren', '/img/product_content6.jpg', 'm', 'blue', 'Nike leg-a-see leggings in grey with just do it print', 'men', 1),
(7, 'Crew neckline blouse', 190, 'baft ', 'Paco Rabanne', '/img/product_content7.jpg', 'xs', 'grey', 'asos design rivington stretch powerhold denim jeggings in black', 'men', 1),
(8, 'Basic t-shirt', 199, 'cotton', 'Paco Rabanne', '/img/product_content8.jpg', 'xxs', 'brown', 'Burton Menswear skinny suit trousers in grey & pink stripe', 'men', 1),
(9, 'Printed knit top', 203, 'batiste ', 'Paco Rabanne', '/img/product_content9.jpg', 'xs', 'brown', 'Burton Menswear skinny suit trousers in grey & pink stripe', 'men', 1),
(10, 'Polka-dot print', 89, 'corduroy ', 'Sonia Rykiel', '/img/product_content2.jpg', 's', 'yellow', 'Brave Soul Plus heavenly teddy borg jacket in black', 'men', 1),
(11, 'Pleated T-shirt', 205, 'crinoline', 'Sonia Rykiel', '/img/product_content1.jpg', 'm', 'brown', 'Brave Soul shontelle brush fur jacket in cream', 'men', 1),
(12, 'Flowing halter top', 130, 'damask ', 'Hedi Slimane', '/img/product_content4.jpg', 'l', 'brown', 'Compellingly actualize fully researched processes before proactive outsourcing', 'men', 1),
(19, 't-short', 9899, 'clotch', 'raven', '/img/unnamed.jpg', 'xs', 'red', 'good coqote', 'men', 1),
(21, 'satyjn', 9000, 'cotton', 'pacaraban', '/img/unnamed.jpg', 'nothing', 'color', 'good', 'nothing', 1),
(25, 'kuraga', 7900, 'fier cat', 'lower sesd', '/img/unnamed.jpg', 's', '333', 'cat for fun', 'women', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
