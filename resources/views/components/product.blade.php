<div class="bg-white flex flex-col border border-x-gray-200 rounded-3xl p-5 sm:p-11">
    <a href="{{route('product', $item['id'])}}" class="w-full mb-2 flex justify-center">
        <img src="{{ asset('storage/images/products/1.jpg')}}" class="w-40 sm:w-full" alt="product">
    </a>
    <div class="text-xs font-bold sm:text-2xl sm:font-semibold mb-5">{{$item['name'] ?? "..."}}</div>
    <div class="mb-2 flex gap-2">
        <div class="text-xs font-bold sm:text-2xl sm:font-semibold">{{number_format($item['price'], 0, ' ', ' ') ?? "..."}} Р</div>
        @if ($item['old_price'])
            <div class="text-xs font-bold sm:text-base sm:font-semibold line-through text-slate-300">{{number_format($item['old_price'], 0, ' ', ' ') ?? "..."}}            Р</div>
        @endif
    </div>

    <a href="{{route('product', $item['id'])}}" class="">
        <div class="w-full text-white text-xs sm:text-lg font-semibold text-center p-3 rounded-xl" style="background: linear-gradient(180deg, #94FF1B 0%, #6AB613 100%);">Купить</div>
    </a>

    <a href="{{ route('product', ['id' => $item['id'], 'specifications' => 'true']) }}" class="mt-3 text-xs font-bold sm:text-base sm:font-semibold underline">Подробнее</a>
</div>