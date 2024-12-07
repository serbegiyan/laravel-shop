@extends('layouts.base')

@section('title')
Ноутбуки
@endsection

@section('content')
    <div>
    <table class="border-collapse border border-slate-400">
        <thead>
        <tr>
            <th class="border border-slate-400">
                id
            </th>
            <th class="border border-slate-400">
                Модель
            </th>
            <th class="border border-slate-400">
                Цвет
            </th>
            <th class="border border-slate-400">
                Процессор
            </th>
            <th class="border border-slate-400">
                Скорость, МГц
            </th>
            <th class="border border-slate-400">
                Видеокарта
            </th>
            <th class="border border-slate-400">
                Экран
            </th>
            <th class="border border-slate-400">
                Разрешение экрана
            </th>
            <th class="border border-slate-400">
                Оперативная память, ГБ
            </th>
            <th class="border border-slate-400">
                Емкость накопителя, ГБ
            </th>
            <th class="border border-slate-400">
                Тип накопителя, SSD
            </th>
            <th class="border border-slate-400">
                Аккумулятор, Вт·ч
            </th>
        </thead>
        @foreach($noutbooks as $noutbook)
        <tbody>
        </tr>
        <tr>
            <td class="border border-slate-400">
                {{ $noutbook->id }}
            </td>
            <td class="border border-slate-400">
                {{ $noutbook->name }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->color }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->processor }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->speed }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->videocard }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->screen }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->resolution }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->ram }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->memory }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->memotype }}
            </td>
            <td class="border border-slate-400 text-center">
                {{ $noutbook->battery }}
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
</div>
<div>
    <form action="{{ route('noutbooks.store') }}" method="post">
        @csrf
        <div>
            <label for="type">Тип</label>
            <input type="text" name="type" placeholder="Тип" value="noutbooks">
        </div>
        <div>
            <label for="name">Модель</label>
            <input type="text" name="name" placeholder="Модель">
        </div>
        <div>
            <label for="shorts">Краткое описание</label>
            <textarea name="shorts" placeholder="Краткое описание"></textarea>
        </div>
        <div>
            <label for="brend">Бренд</label>
            <input type="text" name="brend" placeholder="Бренд">
        </div>
        <div>
            <label for="battery">Аккумулятор</label>
            <input type="number" name="battery" placeholder="Аккумулятор">
        </div>
        <div>
            <label for="color">Цвет</label>
            <input type="text" name="color" placeholder="Цвет">
        </div>
        <div>
            <label for="price">Цена</label>
            <input type="number" step="any" name="price" placeholder="Цена">
        </div>
        <div>
            <label for="image1">Путь к картинке1</label>
            <input type="text" name="image1" placeholder="Путь к картинке1">
        </div>
        <div>
            <label for="image2">Путь к картинке2</label>
            <input type="text" name="image2" placeholder="Путь к картинке2">
        </div>
        <div>
            <label for="image3">Путь к картинке3</label>
            <input type="text" name="image3" placeholder="Путь к картинке3" >
        </div>
        <div>
            <label for="processor">Процессор</label>
            <input type="text" name="processor" placeholder="Процессор">
        </div>
        <div>
            <label for="speed">Скорость</label>
            <input type="number" name="speed" placeholder="Скорость">
        </div>
        <div>
            <label for="videocard">Видеокарта</label>
            <input type="text" name="videocard" placeholder="Видеокарта">
        </div>
        <div>
            <label for="os">Операционная система</label>
            <input type="text" name="os" placeholder="Операционная система">
        </div>
        <div>
            <label for="screen">Размер экрана</label>
            <input type="number" name="screen" step="any" placeholder="Размер экрана">
        </div>
        <div>
            <label for="screentype">Тип экрана</label>
            <input type="text" name="screentype" placeholder="Тип экрана">
        </div>
        <div>
            <label for="resolution">Разрешение экрана</label>
            <input type="text" name="resolution" placeholder="Разрешение экрана">
        </div>
        <div>
            <label for="ram">Оперативная память</label>
            <input type="number" name="ram" placeholder="Оперативная память">
        </div>
        <div>
            <label for="ramtype">Тип оперативной памяти</label>
            <input type="text" name="ramtype" placeholder="Тип оперативной памяти">
        </div>
        <div>
            <label for="memory">Емкость накопителя</label>
            <input type="number" name="memory" placeholder="Емкость накопителя">
        </div>
        <div>
            <label for="memotype">Тип никопителя</label>
            <input type="text" name="memotype" placeholder="Тип никопителя">
        </div><div>
            <label for="variant">Наличие других вариантов</label>
            <input type="number" name="variant" placeholder="Наличие других вариантов" value="0">
        </div>
        <button type="submit">Создать</button>
    </form>
</div>

@endsection
