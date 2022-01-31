<?php
	include "connect.php";

	$content = "<h1>Все статьи</h1>";

	$sql = "SELECT * FROM `posts` WHERE `name`!='img'";
	if(!$result = $connect->query($sql)) die("Error ". $connect->error);
	
	$content .= "
		<table>
			<tr>
				<th>Название статьи</th>
				<th>Изменить</th>
				<th>Удалить</th>
			</tr>
	";
	while($row = $result->fetch_assoc())
		$content .= sprintf('
			<tr>
				<td><a href="article.php?id=%d">%s</a></td>
				<td><a href="form.php?id=%d">Изменить</a></td>
				<td><a onclick="return confirm(\'Вы уверены?\')" href="actions.php?t=delete&id=%d">Удалить</a></td>
			</tr>
		', $row["ID"], $row["title"], $row["ID"], $row["ID"]);
	$content .= "</table>";

	include "header.php";
	echo $content;
?>
