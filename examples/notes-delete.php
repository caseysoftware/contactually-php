<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

//$client = new Services_Contactually(array('api_key' => $apiKey));
//
//$note = new Services_Contactually_Note($client);
//
//$result = $note->delete(1394642);
//
//print_r($result);