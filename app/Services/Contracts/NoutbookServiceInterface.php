<?php

namespace App\Services\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\Noutbook;

interface NoutbookServiceInterface
{
    public function getFilteredList(array $filters, int $perPage = 10): LengthAwarePaginator;

    public function getDefaultPreview(): Noutbook;

    public function getFilterOptions(): array;

    public function getVariants(Noutbook $product): Collection;

    public function getProductOptions(Noutbook $product): array;
}
