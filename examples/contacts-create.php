<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$contact = new Services_Contactually_Contact($client);

$params = array(
    'first_name' => 'aaFirstName',
    'last_name' => 'astName',
    'title' => 'Sir',
    'company' => 'Wayne Enterprises',
    'visible' => 1,
    'first_contacted' => '2012-10-21T00:22:24Z',
    'last_contacted' => '2012-10-21T00:22:24Z',
    'hits' => 1,
    'user_bucket_id' => '53000',
    //'address' => '123 Fake Street Gotham City',
    //'phone' => '5125551212',
    );

$result = $contact->create($params);

print_r($result);