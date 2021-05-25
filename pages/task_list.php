<!DOCTYPE html>
<html>
<head>
	<title>Tasklist</title>
</head>

<link rel="stylesheet" type="text/css" href="../styles/main.css">
<body>
	<?php
	include '../model/pdoconnect.php';
	include'../model/model.php';
	?>
<div class="wrapper">
	<div class="Task_list_wrapper">
		<div class="text_task_list">
			Task list
		</div>
		<div class="form_for_tasks">
			<form method="POST">
				<div class="aligin_blocks_task_list">
					<div class="text_for_task">
						<input type="text" name="text_for_task" placeholder="Enter text..." class="text_for_task_input" required="" >
						<input type="submit" name="add_task" value="ADD TASK" class="add_task">
						</div>
						</form>
						<form method="POST">
						<div class="REMOVE_ALL">
							<input type="submit" name="remove_all" value="REMOVE ALL" class="REMOVE_ALL_input">
							<input type="submit" name="ready_all" value="READY ALL" class="READY_ALL_input">
						</div>
				</div>
			</form>
		</div>
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
			$model->add_tasks($out_user['id'], $text_for_task, $add_task);
			$model->unready($upd_unraedy);
			$model->ready($upd_raedy);
			$model->del_task($del_id_task);
			$model->ready_all($ready_all);
			$model->remove_all($out_user['id'],$remove_all);
			$out = $model->out_tasks($out_user['id']);

		
		
	foreach ($out as $out_task)
	{

	

if ($out_task['status']==0) {
	
	echo "<div class='Tasks'>
			<div class='wrapper_for_task'>
				<div class='info_task'>
					<div class='name_task'>
						$out_task[description]
					</div>
						<div class='aligin_buttouns_task_list'>
							<div class='buttons'>
							<a href=?upd_raedy=$out_task[id]>
								<input type='submit'
								 id='$out_task[id]' name='READY' value='READY' class='READY'
								'>
								</a>
							</div>
							<div class='buttons'>
							<a href=?del_id_task=$out_task[id]>
								<input type='submit' name='DELETE' value='DELETE' class='DELETE'>
								</a>
							</div>
						</div>
				</div>
				<div class='img_task_unready'>
				</div>
			</div>
		</div>";
}

else
{
	echo "<div class='Tasks'>
			<div class='wrapper_for_task'>
				<div class='info_task'>
					<div class='name_task'>
						$out_task[description]
					</div>
						<div class='aligin_buttouns_task_list'>
							<div class='buttons'>
							<a href=?upd_unraedy=$out_task[id]>
								<input type='submit' name='UNREADY' value='UNREADY' class='UNREADY
								'>
								</a>
							</div>
							<div class='buttons'>
								<a href=?del_id_task=$out_task[id]>
								<input type='submit' name='DELETE' value='DELETE' class='DELETE'>
								</a>
							</div>
						</div>
				</div>
				<div class='img_task_ready'>
				</div>
			</div>
		</div>";
}
	}
		?>
	</div>
</div>

</body>
</html>