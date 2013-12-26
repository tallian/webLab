<?php

require 'connect.php';

$name = $_POST['name'];
$nick = $_POST['nick'];
$pass = $_POST['pass'];
$info = $_POST['info'];
$city = $_POST['city'];
$is_master = $POST['type'];

echo("<html>
<head>
        <title> Результаты регистрации </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head><body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Результаты регистрации </div>
                <div class='info0'></div>
        </div>
        <div class='wrap'>
                <div class='info1'>
					<a href='search.php'> <div class='elem'>Поиск</div> </a>
					<a href='info.php'> <div class='elem'>Информация о пользователе</div> </a>
					<a href='bin.php'><div class='elem'>Корзина</div> </a>
					<a href='history.php'><div class='elem'>История покупок</div> </a>
                </div>
                <div class='bord'></div>
                <div class='page'>");
                if ($pass!=$_POST['conf']) {
					echo "<div class='txt'>Введённые пароли не совпадают</div>";
				} else {
					$test = mysql_query ("SELECT * FROM User WHERE Nick='$nick'");
					if(mysql_fetch_array($test)) {
						echo "<div class='txt'>Такой ник уже есть, вы можете вернуться и изменить его: <a href='../html/reg.html'>Назад<a></div></div>";
					}
					else {
						$result = mysql_query("INSERT INTO User (name, nick, password, info, city, is_master) VALUES ('$name', '$nick', '$pass', '$info', '$city', '$is_master')");
						//Если запрос пройдет успешно то в переменную result вернется true
						if($result == 'true')
						{
							echo "<div class='txt'>Ваши данные успешно добавлены, вы можете войти на сайт: <a href='in.php'>Войти<a></div> <br>";
						}
						else {echo "<div class='txt'>Ваши данные не добавлены</div>";}
				}
				}
                echo ("</div>
        </div>
</div>
</body>
</html>
");

?>
