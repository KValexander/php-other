<?php
	include "../controller/auth.php";
	require "../connect.php";

	$sql = "SELECT * FROM `book`";
	$head = "Книги";

	if(isset($_GET["author_id"])) {
		$sql = "
			SELECT
				`book`.`book_id`,
				`book`.`name`,
				`book`.`year_of_creation`,
				`book`.`description`,
				`book`.`publisher_id`,

				`author`.`author_id`,
				`author`.`surname`,
				`author`.`name` as `aname`,
				`author`.`patronymic`
			FROM `book` RIGHT JOIN `author` USING(`author_id`) WHERE `author_id`='". $_GET["author_id"] ."'";
		$head = "";
	}
	else if(isset($_GET["publisher_id"])) {
		$sql = "
			SELECT
				`book`.`book_id`,
				`book`.`name`,
				`book`.`year_of_creation`,
				`book`.`description`,
				`book`.`author_id`,

				`publisher`.`publisher_id`,
				`publisher`.`name` as `pname`
			FROM `book` RIGHT JOIN `publisher` USING(`publisher_id`) WHERE `publisher_id`='". $_GET["publisher_id"] ."'";
		$head = "";
	}

	$result = $db->query($sql);
	if(!$result) die("Ошибка извлечения данных: ". $db->connect_errno);
	$data = "";
	if($head == "") {
		$row = $result->fetch_assoc();
		if(isset($_GET["author_id"])) $head = "Книги автора ". $row["surname"] ." ". $row["aname"] ." ". $row["patronymic"];
		else if(isset($_GET["publisher_id"])) $head = "Книги издателя ". $row["pname"];
		$result->data_seek(0);
	}

	while($row = $result->fetch_assoc()) {
		if ($result->num_rows <= 1 && $row["book_id"] == NULL) break;
		if($head == "") {
			if(isset($_GET["author_id"])) $head = "Книги автора: ". $row["surname"] ." ". $row["aname"] ." ". $row["patronymic"];
			else if(isset($_GET["publisher_id"])) $head = "Книги издателя ". $row["pname"];
		}
		$data .= sprintf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
		", $row["name"], $row["year_of_creation"], $row["description"]);
	}
	if($data == "") $data = "<tr><td colspan=3>Данные отсутствуют</td></tr>";

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
				<h2><?= $head ?></h2>
			</div>

			<table>
				<tr>
					<th>Название книги</th>
					<th>Год создания</th>
					<th>Описание</th>
				</tr>
				<?= $data ?>
			</table>
		</div>
	</main>

	<footer>
		<div class="content">
			<p>Выполнил студент группы И-403 Курочкин Александр Викторович</p>
		</div>
	</footer>
	
</body>
</html>