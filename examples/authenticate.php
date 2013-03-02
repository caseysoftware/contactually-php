<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(
            array('email' => $email, 'password' => $password)
        );

echo $client->response_code;

unset($client);

$client = new Services_Contactually(array('apikey' => $apiKey));

echo $client->response_code;
// Either way, the $client object should be fully initialized