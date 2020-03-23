<?php
declare(strict_types=1);

namespace MyWay\Service;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;

class Routing
{
    public function __invoke(Request $request, Container $container)
    {
        $container->instance(Request::class, $request);

        $events = new Dispatcher($container);
        $router = new Router($events, $container);

        $container->instance('router', $router);

        require_once __dir__. '/../Service/routes.php';

        return $router;
    }
}