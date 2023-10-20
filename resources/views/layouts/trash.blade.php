<div class="relative py-16 bg-gradient-to-br from-sky-50 to-gray-200">
    <div class="relative container m-auto px-6 text-gray-500 md:px-12 xl:px-40">
        <div class="m-auto md:w-8/12 lg:w-6/12 xl:w-6/12">
            <div class="rounded-xl bg-white shadow-xl">
                <div class="p-6 sm:p-16">
                    <div class="space-y-4">

                        <h2 class="mb-8 text-2xl text-cyan-900 font-bold">Landing Page Heading<br>
                            Heading Content</h2>
                    </div>
                    <div class="mt-16 grid space-y-4">
                        <button class="group h-12 px-6 border-2 border-gray-300 rounded-full transition duration-300
 hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                            <div class="relative flex items-center space-x-4 justify-center">
                                <a href="">
                                    <span class="block w-max font-semibold tracking-wide text-gray-700 text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">Title 1</span>
                                </a>
                            </div>
                        </button>
                        <button class="group h-12 px-6 border-2 border-gray-300 rounded-full transition duration-300
 hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                            <div class="relative flex items-center space-x-4 justify-center">

                                <a href="">
                                    <span class="block w-max font-semibold tracking-wide text-gray-700 text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">Title 2</span>
                                </a></div>
                        </button>
                        <button class="group h-12 px-6 border-2 border-gray-300 rounded-full transition duration-300
                                     hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                            <div class="relative flex items-center space-x-4 justify-center">

                                <a href="">
                                    <span class="block w-max font-semibold tracking-wide text-gray-700 text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">Title 3</span>
                                </a></div>
                        </button>
                        <button class="group h-12 px-6 border-2 border-gray-300 rounded-full transition duration-300
                                     hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                            <div class="relative flex items-center space-x-4 justify-center">

                                <a href="">
                                    <span class="block w-max font-semibold tracking-wide text-gray-700 text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">Title 4</span>
                                </a></div>
                        </button>
                        <button class="group h-12 px-6 border-2 border-gray-300 rounded-full transition duration-300
                                     hover:border-blue-400 focus:bg-blue-50 active:bg-blue-100">
                            <div class="relative flex items-center space-x-4 justify-center">

                                <a href="">
                                    <span class="block w-max font-semibold tracking-wide text-gray-700 text-sm transition duration-300 group-hover:text-blue-600 sm:text-base">Title 5</span>
                                </a></div>
                        </button>
                    </div>

                    <div class="mt-32 space-y-4 text-gray-600 text-center sm:-mb-8">
                        <p class="text-xs">By proceeding, you agree to our <a href="" class="underline">Disclaimer</a> and confirm you have read our <a href="" class="underline">Privacy and Cookie Statement</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--            менюшка мобильная--}}
{{--
<div class="font-bold text-xl block fixed z-10 top-0 bottom-0 shadow-md height h-full w-[230px] transition-all bg-gray-200 md:hidden pl-6 pr-4 pt-10"
     :class="mobileMenuOpen ? 'left-0' : '-left-[230px]'">
    @if(!Auth::guest())
        <ul>
            <div x-data="{ searchVisible: false }">

                <div class="ml-[-12px]">

                    <div class="border-2 " x-show="searchVisible">
                        <form class="flex " method="GET"
                              action="{{route("search")}}">
                            <input
                                    name="title"
                                    type="search"
                                    class="mobile-input w-[70%] mb-5 ml-3 rounded border border-solid border-gray-700 bg-transparent bg-clip-padding leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-gray-800 focus:text-gray-800 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                    aria-label="Search"
                                    aria-describedby="button-addon2"/>

                            <button
                                    id="basic-addon2">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="h-5 w-5 mt-[-19px] text-neutral-500 transition duration-200 hover:text-neutral-700">
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
                        <p class="text-lg font-bold text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400">
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

            --}}
{{--language--}}{{--

            <li class="" data-te-nav-item-ref>
                <a
                        class="text-lg flex text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        data-te-nav-link-ref
                        href="{{route('locale', __('main.set_lang'))}}"
                >@lang('main.lang')
                    @if(App::getLocale() === 'ru')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="0.9"
                             stroke="currentColor" class=" w-12 h-8 mt-[-2px] ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            <text font-size="8" x="7" y="15" fill="currentColor">En</text>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="0.9"
                             stroke="currentColor" class=" w-12 h-8 mt-[-2px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            <text font-size="8" x="7" y="15" fill="red">Ru</text>
                        </svg>

                    @endif
                </a>
            </li>

            --}}
{{--                categories--}}{{--

            <li class="">


                <div x-data="{
    categories: {{ json_encode(\App\Http\Helpers\Categories::getCategories()) }}
}" class="relative " data-te-dropdown-hover-toggle-ref>

                    <p
                            class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-dropdown-item-ref
                    >@lang('main.categories')</p>

                    <p class="mb-4">

                        <template x-for="category in categories" :key="category.id">
                            <div class="ml-5 mt-2">

                                <a class="text-neutral-900 dark:text-neutral-200"
                                   :href="category.id"
                                   x-text="category.title"></a>
                            </div>


                        </template>

                    </p>
                </div>


            <li class="mb-4">
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="{{route('cart.index')}}"
                        data-te-dropdown-item-ref
                >@lang('main.my_cart')</a
                >
            </li>

            <li class="mb-4">
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="#"
                        data-te-dropdown-item-ref
                >@lang('main.my_profile')</a
                >
            </li>
            <li class="mb-4">
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="#"
                        data-te-dropdown-item-ref
                >@lang('main.my_orders')</a
                >
            </li>
            <li class="mb-4">
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

            <div x-data="{ searchVisible: false }">

                <div class="ml-[-12px]">

                    <div x-show="searchVisible">
                        <form class="flex " method="GET"
                              action="{{route("search")}}">
                            <input
                                    name="title"
                                    type="search"
                                    class="mobile-input mb-5 rounded border border-solid border-gray-700 bg-transparent bg-clip-padding leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-gray-800 focus:text-gray-800 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                    aria-label="Search"
                                    aria-describedby="button-addon2"/>

                            <button
                                    class=""
                                    id="basic-addon2">
                                <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="h-5 w-5 mt-[-19px] text-neutral-500 transition duration-200 hover:text-neutral-700">
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
                        <p class="text-lg font-bold text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400">
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

            <li class="mb-4" data-te-nav-item-ref>
                <a
                        class="text-lg flex text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        data-te-nav-link-ref
                        href="{{route('locale', __('main.set_lang'))}}"
                >@lang('main.lang')
                    @if(App::getLocale() === 'ru')
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="0.9"
                             stroke="currentColor" class=" w-12 h-8 mt-[-2px] ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            <text font-size="8" x="7" y="15" fill="currentColor">En</text>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="0.9"
                             stroke="currentColor" class=" w-12 h-8 mt-[-2px]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/>
                            <text font-size="8" x="7" y="15" fill="red">Ru</text>
                        </svg>

                    @endif
                </a>
            </li>

            --}}
{{--          <li class="pb-3" data-te-nav-item-ref>
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
                      </li>--}}{{--

            <div x-data="{
    categories: {{ json_encode(\App\Http\Helpers\Categories::getCategories()) }}
}" class="relative " data-te-dropdown-hover-toggle-ref>

                <p
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="#"
                        data-te-dropdown-item-ref
                >@lang('main.categories')</p>

                <p class="mb-4">

                    <template x-for="category in categories" :key="category.id">
                        <div class="ml-5 mt-2">

                            <a class="text-neutral-900 dark:text-neutral-200"
                               :href="category.id"
                               x-text="category.title"></a>
                        </div>


                    </template>

                </p>
            </div>

            <li class="mb-4">
                <a
                        class="text-lg  text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                        href="{{route('cart.index')}}"
                        data-te-dropdown-item-ref
                >@lang('main.my_cart')</a
                >
            </li>


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
            @endif

        </ul>


</div>--}}
