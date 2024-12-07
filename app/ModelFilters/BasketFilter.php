<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class BasketFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function user_number($value)
    {
        return $this->whereIn('user_number', $value)->orderBy('created_at', 'asc');
    }
}
