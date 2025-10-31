<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;

class BaseController extends Controller
{
    protected function getUserNumber(Request $request): string
    {
        $user_number = $request->query('user_number');
        if (!is_string($user_number)) {
            abort(400, 'user_number is required');
        }
        return $user_number;
    }
}
