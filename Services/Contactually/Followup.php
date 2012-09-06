<?php

class Services_Contactually_Followup extends Services_Contactually_Base
{
    protected $name  = 'followups';
    protected $index = 'https://www.contactually.com/api/v1/followups.json';

    //TODO: is this method actually implemented?
    protected $show  = 'https://www.contactually.com/api/v1/followups/<id>.json';
}