@extends('layouts.index')

@section('content')

    <style>
        .in-future-block {
            background-image: url({{asset('storage/images/web/fifine-bg.png')}});
        }
        @media screen and (max-width: 550px) {
            .in-future-block {
                background-image: url({{asset('storage/images/web/fifine-bg-mobile.png')}});
            }
        }
    </style>

    <x-header />

    <div class="container mx-auto px-5">

        {{-- Slider block --}}
        <x-main-slider />

        {{-- Products list --}}
        <div class="text-4xl sm:text-5xl font-semibold mt-12 mb-9" id="catalog">Купить в один клик</div>            
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <x-product />
            <x-product />
            <x-product />
            <x-product />
        </div>
        <div class="flex justify-center">
            <a href="{{route('products')}}" class="bg-white flex flex-col border border-x-gray-200 rounded-lg sm:rounded-3xl text-xs sm:text-lg font-semibold py-2 px-6 sm:py-5 sm:px-14 w-max my-8 text-center">
                Посмотреть больше товаров
            </a>
        </div>

        {{-- Advance block --}}
        <x-advance />

        {{-- In future block --}}
        <x-in-future />

        {{-- Delivery block --}}
        <div class="text-4xl sm:text-5xl font-semibold mt-12 mb-9" id="delivery">Доставка</div>  
        <x-delivery />

        {{-- Payment block --}}
        <div class="text-4xl sm:text-5xl font-semibold mt-12 mb-9">Оплата</div>
        <x-payment />

        {{-- Product discount list --}}
        <div class="text-4xl sm:text-5xl font-semibold mt-12 mb-9">Убавили цену для вас</div>            
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <x-product />
            <x-product />
            <x-product />
            <x-product />
        </div>

        {{-- Tradein block --}}
        <x-tradein />

        {{-- Guarantee block --}}
        <div class="text-4xl sm:text-5xl font-semibold mt-12 mb-9" id="guarantee">Гарантия</div>
        <x-guarantee />

    </div>

    <x-footer />

@endsection