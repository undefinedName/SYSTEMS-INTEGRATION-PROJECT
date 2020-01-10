<?php
#!/usr/bin/php

require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
$request = array();
$request['type'] = "sendErrors";
$request['id'] = "fe";

$response = $client->send_request($request);

$file = fopen("frontLog.txt", "w");
$a = 0;
$count = count($response);

while($a<$count){
	fwrite($file, $response[$a]);
	$a++;
}
fclose($file);

?>
