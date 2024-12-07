<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmartphoneCommentRequest;
use App\Models\Basket;
use App\Models\Comment;
use App\Models\Smartphone;
use Illuminate\Http\Request;
use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;


class SmartphoneController extends Controller
{
    public function index(Request $request)
    {
        $smartphones = Smartphone::filter($request->all())->paginate(10)->withQueryString();
        $total = $smartphones->total();
        $product = Smartphone::find(1);
        $brends = Smartphone::all()->pluck('brend')->unique();
        $rams = Smartphone::all()->pluck('ram')->unique();
        $memories = Smartphone::all()->pluck('memory')->unique();

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();

        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('smartphones', compact('smartphones', 'product', 'brends', 'purchase', 'rams', 'memories', 'total', 'all_purchases'));
    }

    public function indexComments(Smartphone $smartphone, Request $request)
    {
        $product = $smartphone;
        $comments = Comment::filter($request->all())->
        where('commentable_type', '=', 'smartphones')->
        where('commentable_id', '=', $product->id)->
        orderBy('created_at', 'desc')->paginate(10);

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('comments', compact('product', 'comments', 'all_purchases'));
    }

    public function show(Smartphone $smartphone, Request $request)
    {
        $product = $smartphone;

        $variants = Smartphone::all()
            ->where('name', '=', $smartphone->name)
            ->where('color', '!=', $smartphone->color);

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

        $comments = Comment::where('commentable_type', '=', 'smartphones')->
        where('commentable_id', '=', $product->id)->get();
        $total = $comments->count();
        $rating = $comments->avg('rating');

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('card', compact('product', 'variants', 'purchase', 'options', 'total', 'rating', 'all_purchases'));
    }

    public function createcomment(Smartphone $smartphone, Request $request)
    {
        $product = $smartphone;
        $id = Auth::id();
        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('createcomment', compact('product', 'id', 'all_purchases'));
    }

    public function storecomment(SmartphoneCommentRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        $last = Comment::all()->last();

        return redirect()->route('smartphonesComments.index', $last->commentable_id);
    }
}
