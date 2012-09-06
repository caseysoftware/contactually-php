<?php

class Services_Contactually_Account extends Services_Contactually_Base
{
    protected $name  = 'accounts';
    protected $index = 'https://www.contactually.com/api/v1/accounts.json';
    protected $show  = 'https://www.contactually.com/api/v1/accounts/<id>.json';
}