<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Noutbook;
use App\Models\Refry;
use App\Models\Smartphone;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show(Request $request){

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        $noutbook = Noutbook::first();
        $refry = Refry::first();
        $smartphone = Smartphone::first();
        return view('main', compact('noutbook', 'refry', 'smartphone', 'all_purchases'));
    }


}


