<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

//$client = new Services_Contactually(array('api_key' => $apiKey));
//
//$task = new Services_Contactually_Task($client);
//
//$result = $task->complete(5153368);
//
//print_r($result);