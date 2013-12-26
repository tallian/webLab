<?php

require 'connect.php';


if (isset($_POST['nick'])) {
	$name= $_POST['nick'];
	$pass= $_POST['pass'];

	$query = "SELECT * FROM User WHERE Nick='$name' AND Password='$pass'";

	$res = mysql_query($query);
	if ($row = mysql_fetch_assoc($res)) {
		
		$_SESSION['user_id'] = $row['ID'];
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		echo "Вход выполнен";
		header("Location: info.php");
	}
}
#if (isset($_REQUEST[session_name()])) session_start();
if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) {
	$id = $_SESSION['user_id'];
	$query = "SELECT * FROM User WHERE ID='$id'";
	$res = mysql_query($query);
	$row = mysql_fetch_assoc($res);
	header("Location: info.php");
}
else {
?>

<html>
<head>
        <title> Страница входа </title>
        <link rel='stylesheet' type='text/css' href='../style.css'>
</head>
<body>
<div class='wrap'>
        <div class='top'></div>
        <div class='wrap'>
                <div class='menu'> Страница входа </div>
                <div class='info0'></div>
        </div>
        <div class='wrap'>
                <div class='info1'></div>
                <div class='bord'></div>
                <div class='page'>
					<table class='tables'> 
						<form name='aut' method='post' action='in.php'>
							<tr> <h4> <td> <a class='txt'> Ник: </a> </td> <td> <input type='text' name='nick' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> <a class='txt'> Пароль: </a> </td> <td>  <input type='password' name='pass' class='reg'> </td> </h4> </tr>
							<tr> <h4> <td> </td> <td> <a class='txt'> </a> <input type='submit' name='send' value='Отправить'> </td> </h4> </tr>
						</form>
					</table>
                </div>
        </div>
</div>
</body>
</html>

<?php 
}
?>

