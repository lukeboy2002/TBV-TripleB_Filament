<x-app-layout>
    <div class="max-w-6xl mx-auto mt-8 mx-4 px-4">
        <div class="grid grid-cols-1 gap-x-8 gap-y-2 sm:gap-y-10 pb-4 sm:pb-12 sm:grid-cols-4">
            <div class="grid grid-cols-1 sm:col-span-3">
                <livewire:member-overview />
            </div>
            <div class="side">
                <livewire:member-ranking />
            </div>
        </div>
    </div>
</x-app-layout>

