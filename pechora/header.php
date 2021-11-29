<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Сайт о Печоре v3</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slider.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<script src = "script/jquery-3.5.1.min.js"></script>
	<script src = "script/slider.js"></script>
	<script src = "script/script.js"></script>

	<?php
		require_once("config.php");
		$link = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname) or die("Ошибка подключения". mysqli_error($link));
		mysqli_query($link, "SET NAMES utf8");
	?>

</head>
<body>

	<nav>
		<div class="content">
			<a href="index.php">Главная страница</a> |
			<a href="news.php">Новости</a> |
			<a href="history.php">История</a> |
			<a href="date.php">Некоторые даты</a> |
			<a href="today.php">Город сегодня</a> |
			<a href="gallery.php">Галерея</a> |
			<a href="feedback.php">Обратная связь</a>
		</div>
	</nav>

	<header>
		<div class="content">
			<img src="images/header.png" alt="" onclick = "document.location.href='index.php'">
		</div>
	</header>