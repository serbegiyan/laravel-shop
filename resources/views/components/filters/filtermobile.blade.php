<div x-data="{ 'showFilter': false }" @keydown.escape="showFilter = false">
    <button @click="showFilter = true" type="button" class="bg-orange-100 rounded-xl w-10 h-10">
        <img alt="" class="w-8 mx-auto" src="/images/filter.png">
    </button>
    <div class="z-30 fixed inset-0 bg-orange-100 flex flex-row justify-center" x-show="showFilter">
        <button type="button" class="bg-red-300 p-1  mt-2 rounded-lg z-50 absolute  cursor-pointer"
                @click="showFilter = false">
            Закрыть
        </button>
        {{ $slot }}
    </div>
</div>
<form>
    <x-select></x-select>
</form>
