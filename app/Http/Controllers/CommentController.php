<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\Contracts\BasketServiceInterface;

class CommentController extends Controller
{
    public function __construct(
        private CommentServiceInterface $commentService,
        private BasketServiceInterface $basketService
    ) {}

    public function index(Request $request)
    {
        $comments = $this->commentService->getAll();

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('comments.index', compact('comments', 'all_purchases'));
    }

    public function show(Request $request, Comment $comment, User $user)
    {
        $comments = $this->commentService->getByUserId($user->id);

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('userscomment', compact('comments', 'user', 'all_purchases'));
    }
}
