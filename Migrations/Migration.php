<?php
namespace MyWay\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration {
    public $capsule;
    public $schema;

    public function init() {
        $this->capsule = new Capsule;
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'migration_test',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
        $this->schema = $this->capsule->schema();
    }
}