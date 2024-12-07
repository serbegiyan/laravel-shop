@extends('layouts.base')

@section('title')
Shopping
@endsection

@section('content')

<h3 class="text-2xl font-bold text-center mb-4 mt-1">Лучшие предложения</h3>
<div>
  {{-- mobile --}}
  <div class="lg:hidden container flex justify-center flex-col">
    <figure class="inline-block w-1/2 container">
      <img class="mx-auto"
        src="{{ $smartphone->image1 }}"
        alt=""
      />
      <p class="pb-6 text-lg font-semibold text-center">{{$smartphone->name}} <br> {{$smartphone->price}} p.</p>
    </figure>
    <figure class="inline-block w-1/2 container">
      <img class="mx-auto"
        src="{{ $noutbook->image1 }}"
        alt=""
      />
      <p class="pb-6 text-lg font-semibold text-center">{{$noutbook->name}} <br> {{$noutbook->price}} p.</p>
    </figure>
      <figure class="inline-block w-1/2 container">
        <img class="mx-auto"
          src="{{ $refry->image1 }}"
          alt=""
        />
        <p class="pb-6 text-lg font-semibold text-center">{{$refry->name}} <br> {{$refry->price}} p.</p>
      </figure>
  </div>

  {{-- tablet and desctop --}}
  <div class="hidden lg:block w-full flex items-center justify-center">
    <div class="max-w-[650px]">
      <div
        x-data="{ activeSlide: 1, slideCount: 3 }"
        class="overflow-hidden relative"
       >
        <!-- Slider -->
        <!-- You can remove x-init if you dont want to autoplay -->
          <div
            class="whitespace-nowrap transition-transform duration-500 ease-in-out"
            :style="'transform: translateX(-' + (activeSlide - 1) * 100.5 + '%)'"
            x-init="setInterval(() => { activeSlide = activeSlide < slideCount ? activeSlide + 1 : 1 }, 5000)"
           >
            <!-- Item 1 -->
            <figure class="inline-block  w-full container">
              <img class="mx-auto"
                src="{{ $smartphone->image1 }}"
                alt=""
              />
              <p class="pb-6 text-lg font-semibold text-center">{{$smartphone->name}} &ndash; {{$smartphone->price}} p.</p>
            </figure>
            <!-- Item 2 -->
            <figure class="inline-block w-full container">
              <img class="mx-auto"
                src="{{ $noutbook->image1 }}"
                alt=""
              />
              <p class="pb-6 text-lg font-semibold text-center">{{$noutbook->name}} &ndash; {{$noutbook->price}} p.</p>
            </figure>
            <!-- Item 3 -->
            <figure class="inline-block w-full container">
              <img class="mx-auto"
                src="{{ $refry->image1 }}"
                alt=""
              />
              <p class="pb-6 text-lg font-semibold text-center">{{$refry->name}} &ndash; {{$refry->price}} p.</p>

            </figure>
          </div>

        <!-- Prev/Next Arrows -->
        <div class="absolute inset-0 flex items-center justify-between px-2">
          <button
            @click="activeSlide = activeSlide > 1 ? activeSlide - 1 : slideCount"
            class="w-[30px] h-[30px] flex items-center bg-black/30 text-white p-2 rounded-full"
          >
            &#8592;
          </button>
          <button
            @click="activeSlide = activeSlide < slideCount ? activeSlide + 1 : 1"
            class="w-[30px] h-[30px] flex items-center bg-black/30 text-white p-2 rounded-full"
          >
            &#8594;
          </button>
        </div>

        <!-- Dots Navigation -->
        <div
          class="absolute bottom-0 left-0 right-0 flex justify-center space-x-2 p-4"
         >
          <template x-for="slideIndex in slideCount" :key="slideIndex">
            <button
              @click="activeSlide = slideIndex"
              class="h-2 w-2 rounded-full"
              :class="{'bg-orange-500': activeSlide === slideIndex, 'bg-orange-200': activeSlide !== slideIndex}"
            ></button>
          </template>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
    @vite(['resources/js/take_number_list.js'])
@endpush
