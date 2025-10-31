<?php
namespace App\Services;

use App\Models\Comment;
use App\Models\Smartphone;
use App\Services\Contracts\SmartphoneServiceInterface;

class SmartphoneService implements SmartphoneServiceInterface
{
    public function getFilteredList(array $filters, int $perPage = 10)
    {
        return Smartphone::filter($filters)->paginate($perPage)->withQueryString();
    }

    public function getProductDetails(Smartphone $smartphone): array
    {
        $product = $smartphone;

        $comments = Comment::where('commentable_type', '=', 'smartphones')->
        where('commentable_id', '=', $product->id)->get();
        $rating = $comments->avg('rating');
        $total = $comments->count();

        $options = [
            'Производитель' => $smartphone->brend,
            'Процессор' => $smartphone->processor,
            'Тактовая частота, МГц' => $smartphone->speed,
            'Диагональ экрана, ″' => $smartphone->screen,
            'Технология экрана' => $smartphone->tehnology,
            'Разрешение экрана, px' => $smartphone->resolution,
            'Объем оперативной памяти, ГБ' => $smartphone->ram,
            'Встроенная память, ГБ' => $smartphone->memory,
            'Количество точек матрицы, Мп' => $smartphone->camera,
            'Материал корпуса' => $smartphone->corpus
        ];

        return compact('comments', 'rating', 'total', 'options');
    }

    public function getVariants(Smartphone $smartphone)
    {
        return Smartphone::where('name', $smartphone->name)
            ->where('color', '!=', $smartphone->color)
            ->get();
    }

    public function getFilterOptions(): array
    {
        return [
            'brends' => Smartphone::pluck('brend')->unique(),
            'rams' => Smartphone::pluck('ram')->unique(),
            'memories' => Smartphone::pluck('memory')->unique()
        ];
    }
}
