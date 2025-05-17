@foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
<x-dropdown-link :active="$localeCode === LaravelLocalization::getCurrentLocale()"
    rel="alternate" hreflang="{{ $localeCode }}"
    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
    <img src="{{ asset('images/' . $localeCode . '.jpg') }}" alt="{{ $localeCode }}" class="w-6 h-5 rounded" />
    <span x-show="open" x-cloak>
        {{ $properties['native'] }}
    </span>
</x-dropdown-link>
@endforeach
