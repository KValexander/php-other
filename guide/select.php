<?php
	include "connect.php";

	$sql = "SELECT * FROM `table`";

	$result = $connect->query($sql);

	if(!$result)
		return die("Ошибка получения данных ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf(
			'<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td><a href="update.php?id=%s">Изменить</a></td>
				<td><a href="delete.php?id=%s">Удалить</a></td>
			</tr>',
			$row["id"],
			$row["field_1"],
			$row["field_2"],
			$row["field_3"],
			$row["id"],
			$row["id"]
		);

	if(!$data)
		$data = '<tr><td colspan="3">Данные отсутствуют</td></tr>';

?>

<h2>Все записи</h2>
<p><?= $sql ?></p>

<p><a href="insert.php">Добавить запись</a></p>
<p><a href="out_image.php">Все изображения</a></p>

<table>
	<tr>
		<th>id</th>
		<th>Первое поле</th>
		<th>Второе поле</th>
		<th>Третье поле</th>
		<th>Изменить</th>
		<th>Удалить</th>
	</tr>
	<?= $data ?>
</table>