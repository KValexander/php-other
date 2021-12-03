<?php
	if(!isset($_GET["type"])) {
		header("Location:../index.html");
		exit;
	}
	switch($_GET["type"]) {
		case "book": 
			header("Location:../view/form/form_book.php");
		break;
		case "author":
			header("Location:../view/form/form_author.php");
		break;
		case "publisher":
			header("Location:../view/form/form_publisher.php");
		break;
	}
	exit;
