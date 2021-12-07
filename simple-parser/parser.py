# Подключение модулей
from prettytable import PrettyTable
import requests
import re

# Скачиваемые модули
# prettytable
# requests

# Используемые функции:
# requests.get(url)
# re.sub(regex, repl, str)
# re.findall(regex, str)
# str.strip()
# PrettyTable()
# pt.add_rows()

# Функция для получения DOM дерева сайта
def getURL(url):
	response = requests.get(url)
	response.encoding = "utf-8"
	result = re.sub(r"(\r)|(\n)|(\t)","", response.text)
	return result

# Функция получения нужной оболочки с помощью регулярных выражений
def getShell(regex, content):
	result = re.findall(r""+regex+"", content)
	return result[0]

# Функция получения нужного контента с помощью регулярных выражения
def getContent(regex, content):
	result = re.findall(r""+regex+"", content)
	data = []
	for i, block in enumerate(result, 0):
		tags = re.findall(r"<.*?>.*?</.*?>", block)
		data.append([])
		for tag in tags:
			string = re.sub(r"<.*?>", "", tag)
			data[i].append(string.strip())
	return data

# Получение данных сайта
data = getURL("http://parserlocal/local")
# print(data)

# Получение секции новостей
news = getShell("<section class=\"news\">.*?</section>", data)
# Получение контента секции новостей
news = getContent("<a href=\".*?\" class=\".*?\">.*?</a>", news)
# print(news)

# Получение секции туров
tours = getShell("<section class=\"tour\">(.*?)</section>", data);
# Получение контента секции туров
tours = getContent("<div class=\"card\">.*?</div>", tours);
# print(tours)

# Получение партнёров
partners = getShell("<section  class=\"partners\">(.*?)</section>", data);
# Получение контента секции туров
partners = getContent("<tr>.*?</tr>", partners);
# print(partners)

# Вывод полученных данных
# Вывод новостей
out = PrettyTable()
out.field_names = ["RU", "DAY", "EN", "DATE"]
out.add_rows(news)
print(out)
print()

# Вывод туров
out = PrettyTable()
out.field_names = ["NAME", "TEXT", "COST", "DO"]
out.add_rows(tours)
print(out)
print()

# Вывод партнёров
out = PrettyTable()
out.field_names = ["N", "CITY", "OOO", "ADDRESS"]
out.add_rows(partners)
print(out)
print()