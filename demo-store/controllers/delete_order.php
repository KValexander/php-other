<?php
	include "check.php";
	include "../connect.php";

	$id = $_GET["id"];
	$user_id = $_SESSION["user_id"];

	$sql = sprintf("SELECT * FROM `orders` WHERE `order_id`='%s' AND `product_id`=0 AND `user_id`='%s'",
		$id, $user_id);
	$result = $connect->query($sql);
	if(!$result)
		return die("Ошибка получения данных: ". $connect->error);

	if($order = $result->fetch_assoc()) {
		if($order["status"] == "Новый") {
			$sql = sprintf("DELETE FROM `orders` WHERE `order_id`='%s'", $order["order_id"]);
			if(!$connect->query($sql))
				return die("Ошибка удаления данных: ". $connect->error);

			return header("Location:../cart.php?message=Заказ удалён");
		}
	}

	return header("Location:../cart.php?message=Можно удалять только новые заказы");