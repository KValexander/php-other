<?php
	include "check.php";
	include "../connect.php";

	$user_id = $_SESSION["user_id"];
	$product_id = $_GET["id"];

	// Проверка на наличие товара в корзине
	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `product_id`='%s'", $user_id, $product_id);
	$result = $connect->query($sql);
	if(!$result)
		die ("Ошибка получения данных: ". $connect->error);

	// Получение товара
	$sql = "SELECT * FROM `products` WHERE `product_id`=". $product_id;
	$product = $connect->query($sql)->fetch_assoc();

	// Проверка на наличие товара на складе
	if($product["count"] <= 0)
		return header("Location:../cart.php?message=Товар отсутствует на складе");

	// Проверка на наличие товара в корзине
	if($order = $result->fetch_assoc())
		$sql = sprintf("UPDATE `orders` SET `amount`='%s' WHERE `order_id`='%s'",
			++$order["amount"], $order["order_id"]);
	else
		$sql = sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `amount`) VALUES('%s', '%s', 1)",
			$product_id, $user_id);

	if(!$connect->query($sql))
		die ("Ошибка добавления данных: ". $connect->error);

	// Удаление единицы добавляемого товара
	$sql = sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'",
		--$product["count"], $product_id);
	if(!$connect->query($sql))
		die ("Ошибка добавления данных: ". $connect->error);

	return header("Location:../cart.php?message=Товар добавлен");