@props([
'label' => null,
'model' => null,
'enum',
'filterStatus' => false,
'filterCount' => 0,
'extra' => [],
])

<div class="mt-2">
    @if ($label)
    <x-label :for="$model" :value="$label" />
    @endif

    <div class="flex flex-wrap gap-2 mt-2">

        @foreach ($enum::cases() as $case)
        <label class="cursor-pointer" wire:key="{{ $model }}-{{ $case->value }}">
            <input type="radio" class="hidden peer" wire:model="{{ $model }}" value="{{ $case->value }}" {{
                $attributes->merge($extra) }} />
            <div class="transition-all duration-200
                     font-semibold whitespace-nowrap  opacity-60
                    {{ method_exists($case, 'color') ? $case->color() : 'border-gray-300' }}
                    peer-checked:border-{{ method_exists($case, 'color') ? $case->color() : 'blue' }}-600
                    peer-checked:opacity-100 
                    peer-checked:scale-105
                    ">
                {{ $case->label() }} {{ $filterStatus ? $case->count() : '' }}
            </div>
        </label>
        @endforeach

        @if ($filterStatus)
        <label class="cursor-pointer" wire:key="{{ $model }}-all">
            <input type="radio" class="hidden peer" wire:model="{{ $model }}" value="" {{ $attributes->merge($extra) }}
            />
            <div class="p-2 rounded-lg text-sm transition-all duration-200 text-white
                    font-semibold whitespace-nowrap
                   bg-slate-700 opacity-60
                    peer-checked:border-bg-slate-700
                    peer-checked:opacity-100 
                    peer-checked:scale-105 
                    ">
                {{ __('site.all') }} {{ $filterCount }}
            </div>
        </label>
        @endif
    </div>

    <x-input-error :for="$model" class="mt-2" />
</div>