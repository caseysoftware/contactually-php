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

    public function create(array $params)
    {
//        $properties = array();
//
//        foreach($params as $key => $value) {
//            $properties[$this->resource . "[$key]"] = $value;
//        }
//
//        $results = $this->client->post($this->resource . '.json', $properties);
//
//        print_r($this->client); die();
    }

    public function update($id, $params)
    {
//        $results = $this->client->put($id, $params);
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
        $this->bind($this->data[$this->index]);

        return $this;
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