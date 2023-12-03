<x-app-layout>

    <x-messages />

    <div class="grid grid-cols-1 sm:grid-cols-2 w-full">
        <div class="hidden sm:block">
            <img class="w-full h-full flex justify-center items-center object-cover" src={{asset('storage/backgrounds/login.jpeg')}} alt="" />
        </div>

        <div class="bg-gray-800 flex flex-col justify-center">
            <x-card.default class="max-w-[400px]">
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
                    <h2 class='text-3xl text-orange-500 font-bold text-center'>Forgot my password</h2>
                    <div class="mb-4 text-sm text-gray-700 dark:text-white">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                    </div>

                    <div class="block">
                        <x-form.label for="email" value="{{ __('Email') }}" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-form.input-error for="email" class="mt-2" />
                    </div>

                    <x-button.primary class="px-5 py-2.5 text-sm font-medium w-full">Email Password Reset Link</x-button.primary>
                </form>
            </x-card.default>
        </div>
    </div>
</x-app-layout>
