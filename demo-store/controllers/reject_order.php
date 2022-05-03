<?php
	include "check_admin.php";
	include "../connect.php";

	$reason = $_POST["reason"];
	$order_id = $_POST["order_id"];

	$sql = sprintf("UPDATE `orders` SET `status`='Отменённый',`reason`='%s' WHERE `order_id`='%s'",  $reason, $order_id);
	if(!$connect->query($sql))
		return die("Ошибка обновления данных: ". $connect->error);

	return header("Location:../admin.php?message=Заказ отменён");