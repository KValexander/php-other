<?php require_once("header.php") ?>

<?php
	// Запрос
	$sql = "SELECT `today_education`, `today_transport`, `today_culture`, `today_religion` FROM `information`";
	// Выполнение запроса
	$result = mysqli_query($link, $sql);
	// Получение данных запроса
	$row = mysqli_fetch_assoc($result);
	// Образование
	$education = preg_replace("/[\r\n]+/", "<p>", $row["today_education"]);
	// Транспорт
	$transport = preg_replace("/[\r\n]+/", "<p>", $row["today_transport"]);
	// Культура
	$culture = preg_replace("/[\r\n]+/", "<p>", $row["today_culture"]);
	// Религия
	$religion = preg_replace("/[\r\n]+/", "<p>", $row["today_religion"]);
?>

	<div class="today">
		<div class="content">
			<h1>Город сегодня</h1>
			<div class="name">
				<input type="button" value = "Образование" onclick = "section_display('section1')">
				<input type="button" value = "Транспорт"  onclick = "section_display('section2')">
				<input type="button" value = "Культура"  onclick = "section_display('section3')">
				<input type="button" value = "Религия"  onclick = "section_display('section4')">
			</div>
			<div class="sections">
				<div class="section" id = "section1" style = "display: block">
					<h2>Образование</h2> <br>
					<?php echo $education; ?>
				</div>
				<div class="section" id = "section2">
					<h2>Транспорт</h2> <br>
					<?php echo $transport; ?>
				</div>
				<div class="section" id = "section3">
					<h2>Культура</h2> <br>
					<?php echo $culture; ?>
				</div>
				<div class="section" id = "section4">
					<h2>Религия</h2> <br>
					<?php echo $religion; ?>
				</div>
			</div>
		</div>
	</div>

<?php require_once("footer.php") ?>