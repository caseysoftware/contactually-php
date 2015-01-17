<?php

namespace Contactually\Resources;

abstract class Base implements \Iterator
{
    protected $index = 0;
    protected $data = array();

    public function __construct(\Contactually\Client $client)
    {
        $this->client = $client;
    }

    public function index($parameters = array())
    {
        $results = $this->client->get($this->resource . '.json', $parameters);

        $this->data = $results[$this->dataname];

        return $this;
    }

    public function load($id)
    {
        $results = $this->client->get($this->resource . '/' . $id . '.json');
        $this->bind($results);

        return $this;
    }

    public function bind($hash)
    {
        foreach ($hash as $key => $value) {
            $this->$key = $value;
        }
    }

    public function delete($id)
    {
        return $this->client->delete($this->resource . '/' . $id . '.json');
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