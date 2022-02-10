<?php
	include "connect.php";

	$sql = "INSERT INTO `table` VALUES(NULL, 'i', 'i', 'i')";

	if(!$connect->query($sql))
		return die("Ошибка добавления данных ". $connect->error);

?>

<h2>Добавление записи</h2>
<p><?= $sql ?></p>

<p>Запись добавлена с id <?= $connect->insert_id ?></p>
<p><a href="select.php">Вернуться</a></p>