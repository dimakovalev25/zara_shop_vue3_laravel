<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name', 'e-commerce') }}</title>
    <link href = "/fonts/poppins/stylesheet.css" rel = "stylesheet" type = "text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

</head>
<body>

@include('layouts.navigation')

<div class="flex flex-col min-h-screen">
    <main class="p-5 flex-grow">

        {{ $slot  }}


    </main>
    @include('layouts.footer')

</div>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
</body>
</html>
