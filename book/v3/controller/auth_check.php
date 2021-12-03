<?php
	include "auth.php";
	if(!$auth) {
		header("Location:/");
		exit;
	}
