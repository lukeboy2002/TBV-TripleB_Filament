<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-section.form submit="save">
                <x-slot name="title">
                    Invite a new User
                </x-slot>

                <x-slot name="description">
                    A new user can view additional info and can give comments
                </x-slot>

                <form action="{{ route('admin.invitations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4">
                            <x-form.label for="email" value="Email" />
                            <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                            <x-form.input-error for="email" class="mt-2" />
                        </div>
                    </x-slot>
                    <x-slot name="actions">
                        <div class="flex items-center space-x-2">
                            <x-messages />
                            <x-button.primary class="px-3 py-2 text-xs font-medium">
                                Save
                            </x-button.primary>
                        </div>
                    </x-slot>
                </form>
            </x-section.form>
        </div>
    </div>
</x-app-layout>
