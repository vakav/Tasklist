<?php
session_start();
?>
<?php
include '../model/pdoconnect.php';
include '../model/model.php';

if(isset($_SESSION['user'])){
	header('Location: task_list.php');
	}

	if(isset($_POST['auth'])){

	if(!empty($_POST['login']) && !empty($_POST['password'])) {
	$login=htmlspecialchars($_POST['login']);
	$password=htmlspecialchars($_POST['password']);
	$password = md5($password);
	$query =("SELECT * FROM `users` WHERE login=:login AND password=:password");
	$auth_query=$pdo->prepare($query);
	$auth_query->execute(['login' =>$login, 'password'=>$password]);
	$true_user = $auth_query->rowCount();
	$out_user =  $auth_query->fetch();
  if($true_user==1)
 {
	 $_SESSION['user'] = [
	 		"id" => $out_user['id']];	 
   header('Location: task_list.php');
	}
	else
	{
		$_SESSION['message']='ошибка';
		header('Location: login_in.php');
		
	}
		if($true_user==0)
		{	
			$login=htmlspecialchars($_POST['login']);
			$password=htmlspecialchars($_POST['password']);
			$password = md5($password);
			$regis="INSERT INTO `users`(`login`, `password`, `created_at`) VALUES (:login,:password,'1')";
			$register= $pdo->prepare($regis);
			$register->execute(['login' =>$login, 'password'=>$password]);

			if ($register) {
				$query=("SELECT * FROM `users` WHERE login=:login AND password=:password");
				$auth_user= $pdo->prepare($query);
				$auth_user->execute(['login' =>$login, 'password'=>$password]);
				$true_user=$auth_user->rowCount();
				$out_user=$auth_user->fetch();
				$_SESSION['user'] = [
	 		"id" => $out_user['id']];	 
	 		header('Location: task_list.php');
			}
			else
			{
				echo "qweqwe";
				header('Location: login_in.php');
			}
		
		}
	}
	else {
	
	echo  "Invalid username or password!";
 }
} 



include 'form_auth.php';

?>
