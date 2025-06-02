<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('images/social_housing_logo.jpeg') }}" type="image/jpeg" />
    <title>{{ $title ?? 'Laravel App' }}</title>

    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Loader -->
    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">
        <div x-show="loading" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-80 z-50">
            <div class="spinner h-16 w-16"></div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="page-container">
        <section class="card">
            <header class="mb-6">
                <div class="card-title"># {{ __('site.new_origin_created') }}</div>
                <div class="card-subtitle">{{ __('site.hello') }} {{ $recipient->name }},</div>
            </header>

            <div class="card-body">
                {{ __('site.new_origin_has_been_created_by') }}
                <span class="highlight">{{ $sender->name }}</span>.
            </div>

            <div class="meta-box">
                <div><span class="highlight">{{ __('site.origin_name') }}:</span> {{ $origin->project->name }}</div>
                <div><span class="highlight">{{ __('site.created_at') }}:</span> {{ $origin->created_at->format('Y-m-d
                    H:i') }}</div>
            </div>

            <footer>
                <div class="text-gray-700 mb-2">{{ __('site.thank') }},</div>
                <div class="text-gray-900 font-bold">{{ config('app.name') }}</div>
            </footer>
        </section>
    </main>

    @vite('resources/js/app.js')

    @livewireScripts
</body>

</html>