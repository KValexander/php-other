<?php
	$link = new mysqli("localhost", "root", "root");
	if(!$link)
		return die("Ошибка соединения". $link->connect_error);

	$sql = "CREATE DATABASE IF NOT EXISTS `common` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

	if(!$link->query($sql))
		return die("Ошибка создания базы данных ". $link->error);

	$link->select_db("common");

	$sql = "
		CREATE TABLE IF NOT EXISTS `table` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `field_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
		  `field_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
		  `field_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1
	";

	if(!$link->query($sql))
		return die("Ошибка создания таблицы ". $link->error);

	return header("Location:select.php");
