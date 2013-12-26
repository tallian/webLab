<?php

require 'connect.php';

if(isset($_SESSION['user_id'])) {
	$uid = $_SESSION['user_id'];
	
	$name = $_POST['name'];
	$nick = $_POST['nick'];
	$pass = $_POST['pass'];
	$info = $_POST['info'];
	$city = $_POST['city'];
	
				if ($pass!=$_POST['conf']) {
					echo "<div class='txt'>Введённые пароли не совпадают</div>";
				} else {
					$query = "SELECT * FROM User WHERE ID='$uid'";
					$res = mysql_query($query);
					$row = mysql_fetch_assoc($res);
					$result = mysql_query("UPDATE User SET Name='$name', Nick='$nick', Password='$pass', Info='$info', City='$city' WHERE ID='$uid'");
					//Если запрос пройдет успешно то в переменную result вернется true
					if($result == 'true')
					{
						echo "<div class='txt'>Ваши данные успешно добавлены</div> <br>";
						header("Location: info.php");
					}
					else {echo "<div class='txt'>Ваши данные не добавлены</div>";}
					}

	
} else {
		echo "Вы не авторизованы.";
}

?>
