@props(['permission', 'id', 'name'])

@can($permission)
    <x-danger-button wire:click="$dispatch('delete-modal',{id:'{{ $id }}',name:'{{ $name }}'})"
        wire:loading.attr="disabled">
        <x-icon class="w-5 h-5" name="trash" solid="true" />
        {{ __('site.delete') }}
    </x-danger-button>
@else
    <x-danger-button class="cursor-not-allowed opacity-60">
        <x-icon class="w-5 h-5" name="trash" solid="true" />
        {{ __('site.delete') }}
    </x-danger-button>
@endcan
