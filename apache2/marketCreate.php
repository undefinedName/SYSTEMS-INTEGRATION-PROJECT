<?php

#!/usr/bin/php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('myfunctions.php');

$username = $_POST["username"];
$pass = $_POST["password"];
$email = $_POST["email"];
$zip = $_POST["zip"];

$response = register($username, $pass, $email, $zip);

if ($response == "username is taken")
{
	$errors = "Username is already taken, redirecting back to registeration page...";
	echo $errors;
	header("refresh: 5; url = marketCreate.html");
}
elseif ($response == "success")
{
	$errors = "Account successfully created, redirecting to login...";
	echo $errors;
	header("refresh: 5; url = marketLogin.html");
}
else
{
	$errors = "Internal error, please try again.<br> Redirecting back to registeration page...";
	echo $errors;
	header("refresh: 5; url = marketCreate.html");
}
//$id = "db";
//logErrors($errors, $id);


?>

