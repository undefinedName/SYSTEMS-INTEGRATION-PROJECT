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
   //     logErrors($errors, $id);
        header("Location: ./");
}
else
{
	$all_products = array();
	$products = $_POST['product'];
	foreach($products as $product){
		$all_products[] = $product;
	}
	$username = $_SESSION['username'];
	$profile = displayProfile($username);
	$zip = $profile['zip'];
	$response = updateList($username, $zip, $all_products);
	$actual = print_r($response, true);
//	$id = "db";
	if($actual > 0)
	{
//		$errors = "Items added to ".$username."'s shopping list.";
//		logErrors($errors, $id);
		header("Location: preferences.php");
	}
	else
	{
//		$errors = "Nothing was added to ".$username."'s shopping list.";
//		logErrors($errors, $id);
		header("Location: preferences.php");
	}
}
?>
