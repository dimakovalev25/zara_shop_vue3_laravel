<div class=" bg-neutral-100 text-center text-neutral-600 dark:bg-neutral-600 dark:text-neutral-200">

    <div class="mx-6 py-10 text-center md:text-left">
        <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="">
                <h6
                        class="mb-4 flex items-center justify-center font-semibold md:justify-start">

                    @lang('main.online_shop')
                </h6>
                <p>

                </p>
            </div>

            <div class="">
                <h6
                        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                    @lang('main.categories')
                </h6>

                <div x-data="{
    categories: {{ json_encode(\App\Http\Helpers\Categories::getCategories()) }}
}" class="relative " data-te-dropdown-hover-toggle-ref>
                    <p class="mb-4">

                        <template x-for="category in categories" :key="category.id">
                            <div class="mb-4">

                                <a class="text-neutral-600 dark:text-neutral-200"
                                   :href="category.id"
                                   x-text="category.title"></a>
                            </div>


                        </template>

                    </p>
                </div>


            </div>

            <div class="">
                <h6
                        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                    @lang('main.useful')
                </h6>
                <p class="mb-4">
                    <a href="#!" class="text-neutral-600 dark:text-neutral-200"
                    >@lang('main.gar')</a
                    >
                </p>
                <p class="mb-4">
                    <a href="#!" class="text-neutral-600 dark:text-neutral-200"
                    >@lang('main.delivery')</a
                    >
                </p>

            </div>

            <div>
                <h6
                        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                    @lang('main.contacts')
                </h6>
                <p class="mb-4 flex items-center justify-center md:justify-start">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="mr-3 h-5 w-5">
                        <path
                                d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"/>
                        <path
                                d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"/>
                    </svg>
                    @lang('main.ip')
                </p>
                <p class="mb-4 flex items-center justify-center md:justify-start">
                    <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="mr-3 h-5 w-5">
                        <path
                                fill-rule="evenodd"
                                d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                                clip-rule="evenodd"/>
                    </svg>
                    + 375(29) 900 99 99
                </p>

            </div>
        </div>
    </div>

    <div class="bg-neutral-200 p-6 text-center dark:bg-neutral-700">
        <span>© 2023 @lang('main.all_rights')</span>

    </div>

</div>

