<?php 
	session_start();
	$logout = "<h2>Выход</h2>";

	if(isset($_SESSION["id"])) {
		unset($_SESSION["id"]);
		$logout .= '<p>unset($_SESSION["id"])</p>';
		$logout .= "<p>Сессия была удалена. Вы вышли.</p>";	
	} else $logout .= "<p>Вы не авторизованы</p>"; 

	echo $logout;
	echo "<p><a href='login.php'>Вернуться</a></p>";
