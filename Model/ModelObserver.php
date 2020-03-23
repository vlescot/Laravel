<?php
declare(strict_types=1);

namespace MyWay\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelObserver
 * @package MyWay\Model
 */
class ModelObserver
{
    // TODO CRUDBy ?

    /**
     * @param Model $model
     */
    public function creating(Model $model)
    {
        $attributeCdate = $model::SUFFIX. "_Cdate";
        $model->$attributeCdate = date('Y-m-d H:i:s');
    }

    /**
     * @param Model $model
     */
    public function updating(Model $model)
    {
        $attributeUdate = $model::SUFFIX. "_Udate";
        $model->$attributeUdate = date('Y-m-d H:i:s');
    }

    /**
     * @param Model $model
     */
    public function deleting(Model $model)
    {
        $attributeDdate = $model::SUFFIX. "_Ddate";
        $model->$attributeDdate = date('Y-m-d H:i:s');
    }
}
