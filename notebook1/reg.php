<?php
require_once "cfg.php";

session_start();
if (isset($_SESSION['login'])) {
	header('Location: index.php');
}



?>


<html>
<head>
	<meta charset="utf8">
	<title></title>
</head>
<body>
<a href="index.php">На главную</a>
<a href="authorization.php">Вход</a>
	<form action="reg.php" method="POST">

		<input type="text" name="login" required><br>
		<input type="password" name="password" required> <br>
		<input type="submit" value="Зарегистироваться" name="reg"><br>


	</form>	

<?php

if(isset($_POST['reg']))
{
	$login=$_POST['login'];
	$pass=$_POST['password'];



	$query="select * from user where login='$login'";
	$result=$connect->query($query);
	$row=$result->fetch();
	if (!empty($row)) {
		echo "Пользователь с таким логином уже существует";
	}

	else
	{

		$query="insert into user(login,password) values('$login','$pass')";


		if ($connect->exec($query)) {
			echo "Регистрация прошла успешно </br>";
		}
		else
		{
			echo "Ошибка при регистрации";
		}
	}
}	
	
?>


</body>
</html>