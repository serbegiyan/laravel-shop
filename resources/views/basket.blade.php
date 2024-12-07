@extends('layouts.base')

@section('title')
    Корзина
@endsection

@section('content')
    <div class="w-full md:px-5">
        @if($total === 0)
            <h3 class="text-center font-bold">Корзина покупок</h3>
            <p class="text-center">Здесь пока ничего нет :)</p>
        @else
            <h3 class="text-center font-bold text-lg">Корзина покупок
                <span class="text-gray-500 text-base font-medium">добавлено {{ $total }} {{trans_choice('messages.товар', $total)}} на сумму {{ $count }} p.</span>
            </h3>

            <div class="md:flex md:flex-row w-full">
                <div class="h-auto md:pr-3 divide-y-[1px] max-md:mx-2 md:basis-10/12">
                    @foreach($products as $product)
                        <div
                            class="md:flex md:flex-row flex flex-col items-center justify-items-center w-full pt-2.5 pb-2.5 gap-2">
                            <div
                                class="flex flex-row md:items-center md:justify-items-center pt-2.5 pb-2.5 gap-2 md:w-3/5">
                                <div class="basis-1/12">
                                    <a href=" {{route ($product->product_type.'.show', $product->product_id) }} ">
                                        <img class="max-w-14 max-h-14 justify-self-center" alt=""
                                             src="{{ $product->preview }}">
                                    </a>
                                </div>
                                <p class="mr-2 basis-1/2 text-center">
                                    <a href=" {{route ($product->product_type.'.show', $product->product_id) }} ">
                                        {{ $product->product_name }} Цвет:&nbsp;{{ $product->color }}
                                    </a>
                                </p>
                                <p class="basis-1/3 text-center"><span class="text-gray-500">цена:
                                </span> {{ $product->price }}&nbsp;p. </p>
                                <p class="basis-3 mr-2 md:visible max-md:hidden">&times;</p>
                            </div>
                            <div
                                class="md:max-xl:flex md:max-xl:flex-col gap-4 flex flex-row max-md:w-full justify-center lg:w-2/5">
                                <form class="md:max-xl:flex md:max-xl:flex-row md:max-xl:gap-2 inline parent"
                                      action="{{ route('basket.edit') }}"
                                      method="GET">
                                    @if( $product->quantity > 1)
                                        <button class="w-8 h-6 bg-orange-200 hover:bg-orange-400 rounded-lg minus">-
                                        </button>
                                    @else
                                        <button disabled class="w-8 h-6 bg-gray-200 rounded-lg cursor-not-allowed">-
                                        </button>
                                    @endif
                                    <input class="hidden quantity_last" name="quantity" value="">
                                    <input disabled class="w-10 h-6 text-xs text-center quantity_first"
                                           value="{{ $product->quantity }}">
                                    <button class="w-8 h-6 bg-orange-200 hover:bg-orange-400 rounded-lg plus">+</button>
                                    <input class="hidden user_number" name="user_number" value="">
                                    <input class="hidden" name="color" value="{{ $product->color }}">
                                    <input class="hidden" name="name" value="{{ $product->product_name }}">
                                    <input class="hidden total_price" name="total_price" value="">
                                    <input class="hidden price" name="price" value="{{ $product->price }}">
                                </form>
                                <form action="{{ route('basket.delete') }}" method="GET">
                                    <input class="hidden user_number" name="user_number" value="">
                                    <input class="hidden" name="name" value="{{ $product->product_name }}">
                                    <button class="w-full bg-red-200 hover:bg-red-400 p-1 rounded-lg" type="submit">
                                        Удалить
                                    </button>
                                </form>
                            </div>
                            <p class="grow text-center"><span class="text-gray-500 ml-3">сумма:
                            </span> {{ $product->total_price }}&nbsp;p.</p>
                        </div>
                    @endforeach
                </div>
                <div class="md:basis-2/12 max-md:sticky max-md:bottom-0 max-md:bg-green-100 max-md:py-2 flex flex-col">
                    <div class="md:mb-4 md:bg-green-100 md:rounded-lg md:p-2 mb-1 text-center">Всего {{ $total }}
                        {{trans_choice('messages.товар', $total)}}<br>на сумму {{ $count }}&nbsp;p.
                    </div>
                    <form class="inline w-full bg-green-300 rounded-lg p-1.5 text-center hover:bg-green-500 px-2"
                          action="{{ route('order.create') }}" method="GET">
                        <input class="hidden user_number" name="user_number" value="">
                        <button type="submit">
                            Оформить заказ
                        </button>
                    </form>
                </div>
            </div>
    </div>
    @endif
@endsection
@push('scripts')
    @vite(['resources/js/basket_edit.js'])
    @vite(['resources/js/take_number_list.js'])
@endpush
