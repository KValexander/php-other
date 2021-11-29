<?php require_once("header.php") ?>

	<div class="feedback">
		<div class="content">
			<h1>Форма обратной связи</h1>
			<form action="response.php" method = "POST">
				<p><input type="text" name = "name" placeholder = "Введите ваше имя"></p>
				<p><input type="text" name = "surname" placeholder = "Введите вашу фамилию"></p>
				<p>
					<select name = "gender">
						<option disabled selected>Укажите ваш пол</option>
						<option value="М">М</option>
						<option value="Ж">Ж</option>
					</select>
				</p>
				<p>
					<select name = "age">
						<option disabled selected>Укажите ваш возраст</option>
						<option value="До 18-ти">До 18-ти</option>
						<option value="18-30">18-30</option>
						<option value="31-45">31-45</option>
						<option value="46 и старше">46 и старше</option>
					</select>
				</p>
				<p><textarea name = "message" placeholder = "Введите ваше сообщение" cols="30" rows="10"></textarea></p>
				<p>Выберите наиболее интересные для вас страницы</p>
				<div class="checkbox">
					<p><input type="checkbox" name = "favorite_page[]" value = "Главная страница"> <span>Главная страница</span></p>
					<p><input type="checkbox" name = "favorite_page[]" value = "Новости"> <span>Новости</span></p>
					<p><input type="checkbox" name = "favorite_page[]" value = "История"> <span>История</span></p>
					<p><input type="checkbox" name = "favorite_page[]" value = "Некоторые даты"> <span>Некоторые даты</span></p>
					<p><input type="checkbox" name = "favorite_page[]" value = "Город сегодня"> <span>Город сегодня</span></p>
					<p><input type="checkbox" name = "favorite_page[]" value = "Галлерея"> <span>Галлерея</span></p>
					<p><input type="checkbox" name = "favorite_page[]" value = "Обратная связь"> <span>Обратная связь</span></p>
				</div>
				<p><input type="submit" value = "Отправить"></p>
			</form>
		</div>
	</div>
	
<?php require_once("footer.php") ?>