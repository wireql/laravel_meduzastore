@include('modals.add-cart')

@extends('layouts.index')

@section('content')

    <x-header />

    <div class="container mx-auto px-5">

        <div class="bg-white flex flex-col border border-x-gray-200 rounded-3xl p-5 sm:p-11 mt-8">

            {{-- Specifications --}}
            <div :class="{ 'hidden': !specifications }" class="flex justify-between items-start">
                <div class="flex flex-col lg:flex-row gap-12 w-full">
                    <img src="{{ asset('storage/images/products/'.$product['colors'][$color]['images'][0]['image'])}}" alt="image" class="max-w-48 max-h-48 w-full h-full">
                    <div class="flex flex-col gap-6">
                        <div class="text-2xl font-semibold">Характеристики</div>
                        <div class="flex flex-col gap-3">
                            @foreach ($product['attrs'] as $item)
                                <div class="flex flex-col gap-3 sm:flex-row justify-between lg:gap-32 border-b border-black p-4">
                                    <div class="font-semibold text-lg text-slate-500">{{$item['attr']['name']}}:</div>
                                    <div class="font-semibold text-lg">{{$item['value']}}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <img src="{{asset('storage/images/web/svg/closeModal.svg')}}" alt="closeModal" class="hover:cursor-pointer" @click="specifications = false">
            </div>

            <div class="flex flex-col md:flex-row justify-between gap-3" :class="{ 'hidden': specifications }">

                <div class="carousel mt-6 rounded-3xl w-full md:w-1/2" data-flickity='{ "wrapAround": true }'>
                    @foreach ($product['colors'][$color]['images'] as $item)
                        <div class="carousel-cell w-full flex justify-center">
                            <img src="{{ asset('storage/images/products/'.$item['image'])}}" alt="image" class="max-w-md w-full">
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-col gap-5 w-full md:w-1/2">
                    <div class="font-semibold text-2xl">{{$product['name']}}</div>
                    <div class="flex gap-3">
                        <div class="font-semibold text-gray-400">Цвет:</div>
                        @foreach ($product['colors'] as $item)
                            <a href="{{route('product', ['id' => $product['id'], 'color' => $item['id']], )}}" class="hover:cursor-pointer w-7 h-7 rounded-full" style="background-color: {{$item['color']['hex']}}"></a>
                        @endforeach
                    </div>
                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex gap-3">
                        <div class="font-semibold text-3xl">{{number_format($product['price'], 0, ' ', ' ')}} Р</div>
                        @if ($product['old_price'])
                            <div class="font-semibold text-xl line-through text-slate-300">{{number_format($product['old_price'], 0, ' ', ' ')}} Р</div>
                        @endif
                    </div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <button type="button" id="addToCart" data-item_id="{{$product['id']}}" class="flex items-center justify-center w-full text-white py-4 px-8 rounded-3xl font-semibold text-2xl hover:opacity-70" style="background: linear-gradient(180deg, #94FF1B 0%, #6AB613 100%);">В корзину</button>
                        <div class="flex items-center justify-center w-full text-white py-4 px-8 rounded-3xl font-semibold text-lg" style="background: linear-gradient(180deg, #D11BFF 0%, #F465EE 100%);">Это новый товар</div>
                    </div>
                    <div class="text-sm font-semibold">Способ доставки будет доступен при оформлении заказа</div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <div @click="specifications = !specifications" class="flex items-center justify-center hover:cursor-pointer border border-x-gray-200 w-full py-4 px-8 rounded-3xl font-semibold text-lg bg-slate-100">Характеристики</div>
                        <div class="flex items-center justify-center border border-x-gray-200 w-full py-2 px-8 rounded-3xl font-semibold text-lg bg-slate-100">
                            <div class="flex gap-3 items-center">
                                <div>
                                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="22" cy="22" r="22" fill="url(#paint0_linear_0_1)"></circle>
                                        <g clip-path="url(#clip0_0_1)">
                                        <path d="M32.9893 13.9331C32.5717 16.6395 32.0306 20.2383 31.4568 23.8297C31.1517 25.7461 30.8031 27.6552 30.4399 29.5643C29.9605 32.0988 28.7875 32.6474 26.6304 31.2503C24.3025 29.7398 22.0291 28.1489 19.7593 26.547C18.5827 25.7168 18.5282 24.9305 19.5487 23.9358C21.4299 22.0998 23.3546 20.3077 25.254 18.4864C25.6898 18.0695 26.1147 17.6343 26.496 17.1662C26.6376 16.9906 26.6304 16.6944 26.6921 16.453C26.4451 16.4676 26.1546 16.3981 25.9621 16.5115C25.1813 16.9687 24.4223 17.4661 23.6706 17.9708C21.3427 19.5397 19.0149 21.1123 16.6943 22.6959C15.4087 23.5737 14.0577 23.9979 12.5107 23.4896C11.3376 23.1056 10.1319 22.8093 8.98073 22.3668C8.56672 22.2059 8.08009 21.7633 8.00383 21.3757C7.95298 21.1123 8.49409 20.582 8.87904 20.4028C11.4502 19.2142 14.0396 18.0549 16.6471 16.9467C20.8089 15.1766 24.9852 13.4504 29.1616 11.7168C29.6627 11.5084 30.1784 11.3292 30.6978 11.1865C32.5571 10.6745 33.0801 11.0988 32.9893 13.9331Z" fill="white"></path>
                                        </g>
                                        <defs>
                                        <linearGradient id="paint0_linear_0_1" x1="22" y1="0" x2="22" y2="44" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#1FB7FF"></stop>
                                        <stop offset="1" stop-color="#017EFF"></stop>
                                        </linearGradient>
                                        <clipPath id="clip0_0_1">
                                        <rect width="25" height="21" fill="white" transform="translate(8 11)"></rect>
                                        </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <div>Остались вопросы?</div>
                                    <div>Напишите нам</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>    

    <x-footer />

    <script>
        $(document).ready(function() {
            $('.flickity-button').addClass('hidden');
            $('.flickity-page-dots').addClass('hidden');
            
            let params = new URLSearchParams(window.location.search);

            if (params.get('specifications') === 'true') {
                document.querySelector('body').__x.$data.specifications = !document.querySelector('body').__x.$data.specifications;
            }
        })
    </script>

@endsection