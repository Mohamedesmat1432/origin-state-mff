@props([
'label' => null,
'model',
'options' => null,
'placeholder' => __('site.select'),
'loadingTarget' => null,
'extra' => []
])

<div class="mt-2">
    @if ($label)
        <x-label :for="$model" :value="$label" />
    @endif

    @if ($loadingTarget)
        <div wire:loading wire:target="{{ $loadingTarget }}"
            class="w-4 h-4 border-2 border-black border-t-transparent rounded-full animate-spin mt-1">
        </div>
    @endif

    <x-select wire:model="{{ $model }}" id="{{ $model }}" class="mt-1 block w-full" {{ $attributes->merge($extra) }} >
        <option value="">{{ __('site.select') }}</option>
        @foreach ($options as $key => $val)
        <option value="{{ $key }}">{{ $val }}</option>
        @endforeach
    </x-select>

    <x-input-error :for="$model" class="mt-2" />
</div>