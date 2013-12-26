<?php
require 'connect.php';



echo("<html>
<head>
        <title> Шаблон страницы </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head><body>
<div class='wrap'>
        <div class='wrap'>
                <div class='menu'> Информация о пользователе. </div>
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
                
                if(isset($_SESSION['user_id'])) {
					$uid = $_SESSION['user_id'];
					$res = mysql_query("SELECT * FROM User WHERE ID='$uid'");
					$row = mysql_fetch_array($res);
					echo ("<table class='tables'> <tr> <td> Ваше имя: </td> <td>".$row['Name']."</td>");
					echo ("<tr> <td> Ваш ник: </td> <td>".$row['Nick']."</td>");
					echo ("<tr> <td> Город: </td> <td>".$row['City']."</td>");
					echo ("<tr> <td> Информация: </td> <td>".$row['Info']."</td></table>");
					switch ($row['is_master']) {
						case 0: echo "<div class='txt'> Вы - мастер.</div>";
								break;
						case 1: echo "<div class='txt'> Вы - продавец.</div>";
								break;
						case 2: echo "<div class='txt'> Вы - покупатель.</div>";
								break;
					}
					echo "<div class='txt'> Вы можете <a href='change_profile.php'>изменить<a> или <a href='delete_profile.php'>удалить<a> профиль.</div>";
				} else {
					$uid = 0;
					echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a></div>";
				};

                echo ("</div>
        </div>
</div>
</body>
</html>
");

?>
