<?php
if ($_SESSION['auth']) {

	if ($_SESSION['login_auth'] and $_SESSION['pass_auth']) {
		
		$outs = $model->login_in($_SESSION['login_auth'],$_SESSION['pass_auth']);

		$out_user=$model->out_user($_SESSION['login_auth'],$_SESSION['pass_auth']);
		
			
				if($outs==0)
				{
					if (isset($_SESSION['login_auth'],$_SESSION['pass_auth'])) {
					$model->reg($login_auth,$pass_auth);
					echo "<form method='POST'><input type='submit'class='EXIT' name='exit' value='ВЫХОД'></form>";
					include'task_list.php';
					}		
					else
					{
					include 'form_auth.php';
					echo "<div class ='erors'>Такой логин уже существует</div>";
					}
					
				}
				

		if ($outs==1) {
					echo "
				<form method='POST'><input type='submit'class='EXIT' name='exit' value='ВЫХОД'></form>
			</div>";
					
					include'task_list.php';
				}
			
			}
			else
			{
				include 'form_auth.php';
				echo "Заполните все поля!";
			}
		}
		
		else
		{
			include 'form_auth.php';
		}
?>