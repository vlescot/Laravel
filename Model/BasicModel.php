<?php
declare(strict_types=1);

namespace Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\Dispatcher;
use MyWay\Model\ModelObserver;

/**
 * Class BasicModel
 * @package MyWay\Model
 */
class BasicModel extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::setEventDispatcher( new Dispatcher() );
        static::observe( new ModelObserver() );
    }

    /**
     * @param array $dataToCheck
     * @return array
     */
    public function check(array $dataToCheck): array
    {
        $messages = [];
        foreach ($dataToCheck as $column => $check) {
            $value = $this->$column;
            if (!$check($value))
                $messages[$column] = "La valeur \"$value\" est incorrect";
        }

        return $messages;
    }
}
