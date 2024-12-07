<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index(Request $request)
    {
        $number = $request->user_number;
        $products = Basket::where('user_number', '=', $number)->get();
        $total = $products->count();
        $all_purchases = $total != 0 ? $total : '';
        $count = $products->sum('total_price');
        return view('basket', compact('products', 'count', 'total', 'all_purchases'));
    }

    public function store(BasketRequest $request)
    {
        $data = $request->validated();
        $request->session()->put('user_number', $request->user_number);
        $type = $request->product_type;

        Basket::firstOrCreate($data);

        return redirect()->route($type.'.index');
    }

    public function delete(Request $request)
    {
        $number = $request->user_number;
        $name = $request->name;
        $product = Basket::where('user_number', '=', $number)->
            where('product_name', '=', $name)->first();
        $product->delete();

       return back();
    }

    public function edit(Request $request)
    {
        $number = $request->user_number;
        $quantity = $request->quantity;
        $name = $request->name;
        $total_price = $request->total_price;

        $product = Basket::where('user_number', '=', $number)->
        where('product_name', '=', $name)->first();
        $product->update([
            'quantity' => $quantity,
            'total_price' => $total_price
        ]);

        return back();
    }
}
