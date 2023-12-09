<th scope="col" class="px-4 py-3" wire:click="setSortBy('{{ $name }}')">
    <button class="flex items-center">
        {{ $displayName }}
        @if ($sortBy !== $name)
            <x-icons.icon name="dirnotset" />
        @elseif($sortDir === 'ASC')
            <x-icons.icon name="asc" />
        @else
            <x-icons.icon name="desc" />
        @endif
    </button>
</th>
