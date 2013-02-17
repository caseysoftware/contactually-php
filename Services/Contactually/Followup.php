<?php

class Services_Contactually_Followup extends Services_Contactually_Base
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

    public function show()
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }

    public function delete($id = 0)
    {
        throw new Services_Contactually_Exception_NotImplemented("This method is not implemented");
    }
}