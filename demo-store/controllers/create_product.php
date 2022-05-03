<?php
	include "check_admin.php";
	include "../connect.php";

	// Получение данных
	$name 		= $_POST["name"];
	$price 		= $_POST["price"];
	$country 	= $_POST["country"];
	$year 		= $_POST["year"];
	$model 		= $_POST["model"];
	$category 	= $_POST["category"];
	$count 		= $_POST["count"];

	// Добавление изображения
	$path = "image/upload/1_".time()."_". $_FILES["image"]["name"];
	if(!move_uploaded_file($_FILES["image"]["tmp_name"], "../".$path))
		return die("Ошибка добавления изображения");

	// Запрос на добавление данных
	$sql = sprintf("
		INSERT INTO `products`(
			`name`,
			`path`,
			`year`,
			`price`,
			`category`,
			`country`,
			`model`,
			`count`
		) VALUES(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s'
		)
	",
		$name,
		$path,
		$year,
		$price,
		$category,
		$country,
		$model,
		$count
	);

	// Добавление данных в базу
	if(!$connect->query($sql))
		return die("Ошибка добавления данных: ". $connect->error);

	// Перенаправление на страницу каталога
	return header("Location:../catalog.php?message=Товар добавлен");