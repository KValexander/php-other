<?php
	include "../controller/auth_check.php";
	require "../connect.php";

	$sql = "SELECT * FROM `user` WHERE `user_id`='".$_SESSION["user_id"]."'";
	$result = $db->query($sql);
	if(!$result) die("Ошибка получения данных: ". $db->connect_errno);
	$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>


	<header>
		<div class="content">
			<a href="../index.php"><h1>Книги</h1></a>
			<nav>
				<a href="books.php">Книги</a> |
				<a href="authors.php">Авторы</a> |
				<a href="publishers.php">Издатели</a> |
				<?php 
					if ($auth) {
						print('
							<a href="console.php">Консоль</a> |
							<a href="profile.php">Личный кабинет</a> |
							<a href="../controller/logout.php">Выйти</a>
						');
					} else {
						print('
							<a href="auth/register.php">Регистрация</a> |
							<a href="auth/login.php">Вход</a>
						');
					}
				?>
			</nav>
		</div>
	</header>

	<main>
		<div class="content">
			<div class="head">
				<h2>Личный кабинет</h2>
			</div>
			<div class="conc">
				<p><b>Имя пользователя:</b> <?= $user["username"] ?></p>
				<p><b>Почта:</b>  <?= $user["email"] ?></p>
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