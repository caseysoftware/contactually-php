<?php

include_once 'creds.php';
include_once 'Services/Contactually.php';

echo '<pre>';
$service = new Services_Contactually(
            array('email' => $email, 'password' => $password)
        );

$results = $service->contacts();
print_r($results);