<?php

class Services_Contactually_Signup extends Services_Contactually_Base
{
    public $id = '';
    public $username = '';
    public $remote_id = '';
    public $type = '';
    public $disabled_at = '';

    protected $_show_uri = 'https://www.contactually.com/api/v1/notes/<id>.json';

    public function delete($id = 0)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}