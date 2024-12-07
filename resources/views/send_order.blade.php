@extends('layouts.base')

@section('content')
    <div class="w-full text-center py-5">
        Ваш заказ успешно отправлен! Номер вашего заказа: {{ $order->id }} <br>
        В течение часа с вами свяжется менеджер для уточнения деталей.
    </div>
@endsection

