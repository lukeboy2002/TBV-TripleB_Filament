<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 w-full">
        <div class="hidden sm:block">
            <img class="w-full h-full flex justify-center items-center object-cover" src={{asset('storage/backgrounds/login.jpeg')}} alt="" />
        </div>

        <div class="bg-gray-800 flex flex-col justify-center">
            <x-card.default class="max-w-[400px]">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <h2 class='text-3xl text-orange-500 font-bold text-center'>Sign in to your account</h2>

                    <div>
                        <x-form.label for="email" value="Email" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                        <x-form.input-error for="email" class="mt-2" />
                    </div>
                    <div>
                        <x-form.label for="password" value="Password" />
                        <x-form.input type="password" name="password" id="password" required autocomplete="current-password" />
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex space-x-2">
                            <x-form.checkbox id="remember_me" name="remember" value="1" />
                            <x-form.label for="remember_me" value="Remember me" />
                        </div>
                        @if (Route::has('password.request'))
                            <x-link.primary href="{{ route('password.request') }}">Forgot your password?</x-link.primary>
                        @endif
                    </div>

                    <x-button.primary class="px-5 py-2.5 text-sm font-medium w-full">Log in</x-button.primary>
                </form>
            </x-card.default>
        </div>
    </div>
</x-app-layout>
