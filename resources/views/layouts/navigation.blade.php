<header
        x-data="{
        mobileMenuOpen: false,
        cartItemsCount: {{ \App\Http\Helpers\Cart::getCartItemsCount() }},

        watchlistItems: 0,
        scrolling: false,
        test: 'test!!!!!!!!'
    }"
        @cart-change.window="cartItemsCount = $event.detail.count"
        @scroll.window="scrolling = (window.scrollY > 0)"
        :class="{ 'h-20 p-3': !scrolling, 'h-16': scrolling }"
        class="flex justify-between bg-white shadow-md text-black fixed-header transition-all duration-300 ease-in-out myheader"
>


    {{--    logo--}}
    <div class="logo">
        {{--        <a href="/products" class="text-3xl block py-navbar-item pl-5"> Apples shop </a>--}}
        <a href="/products" class="text-3xl block py-navbar-item pl-5">@lang('main.online_shop') </a>
    </div>

    {{--        центральная менюшка--}}
    <nav class="hidden md:block p-6">

        <ul class="grid grid-flow-col gap-6">



            <li class="" data-te-nav-item-ref>
                <a
                        class="text-lg flex text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        data-te-nav-link-ref
                        href="{{route('locale', __('main.set_lang'))}}"
                >@lang('main.lang')

                    {{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" class="ml-2 w-5 h-5 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>



                                        </svg>--}}

                    @if(App::getLocale() === 'ru')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.9"
                             stroke="currentColor" class=" w-12 h-8 mt-[-2px] ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            <text font-size="8" x="7" y="15" fill="currentColor">En</text>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="0.9"
                             stroke="currentColor" class=" w-12 h-8 mt-[-2px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            <text font-size="8" x="7" y="15" fill="red">Ru</text>
                        </svg>

                    @endif
                </a>
            </li>

            <li class="">


                <div x-data="{
    categories: {{ json_encode(\App\Http\Helpers\Categories::getCategories()) }}
}" class="relative " data-te-dropdown-hover-toggle-ref>
                    <button

                            class="flex items-center text-neutral-500 whitespace-nowrap bg-white text-lg font-medium  shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-osut hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none hover:text-neutral-700"


                            type="button"
                            id="dropdownMenuButton9"
                            data-te-dropdown-toggle-ref
                            aria-expanded="false"
                            data-te-ripple-init>

                        @lang('main.categories')
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


                        <li >
                            <template x-for="category in categories" :key="category">

                                <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                   :href="category.id"
                                   x-text="category.title" data-te-dropdown-item-ref></a>

                            </template>

                        </li>
                    </ul>
                </div>
            </li>

            <div x-data="{ searchVisible: false }">
                <li >
                    <div class="mt-[-5px]">
                        <div >
                            <div x-show="searchVisible">
                                <form class=" flex w-full flex-wrap items-stretch" method="GET"
                                      action="{{route("search")}}">
                                    <input
                                            name="title"
                                            type="search"
                                            class="relative m-0 block flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-indigo-800 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                            aria-label="Search"
                                            aria-describedby="button-addon2"/>

                                    <button
                                            class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
                                            id="basic-addon2">
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                                class="h-5 w-5 text-neutral-500 transition duration-200 hover:text-neutral-700">
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                    clip-rule="evenodd"/>
                                        </svg>
                                    </button>

                                </form>
                            </div>

                            <button x-show="!searchVisible"
                                    @click="searchVisible = !searchVisible"
                                    class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
                                    id="basic-addon2">
                                <p class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400">
                                    @lang('main.search')</p>
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="h-5 w-5 text-neutral-500 transition duration-200 hover:text-neutral-700">
                                    <path
                                            fill-rule="evenodd"
                                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                            clip-rule="evenodd"/>
                                </svg>

                            </button>
                        </div>
                    </div>
                </li>
            </div>

            {{--     <li class="">


                     <div class="relative " data-te-dropdown-hover-toggle-ref>
                         <button

                                 class="flex items-center text-neutral-500 whitespace-nowrap bg-white text-lg font-medium  shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-osut hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none hover:text-neutral-700"


                                 type="button"
                                 id="dropdownMenuButton9"
                                 data-te-dropdown-toggle-ref
                                 aria-expanded="false"
                                 data-te-ripple-init>

                             @lang('main.info')
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
                                         class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                         href="#"
                                         data-te-dropdown-item-ref
                                 >action</a
                                 >
                             </li>
                             <li>
                                 <a
                                         class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                         href="#"
                                         data-te-dropdown-item-ref
                                 >another 2</a
                                 >
                             </li>

                         </ul>
                     </div>
                 </li>--}}

        </ul>
    </nav>

    {{--        правая менюшка--}}
    <nav class="hidden md:block">

        <ul class="grid grid-flow-col items-center">

            <div class="relative inline-flex w-fit mr-3">

                <div x-show="cartItemsCount"
                     x-transition
                     x-cloak
                     x-text="cartItemsCount"
                     class="absolute left-auto top-[11px] -right-4 z-10  -translate-y-1/8 translate-x-2/10 rotate-0 skew-x-0 skew-y-0 scale-x-10 scale-y-10 whitespace-nowrap rounded-full bg-indigo-700 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-white transform scale-100 hover:scale-110 transition-transform duration-300 ">
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
                    @lang('main.cart')

                </a>
            </div>


            @if(!Auth::guest())

                <div class="relative ml-3 pr-6" data-te-dropdown-hover-toggle-ref>
                    <button

                            class="flex items-center text-neutral-500 whitespace-nowrap bg-white text-lg font-medium  shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none hover:text-neutral-700"


                            type="button"
                            id="dropdownMenuButton9"
                            data-te-dropdown-toggle-ref
                            aria-expanded="false"
                            data-te-ripple-init>

                        @lang('main.my_acc')
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
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="{{ route('profile') }}"
                                    data-te-dropdown-item-ref
                            >    @lang('main.my_profile')</a
                            >
                        </li>
                        <li>
                            <a
                                    class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                    href="#"
                                    data-te-dropdown-item-ref
                            >@lang('main.my_orders')</a
                            >
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="flex block w-full whitespace-nowrap bg-transparent px-4 py-2 text-lg  font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                                        type="submit">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-5 w-5 mr-2 mt-1"
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
                                    <p
                                            class=""

                                            data-te-dropdown-item-ref
                                    >@lang('main.logout')
                                    </p>
                                </button>
                            </form>
                        </li>

                    </ul>
                </div>

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
                        @lang('main.login')
                    </a>
                </li>
                <li>

                    <a
                            href="{{route('register')}}"
                            class=" inline-flex items-center text-white bg-emerald-600 py-2 px-3 rounded shadow-md hover:bg-emerald-700 active:bg-emerald-800 transition-colors mx-5 inline-block rounded  px-6 pb-2 pt-2.5 text-base font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#14a44d] transition duration-150 ease-in-out  hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] focus:outline-none focus:ring-0  active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.3),0_4px_18px_0_rgba(20,164,77,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(20,164,77,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(20,164,77,0.2),0_4px_18px_0_rgba(20,164,77,0.1)]"
                    >

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="h-4 w-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>


                        @lang('main.register')
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    {{--            менюшка мобильная--}}
    <div class="block fixed z-10 top-0 bottom-0 height h-full w-[180px] transition-all bg-gray-300 md:hidden pl-6 pr-4 pt-10"
         :class="mobileMenuOpen ? 'left-0' : '-left-[180px]'">
        @if(!Auth::guest())
            <ul>
                <li class="pb-3" data-te-nav-item-ref>
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="{{route('locale', __('main.set_lang'))}}"
                            data-te-nav-link-ref
                    >@lang('main.lang')</a
                    >
                </li>


                <li class="pb-3" data-te-nav-item-ref>
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-nav-link-ref
                    >@lang('main.product')</a
                    >
                </li>
                <li class="pb-3" data-te-nav-item-ref>
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-nav-link-ref
                    >@lang('main.info')</a
                    >
                </li>

                <li class="pb-3">
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-dropdown-item-ref
                    >@lang('main.my_profile')</a
                    >
                </li>
                <li class="pb-3">
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-dropdown-item-ref
                    >@lang('main.my_orders')</a
                    >
                </li>
                <li class="pt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="flex block text-lg  text-red-500 transition duration-200 hover:text-red-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                                type="submit">
                            <p
                                    class=""
                                    data-te-dropdown-item-ref
                            >@lang('main.logout')
                            </p>


                        </button>
                    </form>

                </li>

            </ul>

        @else
            <ul class="">


                <li class="pb-3">
                    <a
                            href="{{route('login')}}"
                            class="flex block text-lg  text-green-700 transition duration-200 hover:text-green-800 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                    >
                        @lang('main.login')
                    </a>
                </li>

                <li class="pb-6">
                    <a
                            href="{{route('register')}}"
                            class="flex block text-lg  text-green-700 transition duration-200 hover:text-green-800 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                    >
                        @lang('main.register')
                    </a>
                </li>

                <li class="pb-3" data-te-nav-item-ref>
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="{{route('locale', __('main.set_lang'))}}"
                            data-te-nav-link-ref
                    >   @lang('main.lang')</a
                    >
                </li>

                <li class="pb-3" data-te-nav-item-ref>
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-nav-link-ref
                    >   @lang('main.product')</a
                    >
                </li>
                <li class="pb-3" data-te-nav-item-ref>
                    <a
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-nav-link-ref
                    >   @lang('main.info')</a>
                </li>


                @endif

            </ul>


    </div>

    {{--    button бутерброд--}}
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