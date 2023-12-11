<x-dropdown.default>
    <x-slot name="trigger">
        <button type="button" class="mr-2 bg-white rounded-full flex text-md focus:outline-none focus:ring-2 focus:ring-orange-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
            <img class="h-10 w-10 rounded-full" src="{{ asset('storage/'.current_user()->profile_photo_path) }}" alt="Avatar">
        </button>
    </x-slot>
    <div class="px-3 py-2 font-black text-sm text-orange-500 uppercase">
        Manage Account
    </div>
    @unlessrole('user')
{{--        <x-link.dropdown class="block" href="{{route ('admin.settings')}}">Settings</x-link.dropdown>--}}
        <x-link.dropdown class="block" href="#">Settings</x-link.dropdown>
    @endunlessrole
    <x-link.dropdown class="block" href="{{ route('profile.show', current_user()->name) }}">Your Profile</x-link.dropdown>
    @unlessrole('user')
        <x-link.dropdown class="block" href="{{ route('admin.invitations.create') }}">Invite User</x-link.dropdown>
    @endunlessrole
    <x-link.dropdown class="block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</x-link.dropdown>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</x-dropdown.default>
