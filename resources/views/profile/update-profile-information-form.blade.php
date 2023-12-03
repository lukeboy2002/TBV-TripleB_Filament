<x-section.form submit="updateProfileInformation">
    <x-slot name="title">
        Profile Information
    </x-slot>

    <x-slot name="description">
        Update your account's profile information and email address.
    </x-slot>

    <x-slot name="form">

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                       wire:model="photo"
                       x-ref="photo"
                       x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-form.label for="photo" value="Avatar" class="mb-3"/>

                <div class="flex items-center space-x-8">
                    <div class="flex-col">
                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
                    </div>
                    <div class="flex h-auto space-x-2">
                        <x-button.secondary class="px-3 py-2 text-xs font-medium" type="button" x-on:click.prevent="$refs.photo.click()">
                            Select A New Photo
                        </x-button.secondary>

                        @if ($this->user->profile_photo_path)
                            <x-button.secondary type="button" class="px-3 py-2 text-xs font-medium" wire:click="deleteProfilePhoto">
                                Remove Photo
                            </x-button.secondary>
                        @endif
                    </div>
                </div>
                <x-form.input-error for="photo" class="mt-2" />
            </div>
        @endif

{{--        @if(current_user()->hasRole('user'))--}}
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-form.label for="name" value="Username" />
                <x-form.input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
                <x-form.input-error for="name" class="mt-2" />
            </div>
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-form.label for="email" value="Email" />
                <x-form.input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" autocomplete="name" />
                <x-form.input-error for="email" class="mt-2" />

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                    <div class="mt-2 flex items-center space-x-2">
                        <p class="text-sm text-gray-700 dark:text-white flex items-center">
                            <x-icons.icon name="error" class="mr-1 text-red-500"/> Your email address is unverified.
                        </p>
                        <x-button.link class="text-left" type="button" wire:click.prevent="sendEmailVerification">
                            Click here to re-send the verification email.
                        </x-button.link>
                    </div>

                    @if ($this->verificationLinkSent)
                        <p v-show="verificationLinkSent" class="mt-2 flex items-center font-medium text-sm text-green-600">
                            <x-icons.icon name="check" class="mr-1"/>A new verification link has been sent to your email address.
                        </p>
                    @endif
                @endif
            </div>
{{--        @endif--}}

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3 flex items-center" on="saved">
            <x-icons.icon name="check" class="mr-1"/>Saved</x-action-message>

        <x-button.primary class="px-3 py-2 text-xs font-medium" wire:loading.attr="disabled" wire:target="photo">
            Save
        </x-button.primary>
    </x-slot>
</x-section.form>
