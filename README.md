
Contactually PHP Library
================

This is a PHP helper for the Contactually API - http://developers.contactually.com/


## Ongoing Development

This PHP library is no longer maintained here. You can still download and install it via Composer as described below.

If you want to make requests, changes, or have suggestions, visit this repository on Gitlab:

https://gitlab.com/CaseySoftware/contactually-php


### Installing via Composer

The recommended way to install the Contactually library is through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add the library as a dependency
php composer.phar require caseysoftware/contactually-helper ~1.1
```

or alternatively, you can add it directly to your `composer.json` file.

```json
{
    "require": {
        "caseysoftware/contactually-helper": "~1.1"
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