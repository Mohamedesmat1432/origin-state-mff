<div>
    @can('force-delete-user')
    <x-dialog-modal-danger wire:model="force_delete_modal" submit="delete" method="DELETE">
        @if ($this->force_delete_modal)
        <x-slot name="title">
            {{ __('site.delete_user') }}
        </x-slot>

        <x-slot name="content">
            {{ __('site.are_you_sure_to_want_delete') . $name }} .
        </x-slot>

        <x-slot name="footer">
            <x-danger-button type="submit" wire:loading.attr="disabled">
                {{ __('site.delete_user') }}
            </x-danger-button>
            <x-secondary-button class="mx-2" wire:click="$set('force_delete_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal-danger>
    @endcan
</div>