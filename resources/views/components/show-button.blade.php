@props(['permission', 'id'])

@can($permission)
<x-yellow-button wire:click="$dispatch('show-modal',{id:'{{ $id }}'})" wire:loading.attr="disabled">
    <x-icon class="w-5 h-5" name="eye" solid="true" />
    {{ __('site.show') }}
</x-yellow-button>
@else
<x-yellow-button class="cursor-not-allowed opacity-60">
    <x-icon class="w-5 h-5" name="eye" solid="true" />
    {{ __('site.show') }}
</x-yellow-button>
@endcan