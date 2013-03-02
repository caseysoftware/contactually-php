<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(array('apikey' => $apiKey));

$contact = new Services_Contactually_Contact($client);

$params = array(
    'first_name' => 'Bruce',
    'last_name' => 'Wayne',
    'email' => 'definitely.not.batman@example.com',
    'title' => 'Sir',
    'company' => 'Wayne Enterprises',
    'visible' => 1,
    'first_contacted' => '2012-10-21T00:22:24Z',
    'last_contacted' => '2012-10-21T00:22:24Z',
    'hits' => 1,
    'user_bucket_id' => '53000',
    );

$result = $contact->create($params);

print_r($client);