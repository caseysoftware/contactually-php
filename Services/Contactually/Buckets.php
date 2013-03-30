<?php

class Services_Contactually_Buckets extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/buckets.json';
    /**
     * @internal This is one of the odd names.. it should be buckets but is user_buckets instead
     */
    protected $_data = 'user_buckets';
    protected $_class = 'Services_Contactually_Bucket';

    public function getTotalRecords()
    {
        return $this->_total;
    }

    public function getPageCount()
    {
        return 1;
    }

    public function getNextPage()
    {
        return $this->index(1);
    }

    public function getPreviousPage()
    {
        return $this->index(1);
    }
    public function hasMorePages()
    {
        return false;
    }
}