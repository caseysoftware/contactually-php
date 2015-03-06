<?php

namespace Contactually;

use Contactually\Exceptions\MethodNotImplemented;

class EmailAliases extends \Contactually\Resources\Base
{
    protected $resource = 'email_aliases';
    protected $dataname = 'email_aliases';

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