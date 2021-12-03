<?php include "controller/auth.php"; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<header>
		<div class="content">
			<a href="index.php"><h1>Книги</h1></a>
			<nav>
				<a href="view/books.php">Книги</a> |
				<a href="view/authors.php">Авторы</a> |
				<a href="view/publishers.php">Издатели</a> |
				<?php 
					if ($auth) {
						print('
							<a href="view/console.php">Консоль</a> |
							<a href="view/profile.php">Личный кабинет</a> |
							<a href="controller/logout.php">Выйти</a>
						');
					} else {
						print('
							<a href="view/auth/register.php">Регистрация</a> |
							<a href="view/auth/login.php">Вход</a>
						');
					}
				?>
			</nav>
		</div>
	</header>

	<div class="banner">
		<div class="mask">
			<h1>База данных книг</h1>
			<h3>Выбери книгу себе по вкусу</h3>
			<a href="view/books.php"><button type="button">Выбрать книгу</button></a>
		</div>
	</div>

	<footer>
		<div class="content">
			<p>Выполнил студент группы И-403 Курочкин Александр Викторович</p>
		</div>
	</footer>
	
</body>
</html>