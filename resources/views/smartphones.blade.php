@extends('layouts.base')

@section('title')
    Смартфоны
@endsection

@section('content')

    <div class="container w-full mt-0 ">
        @if($total != 0)
            <p class="w-fit h-6 left-1/4 absolute my-5 font-bold">Всего найдено {{ $total }} {{trans_choice('messages.товар', $total)}}</p>
        @else
            <p class="h-6 left-1/3 absolute mt-5 font-bold">По вашему запросу ничего не найдено</p>
        @endif
            <x-catalog>
            <div class="max-md:hidden md:basis-1/4 px-3 h-auto">
                <form action=" {{ route($product->type.'.index') }} " method="GET" class="flex flex-col">
                    <x-select></x-select>
                    <x-filters.brend :brends="$brends" :product="$product"></x-filters.brend>
                    <x-filters.ram :rams="$rams" :product="$product"></x-filters.ram>
                    <x-filters.memory :memories="$memories" :product="$product"></x-filters.memory>
                </form>
            </div>
            <x-list :products="$smartphones" :baskets="$purchase" class="w-36"></x-list>
        </x-catalog>
        <div class="flex flex-row justify-center">
            {{ $smartphones->links() }}
        </div>
    </div>
@endsection

@section('filter')
    <x-filters.filtermobile>
        <x-filters.noutbookmobile
            :product="$product"
            :brends="$brends"
            :rams="$rams"
            :memories="$memories">
        </x-filters.noutbookmobile>
    </x-filters.filtermobile>
@endsection
