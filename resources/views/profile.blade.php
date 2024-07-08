@extends('layouts.index')

@section('content')

    <x-header />

    <div class="container mx-auto px-5">

        <div class="mt-16">

            <div class="flex flex-col gap-4 md:flex-row md:justify-between md:items-center">
                <div class="font-semibold text-3xl md:text-5xl">Добро пожаловать!</div>
                <a href="{{route('logout')}}" class="w-max text-lg font-semibold py-3 px-8 text-white rounded-xl" style="background: linear-gradient(180deg, #FF7272 0%, #E23030 100%);">Выйти из кабинета</a>
            </div>

            <div class="mt-10 bg-white rounded-3xl border border-x-gray-200 p-12">
                <div class="font-semibold text-2xl">Ваши заказы</div>
                <div class="flex w-full justify-center my-10">
                    <div class="flex flex-col items-center gap-3">
                        <img src="{{asset('storage/images/web/svg/cart-null.svg')}}" alt="cart-empty" class="max-w-28">
                        <div class="font-semibold text-xl md:text-2xl text-gray-300">Тут пока что пусто</div>
                        <a href="{{route('products')}}" class="underline font-semibold text-xs">К покупкам</a>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <x-footer />

@endsection