<div id="modalWindow" class="hidden z-30 fixed inset-0 bg-gray-100/75">
    <div class="container flex flex-col content-center">
        <button class="object-right-top right-2 bg-red-300 w-fit rounded-lg p-2 place-self-end" 
            >Закрыть
        </button> 
        <div id="grandpapa" class="self-center flex flex-row gap-2">            
            <button id="prev" class="max-md:hidden bg-lime-300 rounded-lg p-2 h-fit place-self-center">Назад</button>
            <div id="parent" class=""></div>           
            <button id="next" class="max-md:hidden bg-lime-300 rounded-lg p-2 h-fit place-self-center">Вперед</button>
        </div>  
        <div id="clip"
        class="fixed bottom-2 flex flex-row items-end gap-x-2 mt-3 cursor-pointer place-self-center">
        </div> 
    </div>
</div>
