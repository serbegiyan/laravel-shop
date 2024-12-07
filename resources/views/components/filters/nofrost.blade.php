<p class="font-bold mt-3 mb-2">No Frost</p>
@foreach($nofrosts as $nofrost)
    <label>
        <input class="checkbox mr-1 mb-1.5" name="nofrost[]" type="checkbox" value="{{ $nofrost }}"
               onchange="this.form.submit()"
               @isset($_GET['nofrost']) @if (in_array($nofrost, $_GET['nofrost'])) checked="checked" @endif @endisset
        >{{ $nofrost }}
    </label>
@endforeach


