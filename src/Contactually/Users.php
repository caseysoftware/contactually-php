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

    public function show($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }

    public function delete($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }

    public function index($parameters = array())
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }

    public function create(array $params)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }

    public function update($id, $params)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }
}