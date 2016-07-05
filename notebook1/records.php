<?php

require_once "cfg.php";
session_start();

if (!isset($_SESSION['login'])) {
	header('Location: authorization.php');
}
	
		
		$user=$_SESSION['login'];
		//$password=$_POST['password'];

		/*
		$result=$connect->query("select * from user where login='$user' and password='$password'");
		$row=$result->fetch();
		if (!$row) {

			echo "Неверный логин или пароль";


			# code...
		}
		else
		{
			*/
			//echo "Вход выполнен";

			if (isset($_POST['add_record'])) {

				$user=$_SESSION['login'];
				$record=htmlspecialchars("{$_POST['record']}");
				$title=htmlspecialchars("{$_POST['title']}");

				$query="insert into record(user,title,content,date_record) values(:user,:title,:record,:date_record)";
				$dateinsert=date("Y-m-d");
				$stmt = $connect->prepare($query);
				$stmt->bindParam(':user',$user);
				$stmt->bindParam(':title',$title);
				$stmt->bindParam(':record',$record);
				$stmt->bindParam(':date_record',$dateinsert);
				if ($stmt->execute()) {
					echo "Новая запись успешно добавлена";
				}
				else 
				{
					echo "Ошибка при добавлении";
				}
				# code...
			}

			if (isset($_GET['delete'])) {

				$recdelete=$_GET['delete'];

				$query="delete from record where id_record=:record";
				$stmt = $connect->prepare($query);
				$stmt->bindParam(":record",$recdelete);
				if ($stmt->execute()) {
					echo "Запись успешно удалена";
				}
				else 
				{

					echo "Ошибка при удалении";
				}
				
			}

			




		$result=$connect->query("select id_record,title,date_record,content from record where user='$user'");
		

?>
<html>
<head>
	<meta charset="utf8">
	<title>Записи</title>

<link rel="stylesheet"  href="style.css">
<script src="jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
 $('.spoiler_links').click(function(){
    if ($(this).next('.spoiler_body').css("display")=="none") {
        $('.spoiler_body').hide('normal');
        $(this).next('.spoiler_body').toggle('normal');
    }
    else $('.spoiler_body').hide('normal');
    return false;
 });
});
</script>



<style type="text/css">
 	.spoiler_body {display:none;}
 	.spoiler_links {cursor:pointer;}
</style>

</head>
<body>
	<a href="index.php">На главную</a>
	
	<?php

		if (isset($_SESSION['login'])) 
			{
				echo '<form action="authorization.php" method="post">
					 <input type="submit" name="exit" value="Выход">
					 </form><br>';
	
			}

	?>

	<form action="records.php" method="POST">
		<input type="text" name="title"> </br>
		<textarea rows=10 cols=50 name="record" placeholder="Текст записи" required></textarea>
		<br>
		<input type="submit" name="add_record"> 
	</form>

<table class="simple-little-table">
<?php

	
		foreach ($result as $row) {
			echo "<tr>";
			echo "<input type=hidden name=idrecord value=".$row['id_record'].">";
			//echo "<td>{$row['title']}</td>";
			echo "<td><div class='spoiler_links'>{$row['title']}</div>";
			echo "<div class='spoiler_body'>{$row['content']}</div></td>";
			echo "<td>{$row['date_record']}</td>";
			echo "<td><a href='?delete={$row['id_record']}'>Удалить</a></td>";
			echo "<td><a href='changerecord.php?change={$row['id_record']}'>Изменить</a></td>";
			//echo "<td>","<input type=submit value='Постановочная группа' formaction=prdteam.php class=button>","</td>";
			echo "</tr>";

		}
		

?>
</table>


</body>
</html>	

	
