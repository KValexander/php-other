<?php
	include "../connect.php";

	$name 		= $_POST["name"];
	$surname 	= $_POST["surname"];
	$patronymic = $_POST["patronymic"];
	$login 		= $_POST["login"];
	$email 		= $_POST["email"];
	$password 	= $_POST["password"];

	$sql = sprintf("
		INSERT INTO `users` VALUES(NULL, '%s', '%s', '%s', '%s', '%s', '%s', 'user')
		",	$name, $surname, $patronymic, $login, $email, $password
	);

	$result = $connect->query($sql);
	if(!$result)
		die("Ошибка добавления данных: ". $connect->error);

	return header("Location:../index.php?message=Вы зарегистрировались");