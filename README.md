# Lime Light CRM API Client for PHP

A fork of Kevin Em's limelight SDK, this one includes both v1 and v2 API's
as well as the legacy version. 

https://www.limelightcrm.com/

## Installation

To install, use composer:

```
composer require git@bitbucket.org:fish3046/lime-light-crm-php
```

## Documentation

**Legacy**: https://developer-legacy-prod.limelightcrm.com/

**v1**:  https://developer-prod.limelightcrm.com/

**v2**: https://developer-v2.limelightcrm.com/

### Example v1 Usage

```php
$gClient = new Client();

$limelightCRM = new LimeLightCRM([
    'base_url' => 'your_url',
    'username' => 'your_username',
    'password' => 'your_password'
], $gClient);

$limelightCRM->prospects()->newProspect([
    'campaignId' => 1,
    'firstName'  => 'John',
    'lastName' => 'Doe',
    'email' => 'jdoe@gmail.com',
]);
```

## License 

The MIT License (MIT)
Copyright (c) 2016 Kevin Em

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of
the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
IN THE SOFTWARE.
