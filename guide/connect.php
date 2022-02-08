<?php
	$connect = new mysqli("localhost", "root", "root", "common");
	$connect->set_charset("utf8");
	
	if($connect->connect_error)
		return die("Ошибка подключения: ". $connect->connect_error);
