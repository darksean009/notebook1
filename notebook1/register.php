<?php

	require_once "cfg.php";



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
			echo "Регистрация прошла успешно";
		}
		else
		{
			echo "Ошибка при регистрации";
		}
	}



?>

<html>
<head>
	<meta charset="utf8">
	<title></title>

</head>
<body>
	<a href="index.php">Назад</a>

</body>
</html>


