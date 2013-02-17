<?php

class Services_Contactually_Task extends Services_Contactually_Base
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

    protected $_show_uri  = 'https://www.contactually.com/api/v1/tasks/<id>.json';

    protected $_delete_uri = 'https://www.contactually.com/api/v1/tasks/<id>.json';

    public function delete($id = 0)
    {
        $this->delete = str_replace('<id>', $id, $this->_delete_uri);
        $json = $this->client->delete("{$this->delete}", array('id' => $id));

        return (200 == $this->client->status) ? true : false;
    }

    public function create(array $params)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}