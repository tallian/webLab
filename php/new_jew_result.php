<?php

require 'connect.php';

if(isset($_SESSION['user_id'])) {
	$uid = $_SESSION['user_id'];


$name = $_POST['name'];
$info = $_POST['info'];
if($_POST['is_various']=='on')
	$is_various = 1;
else $is_various = 0;
$mats = $_POST['mats'];

echo("<html>
<head>
        <title> Добавление элемента </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head><body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Добавление элемента </div>
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
						$result1 = mysql_query("INSERT INTO Item (name, info, isVar) VALUES ('$name', '$info', '$is_various')");
						
						$id = mysql_insert_id();
						$result2 = mysql_query("INSERT INTO Shop (id_item, id_user) VALUES ('$id', '$uid')");
					
						foreach ($mats as $t){
							$result3 = mysql_query("INSERT INTO Material_list (id_item, id_material) VALUES ('$id', '$t')");
							
						}
						
                echo ("</div>
        </div>
</div>
</body>
</html>
");
}

else {
	$uid = 0;
	echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a></div>";
	};

?>
