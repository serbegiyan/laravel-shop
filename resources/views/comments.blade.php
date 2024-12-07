@extends('layouts.base')

@section('title')
    Отзывы
@endsection

@section('content')
    <div class="flex flex-col justify-center w-full md:px-5 px-2">
        <div class="hidden md:flex flex-row justify-between w-full mt-2">
            <a href="{{ route($product->type.'Comments.create', $product->id) }}"
               class="bg-orange-200 hover:bg-orange-400 w-fit h-fit p-1.5 rounded-lg">
                <img title="Добавить отзыв" alt="Добавить отзыв" class="inline w-6 pr-1" src="/images/add_comment_black.png">Добавить отзыв
            </a>
            <form class="" action="{{ route($product->type.'Comments.index', $product->id) }}" method="GET">
                <select name="comments" onchange="this.form.submit()"
                        class="rounded-2xl border-orange-400 bg-orange-100 w-60 px-2 py-1 mr-1">
                    <option value="new"
                            @isset($_GET['comments']) @if ($_GET['comments'] == 'new') selected="selected" @endif @endisset
                    >Новые сверху
                    </option>
                    <option value="old"
                            @isset($_GET['comments']) @if ($_GET['comments'] == 'old') selected="selected" @endif @endisset
                    >Старые сверху
                    </option>
                    <option value="todown"
                            @isset($_GET['comments']) @if ($_GET['comments'] == 'todown') selected="selected" @endif @endisset
                    >По возрастанию рейтинга
                    </option>
                    <option value="toup"
                            @isset($_GET['comments']) @if ($_GET['comments'] == 'toup') selected="selected" @endif @endisset
                    >По убыванию рейтинга
                    </option>
                </select>
            </form>
        </div>
        <h2 class="text-center font-bold text-xl border-b-2 pt-2 mb-3">Отзывы на {{ $product->name }} </h2>
        <div class="text-lg text-center">всего {{ $comments->count() }} отзывов, рейтинг товара
            <img class="h-4 inline mb-1" alt="#" src="/images/rating.png">
            {{round( ($comments->avg('rating')), 1) }}
        </div>
        <div class="flex flex-row gap-2 justify-center pt-2 border-b-2 pb-2 ">
            <img alt="#" src="{{ $product->image1 }}" class="max-w-28 max-h-28">
            <p>{{ $product->shorts }}</p>
        </div>

        <div class="divide-y-2">
            @foreach($comments as $comment)
                <div class="py-2">
                    <div class="flex flex-row gap-1.5 justify-center">
                        <div class="font-bold pb-1">{{ $comment->title }}, <img class="h-4 inline mb-1.5" alt="#"
                                                                                src="/images/rating.png"> {{ $comment->rating }}
                        </div>
                    </div>
                    <div class="text-left pb-2">{{ $comment->body }}</div>
                    <div class="text-right">
                        <a href="{{ route('userComments.show', $comment->user_id) }} ">{{ $comment->user->name  }}</a>,
                        <span class="text-gray-500"> {{ $comment->created_at }}</span></div>
                </div>

            @endforeach
        </div>
    </div>
@endsection

@section('filter')
        <a href="{{ route($product->type.'Comments.create', $product->id) }}" class="bg-orange-100 rounded-xl w-10 h-10">
            <img title="Добавить отзыв" alt="Добавить отзыв" class="w-8 mt-1 ml-1.5" src="/images/add_comment.png">
        </a>
        <form class="" action="{{ route($product->type.'Comments.index', $product->id) }}" method="GET">
            <select name="comments" onchange="this.form.submit()"
                    class="rounded-2xl border-orange-400 bg-orange-100 w-60 px-2 py-1 mr-1">
                <option value="without"
                        @isset($_GET['comments']) @if ($_GET['comments'] == 'without') selected="selected" @endif @endisset
                >Без сортировки
                </option>
                <option value="new"
                        @isset($_GET['comments']) @if ($_GET['comments'] == 'new') selected="selected" @endif @endisset
                >Новые сверху
                </option>
                <option value="old"
                        @isset($_GET['comments']) @if ($_GET['comments'] == 'old') selected="selected" @endif @endisset
                >Старые сверху
                </option>
                <option value="todown"
                        @isset($_GET['comments']) @if ($_GET['comments'] == 'todown') selected="selected" @endif @endisset
                >По возрастанию рейтинга
                </option>
                <option value="toup"
                        @isset($_GET['comments']) @if ($_GET['comments'] == 'toup') selected="selected" @endif @endisset
                >По убыванию рейтинга
                </option>
            </select>
        </form>
@endsection
