<?php require_once("header.php") ?>

	<div class="wrap_news">
		<div class="content">
			<h1>Новости</h1>
			<div class="wrap">

				<?php
					$sql = ("SELECT * FROM `news`");
					$result = mysqli_query($link, $sql);
					$num = mysqli_num_rows($result);
					for($i = 0; $i < $num; $i++) {
						$row = mysqli_fetch_assoc($result);
						printf("
							<div class='news'>
								<h3>%s</h3>
								<p>%s</p>
								<a href='news_single.php?single=%d'>Узнать подробнее...</a>
							</div>
						",
						$row['title'],
						$row['teaser'],
						$row['id_news']);
					}
				?>
			</div>
		</div>
	</div>

<?php require_once("footer.php") ?>