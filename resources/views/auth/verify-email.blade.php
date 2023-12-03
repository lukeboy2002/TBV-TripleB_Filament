<x-app-layout>
    <x-card.default class="max-w-[400px] mt-10">
        <div class="mb-4 text-sm text-gray-700 dark:text-white">
            Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                A new verification link has been sent to the email address you provided in your profile settings.
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button.primary class="px-3 py-2 text-xs font-medium" type="submit">
                        Resend Verification Email
                    </x-button.primary>
                </div>
            </form>

            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <x-button.primary type="submit" class="px-3 py-2 text-xs font-medium">
                        Log Out
                    </x-button.primary>
                </form>
            </div>
        </div>
    </x-card.default>
</x-app-layout>
