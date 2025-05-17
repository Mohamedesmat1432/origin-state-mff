@props(['permission', 'id'])

@can($permission)
    <x-indigo-button wire:click="requestEdit('{{ $id }}')" wire:loading.attr="disabled">
        <x-icon class="w-5 h-5" name="arrow-path-rounded-square" solid="true" />
        <span>{{ __('site.edit_request') }}</span>
    </x-indigo-button>
@else
    <x-indigo-button class="cursor-not-allowed opacity-60">
        <x-icon class="w-5 h-5" name="arrow-path-rounded-square" solid="true" />
        {{ __('site.edit_request') }}
    </x-indigo-button>
@endcan
