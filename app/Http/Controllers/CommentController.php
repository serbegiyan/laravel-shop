<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request, Comment $comment)
    {
        $comments = Comment::all();
        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('comments.index', compact('comments', 'all_purchases'));
    }

    public function show(Request $request, Comment $comment, User $user)
    {
        $comments = Comment::where('user_id', $user->id)->get();
        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('userscomment', compact('comments', 'user', 'all_purchases'));
    }

}
