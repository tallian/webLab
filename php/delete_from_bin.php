<?php
require 'connect.php';

$id=$_GET['p'];

if(isset($_SESSION['user_id'])) {
	$uid = $_SESSION['user_id'];
	$res = mysql_query("DELETE FROM Bin WHERE ID_user='$uid' AND ID_item='$id'");
	if($res = true) {
		header("Location: bin.php");
	}
	else echo "Не удалось удалить профиль";
}
else {
	$uid = 0;
	echo "<div class='txt'> Вы не авторизованы, <a href='in.php'>войдите<a> или <a href='reg.php'>зарегистрируйтесь<a></div>";
	};
?>
