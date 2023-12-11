<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-2 w-full">
        <div class="hidden sm:block">
            <img class="w-full h-full flex justify-center items-center object-cover" src={{asset('storage/backgrounds/register.jpeg')}} alt="" />
        </div>

        <div class="bg-gray-800 flex flex-col justify-center">
            <x-card.default class="max-w-[400px]">
                <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <h2 class='text-3xl text-orange-500 font-bold text-center'>Complete your invitation</h2>
                    <input type="hidden" id="invited_by" name="invited_by" value="{{ $invitation->invited_by }}">

                    <div>
                        <x-form.label for="name" value="Username" />
                        <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-form.input-error for="name" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-form.label for="email" value="{{ __('Email') }}" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $email)" required autocomplete="email" />
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
                    <x-button.primary class="px-5 py-2.5 text-sm font-medium w-full">Register</x-button.primary>
                </form>
            </x-card.default>
        </div>
    </div>
</x-app-layout>
