<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$followup = $client->followups->show(2999438);

print_r($followup);