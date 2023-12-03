<x-section.form submit="updatePassword">
    <x-slot name="title">
        Update Password
    </x-slot>

    <x-slot name="description">
        Ensure your account is using a long, random password to stay secure.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-form.label for="current_password" value="Current Password" />
            <x-form.input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-form.input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-form.label for="password" value="New Password" />
            <x-form.input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-form.input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-form.label for="password_confirmation" value="Confirm Password" />
            <x-form.input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-form.input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3 flex items-center" on="saved">
            <x-icons.icon name="check" class="mr-1"/>Saved.
        </x-action-message>

        <x-button.primary class="px-3 py-2 text-xs font-medium">Save</x-button.primary>
    </x-slot>
</x-section.form>
