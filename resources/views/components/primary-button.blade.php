<button {{ $attributes->merge(['type' => 'submit', 'class' => 
'inline-flex items-center px-4 py-2 bg-orange-400 border rounded-md 
font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-400 
transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
