<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tasklist</title>
</head>

<link rel="stylesheet" type="text/css" href="../styles/main.css">
<body>
	<form method="POST" action="logout.php">
	<input type="submit" name="logout" value="Выхади" class="IN">
</form>
	<div class="wrapper">
	<?php
	include '../model/pdoconnect.php';
	include '../model/model.php'
	?>

<?php
	
	
		$add_task=$_POST['add_task'];
		$text_for_task=$_POST['text_for_task'];
		$remove_all=$_POST['remove_all'];
		$ready_all=$_POST['ready_all'];
		$red_id_task=$_GET['red_id_task'];
		$del_id_task=$_GET['del_id_task'];
		$upd_raedy=$_GET['upd_raedy'];
		$upd_unraedy=$_GET['upd_unraedy'];
		

			$model = new model($pdo);
			$model->add_tasks($_SESSION['user']['id'], $text_for_task, $add_task);
			$model->unready($upd_unraedy);
			$model->ready($upd_raedy);
			$model->del_task($del_id_task);
			$model->ready_all($ready_all,$_SESSION['user']['id']);
			$model->remove_all($_SESSION['user']['id'],$remove_all);
			$out = $model->out_tasks($_SESSION['user']['id']);
	include '../view/Tasklist.php';

		?>
	</div>

</body>
</html>