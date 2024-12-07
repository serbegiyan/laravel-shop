<div class="absolute right-0">
    <select name="sorted" onchange="this.form.submit()"
            class="cursor-pointer object-right-top rounded-2xl border-orange-400 bg-orange-100 w-44 px-2 py-1.5 mr-2">
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
</div>
