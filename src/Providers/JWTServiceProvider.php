<?php

namespace Groovey\JWT\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Silex\Api\BootableProviderInterface;
use Groovey\JWT\JWT;

class JWTServiceProvider implements ServiceProviderInterface, BootableProviderInterface
{
    public function register(Container $app)
    {
        $app['jwt'] = function ($app) {

            $config = [
                'issuer'   => $app['jwt.issuer'],
                'audience' => $app['jwt.audience'],
                'key'      => $app['jwt.key'],
            ];

            if (isset($app['jwt.expiration'])) {
                $config['expiration'] = $app['jwt.expiration'];
            } else {
                $config['expiration'] = time() + 86400;
            }

            // TODO iss & aud

            return new JWT($app, $config);
        };
    }

    public function boot(Application $app)
    {
    }
}
