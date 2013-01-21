<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$task = new Services_Contactually_Task($client);

$result = $task->show(1939234);

print_r($result);