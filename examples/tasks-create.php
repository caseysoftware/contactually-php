<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

// todo: insert parameters

$result = $client->tasks->create($params);

echo $result;