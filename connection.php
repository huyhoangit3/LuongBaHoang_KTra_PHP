<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_signin_register";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("Kết nối thất bại!");
}
