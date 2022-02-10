<?php
	include "connect.php";
	
	$sql = "SELECT * FROM `table` WHERE `field_2`='image'";

	if(!$result = $connect->query($sql))
		return die("Ошибка получения данных ". $connect->error);

	$images = "";
	while($row = $result->fetch_assoc())
		$images .= sprintf("<img width='100' height='100' style='object-fit:cover;margin:10px' src='%s' alt=''/>", $row["field_1"]);

	if(!$images)
		$images = "<h3>Изображения отсутствуют</h3>";
?>

<h2>Все изображения</h2>
<p><?= $sql ?></p>

<p><a href="add_image.php">Добавить изображение</a></p>
<p><a href="select.php">Все записи</a></p>

<div style="display:flex;flex-wrap:wrap;">
	<?= $images ?>
</div>