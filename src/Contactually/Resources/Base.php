<?php

namespace Contactually\Resources;

abstract class Base implements \Iterator
{
    protected $index = 0;
    protected $data = array();
    public $id = 0;

    public function __construct(\Contactually\Client $client)
    {
        $this->client = $client;
    }

    public function index($parameters = array())
    {
        $results = $this->client->get($this->resource . '.json', $parameters);

        $this->data = $results[$this->dataname];
        $this->count = $results['count'];
        $this->total_count = $results['total_count'];

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
        $properties = array();

        $properties[$this->postname] = $params;
        $results = $this->client->post($this->resource . '.json', $properties);
        $this->id = $this->client->detail['id'];

        return $results;
    }

    public function update($id, $params)
    {
        $properties = array();

        $properties[$this->postname] = $params;
        $results = $this->client->put($this->resource . '/' . $id . '.json', $properties);

        return $results;
    }

    protected function bind($hash)
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
    public function count()
    {
        return count($this->data);
    }
}