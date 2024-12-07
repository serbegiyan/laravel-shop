<?php

namespace App\Http\Controllers;

use App\Http\Requests\Noutbook\NoutbookCommentRequest;
use App\Http\Requests\Noutbook\StoreRequest;
use App\Models\Basket;
use App\Models\Comment;
use App\Models\Noutbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoutbookController extends BaseController
{
    public function index(Request $request)
    {
        $noutbooks = Noutbook::filter($request->all())->paginate(10)->withQueryString();
        $product = Noutbook::find(1);
        $brends = Noutbook::all()->pluck('brend')->unique();
        $rams = Noutbook::all()->pluck('ram')->unique();
        $memories = Noutbook::all()->pluck('memory')->unique();
        $total = $noutbooks->total();

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();

        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('noutbooks.index', compact('noutbooks', 'product', 'brends', 'rams', 'memories', 'total', 'purchase', 'all_purchases'));
    }


    public function indexComments(Noutbook $noutbook, Request $request)
    {
        $product = $noutbook;

        $comments = Comment::filter($request->all())->
        where('commentable_type', '=', 'noutbooks')->
        where('commentable_id', '=', $product->id)->
        orderBy('created_at', 'desc')->paginate(10);

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('comments', compact('product', 'comments', 'all_purchases'));
    }

    public function create(Request $request)
    {
        $noutbooks = Noutbook::all();

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';
        return view('noutbooks.create', compact('noutbooks', 'all_purchases'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Noutbook::create($data);

        return redirect()->route('noutbooks.index');
    }
    public function show(Noutbook $noutbook, Request $request){

        $product = $noutbook;
        $options = [
            'Производитель' => $noutbook->brend,
            'Процессор' => $noutbook->processor,
            'Максимальная частота, МГц' => $noutbook->speed,
            'Видеокарта' => $noutbook->videocard,
            'Операционная система' => $noutbook->os,
            'Диагональ экрана, ″' => $noutbook->screen,
            'Тип экрана' => $noutbook->screentype,
            'Разрешение экрана, px' => $noutbook->resolution,
            'Объем оперативной памяти, ГБ' => $noutbook->ram,
            'Тип оперативной памяти' => $noutbook->ramtype,
            'Емкость накопителя, ГБ' => $noutbook->memory,
            'Тип накопителя' => $noutbook->memotype,
            'Емкость аккумулятора, Вт·ч' => $noutbook->battery
        ];
        $variants = Noutbook::all()
            ->where('name', '=', $noutbook->name)
            ->where('color', '!=', $noutbook->color);

        $comments = Comment::where('commentable_type', '=', 'noutbooks')->
        where('commentable_id', '=', $product->id)->get();
        $total = $comments->count();
        $rating = $comments->avg('rating');

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('card', compact('product', 'variants', 'options', 'purchase', 'total', 'rating', 'all_purchases'));
    }
    public function createcomment(Noutbook $noutbook, Request $request)
    {
        $product = $noutbook;
        $id = Auth::id();

        $user_number = $request->session()->get('user_number');
        $purchase = Basket::where('user_number', '=', $user_number)->get();
        $all_purchases = $purchase->count() != 0 ? $purchase->count() : '';

        return view('createcomment', compact('product', 'id', 'all_purchases'));
    }

    public function storecomment(NoutbookCommentRequest $request)
    {
        $data = $request->validated();
        Comment::create($data);
        $last = Comment::all()->last();

        return redirect()->route('noutbooksComments.index', $last->commentable_id);
    }
}
