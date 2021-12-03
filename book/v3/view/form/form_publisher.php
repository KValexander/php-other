<?php
	include "../../controller/auth_check.php";
	require "../../connect.php";

	if(count($_POST) != 0) {
		$name = htmlentities(trim($_POST["name"]));
		$year_foundation = htmlentities(trim($_POST["year_foundation"]));
		$description = htmlentities(trim($_POST["description"]));

		if (isset($_GET["publisher_id"])) {
			$sql = sprintf("UPDATE `publisher` SET `name`='%s', `year_foundation`='%s', `description`='%s' WHERE `publisher_id`='%s'",
				$db->real_escape_string($name),
				$db->real_escape_string($year_foundation),
				$db->real_escape_string($description),
				$_GET["publisher_id"]
			);
			if(!$db->query($sql)) die("Ошибка изменения данных: ". $db->connect_errno);
		} else {
			$sql = sprintf("INSERT INTO `publisher` VALUES(NULL, '%s', '%s', '%s')",
				$db->real_escape_string($name),
				$db->real_escape_string($year_foundation),
				$db->real_escape_string($description)
			);
			if(!$db->query($sql)) die("Ошибка добавления данных: ". $db->connect_errno);
		}

		header("Location:../console.php");
		exit;

	} else {
		$head = "Добавление издателя";
		$value = "Добавить";

		$name = "";
		$year_foundation = "";
		$description = "";

		if (isset($_GET["publisher_id"])) {
			$head = "Изменение издателя";
			$value = "Изменить";

			$sql = "SELECT * FROM `publisher` WHERE `publisher_id`='". $_GET["publisher_id"] ."'";
			$result = $db->query($sql);
			if(!$result) die("Ошибка получения данных: ". $db->connect_errno);
			$row = $result->fetch_assoc();

			$name = $row["name"];
			$year_foundation = $row["year_foundation"];
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
							<a href="../auth/register.php">Регистрация</a> |
							<a href="../auth/login.php">Вход</a>
						');
					}
				?>
			</nav>
		</div>
	</header>

	<main>
		<div class="content">
			<div class="head">
				<h2><?= $head ?></h2>
			</div>

			<form method="POST">
				<input type="text" placeholder="Имя" name="name" value="<?= $name ?>">
				<input type="number" placeholder="Год основания" name="year_foundation" value="<?= $year_foundation ?>">
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