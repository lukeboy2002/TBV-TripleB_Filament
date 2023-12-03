<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 w-full">
        <div class="hidden sm:block">
            <img class="w-full h-full flex justify-center items-center object-cover" src={{asset('storage/backgrounds/login.jpeg')}} alt="" />
        </div>

        <div class="bg-gray-800 flex flex-col justify-center">
            <x-card.default class="max-w-[400px]">
                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    <h2 class='text-3xl text-orange-500 font-bold text-center'>Change password</h2>
                    <div class="mb-4 text-sm text-gray-700 dark:text-white">
                        Create a new password for your account.
                    </div>

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="block">
                        <x-form.label for="email" value="Email" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        <x-form.input-error for="email" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="password" value="Password" />
                        <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-form.input-error for="password" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="password_confirmation" value="Confirm Password" />
                        <x-form.input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-form.input-error for="password_confirmation" class="mt-2" />
                    </div>

                    <x-button.primary class="px-5 py-2.5 text-sm font-medium w-full">Reset Password</x-button.primary>
                </form>
            </x-card.default>
        </div>

    </div>
</x-app-layout>
