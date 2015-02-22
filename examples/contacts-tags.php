<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

$contact = $client->contacts->load(46955899);

$tags = array('one', 'two', 'three');

$result = $contact->tag($tags);

echo $result;