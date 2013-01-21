<?php

class Services_Contactually_Contacts extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/contacts.json';
    /**
     * @todo TODO: implement pagination and additional filters: bucket_id, page,
     *       limit, unbucketed, full, tag, updated_since
     */
    protected $_data = 'contacts';
    protected $_class = 'Services_Contactually_Contact';
}