<?php
include "connect.php";

if(isset($_GET["t"])) {
	$type = $_GET["t"];
	if($type == "add") {
		$title = $_POST["title"];
		$name = $_POST["name"];
		$content = $_POST["content"];
		$sql = sprintf('INSERT INTO `posts`(`title`, `name`, `content`) VALUES("%s", "%s", "%s")', $title, $name, $content);
		if(!$connect->query($sql)) return die("Error ". $connect->error);
	} elseif(isset($_GET["id"])) {
		$id = $_GET["id"];
		switch($type) {
			case "add_img":

				$size = getimagesize($_FILES["image"]["tmp_name"]);
				if($size["mime"] == "image/png") $end = ".png";
				elseif ($size["mime"] == "image/jpeg") $end = ".jpg";
				elseif ($size["mime"] == "image/bmp") $end = ".bmp";
				else return die("Error");
				$image_name = "1_". time() ."_". rand() . $end;
				$path = "images/". $image_name;
				if(!move_uploaded_file($_FILES["image"]["tmp_name"], $path))
					return die("Error");
				$path = "images/". $image_name;

				$sql = sprintf("INSERT INTO `posts`(`title`, `name`, `content`, `parent`) VALUES('Изображение', 'img', '%s', '%s')",
					$path, $id);
				if(!$connect->query($sql)) return die("Error ". $connect->error);
				return header("Location:form.php?id=$id");

			break;

			case "update":
				$title = $_POST["title"];
				$name = $_POST["name"];
				$content = $_POST["content"];
				$sql = sprintf('UPDATE `posts` SET `title`="%s", `name`="%s", `content`="%s" WHERE `ID`="%d"', $title, $name, $content, $id);
				if(!$connect->query($sql)) return die("Error ". $connect->error);
			break;
			
			case "delete":
				$sql = sprintf("DELETE FROM `posts` WHERE `ID`='%d'", $id);
				if(!$connect->query($sql)) return die("Error ". $connect->error);
			break;

			default: return die("Error"); break;
		}

	} else return die("Error");
	header("Location:index.php");
} else return die("Error");