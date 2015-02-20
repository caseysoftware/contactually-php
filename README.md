
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/caseysoftware/contactually-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/caseysoftware/contactually-php/?branch=master) [![Code Climate](https://codeclimate.com/github/caseysoftware/contactually-php/badges/gpa.svg)](https://codeclimate.com/github/caseysoftware/contactually-php)

Contactually PHP Library
================

This is a PHP helper for the Contactually API - http://developers.contactually.com/

### Installing via Composer

The recommended way to install the Best Buy library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add the library as a dependency
php composer.phar require caseysoftware/contactually-php ~0.9
```

or alternatively, you can add it directly to your `composer.json` file.

```json
{
    "require": {
        "caseysoftware/contactually-php": "~0.9"
    }
}
```

Then install via Composer:

```bash
composer install
```

Finally, require Composer's autoloader in your PHP script:

```php
require __DIR__.'/vendor/autoload.php';
```


## Getting started

You have to have a Contactually account. Then copy the creds-dist.php file to creds.php and fill in your API Key from https://www.contactually.com/settings/api Then you should be able to run any of the scripts in /examples out of the box.

Interacting with the API resources is essentially the same across the board. The pattern is like this:

```php
$client = new \Contactually\Client($apikey);

$contacts = $client->contacts->index();

foreach($contacts as $contact) {
    // show contact information
}
```

## TODO

*  ~~Implement apikey-based authentication~~
*  ~~Start using SSL Certificate validation for better security~~
*  Implement index (GET) for ~~Accounts, Contacts, ContactHistories,~~ Contents, CustomFields, ~~EmailAliases, EmailTemplates, Followups,~~ GroupingSets, ~~Groupings, Notes, Tasks, Users,~~ Webhooks
*  Implement show (GET) for ~~Accounts, Contacts, ContactHistories,~~ Contents, CustomFields, ~~EmailAliases, EmailTemplates, Followups,~~ GroupingSets, ~~Groupings, Notes, Tasks, Users,~~ Webhooks
*  ~~Implement statistics (GET) for Groupings (formerly called Buckets)~~
*  ~~Implement search (GET) for Contacts~~
*  Implement current (GET) for Users
*  Implement destroy (DELETE) for Accounts, Contacts, ContactHistories, Contents, CustomFields, EmailTemplates, Followups, GroupingSets, Groupings, Notes, Tasks, Users, Webhooks
*  Implement create (POST) for Accounts, Contacts, ContactHistories, Contents, CustomFields, EmailTemplates, Followups, GroupingSets, Groupings, Notes, Tasks, Users, Webhooks
*  Update the create implementation to return the Location header of the new resource: Accounts, Contacts, ContactHistories, Contents, CustomFields, EmailTemplates, Followups, GroupingSets, Groupings, Notes, Tasks, Users, Webhooks
*  Implement complete (POST) for Tasks
*  Implement bucket (POST) for Contacts
*  Implement ignore (POST) for Contacts, Tasks
*  Implement snooze (POST) for Contacts, Tasks
*  Implement update (PUT) for Accounts, Buckets, Contacts, Groupings (formerly called Buckets), Tasks
*  Implement pagination for ContactHistories->index(), Contacts->index(), Tasks->index(), Contacts->search(), Notes->search(), Tasks->search()
*  Implement error handling for all of the above
*  Finish mapping out the relationships between resources (noted below so far)

## Resource/subresource relations

*  Accounts MAY have ContactHistories as child resources.
*  ContactGroupings MAY have Contacts as child resources.
*  ContactHistories MUST have an Account as a parent resource.
*  ContactHistories MUST have a Contact as a parent resource.
*  Contacts MAY have a Bucket as a parent resource.
*  Content SHOULD NOT have any related resources.
*  EmailAliases SHOULD NOT have any related resources.
*  EmailTemplates SHOULD NOT have any related resources.

## Oddities

These oddities are related to the API:

 *  When you authenticate, you get back a 201 response code instead of 200 as you'd expect
 *  When you ignore a contact, you get back a 404 response code no matter what.. whether if it was successfully created or the contact didn't exist
 *  There doesn't seem to be a way to remove the results of a Contact->ignore()
 *  ~~After you create a resource, you don't get a reference back to it in the response body or the Location header as you'd expect. In order to find the resource, you must search for it~~ - I was wrong, a Location header is provide as you'd expect.
 *  Responses on resource creation are not consistent
  *  After successfully creating a Bucket or a Note, you get back a 201 with a Location header to your new bucket or note
  *  After successfully creating a Contact, you get back a 200 with the fully formed resource as if you had done a show (GET). For this helper library, I've hijacked the response to generate the 201-style message to make it the same as the other resources.
 *  The pagination of the Contact search results never returns more than ten results from the API regardless of the specified limit
 
These oddities are related to my implementation of the helper library:

 *  Deprecated: ~~When you authenticate, a cookies.txt "cookie jar" file is written. If you don't clear the file, you may still be authenticated regardless of the credentials used. Using the API Key authentication avoids this and is probably better in general as the requests become Stateless.~~
 
### MIT License

Copyright (C) 2014, Keith Casey <contrib at caseysoftware dot com>

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
