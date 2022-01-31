<?php
	$connect = new mysqli("localhost", "root", "root", "articles");
	$connect->set_charset("utf8");
	if($connect->connect_error)
		die("Connection error: ". $connect->connect_error);
