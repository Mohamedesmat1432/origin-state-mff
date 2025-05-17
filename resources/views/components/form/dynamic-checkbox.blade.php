@props([
'label' => null,
'model',
'options' => null,
'placeholder' => __('site.select'),
'extra' => []
])

<div class="mt-2">
    @if ($label)
        <x-label :for="$model" :value="$label" />
    @endif
    
    <div
        class="mt-1 w-full grid grid-cols-1 md:grid-cols-3 gap-4 py-2 border p-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
        @foreach ($options as $key => $val)
        <div class="inline-flex items-center gap-0 gap-x-2">
            <x-checkbox wire:model="{{ $model }}" value="{{ $key }}" {{ $attributes->merge($extra) }} />
            <x-label for="{{ $model }}" value="{{ $val }}" />
        </div>
        @endforeach
    </div>

    <x-input-error :for="$model" class="mt-2" />
</div>