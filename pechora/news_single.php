<?php require_once("header.php") ?>

	<div class="wrap_news">
		<div class="content">
				<?php
					$id = $_GET["single"];
					$sql = ("SELECT * FROM `news` WHERE `id_news` = $id");
					$result = mysqli_query($link, $sql);
					$row = mysqli_fetch_assoc($result);
					if (!empty($row)) {
						printf ("
							<h1>%s</h1>
							<div class='wrap'>
								<div class='news'>
									<h3>%s</h3>
									<p>%s</p>
								</div>
							</div>
						",
						$row['title'],
						$row['title'],
						$row['content']);
					} else {
						printf("
						<h1>Информация отсутствует</h1>
						<div class='wrap'>
							<h3>К сожалению такой информации у нас нет</h3>
							<a href = 'news.php'>Назад</a>
						</div>
						");
					}

				?>
		</div>
	</div>

<?php require_once("footer.php") ?>