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
}