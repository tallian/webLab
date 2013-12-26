<?php

require '../php/logout.php'
?>

<html>
<head>
        <title> Регистрация </title>
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
					<form name='reg' method='post' action='../php/reg-result.php'>
						<table class='tables'> 
							<tr> <h4> <td> <a class='txt'> Имя: </a> </td> <td> <input type='text' name='name' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Ник: </a> </td> <td>  <input type='text' name='nick' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Пароль: </a> </td> <td>  <input type='password' name='pass' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Повторите пароль: </a> </td> <td>  <input type='password' name='conf' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Город: </a> </td> <td>  <input type='text' name='city' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Информация: </a> </td> <td>  <input type='textarea' name='info' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> </td> <td>
								<select required name='type'>
									<option value='0'> Мастер</option>
									<option value='1'> Продавец</option>
									<option value='2'> Покупатель</option>
							   </select>
							</td> </h4> </tr>
							<tr> <h4> <td> </td> <td> <a class='txt'> </a> <input type='submit' name='send' value='Отправить'> </td> </h4> </tr>
						</table>
					</form>
                </div>
        </div>
</div>
</body>
</html>


