
<div
        id="carouselExampleCaptions"
        class="relative carousel h-[400px] max-[525px]:hidden"
        data-te-carousel-init
        data-te-ride="carousel">
    <!--Carousel indicators-->
    <div
            class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-te-carousel-indicators>
        <button
                type="button"
                data-te-target="#carouselExampleCaptions"
                data-te-slide-to="0"
                data-te-carousel-active
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-current="true"
                aria-label="Slide 1"></button>
        <button
                type="button"
                data-te-target="#carouselExampleCaptions"
                data-te-slide-to="1"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 2"></button>
        <button
                type="button"
                data-te-target="#carouselExampleCaptions"
                data-te-slide-to="2"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                aria-label="Slide 3"></button>
    </div>

    <!--Carousel items-->
    <div
            class="relative w-full overflow-hidden after:clear-both after:block after:content-['']">
        <!--First item-->
        <div
                class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-active
                data-te-carousel-item
                style="backface-visibility: hidden">
            <img
                    src="{{ asset('storage/a3.jpg') }}"
                    class="block w-full  h-[400px] object-cover"
                    alt="..." />
            <div
                    class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                <h5 class="text-xl text-white-100"> @lang('main.slider_desc')</h5>
                <p class="text-white-100">
                    @lang('main.slider_title')
                </p>
            </div>
        </div>
        <!--Second item-->
        <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item
                style="backface-visibility: hidden">
            <img
                    src="{{ asset('storage/a1.jpg') }}"
                    class="block w-full  h-[400px] object-cover"
                    alt="..." />
            <div
                    class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                <h5 class="text-xl">@lang('main.slider_desc2')</h5>
                <p>
                    @lang('main.slider_title2')
                </p>
            </div>
        </div>
        <!--Third item-->
        <div
                class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item
                style="backface-visibility: hidden">
            <img
                    src="{{ asset('storage/a4.jpg') }}"
                    class="block w-full  h-[400px] object-cover"
                    alt="..." />
            <div
                    class="absolute inset-x-[15%] bottom-5 hidden py-5 text-center text-white md:block">
                <h5 class="text-xl text-red-500">@lang('main.slider_title')</h5>
                <p class="text-red-500">
                    @lang('main.slider_desc')
                </p>
            </div>
        </div>
    </div>

</div>

