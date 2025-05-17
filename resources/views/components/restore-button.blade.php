@props(['permission', 'id', 'name'])

@can($permission)
<x-indigo-button wire:click="$dispatch('restore-modal',{id:'{{ $id }}',name:'{{ $name }}'})"
    wire:loading.attr="disabled">
    <x-icon class="w-5 h-5" name="arrow-uturn-left" solid="true" />
    {{ __('site.restore') }}
</x-indigo-button>
@else
<x-indigo-button class="cursor-not-allowed opacity-60">
    <x-icon class="w-5 h-5" name="arrow-uturn-left" solid="true" />
    {{ __('site.restore') }}
</x-indigo-button>
@endcan