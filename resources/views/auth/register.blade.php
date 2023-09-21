<x-app-layout>
    <main class="p-5">
        <form action="{{ route('login') }}" method="POST" class="w-[400px] mx-auto p-6 my-16">
            @csrf
            <h2 class="text-2xl font-semibold text-center mb-5">
                Create new account
            </h2>
         {{--   <p class="text-center text-gray-500 mb-6">
                or
                <a
                        href="{{ route('register') }}"
                        class="text-sm text-purple-700 hover:text-purple-600"
                >create new account</a
                >


                --}}{{--   show errors!!!!!            <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}{{--

            </p>--}}

            <div class="mb-4">
                <x-input
                        type="text"
                        :errors="$errors"
                        name="name"
                        placeholder="Your name"
                />
            </div>

            <div class="mb-4">
                <x-input
                        type="number"
                        :errors="$errors"
                        name="phone"
                        placeholder="Your phone"
                />
            </div>

            <div class="mb-4">
                <x-input
                        type="email"
                        name="email"
                        :errors="$errors"
                        placeholder="Your email address"
                />
            </div>
            <div class="mb-4">
                <x-input
                        type="password"
                        :errors="$errors"
                        name="password"
                        placeholder="Your password"
                />
            </div>

            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center">
                    <input
                            id="loginRememberMe"
                            type="checkbox"
                            class="mr-3 rounded border-gray-300 text-purple-500 focus:ring-purple-500"
                    />
                    <label for="loginRememberMe">Remember Me</label>
                </div>

            </div>
            <button
                    class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
            >
                Register
            </button>
        </form>
    </main>

{{--
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>--}}
</x-app-layout>
