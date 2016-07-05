<?php
	require_once "cfg.php";
	session_start();
	if (isset($_POST['add_record'])) {
		header('Location: records.php');
	}

?>

<html>
<head>
	<title></title>
	<meta charset="utf8">
</head>
<body>



<form action="add.php" method="POST">
		<input type="text" name="title">
	</br>
		<textarea rows=10 cols=50 name="record" placeholder="Текст записи" required></textarea>
		<br>
		<input type="submit" name="add_record"> 
	</form>


</body>
</html>