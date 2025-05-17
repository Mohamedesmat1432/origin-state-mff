@can('view-trash-group-button')
<div class="grid grid-cols-2 rounded-md shadow-sm mt-2">
    @php
    $listDisabled = !$this->trash; // Disable "List" button if viewing Trash
    $trashDisabled = $this->trash; // Disable "Trash" button if viewing List
    @endphp

    <x-indigo-button wire:click.debounce.500ms="toggleTrash" :disabled="$listDisabled"
        class="flex items-center {{ $listDisabled ? 'opacity-60 cursor-not-allowed' : '' }} rounded-none rtl:rounded-r-md ltr:rounded-l-md">
        <x-icon class="w-5 h-5" name="clipboard-document-list" solid />
        <span>
            {{ __('site.list') }}
            ({{ $this->activeUsersCount }})
        </span>
    </x-indigo-button>

    <x-danger-button wire:click.debounce.500ms="toggleTrash" :disabled="$trashDisabled"
        class="flex items-center {{ $trashDisabled ? 'opacity-60 cursor-not-allowed' : '' }} rounded-none ltr:rounded-r-md rtl:rounded-l-md">
        <x-icon class="w-5 h-5" name="trash" solid />
        <span>
            {{ __('site.trash') }}
            ({{ $this->trashedUsersCount }})
        </span>
    </x-danger-button>
</div>
@endcan