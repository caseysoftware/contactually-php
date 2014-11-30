<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$accounts = $client->get('accounts.json');

$accountList = $accounts['accounts'];
foreach($accountList as $account) {
    echo $account['username'] . "\n";
    echo $account['type'] . "\n";
}