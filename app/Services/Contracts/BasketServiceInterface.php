<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface BasketServiceInterface
{
    public function getByUserNumber(string $userNumber): Collection;
    public function getTotalCount(Collection $products): int;
    public function getTotalPrice(Collection $products): int;
    public function addToBasket(array $data): void;
    public function removeFromBasket(string $userNumber, string $productName): void;
    public function updateProduct(string $userNumber, string $productName, int $quantity, int $totalPrice): void;
}

