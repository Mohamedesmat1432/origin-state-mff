@props(['value'])

<span {{ $attributes->merge(['class' => 'font-medium text-md text-gray-700']) }}>
    {{ $value ?? $slot }}
</span>
