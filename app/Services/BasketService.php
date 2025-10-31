<?php
namespace App\Services;

use App\Models\Basket;
use Illuminate\Support\Collection;
use App\Services\Contracts\BasketServiceInterface;

class BasketService implements BasketServiceInterface
{
    public function getByUserNumber(string $userNumber): Collection
    {
        return Basket::where('user_number', $userNumber)->get();
    }

    public function getTotalCount(Collection $products): int
    {
        return $products->count();
    }

    public function getTotalPrice(Collection $products): int
    {
        return $products->sum('total_price');
    }

    public function addToBasket(array $data): void
    {
        Basket::firstOrCreate($data);
    }

    public function removeFromBasket(string $userNumber, string $productName): void
    {
        $product = Basket::where('user_number', $userNumber)
            ->where('product_name', $productName)
            ->first();

        if ($product) {
            $product->delete();
        }
    }

    public function updateProduct(string $userNumber, string $productName, int $quantity, int $totalPrice): void
    {
        $product = Basket::where('user_number', $userNumber)
            ->where('product_name', $productName)
            ->first();

        if ($product) {
            $product->update([
                'quantity' => $quantity,
                'total_price' => $totalPrice
            ]);
        }
    }
}
