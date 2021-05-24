<!DOCTYPE html>
<html>
<head>
	<title>Tasklist</title>
</head>

<link rel="stylesheet" type="text/css" href="../styles/main.css">
<body>
<div class="wrapper ">
	<div class="Task_list_wrapper">
		<div class="text_task_list">
			Task list
		</div>
		<div class="form_for_tasks">
			<form method="POST">
				<div class="aligin_blocks_task_list">
					<div class="text_for_task">
						<?php


						?>
						<input type="text" name="text_for_task" placeholder="Enter text..." class="text_for_task_input" >
						<input type="submit" name="add_task" value="ADD TASK" class="add_task">
						</div>
						<div class="REMOVE_ALL">
							<input type="submit" name="remove_all" value="REMOVE ALL" class="REMOVE_ALL_input">
							<input type="submit" name="ready_all" value="READY ALL" class="READY_ALL_input">
						</div>
						
				</div>
			</form>
			<?php
			include 'pdoconnect.php';
			$add_task=$_POST['add_task'];
			$remove_all=$_POST['remove_all'];
			$ready_all=$_POST['ready_all'];
			$text_for_task=$_POST['text_for_task'];


			if ($add_task) {
				$_POST['text_for_task'] = htmlspecialchars($_POST['text_for_task'], ENT_QUOTES, 'UTF-8');
				$str_add_task="INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`) VALUES ('$out_user[id]','$text_for_task','1','0');";
			$run_add_task=$pdo->query($str_add_task);
			}

			

			?>
		</div>
		<?php
		$red_id_task=$_GET['red_id_task'];
		$del_id_task=$_GET['del_id_task'];
		$upd_raedy=$_GET['upd_raedy'];
		$upd_unraedy=$_GET['upd_unraedy'];



		$str_upd_task_unredy="UPDATE `tasks` SET `status` = '0' WHERE `tasks`.`id` = '$upd_unraedy'";
		$run_upd_task_unready=$pdo->query($str_upd_task_unredy);




		$str_upd_task_redy="UPDATE `tasks` SET `status` = '1' WHERE `tasks`.`id` = '$upd_raedy'";
		$run_upd_task_unready=$pdo->query($str_upd_task_redy);


	$str_del_task="DELETE FROM `tasks` WHERE `tasks`.`id` = '$del_id_task'";
	$run_del_task=$pdo->query($str_del_task);

		$str_out_task="SELECT * FROM `tasks` WHERE user_id='$out_user[id] '  ";
		$run_out_task=$pdo->query($str_out_task);
	$out_task=$run_out_task->fetch();

		
		if ($ready_all) {
				$all_upd_ready="UPDATE `tasks` SET  `status`='1' WHERE `tasks`.`status`='0'";
				$run_all_upd_ready=$pdo->query($all_upd_ready);
			}
			if ($remove_all) {
				$str_del_task="DELETE FROM `tasks` WHERE `tasks`.`user_id`='$out_user[id]' ";
	$run_del_task=$pdo->query($str_del_task);
				
			}



	$run_out_task=$pdo->query($str_out_task);
	while ($out_task=$run_out_task->fetch()) {

	

if ($out_task['status']==0) {
	$_POST['text_for_task'] =htmlspecialchars($_POST['text_for_task'], ENT_QUOTES, 'UTF-8');
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