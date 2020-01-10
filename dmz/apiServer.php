#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function marketList ($zipsrch)
{
	$curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => "http://search.ams.usda.gov/farmersmarkets/v1/data.svc/zipSearch?zip=$zipsrch",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CONNECTTIMEOUT => 5
        ));

        $mlist_response = curl_exec($curl);
        $err = curl_error($curl);

	curl_close($curl);

        if($err)
	{
		$respose = $err;
		return $response;
	}else
	{
		$response = json_decode($mlist_response,true);
		return $response;
	}
	logErrors("test");
}

function marketDetail ($id)
{
	$curl = curl_init();

        curl_setopt_array($curl, array(
                CURLOPT_URL => "http://search.ams.usda.gov/farmersmarkets/v1/data.svc/mktDetail?id=$id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_CONNECTTIMEOUT => 5
        ));
        $dtail_response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($dtail_response,true);

	return $response;
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
		case "marketList":
			return marketList($request['zip']);
		case "marketDetail":
			return marketDetail($request['id']);
	}
	return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "apiServer BEGIN".PHP_EOL;

$server->process_requests('requestProcessor');

echo "apiServer END".PHP_EOL;
exit();
?>
