<?php
	include "check.php";
	include "../connect.php";

	$user_id = $_SESSION["user_id"];
	$product_id = $_GET["id"];

	$sql = "SELECT * FROM `products` WHERE `product_id`=". $product_id;
	$product = $connect->query($sql)->fetch_assoc();

	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `product_id`='%s'",
		$user_id, $product_id);
	$order = $connect->query($sql)->fetch_assoc();

	if($order["amount"] <= 1)
		$sql = sprintf("DELETE FROM `orders` WHERE `order_id`='%s'", $order["order_id"]);
	else
		$sql = sprintf("UPDATE `orders` SET `amount`='%s' WHERE `order_id`='%s'",
			--$order["amount"], $order["order_id"]);

	if(!$connect->query($sql))
		die("Ошибка изменения данных: ". $connect->error);

	$sql = sprintf("UPDATE `products` SET `count`='%s' WHERE `product_id`='%s'",
		++$product["count"], $product["product_id"]);
	if(!$connect->query($sql))
		die("Ошибка изменения данных: ". $connect->error);

	return header("Location:../cart.php?message=Товар убран");


