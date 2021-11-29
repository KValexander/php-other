<?php require_once("header.php") ?>

<?php
	// Составление запроса на получение нужной информации
	$sql = "SELECT `geography`, `about` FROM `information`";
	// Выполнение запроса
	$result = mysqli_query($link, $sql);
	// Получение данных
	$row = mysqli_fetch_assoc($result);
	// Информаци о Печоре
	$about = preg_replace("/[\r\n]+/", "<p>", $row["about"]);
	// Информация о Географическом положении
	$geography = preg_replace("/[\r\n]+/", "<p>", $row["geography"]);
?>

	<div class="slider">
		<div class="content">
			<div class="geography">
				<h2>Географическое положение</h2>
				<?php printf("<p>%s</p>", $geography); ?>
			</div>
			<div id="slider" class="slider_wrap">
				<img src="images/nature2.jpg" alt="slide1" />
				<img src="images/nature3.jpg" alt="slide2" />
				<img src="images/nature4.jpg" alt="slide3" />
				<img src="images/nature7.jpg" alt="slide4" />
			</div>
		</div>
	</div>

	<div class = "pechora">
		<div class="content">
			<h1>Печора</h1>
			<div class="text">
				<?php printf("<p>%s</p>", $about); ?>
			</div>
		</div>
	</div>

	<div class="attractions">
		<div class="increase_image"><img src="" alt=""></div>
		<div class="content">
			<h2>Достопримечательности нашего города</h2>
			<div class="attraction">
				<img class = "inc_img" src="images/attraction1.jpg" alt="">
				<h3>Памятник В. А. Русанову</h3>
			</div>
			<div class="attraction">
				<img class = "inc_img" src="images/attraction2.jpg" alt="">
				<h3>ГО «Досуг»</h3>
			</div>
			<div class="attraction">
				<img class = "inc_img" src="images/attraction3.jpg" alt="">
				<h3>Дом культуры железнодорожников</h3>
			</div>
			<div class="attraction">
				<img class = "inc_img" src="images/attraction4.jpg" alt="">
				<h3>«Жертвам Печорлага»</h3>
			</div>
			<div class="attraction">
				<img class = "inc_img" src="images/attraction5.jpg" alt="">
				<h3>Памятник Максиму Горькому</h3>
			</div>
			<div class="attraction">
				<img class = "inc_img" src="images/attraction6.jpg" alt="">
				<h3>Памятник С. М. Кирову</h3>
			</div>
		</div>
	</div>

<?php require_once("footer.php") ?>