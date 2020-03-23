<?php

use MyWay\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeWidgetsColDescription extends Migration
{
    protected $table = 'widgets';

    public function up() {
        if ($this->schema->hasTable($this->table)) {
            $this->schema->table($this->table, function(Blueprint $table){
                $table->renameColumn('description', 'content');
            });
            $this->schema->table($this->table, function(Blueprint $table){
                $table->string('content', 254)->change();
            });
        }
    }

    public function down() {
        $this->schema->dropIfExists($this->table);
    }
}
