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
 //       $id = "fe";
  //      logErrors($errors, $id);
        header("Location: marketLogin.html");
}
else {
        $username = $_SESSION["username"];

	$response = displayList($username);

	$items = count($response);
	$item = 0;
	while ($item<$items)
        {
		print_r($response[$item]);
		echo "<br>";
		$item++;
        }
}

?>
