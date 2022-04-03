<?php
	include "controllers/check_admin.php";
	include "header.php";
?>

	<main>
		<div class="content">

			<div class="head">Категории</div>
			
			<form>
				<div class="part">
					<input type="text" placeholder="Категория" name="category" required>
					<button>Добавить</button>
				</div>
			</form>

			<form>
				<div class="part">
					<select name="category_id" required>
						<option value selected disabled>Категории</option>
					</select>
					<button>Удалить</button>
				</div>
			</form>

			<div class="head">Добавление товара</div>
			<form>

				<input type="text" placeholder="Название" name="name" required>

				<input type="number" placeholder="Цена" name="price" recquired>

				<input type="text" placeholder="Страна производитель" name="country" required>

				<input type="number" placeholder="Год выпуска" name="year" recquired>

				<input type="text" placeholder="Модель" name="model" required>

				<select name="category" required>
					<option value selected disabled>Категории</option>
				</select>

				<input type="number" placeholder="Количество на складе" name="count" required>

				<p class="text-left">Фотография товара</p>
				<input type="file" name="image" required>

				<button>Добавить</button>

			</form>

			<div class="head">Заказы</div>
			<p>Все | Новые | Подтверждённые | Отменённые</p>
			<div class="row">
				<div class="col">
					<h3>Название заказа</h3>
					<p>ФИО заказчика: <b>Иван Иванович Иванов</b></p>
					<p>Количество товаров: <b>3</b></p>
					<p>Статус: <b>Новый</b></p>

					<form class="w100">
						<button>Подтвердить</button>
					</form>

					<h3>Отменить заказ</h3>

					<form class="w100">
						<textarea name="reason" placeholder="Причина отмены" required></textarea>
						<button>Отменить</button>
					</form>
				</div>
				<div class="col">
					<h3>Название заказа</h3>
					<p>ФИО заказчика: <b>Иван Иванович Иванов</b></p>
					<p>Количество товаров: <b>3</b></p>
					<p>Статус: <b>Подтверждённый</b></p>
				</div>
				<div class="col">
					<h3>Название заказа</h3>
					<p>ФИО заказчика: <b>Иван Иванович Иванов</b></p>
					<p>Количество товаров: <b>3</b></p>
					<p>Статус: <b>Отменённый</b></p>
					<p class="text-center"><b>Причина отмены</b></p>
					<p>Причина отмены заказа такая-то</p>
				</div>
			</div>

		</div>
	</main>

<?php include "footer.php" ?>