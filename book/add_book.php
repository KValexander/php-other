<?php
	require "connect.php";

	if(count($_POST) != 0) {
		$name = htmlentities(trim($_POST["name"]));
		$year_of_creation = htmlentities(trim($_POST["year_of_creation"]));
		$description = htmlentities(trim($_POST["description"]));
		$author_id = (isset($_POST["author_id"])) ? $_POST["author_id"] : 0;
		$publisher_id = (isset($_POST["publisher_id"])) ? $_POST["publisher_id"] : 0;

		if (isset($_GET["book_id"])) {
			$sql = sprintf("UPDATE `book` SET `name`='%s', `year_of_creation`='%s', `description`='%s', `author_id`='%s', `publisher_id`='%s' WHERE `book_id`='%s'",
				$db->real_escape_string($name),
				$db->real_escape_string($year_of_creation),
				$db->real_escape_string($description),
				$author_id,
				$publisher_id,
				$_GET["book_id"]
			);
			if(!$db->query($sql)) die("Ошибка изменения данных: ". $db->connect_errno);
		} else {
			$sql = sprintf("INSERT INTO `book` VALUES(NULL, '%s', '%s', '%s', '%s', '%s')",
				$db->real_escape_string($name),
				$db->real_escape_string($year_of_creation),
				$db->real_escape_string($description),
				$author_id,
				$publisher_id
			);
			var_dump($sql);
			if(!$db->query($sql)) die("Ошибка добавления данных: ". $db->connect_errno);
		}

		header("Location: books.php");
		exit;

	} else {
		$head = "Добавление книги";
		$value = "Добавить";

		$name = "";
		$year_of_creation = "";
		$description = "";

		$authors = "";
		$publishers = "";

		if (isset($_GET["book_id"])) {
			$head = "Изменение книги";
			$value = "Изменить";
			$sql = "SELECT * FROM `book` WHERE `book_id`='". $_GET["book_id"] ."'";
			$result = $db->query($sql);
			if(!$result) die("Ошибка получения данных: ". $db->connect_errno);
			$row = $result->fetch_assoc();

			$author_id = $row["author_id"];
			$publisher_id = $row["publisher_id"];
			$name = $row["name"];
			$year_of_creation = $row["year_of_creation"];
			$description = $row["description"];

			$sql = "SELECT * FROM `author`";
			$result = $db->query($sql);
			if (!$result) die("Ошибка получения данных: ". $db->connect_errno);
			while($row = $result->fetch_assoc()) {
				if($row["author_id"] == $author_id)
					$authors .= sprintf("<option value='%s' selected>%s %s %s</option>", $row["author_id"], $row["surname"], $row["name"], $row["patronymic"]);
				else $authors .= sprintf("<option value='%s'>%s %s %s</option>", $row["author_id"], $row["surname"], $row["name"], $row["patronymic"]);
			}

			$sql = "SELECT * FROM `publisher`";
			$result = $db->query($sql);
			if (!$result) die("Ошибка получения данных: ". $db->connect_errno);
			while($row = $result->fetch_assoc()) {
				if($row["publisher_id"] == $publisher_id)
					 $publishers .= sprintf("<option value='%s' selected>%s</option>", $row["publisher_id"], $row["name"]);
				else $publishers .= sprintf("<option value='%s'>%s</option>", $row["publisher_id"], $row["name"]);
			}

		} else {
			$sql = "SELECT * FROM `author`";
			$result = $db->query($sql);
			if (!$result) die("Ошибка получения данных: ". $db->connect_errno);
			while($row = $result->fetch_assoc())
				$authors .= sprintf("<option value='%s'>%s %s %s</option>", $row["author_id"], $row["surname"], $row["name"], $row["patronymic"]);

			$sql = "SELECT * FROM `publisher`";
			$result = $db->query($sql);
			if (!$result) die("Ошибка получения данных: ". $db->connect_errno);
			while($row = $result->fetch_assoc())
				$publishers .= sprintf("<option value='%s'>%s</option>", $row["publisher_id"], $row["name"]);
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
				<input type="text" placeholder="Название" name="name" value="<?= $name ?>">
				<input type="number" placeholder="Год создания" name="year_of_creation"  value="<?= $year_of_creation ?>">
				<textarea name="description" placeholder="Описание"><?= $description ?></textarea>
				<select name="author_id">
					<option disabled selected>Авторы</option>
					<?= $authors ?>
				</select>
				<select name="publisher_id">
					<option disabled selected>Издатели</option>
					<?= $publishers ?>
				</select>
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