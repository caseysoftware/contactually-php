<?php

namespace Contactually;

use Contactually\Exceptions\MethodNotImplemented;

class EmailAliases extends \Contactually\Common\Resource
{
    protected $resource = 'email_aliases';
    protected $dataname = 'email_aliases';

    public function show($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented;
    }

    public function delete($id)
    {
        throw new \Contactually\Exceptions\MethodNotImplemented;
    }
}