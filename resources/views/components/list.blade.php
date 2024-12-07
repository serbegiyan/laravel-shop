<div id="list" class="md:basis-3/4 h-auto pr-3 divide-y-[1px] sm-max:divide-y-2 mt-10 ml-1">
    @foreach ($products as $product)
        <div class="py-4 flex md:flex-row max-md:flex-col gap-2 md:items-start max-md:items-center">
            <h4 class="md:hidden font-bold">{{ $product->name }}</h4>
            <a href=" {{route ($product->type.'.show', $product->id) }} " class="max-md:justify-self-center">
                <img class="max-w-36 max-h-52" src="{{ $product->image1 }}"> </a>
            <p class="md:hidden max-md:text-center">{{ $product->shorts }}</p>
            <div class="md:basis-3/4 font-bold md:ml-4 max-md:hidden">
                <a href=" {{route ($product->type.'.show', $product->id) }} "
                > {{ $product->name }} </a>
                <div class="font-medium mt-2 flex flex-row gap-2">
                    <ul class="list-inside list-disc font-normal basis-3/5">
                        @php
                            $array = explode(",", $product->shorts);
                        @endphp
                        @foreach ($array as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <a class="sm:max-lg:hidden text-center bg-lime-300 hover:bg-lime-400 p-1.5 rounded-lg basis-1/5 h-fit self-end"
                       href="{{ route($product->type.'Comments.index', $product->id) }}">Читать<br>отзывы
                    </a>
                    <div class="hidden">
                    {{ $flag = false }}
                    @foreach($baskets as $basket)
                        @if($basket->product_name === $product->name and $basket->color === $product->color)
                            {{  $flag = true }} @break
                        @endif
                    @endforeach
                    </div>
                    @if ($flag === true)
                        <form class="sm:max-lg:hidden text-center bg-green-500 p-1.5 rounded-lg basis-1/5 h-fit self-end"
                              action="{{ route('basket.index') }}" method="GET">
                            <input class="hidden user_number" name="user_number" value="">
                            <button type="submit" class="{{ active_link('basket.index')}}">
                                Уже<br>в корзине
                            </button>
                        </form>
                    @else
                        <form action="{{ route('basket.store') }}" method="POST"
                              class="sm:max-lg:hidden text-center bg-green-300 hover:bg-green-400 p-1.5 rounded-lg basis-1/5 h-fit self-end">
                            @csrf
                            <input class="hidden user_number" name="user_number" value="">
                            <input class="hidden" name="product_name" value="{{ $product->name }}">
                            <input class="hidden" name="product_type" value="{{ $product->type }}">
                            <input class="hidden" name="color" value="{{ $product->color }}">
                            <input class="hidden" name="preview" value="{{ $product->image1 }}">
                            <input class="hidden" name="price" value="{{ $product->price }}">
                            <input class="hidden" name="product_id" value="{{ $product->id }}">
                            <input class="hidden" name="quantity" value="1">
                            <input class="hidden" name="total_price" value="{{ $product->price }}">

                            <button class="alert" type="submit">Положить<br>в корзину</button>
                        </form>
                    @endif
                </div>
            </div>

{{--            mobile--}}

            <div class="font-bold flex flex-col gap-1 justify-center max-sm:w-full">
                <p class="max-md:hidden text-center">{{ $product->price }}&nbsp;p.</p>
                <p class="md:hidden font-bold text-center">Цена: {{ $product->price }} p.</p>
                <div class="flex md:flex-col md:gap-2 sm:flex-row max-sm:justify-around">
                    <a class="lg:hidden text-center bg-lime-300 hover:bg-lime-400 p-1.5 rounded-lg max-sm:w-1/3 h-fit"
                       href="{{ route($product->type.'Comments.index', $product->id) }}">Читать<br>отзывы
                    </a>
                    @if ($flag === true)
                        <form class="lg:hidden text-center bg-green-500 p-1.5 rounded-lg max-sm:w-1/3 h-fit"
                              action="{{ route('basket.index') }}" method="GET">
                            <input class="hidden user_number" name="user_number" value="">
                            <button type="submit" class="{{ active_link('basket.index')}}">
                                Уже<br>в корзине
                            </button>
                        </form>
                    @else
                    <form action="{{ route('basket.store') }}" method="POST"
                          class="lg:hidden text-center bg-green-300 hover:bg-green-400 p-1.5 rounded-lg max-sm:w-1/3 h-fit">
                        @csrf
                        <input class="hidden user_number" name="user_number" value="">
                        <input class="hidden" name="product_name" value="{{ $product->name }}">
                        <input class="hidden" name="product_type" value="{{ $product->type }}">
                        <input class="hidden" name="color" value="{{ $product->color }}">
                        <input class="hidden" name="preview" value="{{ $product->image1 }}">
                        <input class="hidden" name="price" value="{{ $product->price }}">
                        <input class="hidden" name="product_id" value="{{ $product->id }}">
                        <input class="hidden" name="quantity" value="1">
                        <input class="hidden" name="total_price" value="{{ $product->price }}">

                        <button class="alert" type="submit">Положить<br>в корзину</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>

    @endforeach
</div>

@push('scripts')
    @vite(['resources/js/take_number_list.js'])
    @vite(['resources/js/addToBasketList.js'])
@endpush
