<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

// todo: insert parameters

$result = $client->contact_histories->create($params);

echo $result;