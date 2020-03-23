<?php
declare(strict_types=1);

namespace MyWay\Model;

use Illuminate\Database\Eloquent\Model;

class EPL_CONTRAT extends Model
{
    CONST SUFFIX = 'EPC';
    protected $table = 'EPL_CONTRAT';
    protected $primarykey = 'EPC_id';
}