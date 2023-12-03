<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/26b11da1dc.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @stack('styles')
    <livewire:styles />
</head>

<body class="antialiased relative bg-gray-800 max-w-full">
<div class="min-h-screen flex flex-col">

    <main class="lg:flex-grow px-2 sm:px-0">
        <div class="md:grid md:grid-cols-12">
            <div class="md:col-span-12 h-screen">
                {{ $slot }}
            </div>
        </div>
    </main>

</div>

@stack('modals')

<livewire:scripts />
@stack('scripts')
</body>
</html>
