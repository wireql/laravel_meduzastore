<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Meduzastore</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.9/jquery.inputmask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>

    </head>
    {{-- :class="{ 'brightness-50 backdrop-brightness-50': authModal }" --}}
    <body x-data="{ authModal: false, open: false, specifications: false, simpleModal: false}" style="background-color: #F3F6FB">

        @guest
            @include('modals.auth')
        @endguest

        <div :class="{ 'brightness-50 backdrop-brightness-50': authModal || simpleModal }">
            @yield('content')
        </div>
        
    </body>
</html>