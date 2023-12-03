@php
    $classes = 'text-orange-500 hover:text-gray-700 dark:hover:text-white focus:outline-none focus:text-gray-700 dark:focus:text-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

