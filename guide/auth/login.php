<?php 
	session_start();
	include "../connect.php";

	$auth = "<p>Вы не авторизованы</p>";
	if(isset($_SESSION["id"]))
		$auth = "<p>Вы авторизованы под id $_SESSION[id]</p><p><a href='logout.php'>Выйти</a></p>";

	if($_POST) {
		$login = $_POST["login"];
		$password = $_POST["password"];

		$sql = sprintf("SELECT * FROM `table` WHERE `field_1`='%s'", $login);
		if(!$result = $connect->query($sql))
			return die("Ошибка получения данных ". $connect->error);

		if($user = $result->fetch_assoc()) {

			if($password == $user["field_2"]) {

				$_SESSION["id"] = $user["id"];

				$message = "Вы авторизовались под id $user[id]. Данные сохранены в сессию";

			} else $message = "Запись найдена, но пароли не совпадают";

		} else $message = "Запись не была найдена";

		echo "<h2>Авторизация</h2><p>$sql</p>";
		echo "<p>$message</p>";
		echo "<p><a href='login.php'>Вернуться</a></p>";
		return;
	}
?>
	
<h2>Войти</h2>
<?= $auth ?>
<p><a href="../select.php">Все записи</a></p>

<form method="POST">
	<input type="text" placeholder="Логин" name="login">
	<input type="password" placeholder="Пароль" name="password">
	<button>Войти</button>
</form>