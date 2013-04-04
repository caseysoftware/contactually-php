<?php

class Services_Contactually_Tasks extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/tasks.json';
    /**
     * @todo TODO: implement per-contact filter: contact_id
     */
    protected $_data = 'tasks';
    protected $_class = 'Services_Contactually_Task';
}