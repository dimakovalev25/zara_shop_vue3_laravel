<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ config('app.name', 'e-commerce') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body>

@include('layouts.navigation')

<main class="p-5">

    {{ $slot  }}

</main>
</body>
</html>
