<?php 

session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	{

		$query = "select * from users where user_name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);

		if($result)
		{
			if($result && mysqli_num_rows($result) > 0)
			{

				$user_data = mysqli_fetch_assoc($result);

				if($user_data['password'] === $password)
				{

					$_SESSION['user_id'] = $user_data['user_id'];
					header("Location: index.php");
					die;
				}
			}
		}

		echo "Sai tên tài khoản hoặc mật khẩu!";
	}else
	{
		echo "Sai tên tài khoản hoặc mật khẩu!";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row" style="width: 300px;">
			<h2>Đăng nhập</h2>
			<form method="post">
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" placeholder="Enter username" name="user_name">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
				</div>
				<input type="submit" class="btn btn-primary" value="Đăng nhập"/>
				<a href="signup.php" class="btn btn-success">Đăng ký</a>
			</form>
		</div>
	</div>
</body>
</html>