<x-app-layout>

    <main class="p-5">
        <form action="{{ route('login') }}" method="POST" class="w-[400px] mx-auto p-6 my-16">
            @csrf
            <h2 class="text-2xl font-semibold text-center mb-5">
                @lang('main.login_acc')
            </h2>
            <p class="text-center text-gray-500 mb-6">

                <a
                        href="{{ route('register') }}"
                        class="text-sm text-purple-700 hover:text-purple-600"
                >@lang('main.login_or')</a
                >
{{--   show errors!!!!!            <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}

            </p>
            <div class="mb-4">
                <x-input
                        id="loginEmail"
                        type="email"
                        name="email"
                        :value="old('email')"
                        :errors="$errors"
{{--                        placeholder="Your email address"--}}
                        placeholder="{{ __('main.y_email') }}"
                />
            </div>
            <div class="mb-4">
                <x-input
                        id="loginPassword"
                        type="password"
                        :value="old('password')"
                        :errors="$errors"
                        name="password"
                        placeholder="{{ __('main.y_pass') }}"
                />
            </div>

            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center">
                    <input
                            id="loginRememberMe"
                            type="checkbox"
                            class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
                    />
                    <label for="loginRememberMe">@lang('main.remember')</label>
                </div>
                <a href="{{route('password.request')}}" class="text-sm text-purple-700 hover:text-purple-600">@lang('main.forgot')</a>
            </div>
            <button
                    class="btn-primary  bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 w-full"
            >
                @lang('main.login')
            </button>
        </form>
    </main>

</x-app-layout>
