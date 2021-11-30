<?php
	require "../connect.php";

	$sql = "SELECT * FROM `author`";
	$result = $db->query($sql);
	if(!$result) die("Ошибка извлечения данных: ". $db->connect_errno);
	$data = "";
	while($row = $result->fetch_assoc()) {
		$data .= sprintf("
			<tr>
				<td><a href='books.php?author_id=%s'>%s</a></td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
			</tr>
		",
		$row["author_id"],
		$row["surname"],
		$row["name"],
		$row["patronymic"],
		$row["description"]);
	}
	if($data == "") $data = "<tr><td colspan=6>Данные отсутствуют</td></tr>";

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
			<a href="index.html"><h1>Книги</h1></a>
			<nav>
				<a href="books.php">Книги</a> |
				<a href="authors.php">Авторы</a> |
				<a href="publishers.php">Издатели</a> |
				<a href="console.php">Консоль</a>
			</nav>
		</div>
	</header>

	<main>
		<div class="content">
			<div class="head">
				<h2>Авторы</h2>
			</div>

			<table>
				<tr>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
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