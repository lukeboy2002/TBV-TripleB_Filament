@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'block w-full px-4 py-2 text-left text-sm text-orange-500 dark:text-orange-500 bg-gray-100 hover:text-orange-500 dark:bg-gray-700 dark:hover:text-gray-200 focus:outline-none transition duration-150 ease-in-out'
                : 'block w-full px-4 py-2 text-left text-sm text-gray-700 dark:text-white hover:bg-gray-100 hover:text-orange-500 dark:hover:bg-gray-700 dark:hover:text-gray-200 focus:outline-none focus:text-orange-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{--Bovenste rij is active--}}
