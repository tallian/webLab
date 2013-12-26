<?php
require 'connect.php';

if(isset($_SESSION['user_id'])) {
	$uid = $_SESSION['user_id'];
	$res = mysql_query("DELETE FROM User WHERE ID='$uid'");
	if($res = true) {
		header("Location: reg.php");
	}
	else echo "Не удалось удалить профиль";
}
else {
	$uid = 0;
	echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a></div>";
	};
?>
