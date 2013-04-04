<?php

class Services_Contactually_Task extends Services_Contactually_Resources_Base
{
    public $id = '';
    public $title = '';
    public $due_date = '';
    public $completed_at = '';
    public $deleted_at = '';
    public $is_follow_up = '';
    public $last_contacted = '';
    public $parent_contact_id = '';
    public $ignored = '';
    public $completed_via = '';

    protected $_show_uri     = 'tasks/<id>.json';
    protected $_delete_uri   = 'tasks/<id>.json';
    protected $_complete_uri = 'tasks/<id>/complete.json';

    public function create(array $params)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }

    public function complete($id = 0)
    {
        $this->complete = str_replace('<id>', $id, $this->_complete_uri);
        $json = $this->client->post($this->client->getUri() . $this->complete, array('id' => $id));

        return (200 == $this->client->status) ? true : false;
    }
}