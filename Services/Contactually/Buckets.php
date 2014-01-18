<?php

class Services_Contactually_Buckets extends Services_Contactually_Groupings
{
    public function __construct(Services_Contactually $client)
    {
        parent::__construct($client);

        trigger_error("The bucket resource has been deprecated, please use groupings instead.", E_USER_NOTICE);
    }
}