<?php
	include "check_admin.php";
	include "../connect.php";

	// Получение id товара
	$product_id = $_GET["id"];

	// Удаление товара из всех корзин
	$sql = sprintf("DELETE FROM `orders` WHERE `product_id`='%s'", $product_id);
	if(!$connect->query($sql))
		return die("Ошибка удаления данных: ". $connect->error);

	// Удаление товара
	$sql = sprintf("DELETE FROM `products` WHERE `product_id`='%s'", $product_id);
	if(!$connect->query($sql))
		return die("Ошибка удаления данных: ". $connect->error);

	// Перенаправление
	return header("Location:../catalog.php?message=Товар удалён");