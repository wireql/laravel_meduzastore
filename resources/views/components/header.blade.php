<div class="w-full" style="background-color: #94FF1B"> 
    <div class="container px-3 mx-auto flex flex-row gap-3 h-9 items-center justify-end">
        <div class="font-semibold text-xs">tg. @meduzastore</div>
        <div class="font-semibold text-xs">hello@meduzastore.ru</div>
    </div>
</div>

<div>
    <div class="w-full bg-black">
        <div class="container px-5 mx-auto flex py-6 items-center justify-between">
            <a href="{{route('index')}}">
                <img class=" w-3/4 sm:w-full" src="{{asset('storage/images/web/svg/logo.svg')}}" alt="main-logo">
            </a>
            <div class="hidden lg:flex items-center gap-12">
                <a href="/#catalog" class="text-white text-base font-semibold hover:text-lime-400">Каталог</a>
                <a href="/#delivery" class="text-white text-base font-semibold hover:text-lime-400">Доставка и оплата</a>
                <a href="/#guarantee" class="text-white text-base font-semibold hover:text-lime-400">Гарантия</a>
                <a href="/ransom" class="text-white text-base font-semibold hover:text-lime-400">Выкуп</a>
            </div>
            <div class="flex items-center gap-5">
                <a href="/cart" class="header-buttons__item">
                    <img src="{{asset('storage/images/web/svg/cart.svg')}}" alt="cart">
                </a>
    
                @guest
                    <div @click="authModal = !authModal" class="flex items-center gap-3 hover:cursor-pointer" id="userLkModal">
                        <img src="{{asset('storage/images/web/svg/user.svg')}}" alt="user">
                        <div class="text-white text-base font-semibold hidden md:block hover:text-lime-400">Личный кабинет</div>
                    </div>
                @endguest

                @auth
                    <a href="{{route('profile')}}" class="flex items-center gap-3 hover:cursor-pointer">
                        <img src="{{asset('storage/images/web/svg/user.svg')}}" alt="user">
                        <div class="text-white text-base font-semibold hidden md:block hover:text-lime-400">Личный кабинет</div>
                    </a>
                @endauth
    
    
                <div class="block lg:hidden" id="menu-icon">
                    <img src="{{asset('storage/images/web/svg/menu.svg')}}" alt="menu" @click="open = !open">
                </div>
            </div>
        </div>
    </div>
    
    <div x-show="open" @click.away="open = false" class="w-full bg-black text-white flex flex-col items-center gap-8 py-3 rounded-b-3xl">
        <a href="/products" class="font-base font-semibold">Каталог</a>
        <a href="/#delivery" class="font-base font-semibold">Доставка и оплата</a>
        <a href="/#guarantee" class="font-base font-semibold">Гарантия</a>
        <a href="/ransom" class="font-base font-semibold">Выкуп</a>
    </div>
</div>