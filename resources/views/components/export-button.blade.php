@props(['permission', 'id', 'link'])

@can($permission)
<x-danger-button wire:click="$dispatch('export-modal')" wire:loading.attr="disabled">
    <x-icon class="w-4 h-4 mr-1" name="arrow-down" />
    {{ __('site.export') }}
</x-danger-button>
@else
<x-danger-button class="cursor-not-allowed opacity-60">
    <x-icon class="w-4 h-4 mr-1" name="arrow-down" />
    {{ __('site.export') }}
</x-danger-button>
@endcan