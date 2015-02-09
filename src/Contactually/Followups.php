<?php

namespace Contactually;

class Followups extends \Contactually\Resources\Base
{
    protected $resource = 'followups';
    protected $dataname = 'today';
    protected $postname = 'followup';

    public function list_($parameters = array())
    {
        $results = $this->client->get($this->resource . '/list.json', $parameters);

        $this->data = $results[$this->dataname];

        return $this;
    }
}