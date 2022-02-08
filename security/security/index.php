<?php
	// Config
	$s_current_time = strtotime(date("Y-m-d H:i:s"));

	$s_ban_file = "ban.txt";

	$s_log_file = "log.txt";

	$s_count = 5;

	// Ban
	$s_ban = @file_get_contents($s_ban_file);

	if($s_pos = strpos($s_ban, $_SERVER["REMOTE_ADDR"])) {
		$s_line = preg_split("/\n/", $s_ban);
		foreach($s_line as $val) {
			if(strrpos($s_ban, $val)) {
				$s_line = trim($val); break;
			}
		}
		
		$s_array = explode(" | ", $s_line);

		if($s_array[1] === "&") return die("You are permanently banned");

		$s_ban_date = strtotime(trim($s_array[2]));
		
		$s_difference = $s_current_time - $s_ban_date;

		if(intval($s_difference / 3600) >= $s_array[1]) {
			$s_ban = str_replace($s_line, "\n", $s_ban);
			file_put_contents($s_ban_file, $s_ban);
		}
		
		$s_minutes = $s_array[1] * 60 - intval($s_difference / 60);
		
		return die("You banned on ". $s_minutes ." minutes");
	}

	// Log
	$s_log = @file_get_contents($s_log_file);

	$s_values = array_count_values(preg_split("/\n/", $s_log));

	$s_entry = $_SERVER["REMOTE_ADDR"]. " | ". $_SERVER["REQUEST_URI"] ." | " .date("Y-m-d H:i:s");

	// Checked
	if(array_key_exists($s_entry, $s_values)) {

		if($s_values[$s_entry] >= $s_count) {

			$s_ban .= $_SERVER["REMOTE_ADDR"] ." | 3 | ". date("Y-m-d H:i:s");

			file_put_contents($s_ban_file, $s_ban."\n");

			return die("You banned on 180 minutes");

		}

	}

	$s_log .= $s_entry."\n";

	file_put_contents($s_log_file, $s_log);

	// Clear log
	if(!$s_log) {

		$s_log_date = strtotime(trim(explode("|", array_key_first($s_values))[1]));

		$s_difference = $s_current_time - $s_log_date;

		if($s_difference >= 60)
			file_put_contents($s_log_file, "");

	}

	var_dump("Access");