<?php

class Services_Contactually_Note extends Services_Contactually_Base
{
    protected $name     = 'note';
    protected $resource = 'notes';

    protected $index = 'https://www.contactually.com/api/v1/notes.json';
    protected $show  = 'https://www.contactually.com/api/v1/notes/<id>.json';
}