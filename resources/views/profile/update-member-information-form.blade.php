@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">
@endpush

<x-section.form submit="save">
    <x-slot name="title">
        Member Information
    </x-slot>

    <x-slot name="description">
        Additional information for members.
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 space-y-6">
            <div class="space-y-6">
                <div wire:ignore>
                    <x-form.label for="bio" value="Biography" />
                    <x-form.textarea id="bio" name="bio" wire:model.defer="bio"></x-form.textarea>
                    <x-form.input-error for="bio" class="mt-2" />
                </div>
            </div>
            <div class="flex justify-between gap-6">
                <div class="w-1/2">
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.label for="city" value="City" />
                        <x-form.input id="city" type="text" class="mt-1 block w-full" wire:model="city" />
                        <x-form.input-error for="city" class="mt-2" />
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="col-span-6 sm:col-span-4">
                        <x-form.label for="birthdate" value="Birthdate" />
                        <x-form.input id="birthdate" type="text" class="mt-1 block w-full" wire:model.blur="birthdate" placeholder="MM/DD/YYYY"/>
                        <x-form.input-error for="birthdate" class="mt-2" />
                    </div>
                </div>
            </div>
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
</x-section.form>

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            ClassicEditor
                .create(document.querySelector('#bio'), {
                    ckfinder: {
                        uploadUrl: '{{ route('admin.member.upload', ['_token' => csrf_token()]) }}'
                    }
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('bio', editor.getData());
                    })
                    Livewire.on('reinit', () => {
                        editor.setData('', '')
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        })

        let picker = new Pikaday({
            field: document.getElementById('birthdate'),
            format: 'MM/DD/YYYY',
            onSelect: function() {
                @this.set('birthdate', picker.toString())
            }
        })
    </script>
@endpush
