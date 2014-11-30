<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$accounts = $client->accounts->index();

foreach($accounts as $account) {
    echo $account->username . "\n";
    echo $account->name . "\n";
}