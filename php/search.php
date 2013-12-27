<?php
require 'connect.php';

$_SESSION['res'] = mysql_query("SELECT * FROM Material");
if (isset($_POST['send'])) {
	$_SESSION['auth'] = $_POST['auth'];
	$_SESSION['name'] = $_POST['name'];
	if($_POST['is_various']=='on')
		$_SESSION['is_various'] = 1;
	else $_SESSION['is_various'] = 0;
	$_SESSION['mats'] = $_POST['mats'];
}

//Переменные для постраничного вывода.

if (isset($_POST['size'])) {
	$_SESSION['p'] = 1;
	$_SESSION['s'] = $_POST['size'];
}

if(isset($_GET['p'])) {
$_SESSION['p'] = $_GET['p'];
}

?>
<html>
<head>
        <title> Поиск. </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head><body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Поиск. </div>
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
					<form name='search' method='post' action='search.php'>
						<table class='tables'> 
							<h4> <td> Продавец: <input type='text' name='auth' class='reg' value='-'> </td> </h4> 
							<td> Вывести элеметов: <input type='text' name='size' class='reg' value='2'> <input type='submit' name='send' value='Поиск'> </td> </tr>
						</table>
						</form>
						<form name='search' method='post' action='info_jew.php'>
						<table class='result' border = '1px'>
							<tr> <td> Название: </td> <td> Продавец: </td> <td> Возможность изменения: </td> <td> Список материалов: </td> <td> Выбрать: </td>  </tr>
							<?php
								$auth = $_SESSION['auth'];
								$size = $_SESSION['s'];
								$isVar = $_SESSION['is_various'];
								$p = $_SESSION['p'];
								$num1 = ($p - 1)*$size;
								if ($auth != '-'){
									$res2 = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM Item WHERE ID in (SELECT ID_item FROM Shop WHERE ID_user in (SELECT ID FROM User WHERE Name='$auth')) LIMIT $num1,$size");
									$result = mysql_query("SELECT FOUND_ROWS()");
									$num_rows = mysql_result($result, 0);
									while ($row2=mysql_fetch_assoc($res2)) {
										$idi = $row2['ID'];
										echo("<tr> <td>".$row2['Name']."</td> <td> ".$auth." </td> <td>");
										if ($row2['isVar'] == 0) echo "Нет";
										else echo "Есть";
										echo("</td> <td> ");
										$res3 = mysql_query("SELECT * FROM Material WHERE ID in (SELECT id_material FROM Material_list WHERE ID_item='$idi')");
										while ($row3=mysql_fetch_assoc($res3)) {
											echo ($row3['Name']." ");
										}
										echo ("</td> <td> <a href=info_jew.php?p=".$idi."> Инфо </a>  </td>  </tr>");
									}
								}
							?>
						</table>
						
						<?php
						if ($num_rows>$size) {
							echo ("Перейти на страницу:");
							for($i=1; $i<=ceil($num_rows/$size); $i++) {
								echo ("<a href=search.php?p=".$i.">".$i." </a>");
							}
						}
						?>
                </div>
        </div>
</div>
</body>
</html>
