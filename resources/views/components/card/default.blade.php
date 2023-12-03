@php
    $classes = 'w-full mx-auto rounded-lg bg-gray-100 dark:bg-gray-900 p-8 ';
@endphp

{{--<div class="bg-gray-800 flex flex-col justify-center">--}}
    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </div>
{{--</div>--}}
