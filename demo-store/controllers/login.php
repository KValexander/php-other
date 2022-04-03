<?php
	session_start();
	include "../connect.php";

	$login = $_POST["login"];
	$password = $_POST["password"];

	$sql = sprintf("SELECT * FROM `users` WHERE `login`='%s'", $login);

	if($result = $connect->query($sql)) {
		$user = $result->fetch_assoc();

		if($user["password"] == $password) {
			
			$_SESSION["user_id"] = $user["user_id"];
			$_SESSION["role"] = $user["role"];

			return header("Location:../cart.php");
		}
		
	}

	return header("Location:../index.php?message=Ошибка логина или пароля");
	