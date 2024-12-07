<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $number = $request->user_number;

        $products = Basket::where('user_number', '=', $number)->get();
        $purchases = [];
        foreach ($products as $product) {
            global $purchases;
            $purchases[] = $product->product_type.' модель: '.$product->product_name.'; цвет: '.$product->color.'; цена: '.$product->price.'; кол-во: '.$product->quantity.'<br>';
        }
        $details_purchases = implode('', $purchases);
        $all_purchases = $products->count();
        $order_price = $products->sum('total_price');

        return view('order', compact('products', 'all_purchases', 'number', 'order_price', 'details_purchases'));
    }

    public function store(OrderRequest $request, Order $order)
    {
        $data = $request->validated();
        $number = $data['number'];
        $email = $data['user_email'];
        unset($data['number']);

        $products = Basket::where('user_number', '=', $number)->get();
        foreach ($products as $product) {
            $product->delete();
        }
        Order::firstOrCreate($data);
        $order = Order::where('user_email', '=', $email)->latest()->first();

        $purchase = Basket::where('user_number', '=', $number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';


        return view('send_order', compact('order', 'all_purchases'));
    }
}
