<?php

namespace Cors;

use Cake\Core\BasePlugin;
use Cake\Http\MiddlewareQueue;
use Cake\Console\CommandCollection;
use Cake\Core\PluginApplicationInterface;
use Cors\Routing\Middleware\CorsMiddleware;

class CorsPlugin extends BasePlugin
{

    public function middleware(MiddlewareQueue $middleware): MiddlewareQueue
    {
        // Add middleware here.
        $middleware = parent::middleware($middleware)
            ->insertBefore(
                'Cake\Routing\Middleware\RoutingMiddleware',
                new CorsMiddleware($this)
            );

        return $middleware;
    }

    public function console(CommandCollection $commands): CommandCollection
    {
        // Add console commands here.
        $commands = parent::console($commands);

        return $commands;
    }

    public function bootstrap(PluginApplicationInterface $app): void
    {
        // Add constants, load configuration defaults.
        // By default will load `config/bootstrap.php` in the plugin.
        parent::bootstrap($app);
    }

    public function routes($routes): void
    {
        // Add routes.
        // By default will load `config/routes.php` in the plugin.
        parent::routes($routes);
    }
}
