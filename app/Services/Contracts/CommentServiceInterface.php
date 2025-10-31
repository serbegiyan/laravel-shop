<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CommentServiceInterface
{
    public function getAll(): Collection;
    public function getByUserId(int $userId): Collection;
    public function getForProduct(Model $product): Collection;
    public function getPaginatedForProduct(Model $product, array $filters): LengthAwarePaginator;
    public function getAverageRating(Model $product): float|null;
    public function getTotalComments(Model $product): int;
    public function create(array $data): Model;
}

