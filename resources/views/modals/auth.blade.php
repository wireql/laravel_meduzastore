{{-- Auth Modal --}}
<div x-show="authModal" @click.away="authModal = false" class="fixed z-50 w-full h-full flex items-center justify-center p-5">
    <div class="bg-white max-w-[400px] w-full p-6 rounded-3xl">
        {{-- Modal header --}}
        <div class="flex justify-between items-start gap-10">
            <div class="text-xl md:text-3xl font-semibold">Вход в личный кабинет</div>
            <img src="{{asset('storage/images/web/svg/closeModal.svg')}}" alt="closeModal" class="hover:cursor-pointer" @click="authModal = false">
        </div>

        {{-- Modal content --}}
        <form id="authForm" class="flex flex-col mt-6 gap-3">
            @csrf

            <div class="text-red-400" id="authFormError"></div>
            
            <div class="flex flex-col gap-3">
                <div class="text-base font-semibold">Ваша почта</div>
                <input required name="email" type="email" class="border border-x-gray-200 rounded-2xl text-lg py-3 px-6" placeholder="hello@meduzastore.ru">
            </div>
            <div class="g-recaptcha scale-75 -ml-8 sm:-ml-0 sm:scale-100" data-sitekey="6LePtYgpAAAAABO2S-bA1Ts82zUuWu7thkKTVx72"></div>
            <div class="w-full">
                <button 
                    class="w-max text-white font-semibold rounded-lg py-2 px-5" 
                    style="background: linear-gradient(180deg, #94FF1B 0%, #6AB613 100%);"
                    type="submit"
                    >
                    Получить код
                </button>
            </div>
            <div class="text-xs font-semibold">Нажимая на кнопку, Я принимаю условия политики обработки персональных данных</div>
            <div class="bg-red-400 text-white text-xs font-semibold p-5 rounded-3xl">Мы активно работаем над авторизацией по номеру телефона. Скоро будет удобнее</div>
        </form>
        {{-- Modal content --}}
        <form id="authFormNext" class="hidden flex-col mt-6 gap-3" >
            @csrf

            <div class="text-red-400" id="authFormNextError"></div>
            <div class="text-green-400" id="authFormNextSuccess"></div>
            
            <div class="flex flex-col gap-3">
                <div class="text-base font-semibold">Код из сообщения</div>
                <input required name="code" type="text" class="border border-x-gray-200 rounded-2xl text-lg py-3 px-6" placeholder="XXXX">
                <div class="text-base" id="timeLeft">01:00</div>
            </div>
            <div class="w-full">
                <button 
                    class="w-max text-white font-semibold rounded-lg py-2 px-5" 
                    style="background: linear-gradient(180deg, #94FF1B 0%, #6AB613 100%);"
                    type="submit"
                    >
                    Войти
                </button>
            </div>
            <div class="text-xs font-semibold">Нажимая на кнопку, Я принимаю условия политики обработки персональных данных</div>
            <div class="bg-red-400 text-white text-xs font-semibold p-5 rounded-3xl">Мы активно работаем над авторизацией по номеру телефона. Скоро будет удобнее</div>
        </form>
    </div>
</div>