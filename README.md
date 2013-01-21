Contactually PHP Library
================

This is a PHP helper for the Contactually API - http://developers.contactually.com/

It is modeled after the Twilio PHP Helper library because I think it's generally well done and thought through. This isn't official but should generally work except for the incomplete items in the TODO list below.

This is v0.01 so it is super rudiment and subject to change at any time.. like now. Or maybe now.

## Getting started

You have to have a Contactually account. Then copy the creds-dist.php file to creds.php and fill in the credentials you plan to use. Then you should be able to run any of the scripts in /examples out of the box.

There are two different strategies you can use to authenticate:

# You can use your existing email address and password and initialize the object like so:

```php
$client = new Services_Contactually(array('email' => $email, 'password' => $password));
```

#  Alternatively, you can use the API key found here - https://www.contactually.com/settings/integrations - and initialize the object like so:

```php
$client = new Services_Contactually(array('apikey' => $apikey));
```

While the functional difference between these approaches is negligible, the key-based approach is generally considered better.


## TODO

*  ~~Implement apikey-based authentication~~
*  ~~Implement index (GET) for Accounts, Buckets, Contacts, ContactHistories, Followups, Notes, and Tasks~~
*  Implement discover (GET) for Accounts, Buckets, Contacts, Notes, Signup, Tasks, and Users
*  ~~Implement show (GET) for Accounts, Buckets, Contacts, ContactHistories, Notes, Tasks, and Users~~
*  ~~Implement list (GET) for Buckets~~
*  ~~Implement search (GET) for Contacts~~
*  ~~Implement current (GET) for Users~~
*  Implement destroy (DELETE) for Accounts, Buckets, ContactHistories, Contacts, Notes, Tasks
*  Implement create (POST) for Accounts, ~~Buckets~~, ContactHistories, Followups, Notes, Signup, Tasks
*  Implement complete (POST) for Tasks
*  Implement bucket (POST) for Contacts
*  Implement ignore (POST) for Contacts, Tasks
*  Implement snooze (POST) for Contacts, Tasks
*  Implement update (PUT) for Accounts, Buckets, Contacts, Tasks
*  Implement pagination for ContactHistories->index(), Contacts->index(), Contacts->search(), Notes->search(), Tasks->search()
*  Implement error handling for all of the above

## Oddities

These oddities are related to the API:

#  When you authenticate, you get back a 201 response code instead of 200 as you might expect

These oddities are related to my implementation of the helper library:

#  When you authenticate, a cookies.txt file is written. If you don't clear the file, you may still be authenticated regardless of the credentials used

### MIT License

Copyright (C) 2013, Keith Casey <contrib at caseysoftware dot com>

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