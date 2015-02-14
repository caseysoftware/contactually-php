<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$fields = $client->customfields->index();

foreach($fields as $field) {
    echo $field->field_label . "\n";
}