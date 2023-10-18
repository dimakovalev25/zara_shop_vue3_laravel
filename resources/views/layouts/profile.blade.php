<x-app-layout>
    <div x-data="{
    flashMessage: '{{\Illuminate\Support\Facades\Session::get('flash_message')}}',
            init() {
                if (this.flashMessage) {
                    setTimeout(() => this.$dispatch('notify', {message: this.flashMessage}), 200)
                }
            }

    }" class="container mt-[70px] lg:w-2/3 xl:w-2/3 mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-5 items-start gap-6">
            <div class="col-span-3 bg-white p-4 rounded-lg shadow">

                <!-- Profile Details -->
                <div class="mb-6">
                    <h2 class="text-xl mb-5">@lang('main.my_profile')</h2>
                    <div class="mb-4">
                        <input
                                placeholder="{{ __('main.y_name') }}"
                                type="text"
                                name="name"
                                value="{{$user->name}}"
                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                    <div class="mb-4">
                        <input
                                placeholder="{{ __('main.y_email') }}"
                                type="email"
                                name="email"
                                value="{{$user->email}}"
                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
{{--                    <div class="mb-4">
                        <input
                                placeholder="{{ __('main.y_phone') }}"
                                type="text"
                                name="phone"
                                value="{{$customer->phone ? $customer->phone : 'no data'}}"
                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>--}}
                </div>


                <div class="mb-6">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="text-xl">@lang('main.ship_address')</h2>

                    </div>
                    <div class="flex gap-3">
                        <div class="flex-1">
                            <select
                                    placeholder="Country"
                                    type="text"
                                    name="country"
                                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                            >

                                    <option value="bel">{{ __('main.bel') }}</option>

                            </select>
                        </div>

                        <div class="flex-1">
                            <input
                                    placeholder="{{ __('main.zipcode') }}"
                                    type="text"
                                    name="zipcode"
                                    class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.area') }}"
                                type="text"

                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.city') }}"
                                type="text"

                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="mb-4 flex-1">
                        <input
                                placeholder="{{ __('main.street') }}"
                                type="text"

                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                </div>

                <button class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full">@lang('main.update')</button>
            </div>

            <div class="col-span-2 bg-white p-4 rounded-lg shadow">
                <h2 class="text-xl mb-5">@lang('main.my_acc')</h2>
                <h2 class="text-xs mb-5">@lang('main.change_pass')</h2>


                <form method="post" action="{{ route('password-update') }}">
                    @csrf


                    <div class="mb-4">
                        <input
                                type="password"
                                name="old_password"
                                placeholder="{{__('main.y_pass')}}"
                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                    <div class="mb-4">
                        <input
                                type="password"
                                name="new_password"
                                placeholder="{{__('main.new_pass')}}"
                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                    <div class="mb-4">
                        <input
                                type="password"
                                name="new_password_confirmation"
                                placeholder="{{__('main.new_pass2')}}"
                                class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                        />
                    </div>
                    <div>
                        <button class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700">@lang('main.update')</button>
                    </div>

                </form>

            </div>
        </div>


    </div>


</x-app-layout>