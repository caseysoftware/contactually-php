<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$aliases = $client->email_aliases->index();

foreach($aliases as $alias) {
    echo $alias->username . "\n";
}