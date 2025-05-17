@props(['permission', 'id'])

@can($permission)
    <x-indigo-button wire:click="$dispatch('create-modal')" wire:loading.attr="disabled">
        <x-icon class="w-5 h-5" name="document-plus" solid="true" />
        {{ __('site.create') }}
    </x-indigo-button>
@else
    <x-indigo-button class="cursor-not-allowed opacity-60">
        <x-icon class="w-5 h-5" name="document-plus" solid="true" />
        {{ __('site.create') }}
    </x-indigo-button>
@endcan
