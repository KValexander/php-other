<?php require_once("header.php") ?>

<?php
	// Запрос на даты type = past
	// ==================================================
	$sql = "SELECT * FROM `date` WHERE `type` = 'past'";
	// Выполнение запроса
	$result = mysqli_query($link, $sql);
	// Количество полученных записей
	$num = mysqli_num_rows($result);
	// Цикл
	for ($i=0; $i < $num; $i++) {
		// Получение данных запроса
		$row = mysqli_fetch_assoc($result);
		// Составление html разметки с данными
		$html_past .= sprintf("
			<div class = 'history_date'>
				<h3>%s %s года</h3>
				<p>%s</p>
			</div>
			",
			$row["month"], $row["year"], $row["event"]
		);
	}
	// ==================================================

	// Запрос на даты type = present
	// ==================================================
	$sql = "SELECT * FROM `date` WHERE `type` = 'present'";
	// Выполнение запроса
	$result = mysqli_query($link, $sql);
	// Количество полученных записей
	$num = mysqli_num_rows($result);
	// Цикл
	for ($i=0; $i < $num; $i++) {
		// Получение данных запроса
		$row = mysqli_fetch_assoc($result);
		// Составление html разметки с данными
		$html_present .= sprintf("
			<div class = 'history_date'>
				<h3>%s %s года</h3>
				<p>%s</p>
			</div>
			",
			$row["month"], $row["year"], $row["event"]
		);
	}
	// ==================================================
?>

	<div class="date">
		<div class="content">
			<h1>Некоторые даты</h1>
			<div class="some_date">

				<h2>Из истории города</h2>
				<?php echo $html_past; ?>

				<h2>Наше время</h2>
				<?php echo $html_present; ?>

			</div>
		</div>
	</div>

<?php require_once("footer.php") ?>