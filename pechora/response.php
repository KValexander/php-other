<?php require_once("header.php") ?>

<?php
	// Получение переданных данных
	$name = $_REQUEST["name"];
	$surname = $_REQUEST["surname"];
	$gender = $_REQUEST["gender"];
	$age = $_REQUEST["age"];
	$message = $_REQUEST["message"];
	// Проверка на наличие любимых страниц
	if (!empty($_REQUEST["favorite_page"])) {
		$favorite_page = implode(", ",$_REQUEST["favorite_page"]);
	} else {
		$favorite_page = null;
	}

	// Составление запроса на добавление данных в базу данных
	$insert_sql = sprintf("INSERT INTO `feedback` (`name`, `surname`, `gender`, `age`, `message`, `favorite_page`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
		$name, $surname, $gender, $age, $message, $favorite_page
	);

	// Выполнение запроса
	$result = mysqli_query($link, $insert_sql);

	// Проверка успешности выполнения запроса
	if ($result == true){
    	$html = "
			<h1>Ваше сообщение было отправлено</h1>
			<h3>Благодарим вас за содействие. Мы обязательно учтём ваши пожелания.</h3>
		";
    }else{
    	$html = "
    		<h1>Непредвиденная ошибка</h1>
			<h3>Возникла ошибка при занесении данных в базу</h3>
		";
    }
?>

	<div class="feedback">
		<div class="content">
			<?php echo $html; ?>
		</div>
	</div>
	
<?php require_once("footer.php") ?>