<?php

#!/usr/bin/php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
require('myfunctions.php');

session_start();
if(!isset($_SESSION['Verified']))
{
//	$errors = "Attempted to access a member's only page.";
  //      $id = "fe";
  //      logErrors($errors, $id);
        header("Location: ./");
}
else {
        $username = $_POST["username"];
	$pass = $_POST["password"];
	$email = $_POST["email"];
	$zip = $_POST["zip"];

	$response = updateProfile($username, $pass, $email, $zip);
	$status = print_r($response, true);

	if($status="success")
	{
//		$errors = $username."'s profile was updated.";
  //      	$id = "db";
    //    	logErrors($errors, $id);
		header("Location: dashboard.php");
	}
	else
	{
//		$errors = "Nothing was updated for ".$username;
  //      	$id = "db";
    //    	logErrors($errors, $id);
		header("Location: dashboard.php");
	}
}
?>
