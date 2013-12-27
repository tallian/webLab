<?php
require 'connect.php';

$id = $_GET['p'];

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
                <div class='page'>");
					$res = mysql_query("SELECT * FROM Item WHERE ID='$id'");
					$row = mysql_fetch_array($res);
					echo ("<table class='tables'> <tr> <td> Наименование: </td> <td>".$row['Name']."</td> </tr>");
					echo ("<tr> <td> Информация: </td> <td>".$row['Info']."</td> </tr> </table> ");
					switch ($row['isVar']) {
						case 0: echo " <div class='txt'>Внесение изменений невозможно.</div>  ";
								break;
						case 1: echo " <div class='txt'> Можно высказывать свои пожелания.</div>";
								break;
					}
					if(isset($_SESSION['user_id'])) {
						$uid = $_SESSION['user_id'];
						$res2 = mysql_query("SELECT * FROM Bin WHERE ID_user='$uid'");
						$a =0;
						while ($r=mysql_fetch_array($res2)) {
							if ($r['ID_item']==$id) {
									echo "<div class='txt'> Это украшение уже есть у вас в корзине </div>";
									$a = 1;
									break;
							}
						}
						if($a == 0) {
						 echo "<div class='txt'> Вы можете <a href='bin.php?i=$id'>добавить украшение в корзину.<a> </div>";
						}
					}
					else {
						echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a>, чтобы добавить укаршение в корзину.</div>";
					}
                echo ("</div>
        </div>
</div>
</body>
</html>
");

?>
