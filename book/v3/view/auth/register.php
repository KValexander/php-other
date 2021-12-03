<?php
	include "../../controller/auth.php";
	require "../../connect.php";

	if (count($_POST) != 0) {
		$username = htmlentities(trim($_POST["username"]));
		$email = htmlentities(trim($_POST["email"]));
		$login = htmlentities(trim($_POST["login"]));
		$password = htmlentities(trim($_POST["password"]));

		$sql = sprintf("INSERT INTO `user` VALUES (NULL, '%s', '%s', '%s', '%s')",
			$db->real_escape_string($username),
			$db->real_escape_string($emai),
			$db->real_escape_string($login),
			$db->real_escape_string($password)
		);
		if(!$db->query($sql)) die("Ошибка добавления данных: ". $db->connect_errno);

		header("Location:login.php");
		exit;
	}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
	<link rel="stylesheet" href="../../style.css">
</head>
<body>

	<header>
		<div class="content">
			<a href="../../index.php"><h1>Книги</h1></a>
			<nav>
				<a href="../books.php">Книги</a> |
				<a href="../authors.php">Авторы</a> |
				<a href="../publishers.php">Издатели</a> |
				<?php 
					if ($auth) {
						print('
							<a href="../console.php">Консоль</a> |
							<a href="../profile.php">Личный кабинет</a> |
							<a href="../../controller/logout.php">Выйти</a>
						');
					} else {
						print('
							<a href="register.php">Регистрация</a> |
							<a href="login.php">Вход</a>
						');
					}
				?>
			</nav>
		</div>
	</header>

	<main>
		<div class="content">
			<div class="head">
				<h2>Регистрация</h2>
			</div>

			<form method="POST">
				<input type="text" placeholder="Имя пользователя" name="username">
				<input type="text" placeholder="Почта" name="email">
				<input type="text" placeholder="Логин" name="login">
				<input type="text" placeholder="Пароль" name="password">
				<input type="submit" value="Зарегистрироваться">
			</form>
			<div class="center">
				Уже зарегистрированы? Тогда <a href="login.php">войдите</a>!
			</div>

		</div>
	</main>

	<footer>
		<div class="content">
			<p>Выполнил студент группы И-403 Курочкин Александр Викторович</p>
		</div>
	</footer>
	
</body>
</html>