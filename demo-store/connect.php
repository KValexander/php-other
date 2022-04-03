<?php
	$connect = new mysqli("localhost", "root", "root", "db_demo_2022_2");
	$connect->set_charset("utf8");

	if($connect->connect_error)
		die("Connection error: ". $connect->connect_error);