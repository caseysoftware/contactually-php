<?php

class Services_Contactually_ContactHistories extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/contact_histories.json';
    /**
     * @todo TODO: implement per-contact filter: contact_id
     * @internal This is one of the odd names.. it should be contact_histories
     *    but is email_histories instead
     */
    protected $_data = 'email_histories';
    protected $_class = 'Services_Contactually_ContactHistory';
}