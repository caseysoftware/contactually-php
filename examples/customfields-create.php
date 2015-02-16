<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$params = array(
    'owner_id' => '9482',
    'owner_type' => 'User',
    'field_label' => 'Important Field',
    'field_type' => 'textfield',
    'default_value' => 'something'
);

$result = $client->customfields->create($params);

echo $result;