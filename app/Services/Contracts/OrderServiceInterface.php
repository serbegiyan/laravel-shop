<?php
namespace App\Services\Contracts;

use Illuminate\Support\Collection;
use App\Models\Order;

interface OrderServiceInterface
{
    public function prepareOrderDetails(Collection $products): array;
    public function createOrder(array $data): Order;
    public function getLatestOrderByEmail(string $email): Order|null;
}
