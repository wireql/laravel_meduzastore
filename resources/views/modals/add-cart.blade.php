{{-- Add cart Modal --}}
<div x-show="simpleModal" @click.away="simpleModal = false" class="fixed z-50 w-full h-full flex items-center justify-center p-5">
    <div class="bg-white max-w-[400px] w-full p-6 rounded-3xl">
        {{-- Modal header --}}
        <div class="flex justify-between items-start gap-10">
            <div class="text-xl md:text-3xl font-semibold">Товар добавлен в корзину</div>
            <img src="{{asset('storage/images/web/svg/closeModal.svg')}}" alt="closeModal" class="hover:cursor-pointer" @click="simpleModal = false">
        </div>

        {{-- Modal content --}}
        <div class="flex-col mt-6 gap-3" >
            Content
        </div>
    </div>
</div>