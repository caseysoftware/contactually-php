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
}