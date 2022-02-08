<?php
	include "connect.php";

	$sql = "UPDATE `table` SET `field_1`='n', `field_2`='n', `field_3`='n' WHERE `id`=".$_GET["id"];

	if(!$connect->query($sql))
		return die("Ошибка обновления данных ". $connect->error);

	echo "<p>$sql</p>";
	echo "<p>Запись с id $_GET[id] обновлена</p>";
