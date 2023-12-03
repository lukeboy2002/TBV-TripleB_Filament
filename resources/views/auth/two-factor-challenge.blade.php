<x-app-layout>
    <x-card.small>
{{--        <x-slot name="logo">--}}
{{--            <x-authentication-card-logo />--}}
{{--        </x-slot>--}}

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-700 dark:text-white" x-show="! recovery">
                Please confirm access to your account by entering the authentication code provided by your authenticator application.
            </div>

            <div class="mb-4 text-sm text-gray-700 dark:text-white" x-cloak x-show="recovery">
                Please confirm access to your account by entering one of your emergency recovery codes.
            </div>

{{--            <x-validation-errors class="mb-4" />--}}

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-form.label for="code" value="Code" />
                    <x-form.input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                    <x-form.input-error for="code" class="mt-2" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-form.label for="recovery_code" value="Recovery Code" />
                    <x-form.input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                    <x-form.input-error for="recovery_code" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button.secondary type="button" class="px-3 py-2 text-xs font-medium"
                                         x-show="! recovery"
                                         x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </x-button.secondary>

                    <x-button.secondary type="button" class="px-3 py-2 text-xs font-medium"
                                         x-show="recovery"
                                         x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </x-button.secondary>

                    <x-button.primary class="ml-4 px-3 py-2 text-xs font-medium">
                        {{ __('Log in') }}
                    </x-button.primary>
                </div>
            </form>
        </div>
    </x-card.small>
</x-app-layout>
