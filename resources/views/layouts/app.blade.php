<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/social_housing_logo.jpeg') }}" />
    <title>{{ $title ?? 'Laravel' }}</title>

    @vite('resources/css/app.css')

    @livewireStyles

    @stack('styles')
</head>

<body>
    <div x-data="{
        open: false,
        init() {
            try {
                this.open = JSON.parse(window.localStorage.getItem('openSidebar')) || false;
            } catch (e) {
                this.open = false;
            }
        },
        toggle() {
            this.open = !this.open;
            try {
                window.localStorage.setItem('openSidebar', this.open);
            } catch (e) {
                // Handle storage error silently
            }
        }
    }" class="font-sans antialiased min-h-screen flex flex-col md:flex-row bg-gray-100 transition-all duration-500">

        <livewire:sidebar />

        <div class="ltr:md:ml-64 rtl:md:mr-64 w-full flex-1 transition-all duration-300 overflow-y-auto" :class="{
                'ltr:md:ml-64 rtl:md:mr-64': open,
                'ltr:md:ml-16 rtl:md:mr-16': !open,
            }">

            <livewire:navigate-menu />

            @if (isset($header))
            <header class="bg-white shadow border-b border-gray-100">
                <div class="w-full py-6 px-4 sm:px-6 lg:px-4">
                    {{ $header ?? ''}}
                </div>
            </header>
            @endif

            <x-notify />

            <main class="relative">
                <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">
                    <div x-show="loading" x-transition.opacity.duration.300ms
                        class="fixed inset-0 flex items-center justify-center bg-gray-100/50 z-50">
                        <!-- Animated dual-ring spinner -->
                        <div class="w-16 h-16 relative">
                            <div
                                class="w-full h-full border-4 border-t-blue-500 border-b-blue-500 border-l-transparent border-r-transparent rounded-full animate-spin">
                            </div>
                            <div
                                class="absolute top-0 left-0 w-full h-full border-4 border-t-transparent border-b-transparent border-l-blue-500 border-r-blue-500 rounded-full animate-spin-slower">
                            </div>
                        </div>
                    </div>
                </div>
                {{ $slot }}
            </main>
        </div>
    </div>

    @vite('resources/js/app.js')

    @livewireScripts

    @stack('modals')

    @stack('scripts')
</body>

</html>