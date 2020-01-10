#!/usr/bin/php
<?php
//ini_set('log_errors',1);
//ini_set('error_log', dirname(__FILE__) . '/var/www/html/490auth_and_website/490_authsys/490rabbitmq.log');
//error_reporting(E_ALL);




require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//////
function displayApiList($zip)
{
        require('accountINFO.php');

        $link = mysqli_connect($server, $user, $pass, $db);

        if($link === false)
        {
                die("Error Failed to Connect." . mysqli_connect_error());
        }

        $sql = "SELECT product FROM api_list where zip='$zip';";
        $result = $link->query($sql);
	$list = array();
        while($row = mysqli_fetch_array($result))
        {
                echo $row[0];
                echo "\n";
                $list[] = $row[0];
        }
	$response = $list;
	return $response;
       

	/*
	$list = array();
	$count =0;
	while($count< count($result))
	{
          $list[] = $result[$c];
	}
	*/
        //$response = $list;
        //return $response;
}


//////

function addApiList($zip, $list)
{
require('accountINFO.php');

$link = mysqli_connect($server, $user, $pass, $db);

if($link === false)
        { die("Error Failed to Connect." . mysqli_connect_error()); }

$c=0;
$actual=0;
while ($c<count($list))
        {
        $sql = "SELECT product FROM api_list WHERE (product='$list[$c]' && zip ='$zip');";
        $result = $link->query($sql);
        if ($result->num_rows > 0)
                {    
                 echo $list[$c]." already added \n";
                }

        else {
	  $sql = "INSERT INTO api_list (zip,product) VALUES ('$zip', '$list[$c]');";
                  $result = $link->query($sql);
                  echo $list[$c]." added \n";
                  $actual++;
             }
	$c++;
	}
      

}

//////
function addMessage($username, $msg, $date, $time)
{
require('accountINFO.php');

$link = mysqli_connect($server, $user, $pass, $db);

 if($link === false)
        {
                die("Error Failed to Connect." . mysqli_connect_error());
        }
$sql = "INSERT INTO message_board(username, message, time, date) VALUES ('$username','$msg','$date','$time');";
$result = $link->query($sql);

echo $msg;

$sql2 = "SELECT * FROM  message_board;";
$old_msg = $link->query($sql2);
$num = mysqli_num_rows($old_msg);


$response = array(); 
while($r = mysqli_fetch_array($old_msg))
        {
                $user0= $r['username'];
                $msg0 = $r['message'];
                $date0 = $r['date'];
		$time0 = $r['time'];
		$response[]=($date0." ".$time0." ".$user0." ".$msg0."\n");		
        }
return $response;
} //end of function

////////////////////////////////////

function addUserList($username, $zip, $list)
{
require('accountINFO.php');

$link = mysqli_connect($server, $user, $pass, $db);

if($link === false)
        { die("Error Failed to Connect." . mysqli_connect_error()); }

$c=0;
$actual=0;
while ($c<count($list))
        {
        $sql = "SELECT product FROM userlist WHERE (zip='$zip' and username='$username' and product='$list[$c]');";
        $result = $link->query($sql);
        if ($result->num_rows > 0)
                {    
                 echo $list[$c]." already added \n";
                }
        else { 
                $sql = "INSERT INTO userlist (username, zip, product) VALUES ('$username','$zip','$list[$c]');";
                $result = $link->query($sql);
                 echo $list[$c]." added \n";
                $actual++;
              }


        $c++;


        }
$response = $actual." Items added";
return $response;       

} //end of function

function displayUserList($username, $zip)
{
	require('accountINFO.php');

	$link = mysqli_connect($server, $user, $pass, $db);

	if($link === false)
	{
		die("Error Failed to Connect." . mysqli_connect_error());
	}

	$sql = "SELECT product from userlist WHERE username='$username' and zip='$zip' ";
	$result = $link->query($sql);
	$list = array();

	while($row = mysqli_fetch_array($result))
	{
		echo $row[0];
 		echo "\n";
 		$list[] = $row[0];
	}
	$response = $list;
	return $response;
}

function displayData($username)
{
	require('accountINFO.php');
	
	$link = mysqli_connect($server, $user, $pass, $db);

        if($link === false)
        {
                die("Error Failed to Connect." . mysqli_connect_error());
        }

	$profile = array();
	$sql = "SELECT * FROM umarket where username='$username';";
	$result = $link->query($sql);

	while($r = mysqli_fetch_array($result))
	{
		$profile['username'] = $r['username'];
		$profile['email'] = $r['email'];
		$profile['zip'] = $r['zip'];
	}
	$sql2 = "SELECT item FROM umarket a JOIN user_list b ON a.username=b.username JOIN items c on b.id=c.id WHERE a.username='$username';";
        $result2 = $link->query($sql2);
        
	$list = array();

        while($row = mysqli_fetch_array($result2))
        {
                echo $row[0];
                echo "\n";
                $list[] = $row[0];
        }
        $response = $list;
        return $profile;

	return $response;
}

function updateData($username, $password, $email, $zip)
{
        require('accountINFO.php');

        $link = mysqli_connect($server, $user, $pass, $db);

        if($link === false)
        {
                die("Error Failed to Connect." . mysqli_connect_error());
	}
	$password_hash = password_hash($password, PASSWORD_DEFAULT);
	$sql = "UPDATE umarket SET username = '$username', phash = '$password_hash', email = '$email', zip = '$zip' WHERE username = '$username';";

	if(mysqli_query($link, $sql))
	{
		$response = "success";
	}
	else
	{
		$response = "Error could not execute" . mysqli_error($link);
	}
	return $response;
}

function addUser($username, $password, $email, $zip)
{
	require('accountINFO.php');

	$link = mysqli_connect($server, $user, $pass, $db);

	if($link === false)
	{
		die("Error Failed to Connect." . mysqli_connect_error());
	}

	$sql = "SELECT username FROM umarket WHERE username='$username';";
	$result = $link->query($sql);

	if ($result->num_rows > 0)
	{
     		$response = "username is taken";
		echo $response;
	}
	else
	{
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$s = "INSERT INTO umarket (username, phash, email, zip) VALUES ('$username','$password_hash', '$email', '$zip');";

		if(mysqli_query($link, $s))
	 	{
	   		$response = "success";
	 	}

		else
		{
			echo "Error could not execute" . mysqli_error($link);
		}


	}
	return $response;
}

function doLogin($username,$password)
{
	require('accountINFO.php');
	
	$conn = new mysqli ($server, $user, $pass, $db);

	if ($conn->connect_error)
        {
        	die( "Connection Failed: " . $conn->connect_error);
        }
	else
	{
		echo "Connected Successfully \n";
	}

	$sql = "SELECT * FROM umarket where username = '$username';";
	$result = $conn->query($sql);
	$r = $result->fetch_assoc();

	$hash = $r['phash'];

	if ($result->num_rows == 0)
	{
		$response = "User doesn't exist";
		echo $response;
	}
	else
	{
		if (password_verify($password, $hash))
		{
			echo "Valid password";
			return 1;
		}
		else{
			echo "Invalid password";
			return 0;
		}
	}
}

function requestProcessor($request)
{
	echo "\n\n received request".PHP_EOL;
	var_dump($request);

	if(!isset($request['type']))
	{
		return "ERROR: unsupported message type";
	}

	switch ($request['type'])
	{
		case "doLogin":
			return doLogin($request['username'],$request['password']);
		case "addUser":
			return addUser($request['username'],$request['password'],$request['email'],$request['zip']);
		case "displayUserList":
			return displayUserList($request['username'],$request['zip']);
		case "displayData":
			return displayData($request['username']);
		case "updateData":
			return updateData($request['username'],$request['password'],$request['email'],$request['zip']);
		case "addUserList":
			return addUserList($request['username'],$request['zip'],$request['list']);
		case "addMessage":
			return addMessage($request['username'],$request['message'],$request['time'],$request['date']);
		case "addApiList":
			return addApiList($request['zip'],$request['products']);
		case "displayApiList":
			return displayApiList($request['zip']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;

$server->process_requests('requestProcessor');

echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
