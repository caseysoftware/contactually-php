<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$grouping = $client->groupings->show(8411530);

print_r($grouping);