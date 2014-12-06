<?php

namespace Contactually;

class Followups extends \Contactually\Common\Resource
{
    protected $resource = 'followups';
    protected $dataname = 'today';

    public function list_($parameters = array())
    {
        $results = $this->client->get($this->resource . '/list.json', $parameters);

        $this->data = $results[$this->dataname];

        return $this;
    }
}