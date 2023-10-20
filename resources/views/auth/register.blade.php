<x-app-layout>
    <div class="pt-16 px-[15%] max-[525px]:pt-12 min-[725px]:px-[30%] mt-10">


        <form
                action="{{ route('register') }}"
                method="post"
                class=""
        >
            @csrf

            <h2 class="text-2xl font-semibold text-center mb-4">@lang('main.new_acc')</h2>
            <p class="text-center text-gray-500 mb-3">

                <a
                        href="{{ route('login') }}"
                        class="text-sm text-purple-700 hover:text-purple-600"
                >
                    @lang('main.or_login')
                </a>
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <div class="mb-4">
                <x-input placeholder="{{ __('main.y_name') }}" type="text" name="name" :value="old('name')"/>
            </div>
            <div class="mb-4">
                <x-input placeholder="{{ __('main.y_email') }}" type="email" name="email" :value="old('email')"/>
            </div>
            <div class="mb-4">
                <x-input placeholder="{{ __('main.y_pass') }}" type="password" name="password"/>
            </div>
            <div class="mb-4">
                <x-input placeholder="{{ __('main.y_pass2') }}" type="password" name="password_confirmation"/>
            </div>

            <button
                    class="btn-primary bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 w-full"
            >
                @lang('main.signup')
            </button>
        </form>
    </div>
</x-app-layout>

