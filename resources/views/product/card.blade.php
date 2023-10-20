<div x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                      'addToCartUrl' => route('cart.add', $product)
                ]) }})" class="container mx-auto card_item">

    <div x-data="{images: ['{{$product->image}}']">

        <main class="my-8">
            <div class="container mx-auto px-6 pt-2 border-2 border-orange-900 ">
                <div class="md:flex md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96 ">

                            <img src="{{ $product->image }}" alt="" class="w-auto mx-auto"/>

                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <h3 class="text-gray-700 uppercase text-lg">   {{$product->title}}</h3>
                        <span class="text-gray-500 mt-3">$   {{$product->price}}</span>
                        <hr class="my-3">
                        <div class="mt-2">
                            <label class="text-gray-700 text-sm" for="count">Count:</label>
                            <input
                                    type="number"
                                    name="quantity"
                                    x-ref="quantityEl"
                                    value="1"
                                    min="1"
                                    class="w-32 focus:border-purple-500 focus:outline-none rounded"
                            />

                        </div>
                        <div class="mt-3">
                            <label class="text-gray-700 text-sm" for="count">Color:</label>
                            <div class="flex items-center mt-1">
                                <button class="h-5 w-5 rounded-full bg-blue-600 border-2 border-blue-200 mr-2 focus:outline-none"></button>
                                <button class="h-5 w-5 rounded-full bg-teal-600 mr-2 focus:outline-none"></button>
                                <button class="h-5 w-5 rounded-full bg-pink-600 mr-2 focus:outline-none"></button>
                            </div>
                        </div>
                        <div class="flex items-center mt-6">
                            <button @click="addToCart($refs.quantityEl.value)"
                                    class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                                Order Now
                            </button>

                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>


</div>