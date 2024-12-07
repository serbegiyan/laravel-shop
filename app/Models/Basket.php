<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use Filterable;

    protected $guarded = false;
}
