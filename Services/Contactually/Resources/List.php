<?php

abstract class Services_Contactually_Resources_List
{
    protected $client = null;

    public function __construct(Services_Contactually $client)
    {
        $this->client = $client;
    }
}