<?php

class Services_Contactually_Note extends Services_Contactually_Base
{
    public $id = '';
    public $body = '';
    public $contact_id = '';
    public $parent_contact_id = '';
    public $timestamp = '';

    protected $_show_uri = 'https://www.contactually.com/api/v1/notes/<id>.json';

    protected $_resource = 'note';
    protected $_create_uri = 'https://www.contactually.com/api/v1/notes.json';
}