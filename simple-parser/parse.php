<?php
// Функция для демонстраци результата парсинга в виде строки
function demo($str, $arr=false) {
	echo "<pre>";
	if($arr) print_r($str);
	else print_r(htmlentities($str));
}

// Используемые функции
// file_get_contents();
// strip_tags();
// trim();
// htmlentities();
// preg_match_all();

// Функция получения нужной оболочки с помощью регулярных выражений
function getShell($reg, $content) {
	preg_match_all("#$reg#su", $content, $result, PREG_PATTERN_ORDER);
	return $result[0];
}

// Функция получения нужного контента с помощью регулярных выражения
function getContent($reg, $content) {
	preg_match_all("#$reg#su", $content, $result, PREG_PATTERN_ORDER);
	$res = [];
	foreach($result[0] as $key => $val) {
		preg_match_all("#<.*?>.*?</.*?>#su", $val, $tags, PREG_PATTERN_ORDER);
		foreach($tags[0] as $value)
			$res[$key][] = trim(strip_tags($value));
	}
	return $res;
}

// Обращение к сайту
$data = file_get_contents("http://parser/local");
// demo($data);

// Получение секции новостей
$news = getShell("<section class=\"news\">(.*?)</section>", $data);
$news = getContent("<a href=\".*?\" class=\".*?\">(.*?)</a>", $news[0]);
// demo($news, true);

// Получение секции туров
$tours = getShell("<section class=\"tour\">(.*?)</section>", $data);
$tours = getContent("<div class=\"card\">.*?</div>", $tours[0]);
// demo($tours, true);

// Получение секции партнёров
$partners = getShell("<section  class=\"partners\">(.*?)</section>", $data);
$partners = getContent("<tr>.*?</tr>", $partners[0]);
// demo($partners, true);