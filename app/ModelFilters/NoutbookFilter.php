<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class NoutbookFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function brend($value)
    {
        return $this->whereIn('brend', $value)->orderBy('id', 'asc');
    }

    public function memory($value)
    {
        return $this->whereIn('memory', $value)->orderBy('id', 'asc');
    }

    public function ram($value)
    {
        return $this->whereIn('ram', $value)->orderBy('id', 'asc');
    }

    public function sorted($value)
    {
        switch ($value){
            case 'without': return $this->orderBy('id', 'asc'); break;
            case 'priceToUp': return $this->orderBy('price', 'asc'); break;
            case 'priceToDown': return $this->orderBy('price', 'desc'); break;
            default: return $this->orderBy('id', 'desc'); break;
        }
    }
}
