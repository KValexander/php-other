<?php
	require "connect.php";

	if(isset($_GET["book_id"])) {
		$sql = "DELETE FROM `book` WHERE `book_id`='". $_GET["book_id"] ."'";
		if(!$db->query($sql)) die("Ошибка удаления данных: ". $db->connect_errno);

		header("Location:books.php");
	} else if(isset($_GET["author_id"])) {
		$sql = "DELETE FROM `author` WHERE `author_id`='". $_GET["author_id"] ."'";
		if(!$db->query($sql)) die("Ошибка удаления данных: ". $db->connect_errno);

		header("Location:authors.php");
	} else if(isset($_GET["publisher_id"])) {
		$sql = "DELETE FROM `publisher` WHERE `publisher_id`='". $_GET["publisher_id"] ."'";
		if(!$db->query($sql)) die("Ошибка удаления данных: ". $db->connect_errno);

		header("Location:publishers.php");
	}

	exit;