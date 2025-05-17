<div class="md:hidden p-4 border-b bg-white flex justify-between items-center"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <!-- User Info -->
    <div class="flex items-center space-x-2 rtl:space-x-reverse">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
            alt="{{ Auth::user()->name }}">
        @endif
        <span class="text-gray-700 font-semibold text-sm">{{ Auth::user()->name }}</span>
    </div>

    <!-- Dropdown Menu -->
    <x-dropdown align="{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}" width="56">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Dashboard -->
            <x-dropdown-link class="flex gap-x-2" wire:navigate href="{{ route('dashboard') }}"
                :active="request()->routeIs('dashboard')">
                <x-icon name="chart-bar-square" class="h-5 w-5" solid />
                {{ __('site.dashboard') }}
            </x-dropdown-link>

            <!-- Dynamic Links -->
            @foreach ($this->responsiveLinks() as $link)
            @can($link['role'])
            <x-dropdown-link class="flex gap-x-2" wire:navigate href="{{ route($link['name']) }}"
                :active="request()->routeIs($link['name'])">
                <x-icon name="{{ $link['icon'] }}" class="h-5 w-5" solid />
                {{ __($link['value']) }}
            </x-dropdown-link>
            @endcan
            @endforeach

            <!-- Dropdown Links (Account/Profile Settings) -->
            @foreach ($this->dropdownLinks() as $link)
            @can($link['role'])
            <x-dropdown-link class="flex gap-x-2" wire:navigate href="{{ route($link['name']) }}"
                :active="request()->routeIs($link['name'])">
                <x-icon name="{{ $link['icon'] }}" class="h-5 w-5" solid />
                {{ __($link['value']) }}
            </x-dropdown-link>
            @endcan
            @endforeach

            <!-- Language Switch -->
            <div class="border-t border-gray-200"></div>
            <x-lang-dropdown-links />

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" x-data class="border-t">
                @csrf
                @method('POST')
                <x-dropdown-link class="flex gap-x-2" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    <x-icon name="arrow-left-on-rectangle" class="h-5 w-5" solid />
                    {{ __('site.logout') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>