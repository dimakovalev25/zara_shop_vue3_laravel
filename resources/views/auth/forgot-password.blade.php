<x-app-layout>
{{--    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>--}}

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <main class="p-5">
        <form action="" method="post" class="w-[400px] mx-auto p-6 my-16">
            @csrf
            <h2 class="text-2xl font-semibold text-center mb-5">
                @lang('main.enter_mail')
            </h2>
            <p class="text-center text-gray-500 mb-6">

                <a
                        href="{{ route('login') }}"
                        class="text-purple-600 hover:text-purple-500"
                >@lang('main.or_login')</a
                >
            </p>

            <div class="mb-3">
                <x-input
                        id="loginEmail"
                        type="email"
                        name="email"
                        placeholder="{{ __('main.y_email') }}"
                        autofocus
                        required
                />
            </div>
            <button
                    class="btn-primary bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 w-full"
            >
                @lang('main.signup')
            </button>
        </form>
    </main>

</x-app-layout>
