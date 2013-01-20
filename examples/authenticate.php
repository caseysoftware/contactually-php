<?php

include_once '../creds.php';
include_once '../Services/Contactually.php';

$client = new Services_Contactually(
            array('email' => $email, 'password' => $password)
        );

// The $client object should be fully initialized 