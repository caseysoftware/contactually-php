<?php

class Services_Contactually_Contact extends Services_Contactually_Base
{
    protected $name  = 'contacts';
    protected $index = 'https://www.contactually.com/api/v1/contacts.json';
    protected $show = 'https://www.contactually.com/api/v1/contacts/<id>.json';
}