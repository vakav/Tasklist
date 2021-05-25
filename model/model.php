<?php

class model{



protected $pdo;
        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
			

			public function add_tasks($user_id, $text_for_task, $add_task)
			{
			if ($add_task) 
			{
				$text_for_task = htmlspecialchars($text_for_task, ENT_QUOTES, 'UTF-8');

				$str_add_task="INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`) VALUES ('$user_id','$text_for_task','1','0');";

			$run_add_task=$this->pdo->query($str_add_task);
		}
	}


	public function unready($upd_unraedy)
	{
		$str_upd_task_unredy="UPDATE `tasks` SET `status` = '0' WHERE `tasks`.`id` = '$upd_unraedy'";
		$run_upd_task_unready=$this->pdo->query($str_upd_task_unredy);
	}
	public function ready($upd_raedy)
	{
			$str_upd_task_raedy="UPDATE `tasks` SET `status` = '1' WHERE `tasks`.`id` = '$upd_raedy'";
		$run_upd_task_ready=$this->pdo->query($str_upd_task_raedy);
	}
	public function del_task($del_id_task)
	{
		$str_del_task="DELETE FROM `tasks` WHERE `tasks`.`id` = '$del_id_task'";
		$run_del_task=$this->pdo->query($str_del_task);
	}
	public function ready_all($ready_all)
	{
			if ($ready_all) {
				$all_upd_ready="UPDATE `tasks` SET  `status`='1' WHERE `tasks`.`status`='0'";
				$run_all_upd_ready=$this->pdo->query($all_upd_ready);
			}
	}
	public function remove_all($out_user_id,$remove_all)
	{
		if ($remove_all) {
				$str_del_task="DELETE FROM `tasks` WHERE `tasks`.`user_id`='$out_user_id' ";
				$run_del_task=$this->pdo->query($str_del_task);
				
			}
	}
	public function out_tasks($out_user_id)
	{
		$str_out_task="SELECT * FROM `tasks` WHERE user_id='$out_user_id'";
		$run_out_task=$this->pdo->query($str_out_task);
		$out_task=$run_out_task;
		return $out_task;
	}


}

?>