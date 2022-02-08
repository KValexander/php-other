<?php
	include "connect.php";

	$sql = "INSERT INTO `table` VALUES(NULL, 'i', 'i', 'i')";

	if(!$connect->query($sql))
		return die("Ошибка добавления данных ". $connect->error);

	echo "<p>$sql</p>";
	echo "<p>Запись добавлена с id - ". $connect->insert_id ."</p>";