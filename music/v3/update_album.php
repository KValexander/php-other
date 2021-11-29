<?php
	$db = new mysqli("localhost", "root", "root", "db_music");
	$db->set_charset("utf8");

	//
	if(isset($_GET["id_album"])) {
		$sql = "SELECT
			`track`.`id_track`,
			`track`.`name`,
			`track`.`note`,
			`track`.`id_album`,

			`album`.`id_album`,
			`album`.`title`,
			`album`.`date` as `adate`,
			`album`.`country` as `acountry`,
			`album`.`id_team`,

			`team`.`id_team`,
			`team`.`name` as `tname`,
			`team`.`country` as `tcountry`,
			`team`.`date` as `tdate`,
			`team`.`style`

		FROM `track` INNER JOIN `album` USING(`id_album`) INNER JOIN `team` USING(`id_team`) WHERE `id_album`=".$_GET["id_album"];
		
	} else {
		$sql = "SELECT `id_track`, `name`, `note`, `id_album` FROM `track`";
	}

	//
	$result = $db->query($sql);

	//
	if(isset($_GET["id_album"])) {
		$team = $result->fetch_assoc();
		$data = "<h2>Треки альбома '". $team["title"] ."' <br/> Группа '". $team["tname"] ."'</h2>";
	} else $data = "<h2>Все Треки</h2>";

	$result->data_seek(0);

	//
	while($row = $result->fetch_assoc()) {
		$item .= "
		<tr>
			<td><a href='update_track.php?id_track=". $row["id_track"] ."'>". $row["name"] ."</a></td>
			<td>". $row["note"] ."</td>
		</tr>
		";
	}
	//
	$data .= sprintf("
		<br>
		<table>
			<tr>
				<th>Название</th>
				<th>Примечание</th>
			</tr>
			%s
		</table>",
		$item
	);
	
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
					<a href="tracks.php">Треки</a>
					<a href="popular.php">Популярное</a> |
					<a href="register.php">Регистрация</a>
					<a href="login.php">Войти</a>
				</nav>
			</div>
		</header>
		<div class="up"></div>

		<main>
			<div class="content">
				<div class="center">
					<form action="crud.php" method="POST">
						<h2>Изменить данные альбома <?php echo "'". $team["title"] ."'" ?></h2><br>
						<input type="text" placeholder="Название" name="name" value="<?php echo $team["title"] ?>">
						<input type="text" placeholder="Дата" name="date" value="<?php echo $team["adate"] ?>">
						<input type="text" placeholder="Страна" name="country" value="<?php echo $team["acountry"] ?>">
						<input type="submit" value="Изменить">
					</form>
					<br><br>
					<?php echo $data ?>
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