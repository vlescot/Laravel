<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Facade;

require __DIR__.'/../vendor/autoload.php';

$container = new Container();
Facade::setFacadeApplication($container);

$orm = new Capsule();
$orm->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'myway',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$orm->setEventDispatcher(new Dispatcher($container));
$orm->setAsGlobal();
$orm->bootEloquent();

$container->singleton('db', Capsule::class);


$arguments = explode(':', $argv[1]);
$class = "MyWay\\Migrations\\". $arguments[0];
$instance = new $class();
$function = $arguments[1];
$instance->$function();

