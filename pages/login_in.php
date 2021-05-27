<?php
	session_start()
	?>	
<?php
		include '../model/pdoconnect.php';
		include '../model/model.php';
		$login_auth=htmlspecialchars($_POST['login_auth']);
		$pass_auth=htmlspecialchars($_POST['pass_auth']);
		$auth=$_POST['auth'];
		$exit=$_POST['exit'];
		
		$model = new model($pdo);
		$model->SESSION($login_auth,$pass_auth,$auth);
		$model->session_unset($exit);

	// Авторизация
include '../view/login_in.php';


		?>