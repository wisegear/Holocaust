<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'HolocaustHistory') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/scripts.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Tiny MCE -->
        <script src="https://cdn.tiny.cloud/1/a1rn9rzvnlulpzdgoe14w7kqi1qpfsx7cx9am2kbgg226dqz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    </head>

    <body class="font-sans antialiased">

        <!-- Main outer container for the entire site -->
        <div class="max-w-screen-xl px-5 mx-auto">

            <!-- Main Navigation for the site -->
            <x-main-navigation/>

            <!-- This is where the content for each page is rendered -->
            <div class="my-10">
                {{ $slot }}
            </div>

            <!-- Footer for entire site -->
            <x-footer/>

        </div>

    </body>

</html>