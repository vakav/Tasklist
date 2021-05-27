<?php 
foreach ($out as $out_task) { 
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
								>
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