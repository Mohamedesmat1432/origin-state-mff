@props(['permission', 'id', 'link'])

@can($permission)
<x-indigo-button wire:click="$dispatch('import-modal')" wire:loading.attr="disabled">
    <x-icon class="w-5 h-5 mr-1" name="document-arrow-up" solid="true" />
    {{ __('site.import') }}
</x-indigo-button>
@else
<x-indigo-button class="cursor-not-allowed opacity-60">
    <x-icon class="w-5 h-5 mr-1" name="document-arrow-up"  solid="true" />
    {{ __('site.import') }}
</x-indigo-button>
@endcan