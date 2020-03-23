<?php

use MyWay\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeWidgets extends Migration
{
    protected $table = 'widgets';

    public function change() {
        if ($this->schema->hasTable($this->table)) {
            $this->schema->table($this->table, function(Blueprint $table){
                $table->renameColumn('content', 'description');
            });
        }
    }
}
