<div class="main col-span-full overflow-hidden">
    <div class="flex justify-between items-center pb-8">
        <x-theme.heading>member overview</x-theme.heading>
        {{ $members->links() }}
    </div>
    @foreach($members as $member)
        <x-card.default>
            <div class="sm:flex">
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->user->name }}" class="h-full sm:h-80 sm:w-auto rounded-t-lg sm:rounded-t-none sm:rounded-tl-lg" >
                <div class="ml-4 py-8 w-full space-y-4 sm:space-y-6">
                    <div>
                        <p class="text-2xl font-black text-orange-500">{{ $member->user->name }}</p>
                        <p class="text-gray-700 dark:text-white text-sm">{{ $member->city }}</p>
                    </div>
                    <div class="flex justify-start gap-4 w-full text-sm text-gray-700 dark:text-white">
                        <div class="w-1/4">Age</div>
                        <div class="w-1/4">{{ $member->age() }}</div>
                        <div class="w-1/4">Points</div>
                        <div class="w-1/4">{{ $member->points }}</div>
                    </div>
                    <div class="flex justify-start gap-4 w-full text-sm text-gray-700 dark:text-white">
                        <div class="w-1/4">Played games</div>
                        <div class="w-1/4">{{ $member->played_games }}</div>
                        <div class="w-1/4">Games won</div>
                        <div class="w-1/4">{{ $member->won_games }}</div>
                    </div>
                    @if( $member->bio )
                    <div class="w-full pt-4 text-gray-700 dark:text-white">
                        <x-theme.heading>Biograpy</x-theme.heading>
                        <div class="pt-4 text-gray-700 dark:text-white">
                            {!! $member->bio !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </x-card.default>
    @endforeach
</div>
