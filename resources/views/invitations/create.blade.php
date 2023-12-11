<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-section.action>
                <x-slot name="title">
                    Invite a new User
                </x-slot>
                <x-slot name="description">
                    A new user can view additional info and can give comments
                </x-slot>


                    <x-slot name="content">
                        <form method="POST" action="{{ route('admin.invitations.store') }}" class="space-y-6">
                            @csrf
                            <div class="max-w-xl text-sm text-gray-700 dark:text-white">
                                <x-form.label for="email" value="Email" />
                                <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
                                <x-form.input-error for="email" class="mt-2" />
                            </div>

                            <div class="mt-5 w-full flex justify-end">
                                <x-button.primary class="px-3 py-2 text-xs font-medium">Invite user</x-button.primary>
                            </div>
                        </form>
                    </x-slot>

            </x-section.action>
        </div>
    </div>
</x-app-layout>
