<?php
namespace App\Services;

use App\Models\Noutbook;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Services\Contracts\NoutbookServiceInterface;

class NoutbookService implements NoutbookServiceInterface
{
    public function getFilteredList(array $filters, int $perPage = 10): LengthAwarePaginator
    {
        return Noutbook::filter($filters)->paginate($perPage)->withQueryString();
    }

    public function getDefaultPreview(): Noutbook
    {
        return Noutbook::find(1) ?? Noutbook::first();
    }

    public function getFilterOptions(): array
    {
        return [
            'brends' => Noutbook::all()->pluck('brend')->unique(),
            'rams' => Noutbook::all()->pluck('ram')->unique(),
            'memories' => Noutbook::all()->pluck('memory')->unique()
        ];
    }

    public function getVariants(Noutbook $product): Collection
    {
        return Noutbook::all()
            ->where('name', $product->name)
            ->where('color', '!=', $product->color);
    }

    public function getProductOptions(Noutbook $product): array
    {
        return [
            'Производитель' => $product->brend,
            'Процессор' => $product->processor,
            'Максимальная частота, МГц' => $product->speed,
            'Видеокарта' => $product->videocard,
            'Операционная система' => $product->os,
            'Диагональ экрана, ″' => $product->screen,
            'Тип экрана' => $product->screentype,
            'Разрешение экрана, px' => $product->resolution,
            'Объем оперативной памяти, ГБ' => $product->ram,
            'Тип оперативной памяти' => $product->ramtype,
            'Емкость накопителя, ГБ' => $product->memory,
            'Тип накопителя' => $product->memotype,
            'Емкость аккумулятора, Вт·ч' => $product->battery
        ];
    }
}
