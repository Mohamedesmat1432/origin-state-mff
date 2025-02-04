<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/social_housing_logo.jpeg') }}">
    <title>{{ $title ?? 'Laravel' }}</title>

    @vite('resources/js/app.js')

    @livewireStyles

    @stack('styles')
</head>

<body>
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">
        <div x-show="loading" class="fixed inset-0 flex items-center justify-center"
            style="background: rgba(129, 129, 129, 0.077)">
            <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-t-blue-500 border-b-4 border-b-blue-500">
            </div>
        </div>
    </div>

    <div class="font-sans antialiased min-h-screen bg-gray-100 transition-all duration-500">
        <livewire:navigate-menu />

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow border-b border-gray-100">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
                <div>{{ $header }}</div>
            </div>
        </header>
        @endif

        <main>
            <x-notify />

            {{ $slot }}
        </main>
    </div>

    @livewireScripts

    @stack('modals')

    @stack('scripts')
</body>

</html>