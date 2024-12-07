<p class="font-bold mt-3 mb-2">Оперативная память</p>
@foreach($rams as $ram)
    <label>
        <input class="checkbox mr-1 mb-1.5" name="ram[]" type="checkbox" value="{{ $ram }}"
               onchange="this.form.submit()"
               @isset($_GET['ram']) @if (in_array($ram, $_GET['ram'])) checked="checked" @endif @endisset
        >{{ $ram }} ГБ
    </label>
@endforeach

