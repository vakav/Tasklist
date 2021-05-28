<?php


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<div class="wrapper_login_in container-fluid">
	<div class="row height_aligin">
		<div class="col-12 text-center ">
			<form method="POST">
	
				<div class="form_login_in">
					<div class="login">
						<div>
							<h4>Авторизация</h4>
						</div>
			
						<input type="text" name="login" placeholder="Логин"><br><br>
						<input type="password" name="password" placeholder="Пароль"><br><br>

						<div class="aligin_in">
							<input type="submit" name="auth" class="IN" value="Войти">
						</div>
						<div class="errors">
							<?php
							if ($_SESSION['message']) {
								echo $_SESSION['message'];
								unset($_SESSION['message']);
							}
							?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>


