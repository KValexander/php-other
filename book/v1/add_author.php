<?php
	require "connect.php";

	if(count($_POST) != 0) {
		$surname = htmlentities(trim($_POST["surname"]));
		$name = htmlentities(trim($_POST["name"]));
		$patronymic = htmlentities(trim($_POST["patronymic"]));
		$description = htmlentities(trim($_POST["description"]));

		if (isset($_GET["author_id"])) {
			$sql = sprintf("UPDATE `author` SET `surname`='%s', `name`='%s', `patronymic`='%s', `description`='%s' WHERE `author_id`='%s'",
				$db->real_escape_string($surname),
				$db->real_escape_string($name),
				$db->real_escape_string($patronymic),
				$db->real_escape_string($description),
				$_GET["author_id"]
			);
			if(!$db->query($sql)) die("Ошибка изменения данных: ". $db->connect_errno);
		} else {
			$sql = sprintf("INSERT INTO `author` VALUES(NULL, '%s', '%s', '%s', '%s')",
				$db->real_escape_string($surname),
				$db->real_escape_string($name),
				$db->real_escape_string($patronymic),
				$db->real_escape_string($description)
			);
			if(!$db->query($sql)) die("Ошибка добавления данных: ". $db->connect_errno);
		}

		header("Location: authors.php");
		exit;

	} else {
		$head = "Добавление автора";
		$value = "Добавить";

		$surname = "";
		$name = "";
		$patronymic = "";
		$description = "";

		if (isset($_GET["author_id"])) {
			$head = "Изменение автора";
			$value = "Изменить";

			$sql = "SELECT * FROM `author` WHERE `author_id`='". $_GET["author_id"] ."'";
			$result = $db->query($sql);
			if(!$result) die("Ошибка получения данных: ". $db->connect_errno);
			$row = $result->fetch_assoc();

			$surname = $row["surname"];
			$name = $row["name"];
			$patronymic = $row["patronymic"];
			$description = $row["description"];
		}
	}

?>

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
			<a href="index.html"><h1>Книги</h1></a>
			<nav>
				<a href="books.php">Книги</a> |
				<a href="authors.php">Авторы</a> |
				<a href="publishers.php">Издатели</a>
			</nav>
		</div>
	</header>

	<main>
		<div class="content">
			<div class="head">
				<h2><?= $head ?></h2>
			</div>

			<form method="POST">
				<input type="text" placeholder="Фамилия" name="surname" value="<?= $surname ?>">
				<input type="text" placeholder="Имя" name="name" value="<?= $name ?>">
				<input type="text" placeholder="Отчество" name="patronymic" value="<?= $patronymic ?>">
				<textarea name="description" placeholder="Описание"><?= $description ?></textarea>
				<input type="submit" value="<?= $value ?>">
			</form>

		</div>
	</main>

	<footer>
		<div class="content">
			<p>Выполнил студент группы И-403 Курочкин Александр Викторович</p>
		</div>
	</footer>
	
</body>
</html>