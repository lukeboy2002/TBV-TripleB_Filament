<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section.title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section.title>


    <div class="mt-5 md:mt-0 md:col-span-2 border border-gray-200 sm:rounded-lg dark:border-gray-700 shadow-md">
        <div class="p-4 sm:p-6 md:p-8">
            {{ $content }}
        </div>
    </div>
</div>
