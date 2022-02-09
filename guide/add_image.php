<?php 

	if($_POST) {
		$image = $_FILES["image"];
		$extension = explode(".", $image["name"])[1];

		$image_name = "1_". time() ."_". rand() . $extension;
		$path = "images/". $image_name;
		if(!move_uploaded_file($image["tmp_name"], $path))
			return die("Ошибка добавления изображения");

		return header("Location:add_image.php");
	}

?>

<form enctype="multipart/form-data" method="POST">
	<input type="file" name="image">
	<button>Добавить</button>
</form>