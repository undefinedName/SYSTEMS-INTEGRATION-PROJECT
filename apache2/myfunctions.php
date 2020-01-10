<?php
#!/usr/bin/php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($username, $pass)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "doLogin";
        $request['username'] = $username;
        $request['password'] = $pass;

        $response = $client->send_request($request);
	return $response;
}

function register($username, $pass, $email, $zip)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "addUser";
	$request['username'] = $username;
	$request['password'] = $pass;
	$request['email'] = $email;
	$request['zip'] = $zip;

	$response = $client->send_request($request);
	return $response;
}
function displayProfile($username)
{
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "displayData";
        $request['username'] = $username;

        $response = $client->send_request($request);
	return $response;
}

function displayUserList($username, $zip)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "displayUserList";
        $request['username'] = $username;
	$request['zip'] = $zip;

        $response = $client->send_request($request);
	return $response;
}

function displayApiList($zip)
{
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "displayApiList";
        $request['zip'] = $zip;

        $response = $client->send_request($request);
        return $response;
}


function updateProfile($username, $pass, $email, $zip)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

	$request = array();
        $request['type'] = "updateData";
        $request['username'] = $username;
        $request['password'] = $pass;
        $request['email'] = $email;
        $request['zip'] = $zip;

        $response = $client->send_request($request);
	return $response;
}

function updateList($username, $zip, $all_products)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "addUserList";
        $request['username'] = $username;
	$request['zip'] = $zip;
        $request['list'] = $all_products;

        $response = $client->send_request($request);

	return $response;
}

function addApiList($zipsrch, $all_products)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "addApiList";
	$request['zip'] = $zipsrch;
        $request['products'] = $all_products;

        $client->send_request($request);
}

function chatMessage($username, $msg, $time, $date)
{
        $client = new rabbitMQClient("testRabbitMQ.ini","testServer");

        $request = array();
        $request['type'] = "addMessage";
        $request['username'] = $username;
	$request['message'] = $msg;
        $request['time'] = $time;
	$request['date'] = $date;

        $response = $client->send_request($request);

	return $response;
}

function logErrors($errors, $id)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

	$request = array();
        $request['type'] = "logErrors";
        $request['id'] = $id;
        $request['errors'] = $errors;

        $response = $client->send_request($request);
}

?>
