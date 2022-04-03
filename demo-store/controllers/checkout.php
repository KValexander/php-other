<?php
	include "check.php";
	include "../connect.php";

	$user_id = $_SESSION["user_id"];

	// Проверка пароля
	$password = $_POST["password"];
	$user_password = $connect->query("SELECT * FROM `users` WHERE `user_id`=".$user_id)->fetch_assoc()["password"];
	if($password != $user_password)
		return header("Location:../cart.php?message=Ошибка пароля");

	// Запрос на получение заказов
	$sql = "SELECT * FROM `orders` WHERE `product_id`!=0 AND `user_id`=". $user_id;
	$result = $connect->query($sql);

	// Получение общего количества товаров
	$count = 0;
	while($row = $result->fetch_assoc())
		$count += $row["amount"];

	// Создание заказа
	$sql = sprintf("INSERT INTO `orders`(`product_id`, `user_id`, `amount`, `status`) VALUES(0, '%s', '%s', 'Новый')",
		$user_id, $count);
	if(!$connect->query($sql))
		die("Ошибка добавления данных: ". $connect->error);

	// Удаление товаров из корзины
	$sql = sprintf("DELETE FROM `orders` WHERE `product_id`!=0 AND `user_id`='%s'", $user_id);
	if(!$connect->query($sql))
		die("Ошибка удаления данных: ". $connect->error);

	return header("Location:../cart.php?message=Заказ оформлен");
