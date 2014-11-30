<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$notes = $client->notes->index();

foreach($notes as $note) {
    echo $note->body . "\n";
}