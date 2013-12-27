<?php

require 'connect.php';

if(isset($_SESSION['user_id'])) {
	$uid = $_SESSION['user_id'];
	$res = mysql_query("SELECT * FROM User WHERE ID='$uid'");
	$row = mysql_fetch_array($res);

echo("
<html>
<head>
        <title> Изменение профиля </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head>
<body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Регистрация </div>
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
                <div class='page'>
					<form name='reg' method='post' action='../php/changing_profile.php'>
						<table class='tables'> 
							<tr> <h4> <td> <a class='txt'> Изменить имя: </a> </td> <td> <input type='text' name='name' class='reg' value='".$row['Name']."' > </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Изменить ник: </a> </td> <td>  <input type='text' name='nick' class='reg' value='".$row['Nick']."'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Изменить пароль: </a> </td> <td>  <input type='password' name='pass' class='reg'value='".$row['Password']."'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Повторите пароль: </a> </td> <td>  <input type='password' name='conf' class='reg'value='".$row['Password']."'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Изменить город: </a> </td> <td>  <input type='text' name='city' class='reg' value='".$row['City']."'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Изменить информацию: </a> </td> <td>  <input type='textarea' name='info' class='reg' value='".$row['Info']."'> </td> </h4> </tr>
							<tr> <h4> <td> </td> <td> <a class='txt'> </a> <input type='submit' name='send' value='Отправить'> </td> </h4> </tr>
						</table>
					</form>
                </div>
        </div>
</div>
</body>
</html>"); }

else {
		echo "Вы не авторизованы.";
}




?>

