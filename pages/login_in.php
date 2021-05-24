<?php
	session_start()
	?>	
<?php
		include 'pdoconnect.php';
		$login_auth=$_POST['login_auth'];
		$pass_auth=$_POST['pass_auth'];
		$auth=$_POST['auth'];
		$exit=$_POST['exit'];
	
		if ($auth) {
			$_SESSION['login_auth']=$_POST['login_auth'];
			$_SESSION['pass_auth']=md5($pass_auth);
			$_SESSION['auth']=$_POST['auth'];
		}
if ($exit) {
			session_unset();
		}


	// Авторизация
		if ($_SESSION['auth']) {
			if ($_SESSION['login_auth'] and $_SESSION['pass_auth']) {
			
				$str_auth_user="SELECT * FROM `users` WHERE login='$_SESSION[login_auth]' and password='$_SESSION[pass_auth]'";

				$run_auth_user=$pdo->query($str_auth_user);
				$true_user=$run_auth_user->rowCount();
				$out_user=$run_auth_user->fetch();
				if ($true_user==1) {
					echo "
			
				<div class='fsm'>
				<span style='opacity:0;'>$out_user[id]</span>
				</div>
				<form method='POST'><input type='submit'class='EXIT' name='exit' value='ВЫХОД'></form>
			</div>";
					
					include'task_list.php';
				}
				else
				{
					$pass_auth=md5($pass_auth);
					$register="INSERT INTO `users`(`login`, `password`, `created_at`) VALUES ('$login_auth','$pass_auth','1')";
					$run_register=$pdo->query($register);
					if ($run_register) {
						
					echo "<form method='POST'><input type='submit'class='EXIT' name='exit' value='ВЫХОД'></form>";
					include'task_list.php';
				}

					
					else
					{
						include 'form_auth.php';
						echo "<div class ='erors'>Такой логин уже существует</div>";
					}
					
				}
			;
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