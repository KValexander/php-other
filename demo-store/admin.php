<?php
	include "controllers/check_admin.php";
	include "connect.php";

	// Получение категорий
	$sql = "SELECT * FROM `categories`";
	if(!$result = $connect->query($sql))
		return die("Ошибка получения данных: ". $connect->error);

	// Категории для категорий
	$categories = "";
	while($row = $result->fetch_assoc())
		$categories .= sprintf("<option value='%s'>%s</option>", $row["category_id"], $row["category"]);

	// Обнуление получения
	$result->data_seek(0);

	// Категории для формы
	$categories_form = "";
	while($row = $result->fetch_assoc())
		$categories_form .= sprintf("<option value='%s'>%s</option>", $row["category"], $row["category"]);
	
	// Получение заказов
	$sql = "SELECT * FROM `orders` INNER JOIN `users` USING(`user_id`) WHERE `product_id`=0 ORDER BY `created_at` DESC";
	if(!$result = $connect->query($sql))
		return die("Ошибка получения данных: ". $connect->error);

	$orders = "";
	while($row = $result->fetch_assoc()) {
		$content = ($row["status"] == "Новый") ?
			sprintf('
				<form action="controllers/confirm_order.php" method="POST" class="w100">
					<button name="order_id" value="%s">Подтвердить</button>
				</form>

				<h3>Отменить заказ</h3>

				<form action="controllers/reject_order.php" method="POST" class="w100">
					<textarea name="reason" placeholder="Причина отмены" required></textarea>
					<button name="order_id" value="%s">Отменить</button>
				</form>
			', $row["order_id"], $row["order_id"])
		: "";

		$content = ($row["status"] == "Отменённый") ?
			sprintf('
				<p class="text-center"><b>Причина отмены</b></p>
				<p>%s</p>
			', $row["reason"])
		: $content;

		$orders .= sprintf('
			<div class="col">
				<h3>Заказ %s</h3>
				<p>ФИО заказчика: <b>%s %s %s</b></p>
				<p>Количество товаров: <b>%s</b></p>
				<p>Статус: <b>%s</b></p>
				%s
			</div>
		', $row["order_id"], $row["surname"], $row["name"], $row["patronymic"], $row["amount"], $row["status"], $content);
	}

	if(!$orders)
		$orders = "<h3>Заказы отсутствуют</h3>";

	include "header.php";
?>

	<main>
		<div class="content">

			<div class="head">Категории</div>
			
			<form action="controllers/add_category.php" method="POST">
				<div class="part">
					<input type="text" placeholder="Категория" name="category" required>
					<button>Добавить</button>
				</div>
			</form>

			<form action="controllers/delete_category.php" method="POST">
				<div class="part">
					<select name="category_id" required>
						<option value selected disabled>Категории</option>
						<?= $categories ?>
					</select>
					<button>Удалить</button>
				</div>
			</form>

			<div class="head">Добавление товара</div>
			<form enctype="multipart/form-data" action="controllers/create_product.php" method="POST">

				<input type="text" placeholder="Название" name="name" required>

				<input type="number" placeholder="Цена" name="price" recquired>

				<input type="text" placeholder="Страна производитель" name="country" required>

				<input type="number" placeholder="Год выпуска" name="year" recquired>

				<input type="text" placeholder="Модель" name="model" required>

				<select name="category" required>
					<option value selected disabled>Категории</option>
					<?= $categories_form ?>
				</select>

				<input type="number" placeholder="Количество на складе" name="count" required>

				<p class="text-left">Фотография товара</p>
				<input type="file" name="image" required>

				<button>Добавить</button>

			</form>

			<div class="head">Заказы</div>
			<p>Все | Новые | Подтверждённые | Отменённые</p>
			<div class="row">
				<?= $orders ?>
			</div>

		</div>
	</main>

<?php include "footer.php" ?>