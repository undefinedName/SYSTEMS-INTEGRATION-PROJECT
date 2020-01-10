<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function marketList ($zipsrch)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","apiServer");

        $request = array();
        $request['type'] = "marketList";
        $request['zip'] = $zipsrch;

        $response = $client->send_request($request);
        return $response;
}

function marketDetail ($id)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","apiServer");

        $request = array();
        $request['type'] = "marketDetail";
        $request['id'] = $id;

        $response = $client->send_request($request);
        return $response;
}


?>
