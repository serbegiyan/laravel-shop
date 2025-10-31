<?php

namespace App\Services\Contracts;

use App\Models\Smartphone;

interface SmartphoneServiceInterface
{
    public function getFilteredList(array $filters, int $perPage = 10);
    public function getProductDetails(Smartphone $smartphone): array;
    public function getVariants(Smartphone $smartphone);
    public function getFilterOptions(): array;
}
