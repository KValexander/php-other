<?php
	$db = new mysqli("localhost", "root", "root", "db_music");
	$db->set_charset("utf8");
	$sql = "SELECT * FROM `team`";
	$result = $db->query($sql);
	$data = "";
	while($row = $result->fetch_assoc()) {
		$data .= "
		<tr>
			<td><a href='albums.php?id_team=". $row["id_team"] ."'>". $row["name"] ."</a></td>
			<td>". $row["country"] ."</td>
			<td>". $row["date"] ."</td>
			<td>". $row["style"] ."</td>
		</tr>
		";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>MySQL Active - Группы</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<div class="content">
				<div class="logo">
					<img src="assets/logo.png" alt="logo">
					<a href="/"><h2>MySQL Active</h2></a>
				</div>
				<nav>
					<a href="teams.php">Группы</a>
					<a href="albums.php">Альбомы</a>
					<a href="tracks.php">Треки</a> |
					<a href="register.php">Регистрация</a>
					<a href="login.php">Войти</a>
				</nav>
			</div>
		</header>
		<div class="up"></div>

		<main>
			<div class="content">
				<div class="center">
					<table>
						<tr>
							<th>Название</th>
							<th>Страна</th>
							<th>Дата</th>
							<th>Стиль</th>
						</tr>
						<?php echo $data ?>
					</table>
				</div>
			</div>
		</main>


		<footer>
			<div class="content">
				<div class="block">
					<div class="logo">
						<img src="assets/logo.png" alt="logo">
						<a href="/"><h2>MySQL Active</h2></a>
					</div>
				</div>
				<div class="block">
					<div class="head">Компания</div>
					<div class="links">
						<p>О нас</p>
						<p>Вакансии</p>
						<p>For the record</p>
					</div>
				</div>
				<div class="block">
					<div class="head">Сообщества</div>
					<div class="links">
						<p>Для исполнителей</p>
						<p>Для разработчиков</p>
						<p>Реклама</p>
						<p>Для инвесторов</p>
						<p>Для вендоров</p>
					</div>
				</div>
				<div class="block">
					<div class="head">Полезные ссылки</div>
					<div class="links">
						<p>Справка</p>
						<p>Веб-плеер</p>
						<p>Бесплатное мобильное приложение</p>
					</div>
				</div>
			</div>
			<br><br><p style="text-align: center">Выполнил студент группы И-403 Курочкин Александр Викторович. ППЭТ 2021</p>
		</footer>
	</body>
</html>