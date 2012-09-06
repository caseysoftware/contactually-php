<?php

class Services_Contactually_ContactHistory extends Services_Contactually_Base
{
    protected $name  = 'contact_histories';
    protected $index = 'https://www.contactually.com/api/v1/contact_histories.json';
    protected $show  = 'https://www.contactually.com/api/v1/contact_histories/<id>.json';
}