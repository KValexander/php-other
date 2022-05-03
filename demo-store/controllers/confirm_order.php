<?php
	include "check_admin.php";
	include "../connect.php";

	$order_id = $_POST["order_id"];

	$sql = sprintf("UPDATE `orders` SET `status`='Подтверждённый' WHERE `order_id`='%s'", $order_id);
	if(!$connect->query($sql))
		return die("Ошибка обновления данных: ". $connect->error);

	return header("Location:../admin.php?message=Заказ подтверждён");