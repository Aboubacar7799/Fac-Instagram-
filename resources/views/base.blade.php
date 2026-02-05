<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name')}} -> @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <!-- tous le contenu de notre application -->
       @yield('content')

       @include('script')
    </body>
</html>
