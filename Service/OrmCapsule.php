<?php
declare(strict_types=1);

namespace MyWay\Service;

use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Facade;

class OrmCapsule
{
    public function __construct(Container $container)
    {
        $orm = new Capsule;
        Facade::setFacadeApplication($container);

        $orm->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'migration_test',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $orm->setAsGlobal();
        $orm->bootEloquent();
        $container->singleton('db', Capsule::class);
    }
}