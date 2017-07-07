# JWT

Groovey Json Web Token

## Installation

    $ composer require groovey/jwt

## Usage

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Silex\Application;
use Groovey\JWT\Providers\JWTServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new JWTServiceProvider());

$token = $app['jwt']->encode();
```