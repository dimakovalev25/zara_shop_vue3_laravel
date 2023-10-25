<x-app-layout>

    <div class="pt-16 px-[15%] max-[525px]:pt-12 min-[725px]:px-[30%] mt-10">


        <div class="mb-4 mt-[70px] text-sm text-gray-600 dark:text-gray-400">

            @lang('main.reg1')
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">

                @lang('main.reg2')

            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>

                        @lang('main.reg3')
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    @lang('main.logout')
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
