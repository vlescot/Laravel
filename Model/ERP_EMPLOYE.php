<?php
declare(strict_types=1);

namespace MyWay\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class erp_employe
 * @package Illuminate\Database\Eloquent
 */
class ERP_EMPLOYE extends Model
{
    CONST SUFFIX = 'EPL';
    protected $table = 'erp_employe';
    protected $primaryKey = 'EPL_id';

    public function contrat()
    {
        return $this->hasone(EPL_CONTRAT::class, 'EPC_id');
    }

    /**
     * @param array $optionalDataToCheck
     * @return array
     */
    public function validate(array $optionalDataToCheck = []): array
    {
        $dataToCheck = array_merge($optionalDataToCheck, [
            'EPL_inactif' => function($val) { return isset($val) && !is_null($val) && is_bool($val); },
        ]);

        return $this->check($dataToCheck);
    }
}
