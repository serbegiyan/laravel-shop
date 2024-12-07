<p class="font-bold mt-3 mb-2">Память устройства</p>
@foreach($memories as $memory)
    <label>
        <input class="checkbox mr-1 mb-1.5" name="memory[]" type="checkbox" value="{{ $memory }}"
               onchange="this.form.submit()"
               @isset($_GET['memory']) @if (in_array($memory, $_GET['memory'])) checked="checked" @endif @endisset
        >{{ $memory }} ГБ
    </label>
@endforeach


