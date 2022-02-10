<?php
	include "connect.php";

	$sql = "DELETE FROM `table` WHERE `id`=". $_GET["id"];

	if(!$connect->query($sql))
		return die("Ошибка удаления данных ". $connect->error);

?>

<h2>Удаление записи</h2>
<p><?= $sql ?></p>

<p>Запись с id <?= $_GET["id"] ?> удалена</p>

<p><a href="select.php">Вернуться</a></p>