<?php
	include "connect.php";

	if(isset($_GET["id"])) {
		$id = $_GET["id"];
		
		$form = "<h1>Изменение статьи</h1>";
		
		$sql = sprintf("SELECT * FROM `posts` WHERE `ID`='%d'", $id);
		
		if(!$result = $connect->query($sql)) die("Error ". $connect->error);
		if(!$article = $result->fetch_assoc()) die("Error ". $connect->error);

		$sql = sprintf("SELECT * FROM `posts` WHERE `parent`='%d'", $id);
		if(!$result = $connect->query($sql)) die("Error ". $connect->error);
		$images = $result->fetch_all();
		$shortcodes = "";
		foreach($images as $val)
			$shortcodes .= sprintf("<p>[[%s]]</p>", $val[0]);

		$form .= sprintf('
			<form action="actions.php?t=update&id=%d" method="POST">
				<input type="text" placeholder="Название" name="title" value="%s" required>
				<input type="text" placeholder="Обозначение" name="name" value="%s" required>
				<textarea placeholder="Содержание статьи" name="content" required>%s</textarea>
				<button>Изменить</button>
			</form>
			<h2>Доступные шорткоды</h2>
			%s
			<h2>Добавление изображений к статье</h2>
			<form enctype="multipart/form-data" action="actions.php?t=add_img&id=%d" method="POST">
				<input type="file" name="image" required>
				<button>Добавить</button>
			</form>
		', $article["ID"], $article["title"], $article["name"], $article["content"], $shortcodes, $article["ID"]);
	} else
		$form = '
			<h1>Добавление статьи</h1>
			<form action="actions.php?t=add" method="POST">
				<input type="text" placeholder="Название" name="title" required>
				<input type="text" placeholder="Обозначение" name="name" required>
				<textarea placeholder="Содержание статьи" name="content" required></textarea>
				<button>Добавить</button>
			</form>
		';

	include "header.php";
	echo $form;