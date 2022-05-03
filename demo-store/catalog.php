<?php
session_start();
include "connect.php";
	
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	// Получение категорий
	$sql = "SELECT * FROM `categories`";
	if(!$result = $connect->query($sql))
		return die("Ошибка получения данных: ". $connect->error);

	$categories = "";
	while($row = $result->fetch_assoc())
		$categories .= sprintf("<option value='%s'>%s</option>", $row["category_id"], $row["category"]);

	// Получение товаров
	$sql = "SELECT * FROM `products` WHERE `count`!=0 ORDER BY `created_at` DESC";
	$result = $connect->query($sql);
	if(!$result)
		die("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc()) {
		$cart = ($role == "user" || $role == "admin") ? '<p class="text-right"><a class="text-small" href="controllers/add_product.php?id='. $row["product_id"] .'">В корзину</a></p>' : "";
		$data .= sprintf('
			<div class="col">
				<img src="%s" alt="">
				<div class="row">
					<a href="product.php?id=%s"><h3>%s</h3></a>
					<p>%s$</p>
				</div>
				%s
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["price"], $cart);
	}

	if(!$data)
		$data = "<h3>Товары отсутствуют</h3>";

include "header.php";
?>

	<main>
		<div class="content">

			<div class="head"> Товары </div>

			<div class="row">
				<div> Все | Год | Наименование | Цена </div>
				<div>
					<select>
						<option selected disabled>Категории</option>
						<?= $categories ?>
					</select>
				</div>
			</div>

			<div class="row">
				<?= $data ?>
			</div>
			
		</div>
	</main>

<?php include "footer.php" ?>