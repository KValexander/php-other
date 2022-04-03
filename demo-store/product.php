<?php
session_start();
include "connect.php";

	$id = (isset($_GET["id"])) ? $_GET["id"] : 0;
	
	$sql = "SELECT * FROM `products` WHERE `product_id`=". $id;
	$result = $connect->query($sql);
	if(!$result)
		die("Ошибка получения данных: ". $connect->error);

	$product = $result->fetch_assoc();

include "header.php";
?>

	<main>
		<div class="content">

			<div class="head"><?= $product["name"] ?></div>

			<div class="row wrap">
				<div class="image">
					<img src="<?= $product["path"] ?>" alt="">
				</div>
				<div>
					<h3>Характеристики:</h3>
					<p>Страна производитель: <b><?= $product["country"] ?></b></p>
					<p>Год выпуска: <b><?= $product["year"] ?></b></p>
					<p>Модель: <b><?= $product["model"] ?></b></p>
					<hr>
					<div class="row">
						<p>Цена:</p>
						<p><b><?= $product["price"] ?>$</b></p>
					</div>
					
					<?php 
						if($role == "admin")
							echo '
								<div class="row text-small">
									<p>Редактировать</p>
									<p>Удалить</p>
								</div>
								<p class="text-right"><a class="text-small" href="controllers/add_product.php?id='. $product["product_id"] .'">В корзину</a></p>
							';

						if($role == "user")
							echo '<p class="text-right"><a class="text-small" href="controllers/add_product.php?id='. $product["product_id"] .'">В корзину</a></p>';
					?>
				</div>
			</div>

		</div>
	</main>

<?php include "footer.php" ?>