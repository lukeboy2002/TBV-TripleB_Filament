<div>
    <div>
        <div class="flex justify-between items-center pb-8">
            <x-theme.heading>Ranking</x-theme.heading>
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-4 py-3">Name</th>
            @include('livewire.includes.sortable-th',[
            'name' => 'played_games',
             'displayName' => 'Played'
            ])
            @include('livewire.includes.sortable-th',[
                'name' => 'won_games',
                 'displayName' => 'Won'
            ])
            @include('livewire.includes.sortable-th',[
                'name' => 'points',
                 'displayName' => 'Points'
            ])
        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $member->user->name }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $member->played_games }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $member->won_games }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $member->points }}
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
