<?php

use MyWay\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWidgets extends Migration
{
    protected $table = 'widgets';

    public function up() {
        if (!$this->schema->hasTable($this->table)) {
            $this->schema->create($this->table, function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->integer('content');
            });
        }
    }

    public function down() {
        $this->schema->dropIfExists($this->table);
    }
}
