<?php
	// Получение сообщения
	$message = (isset($_GET["message"])) ? $_GET["message"] : "";

	// Получение роли
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	// Формирование меню
	$menu = '
		<a href="index.php">О нас</a>
		<a href="catalog.php">Каталог</a>
		<a href="where.php">Где нас найти?</a>
	';
	switch($role) {

		case "admin":
			$menu .= '
				<a href="cart.php">Корзина</a>
				<a href="admin.php">Заказы</a>
				<a href="controllers/logout.php">Выход</a>
			';
		break;

		case "user":
			$menu .= '
				<a href="cart.php">Корзина</a>
				<a href="controllers/logout.php">Выход</a>
			';
		break;

		case "guest":
			$menu .= '
				<a href="index.php#login">Вход</a>
				<a href="index.php#register">Регистрация</a>
			';
		break;

	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online store</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<header>
		
		<div class="top">
			<div>
				<img src="logo/logo.png" alt="">
				<h1>CopyStar</h1>
			</div>
			<h2>Девиз нашей компании!</h2>
		</div>

		<div class="content">
			<nav>
				<?= $menu ?>
				<!-- <a href="index.php">О нас</a>
				<a href="catalog.php">Каталог</a>
				<a href="where.php">Где нас найти?</a>
				<a href="index.php#login">Вход</a>
				<a href="index.php#register">Регистрация</a>
				<a href="cart.php">Корзина</a>
				<a href="admin.php">Заказы</a>
				<a href="controllers/logout.php">Выход</a> -->
			</nav>
		</div>

	</header>

	<div class="message"><?= $message ?></div>