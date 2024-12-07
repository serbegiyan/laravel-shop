<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CommentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function comments($value)
    {
        switch ($value){
            case 'new': return $this->orderBy('created_at', 'desc'); break;
            case 'old': return $this->orderBy('created_at', 'asc'); break;
            case 'todown': return $this->orderBy('rating', 'asc'); break;
            case 'toup': return $this->orderBy('rating', 'desc'); break;
        }
    }
}
