<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Collection;
use App\Services\Contracts\OrderServiceInterface;

class OrderService implements OrderServiceInterface
{
    public function prepareOrderDetails(Collection $products): array
    {
        $purchases = $products->map(function ($product) {
            return "{$product->product_type} модель: {$product->product_name}; цвет: {$product->color}; цена: {$product->price}; кол-во: {$product->quantity}<br>";
        })->toArray();

        return [
            'details_purchases' => implode('', $purchases),
            'order_price' => $products->sum('total_price'),
            'all_purchases' => $products->count()
        ];
    }

    public function createOrder(array $data): Order
    {
        return Order::firstOrCreate($data);
    }

    public function getLatestOrderByEmail(string $email): Order|null
    {
        return Order::where('user_email', $email)->latest()->first();
    }
}
