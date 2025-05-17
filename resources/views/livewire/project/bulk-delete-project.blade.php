<div>
    @can('bulk-delete-project')
    <x-dialog-modal-danger wire:model="bulk_delete_modal" submit="delete" method="DELETE">
        @if ($this->bulk_delete_modal)
        <x-slot name="title">
            {{ __('site.bulk_delete_project') }}
        </x-slot>

        <x-slot name="content">
            {{ __('site.are_you_sure_to_want_delete') . $count }} .
        </x-slot>

        <x-slot name="footer">
            <x-danger-button type="submit" wire:loading.attr="disabled">
                {{ __('site.bulk_delete_project') }}
            </x-danger-button>
            <x-secondary-button class="mx-2" wire:click="$set('bulk_delete_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal-danger>
    @endcan
</div>