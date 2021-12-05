<?php require "parse.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple parser</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="head" style="font-size: 36pt">Полученные данные (<a href="local/">Orig</a>)</div>
	<div class="wrap">
		<div class="wrapper">
			<div class="head">Новости</div>
			<div class="flex">
				<?php
					foreach($news as $val) {
						printf("
							<div class='card'>
								<p>%s</p><br>
								<p>%s</p><br>
								<p>%s</p><br>
								<p>%s</p><br>
							</div>
						", $val[0], $val[1], $val[2], $val[3]);
					}
				?>
			</div>
		</div>

		<div class="wrapper">
			<div class="head">Туры</div>
			<div class="flex">
				<?php
					foreach($tours as $val) {
						printf("
							<div class='card'>
								<p>%s</p><br>
								<p>%s</p><br>
								<p>%s</p><br>
								<p>%s</p><br>
							</div>
						", $val[0], $val[1], $val[2], $val[3]);
					}
				?>
			</div>
		</div>

		<div class="wrapper">
			<div class="head">Партнёры</div>
			<div class="flex">
				<?php
					foreach($partners as $val) {
						printf("
							<div class='card'>
								<p>%s</p><br>
								<p>%s</p><br>
								<p>%s</p><br>
							</div>
						", $val[1], $val[2], $val[3]);
					}
				?>
			</div>
		</div>
	</div>
	
</body>
</html>