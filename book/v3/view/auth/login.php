<?php
	include "../../controller/auth.php";
	require "../../connect.php";

	if(count($_POST) != 0) {
		$login = htmlentities(trim($_POST["login"]));
		$password = htmlentities(trim($_POST["password"]));

		$sql = "SELECT * FROM `user` WHERE `login`='".$login."'";
		$result = $db->query($sql);
		if($user = $result->fetch_assoc()) {
			if($login == $user["login"] && $password == $user["password"]) {
				$_SESSION["user_id"] = $user["user_id"];
				header("Location:../profile.php");
				exit;
			}
		}

	}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book</title>
	<link rel="stylesheet" href="../../style.css">
</head>
<body>

	<header>
		<div class="content">
			<a href="../../index.php"><h1>Книги</h1></a>
			<nav>
				<a href="../books.php">Книги</a> |
				<a href="../authors.php">Авторы</a> |
				<a href="../publishers.php">Издатели</a> |
				<?php 
					if ($auth) {
						print('
							<a href="../console.php">Консоль</a> |
							<a href="../profile.php">Личный кабинет</a> |
							<a href="../../controller/logout.php">Выйти</a>
						');
					} else {
						print('
							<a href="register.php">Регистрация</a> |
							<a href="login.php">Вход</a>
						');
					}
				?>
			</nav>
		</div>
	</header>

	<main>
		<div class="content">
			<div class="head">
				<h2>Войти</h2>
			</div>

			<form method="POST">
				<input type="text" placeholder="Логин" name="login">
				<input type="text" placeholder="Пароль" name="password">
				<input type="submit" value="Войти">
			</form>
			<div class="center">
				Не зарегистрированы? Тогда <a href="register.php">присоединятесь</a>!
			</div>

		</div>
	</main>

	<footer>
		<div class="content">
			<p>Выполнил студент группы И-403 Курочкин Александр Викторович</p>
		</div>
	</footer>
	
</body>
</html>