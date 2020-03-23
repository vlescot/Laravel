<?php

define('ROOT', __dir__);

require_once 'vendor/autoload.php';

$container = new \Illuminate\Container\Container();

new \MyWay\Service\OrmCapsule($container);

$routing = new \MyWay\Service\Routing();
$request = \Illuminate\Http\Request::capture();
$router = $routing($request, $container);

$redirect = new \Illuminate\Routing\Redirector(
    new \Illuminate\Routing\UrlGenerator($router->getRoutes(), $request)
);


$response = $router->dispatch($request);

$redirect->to('users.index');

$response->send();
