<aside :class="{ 
    'md:w-64': open,
    'md:w-16': !open
}" class="hidden md:block w-64 fixed inset-y-0 rtl:right-0 ltr:left-0 rtl:border-l ltr:border-r z-30 bg-white transition-all duration-300 overflow-hidden"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <div class="h-full flex flex-col justify-between">
        <div>
            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <div class="flex items-center gap-x-2" x-show="open" x-cloak>
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}">
                    @endif
                    <span class="text-gray-700 font-semibold">
                        {{ Auth::user()->name }}
                    </span>
                </div>

                <button @click="open = !open"
                    class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-blue-50 focus:outline-none focus:bg-blue-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex items-center"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Links -->
            <nav class="mt-4 space-y-1 px-2">
                <x-dropdown-link wire:navigate href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                >
                    <x-icon name="chart-bar-square" class="h-6 w-6 text-gray-600" solid />
                    <span x-show="open" x-cloak>
                        {{ __('site.dashboard') }}
                    </span>
                </x-dropdown-link>

                @foreach ($this->responsiveLinks() as $link)
                @can($link['role'])
                <x-dropdown-link wire:navigate href="{{ route($link['name']) }}"
                    :active="request()->routeIs($link['name'])">
                    <x-icon name="{{ $link['icon'] }}" class="h-6 w-6 text-gray-600" solid />
                    <span x-show="open" x-cloak>
                        {{ __($link['value']) }}
                    </span>
                </x-dropdown-link>
                @endcan
                @endforeach

                @foreach ($this->dropdownLinks() as $link)
                @can($link['role'])
                <x-dropdown-link wire:navigate href="{{ route($link['name']) }}"
                    :active="request()->routeIs($link['name'])">
                    <x-icon name="{{ $link['icon'] }}" class="h-6 w-6 text-gray-600" solid />
                    <span x-show="open" x-cloak>
                        {{ __($link['value']) }}
                    </span>
                </x-dropdown-link>
                @endcan
                @endforeach
            </nav>
        </div>

        <!-- Logout -->
        <div class="space-y-1 border-t p-2">
            <x-lang-dropdown-links />

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                @method('POST')
                <x-dropdown-link href="{{ route('logout') }}"
                    @click.prevent="$root.submit();">
                    <x-icon name="arrow-left-on-rectangle" class="h-6 w-6 text-gray-600" solid />
                    <span x-show="open" x-cloak>
                        {{ __('site.logout') }}
                    </span>
                </x-dropdown-link>
            </form>
        </div>
    </div>
</aside>