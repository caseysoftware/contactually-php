<?php

namespace Contactually;

class EmailTemplates extends \Contactually\Resources\Base
{
    protected $resource = 'email_templates';
    protected $dataname = 'email_templates';

    public function show($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented('This method cannot be applied to this object.');
    }

    public function delete($id)
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