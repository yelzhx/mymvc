--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.53.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 12.11.2017 5:13:39
-- Версия сервера: 5.5.8
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE db_mymvc;

--
-- Описание для таблицы users
--
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(32) NOT NULL,
  amount INT(11) DEFAULT 0,
  is_active TINYINT(1) DEFAULT 1,
  PRIMARY KEY (id),
  UNIQUE INDEX username (username)
)
ENGINE = MYISAM
AUTO_INCREMENT = 2
AVG_ROW_LENGTH = 258
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = FIXED;

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 98248, 1);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;