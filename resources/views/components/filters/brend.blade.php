<p class="font-bold mb-2">Производитель</p>
@foreach($brends as $brend)
    <label>
        <input class="checkbox mr-1 mb-1.5" name="brend[]" type="checkbox" value="{{ $brend }}"
               onchange="this.form.submit()"
               @isset($_GET['brend']) @if (in_array($brend, $_GET['brend'])) checked="checked" @endif @endisset
        >{{ $brend }}
    </label>

@endforeach
