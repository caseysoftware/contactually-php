<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Contactually\Client($apikey);

//$client = new Services_Contactually(array('api_key' => $apiKey));
//
//$contact = new Services_Contactually_Contact($client);
//
//$contact_id = 17471066;
//$bucket_id = 161176;
//
//$result = $contact->bucket($contact_id, $bucket_id);
//
//print_r($result);