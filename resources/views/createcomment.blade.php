@extends('layouts.base')

@section('title')
    Добавление отзыва
@endsection

@section('content')
    <div class="flex flex-col gap-2 justify-center pt-2 border-b-2 pb-2 mx-2">
        <h3 class="font-bold text-center text-lg">Добавление отзыва на {{ $product->name }}</h3>
        <div class="flex flex-row gap-2 justify-center pt-2 pb-2 mx-2">
            <img alt="#" src="{{ $product->image1 }}" class="max-w-28 max-h-28">
            <p>{{ $product->shorts }}</p>
        </div>
    </div>
    <form class="flex flex-col justify-center gap-2 md:w-3/5 w-11/12" action="{{ route($product->type.'Comments.store') }}" method="GET">

        <input class="hidden" name="commentable_id" value="{{ $product->id }}">
        <input class="hidden" name="commentable_type" value="{{ $product->type }}">
        @php
        if($product->type == 'smartphones')
            $category = 3;
        elseif($product->type == 'refries')
            $category = 2;
        elseif($product->type == 'noutbooks')
            $category = 1
        @endphp
        <input class="hidden" name="category_id" value="{{ $category }}">
        <input class="hidden" name="user_id" value="{{ $id }}">

        <p>Рейтинг товара</p>
        <select name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <p>Название отзыва</p>
        <input type="text" name="title" value="{{ old('title') }}" placeholder="Название">
        @error('title')
        <p class="text-red-500 text-center">{{ @$message }}</p>
        @enderror

        <p>Текст отзыва</p>
        <textarea placeholder="Отзыв" name="body" value="{{ old('body') }}"></textarea>
        @error('body')
        <p class="text-red-500 text-center">{{ @$message }}</p>
        @enderror

        <button class="bg-orange-200 hover:bg-orange-400 w-fit h-fit p-1.5 rounded-lg" type="submit" value="Сохранить">Сохранить</button>
    </form>
@endsection

