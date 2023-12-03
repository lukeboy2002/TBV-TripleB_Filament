<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 w-full">
        <div class="hidden sm:block">
            <img class="w-full h-full flex justify-center items-center object-cover" src={{asset('storage/backgrounds/register.jpeg')}} alt="" />
        </div>

        <div class="bg-gray-800 flex flex-col justify-center">
            <x-card.default class="max-w-[400px]">
                <form method="POST" action="{{ route('register') }}" class=" space-y-6">
                    @csrf
                    <h2 class='text-3xl text-orange-500 font-bold text-center'>Register your account</h2>

                    <div>
                        <x-form.label for="username" value="Username" />
                        <x-form.input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                        <x-form.input-error for="username" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-form.label for="email" value="Email" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
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
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-form.label for="terms">
                                <div class="flex items-center">
                                    <x-form.checkbox name="terms" id="terms" required />
                                    <div class="ml-2">
                                        I agree to the
                                        <x-link.primary class="underline" href="{{ route('terms.show') }}">Terms of Service</x-link.primary>
                                        and
                                        <x-link.primary class="underline" href="{{ route('policy.show') }}">Privacy Policy</x-link.primary>
                                    </div>
                                </div>
                            </x-form.label>
                        </div>
                    @endif
                    <div class="flex items-center justify-end">
                        <x-link.primary href="{{ route('login') }}">Already registered?</x-link.primary>
                    </div>
                    <x-button.primary class="px-5 py-2.5 text-sm font-medium w-full">Register</x-button.primary>
                </form>
            </x-card.default>
        </div>
    </div>
</x-app-layout>
