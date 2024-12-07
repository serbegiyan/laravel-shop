@extends('layouts.base')

@section('title')
Холодильники
@endsection

@section('content')
    <div class="container w-full">
        @if($total != 0)
            <p class="w-fit h-6 left-1/4 absolute my-5 font-bold">Всего найдено {{ $total }} {{trans_choice('messages.товар', $total)}}</p>
        @else
            <p class="h-6 left-1/3 absolute mt-5 font-bold">По вашему запросу ничего не найдено</p>
        @endif
        <x-catalog>
            <div class="max-md:hidden md:basis-1/4 px-3 h-auto">
                <form action=" {{ route($product->type.'.index') }} " method="GET" class="flex flex-col">
                    <x-select :product="$product"></x-select>
                    <x-filters.brend :brends="$brends" :product="$product"></x-filters.brend>
                    <x-filters.nofrost :nofrosts="$nofrosts" :product="$product"></x-filters.nofrost>
                </form>
            </div>
            <x-list :products="$refries" :baskets="$purchase" class="w-20"></x-list>
        </x-catalog>
        <div class="flex flex-row justify-center" >
            {{ $refries->links() }}
        </div>
    </div>
@endsection
@section('filter')
    <x-filters.filtermobile>
        <x-filters.refrymobile
            :product="$product"
            :brends="$brends"
            :nofrosts="$nofrosts">
        </x-filters.refrymobile>
    </x-filters.filtermobile>
@endsection

