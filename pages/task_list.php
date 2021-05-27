<!DOCTYPE html>
<html>
<head>
	<title>Tasklist</title>
</head>

<link rel="stylesheet" type="text/css" href="../styles/main.css">
<body>
	<?php
	include '../model/pdoconnect.php';
	
	?>
<div class="wrapper">
<?php

		$add_task=$_POST['add_task'];
		$text_for_task=$_POST['text_for_task'];
		$remove_all=$_POST['remove_all'];
		$ready_all=$_POST['ready_all'];
		$red_id_task=$_GET['red_id_task'];
		$del_id_task=$_GET['del_id_task'];
		$upd_raedy=$_GET['upd_raedy'];
		$upd_unraedy=$_GET['upd_unraedy'];

			$model->add_tasks($out_user['id'], $text_for_task, $add_task);
			$model->unready($upd_unraedy);
			$model->ready($upd_raedy);
			$model->del_task($del_id_task);
			$model->ready_all($ready_all);
			$model->remove_all($out_user['id'],$remove_all);
			$out = $model->out_tasks($out_user['id']);

			include '../view/Tasklist.php';

		?>
	</div>

</body>
</html>