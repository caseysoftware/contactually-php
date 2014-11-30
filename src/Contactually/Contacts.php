<?php

namespace Contactually;

class Contacts implements \Iterator
{
    protected $index = 0;
    protected $data = array();

    public function __construct(\Contactually\Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $results = $this->client->get('contacts.json');

        $this->data = $results['contacts'];

        return $this;
    }

    public function rewind()
    {
        $this->index = 0;
    }
    public function current()
    {
        return json_decode(json_encode($this->data[$this->index]));
    }
    public function key()
    {
        return $this->index;
    }
    public function next()
    {
        $this->index++;
    }
    public function valid()
    {
        return isset($this->data[$this->index]);
    }
}