<?php

#!/usr/bin/php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('myfunctions.php');

session_start();
if(isset($_SESSION['Verified']))
{
//	$errors = "Already logged in.";
//	logErrors($errors, $id);
	header("Location: homepage.php");
}
else
{
	$username = $_POST["username"];
        $pass = $_POST["password"];

	$response = login($username, $pass);
	$date = date("n/j/Y");
	$time = date("g:i:s A");
        $id = "db";
	if($response < 1)
	{
		echo "Failed";
  //              $errors = $username. " failed to log in at ". $date." ".$time;
//		logErrors($errors, $id);
		header("refresh: 5; url = marketLogin.html");
                exit();
        }
        else
        {
		echo "Successfully logged in, redirecting...";
  //              $errors = $username. "  logged in at ". $date." ".$time;
//		logErrors($errors, $id);
		$sidval = session_id();
                $_SESSION['username'] = $username;
                $_SESSION["Verified"] = true;
		header("refresh: 5; url = dashboard.php");
                exit();
        }
}
?>
