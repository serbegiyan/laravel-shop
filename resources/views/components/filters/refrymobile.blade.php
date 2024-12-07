<form action=" {{ route($product->type.'.index') }} " method="GET" class="flex flex-col gap-1">
    <select name="sorted"
            class="cursor-pointer rounded-2xl border-orange-400 bg-orange-100 w-44 px-2 mx-auto mt-16 mb-4 text-base">
        <option value="without"
                @isset($_GET['sorted']) @if ($_GET['sorted'] == 'without') selected="selected" @endif @endisset
        >Без сортировки
        </option>
        <option value="priceToUp"
                @isset($_GET['sorted']) @if ($_GET['sorted'] == 'priceToUp') selected="selected" @endif @endisset
        >Сначала дешевые
        </option>
        <option value="priceToDown"
                @isset($_GET['sorted']) @if ($_GET['sorted'] == 'priceToDown') selected="selected" @endif @endisset
        >Сначала дорогие
        </option>
    </select>
    <div>
        <p class="font-bold mb-2">Производитель</p>
        <ul>
            @foreach($brends as $brend)
                <li class="mb-4">
                    <label>
                        <input class="mr-1 mb-1" name="brend[]" type="checkbox" value="{{ $brend }}"
                               @isset($_GET['brend']) @if (in_array($brend, $_GET['brend'])) checked="checked" @endif @endisset
                        >{{ $brend }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        <p class="font-bold mt-3 mb-2">No Frost</p>
        <ul>
            @foreach($nofrosts as $nofrost)
                <li class="mb-4">
                    <label>
                        <input class="mr-1 mb-1" name="nofrost[]" type="checkbox" value="{{ $nofrost }}"
                               @isset($_GET['nofrost']) @if (in_array($nofrost, $_GET['nofrost'])) checked="checked" @endif @endisset
                        >{{ $nofrost }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    <button type="submit" class="rounded-2xl py-2 border-orange-400 bg-orange-200">Подобрать</button>
</form>
