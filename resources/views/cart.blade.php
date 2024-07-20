@extends('layouts.index')

@section('content')

    <x-header />

    <div class="container mx-auto px-5">

        <div class="font-semibold text-3xl md:text-5xl mt-16">Корзина</div>

        <form id="cartForm" class="bg-white flex flex-col lg:flex-row gap-6 border border-x-gray-200 rounded-3xl p-5 sm:p-11 mt-8">

            <div class="flex gap-3 flex-col xl:flex-row">
                <div class="flex flex-col gap-3 lg:max-w-64">
                    <div class="flex flex-col gap-3">
                        <div class="text-base font-semibold">Имя</div>
                        <input required name="firstname" type="text" class="border border-x-gray-200 rounded-2xl text-md py-3 px-6" placeholder="Иван">
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="text-base font-semibold">Фамилия</div>
                        <input required name="lastname" type="text" class="border border-x-gray-200 rounded-2xl text-md py-3 px-6" placeholder="Иванов">
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="text-base font-semibold">Телефон</div>
                        <input required name="telephone" id="telephone" type="text" class="border border-x-gray-200 rounded-2xl text-md py-3 px-6" placeholder="+7 XXX XXX XX XX">
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-3">
                            <div class="text-base font-semibold">Промокод</div>
                            <input required name="promo" type="text" class="border border-x-gray-200 rounded-2xl text-md py-3 px-6" placeholder="XXX-XXX-XXX">
                        </div>  
                        <button 
                            class="w-max text-white font-semibold rounded-lg py-2 px-5" 
                            style="background: linear-gradient(180deg, #94FF1B 0%, #6AB613 100%);"
                            type="submit"
                            >
                            Активировать
                        </button>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="text-base font-semibold">Комментарий</div>
                        <textarea name="message" cols="30" rows="10" placeholder="..." class="border border-x-gray-200 rounded-2xl text-md py-3 px-6 max-h-40"></textarea>
                    </div>
                </div>
                <div class="lg:max-w-64">
                    <div class="flex flex-col mb-3">
                        <div class="text-base font-semibold">Способ доставки</div>
                    </div>
                    <div class="flex flex-col md:flex-row lg:flex-col gap-3">
                        <div class="w-full border border-x-gray-200 rounded-2xl py-3 px-6 flex flex-col gap-4 active" id="delivery-type1" style="background: linear-gradient(180deg, #E6F0FF 0%, #C4D1E4 100%);">
                            <div class="flex justify-between items-start">
                                <div class="text-lg font-semibold max-w-28">Доставка по Санкт-Петербургу</div>
                                <div class="w-6 h-6 rounded-full bg-green-400 border border-white cursor-pointer btn"></div>
                            </div>
                            <div class="address-block flex flex-col gap-3">
                                <div class="text-base font-semibold">Адрес доставки</div>
                                <input name="delivery_adress_spb" type="text" class="border border-x-gray-200 rounded-2xl text-sm py-3 px-6" placeholder="Город, улица, дом, квартира">
                            </div>
                            <div class="text-xs font-semibold info-block hidden">Наш менеджер свяжется с Вами и уточнит время доставки</div>
                            <div class="text-lg font-semibold cost">400 Р</div>
                        </div>
    
                        <div class="w-full border border-x-gray-200 rounded-2xl py-3 px-6 flex flex-col gap-4" id="delivery-type2">
                            <div class="flex justify-between items-start">
                                <div class="text-lg font-semibold">Доставка СДЭК</div>
                                <div class="w-6 h-6 rounded-full border border-x-gray-200 cursor-pointer btn"></div>
                            </div>
                            <div class="address-block hidden flex flex-col gap-3">
                                <div class="text-base font-semibold">Адрес доставки</div>
                                <input name="delivery_adress_sdek" type="text" class="border border-x-gray-200 rounded-2xl text-sm py-3 px-6" placeholder="Город, улица, дом, квартира">
                            </div>
                            <div class="text-xs font-semibold info-block">Доставка осуществляется для ваш счет</div>
                            <div class="text-lg font-semibold text-gray-400 cost">500 Р</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-x-gray-200 rounded-3xl p-5 sm:p-11 w-full flex flex-col justify-between">

                {{-- <div class="flex flex-col items-center gap-3">
                    <img src="{{asset('storage/images/web/svg/cart-null.svg')}}" alt="cart-empty" class="max-w-28">
                    <div class="font-semibold text-xl md:text-2xl text-gray-300">Тут пока что пусто</div>
                    <a href="{{route('products')}}" class="underline font-semibold text-xs">К покупкам</a>
                </div> --}}

                <div class="border border-x-gray-200 rounded-3xl p-5 sm:p-8 w-full flex gap-3">
                    <img src="{{ asset('storage/images/products/1.jpg')}}" alt="product_image" class="max-w-32 max-h-32">
                    <div class="flex flex-col gap-2">
                        <div class="font-semibold text-lg">Беспроводные наушники Marshall Major IV, Черный</div>
                        <div class="font-semibold text-xs">Цена покупки: 10 600 Р</div>
                        <div class="flex items-center gap-3">
                            <div class="flex justify-between items-center border border-x-gray-200 rounded-xl p-3">
                                <div class="hover:cursor-pointer">
                                    <img src="{{ asset('storage/images/web/svg/arrowleft.svg')}}" alt="">
                                </div>
                                <div class="w-24 text-center font-semibold text-xl">11</div>
                                <div class="hover:cursor-pointer">
                                    <img src="{{ asset('storage/images/web/svg/arrowright.svg')}}" alt="">
                                </div>
                            </div>
                            <div class="border border-x-gray-200 rounded-xl h-full flex p-4 hover:cursor-pointer"><img src="{{ asset('storage/images/web/svg/del.svg')}}" alt=""></div>
                        </div>
                        <div class="font-semibold text-xs text-slate-400">Итого: 116 600 Р</div>
                    </div>
                </div>

                <div class="flex justify-between flex-col items-center gap-3 mt-6 sm:flex-row">
                    <div class="flex gap-3 flex-col items-start md:items-center md:flex-row">
                        <div class="flex gap-3 items-center active" id="pay-type1">
                            <div class="w-6 h-6 rounded-full bg-green-400 border border-white cursor-pointer"></div>
                            <div class="text-sm font-semibold">Картой</div>
                        </div>
                        <div class="flex gap-3 items-center" id="pay-type2">
                            <div class="w-6 h-6 rounded-full border border-x-gray-200 cursor-pointer"></div>
                            <div class="text-sm font-semibold">Безналичный рассчет</div>
                        </div>
                    </div>
                    <div class="flex gap-3 items-center  flex-col  md:flex-row">
                        <div class="text-sm font-semibold">Итого: 0 Р</div>
                        <button 
                            class="w-max text-white font-semibold rounded-lg py-2 px-5" 
                            style="background: linear-gradient(180deg, #94FF1B 0%, #6AB613 100%);"
                            type="submit"
                            >
                            Оформить заказ
                        </button>
                    </div>
                </div>
            </div>
            
        </form>

    </div>

    <x-footer />

    <script>
        $(document).ready(function() {

            $('#telephone').inputmask('+7 999 999 99 99');

            $('#delivery-type1 .btn').click(function() {
                
                $('#delivery-type2 .btn').removeClass('bg-green-400 border-white')
                $('#delivery-type2 .btn').addClass('border-x-gray-200')
                $('#delivery-type2').css('background', "")
                $('#delivery-type2 .address-block').addClass('hidden')
                $('#delivery-type2 .info-block').removeClass('hidden')
                $("#delivery-type2 .cost").addClass('text-gray-400')
                $("#delivery-type1").addClass('active')

                $('#delivery-type1 .btn').addClass('bg-green-400 border-white')
                $('#delivery-type1 .btn').removeClass('border-x-gray-200')
                $('#delivery-type1').css('background', "linear-gradient(180deg, #E6F0FF 0%, #C4D1E4 100%)")
                $('#delivery-type1 .address-block').removeClass('hidden')
                $('#delivery-type1 .info-block').addClass('hidden')
                $("#delivery-type1 .cost").removeClass('text-gray-400')
                $("#delivery-type2").removeClass('active')

            })

            $('#delivery-type2 .btn').click(function() {

                $('#delivery-type1 .btn').removeClass('bg-green-400 border-white')
                $('#delivery-type1 .btn').addClass('border-x-gray-200')
                $('#delivery-type1').css('background', "")
                $('#delivery-type1 .address-block').addClass('hidden')
                $('#delivery-type1 .info-block').removeClass('hidden')
                $("#delivery-type1 .cost").addClass('text-gray-400')
                $("#delivery-type2").addClass('active')

                $('#delivery-type2 .btn').addClass('bg-green-400 border-white')
                $('#delivery-type2 .btn').removeClass('border-x-gray-200')
                $('#delivery-type2').css('background', "linear-gradient(180deg, #E6F0FF 0%, #C4D1E4 100%)")
                $('#delivery-type2 .address-block').removeClass('hidden')
                $('#delivery-type2 .info-block').addClass('hidden')
                $("#delivery-type2 .cost").removeClass('text-gray-400')
                $("#delivery-type1").removeClass('active')

            })

            $('#pay-type2').click(function() {
                $('#pay-type1 .rounded-full').removeClass('bg-green-400 border-white')
                $('#pay-type1 .rounded-full').addClass('border-x-gray-200')
                $('#pay-type2 .rounded-full').removeClass('border-x-gray-200')
                $('#pay-type2 .rounded-full').addClass('bg-green-400 border-white')
                $('#pay-type2').addClass('active')
                $('#pay-type1').removeClass('active')
            })
            $('#pay-type1').click(function() {
                $('#pay-type1 .rounded-full').addClass('bg-green-400 border-white')
                $('#pay-type1 .rounded-full').removeClass('border-x-gray-200')
                $('#pay-type2 .rounded-full').addClass('border-x-gray-200')
                $('#pay-type2 .rounded-full').removeClass('bg-green-400 border-white')
                $('#pay-type1').addClass('active')
                $('#pay-type2').removeClass('active')
            })

        })
    </script>

@endsection