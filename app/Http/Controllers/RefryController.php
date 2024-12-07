<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasketRequest;
use App\Http\Requests\RefryCommentRequest;
use App\Models\Basket;
use App\Models\Comment;
use App\Models\Refry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefryController extends Controller
{
    public function index(Request $request){

        $refries = Refry::filter($request->all())->paginate(15);
        $product = Refry::find(1);
        $brends = Refry::all()->pluck('brend')->unique();
        $nofrosts = Refry::all()->pluck('no_frost')->unique();
        $total = $refries->total();

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();

        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('refries', compact('refries', 'product', 'brends', 'nofrosts', 'purchase', 'total', 'all_purchases'));
    }

    public function indexComments(Refry $refry, Request $request)

    {
        $product = $refry;

        $comments = Comment::filter($request->all())->
        where('commentable_type', '=', 'refries')->
        where('commentable_id', '=', $product->id)->
        orderBy('created_at', 'desc')->paginate(10);

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('comments', compact('product', 'comments', 'all_purchases'));
    }
    public function show(Refry $refry, Request $request){

        $product = $refry;

        $variants = Refry::all()
            ->where('name', '=', $refry->name)
            ->where('color', '!=', $refry->color);

        $options = [
            'Производитель' => $refry->brend,
            'Управление' => $refry->conrtol,
            'Система охлаждения' => $refry->no_frost,
            'Высота, см' => $refry->height,
            'Ширина, см' => $refry->width,
            'Глубина, см' => $refry->depth,
            'Объем, л' => $refry->volume
        ];

        $comments = Comment::where('commentable_type', '=', 'refries')->
        where('commentable_id', '=', $product->id)->get();
        $total = $comments->count();
        $rating = $comments->avg('rating');

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('card', compact('product', 'variants', 'purchase', 'options', 'total', 'rating', 'all_purchases'));

     }

    public function createcomment(Refry $refry, Request $request)
    {
        $product = $refry;
        $id = Auth::id();

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('createcomment', compact('product', 'id', 'all_purchases'));
    }

    public function storecomment(RefryCommentRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        $last = Comment::all()->last();

        return redirect()->route('refriesComments.index', $last->commentable_id);
    }

}
