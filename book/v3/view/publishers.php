<?php
	include "../controller/auth.php";
	require "../connect.php";

	$sql = "SELECT * FROM `publisher`";
	$result = $db->query($sql);
	if(!$result) die("Ошибка извлечения данных: ". $db->connect_errno);
	$data = "";
	while($row = $result->fetch_assoc()) {
		$data .= sprintf("
			<tr>
				<td><a href='books.php?publisher_id=%s'>%s</a></td>
				<td>%s</td>
				<td>%s</td>
			</tr>
		",
		$row["publisher_id"],
		$row["name"],
		$row["year_foundation"],
		$row["description"]);
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
				<h2>Издатели</h2>
			</div>

			<table>
				<tr>
					<th>Имя</th>
					<th>Год основания</th>
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