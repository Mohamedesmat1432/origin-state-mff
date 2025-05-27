<aside :class="{ 
    'md:w-64': open,
    'md:w-16': !open
}" class="hidden md:block w-64 fixed inset-y-0 rtl:right-0 ltr:left-0 rtl:border-l ltr:border-r z-30 bg-white transition-all duration-300 overflow-hidden"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

    <div class="h-screen flex flex-col justify-between">
        <!-- Header -->
        <div class="flex items-center justify-between px-2 py-3 border-b">
            <div class="flex items-center gap-x-2" x-show="open" x-cloak>
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}">
                @endif
                <span class="text-gray-700 font-semibold">
                    {{ Auth::user()->name }}
                </span>
            </div>

            <button @click="toggle"
                class="p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-blue-50 focus:outline-none focus:bg-blue-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex items-center"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto">
            <!-- Links -->
            <nav class="mt-4 space-y-1 px-2">
                <x-dropdown-link wire:navigate href="{{ route('dashboard') }}"
                    :active="request()->routeIs('dashboard')">
                    <x-icon name="chart-bar-square" class="h-6 w-6 {{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-600' }}" solid />
                    <span x-show="open" x-cloak>
                        {{ __('site.dashboard') }}
                    </span>
                </x-dropdown-link>

                <div x-data="{
                    openManagement: false,
                    init() {
                        try {
                            this.openManagement = JSON.parse(window.localStorage.getItem('openManagement')) || false;
                        } catch (e) {
                            this.openManagement = false;
                        }
                    },
                    toggle() {
                        this.openManagement = !this.openManagement;
                        try {
                            window.localStorage.setItem('openManagement', this.openManagement);
                        } catch (e) {
                            // Handle storage error silently
                        }
                    }
                }">
                    <!-- Dropdown Button -->
                    <x-dropdown-link @click="toggle" class="cursor-pointer font-bold">
                        <x-icon name="user-group" class="h-5 w-6" solid />
                        <span class="w-full flex justify-between" x-show="open" x-cloak>
                            {{ __('site.user_management') }}
                            <svg class="ltr:ml-auto rtl:mr-auto h-4 w-4 transform transition-transform"
                                :class="{ 'rotate-180': openManagement }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                    </x-dropdown-link>

                    <!-- Dropdown Items -->
                    <div x-show="openManagement" x-cloak
                        :class="{ 'ltr:pl-4 ltr:border-l rtl:pr-4 rtl:border-r': open }"
                        class="mt-1 space-y-1 border-gray-200 shadow-sm">
                        @foreach ($this->dropdownLinks() as $link)
                        @if ($link['group'] === 'management')
                        @can($link['role'])
                        <x-dropdown-link wire:navigate href="{{ route($link['name']) }}"
                            :active="request()->routeIs($link['name'])">
                            <x-icon name="{{ $link['icon'] }}"
                                class="h-6 w-6 {{ request()->routeIs($link['name']) ? 'text-blue-500' : 'text-gray-600' }}"
                                solid />
                            <span x-show="open" x-cloak>{{ __($link['value']) }}</span>
                        </x-dropdown-link>
                        @endcan
                        @endif
                        @endforeach
                    </div>
                </div>

                <div x-data="{
                    openProgram: false,
                    init() {
                        try {
                            this.openProgram = JSON.parse(window.localStorage.getItem('openProgram')) || false;
                        } catch (e) {
                            this.openProgram = false;
                        }
                    },
                    toggle() {
                        this.openProgram = !this.openProgram;
                        try {
                            window.localStorage.setItem('openProgram', this.openProgram);
                        } catch (e) {
                            // Handle storage error silently
                        }
                    }
                }">
                    <!-- Dropdown Button -->
                    <x-dropdown-link @click="toggle" class="cursor-pointer font-bold">
                        <x-icon name="folder" class="h-5 w-6" solid />
                        <span class="w-full flex justify-between" x-show="open" x-cloak>
                            {{ __('site.program_data') }}
                            <svg class="ltr:ml-auto rtl:mr-auto h-4 w-4 transform transition-transform"
                                :class="{ 'rotate-180': openProgram }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </x-dropdown-link>

                    <!-- Dropdown Items -->
                    <div x-show="openProgram" x-cloak :class="{ 'ltr:pl-4 ltr:border-l rtl:pr-4 rtl:border-r': open }"
                        class="mt-1 space-y-1 border-gray-200 shadow-sm">
                        @foreach ($this->responsiveLinks() as $link)
                        @if ($link['group'] === 'program')
                        @can($link['role'])
                        <x-dropdown-link wire:navigate href="{{ route($link['name']) }}"
                            :active="request()->routeIs($link['name'])">
                            <x-icon name="{{ $link['icon'] }}"
                                class="h-6 w-6 {{ request()->routeIs($link['name']) ? 'text-blue-500' : 'text-gray-600' }}"
                                solid />
                            <span x-show="open" x-cloak>{{ __($link['value']) }}</span>
                        </x-dropdown-link>
                        @endcan
                        @endif
                        @endforeach
                    </div>
                </div>

                <div x-data="{
                    openLang: false,
                    init() {
                        try {
                            this.openLang = JSON.parse(window.localStorage.getItem('openLang')) || false;
                        } catch (e) {
                            this.openLang = false;
                        }
                    },
                    toggle() {
                        this.openLang = !this.openLang;
                        try {
                            window.localStorage.setItem('openLang', this.openLang);
                        } catch (e) {
                            // Handle storage error silently
                        }
                    }
                }">
                    <!-- Dropdown Button -->
                    <x-dropdown-link @click="toggle" class="cursor-pointer font-bold">
                        <x-icon name="language" class="h-6 w-6" solid />
                        <span class="w-full flex justify-between" x-show="open" x-cloak>
                            {{ __('site.lang') }}
                            <svg class="ltr:ml-auto rtl:mr-auto h-4 w-4 transform transition-transform"
                                :class="{ 'rotate-180': openLang }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </x-dropdown-link>

                    <!-- Dropdown Items -->
                    <div x-show="openLang" x-cloak :class="{ 'ltr:pl-4 ltr:border-l rtl:pr-4 rtl:border-r': open }"
                        class="mt-1 space-y-1 border-gray-200 shadow-sm">
                        <x-lang-dropdown-links />
                    </div>
                </div>
            </nav>
        </div>

        <!-- Logout -->
        <div class="space-y-1 border-t p-2">
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                @method('POST')
                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    <x-icon name="arrow-left-on-rectangle" class="h-6 w-6 text-gray-600" solid />
                    <span x-show="open" x-cloak>
                        {{ __('site.logout') }}
                    </span>
                </x-dropdown-link>
            </form>
        </div>
    </div>
</aside>