<?php
namespace App\Services;

use App\Models\Refry;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Services\Contracts\RefryServiceInterface;

class RefryService implements RefryServiceInterface
{
    public function getFilteredList(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        return Refry::filter($filters)->paginate($perPage)->withQueryString();
    }

    public function getDefaultPreview(): Refry
    {
        return Refry::find(1) ?? Refry::first();
    }

    public function getFilterOptions(): array
    {
        return [
            'brends' => Refry::all()->pluck('brend')->unique(),
            'volumes' => Refry::all()->pluck('volume')->unique(),
            'colors' => Refry::all()->pluck('color')->unique(),
            'nofrosts' => Refry::all()->pluck('no_frost')->unique()
        ];
    }

    public function getVariants(Refry $product): Collection
    {
        return Refry::all()
            ->where('name', $product->name)
            ->where('color', '!=', $product->color);
    }

    public function getProductOptions(Refry $product): array
    {
        return [
            'Производитель' => $product->brend,
            'Тип' => $product->type,
            'Общий объем, л' => $product->volume,
            'Объем холодильной камеры, л' => $product->coldvolume,
            'Объем морозильной камеры, л' => $product->freezvolume,
            'Количество камер' => $product->cameras,
            'Количество дверей' => $product->doors,
            'Цвет' => $product->color,
            'Уровень шума, дБ' => $product->noise,
            'Климатический класс' => $product->climate,
            'Энергопотребление, кВт·ч/год' => $product->energy
        ];
    }
}
