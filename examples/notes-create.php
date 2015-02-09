<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$params = array(
    'body' => 'This is the body of my note',
    'contact_id' => 13194473,
    );

$result = $client->notes->create($params);

echo $result;