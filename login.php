<?php
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<h2>LOGIN PAGE </h2>
		<form action="logincheck.php" method="POST">
		<div class = "jumbotron">
					<br>
					<label>
						<font>Username
				</label>
				<input type="text" class="form-control"value="<?php $username?>" name="username"><br>
				
				<label>
					Password
				</label>
				<input type="password" class="form-control"  value="<?php $password?>" name="password"><br>
				<input type="submit" class="btn btn-default" value="Login">
		</div>
		</form>
		<form action="reg.php" method="get">
			<input type="submit"  class ="btn btn-warning" value="Continue">
		</form>
	</body>
</html>
	