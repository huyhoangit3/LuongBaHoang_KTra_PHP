<?php 
session_start();

include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(!empty($user_name) && !empty($password) && !empty($email) && !is_numeric($user_name))
	{

			//lưu vào database
		$query = "insert into users (user_name, email, password) values ('$user_name', '$email'), '$password')";

		mysqli_query($con, $query);

		header("Location: login.php");
		die;
	}else
	{
		echo "Dữ liệu nhập chưa chính xác!";
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
				</div>
				<input type="submit" class="btn btn-primary" value="Đăng ký"/>
				<a href="login.php" class="btn btn-success">Đăng nhập</a>
			</form>
		</div>
	</div>
</body>
</html>