<?php

namespace Contactually;

class Accounts extends \Contactually\Resources\Base
{
    protected $resource = 'accounts';
    protected $dataname = 'accounts';

    public function create(array $params)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }

    public function update($id, $params)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }
}