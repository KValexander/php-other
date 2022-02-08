<?php
	include "connect.php";

	$sql = "DELETE FROM `table` WHERE `id`=". $_GET["id"];

	if(!$connect->query($sql))
		return die("Ошибка удаления данных ". $connect->error);

	echo "<p>$sql</p>";
	echo "<p>Запись с id $_GET[id] удалена</p>";
