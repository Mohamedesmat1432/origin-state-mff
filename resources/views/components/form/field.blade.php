@props([
    'label' => null, 
    'type' => 'text', 
    'model', 
    'options' => null, 
    'placeholder' => null,
    'extra' => [],
])

<div class="mt-2">
    @if ($label)
        <x-label :for="$model" :value="$label" />
    @endif

    @switch($type)
        @case('textarea')
            <x-textarea class="mt-1 block w-full" wire:model.lazy="{{ $model }}" :placeholder="$placeholder" {{ $attributes->merge($extra) }}  />
            @break

        @case('file')
            <x-input type="file" class="mt-1 block w-full" wire:model.lazy="{{ $model }}" {{ $attributes->merge($extra) }} 
                accept=".png,.jpg,.jpeg,.gif,.webp,.xlsx,.xls,.doc,.docx,.odt,.csv,.pdf" />
            @break

        @default
            <x-input :type="$type" class="mt-1 block w-full" wire:model="{{ $model }}" :placeholder="$placeholder" {{ $attributes->merge($extra) }}  />
    @endswitch

    <x-input-error :for="$model" class="mt-2" />
</div>
