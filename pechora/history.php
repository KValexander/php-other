<?php require_once("header.php") ?>

<?php
	// Составляем запрос
	$sql = "SELECT `history` FROM `information`";
	// Выполняем запрос
	$result = mysqli_query($link, $sql);
	// Получаем данные
	$row = mysqli_fetch_assoc($result);
	// Разбиваем данные в массив
	$history = explode("\n", $row["history"]);
?>

	<div class="history">
		<div class="content">
			<h1>История города</h1>
			<div class="wrap">
				<div class="increase_image"><img src="" alt=""></div>
				<div class="h_img">
					<div class="history_image" id = "h_img1"><img class = "inc_img" src="images/history1.jpg" alt=""></div>
					<div class="history_image" id = "h_img1"><img class = "inc_img" src="images/history2.jpg" alt=""></div>
					<div class="history_image" id = "h_img1"><img class = "inc_img" src="images/history3.jpg" alt=""></div>
				</div>

				<?php
					printf("<p>%s</p>", $history[0]); 
					printf("<p>%s</p>", $history[2]); 
					printf("<p>%s</p>", $history[4]); 
					printf("<p>%s</p>", $history[6]); 
					printf("<p>%s</p>", $history[8]); 
					printf("<p>%s</p>", $history[10]); 
					printf("<p>%s</p>", $history[12]);
				?>

				<div class="h_img">
					<div class="history_image" id = "h_img2"><img class = "inc_img" src="images/history4.jpg" alt=""></div>
					<div class="history_image" id = "h_img2"><img class = "inc_img" src="images/history5.jpg" alt=""></div>
					<div class="history_image" id = "h_img2"><img class = "inc_img" src="images/history6.jpg" alt=""></div>
				</div>

				<?php printf("<p>%s</p>", $history[14]); ?>
				<?php printf("<p>%s</p>", $history[16]); ?>
				<?php printf("<p>%s</p>", $history[18]); ?>
				<?php printf("<p>%s</p>", $history[20]); ?>
				<?php printf("<p>%s</p>", $history[22]); ?>
				<?php printf("<p>%s</p>", $history[24]); ?>
				<?php printf("<p>%s</p>", $history[26]); ?>
				<?php printf("<p>%s</p>", $history[28]); ?>
				<?php printf("<p>%s</p>", $history[30]); ?>

				<div class="h_img">
					<div class="history_image" id = "h_img3"><img class = "inc_img" src="images/history7.jpg" alt=""></div>
					<div class="history_image" id = "h_img3"><img class = "inc_img" src="images/history8.jpg" alt=""></div>
					<div class="history_image" id = "h_img3"><img class = "inc_img" src="images/history9.jpg" alt=""></div>
				</div>

				<?php
					printf("<p>%s</p>", $history[32]);
					printf("<p>%s</p>", $history[34]);
					printf("<p>%s</p>", $history[36]);
					printf("<p>%s</p>", $history[38]);
					printf("<p>%s</p>", $history[39]);
				?>

				<div class="h_img">
					<div class="history_image" id = "h_img4"><img class = "inc_img" src="images/history10.jpg" alt=""></div>
					<div class="history_image" id = "h_img4"><img class = "inc_img" src="images/history11.jpg" alt=""></div>
					<div class="history_image" id = "h_img4"><img class = "inc_img" src="images/history12.jpg" alt=""></div>
				</div>
			</div>
		</div>
	</div>

<?php require_once("footer.php") ?>