create database `php-demo`;
use `php-demo`;

CREATE TABLE `php-demo`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8mb4;