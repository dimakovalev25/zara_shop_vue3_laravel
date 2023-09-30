<header
        x-data="{
        mobileMenuOpen: false,
        cartItemsCount: {{\App\Http\Helpers\Cart::getCartItemsCount()}},
        watchlistItems: 0,

        }"
        @cart-change.window="cartItemsCount = $event.detail.count"

        class="p-3 flex justify-between bg-white shadow-md text-black fixed-header transition-all duration-300 ease-in-out"
>
    <div class="logo">
        <a href="/products" class="text-3xl block py-navbar-item pl-5"> Apples shop </a>
    </div>


    <div class="block fixed z-10 top-0 bottom-0 height h-full w-[220px] transition-all bg-white md:hidden"
         :class="mobileMenuOpen ? 'left-0' : '-left-[220px]'">
        <ul>

{{--            менюшка мобильная--}}

            @if(!Auth::guest())
                <ul
                        class=""

                      >
                    <li class="">
                        <x-castom_dropdown title="Choose category"></x-castom_dropdown>
                    </li>

                    <li class="" data-te-nav-item-ref>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-nav-link-ref
                        >Dashboard</a
                        >
                    </li>
                    <li class="" data-te-nav-item-ref>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-nav-link-ref
                        >Info</a
                        >
                    </li>
                    <li class="" data-te-nav-item-ref>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-nav-link-ref
                        >Русский язык</a
                        >
                    </li>
                    <li>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-dropdown-item-ref
                        >My profile</a
                        >
                    </li>
                    <li>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-dropdown-item-ref
                        >My orders</a
                        >
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="flex block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600" type="submit">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                >
                                    <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    /> </svg>
                                <p
                                        class=""
                                        href="#"
                                        data-te-dropdown-item-ref
                                >logout
                                </p>
                            </button>
                        </form>
                    </li>

                </ul>

            @else
                <ul
                        class=""

                >
                    <li class="">
                        <x-castom_dropdown title="Choose category"></x-castom_dropdown>
                    </li>

                    <li class="" data-te-nav-item-ref>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-nav-link-ref
                        >Dashboard</a
                        >
                    </li>
                    <li class="" data-te-nav-item-ref>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-nav-link-ref
                        >Info</a
                        >
                    </li>
                    <li class="" data-te-nav-item-ref>
                        <a
                                class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                href="#"
                                data-te-nav-link-ref
                        >Русский язык</a
                        >
                    </li>
                <li>
                    <a
                            href="{{route('login')}}"
                            class="text-lg  text-neutral-500 flex items-center py-navbar-item px-navbar-item hover:text-neutral-700"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        Login
                    </a>
                </li>
                <li>

                    {{--                    btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700--}}

                    <a
                            href="{{route('register')}}"
                            class=" inline-flex items-center text-white bg-emerald-600 py-2 px-3 rounded shadow-md hover:bg-emerald-700 active:bg-emerald-800 transition-colors mx-5 inline-block rounded  px-6 pb-2 pt-2.5 text-base font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out  hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0  active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-4 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>


                        Register
                    </a>
                </li>
            @endif

        </ul>
    </div>

{{--    <div class="block fixed z-10 top-0 bottom-0 height h-full w-[220px] transition-all bg-white md:hidden"
         :class="mobileMenuOpen ? 'left-0' : '-left-[220px]'">
        <ul>

            --}}{{--            менюшка мобильная  copy!!!--}}{{--

            @if(!Auth::guest())

                <li x-data="{open: false}" class="relative">
                    <a
                            @click="open = !open"
                            class="cursor-pointer flex items-center py-navbar-item px-navbar-item pr-5 hover:bg-white"
                    >
              <span class="flex items-center">
                <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                >
                  <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  />
                </svg>
                My Account
              </span>
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 ml-2"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                    <ul
                            @click.outside="open = false"
                            x-show="open"
                            x-transition
                            x-cloak
                            class="absolute z-10 right-0 bg-slate-800 py-2 w-48"
                    >
                        <li>
                            <a
                                    href="/src/profile.html"
                                    class="flex px-3 py-2 hover:bg-slate-900"
                            >
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                >
                                    <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                My Profile
                            </a>
                        </li>

                        <li>
                            <a
                                    href="/src/watchlist.html"
                                    class="flex items-center justify-between px-3 py-2 hover:bg-slate-900"
                            >
                                <div class="flex items-center">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 mr-2"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                        />
                                    </svg>
                                    Watchlist
                                </div>

                                <small
                                        --}}{{--                                        x-show="$store.header.watchlistItems"--}}{{--
                                        x-show="cartItemsCount"
                                        x-transition
                                        --}}{{--                                        x-text="$store.header.watchlistItems"--}}{{--
                                        x-text="cartItemsCount"
                                        class="py-[2px] px-[8px] rounded-full bg-red-500"
                                ></small>
                            </a>
                        </li>
                        <li>
                            <a
                                    href="/src/orders.html"
                                    class="flex px-3 py-2 hover:bg-slate-900"
                            >
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                >
                                    <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                    />
                                </svg>
                                My Orders
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="flex px-3 py-2 hover:bg-slate-900" type="submit">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 mr-2"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        />
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

            @else

                <li>
                    <a
                            href="{{route('cart.index')}}"
                            class="flex items-center py-navbar-item px-navbar-item hover:bg-slate-900"
                    >

                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2 -mt-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>
                        Cart
                    </a>
                </li>
                <li>
                    <a
                            href="{{route('login')}}"
                            class="flex items-center py-navbar-item px-navbar-item hover:bg-slate-900"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        Login
                    </a>
                </li>
                <li>
                    <a
                            href="{{route('register')}}"
                            class="inline-flex items-center text-white bg-emerald-600 py-2 px-3 rounded shadow-md hover:bg-emerald-700 active:bg-emerald-800 transition-colors mx-5"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-4 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                        Register
                    </a>
                </li>
            @endif

        </ul>
    </div>--}}


    <nav class="hidden md:block p-6">
        {{--        центральная менюшка--}}
        <ul class="grid grid-flow-col gap-4">

            <li class="">
                <x-castom_dropdown title="Choose category"></x-castom_dropdown>
            </li>

            <li class="" data-te-nav-item-ref>
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="#"
                        data-te-nav-link-ref
                >Dashboard</a
                >
            </li>
            <li class="" data-te-nav-item-ref>
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="#"
                        data-te-nav-link-ref
                >Info</a
                >
            </li>
            <li class="" data-te-nav-item-ref>
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="#"
                        data-te-nav-link-ref
                >Русский язык</a
                >
            </li>

        </ul>
    </nav>

    <nav class="hidden md:block">
        {{--        правая менюшка--}}
        <ul class="grid grid-flow-col items-center">

            <div class="relative inline-flex w-fit mr-3">
                <div x-show="cartItemsCount"
                     x-transition
                     x-cloak
                     x-text="cartItemsCount"
                     class="absolute left-auto top-[11px] -right-4 z-10  -translate-y-1/8 translate-x-2/10 rotate-0 skew-x-0 skew-y-0 scale-x-10 scale-y-10 whitespace-nowrap rounded-full bg-indigo-700 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-white  data-te-animation-init data-te-animation-reset='true' data-te-animation='[tada_1s_ease-in-out]' ">
                </div>
                <a
                        href="{{route('cart.index')}}"
                        class=" text-lg  text-neutral-500 relative inline-flex items-center py-navbar-item px-navbar-item hover:text-neutral-700"

                >
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                    >
                        <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>
                    Cart
                </a>
            </div>


            @if(!Auth::guest())

                <div class="relative ml-3" data-te-dropdown-hover-toggle-ref>
                    <button

                            class="flex items-center text-neutral-500 whitespace-nowrap bg-white text-lg font-medium  shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none hover:text-neutral-700"


                            type="button"
                            id="dropdownMenuButton9"
                            data-te-dropdown-toggle-ref
                            aria-expanded="false"
                            data-te-ripple-init>

                        My Account
                        <span class="ml-2 w-2">
      <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
              fill="currentColor"
              class="h-5 w-5">
        <path
                fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                clip-rule="evenodd"/>
      </svg>
    </span>
                    </button>
                    <ul
                            class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                            aria-labelledby="dropdownMenuButton9"
                            data-te-dropdown-menu-ref>
                        <li>
                            <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#"
                                    data-te-dropdown-item-ref
                            >My profile</a
                            >
                        </li>
                        <li>
                            <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#"
                                    data-te-dropdown-item-ref
                            >My orders</a
                            >
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="flex block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600" type="submit">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 mr-2"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        /> </svg>
                                    <p
                                            class=""
                                            href="#"
                                            data-te-dropdown-item-ref
                                    >logout
                                    </p>
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>
                {{-- <li x-data="{open: false}" class="relative">
                     <a
                             @click="open = !open"
                             class="cursor-pointer text-lg  flex items-center py-navbar-item px-navbar-item pr-5 hover:bg-slate-900"
                     >
               <span class="flex items-center">
                 <svg
                         xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 mr-2"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2"
                 >
                   <path
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                   />
                 </svg>
                 My Account
               </span>
                         <svg
                                 xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5 ml-2"
                                 viewBox="0 0 20 20"
                                 fill="currentColor"
                         >
                             <path
                                     fill-rule="evenodd"
                                     d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                     clip-rule="evenodd"
                             />
                         </svg>
                     </a>
                     <ul
                             @click.outside="open = false"
                             x-show="open"
                             x-transition
                             x-cloak
                             class="absolute z-10 right-0 bg-slate-800 py-2 w-48"
                     >
                         <li>
                             <a
                                     href="/src/profile.html"
                                     class="flex px-3 py-2 hover:bg-slate-900"
                             >
                                 <svg
                                         xmlns="http://www.w3.org/2000/svg"
                                         class="h-5 w-5 mr-2"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="2"
                                 >
                                     <path
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                     />
                                 </svg>
                                 My Profile
                             </a>
                         </li>
                         <li>
                             <a
                                     href="/src/orders.html"
                                     class="flex px-3 py-2 hover:bg-slate-900"
                             >
                                 <svg
                                         xmlns="http://www.w3.org/2000/svg"
                                         class="h-5 w-5 mr-2"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="2"
                                 >
                                     <path
                                             stroke-linecap="round"
                                             stroke-linejoin="round"
                                             d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                     />
                                 </svg>
                                 My Orders
                             </a>
                         </li>
                         <li>
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                                 <button class="flex px-3 py-2 hover:bg-slate-900" type="submit">
                                     <svg
                                             xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5 mr-2"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2"
                                     >
                                         <path
                                                 stroke-linecap="round"
                                                 stroke-linejoin="round"
                                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                         />
                                     </svg>
                                     Logout
                                 </button>
                             </form>
                         </li>
                     </ul>
                 </li>--}}
            @else
                <li>
                    <a
                            href="{{route('login')}}"
                            class="text-lg  text-neutral-500 flex items-center py-navbar-item px-navbar-item hover:text-neutral-700"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                        >
                            <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        Login
                    </a>
                </li>
                <li>

                    {{--                    btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700--}}

                    <a
                            href="{{route('register')}}"
                            class=" inline-flex items-center text-white bg-emerald-600 py-2 px-3 rounded shadow-md hover:bg-emerald-700 active:bg-emerald-800 transition-colors mx-5 inline-block rounded  px-6 pb-2 pt-2.5 text-base font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out  hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0  active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-4 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>


                        Register
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="p-4 block md:hidden"
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
                    d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
    </button>
</header>