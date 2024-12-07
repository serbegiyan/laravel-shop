<?php

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link (string $name, string $class = 'font-bold'): string|null
    {
        return Route::is($name) ? $class : null;
    }
}


