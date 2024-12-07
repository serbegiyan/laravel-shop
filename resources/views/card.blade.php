@extends('layouts.base')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div id="place"></div>
    <div class="container flex flex-col px-5 divide-y">
        <div class="flex md:flex-row max-md:flex-col max-md:items-center max-md:my-2 md:justify-between">
            <h2 class="md:text-3xl max-md:text-xl font-bold md:my-4 max-md:text-center">
                {{ $product->name }}
            </h2>
            <p class="md:text-3xl font-semibold md:my-4 lg:mr-5">
                Цена: {{ $product->price }} p.
            </p>
        </div>
        <div class="flex md:flex-row max-md:flex-col py-3 gap-2 max-md:items-center justify-between">
            <img alt="" src=" {{ $product->image1 }} " class=" max-h-28">
            <div class="flex flex-col max-md:text-center" x-data="{ variant: {{ $product->variant }} }">
                <div class="text-center mb-3">Рейтинг товара
                    <img class="h-4 inline mb-1" alt="#" src="/images/rating.png">
                    {{round( ($rating), 1) }}, отзывов {{ $total }}
                </div>
                <p> {{ $product->shorts }} </p>
                <div x-show="variant" class="flex flex-col gap-y-3 justify-center mt-3">
                    <p class="text-center">Также доступны для заказа:</p>
                    <div class="flex flex-row gap-x-5 place-self-center">
                        @foreach ($variants as $variant)
                            <div class="flex flex-col">
                                <a class="place-self-center"
                                   href=" {{ route($variant->type . '.show', $variant->id) }} ">
                                    <img alt="" src=" {{ $variant->image1 }} "
                                         class="w-fit max-w-10 max-h-10  cursor-pointer">
                                </a>
                                <p class="place-self-center">{{ $variant->color }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex md:flex-col lg:mr-5 gap-2 max-sm:w-full max-sm:flex-row max-sm:justify-center">
                <a class="text-center bg-lime-300 hover:bg-lime-400 p-1.5 rounded-lg max-sm:w-1/3 h-fit"
                   href="{{ route($product->type.'Comments.index', $product->id) }}">Читать<br>отзывы
                </a>
                <a class="text-center bg-lime-300 hover:bg-lime-400 p-1.5 rounded-lg max-sm:w-1/3 h-fit"
                   href="{{ route($product->type.'Comments.create', $product->id) }}">Добавить<br>отзыв
                </a>
                <div class="hidden">
                    {{ $flag = false }}

                    @foreach($purchase as $basket)
                        @if($basket->product_name === $product->name and $basket->color === $product->color)
                            {{  $flag = true }} @break
                        @endif
                    @endforeach
                </div>

                @if ($flag === true)
                    <form class="text-center bg-green-500 p-1.5 rounded-lg max-sm:w-1/3 h-fit"
                          action="{{ route('basket.index') }}" method="GET">
                        <input class="hidden user_number" name="user_number" value="">
                        <button type="submit" class="{{ active_link('basket.index')}}">
                            Уже в<br>корзине
                        </button>
                    </form>
                @else
                    <form action="{{ route('basket.store') }}" method="POST"
                          class="text-center bg-green-300 hover:bg-green-400 p-1.5 rounded-lg max-sm:w-1/3 h-fit">
                        @csrf
                        <input class="hidden user_number_one" name="user_number" value="">
                        <input class="hidden" name="product_name" value="{{ $product->name }}">
                        <input class="hidden" name="product_type" value="{{ $product->type }}">
                        <input class="hidden" name="color" value="{{ $product->color }}">
                        <input class="hidden" name="product_id" value="{{ $product->id }}">
                        <input class="hidden" name="preview" value="{{ $product->image1 }}">
                        <input class="hidden" name="price" value="{{ $product->price }}">
                        <input class="hidden" name="quantity" value="1">
                        <input class="hidden" name="total_price" value="{{ $product->price }}">

                        <button id="alert" type="submit">Положить в корзину</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="flex flex-row py-3 justify-center md:items-end gap-x-2">
            <img alt="" src=" {{ $product->image1 }} " class="currentImg w-fit max-w-32 max-h-20 cursor-pointer">
            <img alt="" src=" {{ $product->image2 }} " class="currentImg w-fit max-w-32 max-h-20 cursor-pointer">
            <img alt="" src=" {{ $product->image3 }} " class="currentImg w-fit max-w-32 max-h-20 cursor-pointer">
        </div>
        <x-modalka></x-modalka>


        <div class="w-full divide-y md:place-self-start md:mb-4 max-md:flex max-md:flex-col max-md:gap-y-2">
            <p class="md:my-3 text-lg font-bold text-center">
                Характеристики
            </p>
            @foreach ($options as $key => $option)
                <div class="flex md:flex-row max-md:flex-col md:justify-between ">
                    <p class="">{{ $key }}
                    </p>
                    <p class="text-end">{{ $option }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
    @vite(['resources/js/modalka.js'])
    @vite(['resources/js/take_number.js'])
    @vite(['resources/js/addToBasket.js'])
@endpush
