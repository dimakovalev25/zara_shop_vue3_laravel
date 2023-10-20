<div x-data="{
images: ['storage/a3.jpg', 'storage/a1.jpg', 'storage/a4.jpg'],
activeImg : null,
init() {
this.activeImg = this.images[0]
},

prev() {
const index = this.images.indexOf(this.activeImg)
if(index === 0 ) return
this.activeImg = this.images[index - 1]
},
next() {
const index = this.images.indexOf(this.activeImg)
if(index === this.images.length - 1 ) return
this.activeImg = this.images[index + 1]
},

}">
    <div class="mt-[80px] relative max-[525px]:hidden">
        <template x-for="(image, index) in images" :key="index">
            <div class="relative">
                <img x-show="activeImg === image" x-transition :src="image"
                     class="block w-full h-[500px] object-cover"/>
                <h5 class="absolute text-center text-white text-xl bottom-12 left-0 right-0 text-center py-4 bg-opacity-50">
                    @lang('main.slider_title')
                </h5>
                <h5 class="absolute text-center text-white text-xl bottom-2 left-0 right-0 text-center py-4 bg-opacity-50">
                    @lang('main.slider_desc')
                </h5>
            </div>
        </template>

        {{--        <img
                        :src="activeImg"
                        class="block w-full h-[500px] object-cover"
                />--}}

        <a @click.prevent="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="white"
                 class="w-12 h-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
        </a>

        <a @click.prevent="next" class="absolute right-0 top-1/2 transform -translate-y-1/2" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="white"
                 class="w-12 h-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
        </a>

    </div>

    {{--    <div class="flex">
            <img
                    src="{{ asset('storage/a1.jpg') }}"
                    class="block w-full h-[500px] object-cover"
            />
            <img
                    src="{{ asset('storage/a2.jpg') }}"
                    class="block w-full h-[500px] object-cover"
            />
        </div>--}}

</div>