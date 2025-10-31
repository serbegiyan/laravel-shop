<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Services\Contracts\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{
    public function getAll(): Collection
    {
        return Comment::all();
    }

    public function getByUserId(int $userId): Collection
    {
        return Comment::where('user_id', $userId)->get();
    }

    public function getForProduct(Model $product): Collection
    {
        return Comment::where('commentable_type', $product->getTable())
            ->where('commentable_id', $product->id)
            ->get();
    }

    public function getPaginatedForProduct(Model $product, array $filters): LengthAwarePaginator
    {
        return Comment::filter($filters)
            ->where('commentable_type', $product->getTable())
            ->where('commentable_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getAverageRating(Model $product): float|null
    {
        return Comment::where('commentable_type', $product->getTable())
            ->where('commentable_id', $product->id)
            ->avg('rating');
    }

    public function getTotalComments(Model $product): int
    {
        return Comment::where('commentable_type', $product->getTable())
            ->where('commentable_id', $product->id)
            ->count();
    }

    public function create(array $data): Comment
    {
        return Comment::create($data);
    }
}

