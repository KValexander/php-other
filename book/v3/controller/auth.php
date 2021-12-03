<?php
	session_start();
	$auth = false;

	if(count($_SESSION) != 0)
		if (isset($_SESSION["user_id"]))
			$auth = true;
