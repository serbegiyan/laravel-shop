<?php

namespace App\Services\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Models\Refry;

interface RefryServiceInterface
{
    public function getFilteredList(array $filters, int $perPage = 10): LengthAwarePaginator;

    public function getDefaultPreview(): Refry;

    public function getFilterOptions(): array;

    public function getVariants(Refry $product): Collection;

    public function getProductOptions(Refry $product): array;
}

