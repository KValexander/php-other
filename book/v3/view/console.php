<?php
	include "../controller/auth_check.php";
	require "../connect.php";

	$sql = "SELECT * FROM `book`";
	$result = $db->query($sql);
	if(!$result) die("Ошибка извлечения данных: ". $db->connect_errno);
	$books = "";
	while($row = $result->fetch_assoc()) {
		$books .= sprintf("
			<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td><a href='form/form_book.php?book_id=%s'>Изменить</a></td>
				<td><a href='../controller/delete.php?book_id=%s'>Удалить</a></td>
			</tr>
		",
		$row["name"],
		$row["year_of_creation"],
		$row["description"],
		$row["book_id"],
		$row["book_id"]);
	}
	if($books == "") $books = "<tr><td colspan=5>Данные отсутствуют</td></tr>";

	$sql = "SELECT * FROM `author`";
	$result = $db->query($sql);
	if(!$result) die("Ошибка извлечения данных: ". $db->connect_errno);
	$authors = "";
	while($row = $result->fetch_assoc()) {
		$authors .= sprintf("
			<tr>
				<td><a href='books.php?author_id=%s'>%s</a></td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td><a href='form/form_author.php?author_id=%s'>Изменить</a></td>
				<td><a href='../controller/delete.php?author_id=%s'>Удалить</a></td>
			</tr>
		",
		$row["author_id"],
		$row["surname"],
		$row["name"],
		$row["patronymic"],
		$row["description"],
		$row["author_id"],
		$row["author_id"]);
	}
	if($authors == "") $authors = "<tr><td colspan=6>Данные отсутствуют</td></tr>";

	$sql = "SELECT * FROM `publisher`";
	$result = $db->query($sql);
	if(!$result) die("Ошибка извлечения данных: ". $db->connect_errno);
	$publishers = "";
	while($row = $result->fetch_assoc()) {
		$publishers .= sprintf("
			<tr>
				<td><a href='books.php?publisher_id=%s'>%s</a></td>
				<td>%s</td>
				<td>%s</td>
				<td><a href='form/form_publisher.php?publisher_id=%s'>Изменить</a></td>
				<td><a href='../controller/delete.php?publisher_id=%s'>Удалить</a></td>
			</tr>
		",
		$row["publisher_id"],
		$row["name"],
		$row["year_foundation"],
		$row["description"],
		$row["publisher_id"],
		$row["publisher_id"]);
	}
	if($publishers == "") $publishers = "<tr><td colspan=5>Данные отсутствуют</td></tr>";
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
			<a href="../../index.php"><h1>Книги</h1></a>
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
				<h2>Книги</h2>
			</div>

			<table>
				<tr>
					<th>Название книги</th>
					<th>Год создания</th>
					<th>Описание</th>
					<th>Изменение</th>
					<th>Удаление</th>
				</tr>
				<?= $books ?>
			</table>

			<div class="head">
				<h2>Авторы</h2>
			</div>

			<table>
				<tr>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
					<th>Описание</th>
					<th>Изменение</th>
					<th>Удаление</th>
				</tr>
				<?= $authors ?>
			</table>

			<div class="head">
				<h2>Издатели</h2>
			</div>

			<table>
				<tr>
					<th>Имя</th>
					<th>Год основания</th>
					<th>Описание</th>
					<th>Изменение</th>
					<th>Удаление</th>
				</tr>
				<?= $publishers ?>
			</table>

			<div class="head">
				<h2>Добавить</h2>
			</div>

			<div class="center">
				<form action="../controller/redirect.php">
					<select name="type">
						<option value="book">Книгу</option>
						<option value="author">Автора</option>
						<option value="publisher">Издателя</option>
					</select>
					<input type="submit" value="Добавить">
				</form>
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