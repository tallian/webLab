<?php

require 'connect.php';

if(isset($_SESSION['user_id'])) {
	$uid = $_SESSION['user_id'];
	$res = mysql_query("SELECT * FROM Material");
	
}
else {
	$uid = 0;
	echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a></div>";
	};

?>

<html>
<head>
        <title> Добавление украшения. </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head>
<body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Добавление украшения </div>
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
					<form name='reg' method='post' action='../php/new_jew_result.php'>
						<table class='tables'> 
							<tr> <h4> <td> <a class='txt'> Название: </a> </td> <td> <input type='text' name='name' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Описание: </a> </td> <td>  <input type='textarea' name='info' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Возможно изменение: </a> </td> <td>  <input type='checkbox' name='is_various' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> </td> <td>
								<select multiple required  name='mats[]'>
									<?php
										while ($row=mysql_fetch_assoc($res)) {
										echo ("<option value='".$row['ID']."'> ".$row['Name']."</option>");
										}
									?>
							   </select>
							</td> </h4> </tr>
							<tr> <h4> <td> </td> <td>  <input type='submit' name='send' value='Отправить'> </td> </h4> </tr>
						</table>
					</form>
                </div>
        </div>
</div>
</body>
</html>


