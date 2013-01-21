<?php

class Services_Contactually_Notes extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/notes.json';
    /**
     * @todo TODO: implement pagination and additional filter: contact_id, page, limit
     */
    protected $_data = 'notes';
    protected $_class = 'Services_Contactually_Note';
}