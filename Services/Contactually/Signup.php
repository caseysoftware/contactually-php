<?php

class Services_Contactually_Signup extends Services_Contactually_Resources_Base
{
    public $id = '';
    public $username = '';
    public $remote_id = '';
    public $type = '';
    public $disabled_at = '';

    /**
     * @todo
     * @param array $params
     * @throws Services_Contactually_Exception_NotImplemented
     */
    public function create(array $params)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }

    public function delete($id = 0)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}