<?php
	$db = new mysqli("localhost", "root", "root", "db_music");
	$db->set_charset("utf8");

	if(isset($_GET["id_team"])){
		$sql = "
			SELECT
				`id_album`,
				`title`,
				`album`.`date`,
				`album`.`country`,
				`id_team`,
				`name`,
				`team`.`country` as `tcountry`,
				`team`.`date` as `tdate`,
				`style`
			FROM `album` INNER JOIN `team` USING(`id_team`) WHERE `album`.`id_team`=". $_GET["id_team"];
	} else {
		$sql = "SELECT `id_album`, `title`, `date`, `country`, `id_team` FROM `album`";	
	}
		
	//
	$result = $db->query($sql);
    
	//
	if ($result->num_rows) {
		if(isset($_GET["id_team"])) {
			$team = $result->fetch_assoc();
			$data = "<h2>Альбомы группы '". $team["name"] ."'</h2>";
		} else $data = "<h2>Все альбомы</h2>";

		//
		$result->data_seek(0);

		// 
		while($row = $result->fetch_assoc()) {
			$item .= "
			<tr>
				<td><a href='tracks.php?id_album=". $row["id_album"] ."'>". $row["title"] ."</a></td>
				<td>". $row["date"] ."</td>
				<td>". $row["country"] ."</td>
			</tr>
			";
		}

		$data .= sprintf("
			<br>
			<table>
				<tr>
					<th>Название</th>
					<th>Дата</th>
					<th>Страна</th>
				</tr>
				%s
			</table>",
			$item
		);

	} else {
		//
		$data = '<h2>Нет записей для отображения</h2>';
	};

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>MySQL Active - Альбомы</title>
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