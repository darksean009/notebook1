<?php

	session_start();

?>
<html>
<head>
	<meta charset="utf8">
	<title>Главная</title>
</head>
<body>

	
	<?php

	if (isset($_SESSION['login'])) {
	echo '<a href="records.php">Мои записи</a>';
	echo '<form action="authorization.php" method="post">
			<input type="submit" name="exit" value="Выход">
		</form><br>';
	
	}

	else
	{
		echo '<a href="reg.php">Регистрация</a><br>';
		echo '<a href="authorization.php">Вход</a><br>';
	}

	?>

</body>
</html>