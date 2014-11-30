<?php

namespace Contactually;

class Accounts
{
    protected $index = 0;
    protected $data = array();

    public function __construct(\Contactually\Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $results = $this->client->get('accounts.json');

        $this->data = $results['accounts'];

        return $this->data;
    }
}