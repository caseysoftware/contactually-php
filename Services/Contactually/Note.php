<?php

class Services_Contactually_Note extends Services_Contactually_Resources_Base
{
    public $id = '';
    public $body = '';
    public $contact_id = '';
    public $parent_contact_id = '';
    public $timestamp = '';

    protected $_resource = 'note';

    protected $_show_uri   = 'notes/<id>.json';
    protected $_create_uri = 'notes.json';
    protected $_delete_uri = 'notes/<id>.json';

}