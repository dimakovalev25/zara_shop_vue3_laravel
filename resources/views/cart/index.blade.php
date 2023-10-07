<x-app-layout>
    <div class="container lg:w-2/3 xl:w-2/3 mx-auto  cart" x-data="{
            confirmationFormOpen: false,
    }">


        <h1 class="text-3xl font-bold mb-6">@lang('main.items')</h1>

        <div x-data="{cartItems: {{ json_encode(
                    $products->map(fn($product) => [
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'quantity' => $cartItems[$product->id]['quantity'],
                         'href' => route('product', $product->id),
                        'removeUrl' => route('cart.remove', $product),
                        'updateQuantityUrl' => route('cart.update-quantity', $product)
                    ])
                )
            }},
            get cartTotal() {
                return this.cartItems.reduce((accum, next) => accum + next.price * next.quantity, 0).toFixed(2)
            },
        }" class="bg-white p-4 rounded-lg shadow">
            <!-- Product Items -->
            <template x-if="cartItems.length">
                <div>
                    <!-- Product Item -->
                    <template x-for="product of cartItems" :key="product.id">
                        <div x-data="productItem(product)">
                            <div
                                    class="w-full flex flex-col sm:flex-row items-center gap-4 flex-1">
                                <a :href="product.href"
                                   class="w-36 h-32 flex items-center justify-center overflow-hidden">
                                    <img :src="product.image" class="object-fit" alt=""/>
                                </a>
                                <div class="flex flex-col justify-between flex-1">
                                    <div class="flex justify-between mb-3">
                                        <h3 x-text="product.title"></h3>
                                        <span class="text-lg font-semibold">
                                            $<span x-text="product.price"></span>
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            Quantity:
                                            <input
                                                    type="number"
                                                    min="1"
                                                    x-model="product.quantity"
                                                    @change="changeQuantity()"
                                                    class="ml-3 py-1 border-gray-200 focus:border-purple-600 focus:ring-purple-600 w-16"
                                            />
                                        </div>
                                        <a
                                                href="#"
                                                @click.prevent="removeItemFromCart()"
                                                class="text-indigo-600 hover:text-indigo-800"
                                        >@lang('main.delete')</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <!--/ Product Item -->
                            <hr class="my-5"/>
                        </div>
                    </template>
                    <!-- Product Item -->

                    <div class="border-t border-gray-300 pt-4">
                        <div class="flex justify-between">
                            <span class="font-semibold"> @lang('main.subtotal')</span>
                            <span id="cartTotal" class="text-xl" x-text="`$${cartTotal}`"></span>
                        </div>
                        <p class="text-gray-500 mb-6">
                            @lang('main.ship')
                        </p>


                        <div :style="{ visibility: confirmationFormOpen ? 'hidden' : 'visible' }">
                            <button @click="confirmationFormOpen = !confirmationFormOpen" type="submit"
                                    class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full">
                                @lang('main.proc')
                            </button>
                        </div>
                    </div>
                </div>


                <!--/ Product Items -->
            </template>

            <template x-if="!cartItems.length">
                <div class="text-center py-8 text-gray-500">
                    You don't have any items in cart
                </div>
            </template>

        </div>


        {{--form approve--}}
        <div class=" mt-3 bg-white p-4 rounded-lg shadow w-full"
             :style="{ visibility: confirmationFormOpen ? 'visible' : 'hidden' }">

            <form action="{{ route('approve') }}" method="POST" x-data="{ areaValid: false, cityValid: false, streetValid: false, nameValid: false, phoneValid: false }">
                @csrf
                <div class="mb-6">
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <select
                                    placeholder="Country"
                                    type="text"
                                    name="country"
                                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                            >
                                <option value="by">@lang('main.bel')</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.area') }}"
                                type="text"
                                name="area"
                                x-model="area"
                                x-on:input="areaValid = area.length >= 3"
                                :class="{ 'border-green-500': areaValid, 'border-red-300': !areaValid }"
                                class=" test border-[.2rem] rounded-md w-full focus:border-transparent outline-none"
                        />
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.city') }}"
                                type="text"
                                name="city"
                                x-model="city"
                                x-on:input="cityValid = city.length >= 3"
                                :class="{ 'border-green-500': cityValid, 'border-red-300': !cityValid }"
                                class=" test border-[.2rem] rounded-md w-full focus:border-transparent outline-none"
                        />
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.street') }}"
                                type="text"
                                name="street"
                                x-model="street"
                                x-on:input="streetValid = street.length >= 3"
                                :class="{ 'border-green-500': streetValid, 'border-red-300': !streetValid }"
                                class=" test border-[.2rem] rounded-md w-full focus:border-transparent outline-none"
                        />
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.y_full_name') }}"
                                type="text"
                                name="name"
                                x-model="name"
                                x-on:input="nameValid = name.length >= 3"
                                :class="{ 'border-green-500': nameValid, 'border-red-300': !nameValid }"
                                class=" test border-[.2rem] rounded-md w-full focus:border-transparent outline-none"
                        />
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.y_phone') }}"
                                type="number"
                                name="phone"
                                x-model="phone"
                                x-on:input="phoneValid = phone.length >= 6"
                                :class="{ 'border-green-500': phoneValid, 'border-red-300': !phoneValid }"
                                class=" test border-[.2rem] rounded-md w-full focus:border-transparent outline-none"
                        />
                    </div>
                </div>

                <button @click="changeQuantity2()" class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full">@lang('main.send_order')
                </button>
            </form>

        </div>


    </div>


    </div>
    </div>
</x-app-layout>