@extends('layouts.index')

@section('content')

    <x-header />

    <div class="container mx-auto px-5">

        <a href="{{route('index')}}" class="mt-12 mb-9 font-semibold text-4xl flex items-center gap-3">
            На главную
            <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35.75 19.5C35.75 10.5254 28.4746 3.25 19.5 3.25C10.5254 3.25 3.25 10.5254 3.25 19.5C3.25 28.4746 10.5254 35.75 19.5 35.75C28.4746 35.75 35.75 28.4746 35.75 19.5Z" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M25.1875 19.5L15.4375 19.5" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18.6875 24.375L13.8125 19.5L18.6875 14.625" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($products as $item)
                <x-product :item="$item" />
            @endforeach
        </div>

    </div>

    <x-footer />

@endsection