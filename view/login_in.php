<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>login_in</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles/main.css">
</head>
<body>

<div class="container-fluid wrapper_login_in">
	<div class="row">
		<div class="col-12 text-center ">
			<form method="POST">
	
				<div class="form_login_in">
					<div class="login">
						<div>
							<h4>Авторизация</h4>
						</div>
			
						<input type="text" name="login_auth" placeholder="Логин"><br><br>
						<input type="password" name="pass_auth" placeholder="Пароль"><br><br>

						<div class="aligin_in">
							<input type="submit" name="auth" class="IN" value="Войти">
						</div>
						<div class="erors">
				
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>