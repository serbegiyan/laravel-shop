@extends('layouts.base')

@section('title')
    Оформление заказа
@endsection

@section('content')
    <div class="w-full md:px-5 pt-3">
        <h3 class="text-center font-bold">Оформление заказа</h3>

        <div class="md:flex md:flex-row lg:w-1/2 w-full justify-items-center mx-auto">
            <div class="h-auto md:pr-3 divide-y-[1px] max-md:mx-2">
                @foreach($products as $product)
                    <div
                        class="md:flex md:flex-row flex flex-col items-center justify-items-center w-full pt-2.5 pb-2.5 gap-2">
                        <div class="basis-1/12">
                            <img class="max-w-14 max-h-14 justify-self-center" alt="" src="{{ $product->preview }}">
                        </div>
                        <p class="mr-2 basis-1/3 text-center">{{ $product->product_name }}
                            Цвет:&nbsp;{{ $product->color }}
                        </p>
                        <p class="basis-1/4 text-center"><span class="text-gray-500">цена:
                                </span> {{ $product->price }}&nbsp;p.&nbsp;&times;&nbsp;{{ $product->quantity }}
                        </p>
                        <p class="grow text-center"><span class="text-gray-500 ml-3">сумма:
                                </span> {{ $product->total_price }}&nbsp;p.
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
        <form class="flex flex-col justify-items-center lg:w-1/2 mx-auto"
              action="{{ route('order.store') }}" method="POST">
            @csrf
            <input name="all_purchases" class="hidden" value="{{ $all_purchases }}">
            <input name="details_purchases" class="hidden" value="{{ $details_purchases }}">
            <input name="order_price" class="hidden" value="{{ $order_price }}">

            <p class="text-center mt-3">Имя</p>
            <input name="user_name" value="{{ old('user_name') }}" class="mx-2 rounded-lg text-sm" placeholder="Имя">
            @error('user_name')
            <p class="text-red-500 text-center">{{ @$message }}</p>
            @enderror

            <p class="text-center mt-3">Фамилия</p>
            <input name="user_surname" value="{{ old('user_surname') }}" class="mx-2 rounded-lg text-sm" placeholder="Фамилия">
            @error('user_surname')
            <p class="text-red-500 text-center">{{ @$message }}</p>
            @enderror

            <p class="text-center mt-3">Номер телефона</p>
            <input name="user_phone" value="{{ old('user_phone') }}" class="mx-2 rounded-lg text-sm" placeholder="+37529-XX-XX-XXX">
            @error('user_phone')
            <p class="text-red-500 text-center">{{ @$message }}</p>
            @enderror

            <p class="text-center mt-3">E-Mail</p>
            <input name="user_email" value="{{ old('user_email') }}" class="mx-2 rounded-lg text-sm" placeholder="E-Mail">
            @error('user_email')
            <p class="text-red-500 text-center">{{ @$message }}</p>
            @enderror

            <p class="text-center mt-3">Адрес доставки</p>
            <input name="user_address" value="{{ old('user_address') }}" class="mx-2 rounded-lg text-sm" placeholder="Город, улица, № дома, № квартиры">
            @error('user_address')
            <p class="text-red-500 text-center">{{ @$message }}</p>
            @enderror

            <input name="number" class="hidden mt-6" value="{{ $number }}">
            <div id="place"></div>
            <div class="md:mb-4 max-lg:sticky max-md:bottom-6 bg-green-100 md:rounded-lg p-2 mb-1 text-center">
                Всего {{ $all_purchases }} {{trans_choice('messages.товар', $all_purchases)}}<br>на сумму {{ $order_price }}&nbsp;p.
            </div>
            <button type="submit"
                    class="w-full max-lg:sticky max-md:bottom-0 bg-green-300 rounded-lg p-1.5 text-center hover:bg-green-500 px-2"
                    id="send_order">
                Отправить заказ
            </button>
        </form>
    </div>
@endsection


