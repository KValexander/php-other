<?php
	$db = new mysqli("localhost", "root", "root", "db_book");
	$db->set_charset("utf8");
	if($db->connect_error) die("Ошибка подключения к базе данных: ". $db->connect_errno);