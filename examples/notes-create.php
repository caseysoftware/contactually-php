<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

//$client = new Services_Contactually(array('api_key' => $apiKey));
//
//$note = new Services_Contactually_Note($client);
//
//$params = array(
//    'body' => 'This is the body of my note',
//    'contact_id' => 17471066,
//    );
//
//$result = $note->create($params);
//
//print_r($result);