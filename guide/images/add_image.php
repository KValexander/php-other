<?php 
	include "../connect.php";

	if($_FILES) {
		// Первый вариант - чуть сложнее третьего
		// ------------------------------
		// $image = $_FILES["image"];
		// $extension = explode(".", $image["name"])[1];
		// $image_name = "1_". time() ."_". rand() .".". $extension;
		// $path = "images/". $image_name;

		// Второй вариант - самый простой
		// ------------------------------
		// $path = "images/". $_FILES["image"]["name"];

		// Третий вариант - среднее между первым и вторым
		// ----------------------------------------------
		$image_name = time() .".". explode(".", $_FILES["image"]["name"])[1];
		$path = "images/". $image_name;

		// Перенос изображения в папку image
		if(!move_uploaded_file($_FILES["image"]["tmp_name"], $path))
			return die("Ошибка добавления изображения");

		$sql = sprintf("INSERT INTO `table`(`field_1`, `field_2`) VALUES('%s', 'image')", $path);
		if(!$connect->query($sql))
			return die("Ошибка добавления данных ". $connect->error);

		echo "
			<h2>Добавление изображения</h2>
			<p>$sql</p>
			<p>Изображение с id $connect->insert_id добавлено</p>
			<p><a href='out_image.php'>Вернуться</a></p>
		";
		return;
	}

?>

<h2>Добавление изображения</h2>

<form enctype="multipart/form-data" method="POST">
	<input type="file" name="image" required>
	<button>Добавить</button>
</form>

<p><a href="out_image.php">Вернуться</a></p>
