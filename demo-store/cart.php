<?php
	include "controllers/check.php";

	include "connect.php";

	$user_id = $_SESSION["user_id"];

	$sql = "SELECT * FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`=".$user_id;
	$result = $connect->query($sql);
	if(!$result)
		return die("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('
			<div class="col">
				<img src="%s" alt="">
				<div class="row">
					<a href="product.php?id=%s"><h3>%s</h3></a>
					<p>%s$</p>
				</div>
				<div class="row text-small">
					<p><a class="text-small" href="controllers/delete_product.php?id=%s">Убрать</a></p>
					<p>%s</p>
					<p><a class="text-small" href="controllers/add_product.php?id=%s">Добавить</a></p>
				</div>
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["amount"], $row["product_id"]);

	// if($data == "")
	if(!$data)
		$data = "<h3>Корзина пуста</h3>";

	$sql = "SELECT * FROM `orders` WHERE `product_id`=0 AND `user_id`=".$user_id;
	$result = $connect->query($sql);
	if(!$result)
		return die("Ошибка получения данных: ". $connect->error);

	$orders = "";
	while($row = $result->fetch_assoc()) {
		$del = ($row["status"] == "Новый") ? '<a class="text-small">Удалить заказ</a>' : "";
		
		$reason = ($row["status"] == "Отменённый") ? '
			<p class="text-center"><b>Причина отмены</b></p>
			<p>'. $row["reason"] .'</p>
		' : "";

		$orders .= sprintf('
			<div class="col">
				<h3>Заказ %s</h3>
				%s
				<p>Количество товаров: <b>%s</b></p>
				<p>Статус: <b>%s</b></p>
				%s
			</div>
		', $row["order_id"], $del, $row["amount"], $row["status"], $reason);
	}

	if(!$orders)
		$orders = "<h3>Заказы отсутствуют</h3>";

	include "header.php";
?>

	<main>
		<div class="content">

			<div class="head">Корзина</div>
			<div class="row">
				<?= $data ?>
			</div>

			<form action="controllers/checkout.php" method="POST">
				<input type="password" placeholder="Пароль" name="password" required>
				<button>Оформить заказ</button>
			</form>

			<div class="head">Заказы</div>
			<div class="row">
				<?= $orders ?>
				<!-- <div class="col">
					<h3>Название заказа</h3>
					<a class="text-small">Удалить заказ</a>
					<p>Количество товаров: <b>3</b></p>
					<p>Статус: <b>Новый</b></p>
				</div>
				<div class="col">
					<h3>Название заказа</h3>
					<p>Количество товаров: <b>3</b></p>
					<p>Статус: <b>Подтверждённый</b></p>
				</div>
				<div class="col">
					<h3>Название заказа</h3>
					<p>Количество товаров: <b>3</b></p>
					<p>Статус: <b>Отменённый</b></p>
					<p class="text-center"><b>Причина отмены</b></p>
					<p>Причина отмены заказа такая-то</p>
				</div> -->
			</div>


		</div>
	</main>

<?php include "footer.php" ?>
