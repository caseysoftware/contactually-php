<?php

class Services_Contactually_User extends Services_Contactually_Resources_Base
{
    protected $_current_uri = 'users/current.json';

    public function show()
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }

    public function current()
    {
        $json = $this->client->get($this->client->getUri() . $this->_current_uri);

        return $this->bind(json_decode($json, true));
    }

    public function delete($id = 0)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}