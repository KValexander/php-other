<?php
	// запрос на тестовый адрес
	$url = "http://security/";
	$count = 100;
	 
	// ip и порт прокси
	$proxy = '109.188.81.101:8080';
	// если требуется авторизация на прокси-сервере
	$proxyauth = 'user:password';
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	 
	// домен, на который осуществляется отправка
	// тестового запроса, работает через https
	// поэтому нужно добавить флаги для работы с ssl
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	 
	// подключение к прокси-серверу
	// curl_setopt($ch, CURLOPT_PROXY, $proxy);
	// если требуется авторизация
	// curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
	 
	// отправка запроса
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	for($i = 0; $i < $count; $i++)
		$curl_scraped_page = curl_exec($ch);
	curl_close($ch);
	 
	// вывод ответа сервера
	// должен вернуть все заголовки и ip с которого 
	// было обращение, в данном случае это 109.188.81.101
	var_dump($curl_scraped_page);