<?php

class Services_Contactually_Notes extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_data = 'notes';
    protected $_class = 'Services_Contactually_Note';

    /**
     * @todo TODO: implement per-contact filter: contact_id
     */
    protected $_index_uri = 'notes.json';
}