<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js',  ])
    <title>{{ config('app.name', 'e-commerce') }}</title>
    <link href="/fonts/poppins/stylesheet.css" rel="stylesheet" type="text/css"/>
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
            rel="stylesheet"/>
</head>
<body>
<div>

    
    @include('layouts.navigation')
{{--    <div class="flex flex-col min-h-screen max-[525px]:mt-[80px]">--}}
    <div class="flex flex-col min-h-screen max-[525px]:mt-[80px] max-[525px]:mt-[10px]">
        <main class="p-5 flex-grow ">
            {{ $slot  }}
        </main>
{{--        <div>
            <button>
                --}}{{--            <a href="{{ route('sentConfirmEmail') }}">sentConfirmEmail</a>--}}{{--
                <a class="rounded border-2 border-green-900" href="/send-email">sentConfirmEmail</a>
            </button>
        </div>--}}
    </div>
    <div
            x-data="toast"
            x-show="visible"
            x-transition
            x-cloak
            @notify.window="show($event.detail.message)"
            class="fixed w-[400px] left-1/2 -ml-[200px] top-16 py-2 px-4 pb-4 bg-emerald-500 text-white mt-5 rounded"
    >
        <div class="font-semibold" x-text="message"></div>
        <button
                @click="close"
                class="absolute flex items-center justify-center right-2 top-2 w-[30px] h-[30px] rounded-full hover:bg-black/10 transition-colors"
        >
            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
            >
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        </button>
        <!-- Progress -->
        <div>
            <div
                    class="absolute left-0 bottom-0 right-0 h-[6px] bg-black/10"
                    :style="{'width': `${percent}%`}"
            ></div>
        </div>
    </div>

</div>
<div>
        @include('layouts.footer')
</div>


</body>
</html>
