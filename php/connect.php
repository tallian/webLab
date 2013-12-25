<?php

# Запуск сессии
session_start();
# Служит для отладки, показывает все ошибки, предупреждения и т.д.
error_reporting(E_ALL);
# Подключение файлов с функциями
#include_once("functions.php");
# В этом массиве далее мы будем хранить сообщения системы, т.е. ошибки.
$messages=array();

/* Конфигурация базы данных */

$host		= 'localhost';
$user		= 'root';
$pswd		= '';
$database	= 'Jew_sale'; 


$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");

mysql_query("SET names UTF8");

?>

