<?php
	include "check_admin.php";
	include "../connect.php";

	$category = $_POST["category"];

	$sql = sprintf("INSERT INTO `categories` VALUES(NULL, '%s')", $category);
	if(!$connect->query($sql))
		return die("Ошибка добавления данных: ". $connect->error);

	return header("Location:../admin.php?message=Категория добавлена");