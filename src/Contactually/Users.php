<?php

namespace Contactually;

class Users extends \Contactually\Resources\Base
{
    protected $_current_uri = 'users/current.json';

    public function current()
    {
        $results = $this->client->get($this->resource . $this->_current_uri);
        $this->bind($results);

        return $this;
    }
}