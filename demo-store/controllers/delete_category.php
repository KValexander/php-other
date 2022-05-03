<?php
	include "check_admin.php";
	include "../connect.php";

	$category_id = $_POST["category_id"];

	$sql = sprintf("DELETE FROM `categories` WHERE `category_id`='%s'", $category_id);
	if(!$connect->query($sql))
		return die("Ошибка удаления данных: ". $connect->error);

	return header("Location:../admin.php?message=Категория удалена");