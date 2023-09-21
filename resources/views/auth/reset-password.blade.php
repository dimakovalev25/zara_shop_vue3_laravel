<x-app-layout>

    <main class="p-5">
        <form action="" method="post" class="w-[400px] mx-auto p-6 my-16">
            @csrf
            <h2 class="text-2xl font-semibold text-center mb-5">
                Enter your Email to reset password
            </h2>
            <p class="text-center text-gray-500 mb-6">
                or
                <a
                        href="/src/login.html"
                        class="text-purple-600 hover:text-purple-500"
                >login with existing account</a
                >
            </p>

            <div class="mb-3">
                <input
                        id="loginEmail"
                        type="email"
                        name="email"
                        placeholder="Your email address"
                        class="border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full"
                />
            </div>
            <button
                    class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
            >
                Submit
            </button>
        </form>
    </main>


  {{--  <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>--}}
</x-app-layout>
