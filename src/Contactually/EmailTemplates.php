<?php

namespace Contactually;

class EmailTemplates extends \Contactually\Resources\Base
{
    protected $resource = 'email_templates';
    protected $dataname = 'email_templates';

    public function show($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented;
    }

    public function delete($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented;
    }
}