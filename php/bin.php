<?php
require 'connect.php';

$id = $_GET['i'];	
if (!isset($_GET['p'])) {
	$_SESSION['p'] = 1;
}
else {
	$_SESSION['p'] = p;
}
$_SESSION['s'] = 10;

echo("<html>
<head>
        <title> Информация об украшении </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head><body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Информация об украшении. </div>
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
                <table class='result' border = '1px'>
				<tr> <td> Название: </td> <td> Возможность изменения: </td> <td> Список материалов: </td> <td> Выбрать: </td> </tr>");
					if(isset($_SESSION['user_id'])) {
						$uid = $_SESSION['user_id'];
						$size = $_SESSION['s'];
						$p = $_SESSION['p'];
						$num1 = ($p - 1)*$size;
						$result1 = mysql_query("INSERT INTO Bin (ID_user, ID_item) VALUES ('$uid', '$id')");
						$res2 = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM Item WHERE ID in (SELECT ID_item FROM Bin WHERE ID_user='$uid') LIMIT $num1,$size");
						$result = mysql_query("SELECT FOUND_ROWS()");
						$num_rows = mysql_result($result, 0);
						while ($row2=mysql_fetch_assoc($res2)) {
							$idi = $row2['ID'];

							echo("<tr> <td>".$row2['Name']."</td> <td>");
							if ($row2['isVar'] == 0) echo "Нет";
							else echo "Есть";
							echo("</td> <td> ");
							$res3 = mysql_query("SELECT * FROM Material WHERE ID in (SELECT id_material FROM Material_list WHERE ID_item='$idi')");
							while ($row3=mysql_fetch_assoc($res3)) {
								echo ($row3['Name']." ");
							}
							echo ("</td> <td> <a href=info_jew.php?p=".$idi."> Инфо </a>, <a href=delete_from_bin.php?p=".$idi."> Удалить </a>  </td>  </tr>");
						}
					}
					else {
						echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a>, чтобы добавить укаршение в корзину.</div>";
					}
                echo ("</table></div>
        </div>
</div>
</body>
</html>
");

?>
