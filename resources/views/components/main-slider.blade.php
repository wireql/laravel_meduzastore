<div class="carousel mt-6 rounded-3xl" style="background-color: #fff" data-flickity='{ "wrapAround": true }'>
    <div class="carousel-cell w-full">
        <div class="flex flex-col gap-3 md:flex-row p-12 justify-center items-center">

            <div class="flex flex-col justify-center gap-3 items-center" id="name">
                <div class="text-5xl sm:text-8xl font-semibold">Marshall <br> major IV</div>

                <div class="gap-3 hidden sm:flex">
                    <div class="bg-black w-full flex items-center justify-center text-lime-300 p-4 rounded-2xl font-semibold text-3xl">
                        <div class="btn">Акция месяца</div>
                    </div>
                    <a href="/product?product_id=1" class=" bg-black rounded-2xl flex items-center justify-center p-5">
                        <div class="btn">
                            <img src="{{asset('storage/images/web/svg/cart.svg')}}" class="w-11" alt="cart-accept">
                        </div>
                    </a>
                </div>
            </div>

            <div id="img">
                <img class="max-w-72 sm:max-w-full" src="{{ asset('storage/images/web/svg/main-slider-img1.svg') }}" alt="slider1">
                <div class="sm:hidden">
                    <div class="bg-black w-max mx-auto mt-3 py-2 px-5 rounded-xl text-base text-lime-300 font-semibold">Акция месяца</div>
                </div>
            </div>

        </div>
    </div>
    <div class="carousel-cell w-full h-full">

        <div class="flex p-12 h-full justify-center items-center gap-3 flex-col md:flex-row">

            <div class="flex md:items-center max-w-[500px]">
                <div class="font-semibold text-3xl md:text-6xl">Быстрая доставка через партнерские компании по всей России</div>
            </div>
            <div class="" id="img">
                <img src="{{ asset('storage/images/web/world.png') }}" alt="slider1">
            </div>

        </div>  

    </div>
</div>