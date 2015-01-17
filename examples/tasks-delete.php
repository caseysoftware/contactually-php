<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$result = $client->tasks->delete(5153164);

echo $result;