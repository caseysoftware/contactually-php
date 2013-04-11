<?php

class Services_Contactually_Followup extends Services_Contactually_Resources_Base
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
    public $reason = '';

    /**
     * @todo
     * @param array $params
     * @throws Services_Contactually_Exception_NotImplemented
     */
    public function create(array $params)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}