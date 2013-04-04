<?php

class Services_Contactually_Followups extends Services_Contactually_Resources_List
    implements Services_Contactually_Interfaces_Index
{
    protected $_index_uri = 'https://www.contactually.com/api/v1/followups.json';
    /**
     * @internal This is one of the odd names.. it should be followups but is
     *    today instead
     */
    protected $_data = 'today';
    protected $_class = 'Services_Contactually_Followup';

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