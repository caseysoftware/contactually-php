<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$params = array(
    'last_name' => 'Wayne'
);

$result = $client->contacts->update(14184603, $params);

echo $result;