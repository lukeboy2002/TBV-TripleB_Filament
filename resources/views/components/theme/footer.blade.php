<div class="bg-white dark:bg-gray-800 w-full">
    <div class="max-w-7xl mx-auto py-8 px-4">
{{--        <x-sponsors />--}}
    </div>

    <div class="relative">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="mx-4 w-full border-t border-gray-700"></div>
        </div>
    </div>

    <div class="w-full mx-auto sm:max-w-7xl sm:flex sm:justify-around sm:items-start py-5 md:py-12 md:px-0">
        <!-- LOGO -->
        <div class="flex justify-center">
            <x-theme.logo />
            <div class="pt-4 block lg:text-center lg:flex lg:justify-center lg:items-center">
                <x-link.btn-secondary class="px-3 py-2 text-xs font-medium" href="#">Volg ons</x-link.btn-secondary>

                <div class="block space-x-2 pt-4 lg:pt-0 lg:flex lg:items-center lg:space-x-5 lg:ml-4">
                    <x-menu.social />
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/4 px-6 pt-10 sm:px-0 sm:pt-0">
            <div class="text-orange-500 font-black pb-3 uppercase">Laatste Nieuws</div>
            <div class="w-1/4 border-b-2 border-orange-500 mb-4"></div>
{{--            <x-post-footer />--}}
        </div>
        <!-- CONTACT -->
        <div class="w-full sm:w-1/4 px-6 pt-10 sm:px-0 sm:pt-0">
            <div class="text-orange-500 font-black pb-3 uppercase">Neem contact op</div>
            <div class="w-1/4 border-b-2 border-orange-500 mb-4"></div>
            <x-theme.contact />
        </div>
    </div>
    <!-- MENU -->
{{--    <div class="bg-gray-200 dark:bg-gray-900">--}}
        <div class="max-w-6xl mx-auto md:flex justify-around items-center py-5 px-5 md:px-0">
            <div class="flex justify-center md:justify-around space-x-1 md:space-x-6">
                <x-menu.footer />
            </div>
            <div class="pt-6 text-center md:pt-0">
                <x-link.primary href="#">{{ config('app.name') }} &copy; 2023</x-link.primary>
            </div>
        </div>
{{--    </div>--}}
</div>
