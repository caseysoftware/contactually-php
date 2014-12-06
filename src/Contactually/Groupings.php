<?php

namespace Contactually;

class Groupings extends \Contactually\Common\Resource
{
    protected $resource = 'groupings';
    protected $dataname = 'groupings';

    public function statistics($id)
    {
        $results = $this->client->get($this->resource . '/' . $id . '/statistics.json');

        return json_decode(json_encode($results));
    }

    public function minimal_index()
    {
        $results = $this->client->get($this->resource . '/minimal_index.json');

        $this->data = $results[$this->dataname];

        return $this;
    }
}